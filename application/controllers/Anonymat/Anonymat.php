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

class Anonymat extends CI_Controller {

    /**constructeur */
	public function __construct(){
		parent::__construct();
        $this->load->model('Anonymat/Anonymat_model', 'anonymat');
    }

    /**connexion dabord */
	function logged_in(){
		if(!session('users') && $this->router->{'class'} !== 'index'){
			flash("warning","merci de te connecter");
			redirect('login');
		}
	}

    public function index(){
        $this->logged_in();
        $this->load->view('parts/header');
        
        /**si la liste des candidats est vide, ca verouille le bouton de génération du candidat */
        $data['candidats'] = $this->anonymat->get_candidats();

        /**s'il y'a un candidat qui n'a pas d'anonymat, le bouton reste ouvert */
        $data['anonymat'] = $this->anonymat->get_anonymat();
        
        
        $this->load->view('anonymat/view',$data);
		$this->load->view('parts/footer_assets');
    }



    /*methode qui génère le code annonymat du candidat*/
    public function generat_annonymat(){
        $this->logged_in();
        /* $list_candidat cette variable est un tableau qui contient la liste des candidats*/

        /*code pour généré le codefiche et l'annonymat*/
        $lettre = array ('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z');
        

        /**liste des parametre(parcour, statut, langue) issu de la base des donnée */
        $parametre= $this->anonymat->get_all_candidats();
       
        foreach($parametre as $value){

            if($value->parcour=='ATA' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='ANGLAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[0];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);
                    
                    
                    if ($k<51){
                        $t3=$k;
                    }else if($k>50){
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id; 
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }
            }
            else
            if($value->parcour=='TA' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='ANGLAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[1];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k<51){
                        $t3=$k;
                    }else if($k>50) {
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }  
            }
            else
            if($value->parcour=='TSA' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='ANGLAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[2];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k<51){
                        $t3=$k;
                    }else if($k>50) {
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }
            }
            else
            if($value->parcour=='TSGR' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='ANGLAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[3];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k<51){
                        $t3=$k;
                    }else if($k>50) {
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }   
            }
            else
            if($value->parcour=='ATA' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='FRANCAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                        $t1=$lettre[4];

                            $n=intdiv($k-1,50);
                            $t2=attrib($n);
                        
                            if ($k<51){
                                $t3=$k;
                            }else if($k>50){
                                if(($k % 50)==0){
                                    $t3=50;
                                }else{
                                    $t3=$k % 50;
                                }
                            }
            
                            if($t3<10){
                            $t3='0'.$t3;  
                            }

                        $k+=1;
                        $codefiche = $t1.''.$t2;
                        $annonymat = $t1.''.$t2.''.$t3;
                        $id = $value->id; 
                        $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                        //echo $annonymat.'<br>';  
                }
            }
            else
            if($value->parcour=='TA' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='FRANCAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[5];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k<51){
                        $t3=$k;
                    }else if($k>50) {
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }
                
            }
            else
            if($value->parcour=='TSA' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='FRANCAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[6];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k <51){
                        $t3=$k ;
                    }else if($k >50) {
                        if(($k  % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k  % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k +=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                } 
            }
            else
            if($value->parcour=='TSGR' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='FRANCAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[7];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k < 51){
                        $t3=$k;
                    }else if($k>50) {
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }  
            }
            else
            if($value->parcour=='TA' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='FRANCAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[8];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k<51){
                        $t3=$k;
                    }else if($k>50){
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id = $value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }
            }
            else
            if($value->parcour=='TA' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='ANGLAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[9];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k<51){
                        $t3=$k;
                    }else if($k>50) {
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }
            }
            else
            if($value->parcour=='TSA' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='FRANCAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[10];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k<51){
                        $t3=$k;
                    }else if($k>50) {
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }
            }
            else
            if($value->parcour=='TSA' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='ANGLAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[11];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k<51){
                        $t3=$k;
                    }else if($k>50){
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }
            }
            else
            if($value->parcour=='ATA' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='ANGLAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[12];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k<51){
                        $t3=$k;
                    }else if($k>50) {
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }
            }
            else
            if($value->parcour=='ATA' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='FRANCAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[13];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k<51){
                        $t3=$k;
                    }else if($k>50) {
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }
            }
            else
            if($value->parcour=='TSGR' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='ANGLAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[14];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k<51){
                        $t3=$k;
                    }else if($k>50) {
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }
            }
            else
            if($value->parcour=='TSGR' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='FRANCAIS'){
                $k=1;
                /**selection dans candidats en fonction des paramètres */
                $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                foreach ($candidats as $key => $value){
                    $t1=$lettre[15];
                    $n=intdiv($k-1,50);
                    $t2=attrib($n);

                    if ($k<51){
                        $t3=$k;
                    }else if($k>50) {
                        if(($k % 50)==0){
                            $t3=50;
                        }else{
                            $t3=$k % 50;
                        }
                    }

                    if($t3<10){
                    $t3='0'.$t3;  
                    }

                    
                    $k+=1;
                    $codefiche = $t1.''.$t2;
                    $annonymat = $t1.''.$t2.''.$t3;
                    $id =$value->id;
                    $this->anonymat->save_anonymat_code_fiche($id, $codefiche, $annonymat);
                    //echo $annonymat.'<br>';
                }
            }


            /**fin du foreach */
        }
        flash("success","nonymats généré avec succès");
        redirect('anonymat'); 
    }



    /**génère le fichier excel contenant la liste des candidats anonymé par parcour, par langue et par statut*/
    public function exporte_anonyme(){
        $this->logged_in();

        $candidats_anonyme = $this->anonymat->get_all_candidats();
        
        if(!empty($candidats_anonyme)){

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

        
            foreach($candidats_anonyme as $key => $value){
                debug($value->parcour);

                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);

                $spreadsheet->setActiveSheetIndex($index)->setCellValue('A1', 'Nom');
                $spreadsheet->setActiveSheetIndex($index)->setCellValue('B1', 'Code Fiche');
                $spreadsheet->setActiveSheetIndex($index)->setCellValue('C1', 'Anonymat');

                /*********************ATA DEBUT**************************** */

                if($value->parcour == 'ATA' && $value->statut_candidat == 'EXTERNE' && $value->langue_candidat == 'ANGLAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');
                    

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($i.' ->'.$values->nom_complet.' '.$values->parcour.' '.$values->statut_candidat.' '.$values->langue_candidat);
                        }
                    }
                }
                else
                if($value->parcour=='ATA' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='FRANCAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $i=0;
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                            //debug($i.' ->'.$values->nom_complet.' '.$values->parcour.' '.$values->statut_candidat.' '.$values->langue_candidat);
                        }
                    }
                }
                else
                if($value->parcour=='ATA' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='ANGLAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                            //debug($i.' ->'.$values->nom_complet.' '.$values->parcour.' '.$values->statut_candidat.' '.$values->langue_candidat);
                        }
                    }
                }
                else
                if($value->parcour=='ATA' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='FRANCAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    }
                }


                /*********************ATA FIN**************************** */
                
                /*********************TA DEBUT**************************** */

                if($value->parcour=='TA' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='ANGLAIS'){
                    
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    }
                }
                else
                if($value->parcour=='TA' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='FRANCAIS'){
                   // debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                   $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    } 
                }
                else
                if($value->parcour=='TA' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='FRANCAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    }
                }
                else
                if($value->parcour=='TA' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='ANGLAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    }
                }

                /*********************TA FIN**************************** */

                /*********************TSA DEBUT**************************** */

                if($value->parcour=='TSA' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='ANGLAIS'){
                    
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    }  
                }
                else
                if($value->parcour == 'TSA' && $value->statut_candidat == 'EXTERNE' && $value->langue_candidat == 'FRANCAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    }
                }
                else
                if($value->parcour=='TSA' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='FRANCAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    }
                }
                else
                if($value->parcour=='TSA' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='ANGLAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    }
                }

                /*********************TSA FIN**************************** */
                
                /*********************TSGR DEBUT**************************** */

                if($value->parcour=='TSGR' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='ANGLAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    } 
                }
                else
                if($value->parcour=='TSGR' && $value->statut_candidat=='EXTERNE' && $value->langue_candidat=='FRANCAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    }
                }
                else
                if($value->parcour=='TSGR' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='ANGLAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    }
                }
                else
                if($value->parcour=='TSGR' && $value->statut_candidat=='INTERNE' && $value->langue_candidat=='FRANCAIS'){
                    //debug($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat.'<hr>');

                    $candidats = $this->anonymat->get_candidatss($value->parcour, $value->statut_candidat, $value->langue_candidat);
                    if(!empty($candidats)){
                        $sheet = $spreadsheet->getActiveSheet();
                        foreach ($candidats as $key => $values){
                            $sheet->setCellValue('A'.$indicevalue, $values->nom_complet);
                            $sheet->setCellValue('B'.$indicevalue, $values->code_fiche);
                            $sheet->setCellValue('C'.$indicevalue, $values->anonymat);
                            $indicevalue++;
                            //debug($values->nom_complet);
                        }
                    }
                }

                

                /*********************TSGR DEBUT**************************** */

                //Rename worksheet
                $spreadsheet->getActiveSheet()->setTitle($value->parcour.' - '.$value->statut_candidat.' - '.$value->langue_candidat);

                $spreadsheet->createSheet();
                $index++;
                $indicevalue=2;
            }


            //Set active sheet index to the first sheet, so Excel opens this as the first sheet
            $spreadsheet->setActiveSheetIndex(0);
                    
            
            $filename = 'Anonymat';

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
            redirect('anonymat');
        }
    }


}
