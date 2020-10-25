<?php
/* ----------------------------------------------------------------------------
I N S T A L L A T I O N
- Formulaire d'identification -
PHPMyRing (4.0) dernière modification du fichier [17-12-02]
---------------------------------------------------------------------------- */

?>
<form name="" method="post" action="configuration.php">
    <input type="hidden" name="LANGINS" value="<?php echo $LANGINS; ?>">
    <?php if ($maj == 1) {
    echo "<input type=\"hidden\" name=\"maj\" value=\"$maj\">";
} ?>
    <table width="70%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td width="100%" colspan="2" align="center"><?php echo $erreur; ?></td>
        </tr>
        <tr>
            <td width="50%" align="right"><?php echo $L['votre_login']; ?>:&nbsp;</td>
            <td width="50%">
                <input type="text" name="pseudook" size="20"></td>
        </tr>
        <tr>
            <td width="50%" align="right"><?php echo $L['votre_mdp']; ?> :&nbsp;</td>
            <td width="50%">
                <input type="password" name="passok" size="20">
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" valign="middle">
                <input type="submit" value="Ok">
            </td>
        </tr>
    </table>
</form>
