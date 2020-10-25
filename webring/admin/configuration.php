<?

/* ----------------------------------------------------------------------------
C O N F I G U R A T I O N P O S T - I N S T A L L A T I O N
PHPMyRing (4.0) dernière modification du fichier [23-11-02]
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/fonctions.php';
require dirname(__DIR__) . '/include/config.php';
InsertLang('../', $conf['lang']);
if (!isset(\<?

/* ----------------------------------------------------------------------------
C O N F I G U R A T I O N P O S T - I N S T A L L A T I O N
PHPMyRing (4.0) dernière modification du fichier [23-11-02]
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/fonctions.php';
require dirname(__DIR__) . '/include/config.php';
InsertLang('../', $conf['lang']);
if (!session_is_registered('idadm')) {
    echo $L['session_ferm'];
    exit;
}
require __DIR__ . '/haut.php';
if ($go == 1) {
    connecte();
    $version = $conf['version'];
    // MODIFICATION DES CHAMPS
    $nomwr             = AddSlashes($nomwr);
    $msg_desac         = AddSlashes($msg_desac);
    $msg_supp_script   = AddSlashes($msg_supp_script);
    $msg_insc          = AddSlashes($msg_insc);
    $msg_acc           = AddSlashes($msg_acc);
    $rappel_ident      = AddSlashes($rappel_ident);
    $msg_refus         = AddSlashes($msg_refus);
    $msg_supp_decision = AddSlashes($msg_supp_decision);
    $rqt               = "REPLACE INTO webring_conf "
                         . "(idconf,lang,signature,adresse_site,dossierwr,type,nomwr,jrnew,classement,nbre,"
                         . "msg_desac,msg_supp_script,msg_insc,nbre_rech,ordre,mailadm,msg_acc,"
                         . "rappel_ident,msg_refus,msg_supp_decision,version) "
                         . "VALUES"
                         . "('1','$lang','$signature','$adresse_site','$dossierwr','$type','$nomwr','$jrnew','$classement','$nbre',"
                         . "'$msg_desac','$msg_supp_script','$msg_insc','$nbre_rech','$ordre','$mailadm','$msg_acc',"
                         . "'$rappel_ident','$msg_refus','$msg_supp_decision','$version')";
    if (requete($rqt)) {
        addinlog("../", "Modfication de la configuration par $nomadm", "OK");
        echo "<p align=\"center\">Mise à jour effectuée !";
        echo "<br><a href=\"index.php\">Retour à l'accueil</a></p>";
    } else {
        addinlog("../", "Modfication de la configuration par $nomadm", "ERREUR");
        echo "Erreur lors de la mise à jour des données !";
    }
} else {
    $maj = 1;
    require dirname(__DIR__) . '/install/formconf.php';
}
require __DIR__ . '/bas.php';
?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
}
require __DIR__ . '/haut.php';
if ($go == 1) {
    connecte();
    $version = $conf['version'];
    // MODIFICATION DES CHAMPS
    $nomwr             = AddSlashes($nomwr);
    $msg_desac         = AddSlashes($msg_desac);
    $msg_supp_script   = AddSlashes($msg_supp_script);
    $msg_insc          = AddSlashes($msg_insc);
    $msg_acc           = AddSlashes($msg_acc);
    $rappel_ident      = AddSlashes($rappel_ident);
    $msg_refus         = AddSlashes($msg_refus);
    $msg_supp_decision = AddSlashes($msg_supp_decision);
    $rqt               = "REPLACE INTO webring_conf "
                         . "(idconf,lang,signature,adresse_site,dossierwr,type,nomwr,jrnew,classement,nbre,"
                         . "msg_desac,msg_supp_script,msg_insc,nbre_rech,ordre,mailadm,msg_acc,"
                         . "rappel_ident,msg_refus,msg_supp_decision,version) "
                         . "VALUES"
                         . "('1','$lang','$signature','$adresse_site','$dossierwr','$type','$nomwr','$jrnew','$classement','$nbre',"
                         . "'$msg_desac','$msg_supp_script','$msg_insc','$nbre_rech','$ordre','$mailadm','$msg_acc',"
                         . "'$rappel_ident','$msg_refus','$msg_supp_decision','$version')";
    if (requete($rqt)) {
        addinlog("../", "Modfication de la configuration par $nomadm", "OK");
        echo "<p align=\"center\">Mise à jour effectuée !";
        echo "<br><a href=\"index.php\">Retour à l'accueil</a></p>";
    } else {
        addinlog("../", "Modfication de la configuration par $nomadm", "ERREUR");
        echo "Erreur lors de la mise à jour des données !";
    }
} else {
    $maj = 1;
    require dirname(__DIR__) . '/install/formconf.php';
}
require __DIR__ . '/bas.php';
?>
