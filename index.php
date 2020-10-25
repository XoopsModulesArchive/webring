<?php
// WebRing pour Xoops
// kyex 052002 - http://kyex.inconnueteam.net
// v0.1
//
// index.php : pour les anonymes : juste la liste des webrings et des sites
// pour les membres : ajout de site dans un webring
// --------------------------------------------------------------------------
// WebRing Converted to E-Xoops by
//
// Johan Carleson, linuxdude@home.se
// http://e-xoops.carleson.net
// --------------------------------------------------------------------------
include 'header.php';
if ('webring' == $xoopsConfig['startpage']) {
    $xoopsOption['show_rblock'] = 1;

    require XOOPS_ROOT_PATH . '/header.php';

    make_cblock();

    echo '<br>';
} else {
    $xoopsOption['show_rblock'] = 0;

    require XOOPS_ROOT_PATH . '/header.php';
}
include 'class/class.webring.php';
OpenTable();
echo '<center><table border=1 width=100%>' . '<tr class="bg2">' . '<td align=center>' . _WR_NOM . '</td>' . '<td align=center>' . _WR_IMAGE . '</td>' . '<td align=center>' . _WR_DESC . '</td>' . '</tr>';
$listeWR = WebRing::listeWebRing();
foreach ($listeWR as $wr) {
    if ('' != $wr->image) {
        $image = '<img src="' . $wr->image . '">';
    } else {
        $image = '';
    }

    echo '<tr class="bg3">' . '<td align=left><a href="webring.php?wrid=' . $wr->wrid . '">' . $wr->nom . '</a></td>' . "<td align=center>$image</td>" . '<td align=left>' . $wr->description . '</td>' . '</tr>';
}
echo '</table></center>';
CloseTable();
require XOOPS_ROOT_PATH . '/footer.php';
