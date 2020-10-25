<?
/* ----------------------------------------------------------------------------
E N V O I D E R A P P O R T D E B U G
PHPMyRing (2.3) dernière modification du fichier [23-09-02]
---------------------------------------------------------------------------- */

// VERIFICATION DE L'ACCES
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
if (!isset(\<?
/* ----------------------------------------------------------------------------
E N V O I D E R A P P O R T D E B U G
PHPMyRing (2.3) dernière modification du fichier [23-09-02]
---------------------------------------------------------------------------- */

// VERIFICATION DE L'ACCES
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
if (!session_is_registered('idadm')) {
    echo $L['session_ferm'];
    exit;
}
// Configuration
//$conf=config();
require __DIR__ . '/haut.php';
// Email & nom de l'administrateur qui écrit
$conn     = connecte();
$rqt      = "SELECT nomadm,emailadm " . "FROM webring_adm " . "WHERE idadm='$idadm'";
$qui      = $GLOBALS['xoopsDB']->fetchBoth(requete($rqt));
$version  = $conf['version'];
$nomadm   = $qui['nomadm'];
$emailadm = $qui['emailadm'];
$nomwr    = $conf['nomwr'];
$chemin   = $conf['adresse_site'] . "/" . $conf['dossierwr'];
//$GLOBALS['xoopsDB']->close();
if (!$go) {
    // On récupère le contenu du répertoire racine
    $contenu_racine = "";
    $folder         = dir("../");
    while ($fichier = $folder->read()) {
        $fichier2       = "/$fichier";
        $contenu_racine .= "<option value=\"$fichier2\">$fichier2</option>
";
    }
    $folder->close();
    // On récupère le contenu du répertoire admin
    $contenu_admin = "";
    $folder        = dir("../admin");
    while ($fichier = $folder->read()) {
        $fichier2      = "/admin/$fichier";
        $contenu_admin .= "<option value=\"$fichier2\">$fichier2</option>
";
    }
    $folder->close();
    // On récupère le contenu du répertoire include
    $contenu_include = "";
    $folder          = dir("../include");
    while ($fichier = $folder->read()) {
        $fichier2        = "/include/$fichier";
        $contenu_include .= "<option value=\"$fichier2\">$fichier2</option>
";
    }
    $folder->close();
    // On récupère le contenu du répertoire install
    $contenu_install = "";
    $folder          = dir("../install");
    while ($fichier = $folder->read()) {
        $fichier2        = "/install/$fichier";
        $contenu_install .= "<option value=\"$fichier2\">$fichier2</option>
";
    }
    $folder->close();
    ?>
    <form method="post" action="<? echo $PHP_SELF; ?>">
        <input type="hidden" name="go" value="1">
        <table width="75%" cellpadding="0" cellspacing="0" align="center" class="table_liste">
            <tr>
                <td class="titre_inscription"><? echo $L['titre_bug']; ?></td>
            </tr>
            <tr>
                <td><i><? echo $L['remp_form']; ?></i></td>
            </tr>
            <tr>
                <td height="18">1- <? echo $L['p_conc']; ?></td>
            </tr>
            <tr>
                <td align="center">
                    <select name="page[]" size="15" multiple>
                        <? echo $contenu_racine; ?>
                    </select>
                    <select name="page[]" size="15" multiple>
                        <? echo $contenu_admin; ?>
                    </select>
                    <select name="page[]" size="15" multiple>
                        <? echo $contenu_include; ?>
                    </select>
                    <select name="page[]" size="15" multiple>
                        <? echo $contenu_install; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>2- <? echo $L['txt_erreur']; ?></td>
            </tr>
            <tr>
                <td align="center">
                    <textarea name="texte" cols="45" rows="7"></textarea>
                </td>
            </tr>
            <tr>
                <td>3- <? echo $L['heberg']; ?></td>
            </tr>
            <tr>
                <td align="center">
                    <input type="text" name="hebergeur">
                </td>
            </tr>
            <tr>
                <td>4- <? echo $L['envoi_form']; ?></td>
            </tr>
            <tr>
                <td align="center">
                    <input type="submit" name="Submit" value="Envoyer !">
                </td>
            </tr>
            <tr>
                <td>
                    <p><? echo $L['don_env']; ?>
                        <br>
                        - <b><? echo $L['env']; ?></b> :
                        <? echo $SERVER_SOFTWARE; ?>
                        <br>
                        - <b><? echo $L['browser']; ?></b> :
                        <? echo $HTTP_USER_AGENT; ?>
                        <br>
                        - <b><? echo $L['nom_site']; ?></b> :
                        <? echo $nomwr; ?>
                        <br>
                        - <b><? echo $L['url_site']; ?></b> :
                        <? echo $chemin; ?>
                        <br>
                        - <b><? echo $L['email']; ?></b> :
                        <? echo $emailadm; ?>
                        <br>
                        - <b><? echo $L['version_ring']; ?></b> :
                        <? echo $version; ?>
                    </p>
                </td>
            </tr>
        </table>
    </form>
    <?
    // Fin du if
} elseif ($go == 1) {
    // Envoi du message à webring@microniko.net
    // Récupération des pages
    for ($i = 0; $i < count($page); $i++) {
        $pages .= $chemin . $page[$i] . "\n";
    }
    $body = "Salut Niko !
Il s'agit un rapport de bug de PHP My Ring venant de $nomadm.
Page(s) concernée(s) :
$pages
Description du bug :
$texte
- Hébergeur : $hebergeur
- L'environnement : $SERVER_SOFTWARE
- Browser : $HTTP_USER_AGENT
- Le nom du site: $nomwr
- L'URL du webring : $chemin
- La version de PHPMYRing : $version
Voilà !";
    courrier("$nomadm<$emailadm>", "webring@microniko.net", "[PHPMyRing $version] Rapport de bug", $body);
    echo "<p align=center>" . $L['conf_bug'] . "</p>";
    //Fin du else
}
require __DIR__ . '/bas.php';
?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
}
// Configuration
//$conf=config();
require __DIR__ . '/haut.php';
// Email & nom de l'administrateur qui écrit
$conn     = connecte();
$rqt      = "SELECT nomadm,emailadm " . "FROM webring_adm " . "WHERE idadm='$idadm'";
$qui      = $GLOBALS['xoopsDB']->fetchBoth(requete($rqt));
$version  = $conf['version'];
$nomadm   = $qui['nomadm'];
$emailadm = $qui['emailadm'];
$nomwr    = $conf['nomwr'];
$chemin   = $conf['adresse_site'] . "/" . $conf['dossierwr'];
//$GLOBALS['xoopsDB']->close();
if (!$go) {
    // On récupère le contenu du répertoire racine
    $contenu_racine = "";
    $folder         = dir("../");
    while ($fichier = $folder->read()) {
        $fichier2       = "/$fichier";
        $contenu_racine .= "<option value=\"$fichier2\">$fichier2</option>
";
    }
    $folder->close();
    // On récupère le contenu du répertoire admin
    $contenu_admin = "";
    $folder        = dir("../admin");
    while ($fichier = $folder->read()) {
        $fichier2      = "/admin/$fichier";
        $contenu_admin .= "<option value=\"$fichier2\">$fichier2</option>
";
    }
    $folder->close();
    // On récupère le contenu du répertoire include
    $contenu_include = "";
    $folder          = dir("../include");
    while ($fichier = $folder->read()) {
        $fichier2        = "/include/$fichier";
        $contenu_include .= "<option value=\"$fichier2\">$fichier2</option>
";
    }
    $folder->close();
    // On récupère le contenu du répertoire install
    $contenu_install = "";
    $folder          = dir("../install");
    while ($fichier = $folder->read()) {
        $fichier2        = "/install/$fichier";
        $contenu_install .= "<option value=\"$fichier2\">$fichier2</option>
";
    }
    $folder->close();
    ?>
    <form method="post" action="<? echo $PHP_SELF; ?>">
        <input type="hidden" name="go" value="1">
        <table width="75%" cellpadding="0" cellspacing="0" align="center" class="table_liste">
            <tr>
                <td class="titre_inscription"><? echo $L['titre_bug']; ?></td>
            </tr>
            <tr>
                <td><i><? echo $L['remp_form']; ?></i></td>
            </tr>
            <tr>
                <td height="18">1- <? echo $L['p_conc']; ?></td>
            </tr>
            <tr>
                <td align="center">
                    <select name="page[]" size="15" multiple>
                        <? echo $contenu_racine; ?>
                    </select>
                    <select name="page[]" size="15" multiple>
                        <? echo $contenu_admin; ?>
                    </select>
                    <select name="page[]" size="15" multiple>
                        <? echo $contenu_include; ?>
                    </select>
                    <select name="page[]" size="15" multiple>
                        <? echo $contenu_install; ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>2- <? echo $L['txt_erreur']; ?></td>
            </tr>
            <tr>
                <td align="center">
                    <textarea name="texte" cols="45" rows="7"></textarea>
                </td>
            </tr>
            <tr>
                <td>3- <? echo $L['heberg']; ?></td>
            </tr>
            <tr>
                <td align="center">
                    <input type="text" name="hebergeur">
                </td>
            </tr>
            <tr>
                <td>4- <? echo $L['envoi_form']; ?></td>
            </tr>
            <tr>
                <td align="center">
                    <input type="submit" name="Submit" value="Envoyer !">
                </td>
            </tr>
            <tr>
                <td>
                    <p><? echo $L['don_env']; ?>
                        <br>
                        - <b><? echo $L['env']; ?></b> :
                        <? echo $SERVER_SOFTWARE; ?>
                        <br>
                        - <b><? echo $L['browser']; ?></b> :
                        <? echo $HTTP_USER_AGENT; ?>
                        <br>
                        - <b><? echo $L['nom_site']; ?></b> :
                        <? echo $nomwr; ?>
                        <br>
                        - <b><? echo $L['url_site']; ?></b> :
                        <? echo $chemin; ?>
                        <br>
                        - <b><? echo $L['email']; ?></b> :
                        <? echo $emailadm; ?>
                        <br>
                        - <b><? echo $L['version_ring']; ?></b> :
                        <? echo $version; ?>
                    </p>
                </td>
            </tr>
        </table>
    </form>
    <?
    // Fin du if
} elseif ($go == 1) {
    // Envoi du message à webring@microniko.net
    // Récupération des pages
    for ($i = 0; $i < count($page); $i++) {
        $pages .= $chemin . $page[$i] . "\n";
    }
    $body = "Salut Niko !
Il s'agit un rapport de bug de PHP My Ring venant de $nomadm.
Page(s) concernée(s) :
$pages
Description du bug :
$texte
- Hébergeur : $hebergeur
- L'environnement : $SERVER_SOFTWARE
- Browser : $HTTP_USER_AGENT
- Le nom du site: $nomwr
- L'URL du webring : $chemin
- La version de PHPMYRing : $version
Voilà !";
    courrier("$nomadm<$emailadm>", "webring@microniko.net", "[PHPMyRing $version] Rapport de bug", $body);
    echo "<p align=center>" . $L['conf_bug'] . "</p>";
    //Fin du else
}
require __DIR__ . '/bas.php';
?>
