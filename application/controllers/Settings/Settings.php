<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**annule la limitation de temps pour l'exécuption des requêtes */
ini_set('max_execution_time', 0); 

class Settings extends CI_Controller {

	/**constructeur */
	public function __construct(){
		parent::__construct();
        $this->load->model('Settings/Settings_model', 'session_actu');
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

        $this->load->view('setting/setting');

		$this->load->view('parts/footer_assets');

	}
	
	/**CONFIGURE LA SESSION EN COUR */
	public function session(){

		$this->form_validation->set_rules('session', 'session', 'required|regex_match[/^[0-9\ ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni la / You didn\'t provide the %s.',
					'regex_match'     => 'caractère(s) numérique uniquement! / numeric character (s) only!'
			)
		);

		$this->form_validation->set_rules('datedebut', 'date de debut', 'required',
			array(
					'required'      => 'Tu n\'as pas fourni la / You didn\'t provide the %s.',
			)
		);

		$this->form_validation->set_rules('datefin', 'date de fin', 'required',
			array(
					'required'      => 'Tu n\'as pas fourni la / You didn\'t provide the %s.',
			)
		);
		if($this->form_validation->run()){
	
			$session = $this->input->post('session');
			$datedebut = $this->input->post('datedebut').' 0:0:0';
			$datefin = $this->input->post('datefin').' 23:59:59';

			if($datedebut <= $datefin){
				$input = array(
					'nom_session' => $session,
					'date_debut' => $datedebut,
					'date_fin' => $datefin
				);
				$query = $this->session_actu->insert_session($input);
				if($query){
					$array = array(
						'success' => '<div class="card-body" id="user_data"><div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>session crée avec succès / session created successfully</div>'
					);
				}else{
					$array = array(
						'success' => '<div class="card-body" id="user_data"><div class="alert alert-light-warning color-success"><i class="bi bi-check-circle"></i>erreur survenu actualise la page puis essai a nouveau / error occurred refresh the page then try again</div>'
					);
				}
			}else{
				$array = array(
					'success' => '<div class="card-body" id="user_data"><div class="alert alert-light-warning color-success"><i class="bi bi-check-circle"></i>La date de début doit être inférieure ou égale à la date de fin. / The start date must be less than or equal to the end date.</div>'
				);
			}
		}else{
			$array = array(
				'error'   => true,
				'session_error' => form_error('session'),
				'detedebut_error' => form_error('datedebut'),
				'datefin_error' => form_error('datefin'),
			);
		}

		echo json_encode($array);
	}

	/**afficher les session qui sont dans la base des données */
	public function show_session(){
		$session = $this->session_actu->get_all_session();
		$output='';
		foreach ($session as $key => $value) {
			$output .='
				<li
					class="list-group-item d-flex justify-content-between align-items-center">
					<span>'.$value['nom_session'].'</span> <span>'.$value['date_debut'].'</span> <span>'.$value['date_fin'].'</span>
					<button class="badge bg-warning badge-pill badge-round ml-1 remove_inventory" id="'.$value['nom_session'].'">x</button>
				</li>
			';
		}

		echo json_encode($output);

	}

	/**supprimer une session */
	public function delete_session(){
		$session = $this->input->post('row_id');
		$this->session_actu->session_delete($session);
	}

	/**inserer un centre de depot dans la base des données */
	public function insert_centre_depot(){
		$this->form_validation->set_rules('depot', 'centre de depot des dossiers / filing center', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le / You didn\'t provide the %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)! / character (s) not allowed!'
			)
		);
		if($this->form_validation->run()){
			$depot = $this->input->post('depot');
			$input = array(
				'nom_centre_depot' => $depot
			);
			$query = $this->session_actu->insert_depot($input);
			if($query){
				$array = array(
					'success' => '<div class="card-body" id="user_data"><div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>centre crée avec succès / center successfully created</div>'
				);
			}else{
				$array = array(
					'success' => '<div class="card-body" id="user_data"><div class="alert alert-light-warning color-success"><i class="bi bi-check-circle"></i>erreur survenu actualise la page puis essai a nouveau / error occurred refresh the page then try again</div>'
				);
			}
		}else{
			$array = array(
				'error'   => true,
				'depot_error' => form_error('depot'),
			);
		}

		echo json_encode($array);
	}

	/**afficher tous les centres de depot des dossiers */
	public function get_centre_depot(){
		$depot = $this->session_actu->get_all_depot();
		$output='';
		foreach ($depot as $key => $value) {
			$output .='
				<li
					class="list-group-item d-flex justify-content-between align-items-center">
					<span>'.$value['nom_centre_depot'].'</span>
					<button class="badge bg-warning badge-pill badge-round ml-1 remove_depot" id="'.$value['nom_centre_depot'].'">x</button>
				</li>
			';
		}

		echo json_encode($output);
	}

	/**supprimer un centre de depot des dossiers */
	public function delete_centre_depot(){
		$depot = $this->input->post('row_id');
		$this->session_actu->depot_delete($depot);
	}

	/**enregistrer un centre d'examen */
	public function save_examen(){
		$this->form_validation->set_rules('examen', 'centre d\'examen / examination center', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/]',
			array(
					'required'      => 'Tu n\'as pas fourni le / You didn\'t provide the %s.',
					'regex_match'     => 'caractère(s) non autorisé(s)! / character (s) not allowed!'
			)
		);
		if($this->form_validation->run()){
			$examen = $this->input->post('examen');
			$input = array(
				'nom_centre_examen' => strtoupper($examen)
			);
			$query = $this->session_actu->insert_examen($input);
			if($query){
				$array = array(
					'success' => '<div class="card-body" id="user_data"><div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>centre crée avec succès / center successfully created</div>'
				);
			}else{
				$array = array(
					'success' => '<div class="card-body" id="user_data"><div class="alert alert-light-warning color-success"><i class="bi bi-check-circle"></i>erreur survenu actualise la page puis essai a nouveau / error occurred refresh the page then try again</div>'
				);
			}
		}else{
			$array = array(
				'error'   => true,
				'examen_error' => form_error('examen'),
			);
		}

		echo json_encode($array);
	}


	/**afficher tous les centre d'examen */
	public function get_all_examen(){
		$examen = $this->session_actu->get_all_examen();
		$output='';
		foreach ($examen as $key => $value) {
			$output .='
				<li
					class="list-group-item d-flex justify-content-between align-items-center">
					<span>'.$value['nom_centre_examen'].'</span>
					<button class="badge bg-warning badge-pill badge-round ml-1 remove_examen" id="'.$value['nom_centre_examen'].'">x</button>
				</li>
			';
		}

		echo json_encode($output);
	}

	/**supprimer un centre d'examen */
	public function delete_centre_examen(){
		$examen = $this->input->post('row_id');
		$this->session_actu->depot_examen($examen);
	}


	public function valid_date($date) {
        $d = DateTime::createFromFormat('Y-m-d', $date);
        return $d && $d->format('Y-m-d') === $date;
    }
	

}
