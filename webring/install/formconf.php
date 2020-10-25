<?php
/* ----------------------------------------------------------------------------
I N S T A L L A T I O N
- Formulaire de configuration -
PHPMyRing (4.0) dernière modification du fichier [17-12-02]
---------------------------------------------------------------------------- */

?>
<form method="post" action="<?php echo $PHP_SELF; ?>">
    <?php
    // Si c'est une màj, on va chercher les champs correspondants
    if ($maj == 1) {
        $conf = config();
        echo "<input type=\"hidden\" name=\"maj\" value=\"1\">";
    }
    ?>
    <input type="hidden" name="LANGINS" value="<?php echo $LANGINS; ?>">
    <input type="hidden" name="go" value="1">
    <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="border: #000000; border-style: solid; border-width: thin; border-right-width: thin; border-bottom-width: thin; border-left-width: thin">
        <tr bgcolor="#C6D396">
            <td colspan="2" align="center" valign="middle">
                <b><font size="3"><?php echo $L['parametres']; ?></font></b>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="middle"><?php echo $L['langue_defaut']; ?> &nbsp;:&nbsp;</td>
            <td width="50%" align="left" valign="top">
                <?php // Analyse du fichier /lang/langs
                if ($fp = fopen("../lang/langs", "r")) {
                    echo "<select name=\"lang\" size=\"1\">
";
                    while (($fp) and (!feof($fp))) {
                        $row = fgetcsv($fp, 200, ";");
                        if (!$row) {
                            break;
                        }
                        $lang   = $row[0];
                        $langue = htmlspecialchars($row[1]);
                        if ($lang == $conf['lang']) {
                            $selected = "selected";
                        }
                        echo " <option value=\"$lang\" $selected>$langue</option>
";
                        $selected = "";
                    }
                    echo "</select> ";
                    fclose($fp);
                } else {
                    echo "Aucune langue install&eacute;e!";
                }
                ?>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="middle"><?php echo $L['email_admin']; ?> :&nbsp;</td>
            <td width="50%" align="left" valign="top">
                <input type="text" name="mailadm" size="20" maxlength="50" value="<?php
                if ($conf['mailadm']) {
                    echo $conf['mailadm'];
                } else {
                    echo $mailadm;
                } ?>">
            </td>
        </tr>
        <tr>
            <td colspan="2" valign="top" align="left"><?php echo $L['exp_email']; ?></td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="top">Signature :&nbsp;</td>
            <td width="50%" align="left" valign="top">
<textarea name="signature" rows="4" cols="20"><?php
    if ($conf['signature']) {
        echo StripSlashes($conf['signature']);
    } else {
        echo $signature;
    } ?></textarea>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="middle">
                <?php echo $L['adresse_du_site']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
                <input type="text" name="adresse_site" value="<?php
                if ($conf['adresse_site']) {
                    echo $conf['adresse_site'];
                } else {
                    echo $adresse_site;
                } ?>" size="20" maxlength="100">
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="middle">
                <?php echo $L['dossier_wr']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
                <input type="text" name="dossierwr" size="20" value="<?php
                if ($conf['dossierwr']) {
                    echo $conf['dossierwr'];
                } else {
                    echo $dossierwr;
                } ?>">
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="middle">
                <?php echo $L['type_wr']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
                <input type="text" name="type" size="20" maxlength="50" value="<?php
                if ($conf['type']) {
                    echo StripSlashes($conf['type']);
                } else {
                    echo $type;
                } ?>">
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="middle">
                <?php echo $L['nom_wr']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
                <input type="text" name="nomwr" size="20" maxlength="20" value="<?php
                if ($conf['nomwr']) {
                    echo StripSlashes($conf['nomwr']);
                } else {
                    echo $nomwr;
                } ?>">
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="middle">
                <?php echo $L['temps_nouveau']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
                <select name="jrnew" size="1">
                    <option value="0" <?php if ($conf['jrnew'] == "0") {
                    echo "selected";
                } ?>><?php echo $L['jamais']; ?>
                    </option>
                    <option value="1" <?php if ($conf['jrnew'] == "1") {
                    echo "selected";
                } ?>>1 <?php echo $L['jour']; ?>
                    </option>
                    <option value="2" <?php if ($conf['jrnew'] == "2") {
                    echo "selected";
                } ?>>2 <?php echo $L['jours']; ?></option>
                    <option value="3" <?php if ($conf['jrnew'] == "3") {
                    echo "selected";
                } ?>>3 <?php echo $L['jours']; ?></option>
                    <option value="4" <?php if ($conf['jrnew'] == "4") {
                    echo "selected";
                } ?>>4 <?php echo $L['jours']; ?></option>
                    <option value="5" <?php if ($conf['jrnew'] == "5") {
                    echo "selected";
                } ?>>5 <?php echo $L['jours']; ?></option>
                    <option value="6" <?php if ($conf['jrnew'] == "6") {
                    echo "selected";
                } ?>>6 <?php echo $L['jours']; ?></option>
                    <option value="7" <?php if ($conf['jrnew'] == "7") {
                    echo "selected";
                } ?>>1 <?php echo $L['semaine']; ?></option>
                    <option value="14" <?php if ($conf['jrnew'] == "14") {
                    echo "selected";
                } ?>>2 <?php echo $L['semaines']; ?></option>
                    <option value="30" <?php if ($conf['jrnew'] == "30") {
                    echo "selected";
                } ?>>1 <?php echo $L['mois']; ?></option>
                    <option value="60" <?php if ($conf['jrnew'] == "60") {
                    echo "selected";
                } ?>>2 <?php echo $L['moiss']; ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="middle">
                <?php echo $L['classement_def']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
                <select name="classement" size="1">
                    <option value="date" <?php if ($conf['classement'] == "date") {
                    echo "selected";
                } ?>><?php echo $L['chronologique']; ?>
                    </option>
                    <option value="site_nom" <?php if ($conf['classement'] == "site_nom") {
                    echo "selected";
                } ?>><?php echo $L['alphabetique']; ?></option>
                    <option value="visites" <?php if ($conf['classement'] == "visites") {
                    echo "selected";
                } ?>><?php echo $L['nbre_visites']; ?></option>
                    <option value="RAND()" <?php if ($conf['classement'] == "RAND()") {
                    echo "selected";
                } ?>><?php echo $L['aleatoirement']; ?></option>
                </select>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="middle">
                <?php echo $L['ordre_classe']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
                <select name="ordre" size="1">
                    <option value="ASC" <?php if ($conf['ordre'] == "ASC") {
                    echo "selected";
                } ?>>
                        <?php echo $L['croissant']; ?>
                    </option>
                    <option value="DESC" <?php if ($conf['ordre'] == "DESC") {
                    echo "selected";
                } ?>>
                        <?php echo $L['decroissant']; ?>
                    </option>
                </select>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="middle">
                <?php echo $L['nombre_sites_page']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
                <input type="text" name="nbre" size="3" maxlength="2" value="<?php
                if ($conf['nbre']) {
                    echo $conf['nbre'];
                } else {
                    echo $nbre;
                } ?>">
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="middle">
                <?php echo $L['nombre_sites_recherche']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
                <input type="text" name="nbre_rech" size="3" maxlength="2" value="<?php
                if ($conf['nbre_rech']) {
                    echo $conf['nbre_rech'];
                } else {
                    echo $nbre_rech;
                } ?>">
            </td>
        </tr>
    </table>
    <br>
    <table width="95%" border="0" cellspacing="0" cellpadding="0" align="center" style="border: #000000; border-style: solid; border-width: thin; border-right-width: thin; border-bottom-width: thin; border-left-width: thin">
        <tr align="center" valign="middle" bgcolor="#C6D396">
            <td colspan="2"><font size="3"><b>
                        <?php echo $L['messages']; ?>
                    </b></font></td>
        </tr>
        <tr align="left">
            <td colspan="2" valign="top">
                <p>
                    <?php echo $L['explications_euro']; ?>
                </p>
            </td>
        </tr>
        <tr>
            <td colspan="2" align="center" valign="middle">
                <hr width="85%" size="1">
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="top">
                <?php echo $L['m_inscription']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
