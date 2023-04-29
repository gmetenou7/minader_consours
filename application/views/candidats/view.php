
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
                            <h3>Candidats</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?=base_url('home');?>">Accueil/Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Candidats</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                
			<!--new candidat debut-->
			<div class="wrapper">

<h3 class="pull-center">INSCRIPTION</h3>
<?php $this->load->view('parts/message');?>
<form  method="POST" action="<?php echo base_url('newinscription'); ?>" id="formnewinscription">
<input type="hidden" value="create" name="create" id="create">
	<div class="card">
		<div class="card-body">
			<h5 class="card-title">Informations personnelles</h5>
			<div class="row">
				<div class="col-md-6">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Nom Complet / Full Name:</label>
						<input type="text" class="form-control border-primary" id="nom" name="nom" value="<?php echo set_value('nom'); ?>" placeholder="Nom Complet / Full Name:...">
						<span class="text-danger" id="nom_error"></span>
						<?php echo form_error('nom', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Lieu de Naissance / Place of birth:</label>
						<input type="text" class="form-control border-primary" value="<?php echo set_value('lnaissance'); ?>" id="lnaissance" name="lnaissance" placeholder="Lieu de Naissance / Place of birth:...">
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
							<option value="<?php echo set_value('jour'); ?>" Selected><?php echo set_value('jour'); ?></option>
							<?php if(!empty($jour_naissance)): ?>
								<?php foreach ($jour_naissance as $key => $value): ?>
									<option value="<?php echo $value ?>"><?php echo $value ?></option>
								<?php endforeach ?>
							<?php endif ?>
						</select>
						<span class="text-danger" id="jour_error"></span>
						<?php echo form_error('jour', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
					</div>
					<div class="col-md-4">
						<label class="form-label">Mois / Month:</label>
						<select name="mois" id="mois" class="form-select border-primary">
							<option value="<?php echo set_value('mois'); ?>"><?php echo set_value('mois'); ?></option>
							<?php if(!empty($mois_naissance)): ?>
								<?php foreach ($mois_naissance as $key => $value): ?>
									<option value="<?php echo $key ?>"><?php echo $value ?></option>
								<?php endforeach ?>
							<?php endif ?>
						</select>
						<span class="text-danger" id="mois_error"></span>
						<?php echo form_error('mois', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
					</div>
					<div class="col-md-4">
						<label class="form-label">Année / Year:</label>
						<select name="annee" id="annee" class="form-select border-primary">
							<option value="<?php echo set_value('annee'); ?>"><?php echo set_value('annee'); ?></option>
							<?php if(!empty($annee_naissance)): ?>
								<?php foreach ($annee_naissance as $key => $value): ?>
									<option value="<?php echo $value ?>"><?php echo $value ?></option>
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
						<input type="tel" class="form-control border-primary" value="<?php echo set_value('telc'); ?>" id="telc" name="telc" placeholder="Téléphone du candidat / Applicant's phone number:...">
						<span class="text-danger" id="telc_error"></span>
						<?php echo form_error('telc', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
					</div>
				</div>
				<div class="col-md-6">
					<div class="mb-3">
						<label for="exampleInputEmail1" class="form-label">Téléphone du parent / Parent's phone number:</label>
						<input type="tel" class="form-control border-primary" value="<?php echo set_value('telp'); ?>" id="telp" name="telp" placeholder="Téléphone du parent / Parent's phone number:...">
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
							<option value="<?php echo set_value('nationalite'); ?>"><?php echo set_value('nationalite'); ?></option>
							<?php if(!empty($pays)): ?>
								<?php foreach ($pays as $key => $value): ?>
									<option value="<?php echo $value ?>"><?php echo $key.' / '.$value ?></option>
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
							<option value="<?php echo set_value('sexe'); ?>"><?php echo set_value('sexe'); ?></option>
							<?php if(!empty($sexe)): ?>
								<?php foreach ($sexe as $key => $value): ?>
									<option value="<?php echo $value ?>"><?php echo $key.' / '.$value ?></option>
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
						<option value="<?php echo set_value('parcours'); ?>" selected><?php echo set_value('parcours'); ?></option>
						<?php if(!empty($parcours)): ?>
							<?php foreach ($parcours as $key => $value): ?>
								<option value="<?php echo $value['nom_parcour'] ?>"><?php echo $value['nom_parcour'] ?></option>
							<?php endforeach ?>
						<?php endif ?>     
					</select>
					<span class="text-danger" id="parcours_error"></span>
					<?php echo form_error('parcours', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
				</div>
				<div class="col-md-4">
					<label class="form-label">Option/Option:</label>
					<select name="option" id="option" class="form-select border-primary">
						<option value="<?php echo set_value('option'); ?>" selected><?php echo set_value('option'); ?></option>
					</select>
					<span class="text-danger" id="option_error"></span>
					<?php echo form_error('option', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
				</div>
				<div class="col-md-4">
					<label class="form-label">Qualité du candidat/Nature of candidate:</label>
					<select name="qualite" id="qualite" class="form-select border-primary">
						<option value="<?php echo set_value('qualite'); ?>" selected><?php echo set_value('qualite'); ?></option>
						<?php if(!empty($qualite)): ?>
							<?php foreach ($qualite as $key => $value): ?>
								<option value="<?php echo $value; ?>"><?php echo $key.' / '.$value ?></option>
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
						<option value="<?php echo set_value('depot'); ?>" selected><?php echo set_value('depot'); ?></option>
						<?php if(!empty($centre_depot)): ?>
							<?php foreach ($centre_depot as $key => $value): ?>
								<option value="<?php echo $value['nom_centre_depot']; ?>"><?php echo $value['nom_centre_depot'] ?></option>
							<?php endforeach ?>
						<?php endif ?> 
					</select>
					<span class="text-danger" id="depot_error"></span>
					<?php echo form_error('depot', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
				</div>
				<div class="col-md-4">
					<label class="form-label">Centre d'examen / Exam center:</label>
					<select name="c_examen" id="c_examen" class="form-select border-primary">
						<option value="<?php echo set_value('c_examen'); ?>" selected><?php echo set_value('c_examen'); ?></option>
						<?php if(!empty($centre_examen)): ?>
							<?php foreach ($centre_examen as $key => $value): ?>
								<option value="<?php echo $value['nom_centre_examen']; ?>"><?php echo $value['nom_centre_examen'] ?></option>
							<?php endforeach ?>
						<?php endif ?> 
					</select>
					<span class="text-danger" id="c_examen_error"></span>
					<?php echo form_error('c_examen', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
				</div>
				<div class="col-md-4">
					<label class="form-label">Langue de Composition / Language of Composition</label>
					<select name="langue" id="langue" class="form-select border-primary">
						<option value="<?php echo set_value('langue'); ?>" selected><?php echo set_value('langue'); ?></option>
						<?php if(!empty($langue)): ?>
							<?php foreach ($langue as $key => $value): ?>
								<option value="<?php echo $value; ?>"><?php echo $key.' / '.$value; ?></option>
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
						<option value="<?php echo set_value('choix1'); ?>" selected><?php echo set_value('choix1'); ?></option>
					</select>
					<span class="text-danger" id="choix1_error"></span>
					<?php echo form_error('choix1', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
				</div>
				<div class="col-md-4">
					<label class="form-label">Ecole choisi / Selected school 2:</label>
					<select name="choix2" id="choix2" class="form-select border-primary">
						<option value="<?php echo set_value('choix2'); ?>" selected><?php echo set_value('choix2'); ?></option>
					</select>
					<span class="text-danger" id="choix2_error"></span>
					<?php echo form_error('choix2', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
				</div>
				<div class="col-md-4">
					<label class="form-label">Ecole choisi / Selected school 3:</label>
					<select name="choix3" id="choix3" class="form-select border-primary">
						<option value="<?php echo set_value('choix3'); ?>" selected><?php echo set_value('choix3'); ?></option>
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
						<option value="<?php echo set_value('diplome'); ?>" selected><?php echo set_value('diplome'); ?></option>
					</select>
					<span class="text-danger" id="diplome_error"></span>
					<?php echo form_error('diplome', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
				</div>

				<div class="col-md-6">
					<label class="form-label">Etat / State:</label>
					<select name="etat_dip" id="etat_dip" class="form-select border-primary">
						<option value="<?php echo set_value('etat_dip'); ?>" selected><?php echo set_value('etat_dip'); ?></option>
						<?php if(!empty($etat)): ?>
							<?php foreach ($etat as $key => $value): ?>
								<option value="<?php echo $value; ?>"><?php echo $key.' / '.$value; ?></option>
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
						  <input class="form-control" value="<?php echo set_value('photo'); ?>" type="file" id="photo" name="photo"> 
						  <span class="text-danger" id="msg_photo"></span>
						  <span class="text-danger" id="photo_error"></span>
						</div>
					</span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
					Une Attestation d'anciénneté comportant l'avis favorable du supérieur hiérachique / A certificate of seniority including the favorable opinion of the hierarchical superior (candidat interne / internal candidate)
					<b>(.pdf)</b>
					<span class="badge">
						<?php echo form_error('attest_anc', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
						<?php if( isset($_POST['qualite'])){ ?>
							<?php if($_POST['qualite'] == "EXTERNE"){ ?>
								<div class="mb-3">
									<input class="form-control" type="file" value="<?php echo set_value('attest_anc'); ?>" disabled id="attest_anc" name="attest_anc"> 
									<span class="text-danger" id="msg_attest_anc"></span>
									<span class="text-danger" id="attest_anc_error"></span>
								</div>
							<?php }else{ ?>
								<div class="mb-3">
									<input class="form-control" type="file" id="attest_anc" value="<?php echo set_value('attest_anc'); ?>" name="attest_anc"> 
									<span class="text-danger" id="msg_attest_anc"></span>
									<span class="text-danger" id="attest_anc_error"></span>
								</div>
							<?php } ?>
						<?php }else{ ?>
							<div class="mb-3">
								<input class="form-control" type="file" id="attest_anc" value="<?php echo set_value('attest_anc'); ?>" name="attest_anc"> 
								<span class="text-danger" id="msg_attest_anc"></span>
								<span class="text-danger" id="attest_anc_error"></span>
							</div>
						<?php } ?>
					</span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
					Autorisation de concourir signée du MINADER / Authorization to compete signed by MINADER (candidat interne / internal candidate) <b>(.pdf)</b>
					<span class="badge">
						<?php echo form_error('auto_con', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
						<?php if( isset($_POST['qualite'])){ ?>
							<?php if($_POST['qualite'] == "EXTERNE"){ ?>
								<div class="mb-3">
									<input class="form-control" disabled type="file" value="<?php echo set_value('auto_con'); ?>" id="auto_con" name="auto_con"> 
									<span class="text-danger" id="msg_auto_con"></span>
									<span class="text-danger" id="auto_con_error"></span>
								</div>
							<?php }else{ ?>
								<div class="mb-3">
									<input class="form-control" type="file" value="<?php echo set_value('auto_con'); ?>" id="auto_con" name="auto_con"> 
									<span class="text-danger" id="msg_auto_con"></span>
									<span class="text-danger" id="auto_con_error"></span>
								</div>
							<?php } ?>
						<?php }else{ ?>
							<div class="mb-3">
								<input class="form-control" type="file" value="<?php echo set_value('auto_con'); ?>" id="auto_con" name="auto_con"> 
								<span class="text-danger" id="msg_auto_con"></span>
								<span class="text-danger" id="auto_con_error"></span>
							</div>
						<?php } ?>
						
					</span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center">
					Un réçu de versement des droids d'inscription au concours / Receipt of payment of the registration fee for the competition <b>(.pdf)</b>
					<span class="badge">
						<?php echo form_error('recu', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
						<div class="mb-3">
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
			<div class="form-check">
				<input class="form-check-input border-primary" type="checkbox"  id="validate">
				<label class="form-check-label" for="defaultCheck1">
					<b class="text-danger">
						je certifie que les informations saisies sont correctes et sont vérifiables sur les documents fournis. <br>
						En validant ce champ, vous imprimerez votre fiche d'inscription ayant un code qui vous permettra de la modifier dans les délais fixés sur l'arrêté du concours
					</b>
				</label>
			</div>

			<h5 class="bg-primary align-middle"><span id="message" class="text-warning pull-left"></span></h5>
			<button class="btn btn-primary pull-right" id="btn_ncandidat" name="btn_ncandidat" type="submit">S'inscrire</button>
		</div>
	</div>
</form>
</div>
			<!--new candidat fin-->

            ...
            </div>
            <?php $this->load->view('parts/footer');?><!--footer-->
        </div>
    </div>


<!--script du new candidat debut-->
<span id="success_message"></span>
<img src="" alt="">
<hr>
<script>
    $(document).ready(function () {

	
		/**new inscription */
		$('#formnewinscription').on('submit', function(event){
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

        

        /**desactivé le bouttion de soumission */
        if($('#validate').prop("checked") == false){
            $("#btn_ncandidat").attr('disabled', 'disabled');
        }

        $('#validate').click(function(){
            if($('#validate').prop("checked") == true){

                var filter_input_text =/^[a-zA-Z0-9._éèêÉÈÊàôÀÔïÏ\'\- ]+$/;
                var filter_input_number=/^[0-9\ ]+$/;
                var filter_input_tel=/^[0-9\-\(\)\/\+\s]*$/;
				var filter_input_file=/^.*\.(pdf|PDF)$/;
				var filter_input_image=/^.*\.(jpg|JPG|png|PNG|jpeg|JPEG)$/;
                var error = "";

                if($('#nom').val() == ''){
                    $('#nom').addClass('bg-danger text-white');
                        error = "0";
                }else if(!filter_input_text.test($('#nom').val())){
                    $('#nom').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#nom').removeClass('bg-danger text-white');
                }

                if($('#lnaissance').val() == ''){
                    $('#lnaissance').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#lnaissance').val())){
                    $('#lnaissance').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#lnaissance').removeClass('bg-danger text-white');
                }

                if($('#jour').val() == ''){
                    $('#jour').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_number.test($('#jour').val())){
                    $('#jour').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#jour').removeClass('bg-danger text-white');
                }

                if($('#mois').val() == ''){
                    $('#mois').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_number.test($('#mois').val())){
                    $('#mois').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#mois').removeClass('bg-danger text-white');
                }

                if($('#annee').val() == ''){
                    $('#annee').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_number.test($('#annee').val())){
                    $('#annee').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#annee').removeClass('bg-danger text-white');
                }

                if($('#telc').val() == ''){
                    $('#telc').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_tel.test($('#telc').val())){
                    $('#telc').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#telc').removeClass('bg-danger text-white');
                }

                if($('#telp').val() == ''){
                    $('#telp').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_tel.test($('#telp').val())){
                    $('#telp').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#telp').removeClass('bg-danger text-white');
                }

                if($('#nationalite').val() == ''){
                    $('#nationalite').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#nationalite').val())){
                    $('#nationalite').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#nationalite').removeClass('bg-danger text-white');
                }

                if($('#sexe').val() == ''){
                    $('#sexe').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#sexe').val())){
                    $('#sexe').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#sexe').removeClass('bg-danger text-white');
                }


                if($('#parcours').val() == ''){
                    $('#parcours').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#parcours').val())){
                    $('#parcours').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#parcours').removeClass('bg-danger text-white');
                }

                if($('#qualite').val() == ''){
                    $('#qualite').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#qualite').val())){
                    $('#qualite').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#qualite').removeClass('bg-danger text-white');
                }

                if($('#depot').val() == ''){
                    $('#depot').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#depot').val())){
                    $('#depot').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#depot').removeClass('bg-danger text-white');
                }

                if($('#c_examen').val() == ''){
                    $('#c_examen').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#c_examen').val())){
                    $('#c_examen').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#c_examen').removeClass('bg-danger text-white');
                }

                if($('#langue').val() == ''){
                    $('#langue').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#langue').val())){
                    $('#langue').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#langue').removeClass('bg-danger text-white');
                }

                if($('#choix1').val() == ''){
                    $('#choix1').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#choix1').val())){
                    $('#choix1').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#choix1').removeClass('bg-danger text-white');
                }

                if($('#choix2').val() == ''){
                    $('#choix2').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#choix2').val())){
                    $('#choix2').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#choix2').removeClass('bg-danger text-white');
                }

                if($('#choix3').val() == ''){
                    $('#choix3').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#choix3').val())){
                    $('#choix3').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#choix3').removeClass('bg-danger text-white');
                }


                if($('#diplome').val() == ''){
                    $('#diplome').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#diplome').val())){
                    $('#diplome').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#diplome').removeClass('bg-danger text-white');
                }

                if($('#etat_dip').val() == ''){
                    $('#etat_dip').addClass('bg-danger text-white');
                    error = "0";
                }else if(!filter_input_text.test($('#etat_dip').val())){
                    $('#etat_dip').addClass('bg-danger text-white');
                    error = "0";
                }else{
                    $('#etat_dip').removeClass('bg-danger text-white');
                }




				if($('#certif_acte').val() == ''){
					$('#certif_acte').addClass('bg-danger');
					error = "0";
				}else if(!filter_input_file.test($('#certif_acte').val())){
					$('#certif_acte').addClass('bg-danger');
					$('#msg_certif_acte').html('.pdf');
					error = "0";
				}else if($('#certif_acte')[0].files[0].size > 307200){
					$('#certif_acte').addClass('bg-danger');
					$('#msg_certif_acte').html('max 300 KB');
					error = "0";
				}else{
					$('#certif_acte').removeClass('bg-danger')
				}

				if($('#certif_dip').val() == ''){
					$('#certif_dip').addClass('bg-danger');
					error = "0";
				}else if(!filter_input_file.test($('#certif_dip').val())){
					$('#certif_dip').addClass('bg-danger');
					$('#msg_certif_dip').html('.pdf');
					error = "0";
				}else if($('#certif_dip')[0].files[0].size > 307200){
					$('#certif_dip').addClass('bg-danger');
					$('#msg_certif_dip').html('max 300 KB');
					error = "0";
				}else{
					$('#certif_dip').removeClass('bg-danger')
				}

				if($('#attest_dip').val() == ''){
					$('#attest_dip').addClass('bg-danger');
					error = "0";
				}else if(!filter_input_file.test($('#attest_dip').val())){
					$('#attest_dip').addClass('bg-danger');
					$('#msg_attest_dip').html('.pdf');
					error = "0";
				}else if($('#attest_dip')[0].files[0].size > 307200){
					$('#attest_dip').addClass('bg-danger');
					$('#msg_attest_dip').html('max 300 KB');
					error = "0";
				}else{
					$('#attest_dip').removeClass('bg-danger')
				}

				if($('#certif_medic').val() == ''){
					$('#certif_medic').addClass('bg-danger');
					error = "0";
				}else if(!filter_input_file.test($('#certif_medic').val())){
					$('#certif_medic').addClass('bg-danger');
					$('#msg_certif_medic').html('.pdf');
					error = "0";
				}else if($('#certif_medic')[0].files[0].size > 307200){
					$('#certif_medic').addClass('bg-danger');
					$('#msg_certif_medic').html('max 300 KB');
					error = "0";
				}else{
					$('#certif_medic').removeClass('bg-danger')
				}

				if($('#photo').val() == ''){
					$('#photo').addClass('bg-danger');
					error = "0";
				}else if(!filter_input_image.test($('#photo').val())){
					$('#photo').addClass('bg-danger');
					$('#msg_photo').html('.jpg / .png / .jpeg');
					error = "0";
				}else if($('#photo')[0].files[0].size > 51200){
					$('#photo').addClass('bg-danger');
					$('#msg_photo').html('max 50 KB');
					error = "0";
				}else{
					$('#photo').removeClass('bg-danger')
				}

				if($('#recu').val() == ''){
					$('#recu').addClass('bg-danger');
					error = "0";
				}else if(!filter_input_file.test($('#recu').val())){
					$('#recu').addClass('bg-danger');
					$('#msg_recu').html('.pdf');
					error = "0";
				}else if($('#recu')[0].files[0].size > 307200){
					$('#recu').addClass('bg-danger');
					$('#msg_recu').html('max 300 KB');
					error = "0";
				}else{
					$('#recu').removeClass('bg-danger')
				}

                if(error != ""){
                    $("#message").html("formulaire pas correct");
                    $("#btn_ncandidat").attr('disabled', 'disabled');
                    $("#validate").prop('checked', false);
                }else{
                    $("#message").html("");
                    $("#btn_ncandidat").attr('disabled', false);
                }
                
            }
            else if($('#validate').prop("checked") == false){
                $("#btn_ncandidat").attr('disabled', 'disabled');
            }
        });


    });
</script>

<!--script du new candidat fin-->
