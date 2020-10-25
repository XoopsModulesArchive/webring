<?

/* ----------------------------------------------------------------------------
E N V O Y E R U N M E S S A G E
A U X M E M B R E S
- Rédaction du message -
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
    <title>PHPMyRing <? echo $conf['version']; ?> - <? echo $L['sd_msg_mb']; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <? require dirname(__DIR__) . '/include/styles.php'; ?>
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?
// VERIFICATION DE L'ACCES
if (!isset(\<?

/* ----------------------------------------------------------------------------
E N V O Y E R U N M E S S A G E
A U X M E M B R E S
- Rédaction du message -
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
    <title>PHPMyRing <? echo $conf['version']; ?> - <? echo $L['sd_msg_mb']; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <? require dirname(__DIR__) . '/include/styles.php'; ?>
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?
// VERIFICATION DE L'ACCES
if (!session_is_registered('idadm')) {
    echo $L['session_ferm'];
    exit;
} else {
    ?>
    <form method="post" action="send_msg.php">
        <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td>
                    <div align="center"><b><font face="Arial, Helvetica, sans-serif"><? echo $L['envoi_msg_ts']; ?></font></b></div>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr align="center">
                            <td colspan="2" valign="top"><font size="2" color="#9900FF" face="Arial"><b>
                                        <? if ($message) {
                                            echo $message;
                                        } ?>
                                    </b></font></td>
                        </tr>
                        <tr>
                            <td width="28%" align="left" valign="top">Envoyer le message &agrave;
                                :
                            </td>
                            <td width="72%">
                                <select name="envoyera">
                                    <option value="*" <? if ($envoyera == "*") {
                                        echo "selected";
                                    } ?>>Tous les sites
                                    </option>
                                    <option value="2" <? if ($envoyera == "2") {
                                        echo "selected";
                                    } ?>>Les sites d&eacute;sactiv&eacute;s
                                    </option>
                                    <option value="1" <? if ($envoyera == "1") {
                                        echo "selected";
                                    } ?>>Les sites actifs
                                    </option>
                                    <option value="0" <? if ($envoyera == "0") {
                                        echo "selected";
                                    } ?>>Les sites pas encore accept&eacute;s
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="28%" align="left" valign="top">
                                <? echo $L['titre_msg']; ?>
                                :
                            </td>
                            <td width="72%">
                                <input type="text" name="titre" size="40" value="<? if ($titre) {
                                    echo $titre;
                                } ?>">
                            </td>
                        </tr>
                        <tr>
                            <td width="28%" align="left" valign="top">
                                <? echo $L['corps_msg']; ?>
                                :
                            </td>
                            <td width="72%">
                                <textarea name="texte" rows="10" cols="50"><? if ($texte) {
                                        echo $texte;
                                    } ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="signature" value="1" checked>
                                <? echo $L['add_sign']; ?>
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="2">
                                <input type="submit" name="Submit" value="Envoyer">
                                <input type="reset" name="Submit2" value="R&eacute;tablir">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <? echo $L['att_clik']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
    <?
}
?>
<p align="center">
    [ <a href="JavaScript:window.close();"><? echo $L['ferm_fen']; ?></a> ]
</p>
</body>
</html>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
} else {
    ?>
    <form method="post" action="send_msg.php">
        <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td>
                    <div align="center"><b><font face="Arial, Helvetica, sans-serif"><? echo $L['envoi_msg_ts']; ?></font></b></div>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr align="center">
                            <td colspan="2" valign="top"><font size="2" color="#9900FF" face="Arial"><b>
                                        <? if ($message) {
                                            echo $message;
                                        } ?>
                                    </b></font></td>
                        </tr>
                        <tr>
                            <td width="28%" align="left" valign="top">Envoyer le message &agrave;
                                :
                            </td>
                            <td width="72%">
                                <select name="envoyera">
                                    <option value="*" <? if ($envoyera == "*") {
                                        echo "selected";
                                    } ?>>Tous les sites
                                    </option>
                                    <option value="2" <? if ($envoyera == "2") {
                                        echo "selected";
                                    } ?>>Les sites d&eacute;sactiv&eacute;s
                                    </option>
                                    <option value="1" <? if ($envoyera == "1") {
                                        echo "selected";
                                    } ?>>Les sites actifs
                                    </option>
                                    <option value="0" <? if ($envoyera == "0") {
                                        echo "selected";
                                    } ?>>Les sites pas encore accept&eacute;s
                                    </option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td width="28%" align="left" valign="top">
                                <? echo $L['titre_msg']; ?>
                                :
                            </td>
                            <td width="72%">
                                <input type="text" name="titre" size="40" value="<? if ($titre) {
                                    echo $titre;
                                } ?>">
                            </td>
                        </tr>
                        <tr>
                            <td width="28%" align="left" valign="top">
                                <? echo $L['corps_msg']; ?>
                                :
                            </td>
                            <td width="72%">
                                <textarea name="texte" rows="10" cols="50"><? if ($texte) {
                                        echo $texte;
                                    } ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <input type="checkbox" name="signature" value="1" checked>
                                <? echo $L['add_sign']; ?>
                            </td>
                        </tr>
                        <tr align="center">
                            <td colspan="2">
                                <input type="submit" name="Submit" value="Envoyer">
                                <input type="reset" name="Submit2" value="R&eacute;tablir">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <? echo $L['att_clik']; ?>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
    </form>
    <?
}
?>
<p align="center">
    [ <a href="JavaScript:window.close();"><? echo $L['ferm_fen']; ?></a> ]
</p>
</body>
</html>
