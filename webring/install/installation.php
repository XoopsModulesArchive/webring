<?php

/* ----------------------------------------------------------------------------
I N S T A L L A T I O N
- Installation -
PHPMyRing (4.0) dernière modification du fichier [17-12-02]
---------------------------------------------------------------------------- */
$VEC = "4.0.2";
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
// Le français est la langue par défaut (et oui ;)
if (!isset($LANGINS)) {
    $LANGINS = "en";
}
require "../lang/" . $LANGINS . ".php";
// Vérification qu'il n'existe pas la table admin
$conn = connecte();
// Vérification que le fichier de config a été édité
if (!$base) {
    echo $L['pas_conf'];
    exit;
} elseif (mysql_db_query($base, "SELECT idadm FROM webring_adm")) {
    echo $L['err_config'];
    $GLOBALS['xoopsDB']->close();
    exit;
} else {
    ?>
<html>
<head>
    <title><?php echo $L['titre'] . $VEC; ?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
    <style type="text/css">
        <!--
        body {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 10px;
            font-style: normal;
            line-height: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            color: #000066
        }

        table {
            font-family: Verdana, Arial, Helvetica, sans-serif;
            font-size: 10px;
            font-style: normal;
            line-height: normal;
            font-weight: normal;
            font-variant: normal;
            text-transform: none;
            color: #000066
        }

        -->
    </style>
</head>
<body bgcolor="#FFFFFF" text="#000000">
<div align="center">
    <font face="Arial, Helvetica, sans-serif" size="3" color="#000066">
        <b>- <?php echo $L['titre'] . $VEC; ?> -</b>
    </font>
</div>
<hr width="200" size="1" \>
<p>
    <u><?php echo $L['premiere_etape']; ?></u> &gt; <?php echo $L['creation_admin']; ?>
</p>
<?php
if ($go == 1) {
        // Vérification des champs
        $erreur_crea = $L['err_pb'] . "<blockquote>";
        if (!$loginadmN) {
            $aille       = 1;
            $erreur_crea .= "- " . $L['login'] . "<br>";
        }
        if (!$passadmN) {
            $aille       = 1;
            $erreur_crea .= "- " . $L['lemdp'] . "<br>";
        }
        if (!$nomadmN) {
            $aille       = 1;
            $erreur_crea .= "- " . $L['lenom'] . "<br>";
        }
        if (!is_email($emailadmN)) {
            $aille       = 1;
            $erreur_crea .= "- " . $L['ad_email'] . "<br>";
        }
        if ($aille == 1) {
            $erreur_crea .= "</blockquote>" . $L['corrige_les'];
            require __DIR__ . '/forminstall_admin.php';
            echo "</body>" . "</html>";
            exit;
        } else {
            // Création des tables
            $conn = connecte();
            # #
            # Table webring
            # #
            if (requete(
                "CREATE TABLE webring
(
idsite TINYINT NOT NULL AUTO_INCREMENT UNIQUE,
site_nom VARCHAR(100) NOT NULL UNIQUE,
url VARCHAR(100) NOT NULL UNIQUE,
description VARCHAR(254) NOT NULL,
webmaster VARCHAR(50) NOT NULL,
email VARCHAR(50) NOT NULL UNIQUE,
pseudo VARCHAR(20) NOT NULL UNIQUE,
mdp VARCHAR(20) NOT NULL,
visites SMALLINT(4) DEFAULT '0',
date DATE NOT NULL DEFAULT '0000-00-00',
page VARCHAR(254),
accept TINYINT(1) NOT NULL DEFAULT '0',
PRIMARY KEY (idsite)
)"
            )) {
                echo $L['la_table'] . " <b>webring</b> " . $L['creation_ok'] . "<br>";
                addinlog("../", "Création de la table webring par $nomadmN", "OK");
            } else {
                addinlog("../", "Création de la table webring par $nomadmN", "ERREUR");
            }
            # #
            # Table webring_com
            # #
            if (requete(
                "CREATE TABLE webring_com
(
idcom TINYINT NOT NULL AUTO_INCREMENT,
idsite TINYINT NOT NULL,
auteur VARCHAR(15) NOT NULL,
texte CHAR(255) NOT NULL,
note SMALLINT(2) DEFAULT '0',
date DATE NOT NULL DEFAULT '0000-00-00',
PRIMARY KEY(idcom)
)"
            )) {
                echo $L['la_table'] . " <b>webring_com</b> " . $L['creation_ok'] . "<br>";
                addinlog("../", "Création de la table webring_com par $nomadmN", "OK");
            } else {
                addinlog("../", "Création de la table webring_com par $nomadmN", "ERREUR");
            }
            # #
            # Table webring_adm
            # #
            if (requete(
                "CREATE TABLE webring_adm
(
idadm TINYINT NOT NULL AUTO_INCREMENT,
loginadm VARCHAR(10) NOT NULL,
passadm VARCHAR(10) NOT NULL,
nomadm VARCHAR(100) NOT NULL,
emailadm VARCHAR(50) NOT NULL,
PRIMARY KEY (idadm)
)"
            )) {
                echo $L['la_table'] . " <b>webring_adm</b> " . $L['creation_ok'] . "<br>";
                addinlog("../", "Création de la table webring_adm par $nomadmN", "OK");
            } else {
                addinlog("../", "Création de la table webring_adm par $nomadmN", "ERREUR");
            }
            # #
            # Table webring_conf
            # #
            if (requete(
                "CREATE TABLE webring_conf (
idconf TINYINT(4) NOT NULL AUTO_INCREMENT,
lang CHAR(3) NOT NULL DEFAULT '',
mailadm VARCHAR(50) NOT NULL DEFAULT 'all',
signature TINYTEXT NOT NULL,
adresse_site VARCHAR(100) NOT NULL DEFAULT '',
dossierwr VARCHAR(50) NOT NULL DEFAULT '',
type VARCHAR(50) NOT NULL DEFAULT '',
nomwr VARCHAR(20) NOT NULL DEFAULT '',
jrnew SMALLINT(2) DEFAULT '7',
classement VARCHAR(15) DEFAULT NULL,
nbre SMALLINT(2) NOT NULL DEFAULT '0',
nbre_rech SMALLINT(2) NOT NULL DEFAULT '5',
ordre VARCHAR(4) NOT NULL DEFAULT '',
msg_acc MEDIUMTEXT NOT NULL,
msg_desac MEDIUMTEXT NOT NULL,
msg_supp_script MEDIUMTEXT NOT NULL,
msg_insc MEDIUMTEXT NOT NULL,
msg_refus MEDIUMTEXT NOT NULL,
msg_supp_decision MEDIUMTEXT NOT NULL,
rappel_ident MEDIUMTEXT NOT NULL,
version VARCHAR(6) DEFAULT NULL,
PRIMARY KEY (idconf)
)"
            )) {
                echo $L['la_table'] . " <b>webring_conf</b> " . $L['creation_ok'] . "<br>";
                addinlog("../", "Création de la table webring_conf par $nomadmN", "OK");
            } else {
                addinlog("../", "Création de la table webring_conf par $nomadmN", "ERREUR");
            }
            # #
            # Ajout administrateur
            # #
            if (requete(
                "INSERT INTO webring_adm " . "VALUES" . "('','$loginadmN','$passadmN','$nomadmN','$emailadmN')"
            )) {
                echo $L['compte_admin_ok'];
                addinlog("../", "Creation du compte administrateur $nomadmN", "OK");
            } else {
                addinlog("../", "Creation du compte administrateur $nomadmN", "ERREUR");
            } ?>
        <p><?php echo $L['continuation_installation']; ?>
        </p>
        <?php
        require __DIR__ . '/formauth.php';
            // fin du else de vérif
        }
        // Fin du if de go
    } else {
        require __DIR__ . '/forminstall_admin.php';
    }
    // Fin du else de config déjà faite
}
?>
</p>
</body>
</html>
