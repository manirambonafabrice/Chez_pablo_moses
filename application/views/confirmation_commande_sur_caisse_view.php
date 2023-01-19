<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Confirmation commande</title>
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
			<div class="col-md-12">
				<a class="btn btn-primary btn-md" href="<?= base_url();?>Admin/ajouter"  style="margin:0px">Ajouter utilisateur</a>
				<a class="btn btn-primary btn-md" href="<?= base_url();?>Admin/admin_accueil" style="margin:0px">Liste utilisateur</a>
		        <a class="btn btn-primary btn-md" href="<?= base_url();?>Admin/nouveau_commande" style="margin:0px">Nouveaux commandes</a>
		        <a class="btn btn-primary btn-md" href="<?= base_url();?>Admin/tous_les_commandes" style="margin:0px">Listes de tous les commandes</a>
		        <a class="btn btn-primary btn-md" href="<?= base_url();?>Admin/suggestion_list" style="margin:0px">Suggestions</a>
		        <a class="btn btn-primary btn-md" href="<?= base_url();?>Admin/vente_sur_caisse" style="margin:0px">Vente sur caisse</a>
			</div>

		<h4 class="text-uppercase" id="titre" style="text-align: ;">VERIFICATION ET CONFIRMATION DU PANIER</h4>

		<?php
		$client=$this->Model->getListOrdered("users","NOM_USER",array("PROFILE_ID"=>3));
		?>

		<div class="form-group  row ">
                          <div class="col-md-6 col-sm-6 col-xs-6">
                          <label for="" >Client</label>
                          <select class="form-control selectpicker" data-live-search="true" data-actions-box="true" name="CLIENT" id="CLIENT">
                            <option value="">--Sélectionner</option>
                            <?php
                            foreach ($client as $value) {
                              

                                ?>
                               
                                <option value="<?=$value['USER_ID']?>"><?=$value['NOM_USER']?> <?=$value['PRENOM_USER']?>(<?=$value['TELEPHONE']?>)</option>
                                <?php
                              
                            }
                            ?>
                          </select>
                          
                      </div></div>



		<?php
		$numero=$this->Model->getRequeteOne("SELECT MAX(COMMANDE_ID) as nb FROM commande");
		$n=$numero['nb']+1;

		  $output='';
      $output.='<table class="table table-bordered" style="color:black">
      <tr><th>Facture No</th><th>Articles</th><th></th><th></th><th>TOTAL</th><th></th><th></th><th></th></tr>
      <tr class="product-widget"><td rowspan="100" style="text-align:center">
												'.$n.'
												</td>';

       $count='';
       $i=0;
       $total=0;
       
       foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
         $count++;
         if ($i>0) {
         	$output.='<tr class="product-widget">';
         }
         

												
												$output.='
												<td>
													<a href="#">'.$items['name'].'</a>
													</td>
													<td>
													<img src="'.base_url().$items['image'].'" alt="" style="width:50px;height:40px">
												</td>
												<td>'.$items['qty'].'X</span>'.$items['price'].'
												</td>
												<td>'.$items['subtotal'].'</td>
												
												<td><a style="color:green" href="'.base_url("Commande/passer_commande").'">ajouter</a></td>
												<td><a style="color:blue"  data-toggle="modal" data-target="#modifier'.$items["rowid"].'">Modifier</a></td>
												<td><a style="color:red" href="'.base_url("Commande/supprimer/".$items["rowid"]).'">Supprimer</a></td>

											</tr>
										
    
    ';
    $i++;
    
$total+=$items['subtotal']; 
}

 $output.='<div class="modal fade" id="modifier'.$items["rowid"].'" tabindex="-1">
				    <div class="modal-dialog">
				      <div class="modal-content">
				        <div class="modal-header"  style="background: #c9dbe9">
				        
				          
				          <h3 class="modal-title">Modification panier</h3>
				          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
				        </div>

				        <div class="modal-body" id="dialog1" title="Authentification"   style="background: #c9dbe9">
				          <span id="msg"></span>
				          <form id="myform" action="'. base_url('Commande/modifier/'.$items["rowid"]).'" method="POST" enctype="multipart/form-data">
			 	

			<div class="col-md-12" >
				
					 <div class="col-md-4 sm-12 xs-12 form-group">
						<label>'.$items['name'].'</label>
					</div>
					<div class="col-md-8 sm-12 xs-12 form-group">
					
				<input type="number" name="qty" value="'.$items['qty'].'" min="1" class="form-control input-sm" autocomplete="off" required>		
					</div>
					
				</div>
				          
				      </div>
				      <div class="modal-footer">
				                                                    <input type="submit" class="btn btn-primary btn-md" value="modifier"></form>
				                                                    
				                                                </div>
				    </div>
				  </div>
				</div>';
       }

       $output.='
    <tr ><td></td><td>
											<small>'.$i.' Produits choisis</small>
											
										</td>
										<th>TOTAL GENERAL</th>
										<th >'.number_format($total,0," "," ").'</th>
										<th colspan="3"><p><a class="primary-btn cta-btn form-control " href="'.base_url("Commande/mode_de_distribution").'">Confirmez votre commande</a></p></th>	
										</tr>
    
    ';

 $output.='</table>';
       if($count==0){
        $output='';
       }

      

       echo $output;

		?>
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
