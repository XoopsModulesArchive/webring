<?php

/* ----------------------------------------------------------------------------
A J O U T E R U N C O M M E N T A I R E
PHPMyRing (4.0) dernière modification du fichier [14-11-02]
---------------------------------------------------------------------------- */
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
$conf = config();
InsertLang('', $conf['lang']);
// Si le numéro du site n'est pas défini
if (!$idsite) {
    $erreur = '<p align="center">' . $L['site_nom_def'] . '</p>';
} else {
    // On va aller chercher le nom du site concerné, ça sera fait ;)

    // Connexion MySQL

    $conn = connecte();

    $row = $GLOBALS['xoopsDB']->fetchBoth(requete("SELECT site_nom FROM webring WHERE idsite=$idsite"));

    $site_nom = $row['site_nom'];

    if ($send) {
        if ((!$auteur) || (!$note) || (!$texte)) {
            echo '<p align="center"><font size="3" color="#FF0000" face="Arial">' . $L['form_inc'] . '</font></p>';
        } else {
            // Ajout du commentaire

            $auteur = htmlentities(addslashes($auteur));

            $texte = nl2br(htmlentities(addslashes($texte)));

            if (requete(
                'INSERT INTO webring_com (idsite,auteur,texte,note,date)' . "VALUES ($idsite,'$auteur','$texte',$note,NOW())"
            )) {
                echo '<p align="center">' . $L['comm_enr'] . '</p>';

                $ajout = 1;
            } else {
                $erreur = $L['comm_err'];
            }
        }
    }
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title><?php echo $L['add_com'] . ' ' . $L['$site_nom']; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <?php require __DIR__ . '/include/styles.php'; ?>
</head>
<body bgcolor="#FFFFFF" text="#000000">
<?php
if (!$erreur && !$ajout) {
    ?>
    <form method="post" action="<?php echo $PHP_SELF; ?>">
        <input type="hidden" name="idsite" value="<?php echo $idsite ?>">
        <input type="hidden" name="send" value="1">
        <table width="95%" border="0" class="tablewebring">
            <tr>
                <td colspan="2" class="table1" width="0">
                    <div align="center" class="cellule_liste"><?php echo $L['add_com']; ?></div>
                </td>
            </tr>
            <tr>
                <td width="50%"><?php echo $L['votre_nom']; ?> :</td>
                <td width="50%">
                    <input type="text" name="auteur" size="20" maxlength="15" value="<?php echo $auteur; ?>">
                </td>
            </tr>
            <tr>
                <td width="50%"><?php echo $L['notation']; ?> :</td>
                <td width="50%">
                    <select name="note">
                        <?php
                        $i = 1;

    while ($i <= 10) {
        echo "<option value='$i'";

        if ($i == $note) {
            echo 'selected';
        }

        echo ">$i</option>";

        $i++;
    } ?>
                    </select>
                    /10
                </td>
            </tr>
            <tr>
                <td width="50%"><?php echo $L['commentaire']; ?> :</td>
                <td width="50%">
                    <textarea name="texte" cols="20" rows="3"><?php echo $texte; ?></textarea>
                </td>
            </tr>
            <tr>
                <td width="50%">
                    <div align="center">
                        <input type="submit" name="Submit" value="<?php echo $L['envoyer']; ?>">
                    </div>
                </td>
                <td width="50%">
                    <div align="center">
                        <input type="reset" name="Submit2" value="<?php echo $L['retablir']; ?>">
                    </div>
                </td>
            </tr>
        </table>
    </form>
    <?php
    // fin if erreur
} elseif ($erreur) {
    echo $erreur; ?>
    <p align="center">
        <a href="JavaScript:document.history.back();"><?php echo ucfirst($L['retour']); ?></a>
    </p>
    <?php
} elseif ($ajout) {
        ?>
    <p align="center">
        <a href="view_com.php?idsite=<?php echo $idsite; ?>"><?php echo $L['retour_com']; ?></a>
    </p>
    <?php
    }
?>
<br>
<p align="center">
    <a href="JavaScript:window.close();"><?php echo $L['ferm_fen']; ?></a>
</p>
</body>
</html>
