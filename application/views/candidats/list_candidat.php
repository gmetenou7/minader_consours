
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
                            <h3>Candidats</h3>
                            <p class="text-subtitle text-muted">Liste des candidats</p>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?=base_url('home');?>">Accueil</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Candidats</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!--inscrire un candidat-->
                 <!-- Striped rows start -->
                 <section class="section">
                    <div class="row" id="table-striped">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title"><a href="<?php echo base_url('export'); ?>" class="btn btn-outline-primary">Exporter</a></h4>


                                    <div class="col-xl-12 col-md-12 col-sm-12">
                                        <div class="card">
                                            <div class="card-content">
                                                <div class="card-body">
                                                    <h4 class="card-title">Exporter selon les paramètres</h4>
                                                    <form class="form" method="post" action="<?php echo base_url('lcandidats'); ?>">
                                                        <div class="form-body">
                                                            <div class="row">
                                                                <div class="form-group col-md-4">
                                                                    <select name="parcour" id="parcour" class="form-control">
                                                                        <option selected disabled>Parcour</option>
                                                                        <?php if(!empty($parcours)):?>
                                                                            <?php foreach($parcours as $row):?>
                                                                                <option value="<?php echo $row['parcour']; ?>"><?php echo $row['parcour']; ?></option>
                                                                            <?php endforeach?>
                                                                        <?php endif ?>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <select name="qualite" id="qualite" class="form-control">
                                                                        <option selected disabled>Qualite candidat</option>
                                                                        <?php if(!empty($qualite)):?>
                                                                            <?php foreach($qualite as $row):?>
                                                                                <option value="<?php echo $row['statut_candidat']; ?>"><?php echo $row['statut_candidat']; ?></option>
                                                                            <?php endforeach?>
                                                                        <?php endif ?>
                                                                    </select>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group col-md-4">
                                                                    <select name="langue" id="langue" class="form-control">
                                                                        <option selected disabled>Langue</option>
                                                                        <?php if(!empty($langue)):?>
                                                                            <?php foreach($langue as $row):?>
                                                                                <option value="<?php echo $row['langue_candidat']; ?>"><?php echo $row['langue_candidat']; ?></option>
                                                                            <?php endforeach?>
                                                                        <?php endif ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <select name="formation" id="formation" class="form-control">
                                                                        <option selected disabled>ecole de formation</option>
                                                                        <?php if(!empty($formation)):?>
                                                                            <?php foreach($formation as $row):?>
                                                                                <option value="<?php echo $row['ecole_choisi_1']; ?>"><?php echo $row['ecole_choisi_1']; ?></option>
                                                                            <?php endforeach?>
                                                                        <?php endif ?>
                                                                    </select>
                                                                </div>

                                                                <div class="form-group col-md-4">
                                                                    <select name="examen" id="examen" class="form-control">
                                                                        <option selected disabled>centre examen</option>
                                                                        <?php if(!empty($examen)):?>
                                                                            <?php foreach($examen as $row):?>
                                                                                <option value="<?php echo $row['centre_examen']; ?>"><?php echo $row['centre_examen']; ?></option>
                                                                            <?php endforeach?>
                                                                        <?php endif ?>
                                                                    </select>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="form-actions d-flex justify-content-end">
                                                            <button type="submit" class="btn btn-primary me-1">Eporter</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <?php $this->load->view('parts/message');?>
                                        <div class="form-group">
                                            <span class="text-dark text-muted">saisi ici le nom complet ou le numero recepice d'un candidat pour le trouver</span>
                                            <input type="search" name="search_box" id="search_box" class="form-control" placeholder="chercher un ou plusieurs candidat(s)">
                                            <span id="saisi"></span>
                                        </div>
                                        <div id="test"></div>
                                        <div align="right" id="pagination_link"></div>
                                        <div id="total_candidat"></div>
                                        <div class="table-responsive" id="candidat_table"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- Striped rows end -->
            </div>
            <?php $this->load->view('parts/footer');?><!--footer-->
        </div>
    </div>
<!--tabl avec pagination-->
<script>
    $(document).ready(function () {

        /**affiche la liste des candidats */
        function load_candidat_data(page, search='') {
            $.ajax({
                url: "<?php echo base_url(); ?>list_candidat/"+page,
                method: "GET",
                data: {search:search},
                //data: "data",
                dataType: "json",
                success:function(data){
                    $('#candidat_table').html(data.candidat_table);
                    $('#pagination_link').html(data.pagination_link); 
                    $('#total_candidat').html(data.total_candidat);
                }
            });
        }
        /*********************** */
        load_candidat_data(1);

        /**click sur le boutons de pagination */
        $(document).on("click",".pagination li a",function(e){ 
            e.preventDefault();
            var page = $(this).data("ci-pagination-page");
            load_candidat_data(page);
        });

        /**barre de recherche instantané */
        $('#search_box').keyup(function (e){ 
            var search = $('#search_box').val();
            $("#saisi").html(search);
            load_candidat_data(1,search);
        });


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



