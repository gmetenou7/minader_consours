<!DOCTYPE html>
<html lang="en">
<head>
  <title>Simple landing page</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?php echo assets_dir();?>welcomepage/vendors/owl-carousel/css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?php echo assets_dir();?>welcomepage/vendors/owl-carousel/css/owl.theme.default.css">
  <link rel="stylesheet" href="<?php echo assets_dir();?>welcomepage/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?php echo assets_dir();?>welcomepage/vendors/aos/css/aos.css">
  <link rel="stylesheet" href="<?php echo assets_dir();?>welcomepage/css/style.min.css">
</head>

    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-12 col-12">
                <div id="auth-left">
                    <!--<div class="auth-logo">
                        <a href=""><img src="" alt="Logo"></a>
                    </div>-->
                    <h1 class="auth-title">CONNEXION / LOGIN</h1>
                    <!--<p class="auth-subtitle mb-5">utiliser vos information de connexion pour vous connecter</p>-->

                    <?php $this->load->view('parts/message');?>
                    <form method="POST" action="<?php echo base_url('login'); ?>">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" name="users" value="<?php echo set_value('users'); ?>" placeholder="username / email / telephone">
                            <?php echo form_error('users', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" name="password" value="<?php echo set_value('password'); ?>" placeholder="mot de passe / password">
                            <?php echo form_error('password', '<div class="text-danger">', '</div>'); ?>
                        </div>
                        <button type="submit" id="login_user_submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">SE CONNECTER / LOGIN</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600"></p>
                        <p>Developed by: ANACONDA TECHNOLOGIE</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
