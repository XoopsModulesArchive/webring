<?
/* ----------------------------------------------------------------------------
M O D I F I E R L A P A G E D U W E B R I N G
PHPMyRing (4.0) dernière modification du fichier [19-12-02]
---------------------------------------------------------------------------- */

// VERIFICATION DE L'ACCES
session_start();
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
InsertLang('', $conf['lang']);
if (!isset(\<?
/* ----------------------------------------------------------------------------
M O D I F I E R L A P A G E D U W E B R I N G
PHPMyRing (4.0) dernière modification du fichier [19-12-02]
---------------------------------------------------------------------------- */

// VERIFICATION DE L'ACCES
session_start();
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
InsertLang('', $conf['lang']);
if (!session_is_registered('idsite')) {
    echo "<p align='center'>" . $L['session_ferm'] . "</p>";
    include "formauth.php";
    exit;
}
if (!$page) {
    header("location:admin.php?alert=" . $L['page_null']);
    exit;
}
// La page envoyée est elle une url ???
if (!is_url($page)) {
    header("location:admin.php?alert=" . $L['page_invalide']);
    exit;
}
// ON va vérifier que la page envoyée est différente....
connecte();
$res = requete("SELECT page FROM webring WHERE idsite='$idsite'");
$row = $GLOBALS['xoopsDB']->fetchBoth($res);
if ($row['page'] == $page) {
    header("location:admin.php?alert=" . $L['page_connue']);
    exit;
}
requete("UPDATE webring SET page='$page' WHERE idsite='$idsite'");
header("location:admin.php?alert=" . $L['page_maj'] . "&fait=ok");
?>
SESSION['idsite'])) {
    echo "<p align='center'>" . $L['session_ferm'] . "</p>";
    include "formauth.php";
    exit;
}
if (!$page) {
    header("location:admin.php?alert=" . $L['page_null']);
    exit;
}
// La page envoyée est elle une url ???
if (!is_url($page)) {
    header("location:admin.php?alert=" . $L['page_invalide']);
    exit;
}
// ON va vérifier que la page envoyée est différente....
connecte();
$res = requete("SELECT page FROM webring WHERE idsite='$idsite'");
$row = $GLOBALS['xoopsDB']->fetchBoth($res);
if ($row['page'] == $page) {
    header("location:admin.php?alert=" . $L['page_connue']);
    exit;
}
requete("UPDATE webring SET page='$page' WHERE idsite='$idsite'");
header("location:admin.php?alert=" . $L['page_maj'] . "&fait=ok");
?>
