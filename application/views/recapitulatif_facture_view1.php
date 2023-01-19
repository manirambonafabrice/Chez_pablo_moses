<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Recapitulatif facture</title>
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

		<!-- <h4 class="text-uppercase" id="titre" style="text-align: ;">RECAPITULATIF DE VOTRE FACTURE</h4> -->
		

<!-- <?php print_r($info) ?> -->
<div class="col-sm-3"></div><div class="col-sm-6">
<!-- <table bgcolor="white" style="background: white" class="table table-bordered" style="color:black">
	<tr><th style="text-align: center" colspan="4">Facture No: <?=$id_commande?></th></tr>
	<tr><th style="text-align: center">Produit</th>
		<th style="text-align: center">Qté</th>
		<th style="text-align: center">P.U</th>
		<th style="text-align: center">P:T</th></tr>

		<?php 
		// print_r($cmd);
		$user=$this->Model->getOne("users",array("USER_ID"=>$cmd['USER_ID']));
		$produit=$this->Model->getList(" produit_commande",array('COMMANDE_ID'=>$id_commande));
		$total=0;
		foreach ($produit as  $value) {
			$pro=$this->Model->getOne("produit",array('PRODUIT_ID'=>$value['PRODUIT_ID']));
			$total+=$value['PRIX_TOTAL'];
			?>
<tr><td style="text-align: center"><?=$pro['PRODUIT_DESCR']?></td>
		<td style="text-align: right"><?=$value['QUANTITE']?></td>
		<td style="text-align: right"><?=$value['PRIX_UNITAIRE']?></td>
		<td style="text-align: right"><?=$value['PRIX_TOTAL']?></td></tr>

			<?php
		}
		?>
		<tr><td style="text-align: center"></td>
		<td style="text-align: center"></td>
		<th style="text-align: center">FRAIS DE TRANSPORT</th>
		<td style="text-align: right"><?=$this->session->userdata('FRAIS')?></td></tr>
		<tr><td style="text-align: center"></td>
		<td style="text-align: center"></td>
		<th style="text-align: center">FRAIS DE TRANSFERE</th>
		<td style="text-align: right"><?=$cmd['FRAIS_DE_TRANSFAIRE']?></td></tr>
		<tr><td style="text-align: center"></td>
		<td style="text-align: center"></td>
		<th style="text-align: center">TOTAL GLOBAL</th>
		<th style="text-align: right"><?=$total+$cmd['FRAIS_DE_TRANSFAIRE']+$this->session->userdata('FRAIS')?></th></tr>
		<tr ><th colspan="4"><?=$user['NOM_USER']?> <?=$user['PRENOM_USER']?></th></tr>

</table> -->
<p style="color: green;font-size: 30px ">Merci pour votre commande.Un message de confirmation vous sera envoyé sous peu par <?=$cmd['MODE_DE_CONFIRMATION']?> à l' adresse <b><?=$cmd['ADRESSE_DE_CONFIRMATION']?></b><br> A bientôt.</p>

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
