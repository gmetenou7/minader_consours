
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.83.1">
    <title>CONCOUR MINADER</title>

    

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?= assets_dir();?>css/bootstrap.css">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="https://www.minader.cm/wp-content/uploads/2016/06/Logo-minader-1.jpg" sizes="180x180">
<link rel="icon" href="https://www.minader.cm/wp-content/uploads/2016/06/Logo-minader-1.jpg" sizes="32x32" type="image/png">
<link rel="icon" href="https://www.minader.cm/wp-content/uploads/2016/06/Logo-minader-1.jpg" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.0/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="https://www.minader.cm/wp-content/uploads/2016/06/Logo-minader-1.jpg">

<!-- ajax -->
<script src="<?= assets_dir();?>js/ajax/jquery.min.js"></script>
<link rel="stylesheet" href="<?= assets_dir();?>vendors/toastify/toastify.css">

<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="pricing.css" rel="stylesheet">
  </head>
  <body>
    
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
  <symbol id="check" viewBox="0 0 16 16">
    <title>Check</title>
    <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
  </symbol>
</svg>

<div class="container py-3">
  <header>
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="<?php echo base_url('/');?>" class="d-flex align-items-center text-dark text-decoration-none">
        <img src="https://www.minader.cm/wp-content/uploads/2016/06/Logo-minader-1.jpg" alt="" srcset="" width="40" height="32">
        <span class="fs-4">CONCOURS MINADER</span>
      </a>

      <nav class="d-inline-flex mt-2 mt-md-0 ms-md-auto">
				<?php if($session_actuel !=0): ?>
        <a class="me-3 py-2 text-dark text-decoration-none" href="<?php echo base_url('inscription')?>">S'INSCRIRE AU CONCOURS</span></a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="<?php echo base_url('cfiche')?>">MODIFIER MA FICHE</a>
				<?php endif; ?>
        <a class="me-3 py-2 text-dark text-decoration-none" href="<?php echo base_url('login');?>">SE CONNECTER</a>
      </nav>
    </div>
		
  </header>

