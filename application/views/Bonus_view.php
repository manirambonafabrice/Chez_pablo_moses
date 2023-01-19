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
			<!-- MODAL AJOUT PRODUIT-->
			<div class='modal fade' id='produit' tabindex="-1">
			    <div class='modal-dialog '>
			      <div class='modal-content'>
			        <div class='modal-header'>
			          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
			          <h4 class="modal-title">Ajout </h4>
			          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
			          
			        </div>

			        <div class="modal-body col-md-12"  id="dialog" title="Actualité"   style="background:#c9dbe9">
			          <span id="msg"></span>
			    
			<form id="myform" action="<?= base_url('Bonus/enregistrer') ?>" method="POST" enctype="multipart/form-data">	
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Produit:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
				<select class="form-control "  name="produit" required >
					<option value="">--choisir--</option>
	<?php 
	foreach ($resultat1 as  $value1) {
										
	?>
  <option value="<?=$value1['PRODUIT_ID']?>"><?=$value1['PRODUIT_DESCR']?></option>
  
  <?php
}
  ?>
</select>	
					</div>
					
				</div>
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Prix de subvention:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="number" name="prix" class="form-control input-sm" autocomplete="off" required>	
					
					</div>
					
				</div>
<input type="submit" name="submit" id="submit" style="background: #01B7EF;color: white"  class="form-control" value="Enregistrer" >  
</form>
			<!-- <img id"crop" src="<?=base_url()?>uploads/19261795.jpg" style="width: 400px"> -->

			      </div>
			    </div>
			  </div>
			</div>

<?php
	foreach ($resultat as $value) {
		// print_r($resultat);
?>


						<!-- MODAL UPDATE PRODUIT-->
			<div class='modal fade' id='modifications<?=$value['PRODUIT_ID']?>' tabindex="-1">
			    <div class='modal-dialog '>
			      <div class='modal-content'>
			        <div class='modal-header'>
			          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
			          <h4 class="modal-title">Modification prix </h4>
			          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
			          
			        </div>

			        <div class="modal-body col-md-12"  id="dialog" title="Actualité"   style="background:#c9dbe9">
			          <span id="msg"></span>
			    
			<form id="myform" action="<?= base_url('Bonus/Modification') ?>" method="POST" enctype="multipart/form-data">	

				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Prix de subvention:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="number" name="prix" class="form-control input-sm" autocomplete="off" required value="<?=$value['PRIX_BONUS']?>">	
				<input type="hidden" name="id_pr"  class="" autocomplete="off" required value="<?=$value['PRODUIT_ID']?>">		
					</div>
					
				</div>
<input type="submit" name="submit" id="submit" style="background: #01B7EF;color: white"  class="form-control" value="Enregistrer" >  
</form>
			<!-- <img id"crop" src="<?=base_url()?>uploads/19261795.jpg" style="width: 400px"> -->

			      </div>
			    </div>
			  </div>
			</div>	


									<!-- MODAL UPDATE PRODUIT-->
			<div class='modal fade' id='mydeletes<?=$value['PRODUIT_ID']?>' tabindex="-1">
			    <div class='modal-dialog '>
			      <div class='modal-content'>
			        <div class='modal-header'>
			          <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
			          <h4 class="modal-title">Modification prix </h4>
			          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
			          
			        </div>

			        <div class="modal-body col-md-12"  id="dialog" title="Actualité"   style="background:#c9dbe9">
			          <span id="msg"></span>
			    
<div class='modal-footer'>
                                                    <a class='btn btn-danger btn-md' href='<?= base_url('Bonus/delete/') ?><?= $value['PRODUIT_ID']?>'>Retirer des subventions</a>
                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Quitter</button>
                                                </div>
			<!-- <img id"crop" src="<?=base_url()?>uploads/19261795.jpg" style="width: 400px"> -->

			      </div>
			    </div>
			  </div>
			</div>

<?php } ?>


			<div class="container">
				<!-- row -->


			<?php
 
			if (!empty($this->session->userdata('USER_TELEPHONE'))) {
			
			?>

			<?php

			}
			
			?>
				<div class="row">

					<!-- section title -->
					<div class="col-md-12">
						<div class="section-title">
							<h3 class="title">Produits de bonus</h3><p></p>
							<?php
				 
							if (!empty($this->session->userdata('USER_TELEPHONE'))) {
							
							?>
							<a href='' data-toggle='modal' data-target='#produit'><button class="btn btn-primary btn-md  btn-lg">ajouter produit subvention</button></a>
							<?php } ?>
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
<?php
if (!empty($this->session->userdata('CLIENT_ID'))) {
	// $point1=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(PRIX),0) as n from vente where CLIENT=".$this->session->userdata('CLIENT_ID')." AND ID_TYPE_REDUCTION=0");
 //    $point2=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(REDUCTION_POINT),0) as n from vente where CLIENT=".$this->session->userdata('CLIENT_ID')." AND ID_TYPE_REDUCTION=1");
 //    $REST= $point1['n']-$point2['n'];
    $point1=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(PRIX_TOTAL),0) as n from achat_points where CLIENT=".$this->session->userdata('CLIENT_ID')." AND BONUS=0");
    $point2=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(PRIX_TOTAL),0) as n from achat_points where CLIENT=".$this->session->userdata('CLIENT_ID')." AND BONUS=1");
    $REST= $point1['n']-$point2['n'];
										}else{
										$REST=0;
										}
