<?php

/* ----------------------------------------------------------------------------
E N V O Y E R U N M E S S A G E
A U X M E M B R E S
- Envoi du message -
PHPMyRing (4.0) dernière modification du fichier [05-12-02]
---------------------------------------------------------------------------- */
session_start();
// Accès par session
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
if (session_register("idadm")) {
    // Analyse du contenu...
    if ((!$titre) || (!$texte)) {
        $message = $L['form_inc'];
        header("Location: msg_mbres.php?message=$message&titre=$titre&texte=$texte&envoyera=$envoyera");
    } else {
        // Création de la requête
        $rqt = "SELECT email " . "FROM webring ";
        if ($envoyera != "*") {
            $rqt .= " WHERE accept='" . $envoyera . "'";
        }
        // Allons-y, on va chercher les mails des membres
        $conn = connecte();
        $res  = requete($rqt);
        while (false !== ($row = $GLOBALS['xoopsDB']->fetchBoth($res))) {
            $to .= $row['email'];
            $to .= ",";
        }
        // Configuration
        //$conf=config();
        if ($signature == 1) {
            $texte .= "\n" . $conf['signature'];
        }
        $titre = StripSlashes($titre);
        $texte = StripSlashes($texte);
        if (courrier(recupemail(), $to, $titre, $texte)) {
            $message = $L['msg_env'];
            addinlog("../", "Envoi d'un message aux membres ($envoyera)", "OK");
        } else {
            $message = $L['msg_env_err'];
            addinlog("../", "Envoi d'un message aux membres ($envoyera)", "ERREUR");
        }
        header("Location: msg_mbres.php?message=$message&titre=$titre&texte=$texte&envoyera$envoyera");
    }
} else {
    // login incorrect!!!!
    echo $L['session_ferm'];
}
