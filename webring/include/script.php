<!-- début WEBRING : PHPMyRing -->
<table width="150" border="1" align="center">
    <tr>
        <td align="center" valign="middle" bgColor="#FF6633">
            <?php echo $conf['nomwr']; ?>
        </td>
    </tr>
    <tr>
        <td align="center" valign="middle">
            <script type="text/javascript" src="<?php
            $chemin = $conf['adresse_site'] . "/" . $conf['dossierwr'];
            echo "$chemin/lien.php?de=$idsite"; ?>"></script>
            <br>
            <a href="<?php echo "$chemin/hasard.php"; ?>" target="_blank">Site au hasard</a><br>
            <a href="<?php echo "$chemin/"; ?>" target="_blank">Voir la liste</a></font>
        </td>
    </tr>
</table>
<!-- fin WEBRING : PHPMyRing -->
