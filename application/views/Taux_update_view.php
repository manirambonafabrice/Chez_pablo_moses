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
		$lien6="active";

  

    ?>
    <?php
       include 'includes/my_header.php';
        ?>
    <!-- /HEADER -->
    <div class="container">
    <div class="row">

      <!-- <div class="col-md-8"></div> -->
     
			<div class="col-md-12">
				<?= $this->session->flashdata('message') ?>

					<!-- <i class="fa fa-exclamation-triangle" style="color: red;font-size: 35px"> INTERFACE EN COURS DE CONSTUCTION</i> -->
<form method="POST" enctype="multipart/form-data" id="myform"action="<?=base_url().'Taux_de_transfert/update/'?><?=$info['ID']?>">

         <div class="form-group">

       <div class="col-md-2 col-sm-12 col-xs-12">
      <label>Minimum </label>
      <input type="text" class="form-control" name="min" value="<?=$info['MAKE']?>" readonly>
  
      </div>
       <div class="col-md-2 col-sm-12 col-xs-12">
      <label>Maximum </label>
      <input type="text" class="form-control" name="max" value="<?=$info['MENSHI']?>" readonly>   
      </div>
			</div>
      <div class="form-group">

       <div class="col-md-2 col-sm-12 col-xs-12">
      <label>ECOCASH </label>
      <input type="text" class="form-control" name="eco" value="<?=$info['ECOCASH']?>" autofocus>
  
      </div>
       <div class="col-md-2 col-sm-12 col-xs-12">
      <label>LUMICASH </label>
      <input type="text" class="form-control" name="lumi" value="<?=$info['LUMICASH']?>" autofocus>   
      </div>
      <div class="col-md-2">
         <label>. </label>
              <input type="submit" value="Enregistrer" class="btn btn-primary btn-block">
             
      </div>
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


