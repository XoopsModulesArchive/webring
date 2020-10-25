<?php
/* ----------------------------------------------------------------------------
F O R M U L A I R E D ' A U T H E N T I F I C A T I O N
PHPMyRing (4.0) dernière modification du fichier [16-10-02]
---------------------------------------------------------------------------- */

?>
    <form method="post" action="index.php" name="formauth">
        <table width="400" border="0" align="center">
            <tr align="center" valign="middle">
                <td colspan="3"><?php if ($message) {
    echo $message;
} ?></td>
            </tr>
            <tr>
                <td width="142" align="right" valign="middle"><?php echo ucfirst($L['pseudo']); ?> :</td>
                <td width="202" align="center" valign="middle">
                    <input type="text" name="pseudook" size="20">
                </td>
                <td rowspan="2" align="center" valign="middle">
                    <input type="submit" value="Go" name="submit">
                </td>
            </tr>
            <tr>
                <td width="142" align="right" valign="middle"><?php echo $L['mdp']; ?> :</td>
                <td width="202" align="center" valign="middle">
                    <input type="password" name="passok" size="20">
                </td>
            </tr>
        </table>
    </form>
    <script language="JavaScript">
        document.formauth.pseudook.focus();
    </script>
<?php require __DIR__ . '/bas.php'; ?>
