<?

/* ----------------------------------------------------------------------------
S U P P R E S S I O N D ' U N S I T E
PHPMyRing (4.0) dernière modification du fichier [05-12-02]
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
// VERIFICATION DE L'ACCES
if (!isset(\<?

/* ----------------------------------------------------------------------------
S U P P R E S S I O N D ' U N S I T E
PHPMyRing (4.0) dernière modification du fichier [05-12-02]
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
require __DIR__ . '/haut.php';
// Connexion
connecte();
// On récupère les sites à supprimer (s'il y en a plusieurs)
for ($i = 0; $i < count($idsite); $i++) {
    // Requète
    $res      = requete("SELECT site_nom, email,webmaster FROM webring WHERE idsite='$idsite[$i]'");
    $row      = $GLOBALS['xoopsDB']->fetchBoth($res);
    $site_nom = $row['site_nom'];
    if (requete("DELETE FROM webring WHERE idsite='$idsite[$i]'")) {
        addinlog("../", "Suppression du site $idsite[$i] ($site_nom) par $nomadm", "OK");
        // Bon, on va prévenir le webmaster
        // Configuration
        //$conf=config();
        $TYPE = StripSlashes($conf['type']);
        if ($objet == 1) {
            // Décision du webmaster... (ben oui !)
            $body = StripSlashes($conf['msg_supp_decision']);
        } elseif ($objet == 2) {
            // Pas de script du webring
            $body = StripSlashes($conf['msg_supp_script']);
        }
        $email = $row['email'];
        $NOM   = StripSlashes($conf['nomwr']);
        courrier(recupemail(), $email, "[$NOM] " . $L['objet_supp'], resolve($idsite[$i], $body));
        echo "<p align=\"center\">" . $L['site_num_sup1'] . "$idsite[$i] ($site_nom) " . $L['site_num_sup2'] . "</p>";
        ////$GLOBALS['xoopsDB']->close();
    } else {
        addinlog("../", "Suppression du site $idsite[$i] ($site_nom) par $nomadm", "ERREUR");
        echo "<p align=\"center\">" . $L['erreur_suppression'] . " $idsite[$i] ($site_nom))</p>";
    }
    // Fin du for
}
//
require __DIR__ . '/bas.php';
?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
}
require __DIR__ . '/haut.php';
// Connexion
connecte();
// On récupère les sites à supprimer (s'il y en a plusieurs)
for ($i = 0; $i < count($idsite); $i++) {
    // Requète
    $res      = requete("SELECT site_nom, email,webmaster FROM webring WHERE idsite='$idsite[$i]'");
    $row      = $GLOBALS['xoopsDB']->fetchBoth($res);
    $site_nom = $row['site_nom'];
    if (requete("DELETE FROM webring WHERE idsite='$idsite[$i]'")) {
        addinlog("../", "Suppression du site $idsite[$i] ($site_nom) par $nomadm", "OK");
        // Bon, on va prévenir le webmaster
        // Configuration
        //$conf=config();
        $TYPE = StripSlashes($conf['type']);
        if ($objet == 1) {
            // Décision du webmaster... (ben oui !)
            $body = StripSlashes($conf['msg_supp_decision']);
        } elseif ($objet == 2) {
            // Pas de script du webring
            $body = StripSlashes($conf['msg_supp_script']);
        }
        $email = $row['email'];
        $NOM   = StripSlashes($conf['nomwr']);
        courrier(recupemail(), $email, "[$NOM] " . $L['objet_supp'], resolve($idsite[$i], $body));
        echo "<p align=\"center\">" . $L['site_num_sup1'] . "$idsite[$i] ($site_nom) " . $L['site_num_sup2'] . "</p>";
        ////$GLOBALS['xoopsDB']->close();
    } else {
        addinlog("../", "Suppression du site $idsite[$i] ($site_nom) par $nomadm", "ERREUR");
        echo "<p align=\"center\">" . $L['erreur_suppression'] . " $idsite[$i] ($site_nom))</p>";
    }
    // Fin du for
}
//
require __DIR__ . '/bas.php';
?>
