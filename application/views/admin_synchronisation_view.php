<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin accueil</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php
       include 'includes/header.php';
        ?>
<style type="text/css">
  input[type=checkbox] {
    transform: scale(2);
}
</style>
    <link href="<?=base_url()?>assets/datepicker/css/datep.css" rel="stylesheet" type="text/css" />
    </head>
    <body  style=" background: #c9dbe9">
        <!-- HEADER -->
        <?php
        $lien1="";
        $lien2="";
        $lien3="";
        $lien4="";

    $active1="primary";
    $active2="primary";
    $active3="primary"; 
    $active4="primary";
    $active5="primary";
    $active6="primary";
    $active7="primary";
    $active8="primary";
    $active9="primary";
    $active10="primary";
    $active11="primary";

    ?>
    <?php
       include 'includes/my_header.php';
        ?>
    <!-- /HEADER -->
    <div class="container">
    <div class="row">

      <!-- <div class="col-md-8"></div> -->
      <?php
       include 'includes/sous_menus_admin.php';
        ?>
<p></p>
<center><?=$message?></center>


        </div>
        </div>
        <!-- FOOTER -->
    
    <!-- jQuery Plugins -->
  <?php
       include 'includes/pied.php';
        ?>

        <?php
       include 'includes/footer.php';
        ?>
        <!-- /FOOTER -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatable/datatables.min.css">

    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/datatable/datatables.min.js"></script>
     <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/scannerDetection.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/scannerDetection.js"></script>
    </body>
</html>
 

 