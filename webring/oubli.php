<?php

/* ----------------------------------------------------------------------------
F O R M U L A I R E D E S A I S I D E L ' E M A I L
P O U R R E C E V O I R L E M O T D E P A S S E
PHPMyRing (3.0) dernière modification du fichier [06-10-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
InsertLang('', $conf['lang']);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title><?php echo $L['env_mdp']; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <?php require __DIR__ . '/include/styles.php'; ?>
</head>
<body bgcolor="#FFFFFF" text="#000000">
<p align="center"><?php echo $L['oubli_mdp']; ?><br>
    <?php echo $L['ind_email']; ?> :</p>
<form name="oubli" method="post" action="oubli2.php">
    <div align="center">
        <input type="text" name="email_oubli" size="20">
        <input type="submit" value="Go !">
    </div>
</form>
<script language="JavaScript">
    document.oubli.email_oubli.focus();
</script>
</body>
</html>
