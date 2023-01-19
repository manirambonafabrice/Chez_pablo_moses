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
					<h5 class="" id="titre1" style="text-align: ;">Basculer nos catégorie en clickant sur les boutons <b>suivant</b> et <b>Précedent</b></h4>
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
							<li class="<?=$active?>"><a href="#tab<?=$j?>" data-toggle="tab"><?=$x?></a></li>

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
								<b>Commandez</b> en ligne, par téléphone ou au magasin.<p></p> <b>Faites-vous livré(s)</b> à domicile ou au Bureau <p></p><b>ou Alors<p></p> collectez</b> directement au magasin.<p></p>
							</div>
							<p class="sous_titre1"><b>PAS DE VENTE AU COMPTOIRE, UNIQUEMEMNT PAR COMMANDE:</b></p>
							<b>Commandez en ligne sur le siteweb </b>www.chezpablomoses.com<p></p>
							<b>Commandez par whatspp au :</b>77 792 000<p></p>
							<b>Commandez physiquement au Magasin  : </b>ROHERO I ,Av .Luxembourg,Numero.16<p></p>
							<p class="sous_titre1">DISTRIBUTION PAR LIVAISON OU COLLECTE</p>

							<h3>Commande entre 08h00 et 15h00 pour :</h3>
   <h5>-une livraison dans les 3 heures suivantes.<h5>
   <h5>-une collecte dans les 3 heures et jusqu’à 20 heures.  </h5>

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
			<!-- /container -->
		</div>
		<!-- /HOT DEAL SECTION -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Top ventes</h3>
							<div class="section-nav">
								<!-- <ul class="section-tab-nav tab-nav">
									<li class="active"><a data-toggle="tab" href="#tab2">Laptops</a></li>
									<li><a data-toggle="tab" href="#tab2">Smartphones</a></li>
									<li><a data-toggle="tab" href="#tab2">Cameras</a></li>
									<li><a data-toggle="tab" href="#tab2">Accessories</a></li>
								</ul> -->
							</div>
						</div>
					</div>
					<!-- /section title -->

					<!-- Products tab & slick -->
					<div class="col-md-12 aa">
						<div class="row">
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">

										<?php 
										$produit=$this->Model->getRequete("SELECT* FROM produit order by PRODUIT_PRIX desc limit 10");
										// print_r($produit);
										foreach ($produit as  $value) {
										
										?>
										<!-- product -->
										<div class="product">
											<div class="product-img">
												<img class="img" src="<?php echo base_url() ?><?=$value['PRODUIT_IMAGE']?>" alt="">
												<div class="product-label">
													<!-- <span class="sale">-30%</span> -->
													<!-- <span class="new">NEW</span> --> 
												</div>
											</div>
											<div class="product-body">
												<!-- <p class="product-category">Category</p> -->
												<h3 class="product-name"><a href="#"><?=$value['PRODUIT_DESCR']?></a></h3>
												<h4 class="product-price"><?=$value['PRODUIT_PRIX']?>
												 <!-- <del class="product-old-price">40 000BIF</del> --></h4>
												<div class="product">
													<input id="produit<?=$value['PRODUIT_ID']?>" type="number" name="montant" class="form-control input-sm" autocomplete="off" placeholder="Quantité">	
												</div>
												<div class="product-btns">
													<!-- <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
													<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to compare</span></button>
													<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></button> -->
												</div>
											</div>
											<div class="add-to-cart">
												<?php
 												if (!empty($this->session->userdata('CLIENT_TELEPHONE'))) {
												?>
												<button id="<?=$value['PRODUIT_ID']?>" class="add-to-cart-btn ajout_panier" onclick="//ajout_panier('<?=$value['PRODUIT_ID']?>');"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
												<?php
											}else{
												?>

												<button id="<?=$value['PRODUIT_ID']?>" class="add-to-cart-btn ajout_panier" data-toggle="modal" data-target="#so" onclick="alert('Veuillez d\'abord vous authentifier');"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
												<?php
											}

											?>
											</div>
										</div>
										<?php
										}
										?>
										<!-- /product -->

									</div>
									<div id="slick-nav-2" class="products-slick-nav"></div>
								</div>
								<!-- /tab -->
							</div>
						</div>
					</div>
					<!-- /Products tab & slick -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
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
