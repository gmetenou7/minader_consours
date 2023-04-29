<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';

/**gestion du candidat a l'extérieur */
$route['/'] = 'welcome';
$route['inscription'] = 'welcome/new_candidat';
$route['newinscription'] = 'welcome/submit_new_candidat';
$route['uinscription'] = 'welcome/submit_update_candidat';
$route['option'] = 'welcome/option';
$route['centre_formation'] = 'welcome/centre_formation';
$route['centre_formation_op'] = 'welcome/centre_formation_op';
$route['parcours_dip'] = 'welcome/parcours_diplome';
$route['cfiche'] = 'welcome/fiche';
$route['cfiche/(:any)'] = 'welcome/fiche_profil/$1';
$route['print/(:any)'] = 'welcome/print_pdf/$1';
$route['editu/(:any)'] = 'welcome/edit_profil/$1';
$route['update/(:any)'] = 'welcome/update_candidat/$1';


/**gestion des utilisateurs */
$route['luser'] = 'Users/User/lusers';
$route['edit/(:any)'] = 'Users/User/edit_user/$1';
$route['update_user'] = 'Users/User/update';
$route['update_user_password'] = 'Users/User/update_password';


/**users */
$route['login'] = 'Users/User/index';
$route['view'] = 'Users/User/view';
$route['new_user'] = 'Users/User/insert_user';
$route['logout_user'] = 'Users/User/logout';





/**home */
$route['home'] = 'Home/Home/index';

/**candidats */
$route['candidats'] = 'Candidats/Candidats/index';
$route['print_fiche/(:any)'] = 'Candidats/Candidats/print_pdf/$1';
$route['lcandidats'] = 'Candidats/Candidats/list_canidat';
$route['list_candidat/(:any)'] = 'Candidats/Candidats/pagination/$1';
//$route['lcandidats/(:num)'] = 'Candidats/Candidats/list_canidat/$1';
$route['profil/(:any)'] = 'Candidats/Candidats/profil_candidat/$1';
$route['update_candidat/(:any)'] = 'Candidats/Candidats/update_single_candidat/$1';
$route['updatec/(:any)'] = 'Candidats/Candidats/update/$1';

/**exporter la liste des candidats */
$route['export'] = 'Candidats/Candidats/export_candidat';






$route['option_parcour'] = 'Candidats/Candidats/fetch_option';
$route['centre_formation1'] = 'Candidats/Candidats/fetch_centre_formation1';
$route['centre_formation2'] = 'Candidats/Candidats/fetch_centre_formation2';
$route['centre_formation3'] = 'Candidats/Candidats/fetch_centre_formation3';

/********************************************************************************* */
$route['centre_formation1_1'] = 'Candidats/Candidats/fetch_centre_formation_1';
$route['centre_formation1_2'] = 'Candidats/Candidats/fetch_centre_formation_2';
$route['centre_formation1_3'] = 'Candidats/Candidats/fetch_centre_formation_3';
$route['remove_candidat'] = 'Candidats/Candidats/delete_candidat';





$route['diplome'] = 'Candidats/Candidats/diplome_parcour';
$route['serie'] = 'Candidats/Candidats/diplome_serie';
$route['files'] = 'Export_import/Import/index';
$route['import'] = 'Export_import/Import/import_candidat';



/**anonymat */
$route['anonymat'] = 'Anonymat/Anonymat/index';
$route['anonymat_generator'] = 'Anonymat/Anonymat/generat_annonymat';




/**nouveau candidat */
$route['new_candidat'] = 'Candidats/Candidats/new_candidat';

/**candidat par centre de composition*/
$route['centrecompo'] = 'Candidat_centre_compo/Candidat_centre_compo/index';


/**généré les candidats par centre de composition dans un pdf */
$route['getPdf/(:any)'] = 'Candidat_centre_compo/Candidat_centre_compo/pdf_centre_composition/$1';
$route['getPdf'] = 'Candidat_centre_compo/Candidat_centre_compo/all_pdf_centre_composition';



/**fiche de repport des notes */
$route['fiche'] = 'Fiche/Fiche/index';

$route['fiche/(:any)/(:any)/(:any)'] = 'Fiche/Fiche/pdf_fiche_repport/$1/$1/$1';

/**saisir les notes */
$route['note'] = 'Note/Note/index';
$route['form_note'] = 'Note/Note/form_saisi';
$route['save_note'] = 'Note/Note/save_note';


/**resultat */
$route['resultat'] = 'Resultat/Resultat/index';
$route['total_resultats'] = 'Resultat/Resultat/excel_resultat';


/**compte le nombre de candidat par parcours */
$route['count_candidat_parcour'] = 'Home/Home/candidat_parcour';
/**compte le nombre de candidat par option */
$route['count_candidat_option'] = 'Home/Home/candidat_option';
/**nombre de candidats par statut ou par qualité(interne, externe)*/
$route['count_candidat_qualite'] = 'Home/Home/candidat_qualite';
/**nombre de candidat par sexe */
$route['count_candidat_sexe'] = 'Home/Home/candidat_sexe';

/**nombre de candidats par langue */
$route['count_candidat_langue'] = 'Home/Home/candidat_langue';

/**nombre candidat par centre d'examen */
$route['count_candidat_examen'] = 'Home/Home/candidat_examen';

/**nombre de candidat par centre de formation */
$route['count_candidat_formation'] = 'Home/Home/candidat_formation';







/**paramètres */
$route['settings'] = 'Settings/Settings';
$route['session_date'] = 'Settings/Settings/session';
$route['get_session'] = 'Settings/Settings/show_session';
$route['delete_session'] = 'Settings/Settings/delete_session';

$route['depot'] = 'Settings/Settings/insert_centre_depot';
$route['get_depot'] = 'Settings/Settings/get_centre_depot';
$route['delete_depot'] = 'Settings/Settings/delete_centre_depot';

$route['examen'] = 'Settings/Settings/save_examen';
$route['get_examen'] = 'Settings/Settings/get_all_examen';
$route['delete_examen'] = 'Settings/Settings/delete_centre_examen';






/**exporter la liste des candidats anonymé sous excel */
$route['candidatanonyme'] = 'Anonymat/Anonymat/exporte_anonyme';





$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
