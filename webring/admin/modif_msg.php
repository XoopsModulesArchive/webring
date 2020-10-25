<?

/* ----------------------------------------------------------------------------
M O D I F CA T I O N D U M E S S A G E
D ' A C C U E I L
PHPMyRing (4.0) dernière modification du fichier [16-11-02]
---------------------------------------------------------------------------- */
session_start();
// Accès par session
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
// Configuration
//$conf=config();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <? require dirname(__DIR__) . '/include/styles.php'; ?>
    <title>PHPMyRing <? echo $conf['version']; ?> - <? echo $L['mod_msg_acc']; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?
if (isset(\<?

/* ----------------------------------------------------------------------------
M O D I F CA T I O N D U M E S S A G E
D ' A C C U E I L
PHPMyRing (4.0) dernière modification du fichier [16-11-02]
---------------------------------------------------------------------------- */
session_start();
// Accès par session
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
// Configuration
//$conf=config();
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <? require dirname(__DIR__) . '/include/styles.php'; ?>
    <title>PHPMyRing <? echo $conf['version']; ?> - <? echo $L['mod_msg_acc']; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?
if (session_is_registered('idadm')) {
    if (!$action) {
        ?>
        <form method="post" action="">
            <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td>
                        <div align="center"><b><font face="Arial, Helvetica, sans-serif"><? echo $L['msg_acc']; ?></font></b></div>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <p>
                            <input type="hidden" name="action" value="modif">
                            <textarea name="msg" cols="50" rows="10"><?
                                $fp = fopen("../include/msg.txt", "r");
                                fpassthru($fp);
                                ?></textarea>
                        </p>
                        <p>
                            <input type="submit" name="Submit" value="Ok">
                            <input type="reset" name="Submit2" value="RaZ">
                        </p>
                    </td>
                </tr>
            </table>
        </form>
        <?
    } elseif ($action == "modif") {
        // Modification du fichier
        $fp = fopen("../include/msg.txt", "w+");
        fwrite($fp, StripSlashes($msg));
        fclose($fp);
        echo $L['modif_ok'];
    }
} else {
    // login incorrect!!!!
    echo $L['session_ferm'];
}
?>
<p align="center">
    [ <a href="JavaScript:window.close();"><? echo $L['ferm_fen']; ?></a> ]
</p>
</body>
</html>
SESSION['idadm'])) {
    if (!$action) {
        ?>
        <form method="post" action="">
            <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
                <tr>
                    <td>
                        <div align="center"><b><font face="Arial, Helvetica, sans-serif"><? echo $L['msg_acc']; ?></font></b></div>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <p>
                            <input type="hidden" name="action" value="modif">
                            <textarea name="msg" cols="50" rows="10"><?
                                $fp = fopen("../include/msg.txt", "r");
                                fpassthru($fp);
                                ?></textarea>
                        </p>
                        <p>
                            <input type="submit" name="Submit" value="Ok">
                            <input type="reset" name="Submit2" value="RaZ">
                        </p>
                    </td>
                </tr>
            </table>
        </form>
        <?
    } elseif ($action == "modif") {
        // Modification du fichier
        $fp = fopen("../include/msg.txt", "w+");
        fwrite($fp, StripSlashes($msg));
        fclose($fp);
        echo $L['modif_ok'];
    }
} else {
    // login incorrect!!!!
    echo $L['session_ferm'];
}
?>
<p align="center">
    [ <a href="JavaScript:window.close();"><? echo $L['ferm_fen']; ?></a> ]
</p>
</body>
</html>
