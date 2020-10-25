<?php
/* ----------------------------------------------------------------------------
N A V I G A T I O N
PHPMyRing (3.0) dernière modification du fichier [04-12-02]
---------------------------------------------------------------------------- */

?>
<!-- haut2 -->
<table width="90%" border="0" align="center">
    <tr>
        <td width="20%" align="center" valign="middle">
            <a href="index.php" title="<?php echo $L['liste']; ?>">
                <img src="images/listes_sites.png" border="0" alt="<?php echo $L['liste']; ?>" width="36" height="36">
            </a>
        </td>
        <td width="20%" align="center" valign="middle">
            <a href="inscription.php" title="<?php echo $L['inscription']; ?>">
                <img src="images/inscription.png" border="0" width="32" height="32" alt="<?php echo $L['inscription']; ?>">
            </a>
        </td>
        <td width="20%" align="center" valign="middle">
            <a href="admin.php" title="<?php echo $L['administration']; ?>">
                <img src="images/administration.png" border="0" alt="<?php echo $L['administration']; ?>" width="52" height="52">
            </a>
        </td>
        <td width="20%" align="center" valign="middle">
            <a href="hasard.php" title="<?php echo $L['site_has']; ?>" target="_blank">
                <img src="images/hasard.png" border="0" alt="<?php echo $L['site_has']; ?>" width="36" height="36">
            </a>
        </td>
        <td width="20%" align="center" valign="middle">
            <?php
            menu_lang("", $lang);
            ?>
        </td>
    </tr>
    <tr>
        <td width="20%" align="center" valign="middle"><?php echo $L['liste']; ?></td>
        <td width="20%" align="center" valign="middle"><?php echo $L['inscription']; ?></td>
        <td width="20%" align="center" valign="middle"><?php echo $L['administration']; ?></td>
        <td width="20%" align="center" valign="middle"><?php echo $L['site_has']; ?></td>
        <td width="20%" align="center" valign="middle">&nbsp;</td>
    </tr>
</table>
<br>
<!-- Fin haut2 -->
