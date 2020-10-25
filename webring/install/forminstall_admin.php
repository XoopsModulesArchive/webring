<?php

/* ----------------------------------------------------------------------------
I N S T A L L A T I O N
- Formulaire de saisie des codes de l'administrateur -
PHPMyRing (4.0) dernière modification du fichier [17-12-02]
---------------------------------------------------------------------------- */
echo $erreur_crea;
?>
<form method="post" action="<?php echo $PHP_SELF; ?>">
    <input type="hidden" name="LANGINS" value="<?php echo $LANGINS; ?>">
    <input type="hidden" name="go" value="1">
    <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td align="right"><?php echo $L['ch_login']; ?>:&nbsp;</td>
            <td>
                <input type="text" name="loginadmN" size="20" maxlength="10" value="<?php echo $loginadmN; ?>">
            </td>
        </tr>
        <tr>
            <td align="right"><?php echo $L['ch_mdp']; ?>:&nbsp;</td>
            <td>
                <input type="password" name="passadmN" size="20" maxlength="10">
            </td>
        </tr>
        <tr>
            <td align="right"><?php echo $L['votre_nom']; ?>:&nbsp;</td>
            <td>
                <input type="text" name="nomadmN" size="20" maxlength="100" value="<?php echo $nomadmN; ?>">
            </td>
        </tr>
        <tr>
            <td align="right"><?php echo $L['votre_email']; ?> :&nbsp;</td>
            <td>
                <input type="text" name="emailadmN" size="20" maxlength="50" value="<?php echo $emailadmN; ?>">
            </td>
        </tr>
        <tr>
            <td align="right" valign="middle">
                <input type="submit" value="Ok">
            </td>
            <td align="left" valign="middle">
                <input type="reset" value="RAZ">
            </td>
        </tr>
    </table>
</form>
