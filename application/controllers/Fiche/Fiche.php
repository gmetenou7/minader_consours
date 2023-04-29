<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Fiche extends CI_Controller {

    /**constructeur */
	public function __construct(){
		parent::__construct();
        $this->load->model('Fiche/Fiche_model', 'fiche');
        $this->load->model('Home/Home_model', 'home');
    }

	/**connexion dabord */
	function logged_in(){
		if(!session('users') && $this->router->{'class'} !== 'index'){
			flash("warning","merci de te connecter");
			redirect('login');
		}
	}

    /**page de fiche */
    public function index(){
        $this->load->view('parts/header');
		$this->logged_in();

        /**affiche les informations qui permettent de télécharger les fiches de repports des notes */
        $data['informations'] = $this->fiche->get_code_fiche();

        /**nombre de candidats n'ayant pas un code fiche: ceci permettra de verifier que tout 
         * le monde a un code fiche pour pouvoir imprimer les fiches de repport
        */
		$data['count_candidat_code_fiche2'] = $this->home->count_candidats_code_fiche2();

        $this->load->view('fiche_repport/fiche_repport', $data);
		$this->load->view('parts/footer_assets');
    }

    /**fiche de repport */
    public function fiche_repport(){
        
    }

    /**fiche d'anonymat */
    public function fiche_anonymat(){

    }



     /**généré les généré le pdf en fonction du centre de composition */
     public function pdf_fiche_repport(){
        $this->logged_in();
       $codefiche = $this->uri->segment(2);
       $langue = $this->uri->segment(3);
       $parcour = $this->uri->segment(4);


       $anonymat_fiche1 = $this->fiche->anonymat_fiche_repport1($parcour,$langue,$codefiche);
       $anonymat_fiche2 = $this->fiche->anonymat_fiche_repport2($parcour,$langue,$codefiche);

        /**pour générer le pdf */
        $mpdf = new \Mpdf\Mpdf();
        $footer = 'Print date: ' . date('d.m.Y H:i:s') . '<br />Page {PAGENO} sur {nb}';
        $mpdf->setFooter($footer);
        $image = assets_dir().'images/logo/logominader1.jpg';
        /**code fiche, langue, parcour */
            $mpdf->WriteHTML('
                <table border="0" style="width: 100%; border-collapse: collapse; font-size: 9px;">
                    <tr style="text-align: center;">
                        <td>
                            <span>REPUBLIQUE DU CAMEROUN</span><br>
                            <span>Paix – Travail - Patrie</span>
                        </td>
                        <td rowspan="2"><img src="'.$image.'" style="width: 148.5355px; height: 57.8268px"></td>
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
                                    FICHE REPORT DES NOTES <u></u> SESSION: <u>'.date('Y').'</u>
                                </b><br>
                                <b style="font-size: 12px;">
                                    CODE FICHE: '.$codefiche.'
                                </b> / 
                                <b style="font-size: 12px;">
                                    LANGUE: '.$langue.'
                                </b> / 
                                <b style="font-size: 12px;">
                                    PARCOURS: '.$parcour.'
                                </b><br>
                                <b style="font-size: 12px;">
                                    EPREUVE:
                                </b><br>
                                <b style="font-size: 12px;">
                                NOM ET VISA DU CORRECTEUR:
                                </b><br>
                            <br><br><br>
                        </td>
                    </tr>
                </table>
            ');

            //background-image:linear-gradient(to right, #6666FF, #6666FF);
            //background-image:linear-gradient(to right, #99FF66, #99FF66);
            
            $mpdf->WriteHTML('
                <table style="width:100%">
                    <tr>
                        <td>
                            <table style="width:100%">
                                <tr>
                                    <td style="width:50%;   border:0px solid black; height:20px;  background-size:50% 100%;background-repeat:no-repeat">
                                        <table border="1" style="width: 100%; border-collapse: collapse; font-size: 9px;">
                                            <tr>
                                                <td><b>CODE ANONYMAT</b></td>
                                                <td><b>NOTE</b></td>
                                            </tr>
                                            ');
                            foreach($anonymat_fiche1 as $row){
                            $mpdf->WriteHTML('<tr> 
                                                <td><br><b>'
                                                    .$row['anonymat'].
                                                '</b><br></td>
                                                <td>

                                                </td>
                                            </tr>
                                            ');
                                    }
                $mpdf->WriteHTML('</table>
                                    </td>
                                    <td style="width:50%;   border:0px solid black; height:20px; background-size:80% 100%;background-repeat:no-repeat">
                                        <table border="1" style="width: 100%; border-collapse: collapse; font-size: 9px;">
                                            <tr>
                                                <td><b>CODE ANONYMAT</b></td>
                                                <td><b>NOTE</b></td>
                                            </tr>
                                            ');
                                            
                        foreach($anonymat_fiche2 as $row){
                            $mpdf->WriteHTML('<tr> 
                                                <td><br><b>'
                                                    .$row['anonymat'].
                                                '</b><br></td>
                                                <td></td>
                                            </tr>
                                            ');
                                    }

                        $mpdf->WriteHTML('</table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            ');
           // $mpdf->AddPage();

        $mpdf->Output('fiche_repport_'.$codefiche.'_'.$langue.'_'.$parcour.'.pdf','I');
    }






}
