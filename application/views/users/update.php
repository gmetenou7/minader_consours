
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
        <?php if(!empty($user)):?>
            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Modifier: <?php echo $user['nom'];?></h3>
                            <p class="text-subtitle text-muted">vois êtes sur le point de modifier les informations de: <?php echo $user['nom'];?></p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?=base_url('home');?>">Accueil</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><a href="<?=base_url('view');?>">utilisateurs</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Modifier utilisateur</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <span id="success_message"></span>
                        <form method="post" id="update_user_form">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="basicInput">Nom d'utilisateur</label>
                                    <input type="text" name="name" id="name" value="<?php echo $user['nom'];?>" class="form-control" placeholder="Nom d'utilisateur">
                                    <p><small class="text-danger" id="name_error"></small></p>
                                </div>

								<div class="form-group">
                                    <label for="basicInput">Adresse Email</label>
                                    <input type="email" name="email" id="email" class="form-control" value="<?php echo $user['email'];?>" placeholder="adresse email">
                                    <p><small class="text-danger" id="email_error"></small></p>
                                </div>
								<div class="form-group">
                                    <label for="basicInput">Telephone (ex: +237123456789)</label>
                                    <input type="tel" name="telephone" id="telephone" class="form-control" value="<?php echo $user['tel'];?>" placeholder="Numero de telephone">
                                    <p><small class="text-danger" id="telephone_error"></small></p>
                                </div>


                                <div class="form-group">
                                    <label for="basicInput">Statut</label>
                                    <select class="choices form-select" name="statut" id="statut">
                                        <?php if(!empty($statut)):?>
                                            <?php foreach($statut as $key => $row):?>
                                                <?php if($user['statut'] == $row){?>
                                                    <option value="<?php echo $user['statut'];?>" selected><?php echo $user['statut'];?></option>
                                                <?php }else{ ?>                                                                 
                                                    <option value="<?=$row; ?>"><?=$row; ?></option>
                                                <?php } ?>
                                            <?php endforeach?>
                                        <?php endif ?>
                                    </select>
                                    <p><small class="text-danger" id="statut_error"></small></p>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox">
                                        <?php if($user['etat'] == 'on'):?>
                                            <input type="checkbox" id="active" name="active" class="form-check-input" checked>
                                        <?php else: ?>
                                            <input type="checkbox" id="active" name="active" class="form-check-input">
                                        <?php endif?>
                                        <label for="checkbox1">Activé le compte</label>
                                        <p><small class="text-danger" id="active_error"></small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                    <input type="hidden" value="<?php echo $user['matricule'];?>" name="matricule" id="matricule">
                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal" id="update_user_submit" name="update_user_submit">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Modifier</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    </div>
                </section>

            </div>
        <?php else:?>
            <h1 class="text-danger">utilisateur non trouvé</h1>
        <?php endif?>
            <?php $this->load->view('parts/footer');?><!--footer-->
        </div>
    </div>

<!--data table -->
<script>
    // Simple Datatable
    let users_table = document.querySelector('#users_table');
    let dataTable = new simpleDatatables.DataTable(users_table);
</script>


<!--modification d'un utilisateur-->
<script>
$(document).ready(function(){

        /**modifier un utilisateur */
    $('#update_user_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url('update_user')?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            beforeSend:function(){
                $('#update_user_submit').attr('disabled', 'disabled');
            },
            success:function(data){
                if(data.error){
                    if(data.name_error != ''){
                        $('#name_error').html(data.name_error);
                    }else{
                        $('#name_error').html('');
                    }
					if(data.email_error != ''){
                        $('#email_error').html(data.email_error);
                    }else{
                        $('#email_error').html('');
                    }
					if(data.telephone_error != ''){
                        $('#telephone_error').html(data.telephone_error);
                    }else{
                        $('#telephone_error').html('');
                    }
                    if(data.statut_error != ''){
                        $('#statut_error').html(data.statut_error);
                    }else{
                        $('#statut_error').html('');
                    }
                    if(data.active_error != ''){
                        $('#active_error').html(data.active_error);
                    }else{
                        $('#active_error').html('');
                    }
                }
                if(data.success){
                    $('#success_message').html(data.success);
                    $('#name_error').html('');
					$('#email_error').html('');
					$('#telephone_error').html('');
                    $('#statut_error').html('');
                    $('#update_user_form')[0].reset();
                }
                $('#update_user_submit').attr('disabled', false);
            }
        })
    });

});
</script>



