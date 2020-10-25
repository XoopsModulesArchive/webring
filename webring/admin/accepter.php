<?
/* ----------------------------------------------------------------------------
A C C E P T E R U N E I N S C R I P T I O N
PHPMyRing (4.0) dernière modification du fichier [16-12-02]
---------------------------------------------------------------------------- */

// VERIFICATION DE L'ACCES
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
if (!isset(\<?
/* ----------------------------------------------------------------------------
A C C E P T E R U N E I N S C R I P T I O N
PHPMyRing (4.0) dernière modification du fichier [16-12-02]
---------------------------------------------------------------------------- */

// VERIFICATION DE L'ACCES
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
if (!session_is_registered('idadm')) {
    echo $L['session_ferm'];
    exit;
}
require __DIR__ . '/haut.php';
$conn = connecte();
if ($direct == 1) {
    $rqt = "UPDATE webring SET accept='1', date=NOW() WHERE idsite='$idsite'";
} else {
    $rqt = "UPDATE webring SET url='$url', description='$description', accept='1', date=NOW() WHERE idsite='$idsite'";
}
requete($rqt);
// Nous allons envoyer un email au webmaster...
// On va chercher quelques trucs...
if ($res = requete("SELECT email,webmaster,site_nom,pseudo,mdp FROM webring WHERE idsite='$idsite'")) {
    // Ajout dans le log
    addinlog("../", "Site N° $idsite accepté par $nomadm", "OK");
} else {
    // Ajout dans le log
    addinlog("../", "Site N° $idsite accepté par $nomadm", "ERREUR");
}
$row = $GLOBALS['xoopsDB']->fetchBoth($res);
//$GLOBALS['xoopsDB']->close();
$webmaster = $row['webmaster'];
$site_nom  = $row['site_nom'];
$pseudo    = $row['pseudo'];
$mdp       = $row['mdp'];
// Configuration
//$conf=config();
$NOM = StripSlashes($conf['nomwr']);
// Création du corps du message
$body = StripSlashes($conf['msg_acc']);
courrier(
    recupemail(),
    $row['email'],
    "[$NOM] " . $L['sujet_accept'],
    resolve($idsite, StripSlashes($conf['msg_acc']))
);
echo "<p align=\"center\">" . $L['site_num_accept1'] . $idsite . $L['site_num_accept2'] . "
<br \><a href=\"index.php\">" . ucfirst($L_retour) . "</a></p>";
require __DIR__ . '/bas.php';
?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
}
require __DIR__ . '/haut.php';
$conn = connecte();
if ($direct == 1) {
    $rqt = "UPDATE webring SET accept='1', date=NOW() WHERE idsite='$idsite'";
} else {
    $rqt = "UPDATE webring SET url='$url', description='$description', accept='1', date=NOW() WHERE idsite='$idsite'";
}
requete($rqt);
// Nous allons envoyer un email au webmaster...
// On va chercher quelques trucs...
if ($res = requete("SELECT email,webmaster,site_nom,pseudo,mdp FROM webring WHERE idsite='$idsite'")) {
    // Ajout dans le log
    addinlog("../", "Site N° $idsite accepté par $nomadm", "OK");
} else {
    // Ajout dans le log
    addinlog("../", "Site N° $idsite accepté par $nomadm", "ERREUR");
}
$row = $GLOBALS['xoopsDB']->fetchBoth($res);
//$GLOBALS['xoopsDB']->close();
$webmaster = $row['webmaster'];
$site_nom  = $row['site_nom'];
$pseudo    = $row['pseudo'];
$mdp       = $row['mdp'];
// Configuration
//$conf=config();
$NOM = StripSlashes($conf['nomwr']);
// Création du corps du message
$body = StripSlashes($conf['msg_acc']);
courrier(
    recupemail(),
    $row['email'],
    "[$NOM] " . $L['sujet_accept'],
    resolve($idsite, StripSlashes($conf['msg_acc']))
);
echo "<p align=\"center\">" . $L['site_num_accept1'] . $idsite . $L['site_num_accept2'] . "
<br \><a href=\"index.php\">" . ucfirst($L_retour) . "</a></p>";
require __DIR__ . '/bas.php';
?>
