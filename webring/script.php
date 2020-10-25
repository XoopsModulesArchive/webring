<?php

/* ----------------------------------------------------------------------------
J A V A S C R I P T D ' A F F I C H A G E D U W E B R I N G
PHPMyRing (2.0) dernière modification du fichier [24-07-02]
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
    $site_nom = mysql_result($res, $i, "site_nom");
    $idsite   = mysql_result($res, $i, "idsite");
    $chemin   = $conf['adresse_site'] . "/" . $conf['dossierwr'];
    $site1    = "<a href=\"$chemin/clik.php?idsite=$idsite\" target=\"_blank\"><b>$site_nom<b></a>";
    //Valeurs d'aspect par défaut
    if (!($ap)) {
        $ap = "#FF6633";
    } else {
        $ap2 = "#";
        $ap2 .= $ap;
        $ap  = $ap2;
    }
    if (!($long)) {
        $long = 150;
    }
    if (!($police)) {
        $police = "Arial";
    }
    $nomwr = $conf['nomwr'];
    //On écrit le script JS
    echo "
document.write('<table border=\"1\" cellspacing=\"0\" cellpadding=\"0\" width=\"$long\">')
document.write('<tr><td bgcolor=\"$ap\"><div align=\"center\"><font size=\"3\" face=\"$police\"><strong>$nomwr</strong></font></div></td></tr>')
document.write('<tr><td><div align=\"center\"><font face=\"$police\">$site1<br><a href=\"$chemin/hasard.php\" target=\"_blank\">Site au hasard</a><br><a href=\"$chemin/\" target=\"_blank\">Voir la liste</a></font></div></td></tr></table>')
";
    //$GLOBALS['xoopsDB']->close();
    //On ferme la boucle else
}
