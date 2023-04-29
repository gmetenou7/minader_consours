
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
                            <h3>Utilisateurs</h3>
                            <p class="text-subtitle text-muted">Liste des utilisateurs</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?=base_url('home');?>">Accueil</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">utilisateurs</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <section class="section">
                    <div class="card">
                        <span id="success_message"></span>
                        <form method="post" id="new_user_form">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="basicInput">Nom d'utilisateur</label>
                                    <input type="text" name="name" id="name" class="form-control" placeholder="Nom d'utilisateur">
                                    <p><small class="text-danger" id="name_error"></small></p>
                                </div>

								<div class="form-group">
                                    <label for="basicInput">Adresse Email</label>
                                    <input type="email" name="email" id="email" class="form-control" placeholder="adresse email">
                                    <p><small class="text-danger" id="email_error"></small></p>
                                </div>
								<div class="form-group">
                                    <label for="basicInput">Telephone (ex: +237123456789)</label>
                                    <input type="tel" name="telephone" id="telephone" class="form-control" placeholder="Numero de telephone">
                                    <p><small class="text-danger" id="telephone_error"></small></p>
                                </div>

                                <div class="form-group">
                                    <label for="basicInput">Statut</label>
                                    <select class="choices form-select" name="statut" id="statut">
                                        <?php if(!empty($statut)):?>
                                            <?php foreach($statut as $key => $row):?>
                                                <option value="<?=$row; ?>"><?=$row; ?></option>
                                            <?php endforeach?>
                                        <?php endif ?>
                                    </select>
                                    <p><small class="text-danger" id="statut_error"></small></p>
                                </div>
                                <div class="form-check">
                                    <div class="checkbox">
                                        <input type="checkbox" id="active" name="active" class="form-check-input" checked>
                                        <label for="checkbox1">Activé le compte</label>
                                        <p><small class="text-danger" id="active_error"></small></p>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="reset"
                                    class="btn btn-light-secondary"
                                    data-bs-dismiss="modal">
                                    <i class="bx bx-x d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Annuler</span>
                                </button>
                                <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal" id="new_user_submit" name="new_user_submit">
                                    <i class="bx bx-check d-block d-sm-none"></i>
                                    <span class="d-none d-sm-block">Creer</span>
                                </button>
                            </div>
                        </form>
                    </div>
                    </div>
                </section>
                <section class="section">
                    <div class="card">
                    <input type="search" name="cherche" id="cherche" class="form-control" placeholder="saisi le nom ou le matricule d'un utilisateur ici...">
                        <span id="saisi"></span>
                        <div class="card-body table-responsive" id="user_details">
                            <table class="table table-bordered border-primary table-striped" id="users_table">
                                <thead>
                                    <tr>
                                        <th>Matricule</th>
                                        <th>Nom</th>
										<th>Email</th>
										<th>Telephone</th>
                                        <th>Statut</th>
                                        <th>Etat</th>
                                        <th>Date Création</th>
                                        <th>Dernière connexion</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="users">
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                </section>
            </div>
            <?php $this->load->view('parts/footer');?><!--footer-->
        </div>
    </div>


<!--data table -->
<script>
    // Simple Datatable
    let users_table = document.querySelector('#users_table');
    let dataTable = new simpleDatatables.DataTable(users_table);
</script>


<!--création d'un utilisateur-->
<script>
$(document).ready(function(){

        /**nouvel utilisateur */
    $('#new_user_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
            url:"<?php echo base_url('new_user');?>",
            method:"POST",
            data:$(this).serialize(),
            dataType:"json",
            beforeSend:function(){
                $('#new_user_submit').attr('disabled', 'disabled');
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
                    $('#password_error').html('');
                    user();
                    $('#new_user_form')[0].reset();
                }
                $('#new_user_submit').attr('disabled', false);
            }
        })
    });


    /**liste des utilisateurs */
    user();
    function user(){
        $.ajax({
            method: "GET",
            url: "<?php echo base_url('luser');?>",
            dataType: "JSON",
            success:function (data){
                $("#users").html(data);
            }
        });
    }

    /**chercher un utilisateur */
    $("#cherche").keyup(function (e) { 
        var chercher = $("#cherche").val();
        $("#saisi").html(chercher);

        $.ajax({
            method: "POST",
            url: "<?php echo base_url('luser');?>",
            data: {chercher:chercher},
            dataType: "JSON",
            success:function (data) {
                $("#users").html(data);
            }
        });
    });










});
</script>

