
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Paramètre</h3>
                            <p class="text-subtitle text-muted">
                                Utilise ici pour configurer les paramètres 
                                necessaire à l'utisation de l'application
                            </p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Card</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
                <!-- Basic card section start -->
                <section id="content-types">
                    <div class="row">
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">entrer la  session en cours <p class="text-muted small">exemple: 2020 ou encore 2019</p></h4>
                                        <p class="card-text">
                                            seul la dernière session enrégistrer sera pris en compte.
                                        </p>
                                        <p class="card-text">
                                            <span class="text-success" id="session_msg"></span>
                                            <form action="" method="post" id="session_form">
                                                <input type="text" name="session" id="session" class="form-control" placeholder="entre la session en cnours">
                                                <span id="session_error" class="text-danger text-small"></span>
												<hr>
                                                <label for="">date debut</label>
												<input type="date" name="datedebut" id="datedebut" class="form-control" placeholder="entre la date debut de session en cnours">
                                                <span id="detedebut_error" class="text-danger text-small"></span>
                                                <hr>
                                                <label for="">date fin</label>
												<input type="date" name="datefin" id="datefin" class="form-control" placeholder="entre la date fin session en cnours">
                                                <span id="datefin_error" class="text-danger text-small"></span>
                                                <hr>
                                                <input type="submit" id="new_session_submit" class="btn btn-primary" value="enrégistrer / save">
                                            </form>
                                        </p>
                                    </div>
                                    <ul class="list-group" id="sessions">
                                            
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                    <h4 class="card-title">Centre de depot des dossiers</h4>
                                        <p class="card-text">
                                             enregistrer ici le ou les centres de dépôt des dossiers.
                                            <br> 
                                            <b>ATTENTION! Rassurez-vous d'avoir saisi correctement l'orthographe</b>
                                        </p>
                                        <p class="card-text">
                                            <span class="text-success" id="depot_msg"></span>
                                            <form action="" method="post" id="depot_form">
                                                <input type="text" name="depot" id="depot" class="form-control" placeholder="entre le centre de depot">
                                                <span id="depot_error" class="text-danger text-small"></span>
                                                <hr>
                                                <input type="submit" id="new_depot_submit" class="btn btn-primary" value="enrégistrer / save">
                                            </form>
                                        </p>
                                    </div>
                                </div>
                                <ul class="list-group" id="centre_depot">
                                            
                                </ul>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Centre d'examen / Exam center</h4>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">
                                            créer un nouveau centre d'examen, surtout rassures-toi d'avoir entré l'orthographe correcte <br>
                                            create a new exam center, especially make sure you have entered the correct spelling
                                        </p>
                                        <p class="card-text">
                                            <span class="text-success" id="examen_msg"></span>
                                            <form action="" method="post" id="examen_form">
                                                <input type="text" name="examen" id="examen" class="form-control" placeholder="entre le nom ici / enter the name here">
                                                <span id="examen_error" class="text-danger text-small"></span>
                                                <hr>
                                                <input type="submit" id="new_examen_submit" class="btn btn-primary" value="enrégistrer / save">
                                            </form>
                                        </p>
                                    <ul class="list-group" id="centre_examen">
                                            
                                    </ul>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Basic Card types section end -->

            </div>
        </div>


