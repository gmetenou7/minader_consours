<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	class Resultat_model extends CI_Model{

        /**selectionne les parcours et les centres de formation dans la table candidat*/
        public function get_parcour_centre_formation(){
            $this->db->distinct();
            $this->db->select('candidat.parcour, candidat.ecole_choisi_1');
            $this->db->order_by('candidat.parcour','ASC');
            $this->db->order_by('candidat.ecole_choisi_1','ASC');
            $query = $this->db->get('candidat');
            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }
        }



        /**selectionne les candidats et leur note en fonction du parcour et du centre de formation */
        public function get_candidats($parcours, $centreformation){
            $this->db->select('
                candidat.nom_complet,
                candidat.code_fiche,
                candidat.anonymat,
                candidat.nationalite_candidat, 
                candidat.date_naissance,
                candidat.lieu_naissance,
                candidat.sexe, 
                candidat.parcour,
                candidat.parcour_option,
                candidat.statut_candidat, 
                candidat.langue_candidat,
                candidat.centre_examen,
                candidat.ecole_choisi_1, 
                candidat.ecole_choisi_2,
                candidat.ecole_choisi_3,
                notecs.notecs, 
                notecg.notecg'
            );

            $this->db->join('notecs','notecs.idcandidat = candidat.anonymat','LEFT');
            $this->db->join('notecg','notecg.idcandidat = candidat.anonymat','LEFT');

            $this->db->where('candidat.parcour',$parcours);
            $this->db->where('candidat.ecole_choisi_1',$centreformation);

            $this->db->order_by('candidat.anonymat','ASC');
            $this->db->order_by('candidat.parcour','ASC');
            $this->db->order_by('candidat.ecole_choisi_1','ASC');
            $this->db->order_by('candidat.langue_candidat','ASC');

            $query=$this->db->get('candidat');

            if($query->num_rows()>0){
                return $query->result_array();
            }else{
                return false;
            }


        }

    }
