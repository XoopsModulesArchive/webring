<?php

/* ----------------------------------------------------------------------------
M O T E U R D E R E C H E R C H E
> Traitement de la recherche <
PHPMyRing (4.0) dernière modification du fichier [06-12-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
$conf = config();
InsertLang('', $conf['lang']);
if ($mots == '') {
    header("Location: index.php?msgRech=" . $L['rech_vide'] . " !");
    exit;
}
require __DIR__ . '/tete.php';
require __DIR__ . '/haut2.php';
// Si nombre indéfinie
if (!$nombre) {
    $nombre = $conf['nbre_rech'];
}
// Pareil pour limite
if (!$limite) {
    $limite = 0;
}
// Limite suivante et celle d'avant
$limitesuivante   = $limite + $nombre;
$limiteprecedente = $limite - $nombre;
# # # # # # # #
# Modifications de la requète #
# # # # # # # #
$mots = trim($mots); // Suppression des espaces initiaux et finaux
$mots = strtolower($mots); // Passage en minuscules
$mots = str_replace('+', ' ', $mots); // Remplacement par des espaces
$mots = str_replace("\'", ' ', $mots);
$mots = str_replace('\"', ' ', $mots);
$mots = str_replace('.', ' ', $mots);
$mots = str_replace(',', ' ', $mots);
$mots = htmlentities($mots); // En HTML
$tab  = explode(' ', $mots); // hop dans un tableau (délimiteur : espace)
$nbre = count($tab); // Elements
// L'opérateur
if (!isset($operateur)) {
    $operateur = "OR";
}
//Endroit de la recherche
if (!isset($where)) {
    $where = "description";
}
// La chpetite requète SQL
$rqt = "SELECT idsite, site_nom, url, description, date, visites FROM webring WHERE $where LIKE '%$tab[0]%' AND accept='1'";
// Une boucle pour tous les mots
for ($i = 1; $i < $nbre; $i++) {
    $rqt .= " $operateur $where LIKE '%$tab[$i]%'";
}
// on va compter le nombre total
connecte();
$res   = requete($rqt);
$total = $GLOBALS['xoopsDB']->getRowsNum($res);
$rqt   .= "LIMIT $limite,$nombre ";
$res   = requete($rqt);
?>
    <table width="60%" border="0" class="table_liste" align="center" cols="2">
        <tr>
            <td width="100%" class="titre_inscription" colspan="2"><?php echo $L['rech_res']; ?></td>
        </tr>
        <?php
        if ($res) {
            if ($GLOBALS['xoopsDB']->getRowsNum($res) == 0) {
                ?>
                <tr>
                    <td width="100%" colspan="2" align="center" valign="middle"><?php echo $L['rech_rien']; ?></td>
                </tr>
                <?php
                // require __DIR__ . '/formsearch.php';
            } else {
                while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
                    $url = $conf['adresse_site'] . "/" . $conf['dossierwr'] . "/clik.php?idsite=$row[0]"; ?>
                    <tr>
                        <td width="100%" colspan="2">
                            -&nbsp;<a href="<?php echo $url; ?>" target="_blank"><?php echo $row['site_nom']; ?></a><br>
                            &nbsp;&nbsp;<?php echo substr($row['description'], 0, 80); ?>...<br>
                            <span class="infos_site"><?php echo $row[2] . " - " . $L['visite'] . " " . $row['visites'] . " " . $L['fois']; ?></span>
                    </tr>
                    <?php
                }
                $GLOBALS['xoopsDB']->freeRecordSet($res);
            }
        }
        ?>
        <tr>
            <td width="50%" align="center" valign="middle">
                <?php
                if ($limite != 0) {
                    echo "[&nbsp;<a href=\"$PHP_SELF?limite=$limiteprecedente&mots=$mots&where=$where\">" . ucfirst($L['precedents']) . "</a>&nbsp;]";
                }
                ?>
            </td>
            <td width="50%" align="center" valign="middle">
                <?php
                if ($limitesuivante < $total) {
                    echo "[&nbsp;<a href=\"$PHP_SELF?limite=$limitesuivante&mots=$mots&where=$where\">" . ucfirst($L['suivants']) . "</a>&nbsp;]";
                }
                ?>
            </td>
        </tr>
    </table> <br>
<?php
require __DIR__ . '/formsearch.php';
require __DIR__ . '/pied.php';
?>
