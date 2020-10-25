<?

/* ----------------------------------------------------------------------------
I N S T A L L A T I O N
- Configuration -
PHPMyRing (4.0) dernière modification du fichier [21-11-02]
---------------------------------------------------------------------------- */
session_start();
$VEC = "4.0.1";
// Inclusions
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
// Le français est la langue par défaut (et oui ;)
if (!isset($LANGINS)) {
    $LANGINS = "en";
}
require "../lang/" . $LANGINS . ".php";
if (!isset(\<?

/* ----------------------------------------------------------------------------
I N S T A L L A T I O N
- Configuration -
PHPMyRing (4.0) dernière modification du fichier [21-11-02]
---------------------------------------------------------------------------- */
session_start();
$VEC = "4.0.1";
// Inclusions
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
// Le français est la langue par défaut (et oui ;)
if (!isset($LANGINS)) {
    $LANGINS = "en";
}
require "../lang/" . $LANGINS . ".php";
if (!session_is_registered("idadm")) {
    /////////////////////////////////////
    // Authentification //
    /////////////////////////////////////
    // Le formulaire si le contenu est vide
    if ((!$pseudook) or (!$passok)) {
        $erreur = $L['champs_vides'];
        require __DIR__ . '/haut.php';
        require __DIR__ . '/formauth.php';
        exit;
    }
    // Vérification de l'accès...
    connecte();
    $res    = requete("SELECT idadm,nomadm FROM webring_adm WHERE loginadm='$pseudook' AND passadm='$passok'");
    $machin = $GLOBALS['xoopsDB']->fetchBoth($res);
    $idadm  = $machin['idadm'];
    if ($GLOBALS['xoopsDB']->getRowsNum($res) == 1) {
        session_start();
        $nomadm = $machin['nomadm'];
        if ($maj == 1) {
            session_register('idadm', 'nomadm');
        } else {
            $conf = config();
            session_register('idadm', 'nomadm', "conf");
        }
        addinlog("../", "Connexion de l'administrateur $nomadm", "OK");
        // Retour à la page....
        $url = "Location: $PHP_SELF?maj=$maj&LANGINS=$LANGINS";
        header($url);
    } else {
        // login incorrect!!!!
        echo $L['login_erreur'];
        require __DIR__ . '/haut.php';
        require __DIR__ . '/formauth.php';
        exit;
    }
    // Fin du if !session register
} else {
    /////////////////////////////////////
    // Contenu de la page //
    /////////////////////////////////////
    require __DIR__ . '/haut.php';
    if ($go == 1) {
        // MODIFICATION DES CHAMPS
        $nomwr             = AddSlashes($nomwr);
        $msg_desac         = AddSlashes($msg_desac);
        $msg_supp_script   = AddSlashes($msg_supp_script);
        $msg_insc          = AddSlashes($msg_insc);
        $msg_acc           = AddSlashes($msg_acc);
        $rappel_ident      = AddSlashes($rappel_ident);
        $msg_refus         = AddSlashes($msg_refus);
        $msg_supp_decision = AddSlashes($msg_supp_decision);
        // Ajout dans la table
        connecte();
        if ($maj == 1) {
            $action = "Mise a jour du webring - configuration par $nomadm";
            $rqt    = "REPLACE INTO webring_conf "
                      . "(idconf,lang,signature,adresse_site,dossierwr,type,nomwr,jrnew,classement,nbre,"
                      . "version,msg_desac,msg_supp_script,msg_insc,nbre_rech,ordre,mailadm,msg_acc,"
                      . "rappel_ident,msg_refus,msg_supp_decision) "
                      . "VALUES"
                      . "('1','$lang','$signature','$adresse_site','$dossierwr','$type','$nomwr','$jrnew','$classement','$nbre',"
                      . "'$VEC','$msg_desac','$msg_supp_script','$msg_insc','$nbre_rech','$ordre','$mailadm','$msg_acc',"
                      . "'$rappel_ident','$msg_refus','$msg_supp_decision')";
        } else {
            $action = "Installation du webring - configuration par $nomadm";
            $rqt    = "INSERT INTO webring_conf "
                      . "(idconf,lang,signature,adresse_site,dossierwr,type,nomwr,jrnew,classement,nbre,"
                      . "version,msg_desac,msg_supp_script,msg_insc,nbre_rech,ordre,mailadm,msg_acc,"
                      . "rappel_ident,msg_refus,msg_supp_decision) "
                      . "VALUES"
                      . "('1','$lang','$signature','$adresse_site','$dossierwr','$type','$nomwr','$jrnew','$classement','$nbre',"
                      . "'$VEC','$msg_desac','$msg_supp_script','$msg_insc','$nbre_rech','$ordre','$mailadm','$msg_acc',"
                      . "'$rappel_ident','$msg_refus','$msg_supp_decision')";
        }
        if (requete($rqt)) {
            addinlog("../", $action, "OK");
            echo $L['fin'];
        } else {
            addinlog("../", $action, "ERREUR");
            echo "Impossible d'effectuer la configuration!";
        }
    } else {
        require __DIR__ . '/formconf.php';
    }
    // Fin du else dun contenu de la page
}
?>
</body>
</html>
SESSION["idadm"])) {
    /////////////////////////////////////
    // Authentification //
    /////////////////////////////////////
    // Le formulaire si le contenu est vide
    if ((!$pseudook) or (!$passok)) {
        $erreur = $L['champs_vides'];
        require __DIR__ . '/haut.php';
        require __DIR__ . '/formauth.php';
        exit;
    }
    // Vérification de l'accès...
    connecte();
    $res    = requete("SELECT idadm,nomadm FROM webring_adm WHERE loginadm='$pseudook' AND passadm='$passok'");
    $machin = $GLOBALS['xoopsDB']->fetchBoth($res);
    $idadm  = $machin['idadm'];
    if ($GLOBALS['xoopsDB']->getRowsNum($res) == 1) {
        session_start();
        $nomadm = $machin['nomadm'];
        if ($maj == 1) {
            session_register('idadm', 'nomadm');
        } else {
            $conf = config();
            session_register('idadm', 'nomadm', "conf");
        }
        addinlog("../", "Connexion de l'administrateur $nomadm", "OK");
        // Retour à la page....
        $url = "Location: $PHP_SELF?maj=$maj&LANGINS=$LANGINS";
        header($url);
    } else {
        // login incorrect!!!!
        echo $L['login_erreur'];
        require __DIR__ . '/haut.php';
        require __DIR__ . '/formauth.php';
        exit;
    }
    // Fin du if !session register
} else {
    /////////////////////////////////////
    // Contenu de la page //
    /////////////////////////////////////
    require __DIR__ . '/haut.php';
    if ($go == 1) {
        // MODIFICATION DES CHAMPS
        $nomwr             = AddSlashes($nomwr);
        $msg_desac         = AddSlashes($msg_desac);
        $msg_supp_script   = AddSlashes($msg_supp_script);
        $msg_insc          = AddSlashes($msg_insc);
        $msg_acc           = AddSlashes($msg_acc);
        $rappel_ident      = AddSlashes($rappel_ident);
        $msg_refus         = AddSlashes($msg_refus);
        $msg_supp_decision = AddSlashes($msg_supp_decision);
        // Ajout dans la table
        connecte();
        if ($maj == 1) {
            $action = "Mise a jour du webring - configuration par $nomadm";
            $rqt    = "REPLACE INTO webring_conf "
                      . "(idconf,lang,signature,adresse_site,dossierwr,type,nomwr,jrnew,classement,nbre,"
                      . "version,msg_desac,msg_supp_script,msg_insc,nbre_rech,ordre,mailadm,msg_acc,"
                      . "rappel_ident,msg_refus,msg_supp_decision) "
                      . "VALUES"
                      . "('1','$lang','$signature','$adresse_site','$dossierwr','$type','$nomwr','$jrnew','$classement','$nbre',"
                      . "'$VEC','$msg_desac','$msg_supp_script','$msg_insc','$nbre_rech','$ordre','$mailadm','$msg_acc',"
                      . "'$rappel_ident','$msg_refus','$msg_supp_decision')";
        } else {
            $action = "Installation du webring - configuration par $nomadm";
            $rqt    = "INSERT INTO webring_conf "
                      . "(idconf,lang,signature,adresse_site,dossierwr,type,nomwr,jrnew,classement,nbre,"
                      . "version,msg_desac,msg_supp_script,msg_insc,nbre_rech,ordre,mailadm,msg_acc,"
                      . "rappel_ident,msg_refus,msg_supp_decision) "
                      . "VALUES"
                      . "('1','$lang','$signature','$adresse_site','$dossierwr','$type','$nomwr','$jrnew','$classement','$nbre',"
                      . "'$VEC','$msg_desac','$msg_supp_script','$msg_insc','$nbre_rech','$ordre','$mailadm','$msg_acc',"
                      . "'$rappel_ident','$msg_refus','$msg_supp_decision')";
        }
        if (requete($rqt)) {
            addinlog("../", $action, "OK");
            echo $L['fin'];
        } else {
            addinlog("../", $action, "ERREUR");
            echo "Impossible d'effectuer la configuration!";
        }
    } else {
        require __DIR__ . '/formconf.php';
    }
    // Fin du else dun contenu de la page
}
?>
</body>
</html>
