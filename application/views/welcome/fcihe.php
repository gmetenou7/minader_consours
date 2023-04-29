<div class="wrapper">

    <!--begin::Portlet-->
    <div class="kt-portlet">
        <div class="kt-portlet__head">
            <div class="kt-portlet__head-label">
                <h3 class="kt-portlet__head-title">Voir, Modifier, Télécharger ma ficher</h3>
            </div>
        </div>
        <div class="kt-portlet__body">
            <div class="kt-section">
                <div class="kt-section__info">...</div>
            </div>
            <div class="kt-section__content kt-section__content--border">
                <div class="card">
                    <div class="kt-bg-metal kt-padding-50"></div>
                    <div class="card-body">
                        <?php $this->load->view('parts/message');?>

                        <label>saisissez ici le code de votre fiche d'inscription</label>
                        <form action="<?php echo base_url('cfiche');?>" method="post" id="form_code">
                            <p class="card-text">
                                <input type="text" name="code_fiche" id="code_fiche" value="<?php echo set_value('code_fiche'); ?>" class="form-control-lg" placeholder="code de votre fiche">
                                <?php echo form_error('code_fiche', '<div class="card-subtitle mb-2 text-danger">', '</div>'); ?>
                            </p>
                            <button type="submit" class="btn btn-primary">Afficher</button>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
	<!--end::Portlet-->
</div>