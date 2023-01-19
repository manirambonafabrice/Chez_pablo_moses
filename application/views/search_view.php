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
		<!-- <div class="col-md-12 aa">
						<div class="row"> -->
							<div class="products-tabs">
								<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">

										<?php 
										// $produit=$this->Model->getRequete("SELECT* FROM produit order by PRODUIT_PRIX desc limit 10");
										// print_r($produit);
										foreach ($resultat as  $value) {

											$requi=$this->Model->getRequeteOne("SELECT IFNULL(SUM(NOMBRE),0) as n from requisition where PRODUIT_ID=".$value['PRODUIT_ID']);
				$vente=$this->Model->getRequeteOne("SELECT IFNULL(SUM(QUANTITE),0) as n from vente where PRODUIT_ID=".$value['PRODUIT_ID']);
				$rest=$requi['n']-$vente['n'];
										
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
												<div class="product-rating">
													<!-- <input id="produit<?=$value['PRODUIT_ID']?>" type="number" name="montant" class="form-control input-sm" autocomplete="off" placeholder="Quantité"> -->
														<?php
												if ($rest>1) {
												?>
													<input type="number" id="produit<?=$value['PRODUIT_ID']?>" name="montant" class="form-control input-sm" autocomplete="off" placeholder="Quantité">	
													<?php
												}else{
												?>
												<input type="number" id="produit<?=$value['PRODUIT_ID']?>" name="montant" class="form-control input-sm" autocomplete="off" placeholder="Indisponible" readonly>
												<?php
												}
												?>		
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
						<!-- </div>
					</div> -->
					<?php
					if (empty($resultat)) { ?>
						<i class="fa fa-exclamation-triangle" style="color: red;font-size: 35px; text-align: center;float: center"> Aucun resultat</i>

						<?php
					}
					?>
		</div>
		</div>
		<div class="container" id="nos_prod" style="margin-top: 10px">
	<div class="dropdown">
									<a class="" data-toggle="modal" data-target="#cart">
										<i class="fa fa-shopping-cart" style="font-size: 40px"></i>
										<span>Mon panier</span>
										<div id="quantite1" class="qty"><?=$i?></div>
									</a>

									
									</div>
									<?php
									// $this->cart->contents
									
									?>
 
<p><a class="primary-btn cta-btn form-control " href="<?=base_url("Commande/Confirmation_commande")?>">Passer votre commande</a>
 
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
