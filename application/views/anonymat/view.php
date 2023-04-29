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
                <h3>Généré les anonymats / Generated anonymities</h3>
                <p class="text-subtitle text-muted">
                    cliquez sur le bouton pour générer l'anonymat de chaque candidat / 
                    click on the button to generate the anonymity of each candidate
                </p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Accueil</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Anonymat</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="row">
            <div class="col-12 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Générateur d'anonymat / Generated anonymities</h5>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <?php $this->load->view('parts/message');?>
                            
                            <?php if(!empty($candidats)): ?>
                                <?php if(!empty($anonymat)): ?>
                                    <p class="card-text">
                                        en cliquant sur le bouton en dessous, vous générez instantanément, 
                                        tous les anonymats et les codes fiches de chaque candidat <b class="text-danger">ATTENTION! 
                                        cette opération peut prendre jusqu'à 10 minutes en fonction du nombre de candidats à anonyme</b>
                                    </p>
                                    <!-- File uploader with validation -->

                                    <a href="<?php echo base_url('anonymat_generator');?>" class="btn btn-outline-dark">Générer les anonymats</a>
                                <?php else: ?>
                                    <p class="card-text text-danger">
                                    <b>Chaque candidat a à présent un anonymat unique et appartient à un codfichehe</b> <br>
                                        le bouton de génération sera disponible si de nouveaux candidats sont ajoutés
                                    </p>

                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Liste des Candidats Anonymé | <a href="<?php echo base_url('candidatanonyme');?>" class="btn btn-btn-outline-success">EXPORTER</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <div class="col-12">
                                        <div class="card">
                                            <div class="card-header">
                                                <h4>Liste des Candidats Anonymé | <a href="<?php echo base_url('candidatanonyme');?>" class="btn btn-btn-outline-success">EXPORTER</a></h4>
                                            </div>
                                        </div>
                                    </div>
                            <?php else: ?>
                                <p class="card-text text-danger">
                                    aucun candidat trouvé
                                </p>
                            <?php endif ?>
                            
                        </div>
                    </div>
                </div>
            </div>

            




        </div>
    </section>
</div>