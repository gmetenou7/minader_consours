<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Note extends CI_Controller {

        /**constructeur */
        public function __construct(){
            parent::__construct();
            $this->load->model('Note/Note_model', 'note');
            $this->load->model('Home/Home_model', 'home');
        }

        /**connexion dabord */
        function logged_in(){
            if(!session('users') && $this->router->{'class'} !== 'index'){
                flash("warning","merci de te connecter");
                redirect('login');
            }
        }


        public function index(){
            $this->load->view('parts/header');
		    $this->logged_in();

            /**liste des code fiche */
            $data['codeF'] = $this->note->get_code_fiche();
            
            /**liste des parcours*/
            $data['parcours'] = $this->note->get_parcours();

            /**liste des matières */
            $data['matiere'] = array(
                'Culture Générale' => 'CG',
                'Connaissance scientifique' => 'CS'
            );

            $this->load->view('note/note_candidat',$data);
		    $this->load->view('parts/footer_assets');
        }

        /**affiche le formulaire de saisi des notes */
        public function form_saisi(){
            $this->logged_in();

            $output = "";

            $matiere = trim($this->input->post('matiere'));
            $parcours = trim($this->input->post('parcours'));
            $codefiche = trim($this->input->post('codef'));

            /**nombre de candidats n'ayant pas d'anonymat pour autorisé la saisi des notes*/
		    // $verify = $this->home->count_candidats_anonymats2();
            // if(empty($verify)){
                if(!empty($codefiche) && !empty($matiere)){ //!empty($parcours) && 
                    /**selectionne les anonymats en fonction du code fiche et du parcours*/
                    $query =  $this->note->get_anonymat_saisi_note($parcours, $codefiche);
                    if(!empty($query)){
                        $i=0;
                        foreach ($query as $key => $value) {
                            $i+=1;

                            /**vérifie pour quel matière on affiche le formulaire */
                            if($matiere == "CS"){
                                /**vérifie si le candidat a déjà la note sur la matière sélectionné */
                                $verifie_note = $this->note->getnotecs($value['anonymat']);
                                $output .='
                                    <tr>
                                        <td class="text-bold-500">'.$i.'</td>
                                        <td class="text-bold-500">'.$value['anonymat'].'</td>';
                                    if(!empty($verifie_note)){
                                        $output .='
                                        <td><input type="text" name="note['.$value['anonymat'].']" id="note['.$value['anonymat'].']" value="'.$verifie_note['notecs'].'" placeholder="note"></td>';
                                    }else{
                                        $output .='
                                        <td><input type="text" name="note['.$value['anonymat'].']" id="note['.$value['anonymat'].']" value="" placeholder="note"></td>';
                                    }
                                $output .='
                                    </tr>';
                            }else if($matiere == "CG"){
                                /**vérifie si le candidat a déjà la note sur la matière sélectionné */
                                $verifie_note = $this->note->getnotecg($value['anonymat']);
                                $output .='
                                    <tr>
                                        <td class="text-bold-500">'.$i.'</td>
                                        <td class="text-bold-500">'.$value['anonymat'].'</td>';
                                    if(!empty($verifie_note)){
                                        $output .='
                                        <td><input type="text" name="note['.$value['anonymat'].']" id="note['.$value['anonymat'].']" value="'.$verifie_note['notecg'].'" placeholder="note"></td>';
                                    }else{
                                        $output .='
                                        <td><input type="text" name="note['.$value['anonymat'].']" id="note['.$value['anonymat'].']" value="" placeholder="note"></td>';
                                    }
                                $output .='
                                    </tr>';
                            }
                        }
            
                        $output .= '<td><input type="submit" id="btn_note_submit" name="btn_note_submit" value="Enrégistrer" class="btn btn-success"></td>';

                    }else{
                        $output .= "<span class='text-danger'><b>aucun candidat pour ce code et ou ce parcours</b></span>";
                    }
                }else{
                    $output .= "<span class='text-danger'><b>assurez vous d'avois choisir le parcours et le code fiche</b></span>";
                }
            // }else{
            //     $output .= "<span><h3 class='text-danger'><b>il y'a encore des candidats sans anonymats</b></h3></span>"; 
            // }

            echo json_encode($output);
        }



        /**enregistrer les notes des candidats */
        public function save_note(){
            $this->logged_in();
            $output = "";

            $matiere = $this->input->post('matiere');
            $note = $this->input->post('note');
            
            
            if(!empty($matiere)){
                if($matiere == "CS"){
                    $output .= 'vous avez choisi => Connaissance Scientifique';

                    foreach ($note as $key => $value){
                        /**verifier que les notes saisi n'ont pas de caractères non autorisé*/
                        if(empty($value) || is_numeric($value)){
                            if($value<0){
                                $output .= '<br> <span class="fa-fw select-all fas text-danger"></span> '.$key.' => '.$value.'<b>attention!!! on ne peut avoir une note négative</b>';
                            }else{
                                /**avant insertion de la note dans la bd je verifie si la note existe déja */
                                $test = $this->note->existcs($key);
                                if(!empty($test)){
                                    /**comme la note existe déja, on la update*/ 
                                    $insert = array(
                                        'notecs' => $value
                                    );
                                    $query = $this->note->updatenotecs($key,$insert);
                                    if($query){
                                        $output .= '<br>'.$key.' => '.$value.' <span class="fa-fw select-all fas"></span>';
                                    }else{
                                        $output .= '<br> <span class="fa-fw select-all fas text-danger"></span> '.$key.' => '.$value.' <b>erreur survenu</b> note non enrégistré<b> ';
                                    }
                                }else{
                                     /**inserer la note dans la base des données */
                                    $insert = array(
                                        'notecs' => $value,
                                        'idcandidat' => $key
                                    );
                                    $query = $this->note->insertnotecs($insert);
                                    if($query){
                                        $output .= '<br>'.$key.' => '.$value.' <span class="fa-fw select-all fas"></span>';
                                    }else{
                                        $output .= '<br> <span class="fa-fw select-all fas text-danger"></span> '.$key.' => '.$value.' <b>erreur survenu</b> note non enrégistré<b> ';
                                    }
                                } 
                            }
                        }else{
                            $output .= '<br> <span class="fa-fw select-all fas text-danger"></span> '.$key.' => '.$value.'<b>attention!!!! carractere non autorisé <b>';
                        } 
                    }

                }else if($matiere == "CG"){
                    $output .= 'vous avez choisi => Culture général';

                    foreach ($note as $key => $value) {
                        /**verifier que les notes saisi n'ont pas de caractères non autorisé*/
                        if(empty($value) || is_numeric($value)){
                            if($value<0){
                                $output .= '<br> <span class="fa-fw select-all fas text-danger"></span> '.$key.' => '.$value.'<b>attention!!!! on ne peut avoir une note négative</b>';
                            }else{

                                /**avant insertion de la note dans la bd je verifie si la note existe déja */
                                $test = $this->note->existcg($key);

                                if(!empty($test)){
                                    /**comme la note existe déja, on la update*/ 
                                    $insert = array(
                                        'notecg' => $value
                                    );
                                    $query = $this->note->updatenotecg($key,$insert);
                                    if($query){
                                        $output .= '<br>'.$key.' => '.$value.' <span class="fa-fw select-all fas"></span>';
                                    }else{
                                        $output .= '<br> <span class="fa-fw select-all fas text-danger"></span> '.$key.' => '.$value.' <b>erreur survenu</b> note non enrégistré<b> ';
                                    }
                                }else{
                                     /**inserer la note de culture général dans la bd dans la base des données */
                                     $insert = array(
                                        'notecg' => $value,
                                        'idcandidat' => $key
                                    );
                                    $query = $this->note->insertnotecg($insert);
                                    if($query){
                                        $output .= '<br>'.$key.' => '.$value.' <span class="fa-fw select-all fas"></span>';
                                    }else{
                                        $output .= '<br> <span class="fa-fw select-all fas text-danger"></span> '.$key.' => '.$value.' <b>erreur survenu</b> note non enrégistré<b> ';
                                    }
                                }
                            }
                        }else{
                            $output .= '<br> <span class="fa-fw select-all fas text-danger"></span> '.$key.' => '.$value.' <b>attention!!!! carractere non autorisé <b>';
                        } 
                    }

                }
            }else{
                $output .= 'assurez vous d\'avoir choisi la matière';
            }

        
            echo json_encode($output);
        }






        /*public function save_note(){
            $note = $this->input->post('note'); //trim($this->security->xss_clean($this->input->post('note')));
            //$matiere = $this->input->post('matiere'); /*trim($this->security->xss_clean($this->input->post('matiere')));*
            $cg = $this->input->post('cg'); /*trim($this->security->xss_clean($this->input->post('cg')));*
            $matiere = trim($this->input->post('matiere'));
            $output ='';
            if(!empty($note)){
                if($matiere == 'CS'){

                    foreach($note as $key => $value){

                        $existcs = $this->note->existCS($key);

                        if(empty($value)){
                            
                            $insert = array(
                                'idcandidat' => $key,
                                'notecs'  => ''
                            );
                            //$output .= '<b>ok!! valeur correct<b> '.$key.' -> '.$value.' <br>';
                        }else if(!empty($value)){
                            if(is_numeric($value)){
                                $insert = array(
                                    'idcandidat' => $key,
                                    'notecs'  => $value
                                );
                                //$output .= '<b>ok!! valeur correct<b> '.$key.' -> '.$value.' <br>';
                            }else{
                                $errors = array(
                                    //'idcandidat' => $key,
                                    'notecs'  => $value
                                );
                                $output .= ' <b>attention!!!!</b> carractere non autorisé <b> '.$key.' -> '.$value.' <br>';
                            }
                        }

                        if(empty($errors)){
                            if(empty($existcs)){
                                $query = $this->note->savecs_1($insert);
                            }else{
                                $query = $this->note->savecs_2($insert, $existcs['id']);
                            }
                            
                        }
                        /*$output .= '<b>Attention!! formulaire pas correct<b> '.$value.' -> '.$key.' <br>';*
                    }

                    $output .= '<b>ok!! vous avez choisi la matière<b> Connaissance SCientifique('.$matiere.')<br>';

                    if($query){
                        $output .= '<b>ok!! Notes enregistrées</b><br>';
                    }else{
                        $output .= '<b>OUPS!! Notes non enregistrées</b><br>';
                    }

                    
                    
                }else if($matiere == 'CG'){
                    $output .= '<b>ok!! vous avez choisi la matière<b> Culture Générale ('.$matiere.')<br>';

                    foreach($note as $key => $value){

                        $existcg = $this->note->existCG($key);

                        if(empty($value)){
                            $insert = array(
                                'idcandidat' => $key,
                                'notecg'  => ''
                            );
                            //$output .= '<b>ok!! valeur correct<b> '.$key.' -> '.$value.' <br>';
                        }else if(!empty($value)){
                            if(is_numeric($value)){
                                $insert = array(
                                    'idcandidat' => $key,
                                    'notecg'  => $value
                                );
                                //$output .= '<b>ok!! valeur correct<b> '.$key.' -> '.$value.' <br>';
                            }else{
                                $errors = array(
                                    //'idcandidat' => $key,
                                    'notecg'  => $value
                                );
                                $output .= ' <b>attention!!!!</b> carractere non autorisé <b> '.$key.' -> '.$value.' <br>';
                            }
                        }

                        if(empty($errors)){
                            if(empty($existcg)){
                                $query = $this->note->savecg_1($insert);
                            }else{
                                $query = $this->note->savecg_2($insert,$existcg['id']);
                            }
                            
                        }
                        /*$output .= '<b>Attention!! formulaire pas correct<b> '.$value.' -> '.$key.' <br>';*
                    }

                    //$output .= '<b>ok!! vous avez choisi la matière<b> Connaissance SCientifique('.$matiere.')<br>';
                    
                    if($query){
                        $output .= '<b>ok!! Notes enregistrées</b><br>';
                    }else{
                        $output .= '<b>OUPS!! Notes non enregistrées</b><br>';
                    }

                }else{
                    $output .= '<b>OUPS!! choisi la matière<b><br>';
                }
                
            }else{
                $output .='<b>OUPS!!<b> problème survenu, formulaire vide';
            }
            //echo $output;
            echo json_encode($output);
        }*/


    }