<?

/* ----------------------------------------------------------------------------
M O D I F I C A T I O N S D' I N F O S
PHPMyRing (4.0) dernière modification du fichier [05-10-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
InsertLang('', $conf['lang']);
session_start();
if (!isset(\<?

/* ----------------------------------------------------------------------------
M O D I F I C A T I O N S D' I N F O S
PHPMyRing (4.0) dernière modification du fichier [05-10-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
InsertLang('', $conf['lang']);
session_start();
if (!session_is_registered('idsite')) {
    echo "<p align='center'>" . $L['session_ferm'] . "</p>";
    include "formauth.php";
    exit;
}
// Nous allons tester au fur et à mesure les champs renseignés...
// La description
if (!$description) {
    header("Location:admin.php?mess=" . $L['desc_vide']);
    exit;
} // La page contenant le webring
elseif (!$page) {
    header("Location:admin.php?mess=" . $L['page_wr']);
    exit;
} elseif (!is_url($page)) {
    header("Location:admin.php?mess=" . $L['page_wr']);
    exit;
} // Le nom
elseif (!$webmaster) {
    $mess = $L['nom'];
    header("Location:admin.php?mess=$mess");
    exit;
} // L'email
elseif (!$email) {
    header("Location:admin.php?mess=" . $L['email_vide']);
    exit;
} elseif (!is_email($email)) {
    header("Location:admin.php?mess=" . $L['email_inc']);
    exit;
} else {
    $description = AddSlashes(nl2br(htmlentities($description)));
    // maintenant, on va mettre à jour...
    connecte();
    if (requete(
        "UPDATE webring " . "SET description='$description', " . "email='$email', " . "page='$page', " . "webmaster='$webmaster' " . "WHERE idsite='$idsite'"
    )) {
        header("Location:admin.php?mess=" . $L['maj_ok']);
    } else {
        header("Location: admin.php?mess=" . $L['maj_err']);
    }
}
?>
SESSION['idsite'])) {
    echo "<p align='center'>" . $L['session_ferm'] . "</p>";
    include "formauth.php";
    exit;
}
// Nous allons tester au fur et à mesure les champs renseignés...
// La description
if (!$description) {
    header("Location:admin.php?mess=" . $L['desc_vide']);
    exit;
} // La page contenant le webring
elseif (!$page) {
    header("Location:admin.php?mess=" . $L['page_wr']);
    exit;
} elseif (!is_url($page)) {
    header("Location:admin.php?mess=" . $L['page_wr']);
    exit;
} // Le nom
elseif (!$webmaster) {
    $mess = $L['nom'];
    header("Location:admin.php?mess=$mess");
    exit;
} // L'email
elseif (!$email) {
    header("Location:admin.php?mess=" . $L['email_vide']);
    exit;
} elseif (!is_email($email)) {
    header("Location:admin.php?mess=" . $L['email_inc']);
    exit;
} else {
    $description = AddSlashes(nl2br(htmlentities($description)));
    // maintenant, on va mettre à jour...
    connecte();
    if (requete(
        "UPDATE webring " . "SET description='$description', " . "email='$email', " . "page='$page', " . "webmaster='$webmaster' " . "WHERE idsite='$idsite'"
    )) {
        header("Location:admin.php?mess=" . $L['maj_ok']);
    } else {
        header("Location: admin.php?mess=" . $L['maj_err']);
    }
}
?>
