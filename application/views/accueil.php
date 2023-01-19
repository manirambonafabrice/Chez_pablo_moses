<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Accueil</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php
       include 'includes/header.php';
        ?>

    </head>
	<body  style=" background: #c9dbe9">
		<!-- HEADER -->
		<?php
		$lien1="active";
		$lien2="";
		$lien3="";
		$lien4="";

		?>
		<?php
       include 'includes/my_header.php';
        ?>
		<!-- /HEADER -->

		

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row"><div class="col-md-3 col-sm-6 mesure produit"></div></div>
				<div class="row">
					<h5 class="" id="titre1" style="text-align: ;">Visitez nos catégories en cliquant sur les boutons <b>SUIVANT</b> et <b>PRECEDENT</b></h4>
					<ul class="nav nav-tabs">

					    <!-- <li class="active"><a href="#tab1" data-toggle="tab">1</a></li> -->
					    <!-- <li><a href="#tab2" data-toggle="tab">Quantities</a></li>
					    <li><a href="#tab3" data-toggle="tab">Summary</a></li> -->
					    <?php
					    $j=1;
					    $x=1;
							$categori=$this->Model->getListOrdered('categorie','CATEGORIE_DESCR');
						foreach ($categori as $value) {
							if ($j==1) {
							$active="active";
							}else{$active="";}
							// echo $j;
							if($j%4==1){
					    ?>
							 <li style="display: none;" class="<?=$active?>"><a href="#tab<?=$j?>" data-toggle="tab"><?=$x?></a></li>

					    <?php
					    $x++;
						}
					    $j++;
						}
					    ?>
					</ul>
				<!-- 	<ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab">Shipping</a></li>
    <li><a href="#tab2" data-toggle="tab">Quantities</a></li>
    <li><a href="#tab3" data-toggle="tab">Summary</a></li>
</ul> -->
<div class="tab-content">
    <!-- <div class="tab-pane active" id="tab1">
        <a class="btn btn-primary btnNext" >Next</a>
    </div>
    <div class="tab-pane" id="tab2">
        <a class="btn btn-primary btnNext" >Next</a>
        <a class="btn btn-primary btnPrevious" >Previous</a>
    </div>
    <div class="tab-pane" id="tab3">
        <a class="btn btn-primary btnPrevious" >Previous</a>
    </div> -->
    	<?php
					$categori=$this->Model->getListOrdered('categorie','CATEGORIE_DESCR');
					$i=1;
			foreach ($categori as $value) {
				if ($i==1) {
					$active="active";
				}else{$active="";}
				if($i%4==1){
				?>
					<div class="tab-pane <?=$active?>" id="tab<?=$i?>">
					<?php
				}
				?>

					<div id="" class="col-2 col-md-3 col-sm-6 produit" >

						<div class="shop">
							<a href="<?=base_url("Nos_produits")?>/index/<?=$value['CATEGORIE_ID']?>#xxxx" class="cta-btn" style="color: #04274A">
							<div class="shop-img">
								<img class="img" src="<?php echo base_url() ?><?=$value['CATEGORIE_IMAGE']?>" alt=""  >
							</div>
							<div class="shop-body">
								<h3 style="color: #04274A"><?=$value['CATEGORIE_DESCR']?><br></h3>
								Consulter tous les produit<i class="fa fa-arrow-circle-right" style="color: #04274A"></i>
							</div>
							</a>
						</div>

					</div>

					<!-- /shop -->
					<?php
					if($i%4==0){
					?>

					</div> 
					<?php
				}
					$i++;
					}
					?>
</div>
					<!-- shop -->
				

				
				</div>
				<!-- /row -->
				
			</div>
			<div class="row">
				<a class="btn btn-primary btnNext bt" style="float: left;margin-right: 10px">Suivant</a>
				<a class="btn btn-primary btnPrevious bt" style="float: left;" >Précedent</a>
				</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

				<!-- HOT DEAL SECTION -->
		<div id="hot-deal" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-2">
					</div>
					<div class="col-md-8">
						<div class="hot-deal">
							<?php
$this->session->set_flashdata('redirect_url', current_url());
							?>

							
							<h4 class="text-uppercase" id="titre">VOTRE SERVICE DE SUPERMARCHE AU MAGASIN, EN LIGNE OU PAR WHATSAPP