<textarea name="msg_insc" rows="6" cols="35"><?php
    if ($conf['msg_insc']) {
        echo StripSlashes($conf['msg_insc']);
    } elseif ($msg_insc) {
        echo StripSlashes($msg_insc);
    } else {
        echo $L['message_inscription'];
    }
    ?></textarea>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="top">
                <?php echo $L['m_desactivation']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
<textarea name="msg_desac" rows="6" cols="35"><?php
    if ($conf['msg_desac']) {
        echo StripSlashes($conf['msg_desac']);
    } elseif ($msg_desac) {
        echo $msg_desac;
    } else {
        echo $L['message_desactivation'];
    } ?></textarea>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="top">
                <?php echo $L['m_suppression_script']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
<textarea name="msg_supp_script" rows="6" cols="35"><?php
    if ($conf['msg_supp_script']) {
        echo StripSlashes($conf['msg_supp_script']);
    } elseif ($msg_supp_script) {
        echo $msg_supp_script;
    } else {
        echo $L['message_suppression_script'];
    } ?></textarea>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="top">
                <?php echo $L['m_suppression']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
<textarea name="msg_supp_decision" rows="6" cols="35"><?php
    if ($conf['msg_supp_decision']) {
        echo StripSlashes($conf['msg_supp_decision']);
    } elseif ($msg_supp_decision) {
        echo $msg_supp_decision;
    } else {
        echo $L['message_suppression'];
    } ?></textarea>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="top">
                <?php echo $L['m_refus']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
<textarea name="msg_refus" rows="6" cols="35"><?php
    if ($conf['msg_refus']) {
        echo StripSlashes($conf['msg_refus']);
    } elseif ($msg_refus) {
        echo $msg_refus;
    } else {
        echo $L['message_refus'];
    } ?></textarea>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="top">
                <?php echo $L['m_acceptation']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
<textarea name="msg_acc" rows="6" cols="35"><?php
    if ($conf['msg_acc']) {
        echo StripSlashes($conf['msg_acc']);
    } elseif ($msg_acc) {
        echo $msg_acc;
    } else {
        echo $L['message_acceptation'];
    } ?></textarea>
            </td>
        </tr>
        <tr>
            <td width="50%" align="right" valign="top">
                <?php echo $L['m_identifiants']; ?>
                :&nbsp;
            </td>
            <td width="50%" align="left" valign="top">
<textarea name="rappel_ident" rows="6" cols="35"><?php
    if ($conf['rappel_ident']) {
        echo StripSlashes($conf['rappel_ident']);
    } elseif ($rappel_ident) {
        echo $rappel_ident;
    } else {
        echo $L['message_identifiants'];
    } ?></textarea>
            </td>
        </tr>
    </table>
    <br>
    <table width="80%" border="0" cellspacing="0" cellpadding="0" align="center" style='border: #000000; border-style: solid; border-top-width: thin; border-right-width: thin; border-bottom-width: thin; border-left-width: thin'>
        <tr align="center" valign="middle">
            <td><br>
                <input type="submit" value="Go"><br>&nbsp;
            </td>
        </tr>
    </table>
    <p>&nbsp;</p>
</form>
