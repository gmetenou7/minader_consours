
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

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Modifier Candidat</h3>
                            <p class="text-subtitle text-muted">change les informations du formulaire pour modifier le candidat</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?=base_url('home');?>">Accueil</a></li>
                                    <li class="breadcrumb-item"><a href="<?=base_url('candidats');?>">Candidats</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">...</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            <?php if(!empty($candidat)):?>
                <!--modifier un candidat debut-->
                <div class="wrapper">
                    <?php $this->load->view('parts/message');?>

                    <form method="POST" action="<?php echo base_url('uinscription'); ?>" id="updateformnewinscription">
        <input type="hidden" value="<?php echo $candidat['num_recepice']; ?>" name="num_recepice" id="num_recepice">
		<input type="hidden" value="update" name="update" id="update">
		<div class="card">
            <div class="card-body">
                <h5 class="card-title">Informations personnelles</h5>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nom Complet / Full Name:</label>
                            <input type="text" class="form-control border-primary" id="nom" name="nom" value="<?php echo $candidat['nom_complet']; ?>" placeholder="Nom Complet / Full Name:...">
                            <span class="text-danger" id="nom_error"></span>
							<?php echo form_error('nom', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Lieu de Naissance / Place of birth:</label>
                            <input type="text" class="form-control border-primary" value="<?php echo $candidat['lieu_naissance']; ?>" id="lnaissance" name="lnaissance" placeholder="Lieu de Naissance / Place of birth:...">
                            <span class="text-danger" id="lnaissance_error"></span>
							<?php echo form_error('lnaissance', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Date de naissance / Date of Birth:</label>
                    <div class="row">
                        <div class="col-md-4">
                            <label class="form-label">Jour / Day:</label>
                            <select name="jour" id="jour" class="form-select border-primary">
                                <?php if(!empty($jour_naissance)): ?>
                                    <?php foreach ($jour_naissance as $key => $value): ?>
										<?php if(date('d',strtotime($candidat['date_naissance'])) == $value){ ?>
											<option value="<?php echo date('d',strtotime($candidat['date_naissance']))?>" Selected><?php echo date('d',strtotime($candidat['date_naissance']))?></option>
										<?php }else{ ?>
                                        	<option value="<?php echo $value ?>"><?php echo $value ?></option>
										<?php } ?>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
							<span class="text-danger" id="jour_error"></span>
                            <?php echo form_error('jour', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Mois / Month:</label>
                            <select name="mois" id="mois" class="form-select border-primary">
                                <?php if(!empty($mois_naissance)): ?>
                                    <?php foreach ($mois_naissance as $key => $value): ?>
										<?php if(date('m',strtotime($candidat['date_naissance'])) == $key){ ?>
											<option value="<?php echo date('m',strtotime($candidat['date_naissance']))?>" Selected><?php echo $value ?></option>
										<?php }else{ ?>
                                        	<option value="<?php echo $key ?>"><?php echo $value  ?></option>
										<?php } ?>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
							<span class="text-danger" id="mois_error"></span>
                            <?php echo form_error('mois', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Année / Year:</label>
                            <select name="annee" id="annee" class="form-select border-primary">
                                <?php if(!empty($annee_naissance)): ?>
                                    <?php foreach ($annee_naissance as $key => $value): ?>
										<?php if(date('Y',strtotime($candidat['date_naissance'])) == $value){ ?>
											<option value="<?php echo date('Y',strtotime($candidat['date_naissance']))?>" Selected><?php echo $value?></option>
										<?php }else{ ?>
                                        	<option value="<?php echo $value ?>"><?php echo $value ?></option>
										<?php } ?>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
							<span class="text-danger" id="annee_error"></span>
                            <?php echo form_error('annee', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Téléphone du candidat / Applicant's phone number:</label>
                            <input type="tel" class="form-control border-primary" value="<?php echo $candidat['telephone_candidat']; ?>" id="telc" name="telc" placeholder="Téléphone du candidat / Applicant's phone number:...">
                            <span class="text-danger" id="telc_error"></span>
							<?php echo form_error('telc', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Téléphone du parent / Parent's phone number:</label>
                            <input type="tel" class="form-control border-primary" value="<?php echo $candidat['telephone_parent']; ?>" id="telp" name="telp" placeholder="Téléphone du parent / Parent's phone number:...">
                            <span class="text-danger" id="telp_error"></span>
							<?php echo form_error('telp', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nationalité / Nationality:</label>
                            <select name="nationalite" id="nationalite" class="form-select border-primary">
                                <?php if(!empty($pays)): ?>
                                    <?php foreach ($pays as $key => $value): ?>
										<?php if($candidat['nationalite_candidat'] == $value){ ?>
											<option value="<?php echo $candidat['nationalite_candidat']; ?>" Selected><?php echo $key.' / '.$value ?></option>
										<?php }else{ ?>
                                        	<option value="<?php echo $value ?>"><?php echo $key.' / '.$value ?></option>
										<?php } ?>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
							<span class="text-danger" id="nationalite_error"></span>
                            <?php echo form_error('nationalite', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Sexe / Sexe:</label>
                            <select name="sexe" id="sexe" class="form-select border-primary">
                                <?php if(!empty($sexe)): ?>
                                    <?php foreach ($sexe as $key => $value): ?>
										<?php if($candidat['sexe'] == $value){ ?>
											<option value="<?php echo $candidat['sexe']; ?>" Selected><?php echo $key.' / '.$value ?></option>
										<?php }else{ ?>
                                        	<option value="<?php echo $value ?>"><?php echo $key.' / '.$value ?></option>
										<?php } ?>
                                    <?php endforeach ?>
                                <?php endif ?>
                            </select>
							<span class="text-danger" id="sexe_error"></span>
                            <?php echo form_error('sexe', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informations liées au concours</h5>

                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Cycle choisi/Cycle chosen:</label>
                        <select name="parcours" id="parcours" class="form-select border-primary">
                            <?php if(!empty($parcours)): ?>
                                <?php foreach ($parcours as $key => $value): ?>
									<?php if($candidat['parcour'] == $value['nom_parcour']){ ?>
										<option value="<?php echo $candidat['parcour']; ?>" Selected><?php echo $candidat['parcour']; ?></option>
									<?php }else{ ?>
										<option value="<?php echo $value['nom_parcour'] ?>"><?php echo $value['nom_parcour'] ?></option>
									<?php } ?>
                                <?php endforeach ?>
                            <?php endif ?>     
                        </select>
						<span class="text-danger" id="parcours_error"></span>
                        <?php echo form_error('parcours', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Option/Option:</label>
                        <select name="option" id="option" class="form-select border-primary">
                            <option value="<?php echo $candidat['parcour_option']; ?>" selected><?php echo $candidat['parcour_option']; ?></option>
                        </select>
						<span class="text-danger" id="option_error"></span>
                        <?php echo form_error('option', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Qualité du candidat/Nature of candidate:</label>
                        <select name="qualite" id="qualite" class="form-select border-primary">
                            
                            <?php if(!empty($qualite)): ?>
                                <?php foreach ($qualite as $key => $value): ?>
									<?php if($candidat['statut_candidat'] == $value){ ?>
										<option value="<?php echo $candidat['statut_candidat']; ?>" selected><?php echo $key.' / '.$value ?></option>
									<?php }else{ ?>
										<option value="<?php echo $value; ?>"><?php echo $key.' / '.$value ?></option>
									<?php } ?>
                                <?php endforeach ?>
                            <?php endif ?>  
                        </select>
						<span class="text-danger" id="qualite_error"></span>
                        <?php echo form_error('qualite', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Centre de dépot des dossiers / File deposit center:</label>
                        <select name="depot" id="depot" class="form-select border-primary">
                            
                            <?php if(!empty($centre_depot)): ?>
                                <?php foreach ($centre_depot as $key => $value): ?>

									<?php if($candidat['centre_depot_dossier'] == $value['nom_centre_depot']){ ?>
										<option value="<?php echo $candidat['centre_depot_dossier']; ?>" selected><?php echo $candidat['centre_depot_dossier']; ?></option>
									<?php }else{ ?>
										<option value="<?php echo $value['nom_centre_depot']; ?>"><?php echo $value['nom_centre_depot'] ?></option>
									<?php } ?>

                                <?php endforeach ?>
                            <?php endif ?> 
                        </select>
						<span class="text-danger" id="depot_error"></span>
                        <?php echo form_error('depot', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Centre d'examen / Exam center:</label>
                        <select name="c_examen" id="c_examen" class="form-select border-primary">
                            
                            <?php if(!empty($centre_examen)): ?>
                                <?php foreach ($centre_examen as $key => $value): ?>

									<?php if($candidat['centre_examen'] == $value['nom_centre_examen']){ ?>
										<option value="<?php echo $candidat['centre_examen']; ?>" selected><?php echo $candidat['centre_examen']; ?></option>
									<?php }else{ ?>
										<option value="<?php echo $value['nom_centre_examen']; ?>"><?php echo $value['nom_centre_examen'] ?></option>
									<?php } ?>

                                <?php endforeach ?>
                            <?php endif ?> 
                        </select>
						<span class="text-danger" id="c_examen_error"></span>
                        <?php echo form_error('c_examen', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Langue de Composition / Language of Composition</label>
                        <select name="langue" id="langue" class="form-select border-primary">
                            
                            <?php if(!empty($langue)): ?>
                                <?php foreach ($langue as $key => $value): ?>

									<?php if($candidat['langue_candidat'] == $value){ ?>	
										<option value="<?php echo $candidat['langue_candidat']; ?>" selected><?php echo $key.' / '.$value; ?></option>
									<?php }else{ ?>
										<option value="<?php echo $value; ?>"><?php echo $key.' / '.$value; ?></option>
									<?php } ?>
                                    
                                <?php endforeach ?>
                            <?php endif ?> 
                        </select>
						<span class="text-danger" id="langue_error"></span>
                        <?php echo form_error('langue', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-4">
                        <label class="form-label">Ecole choisi / Selected school 1:</label>
                        <select name="choix1" id="choix1" class="form-select border-primary">
                            <option value="<?php echo $candidat['ecole_choisi_1']; ?>" selected><?php echo $candidat['ecole_choisi_1']; ?></option>
                        </select>
						<span class="text-danger" id="choix1_error"></span>
                        <?php echo form_error('choix1', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ecole choisi / Selected school 2:</label>
                        <select name="choix2" id="choix2" class="form-select border-primary">
                            <option value="<?php echo $candidat['ecole_choisi_2']; ?>" selected><?php echo $candidat['ecole_choisi_2']; ?></option>
                        </select>
						<span class="text-danger" id="choix2_error"></span>
                        <?php echo form_error('choix2', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">Ecole choisi / Selected school 3:</label>
                        <select name="choix3" id="choix3" class="form-select border-primary">
                            <option value="<?php echo $candidat['ecole_choisi_3']; ?>" selected><?php echo $candidat['ecole_choisi_3']; ?></option>
                        </select>
						<span class="text-danger" id="choix3_error"></span>
                        <?php echo form_error('choix3', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Informations sur le parcour scolaire</h5>
                <div class="row">
                    <div class="col-md-6">
                        <label class="form-label">Diplome requis / Diploma required:</label>
                        <select name="diplome" id="diplome" class="form-select border-primary">
                            <option value="<?php echo $candidat['diplome_entrer']; ?>" selected><?php echo $candidat['diplome_entrer']; ?></option>
                        </select>
						<span class="text-danger" id="diplome_error"></span>
                        <?php echo form_error('diplome', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Etat / State:</label>
                        <select name="etat_dip" id="etat_dip" class="form-select border-primary">
                            
                            <?php if(!empty($etat)): ?>
                                <?php foreach ($etat as $key => $value): ?>

									<?php if($candidat['etat_diplome'] == $value){ ?>	
										<option value="<?php echo $candidat['etat_diplome']; ?>" selected><?php echo $key.' / '.$value; ?></option>
									<?php }else{ ?>
										<option value="<?php echo $value; ?>"><?php echo $key.' / '.$value; ?></option>
									<?php } ?>

                                <?php endforeach ?>
                            <?php endif ?> 
                        </select>
						<span class="text-danger" id="etat_dip_error"></span>
                        <?php echo form_error('etat_dip', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Documents (importer les documents)</h5>
                <ul class="list-group">

                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Copie certifiée conforme de l'acte de naissance datant de moins de 3 mois / Certified copy of birth certificate less than 3 months old <b>(.pdf)</b>
                        <span class="badge">
                            <?php echo form_error('certif_acte', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
							<div class="mb-3">
								<a href="<?php echo base_url($candidat['certif_acte_naiss']); ?>">voir / view</a>
							  <input class="form-control" type="file" name="certif_acte" id="certif_acte" value="<?php echo set_value('certif_acte', '0'); ?>"> 
							  <span class="text-danger" id="msg_certif_acte"></span>
							  <span class="text-danger" id="certif_acte_error"></span>
							</div>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Copie certifiée conforme du diplôme datant de moins de 3 mois / Certified copy of diploma less than 3 months old <b>(.pdf)</b>
                        <span class="badge">
                            <?php echo form_error('certif_dip', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
							<div class="mb-3">
								<a href="<?php echo base_url($candidat['certif_diplome']); ?>">voir / view</a>
							  <input class="form-control" value="<?php echo set_value('certif_dip'); ?>" type="file" name="certif_dip" id="certif_dip"> 
							  <span class="text-danger" id="msg_certif_dip"></span>
							  <span class="text-danger" id="certif_dip_error"></span>
							</div>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                            Une attestation de présentation de l'original du diplôme / A certificate of presentation of the original diploma <b>(.pdf)</b>
                        <span class="badge">
                            <?php echo form_error('attest_dip', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
							<div class="mb-3">
								<a href="<?php echo base_url($candidat['attest_diplome']); ?>">voir / view</a>
							  <input class="form-control" value="<?php echo set_value('attest_dip'); ?>" type="file" id="attest_dip" name="attest_dip"> 
							  <span class="text-danger" id="msg_attest_dip"></span>
							  <span class="text-danger" id="attest_dip_error"></span>
							</div>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Certificat médicale / Medical certificate <b>(.pdf)</b>
                        <span class="badge">
                            <?php echo form_error('certif_medic', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
							<div class="mb-3">
								<a href="<?php echo base_url($candidat['certif_medical']); ?>">voir / view</a>
							  <input class="form-control" value="<?php echo set_value('certif_medic'); ?>" type="file" id="certif_medic" name="certif_medic"> 
							  <span class="text-danger" id="msg_certif_medic"></span>
							  <span class="text-danger" id="certif_medic_error"></span>
							</div>
                        </span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        une photos 4 x 4 / one 4 x 4 photos <b>(.jpg / .png / .jpeg)</b>
                        <span class="badge">
                            <?php echo form_error('photo', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
							<div class="mb-3">
								<a href="<?php echo base_url($candidat['photo_candidat']); ?>">voir / view</a>
							  <input class="form-control" value="<?php echo set_value('photo'); ?>" type="file" id="photo" name="photo"> 
							  <span class="text-danger" id="msg_photo"></span>
							  <span class="text-danger" id="photo_error"></span>
							</div>
                        </span>
                    </li>
					<?php if($candidat['statut_candidat'] !== "EXTERNE"){ ?>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Une Attestation d'anciénneté comportant l'avis favorable du supérieur hiérachique / A certificate of seniority including the favorable opinion of the hierarchical superior (candidat interne / internal candidate)
							<b>(.pdf)</b>
							<span class="badge">
								<?php echo form_error('attest_anc', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
								<div class="mb-3">
									<a href="<?php echo base_url($candidat['attest_ancien']); ?>">voir / view</a>
									<input class="form-control" type="file" value="<?php echo set_value('attest_anc'); ?>" id="attest_anc" name="attest_anc"> 
									<span class="text-danger" id="msg_attest_anc"></span>
									<span class="text-danger" id="attest_anc_error"></span>
								</div>
							</span>
						</li>
					<?php } ?>
					<?php if($candidat['statut_candidat'] !== "EXTERNE"){ ?>
						<li class="list-group-item d-flex justify-content-between align-items-center">
							Autorisation de concourir signée du MINADER / Authorization to compete signed by MINADER (candidat interne / internal candidate) <b>(.pdf)</b>
							<span class="badge">
								<?php echo form_error('auto_con', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
								<div class="mb-3">
									<a href="<?php echo base_url($candidat['autori_minader']); ?>">voir / view</a>
									<input class="form-control" type="file" value="<?php echo set_value('auto_con'); ?>" id="auto_con" name="auto_con"> 
									<span class="text-danger" id="msg_auto_con"></span>
									<span class="text-danger" id="auto_con_error"></span>
								</div>
							</span>
						</li>
					<?php } ?>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Un réçu de versement des droids d'inscription au concours / Receipt of payment of the registration fee for the competition <b>(.pdf)</b>
                        <span class="badge">
                            <?php echo form_error('recu', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
							<div class="mb-3">
								<a href="<?php echo base_url($candidat['recu_paie']); ?>">voir / view</a>
								<input class="form-control" type="file" value="<?php echo set_value('recu'); ?>" id="recu" name="recu"> 
								<span class="text-danger" id="msg_recu"></span>
								<span class="text-danger" id="recu_error"></span>
							</div>
                        </span>
                    </li>
                </ul>

            </div>
        </div>
        <br>
        <div class="card">
            <div class="card-body">
                <h5 class="bg-primary align-middle"><span id="message" class="text-warning pull-left"></span></h5>
                <button class="btn btn-primary pull-right" id="btn_ncandidat" name="btn_ncandidat" type="submit">Modifier</button>
			</div>
        </div>
    </form>
                </div>
                <!--modifier un candidat fin-->
            <?php else:?>
                <h4 class="text-danger text-center">ce candidat n'existe pas</h4>
            <?php endif?>

            <?php $this->load->view('parts/footer');?><!--footer-->
        </div>
    </div>

<!--script pour modifier un utilisateur-->

<script>
    $(document).ready(function () {


		/**update inscription */
		$('#updateformnewinscription').on('submit', function(event){
			event.preventDefault();
            $.ajax({
                method: $(this).attr('method'),
                url:  $(this).attr('action'),
                data: new FormData(this), 
                dataType: "json",
                contentType: false,  
                cache: false,  
                processData:false, 
				
                beforeSend:function(){
                    $('#btn_ncandidat').attr('disabled', 'disabled');
                },
				
                success: function (data) {
					if(data.error){
						if(data.nom_error != ''){
							$('#nom_error').html(data.nom_error);
						}else{
							$('#nom_error').html('');
						}

						if(data.lnaissance_error != ''){
							$('#lnaissance_error').html(data.lnaissance_error);
						}else{
							$('#lnaissance_error').html('');
						}

						if(data.jour_error != ''){
							$('#jour_error').html(data.jour_error);
						}else{
							$('#jour_error').html('');
						}

						if(data.mois_error != ''){
							$('#mois_error').html(data.mois_error);
						}else{
							$('#mois_error').html('');
						}

						if(data.annee_error != ''){
							$('#annee_error').html(data.annee_error);
						}else{
							$('#annee_error').html('');
						}
						
						if(data.telc_error != ''){
							$('#telc_error').html(data.telc_error);
						}else{
							$('#telc_error').html('');
						}
						if(data.telp_error != ''){
							$('#telp_error').html(data.telp_error);
						}else{
							$('#telp_error').html('');
						}

						if(data.nationalite_error != ''){
							$('#nationalite_error').html(data.nationalite_error);
						}else{
							$('#nationalite_error').html('');
						}

						if(data.sexe_error != ''){
							$('#sexe_error').html(data.sexe_error);
						}else{
							$('#sexe_error').html('');
						}

						if(data.parcours_error != ''){
							$('#parcours_error').html(data.parcours_error);
						}else{
							$('#parcours_error').html('');
						}

						if(data.option_error != ''){
							$('#option_error').html(data.option_error);
						}else{
							$('#option_error').html('');
						}
						
						if(data.qualite_error != ''){
							$('#qualite_error').html(data.qualite_error);
						}else{
							$('#qualite_error').html('');
						}

						if(data.depot_error != ''){
							$('#depot_error').html(data.depot_error);
						}else{
							$('#depot_error').html('');
						}

						if(data.c_examen_error != ''){
							$('#c_examen_error').html(data.c_examen_error);
						}else{
							$('#c_examen_error').html('');
						}

						if(data.langue_error != ''){
							$('#langue_error').html(data.langue_error);
						}else{
							$('#langue_error').html('');
						}

						if(data.choix1_error != ''){
							$('#choix1_error').html(data.choix1_error);
						}else{
							$('#choix1_error').html('');
						}

						if(data.choix2_error != ''){
							$('#choix2_error').html(data.choix2_error);
						}else{
							$('#choix2_error').html('');
						}
						
						if(data.choix3_error != ''){
							$('#choix3_error').html(data.choix3_error);
						}else{
							$('#choix3_error').html('');
						}
						if(data.diplome_error != ''){
							$('#diplome_error').html(data.diplome_error);
						}else{
							$('#diplome_error').html('');
						}

						if(data.etat_dip_error != ''){
							$('#etat_dip_error').html(data.etat_dip_error);
						}else{
							$('#etat_dip_error').html('');
						}

						if(data.certif_acte_error != ''){
							$('#certif_acte_error').html(data.certif_acte_error);
						}else{
							$('#certif_acte_error').html('');
						}

						if(data.certif_dip_error != ''){
							$('#certif_dip_error').html(data.certif_dip_error);
						}else{
							$('#certif_dip_error').html('');
						}

						if(data.attest_dip_error != ''){
							$('#attest_dip_error').html(data.attest_dip_error);
						}else{
							$('#attest_dip_error').html('');
						}
						
						if(data.certif_medic_error != ''){
							$('#certif_medic_error').html(data.certif_medic_error);
						}else{
							$('#certif_medic_error').html('');
						}


						if(data.photo_error != ''){
							$('#photo_error').html(data.photo_error);
						}else{
							$('#photo_error').html('');
						}

						if(data.attest_anc_error != ''){
							$('#attest_anc_error').html(data.attest_anc_error);
						}else{
							$('#attest_anc_error').html('');
						}

						if(data.auto_con_error != ''){
							$('#auto_con_error').html(data.auto_con_error);
						}else{
							$('#auto_con_error').html('');
						}

						if(data.recu_error != ''){
							$('#recu_error').html(data.recu_error);
						}else{
							$('#recu_error').html('');
						}
					}
                    if(data.success){
						$('#nom_error').html('');
						$('#lnaissance_error').html('');
						$('#jour_error').html('');
						$('#mois_error').html('');
						$('#annee_error').html('');
						$('#telc_error').html('');
						$('#telp_error').html('');
						$('#nationalite_error').html('');
						$('#sexe_error').html('');
						$('#parcours_error').html('');
						$('#option_error').html('');
						$('#qualite_error').html('');
						$('#depot_error').html('');
						$('#c_examen_error').html('');
						$('#langue_error').html('');
						$('#choix1_error').html('');
						$('#choix2_error').html('');
						$('#choix3_error').html('');
						$('#diplome_error').html('');
						$('#etat_dip_error').html('');
						$('#certif_acte_error').html('');
						$('#certif_dip_error').html('');
						$('#attest_dip_error').html('');
						$('#certif_medic_error').html('');
						$('#photo_error').html('');
						$('#attest_anc_error').html('');
						$('#auto_con_error').html('');
						$('#recu_error').html('');

						Swal.fire({
							icon: 'success',
							title: data.recepisse,
							text: data.success,
							footer: '<a href='+data.link+'>Voir ma fiche d\'inscription / See my registration form</a>'
						})
					}

					if(data.errors){
						Swal.fire(
							'OUPS',
							data.errors,
							'error'
						)
					}
                    $('#btn_ncandidat').attr('disabled', false);
                }
            });
        });






        /**affiche les options en fonction du parcours */
        option();
        function option(){
            $("#parcours").change(function (e) { 
                e.preventDefault();
                var val = $("#parcours").val();
               $.ajax({
                    method: "post",
                    url: "<?php echo base_url('option'); ?>",
                    data: {val:val},
                    success: function(data) {
                        $("#option").html(data); 
                    }
                });
            });
        }


        /**coche ou decode les document en fonction de la qualité */
        $("#qualite").change(function (e) { 
            e.preventDefault();
            var val = $("#qualite").val();
            if (val == "EXTERNE") {
                $("#auto_con").prop('checked', false);
                $("#attest_anc").prop('checked', false);
                $("#attest_anc").attr('disabled', 'disabled');
                $("#auto_con").attr('disabled', 'disabled');
            } else{
                $("#attest_anc").attr('disabled', false);
                $("#auto_con").attr('disabled', false);
            }
        });


        /**affiche le centre de formation  debut */

        /**en function du parocur */
        /************** */
        $('#parcours').change(function(){
            var val = $('#parcours').val();
            if(val != ''){
                chox(val);
            }else{
                chox(val);
            }
        });

        function chox(parcour_id){
            $.ajax({
                url:"<?php echo base_url('centre_formation');?>",
                method:"POST",
                data:{parcour_id:parcour_id},
                success:function(data){
                    $('#choix1').html(data);
                    $('#choix2').html(data);
                    $('#choix3').html(data);
                }
            })
        }
        /************************* */

       /**en fonction de l'option */
        $('#option').change(function(){
            var option_id = $("#option").val();
            if(option_id != ''){
                $.ajax({
                    url:"<?php echo base_url('centre_formation_op');?>",
                    method:"POST",
                    data:{option_id:option_id},
                    success:function(data){
                        $('#choix1').html(data);
                        $('#choix2').html(data);
                        $('#choix3').html(data);
                    }
                })
            }
        });
        /**affiche le centre de formation fin */


        /**affiche les diplomes en fonction  des parcours*/
        $('#parcours').change(function(){
            var val = $("#parcours").val();
            if(val != ''){
                diplome(val);
            }else{
                diplome(val);
            }
        });
        /************* */
        function diplome(parcours_id){
            $.ajax({
                url:"<?php echo base_url('parcours_dip');?>",
                method:"POST",
                data:{parcours_id:parcours_id},
                success:function(data){
                    $('#diplome').html(data);
                }
            })
        }

        /*************** */

    });
</script>

