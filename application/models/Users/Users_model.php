<?php

	defined('BASEPATH') OR exit('No direct script access allowed');

	class Users_model extends CI_Model{

        /**login */
        function login($login){
            $this->db->where('users.matricule',$login);
			$this->db->or_where('users.nom', $login);
			$this->db->or_where('users.email', $login);
			$this->db->or_where('users.tel', $login);
            $query = $this->db->get('users');
            if($query->num_rows()>0){
                return $query->row_array();
            } 
        }

        /**heur de connexion */
        function update_login($matricule, $input_data){
            $this->db->where('users.matricule',$matricule);
            $query = $this->db->update('users',$input_data);
            if($query){
                return $query;
            }
        }

        /**affiche tous les utilisateurs */
        function fetch_users(){
            $query = $this->db->get('users');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        /**rechercher un utilisateur */
        public function chercher_users($recherche){
            $this->db->like('users.nom', $recherche, 'both');
            $this->db->or_like('users.matricule', $recherche, 'both'); 
            $query = $this->db->get('users');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

        /**affiche un utilisateur particulier */
        function select_user($matricule){
            $this->db->where('users.matricule',$matricule);
            $query = $this->db->get('users');
            if($query->num_rows()>0){
                return $query->row_array();
            } 
        }

        /**modifier un utilisateur */
        function update($matricule, $input_data){
            $this->db->where('users.matricule',$matricule);
            $query = $this->db->update('users',$input_data);
            if($query){
                return $query;
            }
        }

        /**creer un nouvel utilisateur */
        function new_user($input_data){
            $query = $this->db->insert('users',$input_data); 
            if($query){
                return $query;
            }
        }

        

	}
