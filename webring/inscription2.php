<?php

/* ----------------------------------------------------------------------------
I N S C R I P T I O N D ' U N N O U V E A U M E M B R E
PHPMyRing (4.0) dernière modification du fichier [20-12-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/fonctions.php';
require __DIR__ . '/include/config.php';
$conf = config();
InsertLang('', $conf['lang']);
require __DIR__ . '/tete.php';
require __DIR__ . '/haut2.php';
// Vérification que tous les champs sont remplis
$erreur = 0;
$quoi   = "<p align=\"center\"><font size=\"3\" color=\"#FF0000\" face=\"Arial\"><b>" . ucfirst($L['erreur']) . " !</b></font></p>
<p>" . $L['chps_pb'] . " :</p>
<ul>";
if ($site_nom == "") {
    $erreur = 1;
    $quoi   .= "<li>" . $L['sitenom_vide'] . "</li>";
}
if ($url == "") {
    $erreur = 1;
    $quoi   .= "<li>" . $L['url_vide'] . "</li>";
}
if (!is_url($url)) {
    $erreur = 1;
    $quoi   .= "<li>" . $L['url_inc'] . "</li>";
}
if ($description == "") {
    $erreur = 1;
    $quoi   .= "<li>" . $L['desc_vide'] . "</li>";
}
if ($webmaster == "") {
    $erreur = 1;
    $quoi   .= "<li>" . $L['webm_vide'] . "</li>";
}
if ($email == "") {
    $erreur = 1;
    $quoi   .= "<li>" . $L['email_vide'] . "</li>";
}
if (!is_email($email)) {
    $erreur = 1;
    $quoi   .= "<li>" . $L['email_inc'] . "</li>";
}
if ($pseudo == "") {
    $erreur = 1;
    $quoi   .= "<li>" . $L['pseudo_vide'] . "</li>";
}
if ($mdp == "") {
    $erreur = 1;
    $quoi   .= "<li>" . $L['mdp_vide'] . "</li>";
}
if ($mdp != $mdp2) {
    $erreur = 1;
    $quoi   .= "<li>" . $L['mdp_dif'] . "</li>";
}
if ($erreur == 0) {
    // Pas encore d'erreur ?
    // Bouge pas, on va en trouver !
    // Vérification que le site n'a pas déjà été inscrit...
    $quoi = "<p align=\"center\"><font size=\"3\" color=\"#FF0000\" face=\"Arial\"><b>" . ucfirst($L['erreur']) . " !</b></font></p>
<p>" . $L['chps_pb'] . " :</p>
<ul>";
    $conn = connecte();
    // Par son nom...
    $res = requete("SELECT idsite FROM webring WHERE site_nom='$site_nom'");
    $nb1 = $GLOBALS['xoopsDB']->getRowsNum($res);
    // Par son URL
    $res = requete("SELECT idsite FROM webring WHERE url='$url'");
    $nb2 = $GLOBALS['xoopsDB']->getRowsNum($res);
    // Par l'email de son webmaster
    $res = requete("SELECT idsite FROM webring WHERE email='$email'");
    $nb3 = $GLOBALS['xoopsDB']->getRowsNum($res);
    // Par son pseudo
    $res = requete("SELECT idsite FROM webring WHERE pseudo='$pseudo'");
    $nb4 = $GLOBALS['xoopsDB']->getRowsNum($res);
    // fermeture de MySQL
    //$GLOBALS['xoopsDB']->close();
    if ($nb1 != 0) {
        $erreur = 1;
        $quoi   .= "<li>" . $L['sitenom_deja'] . "</li>";
    }
    if ($nb2 != 0) {
        $erreur = 1;
        $quoi   .= "<li>" . $L['url_deja'] . "</li>";
    }
    if ($nb4 != 0) {
        $erreur = 1;
        $quoi   .= "<li>" . $L['pseudo_deja'] . "</li>";
    }
    if ($nb3 != 0) {
        $erreur = 1;
        $quoi   .= "<li>" . $L['email_deja'] . "</li>";
    }
}
if ($erreur != 0) {
    $quoi .= "</ul><br><div align=\"center\">.: <a href=\"javascript:history.go(-1)\">" . $L['corriger'] . "</a> :.</div><br></p>";
    echo $quoi;
} else {
    // Tout est correct
    // Conversion en HTML du champ description
    $description_ = AddSlashes(nl2br(htmlentities($description)));
    //Mise en slashes
    $site_nom  = AddSlashes($site_nom);
    $webmaster = AddSlashes($webmaster);
    // Ajout dasn la base
    $conn = connecte();
    if ($res = requete(
        "INSERT INTO webring " . "(idsite,site_nom,url,description,webmaster,email,pseudo,mdp,date) " . "VALUES('','$site_nom','$url','$description_','$webmaster','$email','$pseudo','$mdp',NOW())"
    )) {
        $idsite = $GLOBALS['xoopsDB']->getInsertId();
        // Envoi d'emails
        // Les antislashes
        $site_nom    = stripslashes($site_nom);
        $description = stripslashes($description);
        // ADMINISTRATEUR
        $lien  = $conf['adresse_site'] . "/" . $conf['dossierwr'] . "/admin/";
        $nom   = StripSlashes($conf['nomwr']);
        $sujet = $L['demande_inscription'];
        $corps = ucfirst($L['salut']) . "!
$webmaster ($email) " . $L['a_dem_ins'] . "
-------------------------------------------
- " . ucfirst($L['sitenom']) . " : $site_nom
- URL : $url
- " . ucfirst($L['description']) . " : $description
-------------------------------------------
" . $L['acc_refus'] . " : $lien";
        addinlog("", "Inscription du site $site_nom (N° $idsite)", "OK");
        courrier("$email", recupemail(), "[$nom] $sujet", $corps);
        // Webmaster du site
        $body = StripSlashes($conf['msg_insc']);
        courrier(
            recupemail(),
            "$email",
            "[$nom] " . $L['demande_enr'],
            resolve($idsite, $body)
        );
        echo "<p align=\"center\">" . $L['msg_conf_ins1'] . " " . $webmaster . " " . $L['msg_conf_ins2'] . " " . $email . "</p>";
    } else {
        addinlog("", "Inscription du site $site_nom (N° $idsite)", "ERREUR");
    }
}
require __DIR__ . '/pied.php';
