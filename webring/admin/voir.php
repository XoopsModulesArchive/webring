<?

/* ---------------------------------------------------------------------------- 
V O I R U N E D E M A N D E D ' I N S C R I P T I O N 
PHPMyRing (4.0) dernière modification du fichier [16-11-02] 
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
// VERIFICATION DE L'ACCES 
if (!isset(\<?

/* ---------------------------------------------------------------------------- 
V O I R U N E D E M A N D E D ' I N S C R I P T I O N 
PHPMyRing (4.0) dernière modification du fichier [16-11-02] 
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
// VERIFICATION DE L'ACCES 
if (!session_is_registered('idadm')) {
    echo $L['session_ferm'];
    exit;
}
require "haut.php";
$conn = connecte();
$rqt  = "SELECT idsite, site_nom, url, description, webmaster, email FROM webring WHERE idsite='$idsite'";
$res  = requete($rqt);
$row  = $GLOBALS['xoopsDB']->fetchBoth($res);
//$GLOBALS['xoopsDB']->close(); 
?>
    <br>
    <table width="500" border="2" align="center">
        <tr>
            <td>
                <div align="center"><b><font face="Arial, Helvetica, sans-serif" color="#000099"><? echo $L['site_demande']; ?></font></b></div>
            </td>
        </tr>
    </table>
    <form method="post" action="accepter.php" name="accept">
        <input type="hidden" name="idsite" value="<? echo $row['idsite']; ?>">
        <table width="500" border="0" align="center">
            <tr>
                <td align="right" valign="middle" width="245"><? echo $L['nom_du_site']; ?> :</td>
                <td width="245"><? echo $row['site_nom']; ?></td>
            </tr>
            <tr>
                <td align="right" valign="middle" width="245">URL :</td>
                <td width="245">
                    <input type="text" name="url" value="<? echo $row['url']; ?>" size="20">
                    <a href="<? echo $row['url']; ?>" target="_blank">Go</a></td>
            </tr>
            <tr>
                <td align="right" valign="middle" width="245"><? echo ucfirst($L['description']); ?> :</td>
                <td width="245">
                    <textarea name="description"><? echo $row['description']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td align="right" valign="middle" width="245"><? echo ucfirst($L['webmaster']); ?> :</td>
                <td width="245"><a href="mailto:<? echo $row['email']; ?>"><? echo $row['webmaster']; ?></a></td>
            </tr>
            <tr align="center">
                <td valign="middle" colspan="2"><a href="JavaScript:document.accept.submit();"><? echo $L['accepter']; ?></a>
                    | <a href="refus.php?idsite=<? echo $row['idsite']; ?>"><? echo $L['refuser']; ?></a> | <a href="index.php"><? echo $L['rien_faire']; ?></a></td>
            </tr>
        </table>
    </form>
<? require __DIR__ . '/bas.php'; ?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
}
require "haut.php";
$conn = connecte();
$rqt  = "SELECT idsite, site_nom, url, description, webmaster, email FROM webring WHERE idsite='$idsite'";
$res  = requete($rqt);
$row  = $GLOBALS['xoopsDB']->fetchBoth($res);
//$GLOBALS['xoopsDB']->close(); 
?>
    <br>
    <table width="500" border="2" align="center">
        <tr>
            <td>
                <div align="center"><b><font face="Arial, Helvetica, sans-serif" color="#000099"><? echo $L['site_demande']; ?></font></b></div>
            </td>
        </tr>
    </table>
    <form method="post" action="accepter.php" name="accept">
        <input type="hidden" name="idsite" value="<? echo $row['idsite']; ?>">
        <table width="500" border="0" align="center">
            <tr>
                <td align="right" valign="middle" width="245"><? echo $L['nom_du_site']; ?> :</td>
                <td width="245"><? echo $row['site_nom']; ?></td>
            </tr>
            <tr>
                <td align="right" valign="middle" width="245">URL :</td>
                <td width="245">
                    <input type="text" name="url" value="<? echo $row['url']; ?>" size="20">
                    <a href="<? echo $row['url']; ?>" target="_blank">Go</a></td>
            </tr>
            <tr>
                <td align="right" valign="middle" width="245"><? echo ucfirst($L['description']); ?> :</td>
                <td width="245">
                    <textarea name="description"><? echo $row['description']; ?></textarea>
                </td>
            </tr>
            <tr>
                <td align="right" valign="middle" width="245"><? echo ucfirst($L['webmaster']); ?> :</td>
                <td width="245"><a href="mailto:<? echo $row['email']; ?>"><? echo $row['webmaster']; ?></a></td>
            </tr>
            <tr align="center">
                <td valign="middle" colspan="2"><a href="JavaScript:document.accept.submit();"><? echo $L['accepter']; ?></a>
                    | <a href="refus.php?idsite=<? echo $row['idsite']; ?>"><? echo $L['refuser']; ?></a> | <a href="index.php"><? echo $L['rien_faire']; ?></a></td>
            </tr>
        </table>
    </form>
<? require __DIR__ . '/bas.php'; ?>
