<?

/* ----------------------------------------------------------------------------
I N D E X A D M I N I S T R A T E U R
PHPMyRing (4.0) dernière modification du fichier [05-12-02]
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
if (!isset(\<?

/* ----------------------------------------------------------------------------
I N D E X A D M I N I S T R A T E U R
PHPMyRing (4.0) dernière modification du fichier [05-12-02]
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
if (!session_is_registered("idadm")) {
    ###############################################################
    ## A U T H E N T I F I C A T I O N ##
    ###############################################################
    /* ---------------------------------------------
    A F F I C H A G E D U F O R M U L A I R E
    --------------------------------------------- */
    if ((!$pseudook) or (!$passok)) {
        $conf = config();
        require __DIR__ . '/haut.php';
        require __DIR__ . '/formauth.php';
        exit;
    }
    /* ---------------------------------------------
    V E R I F I C A T I O N D E L ' A C C E S
    --------------------------------------------- */
    connecte();
    $res    = requete("SELECT idadm,nomadm FROM webring_adm WHERE loginadm='$pseudook' AND passadm='$passok'");
    $machin = $GLOBALS['xoopsDB']->fetchBoth($res);
    $idadm  = $machin['idadm'];
    //$GLOBALS['xoopsDB']->close();
    if ($GLOBALS['xoopsDB']->getRowsNum($res) == 1) {
        session_start();
        $nomadm = $machin['nomadm'];
        $conf   = config();
        session_register('idadm', 'nomadm', 'conf');
        addinlog("../", "Connexion de l'administrateur $nomadm", "OK");
        // Retour à la page....
        $url = "Location: $PHP_SELF";
        header($url);
    } else {
        // login incorrect!!!!
        require __DIR__ . '/haut.php';
        echo "<p align=\"center\"><font color=\"#FF0000\">" . $L['login_erreur'] . "</font></p>";
        require __DIR__ . '/formauth.php';
        exit;
    }
    // Fin du if !session register
} else {
    ###############################################################
    ## C O N T E N U D E L A P A G E ##
    ###############################################################
    require __DIR__ . '/haut.php';
    // On va aller récupérer des trucs...
    // Connnectons nous toujours ça va nous servir ;)
    connecte();
    // Nombre de sites inscrits
    //$nbsites=$GLOBALS['xoopsDB']->getRowsNum(requete("SELECT idsite FROM webring WHERE accept='1'"));
    $nbsites = $GLOBALS['xoopsDB']->getRowsNum(requete("SELECT idsite FROM webring WHERE accept='1'"));
    // Nombre de sites désactivés
    $nbdesact = $GLOBALS['xoopsDB']->getRowsNum(requete("SELECT idsite FROM webring WHERE accept='2'"));
    // Nombre de sites en attente de validation
    $res   = requete("SELECT idsite,site_nom,url,webmaster,email,description FROM webring WHERE accept='0'");
    $nbatt = $GLOBALS['xoopsDB']->getRowsNum($res);
    // Les sites qui sont en attente de validation...
    // $res est toujours valable...
    ?>
    <br>
    <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td width="27"><img src="../images/bienvenue.png" width="64" height="64" border="0"></td>
            <td width="473"><? echo $L['bienvenue'] . " " . $nomadm . " " . $L['ds_interface']; ?>.<br>
                <? echo $L['you_use'] . " " . $conf['version'] . " " . $L['si_new_version']; ?></td>
        </tr>
    </table>
    <br>
    <table width="500" border="0" align="center">
        <tr>
            <td>
                <div align="center"><font face="Arial, Helvetica, sans-serif" size="3"><? echo $L['recap']; ?></font></div>
            </td>
        </tr>
        <tr>
            <td>
                <p>- <? echo $L['ya_nb_sites1'] . " $nbsites " . $L['ya_nb_sites2']; ?> (<a href="liste.php"><? echo $L['voir_ls']; ?></a>) ;<br>
                    - <? echo $nbatt . " " . $L['nb_att']; ?> ;<br>
                    - <? echo $nbdesact . " " . $L['nb_des']; ?>
                    (<a href="verif.php"><? echo $L['v_sites']; ?></a>).</p>
            </td>
        </tr>
    </table>
    <br>
    <table width="500" border="0" align="center">
        <tr>
            <td>
                <div align="center"><font face="Arial, Helvetica, sans-serif" size="3"><? echo $L['msg_acc']; ?></font></div>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?
                    $fp = fopen("../include/msg.txt", "r");
                    fpassthru($fp);
                    ?>
                </p>
                <p align="center">[ <a href="JavaScript:modif_msg();"><? echo $L['modif_msg']; ?></a>
                    ]</p>
            </td>
        </tr>
    </table>
    <br>
    <table width="500" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="6">
                <div align="center"><font face="Arial, Helvetica, sans-serif"><? echo $L['ls_sites_att']; ?></font></div>
            </td>
        </tr>
        <tr align="center" valign="middle">
            <td width="170"><b><font face="Arial, Helvetica, sans-serif" size="2"><? echo $L['sitenom']; ?></font></b></td>
            <td width="95"><b><font face="Arial, Helvetica, sans-serif" size="2">URL</font></b></td>
            <td width="159"><b><font face="Arial, Helvetica, sans-serif" size="2"><? echo ucfirst($L['webmaster']); ?></font></b></td>
            <td width="58"><b><font face="Arial, Helvetica, sans-serif" size="2"><? echo $L['accepter']; ?></font></b></td>
            <td width="58"><b><font face="Arial, Helvetica, sans-serif" size="2"><? echo $L['refuser']; ?></font></b></td>
            <td width="58"><b><font face="Arial, Helvetica, sans-serif" size="2">&nbsp;</font></b></td>
        </tr>
        <!-- DEBUT DU TABLEAU -->
        <?
        if ($nbatt) {
            while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
                ?>
                <tr valign="top" align="center">
                    <td width="170">
                        <? echo $row['site_nom']; ?>
                    </td>
                    <td width="95"><a href="<? echo $row['url']; ?>" target="_blank">
                            <? echo $row['url']; ?>
                        </a></td>
                    <td width="159"><a href="mailto:<? echo $row['email']; ?>">
                            <? echo $row['webmaster']; ?>
                        </a></td>
                    <td width="58">
                        <form name="formulairenumeroun" method="post" action="accepter.php">
                            <input type="hidden" name="direct" value="1">
                            <input type="hidden" name="idsite" value="<? echo $row['idsite']; ?>">
                            <input type="submit" name="Submit2" value="A">
                        </form>
                    </td>
                    <td width="58">
                        <form method="post" action="refus.php">
                            <input type="hidden" name="idsite" value="<? echo $row['idsite']; ?>">
                            <input type="submit" name="Submit" value="R">
                        </form>
                    </td>
                    <td width="58"><a href="voir.php?idsite=<? echo $row['idsite']; ?>">+</a></td>
                </tr>
                <tr valign="top" align="center">
                    <td colspan="6" height="1">
                        <hr align="center" width="75%" size="1" \>
                    </td>
                </tr>
                <?
                // Fin du while
            }
            // Fin du if
        } else {
            ?>
            <tr valign="top" align="center">
                <td colspan="6"> <? echo $L['no_site_v']; ?> </td>
            </tr>
            <?// Fin du else
        }
        ?>
        <!-- FIN TABLEAU -->
    </table>
    <?
    require __DIR__ . '/bas.php';
}
?>
SESSION["idadm"])) {
    ###############################################################
    ## A U T H E N T I F I C A T I O N ##
    ###############################################################
    /* ---------------------------------------------
    A F F I C H A G E D U F O R M U L A I R E
    --------------------------------------------- */
    if ((!$pseudook) or (!$passok)) {
        $conf = config();
        require __DIR__ . '/haut.php';
        require __DIR__ . '/formauth.php';
        exit;
    }
    /* ---------------------------------------------
    V E R I F I C A T I O N D E L ' A C C E S
    --------------------------------------------- */
    connecte();
    $res    = requete("SELECT idadm,nomadm FROM webring_adm WHERE loginadm='$pseudook' AND passadm='$passok'");
    $machin = $GLOBALS['xoopsDB']->fetchBoth($res);
    $idadm  = $machin['idadm'];
    //$GLOBALS['xoopsDB']->close();
    if ($GLOBALS['xoopsDB']->getRowsNum($res) == 1) {
        session_start();
        $nomadm = $machin['nomadm'];
        $conf   = config();
        session_register('idadm', 'nomadm', 'conf');
        addinlog("../", "Connexion de l'administrateur $nomadm", "OK");
        // Retour à la page....
        $url = "Location: $PHP_SELF";
        header($url);
    } else {
        // login incorrect!!!!
        require __DIR__ . '/haut.php';
        echo "<p align=\"center\"><font color=\"#FF0000\">" . $L['login_erreur'] . "</font></p>";
        require __DIR__ . '/formauth.php';
        exit;
    }
    // Fin du if !session register
} else {
    ###############################################################
    ## C O N T E N U D E L A P A G E ##
    ###############################################################
    require __DIR__ . '/haut.php';
    // On va aller récupérer des trucs...
    // Connnectons nous toujours ça va nous servir ;)
    connecte();
    // Nombre de sites inscrits
    //$nbsites=$GLOBALS['xoopsDB']->getRowsNum(requete("SELECT idsite FROM webring WHERE accept='1'"));
    $nbsites = $GLOBALS['xoopsDB']->getRowsNum(requete("SELECT idsite FROM webring WHERE accept='1'"));
    // Nombre de sites désactivés
    $nbdesact = $GLOBALS['xoopsDB']->getRowsNum(requete("SELECT idsite FROM webring WHERE accept='2'"));
    // Nombre de sites en attente de validation
    $res   = requete("SELECT idsite,site_nom,url,webmaster,email,description FROM webring WHERE accept='0'");
    $nbatt = $GLOBALS['xoopsDB']->getRowsNum($res);
    // Les sites qui sont en attente de validation...
    // $res est toujours valable...
    ?>
    <br>
    <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
        <tr>
            <td width="27"><img src="../images/bienvenue.png" width="64" height="64" border="0"></td>
            <td width="473"><? echo $L['bienvenue'] . " " . $nomadm . " " . $L['ds_interface']; ?>.<br>
                <? echo $L['you_use'] . " " . $conf['version'] . " " . $L['si_new_version']; ?></td>
        </tr>
    </table>
    <br>
    <table width="500" border="0" align="center">
        <tr>
            <td>
                <div align="center"><font face="Arial, Helvetica, sans-serif" size="3"><? echo $L['recap']; ?></font></div>
            </td>
        </tr>
        <tr>
            <td>
                <p>- <? echo $L['ya_nb_sites1'] . " $nbsites " . $L['ya_nb_sites2']; ?> (<a href="liste.php"><? echo $L['voir_ls']; ?></a>) ;<br>
                    - <? echo $nbatt . " " . $L['nb_att']; ?> ;<br>
                    - <? echo $nbdesact . " " . $L['nb_des']; ?>
                    (<a href="verif.php"><? echo $L['v_sites']; ?></a>).</p>
            </td>
        </tr>
    </table>
    <br>
    <table width="500" border="0" align="center">
        <tr>
            <td>
                <div align="center"><font face="Arial, Helvetica, sans-serif" size="3"><? echo $L['msg_acc']; ?></font></div>
            </td>
        </tr>
        <tr>
            <td>
                <p>
                    <?
                    $fp = fopen("../include/msg.txt", "r");
                    fpassthru($fp);
                    ?>
                </p>
                <p align="center">[ <a href="JavaScript:modif_msg();"><? echo $L['modif_msg']; ?></a>
                    ]</p>
            </td>
        </tr>
    </table>
    <br>
    <table width="500" align="center" cellpadding="0" cellspacing="0">
        <tr>
            <td colspan="6">
                <div align="center"><font face="Arial, Helvetica, sans-serif"><? echo $L['ls_sites_att']; ?></font></div>
            </td>
        </tr>
        <tr align="center" valign="middle">
            <td width="170"><b><font face="Arial, Helvetica, sans-serif" size="2"><? echo $L['sitenom']; ?></font></b></td>
            <td width="95"><b><font face="Arial, Helvetica, sans-serif" size="2">URL</font></b></td>
            <td width="159"><b><font face="Arial, Helvetica, sans-serif" size="2"><? echo ucfirst($L['webmaster']); ?></font></b></td>
            <td width="58"><b><font face="Arial, Helvetica, sans-serif" size="2"><? echo $L['accepter']; ?></font></b></td>
            <td width="58"><b><font face="Arial, Helvetica, sans-serif" size="2"><? echo $L['refuser']; ?></font></b></td>
            <td width="58"><b><font face="Arial, Helvetica, sans-serif" size="2">&nbsp;</font></b></td>
        </tr>
        <!-- DEBUT DU TABLEAU -->
        <?
        if ($nbatt) {
            while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
                ?>
                <tr valign="top" align="center">
                    <td width="170">
                        <? echo $row['site_nom']; ?>
                    </td>
                    <td width="95"><a href="<? echo $row['url']; ?>" target="_blank">
                            <? echo $row['url']; ?>
                        </a></td>
                    <td width="159"><a href="mailto:<? echo $row['email']; ?>">
                            <? echo $row['webmaster']; ?>
                        </a></td>
                    <td width="58">
                        <form name="formulairenumeroun" method="post" action="accepter.php">
                            <input type="hidden" name="direct" value="1">
                            <input type="hidden" name="idsite" value="<? echo $row['idsite']; ?>">
                            <input type="submit" name="Submit2" value="A">
                        </form>
                    </td>
                    <td width="58">
                        <form method="post" action="refus.php">
                            <input type="hidden" name="idsite" value="<? echo $row['idsite']; ?>">
                            <input type="submit" name="Submit" value="R">
                        </form>
                    </td>
                    <td width="58"><a href="voir.php?idsite=<? echo $row['idsite']; ?>">+</a></td>
                </tr>
                <tr valign="top" align="center">
                    <td colspan="6" height="1">
                        <hr align="center" width="75%" size="1" \>
                    </td>
                </tr>
                <?
                // Fin du while
            }
            // Fin du if
        } else {
            ?>
            <tr valign="top" align="center">
                <td colspan="6"> <? echo $L['no_site_v']; ?> </td>
            </tr>
            <?// Fin du else
        }
        ?>
        <!-- FIN TABLEAU -->
    </table>
    <?
    require __DIR__ . '/bas.php';
}
?>
