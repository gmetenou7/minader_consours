<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">


        <!-- debut reloader -->
        <?php //$this->load->view('reload_page/progress');?>
        <!--<div class="loader_bg">
            <div class="loader"></div>
        </div>
         fin reloader -->

        <h3>Profile Statistiques / Profile Statistics</h3>
    </div>
    <div class="page-content">

        <section class="row">
            <div class="col-12 col-lg-9">
                <div class="row">
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon purple">
                                            <i class="iconly-boldShow"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">nombre de candidats / number of candidates</h6>
                                        <h6 class="font-extrabold mb-0">
                                            <?php if(!empty($count_candidat)):?>
                                                <?php echo $count_candidat; ?>
                                            <?php endif?>
                                        </h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon blue">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Nombre</h6>
                                        <h6 class="font-extrabold mb-0">183.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon green">
                                            <i class="iconly-boldAdd-User"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Following</h6>
                                        <h6 class="font-extrabold mb-0">80.000</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 col-lg-3 col-md-6">
                        <div class="card">
                            <div class="card-body px-3 py-4-5">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="stats-icon red">
                                            <i class="iconly-boldBookmark"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <h6 class="text-muted font-semibold">Saved Post</h6>
                                        <h6 class="font-extrabold mb-0">112</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            <div class="col-12 col-lg-9">
                <div class="card">
                    <div class="card-body py-4 px-5">
                        <div class="d-flex align-items-center">
                            <div class="avatar avatar-xl">
                                <img src="assets/images/faces/1.jpg" alt="Face 1">
                            </div>
                            <div class="ms-3 name">
                                <h5 class="font-bold"><?php echo session('users')['nom'];?></h5>
                                <h6 class="text-muted mb-0"><?php echo session('users')['statut'];?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php if(session('users')['statut'] == 'admin'){?>
        <button class="btn btn-outline-info" onClick="imprimer('imprime')"><span class="fa-fw select-all fas"></span> Imprimer</button>
        <!-- Borderless table start -->
        <section class="section" id="imprime">
                    <div class="row" id="table-borderless">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Statistiques</h4>
                                        <p class="card-text">
                                            Ce tableau présente l'ensemble des statistiques liées au parcours, à la langue, à la qualité et au candidat lui-même <br>
                                            This table presents all the statistics related to the course, the language, the quality and the candidate himself
                                        </p>
                                        <hr>
                                        <h4>
                                            Nombre Total de candidats / Total number of candidates:
                                            <?php if(!empty($count_candidat)):?>
                                                <?php echo $count_candidat; ?>
                                            <?php endif?>
                                        </h4>
                                    </div>
                                    <!-- table with no border -->
                                    <div class="table-responsive">
                                        <table class="table table-borderless mb-0">
                                            <thead>
                                                <tr>
                                                    <th>Candidat(s) ayant un anonymat / Candidate(s) with anonymity</th>
                                                    <?php if(!empty($count_candidat_anonymat1)):?>
                                                        <th><?php  echo $count_candidat_anonymat1; ?></th>
                                                    <?php else: ?>
                                                        <th>0</th>
                                                    <?php endif ?>
                                                    
                                                    <th>Candidat(s) n' ayant pas un anonymat / Candidate(s) not having anonymity</th>
                                                    <?php if(!empty($count_candidat_anonymat2)):?>
                                                        <th> <?php echo $count_candidat_anonymat2; ?> </th>
                                                    <?php else: ?>
                                                        <th>0</th>
                                                    <?php endif ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th>Candidat(s) ayant un code fiche / Candidate(s) with a form code</th>
                                                    <?php if(!empty($count_candidat_code_fiche1)):?>
                                                        <th><?php  echo $count_candidat_code_fiche1; ?></th>
                                                    <?php else: ?>
                                                        <th>0</th>
                                                    <?php endif ?>

                                                    <th>Candidat(s) n'ayant pas un code fiche / Candidate(s) who do not have a form code</th>
                                                    <?php if(!empty($count_candidat_code_fiche2)):?>
                                                        <th><?php  echo $count_candidat_code_fiche2; ?></th>
                                                    <?php else: ?>
                                                        <th>0</th>
                                                    <?php endif ?>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <p><b>Nombre de candidats par parcours / Number of candidates per course:</b></p><hr>
                                                <span id="candidat_parcour"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <p><b>Nombre de candidats par option parcours(TSA) / Number of applicants by pathway option(TSA):</b></p><hr>
                                                <span id="candidat_option"></span>
                                            </div>
                                            <div class="col-md-4">
                                                <p><b>Nombre de candidats par Qualite / Number of candidates by qualification:</b></p><hr>
                                                <span id="candidat_qualite"></span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><b>Nombre de candidats par sexe / Number of candidates by gender:</b></p><hr>
                                                <span id="candidat_sexe"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <p><b>Nombre de candidats par Langue / Number of candidates per language:</b></p><hr>
                                                <span id="candidat_langue"></span>
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <p><b>Nombre de candidats par Centre D'examen / Number of candidates per Examination Center:</b></p><hr>
                                                <span id="candidat_examen"></span>
                                            </div>
                                            <div class="col-md-6">
                                                <p><b>Nombre de candidats par Centre de formation / Number of candidates per training center:</b></p><hr>
                                                <span id="candidat_formation"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Borderless table end -->
        <?php }else if(session('users')['statut'] == 'user_note'){?>
        <?php }else if(session('users')['statut'] == 'user_cadidat'){?>
        <?php } ?>
    </div>


    <section class="section">
        <div class="card">
        <h5>Modifier votre mot de passe</h5>
        <hr>
            <span id="success_message_password"></span>
            <form method="post" id="update_user_password_form">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="helperText">Mot de passe actuel</label>
                        <input type="password" name="npassword_user" id="npassword_user" class="form-control" placeholder="Mot de passe">
                        <p><small class="text-danger" id="npassword_user_error"></small></p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="helperText">Nouveau mot de passe</label>
                        <input type="password" name="password_user" id="password_user" class="form-control" placeholder="Mot de passe">
                        <p><small class="text-danger" id="password_user_error"></small></p>
                    </div>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="helperText">Confirmation nouveau mot de passe</label>
                        <input type="password" name="cpassword_user" id="cpassword_user" class="form-control" placeholder="Mot de passe">
                        <p><small class="text-danger" id="cpassword_user_error"></small></p>
                    </div>
                </div>
                <div class="modal-footer">
                       
                    <button type="submit" class="btn btn-primary ml-1" id="update_user_password_submit" name="update_user_password_submit">
                         Modifier
                    </button>
                </div>
            </form>
        </div>
        </div>
    </section>




    <?php $this->load->view('parts/footer');?><!--footer-->
