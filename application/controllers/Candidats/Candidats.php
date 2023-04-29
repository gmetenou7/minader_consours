<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**annule la limitation de temps pour l'exécuption des requêtes */
ini_set('max_execution_time', 0); 

class Candidats extends CI_Controller {

	/**constructeur */
	public function __construct(){
		parent::__construct();
        $this->load->model('Candidats/Candidats_model', 'candidats');
    }

	/**connexion dabord */
	function logged_in(){
		if(!session('users') && $this->router->{'class'} !== 'index'){
			flash("warning","merci de te connecter");
			redirect('login');
		}
	}

		

	public function index(){
		$this->load->view('parts/header');
		$this->logged_in();


		if(isset($_POST['btn_ncandidat'])){
			$this->form_validation->set_rules('nom', 'nom complet', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni le %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('lnaissance', 'lieu de naissance', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni le %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('jour', 'jour de naissance', 'required|regex_match[/^[0-9\ ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni le %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('mois', 'mois de naissance', 'required|regex_match[/^[0-9\ ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni le %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('annee', 'annee de naissance', 'required|regex_match[/^[0-9\ ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni l\' %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('telp', 'telephone du candidat', 'required|regex_match[/^[0-9\-\(\)\/\+\s]*$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non pris en compte. changé!'
			));

			$this->form_validation->set_rules('telc', 'telephone du candidat', 'required|regex_match[/^[0-9\-\(\)\/\+\s]*$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non pris en compte. changé!'
			));


			$this->form_validation->set_rules('nationalite', 'nationalite', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni la %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('sexe', 'sexe', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni le %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('parcours', 'parcour', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni le %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('option', 'option', 'regex_match[/^[a-zA-Z\ ]+$/]',
			array(
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('qualite', 'qualité', 'required|regex_match[/^[a-zA-Z\ ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni la %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('depot', 'centre depot des dossiers', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('c_examen', 'centre d\'examen', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('langue', 'langue', 'required|regex_match[/^[a-zA-Z\ ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('choix1', 'centre de formation 1', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('choix2', 'centre de formation 2', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('choix3', 'centre de formation 3', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('diplome', 'diplome', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('etat_dip', 'état du diplome', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni l\' %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('certif_acte', '', 'required|regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('certif_dip', '', 'required|regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));
			
			$this->form_validation->set_rules('attest_dip', '', 'required|regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));
			
			$this->form_validation->set_rules('certif_medic', '', 'required|regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('photo', '', 'required|regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));
			
			$this->form_validation->set_rules('attest_anc', '', 'regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('auto_con', '', 'regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('recu', '', 'required|regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));
			
			

			if($this->form_validation->run()){
				$num_recepice = code_recepice(11);
				$nom = trim($this->input->post('nom'));
				$lnaissance = trim($this->input->post('lnaissance'));
				$date_naissance = trim($this->input->post('annee')).'-'.trim($this->input->post('mois')).'-'.trim($this->input->post('jour'));
				$tel_candidat = trim($this->input->post('telc'));
				$tel_parent = trim($this->input->post('telp')); 
				$nationalite = trim($this->input->post('nationalite')); 
				$sexe = trim($this->input->post('sexe')); 

				$parcours = trim($this->input->post('parcours'));
				$option = trim($this->input->post('option'));
				$statut = trim($this->input->post('qualite'));
				$depot = trim($this->input->post('depot'));
				$centre_examen = trim($this->input->post('c_examen'));
				$langue = trim($this->input->post('langue'));
				$choix1 = trim($this->input->post('choix1'));
				$choix2 = trim($this->input->post('choix2'));
				$choix3 = trim($this->input->post('choix3'));

				$diplome = trim($this->input->post('diplome'));
				$etat_diplome = trim($this->input->post('etat_dip'));

				$certif_acte = trim($this->input->post('certif_acte'));
				$certif_dip = trim($this->input->post('certif_dip'));
				$attest_dip = trim($this->input->post('attest_dip'));
				$certif_medic = trim($this->input->post('certif_medic'));
				$photo = trim($this->input->post('photo'));
				$attest_ancien = trim($this->input->post('attest_anc'));
				$autorisation_compo = trim($this->input->post('auto_con'));
				$recu = trim($this->input->post('recu'));

				$session = date('Y');

				$input = array(
					'num_recepice'=> $num_recepice,
					'nom_complet'=> $nom,
					'session'=> $session,
					'parcour'=> $parcours,
					'parcour_option'=> $option,
					'statut_candidat'=> $statut,
					'sexe'=> $sexe,
					'nationalite_candidat'=> $nationalite,
					'centre_depot_dossier'=> $depot,
					'centre_examen'=> $centre_examen,
					'date_naissance'=> $date_naissance,
					'lieu_naissance'=> $lnaissance,
					'diplome_entrer'=> $diplome,
					'etat_diplome'=> $etat_diplome,
					'ecole_choisi_1'=> $choix1,
					'ecole_choisi_2'=> $choix2,
					'ecole_choisi_3'=> $choix3,
					'langue_candidat'=> $langue,
					'telephone_candidat'=> $tel_candidat,
					'telephone_parent'=> $tel_parent,
					'certif_acte_naiss'=> $certif_acte,
					'certif_medical'=> $certif_medic,
					'autori_minader'=> $autorisation_compo,
					'certif_diplome'=> $certif_dip,
					'photo_candidat'=> $photo,
					'recu_paie'=> $recu,
					'attest_diplome'=> $attest_dip,
					'attest_ancien'=> $attest_ancien,
					'creer_le'=> dates()
				);

				/**insertion dans la BD */
				$query = $this->candidats->new_candidat($input);
				if($query){
					pdf(
						$num_recepice,
						$session,
						$parcours,
						$option,
						$statut,
						$nationalite,
						$depot,
						$sexe,
						$centre_examen,
						$nom,
						$date_naissance,
						$lnaissance,
						$diplome,
						$etat_diplome,
						$choix1,
						$choix2,
						$choix3,
						$langue,
						$tel_candidat,
						$tel_parent,
						$certif_acte,
						$certif_medic,
						$autorisation_compo,
						$certif_dip,
						$photo,
						$recu,
						$attest_dip,
						$attest_ancien
					);

					flash('success','vos informations ont été bien enrégistré');
					redirect('inscription');
				}else{
					flash('error','erreur survenu, vos informations n\'ont pas été bien enrégistré. actualisé puis reéssayez');
					redirect('inscription');
				}
			}else{
				flash('error','formulaire incorrect assurez-vous d\'avoir rempli correctement');
			}


			
		}
		




		/**jour de naissance*/
		$data['jour_naissance']=jour();

		/**annee naissance */
		$data['annee_naissance']=annee();

		/**mois naissance */
		$data['mois_naissance'] = mois();

		/**nationalité */
		$data['pays'] = array(
			'Cameroon'=> 'Cameroun',
			'Stranger'=> 'Etranger'
		);

		/**sexe */
		$data['sexe'] = array(
			'MALE' => 'MASCULIN',
			'FEMALE' => 'FEMININ'
		);

		/**affiche la liste des parcours */
		$data['parcours'] = $this->candidats->get_parcours();

		/**qualité du candidat */
		$data['qualite'] = array(
			'INTERNAL' => 'INTERNE',
			'EXTERNAL' => 'EXTERNE',
			'ONSTUDY' => 'SURETUDE'
		);

		/**selection de tous les centre de depot de dossiers */
		$data['centre_depot'] = $this->candidats->get_centre_depot();

		/**selectionne le centre d'examen */
		$data['centre_examen'] = $this->candidats->get_centre_examen();

		/**langue de composition */
		$data['langue'] = array(
			'FRENCH' => 'FRANCAIS',
			'ENGLISH' => 'ANGLAIS'
		);

		/**sous reserve ou obtenu */
		$data['etat'] = array(
			'OBTAINED' => 'OBTENU',
			'AWAITING-RESULT' => 'SOUS-RESERVE'
		);

		/**valeur dans le checkbox */
		$data['check'] = "ok";


		$this->load->view('candidats/view',$data);
		$this->load->view('parts/footer_assets');
	}


	/**affiche la vue liste des utilisateurs... exporter les candidats selon les paramètres*/
	public function list_canidat(){
		$this->load->view('parts/header');
		$this->logged_in();

		/**selection des parcours des candidats */
		$data['parcours'] = $this->candidats->parcours();

		/**selection de la quelite dans la table candidat */
		$data['qualite'] = $this->candidats->qualite();

		/**selectionne la langue des candidats */
		$data['langue'] = $this->candidats->langue();

		/**selectionne l'ecole de formation */
		$data['formation'] = $this->candidats->formation();

		/**selectionne les centres d'examen */
		$data['examen'] = $this->candidats->examen();


		/**validation du formulaire */
		$this->form_validation->set_rules('parcour', 'parcour', 'regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
				'regex_match'     => 'caractère(s) non pris en compte!'
		));

		$this->form_validation->set_rules('qualite', 'qualite', 'regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
				'regex_match'     => 'caractère(s) non pris en compte!'
		));

		$this->form_validation->set_rules('langue', 'langue', 'regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
				'regex_match'     => 'caractère(s) non pris en compte!'
		));

		$this->form_validation->set_rules('formation', 'formation', 'regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
				'regex_match'     => 'caractère(s) non pris en compte!'
		));

		$this->form_validation->set_rules('examen', 'examen', 'regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
				'regex_match'     => 'caractère(s) non pris en compte!'
		));


		if($this->form_validation->run()){

			$parcour = $this->input->post('parcour');
			$qualite = $this->input->post('qualite');
			$langue = $this->input->post('langue');
			$formation = $this->input->post('formation');
			$examen = $this->input->post('examen');

			$this->load->view('excel/vendor/autoload');

		
			$spreadsheet = new Spreadsheet();
			$sheet = $spreadsheet->getActiveSheet();

			$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true);
			$spreadsheet->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true);


			$sheet->setCellValue('A1', 'Numero recepice');
			$sheet->setCellValue('B1', 'Session');
			$sheet->setCellValue('C1', 'Parcour');
			$sheet->setCellValue('D1', 'Option');
			$sheet->setCellValue('E1', 'Statut');
			$sheet->setCellValue('F1', 'Sexe');
			$sheet->setCellValue('G1', 'Nationalite');
			$sheet->setCellValue('H1', 'Centre Depot');
			$sheet->setCellValue('I1', 'Centre Examen');
			$sheet->setCellValue('J1', 'Nom');
			$sheet->setCellValue('K1', 'Date Naissance');
			$sheet->setCellValue('L1', 'Lieu Naissance');
			$sheet->setCellValue('M1', 'Diplome');
			$sheet->setCellValue('N1', 'Etat');
			$sheet->setCellValue('O1', 'Ecole Formeation 1');
			$sheet->setCellValue('P1', 'Ecole Formeation 2');
			$sheet->setCellValue('Q1', 'Ecole Formeation 3');
			$sheet->setCellValue('R1', 'Langue');
			$sheet->setCellValue('S1', 'Telephone Candidat');
			$sheet->setCellValue('T1', 'Telephone Parent');
			$sheet->setCellValue('U1', 'Certification Acte Naissance');
			$sheet->setCellValue('V1', 'Certificat Medical');
			$sheet->setCellValue('W1', 'Autorisation Minader');
			$sheet->setCellValue('X1', 'Certification Diplome');
			$sheet->setCellValue('Y1', 'Photo Candidat');
			$sheet->setCellValue('Z1', 'Recu Paiement');
			$sheet->setCellValue('AA1', 'Attestation Diplome');
			$sheet->setCellValue('AB1', 'Attestation Anciennete');
			$sheet->setCellValue('AC1', 'Date Creation');
			$sheet->setCellValue('AD1', 'Date Modification');
				
			$candidats = $this->candidats->get_all_candidat_param($parcour,$qualite,$langue,$formation,$examen);
			
			if(!empty($candidats)){
					
				$compteur = 1;
				foreach ($candidats as $key => $value) {

					$compteur+=1;

					$sheet->setCellValue('A'.$compteur, $value['num_recepice']);
					$sheet->setCellValue('B'.$compteur, $value['session']);
					$sheet->setCellValue('C'.$compteur, $value['parcour']);
					$sheet->setCellValue('D'.$compteur, $value['parcour_option']);
					$sheet->setCellValue('E'.$compteur, $value['statut_candidat']);
					$sheet->setCellValue('F'.$compteur, $value['sexe']);
					$sheet->setCellValue('G'.$compteur, $value['nationalite_candidat']);
					$sheet->setCellValue('H'.$compteur, $value['centre_depot_dossier']);
					$sheet->setCellValue('I'.$compteur, $value['centre_examen']);
					$sheet->setCellValue('J'.$compteur, $value['nom_complet']);
					$sheet->setCellValue('K'.$compteur, $value['date_naissance']);
					$sheet->setCellValue('L'.$compteur, $value['lieu_naissance']);
					$sheet->setCellValue('M'.$compteur, $value['diplome_entrer']);
					$sheet->setCellValue('N'.$compteur, $value['etat_diplome']);
					$sheet->setCellValue('O'.$compteur, $value['ecole_choisi_1']);
					$sheet->setCellValue('P'.$compteur, $value['ecole_choisi_2']);
					$sheet->setCellValue('Q'.$compteur, $value['ecole_choisi_3']);
					$sheet->setCellValue('R'.$compteur, $value['langue_candidat']);
					$sheet->setCellValue('S'.$compteur, $value['telephone_candidat']);
					$sheet->setCellValue('T'.$compteur, $value['telephone_parent']);
					$sheet->setCellValue('U'.$compteur, $value['certif_acte_naiss']);
					$sheet->setCellValue('V'.$compteur, $value['certif_medical']);
					$sheet->setCellValue('W'.$compteur, $value['autori_minader']);
					$sheet->setCellValue('X'.$compteur, $value['certif_diplome']);
					$sheet->setCellValue('Y'.$compteur, $value['photo_candidat']);
					$sheet->setCellValue('Z'.$compteur, $value['recu_paie']);
					$sheet->setCellValue('AA'.$compteur, $value['attest_diplome']);
					$sheet->setCellValue('AB'.$compteur, $value['attest_ancien']);
					$sheet->setCellValue('AC'.$compteur, $value['creer_le']);
					$sheet->setCellValue('AD'.$compteur, $value['modifier_le']);
				}
				
				$writer = new Xlsx($spreadsheet);
				$filename = date('Y').'LIST_CANDIDATS'; 
				
				header('Content-Type: application/vnd.ms-excel');
				header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
				header('Cache-Control: max-age=0');
				
				$writer->save('php://output'); // download file 
			}else{
				flash('error','aucun candidat trouvé selon les paramètres choisis');
				redirect('lcandidats');
			}

			
		}

		$this->load->view('candidats/list_candidat',$data);
		$this->load->view('parts/footer_assets');
	}

	/**pagination */
	public function pagination($num_page = NULL){
		
		$recherche_candidat = trim($this->input->get('search'));

		if(empty($recherche_candidat)){

			$config =  array();
			$config["base_url"] = "#";
			$config["total_rows"] =  $this->candidats->count_candidat();
			$config["per_page"] = 10;
			$config["uri_segment"] = 2;
			$config["use_page_numbers"] = TRUE;
			$config["full_tag_open"] = '<ul class="pagination">';
			$config["full_tag_close"] = '</ul>';
			$config["first_tag_open"] = ' <li class="page-item">';
			$config["first_tag_close"] = ' </li>';
			$config["last_tag_open"] = ' <li class="page-item"> --';
			$config["last_tag_close"] = ' </li>';
			$config["next_link"] = ' &raquo; ';
			$config["next_tag_open"] = ' <li class="page-link"> --';
			$config["next_tag_close"] = ' </li>';
			$config["prev_link"] = ' &laquo; ';
			$config["prev_tag_open"] = ' <li class="page-link"> --';
			$config["prev_tag_close"] = ' </li>';
			$config["cur_tag_open"] = " <li class='page-link active'> -- <a href='#'>";
			$config["cur_tag_close"] = " </a></li>";
			$config["num_tag_open"] = ' <li class="page-item page-link"> --';
			$config["num_tag_close"] = ' </li>';
			$config["num_links"] = 1;
			$this->pagination->initialize($config);
			$page = $this->uri->segment(2);
			$start = ($page - 1) * $config["per_page"];


			$output = array(
				'pagination_link'=>$this->pagination->create_links(),
				'candidat_table'=> $this->candidats->get_all_candidats($config["per_page"],$start),
				'total_candidat'=> 'total candidats: '.$this->candidats->count_candidat()
			);

		}else{
			
			$config =  array();
			$config["base_url"] = "#";
			$config["total_rows"] =  $this->candidats->count_candidat_search($recherche_candidat);
			$config["per_page"] = 10;
			$config["uri_segment"] = 2;
			$config["use_page_numbers"] = TRUE;
			$config["full_tag_open"] = '<ul class="pagination">';
			$config["full_tag_close"] = '</ul>';
			$config["first_tag_open"] = ' <li class="page-item">';
			$config["first_tag_close"] = ' </li>';
			$config["last_tag_open"] = ' <li class="page-item"> --';
			$config["last_tag_close"] = ' </li>';
			$config["next_link"] = ' &gt; ';
			$config["next_tag_open"] = ' <li class="page-item"> --';
			$config["next_tag_close"] = ' </li>';
			$config["prev_link"] = ' &lt; ';
			$config["prev_tag_open"] = ' <li class="page-item"> --';
			$config["prev_tag_close"] = ' </li>';
			$config["cur_tag_open"] = " <li class='page-item active'> -- <a href='#'>";
			$config["cur_tag_close"] = " </a></li>";
			$config["num_tag_open"] = ' <li class="page-item"> --';
			$config["num_tag_close"] = ' </li>';
			$config["num_links"] = 1;
			$this->pagination->initialize($config);
			$page = $this->uri->segment(2);
			$start = ($page - 1) * $config["per_page"];


			$output = array(
				'pagination_link'=>$this->pagination->create_links(),
				'candidat_table'=> $this->candidats->get_all_candidat_recherche($config["per_page"],$start,$recherche_candidat),
				'total_candidat'=> 'total candidat(s): '.$this->candidats->count_candidat()
			);
		}

		echo json_encode($output);
	}


	/**exporter la liste des candidats */
	public function export_candidat(){

		$this->load->view('excel/vendor/autoload');

		
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();




		$spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('R')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('S')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('T')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('U')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('V')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('W')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('X')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('Y')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('Z')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('AA')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('AB')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('AC')->setAutoSize(true);
		$spreadsheet->getActiveSheet()->getColumnDimension('AD')->setAutoSize(true);



		$sheet->setCellValue('A1', 'Numero recepice');
		$sheet->setCellValue('B1', 'Session');
		$sheet->setCellValue('C1', 'Parcour');
		$sheet->setCellValue('D1', 'Option');
		$sheet->setCellValue('E1', 'Statut');
		$sheet->setCellValue('F1', 'Sexe');
		$sheet->setCellValue('G1', 'Nationalite');
		$sheet->setCellValue('H1', 'Centre Depot');
		$sheet->setCellValue('I1', 'Centre Examen');
		$sheet->setCellValue('J1', 'Nom');
		$sheet->setCellValue('K1', 'Date Naissance');
		$sheet->setCellValue('L1', 'Lieu Naissance');
		$sheet->setCellValue('M1', 'Diplome');
		$sheet->setCellValue('N1', 'Etat');
		$sheet->setCellValue('O1', 'Ecole Formeation 1');
		$sheet->setCellValue('P1', 'Ecole Formeation 2');
		$sheet->setCellValue('Q1', 'Ecole Formeation 3');
		$sheet->setCellValue('R1', 'Langue');
		$sheet->setCellValue('S1', 'Telephone Candidat');
		$sheet->setCellValue('T1', 'Telephone Parent');
		$sheet->setCellValue('U1', 'Certification Acte Naissance');
		$sheet->setCellValue('V1', 'Certificat Medical');
		$sheet->setCellValue('W1', 'Autorisation Minader');
		$sheet->setCellValue('X1', 'Certification Diplome');
		$sheet->setCellValue('Y1', 'Photo Candidat');
		$sheet->setCellValue('Z1', 'Recu Paiement');
		$sheet->setCellValue('AA1', 'Attestation Diplome');
		$sheet->setCellValue('AB1', 'Attestation Anciennete');
		$sheet->setCellValue('AC1', 'Date Creation');
		$sheet->setCellValue('AD1', 'Date Modification');
		
		/**liste de tous les candidats */
		$candidats = $this->candidats->get_all_candidat(); 
		$compteur = 1;
		foreach ($candidats as $key => $value) {

			$compteur+=1;

			$sheet->setCellValue('A'.$compteur, $value['num_recepice']);
			$sheet->setCellValue('B'.$compteur, $value['session']);
			$sheet->setCellValue('C'.$compteur, $value['parcour']);
			$sheet->setCellValue('D'.$compteur, $value['parcour_option']);
			$sheet->setCellValue('E'.$compteur, $value['statut_candidat']);
			$sheet->setCellValue('F'.$compteur, $value['sexe']);
			$sheet->setCellValue('G'.$compteur, $value['nationalite_candidat']);
			$sheet->setCellValue('H'.$compteur, $value['centre_depot_dossier']);
			$sheet->setCellValue('I'.$compteur, $value['centre_examen']);
			$sheet->setCellValue('J'.$compteur, $value['nom_complet']);
			$sheet->setCellValue('K'.$compteur, $value['date_naissance']);
			$sheet->setCellValue('L'.$compteur, $value['lieu_naissance']);
			$sheet->setCellValue('M'.$compteur, $value['diplome_entrer']);
			$sheet->setCellValue('N'.$compteur, $value['etat_diplome']);
			$sheet->setCellValue('O'.$compteur, $value['ecole_choisi_1']);
			$sheet->setCellValue('P'.$compteur, $value['ecole_choisi_2']);
			$sheet->setCellValue('Q'.$compteur, $value['ecole_choisi_3']);
			$sheet->setCellValue('R'.$compteur, $value['langue_candidat']);
			$sheet->setCellValue('S'.$compteur, $value['telephone_candidat']);
			$sheet->setCellValue('T'.$compteur, $value['telephone_parent']);
			$sheet->setCellValue('U'.$compteur, $value['certif_acte_naiss']);
			$sheet->setCellValue('V'.$compteur, $value['certif_medical']);
			$sheet->setCellValue('W'.$compteur, $value['autori_minader']);
			$sheet->setCellValue('X'.$compteur, $value['certif_diplome']);
			$sheet->setCellValue('Y'.$compteur, $value['photo_candidat']);
			$sheet->setCellValue('Z'.$compteur, $value['recu_paie']);
			$sheet->setCellValue('AA'.$compteur, $value['attest_diplome']);
			$sheet->setCellValue('AB'.$compteur, $value['attest_ancien']);
			$sheet->setCellValue('AC'.$compteur, $value['creer_le']);
			$sheet->setCellValue('AD'.$compteur, $value['modifier_le']);
		}

		$writer = new Xlsx($spreadsheet);
		$filename = date('Y').'LIST_CANDIDATS'; 
		
		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
		header('Cache-Control: max-age=0');
		
		$writer->save('php://output'); // download file 
	}



	/**affiche le diplome en fonction du parcour debut*/
	public function diplome_parcour(){
		if($this->input->post('parcour_id')){
			/**affiche les options de parcour */
			$query =  $this->candidats->get_diplome_parcour($this->input->post('parcour_id'));
			if(!empty($query)){
				$output ='';
				foreach($query as $row){
					$output .= '<option value="'.$row['diplome_ref'].'">'.$row['diplome_ref'].'</option>';
				}
				echo $output;
			}	
		}
	}
	/**affiche le diplome en fonction du parcour fin*/

	/**affiche le diplome en fonction du parcour debut*/
	public function diplome_serie(){
		if($this->input->post('diplome_id')){
			/**affiche les options de parcour */
			$query =  $this->candidats->get_diplome_serie($this->input->post('diplome_id'));
			if(!empty($query)){
				$output ='';
				foreach($query as $row){
					$output .= '<option value="'.$row['serie_ref'].'">'.$row['serie_ref'].'</option>';
				}
				echo $output;
			}	
		}
	}
	/**affiche le diplome en fonction du parcour fin*/

	/**selectionne les option d'un parcour debut*/
	public function fetch_option(){
		if($this->input->post('parcour_id')){
			/**affiche les options de parcour */
			$query =  $this->candidats->get_option_parcour($this->input->post('parcour_id'));

			if(!empty($query)){
				$output ='';
				$output .='<option value="'.set_value("parcour").'">'.set_value("parcour").'</option>';
				foreach($query as $row){
					$output .= '<option value="'.$row['nom_option'].'">'.$row['nom_option'].'</option>';
				}
				echo $output;
			}	
		}
	}
	/**selectionne les option d'un parcour fin*/
	

	/**selectionne les centres de formation en fonction du parcour debut */
	public function fetch_centre_formation1(){
		if($this->input->post('parcour_id')){

			/**affiche les centre de formation en fonction du parcour */
			$query = $this->candidats->get_centre_formation_parcour($this->input->post('parcour_id'));

			if(!empty($query)){
				$output ='';
				foreach($query as $row){
					$output .= '<option value="'.$row['ref_centre_formation'].'">'.$row['ref_centre_formation'].'</option>';
				}
				echo $output;
			}	
		}
	}
	public function fetch_centre_formation2(){
		if($this->input->post('parcour_id')){

			/**affiche les centre de formation en fonction du parcour */
			$query = $this->candidats->get_centre_formation_parcour($this->input->post('parcour_id'));

			if(!empty($query)){
				$output ='';
				foreach($query as $row){
					$output .= '<option value="'.$row['ref_centre_formation'].'">'.$row['ref_centre_formation'].'</option>';
				}
				echo $output;
			}	
		}
	}
	public function fetch_centre_formation3(){
		if($this->input->post('parcour_id')){

			/**affiche les centre de formation en fonction du parcour */
			$query = $this->candidats->get_centre_formation_parcour($this->input->post('parcour_id'));

			if(!empty($query)){
				$output ='';
				foreach($query as $row){
					$output .= '<option value="'.$row['ref_centre_formation'].'">'.$row['ref_centre_formation'].'</option>';
				}
				echo $output;
			}	
		}
	}

	/**************************************************************** */ 
	public function fetch_centre_formation_1(){
		if($this->input->post('parcour_option')){
			/**affiche les centre de formation en fonction du parcour */
			$query = $this->candidats->get_centre_formation_parcour_1($this->input->post('parcour_option'));

			if(!empty($query)){
				$output ='';
				foreach($query as $row){
					$output .= '<option value="'.$row['ref_centre_formation'].'">'.$row['ref_centre_formation'].'</option>';
				}
				echo $output;
			}	
		}
	}

	public function fetch_centre_formation_2(){
		if($this->input->post('parcour_option')){
			/**affiche les centre de formation en fonction du parcour */
			$query = $this->candidats->get_centre_formation_parcour_1($this->input->post('parcour_option'));

			if(!empty($query)){
				$output ='';
				foreach($query as $row){
					$output .= '<option value="'.$row['ref_centre_formation'].'">'.$row['ref_centre_formation'].'</option>';
				}
				echo $output;
			}	
		}
	}
	
	public function fetch_centre_formation_3(){
		if($this->input->post('parcour_option')){
			/**affiche les centre de formation en fonction du parcour */
			$query = $this->candidats->get_centre_formation_parcour_1($this->input->post('parcour_option'));

			if(!empty($query)){
				$output ='';
				foreach($query as $row){
					$output .= '<option value="'.$row['ref_centre_formation'].'">'.$row['ref_centre_formation'].'</option>';
				}
				echo $output;
			}	
		}
	}
	/**selectionne les centres de formation en fonction du parcour fin */




	/*supprimer un candidat*/
    public function delete_candidat(){
		$this->logged_in(); /*connecte toi d'abord*/
		$output ="";
		$id = $this->input->post('row_id');

		$query = $this->candidats->delete_candidat($id);
		if(!$query){
			$output = "erreur suvenu";
		}
		$output = "Action effectue avec succes";

		echo json_encode($output);
	}

	/**afficher les informations d'un candidat particulier */
	public function profil_candidat($id = NULL){
		$this->logged_in();
		$this->load->view('parts/header');

		$query = $this->candidats->get_code($id);
		if($query){

			$this->load->view('parts/header');

			$data['candidat'] = $this->candidats->profil_candidat($id);

			if(!empty($data['candidat'])){

				$this->load->view('mergepdf/vendor/autoload');
				$pdf = new \Jurosh\PDFMerge\PDFMerger;

				if(!empty($data['candidat']['certif_acte_naiss'])){
					$pdf->addPDF($data['candidat']['certif_acte_naiss'], 'all', 'vertical');
				}

				if(!empty($data['candidat']['certif_medical'])){
					$pdf->addPDF($data['candidat']['certif_medical'], 'all');
				}

				if(!empty($data['candidat']['certif_diplome'])){
					$pdf->addPDF($data['candidat']['certif_diplome'], 'all', 'vertical');
				}

				if(!empty($data['candidat']['attest_diplome'])){
					$pdf->addPDF($data['candidat']['attest_diplome'], 'all', 'vertical');
				}

				if(!empty($data['candidat']['recu_paie'])){
					$pdf->addPDF($data['candidat']['recu_paie'], 'all', 'vertical');
				}

				if(!empty($data['candidat']['autori_minader'])){
					$pdf->addPDF($data['candidat']['autori_minader'], 'all', 'vertical');
				}

				if(!empty($data['candidat']['attest_ancien'])){
					$pdf->addPDF($data['candidat']['attest_ancien'], 'all', 'vertical');
				}

				$pieces = explode("/",$data['candidat']['attest_diplome']);

				$path = $pieces[0].'/'.$pieces[1].'/';

				$pdf->merge('file', $path.'file.pdf');
			}

		}else{
			flash('error','votre code n\'est pas correct');
			redirect('lcandidats');
		}

		$this->load->view('candidats/profil',$data);
		$this->load->view('parts/footer_assets');
	}
	
	/**telecharger et ou imprimer la fiche d'un candidat particulier en pdf */
	public function print_pdf($id = NULL){
		$query = $this->candidats->get_code($id);
		if($query){
			$candidat = $this->candidats->profil_candidat($id);
			pdf(
				$candidat['num_recepice'],
				$candidat['session'],
				$candidat['parcour'],
				$candidat['parcour_option'],
				$candidat['statut_candidat'],
				$candidat['nationalite_candidat'],
				$candidat['centre_depot_dossier'],
				$candidat['sexe'],
				$candidat['centre_examen'],
				$candidat['nom_complet'],
				date('d/m/Y',strtotime($candidat['date_naissance'])),
				$candidat['lieu_naissance'],
				$candidat['diplome_entrer'],
				$candidat['etat_diplome'],
				$candidat['serie_diplome'],
				$candidat['ecole_choisi_1'],
				$candidat['ecole_choisi_2'],
				$candidat['ecole_choisi_3'],
				$candidat['langue_candidat'],
				$candidat['telephone_candidat'],
				$candidat['telephone_parent'],
				$candidat['certif_acte_naiss'],
				$candidat['certif_medical'],
				$candidat['autori_minader'],
				$candidat['certif_diplome'],
				$candidat['photo_candidat'],
				$candidat['recu_paie'],
				$candidat['attest_diplome'],
				$candidat['attest_ancien']
			);
		}else{
			flash('error','votre code n\'est pas correct');
			redirect('lcandidats');
		}
	}


	/**modifier un candidat(afficher les informations dans le formulaire de modification)*/
	public function update_single_candidat($num_recepice = NULL){
		$this->logged_in();
		$this->load->view('parts/header');
		
			/**jour de naissance*/
			$data['jour_naissance']=jour();

			/**annee naissance */
			$data['annee_naissance']=annee();
	
			/**mois naissance */
			$data['mois_naissance'] = mois();
	
			/**nationalité */
			$data['pays'] = array(
				'Cameroon'=> 'Cameroun',
				'Stranger'=> 'Etranger'
			);
	
			/**sexe */
			$data['sexe'] = array(
				'MALE' => 'MASCULIN',
				'FEMALE' => 'FEMININ'
			);
	
			/**affiche la liste des parcours */
			$data['parcours'] = $this->candidats->get_parcours();
	
			/**qualité du candidat */
			$data['qualite'] = array(
				'INTERNAL' => 'INTERNE',
				'EXTERNAL' => 'EXTERNE',
				'ONSTUDY' => 'SURETUDE'
			);
	
			/**selection de tous les centre de depot de dossiers */
			$data['centre_depot'] = $this->candidats->get_centre_depot();
	
			/**selectionne le centre d'examen */
			$data['centre_examen'] = $this->candidats->get_centre_examen();
	
			/**langue de composition */
			$data['langue'] = array(
				'FRENCH' => 'FRANCAIS',
				'ENGLISH' => 'ANGLAIS'
			);
	
			/**sous reserve ou obtenu */
			$data['etat'] = array(
				'OBTAINED' => 'OBTENU',
				'AWAITING-RESULT' => 'SOUS-RESERVE'
			);
	
			/**valeur dans le checkbox */
			$data['check'] = "ok";
	
			$query = $this->candidats->get_code($num_recepice);
			if($query){
				/**selectionne un candidtat particulier grace de son numéro de recepicer */
				$data['candidat'] = $this->candidats->profil_candidat($num_recepice);		
			}else{
				flash('error','votre code n\'est pas correct');
				redirect('lcandidats');
			}

		$this->load->view('candidats/update',$data);
		$this->load->view('parts/footer_assets');
	}

	public function update($num_recepice = NULL){
		$this->logged_in();
		if(isset($_POST['btn_ncandidat'])){

			$this->form_validation->set_rules('nom', 'nom complet', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni le %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('lnaissance', 'lieu de naissance', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni le %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('jour', 'jour de naissance', 'required|regex_match[/^[0-9\ ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni le %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('mois', 'mois de naissance', 'required|regex_match[/^[0-9\ ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni le %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('annee', 'annee de naissance', 'required|regex_match[/^[0-9\ ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni l\' %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('telp', 'telephone du candidat', 'required|regex_match[/^[0-9\-\(\)\/\+\s]*$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non pris en compte. changé!'
			));

			$this->form_validation->set_rules('telc', 'telephone du candidat', 'required|regex_match[/^[0-9\-\(\)\/\+\s]*$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non pris en compte. changé!'
			));


			$this->form_validation->set_rules('nationalite', 'nationalite', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni la %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('sexe', 'sexe', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni le %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('parcours', 'parcour', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
				array(
					'required' => 'Tu n\'as pas fourni le %s.',
					'regex_match' => 'caractère(s) non autorisé(s)'
				)
			);

			$this->form_validation->set_rules('option', 'option', 'regex_match[/^[a-zA-Z\ ]+$/]',
			array(
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('qualite', 'qualité', 'required|regex_match[/^[a-zA-Z\ ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni la %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('depot', 'centre depot des dossiers', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('c_examen', 'centre d\'examen', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('langue', 'langue', 'required|regex_match[/^[a-zA-Z\ ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('choix1', 'centre de formation 1', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('choix2', 'centre de formation 2', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('choix3', 'centre de formation 3', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('diplome', 'diplome', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('etat_dip', 'état du diplome', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni l\' %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('certif_acte', '', 'required|regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('certif_dip', '', 'required|regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));
			
			$this->form_validation->set_rules('attest_dip', '', 'required|regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));
			
			$this->form_validation->set_rules('certif_medic', '', 'required|regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('photo', '', 'required|regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));
			
			$this->form_validation->set_rules('attest_anc', '', 'regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('auto_con', '', 'regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('recu', '', 'required|regex_match[/^[a-zA-Z._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));


			if($this->form_validation->run()){
				$nom = trim($this->input->post('nom'));
				$lnaissance = trim($this->input->post('lnaissance'));
				$date_naissance = trim($this->input->post('annee')).'-'.trim($this->input->post('mois')).'-'.trim($this->input->post('jour'));
				$tel_candidat = trim($this->input->post('telc'));
				$tel_parent = trim($this->input->post('telp')); 
				$nationalite = trim($this->input->post('nationalite')); 
				$sexe = trim($this->input->post('sexe')); 

				$parcours = trim($this->input->post('parcours'));
				$option = trim($this->input->post('option'));
				$statut = trim($this->input->post('qualite'));
				$depot = trim($this->input->post('depot'));
				$centre_examen = trim($this->input->post('c_examen'));
				$langue = trim($this->input->post('langue'));
				$choix1 = trim($this->input->post('choix1'));
				$choix2 = trim($this->input->post('choix2'));
				$choix3 = trim($this->input->post('choix3'));

				$diplome = trim($this->input->post('diplome'));
				$etat_diplome = trim($this->input->post('etat_dip'));

				$certif_acte = trim($this->input->post('certif_acte'));
				$certif_dip = trim($this->input->post('certif_dip'));
				$attest_dip = trim($this->input->post('attest_dip'));
				$certif_medic = trim($this->input->post('certif_medic'));
				$photo = trim($this->input->post('photo'));
				$attest_ancien = trim($this->input->post('attest_anc'));
				$autorisation_compo = trim($this->input->post('auto_con'));
				$recu = trim($this->input->post('recu'));

				$input = array(
					'nom_complet'=> $nom,
					'parcour'=> $parcours,
					'parcour_option'=> $option,
					'statut_candidat'=> $statut,
					'sexe'=> $sexe,
					'nationalite_candidat'=> $nationalite,
					'centre_depot_dossier'=> $depot,
					'centre_examen'=> $centre_examen,
					'date_naissance'=> $date_naissance,
					'lieu_naissance'=> $lnaissance,
					'diplome_entrer'=> $diplome,
					'etat_diplome'=> $etat_diplome,
					'ecole_choisi_1'=> $choix1,
					'ecole_choisi_2'=> $choix2,
					'ecole_choisi_3'=> $choix3,
					'langue_candidat'=> $langue,
					'telephone_candidat'=> $tel_candidat,
					'telephone_parent'=> $tel_parent,
					'certif_acte_naiss'=> $certif_acte,
					'certif_medical'=> $certif_medic,
					'autori_minader'=> $autorisation_compo,
					'certif_diplome'=> $certif_dip,
					'photo_candidat'=> $photo,
					'recu_paie'=> $recu,
					'attest_diplome'=> $attest_dip,
					'attest_ancien'=> $attest_ancien,
					'modifier_le'=> dates()
				);

				$query_test = $this->candidats->get_code($num_recepice);
				if($query_test){
					/**modifier un candidat dans la base des données */
					$query = $this->candidats->update_candidat($num_recepice,$input);
					if($query){
						flash('success','vos informations ont été modifiés');
						redirect('update_candidat/'.$num_recepice);
					}else{
						flash('error','erreur survenu, vos informations n\'ont pas été modifiés. actualisé puis reéssayez');
						redirect('update_candidat/'.$num_recepice);
					}
				}else{
					flash('error','votre code n\'est pas correct');
					redirect('lcandidats');
				}
			}else{
				flash('error','formulaire incorrect assurez-vous d\'avoir rempli correctement');
			}
		}

		/**jour de naissance*/
		$data['jour_naissance']=jour();

		/**annee naissance */
		$data['annee_naissance']=annee();

		/**mois naissance */
		$data['mois_naissance'] = mois();

		/**nationalité */
		$data['pays'] = array(
			'Cameroon'=> 'Cameroun',
			'Stranger'=> 'Etranger'
		);

		/**sexe */
		$data['sexe'] = array(
			'MALE' => 'MASCULIN',
			'FEMALE' => 'FEMININ'
		);

		/**affiche la liste des parcours */
		$data['parcours'] = $this->candidats->get_parcours();

		/**qualité du candidat */
		$data['qualite'] = array(
			'INTERNAL' => 'INTERNE',
			'EXTERNAL' => 'EXTERNE',
			'ONSTUDY' => 'SURETUDE'
		);

		/**selection de tous les centre de depot de dossiers */
		$data['centre_depot'] = $this->candidats->get_centre_depot();

		/**selectionne le centre d'examen */
		$data['centre_examen'] = $this->candidats->get_centre_examen();

		/**langue de composition */
		$data['langue'] = array(
			'FRENCH' => 'FRANCAIS',
			'ENGLISH' => 'ANGLAIS'
		);

		/**sous reserve ou obtenu */
		$data['etat'] = array(
			'OBTAINED' => 'OBTENU',
			'AWAITING-RESULT' => 'SOUS-RESERVE'
		);

		/**valeur dans le checkbox */
		$data['check'] = "ok";

		$this->load->view('candidats/update',$data);
		$this->load->view('parts/footer_assets');





	}

	



}
