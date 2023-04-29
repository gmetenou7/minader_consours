<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Candidat_centre_compo_model extends CI_Model{

		/**liste des centre d'examen */
		public function get_centre_examen(){
			$this->db->distinct();
			$this->db->select('candidat.centre_examen');
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
			
		}

		/**liste des candidats par centre d'examen */
		public function get_candidat_centre_examen($centre_examen){
			//$this->db->limit(100);
			$this->db->where('candidat.etat', 1);
			$this->db->where('candidat.centre_examen',$centre_examen);
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}
    }
