<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Nos produits</title>
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
		$lien4="active";

		?>
		<?php
       include 'includes/my_header.php';
        ?>
		<!-- /HEADER -->
		<div class="container" style="margin-bottom: 20px">

		<div class="row"><div class="col-md-3 col-sm-6 mesure"></div></div>
			<!-- CATEGORIE -->
		<div class="row" style="min-height: 10px;margin-bottom: 20px">
			<h4 class="text-uppercase" id="titre" style="text-align: ;">Nos categories</h4>


			<p class="sous_titre1" style="font-size: 18px;">Clickez sur une catégorie pour sélectionner le(s )produit(s), déterminer la quantité  dans la case indiquée,puis ajouter au panier en pressant le bouton correspondant:</p>
			<?= $this->session->flashdata('message') ?>
			<?php
			// echo 5%4;
			$categori=$this->Model->getListOrdered('categorie','CATEGORIE_DESCR');
			foreach ($categori as $value) {

				?>
				<div class="img1" style="background: ; width: 100px;float: left; margin-right:20px; margin-bottom: 55px;">
				<?php

						if (!empty($this->session->userdata('USER_TELEPHONE'))) {
	
							echo "<div id='gestion' class=' ".$value['CATEGORIE_ID']."' style='display:'><a href='' data-toggle='modal' data-target='#modification".$value['CATEGORIE_ID']."'><div  class='col-md-6'><i class='fa fa-edit' style='color:'></i></div></a><div  class='col-md-6'><a href='' id='".$value['CATEGORIE_ID']."' class='delete' data-toggle='modal' data-target='#mydelete".$value['CATEGORIE_ID']."'><span style='color:red'>x</span></div></a></div>";

							}
				?>
				<a href="#xxxx"><img class="img1 categ" id="<?=$value['CATEGORIE_ID']?>" src="<?=base_url()?><?=$value['CATEGORIE_IMAGE']?>" width="100%" heigth=""></a><b><article style="font-size: 12px"><?=$value['CATEGORIE_DESCR']?></article></b></div>

				<!-- MODAL DELETE -->

				<div class='modal fade' id='mydelete<?=$value['CATEGORIE_ID']?>' tabindex="-1">
				    <div class='modal-dialog'>
				      <div class='modal-content'>
				        <div class='modal-header'  style="background: #c9dbe9">
				           <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
				          <h3 class="modal-title">Suppression</h3>
				          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
				        </div>

				        <div class="modal-body" id="dialog1" title="Authentification"   style="background: #c9dbe9">
				          <span id="msg"></span>
				          <h5>Voulez-vous vraiment supprimer cette catégorie?</h5>
				      </div>
				      <div class='modal-footer'>
				                                                    <a class='btn btn-danger btn-md' href='<?= base_url('Nos_produits/delete_categorie/')?><?=$value['CATEGORIE_ID']?>'>Oui</a>
				                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Non</button>
				                                                </div>
				    </div>
				  </div>
				</div>

				<!-- MODAL MODIFIER -->
			<div class='modal fade' id='modification<?=$value['CATEGORIE_ID']?>' tabindex="-1">
			    <div class='modal-dialog'>
			      <div class='modal-content'>
			        <div class='modal-header'>
			           <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
			          <h4 class="modal-title">Modification d'une catégorie</h4>
			          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
			          
			        </div>

			        <div class="modal-body col-md-12"  id="dialog" title="Actualité"   style="background:#c9dbe9">
			          <span id="msg"></span>
			         <form id="myform" action="<?= base_url('Nos_produits/update/') ?><?=$value['CATEGORIE_ID']?>" method="POST" enctype="multipart/form-data">
			 	

			<div class="col-md-12" >
				
					 <div class="col-md-4 sm-12 xs-12 form-group">
						<label>Titre :</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="text" name="titre" value="<?=$value['CATEGORIE_DESCR']?>" class="form-control input-sm" autocomplete="off" required>		
					</div>
					
				</div>
				
				
				<div class="col-md-12" >
					 <div class="col-md-4 sm-12 xs-12 form-group">
						<label>Photo:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					<input type="file" name="foto" accept="image/*" id="gallery-photo-add" required>

				
				<input type="file" name="pj" id="pj" class="form-control input-sm" autocomplete="off" style="display: none;">

						
					</div>
					<div class="gallery"></div>
				</div>
				
				<div class="col-md-12 form-group">

					

						<input type="submit" name="submit" id="submit" style="background: #01B7EF;color: white"  class="search-btn  form-control" value="Modifier" >    
					
					</div>

			</form>
			<!-- <img id"crop" src="<?=base_url()?>uploads/19261795.jpg" style="width: 400px"> -->

			      </div>
			    </div>
			  </div>
			</div>
				<?php
			}

			if (!$categori) {
				echo "<h3 style='color:red'>Aucune catégorie de produits enregistrée</h3>";
			}
			?>

			
		<!-- MODAL AJOUT -->
			<div class='modal fade' id='srcs' tabindex="-1">
			    <div class='modal-dialog '>
			      <div class='modal-content'>
			        <div class='modal-header'>
			           <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
			          <h4 class="modal-title">Ajout d'une catégorie</h4>
			          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
			          
			        </div>

			        <div class="modal-body col-md-12"  id="dialog" title="Actualité"   style="background:#c9dbe9">
			          <span id="msg"></span>
			         <form id="myform" action="<?= base_url('Nos_produits/ajout') ?>" method="POST" enctype="multipart/form-data">
			 	

			<div class="col-md-12" >
				
					 <div class="col-md-4 sm-12 xs-12 form-group">
						<label>Titre :</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="text" name="titre" class="form-control input-sm" autocomplete="off" required>		
					</div>
					
				</div>
				
				
				<div class="col-md-12" >
					 <div class="col-md-4 sm-12 xs-12 form-group">
						<label>Photo:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					<input type="file" name="foto" accept="image/*" id="gallery-photo-add" required>

				
				<input type="file" name="pj" id="pj" class="form-control input-sm" autocomplete="off" style="display: none;">

						
					</div>
					<div class="gallery"></div>
				</div>
				
				<div class="col-md-12 form-group">

					

						<input type="submit" name="submit" id="submit" style="background: #01B7EF;color: white"  class="search-btn  form-control" value="Enregistrer" >    
					
					</div>

			</form>
			<!-- <img id"crop" src="<?=base_url()?>uploads/19261795.jpg" style="width: 400px"> -->

			      </div>
			    </div>
			  </div>
			</div>	


