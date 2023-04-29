<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Fiche_model extends CI_Model{
        /**selectionne le parcourl, la lague et le codefiche. ca sera utilisé pour générer la fiche de repport avec les anonymats */
		public function get_code_fiche(){
			$this->db->distinct();
			$this->db->select('candidat.langue_candidat,candidat.parcour,candidat.code_fiche');
            $this->db->order_by('candidat.code_fiche','ASC');
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
			
		}


		public function anonymat_fiche_repport1($parcour,$langue,$codeFiche){
			$this->db->select('candidat.anonymat');
			
			$this->db->where('candidat.parcour',$parcour);
			$this->db->where('candidat.langue_candidat',$langue);
			$this->db->where('candidat.code_fiche',$codeFiche);
			$this->db->order_by('candidat.anonymat','ASC');
			$this->db->limit(25);
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}



		public function anonymat_fiche_repport2($parcour,$langue,$codeFiche){
			$this->db->select('candidat.anonymat');
			$this->db->where('candidat.parcour',$parcour);
			$this->db->where('candidat.langue_candidat',$langue);
			$this->db->where('candidat.code_fiche',$codeFiche);
			$this->db->order_by('candidat.anonymat','ASC');
			$this->db->limit(25, 25);
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->result_array();
			}else{
				return false;
			}
		}




    }


