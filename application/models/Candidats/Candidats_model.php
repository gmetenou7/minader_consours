<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Candidats_model extends CI_Model{

		/**selectionner une session */
		public function get_session(){
			$query = $this->db->limit(1)
							->order_by('session.id','DESC')
            				->get('session');
            if($query->num_rows()>0){
                return $query->row_array();
            }else{
                return false;
            }

		}

		/**selectionne tous les centre de depot des dossiers */
		public function get_centre_depot(){
			$query = $this->db->get('centre_depot');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}

		/**selectionne tous les parcours */
		public function get_parcours(){
			$query = $this->db->get('parcour_s');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}

		/**list des pays */
		public function get_pays(){
			$query = $this->db->get('pays');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}

		/**liste des centre d'examen */
		public function get_centre_examen(){
			$query = $this->db->get('centre_examen_s');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}

		/**selectionne les options d'un parcour */
		public function get_option_parcour($parcour_id){
			$this->db->where('option_parcour.idparcour',$parcour_id);
			$query = $this->db->get('option_parcour');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}

		/**affiche les centres de formation en fonction du parcour */
		public function get_centre_formation_parcour($parcour_id){
			$this->db->select('centre_formation_parcour.ref_centre_formation');
			$this->db->where('centre_formation_parcour.ref_parcour',$parcour_id);
			$query = $this->db->get('centre_formation_parcour');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}

		/**affiche les centres centre de formatione en focntion de l'option */
		public function get_centre_formation_option($ref_option){
			$this->db->select('centre_formation_option.ref_formation');
			$this->db->where('centre_formation_option.ref_option',$ref_option);
			$query = $this->db->get('centre_formation_option');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}

		/**affiche les diplomes en fonction des parcours */
		public function get_parcours_diplome($ref_parcour){
			$this->db->select('diplome_entrer_parcour.diplome_ref');
			$this->db->where('diplome_entrer_parcour.parcour_ref',$ref_parcour);
			$query = $this->db->get('diplome_entrer_parcour');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}




		

		/**enregistrer candidat */
		public function new_candidat($data){
			$query = $this->db->insert('candidat',$data);
			if($query){
				return true;
			}else{
				return false;
			}
		}

		/**cherche le candidat avec qui a le code saisi */
		public function get_code($id){
			$query =$this->db->select('candidat.num_recepice')
					->where('candidat.num_recepice',$id)
					->get('candidat');
			if($query->num_rows() > 0){
				return $query->row_array();
			}else{
				return false;
			}
		}



		/**selectionne tous les candidats */
		public function count_candidat(){
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->num_rows();
			}else{
				return false;
			}
		}

		/**selectionner toutes candidats avec pagination */
		public function get_all_candidat(/*$limit,$offset*/){
			//$this->db->cache_delete_all();
			//$this->db->cache_on();
			$this->db->order_by('candidat.nom_complet','ASC');
			/*$this->db->limit($limit);
			$this->db->offset($offset);*/
			$this->db->order_by('candidat.statut_candidat','ASC');
			$this->db->order_by('candidat.langue_candidat','ASC');
			$this->db->order_by('candidat.parcour','ASC');
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}

		/**selectionner toutes candidats avec pagination */
		public function get_all_candidats($limit,$start){
			$output = '';
			$this->db->order_by('candidat.nom_complet','ASC');
			$this->db->limit($limit,$start);
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				$output .='
					<table  class="table table-striped mb-5" style="width:100%">
						<thead>
							<tr>
								<th>Nom Complet</th>
								<th>Numero recepice</th>
								<th>Session</th>
								<th>Parcour</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
				';

				foreach($query->result_array() as $row){
					$status = ($row['etat']==1)?"<b class='text-success'>validé</b>":"<b class='text-infos'>en attente de validation</b>";
					$class1 = ($row['etat']==1)?"danger":"success";
					$class2 = ($row['etat']==1)?"<i class='bi bi-x-circle'></i>":"<i class='bi bi-check2-all'></i>";
					$output .='
						<tr>
							<td>'.$row['nom_complet'].'</td>
							<td>'.$row['num_recepice'].'</td>
							<td>'.$row['session'].'</td>
							<td>'.$row['parcour'].'</td>
							<td>'.$status.'</td>
							<td>
								<a class="badge bg-primary" target="_blank" href="'.base_url('print_fiche/'.$row['num_recepice']).'">
									<span class="fa-fw select-all fas"></span>
								</a>
								<a class="badge bg-primary" href="'.base_url('profil/'.$row['num_recepice']).'" target="_blank">
									<span class="fa-fw select-all fas"></span>
								</a>
								<a class="badge bg-success" href="'.base_url('update_candidat/'.$row['num_recepice']).'" target="_blank">
									<span class="fa-fw select-all fas"></span>
								</a>

								<button type="button" name="remove" class="badge bg-'.$class1.' remove_inventory" id="'.$row['num_recepice'].'">
									'.$class2.'
								</button>
							</td>
						</tr>
					';
				}

				$output .='
						</tbody>
					</table>
				';
				return $output;
			}else{
				return false;
			}
		}

		/**compte le nombre de candidat recherché */
		public function count_candidat_search($var){
			$this->db->like('candidat.nom_complet', $var, 'both');
			$this->db->or_like('candidat.num_recepice', $var, 'both');
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->num_rows();
			}else{
				return false;
			}
		}
		
		/**recherche instantanné d'un candidat */
		public function get_all_candidat_recherche($limit,$start,$recherche){
			$output = '';
			$this->db->order_by('candidat.nom_complet','ASC');
			$this->db->limit($limit,$start);
			$this->db->like('candidat.nom_complet', $recherche, 'both');
			$this->db->or_like('candidat.num_recepice', $recherche, 'both');
			/*$this->db->or_like('candidat.parcour', $recherche, 'both');
			$this->db->or_like('candidat.parcour_option', $recherche, 'both');
			$this->db->or_like('candidat.statut_candidat', $recherche, 'both');
			$this->db->or_like('candidat.sexe', $recherche, 'both');*/
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				$output .='
				<div>'.$query->num_rows().'</div>
					<table  class="table table-striped mb-5" style="width:100%">
						<thead>
							<tr>
								<th>Nom Complet</th>
								<th>Numero recepice</th>
								<th>Session</th>
								<th>Parcour</th>
								<th>Status</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
				';

				foreach($query->result_array() as $row){
					$status = ($row['etat']==1)?"<b class='text-success'>validé</b>":"<b class='text-infos'>en attente de validation</b>";
					$class1 = ($row['etat']==1)?"danger":"success";
					$class2 = ($row['etat']==1)?"<i class='bi bi-x-circle'></i>":"<i class='bi bi-check2-all'></i>";
					$output .='
						<tr>
							<td>'.$row['nom_complet'].'</td>
							<td>'.$row['num_recepice'].'</td>
							<td>'.$row['session'].'</td>
							<td>'.$row['parcour'].'</td>
							<td>'.$status.'</td>
							<td>
								<a class="badge bg-primary" href="'.base_url('print_fiche/'.$row['num_recepice']).'">
									<span class="fa-fw select-all fas"></span>
								</a>
								<a class="badge bg-primary" href="'.base_url('profil/'.$row['num_recepice']).'" target="_blank">
									<span class="fa-fw select-all fas"></span>
								</a>
								<a class="badge bg-success" href="'.base_url('update_candidat/'.$row['num_recepice']).'" target="_blank">
									<span class="fa-fw select-all fas"></span>
								</a>

								<button type="button" name="remove" class="badge bg-'.$class1.' remove_inventory" id="'.$row['num_recepice'].'">
									'.$class2.'
								</button>
							</td>
						</tr>
					';
				}

				$output .='
						</tbody>
					</table>
				';
				return $output;
			}else{
				return false;
			}
		}

		/**supprimer un candidat */
		public function delete_candidat($id){
			$singledata = $this->profil_candidat($id);
			if(empty($singledata)){
				return false;
			}

			if($singledata['etat'] == 1){
				$this->db->where('candidat.num_recepice',$id);
				return $this->db->update('candidat',['candidat.etat'=>0]);
			}

			if($singledata['etat'] == 0){
				$this->db->where('candidat.num_recepice',$id);
				return $this->db->update('candidat',['candidat.etat'=>1]);
			}

			return false;

		}

		/**afficher les informations d'un candidat en particulier */
		public function profil_candidat($id){
			$this->db->where('candidat.num_recepice',$id);
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->row_array();
			}else{
				return false;
			}
		}

		/**affiche le diplome en fonction du parcour */
		public function get_diplome_parcour($parcour){
			$this->db->where('diplome_entrer_parcour.parcour_ref',$parcour);
			$query = $this->db->get('diplome_entrer_parcour');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}

		

		/**modifier un candidat */
		public function update_candidat($n_recepice,$data){
			$this->db->where('candidat.num_recepice',$n_recepice);
			$query = $this->db->update('candidat',$data);
			if($query){
				return $query;
			}else{
				return false;
			}
		}

		/**selectionner la liste des parcours dans la table candidat */
		public function parcours(){
			$this->db->distinct();
			$this->db->select('candidat.parcour');
			$query = $this->db->get('candidat');

			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return FALSE;
			}	
		}

		/**selectionner les qualites dans la table candidat */
		public function qualite(){
			$this->db->distinct();
			$this->db->select('candidat.statut_candidat');
			$query = $this->db->get('candidat');

			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return FALSE;
			}	
		}

		/**selection de la langue dans la liste des candidats */
		public function langue(){
			$this->db->distinct();
			$this->db->select('candidat.langue_candidat');
			$query = $this->db->get('candidat');

			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return FALSE;
			}	
		}

		/**selection les ecoles de formation dans la liste des candidats */
		public function formation(){
			$this->db->distinct();
			$this->db->select('candidat.ecole_choisi_1');
			$query = $this->db->get('candidat');

			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return FALSE;
			}	
		}

		/**selection les centre examen dans la liste des candidats */
		public function examen(){
			$this->db->distinct();
			$this->db->select('candidat.centre_examen');
			$query = $this->db->get('candidat');

			if($query->num_rows() > 0){
				return $query->result_array();
			}else{
				return FALSE;
			}	
		}

		/**selection des candidats a exporté en function des paramettres */
		public function get_all_candidat_param($parcour,$qualite,$langue,$formation,$examen){
			//$this->db->cache_on();
			$this->db->order_by('candidat.nom_complet','ASC');
			/*$this->db->limit($limit);
			$this->db->offset($offset);
			$this->db->order_by('candidat.statut_candidat','ASC');
			$this->db->order_by('candidat.langue_candidat','ASC');
			$this->db->order_by('candidat.parcour','ASC');*/

			$this->db->where('candidat.parcour',$parcour);
			$this->db->or_where('candidat.statut_candidat',$qualite);
			$this->db->or_where('candidat.langue_candidat',$langue);
			$this->db->or_where('candidat.ecole_choisi_1',$formation);
			$this->db->or_where('candidat.ecole_choisi_2',$formation);
			$this->db->or_where('candidat.ecole_choisi_3',$formation);
			$this->db->or_where('candidat.centre_examen',$examen);
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}



		public function get_all_session(){
			$this->db->order_by('session.id','DESC')->limit(1);
				$query = $this->db->get('session');
				if($query->num_rows()>0){
					return $query->row_array();
				}else{
					return false;
				}
		}



    }
