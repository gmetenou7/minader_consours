<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Anonymat_model extends CI_Model{

		/**
		 * génération des anonymat
		 *  - je selectionne tous le id des candidats ayant pour paramètre, ceux a l'entré de la methode
		 *  -l'id servira lors de l'insertion des annonymats généré dans la base des données
		 * 
		 * */

		function get_candidats(){
			$this->db->select('*');
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return false;
			}
		}

		function get_candidatss($parcour, $statut, $langue){
			$this->db->select('*');
			$this->db->where('candidat.parcour',$parcour);
			$this->db->where('candidat.statut_candidat',$statut);
			$this->db->where('candidat.langue_candidat',$langue);

			$this->db->where('candidat.etat', 1);
			
			$this->db->order_by('candidat.parcour','ASC');
			//$this->db->order_by('candidat.idLieuComposition','ASC');
			$this->db->order_by('candidat.statut_candidat','ASC');
			$this->db->order_by('candidat.langue_candidat','ASC');
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return false;
			}
		}
		
		/**
		 * génération d'anonymat
		 * - je selectionne d'une manière "distinct" tous les parcours, les statut, les langues
		 * - je classe en function du parcour, statut, langue
		 * -cette ensemble de combinaison sera utilisé pour selectionner les candidats dont on généra leurs anonymat
		 */
		function get_all_candidats(){
			$this->db->distinct();
			$this->db->select(' 
				candidat.parcour, 
				candidat.statut_candidat, 
				candidat.langue_candidat
			');

			$this->db->where('candidat.etat', 1);

			$this->db->order_by('candidat.statut_candidat','ASC');
			$this->db->order_by('candidat.langue_candidat','ASC');
			$this->db->order_by('candidat.parcour','ASC');
			$query = $this->db->get('candidat');
			if($query->num_rows()>0){
				return $query->result();
			}else{
				return false;
			}
		}



		/**inserer les anonymats généré dans la base des données */
		/*inserer le codeFiche et l'annonymat*/
		function save_anonymat_code_fiche($id, $codefiche, $annonymat){
			$this->db->set('candidat.anonymat', $annonymat);
			$this->db->set('candidat.code_fiche', $codefiche);
			$this->db->where('candidat.id', $id);
			$query = $this->db->update('candidat');
			if($query){
				return $query;
			}else{
				return false;
			}
		}

		/**selectionne tous les candidats dont l'anonymat  est == a null ou vide */
		function get_anonymat(){
			$this->db->select('*');
			$this->db->where('candidat.statut_candidat != ','SURETUDE');
			$this->db->where('candidat.anonymat', NULL, TRUE);
			$this->db->or_where('candidat.anonymat', '');
			$query = $this->db->get('candidat');
			if($query){
				return $query->result_array();
			}else{
				return false;
			}
		}


    }
