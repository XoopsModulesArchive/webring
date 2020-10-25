<?php

/* ----------------------------------------------------------------------------
F O R M U L A I R E D ' I N S C R I P T I O N
PHPMyRing (2.0) dernière modification du fichier [24-07-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
$conf = config();
InsertLang('', $conf['lang']);
require __DIR__ . '/tete.php';
require __DIR__ . '/haut2.php';
?>
    <form action="inscription2.php" method="post" name="inscription">
        <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
            <tr>
                <td colspan="2" height="30" class="titre_inscription"><?php echo $L['inscr_nouv_site']; ?>
                </td>
            </tr>
            <tr valign="middle">
                <td height="30" colspan="2">
                    <div align="center"><font color="#FF0033"><?php echo $L['chps_ob']; ?></font></div>
                </td>
            </tr>
            <tr valign="middle">
                <td align="right" height="30"><?php echo $L['sitenom']; ?> :&nbsp;</td>
                <td height="30">
                    <input type="text" name="site_nom" size="20" maxlength="100">
                </td>
            </tr>
            <tr valign="middle">
                <td align="right" height="30">URL :&nbsp;</td>
                <td height="30">
                    <input type="text" name="url" size="20" maxlength="100">
                </td>
            </tr>
            <tr valign="middle">
                <td align="right" height="30"><?php echo ucfirst($L['description']); ?> :&nbsp;</td>
                <td height="30">
                    <textarea name="description" cols="30" rows="5"></textarea>
                </td>
            </tr>
            <tr valign="middle">
                <td align="right" height="30"><?php echo $L['nom_webm']; ?> :&nbsp;</td>
                <td height="30">
                    <input type="text" name="webmaster" size="20" maxlength="50">
                    (<?php echo $L['pre_nom']; ?>)
                </td>
            </tr>
            <tr valign="middle">
                <td align="right" height="30"><?php echo $L['email_webm']; ?> :&nbsp;</td>
                <td height="30">
                    <input type="text" name="email" size="20" maxlength="50">
                </td>
            </tr>
            <tr valign="middle">
                <td align="right" height="30"><?php echo ucfirst($L['pseudo']); ?> :&nbsp;</td>
                <td height="30">
                    <input type="text" name="pseudo" size="20" maxlength="20">
                </td>
            </tr>
            <tr valign="middle">
                <td align="right" height="30"><?php echo $L['mdp']; ?> :&nbsp;</td>
                <td height="30">
                    <input type="password" name="mdp" size="20" maxlength="20">
                </td>
            </tr>
            <tr>
                <td height="30" align="right" valign="middle"><?php echo $L['re_mdp']; ?>
                    :&nbsp;
                </td>
                <td height="30">
                    <input type="password" name="mdp2" size="20" maxlength="20">
                </td>
            </tr>
            <tr>
                <td height="30" colspan="2">
                    <div align="center">
                        <input type="submit" value="<?php echo ucfirst($L['envoyer']); ?>" name="submit">
                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <input type="reset" name="Submit" value="RAZ">
                    </div>
                </td>
            </tr>
        </table>
    </form>
    <script language="JavaScript">
        document.inscription.site_nom.focus();
    </script>
<?php require __DIR__ . '/pied.php'; ?>
