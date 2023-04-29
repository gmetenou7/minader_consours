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
                    <h3>Liste des candidats par centre de composition</h3>
                    <p class="text-subtitle text-muted">
                        cliquez pour télécharger la liste des candidats par centre de composion
                        <a href="<?php echo base_url('getPdf');?>" target="_blank"><button class="btn btn-outline-primary">Tout Télécharger</button></a>
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">centre composition</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Basic card section start -->
        <section id="content-types">

                <?php $this->load->view('parts/message');?>

            <div class="row">
            
                <?php $i=0; if(!empty($centre_examen)): ?>
                    <?php foreach($centre_examen as $row): $i+=1;?> 
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <p class="card-text">
                                            <?php echo $i; ?> centre de composition : <div id="test"></div>
                                        </p>
                                        <h4 class="card-title"><?php echo $row['centre_examen']; ?></h4>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <span><a href="<?php echo base_url('getPdf/'.$row['centre_examen']);?>" target="_blank"><button class="btn btn-light-primary">Voir</button></a></span>
                 
                                    <a href="<?php echo base_url('getPdf/'.$row['centre_examen']);?>" download><button class="btn btn-light-primary">Télécharger</button></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php else: ?>
                    <p>Acun Centre de composition trouvé</p>
                <?php endif ?>
            </div>
        </section>
        <!-- Basic Card types section end -->
    </div>
</div>

        