?>
<input id="RESTE" type="hidden" name="RESTE" class="form-control input-sm" autocomplete="off" placeholder="Quantité" value="<?=$REST?>">
					<!-- Products tab & slick -->
					<div class="col-md-12 aa">
						<div class="row">
							<input id="TTL" type="hidden" name="TTL" class="form-control input-sm" autocomplete="off" placeholder="Quantité" value="0">
							
							<ul class="nav nav-tabs">

					    <?php
					    $j=1;
					    $x=1;
							
						foreach ($resultat as $value) {
							if ($j==1) {
							$active="active";
							}else{$active="";}
							// echo $j;
							if($j%8==1){
					    ?>
							<li class="<?=$active?> tabu"><a href="#tab<?=$j?>" data-toggle="tab"><?=$x?></a></li>

					    <?php
					    $x++;
						}
					    $j++;
						}
					    ?>
					</ul>


										<div class="tab-content">
					    <!-- <div class="tab-pane active" id="tab1">
					        <a class="btn btn-primary btnNext" >Next</a>
					    </div> -->
					    
					    
					

					
			<?= $this->session->flashdata('message') ?>
			
			<?php
			$i=0;
			// $produit=$this->Model->getListOrdered('produit','PRODUIT_DESCR',array("CATEGORIE_ID"=>$id));
			foreach ($resultat as $value) {
				$req=$this->Model->getRequeteOne("SELECT PA_UNITAIRE as n FROM requisition r join qr_code_requisition qr on r.ID_REQUISITION=qr.ID_REQUISITION where r.PRODUIT_ID=".$value['PRODUIT_ID']." AND QR_CODE not in( select QR_CODE from vente) order by r.ID_REQUISITION desc LIMIT 1");

				$requi=$this->Model->getRequeteOne("SELECT IFNULL(SUM(NOMBRE),0) as n from requisition where PRODUIT_ID=".$value['PRODUIT_ID']);
				$vente=$this->Model->getRequeteOne("SELECT IFNULL(SUM(QUANTITE),0) as n from vente where PRODUIT_ID=".$value['PRODUIT_ID']);
				$rest=$requi['n']-$vente['n'];



										if(!empty($req)){
											$pp=$req['n'];
											
										}else $pp="Pas disponibe";

				$i++;
				if ($i==1) {
					$active="active";
				}else{$active="";}

				if($i%8==1){
				?>
				<!-- <div class="img" style="background: ; width: 100px;float: left; margin:5px"> -->
					<div class="tab-pane <?=$active?>" id="tab<?=$i?>">

				<?php
				}
				?>
					        
					    
<div  class='col-sm-3'>
			
				<!-- <img class="img" src="<?=base_url()?><?=$value['PRODUIT_IMAGE']?>" width="100%" heigth=""><article style="font-size: 10px"><?=$value['PRODUIT_DESCR']?></article> -->
			<!-- </div> -->
			<?php
 			if (!empty($this->session->userdata('USER_TELEPHONE'))) {
 													
 														?>
			<div id='gestion' class=' ' style='display:'><a href='' data-toggle='modal' data-target='#modifications<?=$value['PRODUIT_ID']?>'><div  class='col-md-6'><i class='fa fa-edit' style='color:'></i></div></a><div  class='col-md-6'><a href='' id='' class='delete' data-toggle='modal' data-target='#mydeletes<?=$value['PRODUIT_ID']?>'><span style='color:red'>x</span></div></a></div>
	<?php } ?>

										
										<div class="product">

											<div class="product-img">
												<img src="<?=base_url()?><?=$value['PRODUIT_IMAGE']?>" alt="" class='img'>

												<div class="product-label">
													<!-- <span class="sale">-30%</span> -->
													<!-- <span class="new">NEW</span> -->
												</div>
											</div>
											<div class="product-body">
												<!-- <p class="product-category">Category</p> -->
												<!-- <h3 class="product-name"><a href="#"><?=$value['PRODUIT_DESCR']?></a></h3> -->
												<div style="height: 50px;background-color: ">
												<h3 class="product-name"><a href="#"><?=$value['PRODUIT_DESCR']?></a></h3>
												</div>
												<h4 class="product-price"><?=$value['PRIX_BONUS']?>
													<!-- <del class="product-old-price">40 000BIF</del></h4> -->
												<div class="">
														<?php
														
												if ($rest>0) {
												?>
													<input type="number" id="produit<?=$value['PRODUIT_ID']?>" name="montant" class="form-control input-sm" autocomplete="off" placeholder="Quantité">
													<input id="bonus<?=$value['PRODUIT_ID']?>" type="hidden" name="bonus" class="form-control input-sm" autocomplete="off" placeholder="Quantité" value="<?=$value['PRIX_BONUS']?>">
												<?php
												}else{
												?>
												<input type="number" id="produit<?=$value['PRODUIT_ID']?>" name="montant" class="form-control input-sm" autocomplete="off" placeholder="Indisponible" readonly>
												<?php
												}
												?>	
												</div>
												<div class="product-btns">
													
												</div>
											</div>
											<?php
 												if (!empty($this->session->userdata('CLIENT_TELEPHONE'))) {
 													// if ($pp=='Pas disponibe') {
 														?>
												<!-- <button id="<?=$value['PRODUIT_ID']?>" class="form-control add-to-cart-btn " data-toggle="modal" style="background: #01B7EF"  onclick="alert('Pas disponibles');"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button> -->
												<?php
 													// }else{
												?>
												<button id="<?=$value['PRODUIT_ID']?>" class="form-control add-to-cart-btn ajout_panier" style="background: #01B7EF" ><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
												<?php
											// }
											}else{ ?>
											
											<button id="<?=$value['PRODUIT_ID']?>" class="form-control add-to-cart-btn ajout_panier" data-toggle="modal" style="background: #01B7EF" data-target="#so" onclick="alert('Avant de faire toute commande , Veuillez d\'abord vous authentifier');"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
										<?php } ?>
										</div>
	
</div>
<?php
if($i%8==0){
?>
</div>
<?php
}
}
?>

<!-- /// -->



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
 
<p><a class="primary-btn" href="<?=base_url("Commande/Confirmation_commande")?>" style="font-size: 20px;width: 100%">validez votre commande</a>
 
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
