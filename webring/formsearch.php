<?php
/* ----------------------------------------------------------------------------
M O T E U R D E R E C H E R C H E
> Formulaire <
PHPMyRing (4.0) dernière modification du fichier [06-12-02]
---------------------------------------------------------------------------- */

?>
<!-- formsearch -->
<form method="post" action="cherche.php" name="formsearch">
    <table width="40%" border="0" cellpadding="5" cellspacing="2" align="center" class="table_liste">
        <tr align="center" valign="middle">
            <td colspan="2" class="cellule_liste"><?php echo ucfirst($L['recherche']); ?></td>
        </tr>
        <tr align="center" valign="middle">
            <td colspan="2"><?php if (isset($msgRech)) {
    echo $msgRech;
} /* S'il y a un msg du moteur de recherche */ ?></td>
        </tr>
        <tr>
            <td width="69%">
                <input type="text" name="mots" size="30" value="<?php echo $mots; ?>">
            </td>
            <td width="31%">
                <input type="submit" value="<?php echo ucfirst($L['chercher']); ?>">
            </td>
        </tr>
    </table>
</form>
<!-- fin formsearch -->
