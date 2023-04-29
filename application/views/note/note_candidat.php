
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
    
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Saisir Les Notes</h3>
                <p class="text-subtitle text-muted">
                    pour saisir la note, choisi le code de la fiche, le parcours et la matière
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">note</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <section class="section">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <p>
                            <form id="note_form">
                                <div class="buttons">
                                    <!--<form action="">-->
                                        <div class="row">

                                            <div class="col-md-3 mb-4">
                                                <h6>Matiere </h6>
                                                <div class="form-group">
                                                    <select name="matiere" id="matiere" class="form-control">
                                                        <option value=""></option>
                                                        <?php if(!empty($matiere)):?>
                                                            <?php foreach($matiere as $key => $row):?>
                                                                <option value="<?php echo $row?>"><?php echo $key;?></option>
                                                            <?php endforeach?>
                                                        <?php endif?>
                                                    </select>
                                                    <span class="text-danger" id="matiere_error"></span>
                                                </div>
                                            </div>

                                            <div class="col-md-3 mb-4">
                                                <h6>Parcours</h6>
                                                <div class="form-group">

                                                    <select name="parcours" id="parcours" class="form-control">
                                                        <option value=""></option>
                                                        <?php if(!empty($parcours)):?>
                                                            <?php foreach($parcours as $row):?>
                                                                <option value="<?php echo $row['parcour'];?>"><?php echo $row['parcour'];?></option>
                                                            <?php endforeach?>
                                                        <?php endif?>
                                                    </select>
                                                    <span id="parcours_error" class="text-danger"></span>
                                                </div>
                                            </div>
                                           
                                            <div class="col-md-3 mb-4">
                                                <h6>Code Fiche </h6>
                                                <div class="form-group">
                                                    <select name="codef" id="codef" class="form-control">
                                                        <?php if(!empty($codeF)):?>
                                                            <?php foreach($codeF as $row):?>
                                                                <option value="<?php echo $row['code_fiche'];?>"><?php echo $row['code_fiche'];?></option>
                                                            <?php endforeach?>
                                                        <?php endif?>
                                                    </select>
                                                    <span id="codef_error" class="text-danger"></span>
                                                </div>
                                            </div>
                                            
                                            <div class="col-md-3 mb-4">
                                                <h6>.</h6>
                                                <div class="form-group">
                                                   <button type="button" class="btn btn-primary" id="btn_filtre">Afficher</button>
                                                </div>
                                            </div>

                                        </div>
                                    <!--</form>-->
                                </div>
                                <hr style="color:blue;">

                                <table class="table table-striped mb-0">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Code Anonymat</th>
                                            <th>Note</th>
                                        </tr>
                                    </thead>
                                    <tbody id="note_saisi">
                                        
                                    </tbody>
                                </table>
                            </form>   
                            <!--<div class="row">-->
                                <!--<div class="col-md-6 mb-4">-->
                                    <b class="text-primary"><span id="success_message"></span></b>
                                <!--</div>-->
                            <!--</div>-->          
                        </p>
                    </div>
                </div>
            </div>
        </div>

        
    </section>
    </div>
</div>



<script>

    $(document).ready(function () {
        
        /**affiche le formulaire de saisi des notes */
        $("#btn_filtre").click(function (e){ 
            e.preventDefault();
            var matiere = $("#matiere").val();
            var parcours = $("#parcours").val();
            var codef = $("#codef").val();
            
            // if(parcours == ""){
            //     $("#parcours_error").html("chosi le parcours");
            // }else{
            //     $("#parcours_error").html(""); 
            // }
            
            if(codef == ""){
                $("#codef_error").html("choisi le code fiche");
            }else{
                $("#codef_error").html("");
            }

            if(matiere == ""){
                $("#matiere_error").html("choisi la matière");
            }else{
                $("#matiere_error").html("");
            }

            if(codef != "" && matiere != ""){ 
                //parcours != "" && 
                $.ajax({
                    method: "POST",
                    url: "<?php echo base_url('form_note');?>",
                    data: {parcours:parcours,codef:codef,matiere:matiere},
                    dataType: "JSON",
                    beforeSend:function(){
                        $('#btn_filtre').attr('disabled', 'disabled');
                    },
                    success: function(data){
                        $("#note_saisi").html(data);
                        $('#btn_filtre').attr('disabled', false);
                    }
                });
            }
        });


        


        $('#note_form').on('submit', function(event){
            event.preventDefault();
            $.ajax({
                method: "POST",
                url: "<?php echo base_url('save_note');?>",
                data: $(this).serialize(),
                dataType: "JSON",
                success: function(data) {
                    $('#success_message').html(data);
                }
            });
        });




    });


</script>