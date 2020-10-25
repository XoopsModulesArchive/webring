<?php
//
// WebRing pour Xoops 1.0RC3
// kyex 052002 - http://kyex.inconnueteam.net
// v0.1
//
// index.php : admin des webrings
include 'admin_header.php';
include '../class/class.webring.php';
function wr_index()
{
    global $xoopsConfig, $xoopsModule;

    xoops_cp_header();

    echo "<br>\n";

    OpenTable();

    echo '<center><b>' . _WR_LISTE . '</b></center>';

    // affichage liste des Webrings

    echo '<center><table border=1 width=100%>' . '<tr class="bg2">' . '<td align=center>' . _WR_NOM . '</td>' . '<td align=center>' . _WR_IMAGE . '</td>' . '<td align=center>' . _WR_DESC . '</td>' . '<td align=center>' . _WR_ACTION . '</td>' . '</tr>';

    $listeWR = WebRing::listeWebRing();

    foreach ($listeWR as $wr) {
        if ('' != $wr->image) {
            $image = '<img src="' . $wr->image . '">';
        } else {
            $image = '';
        }

        echo '<tr class="bg3">'
             . '<td align=left>'
             . $wr->nom
             . '</td>'
             . "<td align=center>$image</td>"
             . '<td align=left>'
             . $wr->description
             . '</td>'
             . '<td align=center><a href=index.php?op=edit&wrid='
             . $wr->wrid
             . '>'
             . _EDIT
             . '</a> | <a href=index.php?op=suppr&wrid='
             . $wr->wrid
             . '>'
             . _DELETE
             . '</a></td>'
             . '</tr>';
    }

    echo '</table></center>';

    echo '<br><br>'
         . '<center><b>'
         . _WR_AJOUT
         . '</b></center>'
         . '<form action=index.php method=post>'
         . '<table border=0 ><tr><td>'
         . _WR_NOM
         . ' : </td><td><input type=text name=nom size=50 maxlength=50></td></tr><tr><td>'
         . _WR_IMAGE
         . ' : </td><td><input type=text name=image size=50 maxlength=100></td></tr><tr><td>'
         . _WR_DESC
         . ' : </td><td><input type=text name=desc size=50 maxlength=200></td></tr></table>'
         . '<input type=hidden name=op value=okajout>'
         . '<input type=submit value="'
         . _WR_AJOUTER
         . '">'
         . '</form>';

    CloseTable();

    include 'admin_footer.php';
}

function wr_edit($wrid)
{
    global $xoopsConfig;

    xoops_cp_header();

    OpenTable();

    $wr = new WebRing($wrid);

    echo '<center><b>'
         . _WR_EDITER
         . '</b></center>'
         . '<form action=index.php method=post>'
         . '<table border=0 ><tr><td>'
         . _WR_NOM
         . ' : </td><td><input type=text name="nom" value="'
         . $wr->nom
         . '" size=50 maxlength=50></td></tr><tr><td>'
         . _WR_IMAGE
         . ' : </td><td><input type=text name="image" value="'
         . $wr->image
         . '" size=50 maxlength=100></td></tr><tr><td>'
         . _WR_DESC
         . ' : </td><td><textarea name="desc" cols=50 rows=5>'
         . $wr->description
         . '</textarea></td></td></tr></table>'
         . "<input type=hidden name=wrid value=$wrid>"
         . '<input type=hidden name=op value=okmodif>'
         . '<input type=submit value='
         . _WR_MODIFIER
         . '>'
         . '</form>';

    CloseTable();

    include 'admin_footer.php';
}

function wr_suppr($wrid)
{
    global $xoopsConfig;

    xoops_cp_header();

    OpenTable();

    $wr = new WebRing($wrid);

    echo _WR_CONFIRMER_SUPPR . '&nbsp;<b>' . $wr->nom . '</b><br>';

    echo "<table><tr><td>\n";

    echo myTextForm("index.php?op=oksuppr&amp;wrid=$wrid", _YES);

    echo "</td><td>\n";

    echo myTextForm('index.php', _NO);

    echo "</td></tr></table>\n";

    CloseTable();

    include 'admin_footer.php';
}

function wr_okajout($nom, $image, $desc)
{
    global $db;

    $wr = new WebRing();

    $wr->nouveau($nom, $desc, $image);

    redirect_header('index.php', 2, _WR_AJOUT_RING);
}

function wr_oksuppr($wrid)
{
    global $db;

    $res = $db->query('delete from ' . $db->prefix('webring') . " where wrid=$wrid");

    redirect_header('index.php', 2, _WR_SUPPR_RING);
}

function wr_okmodif($wrid, $nom, $image, $desc)
{
    global $db;

    $wr = new WebRing($wrid);

    $db->query('update ' . $db->prefix('webring') . " set nom='$nom', image='$image', description='$desc' where wrid='$wrid'");

    redirect_header('index.php', 2, _WR_MODIF_RING);
}

switch ($op) {
    case 'edit':
        wr_edit($wrid);
        break;
    case 'suppr':
        wr_suppr($wrid);
        break;
    case 'okajout':
        wr_okajout($nom, $image, $desc);
        break;
    case 'oksuppr':
        wr_oksuppr($wrid);
        break;
    case 'okmodif':
        wr_okmodif($wrid, $nom, $image, $desc);
        break;
    default:
        wr_index();
}
