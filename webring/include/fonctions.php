<?php
/* ----------------------------------------------------------------------------
F O N C T I O N S
PHPMyRing (4.0) dernière modification du fichier [13-01-02]
---------------------------------------------------------------------------- */

# # # #  # # # #
# Création des variables de configuration #
# # # #  # # # #
// Renvoie un tableau $conf['var']
function config()
{
    $conn = connecte();
    $res  = requete("SELECT * FROM webring_conf WHERE idconf=1");
    $nb   = $GLOBALS['xoopsDB']->getRowsNum($res);
    ////$GLOBALS['xoopsDB']->close();
    if ($nb = 1) {
        $conf = $GLOBALS['xoopsDB']->fetchBoth($res);
        return $conf;
    } else {
        echo "<p>Erreur lors de la r&eacute;cup&eacute;ration des variables de configuration !</p>";
    }
    unset($conn, $res, $nb, $rqt);
    $GLOBALS['xoopsDB']->freeRecordSet($res);
}

# # # #  # # # #
# Vérification d'une adresse d'email #
# # # #  # # # #
// Merci à Mikaël PIRIO ;)
function is_email($test)
{
    $test = trim($test);
    $ret  = ereg('^([a-z0-9_]|\\-|\\.)+' . '@' . '(([a-z0-9_]|\\-)+\\.)+' . '[a-z]{2,4}$', $test);
    if (ereg("win", strtolower(PHP_OS))) {
        return ($ret);
    } else {
        if ($ret) {
            [$user, $domaine] = split("@", $test, 2);
            if (checkdnsrr($domaine, "MX")) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}

# # # #  # # # #
# Vérification d'une adresse Internet #
# # # #  # # # #
function is_url($test)
{
    $test = trim($test);
    // 7 premiers caractères
    $ok = ereg("^http://", $test);
    return ($ok);
}

# # # # # # # #
# Fonctions pour MySQL #
# # # # # # # #
// Connection
function connecte()
{
    global $host, $login, $mdpSQL, $base, $db;
    $db = mysql_connect($host, $login, $mdpSQL) or die("<p>Connexion &agrave; la base de donn&eacute;es impossible</p>");
    return $conn;
}

// Requete MySQL avec gestion d'erreur...
function requete($rqt)
{
    global $base;
    $res = mysql_db_query($base, $rqt) or die('<p>Erreur MySQL : <br>Requète :<b>' . $rqt . '<><br>Réponse :' . $GLOBALS['xoopsDB']->error() . '</p>');
    return ($res);
}

# # # # # # # #
# Envoi d'un courrier #
# # # # # # # #
// Vous pouvez la modifier celon votre convenance !
function courrier($de, $a, $sujet, $body)
{
    global $conf;
    $date = date("D, j M Y H:i:s -0600");
    $tt   = "From: $de\nReply-To: $de\nX-Mailer: PHP/";
    $tt   .= phpversion();
    $tt   .= " PHPMyRing " . $conf['version'];
    $tt   .= "\nDate: $date";
    return mail("$a", "$sujet", "$body", $tt);
    $body = nl2br($body);
    $tt   = nl2br($tt);
    /*if (print "<p><b><u>Courrier envoyé à l'adresse</u></b> : $a<br>
    <b>En-tete</b> : n$tt<br>
    <b>Pour sujet</b> : $sujet<br>
    <b>Texte du message</b> : $body<br></p>") return true; */
}

# # # #  # # # #
# Recherche d'un texte dans une page #
# # # #  # # # #
// La fonction retourne 0 si le fichier n'existe pas
// 1 contient la recherche
// 2 ne contient pas la recherche
// MERCI DANIEL !!!!!!! (http://hapedit.free.fr)
function Analyse($Koi, $Dans)
{
    // Initialisation des variables
    $contenu = ""; // Le tampon
    if ($fp = @fopen($Dans, "r")) { // Ouverture du fichier
        while (($fp) and (!feof($fp))) { // Tant que la connexion est ouverte et l'on est pas à la fin du fichier
            $contenu .= fread($fp, 1024); // On lit le bloc suivant
            $taille  = strlen($contenu); // Taille du tampon
            if (($taille > 4095) || (feof($fp))) {
                $res = ereg($Koi, $contenu); // Recherche
                if ($res === true) {
                    break;
                } // C'est bon, on a trouvé, arrete toi là !
                $contenu = substr($contenu, 3072); // Réduction du tampon
            }
        }
        fclose($fp);
        // interprétation du résultat
        if ($res === true) {
            return 1;
        } elseif ($res === false) {
            return 2;
        }
    } else {
        return 0;
    }
}

# # # # # # # #
# Encodage des adresse d'email #
# # # # # # # #
// Cette fonction affiche un lien mailto et code l'adresse d'email
function codemail($e)
{
    [$user, $domaine] = split("@", $e, 2);
    $sortie = $user . "_arobase_" . $domaine;
    return "<a href=\"mailto:$sortie\">$user@...</a>";
}

# # # #  # # # #
# Récupération du ou des emails du ou des administrateurs #
# # # #  # # # #
function recupemail()
{
    global $rqt, $conf;
    if ($conf['mailadm'] == "all") {
        // On va rechercher les mails des administrateurs....
        connecte();
        $res = requete("SELECT emailadm FROM webring_adm");
        while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
            $to .= $row['emailadm'];
            $to .= ",";
        }
        return $to;
    } else {
        return $conf['mailadm'];
    }
    unset($conn, $res, $rqt, $row);
    $GLOBALS['xoopsDB']->freeRecordSet($res);
}

# # # # # # # #
# Récupération des variables #
# # # # # # # #
function resolve($id_du_membre, $str)
{
    connecte();
    global $res, $membre, $conf, $rqt;
    $rqt    = "SELECT email,webmaster,site_nom,pseudo,mdp,url " . "FROM webring " . "WHERE idsite='$id_du_membre'";
    $res    = requete($rqt);
    $membre = $GLOBALS['xoopsDB']->fetchBoth($res);
    ////$GLOBALS['xoopsDB']->close();
    // Configuration
    $conf   = config();
    $chemin = $conf['adresse_site'] . "/" . $conf['dossierwr'];
    $str    = ereg_replace("€CHEMINDUWEBRING", $chemin, $str);
    $str    = ereg_replace("€SIGNATURE", StripSlashes($conf['signature']), $str);
    $str    = ereg_replace("€TYPEDEWEBRING", StripSlashes($conf['type']), $str);
    $str    = ereg_replace("€NOMDUWEBRING", StripSlashes($conf['nomwr']), $str);
    $str    = ereg_replace("€NOMDUSITE", StripSlashes($membre['site_nom']), $str);
    $str    = ereg_replace("€NOMDUWEBMASTER", $membre['webmaster'], $str);
    $str    = ereg_replace("€PSEUDODUMEMBRE", $membre['pseudo'], $str);
    $str    = ereg_replace("€MOTDEPASSEDUMEMBRE", $membre['mdp'], $str);
    $str    = ereg_replace("€URLDUSITE", $membre['url'], $str);
    return $str;
}

# # # # # # # #
# Génération du fichier Log #
# # # # # # # #
//Dans $chemin, mettre ../ ou rien pour accéder au dossier include
function addinlog($chemin, $action, $etat)
{
    global $REMOTE_ADDR, $SCRIPT_NAME;
    $date  = date("d/m/Y @ H:i:s");
    $texte = "$date : $action ($REMOTE_ADDR in $SCRIPT_NAME) --> $etat<br>\n";
    $fp    = fopen($chemin . "include/log", "a+");
    fwrite($fp, $texte);
    fclose($fp);
}

# # # # # # # #
# Menu déroulant des langues #
# # # # # # # #
function menu_lang($chemin, $lang_sel)
{
    // Analyse du fichier /lang/langs
    if ($fp = fopen($chemin . "lang/langs", "r")) {
        echo "<form method=\"post\" action=\"$PHP_SELF\" name=\"form_lang\">
<select name=\"lang\" onChange=\"document.form_lang.submit();\">
";
        while (($fp) and (!feof($fp))) {
            $row = fgetcsv($fp, 200, ";");
            if (!$row) {
                break;
            }
            $lang   = $row[0];
            $langue = htmlspecialchars($row[1]);
            if ($lang == $lang_sel) {
                $selected = "selected";
            }
            echo " <option value=\"$lang\" $selected>$langue</option>
";
            $selected = "";
        }
        echo "</select>
</form> ";
        fclose($fp);
    } else {
        echo "Aucune langue d&eacute;finie!";
    }
}

# # # # # # # #
# Inclusion correcte de la langue #
# # # # # # # #
function InsertLang($chemin, $langue_par_defaut)
{
    global $lang, $HTTP_COOKIE_VARS, $HTTP_SERVER_VARS, $L;
    // Vérification que la variable lang n'est pas déjà définie...
    if ($lang) {
        // définition d'un cookie
        setcookie("PHPMYRING_langue", "$lang", time() + 3600 * 24 * 30);
    } else {
        // Récupération du cookie s'il existe...
        if (isset($HTTP_COOKIE_VARS['PHPMYRING_langue'])) {
            $lang = $HTTP_COOKIE_VARS['PHPMYRING_langue'];
        } else {
            // Recuperation de la langue du navigateur
            $lang = substr($HTTP_SERVER_VARS['HTTP_ACCEPT_LANGUAGE'], 0, 2);
            // récupération de la liste des langues disponibles.
            if ($fp = fopen($chemin . "lang/langs", "r")) {
                while (($fp) and (!feof($fp))) {
                    $row = fgetcsv($fp, 200, ";");
                    if (!$row) {
                        break;
                    }
                    if ($lang == $row[0]) {
                        setcookie("PHPMYRING_langue", "$lang", time() + 3600 * 24 * 30);
                    } else {
                        // langue inconnue :-(
                        // Mise en place de la langue par défaut :)
                        $lang = $langue_par_defaut;
                        setcookie("PHPMYRING_langue", "$lang", time() + 3600 * 24 * 30);
                    }
                }
            }
        }
    }
    include $chemin . "lang/" . $lang . ".php";
}
