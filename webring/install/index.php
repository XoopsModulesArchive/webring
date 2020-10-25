<?php

/* ----------------------------------------------------------------------------
I N S T A L L A T I O N
- Blablateries... -
PHPMyRing (4.0) dernière modification du fichier [17-12-02]
---------------------------------------------------------------------------- */
$VEC = "4.0.2";
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
// Le français est la langue par défaut (et oui ;)
if (!isset($LANGINS)) {
    $LANGINS = "en";
}
require "../lang/" . $LANGINS . ".php";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
    <title><?php echo $L['titre'] . " " . $VEC; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <style type="text/css">
        <!--
        body {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 10px;
            font-style: normal;
            line-height: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            color: #000066
        }

        table {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 10px;
            font-style: normal;
            line-height: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            color: #000066
        }

        -->
    </style>
</head>
<body bgcolor="#FFFFFF" text="#000000">
<p align="center">
    <font face="Arial, Helvetica, sans-serif" size="3" color="#000066">
        <b>- <?php echo $L['titre'] . " " . $VEC; ?> -</b>
    </font></p>
<hr width="200" size="1">
<p align="center">
    <font face="Arial, Helvetica, sans-serif" size="3">
        <?php echo $L['bienvenue_installation'] . " " . $VEC; ?>!
    </font>
</p>
<p><?php echo $L['attention_devel']; ?></p>
<form method="post" action="<?php echo $PHP_SELF; ?>" name="form_lang">
    <?php echo $L['choix_langue']; ?> :
    <?php // Analyse du fichier /lang/langs
    if ($fp = fopen("../lang/langs", "r")) {
        echo "<select name=\"LANGINS\" onChange=\"document.form_lang.submit();\">
";
        while (($fp) and (!feof($fp))) {
            $row = fgetcsv($fp, 200, ";");
            if (!$row) {
                break;
            }
            $lang   = $row[0];
            $langue = htmlspecialchars($row[1]);
            if ($lang == $LANGINS) {
                $selected = "selected";
            }
            echo " <option value=\"$lang\" $selected>$langue</option>
";
            $selected = "";
        }
        echo "</select> ";
        fclose($fp);
    } else {
        echo "Aucune langue install&eacute;e!";
    }
    ?>
    </select>
</form>
<?php
if (!$base) {
        ?>
    <p align="center">
        <?php echo $L['pas_configure']; ?>
    </p>
    <?php
    } else {
        echo $L['message1']; ?>
    <p align="center">
        <a href="installation.php?LANGINS=<?php echo $LANGINS; ?>">
            <?php echo $L['installation']; ?>
        </a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ou&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="miseajour.php?LANGINS=<?php echo $LANGINS; ?>">
            <?php echo $L['maj']; ?>
        </a>
    </p>
    <?php
    }
?>
<hr>
<?php echo $L['message2']; ?>
<p align="center">
    <a href="http://www.microniko.net/phpmyring" title="PHP My Ring <?php echo $VEC; ?>">
        <img src="../images/phpmyring.png" width="145" height="53" border="0" alt="PHPMyRing <?php echo $VEC; ?>">
    </a>
</p>
</body>
</html>
