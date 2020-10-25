<?

/* ----------------------------------------------------------------------------
R E F U S E R U N S I T E
PHPMyRing (4.0) dernière modification du fichier [05-12-02]
---------------------------------------------------------------------------- */
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
// VERIFICATION DE L'ACCES
session_start();
if (!isset(\<?

/* ----------------------------------------------------------------------------
R E F U S E R U N S I T E
PHPMyRing (4.0) dernière modification du fichier [05-12-02]
---------------------------------------------------------------------------- */
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
// VERIFICATION DE L'ACCES
session_start();
if (!session_is_registered('idadm')) {
    echo $L['session_ferm'];
    include "formauth.php";
    exit;
}
require __DIR__ . '/haut.php';
$conn = connecte();
// On va chercher qq trucs avant de supprimer le site
$res = requete(
    "SELECT email,webmaster,site_nom,pseudo,mdp " . "FROM webring " . "WHERE idsite='$idsite'"
);
$row = $GLOBALS['xoopsDB']->fetchBoth($res);
?>
    <p align="center">
        <?
        // On va suprimer le site
        if (requete("DELETE FROM webring WHERE idsite='$idsite'")) {
            addinlog("../", "Refus du site N° $idsite", "OK");
            // Petit coup de balayette :
            requete("OPTIMIZE TABLE webring");
            //$GLOBALS['xoopsDB']->close();
            // Configuration
            //$conf=config();
            $SIGN = StripSlashes($conf['signature']);
            $TYPE = StripSlashes($conf['type']);
            $NOM  = StripSlashes($conf['nomwr']);
            // Courrier pour informer du refus !
            $webmaster = $row['webmaster'];
            $mailadm   = recupemail();
            courrier(
                $mailadm,
                $row['email'],
                "[$NOM] " . $L['dem_refus'],
                resolve($idsite, StripSlashes($conf['msg_refus']))
            );
            echo $L['info_refus1'] . " " . $idsite . " " . $L['info_refus2'];
        } else {
            addinlog("../", "Refus du site N° $idsite", "ERREUR");
            echo $L['info_refus_err'] . " " . $idsite;
        }
        ?>
    </p>
<?
require __DIR__ . '/bas.php';
?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    include "formauth.php";
    exit;
}
require __DIR__ . '/haut.php';
$conn = connecte();
// On va chercher qq trucs avant de supprimer le site
$res = requete(
    "SELECT email,webmaster,site_nom,pseudo,mdp " . "FROM webring " . "WHERE idsite='$idsite'"
);
$row = $GLOBALS['xoopsDB']->fetchBoth($res);
?>
    <p align="center">
        <?
        // On va suprimer le site
        if (requete("DELETE FROM webring WHERE idsite='$idsite'")) {
            addinlog("../", "Refus du site N° $idsite", "OK");
            // Petit coup de balayette :
            requete("OPTIMIZE TABLE webring");
            //$GLOBALS['xoopsDB']->close();
            // Configuration
            //$conf=config();
            $SIGN = StripSlashes($conf['signature']);
            $TYPE = StripSlashes($conf['type']);
            $NOM  = StripSlashes($conf['nomwr']);
            // Courrier pour informer du refus !
            $webmaster = $row['webmaster'];
            $mailadm   = recupemail();
            courrier(
                $mailadm,
                $row['email'],
                "[$NOM] " . $L['dem_refus'],
                resolve($idsite, StripSlashes($conf['msg_refus']))
            );
            echo $L['info_refus1'] . " " . $idsite . " " . $L['info_refus2'];
        } else {
            addinlog("../", "Refus du site N° $idsite", "ERREUR");
            echo $L['info_refus_err'] . " " . $idsite;
        }
        ?>
    </p>
<?
require __DIR__ . '/bas.php';
?>
