function oubli(x) {
uRl='oubli.php';
txt="resizable=1,location=0,scrollbars=0,width=255,height=150,top=10,left=100";
window.open(uRl,"oubli",txt);
}
function modif_msg(x) {
uRl='modif_msg.php';
txt="resizable=1,location=0,scrollbars=0,width=500,height=300,top=10,left=100";
window.open(uRl,"modif",txt);
}
function msg_mbres(x) {
uRl='msg_mbres.php';
txt="resizable=1,location=0,scrollbars=0,width=500,height=400,top=10,left=100";
window.open(uRl,"msg",txt);
}
function view_com(x) {
uRl="view_com.php?idsite="+x;
txt="resizable=1,location=0,scrollbars=1,width=500,height=400,top=10,left=100";
window.open(uRl,"view",txt);
}
function deladmin(x,y)
{
url="ajoutadmin.php?go=delete&idadmdel="+x;
message="Confirmez la suppression de l'administrateur :\n"+y;
if (confirm(message))
{
document.location.href=url;
}
}