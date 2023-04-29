<?php if(!empty($candidat)):?>

            <div class="kt-section__content kt-section__content--border">
                <ul class="nav justify-content-center">
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=base_url('print/'.$candidat['num_recepice']);?>" target="_blank">Voir ma fiche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="<?=base_url('print/'.$candidat['num_recepice']);?>" download>Télécharger ma fiche</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="<?=base_url('editu/'.$candidat['num_recepice']);?>">Modifier</a>
                    </li>
                </ul>
            </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <table border="0" style="width: 100%; border-collapse: collapse; font-size: 15px;">
                        <tr style="text-align: center;">
                            <td>
                                <span>REPUBLIQUE DU CAMEROUN</span><br>
                                <span>Paix – Travail - Patrie</span>
                            </td>
                            <td rowspan="2"><img src="<?= assets_dir();?>images/logo/logominader.png" style="width: 148.5355px; height: 57.8268px"></td>
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
                                    <b style="font-size: 12px;">FICHE D’INSCRIPTION AUX CONCOURS D’ENTREE DANS LES ECOLES DU DISPOSITIF DE FORMATION DU MINADER</b>
                                <br><br><br>
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                <br>
                                    Récépissé de dépôt N: <?=$candidat['num_recepice']?>
                                <br><br>
                            </td>
                            <td>
                                <br>
                                Session de: <?=$candidat['session']?>
                                <br><br>
                            </td>
                            <td rowspan="5">
								<img src="<?= base_url($candidat['photo_candidat']) ?>" style="width: 220px; height: 280px;" >
							</td>
                        </tr>
                        <tr  style="text-align: left;">
                            <td>
                                <br>
                                Cycle choisi : <?=$candidat['parcour']?> / Option : <?=$candidat['parcour_option']?> <br><br>
                            </td>
                            <td>
                                <br>
                                Qualité du candidat: <?=$candidat['statut_candidat']?><br>
                            </td>
                        </tr>
                        <tr  style="text-align: left;">
                            <td>
                                <br>
                                Sexe: <?=$candidat['sexe']?><br><br>
                            </td>
                            <td>
                                <br>
                                Nationalité: <?=$candidat['nationalite_candidat']?><br><br>
                            </td>
                        </tr>
                        <tr  style="text-align: left;">
                            <td>
                                <br>
                                Centre de dépôt du dossier : <?=$candidat['centre_depot_dossier']?><br><br>
                            </td>
                            <td>
                                <br>
                                Centre d’examen : <?=$candidat['centre_examen']?><br><br>
                            </td>
                        </tr>
                        <tr  style="text-align: left;">
                            <td colspan="2">
                                <br>
                                Noms et Prénoms:  <?=$candidat['nom_complet']?><br><br>
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                <br>  
                                    Date de naissance : <?= date('d-M-Y',strtotime($candidat['date_naissance']))?>
                                <br>
                            </td>
                            <td colspan="2">
                                <br>
                                lieu de naissance : <?=$candidat['lieu_naissance']?>
                                <br>
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                <br>
                                Diplôme requis : <?=$candidat['diplome_entrer']?>
                                <br>
                            </td>
                            <td>
                                <br>
                                statut: <?=$candidat['etat_diplome']?>
                                <br>
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="3" style="font-size:12px;">
                                <br>
                                <u><b>ECOLES CHOISIES :</b></u>
                                <br><br><br>
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                <br>
                                    1er choix : <?=$candidat['ecole_choisi_1']?>
                                <br>
                            </td>
                            <td>
                                <br>
                                2ème choix : <?=$candidat['ecole_choisi_2']?>
                                <br>
                            </td>
                            <td>
                                <br>
                                3ème choix : <?=$candidat['ecole_choisi_3']?>
                                <br>
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                <br>
                                Langue de composition: <?=$candidat['langue_candidat']?>
                                <br> 
                            </td>
                            <td>
                                <br>
                                N° de téléphone du candidat : <?=$candidat['telephone_candidat']?>
                                <br>
                            </td>
                            <td>
                                <br>
                                N° de téléphone du parent : <?=$candidat['telephone_parent']?>
                                <br>
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="3" style="font-size:12px;">
                                <br>
                                    <b><u>LISTE DES PIECES JOINTES</u></b>
                                <br><br><br>
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                <br>
                                    <?php if(!empty($candidat['certif_acte_naiss'])):?>
                                        <?= 'Copie certifiée conforme de l\'acte de naissance datant de moins de 3 mois <h6><b>ok</h6></b>'?>
                                    <?php endif?>
                                <br>
                            </td>
                            <td>
                                <br>
                                    <?php if(!empty($candidat['certif_medical'])):?>
                                        <?= 'Certificat médicale <h6><b>ok</h6></b>'?>
                                    <?php endif?>
                                <br>
                            </td>
                            <td>
                                <br>
                                    <?php if(!empty($candidat['autori_minader'])):?>
                                        <?= 'Autorisation de concourir signée du MINADER (candidat interne) <h6><b>ok</h6></b>'?>
                                    <?php endif?>
                                <br>
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                <br>
                                    <?php if(!empty($candidat['certif_diplome'])):?>
                                        <?= ' Copie certifiée conforme du diplôme datant de moins de 3 mois <h6><b>ok</h6></b>'?>
                                    <?php endif?>
                                <br>
                            </td>
                            <td>
                                <br>
                                    <?php if(!empty($candidat['photo_candidat'])):?>
                                        <?= 'Quatre photos 4 x 4 <h6><b>ok</h6></b>'?>
                                    <?php endif?>
                                <br>
                            </td>
                            <td>
                                <br>
                                    <?php if(!empty($candidat['recu_paie'])):?>
                                        <?= 'Un réçu de versement des droids d\'inscription au concours <h6><b>ok</h6></b>'?>
                                    <?php endif?>
                                <br>
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                <br>
                                    <?php if(!empty($candidat['attest_diplome'])):?>
                                        <?= 'Une attestation de présentation de l\'original du diplôme <h6><b>ok</h6></b>'?>
                                    <?php endif?>
                                <br>
                            </td>
                            <td>
                                <br>
                                    <?php if(!empty($candidat['attest_ancien'])):?>
                                        <?= 'Une Attestation d\'anciénneté de 05 ans comportant l\'avis favorable du supérieur hiérachique (candidat interne) <h6><b>ok</h6></b>'?>
                                    <?php endif?>
                                <br>
                            </td>
                            <td>
                                <br>
                                ...
                                <br>
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td><br><b><u>SIGNATURE DU CANDIDAT </u></b><br><br><br><br></td>
                            <td><br><i>date de dépôt du dossier</i><br><br><br><br></td>
                            <td><br><b><u>SIGNATURE DE L’AGENT</u><br><br><br><br></b></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <br><br>
                                ------------------------------------------------------------------------------------------------
                                ------------------------------------------------------------------------------------------------
                                -------------------------------------------------
                                <br><br><br><br>
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td>
                                <span>MINISTERE DE L\'AGRICULTURE</span><br>
                                <span>ET DU DEVELOPPEMENT RURAL</span>
                            </td>
                            <td><img src="<?= assets_dir();?>images/logo/logominader.png" style="width: 148.5355px; height: 57.8268px"></td>
                            <td>
                                <span>MINISTRY OF AGRICULTURE</span><br>
                                <span>AND RURAL DEVELOPMENT</span>
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td colspan="3">
                                <br><br><br>
                                    <b style="font-size: 12px;">
                                        INSCRIPTION AUX CONCOURS D’ENTREE DANS LES ECOLES DU DISPOSITIF DE FORMATION DU MINADER 
                                    </b>
                                <br><br><br>
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                <br>
                                Récépissé de dépôt N. <?=$candidat['num_recepice']?><br><br>
                            </td>
                            <td>
                                <br>
                                Session de. <?=$candidat['session']?><br><br>
                            </td>
							<td rowspan="5">
								<img src="<?= base_url($candidat['photo_candidat']) ?>" style="width: 220px; height: 280px;" >
							</td>
                            
                        </tr>
                        <tr  style="text-align: left;">
                            <td>
                                <br>
                                Cycle choisi : <?=$candidat['parcour']?> / Option : <?=$candidat['parcour_option']?> <br><br>
                            </td>
                            <td>
                                <br>
                                Qualité du candidat: <?=$candidat['statut_candidat']?><br><br>
                            </td>
                        </tr>
                        <tr  style="text-align: left;">
                            <td>
                                <br>
                                Sexe: <?=$candidat['sexe']?><br><br>
                            </td>
                            <td>
                                <br>
                                Nationalité: <?=$candidat['nationalite_candidat']?><br><br>
                            </td>
                        </tr>
                        <tr  style="text-align: left;">
                            <td>
                                <br>
                                Centre de dépôt du dossier : <?=$candidat['centre_depot_dossier']?><br><br>
                            </td>
                            <td>
                                <br>
                                Centre d’examen : <?=$candidat['centre_examen']?><br><br>
                            </td>
                        </tr>
                        <tr  style="text-align: left;">
                            <td colspan="2">
                                <br>
                                Noms et Prénoms:  <?=$candidat['nom_complet']?><br><br>
                            </td>
                        </tr>
                        <tr style="text-align: left;">
                            <td><br>Date de naissance :  <?= date('d-M-Y',strtotime($candidat['date_naissance']))?></td><br><br>
                            <td colspan="2"><br>lieu de naissance :  <?=$candidat['lieu_naissance']?></td><br><br>
                        </tr>
                        <tr style="text-align: left;">
                            <td>
                                <br>
                                    1er choix : <?=$candidat['ecole_choisi_1']?>
                                <br><br>
                            </td>
                            <td>
                                <br>
                                2ème choix : <?=$candidat['ecole_choisi_2']?>
                                <br><br>
                            </td>
                            <td>
                                <br>
                                3ème choix : <?=$candidat['ecole_choisi_3']?>
                                <br><br>
                            </td>
                        </tr>
                        <tr style="text-align: center;">
                            <td><b><u>SIGNATURE DU CANDIDAT </u></b><br><br><br><br></td>
                            <td><i>date de dépôt du dossier</i><br><br><br><br></td>
                            <td><b><u>SIGNATURE DE L’AGENT</u><br><br><br><br></b></td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </div>
<?php else:?>
    <h4 class="text-danger text-center">ce candidat n'existe pas</h4>
<?php endif?>
</div>
