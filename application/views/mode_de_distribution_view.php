<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Mode de distribution</title>
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

		<h4 class="text-uppercase" id="" style="text-align: ;">CHOISISSEZ VOTRE MODE DE DISTRIBUTION (Collecte ou Livraison?)</h4>

		<?php
		$numero=$this->Model->getRequeteOne("SELECT MAX(COMMANDE_ID) as nb FROM commande");
		$n=$numero['nb']+1;
		  $output='';
      $output.='<div class="col-sm-4"><a style="margin:10px" class="btn btn-primary btn-md  btn-lg" href="'.base_url("Commande/collecte/").$this->uri->segment(3).'">Collecte</a><a class="btn btn-primary btn-md  btn-lg" href="'.base_url("Commande/livraison/").$this->uri->segment(3).'">Livraison</a></div>
      <div class="col-sm-2"></div>
      <table class="table table-bordered" style="color:black">
     <tr><th>Facture No</th><th>Articles</th><th></th><th>Quantité</th><th>P.U</th><th>TOTAL</th><th></th><th></th><th></th></tr>
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
												<td>'.$items['qty'].'</td><td>'.$items['price'].'
												</td>
												<td>'.$items['subtotal'].'</td>
												
												

											</tr>
										
    
    ';
    $i++;
    
$total+=$items['subtotal']; 
}

 $output.='<div class="modal fade" id="modifier'.$items["rowid"].'" tabindex="-1">
				    <div class="modal-dialog">
				      <div class="modal-content">
				        <div class="modal-header"  style="background: #c9dbe9">
				           <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
				          <h3 class="modal-title">Modification panier</h3>
				           <button class="close" data_dismiss="modal">&times;</button>
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
											
										</td><td></td>
										<th>TOTAL</th>
										<th >'.$total.'</th>
										<th colspan="3"></th>	
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
