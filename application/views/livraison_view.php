<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Livraison</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php
       include 'includes/header.php';
        ?>
        <style type="text/css">
        input[type="submit"]
{
    font-size:24px;
}

</style>
    </head>
	<body  style=" background: #c9dbe9">
		<!-- HEADER -->
		<?php
		$lien1="";
		$lien2="";
		$lien3="";
		$lien4="";

		?>
		<?php
       include 'includes/my_header.php';
        ?>
		<!-- /HEADER -->
		<div class="container">
		<div class="row">
			<div class="col-sm-3"></div>
			<div class="col-sm-6">

				<h2 class="text-uppercase" id="titre">Livraison</h2>

<form method="POST" enctype="multipart/form-data" id="myform"action="<?=base_url().'Commande/add_livraison/'?>">
									<label>Destination de livraison</label>
									 <select class="form-control" id="DESTINATION" name="DESTINATION" required><option value="">--choisir--</option>
                                    <?php
                                    	$quartier=$this->Model->getList("quartier_de_distribution");
                                    	foreach ($quartier as  $value) {
                                    		?>
                                    		<option value="<?=$value['QUARTEIR_ID']?>"> <?=$value['QUARTIER_NOM']?>(<?=$value['QUARTIER_COUT']?>FBU) </option>
                                    		<?php
                                    	}
                                    ?>
                                    
                                  </select>
                                  <label>Adresse</label>
                                  <textarea class="form-control" name="adresse" required></textarea>
                                  <label>Numero de contact lors de la livraison</label>
                                   <input required type="number" class="form-control" name="TELEPHONE" value="">

                                    <input type="submit" style="margin-top: 10px; height: 50px " value="Validez votre choix" class="btn btn-primary btn-block">
                                </form>
</div>
<div class="col-sm-3"></div>
		</div>
		</div>
		
		<!-- jQuery Plugins -->
	<?php
       include 'includes/pied.php';
        ?>

		<!-- FOOTER -->
		<?php
       include 'includes/footer.php';
        ?>
		<!-- /FOOTER -->

	</body>
</html>
