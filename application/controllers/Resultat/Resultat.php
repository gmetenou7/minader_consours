<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**debut pour le fichier excel */
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
/**fin pour le fichier excel */

/**annule la limitation de temps pour l'exécuption des requêtes */
ini_set('max_execution_time', 0); 

class Resultat extends CI_Controller {
	/**constructeur */
	public function __construct(){
		parent::__construct();
        $this->load->model('Resultat/Resultat_model', 'resultat');
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
        
        $data['parcourCentreFormation'] = $this->resultat->get_parcour_centre_formation();
        /**nombre de candidats n'ayant pas d'anonymat pour autorisé la génération des résultats*/
		$data['nbr_cdt_sans_anonymat'] = $this->home->count_candidats_anonymats2();

        $this->load->view('resultat/resultat',$data);
		$this->load->view('parts/footer_assets');
    }


    public function excel_resultat(){
        $this->logged_in();
        $output ='';
         /**selectionne les parcours et les centres de formations qui seront utilisé pour afficher les résultats */
         $parcourCentreFormation = $this->resultat->get_parcour_centre_formation();

            if(!empty($parcourCentreFormation)){

                $this->load->view('excel/vendor/autoload');

                $spreadsheet = new Spreadsheet();

                $spreadsheet->getProperties()->setCreator('PhpOffice')
                        ->setLastModifiedBy('PhpOffice')
                        ->setTitle('Office 2007 XLSX Test Document')
                        ->setSubject('Office 2007 XLSX Test Document')
                        ->setDescription('PhpOffice')
                        ->setKeywords('PhpOffice')
                        ->setCategory('PhpOffice');

                $index=0;
                $indicevalue=2;

                foreach($parcourCentreFormation as $key => $value){
                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('J')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('K')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('L')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('M')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('N')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('O')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('P')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('Q')->setAutoSize(true);

                    // Add some data
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('A1', 'Nom');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('B1', 'Code Fiche');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('C1', 'Anonymat');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('D1', 'Nationalité');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('E1', 'Date Et Lieu De Naissance');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('F1', 'Sexe');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('G1', 'Parcour');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('H1', 'Option Parcour');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('I1', 'Qualité');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('J1', 'Langue');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('K1', 'Centre D\'Examen');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('L1', 'Ecole Choisi 1');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('M1', 'Ecole Choisi 2');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('N1', 'Ecole Choisi 3');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('O1', 'NOTES  CST');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('P1', 'NOTE CG');
                    $spreadsheet->setActiveSheetIndex($index)->setCellValue('Q1', 'MOYENNE');

                    /**selectionne les candidats en fonction du parcour et du centre de formation */
                    $result = $this->resultat->get_candidats($value['parcour'], $value['ecole_choisi_1']);
                    if(!empty($result)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($result as $keys => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values['nom_complet']);
                            $sheet->setCellValue('B'.$indicevalue, $values['code_fiche']);
                            $sheet->setCellValue('C'.$indicevalue, $values['anonymat']);
                            $sheet->setCellValue('D'.$indicevalue, $values['nationalite_candidat']);
                            $sheet->setCellValue('E'.$indicevalue, $values['lieu_naissance']);
                            $sheet->setCellValue('F'.$indicevalue, $values['sexe']);
                            $sheet->setCellValue('G'.$indicevalue, $values['parcour']);
                            $sheet->setCellValue('H'.$indicevalue, $values['parcour_option']);
                            $sheet->setCellValue('I'.$indicevalue, $values['statut_candidat']);
                            $sheet->setCellValue('J'.$indicevalue, $values['langue_candidat']);
                            $sheet->setCellValue('K'.$indicevalue, $values['centre_examen']);
                            $sheet->setCellValue('L'.$indicevalue, $values['ecole_choisi_1']);
                            $sheet->setCellValue('M'.$indicevalue, $values['ecole_choisi_2']);
                            $sheet->setCellValue('N'.$indicevalue, $values['ecole_choisi_3']);
                            $sheet->setCellValue('O'.$indicevalue, $values['notecs']);
                            $sheet->setCellValue('P'.$indicevalue, $values['notecg']);

                            if($values['parcour'] != "TSGR"){
                                $moyenne1 = formule1($values['notecs'],$values['notecg']);
                                $sheet->setCellValue('Q'.$indicevalue, $moyenne1);
                            }else if($values['parcour'] == "TSGR"){
                                $moyenne2 = formule2($values['notecs'],$values['notecg']);
                                $sheet->setCellValue('Q'.$indicevalue, $moyenne2);
                            }
                            
                            $indicevalue++;
                        }
                    }else{
                        flash("error","OUPS!. Erreur survenue... des informations nécessaires manquent à l'appel");
                        redirect('resultat');
                        //exit;
                    }
                    
                    // Rename worksheet
                    $spreadsheet->getActiveSheet()->setTitle($value['parcour'].' '.$value['ecole_choisi_1']);

                    $spreadsheet->createSheet();
                    $index++;
                    $indicevalue=2;
                }

                // Set active sheet index to the first sheet, so Excel opens this as the first sheet
                    $spreadsheet->setActiveSheetIndex(0);
                    
            
                    $filename = 'Resultats Des Candidats';

                    ob_end_clean();

                    header('Content-Type: application/vnd.ms-excel');
                    header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"'); 
                    header('Cache-Control: max-age=0');
                    // If you're serving to IE 9, then the following may be needed
                    header('Cache-Control: max-age=1');

                    $writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
                    $writer->save('php://output');
                    //flash('success','Excellent!! le rapport des résultats a été téléchargé avec succès');
                    redirect('resultat');
                    //exit;
            }else{
                flash("error","OUPS!. Aucun centre de formation et parcour n'a été trouvé");
                redirect('resultat');
            }
            redirect('resultat');
    }







}
