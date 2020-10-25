<?

/* ----------------------------------------------------------------------------
A D M I N I S T R A T I O N
PHPMyRing (4.0) dernière modification du fichier [19-12-02]
---------------------------------------------------------------------------- */
session_start();
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
InsertLang('', $conf['lang']);
if (!isset(\<?

/* ----------------------------------------------------------------------------
A D M I N I S T R A T I O N
PHPMyRing (4.0) dernière modification du fichier [19-12-02]
---------------------------------------------------------------------------- */
session_start();
require __DIR__ . '/include/config.php';
require __DIR__ . '/include/fonctions.php';
InsertLang('', $conf['lang']);
if (!session_is_registered('idsite')) {
    # # # #
    # Authentification
    # # # #
    // Configuration
    $conf = config();
    // Si rien, formulaire
    if (($pseudo == '') or ($mdp == '')) {
        require __DIR__ . '/tete.php';
        require __DIR__ . '/haut2.php';
        require __DIR__ . '/formauth.php';
        exit;
    }
    // Vérification
    connecte();
    $res    = requete("SELECT idsite FROM webring WHERE mdp='$mdp' AND pseudo='$pseudo'");
    $machin = $GLOBALS['xoopsDB']->fetchBoth($res);
    $idsite = $machin['idsite'];
    if ($GLOBALS['xoopsDB']->getRowsNum($res) == 1) {
        session_start();
        session_register('idsite', 'conf');
        AddInLog("", "Connexion du membre $pseudo", "OK");
        // Retour à la page....
        $url = "Location: $PHP_SELF";
        header($url);
    } else {
        // login incorrect!!!!
        $message = $L['login_erreur'];
        require __DIR__ . '/tete.php';
        require __DIR__ . '/haut2.php';
        require __DIR__ . '/formauth.php';
        exit;
    }
    // Fin du if session register
} else {
    # # # #
    # Contenue de la page
    # # # #
    require __DIR__ . '/tete.php';
    require __DIR__ . '/haut2.php';
    ?>
    <table width="500" border="0" align="center">
        <tr>
            <td align="center" valign="middle"><b><font size="3" face="Arial, Helvetica, sans-serif"><? echo ucfirst($L['administration']); ?></font></b><br>
                [<a href="logout.php"><? echo $L['deconnexion']; ?></a>]
            </td>
        </tr>
    </table>
    <table width="500" align="center" cellpadding="0" cellspacing="0" class="table_admin">
        <tr>
            <td align="center" class="haut_table_admin"><b><? echo $L['bienvenue']; ?>!</b></td>
        </tr>
        <tr>
            <td><span class="message_acc"><?
                    $fp = fopen("include/msg.txt", "r");
                    fpassthru($fp);
                    ?></span></td>
        </tr>
    </table>
    <br>
    <table width="500" align="center" cellpadding="0" cellspacing="0" class="table_admin">
        <tr>
            <td align="center" class="haut_table_admin"><b><? echo $L['code_insert_site']; ?></b></td>
        </tr>
        <tr>
            <td>
                <table width="500" align="center" border="0">
                    <tr>
                        <td align="center" valign="top">
                            <form name="form1" method="post" action="">
                                <div align="center"><? echo $L['pw_edit_code']; ?><br><b><? echo $L['laisser_com']; ?></b> !<br>
                                    <textarea name="code_simple" rows="5" cols="40"><? require __DIR__ . '/include/script.php'; ?></textarea>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
                <?
                // Nous allons vérifier que page est définie ...
                connecte();
                $res    = requete("SELECT page,accept FROM webring WHERE idsite='$idsite'");
                $row    = $GLOBALS['xoopsDB']->fetchBoth($res);
                $page   = $row['page'];
                $accept = $row['accept'];
                if (!$page) {
                    if (!$alert) {
                        $alert = $L['pge_wr_def'];
                    }
                }
                if ($accept == 2) {
                    if (!$alert) {
                        $alert = $L['desact'];
                    }
                }
                if ($alert) {
                    $alert = StripSlashes($alert);
                    $alert = htmlentities($alert);
                    ?>
                    <!-- SI PAGE == 0-->
                    <form method="post" action="modif_page.php">
                    <input type="hidden" name="idsite" value="<? echo $idsite; ?>">
                    <table width="100%" border="0">
                    <tr>
                        <td colspan="2">
                            <div align="center">
                                <font color="#FF0000">
                                    <b><? echo $alert; ?></b><? echo $L['verif_reg']; ?>
                                </font>
                            </div>
                        </td>
                    </tr>
                    <?
                    // Si on viens de modifier la page, inutile de remttre le formulaire...
                    if (!$fait) {
                        ?>
                        <tr>
                            <td valign="middle" align="right" width="38%"><? echo ucfirst($L['page']); ?> :</td>
                            <td width="62%" align="left" valign="middle">
                                <input type="text" name="page" value="<? echo $page; ?>" size="20">
                                <input type="submit" value="<? echo ucfirst($L['envoyer']); ?>">
                            </td>
                        </tr>
                        </table>
                        </form>
                        <?
                    } else {
                        echo "</table>";
                    }
                    ?>
                    <!-- FIN SIPAGE -->
                    <?
                    // Fin du if...
                }
                ?>
            </td>
        </tr>
    </table>
    <br>
    <table width="500" align="center" cellpadding="0" cellspacing="0" class="table_admin">
        <tr>
            <td align="center" class="haut_table_admin"><b><? echo $L['vo_infos']; ?></b></td>
        </tr>
        <tr>
            <td>
                <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <?
                        // Connexion
                        connecte();
                        $res  = requete("SELECT * FROM webring WHERE idsite='$idsite'");
                        $row  = $GLOBALS['xoopsDB']->fetchBoth($res);
                        $date = $row['date'];
                        [$an, $mois, $jour] = explode("-", $date); // on coupe la date
                        ?>
                        <td colspan="2" height="30"><? echo $L['site_visite']; ?>
                            <? echo $row['visites'] . " " . $L['fois_depuis'] . " $jour/$mois/$an"; ?></td>
                    </tr>
                    <tr align="left" valign="top">
                        <td height="30" width="252"><? echo ucfirst($L['site']); ?>: <? echo $row['site_nom']; ?><br>
                            <? echo $L['url']; ?> : <? echo $row['url']; ?></td>
                        <td height="30" width="248"><? echo ucfirst($L['pseudo']); ?> : <? echo $row['pseudo']; ?></td>
                    </tr>
                </table>
                <form method="post" action="modif.php">
                    <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td align="center" height="30" colspan="2" valign="middle"><i><? echo $L['modif_infos']; ?></i>
                                <?
                                if ($mess) {
                                    echo "<br><b>" . StripSlashes(htmlentities($mess)) . "</b>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" height="30" valign="top" width="220"><? echo ucfirst($L['description']); ?>
                                :
                            </td>
                            <td height="30" valign="middle" width="280">
                                <textarea name="description" cols="30" rows="5"><? echo strip_tags($row['description']); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" height="30" valign="middle" width="220"><? echo $L['pge_cont_wr']; ?> :</td>
                            <td height="30" valign="middle" width="280">
                                <input type="text" name="page" value="<? echo $row['page']; ?>" size="20">
                            </td>
                        </tr>
                        <tr>
                            <td align="right" height="30" valign="middle" width="220"><? echo $L['votre_nom']; ?>
                                :
                            </td>
                            <td height="30" valign="middle" width="280">
                                <input type="text" name="webmaster" size="20" maxlength="50" value="<? echo $row['webmaster']; ?>">
                                (<? echo $L['pre_nom']; ?>)
                            </td>
                        </tr>
                        <tr>
                            <td align="right" height="30" valign="middle" width="220"><? echo $L['email']; ?> :
                            </td>
                            <td height="30" valign="middle" width="280">
                                <input type="text" name="email" size="20" maxlength="50" value="<? echo $row['email']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2">
                                <div align="center">
                                    <input type="submit" value="<? echo ucfirst($L['modifier']); ?>">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="reset" name="Submit" value="RAZ">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
    <?
    require __DIR__ . '/pied.php';
}
?>
SESSION['idsite'])) {
    # # # #
    # Authentification
    # # # #
    // Configuration
    $conf = config();
    // Si rien, formulaire
    if (($pseudo == '') or ($mdp == '')) {
        require __DIR__ . '/tete.php';
        require __DIR__ . '/haut2.php';
        require __DIR__ . '/formauth.php';
        exit;
    }
    // Vérification
    connecte();
    $res    = requete("SELECT idsite FROM webring WHERE mdp='$mdp' AND pseudo='$pseudo'");
    $machin = $GLOBALS['xoopsDB']->fetchBoth($res);
    $idsite = $machin['idsite'];
    if ($GLOBALS['xoopsDB']->getRowsNum($res) == 1) {
        session_start();
        session_register('idsite', 'conf');
        AddInLog("", "Connexion du membre $pseudo", "OK");
        // Retour à la page....
        $url = "Location: $PHP_SELF";
        header($url);
    } else {
        // login incorrect!!!!
        $message = $L['login_erreur'];
        require __DIR__ . '/tete.php';
        require __DIR__ . '/haut2.php';
        require __DIR__ . '/formauth.php';
        exit;
    }
    // Fin du if session register
} else {
    # # # #
    # Contenue de la page
    # # # #
    require __DIR__ . '/tete.php';
    require __DIR__ . '/haut2.php';
    ?>
    <table width="500" border="0" align="center">
        <tr>
            <td align="center" valign="middle"><b><font size="3" face="Arial, Helvetica, sans-serif"><? echo ucfirst($L['administration']); ?></font></b><br>
                [<a href="logout.php"><? echo $L['deconnexion']; ?></a>]
            </td>
        </tr>
    </table>
    <table width="500" align="center" cellpadding="0" cellspacing="0" class="table_admin">
        <tr>
            <td align="center" class="haut_table_admin"><b><? echo $L['bienvenue']; ?>!</b></td>
        </tr>
        <tr>
            <td><span class="message_acc"><?
                    $fp = fopen("include/msg.txt", "r");
                    fpassthru($fp);
                    ?></span></td>
        </tr>
    </table>
    <br>
    <table width="500" align="center" cellpadding="0" cellspacing="0" class="table_admin">
        <tr>
            <td align="center" class="haut_table_admin"><b><? echo $L['code_insert_site']; ?></b></td>
        </tr>
        <tr>
            <td>
                <table width="500" align="center" border="0">
                    <tr>
                        <td align="center" valign="top">
                            <form name="form1" method="post" action="">
                                <div align="center"><? echo $L['pw_edit_code']; ?><br><b><? echo $L['laisser_com']; ?></b> !<br>
                                    <textarea name="code_simple" rows="5" cols="40"><? require __DIR__ . '/include/script.php'; ?></textarea>
                                </div>
                            </form>
                        </td>
                    </tr>
                </table>
                <?
                // Nous allons vérifier que page est définie ...
                connecte();
                $res    = requete("SELECT page,accept FROM webring WHERE idsite='$idsite'");
                $row    = $GLOBALS['xoopsDB']->fetchBoth($res);
                $page   = $row['page'];
                $accept = $row['accept'];
                if (!$page) {
                    if (!$alert) {
                        $alert = $L['pge_wr_def'];
                    }
                }
                if ($accept == 2) {
                    if (!$alert) {
                        $alert = $L['desact'];
                    }
                }
                if ($alert) {
                    $alert = StripSlashes($alert);
                    $alert = htmlentities($alert);
                    ?>
                    <!-- SI PAGE == 0-->
                    <form method="post" action="modif_page.php">
                    <input type="hidden" name="idsite" value="<? echo $idsite; ?>">
                    <table width="100%" border="0">
                    <tr>
                        <td colspan="2">
                            <div align="center">
                                <font color="#FF0000">
                                    <b><? echo $alert; ?></b><? echo $L['verif_reg']; ?>
                                </font>
                            </div>
                        </td>
                    </tr>
                    <?
                    // Si on viens de modifier la page, inutile de remttre le formulaire...
                    if (!$fait) {
                        ?>
                        <tr>
                            <td valign="middle" align="right" width="38%"><? echo ucfirst($L['page']); ?> :</td>
                            <td width="62%" align="left" valign="middle">
                                <input type="text" name="page" value="<? echo $page; ?>" size="20">
                                <input type="submit" value="<? echo ucfirst($L['envoyer']); ?>">
                            </td>
                        </tr>
                        </table>
                        </form>
                        <?
                    } else {
                        echo "</table>";
                    }
                    ?>
                    <!-- FIN SIPAGE -->
                    <?
                    // Fin du if...
                }
                ?>
            </td>
        </tr>
    </table>
    <br>
    <table width="500" align="center" cellpadding="0" cellspacing="0" class="table_admin">
        <tr>
            <td align="center" class="haut_table_admin"><b><? echo $L['vo_infos']; ?></b></td>
        </tr>
        <tr>
            <td>
                <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
                    <tr>
                        <?
                        // Connexion
                        connecte();
                        $res  = requete("SELECT * FROM webring WHERE idsite='$idsite'");
                        $row  = $GLOBALS['xoopsDB']->fetchBoth($res);
                        $date = $row['date'];
                        [$an, $mois, $jour] = explode("-", $date); // on coupe la date
                        ?>
                        <td colspan="2" height="30"><? echo $L['site_visite']; ?>
                            <? echo $row['visites'] . " " . $L['fois_depuis'] . " $jour/$mois/$an"; ?></td>
                    </tr>
                    <tr align="left" valign="top">
                        <td height="30" width="252"><? echo ucfirst($L['site']); ?>: <? echo $row['site_nom']; ?><br>
                            <? echo $L['url']; ?> : <? echo $row['url']; ?></td>
                        <td height="30" width="248"><? echo ucfirst($L['pseudo']); ?> : <? echo $row['pseudo']; ?></td>
                    </tr>
                </table>
                <form method="post" action="modif.php">
                    <table width="500" border="0" cellspacing="0" cellpadding="0" align="center">
                        <tr>
                            <td align="center" height="30" colspan="2" valign="middle"><i><? echo $L['modif_infos']; ?></i>
                                <?
                                if ($mess) {
                                    echo "<br><b>" . StripSlashes(htmlentities($mess)) . "</b>";
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" height="30" valign="top" width="220"><? echo ucfirst($L['description']); ?>
                                :
                            </td>
                            <td height="30" valign="middle" width="280">
                                <textarea name="description" cols="30" rows="5"><? echo strip_tags($row['description']); ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td align="right" height="30" valign="middle" width="220"><? echo $L['pge_cont_wr']; ?> :</td>
                            <td height="30" valign="middle" width="280">
                                <input type="text" name="page" value="<? echo $row['page']; ?>" size="20">
                            </td>
                        </tr>
                        <tr>
                            <td align="right" height="30" valign="middle" width="220"><? echo $L['votre_nom']; ?>
                                :
                            </td>
                            <td height="30" valign="middle" width="280">
                                <input type="text" name="webmaster" size="20" maxlength="50" value="<? echo $row['webmaster']; ?>">
                                (<? echo $L['pre_nom']; ?>)
                            </td>
                        </tr>
                        <tr>
                            <td align="right" height="30" valign="middle" width="220"><? echo $L['email']; ?> :
                            </td>
                            <td height="30" valign="middle" width="280">
                                <input type="text" name="email" size="20" maxlength="50" value="<? echo $row['email']; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td height="30" colspan="2">
                                <div align="center">
                                    <input type="submit" value="<? echo ucfirst($L['modifier']); ?>">
                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <input type="reset" name="Submit" value="RAZ">
                                </div>
                            </td>
                        </tr>
                    </table>
                </form>
            </td>
        </tr>
    </table>
    <?
    require __DIR__ . '/pied.php';
}
?>
