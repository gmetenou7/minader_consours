<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**constructeur */
	public function __construct(){
		parent::__construct();
        $this->load->model('Candidats/Candidats_model', 'candidats');
    }

	/**page welcome */
	public function index()
	{
		$etat_session_annuel = $this->testdesession();
		
		$this->load->view('welcome/header',['session_actuel'=>$etat_session_annuel]);
		$this->load->view('welcome/welcome');

		$this->load->view('welcome/footer');
		//redirect('login');
	}

	/**inscrire un candidat */
	public function new_candidat(){
		$etat_session_annuel = $this->testdesession();
		$this->load->view('welcome/header',['session_actuel'=>$etat_session_annuel]);

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

			$this->form_validation->set_rules('certif_acte', '', 'required|regex_match[/^.*\.(pdf|PDF)$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('certif_dip', '', 'required|regex_match[/^.*\.(pdf|PDF)$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));
			
			$this->form_validation->set_rules('attest_dip', '', 'required|regex_match[/^.*\.(pdf|PDF)$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));
			
			$this->form_validation->set_rules('certif_medic', '', 'required|regex_match[/^.*\.(pdf|PDF)$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('photo', '', 'required|regex_match[/^.*\.(jpg|JPG|png|PNG|jpeg|JPEG)$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));
			
			$this->form_validation->set_rules('attest_anc', '', 'regex_match[/^.*\.(pdf|PDF)$/]',
			array(
					'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('auto_con', '', 'regex_match[/^.*\.(pdf|PDF)$/]',
			array(
				'regex_match'     => 'caractère(s) non autorisé(s)'
			));

			$this->form_validation->set_rules('recu', '', 'required|regex_match[/^.*\.(pdf|PDF)$/]',
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

				debug($certif_acte);

				$session = date('Y');

				if(isset($_FILES['certif_acte']['name'])){

					$config = array(
						'upload_path' => './uploads/',
						'allowed_types' => 'gif|jpg|png',
						'max_size' => '1024000', //1 MB(1024 Kb)
						'file_ext_tolower' => TRUE,
						'overwrite' => TRUE,
						'remove_spaces'  => TRUE,
						'detect_mime'  => TRUE,
						'mod_mime_fix'  => TRUE,
					);
					$this->upload->initialize($config);

					if ( ! $this->upload->do_upload("certif_acte"))
					{
							$error = array('error' => $this->upload->display_errors());
							debug($error); die();

							$this->load->view('upload_form', $error);
					}
					else
					{
							$data = array('upload_data' => $this->upload->data());
							debug($data); die();

							$this->load->view('upload_success', $data);
					}
				}
				die();



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

		$this->load->view('welcome/new_candidat',$data);
		$this->load->view('parts/footer_assets');
		$this->load->view('welcome/footer');
	}

	public function submit_new_candidat(){

		$this->form_validation->set_rules('nom', 'nom - full name', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('lnaissance', 'lieu de naissance - place of birth', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('jour', 'jour de naissance - day of birth', 'required|regex_match[/^[0-9\ ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('mois', 'mois de naissance - month of birth', 'required|regex_match[/^[0-9\ ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('annee', 'annee de naissance - year of birth', 'required|regex_match[/^[0-9\ ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni l\' %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('telp', 'telephone du candidat - parent\'s phone number', 'required|regex_match[/^[0-9\-\(\)\/\+\s]*$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('telc', 'telephone du candidat - candidate\'s telephone number', 'required|regex_match[/^[0-9\-\(\)\/\+\s]*$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);


		$this->form_validation->set_rules('nationalite', 'nationalite - nationality', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('sexe', 'sexe - gender', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('parcours', 'parcour - course', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('option', 'option', 'regex_match[/^[a-zA-Z\ ]+$/]',
			array(
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('qualite', 'qualité - grade', 'required|regex_match[/^[a-zA-Z\ ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('depot', 'centre depot des dossiers - filing center', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('c_examen', 'centre d\'examen - test center', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('langue', 'langue - language', 'required|regex_match[/^[a-zA-Z\ ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('choix1', 'centre de formation 1 - training center 1', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
			'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
			'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
		));

		$this->form_validation->set_rules('choix2', 'centre de formation 2 - training center 2', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
			'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
			'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
		));

		$this->form_validation->set_rules('choix3', 'centre de formation 3 - training center 3', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
			'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
			'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
		));

		$this->form_validation->set_rules('diplome', 'diplome - certificate', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
			'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
			'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
		));

		$this->form_validation->set_rules('etat_dip', 'état du diplome - status of the degree', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
			'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
			'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
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
			$session = date('Y');

			$newfolder = $num_recepice.'_'.$choix1.'_'.$session.'_'.$parcours.'_'.$statut.'_'.$nationalite;
			$target_dir = 'uploads/'.$newfolder. '/';

			$files = [
				"certif_acte" => 'acte de naissance / birth certificate',
				"certif_dip" => 'diplome / degree',
				"attest_dip" => 'attestation de présentation de l\'original du diplôme / proof of presentation of the original diploma',
				"certif_medic" => 'certificat medical / certificat médical',
				"photo" => 'photo',
				"attest_anc" => 'Attestation d\'anciénneté / Certificate of seniority',
				"auto_con" => 'Autorisation de concourir / Authorization to compete',
				"recu" => 'recu de paiement / receipt of payment'
			];
			
			if(uploadfiles($files,$newfolder)){

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

					'certif_acte_naiss'=> $target_dir .'certif_acte'.'.'.strtolower(pathinfo(basename($_FILES['certif_acte']["name"]), PATHINFO_EXTENSION)),
					'certif_medical'=> $target_dir . 'certif_medic'.'.'.strtolower(pathinfo(basename($_FILES['certif_medic']["name"]), PATHINFO_EXTENSION)),

					'certif_diplome'=> $target_dir . 'certif_dip'.'.'.strtolower(pathinfo(basename($_FILES['certif_dip']["name"]), PATHINFO_EXTENSION)),
					'photo_candidat'=> $target_dir . 'photo'.'.'.strtolower(pathinfo(basename($_FILES['photo']["name"]), PATHINFO_EXTENSION)),
					'recu_paie'=> $target_dir . 'recu'.'.'.strtolower(pathinfo(basename($_FILES['recu']["name"]), PATHINFO_EXTENSION)),
					'attest_diplome'=> $target_dir . 'attest_dip'.'.'.strtolower(pathinfo(basename($_FILES['attest_dip']["name"]), PATHINFO_EXTENSION)),
					'creer_le'=> dates()
				);

				if(isset($_FILES['auto_con']["name"])){
					$input['autori_minader'] = $target_dir . 'auto_con'.'.'.strtolower(pathinfo(basename($_FILES['auto_con']["name"]), PATHINFO_EXTENSION));
				}
				if(isset($_FILES['attest_anc']["name"])){
					$input['attest_ancien'] = $target_dir . 'attest_anc'.'.'.strtolower(pathinfo(basename($_FILES['attest_anc']["name"]), PATHINFO_EXTENSION));
				}
				$query = $this->candidats->new_candidat($input);
				if($query){

					$array = array(
						'success'   => 'Veuillez noter votre numéro de récépissé et conservez-le correctement. / Please note your receipt number and keep it correctly.',
						'recepisse' => $num_recepice,
					);

					if($this->input->post('create') == "create"){
						$array['link'] = base_url('profil/'.$num_recepice);
					}else{
						$array['link'] = base_url('cfiche/'.$num_recepice);
					}

				}else{
					$array = array(
						'success'   => 'erreur survenu, vos informations n\'ont pas été bien enrégistré. actualisé puis reéssayez'
					);
				}
			}else{
				$array = array(
					'errors'   => uploadfiles($files,$newfolder)
				);
			}
		}else{
			$array = array(
				'error'   => true,
				'nom_error' => form_error('nom'),
				'lnaissance_error' => form_error('lnaissance'),
				'jour_error' => form_error('jour'),
				'mois_error' => form_error('mois'),
				'annee_error' => form_error('annee'),
				'telc_error' => form_error('telc'),
				'telp_error' => form_error('telp'),
				'nationalite_error' => form_error('nationalite'),
				'sexe_error' => form_error('sexe'),
				'parcours_error' => form_error('parcours'),
				'option_error' => form_error('option'),
				'qualite_error' => form_error('qualite'),
				'depot_error' => form_error('depot'),
				'c_examen_error' => form_error('c_examen'),
				'langue_error' => form_error('langue'),
				'choix1_error' => form_error('choix1'),
				'choix2_error' => form_error('choix2'),
				'choix3_error' => form_error('choix3'),
				'diplome_error' => form_error('diplome'),
				'etat_dip_error' => form_error('etat_dip')
			);
		}
		echo json_encode($array);
	}

	/**update un candidat */
	public function submit_update_candidat(){

		$this->form_validation->set_rules('nom', 'nom - full name', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('lnaissance', 'lieu de naissance - place of birth', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('jour', 'jour de naissance - day of birth', 'required|regex_match[/^[0-9\ ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('mois', 'mois de naissance - month of birth', 'required|regex_match[/^[0-9\ ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('annee', 'annee de naissance - year of birth', 'required|regex_match[/^[0-9\ ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni l\' %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('telp', 'telephone du candidat - parent\'s phone number', 'required|regex_match[/^[0-9\-\(\)\/\+\s]*$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('telc', 'telephone du candidat - candidate\'s telephone number', 'required|regex_match[/^[0-9\-\(\)\/\+\s]*$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);


		$this->form_validation->set_rules('nationalite', 'nationalite - nationality', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('sexe', 'sexe - gender', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('parcours', 'parcour - course', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('option', 'option', 'regex_match[/^[a-zA-Z\ ]+$/]',
			array(
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('qualite', 'qualité - grade', 'required|regex_match[/^[a-zA-Z\ ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('depot', 'centre depot des dossiers - filing center', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('c_examen', 'centre d\'examen - test center', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('langue', 'langue - language', 'required|regex_match[/^[a-zA-Z\ ]+$/]',
			array(
				'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
				'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
			)
		);

		$this->form_validation->set_rules('choix1', 'centre de formation 1 - training center 1', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
			'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
			'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
		));

		$this->form_validation->set_rules('choix2', 'centre de formation 2 - training center 2', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
			'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
			'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
		));

		$this->form_validation->set_rules('choix3', 'centre de formation 3 - training center 3', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
			'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
			'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
		));

		$this->form_validation->set_rules('diplome', 'diplome - certificate', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
			'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
			'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
		));

		$this->form_validation->set_rules('etat_dip', 'état du diplome - status of the degree', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
		array(
			'required' => 'Tu n\'as pas fourni le %s. / You did not provide the %s.',
			'regex_match' => 'caractère(s) non autorisé(s) / unauthorized character(s)'
		));
		if($this->form_validation->run()){

			$num_recepice = trim($this->input->post('num_recepice'));
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
			$session = date('Y');

			$newfolder = $num_recepice.'_'.$choix1.'_'.$session.'_'.$parcours.'_'.$statut.'_'.$nationalite;
			$target_dir = 'uploads/'.$newfolder. '/';

			$files = [
				"certif_acte" => 'acte de naissance / birth certificate',
				"certif_dip" => 'diplome / degree',
				"attest_dip" => 'attestation de présentation de l\'original du diplôme / proof of presentation of the original diploma',
				"certif_medic" => 'certificat medical / certificat médical',
				"photo" => 'photo',
				"attest_anc" => 'Attestation d\'anciénneté / Certificate of seniority',
				"auto_con" => 'Autorisation de concourir / Authorization to compete',
				"recu" => 'recu de paiement / receipt of payment'
			];

			if(uploadfiles($files,$newfolder)){

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
					'telephone_parent'=> $tel_parent
				);

				$output = "";

				$extention = strtolower(pathinfo(basename($_FILES['certif_acte']["name"]), PATHINFO_EXTENSION));
				if($extention == 'pdf'){
					if(isset($_FILES['certif_acte']["name"])){
						if($_FILES['certif_acte']["size"] > 300000){
							$output .= "acte de naissance / birth certificate - max: 300 kb :fichier trop velumineux / The file is too large <hr>";
						}
						$input['certif_acte_naiss'] = $target_dir . 'certif_acte'.'.'.strtolower(pathinfo(basename($_FILES['certif_acte']["name"]), PATHINFO_EXTENSION));
					}
				}

				$extention = strtolower(pathinfo(basename($_FILES['certif_medic']["name"]), PATHINFO_EXTENSION));
				if($extention == 'pdf'){
					if(isset($_FILES['certif_medic']["name"])){
						if($_FILES['certif_medic']["size"] > 300000){
							$output .= "certificat medical / certificat médical - max: 300 kb :fichier trop velumineux / The file is too large <hr>";
						}
						$input['certif_medical'] = $target_dir . 'certif_medic'.'.'.strtolower(pathinfo(basename($_FILES['certif_medic']["name"]), PATHINFO_EXTENSION));
					}
				}

				$extention = strtolower(pathinfo(basename($_FILES['photo']["name"]), PATHINFO_EXTENSION));
				if($extention == 'jpeg' || $extention == 'jpg' || $extention == 'png'){

				

					if(isset($_FILES['photo']["name"])){
						if($_FILES['photo']["size"] > 300000){
							$output .= 'photo - max: 300 kb :fichier trop velumineux / The file is too large <hr> ';
						}

						
						
						$input['photo_candidat'] = $target_dir . 'photo'.'.'.strtolower(pathinfo(basename($_FILES['photo']["name"]), PATHINFO_EXTENSION));
					}
				}

				$extention = strtolower(pathinfo(basename($_FILES['recu']["name"]), PATHINFO_EXTENSION));
				if($extention == 'pdf'){
					if(isset($_FILES['recu']["name"])){
						if($_FILES['recu']["size"] > 300000){
							$output .= 'recu de paiement / receipt of payment - max: 300 kb :fichier trop velumineux / The file is too large <hr>'.$_FILES['photo']['size'];
						}
						$input['recu_paie'] = $target_dir . 'recu'.'.'.strtolower(pathinfo(basename($_FILES['recu']["name"]), PATHINFO_EXTENSION));
					}
				}

				$extention = strtolower(pathinfo(basename($_FILES['attest_dip']["name"]), PATHINFO_EXTENSION));
				if($extention == 'pdf'){
					if(isset($_FILES['attest_dip']["name"])){
						if($_FILES['attest_dip']["size"] > 300000){
							$output .= "attestation de présentation de l\'original du diplôme / proof of presentation of the original diploma - max: 300 kb :fichier trop velumineux / The file is too large <hr>";
						}
						$input['attest_diplome'] = $target_dir . 'attest_dip'.'.'.strtolower(pathinfo(basename($_FILES['attest_dip']["name"]), PATHINFO_EXTENSION));
					}
				}

				$extention = strtolower(pathinfo(basename($_FILES['certif_dip']["name"]), PATHINFO_EXTENSION));
				if($extention == 'pdf'){
					if(isset($_FILES['certif_dip']["name"])){
						if($_FILES['certif_dip']["size"] > 300000){
							$output .= "diplome / degree - max: 300 kb :fichier trop velumineux / The file is too large <hr>";
						}
						$input['certif_diplome'] = $target_dir . 'certif_dip'.'.'.strtolower(pathinfo(basename($_FILES['certif_dip']["name"]), PATHINFO_EXTENSION));
					}
				}

				if(isset($_FILES['auto_con']["name"])){
					$extention = strtolower(pathinfo(basename($_FILES['auto_con']["name"]), PATHINFO_EXTENSION));
					if($extention == 'pdf'){
						if($_FILES['auto_con']["size"] > 300000){
							$output .= "Autorisation de concourir / Authorization to compete - max: 300 kb :fichier trop velumineux / The file is too large <hr>";
						}
						$input['autori_minader'] = $target_dir . 'auto_con'.'.'.strtolower(pathinfo(basename($_FILES['auto_con']["name"]), PATHINFO_EXTENSION));
					}
				}
				
				if(isset($_FILES['attest_anc']["name"])){
					$extention = strtolower(pathinfo(basename($_FILES['attest_anc']["name"]), PATHINFO_EXTENSION));
					if($extention == 'pdf'){
						if($_FILES['attest_anc']["size"] > 300000){
							$output .= "Attestation d\'anciénneté / Certificate of seniority - max: 300 kb :fichier trop velumineux / The file is too large <hr>";
						}
						$input['attest_ancien'] = $target_dir . 'attest_anc'.'.'.strtolower(pathinfo(basename($_FILES['attest_anc']["name"]), PATHINFO_EXTENSION));
					}
				}

				if(empty($output)){
					$query = $this->candidats->update_candidat($num_recepice,$input);
					if($query){

						$array = array(
							'success'   => 'Veuillez noter votre numéro de récépissé et conservez-le correctement. / Please note your receipt number and keep it correctly.',
							'recepisse' => $num_recepice,
						);

						if($this->input->post('update') == "update"){
							$array['link'] = base_url('profil/'.$num_recepice);
						}else{
							$array['link'] = base_url('cfiche/'.$num_recepice);
						}
						
					}else{
						$array = array(
							'success'   => 'erreur survenu, vos informations n\'ont pas été bien enrégistré. actualisé puis reéssayez'
						);
					}
				}else{
					$array = array(
						'errors'   => $output
					);
				}

			}else{
				$array = array(
					'errors'   => uploadfiles($files,$newfolder)
				);
			}

		}else{
			$array = array(
				'error'   => true,
				'nom_error' => form_error('nom'),
				'lnaissance_error' => form_error('lnaissance'),
				'jour_error' => form_error('jour'),
				'mois_error' => form_error('mois'),
				'annee_error' => form_error('annee'),
				'telc_error' => form_error('telc'),
				'telp_error' => form_error('telp'),
				'nationalite_error' => form_error('nationalite'),
				'sexe_error' => form_error('sexe'),
				'parcours_error' => form_error('parcours'),
				'option_error' => form_error('option'),
				'qualite_error' => form_error('qualite'),
				'depot_error' => form_error('depot'),
				'c_examen_error' => form_error('c_examen'),
				'langue_error' => form_error('langue'),
				'choix1_error' => form_error('choix1'),
				'choix2_error' => form_error('choix2'),
				'choix3_error' => form_error('choix3'),
				'diplome_error' => form_error('diplome'),
				'etat_dip_error' => form_error('etat_dip')
			);
		}
		echo json_encode($array);
	}


	/**modifier un candidat */
	public function update_candidat($num_recepice = NULL){
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

			$this->form_validation->set_rules('certif_acte', '', 'required|regex_match[/^.*\.(pdf|PDF)$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => '.pdf'
			));

			$this->form_validation->set_rules('certif_dip', '', 'required|regex_match[/^.*\.(pdf|PDF)$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => '.pdf'
			));
			
			$this->form_validation->set_rules('attest_dip', '', 'required|regex_match[/^.*\.(pdf|PDF)$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => '.pdf'
			));
			
			$this->form_validation->set_rules('certif_medic', '', 'required|regex_match[/^.*\.(pdf|PDF)$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => '.pdf'
			));

			$this->form_validation->set_rules('photo', '', 'required|regex_match[/^.*\.(jpg|JPG|png|PNG|jpeg|JPEG)$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => '.jpg / .png / .jpeg'
			));
			
			$this->form_validation->set_rules('attest_anc', '', 'regex_match[/^.*\.(pdf|PDF)$/]',
			array(
					'regex_match'     => '.pdf'
			));

			$this->form_validation->set_rules('auto_con', '', 'regex_match[/^.*\.(pdf|PDF)$/]',
			array(
				'regex_match'     => '.pdf'
			));

			$this->form_validation->set_rules('recu', '', 'required|regex_match[/^.*\.(pdf|PDF)$/]',
			array(
					'required'      => 'cochez la case',
					'regex_match'     => '.pdf'
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

				/**modifier un candidat dans la base des données */
				$query = $this->candidats->update_candidat($num_recepice,$input);
				if($query){
					flash('success','vos informations ont été modifiés');
					redirect('editu/'.$num_recepice);
				}else{
					flash('error','erreur survenu, vos informations n\'ont pas été modifiés. actualisé puis reéssayez');
					redirect('editu/'.$num_recepice);
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

		$this->load->view('welcome/edit_profil',$data);
		$this->load->view('parts/footer_assets');
		$this->load->view('welcome/footer');
	}


	/**affiche l'option en function du parcour */
	public function option(){
		if(!empty($this->input->post('val'))){

			$query = $this->candidats->get_option_parcour($this->input->post('val'));
			
			if(!empty($query)){
				$output ='';
				$output .='<option></option>';
				foreach($query as $row){
					$output .= '<option value="'.$row['idoption'].'">'.$row['idoption'].'</option>';
				}
				echo $output;
			}
		}
	}

	/**affiche les centres de formation en fonction du parcour */
	public function centre_formation(){
		if($this->input->post('parcour_id')){
			/**affiche les centre de formation en fonction du parcour */
			$query = $this->candidats->get_centre_formation_parcour($this->input->post('parcour_id'));

			if(!empty($query)){
				$output ='';
				$output .= '<option></option>';
				foreach($query as $row){
					$output .= '<option value="'.$row['ref_centre_formation'].'">'.$row['ref_centre_formation'].'</option>';
				}
				echo $output;
			}	
		}
	}

	/**affiche les centres de formation en fonction de l'option */
	public function centre_formation_op(){
		if($this->input->post('option_id')){
			/**affiche les centre de formation en fonction du parcour */
			$query = $this->candidats->get_centre_formation_option($this->input->post('option_id'));

			if(!empty($query)){
				$output ='';
				$output .= '<option></option>';
				foreach($query as $row){
					$output .= '<option value="'.$row['ref_formation'].'">'.$row['ref_formation'].'</option>';
				}
				echo $output;
			}	
		}
	}


	/**affiche le diplome en fonction du parcours */
	public function parcours_diplome(){
		if($this->input->post('parcours_id')){
			/**affiche les centre de formation en fonction du parcour */
			$query = $this->candidats->get_parcours_diplome($this->input->post('parcours_id'));

			if(!empty($query)){
				$output ='';
				$output .= '<option></option>';
				foreach($query as $row){
					$output .= '<option value="'.$row['diplome_ref'].'">'.$row['diplome_ref'].'</option>';
				}
				echo $output;
			}	
		}
	}


	/**voir la fiche */
	public function fiche(){
		$etat_session_annuel = $this->testdesession();
		$this->load->view('welcome/header',['session_actuel'=>$etat_session_annuel]);

		$this->form_validation->set_rules('code_fiche', 'code', 'required|regex_match[/^[0-9\ ]+$/]',
			array(
				'required' => 'saisissez ici le %s sur votre fiche d\'inscription',
				'regex_match' => 'caractère(s) non autorisé(s)'
			)
		);


		if($this->form_validation->run()){
			$code = $this->input->post('code_fiche');
			$query = $this->candidats->get_code($code);
			if($query){
					redirect('cfiche/'.$query['num_recepice'].'/');
			}else{
				flash('error','votre code n\'est pas correct');
				redirect('cfiche');
			}
		}

		$this->load->view('welcome/fcihe');
		$this->load->view('parts/footer_assets');
		$this->load->view('welcome/footer');
	}

	/**affiche la fiche d'un candidat */
	public function fiche_profil($num_recepice = NULL){
		$etat_session_annuel = $this->testdesession();
		$this->load->view('welcome/header',['session_actuel'=>$etat_session_annuel]);

		$query = $this->candidats->get_code($num_recepice);
		if($query){
			$data['candidat'] = $this->candidats->profil_candidat($num_recepice);
		}else{
			flash('error','votre code n\'est pas correct');
			redirect('cfiche');
		}
		

		$this->load->view('welcome/fiche_profil',$data);
		$this->load->view('parts/footer_assets');
		$this->load->view('welcome/footer');
	}

	/**généré le pdf */
	public function print_pdf($num_recepice = NULL){

		$query = $this->candidats->get_code($num_recepice);
		if($query){
			$candidat = $this->candidats->profil_candidat($num_recepice);
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
			redirect('cfiche');
		}
		
	}

	/**affiche les informations dans le formulaire de modification */
	public function edit_profil($num_recepice = NULL){
		$etat_session_annuel = $this->testdesession();
		$this->load->view('welcome/header',['session_actuel'=>$etat_session_annuel]);


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


		/**selectionne un candidtat particulier grace de son numéro de recepicer */
		$data['candidat'] = $this->candidats->profil_candidat($num_recepice);

		if($data['candidat']['etat'] == 1){
			flash('success','Votre dossier a été validé, nous vous informons dès la disponibilité des listes. / Your file has been validated, we will inform you as soon as the lists are available.');
			redirect('cfiche/'.$data['candidat']['num_recepice']);
		}

		$this->load->view('welcome/edit_profil',$data);
		$this->load->view('parts/footer_assets');
		$this->load->view('welcome/footer');
	}



	public function testdesession(){
		$etat = 0;
		$sesion = $this->candidats->get_all_session();
		if(!empty($sesion)){
			if(dates() >= $sesion["date_debut"] || dates() <= $sesion["date_fin"]){
				$etat = 1;
			}
		}
		return $etat;
	}



	
}
