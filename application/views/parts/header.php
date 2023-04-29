<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MINADER</title>

    <link rel="shortcut icon" href="<?= assets_dir();?>images/logo/logominader1.jpg" type="image/x-icon">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= assets_dir();?>css/bootstrap.css">

    <link rel="stylesheet" href="<?= assets_dir();?>vendors/iconly/bold.css">

    <link rel="stylesheet" href="<?= assets_dir();?>vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= assets_dir();?>vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= assets_dir();?>css/app.css">
    <link rel="shortcut icon" href="<?= assets_dir();?>images/favicon.svg" type="image/x-icon">

    <!-- muti_select -->
    <link rel="stylesheet" href="<?= assets_dir();?>vendors/choices.js/choices.min.css" />

     <!-- ajax -->
     <script src="<?= assets_dir();?>js/ajax/jquery.min.js"></script>

     <link rel="stylesheet" href="<?= assets_dir();?>vendors/sweetalert2/sweetalert2.min.css">

     <link rel="stylesheet" href="<?= assets_dir();?>vendors/toastify/toastify.css">
     <link rel="stylesheet" href="<?= assets_dir();?>vendors/fontawesome/all.min.css">

     <link href="<?= assets_dir();?>files/css/filepond.css" rel="stylesheet">
    <link href="<?= assets_dir();?>files/css/filepond-plugin-image-preview.css" rel="stylesheet">


    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <style>
        .fontawesome-icons {
            text-align: center;
        }

        article dl {
            background-color: rgba(0, 0, 0, .02);
            padding: 20px;
        }

        .fontawesome-icons .the-icon svg {
            font-size: 24px;
        }
    </style>

            <!-- datatable -->
        <link rel="stylesheet" href="<?php echo assets_dir()?>dataTables/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="<?php echo assets_dir()?>dataTables/css/buttons.dataTables.min.css">
        

        <script src="<?php echo assets_dir()?>dataTables/js/jquery-3.5.1.js"></script>
        <script src="<?php echo assets_dir()?>dataTables/js/jquery.dataTables.min.js"></script>
        <script src="<?php echo assets_dir()?>dataTables/js/dataTables.buttons.min.js"></script>
        <script src="<?php echo assets_dir()?>dataTables/js/jszip.min.js"></script>
        <script src="<?php echo assets_dir()?>dataTables/js/pdfmake.min.js"></script>
        <script src="<?php echo assets_dir()?>dataTables/js/vfs_fonts.js"></script>
        <script src="<?php echo assets_dir()?>dataTables/js/buttons.html5.min.js"></script>
        <script src="<?php echo assets_dir()?>dataTables/js/buttons.print.min.js"></script>
        <script src="<?php echo assets_dir()?>dataTables/js/buttons.colVis.min.js"></script>
        <script src="<?php echo assets_dir()?>dataTables/js/dataTables.select.min.js"></script>



        <!-- debut reloader. c'est le spiner qui s'affiche lors du chargement de la page -->
        <style type="text/css">
          .loader_bg{
            position: fixed;
            z-index: 999999;
            background:#fff;
            width: 100%;
            height: 100%;
          }
          .loader{
            border: 0 soild transparent;
            border-radius: 50%;
            width: 150px;
            height: 150px;
            position: absolute;
            top: calc(50vh - 75px);
            left: calc(50vw - 75px);
          }
           .loader:before, .loader:after{
            content: '';
            border: 1em solid #ff5733;
            border-radius: 50%;
            width: inherit;
            height: inherit;
            position: absolute;
            top: 0;
            left: 0;
            animation: loader 2s linear infinite;
            opacity: 0;
           }

           .loader:before{
            animation-delay: .5s;
           }

           @keyframes loader{
            0%{
              transform: scale(0);
              opacity: 0;
            }
            50%{
              opacity: 1;
            }
            100%{
              transform: scale(1);
              opacity: 0;
            }
           }
        </style>
        <!-- fin reloader -->

</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <!--<div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/logo/logo.png" alt="Logo" srcset=""></a>
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>-->
                <?php $this->load->view('parts/sidebar_menu');?><!--side bar-->

                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>