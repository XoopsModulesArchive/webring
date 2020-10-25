<?php

$modversion['name']        = _MI_WEBRING_NOM;
$modversion['version']     = "0.1.3";
$modversion['description'] = _MI_WEBRING_DESC;
$modversion['author']      = "kyex";
$modversion['credits']     = "docs/credits.txt";
$modversion['help']        = "docs/install.txt";
$modversion['license']     = "GPL see docs/LICENSE.txt";
$modversion['official']    = 0;
$modversion['image']       = "kyexring.jpg";
$modversion['dirname']     = "webring";
// Admin things
$modversion['hasAdmin']   = 1;
$modversion['adminindex'] = "admin/index.php";
// Menu
$modversion['hasMain'] = 1;
//SQL
$modversion['sqlfile']['mysql'] = "install/webring.sql";
$modversion['tables'][0]        = "webring";
$modversion['tables'][1]        = "webringsite";
