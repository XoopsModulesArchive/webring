<?php

/* ----------------------------------------------------------------------------
V O I R L E S C O M M E N T A I R E S
PHPMyRing (4.0) dernière modification du fichier [16-11-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
// Configuration
$conf = config();
InsertLang('', $conf['lang']);
// Si le numéro du site n'est pas défini
if (!$idsite) {
    echo "<p align=\"center\">Erreur !<br> Le N&deg; du site n'est pas d&eacute;fini !</p>";
} else {
    // On va aller chercher le nom du site conserné, ça sera fait ;)
    // Connexion MySQL
    $conn     = connecte();
    $row      = $GLOBALS['xoopsDB']->fetchBoth(requete("SELECT site_nom FROM webring WHERE idsite=$idsite"));
    $site_nom = $row['site_nom'];
    # pour afficher sur plusieurs pages la liste..
    // Si classement ($classe) inféfinie
    if (!$classe) {
        $classe = "date";
    }
    if (!$ordre) {
        $ordre = "ASC";
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
    // pour compter le nombre TOTAl de résultats dans la table...
    $rqt = "SELECT idsite " . "FROM webring_com " . "WHERE idsite='$idsite' " . "ORDER BY $classe";
    $nb  = $GLOBALS['xoopsDB']->getRowsNum(requete($rqt));
    // Requète
    $rqt = "SELECT idcom, auteur, texte, note, date " . "FROM webring_com " . "WHERE idsite='$idsite' " . "ORDER BY '$classe' $ordre " . "LIMIT $limite,$nombre ";
    $res = requete($rqt);
    //$GLOBALS['xoopsDB']->close();
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title><?php echo $L['commentaires_de'] . " " . $site_nom; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <?php require __DIR__ . '/include/styles.php'; ?>
</head>
<body bgcolor="#FFFFFF" text="#000000">
<table width="95%" border="0" cellspacing="0" cellpadding="0" class="table1">
    <tr valign="middle" align="center">
        <td><a href="<?php echo $PHP_SELF; ?>?idsite=<?php echo $idsite; ?>&classe=date&ordre=DESC">+ R&eacute;cent</a></td>
        <td><a href="<?php echo $PHP_SELF; ?>?idsite=<?php echo $idsite; ?>&classe=date&ordre=ASC">+ Ancien</a></td>
    </tr>
    <tr valign="middle" align="center">
        <td><a href="<?php echo $PHP_SELF; ?>?idsite=<?php echo $idsite; ?>&classe=note&ordre=ASC">+ Sympa</a></td>
        <td><a href="<?php echo $PHP_SELF; ?>?idsite=<?php echo $idsite; ?>&classe=note&ordre=DESC">+ S&eacute;v&egrave;re</a></td>
    </tr>
</table>
<br>
<?php
if ($nb) {
    while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
        $date = $row['date'];
        [$an, $mois, $jour] = explode("-", $date); ?>
        <table width="95%" border="0" class="table_liste">
            <tr>
                <td width="86%">Commentaire de <?php echo StripSlashes($row['auteur']); ?> (<?php echo "$jour-$mois-$an"; ?>)</td>
                <td width="14%">Note : <?php echo $row['note']; ?></td>
            </tr>
            <tr>
                <td colspan="2"><p align="justify"><?php echo StripSlashes($row['texte']); ?></p></td>
            </tr>
        </table>
        <br>
        <?php
        // FIN DU WHILE
    }
    // Fin du if
} else {
    echo "<p align=\"center\">Il n'y a pas encore de commentaire pour ce site</p>";
}
?>
<table width="95%" border="0" align="center">
    <tr>
        <td align="left" valign="top">
            <?php
            if ($limite != 0) {
                echo "<a href=\"view_com.php?idsite=$idsite&limite=$limiteprecedente&classe=$classe&ordre=$ordre\" title=\"" . $L['precedents'] . "\"><img src=\"images/prec_comm.png\" border=\"0\" width=\"32\" height=\"32\"></a>";
            }
            ?>
        </td>
        <td valign="top" align="right">
            <?php
            if ($limitesuivante < $nb) {
                echo "<a href=\"view_com.php?idsite=$idsite&limite=$limitesuivante&classe=$classe&ordre=$ordre\" title=\"" . $L['suivants'] . "\"><img src=\"images/suite_comm.png\" border=\"0\" width=\"32\" height=\"32\"></a>";
            }
            ?>
        </td>
    </tr>
    <p align="center"><a href="add_com.php?idsite=<?php echo $idsite; ?>">Ajouter un commentaire</a></p>
</table>
</body>
</html>
