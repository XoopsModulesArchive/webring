<?php
/* ----------------------------------------------------------------------------
F O R M U L A I R E D ' A U T H E N T I F I C A T I O N
PHPMyRing (4.0) dernière modification du fichier [06-12-02]
---------------------------------------------------------------------------- */

?>
<!-- formauth -->
<script type="text/javascript" language="JavaScript" src="script.js"></script>
<form method="post" action="admin.php" name="formauth">
    <table width="400" border="0" align="center">
        <tr>
            <td colspan="3">
                <div align="center"><font face="Arial, Helvetica, sans-serif"><b><?php echo ucfirst($L['administration']); ?></b></font></div>
            </td>
        </tr>
        <tr align="center" valign="middle">
            <td colspan="3">
                <?php if ($message) {
    echo "$message";
} ?>
            </td>
        </tr>
        <tr>
            <td width="142" align="right" valign="middle"><?php echo ucfirst($L['pseudo']); ?> :</td>
            <td width="202" align="center" valign="middle">
                <input type="text" name="pseudo" size="20">
            </td>
            <td rowspan="2" align="center" valign="middle">
                <input type="submit" value="Go" name="submit">
            </td>
        </tr>
        <tr>
            <td width="142" align="right" valign="middle"><?php echo $L['mdp']; ?> :</td>
            <td width="202" align="center" valign="middle">
                <input type="password" name="mdp" size="20">
            </td>
        </tr>
        <tr>
            <td colspan="3" align="center" valign="middle"><a href="JavaScript:oubli();"><?php echo $L['g_oublie_mdp']; ?> !</a></td>
        </tr>
    </table>
</form>
<script type="text/javascript" language="JavaScript">
    document.formauth.pseudo.focus();
</script>
<?php require __DIR__ . '/pied.php'; ?>
<!-- fin formauth -->
