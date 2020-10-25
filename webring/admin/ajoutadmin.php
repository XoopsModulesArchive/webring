<?
/* ----------------------------------------------------------------------------
A J O U T E R U N A D M I N I S T R A T E U R
PHPMyRing (4.0) dernière modification du fichier [04-12-02]
---------------------------------------------------------------------------- */

// VERIFICATION DE L'ACCES
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
//$conf=config();
InsertLang('../', $conf['lang']);
if (!isset(\<?
/* ----------------------------------------------------------------------------
A J O U T E R U N A D M I N I S T R A T E U R
PHPMyRing (4.0) dernière modification du fichier [04-12-02]
---------------------------------------------------------------------------- */

// VERIFICATION DE L'ACCES
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
//$conf=config();
InsertLang('../', $conf['lang']);
if (!session_is_registered('idadm')) {
    echo $L['session_ferm'];
    exit;
}
require __DIR__ . '/haut.php';
if ($go == 1) {
    // Ajout
    // Si un champ existe déjà...
    connecte();
    $res = requete(
        "SELECT idadm FROM webring_adm " . "WHERE loginadm='$loginadmN' " . "OR nomadm='$nomadmN'"
    );
    $nb  = $GLOBALS['xoopsDB']->getRowsNum($res);
    if (!$loginadmN or !$passadmN or !$nomadmN or !is_email($emailadmN) or $nb != 0) {
        echo "<p align=\"center\">" . $L['champs_incomplets'] . "</p>";
        require dirname(__DIR__) . '/install/forminstall_admin.php';
    } else {
        ?>
        <p align="center">
        <?
        connecte();
        if (requete("INSERT INTO webring_adm VALUES('','$loginadmN','$passadmN','$nomadmN','$emailadmN')")) {
            echo $L['compte_admin_ok'];
            addinlog("../", "Ajout de l'administrateur $nomadmN par $nomadm", "OK");
            ?>
            <br>
            <a href="ajoutadmin.php">Liste des administratreurs</a></p>
            <?
        } else {
            echo $L['compte_admin_er'];
            addinlog("../", "Ajout de l'administrateur $nomadmN par $nomadm", "ERREUR");
        }
        //$GLOBALS['xoopsDB']->close();
        ?>
        </p>
        <?
    }
} elseif ($go == "ajout") {
    // formulaire
    ?>
    <p align="center"><font size="3" face="Arial" color="#000000"><? echo $L['creation_nouvel_admin']; ?></font></p>
    <?
    require dirname(__DIR__) . '/install/forminstall_admin.php';
} else {
    connecte();
    if ($go == "delete") {
        ?>
        <p align="center">
            <?
            if (requete("DELETE FROM webring_adm WHERE idadm='$idadmdel'")) {
                echo $L['admin_del'];
                addinlog("../", "Suppression de l'administrateur $idadmdel par $nomadm", "OK");
            } else {
                echo $L['admin_del_err'];
                addinlog("../", "Suppression de l'administrateur $idadmdel par $nomadm", "ERREUR");
            }
            ?>
        </p>
        <?
    }
    ?>
    <table width="85%" border="0" align="center" cols="5" class="table_liste">
        <tr>
            <td width="100%" class="haut_table_admin" colspan="5" align="center"><? echo $L['liste_adm_enr']; ?></td>
        </tr>
        <tr>
            <td class="table1" width="17%" align="center" valign="middle"><b>N&deg;</b></td>
            <td class="table1" width="17%"></td>
            <td class="table1" width="17%" align="center" valign="middle"><b>Login</b></td>
            <td class="table1" width="17%" align="center" valign="middle"><b>Email</b></td>
            <td class="table1" width="17%"></td>
        </tr>
        <?
        // Listage des administrateurs enregistrés
        $res = requete("SELECT idadm, loginadm, emailadm, nomadm FROM webring_adm WHERE idadm!=$idadm");
        //$GLOBALS['xoopsDB']->close();
        while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
            ?>
            <tr>
                <td class="table1" width="17%" align="center" valign="middle"><? echo $row['idadm']; ?></td>
                <td class="table1" width="17%" align="center" valign="middle"><? echo $row['nomadm']; ?></td>
                <td class="table1" width="17%" align="center" valign="middle"><? echo $row['loginadm']; ?></td>
                <td class="table1" width="17%" align="center" valign="middle"><? echo $row['emailadm']; ?></td>
                <td class="table1" width="17%" align="center" valign="middle">
                    <a href="JavaScript:deladmin(<? echo $row['idadm']; ?>,'<? echo $row['nomadm']; ?>');">
                        <img src="../images/delete.png" alt="" title="<? echo $L['del_admin']; ?>" width="32" height="32" border="0">
                    </a>
                </td>
            </tr>
            <?
        }
        ?>
    </table>
    <p align="center"><a href="ajoutadmin.php?go=ajout"><? echo $L['ad_admin']; ?></a></p>
    <?
}
require __DIR__ . '/bas.php';
?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
}
require __DIR__ . '/haut.php';
if ($go == 1) {
    // Ajout
    // Si un champ existe déjà...
    connecte();
    $res = requete(
        "SELECT idadm FROM webring_adm " . "WHERE loginadm='$loginadmN' " . "OR nomadm='$nomadmN'"
    );
    $nb  = $GLOBALS['xoopsDB']->getRowsNum($res);
    if (!$loginadmN or !$passadmN or !$nomadmN or !is_email($emailadmN) or $nb != 0) {
        echo "<p align=\"center\">" . $L['champs_incomplets'] . "</p>";
        require dirname(__DIR__) . '/install/forminstall_admin.php';
    } else {
        ?>
        <p align="center">
        <?
        connecte();
        if (requete("INSERT INTO webring_adm VALUES('','$loginadmN','$passadmN','$nomadmN','$emailadmN')")) {
            echo $L['compte_admin_ok'];
            addinlog("../", "Ajout de l'administrateur $nomadmN par $nomadm", "OK");
            ?>
            <br>
            <a href="ajoutadmin.php">Liste des administratreurs</a></p>
            <?
        } else {
            echo $L['compte_admin_er'];
            addinlog("../", "Ajout de l'administrateur $nomadmN par $nomadm", "ERREUR");
        }
        //$GLOBALS['xoopsDB']->close();
        ?>
        </p>
        <?
    }
} elseif ($go == "ajout") {
    // formulaire
    ?>
    <p align="center"><font size="3" face="Arial" color="#000000"><? echo $L['creation_nouvel_admin']; ?></font></p>
    <?
    require dirname(__DIR__) . '/install/forminstall_admin.php';
} else {
    connecte();
    if ($go == "delete") {
        ?>
        <p align="center">
            <?
            if (requete("DELETE FROM webring_adm WHERE idadm='$idadmdel'")) {
                echo $L['admin_del'];
                addinlog("../", "Suppression de l'administrateur $idadmdel par $nomadm", "OK");
            } else {
                echo $L['admin_del_err'];
                addinlog("../", "Suppression de l'administrateur $idadmdel par $nomadm", "ERREUR");
            }
            ?>
        </p>
        <?
    }
    ?>
    <table width="85%" border="0" align="center" cols="5" class="table_liste">
        <tr>
            <td width="100%" class="haut_table_admin" colspan="5" align="center"><? echo $L['liste_adm_enr']; ?></td>
        </tr>
        <tr>
            <td class="table1" width="17%" align="center" valign="middle"><b>N&deg;</b></td>
            <td class="table1" width="17%"></td>
            <td class="table1" width="17%" align="center" valign="middle"><b>Login</b></td>
            <td class="table1" width="17%" align="center" valign="middle"><b>Email</b></td>
            <td class="table1" width="17%"></td>
        </tr>
        <?
        // Listage des administrateurs enregistrés
        $res = requete("SELECT idadm, loginadm, emailadm, nomadm FROM webring_adm WHERE idadm!=$idadm");
        //$GLOBALS['xoopsDB']->close();
        while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
            ?>
            <tr>
                <td class="table1" width="17%" align="center" valign="middle"><? echo $row['idadm']; ?></td>
                <td class="table1" width="17%" align="center" valign="middle"><? echo $row['nomadm']; ?></td>
                <td class="table1" width="17%" align="center" valign="middle"><? echo $row['loginadm']; ?></td>
                <td class="table1" width="17%" align="center" valign="middle"><? echo $row['emailadm']; ?></td>
                <td class="table1" width="17%" align="center" valign="middle">
                    <a href="JavaScript:deladmin(<? echo $row['idadm']; ?>,'<? echo $row['nomadm']; ?>');">
                        <img src="../images/delete.png" alt="" title="<? echo $L['del_admin']; ?>" width="32" height="32" border="0">
                    </a>
                </td>
            </tr>
            <?
        }
        ?>
    </table>
    <p align="center"><a href="ajoutadmin.php?go=ajout"><? echo $L['ad_admin']; ?></a></p>
    <?
}
require __DIR__ . '/bas.php';
?>
