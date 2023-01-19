<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Bonus</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php
       include 'includes/header.php';
        ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    </head>
	<body  style=" background: #c9dbe9">
		<!-- HEADER -->
		<?php
		$lien1="";
		$lien2="";
		$lien3="";
		$lien4="";
		$lien5="active";

		?>
		<?php
       include 'includes/my_header.php';
        ?>
		<!-- /HEADER -->
<!--  -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
			<?php

			if (!empty($this->session->userdata('USER_TELEPHONE'))) {
			
			?>
<form id="myform" action="<?= base_url('Bonus/change') ?>" method="POST" enctype="multipart/form-data">	
<select class="selectpicker "  multiple="multiple" data-live-search="true" name="bonus[]" >
	<?php 
	foreach ($resultat1 as  $value1) {
										
	?>
  <option value="<?=$value1['PRODUIT_ID']?>"<?php if($value1['FOR_BONUS']==1)echo "selected"; ?>><?=$value1['PRODUIT_DESCR']?></option>
  
  <?php
}
  ?>
</select><input type="submit" name="submit" id="submit" style="background: #01B7EF;color: white"  class="search-btn" value="Enregistrer" >  
</form>
			<?php

			}
			
			?>
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Produits de bonus</h3>
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
							<input id="TTL" type="text" name="TTL" class="form-control input-sm" autocomplete="off" placeholder="Quantité" value="0">
							<div class="products-tabs">
			 					<!-- tab -->
								<div id="tab2" class="tab-pane fade in active">
									<div class="products-slick" data-nav="#slick-nav-2">

										<?php 
										// $produit=$this->Model->getRequete("SELECT* FROM produit order by PRODUIT_PRIX desc limit 10");
										// print_r($produit);



										if (!empty($this->session->userdata('CLIENT_ID'))) {
	$point1=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(PRIX),0) as n from vente where CLIENT=".$this->session->userdata('CLIENT_ID')." AND ID_TYPE_REDUCTION=0");
    $point2=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(REDUCTION_POINT),0) as n from vente where CLIENT=".$this->session->userdata('CLIENT_ID')." AND ID_TYPE_REDUCTION=1");
    $REST= $point1['n']-$point2['n'];
										}else{
										$REST='';
										}
	

										foreach ($resultat as  $value) {
										$req=$this->Model->getRequeteOne("SELECT PA_UNITAIRE as n FROM requisition r join qr_code_requisition qr on r.ID_REQUISITION=qr.ID_REQUISITION where r.PRODUIT_ID=".$value['PRODUIT_ID']." AND QR_CODE not in( select QR_CODE from vente) order by r.ID_REQUISITION desc LIMIT 1");

										if(!empty($req)){
											$pp=$req['n'];
											
										}else $pp="Pas disponibe";
										?>
										<!-- product -->
										<input id="RESTE" type="hidden" name="RESTE" class="form-control input-sm" autocomplete="off" placeholder="Quantité" value="<?=$REST?>">
										

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
												<h4 class="product-price"><?=$pp?>
												 <!-- <del class="product-old-price">40 000BIF</del> --></h4>
												<div class="product">
													<input id="produit<?=$value['PRODUIT_ID']?>" type="number" name="montant" class="form-control input-sm" autocomplete="off" placeholder="Quantité">	
													<input id="bonus<?=$value['PRODUIT_ID']?>" type="hidden" name="bonus" class="form-control input-sm" autocomplete="off" placeholder="Quantité" value="<?=$pp?>">
													
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
												<button id="<?=$value['PRODUIT_ID']?>" class="add-to-cart-btn ajout_panier"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
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
				<?php
					if (empty($resultat)) { ?>
						<i class="fa fa-exclamation-triangle" style="color: red;font-size: 35px; text-align: center;float: center"> Aucun produit</i>

						<?php
					}
					?>
			</div>
			<!-- /container -->
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
