<?php
// Installation du module WebRings
// Le mode d'emploi est dans docs/install.txt
// Generation de ce fichier install.php par kig v0.2, kyex - mai 2002
include '../../../mainfile.php';
if (file_exists('language/' . $xoopsConfig['language'] . '/main.php')) {
    include 'language/' . $xoopsConfig['language'] . '/main.php';
} else {
    include 'language/english/main.php';
}
function entete()
{
    echo '' . '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">' . '<HTML>' . '<HEAD>' . '<TITLE>' . _KIG_COMMENT_INSTALL . 'WebRings</TITLE>' . '</HEAD>' . '<BODY>' . '<CENTER><H1>' . _KIG_COMMENT_INSTALL . 'WebRings</H1></CENTER><br><br>';
}

function pied()
{
    echo '</BODY></HTML>';
}

function license()
{
    entete();

    echo '' . '<center>';

    echo 'License<br>' . '<textarea name="license" cols=50 rows=8>';

    include '../docs/licence.txt';

    echo '</textarea><br><br>' . 'Credits<br>' . '<textarea name="credits" cols=80 rows=8>';

    include '../docs/credits.txt';

    echo '</textarea><br><br>' . '</center>' . '<form action=install.php method="post">' . '<center>' . '<input type="submit" name="op" value="Suite">' . '</center>' . '</form>';

    pied();
}

function CreationTables()
{
    global $db, $dbhost, $dbuname, $dbpass, $dbname;

    global $prefix;

    entete();

    echo '<h2>' . _KIG_CREATE_TABLE . $db->prefix('webring') . '</h2>';

    $result = $db->query('DROP TABLE IF EXISTS ' . $db->prefix('webring'));

    $result = $db->query(
        'CREATE TABLE ' . $db->prefix('webring') . ' (
wrid int(5) NOT NULL auto_increment,
nom varchar(50) NOT NULL,
image varchar(100),
description varchar(100),
PRIMARY KEY (wrid))
ENGINE = ISAM;'
    );

    echo '<h2>' . _KIG_CREATE_TABLE . $db->prefix('webringsite') . '</h2>';

    $result = $db->query('DROP TABLE IF EXISTS ' . $db->prefix('webringsite'));

    $result = $db->query(
        'CREATE TABLE ' . $db->prefix('webringsite') . " (
id int(5) NOT NULL auto_increment,
uid int(5) DEFAULT '0' NOT NULL,
wrid int(5) DEFAULT '0' NOT NULL,
nom varchar(50) NOT NULL,
url varchar(100) NOT NULL,
description varchar(100),
entrees int(7) DEFAULT '0' NOT NULL,
sorties int(7) DEFAULT '0' NOT NULL,
PRIMARY KEY (id),
KEY idxwrid (wrid))
ENGINE = ISAM;"
    );

    // accès à la suite :)

    echo '<form action=install.php method="post">'
         . '<center>'
         . _KIG_TABLES_CREEES
         . '<br>'
         . '<table width="50%" align=center>'
         . '<tr>'
         . '<td align=center>'
         . '<INPUT type="hidden" name="rien" value="rien">'
         . '<INPUT type="submit" name="op" value="Continue">'
         . '</td>'
         . '</tr>'
         . '</table>'
         . '</center>'
         . '</form>';

    pied();
}

function InsertionValeurs()
{
    global $db, $dbhost, $dbuname, $dbpass, $dbname;

    global $prefix;

    entete();

    echo '<h2>' . _KIG_INSERT_TABLES . '</h2>';

    echo _KIG_INSERT_OK . '<br>';

    echo '<center>' . _KIG_INSTALL_OK . '</center>';

    echo _KIG_DELREP . '<b>webring/install</b><br>';

    pied();
}

switch ($op) {
    case 'Suite':
        CreationTables();
        break;
    case 'Continue':
        InsertionValeurs();
        break;
    default:
        license();
        break;
}
