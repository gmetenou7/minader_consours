</div>
    <script src="<?= assets_dir();?>vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= assets_dir();?>js/bootstrap.bundle.min.js"></script>

    <script src="<?= assets_dir();?>vendors/apexcharts/apexcharts.js"></script>
    <script src="<?= assets_dir();?>js/pages/dashboard.js"></script>

    <script src="<?= assets_dir();?>js/main.js"></script>

    <!-- multi_select -->
    <script src="<?= assets_dir();?>vendors/choices.js/choices.min.js"></script>

    <script src="<?= assets_dir();?>js/extensions/sweetalert2.js"></script>
    <script src="<?= assets_dir();?>vendors/sweetalert2/sweetalert2.all.min.js"></script>

    <script src="<?= assets_dir();?>vendors/toastify/toastify.js"></script>
    <script src="<?= assets_dir();?>js/extensions/toastify.js"></script>
    <script src="<?= assets_dir();?>vendors/fontawesome/all.min.js"></script>

</body>

  
<script src="<?= assets_dir();?>js/toastr/toastr.min.js"></script>
    <link rel="stylesheet" href="<?= assets_dir();?>css/toastr/toastr.min.css">
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": true,
        "progressBar": true,
        "positionClass": "toast-top-center",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "7000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

        /*<?php if($this->session->has_userdata('success')):?> 
            toastr["success"]("<?php echo $this->session->flashdata('success');?>")
        <?php endif ?>

        <?php if($this->session->has_userdata('error')):?> 
            toastr["error"]("<?php echo $this->session->flashdata('error');?>")
        <?php endif ?>

        <?php if($this->session->has_userdata('info')):?> 
            toastr["info"]("<?php echo $this->session->flashdata('info');?>") 
        <?php endif ?>

        <?php if($this->session->has_userdata('warning')):?> 
            toastr["warning"]("<?php echo $this->session->flashdata('warning');?>") 
        <?php endif ?>*/

        

        
        <?php if($this->session->has_userdata('success')):?> 
            Toastify({
                text: "<?php echo $this->session->flashdata('success');?>",
                duration: 3000
            }).showToast();  
        <?php endif ?>

        <?php if($this->session->has_userdata('error')):?>  
            Toastify({
                text: "<?php echo $this->session->flashdata('error');?>",
                duration: 3000,
                backgroundColor: "linear-gradient(to right, #00b09b, #96c93d)",
            }).showToast(); 
        <?php endif ?>

        <?php if($this->session->has_userdata('info')):?>  
            Toastify({
                text: "<?php echo $this->session->flashdata('info');?>",
                duration: 3000,
                close:false,
                backgroundColor: "#4fbe87",
            }).showToast(); 
        <?php endif ?>

        <?php if($this->session->has_userdata('warning')):?>   
            Toastify({
                text: "<?php echo $this->session->flashdata('warning');?>",
                duration: 3000,
                close:false,
                backgroundColor: "#7ba964",
            }).showToast();  
        <?php endif ?>
        
</script>


 <!-- debut reloader c'est le spiner qui s'affiche lors du chargement de la page-->
    <script type="text/javascript">
        setTimeout(function(){
            $('.loader_bg').fadeToggle();
        }, 1500);
    </script>
    <!-- fin reloader -->




</html>