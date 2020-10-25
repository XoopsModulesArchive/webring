<?php
// param : op dans (suiv,prec,hasard)
// id = identifiant du site d'origine
// retour : url
include 'header.php';
include 'class/class.webring.php';
$site = new webringsite($id);
if ($site->id) {
    switch ($op) {
        case 'suiv':
            $newsite = $site->suivant();
            break;
        case 'prec':
            $newsite = $site->precedent();
            break;
        case 'hasard':
            $newsite = $site->hasard();
            break;
        default:
            $newsite = $xoopsConfig['xoops_url'] . '/modules/webring/';
            exit;
    }

    //echo "op=$op,id=$id.<br>";

    //echo "id=".$newsite->id." url=".$newsite->url."<br>";

    header('Location: ' . $newsite->url);
} else {
    header('Location: ' . $xoopsConfig['xoops_url'] . '/modules/webring/');
}
