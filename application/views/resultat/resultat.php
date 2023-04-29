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
                    <h3>Resultat</h3>
                    <p class="text-subtitle text-muted">les résultats sont affichés par parcours et par centre de formation. vous avez donc la possibilité d'exporter le tout sous un fichier EXCEL</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">résultat</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Générateur de résultat </h4><hr>
                        </div>
                        <div class="card-body table-responsive">
                            <p class="text-subtitle text-muted">
                                Click sur le bouton ci-dessous pour Générer le fichier excel des résultats. 
                                <br>
                                <b>NB:</b> Cette opération peut prendre jusqu'à 5 minutes en fonction de la quantité des informations a traité
                            </p>
                        </div>
                        
                        <?php if(empty($nbr_cdt_sans_anonymat)):?>
                            <a href="<?php echo base_url('total_resultats');?>" class="btn btn-outline-primary loader_bg1">Généré les résultats</a>
                        <?php else:?>
                            <span class="text-danger"><b>assurez-vous que les étapes précédentes sont terminé</b></span>
                        <?php endif?>
                        
                    </div>
                </div>
            </div>
        </section>
        
      
        
    </div>
</div>