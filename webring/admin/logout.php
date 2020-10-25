<?php

/* ----------------------------------------------------------------------------
F E R M E T U R E D E L A S E S S I O N
PHPMyRing (2.0) dernière modification du fichier [24-07-02]
---------------------------------------------------------------------------- */
session_start();
session_unset();
session_destroy();
require dirname(__DIR__) . '/include/fonctions.php';
addinlog("../", "Déconnexion administrateur", "OK");
header('location:../index.php');
