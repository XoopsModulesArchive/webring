<?php
// WebRing pour Xoops
// kyex 052002 - http://kyex.inconnueteam.net
// v0.1
//
// webring.php : pour les anonymes : juste la liste des sites du
// pour les membres : ajout de site dans le webring possible
// parametre : wrid = id du webring a afficher
// -----------------------------------------------------------------------
// WebRing Converted to E-Xoops by
//
// Johan Carleson, linuxdude@home.se
// http://e-xoops.carleson.net
// -----------------------------------------------------------------------
include 'header.php';
require XOOPS_ROOT_PATH . '/header.php';
include 'class/class.webring.php';
if (!isset($wrid)) {
    exit;
}
OpenTable();
$wr = new WebRing($wrid);
$sites = $wr->sites();
echo '<center><table border=1 width=100%>' . '<tr class="bg2">' . '<td align=center>' . _WRS_NOM . '</td>' //."<td align=center>"._WRS_UID."</td>"
     . '<td align=center>' . _WRS_DESC . '</td>' . '<td align=center>' . _WRS_ENTREES . '</td>' . '<td align=center>' . _WRS_SORTIES . '</td>' . '</tr>';
if ($xoopsUser) {
    $uid = $xoopsUser->uid();
} else {
    $uid = 0;
}
foreach ($sites as $site) {
    echo '<tr class="bg3">' . '<td>';

    if ($site->uid == $uid) {
        echo '<a href="editer.php?op=edit&id=' . $site->id . '"><img src="images/editer.gif"></a>';
    } else {
        echo '<img src="images/spacer_editer.gif">';
    }

    echo '&nbsp;<a href="' . $site->url . '">' . $site->nom . '</a></td>' . '<td>' . $site->description . '</td>' . '<td>' . $site->entrees . '</td>' . '<td>' . $site->sorties . '</td>' . '</tr>';
}
echo '</table></center>';
if ($xoopsUser) {
    echo "<a href=\"editer.php?op=ajout&wrid=$wrid\">" . _WRS_AJOUTER_SITE . '</a>';
} else {
    echo _WRS_NO_ANO;
}
CloseTable();
require XOOPS_ROOT_PATH . '/footer.php';
