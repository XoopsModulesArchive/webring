<?

/* ----------------------------------------------------------------------------
L I S T E D E S S I T E S ( Z O N E A D M I N I S T R A T E U R )
PHPMyRing (3.0) dernière modification du fichier [12-10-02]
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
// VERIFICATION DE L'ACCES
if (!isset(\<?

/* ----------------------------------------------------------------------------
L I S T E D E S S I T E S ( Z O N E A D M I N I S T R A T E U R )
PHPMyRing (3.0) dernière modification du fichier [12-10-02]
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
// Connexion MySQL
$conn = connecte();
// Requète
$rqt = "SELECT idsite,site_nom,url,webmaster,email FROM webring WHERE accept='1'";
$res = requete($rqt);
$nb  = $GLOBALS['xoopsDB']->getRowsNum($res);
//$GLOBALS['xoopsDB']->close();
require __DIR__ . '/haut.php';
?>
    <table width="500" border="0" align="center">
        <tr>
            <td>
                <div align="center"><b><font face="Arial, Helvetica, sans-serif" size="3"><? echo $L['ls_sites_insc']; ?></font></b></div>
            </td>
        </tr>
    </table>
    <br>
    <form action="supprimer.php" name="suppresseur" method="post">
        <input type="hidden" name="objet" value="1">
        <table width="600" align="center" cellpadding="0" cellspacing="0" class="table_liste_ad">
            <tr align="center" valign="middle" class="haut_table_liste_ad">
                <td width="145"><? echo $L['sitenom']; ?></td>
                <td width="159">URL</td>
                <td width="135"><? echo ucfirst($L['webmaster']); ?></td>
                <td width="46"><? echo $L['del']; ?></td>
                <td width="46"><? echo $L['details']; ?></td>
            </tr>
            <!-- DEBUT -->
            <?
            if ($nb) {
                while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
                    ?>
                    <tr align="center" valign="middle">
                        <td width="145" align="left">
                            <? echo $row['site_nom']; ?>
                        </td>
                        <td width="159" align="left"><a href="<? echo $row['url']; ?>" target="_blank">
                                <?
                                // On coupe l'url...
                                $url = substr($row['url'], 0, 30);
                                echo $url;
                                ?>
                            </a></td>
                        <td width="135" align="left"><a href="mailto:<? echo $row['email']; ?>">
                                <? echo $row['webmaster']; ?>
                            </a></td>
                        <td width="46" align="center" valign="middle"><input type="checkbox" name="idsite[]" value="<? echo $row['idsite']; ?>"></td>
                        <td width="46"><a href="fiche.php?idsite=<? echo $row['idsite']; ?>">&gt;</a></td>
                    </tr>
                    <!-- FIN -->
                    <?
                    // Fin du while
                }
                ?>
                <tr>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"><input type="submit" value=" ok "></td>
                    <td align="center"></td>
                </tr>
                <?
                // Fin du if
            } else {
                ?>
                <tr align="center" valign="middle">
                    <td width="145" colspan="5"><? echo $L['aucun_site']; ?></td>
                </tr>
                <?
                // Fin du else
            }
            ?>
        </table>
    </form>
    <div align="center"><br>
        <? echo $L['info_ls']; ?></div>
<? require __DIR__ . '/bas.php'; ?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
}
// Connexion MySQL
$conn = connecte();
// Requète
$rqt = "SELECT idsite,site_nom,url,webmaster,email FROM webring WHERE accept='1'";
$res = requete($rqt);
$nb  = $GLOBALS['xoopsDB']->getRowsNum($res);
//$GLOBALS['xoopsDB']->close();
require __DIR__ . '/haut.php';
?>
    <table width="500" border="0" align="center">
        <tr>
            <td>
                <div align="center"><b><font face="Arial, Helvetica, sans-serif" size="3"><? echo $L['ls_sites_insc']; ?></font></b></div>
            </td>
        </tr>
    </table>
    <br>
    <form action="supprimer.php" name="suppresseur" method="post">
        <input type="hidden" name="objet" value="1">
        <table width="600" align="center" cellpadding="0" cellspacing="0" class="table_liste_ad">
            <tr align="center" valign="middle" class="haut_table_liste_ad">
                <td width="145"><? echo $L['sitenom']; ?></td>
                <td width="159">URL</td>
                <td width="135"><? echo ucfirst($L['webmaster']); ?></td>
                <td width="46"><? echo $L['del']; ?></td>
                <td width="46"><? echo $L['details']; ?></td>
            </tr>
            <!-- DEBUT -->
            <?
            if ($nb) {
                while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
                    ?>
                    <tr align="center" valign="middle">
                        <td width="145" align="left">
                            <? echo $row['site_nom']; ?>
                        </td>
                        <td width="159" align="left"><a href="<? echo $row['url']; ?>" target="_blank">
                                <?
                                // On coupe l'url...
                                $url = substr($row['url'], 0, 30);
                                echo $url;
                                ?>
                            </a></td>
                        <td width="135" align="left"><a href="mailto:<? echo $row['email']; ?>">
                                <? echo $row['webmaster']; ?>
                            </a></td>
                        <td width="46" align="center" valign="middle"><input type="checkbox" name="idsite[]" value="<? echo $row['idsite']; ?>"></td>
                        <td width="46"><a href="fiche.php?idsite=<? echo $row['idsite']; ?>">&gt;</a></td>
                    </tr>
                    <!-- FIN -->
                    <?
                    // Fin du while
                }
                ?>
                <tr>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"></td>
                    <td align="center"><input type="submit" value=" ok "></td>
                    <td align="center"></td>
                </tr>
                <?
                // Fin du if
            } else {
                ?>
                <tr align="center" valign="middle">
                    <td width="145" colspan="5"><? echo $L['aucun_site']; ?></td>
                </tr>
                <?
                // Fin du else
            }
            ?>
        </table>
    </form>
    <div align="center"><br>
        <? echo $L['info_ls']; ?></div>
<? require __DIR__ . '/bas.php'; ?>
