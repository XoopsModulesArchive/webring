<?

/* ---------------------------------------------------------------------------- 
V E R I F I C A T I O N P R E S E N C E D U S C R I P T 
> Modification état du site < 
PHPMyRing (3.0) dernière modification du fichier [13-10-02] 
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
// VERIFICATION DE L'ACCES 
if (!isset(\<?

/* ---------------------------------------------------------------------------- 
V E R I F I C A T I O N P R E S E N C E D U S C R I P T 
> Modification état du site < 
PHPMyRing (3.0) dernière modification du fichier [13-10-02] 
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
// On va chercher le mail ça va peut etre nous servir... 
$conn  = connecte();
$rqt   = "SELECT email FROM webring WHERE idsite='$idsite'";
$res   = requete($rqt);
$row   = $GLOBALS['xoopsDB']->fetchBoth($res);
$email = $row['email'];
//$GLOBALS['xoopsDB']->close(); 
// Configuration 
//$conf=config(); 
// Si etat = actif ==> On active le site 
if ($etat == "actif") {
    $conn = connecte();
    $rqt  = "UPDATE webring SET accept='1' WHERE idsite='$idsite'";
    requete($rqt);
    //$GLOBALS['xoopsDB']->close();
    // Il est inutile de prévenir le webmaster ==>
    $prevenir = 0;
    // Message pour dire ce que l'on a fait !
    $message = $L['site_num_sup1'] . " " . "$idsite " . $L['activ'] . "!";
} // Si etat = desactif ==> On désactive le site !
elseif ($etat == "desactif") {
    $conn = connecte();
    $rqt  = "UPDATE webring SET accept='2' WHERE idsite='$idsite'";
    requete($rqt);
    //$GLOBALS['xoopsDB']->close();
    // Message au webmaster
    $body = StripSlashes($conf['msg_desac']);
    // Message pour dire ce que l'on a fait !
    $message = $L['site_num_sup1'] . " " . $idsite . " " . $L['desactiv'] . " !";
} // Si etat = supprimer ==> On désactive le site !
elseif ($etat == "supp") {
    $conn = connecte();
    $rqt  = "DELETE FROM webring WHERE idsite='$idsite'";
    requete($rqt);
    //$GLOBALS['xoopsDB']->close();
    // Message au webmaster
    $body = StripSlashes($conf['msg_supp_script']);
    // Message pour dire ce que l'on a fait !
    $message = $L['site_num_sup1'] . " " . $idsite . " " . $L['site_num_sup2'] . " !";
} // Si etat = laisser ==> On touche à rien
elseif ($etat == "laisser") {
    // Inutile de prévenir le webmaster !
    $prevenir = 0;
    // Message pour dire ce que l'on a fait !
    $message = $L['do_nothing'];
}
// voilà, on va maitenant envoyé un courrier au webmaster... 
if ($prevenir == 1) {
    courrier(recupemail(), $email, "[" . StripSlashes($conf['nomwr']) . "] " . $L['msg_imp'] . "!", resolve($idsite, $body));
    $message .= $L['web_prev'];
}
$url = "Location: verif.php?message=$message";
// voilà, c'est bon, on retourne d'où kon vient : 
header($url);
?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
}
// On va chercher le mail ça va peut etre nous servir... 
$conn  = connecte();
$rqt   = "SELECT email FROM webring WHERE idsite='$idsite'";
$res   = requete($rqt);
$row   = $GLOBALS['xoopsDB']->fetchBoth($res);
$email = $row['email'];
//$GLOBALS['xoopsDB']->close(); 
// Configuration 
//$conf=config(); 
// Si etat = actif ==> On active le site 
if ($etat == "actif") {
    $conn = connecte();
    $rqt  = "UPDATE webring SET accept='1' WHERE idsite='$idsite'";
    requete($rqt);
    //$GLOBALS['xoopsDB']->close();
    // Il est inutile de prévenir le webmaster ==>
    $prevenir = 0;
    // Message pour dire ce que l'on a fait !
    $message = $L['site_num_sup1'] . " " . "$idsite " . $L['activ'] . "!";
} // Si etat = desactif ==> On désactive le site !
elseif ($etat == "desactif") {
    $conn = connecte();
    $rqt  = "UPDATE webring SET accept='2' WHERE idsite='$idsite'";
    requete($rqt);
    //$GLOBALS['xoopsDB']->close();
    // Message au webmaster
    $body = StripSlashes($conf['msg_desac']);
    // Message pour dire ce que l'on a fait !
    $message = $L['site_num_sup1'] . " " . $idsite . " " . $L['desactiv'] . " !";
} // Si etat = supprimer ==> On désactive le site !
elseif ($etat == "supp") {
    $conn = connecte();
    $rqt  = "DELETE FROM webring WHERE idsite='$idsite'";
    requete($rqt);
    //$GLOBALS['xoopsDB']->close();
    // Message au webmaster
    $body = StripSlashes($conf['msg_supp_script']);
    // Message pour dire ce que l'on a fait !
    $message = $L['site_num_sup1'] . " " . $idsite . " " . $L['site_num_sup2'] . " !";
} // Si etat = laisser ==> On touche à rien
elseif ($etat == "laisser") {
    // Inutile de prévenir le webmaster !
    $prevenir = 0;
    // Message pour dire ce que l'on a fait !
    $message = $L['do_nothing'];
}
// voilà, on va maitenant envoyé un courrier au webmaster... 
if ($prevenir == 1) {
    courrier(recupemail(), $email, "[" . StripSlashes($conf['nomwr']) . "] " . $L['msg_imp'] . "!", resolve($idsite, $body));
    $message .= $L['web_prev'];
}
$url = "Location: verif.php?message=$message";
// voilà, c'est bon, on retourne d'où kon vient : 
header($url);
?>
