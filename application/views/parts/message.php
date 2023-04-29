<?php if($this->session->has_userdata('success')):?> 
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('success');?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
<?php endif ?>



<?php if($this->session->has_userdata('error')):?> 
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('error');?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
<?php endif ?>

<?php if($this->session->has_userdata('info')):?> 
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('info');?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
<?php endif ?>

<?php if($this->session->has_userdata('warning')):?>
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <?php echo $this->session->flashdata('warning');?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"
            aria-label="Close"></button>
    </div>
<?php endif ?>