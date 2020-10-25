<?

/* ---------------------------------------------------------------------------- 
V E R I F I C A T I O N P R E S E N C E D U S C R I P T 
> Vérification automatique < 
PHPMyRing (4.0) dernière modification du fichier [16-11-02] 
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
// VERIFICATION DE L'ACCES 
if (!isset(\<?

/* ---------------------------------------------------------------------------- 
V E R I F I C A T I O N P R E S E N C E D U S C R I P T 
> Vérification automatique < 
PHPMyRing (4.0) dernière modification du fichier [16-11-02] 
---------------------------------------------------------------------------- */
session_start();
require dirname(__DIR__) . '/include/config.php';
require dirname(__DIR__) . '/include/fonctions.php';
InsertLang('../', $conf['lang']);
// VERIFICATION DE L'ACCES 
if (!session_is_registered('idadm')) {
    echo $L['session_ferm'];
    exit;
}
require __DIR__ . '/haut.php';
$conn = connecte();
$rqt  = "SELECT site_nom,page,accept FROM webring WHERE idsite='$idsite'";
$res  = requete($rqt);
$row  = $GLOBALS['xoopsDB']->fetchBoth($res);
$a    = $row['accept'];
if ($a == 1) {
    $b = $L['actif'];
}
if ($a == 2) {
    $b = $L['desactiv'];
}
// Vérification du site 
$page = $row['page']; // La page à analyser
$res  = Analyse("PHPMyRing", $page);
if ($res == 0) {
    $result = $L['existe_po'];
}
if ($res == 1) {
    $result = $L['contient_wr'];
}
if ($res == 2) {
    $result = $L['contient_po'];
}
?>
    <br>
    <form method="post" action="verification2.php">
        <input type="hidden" name="idsite" value="<? echo $idsite; ?>">
        <table width="500" border="0" align="center" class="table_liste">
            <tr>
                <td colspan="2" class="cellule_liste"><? echo $L['ver_site']; ?><? echo $row['site_nom']; ?></td>
            </tr>
            <tr>
                <td colspan="2"><? echo $L['la_page'] . " $page $result"; ?><a href="<? echo $row['page']; ?>" target="_blank"><? echo $L['verifier']; ?></a></td>
            </tr>
            <tr>
                <td colspan="2"><? echo $L['ce_site_est'] . " $b"; ?></td>
            </tr>
            <tr>
                <td colspan="2"><? echo $L['changer_etat']; ?></td>
            </tr>
            <tr>
                <td width="246">
                    <input type="radio" name="etat" value="actif"> <? echo $L['activer']; ?></td>
                <td width="244">
                    <input type="radio" name="etat" value="desactif"> <? echo $L['desactiver']; ?></td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="etat" value="supp"> <? echo $L['supprimer']; ?></td>
                <td>
                    <input type="radio" name="etat" value="laisser" checked> <? echo $L['laisser']; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="checkbox" name="prevenir" value="1"><? echo $L['prevenir_webmas']; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div align="center">
                        <input type="submit" value="Go !">
                    </div>
                </td>
            </tr>
        </table>
    </form>
<? require __DIR__ . '/bas.php'; ?>
SESSION['idadm'])) {
    echo $L['session_ferm'];
    exit;
}
require __DIR__ . '/haut.php';
$conn = connecte();
$rqt  = "SELECT site_nom,page,accept FROM webring WHERE idsite='$idsite'";
$res  = requete($rqt);
$row  = $GLOBALS['xoopsDB']->fetchBoth($res);
$a    = $row['accept'];
if ($a == 1) {
    $b = $L['actif'];
}
if ($a == 2) {
    $b = $L['desactiv'];
}
// Vérification du site 
$page = $row['page']; // La page à analyser
$res  = Analyse("PHPMyRing", $page);
if ($res == 0) {
    $result = $L['existe_po'];
}
if ($res == 1) {
    $result = $L['contient_wr'];
}
if ($res == 2) {
    $result = $L['contient_po'];
}
?>
    <br>
    <form method="post" action="verification2.php">
        <input type="hidden" name="idsite" value="<? echo $idsite; ?>">
        <table width="500" border="0" align="center" class="table_liste">
            <tr>
                <td colspan="2" class="cellule_liste"><? echo $L['ver_site']; ?><? echo $row['site_nom']; ?></td>
            </tr>
            <tr>
                <td colspan="2"><? echo $L['la_page'] . " $page $result"; ?><a href="<? echo $row['page']; ?>" target="_blank"><? echo $L['verifier']; ?></a></td>
            </tr>
            <tr>
                <td colspan="2"><? echo $L['ce_site_est'] . " $b"; ?></td>
            </tr>
            <tr>
                <td colspan="2"><? echo $L['changer_etat']; ?></td>
            </tr>
            <tr>
                <td width="246">
                    <input type="radio" name="etat" value="actif"> <? echo $L['activer']; ?></td>
                <td width="244">
                    <input type="radio" name="etat" value="desactif"> <? echo $L['desactiver']; ?></td>
            </tr>
            <tr>
                <td>
                    <input type="radio" name="etat" value="supp"> <? echo $L['supprimer']; ?></td>
                <td>
                    <input type="radio" name="etat" value="laisser" checked> <? echo $L['laisser']; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="checkbox" name="prevenir" value="1"><? echo $L['prevenir_webmas']; ?></td>
            </tr>
            <tr>
                <td colspan="2">
                    <div align="center">
                        <input type="submit" value="Go !">
                    </div>
                </td>
            </tr>
        </table>
    </form>
<? require __DIR__ . '/bas.php'; ?>
