<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	/**constructeur */
	public function __construct(){
		parent::__construct();
		$this->load->model('Candidats/Candidats_model', 'candidats');
        $this->load->model('Users/Users_model', 'users');
    }

	  /**dit a l'utilisateur qu'il est déja connecter */
	private function logged_out(){
		if(session('users') && $this->router->{'class'} !== 'index' && $this->router->{'method'} !== 'logout'){
			flash("warning","tu es connecté actuelement");
			redirect('home');
		}
    }
	/**connexion dabord */
	function logged_in(){
		if(!session('users') && $this->router->{'class'} !== 'index'){
			flash("warning","merci de te connecter");
			redirect('login');
		}
	}

	/**affiche la page des logins */
	public function index(){
		$etat_session_annuel = $this->testdesession();
		//$this->load->view('parts/header_login');
		$this->load->view('welcome/header',['session_actuel'=>$etat_session_annuel]);
		$this->logged_out();

		/**formulaire de connexion */
		$this->form_validation->set_rules('users', 'Login', 'required|regex_match[/^[a-zA-Z0-9._éèêÉÈÊàôÀ@+ÔïÏ\'\- ]+$/]',
        array(
                'required'      => 'Tu n\'as pas fourni le / You did not provide the %s.',
                'regex_match'     => 'caractère(s) non pris en compte. changé! / character(s) not taken into account. changed!'
        ));

		$this->form_validation->set_rules('password', 'mot de passe / password', 'required|regex_match[/^[a-zA-Z0-9\ ]+$/]',
		array(
			'required'      => 'Tu n\'as pas fourni le / You did not provide the %s.',
			'regex_match'     => 'caractère(s) non pris en compte. changé! / character(s) not taken into account. changed!'
		));
		if($this->form_validation->run()){
			$usernamelogin = $this->input->post('users');
			$login = $this->users->login($usernamelogin);

			if($login){
				$pass = $this->input->post('password');
				if(password_verify($pass, $login['password'])){
					if($login['etat'] != "on"){
						flash('success','
							ce compte n\'est activé, contactez l\'administrateur / 
							this account is not activated, contact the administrator
						');
					}else{
						/**enrégistrement de l'heur de connexion*/ 
						$input_data = array('last_connexion' => dates());
						$query=$this->users->update_login($login['matricule'], $input_data);
						session('users', $login);
						if($query){
							redirect('home');
						}
					}
				}else{
					flash('success',"
					Nom d'utilisateur ou mot de passe incorrect / 
					Incorrect username or password
				");
				}
			}else{
				flash('success',"
					Nom d'utilisateur ou mot de passe incorrect / 
					Incorrect username or password
				");
			}
			
		}

		$this->load->view('users/login');
		$this->load->view('parts/footer_assets');
	}


	/**la vue des utilisateurs */
	public function view(){
		$this->logged_in();
		$this->load->view('parts/header');

		/**statut de l'utilisateur */
		$data['statut'] = array(
			'1' => 'admin',
			'2' => 'user_note',
			'3' => 'user_cadidat'
		);

		$this->load->view('users/view',$data);
		$this->load->view('parts/footer_assets');
	}


	

	/**modifier un utilisateur */
	public function update(){
		$this->logged_in();
		$this->form_validation->set_rules('name', 'nom', 'required|regex_match[/^[a-zA-Z\ ]+$/]',
        array(
                'required'      => 'Tu n\'as pas fourni le %s.',
                'regex_match'     => 'caractère(s) non pris en compte. changé!'
        ));

		$this->form_validation->set_rules('email', 'email', 'required|valid_email',
        array(
                'required'      => 'Tu n\'as pas fourni le %s.',
                'valid_email'     => 'email non valide'
        ));
		$this->form_validation->set_rules('telephone', 'telephone', 'required|regex_match[/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/]',
        array(
                'required'      => 'Tu n\'as pas fourni le %s.',
                'regex_match'     => 'caractère(s) non pris en compte. changé!'
        ));

		$this->form_validation->set_rules('statut', 'statut', 'required|regex_match[/^[a-zA-Z_\ ]+$/]',
		array(
			'required'      => 'Tu n\'as pas fourni le %s.',
			'regex_match'     => 'caractère(s) non pris en compte. changé!'
		));
		$this->form_validation->set_rules('active', 'statut', 'regex_match[/^[a-zA-Z_\ ]+$/]',
		array(
			'regex_match'     => 'caractère(s) non pris en compte. changé!'
		));
		
		if($this->form_validation->run()){
			
			/**insertion dans la base des données */
			$matricule = $this->input->post('matricule');
			
			$input_data = array(
				'nom' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'tel' => $this->input->post('telephone'),
				'statut' =>$this->input->post('statut'),
				'etat' => $this->input->post('active'),
				'update_at' => dates()
			);
			
			/**mofier dans la base des données */
			$query = $this->users->update($matricule, $input_data);
			if($query == true){
				$array = array(
					'success' => '<div class="card-body" id="user_data"><div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>Utilisateur modifier</div>'
				);
			}else{
				$array = array(
					'success' => '<div class="card-body" id="user_data"><div class="alert alert-light-danger color-success"><i class="bi bi-exclamation-circle"></i>OUPS erreur survenu, Utilisateur non modifier</div>'
				);
			}
			
		}else{
			$array = array(
				'error'   => true,
				'name_error' => form_error('name'),
				'statut_error' => form_error('statut'),
				'active_error' => form_error('active')
				
			);
		}

		echo json_encode($array);

	}
	

	/**modifier le mot de passe */
	public function update_password(){
		$this->logged_in();

		$this->form_validation->set_rules('npassword_user', 'mot de passe', 'required',
		array(
			'required'      => 'Tu n\'as pas fourni le %s actuel.'
		));

		$this->form_validation->set_rules('password_user', 'mot de passe', 'required',
		array(
			'required'      => 'Tu n\'as pas fourni le %s.'
		));
		
		$this->form_validation->set_rules('cpassword_user', 'mot de passe', 'required|matches[password_user]',
		array(
			'required'      => 'Tu n\'as pas fourni le %s.',
			'matches' => 'la confirmation du nouveau mot de passe doit être identique au nouveau mot de passe'
		));
		
		if($this->form_validation->run()){
			
			$password_actuel = $this->input->post('npassword_user');
			$matricule = session('users')['matricule'];

			$user = $this->users->select_user($matricule);

			if(password_verify($password_actuel, $user['password'])){
				$password = trim($this->input->post('password_user'));
				$input_data = array(
					'password' =>password_hash($password,PASSWORD_BCRYPT),
					'update_at' => dates()
				);

				/**modification */
				$query = $this->users->update($matricule, $input_data);
				if($query == true){
					$array = array(
						'success' => '<div class="card-body" id="user_data"><div class="alert alert-light-success color-success"><i class="bi bi-check-circle"></i>mot de passe modifier</div>'
					);
				}else{
					$array = array(
						'success' => '<div class="card-body" id="user_data"><div class="alert alert-light-danger color-success"><i class="bi bi-exclamation-circle"></i>OUPS erreur survenu, mot de passe non modifier</div>'
					);
				}
			}else{
				$array = array(
					'success' => '
						<div class="card-body" id="user_data">
							<div class="alert alert-light-danger color-success">
							<i class="bi bi-exclamation-circle"></i>
							OUPS, le Mot de passe actuel saisi ne correspond pas a votre mot de passe actuellement sur votre compte
						</div>'
				);
			}

			
		}else{
			$array = array(
				'error'   => true,
				'password_user_error' => form_error('password_user'),
				'npassword_user_error' => form_error('npassword_user'),
				'cpassword_user_error' => form_error('cpassword_user')
			);
		}

		echo json_encode($array);

	}

	/**creer un nouvel utilisateur */
	public function insert_user(){
		//$this->logged_in();
		/*creer un nouvel utilisateur */
		$this->form_validation->set_rules('name', 'nom', 'required|regex_match[/^[a-zA-Z\ ]+$/]',
        array(
                'required'      => 'Tu n\'as pas fourni le %s.',
                'regex_match'     => 'caractère(s) non pris en compte. changé!'
        ));

		$this->form_validation->set_rules('email', 'email', 'required|valid_email',
        array(
                'required'      => 'Tu n\'as pas fourni le %s.',
                'valid_email'     => 'email non valide'
        ));
		$this->form_validation->set_rules('telephone', 'telephone', 'required|regex_match[/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/]',
        array(
                'required'      => 'Tu n\'as pas fourni le %s.',
                'regex_match'     => 'caractère(s) non pris en compte. changé!'
        ));


		$this->form_validation->set_rules('statut', 'statut', 'required|regex_match[/^[a-zA-Z_\ ]+$/]',
		array(
			'required'      => 'Tu n\'as pas fourni le %s.',
			'regex_match'     => 'caractère(s) non pris en compte. changé!'
		));
		
		$this->form_validation->set_rules('active', 'statut', 'regex_match[/^[a-zA-Z_\ ]+$/]',
		array(
			'regex_match'     => 'caractère(s) non pris en compte. changé!'
		));
		
		if($this->form_validation->run()){
			
			/**insertion dans la base des données */
			$pass = password(7);
			$input_data = array(
				'matricule' => date('y').''.code(5),
				'nom' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'tel' => $this->input->post('telephone'),
				'statut' =>$this->input->post('statut'),
				'etat' => $this->input->post('active'),
				'password' =>password_hash($pass,PASSWORD_BCRYPT),
				'create_at' => dates()
			);

			$query = $this->users->new_user($input_data);
			if($query == true){
				$array = array(
					'success' => '
						<div class="card-body" id="user_data">
						<div class="alert alert-light-success color-success">
							<i class="bi bi-check-circle"></i>
							compte créer <br>
							votre matricule est: <b>'.$input_data['matricule'].'</b> <br>
							le mot de passe provisoir pour ce compte est: <b>'.$pass.'</b><br>
						</div>
					'
				);
			}else{
				$array = array(
					'success' => '<div class="card-body" id="user_data"><div class="alert alert-light-danger color-success"><i class="bi bi-exclamation-circle"></i>OUPS erreur survenu, compte non créer</div>'
				);
			}
			
		}else{
			$array = array(
				'error'   => true,
				'name_error' => form_error('name'),
				'statut_error' => form_error('statut'),
				'active_error' => form_error('active'),
				'email_error' => form_error('email'),
				'telephone_error' => form_error('telephone')
			);
		}

		echo json_encode($array);

	}



	/**liste des utilisateurs */
	public function lusers(){
		$this->logged_in();
		$output = '';

		$valrechercher = $this->input->post('chercher');
		
		if (!empty($valrechercher)) {
			/**rechercher un utilisateur */
			$users = $this->users->chercher_users($valrechercher);
			if($users){
				foreach ($users as $key => $row) {
						$output .= '
						<tr>
							<td>'.$row['matricule'].'</td>
							<td>'.$row['nom'].'</td>
							<td>'.$row['email'].'</td>
							<td>'.$row['tel'].'</td>
							<td>'.$row['statut'].'</td>
							<td>';
								if($row['etat'] == 'on'){
									$output .= '<span class="badge bg-success">active</span>';
								}else{
									$output .= '<span class="badge bg-danger">non active</span>';
								}
				$output .= '</td>
							<td>'.$row['create_at'].'</td>
							<td>'.$row['last_connexion'].'</td>
							<td>
								<a class="btn btn-sm btn-outline-info edit_data" href="'.base_url('edit/'.$row['matricule']).'"> modifier</a>
							</td>
						</tr>
						';
				}
			}

		} else {
		/**affiche tous les utilisateurs */
		$users = $this->users->fetch_users();

			if($users){
				foreach ($users as $key => $row) {
						$output .= '
						<tr>
							<td>'.$row['matricule'].'</td>
							<td>'.$row['nom'].'</td>
							<td>'.$row['email'].'</td>
							<td>'.$row['tel'].'</td>
							<td>'.$row['statut'].'</td>
							<td>';
								if($row['etat'] == 'on'){
									$output .= '<span class="badge bg-success">active</span>';
								}else{
									$output .= '<span class="badge bg-danger">non active</span>';
								}
				$output .= '</td>
							<td>'.$row['create_at'].'</td>
							<td>'.$row['last_connexion'].'</td>
							<td>
								<a class="btn btn-sm btn-outline-info edit_data" href="'.base_url('edit/'.$row['matricule']).'"> modifier</a>
							</td>
						</tr>
						';
				}
			}
		}
		

	

		echo json_encode($output);

	}




	/**edit un users(affiché un user dans le formulaire de modification) */
	public function edit_user($matricule = NULL){
		$this->logged_in();
		$this->load->view('parts/header');

		/**statut de l'utilisateur */
		$data['statut'] = array(
			'1' => 'admin',
			'2' => 'user_note',
			'3' => 'user_cadidat'
		);

		/**affiche un  utilisateurs particulier*/
		$data['user'] = $this->users->select_user($matricule);

	
		
		$this->load->view('users/update',$data);
		$this->load->view('parts/footer_assets');
	}
	

	/**function de déconnexion */
	public function logout(){
		//$this->session->sess_destroy('users');
        un_sess('users');
		flash("info","vous êtes déconnecté");
        redirect('login');
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