</div>
			<?php

			if (!empty($this->session->userdata('USER_TELEPHONE'))) {
			
			?>
			<div class="row" style="background: ; width: 100px;float:; ; margin:5px;margin-top: -10px;clear: left;">
			 	 <a href="" data-toggle="modal" data-target="#srcs"> 
			 	 	<div id='srvc' class="inner-block"  style="background: ;width: 100% ; border: 1px solid  black;border-radius: 25px;text-align: center; margin-bottom: 0px">
					<i class="fa fa-plus " style="color:black;" ></i>

					</div>
				</a>
			</div>
			<?php
			}
			?>


</div>
<!-- FIN CATEGORIE -->

	<!-- PRODUIT -->
<div class="container" id="xxxx" style="background: #01B7EF;height: 1px" >
	
</div>
<div class="container" id="nos_prod">
	
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

        $(this).height($('.mesure').width()*0.8);
        $(this).size('.star-size');
         var text_input = $('.star-size');
    text_input.css("font-size", $(this).height()*0.8);

});
	$('.img1').each(function(){

        $('.img1').height($(this).width()*0.8);
        $(this).size('.star-size1');
         var text_input = $('.star-size1');
    text_input.css("font-size", $('.mesure').height()*0.8);

});
	$(document).on('click','.bt',function(){
		 // alert($('.mesure').width());
$('.img').height($('.mesure').width()*0.8);
        $(this).size('.star-size');
         var text_input = $('.star-size');
    // text_input.css("font-size", $(this).height()*0.8);

	 })
</script>
<script type="text/javascript">
	$(document).ready( function () {
		// var id=$(this).attr("id");
		// alert(id);
		$("article").each(function(){
	var readMoreHtml=$(this).html();
      var lessText=readMoreHtml.substr(0,30);

      if(readMoreHtml.length >30){
      	$(this).html(lessText+"<span style='color:#01B7EF'>[...]</span>").append("<a href='' style='color:#01B7EF' class='read-more-link'>+</a>");
      }else{
      	$(this).html(readMoreHtml);
      }
$(this).on('click','.read-more-link',function(event){
	event.preventDefault();
 	 $(this).parent('article').html(readMoreHtml).append("<a href='' style='color:#01B7EF' class='show-less'>-</a>");
});

$(this).on('click','.show-less',function(event){
	event.preventDefault();
 	 $(this).parent('article').html(lessText +"<span style='color:#01B7EF'>[...]</span>").append("<a href='' style='color:#01B7EF' class='read-more-link'>+</a>");
});
});
  });
</script>

<script type="text/javascript">
	 // $(document).ready( function () {
        
  
$('.categ').click(function(){
	// alert();
     var id=$(this).attr("id");

    $.ajax({
                            url:"<?php echo base_url() ?>Nos_produits/produit_pass",
                            method:"POST",
                            //async:false,
                            data: {id:id},
                                                                                 
                            success:function(data)
                                                {  
                                                   // alert(data); 

                                                    $('#nos_prod').html(data); 

                                                //$('#COMMUNE').selectpicker('refresh');                                                   
                                                 }
                });
    
 

});
// });
</script>
