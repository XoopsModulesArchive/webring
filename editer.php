<?php
// WebRing pour Xoops
// kyex 052002 - http://kyex.inconnueteam.net
// v0.1
//
// editer.php : editer un site d'un membre
// param : op dans (ajout,edit,suppr)
// : id = id du site a editer (si op=edit ou suppr)
// : wrid = id du webring, pour op=ajout, dans lequel on va ajouter un site
// -------------------------------------------------------------------------------
// WebRing Converted to E-Xoops by
//
// Johan Carleson, linuxdude@home.se
// http://e-xoops.carleson.net
// -------------------------------------------------------------------------------
include 'header.php';
include 'class/class.webring.php';
function wrs_generation_code($id)
{
    global $xoopsConfig;

    $wrs = new webringsite($id);

    $wr = $wrs->webring();

    $code = '';

    // generation du code a inserer par l'utilisateur sur son site

    $code .= '&lt;center&gt;';

    if ('' != $wr->image) {
        $code .= '&lt;a href="' . $xoopsConfig['xoops_url'] . '/modules/webring/webring.php?wrid=' . $wr->wrid . '"&gt;' . '&lt;img src="' . $wr->image . '" /&gt;' . '&lt;/a&gt;';
    } else {
        $code .= '&lt;a href="' . $xoopsConfig['xoops_url'] . '/modules/webring/webring.php?wrid=' . $wr->wrid . '"&gt;' . $wr->nom . '&lt;/a&gt;';
    }

    $code .= '&lt;br /&gt;';

    $code .= '&lt;a href="' . $xoopsConfig['xoops_url'] . "/modules/webring/action.php?op=prec&id=$id\"&gt;" . '&amp;lt;&amp;lt;' . '&lt;/a&gt;';

    $code .= '&amp;nbsp;|&amp;nbsp;&lt;a href="' . $xoopsConfig['xoops_url'] . "/modules/webring/action.php?op=hasard&id=$id\"&gt;" . 'Hazard' . '&lt;/a&gt;';

    $code .= '&amp;nbsp;|&amp;nbsp;&lt;a href="' . $xoopsConfig['xoops_url'] . "/modules/webring/action.php?op=suiv&id=$id\"&gt;" . '&amp;gt;&amp;gt;' . '&lt;/a&gt;';

    $code .= '&lt;/center&gt';

    // fin generation du code

    return $code;
}

function wrs_ajout($wrid)
{
    global $xoopsConfig;

    require XOOPS_ROOT_PATH . '/header.php';

    OpenTable();

    echo '<form action=editer.php method=post>
<table border=0 ><tr><td>
' . _WRS_NOM . ' : </td><td><input type=text name=nom size=50 maxlength=50></td></tr><tr><td>
' . _WRS_URL . ' : </td><td><input type=text name=url size=50 maxlength=100></td></tr><tr><td>
' . _WRS_DESC . " : </td><td><input type=text name=desc size=50 maxlength=200></td></td></tr></table>
<input type=hidden name=wrid value=$wrid>
<input type=hidden name=op value=okajout>
<input type=submit value=\"" . _WRS_AJOUTER . '">
</form>';

    CloseTable();

    require XOOPS_ROOT_PATH . '/footer.php';
}

function wrs_edit($id)
{
    global $xoopsConfig, $xoopsUser;

    require XOOPS_ROOT_PATH . '/header.php';

    OpenTable();

    $wrs = new webringsite($id);

    if ($wrs->uid == $xoopsUser->uid()) {
        echo '<form action=editer.php method=post>'
             . '<table border=0 ><tr><td>'
             . _WRS_NOM
             . ' : </td><td><input type=text name="nom" value="'
             . $wrs->nom
             . '" size=50 maxlength=50></td></tr><tr><td>'
             . _WRS_URL
             . ' : </td><td><input type=text name="url" value="'
             . $wrs->url
             . '" size=50 maxlength=100></td></tr><tr><td>'
             . _WRS_DESC
             . ' : </td><td><textarea name="desc" cols=50 rows=5>'
             . $wrs->description
             . '</textarea></td></td></tr></table>'
             . "<input type=hidden name=id value=$id>"
             . '<input type=hidden name=op value=okmodif>'
             . '<input type=submit value='
             . _WRS_MODIFIER
             . '>'
             . '<input type="button" name="suppr" value="'
             . _WRS_SUPPRIMER
             . "\" onClick=\"document.location.href='editer.php?op=suppr&id=$id'\">"
             . '<input type="button" name="retour" value="'
             . _WRS_RETOUR_LISTE
             . "\" onClick=\"document.location.href='webring.php?wrid="
             . $wrs->wrid
             . "'\">"
             . '</form>'
             . '<br><br>'
             . '<center><b>'
             . _WRS_CODE_SITE
             . '</b></center><br>';

        echo wrs_generation_code($id);
    }

    CloseTable();

    require XOOPS_ROOT_PATH . '/footer.php';
}

