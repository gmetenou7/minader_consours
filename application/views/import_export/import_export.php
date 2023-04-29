<div id="main">         
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
                    <h4>IMPORTER / EXPORT CANDIDATS</h4>
                    <p class="text-subtitle text-muted">
                        importer ou exporter les candidats disponibles / 
                        import or export available candidates
                    </p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= base_url('home');?>">Accueil(Home)</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Importer(Import) / Exporter(Export)</li>
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
                            <h5 class="card-title">Importer la liste des candidats / Import the list of candidates</h5>
                        </div>
                        <div class="card-content">
                        
                            <?php $this->load->view('parts/message');?>

                            <form method="post" action="<?php echo base_url('import');?>" enctype="multipart/form-data">
                                <div class="card-body">
                                    <p class="card-text">
                                        Clic pour choisir ou porter et déposer le fichier Excel ici... / 
                                        Click to choose or wear and drop the Excel file here ...
                                    </p>
                                    <!-- Basic file uploader 
                                    <input type="file" name="import_excel_file" id="import_excel_file" class="basic-filepond">-->
                                    <input type="file" value="<?php echo set_value('select_excel')?>" name="select_excel" class="basic-filepond" />
                                    <span class="text-danger"><?php echo form_error('select_excel')?></span>
                                </div>
                                <!--<div id="excel_area"></div>-->
                                <div class="card-footer">
                                    <input type="submit" name="load" id="load"  value="Importer" class="btn btn-outline-success" />
                                    <!--<button type="submit"><span class="fa-fw select-all fas"></span></button>-->
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<script>
    /*$(document).ready(function(){
    $('#load_excel_form').on('submit', function(event){
        event.preventDefault();
        $.ajax({
        url:"<?php //echo base_url('import');?>",
        method:"POST",
        data:new FormData(this),
        contentType:false,
        cache:false,
        processData:false,
        beforeSend:function(){
            $('#load').attr('disabled', 'disabled');
            $('#load').val('Importation...');
        },
        success:function(data)
        {
            $('#excel_area').html(data);
            //$('#load_excel_form')[0].reset();
            $('#load').attr('disabled', false);
            $('#load').val('Importer');
        }
        })
    });
    });*/
</script>




