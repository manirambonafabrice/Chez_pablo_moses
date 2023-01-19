<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nos_produits extends CI_Controller {

	
	public function index($id_categ='')
	{
	$data['id_categ']=$id_categ;
		$this->load->view('nos_produit_view',$data);
	}

	 public function ajout(){ 
 	$titre=$_POST['titre'];
 	
    $config['upload_path']='./uploads/categorie/';
    $config['allowed_types']='*';
    $this->load->library('upload',$config,'upload_pieceJointe');
    $this->upload_pieceJointe->initialize($config);


		// if(!$this->upload_foto->do_upload('foto')){
     if( $this->upload_pieceJointe->do_upload('foto')){

$data1=array('upload_data'=>$this->upload_pieceJointe->data());
$id_actualite=$this->Model->insert_last_id('categorie',array('CATEGORIE_DESCR'=>$titre,'CATEGORIE_IMAGE'=>"uploads/categorie/".$data1['upload_data']['file_name']));
			 $data['message']='<div class="alert alert-success text-center"> La catégorie est enregistrée avec succès</div>';
  $data['message']='<div class="alert alert-success text-center">Enregistrement avec succès</div>';

                // } 
    $this->session->set_flashdata($data);
  redirect(base_url('Nos_produits/'));

}else{
	 $data['message']='<div class="alert alert-danger text-center"> foto non enregistré(s)</div>';
	$this->session->set_flashdata($data);
  redirect(base_url('Nos_produits/'));
}
}
 public function ajout_produit(){
 	if (!empty($this->session->userdata('USER_TELEPHONE'))) {
 	$titre=$_POST['titre'];
 	$categori=$_POST['categori'];
 	$prix=$_POST['prix'];
 	$unite=$_POST['unite'];
 	$stock=$_POST['stock'];
 	// $prix_achat=$_POST['prix_achat'];
 	
    $config['upload_path']='./uploads/produits/';
    $config['allowed_types']='*';
    $this->load->library('upload',$config,'upload_pieceJointe');
    $this->upload_pieceJointe->initialize($config);


		// if(!$this->upload_foto->do_upload('foto')){
     if( $this->upload_pieceJointe->do_upload('foto')){

$data1=array('upload_data'=>$this->upload_pieceJointe->data());
$id_actualite=$this->Model->insert_last_id('produit',array('PRODUIT_DESCR'=>$titre,'PRODUIT_PRIX'=>$prix,'CATEGORIE_ID'=>$categori,'PRODUIT_UNITE_MESURE'=>$unite,'PRODUIT_IMAGE'=>"uploads/produits/".$data1['upload_data']['file_name'],'STOCK_MINIMUM'=>$stock));
			 $data['message']='<div class="alert alert-success text-center"> La catégorie est enregistrée avec succès</div>';
  $data['message']='<div class="alert alert-success text-center">Enregistrement avec succès</div>';

                // } 
    $this->session->set_flashdata($data);
  redirect(base_url('Nos_produits/'));

}else{
	 $data['message']='<div class="alert alert-danger text-center"> foto non enregistré(s)</div>';
	$this->session->set_flashdata($data);
  redirect(base_url('Nos_produits/'));
}
	}	

 }
 public function delete_categorie($id){
 	if (!empty($this->session->userdata('USER_TELEPHONE'))) {
 	$ft_act=$this->Model->getOne('categorie',array('CATEGORIE_ID'=>$id));
       
         $path1=FCPATH.$ft_act['CATEGORIE_IMAGE'];
        unlink($path1);
       
 	$this->Model->delete("categorie",array("CATEGORIE_ID"=>$id));
 	$this->Model->delete("produit",array("CATEGORIE_ID"=>$id));
 	$data['message']='<div class="alert alert-success text-center"> Suppression avec succes</div>';
	$this->session->set_flashdata($data);
  redirect(base_url('Nos_produits/'));
}
 }
 public function delete_produit($id){
 	if (!empty($this->session->userdata('USER_TELEPHONE'))) {
 	$ft_act=$this->Model->getOne('produit',array('PRODUIT_ID'=>$id));
       
         $path1=FCPATH.$ft_act['PRODUIT_IMAGE'];
        unlink($path1);
       
 	$this->Model->delete("produit",array("PRODUIT_ID"=>$id));
 	$data['message']='<div class="alert alert-success text-center"> Suppression avec succes</div>';
	$this->session->set_flashdata($data);
  redirect(base_url('Nos_produits/'));
}
 }
 public function update($id){
 	if (!empty($this->session->userdata('USER_TELEPHONE'))) {
 	$titre=$_POST['titre'];
 	
    $config['upload_path']='./uploads/categorie/';
    $config['allowed_types']='*';
    $this->load->library('upload',$config,'upload_pieceJointe');
    $this->upload_pieceJointe->initialize($config);


		// if(!$this->upload_foto->do_upload('foto')){
     if( $this->upload_pieceJointe->do_upload('foto')){

			 $ft_act=$this->Model->getOne('categorie',array('CATEGORIE_ID'=>$id));
       
         $path1=FCPATH.$ft_act['CATEGORIE_IMAGE'];
        unlink($path1);

$data1=array('upload_data'=>$this->upload_pieceJointe->data());
$id_actualite=$this->Model->update('categorie',array('CATEGORIE_ID'=>$id),array('CATEGORIE_DESCR'=>$titre,'CATEGORIE_IMAGE'=>"uploads/categorie/".$data1['upload_data']['file_name']));
			 $data['message']='<div class="alert alert-success text-center"> La catégorie est enregistrée avec succès</div>';


  $data['message']='<div class="alert alert-success text-center">Modification avec succès</div>';

                // } 
    $this->session->set_flashdata($data);
  redirect(base_url('Nos_produits/'));

}else{
	 $data['message']='<div class="alert alert-danger text-center"> foto non enregistré(s)</div>';
	$this->session->set_flashdata($data);
  redirect(base_url('Nos_produits/'));
}
}
		
 }

 public function update_produit($id){
 	if (!empty($this->session->userdata('USER_TELEPHONE'))) {
$titre=$_POST['titre'];
 	$categori=$_POST['categori'];
 	$prix=$_POST['prix'];
 	$unite=$_POST['unite'];
$stock=$_POST['stock'];

 	
    $config['upload_path']='./uploads/produits/';
    $config['allowed_types']='*';
    $this->load->library('upload',$config,'upload_pieceJointe');
    $this->upload_pieceJointe->initialize($config);


		// if(!$this->upload_foto->do_upload('foto')){
     if( $this->upload_pieceJointe->do_upload('foto')){

			 $ft_act=$this->Model->getOne('produit',array('PRODUIT_ID'=>$id));
       
         $path1=FCPATH.$ft_act['PRODUIT_IMAGE'];
        unlink($path1);

$data1=array('upload_data'=>$this->upload_pieceJointe->data());
$id_actualite=$this->Model->update('produit',array('PRODUIT_ID'=>$id),array('PRODUIT_DESCR'=>$titre,'PRODUIT_PRIX'=>$prix,'CATEGORIE_ID'=>$categori,'PRODUIT_UNITE_MESURE'=>$unite,'PRODUIT_IMAGE'=>"uploads/produits/".$data1['upload_data']['file_name'],'STOCK_MINIMUM'=>$stock));
			


  $data['message']='<div class="alert alert-success text-center">Modification avec succès</div>';

                // } 
    $this->session->set_flashdata($data);
  redirect(base_url('Nos_produits/'));

}else{
	 $data['message']='<div class="alert alert-danger text-center"> foto non enregistré(s)</div>';
	 $id_actualite=$this->Model->update('produit',array('PRODUIT_ID'=>$id),array('PRODUIT_DESCR'=>$titre,'PRODUIT_PRIX'=>$prix,'CATEGORIE_ID'=>$categori,'PRODUIT_UNITE_MESURE'=>$unite,'STOCK_MINIMUM'=>$stock));
	$this->session->set_flashdata($data);
  redirect(base_url('Nos_produits/'));
}
}
	
 }

 public function produit(){
 	$id=$this->input->post("id");

 	$categori=$this->Model->getOne("categorie",array("CATEGORIE_ID"=>$id));

	?>
<!-- PRODUIT -->
<div class="container">
		<div class="row" style="min-height: 10px;margin-bottom: 20px;margin-top:20px ">
			<h5 class="" id="" style="text-align: ;">Les produits de la catégorie <b><?=$categori['CATEGORIE_DESCR']?></b></h4>

				<?php

			if (!empty($this->session->userdata('USER_TELEPHONE'))) {
			
			?>
			<div class="row" style="background: ; width: 100px;float:; ; margin:5px;margin-top: 30px">
			 	 <a href="" data-toggle="modal" data-target="#produit"> 
			 	 	<div id='srvc' class="inner-block"  style="background: ;width: 100% ; border: 1px solid  white;border-radius: 25px;text-align: center; margin-bottom: 0px">
					<i class="fa fa-plus " style="color:white;" ></i>

					</div>
				</a>
			</div>
			<!-- MODAL AJOUT PRODUIT-->
			<div class='modal fade' id='produit' tabindex="-1">
			    <div class='modal-dialog '>
			      <div class='modal-content'>
			        <div class='modal-header'>
			          
			          <h4 class="modal-title">Ajout d'un produit de la catégorie <?=$categori['CATEGORIE_DESCR']?></h4>
			          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
			          
			        </div>

			        <div class="modal-body col-md-12"  id="dialog" title="Actualité"   style="background:#c9dbe9">
			          <span id="msg"></span>
			         <form id="myform" action="<?= base_url('Nos_produits/ajout_produit') ?>" method="POST" enctype="multipart/form-data">
			 	

				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Nom :</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="text" name="titre" class="form-control input-sm" autocomplete="off" required>		
					</div>
					
				</div>
				
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Prix:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="number" name="prix" class="form-control input-sm" autocomplete="off" required>	
				<input type="hidden" name="categori" value="<?=$id?>" class="" autocomplete="off" required>		
					</div>
					
				</div>
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Unité de mesure:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<select name="unite" id='unite' class="form-control" required>
					<option value="">-choisir-</option>
					<option value="Kg">Kg</option>
					<option value="L">L</option>
					<option value="M">M</option>
					<option value="Cartons">Cartons</option>
					<option value="Bouteille(s)">Bouteille(s)</option>
					<option value="Bidon(s)">Bidon(s)</option>
					<option value="Casier(s)">Casier(s)</option>
					<option value="Piece(s)">Piece(s)</option>
					<option value="Boite(s)">Boite(s)</option>
				</select>		
					</div>
					
				</div>
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Stock minimum:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="number" name="stock" class="form-control input-sm" autocomplete="off" required>		
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




			<?php
			}
			?>

					<ul class="nav nav-tabs">

					    <!-- <li class="active"><a href="#tab1" data-toggle="tab">1</a></li> -->
					    <!-- <li><a href="#tab2" data-toggle="tab">Quantities</a></li>
					    <li><a href="#tab3" data-toggle="tab">Summary</a></li> -->
					    <?php
					    $j=1;
					    $x=1;
							$produit=$this->Model->getListOrdered('produit','PRODUIT_DESCR',array("CATEGORIE_ID"=>$id));
						foreach ($produit as $value) {
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
			$produit=$this->Model->getListOrdered('produit','PRODUIT_DESCR',array("CATEGORIE_ID"=>$id));
			foreach ($produit as $value) {

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
				<?php
					
				

						if (!empty($this->session->userdata('USER_TELEPHONE'))) {
	
							echo "<div id='gestion' class=' ".$value['PRODUIT_ID']."' style='display:'><a href='' data-toggle='modal' data-target='#modifications".$value['PRODUIT_ID']."'><div  class='col-md-6'><i class='fa fa-edit' style='color:'></i></div></a><div  class='col-md-6'><a href='' id='".$value['PRODUIT_ID']."' class='delete' data-toggle='modal' data-target='#mydeletes".$value['PRODUIT_ID']."'><span style='color:red'>x</span></div></a></div>";

							}
				?>
				<!-- <img class="img" src="<?=base_url()?><?=$value['PRODUIT_IMAGE']?>" width="100%" heigth=""><article style="font-size: 10px"><?=$value['PRODUIT_DESCR']?></article> -->
			<!-- </div> -->
										
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
												<div style="height: 50px;background-color: "><h3 class="product-name"><a href="#"><?=$value['PRODUIT_DESCR']?></a></h3>
												</div>
												<h4 class="product-price"><?=$value['PRODUIT_PRIX']?> Fbu
													<!-- <del class="product-old-price">40 000BIF</del></h4> -->
												<div class="">
													<!--<input type="number" id="produit<?=$value['PRODUIT_ID']?>" name="montant" class="form-control input-sm" autocomplete="off" placeholder="Quantité">	-->
												</div>
												<div class="product-btns">
													
												</div>
											</div>
											<?php
 												if (!empty($this->session->userdata('CLIENT_ID'))) {
												?>
												<!--<button id="<?=$value['PRODUIT_ID']?>" class="form-control add-to-cart-btn ajout_panier" style="background: #01B7EF" ><i class="fa fa-shopping-cart"></i> Ajouter au panier</button> -->
												<?php
											}else{ ?>
											<!-- <div class="">
												<button id="<?=$value['PRODUIT_ID']?>" class="form-control ajout_panier"  style="background: #01B7EF"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
											</div> -->
											<!--<button id="<?=$value['PRODUIT_ID']?>" class="form-control add-to-cart-btn " data-toggle="modal" style="background: #01B7EF" data-target="#so" onclick="alert('Avant de faire toute commande , Veuillez d\'abord vous authentifier');"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button> -->
										<?php } ?>
										</div>
	
</div>
<?php
if($i%8==0){
?>
</div>
<?php
}
?>

<!-- /// -->

				<!-- MODAL DELETE -->

				<div class='modal fade' id='mydeletes<?=$value['PRODUIT_ID']?>' tabindex="-1">
				    <div class='modal-dialog'>
				      <div class='modal-content'>
				        <div class='modal-header'  style="background: #c9dbe9">
				           <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
				          <h3 class="modal-title">Suppression</h3>
				          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
				        </div>

				        <div class="modal-body" id="dialog1" title="Suppression"   style="background: #c9dbe9">
				          <span id="msg"></span>
				          <h5>Voulez-vous vraiment supprimer ce produit?</h5>
				      </div>
				      <div class='modal-footer'>
				                                                    <a class='btn btn-danger btn-md' href='<?= base_url('Nos_produits/delete_produit/')?><?=$value['PRODUIT_ID']?>'>Oui</a>
				                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Non</button>
				                                                </div>
				    </div>
				  </div>
				</div>

				<!-- MODAL MODIFIER -->
			<div class='modal fade' id='modifications<?=$value['PRODUIT_ID']?>' tabindex="-1">
			    <div class='modal-dialog'>
			      <div class='modal-content'>
			        <div class='modal-header'>
			           <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
			          <h4 class="modal-title">Modification d'un produit</h4>
			          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
			          
			        </div>

			        <div class="modal-body col-md-12"  id="dialog" title="Actualité"   style="background:#c9dbe9">
			          <span id="msg"></span>
			         <form id="myform" action="<?= base_url('Nos_produits/update_produit/') ?><?=$value['PRODUIT_ID']?>" method="POST" enctype="multipart/form-data">
			 	

				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Nom :</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="text" name="titre" value="<?=$value['PRODUIT_DESCR']?>" class="form-control input-sm" autocomplete="off" required>		
					</div>
					
				</div>
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Prix :</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="number" name="prix" value="<?=$value['PRODUIT_PRIX']?>" class="form-control input-sm" autocomplete="off" required>	
				<input type="hidden" name="categori" value="<?=$id?>" class="" autocomplete="off" required>		
					</div>
					
				</div>
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Unité de mesure:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<select name="unite" id='unite' class="form-control" required>
					
					<option value="">-choisir-</option>
					<option value="Kg"  <?php if($value['PRODUIT_UNITE_MESURE']=='Kg') echo 'selected'; ?>>Kg</option>
					<option value="L"  <?php if($value['PRODUIT_UNITE_MESURE']=='Kg') echo 'selected'; ?>>L</option>
					<option value="M"  <?php if($value['PRODUIT_UNITE_MESURE']=='M') echo 'selected'; ?>>M</option>
					<option value="Cartons"  <?php if($value['PRODUIT_UNITE_MESURE']=='Cartons') echo 'selected'; ?>>Cartons</option>
					<option value="Bouteille(s)"  <?php if($value['PRODUIT_UNITE_MESURE']=='Bouteille(s)') echo 'selected'; ?>>Bouteille(s)</option>
					<option value="Bidon(s)"  <?php if($value['PRODUIT_UNITE_MESURE']=='Bidon(s)') echo 'selected'; ?>>Bidon(s)</option>
					<option value="Casier(s)"  <?php if($value['PRODUIT_UNITE_MESURE']=='Casier(s') echo 'selected'; ?>>Casier(s)</option>
					<option value="Piece(s)"  <?php if($value['PRODUIT_UNITE_MESURE']=='Piece(s)') echo 'selected'; ?>>Piece(s)</option>
					<option value="Boite(s)"  <?php if($value['PRODUIT_UNITE_MESURE']=='Boite(s)') echo 'selected'; ?>>Boite(s)</option>
				
				</select>		
					</div>
					
				</div>
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Stock minimum:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="number" name="stock"  value="<?=$value['STOCK_MINIMUM']?>"  class="form-control input-sm" autocomplete="off" required>		
					</div>
					
				</div>

				
				
				<div class="col-md-12" >
					 <div class="col-md-4 sm-12 xs-12 form-group">
						<label>Photo:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					<input type="file" name="foto" accept="image/*" id="gallery-photo-add" >

				
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
				<?php
			}

			if (!$produit) {
				echo "<h3 style='color:red'>Aucun produit correspondant</h3>";
			}
			?>

			
		

</div>



			<!-- //////// -->

					     </div> 
<!-- FIN PRODUIT -->
</div>
<a class="btn btn-primary btnPrevious float-left bt" style="float: left;margin-right: 10px" >Précedent</a>
<a class="btn btn-primary btnNext float-left bt" style="float: left;">Suivant</a>

<script type="text/javascript">
$('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
</script>

<script type="text/javascript">
	var hei=$('.img').width()*0.8;
	$('.img').each(function(){

        $(this).height($(this).width()*0.8);
        $(this).size('.star-size');
         var text_input = $('.star-size');
    text_input.css("font-size", $(this).height()*0.8);

});
	$('.btn').click(function(){
		// $(this).height($(this).width()*0.8);
        $(this).size('.star-size');
         var text_input = $('.star-size');
    text_input.css("font-size", $(this).height());
	});

	$('.tabu').click(function(){
		 // alert(hei);
			

        $('.img').height(hei);
      


	});

</script>

	<?php
 }

 public function produit_pass(){
 	$id=$this->input->post("id");

 	$categori=$this->Model->getOne("categorie",array("CATEGORIE_ID"=>$id));

	?>
<!-- PRODUIT -->
<div class="container">
		<div class="row" style="min-height: 10px;margin-bottom: 20px;margin-top:20px ">
			<h5 class="" id="" style="text-align: ;">Les produits de la catégorie <b><?=$categori['CATEGORIE_DESCR']?></b></h4>

				<?php

			if (!empty($this->session->userdata('USER_TELEPHONE'))) {
			
			?>
			<div class="row" style="background: ; width: 100px;float:; ; margin:5px;margin-top: 30px">
			 	 <a href="" data-toggle="modal" data-target="#produit"> 
			 	 	<div id='srvc' class="inner-block"  style="background: ;width: 100% ; border: 1px solid  white;border-radius: 25px;text-align: center; margin-bottom: 0px">
					<i class="fa fa-plus " style="color:white;" ></i>

					</div>
				</a>
			</div>
			<!-- MODAL AJOUT PRODUIT-->
			<div class='modal fade' id='produit' tabindex="-1">
			    <div class='modal-dialog '>
			      <div class='modal-content'>
			        <div class='modal-header'>
			          
			          <h4 class="modal-title">Ajout d'un produit de la catégorie <?=$categori['CATEGORIE_DESCR']?></h4>
			          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
			          
			        </div>

			        <div class="modal-body col-md-12"  id="dialog" title="Actualité"   style="background:#c9dbe9">
			          <span id="msg"></span>
			         <form id="myform" action="<?= base_url('Nos_produits/ajout_produit') ?>" method="POST" enctype="multipart/form-data">
			 	

				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Nom :</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="text" name="titre" class="form-control input-sm" autocomplete="off" required>		
					</div>
					
				</div>
				
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Prix:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="number" name="prix" class="form-control input-sm" autocomplete="off" required>	
				<input type="hidden" name="categori" value="<?=$id?>" class="" autocomplete="off" required>		
					</div>
					
				</div>
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Unité de mesure:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<select name="unite" id='unite' class="form-control" required>
					<option value="">-choisir-</option>
					<option value="Kg">Kg</option>
					<option value="L">L</option>
					<option value="M">M</option>
					<option value="Cartons">Cartons</option>
					<option value="Bouteille(s)">Bouteille(s)</option>
					<option value="Bidon(s)">Bidon(s)</option>
					<option value="Casier(s)">Casier(s)</option>
					<option value="Piece(s)">Piece(s)</option>
					<option value="Boite(s)">Boite(s)</option>
				</select>		
					</div>
					
				</div>
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Stock minimum:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="number" name="stock" class="form-control input-sm" autocomplete="off" required>		
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




			<?php
			}
			?>

					<ul class="nav nav-tabs">

					    <!-- <li class="active"><a href="#tab1" data-toggle="tab">1</a></li> -->
					    <!-- <li><a href="#tab2" data-toggle="tab">Quantities</a></li>
					    <li><a href="#tab3" data-toggle="tab">Summary</a></li> -->
					    <?php
					    $j=1;
					    $x=1;
							$produit=$this->Model->getListOrdered('produit','PRODUIT_DESCR',array("CATEGORIE_ID"=>$id));
						foreach ($produit as $value) {
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
			$produit=$this->Model->getListOrdered('produit','PRODUIT_DESCR',array("CATEGORIE_ID"=>$id));
			foreach ($produit as $value) {

				// $requi=$this->Model->getRequeteOne("SELECT ((SELECT IFNULL(SUM(NOMBRE),0) from requisition where PRODUIT_ID=p.PRODUIT_ID)-(SELECT IFNULL(SUM(QUANTITE),0) from vente where PRODUIT_ID=p.PRODUIT_ID)) as NOMBRE  FROM produit p ORDER BY PRODUIT_DESCR");
				$requi=$this->Model->getRequeteOne("SELECT IFNULL(SUM(NOMBRE),0) as n from requisition where PRODUIT_ID=".$value['PRODUIT_ID']);
				$vente=$this->Model->getRequeteOne("SELECT IFNULL(SUM(QUANTITE),0) as n from vente where PRODUIT_ID=".$value['PRODUIT_ID']);
				$rest=$requi['n']-$vente['n'];
				


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
				<?php
					
				

						if (!empty($this->session->userdata('USER_TELEPHONE'))) {
	
							echo "<div id='gestion' class=' ".$value['PRODUIT_ID']."' style='display:'><a href='' data-toggle='modal' data-target='#modifications".$value['PRODUIT_ID']."'><div  class='col-md-6'><i class='fa fa-edit' style='color:'></i></div></a><div  class='col-md-6'><a href='' id='".$value['PRODUIT_ID']."' class='delete' data-toggle='modal' data-target='#mydeletes".$value['PRODUIT_ID']."'><span style='color:red'>x</span></div></a></div>";

							}
				?>
				<!-- <img class="img" src="<?=base_url()?><?=$value['PRODUIT_IMAGE']?>" width="100%" heigth=""><article style="font-size: 10px"><?=$value['PRODUIT_DESCR']?></article> -->
			<!-- </div> -->
										
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
												
												<h4 class="product-price"><?=$value['PRODUIT_PRIX']?> Fbu
												
													<!-- <del class="product-old-price">40 000BIF</del></h4> -->
												<div class="">
													<?php
												if ($rest>0) {
												    echo $rest;
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
													
												</div>
											</div>
											<?php
 												if (!empty($this->session->userdata('CLIENT_ID'))) {

												?>
												<?php
												if ($rest>0) {
												?>
												<button id="<?=$value['PRODUIT_ID']?>" class="form-control add-to-cart-btn ajout_panier" style="background: #01B7EF" ><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
												<?php
												}else{
												?>
												<button id="<?=$value['PRODUIT_ID']?>" class="form-control add-to-cart-btn " style="background: #01B7EF" onclick="alert('Ce produit n\'est pas disponible');"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
												<?php
												}
												?>
												<?php
											}else{ ?>
											<!-- <div class="">
												<button id="<?=$value['PRODUIT_ID']?>" class="form-control ajout_panier"  style="background: #01B7EF"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
											</div> -->
											<button id="<?=$value['PRODUIT_ID']?>" class="form-control add-to-cart-btn " data-toggle="modal" style="background: #01B7EF" data-target="#so" onclick="alert('Avant de faire toute commande , Veuillez d\'abord vous authentifier');"><i class="fa fa-shopping-cart"></i> Ajouter au panier</button>
										<?php } ?>
										</div>
	
</div>
<?php
if($i%8==0){
?>
</div>
<?php
}
?>

<!-- /// -->

				<!-- MODAL DELETE -->

				<div class='modal fade' id='mydeletes<?=$value['PRODUIT_ID']?>' tabindex="-1">
				    <div class='modal-dialog'>
				      <div class='modal-content'>
				        <div class='modal-header'  style="background: #c9dbe9">
				           <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
				          <h3 class="modal-title">Suppression</h3>
				          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
				        </div>

				        <div class="modal-body" id="dialog1" title="Suppression"   style="background: #c9dbe9">
				          <span id="msg"></span>
				          <h5>Voulez-vous vraiment supprimer ce produit?</h5>
				      </div>
				      <div class='modal-footer'>
				                                                    <a class='btn btn-danger btn-md' href='<?= base_url('Nos_produits/delete_produit/')?><?=$value['PRODUIT_ID']?>'>Oui</a>
				                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Non</button>
				                                                </div>
				    </div>
				  </div>
				</div>

				<!-- MODAL MODIFIER -->
			<div class='modal fade' id='modifications<?=$value['PRODUIT_ID']?>' tabindex="-1">
			    <div class='modal-dialog'>
			      <div class='modal-content'>
			        <div class='modal-header'>
			           <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
			          <h4 class="modal-title">Modification d'un produit</h4>
			          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
			          
			        </div>

			        <div class="modal-body col-md-12"  id="dialog" title="Actualité"   style="background:#c9dbe9">
			          <span id="msg"></span>
			         <form id="myform" action="<?= base_url('Nos_produits/update_produit/') ?><?=$value['PRODUIT_ID']?>" method="POST" enctype="multipart/form-data">
			 	

				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Nom :</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="text" name="titre" value="<?=$value['PRODUIT_DESCR']?>" class="form-control input-sm" autocomplete="off" required>		
					</div>
					
				</div>
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Prix :</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="number" name="prix" value="<?=$value['PRODUIT_PRIX']?>" class="form-control input-sm" autocomplete="off" required>	
				<input type="hidden" name="categori" value="<?=$id?>" class="" autocomplete="off" required>		
					</div>
					
				</div>
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Unité de mesure:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<select name="unite" id='unite' class="form-control" required>
					
					<option value="">-choisir-</option>
					<option value="Kg"  <?php if($value['PRODUIT_UNITE_MESURE']=='Kg') echo 'selected'; ?>>Kg</option>
					<option value="L"  <?php if($value['PRODUIT_UNITE_MESURE']=='Kg') echo 'selected'; ?>>L</option>
					<option value="M"  <?php if($value['PRODUIT_UNITE_MESURE']=='M') echo 'selected'; ?>>M</option>
					<option value="Cartons"  <?php if($value['PRODUIT_UNITE_MESURE']=='Cartons') echo 'selected'; ?>>Cartons</option>
					<option value="Bouteille(s)"  <?php if($value['PRODUIT_UNITE_MESURE']=='Bouteille(s)') echo 'selected'; ?>>Bouteille(s)</option>
					<option value="Bidon(s)"  <?php if($value['PRODUIT_UNITE_MESURE']=='Bidon(s)') echo 'selected'; ?>>Bidon(s)</option>
					<option value="Casier(s)"  <?php if($value['PRODUIT_UNITE_MESURE']=='Casier(s') echo 'selected'; ?>>Casier(s)</option>
					<option value="Piece(s)"  <?php if($value['PRODUIT_UNITE_MESURE']=='Piece(s)') echo 'selected'; ?>>Piece(s)</option>
					<option value="Boite(s)"  <?php if($value['PRODUIT_UNITE_MESURE']=='Boite(s)') echo 'selected'; ?>>Boite(s)</option>
				
				</select>		
					</div>
					
				</div>
				<div class="col-md-12" >
				
					 <div class="col-md-2 sm-12 xs-12 form-group">
						<label>Stock minimum:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="number" name="stock"  value="<?=$value['STOCK_MINIMUM']?>"  class="form-control input-sm" autocomplete="off" required>		
					</div>
					
				</div>

				
				
				<div class="col-md-12" >
					 <div class="col-md-4 sm-12 xs-12 form-group">
						<label>Photo:</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					<input type="file" name="foto" accept="image/*" id="gallery-photo-add" >

				
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
				<?php
			}

			if (!$produit) {
				echo "<h3 style='color:red'>Aucun produit correspondant</h3>";
			}
			?>

			
		

</div>



			<!-- //////// -->

					     </div> 
<!-- FIN PRODUIT -->
</div>
<a class="btn btn-primary btnPrevious float-left bt" style="float: left;margin-right: 10px" >Précedent</a>
<a class="btn btn-primary btnNext float-left bt" style="float: left;">Suivant</a>

<script type="text/javascript">
$('.btnNext').click(function(){
  $('.nav-tabs > .active').next('li').find('a').trigger('click');
});

  $('.btnPrevious').click(function(){
  $('.nav-tabs > .active').prev('li').find('a').trigger('click');
});
</script>

<script type="text/javascript">
	var hei=$('.img').width()*0.8;
	$('.img').each(function(){

        $(this).height($(this).width()*0.8);
        $(this).size('.star-size');
         var text_input = $('.star-size');
    text_input.css("font-size", $(this).height()*0.8);

});
	$('.btn').click(function(){
		// $(this).height($(this).width()*0.8);
        $(this).size('.star-size');
         var text_input = $('.star-size');
    text_input.css("font-size", $(this).height());
	});

	$('.tabu').click(function(){
		 // alert(hei);
			

        $('.img').height(hei);
      


	});

</script>

	<?php
 }

 public function qrcode(){
 	$this->load->library('ciqrcode');

$params['data'] = 'This is a text to encode become QR Code';
$params['level'] = 'H';
$params['size'] = 10;
$params['savename'] = FCPATH.'tes.png';
$this->ciqrcode->generate($params);

echo '<img src="'.base_url().'tes.png" />';
 }

}