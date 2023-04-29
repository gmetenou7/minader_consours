<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>

        <!-- debut reloader -->
        <?php //$this->load->view('reload_page/progress');?>
        <!--<div class="loader_bg">
            <div class="loader"></div>
        </div>
         fin reloader -->
         
    </header>
<?php if(!empty($candidat)):?>
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Candidat: <?=$candidat['nom_complet']?></h3>
                    <p class="text-subtitle text-muted">information du candidat: <?=$candidat['nom_complet']?></p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?=base_url('home');?>">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('candidats');?>">Candidats</a></li>
                            <li class="breadcrumb-item active" aria-current="page">...</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        
        <div class="divider">
			<?php
				$pieces = explode("/",$candidat['attest_diplome']);
				$path = $pieces[0].'/'.$pieces[1].'/file.pdf';
			?>
			<div class="divider-text"><a href="<?=base_url().$path;?>" target="_blank" class="btn btn-outline-primary">DOCUMENTS</a></div>
            <div class="divider-text"><a href="<?=base_url('print_fiche/'.$candidat['num_recepice']);?>" class="btn btn-outline-primary">Imprimer</a></div>
			<?php
				$class2 = ($candidat['etat']==1)?"<i class='bi bi-x-circle'></i> Annuler la validation":"<i class='bi bi-check2-all'></i> Valider";
			?>
			<div class="divider-text"><button type="button" name="remove" class="btn  btn-outline-primary remove_inventory" id="<?= $candidat['num_recepice']; ?>"><?= $class2; ?></button></div>
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


<script>
	$(document).ready(function () {

		/**suppression d'un candidat  debut*/
		$(document).on('click', '.remove_inventory', function(){
		var row_id = $(this).attr("id");
		Swal.fire({
			title: 'Êtes vous sur de vouloirs faire cette action sans voir les détails?',
			showDenyButton: true,
			showCancelButton: false,
			confirmButtonText: `OUI`,
			denyButtonText: `NON`,
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url:"<?php echo base_url('remove_candidat'); ?>",
					method:"POST",
					data:{row_id:row_id},
					success:function(data)
					{
						setInterval('location.reload()', 1000);
						Swal.fire({
							position: 'top-end',
							icon: 'info',
							title: data,
							showConfirmButton: false,
							timer: 1500
						})
						sendRequest();
					}
				});
			} else if (result.isDenied) {
				Swal.fire('Action annulée', '', 'info')
			}
		})

	});
		/**suppression d'un candidat  fin*/


	});
</script>
