<?
/* ----------------------------------------------------------------------------
D E T A I L S D ' U N S I T E
PHPMyRing (2.3) dernière modification du fichier [22-07-02]
---------------------------------------------------------------------------- */

// VERIFICATION DE L'ACCES
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
if (!isset(\<?
/* ----------------------------------------------------------------------------
D E T A I L S D ' U N S I T E
PHPMyRing (2.3) dernière modification du fichier [22-07-02]
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
require __DIR__ . '/haut.php';
// Connexion
$conn = connecte();
// Requete
$rqt = "SELECT idsite,site_nom, url, description, webmaster, email, visites,date,page
FROM webring WHERE idsite='$idsite'";
$res = requete($rqt);
$row = $GLOBALS['xoopsDB']->fetchBoth($res);
//$GLOBALS['xoopsDB']->close();
echo $rqt;
?>
    <br>
    <table width="400" border="0" align="center">
        <tr>
            <td>
                <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif">
                        <b>
                            <font size="2"><? echo $L['fiche_site']; ?><i> <? echo $row['site_nom']; ?></i></font>
                        </b>
                </div>
            </td>
        </tr>
    </table>
    <table width="500" border="0" align="center">
        <tr>
            <td width="245" align="right" valign="middle">URL :</td>
            <td width="245" align="left" valign="middle"><a href="<? echo $row['url']; ?>" target="_blank">
                    <? echo $row['url']; ?>
                </a></td>
        </tr>
        <tr>
            <td width="245" align="right" valign="top"><? echo ucfirst($L['description']); ?> :</td>
            <td width="245" align="left" valign="top">
                <? echo $row['description']; ?>
            </td>
        </tr>
        <tr>
            <td width="245" align="right" valign="middle"><? echo ucfirst($L['webmaster']); ?> :</td>
            <td width="245" align="left" valign="middle">
                <? echo $row['webmaster']; ?>
            </td>
        </tr>
        <tr>
            <td width="245" align="right" valign="middle"><? echo $L['add_email']; ?> :</td>
            <td width="245" align="left" valign="middle"><? echo codemail($row['email']); ?></td>
        </tr>
        <tr>
            <td width="245" align="right" valign="middle"><? echo $L['inscr_dep']; ?> :</td>
            <td width="245" align="left" valign="middle">
                <?
                $date = $row['date'];
                [$an, $mois, $jour] = explode("-", $date);
                echo "$jour/$mois/$an";
                ?>
            </td>
        </tr>
        <tr>
            <td width="245" align="right" valign="middle"><? echo $L['nbre_vis']; ?> :</td>
            <td width="245" align="left" valign="middle">
                <? echo $row['visites']; ?>
            </td>
        </tr>
        <tr>
            <td width="245" align="right" valign="middle"><? echo $L['pge_cont_wr']; ?> :</td>
            <td width="245" align="left" valign="middle"><a href="<? echo $row['page']; ?>" target="_blank">
                    <? echo $row['page']; ?>
                </a></td>
        </tr>
        <tr>
            <td colspan="2" align="center" valign="middle">
                <a href="liste.php"><? echo ucfirst($L['retour']); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="supprimer.php?objet=1&idsite[]=<? echo $row['idsite']; ?>"><? echo $L['supprimer']; ?></a>
            </td>
        </tr>
    </table>
<? require __DIR__ . '/bas.php'; ?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
}
require __DIR__ . '/haut.php';
// Connexion
$conn = connecte();
// Requete
$rqt = "SELECT idsite,site_nom, url, description, webmaster, email, visites,date,page
FROM webring WHERE idsite='$idsite'";
$res = requete($rqt);
$row = $GLOBALS['xoopsDB']->fetchBoth($res);
//$GLOBALS['xoopsDB']->close();
echo $rqt;
?>
    <br>
    <table width="400" border="0" align="center">
        <tr>
            <td>
                <div align="center"><font face="Verdana, Arial, Helvetica, sans-serif">
                        <b>
                            <font size="2"><? echo $L['fiche_site']; ?><i> <? echo $row['site_nom']; ?></i></font>
                        </b>
                </div>
            </td>
        </tr>
    </table>
    <table width="500" border="0" align="center">
        <tr>
            <td width="245" align="right" valign="middle">URL :</td>
            <td width="245" align="left" valign="middle"><a href="<? echo $row['url']; ?>" target="_blank">
                    <? echo $row['url']; ?>
                </a></td>
        </tr>
        <tr>
            <td width="245" align="right" valign="top"><? echo ucfirst($L['description']); ?> :</td>
            <td width="245" align="left" valign="top">
                <? echo $row['description']; ?>
            </td>
        </tr>
        <tr>
            <td width="245" align="right" valign="middle"><? echo ucfirst($L['webmaster']); ?> :</td>
            <td width="245" align="left" valign="middle">
                <? echo $row['webmaster']; ?>
            </td>
        </tr>
        <tr>
            <td width="245" align="right" valign="middle"><? echo $L['add_email']; ?> :</td>
            <td width="245" align="left" valign="middle"><? echo codemail($row['email']); ?></td>
        </tr>
        <tr>
            <td width="245" align="right" valign="middle"><? echo $L['inscr_dep']; ?> :</td>
            <td width="245" align="left" valign="middle">
                <?
                $date = $row['date'];
                [$an, $mois, $jour] = explode("-", $date);
                echo "$jour/$mois/$an";
                ?>
            </td>
        </tr>
        <tr>
            <td width="245" align="right" valign="middle"><? echo $L['nbre_vis']; ?> :</td>
            <td width="245" align="left" valign="middle">
                <? echo $row['visites']; ?>
            </td>
        </tr>
        <tr>
            <td width="245" align="right" valign="middle"><? echo $L['pge_cont_wr']; ?> :</td>
            <td width="245" align="left" valign="middle"><a href="<? echo $row['page']; ?>" target="_blank">
                    <? echo $row['page']; ?>
                </a></td>
        </tr>
        <tr>
            <td colspan="2" align="center" valign="middle">
                <a href="liste.php"><? echo ucfirst($L['retour']); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="supprimer.php?objet=1&idsite[]=<? echo $row['idsite']; ?>"><? echo $L['supprimer']; ?></a>
            </td>
        </tr>
    </table>
<? require __DIR__ . '/bas.php'; ?>