<script>
    $(document).ready(function () {
        
        
        /************************************************************************ */  
        all_session();
        /**inserer un date de session dans la base des données */
        $('#session_form').submit(function (e) { 
            e.preventDefault();
            var session = $('#session').val();
            var datedebut = $('#datedebut').val();
            var datefin = $('#datefin').val();
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('session_date') ?>",
                data: {
                    session:session,
                    datedebut:datedebut,
                    datefin:datefin
                },
                dataType: "JSON",
                beforeSend:function(){
                    $('#new_session_submit').attr('disabled', 'disabled');
                },
                success: function(data) {
                    if(data.error){
                        if(data.session_error != ''){
                            $('#session_error').html(data.session_error);
                        }else{
                            $('#session_error').html('');
                        }
                        if(data.detedebut_error != ''){
                            $('#detedebut_error').html(data.detedebut_error);
                        }else{
                            $('#detedebut_error').html('');
                        }
                        if(data.datefin_error != ''){
                            $('#datefin_error').html(data.datefin_error);
                        }else{
                            $('#datefin_error').html('');
                        }
                    }
                    if(data.success){
						all_session(); 
                        $('#session_msg').html(data.success);
                        $('#session_form')[0].reset();
                    }
                    $('#new_session_submit').attr('disabled', false);
                }
            });
        });

        /**supprimer une session */
        $(document).on('click', '.remove_inventory', function(){
            var row_id = $(this).attr("id");
            Swal.fire({
                title: 'voulez-vous supprimer cette session?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `OUI`,
                denyButtonText: `NON`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url:"<?php echo base_url('delete_session'); ?>",
                        method:"POST",
                        data:{row_id:row_id},
                        success:function(data){
                            all_session()
                        } 
                    });
                } else if (result.isDenied) {
                    Swal.fire('suppression annuler', '', 'info');
                }
            }) 
        });

        /**affiche les sessions qui sont dans la base des données */
        function all_session(){
            $.ajax({
                method: "GET",
                url: "<?php echo base_url('get_session') ?>",
                dataType: "JSON",
                success: function (response) {
                   $('#sessions').html(response); 
                }
            });
        }

        /************************************************************************** */


        /*************************************************************************** */
        all_depot();
         /**inserer le centre de depot des dossiers dans la base des données */
         $('#depot_form').submit(function (e) { 
            e.preventDefault();
            var depot = $('#depot').val();
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('depot') ?>",
                data: {depot:depot},
                dataType: "JSON",
                beforeSend:function(){
                    $('#new_depot_submit').attr('disabled', 'disabled');
                },
                success: function(data) {
                    if(data.error){
                        if(data.session_error != ''){
                            $('#depot_error').html(data.depot_error);
                        }else{
                            $('#depot_error').html('');
                        }
                    }
                    if(data.success){
                        $('#depot_msg').html(data.success);
                        $('#depot_form')[0].reset();
                    }
                    $('#new_depot_submit').attr('disabled', false);
                    all_depot(); 
                }
            });
        });

    
          /**supprimer un centre de depot */
        $(document).on('click', '.remove_depot', function(){
            var row_id = $(this).attr("id");
            Swal.fire({
                title: 'voulez-vous supprimer ce centre de depot?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `OUI`,
                denyButtonText: `NON`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url:"<?php echo base_url('delete_depot'); ?>",
                    method:"POST",
                    data:{row_id:row_id},
                        success:function(data){
                            all_depot();
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('suppression annuler', '', 'info')
                }
            }) 

        });

        /**affiche les centre de depot qui sont dans la base des données */
        function all_depot(){
            $.ajax({
                method: "GET",
                url: "<?php echo base_url('get_depot') ?>",
                dataType: "JSON",
                success: function (response) {
                   $('#centre_depot').html(response); 
                }
            });
        }

        /******************************************************* */

        /****************************************************** */
        all_examen();
        /**enrégistrer un centre d'examen */
        $('#examen_form').submit(function (e) { 
            e.preventDefault();
            var examen = $('#examen').val();
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('examen') ?>",
                data: {examen:examen},
                dataType: "JSON",
                beforeSend:function(){
                    $('#new_examen_submit').attr('disabled', 'disabled');
                },
                success: function(data) {
                    if(data.error){
                        if(data.session_error != ''){
                            $('#examen_error').html(data.examen_error);
                        }else{
                            $('#examen_error').html('');
                        }
                    }
                    if(data.success){
                        $('#examen_msg').html(data.success);
                        $('#examen_form')[0].reset();
                    }
                    $('#new_examen_submit').attr('disabled', false);
                    all_examen(); 
                }
            });
        });

        /**affiche les centre d'examen */
        function all_examen(){
            $.ajax({
                method: "GET",
                url: "<?php echo base_url('get_examen') ?>",
                dataType: "JSON",
                success: function (response) {
                   $('#centre_examen').html(response); 
                }
            });
        }

        /**supprimer un centre d'examen */
          $(document).on('click', '.remove_examen', function(){
            var row_id = $(this).attr("id");
            Swal.fire({
                title: 'voulez-vous supprimer ce centre d\'examen?',
                showDenyButton: true,
                showCancelButton: false,
                confirmButtonText: `OUI`,
                denyButtonText: `NON`,
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                    url:"<?php echo base_url('delete_examen'); ?>",
                    method:"POST",
                    data:{row_id:row_id},
                        success:function(data)
                        {
                            all_examen();
                        }
                    });
                } else if (result.isDenied) {
                    Swal.fire('suppression annuler', '', 'info')
                }
            }) 

        });
        /************************************************************************************* */







    });
</script>
