<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin accueil</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php
       include 'includes/header.php';
        ?>

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
            <div class="col-md-12" style="margin-top: 50px">
                 
                      <form method="POST" target="_blank" enctype="multipart/form-data" id="myform"action="<?=base_url().'Admin/generate_qr_code'?>">

                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <label>NOMBRE DES QR-CODE A GENERER </label>
                            <input type="number" class="form-control" name="NOMBRE" value="" autofocus required min="0">
                            
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12">
                            <label>.</label>
                            <input type="submit" value="GENERER" class="btn btn-primary btn-block">
                            
                        </div>

                      </form>
                      
            </div>
            <div class="col-md-12" style="margin-top: 50px">
                 
                      
                      <form method="POST" target="_blank" enctype="multipart/form-data" id="myform"action="<?=base_url().'Admin/generate_barcode'?>">

                        <div class="col-md-4 col-sm-12 col-xs-12">
                            <label>NOMBRE DES BARCODE A GENERER </label>
                            <input type="number" class="form-control" name="NOMBRE" value="" autofocus required min="0">
                            
                        </div>
                        <div class="col-md-2 col-sm-12 col-xs-12">
                            <label>.</label>
                            <input type="submit" value="GENERER" class="btn btn-primary btn-block">
                            
                        </div>

                      </form>
            </div>
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

    </body>
</html>

