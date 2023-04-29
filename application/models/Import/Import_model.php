<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

    class Import_model extends CI_Model{
        /**importer un candidat candidat */
        public function import_candidat($data){
            $query = $this->db->replace('candidat',$data);
            if($query){
                return true;
            }else{
                return false;
            }
        }



        /**on verifi si le candidat existe pour son parcour */
        public function verifycandidat($nomcomplet,$parcours,$langue,$option){
            $query = $this->db->where('candidat.nom_complet',$nomcomplet);
            $query = $this->db->where('candidat.parcour',$parcours);
            $query = $this->db->where('candidat.langue_candidat',$langue);
            $query = $this->db->where('candidat.parcour_option',$option);
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->row_array();
            }else{
                return false;
            }
        }


        /**update import */
        public function updateverifycandidat($nomcomplet,$datas){
            $this->db->where('candidat.nom_complet',$nomcomplet);

            // $datas = array(
            //     'code_fiche'=>$code,
            //     'anonymat'=>$anonymat
            // );

            $query = $this->db->update('candidat', $datas);
            if($query){
                return $query;
            }else{
                return false;
            }
        }

        public function candidats(){
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }

    }



