<?php
/* ----------------------------------------------------------------------------
S E L E C T Y O U R L A N G U A G E
> E n g l i s h <
LANGUAGE VERSION : 4.0.2
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
$L['titre']    = "Installation of PHPMyRing";
$L['message1'] = "<p><b>The installation of PHP My Ring is distributed under the GNU General Public License (<a href=\"copying\" target=\"_blank\">, and you are obliged to read it before proceeding</a>)!</b></p>
<p>Requirements:<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 
A MySQL database.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- 
A server having PHP 4.0 or later installed.</p>
<p align=\"center\">Choose the form of your installation:</p>";
$L['message2'] = "<p>Send all bug reports to: <a href=\"webring@microniko.net\">webring@microniko.net</a></p>
<p>Note: The version of the program you are about to install is <b>$VEC</b>. To verify that it is the latest available version of this program, please visit our home website at: 
<a href=\"http://www.microniko.net/phpmyring\" target=\"_blank\">http://www.microniko.net/phpmyring/</a></p>
<p>In order to obtain the latest additions and corrections to this program, please read the log file <a href=\"change.log\" target=\"_blank\">change.log</a></p>";
/// FORMS
$L['err_config'] = "Error!! You have already configured this webring!";
################################################
## Update => Version 4.0 ##
################################################
// Index.php
$L['bienvenue_installation'] = "Welcome to the installation of PHP My Ring";
$L['attention_devel']        = "<b>!!Attention!!</b>: This program is still under development, and is intended for persons having some knowledge of PHP. A open forum is available for your bug reports, commentary, and suggestions at: <a href=\"http://lists.sourceforge.net/lists/listinfo/phpmyring\">http://lists.sourceforge.net/lists/listinfo/phpmyring</a>";
$L['choix_langue']           = "Choose the language of your installation";
$L['installation']           = "Installation";
$L['maj']                    = "Update";
// installation.php
$L['pas_conf']                  = "You have not yet edited the configuration file. Please see the relevant documentation to do so!";
$L['premiere_etape']            = "First Part";
$L['creation_admin']            = "Creation of the Administrator's account, and MySQL tables";
$L['err_pb']                    = "!!Error!!<br>The following fields are not filled in correctly:";
$L['login']                     = "Login";
$L['lemdp']                     = "Password";
$L['lenom']                     = "Name";
$L['ad_email']                  = "Your e-mail address is not listed correctly";
$L['corrige_les']               = "Please make the required corrections";
$L['la_table']                  = "The tables";
$L['creation_ok']               = "were successfully created!";
$L['compte_admin_ok']           = "Your administration account was successfully created!";
$L['continuation_installation'] = "To continue the installation you must now login, so as to verify the accuracy of the login info you provided.";
// forminstall_admin.php
$L['ch_login']    = "Choose a login name ";
$L['ch_mdp']      = "Choose a password ";
$L['votre_nom']   = "Your name ";
$L['votre_email'] = "Your e-mail address ";
// formauth.php
$L['votre_login'] = "Your login name ";
$L['votre_mdp']   = "Your password ";
// configuration.php
$L['deuxieme_etape'] = "Second Part";
$L['configuration']  = "Webring Configuration";
$L['champs_vides']   = "!!Empty Fields!!";
$L['champs_inc']     = "Fields incorrectly filled in";
$L['fin']            = "<p>Configuration was successfully accomplished!</p>
<p>In case of any problems:</p>
<p>Do not PANIC or go nuts. There is <b>always</b> a solution... Certain errors constantly re-surface.</p>
<p>Please verify that you have correctly configured your copy of this program, and that PHP 4 and MySQL are both installed on your server.</p>
<p>If after having verified all of the above, and there is still something screwing things up, then this is what you need to do:<br>
- Gather together as much info as possible on the error/s (Version of PHP and PHP My Ring, the error message/s displayed by PHP, and anything else that passes through your head... No provided info is ever considered useless!).<br>
- Send me a e-mail (webring@microniko.net) with the URL address where the error/s are displayed, how I can reproduce them, and also including the contents of the MySQL table webring_conf.<br>
- If you were finally able to install PHP My Ring despite the occasional error or two, then please do not hesitate to send me a bug report using the utility provided to do so, which is found in your ring's administration section.</p>
<p><b>I would be delighted to HELP you, but can only do so if the info provided is as clear and precise as you can possibly make it!!!!!</b></p>
<p><b>Note</b>: 
Many Ringmasters have sent me messages saying that their administration password (The password listed in /include/config.php) does not work! In <b>ALL</b> cases it has been a little misunderstanding between what is ring administration, and what is site administration:<br>
- The web page '<b>/webring/admin.php</b>' is the page for site administration, which is the page a ring's members would use. 
- The web page '<b>/webring/admin/index.php</b>' is the page for ring administration, which is the page a Ringmaster would use (You are the Ringmaster!).</p>";
//formconf.php
$L['parametres']                 = "Parameters";
$L['langue_defaut']              = "Default language";
$L['email_admin']                = "Administrators e-mail";
$L['exp_email']                  = "<i><u>Note</u></i>: Indicate a e-mail address, or &quot;all&quot; (Without quotes). If you choose &quot;all&quot;, the joining e-mails (Among others) will be sent to all administrators.";
$L['adresse_du_site']            = "Address of the website (With http://) where the webring is located&nbsp;<br>(Do not enter a slash at the end)";
$L['dossier_wr']                 = "Folder in which the webring is located&nbsp;<br>(Do not enter a slash at the beggining, or at the end)";
$L['type_wr']                    = "Theme of the Webring";
$L['nom_wr']                     = "The Webring's name";
$L['temps_nouveau']              = "Time in which a site is considered new";
$L['jamais']                     = "Never";
$L['jour']                       = "Day";
$L['jours']                      = "Days";
$L['semaine']                    = "Week";
$L['semaines']                   = "Weeks";
$L['mois']                       = "Month";
$L['moiss']                      = "Months";
$L['classement_def']             = "Sites are classified by default";
$L['chronologique']              = "Chronologically";
$L['alphabetique']               = "Alphabetically";
$L['nbre_visites']               = "By number of visits";
$L['ordre_classe']               = "Order of classification";
$L['croissant']                  = "Ascending";
$L['decroissant']                = "Descending";
$L['nombre_sites_page']          = "Number of sites per page";
$L['nombre_sites_recherche']     = "Number of sites per search page";
$L['messages']                   = "Messages";
$L['explications_euro']          = "These are substitutes that can be used in the customized code<br>
- &euro;CHEMINDUWEBRING: The URL address of the webring ;<br>
- &euro;SIGNATURE: Your signature ;<br>
- &euro;TYPEDEWEBRING: The type of webring ;<br>
- &euro;NOMDUWEBRING: The name of the webring ;<br>
- &euro;NOMDUWEBMASTER: The webmaster's name ;<br>
- &euro;PSEUDODUMEMBRE: The site ID ;<br>
- &euro;MOTDEPASSEDUMEMBRE: The member's password ;<br>
- &euro;URLDUSITE: The URL address of the website ;<br>
- &euro;NOMDUSITE: The name of the website ";
$L['m_inscription']              = "Message sent when a new member joins ";
$L['message_inscription']        = "Hi €NOMDUWEBMASTER,
You have just asked that your website €NOMDUSITE be allowed to join the webring for websites with the following theme €TYPEDEWEBRING.
Your website has now been registered, and I must say that I am delighted that you have decided to join this webring! 
Once I have had the opportunity to visit and review your website, I will let you know in a day or 2 whether your website will be allowed to join this webring.
If approved your website will be activated, and you will then receive a e-mail containing the code for this webring's navpanel, which you will then be expected to display on €URLDUSITE.
Best wishes,
€SIGNATURE";
$L['m_desactivation']            = "Message sent when a website is de-activated";
$L['message_desactivation']      = "Hi €NOMDUWEBMASTER,
Your website is a member of the €NOMDUWEBRING. 
I have noticed that you are not yet displaying this webring's navpanel on your website €URLDUSITE? A webring is a ring of websites, and it is very important that this ring not be broken! 
As a result your website has now been de-activated! 
I hope you can correct this unfortunate situation without delay, at which time your website will then be re-activated!
Best wishes,
€SIGNATURE";
$L['m_suppression_script']       = "Message sent when a website has been removed, because it did not display the ring's navpanel";
$L['message_suppression_script'] = "Hi €NOMDUWEBMASTER,
I regret to inform you that your website has now been removed from the €NOMDUWEBRING, because this webring's navpanel could not be found on your website €URLDUSITE!
Deep regrets,
€SIGNATURE";
$L['m_suppression']              = "Message sent when a Ringmaster wishes to remove a website for whatever reason, or for no reason at all";
$L['message_suppression']        = "Hi €NOMDUWEBMASTER,
I regret to inform you that your website has been removed from the €NOMDUWEBRING as a result of a arbitrary decision by the Ringmaster!
Deep regrets,
€SIGNATURE";
$L['m_refus']                    = "Message sent when a website has been refused";
$L['message_refus']              = "Hi €NOMDUWEBMASTER,
I have visited your website, and feel that there may be some confusion. The €NOMDUWEBRING is a webring for websites that have a focus, topic, or theme related to €TYPEDEWEBRING. Having inspected your website assiduously, I have determined that although it is an excellent website, it is one that is not appropriate for inclusion in this webring. Accordingly, I am removing your website from this webring's queue effective immediatly. However, should the focus, topic or theme of your website change so that it better fits in with the charter of this webring, I would then strongly urge you to re-apply at that time.
Deep regrets,
€SIGNATURE";
$L['m_acceptation']              = "Message sent when a site is approved";
$L['message_acceptation']        = "Hi €NOMDUWEBMASTER,
Congratulations, your website €NOMDUSITE is now a member of the webring €NOMDUWEBRING, which is a webring for websites that have a focus, topic or theme related to €TYPEDEWEBRING!
To get the code for the navpanel, and to indicate the web page where it will be displayed on your website €URLDUSITE, please go to the following web address:
€CHEMINDUWEBRING/admin.php
Note: It is important not to modify the code, since the ring's code checker periodically verifies that it is being displayed correctly!
- Reminder of your login name: €PSEUDODUMEMBRE
- Reminder of your password: €MOTDEPASSEDUMEMBRE
Best wishes,
€SIGNATURE";
$L['m_identifiants']             = "Message sent when a member requests a reminder of his or her login info";
$L['message_identifiants']       = "Hi €NOMDUWEBMASTER,
You have just requested your login info for the €NOMDUWEBRING!
Here they are:
Your login name: €PSEUDODUMEMBRE
Your password: €MOTDEPASSEDUMEMBRE
Best wishes,
€SIGNATURE";
//miseajour.php
$L['connexion_admin'] = "Sign in as the ring's administrator";
######
# Version 4.0 RC1
######
$L['pas_configure'] = "<font color=\"#FF0000\">
<b>!!Attention!!</b>
</font>
!You have not edited the configuration file! Please edit it, and then upload it to your website before continuing!";
######
# Version 4.0 RC2
######
$L['aleatoirement'] = "By chance (Experimental)";
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# #   # #
# #   # #
# # R E S T E D U S C R I P T # #
# #   # #
# #   # #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
$L['login_erreur']        = "Incorrect login name or password.";
$L['deconnexion']         = "Log out";
$L['bienvenue']           = "Welcome";
$L['code_insert_site']    = "Code to insert in your website";
$L['pw_edit_code']        = "Note: You can edit this code";
$L['laisser_com']         = "The comments should not be removed";
$L['pge_wr_def']          = "The page for the webring has not yet been defined";
$L['desact']              = "Your site was temporarily de-activated, because the code for the webring was not found. Please specify the correct page!";
$L['verif_reg']           = "Checks are carried out periodically. If your website does not correctly display the ring's navpanel, it will be removed";
$L['page']                = "page";
$L['envoyer']             = "submit";
$L['vo_infos']            = "Your information";
$L['site_visite']         = "Your site was visited";
$L['fois_depuis']         = "times since";
$L['site']                = "site";
$L['url']                 = "URL";
$L['pseudo']              = "Login name";
$L['modif_infos']         = "You can modify the following information. Click on modify";
$L['description']         = "Description";
$L['pge_cont_wr']         = "Page containing the webring";
$L['votre_site']          = "Your website";
$L['pre_nom']             = "Name or surname";
$L['email']               = "E-mail";
$L['modifier']            = "Modify";
$L['rech_vide']           = "Search";
$L['lien']                = "Link";
$L['precedents']          = "Previous";
$L['suivants']            = "Next";
$L['administration']      = "Administration";
$L['mdp']                 = "Password";
$L['g_oublie_mdp']        = "I have forgotten my password";
$L['recherche']           = "Search";
$L['chercher']            = "Search";
$L['liste']               = "List";
$L['inscription']         = "Join";
$L['site_has']            = "Random";
$L['liste_site_de']       = "List of sites belonging to the webring of ";
$L['recent']              = "recent";
$L['ancien']              = "old";
$L['visite']              = "visit ";
$L['new']                 = "new";
$L['fois']                = " time";
$L['ajout_le']            = "Add it";
$L['webmaster']           = "webmaster";
$L['aucun_site']          = "No site has yet been registered";
$L['inscr_nouv_site']     = "New site sign up";
$L['chps_ob']             = "All fields must be filled in";
$L['sitenom']             = "Name of the site";
$L['nom_webm']            = "Name of the webmaster";
$L['e-mail_webm']         = "E-mail of the webmaster";
$L['re_mdp']              = "Re-type the password";
$L['erreur']              = "error";
$L['chps_pb']             = "The following fields have errors";
$L['sitenom_vide']        = 'The name of the site has not been entered';
$L['url_vide']            = "The URL of the site has not been entered";
$L['url_inc']             = "The URL of the site is incorrect (it should begin with 'http://')";
$L['desc_vide']           = "The description of the site has not been entered";
$L['webm_vide']           = "The name of the webmaster has not been entered";
$L['e-mail_vide']         = "The e-mail address has not been entered";
$L['e-mail_inc']          = "The e-mail address is incorrect";
$L['pseudo_vide']         = "The login name has not been entered";
$L['mdp_vide']            = "The password has not been entered";
$L['mdp_dif']             = "You have typed 2 different passwords";
$L['sitenom_deja']        = "The name of this site has already been registered";
$L['url_deja']            = "The URL of this site has already been registered";
$L['pseudo_deja']         = "The login name <b>$pseudo</b> has already been selected by someone else";
$L['e-mail_deja']         = "The e-mail <b>$e-mail</b> has already been entered in the database";
$L['corriger']            = "Please correct the data that you have entered";
$L['demande_inscription'] = "Join request";
$L['salut']               = "Dear user";
$L['a_dem_ins']           = "has asked to join the webring";
$L['acc_refus']           = "To accept or refuse";
$L['demande_enr']         = "Your request to join has been registered";
$L['msg_conf_ins']        = "<b>Thank you $webmaster</b>,<br><br>Your request to join has been received, and you should receive a reply shortly.<br>In addition, an e-mail has been sent to the address you provided $e-mail.";
$L['erreur_code']         = "!!Attention!! The webring code that you have provided is incorrect, and needs to be corrected!";
$L['session_ferm']        = "<p align=\"center\">This session has expired for security reasons!!</p>";
//modif.php
$L['page_wr'] = "You must specify the URL address for the webring!";
$L['nom']     = "You must type your surname!";
$L['maj_ok']  = "The update was successfully accomplished!";
//modif_page.php
$L['page_null']     = "You did not specify a page!!";
$L['page_invalide'] = "The page provided is not valid!!!";
$L['page_connue']   = "This page is already known not to be valid!!";
$L['page_maj']      = "Thank you, that page has now been updated!";
//oubli.php
$L['env_mdp']    = "Sending the password";
$L['oubli_mdp']  = "Have you forgotten your password?";
$L['ind_e-mail'] = "Type in your e-mail address, and we will send you your password";
//oubli2.php
$L['vos_ident']    = "Your Login info";
$L['bjr']          = "Hi";
$L['dem_ident']    = "You have requested your login info for the "; //(... your login info for the XYZ webring ...)
$L['l_voici']      = "Here it is";
$L['mail_env']     = "The E-mail has been sent!";
$L['mail_err_env'] = "Ooops, but the e-mail could not be sent!!";
// admin/accepter.php
$L['sujet_accept']     = "Your request to join has been approved";
$L['site_num_accept1'] = "The site N&deg; <b>";
$L['site_num_accept2'] = "</b> has been approved";
$L['retour']           = "Back";
$L['body_acc_1']       = "You have requested that your site";
$L['body_acc_2']       = "joins a webring having the following focus, topic, or theme $TYPE.
Your request has been approved. Go to the following URL: $SITE/$DOSSIER/admin.php to obtain the code to add to your site, and to indicate on which page the ring's navpanel will be displayed.
Note: It is important not to modify the code, since the ring's code checker verifies periodically that it is being displayed correctly!";
$L['body_acc_3']       = "Your password: ";
// admin/bug.php
$L['titre_bug']    = "Bug reporting";
$L['remp_form']    = "Fill this form out and send it to me at (webring@microniko.net), with 'Bug report' in the subject line of the e-mail.";
$L['p_conc']       = "Page/s affected";
$L['txt_erreur']   = "Bug description (Be as precise as possible! Do not hesitate to paste any error/s returned by either PHP or MySQL in the body of the message)";
$L['heberg']       = "Who is hosting your site?";
$L['envoi_form']   = "Send the form";
$L['don_env']      = "The following information will be sent within the form";
$L['env']          = "Environment";
$L['browser']      = "Your browser";
$L['nom_site']     = "Name of your site";
$L['url_site']     = "URL of your site";
$L['email']        = "Your e-mail";
$L['version_ring'] = "PHPMyRing version";
$L['conf_bug']     = "Thank you, the bug report has now been sent!<br>You will receive a response ASAP!";
//admin/fiche.php
$L['fiche_site'] = "Site report";
$L['inscr_dep']  = "Subscribed since";
$L['add_e-mail'] = "E-mail address";
$L['nbre_vis']   = "Number of visits";
$L['supprimer']  = "Remove the site";
//admin/haut.php
$L['adminis']       = "Adminsitration";
$L['accueil']       = "Reception";
$L['verification']  = "Verification";
$L['liste_d_sites'] = "List of sites";
$L['logout']        = "Logout";
$L['msg_mbres']     = "Send a message to the members";
$L['rapp_bug']      = "Bug report";
//admin/index.php
$L['recap']        = "Small summary...";
$L['ya_nb_sites1'] = "There are";
$L['ya_nb_sites2'] = "sites subscribed";
$L['nb_att']       = "sites awaiting to be validated (see below)";
$L['voir_ls']      = "see the list";
$L['nb_des']       = "sites that have been de-activated, and that are now waiting to be re-activated";
$L['v_sites']      = "Verify the sites";
$L['msg_acc']      = "Greeting message";
$L['modif_msg']    = "Modify the message";
$L['ls_sites_att'] = "Sites asking to join the webring";
$L['accepter']     = "Accept";
$L['refuser']      = "Refuse";
$L['no_site_v']    = "There are no sites waiting to be validated!";
//admin/liste.php
$L['ls_sites_insc'] = "List of subscribed sites";
$L['del']           = "Remove";
$L['details']       = "Details";
$L['info_ls']       = "This list contains only the approved sites, and not the de-activated sites!";
//admin/modif_msg.php
$L['mod_msg_acc'] = "Modifying the greeting message";
$L['ferm_fen']    = "Close the window";
//admin/msg_mbres.php
$L['sd_msg_mb']    = "Send a meassage to the members";
$L['envoi_msg_ts'] = "Send a meassage to <u>all</u> members";
$L['titre_msg']    = "Message subject";
$L['corps_msg']    = "Message body";
$L['add_sign']     = "Signature";
$L['att_clik']     = "!!Attention!! Please submit only once!";
//admin/refus.php
$L['dem_refus']   = "Your request to join has been refused";
$L['body_ref']    = "I am sorry to inform you that your site has NOT been approved to join the webring of sites having the following focus, topic, or theme $TYPE"; //(... $TYPE)
$L['info_refus1'] = "The site N&deg;";
$L['info_refus2'] = "has been removed !";
//admin/send_msg.php
$L['form_inc'] = "Form incomplete!!";
$L['msg_env']  = "Message sent!";
//admin/supprimer.php
$L['body_supp1']     = "I regret to inform you that your site";
$L['body_supp2']     = "has been removed from the webring of";
$L['body_supp_obj1'] = "This removal follows upon a decision by the Ringmaster\n";
$L['body_supp_obj2'] = "Your site was removed because you did not correctly display the ring's navpanel\n";
$L['objet_supp']     = "Your site has been removed from the webring";
$L['site_num_sup1']  = "Site N°";
$L['site_num_sup2']  = "removed!";
//admin/verif.php
$L['ce_site_est'] = "This site is currently";
$L['verifier']    = "Verify";
$L['actif']       = "active";
$L['desactiv']    = "de-activated";
//admin/verification.php
$L['existe_po']       = "does not exist!";
$L['contient_wr']     = "displays the navpanel correctly.";
$L['contient_po']     = "doesn't display the navpanel.";
$L['ver_site']        = "Site verification :";
$L['la_page']         = "The page";
$L['verifier']        = "Verify";
$L['ce_site_est']     = "This site is currently:";
$L['changer_etat']    = "Change its state:";
$L['activer']         = "Activate";
$L['desactiver']      = "De-activate";
$L['laisser']         = "Leave it just as it is";
$L['prevenir_webmas'] = "Prevents the webmaster in the event of any changes (advised especially in the event of de-activation!)";
//admin/verification2.php
$L['activ']      = "active";
$L['do_nothing'] = "Nothing was done!";
$L['msg_imp']    = "Important message";
$L['web_prev']   = "Webmaster beware!";
//admin/voir.php
$L['site_demande'] = "This site requests to join the webring";
$L['rien_faire']   = "Nothing to do";
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# # # Ajouts lors de la version 4.0 # # # #
# # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # # #
# # # #
# Version 4.0 ß
# # # #
// add_com.php
$L['site_nom_def'] = "!!Error!!<br> The N&deg; of the site has not been entered!";
$L['comm_enr']     = "Thanks,<br>Your comments have now been recorded!";
$L['comm_err']     = "There was a error when recording your comments, please contact the administrator!";
$L['add_com']      = "Add comments about this site";
$L['votre_nom']    = "Your name";
$L['notation']     = "Notation";
$L['commentaire']  = "Comments";
$L['retablir']     = "Re-establish";
$L['retour_com']   = "Return to the comments";
// admin/modif_msg.php
$L['modif_ok'] = "Changes to the message have been made!";
//admin/voir.php
$L['nom_du_site'] = "The name of the site";
//admin/haut.php
$L['configuration'] = "Configuration";
$L['ad_admin']      = "Add a new administrator";
// admin/ajoutadmin.php
$L['creation_nouvel_admin'] = "Creation of a new administrator's account";
$L['champs_incomplets']     = "Fields incomplete and/or the e-mail address is incorrect";
# # # #
# Version 4.0 RC1
# # # #
//ajoutadmin.php
$L['liste_adm_enr']   = "List of the other registered administrators";
$L['del_admin']       = "Remove a administrator";
$L['admin_del']       = "Administrator removed!";
$L['compte_admin_er'] = "There was a error when creating the new administrator's account!";
$L['compte_admin_ok'] = "The new administrator's account was successfully created!";
$L['admin_del_err']   = "Unable to remove the selected administrator!";
//admin/refus.php
$L['info_refus_err'] = "Error when trying to remove site $idsite!";
//admin/send_msg.php
$L['msg_env_err'] = "Error when trying to send the message!";
//admin/supprimer.php
$L['erreur_suppression'] = "Error when trying to remove the site!";
//admin/index.php
$L['ds_interface']   = "in the administrator's PHPMyRing interface";
$L['you_use']        = "You are using version";
$L['si_new_version'] = "(verify <a href=\"http://www.microniko.net/phpmyring\" target=\"_blank\">what is the actual version?</a>)";
//view_com.php
$L['commentaires_de'] = "Site commentary";
# # # #
# Version 4.0 RC2
# # # #
//admin/voirlog.php
$L['voici_log'] = "Here is the log file LOG<br>It allows you to review your webring's activity.";
$L['vider_log'] = "Clear the log file LOG!";
# # # #
# Version 4.0 RC3
# # # #
// modif.php
$L['maj_err'] = "Impossible to update your information, please contact the administrator!!";