function wrs_suppr($id)
{
    global $xoopsConfig, $xoopsUser;

    require XOOPS_ROOT_PATH . '/header.php';

    OpenTable();

    $wrs = new webringsite($id);

    if ($wrs->uid == $xoopsUser->uid()) {
        echo _WRS_CONFIRMER_SUPPR . '&nbsp;<b>' . $wrs->nom . '</b><br>';

        echo "<table><tr><td>\n";

        echo myTextForm("editer.php?op=oksuppr&amp;id=$id", _YES);

        echo "</td><td>\n";

        echo myTextForm("editer.php?op=edit&amp;id=$id", _NO);

        echo "</td></tr></table>\n";
    }

    CloseTable();

    require XOOPS_ROOT_PATH . '/footer.php';
}

function wrs_okajout($wrid, $nom, $url, $desc)
{
    global $xoopsUser, $db, $myts;

    $id = $db->genId('webringsite_id_seq');

    $db->query('insert into ' . $db->prefix('webringsite') . "(id,uid,wrid,nom,url,description) values ($id, '" . $xoopsUser->uid() . "', '$wrid', '$nom', '$url' ,'$desc')");

    if (0 == $id) {
        $id = $db->insert_id();
    }

    redirect_header("editer.php?op=edit&id=$id", 2, _WRS_AJOUT_SITE);
}

function wrs_oksuppr($id)
{
    global $xoopsUser, $db, $myts;

    $wrs = new webringsite($id);

    $wrid = $wrs->wrid;

    if ($wrs->uid == $xoopsUser->uid()) {
        $res = $db->queryF('delete from ' . $db->prefix('webringsite') . " where id=$id");

        redirect_header("webring.php?wrid=$wrid", 2, _WRS_SUPPR_SITE);
    } else {
        redirect_header("webring.php?wrid=$wrid", 5, _WRS_OP_INTERDITE);
    }
}

function wrs_okmodif($id, $nom, $url, $desc)
{
    global $db, $myts, $xoopsUser;

    $wrs = new webringsite($id);

    $wrid = $wrs->wrid;

    if ($wrs->uid == $xoopsUser->uid()) {
        $db->query('update ' . $db->prefix('webringsite') . " set nom='$nom', url='$url', description='$desc' where id='$id'");

        redirect_header("webring.php?wrid=$wrid", 2, _WRS_MODIF_SITE);
    } else {
        redirect_header("webring.php?wrid=$wrid", 5, _WRS_OP_INTERDITE);
    }
}

if ($xoopsUser && '' != $xoopsUser->uname()) {
    switch ($op) {
        case 'ajout':
            wrs_ajout($wrid);
            break;
        case 'okajout':
            wrs_okajout($wrid, $nom, $url, $desc);
            break;
        case 'edit':
            wrs_edit($id);
            break;
        case 'okmodif':
            wrs_okmodif($id, $nom, $url, $desc);
            break;
        case 'suppr':
            wrs_suppr($id);
            break;
        case 'oksuppr':
            wrs_oksuppr($id);
            break;
        default:
            redirect_header($xoopsConfig['xoops_url'], 5, _WRS_OP_INTERDITE);
            break;
    }
} else {
    redirect_header($xoopsConfig['xoops_url'], 5, 'Connectez-vous!!!');
}
