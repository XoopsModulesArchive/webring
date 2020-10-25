<?

/* ----------------------------------------------------------------------------
V E R I F I C A T I O N P R E S E N C E D U S C R I P T
> Affichage de la liste des sites <
PHPMyRing (4.0) dernière modification du fichier [16-11-02]
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
// VERIFICATION DE L'ACCES
if (!isset(\<?

/* ----------------------------------------------------------------------------
V E R I F I C A T I O N P R E S E N C E D U S C R I P T
> Affichage de la liste des sites <
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
// Configuration
//$conf=config();
require __DIR__ . '/haut.php';
// Si nombre indéfinie
if (!$nombre) {
    $nombre = $conf['nbre'];
}
// Pareil pour limite
if (!$limite) {
    $limite = 0;
}
// Limite suivante et celle d'avant
$limitesuivante   = $limite + $nombre;
$limiteprecedente = $limite - $nombre;
// Connexion à MySQL
$conn = connecte();
// pour compter le nombre TOTAl de résultats dans la table...
$rqt = "SELECT idsite FROM webring WHERE accept!=0";
$res = requete($rqt);
$nb  = $GLOBALS['xoopsDB']->getRowsNum($res);
// Requète
$rqt = "SELECT idsite,site_nom,url,webmaster,email,accept
FROM webring WHERE accept!=0 LIMIT $limite,$nombre ";
$res = requete($rqt);
//$GLOBALS['xoopsDB']->close();
?>
    <table width="550" border="0" align="center">
        <tr>
            <td height="33" align="center" valign="middle" colspan="4"><b><font face="Arial, Helvetica, sans-serif" size="3"><? echo $L['liste_d_sites']; ?></font></b></td>
        </tr>
    </table>
    <p align="center"><font color="#0000FF"><b><? echo $message; ?></b></font></p>
    <table width="500" border="0" align="center" class="table_liste">
        <?
        if ($nb) {
            while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
                // Pour la date :
                $date = $row['date'];
                [$an, $mois, $jour] = explode("-", $date); // on coupe la date
                $tps_tem  = mktime(0, 0, 0, $mois, $jour, $an); // On la convertit en h min s j m a
                $now      = time(); // Ke lheur kil é ?
                $secondes = $now - $tps_tem; // Bien, alors ça fait combien de temps (en s) ké le témoignage ?
                $ecart    = Floor($secondes / (60 * 60 * 24)); // Oui mais en secondes je m'en fout, en jours ça fé kombien ??
                $url      = $row['url'];
                if ($row['accept'] == 1) {
                    $accept = $L['actif'];
                }
                if ($row['accept'] == 2) {
                    $accept = $L['desactiv'];
                }
                ?>
                <!-- DEBUT -->
                <tr class="table_admin" width="500" border="0">
                    <td class="cellule_liste"><a href="<? echo "$url"; ?>" target="_blank">
                            <? echo $row['site_nom']; ?>
                        </a></td>
                </tr>
                <tr>
                    <td><i><? echo ucfirst($L['webmaster']); ?> </i>:<i> <a href="mailto:<? echo $row['email']; ?>">
                                <? echo $row['webmaster']; ?>
                            </a><br>
                        </i><? echo $L['ce_site_est']; ?> <u><? echo $accept; ?></u><b> [<a href="verification.php?idsite=<? echo $row['idsite']; ?>"><? echo $L['verifier']; ?></a>]</b><i><br>
                        </i></td>
                </tr>
                <!-- FIN -->
                <?
                // Fin du while
            }
            // FIn du if
        } else {
            ?>
            <tr>
                <td align="center" valign="middle">
                    <p><? echo $L['aucun_site']; ?></p>
                </td>
            </tr>
            <?
            // Fin du else
        }
        ?>
    </table>
    <br>
    <table width="200" border="0" align="center">
    <tr>
        <td align="left" valign="top">
            <?
            if ($limite != 0) {
                echo "<a href=\"$PHP_SELF?limite=$limiteprecedente\">" . $L['precedents'] . "</a>";
            }
            ?>
        </td>
        <td valign="top" align="right">
            <?
            if ($limitesuivante < $nb) {
                echo "<a href=\"$PHP_SELF?limite=$limitesuivante\">" . $L['suivants'] . "</a>";
            }
            ?>
        </td>
    </tr>
<? require __DIR__ . '/bas.php'; ?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
}
// Configuration
//$conf=config();
require __DIR__ . '/haut.php';
// Si nombre indéfinie
if (!$nombre) {
    $nombre = $conf['nbre'];
}
// Pareil pour limite
if (!$limite) {
    $limite = 0;
}
// Limite suivante et celle d'avant
$limitesuivante   = $limite + $nombre;
$limiteprecedente = $limite - $nombre;
// Connexion à MySQL
$conn = connecte();
// pour compter le nombre TOTAl de résultats dans la table...
$rqt = "SELECT idsite FROM webring WHERE accept!=0";
$res = requete($rqt);
$nb  = $GLOBALS['xoopsDB']->getRowsNum($res);
// Requète
$rqt = "SELECT idsite,site_nom,url,webmaster,email,accept
FROM webring WHERE accept!=0 LIMIT $limite,$nombre ";
$res = requete($rqt);
//$GLOBALS['xoopsDB']->close();
?>
    <table width="550" border="0" align="center">
        <tr>
            <td height="33" align="center" valign="middle" colspan="4"><b><font face="Arial, Helvetica, sans-serif" size="3"><? echo $L['liste_d_sites']; ?></font></b></td>
        </tr>
    </table>
    <p align="center"><font color="#0000FF"><b><? echo $message; ?></b></font></p>
    <table width="500" border="0" align="center" class="table_liste">
        <?
        if ($nb) {
            while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
                // Pour la date :
                $date = $row['date'];
                [$an, $mois, $jour] = explode("-", $date); // on coupe la date
                $tps_tem  = mktime(0, 0, 0, $mois, $jour, $an); // On la convertit en h min s j m a
                $now      = time(); // Ke lheur kil é ?
                $secondes = $now - $tps_tem; // Bien, alors ça fait combien de temps (en s) ké le témoignage ?
                $ecart    = Floor($secondes / (60 * 60 * 24)); // Oui mais en secondes je m'en fout, en jours ça fé kombien ??
                $url      = $row['url'];
                if ($row['accept'] == 1) {
                    $accept = $L['actif'];
                }
                if ($row['accept'] == 2) {
                    $accept = $L['desactiv'];
                }
                ?>
                <!-- DEBUT -->
                <tr class="table_admin" width="500" border="0">
                    <td class="cellule_liste"><a href="<? echo "$url"; ?>" target="_blank">
                            <? echo $row['site_nom']; ?>
                        </a></td>
                </tr>
                <tr>
                    <td><i><? echo ucfirst($L['webmaster']); ?> </i>:<i> <a href="mailto:<? echo $row['email']; ?>">
                                <? echo $row['webmaster']; ?>
                            </a><br>
                        </i><? echo $L['ce_site_est']; ?> <u><? echo $accept; ?></u><b> [<a href="verification.php?idsite=<? echo $row['idsite']; ?>"><? echo $L['verifier']; ?></a>]</b><i><br>
                        </i></td>
                </tr>
                <!-- FIN -->
                <?
                // Fin du while
            }
            // FIn du if
        } else {
            ?>
            <tr>
                <td align="center" valign="middle">
                    <p><? echo $L['aucun_site']; ?></p>
                </td>
            </tr>
            <?
            // Fin du else
        }
        ?>
    </table>
    <br>
    <table width="200" border="0" align="center">
    <tr>
        <td align="left" valign="top">
            <?
            if ($limite != 0) {
                echo "<a href=\"$PHP_SELF?limite=$limiteprecedente\">" . $L['precedents'] . "</a>";
            }
            ?>
        </td>
        <td valign="top" align="right">
            <?
            if ($limitesuivante < $nb) {
                echo "<a href=\"$PHP_SELF?limite=$limitesuivante\">" . $L['suivants'] . "</a>";
            }
            ?>
        </td>
    </tr>
<? require __DIR__ . '/bas.php'; ?>
