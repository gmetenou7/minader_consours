<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {


	/**constructeur */
	public function __construct(){
		parent::__construct();
        $this->load->model('Home/Home_model', 'home');
    }

	 /**connexion dabord */
	function logged_in(){
		if(!session('users') && $this->router->{'class'} !== 'index'){
			flash("warning","merci de te connecter");
			redirect('login');
		}
	}

	public function index()
	{
        $this->load->view('parts/header');
		$this->logged_in();

		/**nombre total de candidats */
		$data['count_candidat'] = $this->home->count_candidats();

		/**nombre de candidat ayant un anonymat */
		$data['count_candidat_anonymat1'] = $this->home->count_candidats_anonymats1();

		/**nombre de candidats n'ayant pas d'anonymat */
		$data['count_candidat_anonymat2'] = $this->home->count_candidats_anonymats2();
		//debug($data['count_candidat_anonymat2']); die();

		/**nombre de candidat ayant un code fiche */
		$data['count_candidat_code_fiche1'] = $this->home->count_candidats_code_fiche1();

		/**nombre de candidats n'ayant pas un code fiche */
		$data['count_candidat_code_fiche2'] = $this->home->count_candidats_code_fiche2();
		
	

		$this->load->view('home/home',$data);
        $this->load->view('parts/footer_assets');
	}


	/**nombre de candidat par parcour */
	public function candidat_parcour(){
		$this->logged_in();
		$output='';
		/**debut nombre de candidat pour chaque parcours */
			$parcours = $this->home->get_parcours();
			$output .='
			<ul class="list-group">
                <li class="list-group-item d-flex justify-content-between align-items-center">
			';
			if(!empty($parcours)){
				foreach ($parcours as $key => $value){
					$output .='<li class="list-group-item d-flex justify-content-between align-items-center">';
					if($value['parcour']==''){
						$output .='<span>vide</span>';
					}else{
						$output .='<span>'.$value['parcour'].'</span>';
					}
					
					$count_candidat_parcours = $this->home->count_candidat_parcours($value['parcour']);
					if(!empty($count_candidat_parcours)){
						$output .='<span class="badge bg-warning badge-pill badge-round ml-1">'.$count_candidat_parcours.'</span>';
					}else{
						$output .='<span class="badge bg-warning badge-pill badge-round ml-1">0</span>';
					}
					$output .='</li>';
				}
			}else{
				$output .='une information nécessaire manque a l\'appel';
			}
			$output .='
				</li>
            </ul>
			';
		
		echo json_encode($output);
		/**fin nombre de candidat pour chaque parcours */
	}

	/**nombre de candidat par option */
	public function candidat_option(){
		$this->logged_in();
		$output='';
		/**debut nombre de candidat pour chaque option */
			$option_parcour =$this->home->get_option_parcour();
			$output .='
			<ul class="list-group">
			';
			if(!empty($option_parcour)){
				foreach ($option_parcour as $key => $values) {
					$output .='<li class="list-group-item d-flex justify-content-between align-items-center">';
					if($values['parcour_option']==''){
						$output .='<span>vide</span>';
					}else{
						$output .='<span>'.$values['parcour_option'].'</span>';
					}
					
					$count_candidat_option = $this->home->count_candidat_option($values['parcour_option']);
					if(!empty($count_candidat_option)){
						$output .='<span class="badge bg-primary badge-pill badge-round ml-1">'.$count_candidat_option.'</span>';
					}else{
						$output .='<span class="badge bg-warning badge-pill badge-round ml-1">0</span>';
					}
					$output .='</li>';
				}
			}else{
				$output .='une information nécessaire manque a l\'appel';
			}
			$output .='
            </ul>
			';
		
		echo json_encode($output);
		/**fin nombre de candidat pour chaque option */
	}

	/**candidat par statut */
	public function candidat_qualite(){
		$this->logged_in();
		$output='';
		/**debut nombre de candidat pour chaque statut(interne externe) */
			$statut =$this->home->get_statut();
			$output .='
			<ul class="list-group">
			';
			if(!empty($statut)){
				foreach ($statut as $key => $values) {
					$output .='<li class="list-group-item d-flex justify-content-between align-items-center">';
					if($values['statut_candidat']==''){
						$output .='<span>vide</span>';
					}else{
						$output .='<span>'.$values['statut_candidat'].'</span>';
					}
					
					$count_statut_candidat = $this->home->count_candidat_statut($values['statut_candidat']);
					if(!empty($count_statut_candidat)){
						$output .='<span class="badge bg-success badge-pill badge-round ml-1">'.$count_statut_candidat.'</span>';
					}else{
						$output .='<span class="badge bg-warning badge-pill badge-round ml-1">0</span>';
					}
					$output .='</li>';
				}
			}else{
				$output .='une information nécessaire manque a l\'appel';
			}
			$output .='
            </ul>
			';
		
		echo json_encode($output);
		/**fin nombre de candidat pour chaque statut(interne externe) */
	}

	/**nombre de candidat par sexe */
	public function candidat_sexe(){
		$this->logged_in();
		$output='';
		/**debut nombre de candidat pour chaque sexe */
			$sexe =$this->home->get_sexe();
			$output .='
			<ul class="list-group">
			';
			if(!empty($sexe)){
				foreach ($sexe as $key => $values) {
					$output .='<li class="list-group-item d-flex justify-content-between align-items-center">';
					if($values['sexe']==''){
						$output .='<span>vide</span>';
					}else{
						$output .='<span>'.$values['sexe'].'</span>';
					}
					
					$count_sexe_candidat = $this->home->count_candidat_sexe($values['sexe']);
					if(!empty($count_sexe_candidat)){
						$output .='<span class="badge bg-info badge-pill badge-round ml-1">'.$count_sexe_candidat.'</span>';
					}else{
						$output .='<span class="badge bg-warning badge-pill badge-round ml-1">0</span>';
					}
					$output .='</li>';
				}
			}else{
				$output .='une information nécessaire manque a l\'appel';
			}
			$output .='
            </ul>
			';
		
		echo json_encode($output);
		/**fin nombre de candidat pour sexe*/
	}

	/**nombre de candidat par langue */
	public function candidat_langue(){
		$this->logged_in();
		$output='';
		/**debut nombre de candidat pour chaque langue */
			$langue =$this->home->get_langue();
			$output .='
			<ul class="list-group">
			';
			if(!empty($langue)){
				foreach ($langue as $key => $values) {
					$output .='<li class="list-group-item d-flex justify-content-between align-items-center">';
					if($values['langue_candidat']==''){
						$output .='<span>vide</span>';
					}else{
						$output .='<span>'.$values['langue_candidat'].'</span>';
					}
					
					$count_langue_candidat = $this->home->count_candidat_langue($values['langue_candidat']);
					if(!empty($count_langue_candidat)){
						$output .='<span class="badge bg-secondary badge-pill badge-round ml-1">'.$count_langue_candidat.'</span>';
					}else{
						$output .='<span class="badge bg-warning badge-pill badge-round ml-1">0</span>';
					}
					$output .='</li>';
				}
			}else{
				$output .='une information nécessaire manque a l\'appel';
			}
			$output .='
            </ul>
			';
		
		echo json_encode($output);
		/**fin nombre de candidat pour chaque langue*/
	}

	/**nombre de candidat par centre d'examen */
	public function candidat_examen(){
		$this->logged_in();
		$output='';
		/**debut nombre de candidat pour chaque centre d'examen */
			$examen =$this->home->get_centre_examen();
			$output .='
			<ul class="list-group">
			';
			if(!empty($examen)){
				foreach ($examen as $key => $values) {
				$output .='<li class="list-group-item d-flex justify-content-between align-items-center">';
					if($values['centre_examen']==''){
						$output .='<span>vide</span>';
					}else{
						$output .='<span>'.$values['centre_examen'].'</span>';
					}
					
					$count_examen_candidat = $this->home->count_candidat_examen($values['centre_examen']);
					if(!empty($count_examen_candidat)){
						$output .='<span class="badge bg-secondary badge-pill badge-round ml-1">'.$count_examen_candidat.'</span>';
					}else{
						$output .='<span class="badge bg-warning badge-pill badge-round ml-1">0</span>';
					}
					$output .='</li>';
				}
			}else{
				$output .='une information nécessaire manque a l\'appel';
			}
			$output .='
            </ul>
			';
		
		echo json_encode($output);
		/**fin nombre de candidat pour chaque centre d'examen*/
	}


	/**nombre de candidat par centre de formation */
	public function candidat_formation(){
		$this->logged_in();
		$output='';
		/**debut nombre de candidat pour chaque centre de formation */
			$formation =$this->home->get_centre_formation();
			$output .='
			<ul class="list-group">
			';
			if(!empty($formation)){
				foreach ($formation as $key => $values) {
				$output .='<li class="list-group-item d-flex justify-content-between align-items-center">';
					if($values['ecole_choisi_1']==''){
						$output .='<span>vide</span>';
					}else{
						$output .='<span>'.$values['ecole_choisi_1'].'</span>';
					}
					
					$count_formation_candidat = $this->home->count_candidat_formation($values['ecole_choisi_1']);
					if(!empty($count_formation_candidat)){
						$output .='<span class="badge bg-secondary badge-pill badge-round ml-1">'.$count_formation_candidat.'</span>';
					}else{
						$output .='<span class="badge bg-warning badge-pill badge-round ml-1">0</span>';
					}
					$output .='</li>';
				}
			}else{
				$output .='une information nécessaire manque a l\'appel';
			}
			$output .='
            </ul>
			';
		
		echo json_encode($output);
		/**fin nombre de candidat pour chaque centre d'examen*/
	}

	

	


}
