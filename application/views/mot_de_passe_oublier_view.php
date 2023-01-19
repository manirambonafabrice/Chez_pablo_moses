<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Mot de passe oublié</title>
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

		?>
		<?php
       include 'includes/my_header.php';
        ?>
		<!-- /HEADER -->
		<div class="container">
		<div class="row">
    
     <?= $this->session->flashdata('message') ?>
             
<form action="<?=base_url()?>Abone/recuperation_pwd" method="POST" >
            <div class="container-fluid row" >
                <div class="col-md-4 form-group">
                    <input type="text" name="tel" autofocus="off" autocomplete="off" autosave="off" required placeholder="Entrer votre numero de telephone "  class="form-control">
                </div>
               
                <div class="col-md-2 form-group">
                    <input name="submit" type="submit" value="LANCER" class="btn btn-light active form-control">
                </div>
            </div>
        </form>
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
