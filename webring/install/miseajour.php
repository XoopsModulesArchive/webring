<?php

/* ----------------------------------------------------------------------------
I N S T A L L A T I O N
- Mise à jour -
PHPMyRing (4.0) dernière modification du fichier [17-12-02]
---------------------------------------------------------------------------- */
$VEC = "4.0.2";
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
// Le français est la langue par défaut (et oui ;)
if (!isset($LANGINS)) {
    $LANGINS = "fr";
}
require "../lang/" . $LANGINS . ".php";
// Vérification qu'il n'existe pas la table admin
connecte();
// Vérification que le fichier de config a été édité
if (!$base) {
    echo "Vous n'avez pas éditer le fichier de configuration. Voyez la documentation pour celà";
    exit;
} elseif (!mysql_db_query($base, "SELECT idadm FROM webring_adm")) {
    echo "Impossible d'effectuer la mise &agrave; jour, veuillez s&eacute;lectionner \"Installation\"";
    exit;
} else {
    // Mise à jour de la table webring_conf
    requete("ALTER TABLE webring_conf MODIFY mailadm VARCHAR(50) NOT NULL DEFAULT 'all'"); ?>
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
<p><u><?php echo $L['premiere_etape']; ?></u> &gt; <?php echo $L['connexion_admin']; ?></p>
    <?php
    $maj = 1;
    require __DIR__ . '/formauth.php';
    // fin du else si il n'y a pas de table
}
?>
