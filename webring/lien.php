<?php

/* ----------------------------------------------------------------------------
J A V A S C R I P T D ' A F F I C H A G E D U W E B R I N G
PHPMyRing (4.0) dernière modification du fichier [06-12-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
$conf = config();
InsertLang('', $conf['lang']);
if (empty($de)) {
    echo "document.write('<b>" . $L['erreur_code'] . "<b>')";
} else {
    // On selectionne tout ce qu'il y a dans la table
    $conn = connecte();
    $res  = requete("SELECT * FROM webring WHERE accept='1' and idsite!='$de'");
    $nb   = $GLOBALS['xoopsDB']->getRowsNum($res);
    // Détermintaion du site à afficher complètement
    $x = $nb - 1;
    srand((double)microtime() * 1000000);
    $i        = rand(0, $x);
    $site_nom = AddSlashes(mysql_result($res, $i, "site_nom"));
    $idsite   = mysql_result($res, $i, "idsite");
    $lien     = $conf['adresse_site'] . "/" . $conf['dossierwr'];
    $site1    = "<a href=\"$lien/clik.php?idsite=$idsite\" target=\"_blank\"><b>$site_nom<b></a>";
    //On écrit le script JS
    echo "document.write('$site1')";
    //On ferme la boucle else
}
