<?php

/* ----------------------------------------------------------------------------
V O I R U N S I T E A U H A S A R D
PHPMyRing (4.0) dernière modification du fichier [15-12-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
connecte();
// On selectionne tout ce qu'il y a dans la table
$res = requete("SELECT * FROM webring WHERE accept='1'");
if ($nb = $GLOBALS['xoopsDB']->getRowsNum($res)) {
    $x = $nb - 1;
    srand((double)microtime() * 1000000);
    $i   = rand(0, $x);
    $url = "clik.php?idsite=";
    $url .= mysql_result($res, $i, "idsite");
    header("Location: $url");
} else {
    echo "Il n'y a aucun site inscrit pour le momment.";
}