</div>
  

<script>
/**scripts d'afficharge */
    $(document).ready(function(){

        /**nombre de candidat par parcour */
        $.ajax({
            url:"<?php echo base_url('count_candidat_parcour');?>",
            method:"POST",
            /*data:$(this).serialize(),*/
            dataType:"json",
            success:function(data){
                $('#candidat_parcour').html(data);
            }
        })

        /**nombre de candidat par option */
        $.ajax({
            url:"<?php echo base_url('count_candidat_option');?>",
            method:"POST",
            /*data:$(this).serialize(),*/
            dataType:"json",
            success:function(data){
                $('#candidat_option').html(data);
            }
        })


        /**nombre de candidat par qualite ou statut(interne externe) */
        $.ajax({
            url:"<?php echo base_url('count_candidat_qualite');?>",
            method:"POST",
            /*data:$(this).serialize(),*/
            dataType:"json",
            success:function(data){
                $('#candidat_qualite').html(data);
            }
        })

        /**nombre de candidat par sexe */
        $.ajax({
            url:"<?php echo base_url('count_candidat_sexe');?>",
            method:"POST",
            /*data:$(this).serialize(),*/
            dataType:"json",
            success:function(data){
                $('#candidat_sexe').html(data);
            }
        })

        /**nombre de candidat par langue */
        $.ajax({
            url:"<?php echo base_url('count_candidat_langue');?>",
            method:"POST",
            /*data:$(this).serialize(),*/
            dataType:"json",
            success:function(data){
                $('#candidat_langue').html(data);
            }
        })

        /**nombre de candidat par centre d'examen */
        $.ajax({
            url:"<?php echo base_url('count_candidat_examen');?>",
            method:"POST",
            /*data:$(this).serialize(),*/
            dataType:"json",
            success:function(data){
                $('#candidat_examen').html(data);
            }
        })


        /**nombre de candidat par centre de formation */
        $.ajax({
            url:"<?php echo base_url('count_candidat_formation');?>",
            method:"POST",
            /*data:$(this).serialize(),*/
            dataType:"json",
            success:function(data){
                $('#candidat_formation').html(data);
            }
        })

        



    });
</script>

<!--fonction pour inprimer la section des statistiques-->
<script>
    function imprimer(sectionName) {
        var printContents = document.getElementById(sectionName).innerHTML;    
        var originalContents = document.body.innerHTML;      
        document.body.innerHTML = printContents;     
        window.print();     
        document.body.innerHTML = originalContents;
    }
</script>



<script>
$(document).ready(function(){
    
        /**modifier le mot de passe d'un utilisateur*/
    $('#update_user_password_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url('update_user_password')?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            beforeSend:function(){
                $('#update_user_password_submit').attr('disabled', 'disabled');
            },
            success:function(data){
                if(data.error){
                    if(data.npassword_user_error != ''){
                        $('#npassword_user_error').html(data.npassword_user_error);
                    }else{
                        $('#npassword_user_error').html('');
                    }

                    if(data.password_user_error != ''){
                        $('#password_user_error').html(data.password_user_error);
                    }else{
                        $('#password_user_error').html('');
                    }

                    if(data.cpassword_user_error != ''){
                        $('#cpassword_user_error').html(data.cpassword_user_error);
                    }else{
                        $('#cpassword_user_error').html('');
                    }
                }
                if(data.success){
                    $('#success_message_password').html(data.success);
                    $('#npassword_user_error').html('');
                    $('#password_user_error').html('');
                    $('#cpassword_user_error').html('');
                    //$('#update_user_password_form')[0].reset();
                }
                $('#update_user_password_submit').attr('disabled', false);
            }
        })
    });

});
</script>