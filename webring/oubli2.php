<?php

/* ----------------------------------------------------------------------------
E N V O I M O T D E P A S S E P A R M A I L
PHPMyRing (4.0) dernière modification du fichier [06-12-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
$conf = config();
InsertLang('', $conf['lang']);
// Connexion
$conn = connecte();
$res  = requete("SELECT webmaster,email,mdp,pseudo,idsite FROM webring WHERE email='$email_oubli'");
$nb   = $GLOBALS['xoopsDB']->getRowsNum($res);
if ($nb == 1) {
    $row       = $GLOBALS['xoopsDB']->fetchBoth($res);
    $webmaster = $row['webmaster'];
    $email     = $row['email'];
    $mdp       = $row['mdp'];
    $pseudo    = $row['pseudo'];
    // Bien, on a tout récupérer, on envoie le mail!
    $nom  = $conf['nomwr'];
    $lien = $conf['adresse_site'] . "/" . $conf['dossierwr'];
    $sign = $conf['signature'];
    courrier(
        recupemail(),
        $email,
        "[$nom] " . $L['vos_ident'],
        resolve($row['idsite'], $conf['rappel_ident'])
    );
    echo "<p align=\"center\"><font face=\"Arial\" size=\"2\">" . $L['mail_env'] . " !</font></p>";
} else {
    echo "<p align=\"center\"><font face=\"Arial\" size=\"2\">" . $L['mail_err_env'] . " !</font></p>";
}
