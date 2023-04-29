<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');
    /**gestion des url des fichiers assets */
    if(!function_exists('assets_dir')){
        function assets_dir(){
            return base_url() . 'assets/';
        }
    }
	if(!function_exists('profil_dir')){
        function profil_dir(){
            return base_url();
        }
    }

    /** function for debug */
    function debug($variable){
        echo '<pre>'.print_r($variable,true).'</pre>';
    }

	/**formater la date */
    function  dateformat($date){
        $dateformat = !empty($date)?date('d-m-Y', strtotime($date)):'';
        return $dateformat;
    }

    /**permet de générer les codes comme: le matricule de l'utilisateur... */
    function code($longueur){
        $alphabet= "ABCDE34563456FGHIJK123456789067LMNOPQRSTUVWXYZ8901278906789";
        /**repete la chaine de caractère alphabet */
        return substr(str_shuffle(str_repeat($alphabet, $longueur)), 0, $longueur);
    }

    /**génère le mot de passe provisoir */
    function password($longueur){
        $alphabet="ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890azertyuiopqsdfghjklmwxcvbbn";
        /**repete la chaine de caractère alphabet */
        return substr(str_shuffle(str_repeat($alphabet, $longueur)), 0, $longueur);
    }

    /**permet de générer les codes comme: le numéro de récépicé */
    function code_recepice($longueur){
        $alphabet="123456789067890123456345678906789";
        /**repete la chaine de caractère alphabet */
        return substr(str_shuffle(str_repeat($alphabet, $longueur)), 0, $longueur);
    }

    /**function qui return le dateTime */
    function dates(){
        date_default_timezone_set("Africa/Douala");
        return date("Y-m-d H:i:sa");
    }

    /**debut gestion des sessions */
    if(!function_exists("session")){
        /**
         * @param $var
         * @param null $value
         * @return mixed
         */
        function session($var, $value = null){
            if(is_string($var) && $value === null){
                return CI_Controller::get_instance()->session->userdata($var);
            }
    
            if(is_string($var) && $value !== null){
                CI_Controller::get_instance()->session->set_userdata($var, $value);
            }
    
            if(is_array($var)){
                CI_Controller::get_instance()->session->set_userdata($var);
            }
        }
    }
    
    if(!function_exists("un_sess")){
        /**
         * @param $var
         * @param null $value
         * @return mixed
         */
        function un_sess($var){
            return CI_Controller::get_instance()->session->unset_userdata($var);
        }
    }
    
    if(!function_exists('session_destroy')){
        /**
         * @param $var
         * @param null $value
         * @return mixed
         */
        function session_destroy($var){
            return CI_Controller::get_instance()->session->sess_destroy($var);
        }
    }
    
    /**fin gestion des sessions */

/**message flash debut */
if(!function_exists("flash")){
    /**
     * @param array|string $data
     * @param null $value
     * @return mixed
     */
    function flash($data, $value = null){

        if(!is_array($data) && $value){
            CI_Controller::get_instance()->session->set_flashdata($data, $value);
             return true;
        }

        if(is_array($data)){
            CI_Controller::get_instance()->session->set_flashdata($data);
            return true;
        }


        if(!is_array($data) && is_null($value)){
            return CI_Controller::get_instance()->session->flashdata($data);
        }

    }
}
 /**message flash fin */


/** function  qui génère les jours */
function jour(){
    $i=1;
    for($i; $i<32; $i++){
        if($i<=9){
            $i = '0'.$i;
        }
        $jour[] = $i;
    }
    return $jour;
}

/** function  qui génère les annee */
function annee(){
    $i=1950;
    $limite = date('Y')-16;
    for($i; $i<$limite; $i++){
        $annee[] = $i;
    }
    return $annee;
}
/** function  qui génère les mois */
function mois(){
    $mois_lettre = array('Janvier','Février','Mars','Avril','Mai','Juin','Juillet','Août','Septembre','Octobre','Novembre','Décembre');
    $i=0;
    foreach($mois_lettre as $row){
        $i+=1;
        if($i<=9){
            $i = '0'.$i;
        }
        $mois[$i] = $row;
    }
    return $mois;
}

