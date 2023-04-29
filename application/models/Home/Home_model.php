<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Home_model extends CI_Model{

        /**compte le nombre total de candidats */
        public function count_candidats(){
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }
        }

        /**compte tous les candidats ayant un anonymat */
        public function count_candidats_anonymats1(){
            $this->db->where('candidat.anonymat !=','');
            $this->db->or_where('candidat.anonymat !=',NULL);
            $query = $this->db->get('candidat'); 
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            } 
        }

        /**compte tous les candidats n'ayant pas un anonymat */
        public function count_candidats_anonymats2(){
            $this->db->where('candidat.anonymat','');
            $this->db->or_where('candidat.anonymat',NULL);
            $query = $this->db->get('candidat'); 
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            } 
        }
        
        /**nombre de candidat ayant un code fiche */
        public function count_candidats_code_fiche1(){
            $this->db->where('candidat.code_fiche !=','');
            $this->db->or_where('candidat.code_fiche !=',NULL);
            $query = $this->db->get('candidat'); 
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }  
        }

        /**nombre de candidat n'ayant pas un code fiche */
        public function count_candidats_code_fiche2(){
            $this->db->where('candidat.code_fiche','');
            $this->db->or_where('candidat.code_fiche',NULL);
            $query = $this->db->get('candidat'); 
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }  
        }

        /**debut nombre de candidat pour chaque parcours */

        public function get_parcours(){
            $this->db->distinct();
            $this->db->select('candidat.parcour');
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            } 
        }

        public function count_candidat_parcours($parcour){
            $this->db->select('candidat.parcour,candidat.parcour_option');
            $this->db->where('candidat.parcour',$parcour);
            $query = $this->db->get('candidat'); 
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }
        }

        /**fin nombre de candidat pour chaque parcours */


        /**debut nombre de candidat par option */
        public function get_option_parcour(){
            $this->db->distinct();
            $this->db->select('candidat.parcour_option');
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            } 
        }
        public function count_candidat_option($option){
            $this->db->select('candidat.parcour,candidat.parcour_option');
            $this->db->where('candidat.parcour_option',$option);
            $query = $this->db->get('candidat'); 
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }
        }
        /**fin nombre de candidat par option */

        /**debut nombre de candidat par statut ou qualite(interne, externe) */
        public function get_statut(){
            $this->db->distinct();
            $this->db->select('candidat.statut_candidat');
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            } 
        }
        public function count_candidat_statut($statut){
            $this->db->where('candidat.statut_candidat',$statut);
            $query = $this->db->get('candidat'); 
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }
        }
        /**fin nombre de candidat par statut ou qualite(interne, externe)*/


        /**debut nombre de candidat par sexe */
        public function get_sexe(){
            $this->db->distinct();
            $this->db->select('candidat.sexe');
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            } 
        }
        public function count_candidat_sexe($sexe){
            $this->db->where('candidat.sexe',$sexe);
            $query = $this->db->get('candidat'); 
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }
        }
        /**fin nombre de candidat par sexe*/


        /**debut nombre de candidat par langue */
        public function get_langue(){
            $this->db->distinct();
            $this->db->select('candidat.langue_candidat');
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            } 
        }
        public function count_candidat_langue($langue){
            $this->db->where('candidat.langue_candidat',$langue);
            $query = $this->db->get('candidat'); 
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }
        }
        /**fin nombre de candidat par langue*/



        /**debut nombre de candidat par centre d'examen */
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
        public function count_candidat_examen($examen){
            $this->db->where('candidat.centre_examen',$examen);
            $query = $this->db->get('candidat'); 
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }
        }
        /**fin nombre de candidat par centre d'examen*/


         /**debut nombre de candidat par centre de formation */
         public function get_centre_formation(){
            $this->db->distinct();
            $this->db->select('candidat.ecole_choisi_1');
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            } 
        }
        public function count_candidat_formation($formation){
            $this->db->where('candidat.ecole_choisi_1',$formation);
            $query = $this->db->get('candidat'); 
            if($query->num_rows()>0){
                return $query->num_rows();
            }else{
                return false;
            }
        }
        /**fin nombre de candidat par centre de formation*/


        

        
    }