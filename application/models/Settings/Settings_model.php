<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Settings_model extends CI_Model{
        
        /**creer une session */
        public function insert_session($input){
            $query = $this->db->insert('session',$input);
            if($query){
                return $query;
            }else{
                return false;
            }
        }

        /**selectionner toutes les sessions */
        public function get_all_session(){
            $this->db->order_by('session.id','DESC');
            $query = $this->db->get('session');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        /**supprimer une session */
        public function session_delete($data){
            $query = $this->db->where('session.nom_session',$data)
                                ->delete('session');
            if($query ){
                return $query;
            }else{
                return  false;
            }
        }

        /**inserer un centre de depot des dossier */
        public function insert_depot($input){
            $query = $this->db->insert('centre_depot',$input);
            if($query){
                return $query;
            }else{
                return false;
            }
        }

        /**afficher tous les centre de depot */
        public function get_all_depot(){
            $query = $this->db->get('centre_depot');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }


        /**supprimer un centre de depot des dossiers */
        public function depot_delete($data){
            $query = $this->db->where('centre_depot.nom_centre_depot',$data)
                                ->delete('centre_depot');
            if($query ){
                return $query;
            }else{
                return  false;
            }
        }

        /**ajouter un nouveau centre d'examen */
        public function insert_examen($input){
            $query = $this->db->insert('centre_examen_s',$input);
            if($query){
                return $query;
            }else{
                return false;
            }
        }
        
        /**affiche tous les centres d'examen */
        public function get_all_examen(){
            $query = $this->db->get('centre_examen_s');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        /**supprimer un centre d'examen */
        public function depot_examen($data){
            $query = $this->db->where('centre_examen_s.nom_centre_examen',$data)
                                ->delete('centre_examen_s');
            if($query ){
                return $query;
            }else{
                return  false;
            }
        }
        
    }