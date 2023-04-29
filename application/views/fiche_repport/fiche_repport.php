
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
                    <h3>Fiche de repport</h3>
                    <p class="text-subtitle text-muted">
                        télécharger la fiche de repport des notes
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?php echo base_url('home');?>">Accueil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">fiche</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <!-- Basic card section start -->
        <section id="content-types">
            <div class="row">
            
            <?php //if(empty($count_candidat_code_fiche2)){?>
                <?php $i=0; if(!empty($informations)): ?>
                    <?php foreach($informations as $row): $i+=1; ?>
                        <div class="col-xl-4 col-md-6 col-sm-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <h4 class="card-title">Fiche de repport: <?php echo $row['code_fiche'].'  num: '.$i; ?></h4>
                                        <p class="card-text">
                                            langue: <?php echo $row['langue_candidat']; ?><br>
                                            parcour: <?php echo $row['parcour']; ?>
                                        </p>
                                    </div>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <span><a href="<?php echo base_url('fiche/'.$row['code_fiche'].'/'.$row['langue_candidat'].'/'.$row['parcour']); ?>" target="_blank"><button class="btn btn-light-primary">Voir</button></a></span>
                                    <a href="<?php echo base_url('fiche/'.$row['code_fiche'].'/'.$row['langue_candidat'].'/'.$row['parcour']); ?>" download><button class="btn btn-light-primary">Télécharger</button></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                <?php endif?>
            <?php //}else{?>
                <!--<center>
                    <p class="text-danger h5">
                        nous avons encore <?php //echo $count_candidat_code_fiche2; ?> candidat(s) n'ayant pas de codefiche <br>
                        allez dans l'onglet <b>Anonymat</b> pour régler cela.
                    </p>
                </center>-->
            <?php //} ?>
                

                <!--<div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">Liste de code fiche</h4>
                                <p class="card-text">...</p>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between">
                            <span>...</span>
                            <button class="btn btn-light-primary">Télécharger</button>
                        </div>
                    </div>
                </div>
            </div>-->
        </section>
        <!-- Basic Card types section end -->
    </div>
</div>
