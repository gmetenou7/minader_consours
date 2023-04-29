<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Note_model extends CI_Model{

        /**affciher la liste des code fiche */
        public function get_code_fiche(){
            $this->db->distinct();
            $this->db->select('candidat.code_fiche');
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return FALSE;
            }
        }

        /**get parcour */
        public function get_parcours(){
            $this->db->distinct();
            $this->db->select('candidat.parcour');
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return FALSE;
            }
        }


        /**on affiche les anonymat en fonction du code fiche et du parcour */
        public function get_anonymat_saisi_note($parcours,$code_fiche){
            $this->db->select('candidat.anonymat');
            //$this->db->where('candidat.parcour',$parcours);
            $this->db->where('candidat.code_fiche',$code_fiche);
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return FALSE;
            }
        }


        /**verifie si le candidat a déjà la note de connaissance scientifique */
        public function getnotecs($anonymat){
            $this->db->select('notecs.notecs');
            $this->db->where('notecs.idcandidat',$anonymat);
            $query = $this->db->get('notecs');
            if($query->num_rows()>0){
                return $query->row_array();
            }else{
                return FALSE;
            }
        }

        /**verifie si le candidat a déjà la note de culture général */
        public function getnotecg($anonymat){
            $this->db->select('notecg.notecg');
            $this->db->where('notecg.idcandidat',$anonymat);
            $query = $this->db->get('notecg');
            if($query->num_rows()>0){
                return $query->row_array();
            }else{
                return FALSE;
            }
        }

        /**inserer la note de connaissance scientifique dans la base des données */
        public function insertnotecs($data){
            $query = $this->db->insert('notecs',$data);
            if($query){
                return $query;
            }else{
                return false;
            }
        }

        /**verifi si la note de connaissance scientifique existe déjà avant insertion
         * si ca existe, on modifie au lieu d'inserer
         */
        public function existcs($key){
            $this->db->select('notecs');
            $this->db->where('notecs.idcandidat',$key);
            $query = $this->db->get('notecs');
            if($query){
                return $query->row_array();
            }else{
                return false;
            }
        }

        /**si la note de connaisance scientifique existe déja, on la modifie */
        public function updatenotecs($key,$data){
            $this->db->where('notecs.idcandidat',$key);
            $query = $this->db->update('notecs',$data);
            if($query){
                return $query;
            }else{
                return false;
            }
        }
        

         /**inserer la note de culture générale dans la base des données */
        public function insertnotecg($data){
            $query = $this->db->insert('notecg',$data);
            if($query){
                return $query;
            }else{
                return false;
            }
        }

        /**verifi si la note de culture générale existe déjà avant insertion
         * si ca existe, on modifie au lieu d'inserer
         */
        public function existcg($key){
            $this->db->select('notecg');
            $this->db->where('notecg.idcandidat',$key);
            $query = $this->db->get('notecg');
            if($query){
                return $query->row_array();
            }else{
                return false;
            }
        }

        /**si la note de culture générale existe déja, on la modifie */
        public function updatenotecg($key,$data){
            $this->db->where('notecg.idcandidat',$key);
            $query = $this->db->update('notecg',$data);
            if($query){
                return $query;
            }else{
                return false;
            }
        }

       

        




        /*********************************************************** */
   

    }