</h4>
							<p class="sous_titre1">Faites vos courses en quelques clicks!</p>
							<div class="col-sm-12" style="">
								
							</div>
							<b>Commandez physiquement au Magasin  : </b>ROHERO I ,Av .Luxembourg,Numero.16<p></p>
							<b>Commandez en ligne sur le siteweb </b>www.chezpablomoses.com<p></p>
							<b>Commandez par whatspp au :</b>77 792 000<p></p>							
							<p class="sous_titre1">DISTRIBUTION PAR LIVAISON OU COLLECTE</p>

							<h3>Commande entre 08h00 et 15h00 pour :</h3>
   <h5>-une livraison dans les 3 heures suivantes.<h5>
   <h5>-une collecte dans les 3 heures et jusqu’à 20 heures.</h5>

							<!-- <div class="col-sm-2" style="text-align: left;">

							<b>Livraison: </b>
							</div><div class="col-sm-10" style="text-align: left;">
						 	<b>.</b> Commande avant 9h00 - Livraison entre 15h00 & 18h<p></p>
						    </div>
							<div class="col-sm-2" style="text-align: left;">
							<b>Collecte: </b>
							</div> <div class="col-sm-10" style="text-align: left;">
							<b>.</b> Commande avant 9h00 - Collecte à partir de 12h00<p></p>
							<b>.</b> Commande avant 15h00 - Collecte entre 18h00 & 21h00
							</div> -->

							<p><a class="primary-btn cta-btn" href="<?=base_url("Commande/passer_commande")?>">Passez votre commande</a>
						</div>
					</div>
					<div class="col-md-2">
					</div>
				</div>
				<!-- /row -->
			</div>

		
		<div class="container" style="margin-top:10px"> <center><img src="<?=base_url()?>uploads/design.jpg" width="80%"></center></div>

		
			<!-- /container -->
		</div>
		<div class="container"> <div class="col-md-2">
					</div>
		<div class="col-md-8">
         <h2 class="text-uppercase" id="titre" style="text-align: center;">PROCEDURE DE COMMANDE </h2>	
					<p class="sous_titre1" style="font-size: 24px;"><b>1.</b> Authentification:</p>

					<b style="font-size:24px; "> → </b>En haut à droit, nous avons un lien <b> S'authentifier</b> dirigeant vers l'interface d'authentification; <p>
					<b style="font-size:24px; "> → </b>Si vous êtes nouveau(nouvelle), cliquer surb nouveau et remplissez correctement le formullaire indiqué;<p>
					<b style="font-size:24px; "> → </b>Si vous êtes deja enregistré, remplissez les identifiants et entre.;<p>

					<p class="sous_titre1" style="font-size: 24px;"><b>2.</b> Commande :</p>

					Choisissez la catégorie de prouits en cliquant dedans et pour chaque produit, choisissez la quantité et cliquez  sur le bouton <b>Ajouter.</b><p></p>
					<p class="sous_titre1" style="font-size: 24px;"><b>3.</b> Verification du panier :</p>
					Verifier votre panier en passant par le menu <b>Mon panier</b> en haut à droite ou en bas au pied de page, par le lien <b>Revue du panier</b><p></p>

					A la fin de votre Commande, Verifiez si vous n'avez rien oublié, et vous avez la possibilité de gérer votre panier, c'est à dire <b>Ajouter, modifier,supprimer</b></b><p></p>
					<p class="sous_titre1" style="font-size: 24px;"><b>4.</b> Distribution :</p>

					Choisissez entre la livaison et la collecte<p></p>

					<b style="font-size:24px; "> → </b> Si  vous choisissez la livraison(25000 Minimum), consultez les frais de livarison (selon les quartiers) et horaires;
					<p></p>
					<b style="font-size:24px; "> → </b> Si vous préferer la collecte, qui est gratuite, Consulter les horaires et verifier notre adresse:
					 <b> Rohero1 , Avenue Luxembourg, No16</b><p></p>

					 <p class="sous_titre1" style="font-size:24px;"><b>5.</b> Validation :</p>
					 Consulter le recapitulatif de votre facture et valider votre paiment;<p>

					 <p class="sous_titre1" style="font-size:24px;"><b>6.</b> Paiement :</p>

					 Choisissez entre <b>Mobile Money, Online Banking / versement Bancaire</b>ou paiement <b>Cash.</b><p>

					 <b style="font-size:24px; "> → </b> Si vous choisissez Mobile Money: ECOCASH, LUMICASH OU PESA FLASH, consultez les frais de transfert;<p></p>

					  <b style="font-size:24px; "> → </b> Si vous préferer OnLine Banking ou versement Bancaire, consultez la liste de nos comptes Bancaire;<p></p>

					  <b style="font-size:24px; "> → </b> Si vous optez pour le cash, obtenez d'abord l'autorisation préalable de la direction au 77 792 000;<p></p>
					  <p class="sous_titre1" style="font-size:24px;"><b>7.</b> Confirmation :</p>

					  Choisissez le mode de notification parlequel nous vous confirmerons la validation de votre commande: <b>email,SMS ou whatsapp</b>
		</div>
		<div class="col-md-2">
		</div>			
		</div>


		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		
		<!-- /SECTION -->

	
		<!-- FOOTER -->
			<!-- jQuery Plugins -->
	<?php
       include 'includes/pied.php';
        ?>
		<?php
       include 'includes/footer.php';
        ?>
		<!-- /FOOTER -->

	

	</body>
</html>
<script type="text/javascript">
	 $('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
</script>
<script type="text/javascript">
	$('.img').each(function(){

        $(this).height($(this).width()*0.8);
        $(this).size('.star-size');
         var text_input = $('.star-size');
    text_input.css("font-size", $(this).height()*0.8);

});
</script>
<script type="text/javascript">
	$(document).on('click','.bt',function(){
		 // alert($('.mesure').width());
$('.img').height($('.mesure').width()*0.8);
        $(this).size('.star-size');
         var text_input = $('.star-size');
    // text_input.css("font-size", $(this).height()*0.8);

	 })

	$(window ).resize(function(){
		$('.img').height($('.mesure').width()*0.8);
        $(this).size('.star-size');
         var text_input = $('.star-size');
	})
</script>

<script type="text/javascript">
	
</script>
