<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**annule la limitation de temps pour l'exécuption des requêtes */
ini_set('max_execution_time', 0); 

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

use PhpOffice\PhpSpreadsheet\Helper\Sample;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\RichText\RichText;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Style\Protection;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing;
use PhpOffice\PhpSpreadsheet\Worksheet\PageSetup;
use PhpOffice\PhpSpreadsheet\Worksheet\ColumnDimension;
use PhpOffice\PhpSpreadsheet\Worksheet;


class Import extends CI_Controller {

    /**constructeur */
    public function __construct(){
        parent::__construct();
        $this->load->model('Candidats/Candidats_model', 'candidats');
        $this->load->model('Import/Import_model', 'imports');
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

        $this->load->view('import_export/import_export');
		$this->load->view('parts/footer_assets');
    }
	/**importer les candidats contenu dans le fichier excel */
	public function import_candidat(){
        $this->logged_in();
        $this->load->view('parts/header');
        $this->load->view('excel/vendor/autoload');

        if(!empty($_FILES["select_excel"]["name"])){

                flash("success","encour de traitement...");

                $allowed_extension = array('xlsx'); /**array('xls', 'xlsx'); */
                $file_array = explode(".", $_FILES['select_excel']['name']);
                $file_extension = end($file_array);
                if(in_array($file_extension, $allowed_extension)){
                    $reader = IOFactory::createReader('Xlsx');

                    //$file_name = time() . '.' . $file_extension;
                    $spreadsheet = $reader->load($_FILES['select_excel']['tmp_name']);
                    
                    //$writer = IOFactory::createWriter($spreadsheet, 'Html');
                    //$message = $writer->save('php://output');

                    //unlink($file_name);
                    $data = $spreadsheet->getActiveSheet()->toArray();
                    $nombre_colone = count($data[0]);
                    // if($nombre_colone == 1000){
                        
                        $highestRow = $spreadsheet->getActiveSheet()->getHighestRow();
                        for($row=2; $row <= $highestRow; $row++){

                            // $cellValue = $spreadsheet->getActiveSheet()->getCell('A'.$row)->getValue();


                            // $nomcomplet = $spreadsheet->getActiveSheet()->getCell('A'.$row)->getValue();
                            // $code = $spreadsheet->getActiveSheet()->getCell('B'.$row)->getValue();
                            // $anonymat = $spreadsheet->getActiveSheet()->getCell('C'.$row)->getValue();


                            // $infos = $this->imports->updateverifycandidat($nomcomplet,$code,$anonymat);
                            // $datas = array();
                            // if(!$infos){
                                $datas[] = array(
                                    'nom_complet' => $spreadsheet->getActiveSheet()->getCell('B'.$row)->getValue(),
                                    'date_lieu_naissance' => $spreadsheet->getActiveSheet()->getCell('D'.$row)->getValue().' '.$spreadsheet->getActiveSheet()->getCell('E'.$row)->getValue(),
                                    'sexe' => $spreadsheet->getActiveSheet()->getCell('C'.$row)->getValue(),
    
                                    'parcour' => $spreadsheet->getActiveSheet()->getCell('G'.$row)->getValue(),
                                    'parcour_option' => $spreadsheet->getActiveSheet()->getCell('H'.$row)->getValue(),
                                    'centre_examen' => $spreadsheet->getActiveSheet()->getCell('M'.$row)->getValue(),
                                    'ecole_choisi_1' => $spreadsheet->getActiveSheet()->getCell('I'.$row)->getValue(),
                                    'ecole_choisi_2' => $spreadsheet->getActiveSheet()->getCell('J'.$row)->getValue(),
                                    'ecole_choisi_3' => $spreadsheet->getActiveSheet()->getCell('K'.$row)->getValue(),
                                    'statut_candidat' => $spreadsheet->getActiveSheet()->getCell('F'.$row)->getValue(),
                                    'langue_candidat' => $spreadsheet->getActiveSheet()->getCell('L'.$row)->getValue(),
                                    'telephone_candidat' => $spreadsheet->getActiveSheet()->getCell('N'.$row)->getValue(),
                                    'centre_depot_dossier' => $spreadsheet->getActiveSheet()->getCell('O'.$row)->getValue(),
    
                                    
    
                                  
    
    
    
                                    
    
    
    
                                    /*'num_recepice' => $spreadsheet->getActiveSheet()->getCell('A'.$row)->getValue(),
                                    //'session' => $spreadsheet->getActiveSheet()->getCell('B'.$row)->getValue(),
                                    'parcour' => $spreadsheet->getActiveSheet()->getCell('B'.$row)->getValue(),
                                    'parcour_option' => $spreadsheet->getActiveSheet()->getCell('C'.$row)->getValue(),
                                    'statut_candidat' => $spreadsheet->getActiveSheet()->getCell('D'.$row)->getValue(),
                                    'sexe' => $spreadsheet->getActiveSheet()->getCell('E'.$row)->getValue(),
                                    //'nationalite_candidat' => $spreadsheet->getActiveSheet()->getCell('G'.$row)->getValue(),
                                    'centre_depot_dossier' => $spreadsheet->getActiveSheet()->getCell('F'.$row)->getValue(),
                                    'centre_examen' => $spreadsheet->getActiveSheet()->getCell('G'.$row)->getValue(),
                                    'nom_complet' => $spreadsheet->getActiveSheet()->getCell('H'.$row)->getValue(),
                                    'date_naissance' => $spreadsheet->getActiveSheet()->getCell('I'.$row)->getValue(),
                                    //'lieu_naissance' => $spreadsheet->getActiveSheet()->getCell('L'.$row)->getValue(),
                                    //'diplome_entrer' => $spreadsheet->getActiveSheet()->getCell('M'.$row)->getValue(),
                                    //'etat_diplome' => $spreadsheet->getActiveSheet()->getCell('N'.$row)->getValue(),
                                    'ecole_choisi_1' => $spreadsheet->getActiveSheet()->getCell('J'.$row)->getValue(),
                                    'ecole_choisi_2' => $spreadsheet->getActiveSheet()->getCell('K'.$row)->getValue(),
                                    'ecole_choisi_3' => $spreadsheet->getActiveSheet()->getCell('L'.$row)->getValue(),
                                    'langue_candidat' => $spreadsheet->getActiveSheet()->getCell('M'.$row)->getValue(),
                                    //'telephone_candidat' => $spreadsheet->getActiveSheet()->getCell('S'.$row)->getValue(),
                                    //'telephone_parent' => $spreadsheet->getActiveSheet()->getCell('T'.$row)->getValue(),
                                    //'certif_acte_naiss' => $spreadsheet->getActiveSheet()->getCell('U'.$row)->getValue(),
                                    //'certif_medical' => $spreadsheet->getActiveSheet()->getCell('V'.$row)->getValue(),
                                    //'autori_minader' => $spreadsheet->getActiveSheet()->getCell('W'.$row)->getValue(),
                                    //'certif_diplome' => $spreadsheet->getActiveSheet()->getCell('X'.$row)->getValue(),
                                    //'photo_candidat' => $spreadsheet->getActiveSheet()->getCell('Y'.$row)->getValue(),
                                    //'recu_paie' => $spreadsheet->getActiveSheet()->getCell('Z'.$row)->getValue(),
                                    //'attest_diplome' => $spreadsheet->getActiveSheet()->getCell('AA'.$row)->getValue(),
                                    //'attest_ancien' => $spreadsheet->getActiveSheet()->getCell('AB'.$row)->getValue(),
                                    //'creer_le' => $spreadsheet->getActiveSheet()->getCell('AC'.$row)->getValue(),
                                    //'modifier_le' => $spreadsheet->getActiveSheet()->getCell('AD'.$row)->getValue()*/
                                );
                            // } 
                        }

                        $candidat = $this->imports->candidats();
                        if(!empty($candidat)){

                            $i=0;
                            
                            foreach ($candidat as $key => $value){
                                if(empty($value['parcour'])){

                                
                                    $i+=1;
                                    debug($i.' : ');
                                    debug($value['nom_complet']); 
                                    debug('<hr>');


                                    foreach ($datas as $key => $values) {

                                        //if($values['nom_complet']!="KEUKWA TAGUEKAM FRANCK CABREL" && $values['nom_complet']!="NGARGANA TCHENSOU DAMSOU" && $values['nom_complet']!="ONANA BALLA LIONEL JOSEPH" && $values['nom_complet']!="IBRAHIMA BOUBA" && $values['nom_complet']!="BOUBA SALI" && $values['nom_complet']!="DJINI MARTIN DOUBOUI" && $values['nom_complet']!="MAHAMAT-NOUR MAHAMAT" && $values['nom_complet']!="SAMIRA AMADOU"){
 

                                            if($value['nom_complet'] == $values['nom_complet']){

                                                
                                                //debug($values['nom_complet']);

                                                $nomcomplet = $values["nom_complet"];
                                                $dat = Array(
                                                    "sexe" => $values["sexe"],
                                                    "parcour" => $values["parcour"],
                                                    "parcour_option" => $values["parcour_option"],
                                                    "centre_examen" => $values["centre_examen"],
                                                    "ecole_choisi_1" => $values["ecole_choisi_1"],
                                                    "ecole_choisi_2" => $values["ecole_choisi_2"],
                                                    "ecole_choisi_3" => $values["ecole_choisi_3"],
                                                    "statut_candidat" => $values["statut_candidat"],
                                                    "langue_candidat" => $values["langue_candidat"],
                                                    "telephone_candidat" => $values["telephone_candidat"],
                                                    "centre_depot_dossier" => $values["centre_depot_dossier"],
                                                );


                                                $infos = $this->imports->updateverifycandidat($nomcomplet,$dat);




                                            }

                                        //}

                                    }
                                    debug('----------------------');
                                }
                            }

                        }
                        
                        die();

                        debug($datas);
                        die();

                         /**insertion dans la bd */
                        foreach ($datas as $key => $values){


                            $infos = $this->imports->updateverifycandidat($nomcomplet,$datas);







                            /**on teste pour voir si le nom existe pour le parcours du candidat */
                            // $isExist = $this->imports->verifycandidat($values['nom_complet'],$values['parcour'],$values['langue_candidat'],$values['parcour_option']);
                            // if(empty($isExist)){
                            //     $isOk = $this->imports->import_candidat($values);
                            //     if(!$isOk){
                            //         echo 'candidat non importé';
                            //         debug($values);
                            //         echo '<hr>'; 
                            //     }
                            // }else{
                            //     echo 'candidat '.$isExist['nom_complet'].' existe<br>';
                            // }
                            
                        }
                        die();
                        redirect('files');
                    // }else{
                    //     flash("error","fichier pas valide! le nombre exacte de colone doit être 12");
                    //     redirect('files');
                    //     /**$message = '<div class="alert alert-danger">fichier pas valide</div>'; */
                    // }
                       
                }else{
                    flash("error","Seul le fichier excel (.xlsx) est autorisé");
                    redirect('files');
                    /**$message = '<div class="alert alert-danger">Seul le fichier excel (.xlsx) est autorisé</div>';*/
                }
        }else{
            flash("error","Veuillez sélectionner un fichier");
            redirect('files');
            /*$message = '<div class="alert alert-danger">Veuillez sélectionner un fichier</div>';*/
        }


        /*echo $message;*/
        $this->load->view('import_export/import_export');
		$this->load->view('parts/footer_assets');
	}



    


}
