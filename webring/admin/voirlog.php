<?

/* ----------------------------------------------------------------------------
V I S U A L I S A T I O N D U F I C H I E R L O G
PHPMyRing (4.0) dernière modification du fichier [16-12-02]
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
if (!isset(\<?

/* ----------------------------------------------------------------------------
V I S U A L I S A T I O N D U F I C H I E R L O G
PHPMyRing (4.0) dernière modification du fichier [16-12-02]
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
if (!session_is_registered('idadm')) {
    echo $L['session_ferm'];
    exit;
}
require __DIR__ . '/haut.php';
if ($action == "vider") {
    if ($fp = fopen("../include/log", "w+")) {
        fclose($fp);
        addinlog("../", "Vidange du fichier LOG", "OK");
    } else {
        addinlog("../", "Vidange du fichier LOG", "ERREUR");
    }
}
?>
    <table border="0" align="center">
        <tr>
            <td align="center" valign="middle" class="haut_table_liste_ad">
                <? echo $L['voici_log']; ?>
            </td>
        </tr>
        <tr>
            <td align="left" valign="top" class="table_liste">
                <font face="Courier"><? readfile("../include/log"); ?></font>
            </td>
        </tr>
    </table>
    <p align="center">
        <a href="<? echo $PHP_SELF; ?>?action=vider" title="Log"><? echo $L['vider_log']; ?></a>
    </p>
<? require __DIR__ . '/bas.php'; ?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
}
require __DIR__ . '/haut.php';
if ($action == "vider") {
    if ($fp = fopen("../include/log", "w+")) {
        fclose($fp);
        addinlog("../", "Vidange du fichier LOG", "OK");
    } else {
        addinlog("../", "Vidange du fichier LOG", "ERREUR");
    }
}
?>
    <table border="0" align="center">
        <tr>
            <td align="center" valign="middle" class="haut_table_liste_ad">
                <? echo $L['voici_log']; ?>
            </td>
        </tr>
        <tr>
            <td align="left" valign="top" class="table_liste">
                <font face="Courier"><? readfile("../include/log"); ?></font>
            </td>
        </tr>
    </table>
    <p align="center">
        <a href="<? echo $PHP_SELF; ?>?action=vider" title="Log"><? echo $L['vider_log']; ?></a>
    </p>
<? require __DIR__ . '/bas.php'; ?>
