<?php
/* ----------------------------------------------------------------------------
N A V I G A T I O N
PHPMyRing (4.0) dernière modification du fichier [04-12-02]
---------------------------------------------------------------------------- */

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <title>PHPMyRing <?php echo $conf['version'] . " - " . $L['adminis']; ?></title>
    <script type="text/javascript" src="../script.js"></script>
    <?php require dirname(__DIR__) . '/include/styles.php'; ?>
</head>
<body bgcolor="#FFFFFF" text="#000000">
<table width="400" border="0" align="center" cellspacing="0" cellpadding="0">
    <tr>
        <td>
            <div align="center"><b><font face="Arial, Helvetica, sans-serif" size="3"><?php echo $L['adminis']; ?></font></b></div>
        </td>
    </tr>
</table>
<table width="90%" border="0" align="center">
    <tr>
        <td width="9%" align="center" valign="middle"><a href="index.php" title="<?php echo $L['accueil']; ?>"><img src="../images/home_admin.png" width="48" height="48" border="0"></a></td>
        <td width="9%" align="center" valign="middle"><a href="verif.php" title="<?php echo $L['verification']; ?>"><img src="../images/verification.png" width="48" height="47" border="0"></a></td>
        <td width="9%" align="center" valign="middle"><a href="liste.php" title="<?php echo $L['liste_d_sites']; ?>"><img src="../images/liste.png" width="49" height="50" border="0"></a></td>
        <td width="9%" align="center" valign="middle"><a href="JavaScript:msg_mbres();" title="<?php echo $L['msg_mbres']; ?>"><img src="../images/message_membres.png" width="36" height="36" border="0"></a></td>
        <td width="9%" align="center" valign="middle"><a href="bug.php" title="<?php echo $L['rapp_bug']; ?>"><img src="../images/bug.png" width="36" height="36" border="0"></a></td>
        <td width="9%" align="center" valign="middle"><a href="configuration.php" title="<?php echo $L['configuration']; ?>"><img src="../images/configuration.png" width="36" height="36" border="0"></a></td>
        <td width="9%" align="center" valign="middle"><a href="ajoutadmin.php" title="<?php echo $L['ad_admin']; ?>"><img src="../images/ajout_admin.png" width="32" height="32" border="0"></a></td>
        <td width="9%" align="center" valign="middle"><a href="voirlog.php" title="Log"><img src="../images/log.png" width="36" height="36" border="0"></a></td>
        <td width="9%" align="center" valign="middle"><a href="logout.php" title="<?php echo $L['logout']; ?>"><img src="../images/logout.png" width="32" height="32" border="0"></a></td>
        <td width="9%" align="center" valign="middle" rowspan="2"><?php menu_lang("../", "$lang"); ?></td>
    </tr>
    <tr>
        <td width="9%" align="center" valign="middle"><?php echo $L['accueil']; ?></td>
        <td width="9%" align="center" valign="middle"><?php echo $L['verification']; ?></td>
        <td width="9%" align="center" valign="middle"><?php echo $L['liste_d_sites']; ?></td>
        <td width="9%" align="center" valign="middle"><?php echo $L['msg_mbres']; ?></td>
        <td width="9%" align="center" valign="middle"><?php echo $L['rapp_bug']; ?></td>
        <td width="9%" align="center" valign="middle"><?php echo $L['configuration']; ?></td>
        <td width="9%" align="center" valign="middle"><?php echo $L['ad_admin']; ?></td>
        <td width="9%" align="center" valign="middle">Log</td>
        <td width="9%" align="center" valign="middle"><?php echo $L['logout']; ?></td>
    </tr>
</table>
