<?php

/* ----------------------------------------------------------------------------
C O M P T A G E D E S C L I C K S
PHPMyRing (4.0) dernière modification du fichier [06-12-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
// Connexion
connecte();
# # #
# Gestion des cookies...
# # #
/*
// Vérification de la présence d'un cookie....
if ($HTTP_COOKIE_VARS['PHPMYRING_visite']==$idsite)
{
// On ajoute pas le de visite au site...
echo "On ajoute pas";
*/
// On ajoute une visite...
requete("UPDATE webring SET visites=visites+1 WHERE idsite='$idsite'");
// ON va chercher l'URL
$res = requete("SELECT url FROM webring WHERE idsite='$idsite'");
$row = $GLOBALS['xoopsDB']->fetchBoth($res);
$url = "Location: ";
$url .= $row['url'];
// Redirection
header($url);