/**debut function pour générer les anonymats*/
/*function pour attribuer le code du lot a un candidat*/
    function attrib($n){
        if($n<=10){
            $t2=$n.'A';
        }else if($n<=20){
            $t2=($n-10).'B';
        }else if($n<=30){
            $t2=($n-20).'C';
        }else if($n<=40){
            $t2=($n-30).'D';
        }else if($n<=50){
            $t2=($n-40).'E';
        }else if($n<=60){
            $t2=($n-50).'F';
        }else if($n<=70){
            $t2=($n-60).'G';
        }else if($n<=80){
            $t2=($n-70).'H';
        }else if($n<=90){
            $t2=($n-80).'I';
        }else if($n<=100){
            $t2=($n-90).'J';
        }else if($n<=110){
            $t2=($n-100).'K';
        }else if($n<=120){
            $t2=($n-110).'L';
        }else if($n<=130){
            $t2=($n-120).'M';
        }else if($n<=140){
            $t2=($n-130).'N';
        }else if($n<=150){
            $t2=($n-140).'O';
        }
        return $t2;
    }
/**fin function pour générer les anonymats*/


/**debut formule pour le calcul des notes */

/*formule 1 pour le calcule de la moyenne * CS/60 et CG/20 on fait (CS/3)(3/4)+(CG)(1/4).*/
function formule1($CS,$CG){
    if ($CS=="" or $CG=="") {
      
    }else{
      $result1=($CS/3)*(3/4);
      $result2=($CG)*(1/4);
      $resultat=$result1 + $result2;
      return $resultat;
    }
}

/*formule 2 pour le calcule de la moyenne *CS/40 et CG/20 on fait (CS/2)(3/4)+(CG)(1/4) 
    - cette formule 2 est uniquement applicable sur les TSGR
*/
function formule2($CS,$CG){
    if($CS=="" or $CG==""){
      
    }else{
       $result1=($CS/2)*(3/4);
        $result2=($CG)*(1/4);
        $resultat=$result1 + $result2;
      return $resultat;
    }
}

/**fin formule pour le calcul des notes */



/***upload files 
 * $files is array - $key=name of file, $value=message of the name file
*/
function uploadfiles($files,$newfolder){
	$output = "";

	if (!is_dir('uploads')) {
		mkdir('./uploads', 0777, true);
	}
	if (!is_dir('uploads/'.$newfolder)) {
		mkdir('./uploads/'.$newfolder, 0777, true);
	}

	foreach ($files as $key => $value) {

		if(isset($_FILES[$key])) {
			$target_dir = 'uploads/'.$newfolder. '/';
			$filename = $_FILES[$key]["name"];
			$target_file = $target_dir . basename($_FILES[$key]["name"]);
			$fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
			$fileSize = $_FILES[$key]["size"];
			$tmpName = $_FILES[$key]['tmp_name'];
			$newfilename = $key;

			if ($fileSize === 0) {

				$output = "$value : le fichier est vide / the file is empty";
			}

			if ($fileSize > 300000) { //(300Kb) 1 MB (1 byte * 1024 * 1024 * 3 (for 1 MB))
				$output = "$value : fichier trop velumineux / The file is too large";
			}

			if($fileType != "png" && $fileType != "jpg"  && $fileType != "pdf") {
				
				$output = "$value : ce type de fichier n\'est pas pris en charge / File not allowed.";
			
			}

			if($fileType == "png" || $fileType == "jpg" || $fileType == "jpeg") {


				$config['image_library'] = 'gd2';
				$config['source_image'] = $tmpName;
				$config['create_thumb'] = TRUE;
				$config['maintain_ratio'] = TRUE;
				$config['width']         = 307;
				$config['height']       = 378;
				CI_Controller::get_instance()->load->library('image_lib', $config);
				CI_Controller::get_instance()->image_lib->resize();

			}
			if (move_uploaded_file($tmpName, $target_dir.''.$newfilename.'.'.$fileType)) {
				
				$output = true;
				
			} else {
			
				$output = 'fichier non uploader';
			
			}
		}
	}

	return $output;
}










    


