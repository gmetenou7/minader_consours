<?php
    if (!defined('BASEPATH')) exit('No direct script access allowed');



  
    /**function pour la génération de la fiche d'inscription pdf */
function pdf($num_recepice,
$session,
$parcour,
$parcour_option,
$statut,
$nationalite,
$centre_depot,
$sexe,
$centre_examen,
$nom,
$date_naiss_fiche,
$lieu_naiss,
$diplome,
$etat,
$serie,
$centre_formation1,
$centre_formation2,
$centre_formation3,
$langue,
$telephone_cand,
$telephone_par,
$certif_act,
$certif_medic,
$aut_minader,
$certif_diplome,
$photo_4_x_4,
$recu_paie,
$att_diplome,
$att_ancien){
	$certif_act = !empty($certif_act)?'ok':''; $certif_medic = !empty($certif_medic)?'ok':'';
	$aut_minader = !empty($aut_minader)?'ok':''; $certif_diplome = !empty($certif_diplome)?'ok':'';
	$photo = !empty($photo_4_x_4)?'ok':''; $recu_paie = !empty($recu_paie)?'ok':'';
	$att_diplome = !empty($att_diplome)?'ok':''; $att_ancien = !empty($att_ancien)?'ok':'';
    /********** */ 
    //var_dump(PHP_VERSION); die;
    try{
       
        $mpdf = new \Mpdf\Mpdf();
        /**header */
        $mpdf->SetJS('this.print();');
        //$mpdf->SetHTMLHeader('');
         $image = assets_dir().'images/logo/logominader1.jpg';
		 $profil = profil_dir().$photo_4_x_4;
		 $width = 150;
		 $height = 130;
        $mpdf->WriteHTML('
        <table border="0" style="width: 100%; border-collapse: collapse; font-size: 8.5px;">
            <tr style="text-align: center;">
                <td>
                    <span>REPUBLIQUE DU CAMEROUN</span><br>
                    <span>Paix – Travail - Patrie</span>
                </td>
                <td rowspan="2"><img src="'.$image.'" style="width: 148.5355px; height: 57.8268px;"></td>
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
                <td colspan="3" style="text-align: center;">
                    <br><br><br>
                        <b style="font-size: 6px;">
                            FICHE D’INSCRIPTION AUX CONCOURS D’ENTREE DANS LES ECOLES DU DISPOSITIF DE FORMATION DU MINADER <br>
                            REGISTRATION FORM FOR ENTRY COMPETITION TO SCHOOLS OF THE MINADER TRAINING SYSTEM
                        </b>
                    <br><br><br>
                </td>
            </tr>
            <tr style="text-align: left;">
                <td>
                    <br>
                        <b> Récépissé de dépôt / Deposit receipt N.: '.$num_recepice.'</b>
                    <br><br>
                </td>
                <td>
                    <br>
                        Session de / Session: '.$session.'
                    <br><br>
                </td>
                <td rowspan="5"><img src='.$profil.' alt="" srcset="" style="width: '.$width.'px; height: '.$height.'px; margin: 0;"></div></td>
            </tr>
            <tr  style="text-align: left;">
                <td>
                    <br>
                    Cycle choisi / Selected cycle: '.$parcour.' / Option : '.$parcour_option.' <br><br>
                </td>
                <td>
                    <br>
                    Qualité du candidat / Quality of the candidate: '.$statut.'<br>
                </td>
            </tr>
            <tr  style="text-align: left;">
                <td>
                    <br>
                    Sexe: '.$sexe.'<br><br>
                </td>
                <td>
                    <br>
                    Nationalité / Nationality: '.$nationalite.'<br><br>
                </td>
            </tr>
            <tr  style="text-align: left;">
                <td>
                    <br>
                    Centre de dépôt du dossier / File deposit center: '.$centre_depot.'<br><br>
                </td>
                <td>
                    <br>
                    Centre d’examen / Exam center: '.$centre_examen.'<br><br>
                </td>
            </tr>
            <tr  style="text-align: left;">
                <td colspan="2">
                    <br>
                    Noms et Prénoms / firstnames and Lastnames: '.$nom.'<br><br>
                </td>
            </tr>
            <tr style="text-align: left;">
                <td>
                    <br>  
                    Date de naissance / Date of Birth: '.date('d-M-Y',strtotime($date_naiss_fiche)).'
                    <br>
                </td>
                <td colspan="2">
                    <br>
                    lieu de naissance / place of birth: '.$lieu_naiss.'
                    <br>
                </td>
            </tr>
            <tr style="text-align: left;">
                <td>
                    <br>
                    Diplôme requis / Diploma required: '.$diplome.'
                    <br>
                </td>
                <td>
                    <br>
                    Statut / Status: '.$etat.'
                    <br>
                </td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="3" style="font-size:6px;">
                    <br>
                    <u><b>ECOLES CHOISIES / CHOSEN SCHOOLS:</b></u>
                    <br><br><br>
                </td>
            </tr>
            <tr style="text-align: left;">
                <td>
                    <br>
                    1ier choix / 1st choice: '.$centre_formation1.'
                    <br>
                </td>
                <td>
                    <br>
                    2ième choix / 2nd choice: '.$centre_formation2.'
                    <br>
                </td>
                <td>
                    <br>
                    3ième choix / 3rd choice : '.$centre_formation3.'
                    <br>
                </td>
            </tr>
            <tr style="text-align: left;">
                <td>
                    <br>
                    Langue de composition / Language of composition: '.$langue.'
                    <br> 
                </td>
                <td>
                    <br>
                    N° de téléphone du candidat / candidate\'s phone number: '.$telephone_cand.'
                    <br>
                </td>
                <td>
                    <br>
                    N° de téléphone du parent / parent\'s phone number : '.$telephone_par.'
                    <br>
                </td>
            </tr>
            <tr style="text-align: center;">
                <td colspan="3" style="font-size:6px;">
                    <br>
                        <b><u>LISTE DES PIECES JOINTES \ LIST OF ATTACHED PARTS</u></b>
                    <br><br><br>
                </td>
            </tr>
            <tr style="text-align: left;">
                <td>
                    <br>
                    Copie certifiée conforme de l\'acte de naissance datant de moins de 3 mois / Certified copy of birth certificate dated less than 3 months<h6><b>'.$certif_act.'</h6></b>
                    <br>
                </td>
                <td>
                    <br>
                    Certificat médicale / Medical certificate<h6><b>'.$certif_medic.'</h6></b>
                    <br>
                </td>
                <td>
                    <br>
                    Autorisation de concourir signée du MINADER / Authorization to compete signed by MINADER (candidat interne / internal candidate) <h6><b>'.$aut_minader.'</h6></b>
                    <br>
                </td>
            </tr>
            <tr style="text-align: left;">
                <td>
                    <br>
                    Copie certifiée conforme du diplôme datant de moins de 3 mois / Certified copy of the diploma less than 3 months old<h6><b>'.$certif_diplome.'</h6></b>
                    <br>
                </td>
                <td>
                    <br>
                    Quatre photos 4 x 4 / Four 4x4 photos<h6><b>'.$photo.'</h6></b>
                    <br>
                </td>
                <td>
                    <br>
                    Un réçu de versement des droids d\'inscription au concours / A receipt for the payment of the droids for entering the contest<h6><b>'.$recu_paie.'</h6></b>
                    <br>
                </td>
            </tr>
            <tr style="text-align: left;">
                <td>
                    <br>
                    Une attestation de présentation de l\'original du diplôme / A certificate of presentation of the original of the diploma <h6><b>'.$att_diplome.'</h6></b>
                    <br>
                </td>
                <td>
                    <br>
                    Une Attestation d\'anciénneté de 05 ans comportant l\'avis favorable du supérieur hiérachique / A certificate of seniority of 05 years including the favorable opinion of the hierarchical superior(candidat interne/internal candidate) <h6><b>'.$att_ancien.'</h6></b>
                    <br>
                </td>
                <td>
                    <br>
                    ...
                    <br>
                </td>
            </tr>
            <tr style="text-align: center;">
                <td><br><b><u>SIGNATURE DU CANDIDAT / OF CANDIDATE</u></b><br><br><br><br></td>
                <td><br><i>date de dépôt du dossier / filing date of the file</i><br><br><br><br></td>
                <td><br><b><u>SIGNATURE DE L’AGENT / OF AGENT</u><br><br><br><br></b></td>
            </tr>
            <tr>
                <td colspan="3">
                    <br><br>
                    ------------------------------------------------------------------------------------------------
                    ------------------------------------------------------------------------------------------------
                    -------------------------------------------------
                    <br><br><br>
                </td>
            </tr>
            <tr style="text-align: center;">
                <td>
                    <span>MINISTERE DE L\'AGRICULTURE</span><br>
                    <span>ET DU DEVELOPPEMENT RURAL</span>
                </td>
                <td><img src="'.$image.'" style="width: 148.5355px; height: 57.8268px"></td>
                <td>
                    <span>MINISTRY OF AGRICULTURE</span><br>
                    <span>AND RURAL DEVELOPMENT</span>
                </td>
            </tr>
            <tr>
                <td colspan="3" style="text-align: center;">
                    <br><br>
                        <b style="font-size: 6px;">
                            INSCRIPTION AUX CONCOURS D’ENTREE DANS LES ECOLES DU DISPOSITIF DE FORMATION DU MINADER <br>
                            REGISTRATION FOR THE ENTRY COMPETITION TO SCHOOLS OF THE MINADER TRAINING SYSTEM
                        </b>
                    <br><br>
                </td>   
            </tr>
            <tr style="text-align: left;">
                <td>
                    <br>
                    <b>Récépissé de dépôt / Deposit receipt N. '.$num_recepice.'</b> <br>
                </td>
                <td>
                    <br>
                    Session de / Session of. '.$session.'<br>
                </td>
                <td rowspan="5"><img src='.$profil.' alt="" srcset="" style="width: '.$width.'px; height: '.$height.'px; margin: 0;"></td>
            </tr>
            <tr  style="text-align: left;">
                <td>
                    <br>
                    Cycle choisi / Selected cycle: '.$parcour.' / Option : '.$parcour_option.'<br>
                </td>
                <td>
                    <br>
                    Qualité du candidat / Quality of the candidate '.$statut.' <br>
                </td>
            </tr>
            <tr  style="text-align: left;">
                <td>
                    <br>
                    Sexe: '.$sexe.'<br>
                </td>
                <td>
                    <br>
                    Nationalité / Nationality: '.$nationalite.'<br>
                </td>
            </tr>
            <tr  style="text-align: left;">
                <td>
                    <br>
                    Centre de dépôt du dossier / File deposit center:  '.$centre_depot.'<br>
                </td>
                <td>
                    <br>
                    Centre d’examen / Exam center: '.$centre_examen.'<br>
                </td>
            </tr>
            <tr  style="text-align: left;">
                <td colspan="2">
                    <br>
                    Noms et Prénoms / Lastnames and firstnames: '.$nom.'<br>
                </td>
            </tr>
            <tr style="text-align: left;">
                <td><br>Date de naissance / Date of Birth: '.date('d-M-Y',strtotime($date_naiss_fiche)).'</td><br>
                <td colspan="2"><br>lieu de naissance / place of birth: '.$lieu_naiss.'</td><br>
            </tr>
            <tr style="text-align: left;">
                <td>
                    1ier choix / 1st choice: '.$centre_formation1.'
                </td><br>
                <td>
                    2ième choix / 2nd choice: '.$centre_formation2.'
                </td><br>
                <td>
                    3ième choix / 3rd choice : '.$centre_formation3.'
                </td><br>
            </tr>
            <tr style="text-align: center;">
                <td><b><u>SIGNATURE DU CANDIDAT / OF CANDIDATE</u></b><br><br><br><br></td>
                <td><i>date de dépôt du dossier / filing date of the file</i><br><br><br><br></td>
                <td><b><u>SIGNATURE DE L’AGENT / OF AGENT</u><br><br><br><br></b></td>
            </tr>
        </table>
        ');
        //$mpdf->SetJS('this.print();');
        $mpdf->Output('fiche_candidat_'.$nom.'.pdf','I');
    /*************** */
    } catch (\Mpdf\MpdfException $e) { // Note: safer fully qualified exception name used for catch
        // Process the exception, log, print etc.
        echo $e->getMessage();
    }
}
