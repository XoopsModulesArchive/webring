<?php

/* ----------------------------------------------------------------------------
A C C U E I L D U W E B R I N G
( L I S T E D E S S I T E S )
PHPMyRing (3.0) dernière modification du fichier [16-12-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
// Configuration
$conf = config();
InsertLang('', $conf['lang']);
require __DIR__ . '/tete.php';
require __DIR__ . '/haut2.php';
#
# pour afficher sur plusieurs pages la liste..
#
// Si classement ($classe) inféfinie
if (!$classe) {
    $classe = $conf['classement'];
}
if (!$ordre) {
    $ordre = $conf['ordre'];
}
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
// Connexion MySQL
$conn = connecte();
// pour compter le nombre TOTAl de résultats dans la table...
$res = requete(
    "SELECT idsite " . "FROM webring " . "WHERE accept='1' " . "ORDER BY $classe"
);
$nb  = $GLOBALS['xoopsDB']->getRowsNum($res);
// Requète
$res = requete(
    "SELECT idsite,site_nom,url,webmaster,email,description,date,visites " . "FROM webring " . "WHERE accept='1' " . "ORDER BY $classe $ordre " . "LIMIT $limite,$nombre"
);
?>
    <table width="550" border="0" align="center">
        <tr>
            <td height="33" align="center" valign="middle" colspan="4"><?php echo $L['liste_site_de']; ?>
                <?php echo $conf['type']; ?>
            </td>
        </tr>
        <tr align="center">
            <td valign="middle" class="table1"><a href="<?php echo $PHP_SELF; ?>?classe=date&ordre=DESC">+
                    <?php echo ucfirst($L['recent']); ?></a></td>
            <td valign="middle" class="table1"><a href="<?php echo $PHP_SELF; ?>?classe=date&ordre=ASC">+
                    <?php echo ucfirst($L['ancien']); ?></a></td>
            <td valign="middle" class="table1"><a href="<?php echo $PHP_SELF; ?>?classe=visites&ordre=DESC">+
                    <?php echo ucfirst($L['visite']); ?></a></td>
            <td valign="middle" class="table1"><a href="<?php echo $PHP_SELF; ?>?classe=visites&ordre=ASC">-
                    <?php echo ucfirst($L['visite']); ?></a></td>
        </tr>
    </table>
    <br>
    <table width="500" border="0" align="center" class="table_liste">
        <?php
        if ($nb) {
            while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
                // Pour la date :
                $date = $row['date'];
                [$an, $mois, $jour] = explode("-", $date); // on coupe la date
                $tps_tem  = mktime(0, 0, 0, $mois, $jour, $an); // On la convertit en h min s j m a
                $now      = time(); // Ke lheur kil é ?
                $secondes = $now - $tps_tem; // Bien, alors ça fait combien de temps (en s) ké le témoignage ?
                $ecart    = Floor($secondes / (60 * 60 * 24)); // Oui mais en secondes je m'en fout, en jours ça fé kombien ??
                $idsite   = $row['idsite']; ?>
                <!-- DEBUT -->
                <tr class="cellule_liste">
                    <td width="379"><span class="titre_site_liste"><a href="<?php echo "clik.php?idsite=$idsite"; ?>" target="_blank">
<?php echo StripSlashes($row['site_nom']); ?>
</a></span></td>
                    <td width="80" align="center" valign="middle">
                        <?php
                        $visites = $row['visites'];
                // Depuis combien de temps le site est inscrit ??
                if ($ecart < $conf['jrnew']) {
                    ?>
                            <img src="images/new.png" title="<?php echo ucfirst($L['new']); ?> !" width="30" height="15" border="0" align="middle" alt="New !">
                            <?php
                } else {
                    echo "<span class=\"visites_site\">" . ucfirst($L['visite']) . $visites . $L['fois'] . "</span>";
                } ?>
                    </td>
                    <td width="27" align="center" valign="middle"><a href="JavaScript:view_com(<?php echo $idsite; ?>);" title="Voir les commentaires"><img src="images/commentaire.png" width="25" height="25" border="0"></a></td>
                </tr>
                <tr>
                    <td colspan="3">
                        <span class="description_site_liste"><?php echo StripSlashes($row['description']); ?></span>
                        <br>
                        <span class="infos_site">
<?php echo $L['ajout_le'] . " : $jour/$mois/$an - " . ucfirst($L['webmaster']) . " : " . $row['webmaster'] . " (" . codemail($row['email']) . ")"; ?>
</span><br>
                    </td>
                </tr>
                <!-- FIN -->
                <?php
                // Fin du while
            }
            // FIn du if
        } else {
            ?>
            <tr>
                <td colspan="3" align="center" valign="middle">
                    <?php echo $L['aucun_site']; ?>
                    ! <a href="inscription.php">
                        <?php echo ucfirst($L['inscription']); ?>
                    </a></td>
            </tr>
            <?php
            // Fin du else
        }
        ?>
    </table>
    <br>
    <table width="200" border="0" align="center">
        <tr>
            <td align="left" valign="top">
                <?php
                if ($limite != 0) {
                    echo "<a href=\"$PHP_SELF?limite=$limiteprecedente&classe=$classe&ordre=$ordre\" title\"" . $L['precedents'] . "\"><img src=\"images/precedents.png\" width=\"20\" height=\"32\" border=\"0\" alt=\"precedents\"></a>";
                }
                ?>
            </td>
            <td valign="top" align="right">
                <?php
                if ($limitesuivante < $nb) {
                    echo "<a href=\"$PHP_SELF?limite=$limitesuivante&classe=$classe&ordre=$ordre\" title=\"" . $L['suivants'] . "\"><img src=\"images/suivants.png\" width=\"19\" height=\"32\" border=\"0\" alt=\"precedents\">";
                }
                ?>
            </td>
        </tr>
    </table>
<?php
require __DIR__ . '/formsearch.php';
require __DIR__ . '/pied.php';
?>
