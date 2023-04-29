<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**annule la limitation de temps pour l'exécuption des requêtes */
ini_set('max_execution_time', 0); 

class Candidat_centre_compo extends CI_Controller{

    /**constructeur */
	public function __construct(){
		parent::__construct();
        $this->load->model('Candidat_centre_compo/Candidat_centre_compo_model', 'CandidatCentreComposition');
    }

    /**connexion dabord */
	function logged_in(){
		if(!session('users') && $this->router->{'class'} !== 'index'){
			flash("warning","merci de te connecter");
			redirect('login');
		}
	}

    /** */
    public function index(){
        $this->load->view('parts/header');
		$this->logged_in();

        /**liste des centre d'examen */
        $data['centre_examen'] = $this->CandidatCentreComposition->get_centre_examen();

        //debug($data['centre_examen']); die();
        $this->load->view('candidat_centre_compo/candidat_centre_compo',$data);
        $this->load->view('parts/footer_assets');
    }


    /**généré les généré le pdf en fonction du centre de composition */
    public function pdf_centre_composition($nomcentrecompo = NULL){
        /**pour générer le pdf */
        $mpdf = new \Mpdf\Mpdf();
        $footer = 'Print date: ' . date('d.m.Y H:i:s') . '<br />Page {PAGENO} sur {nb}';
        $mpdf->setFooter($footer);
        
        
        /*echo json_encode($output);*/
        $centreexamen =  $nomcentrecompo;
        
        $image = assets_dir().'images/logo/logominader1.jpg';

            /**selectionne tous les candidats appartenant a un centre de composition*/
           $candidat_centre_examen =  $this->CandidatCentreComposition->get_candidat_centre_examen($centreexamen);

            if(!empty($candidat_centre_examen)){
                //echo $row['nom_centre_examen'].'<br>';

               
                $mpdf->WriteHTML('
                    <table border="0" style="width: 100%; border-collapse: collapse; font-size: 9px;">
                        <tr style="text-align: center;">
                            <td>
                                <span>REPUBLIQUE DU CAMEROUN</span><br>
                                <span>Paix – Travail - Patrie</span>
                            </td>
                            <td rowspan="2"><img src="'. $image.'" style="width: 148.5355px; height: 57.8268px"></td>
                            <td>
                                <span>REPUBLIC OF CAMEROON</span><br>
                                <span>Peace – Work - Fatherland</span>
                            </td>
                        </tr> 
                        <tr style="text-align: center;">
                            <td>
                                <span>MINISTERE DE L\'AGRICULTURE</span><br>
                                <span>ET DU DEVELOPPEMENT RURAL</span>
                            </td>
                            <td>
                                <span>MINISTRY OF AGRICULTURE</span><br>
                                <span>AND RURAL DEVELOPMENT</span>
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="3">
                                <br><br><br>
                                    <b style="font-size: 12px;">
                                        CANDIDATS ADMIS A COMPOSE AU CENTRE D\'EXAMEN: <u>'.$centreexamen.'</u> SESSION: <u>'.date('Y').'</u>
                                    </b>
                                <br><br><br>
                            </td>
                        </tr>
                    </table>
                ');

                $mpdf->WriteHTML('<table border="1" style="width: 100%; border-collapse: collapse; font-size: 9px;">
                    <tr style="text-align: center;">
                        <td>Nom</td>
                        <td>Date et Lieu de naissance</td>
                        <td>Sexe</td>   
                        <td>Nationalité</td>
                        <td>Parcours</td>
                        <td>Option</td>
                        <td>Statut</td>
                    </tr>
                ');

                foreach($candidat_centre_examen as $value){
                    $mpdf->WriteHTML('<tr>
                        <td>'.$value['nom_complet'].'</td>
                        <td>'.dateformat($value['date_naissance']).' à '.$value['lieu_naissance'].'</td>
                        <td>'.$value['sexe'].'</td>
                        <td>'.$value['nationalite_candidat'].'</td>
                        <td>'.$value['parcour'].'</td>
                        <td>'.$value['parcour_option'].'</td>
                        <td>'.$value['statut_candidat'].'</td>
                    </tr>');
                }

                $mpdf->WriteHTML('</table>');
                //$mpdf->AddPage();
                
            }else{
                flash('error','aucun candidat trouvé');
                redirect('centrecompo');
            }

            

        $mpdf->Output('candidat_centre_exament_'.$centreexamen.'.pdf','I');

        
        
    }


    /**généré lla liste de tous les centres d'examen */
    public function all_pdf_centre_composition(){
        /**pour générer le pdf */
        $mpdf = new \Mpdf\Mpdf();
        $footer = 'Print date: ' . date('d.m.Y H:i:s') . '<br />Page {PAGENO} sur {nb}';
        $mpdf->setFooter($footer);
    
        
        
        
        $image = assets_dir().'images/logo/logominader1.jpg';

            /**selectionne tous les candidats appartenant a un centre de composition*/
           $centre_examen =  $this->CandidatCentreComposition->get_centre_examen();
		   if(!empty($centre_examen)){
			foreach ($centre_examen as $key => $value) {
				$mpdf->WriteHTML('
					<table border="0" style="width: 100%; border-collapse: collapse; font-size: 9px;">
						<tr style="text-align: center;">
							<td>
								<span>REPUBLIQUE DU CAMEROUN</span><br>
								<span>Paix – Travail - Patrie</span>
							</td>
							<td rowspan="2"><img src="'. $image.'" style="width: 148.5355px; height: 57.8268px"></td>
							<td>
								<span>REPUBLIC OF CAMEROON</span><br>
								<span>Peace – Work - Fatherland</span>
							</td>
						</tr> 
						<tr style="text-align: center;">
							<td>
								<span>MINISTERE DE L\'AGRICULTURE</span><br>
								<span>ET DU DEVELOPPEMENT RURAL</span>
							</td>
							<td>
								<span>MINISTRY OF AGRICULTURE</span><br>
								<span>AND RURAL DEVELOPMENT</span>
							</td>
						</tr>
						<tr style="text-align: center;">
							<td colspan="3">
								<br><br><br>
									<b style="font-size: 12px;">
										CANDIDATS ADMIS A COMPOSE AU CENTRE D\'EXAMEN: <u>'.$value['centre_examen'].'</u> SESSION: <u>'.date('Y').'</u>
									</b>
								<br><br><br>
							</td>
						</tr>
					</table>
				');

				$candidat_centre_examen =  $this->CandidatCentreComposition->get_candidat_centre_examen($value['centre_examen']);

				$mpdf->WriteHTML('<table border="1" style="width: 100%; border-collapse: collapse; font-size: 9px;">
                        <tr style="text-align: center;">
                            <td>Nom</td>
                            <td>Date et Lieu de naissance</td>
                            <td>Sexe</td>   
                            <td>Nationalité</td>
                            <td>Parcours</td>
                            <td>Option</td>
                            <td>Statut</td>
                        </tr>
                    ');


					if (!empty($candidat_centre_examen)) {
                        foreach($candidat_centre_examen as $value){
                            $mpdf->WriteHTML('<tr>
                                <td>'.$value['nom_complet'].'</td>
                                <td>'.dateformat($value['date_naissance']).' à '.$value['lieu_naissance'].'</td>
                                <td>'.$value['sexe'].'</td>
                                <td>'.$value['nationalite_candidat'].'</td>
                                <td>'.$value['parcour'].'</td>
                                <td>'.$value['parcour_option'].'</td>
                                <td>'.$value['statut_candidat'].'</td>
                            </tr>');
                        }
                    }else{
                        flash("error","aucun candidat trouvé");
                        redirect("centrecompo");
                    }


					$mpdf->WriteHTML('</table>');


					$mpdf->AddPage();



			}


		   }else{
				flash('aucun centre d\'examen trouvé');
				redirect('centrecompo');
			}
            

            

        $mpdf->Output('candidat_centre_exament_'.$centreexamen.'.pdf','I');

        
        
    }









}
