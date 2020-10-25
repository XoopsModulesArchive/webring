<?php
/* ----------------------------------------------------------------------------
S E L E C T I O N D E L A L A N G U E
> F ra n ç a i s <
VERSION DE LA LANGUE : 4.0.2
---------------------------------------------------------------------------- */

# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# #   # #
# #   # #
# # I N S T A L L A T I O N # #
# #   # #
# #   # #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
/* ------------------
/install/index.php
------------------ */
$L['titre']    = "Installation de PHPMyRing";
$L['message1'] = "<p><b>L'installation de PHP My Ring est soumise &agrave; l'acceptation de la licence
GPL (<a href=\"GPLfr\" target=\"_blank\">&agrave; lire avant de l'accepter !</a>).</b></p>
<p>Vous avez besoin :<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 
D'une base MySQL ;<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 
D'un serveur disposant de PHP 4.0 ou sup&eacute;rieur ;</p>
<p align=\"center\">Choisissez le type d'installation :</p>";
$L['message2'] = "<p>Reports de bugs : <a href=\"webring@microniko.net\">webring@microniko.net</a></p>
<p>Remarque : La version qui vous allez installer est la version <b>$VEC</b>. pour
vous assurer que c'est bien la derni&egrave;re version disponible, visitez la 
page <a href=\"http://www.microniko.net/phpmyring\" target=\"_blank\">http://www.microniko.net/phpmyring/</a> 
</p>
<p>Pour conna&icirc;tre les mises &agrave; jour effectu&eacute;es depuis l'ancienne 
version, voyez le fichier <a href=\"change.log\" target=\"_blank\">change.log</a></p>";
/// FORMULAIRES
$L['err_config'] = "Erreur ! La configuration a d&eacute;j&agrave; &eacute;t&eacute; r&eacute;alis&eacute;e !";
################################################
## Mise à jour => Version 4.0 ##
################################################
// Index.php
$L['bienvenue_installation'] = "Bienvenue dans l'installation de PHP My Ring";
$L['attention_devel']        = "<b>Attention</b> : il s'agit d'une vesrion de d&eacute;veloppement destin&eacute;e
aux utilisateurs ayant quelques connaissances en PHP. Une liste de discution est &agrave;
votre disposition pour vos rapports de bugs : <a href=\"http://lists.sourceforge.net/lists/listinfo/phpmyring\">http://lists.sourceforge.net/lists/listinfo/phpmyring</a>";
$L['choix_langue']           = "Choisissez votre langue pour l'installation";
$L['installation']           = "Installation";
$L['maj']                    = "Mise &agrave; jour";
// installation.php
$L['pas_conf']                  = "Vous n'avez pas éditer le fichier de configuration. Voyez la documentation pour celà";
$L['premiere_etape']            = "Premi&egrave;re &eacute;tape";
$L['creation_admin']            = "Cr&eacute;ation du compte administrateur et des tables MySQL";
$L['err_pb']                    = "Erreur !<br>Les champs suivants posent problème :";
$L['login']                     = "Le login";
$L['lemdp']                     = "Le mot de passe";
$L['lenom']                     = "Le nom";
$L['ad_email']                  = "Votre adresse d'email n'est pas correcte";
$L['corrige_les']               = "Veuillez les corriger";
$L['la_table']                  = "La table";
$L['creation_ok']               = "a &eacute;t&eacute; cr&eacute;&eacute;e avec succ&egrave;s.";
$L['compte_admin_ok']           = "Votre compte d'administrateur a &eacute;t&eacute; cr&eacute;&eacute; avec succ&egrave;s";
$L['continuation_installation'] = "Pour continuer l'installation, vous devez vous identifier avec votre login
et mot de passe. Cel&agrave; permettera de v&eacute;rifier que ceux-ci sont
corrects.";
// forminstall_admin.php
$L['ch_login']    = "Choisissez un login ";
$L['ch_mdp']      = "Choisissez un mot de passe ";
$L['votre_nom']   = "Votre nom ";
$L['votre_email'] = "Votre adresse d'email ";
// formauth.php
$L['votre_login'] = "Votre login";
$L['votre_mdp']   = "Votre mot de passe";
// configuration.php
$L['deuxieme_etape'] = "Deuxi&egrave;me &eacute;tape";
$L['configuration']  = "Configuration du webring";
$L['champs_vides']   = "Champs vides!";
$L['champs_inc']     = "Champs incorrects";
$L['fin']            = "<p>Configuration effectu&eacute;e avec succ&egrave;s</p>
<p>En cas de probl&egrave;me :</p>
<p> Pas de panique (JAMAIS !). Il y a <b>toujours</b> une solution... Certaines 
erreurs reviennent souvent.</p>
<p>Vérifiez que vous avez correctement configuré votre script. Vérifiez que PHP 
4 est installé, actif, MySQL aussi.</p>
<p>Si après avoir vérifié tout ça, il y a toujours quelque chose qui ne fonctionne 
pas, voilà ce qu'il faut faire : <br>
- Rassembler un maximum d'infos sur l'erreur (versions de PHP, PHP My Ring, 
le texte de l'erreur renvoyé par PHP... et tout ce qui vous passe par la tête, 
rien est inutile !)<br>
- M'envoyer un mail (webring@microniko.net) avec l'URL où se trouve l'erreur, 
comment la reproduire. Joignez aussi, le contenu de la table webring_conf.<br>
- Si vous avez quand m&ecirc;me r&eacute;ussit &agrave; install&eacute; PHP 
My Ring, n'h&eacute;sitez pas &agrave; utiliser l'utilitaire de repport de bugs. 
Vous le trouverez dans votre interface d'administration.</p>
<p><b>Je veux bien vous aider à condition que vous soyez clair et précis !!!!!</b></p>
<p> <b>Petite remarque</b> : De nombreuses personnes m'ont envoyé des messages 
me disant que leur mot de passe d'administrateur (celui qui est dans /include/config.php) 
ne fonctionnait pas. Dans <b>TOUS</b> les cas, il s'agissait d'une petite erreur 
de lecture, je le rappele donc ici :<br>
- Le fichier '<b>/webring/admin.php</b>' est le fichier d'administration des 
<b>membres</b> <br>
- Le dossier '<b>/webring/admin/</b>' est le dossier de l'<b>administrateur</b> 
(VOUS !) </p>";
//formconf.php
$L['parametres']                 = "Param&egrave;tres";
$L['langue_defaut']              = "Langue par d&eacute;faut";
$L['email_admin']                = "Email de l'administrateur";
$L['exp_email']                  = "<i><u>Note</u></i> : Indiquez
une adresse d'email ou &quot;all&quot; (sans apostrophes). Si vous chosissez 
&quot;all&quot;, les emails d'inscription (entre autre) seront envoy&eacute;s 
&agrave; tous les administrateurs.";
$L['adresse_du_site']            = "Adresse du site (avec http://) dans lequel se trouve
le webring&nbsp;<br>(ne metez pas de slashes à la fin)";
$L['dossier_wr']                 = "Dossier dans lequel se trouve le webring&nbsp;<br>(ne mettez pas de slashes avant ou apr&egrave;s !)";
$L['type_wr']                    = "Type de webring";
$L['nom_wr']                     = "Nom du webring";
$L['temps_nouveau']              = "Temps pendant lequel un site est consid&eacute;r&eacute; comme nouveau ";
$L['jamais']                     = "Jamais";
$L['jour']                       = "jour";
$L['jours']                      = "jours";
$L['semaine']                    = "semaine";
$L['semaines']                   = "semaines";
$L['mois']                       = "mois"; //singulier
$L['moiss']                      = "mois"; //pluriel
$L['classement_def']             = "Classement des sites par d&eacute;faut";
$L['chronologique']              = "Chronologique";
$L['alphabetique']               = "Aphab&eacute;tique";
$L['nbre_visites']               = "Par nombre de visites";
$L['ordre_classe']               = "Ordre de classement";
$L['croissant']                  = "Croissant";
$L['decroissant']                = "D&eacute;croissant";
$L['nombre_sites_page']          = "Nombre de sites par page";
$L['nombre_sites_recherche']     = "Nombre de sites par page de recherche";
$L['messages']                   = "Messages";
$L['explications_euro']          = "
Vous pouvez utiliser les variables d'environnement du webring suivantes :<br>
- &euro;CHEMINDUWEBRING : le chemin compl&egrave;te vers le webring ;<br>
- &euro;SIGNATURE : votre signature ;<br>
- &euro;TYPEDEWEBRING : le type de webring ;<br>
- &euro;NOMDUWEBRING : le nom du webring ;<br>
- &euro;NOMDUWEBMASTER : le nom de l'inscrit ;<br>
- &euro;PSEUDODUMEMBRE : le pseudo de l'inscrit ;<br>
- &euro;MOTDEPASSEDUMEMBRE : le mot de passe de l'inscrit ;<br>
- &euro;URLDUSITE : l'url du site inscrit ;<br>
- &euro;NOMDUSITE : le nom du site inscrit.";
$L['m_inscription']              = "Message envoy&eacute; lors d'une inscription";
$L['message_inscription']        = "Bonjour €NOMDUWEBMASTER,
Vous venez d'envoyer une demande de participation au webring des sites de €TYPEDEWEBRING pour votre site €NOMDUSITE.
Je vous remercie de l'avoir fait. Votre demande a bien ete enregistree et je visiterai votre site tres bientot pour vous faire savoir s'il peut faire parti du webring.
S'il est accepte, vous recevrez un mail contenant le code à insérer dans votre site.
A bientot !
€SIGNATURE";
$L['m_desactivation']            = "Message envoy&eacute; lors d'une d&eacute;sactivation";
$L['message_desactivation']      = "Bonjour €NOMDUWEBMASTER,
Votre site fait parti du €NOMDUWEBRING. Nous avons remarque que votre site ne contient pas le script du webring. Un webring est une chaine de sites, il ne faut pas que cette chaine soit rompue.
Mommentanement, votre site a ete desactive.
€SIGNATURE";
$L['m_suppression_script']       = "Message lors de la suppression d'un site car le marqueur n'a pas &eacute;t&eacute; trouv&eacute;";
$L['message_suppression_script'] = "Bonjour €NOMDUWEBMASTER,
J'ai le regret de vous informer que votre site a ete supprimer du €NOMDUWEBRING car le code du webring
n'a pas ete trouve.
€SIGNATURE";
$L['m_suppression']              = "Message lors de la suppression d'un site sans autre indiquation";
$L['message_suppression']        = "Bonjour €NOMDUWEBMASTER,
J'ai le regret de vous informer que votre site a ete supprimé du €NOMDUWEBRING suite à une décision de l'administrateur
€SIGNATURE";
$L['m_refus']                    = "Message lors du refus d'un site";
$L['message_refus']              = "Bonjour €NOMDUWEBMASTER,
Je suis desole de vous informer que votre site n'a pas ete accepte pour faire parti du €NOMDUWEBRING
€SIGNATURE";
$L['m_acceptation']              = "Message lors de l'acceptation d'un site";
$L['message_acceptation']        = "Bonjour €NOMDUWEBMASTER,
Vous avez demande a ce que votre site €NOMDUSITE rejoigne le webring des sites de €TYPEDEWEBRING.
Votre demande a ete acceptee. Allez a l'adresse suivante : €CHEMINDUWEBRING/admin.php pour obtenir le code a ajouter a votre site et indiquer une page ou ce trouve le code.
Attention : Il est important de ne pas modifier ce code car des verifications sont effectuees regulierement.
- Rappel de votre pseudo : €PSEUDODUMEMBRE
- Rappel de votre mot de passe : €MOTDEPASSEDUMEMBRE
€SIGNATURE";
$L['m_identifiants']             = "Message lors du rappel des identifiants";
$L['message_identifiants']       = "Bonjour €NOMDUWEBMASTER,
Vous avez demande vos identifiants pour €NOMDUWEBRING, les voici :
Votre pseudo : €PSEUDODUMEMBRE
Votre mot de passe : €MOTDEPASSEDUMEMBRE
€SIGNATURE";
//miseajour.php
$L['connexion_admin'] = "Connectez-vous en temps qu'administrateur";
######
# Version 4.0 RC1
######
$L['pas_configure'] = "<font color=\"#FF0000\">
<b>Attention</b>
</font>
! Vous n'avez psa &eacute;dit&eacute; le fichier de configuration ! Editez votre ficher et actualisez la page pour
pouvoir continuer !";
######
# Version 4.0 RC2
######
$L['aleatoirement'] = "Al&eacute;atoirement (exp&eacute;rimental)";
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# #   # #
# #   # #
# # R E S T E D U S C R I P T # #
# #   # #
# #   # #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
$L['login_erreur']        = "Login et/ou mot de passe incorrect.";
$L['deconnexion']         = "D&eacute;connexion";
$L['bienvenue']           = "Bienvenue";
$L['code_insert_site']    = "Code &agrave; ins&eacute;rer dans votre site";
$L['pw_edit_code']        = "Note : Vous pouvez &eacute;diter ce code. ";
$L['laisser_com']         = "Il faut cependant laisser le commentaire";
$L['pge_wr_def']          = "La page contenant le webring n'est pas encore définie";
$L['desact']              = "Votre site a &eacute;t&eacute; provisoirement d&eacute;sactiv&eacute; car le code du webring n'a pas &eacute;t&eacute; trouv&eacute;. Veuillez sp&eacute;cifier une page correcte !";
$L['verif_reg']           = "Des v&eacute;rifications sont effectu&eacute;es r&eacute;guli&egrave;rement. Si votre site ne contient pas le code il sera supprimé";
$L['page']                = "page";
$L['envoyer']             = "Envoyer";
$L['vo_infos']            = "Vos informations";
$L['site_visite']         = "Votre site a &eacute;t&eacute; visit&eacute;";
$L['fois_depuis']         = "fois depuis le";
$L['site']                = "site";
$L['url']                 = "URL";
$L['pseudo']              = "pseudo";
$L['modif_infos']         = "Vous pouvez modifier les informations suivantes cliquez ensuite sur modifier";
$L['description']         = "description";
$L['pge_cont_wr']         = "Page contenant le webring";
$L['votre_site']          = "Votre site";
$L['pre_nom']             = "Pr&eacute;nom et ou nom";
$L['email']               = "E-mail";
$L['modifier']            = "modifier";
$L['rech_vide']           = "Recherche vide";
$L['rech_rien']           = "La recherche n'a renvoy&eacute; aucun r&eacute;sultats !";
$L['rech_res']            = "Voici les résultats de la Recherche :";
$L['nom_site']            = "Nom du site";
$L['lien']                = "lien";
$L['precedents']          = "pr&eacute;c&eacute;dents";
$L['suivants']            = "suivants";
$L['administration']      = "administration";
$L['mdp']                 = "Mot de passe";
$L['g_oublie_mdp']        = "J'ai oubli&eacute; mon mot de passe";
$L['recherche']           = "recherche";
$L['chercher']            = "chercher";
$L['liste']               = "liste";
$L['inscription']         = "inscription";
$L['site_has']            = "Voir un site au hasard";
$L['liste_site_de']       = "Liste des sites faisant partie du webring des sites de";
$L['recent']              = "r&eacute;cent";
$L['ancien']              = "ancien";
$L['visite']              = "vist&eacute; ";
$L['new']                 = "nouveau";
$L['fois']                = " fois";
$L['ajout_le']            = "Ajout&eacute; le";
$L['webmaster']           = "webmaster";
$L['aucun_site']          = "Aucun site inscrit pour l'instant";
$L['inscr_nouv_site']     = "Inscription d'un nouveau site";
$L['chps_ob']             = "Tous les champs sont obligatoires";
$L['sitenom']             = "Nom du site";
$L['nom_webm']            = "Nom du webmater";
$L['email_webm']          = "E-mail du webmaster";
$L['re_mdp']              = "Resaisissez le mot de passe";
$L['erreur']              = "erreur";
$L['chps_pb']             = "Les champs suivants posent probl&egrave;me";
$L['sitenom_vide']        = 'Le nom du site est vide';
$L['url_vide']            = "L'URL du site est vide";
$L['url_inc']             = "L'URL du site est incorrecte (elle doit contenir 'http://')";
$L['desc_vide']           = "La description du site est vide";
$L['webm_vide']           = "Le nom du webmaster est vide";
$L['email_vide']          = "L'adresse d'email est vide";
$L['email_inc']           = "L'adresse d'email est incorrecte";
$L['pseudo_vide']         = "Le pseudo est vide";
$L['mdp_vide']            = "Le mot de passe est vide";
$L['mdp_dif']             = "Vous avez saisi deux mots de passe diff&eacute;rents";
$L['sitenom_deja']        = "Le nom de ce site est déjà inscrit";
$L['url_deja']            = "L'url de ce site est déjà inscrite";
$L['pseudo_deja']         = "Le pseudo <b>$pseudo</b> a déjà été choisi par quelqu'un d'autre";
$L['email_deja']          = "L'adresse d'email <b>$email</b> est déjà dans la base de données";
$L['corriger']            = "Veuillez corriger les donn&eacute;es que vous avez saisies";
$L['demande_inscription'] = "Demande d'inscription";
$L['salut']               = "salut";
$L['a_dem_ins']           = "a demande a etre ajoute au webring";
$L['acc_refus']           = "Pour accepter ou refuser";
$L['demande_enr']         = "Votre demande d'inscription a bien ete enregistree";
$L['msg_conf_ins1']       = "<b>Merci";
$L['msg_conf_ins2']       = "</b>,<br><br>Votre demande a bien &eacute;t&eacute; enregistr&eacute;e, vous recevrez un r&eacute;ponse tr&egrave;s bient&ocirc;t.<br>Par ailleurs, un email vous a ete envoy&eacute; &agrave; l'adresse";
$L['erreur_code']         = "Attention, le code pour le webring que vous avez ins&eacute;rer n\'est pas correct veuillez le corriger";
$L['session_ferm']        = "<p align=\"center\">La session a &eacute;t&eacute; ferm&eacute;e pour des mesures de s&eacute;curit&eacute;!</p>";
//modif.php
$L['page_wr'] = "Il est indispensable de spécifier une page contenant le webring !";
$L['nom']     = "Vous devez donner votre nom.";
$L['maj_ok']  = "Mise à jour effectuée !";
//modif_page.php
$L['page_null']     = "Vous n'avez pas spécifié de page !!";
$L['page_invalide'] = "Cette page n'est pas valide !!";
$L['page_connue']   = "Cette page est déjà connue comme n'étant pas valable !!";
$L['page_maj']      = "Page mise à jour, merci !";
//oubli.php
$L['env_mdp']   = "Envoi du mot de passe";
$L['oubli_mdp'] = "Vous avez oubli&eacute; votre mot de passe ?";
$L['ind_email'] = "Indiquez votre adresse d'email, nous allons vous envoyer un courrier avec votre mot de passe";
//oubli2.php
$L['vos_ident']    = "Vos identifiants";
$L['bjr']          = "Bonjour";
$L['dem_ident']    = "Vous avez demande vos identifiants pour"; //(... vos identifiants pour le webring X..)
$L['l_voici']      = "Les voici";
$L['mail_env']     = "Email envoy&eacute;";
$L['mail_err_env'] = "Cet email n'exite pas ! D&eacute;sol&eacute;";
// admin/accepter.php
$L['sujet_accept']     = "Votre demande d'inscription a ete acceptee";
$L['site_num_accept1'] = "Le site N&deg; <b>";
$L['site_num_accept2'] = "</b> a &eacute;t&eacute; accept&eacute;";
$L['retour']           = "retour";
$L['body_acc_1']       = "Vous avez demande a ce que votre site";
$L['body_acc_2']       = "rejoigne le webring des sites de $TYPE.
Votre demande a ete acceptee. Allez a l'adresse suivante : $SITE/$DOSSIER/admin.php pour obtenir le code a ajouter a votre site et indiquer une page ou ce trouve le code.
Attention : Il est important de ne pas modifier ce code car des verifications sont effectuees regulierement.
Rappel de votre pseudo :";
$L['body_acc_3']       = "Votre mot de passe :";
// admin/bug.php
$L['titre_bug']    = "Envoi d'un rapport de bug";
$L['remp_form']    = "Remplissez ce formulaire pour m'envoyer (&agrave; webring@microniko.net) un rapport de bug.";
$L['p_conc']       = "Page(s) concern&eacute;e(s)";
$L['txt_erreur']   = "Description du bug (soyez le plus pr&eacute;cis possible ! N'h&eacute;sitez pas &agrave; coller ici les erreurs renvoy&eacute;es par PHP ou MySQL)";
$L['heberg']       = "Qui est votre h&eacute;bergeur ?";
$L['envoi_form']   = "Envoyer le formulaire";
$L['don_env']      = "Les donn&eacute;es suivantes seront envoy&eacute;es avec ce formulaire";
$L['env']          = "L'environnement";
$L['browser']      = "Votre Browser";
$L['nom_site']     = "Le nom de votre site";
$L['url_site']     = "L'URL de votre webring";
$L['email']        = "Votre adresse d'email";
$L['version_ring'] = "La version de PHPMyRing";
$L['conf_bug']     = "Merci, le rapport de bug a &eacute;t&eacute; envoy&eacute; !<br> Vous recevrez une réponse d'ici peu !";
//admin/fiche.php
$L['fiche_site'] = "Fiche du site";
$L['inscr_dep']  = "Inscrit depuis";
$L['add_email']  = "Adresse d'email";
$L['nbre_vis']   = "Nombre de visites";
$L['supprimer']  = "Supprimer le site";
//admin/haut.php
$L['adminis']       = "Adminsitration";
$L['accueil']       = "Accueil";
$L['verification']  = "V&eacute;rification";
$L['liste_d_sites'] = "Liste des sites";
$L['logout']        = "D&eacute;connexion";
$L['msg_mbres']     = "Envoyer un message aux membres";
$L['rapp_bug']      = "Rapport de bug";
//admin/index.php
$L['recap']        = "Petit r&eacute;capitulatif...";
$L['ya_nb_sites1'] = "Il y a";
$L['ya_nb_sites2'] = "sites inscrits";
$L['nb_att']       = "sites sont en attente de validation (voir ci-dessous)";
$L['voir_ls']      = "voir la liste";
$L['nb_des']       = "sites sont d&eacute;sactiv&eacute;s en attente d'une rev&eacute;rification";
$L['v_sites']      = "V&eacute;rifier les sites";
$L['msg_acc']      = "Message d'acceuil ";
$L['modif_msg']    = "Modifier le message";
$L['ls_sites_att'] = "Sites demandant &agrave; &ecirc;tre inscrits au webring";
$L['accepter']     = "Accepter";
$L['refuser']      = "Refuser";
$L['no_site_v']    = "Aucun site &agrave; valider !";
//admin/liste.php
$L['ls_sites_insc'] = "Liste des sites inscrits";
$L['del']           = "Supprimer";
$L['details']       = "D&eacute;tails";
$L['info_ls']       = "Cette liste ne comporte que les sites accept&eacute;s et non d&eacute;sactiv&eacute;s! ";
//admin/modif_msg.php
$L['mod_msg_acc'] = "Modification du message d'accueil";
$L['ferm_fen']    = "Fermer la fen&ecirc;tre";
//admin/msg_mbres.php
$L['sd_msg_mb']    = "Envoyer un message aux membres";
$L['envoi_msg_ts'] = "Envoi d'un message &agrave; <u>tous</u> les membres";
$L['titre_msg']    = "Titre du message";
$L['corps_msg']    = "Corps du message";
$L['add_sign']     = "Ajouter la signature";
$L['att_clik']     = "Attention, ne cliquez qu'une seule fois.";
//admin/refus.php
$L['dem_refus']   = "Votre demande d'inscription a ete refusee";
$L['body_ref']    = "Je suis desole de vous informer que votre site n'a pas ete accepte pour faire parti du webring des sites de"; //(... $TYPE)
$L['info_refus1'] = "Le site N&deg;";
$L['info_refus2'] = "a &eacute;t&eacute; suprim&eacute; !";
//admin/send_msg.php
$L['form_inc'] = "Formulaire incomplet! ";
$L['msg_env']  = "Message envoy&eacute;!";
//admin/supprimer.php
$L['body_supp1']     = "J'ai le regret de vous informer que votre site";
$L['body_supp2']     = "a ete supprimer du webring des site de";
$L['body_supp_obj1'] = "Cette suppression fait suite a une decision de l'administrateur du webring\n";
$L['body_supp_obj2'] = "Votre site a ete supprimer car vous n'avez pas mis le code JavaScript du webring\n";
$L['objet_supp']     = "Votre site a ete supprimer du webring";
$L['site_num_sup1']  = "Site N°";
$L['site_num_sup2']  = "supprim&eacute;!";
//admin/verif.php
$L['ce_site_est'] = "Ce site est actuellement";
$L['verifier']    = "v&eacute;rifier";
$L['actif']       = "actif";
$L['desactiv']    = "déactivé";
//admin/verification.php
$L['existe_po']       = "n'existe pas !";
$L['contient_wr']     = "contient bien le webring.";
$L['contient_po']     = "ne contient pas le webing.";
$L['ver_site']        = "V&eacute;rification du site :";
$L['la_page']         = "La page";
$L['verifier']        = "V&eacute;rifier";
$L['ce_site_est']     = "Ce site est actuellement :";
$L['changer_etat']    = "Changer son &eacute;tat :";
$L['activer']         = "Activer";
$L['desactiver']      = "D&eacute;sactiver";
$L['laisser']         = "Laisser tel quel";
$L['prevenir_webmas'] = "Pr&eacute;venir le webmaster en cas de changement (conseill&eacute; surtout en cas de d&eacute;activation !)";
//admin/verification2.php
$L['activ']      = "activé";
$L['do_nothing'] = "Rien n'a été fait!";
$L['msg_imp']    = "Message important";
$L['web_prev']   = "Webmaster prévenu!";
//admin/voir.php
$L['site_demande'] = "Ce site demande &agrave; rejoindre le webring";
$L['rien_faire']   = "Ne rien faire";
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# # # Ajouts lors de la version 4.0 # # # #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# # # #
# Version 4.0 ß
# # # #
// add_com.php
$L['site_nom_def'] = "Erreur!<br> Le N&deg; du site n'est pas d&eacute;fini!";
$L['comm_enr']     = "Commentaire enregistré!<br>Merci!";
$L['comm_err']     = "Erreur lors de l'ajout du commentaire, contactez l'administrateur SVP!";
$L['add_com']      = "Ajouter un commentaire sur le site";
$L['votre_nom']    = "Votre nom";
$L['notation']     = "Notation";
$L['commentaire']  = "Commentaire";
$L['retablir']     = "R&eacute;tablir";
$L['retour_com']   = "Retour aux commentaires";
// admin/modif_msg.php
$L['modif_ok'] = "Modification du message effectu&eacute;e !";
//admin/voir.php
$L['nom_du_site'] = "Le nom du site";
//admin/haut.php
$L['configuration'] = "Configuration";
$L['ad_admin']      = "Ajouter un nouvel administrateur";
// admin/ajoutadmin.php
$L['creation_nouvel_admin'] = "Cr&eacute;ation d'un nouveau compte d'administrateur";
$L['champs_incomplets']     = "Champs incomplets et/ou adresse d'email incorrecte";
# # # #
# Version 4.0 RC1
# # # #
//ajoutadmin.php
$L['liste_adm_enr']   = "Liste des autres administrateurs enregistr&eacute;s";
$L['del_admin']       = "Supprimer l'admistrateur";
$L['admin_del']       = "Administrateur supprim&eacute; !";
$L['compte_admin_er'] = "Erreur lors de la cr&eacute;ation du compte de l'administrateur";
$L['compte_admin_ok'] = "Compte administrateur cr&eacute;&eacute; avec succ&egrave;s !";
$L['admin_del_err']   = "Impossible de supprimer l'administrateur s&eacute;lectionn&eacute;.";
//admin/refus.php
$L['info_refus_err'] = "Erreur lors de la suppression du site";
//admin/send_msg.php
$L['msg_env_err'] = "Erreur lors de l'envoi du message";
//admin/supprimer.php
$L['erreur_suppression'] = "Erreur lors de la suppresion du site";
//admin/index.php
$L['ds_interface']   = "dans l'interface d'administration de PHPMyRing";
$L['you_use']        = "Vous utilisez la version";
$L['si_new_version'] = "(v&eacute;rifier <a href=\"http://www.microniko.net/phpmyring\" target=\"_blank\">quelle est la version actuelle</a>)";
//view_com.php
$L['commentaires_de'] = "Commentaires du site";
# # # #
# Version 4.0 RC2
# # # #
//admin/voirlog.php
$L['voici_log'] = "Voici le fichier LOG<br>Il vous permet de suivre l'activit&eacute; de votre webring.";
$L['vider_log'] = "Vider le fichier LOG";
# # # #
# Version 4.0 RC3
# # # #
// modif.php
$L['maj_err'] = "Impossible de mettre à jour vos information, contactez l'administrateur.";
