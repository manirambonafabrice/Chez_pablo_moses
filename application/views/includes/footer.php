
<div id="newsletter" class="section" style="margin-top: ">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">

							<p>Boîte à suggestions </p>
							<form method="post" action="<?=base_url('Suggestion')?>">
								<textarea name="suggestion" class="form-control" required></textarea>
								<button class="btn-info form-control"><i class="fa fa-envelope"></i> Envoyer</button>
								<!-- <input class="input" type="email" placeholder="Entrer votre suggestion">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Envoyer</button> -->
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
<footer id="footer">
			<!-- top footer -->
			<div class="section">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">A propos de nous</h3>
								<p></p>
								<ul class="footer-links">
									<li><a href="#"><i class="fa fa-map-marker"></i>16,AV.DE LUXEMBOURG ROHERO I , Bujumbura BURUNDI</a></li>
									<li><a href="#"><i class="fa fa-phone"></i>+257 77 792 000</a></li>
									<li><a href="#"><i class="fa fa-envelope-o"></i>info@chezpablomoses.com</a></li>
								</ul>
							</div>
						</div>

						<!-- <div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Categories</h3>
								<ul class="footer-links">
									<li><a href="#">Hot deals</a></li>
									<li><a href="#">Laptops</a></li>
									<li><a href="#">Smartphones</a></li>
									<li><a href="#">Cameras</a></li>
									<li><a href="#">Accessories</a></li>
								</ul>
							</div>
						</div> -->

						<div class="clearfix visible-xs"></div>

						<!-- <div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Information</h3>
								<ul class="footer-links">
									<li><a href="#">About Us</a></li>
									<li><a href="#">Contact Us</a></li>
									<li><a href="#">Privacy Policy</a></li>
									<li><a href="#">Orders and Returns</a></li>
									<li><a href="#">Terms & Conditions</a></li>
								</ul>
							</div>
						</div> -->

						<div class="col-md-3 col-xs-6">
							<div class="footer">
								<h3 class="footer-title">Service(s)</h3>
								<ul class="footer-links">
									<li><a href="<?=base_url("Nos_produits")?>">Nos produits</a></li>
									<li><a href="<?=base_url("Procedure_de_commande")?>">Procédure de commande</a></li>
									<li><a href="<?=base_url("Revue_panier")?>">Revue du panier</a></li>

									
									<!-- <li><a href="#">Help</a></li> -->
								</ul>
							</div>

						</div>

					</div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /top footer -->

			<!-- bottom footer -->
			<div id="bottom-footer" class="section">
				<div class="container">
					<!-- row -->
					<div class="row">
						<div class="col-md-12 text-center">
							<ul class="footer-payments">
								<li><a href="#"><i class="fa fa-cc-visa"></i></a></li>
								<li><a href="#"><img width="50" height="30" src="<?php echo base_url() ?>uploads/img/ecocash.gif" alt=""></i></a></li>
								<li><a href="#"><img width="50" height="30" src="<?php echo base_url() ?>uploads/img/download.png" alt=""></i></a></li>
								
							</ul>
							<span class="copyright">
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright © - All Rights Reserved - Chezpablomoses.bi
								  <span class="ml-auto" style="color: red;">Powered by <a href="https://fmanirambona.wordpress.com/" target="_blank" style="color: white">Fabrice Manirambona +257 75 158 793 / +257 79 158 793</a></span> 
							<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
							</span>
						</div>
					</div>
						<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /bottom footer -->
		</footer>
<script type="text/javascript">
	function ajout_panier(id){
		// alert(id);
		var qty=$('#produit'+id).val();
		 // alert(qty);
		if (qty) {
		 $.ajax({
                            url:"<?php echo base_url() ?>Commande/cart",
                            method:"POST",
                            //async:false,
                            data: {id:id,qty:qty},
                                                                                 
                            success:function(data)
                                                {  

                                                    var dt=data.split("<>") ;

                                                     $('#mon_panier').html(dt['0']); 
                                                     $('#quantite').html(dt['1']); 
                                                     $('#produit'+id).val('');

                                                //$('#COMMUNE').selectpicker('refresh');                                                   
                                                 }
                });
		}else {
			alert("Echec! veuiller entrer la quantité voulue d'abord.");
			$('#produit'+id).focus();
		}
	}

// 	function remove(id){
// 		alert(id);
//             var rowid=$(this).attr("id");
// alert(rowid);
//             if(confirm('Voulez-vous vraiment enlever cette depense?')){

//                  $.ajax({
//                             url:"<?php echo base_url() ?>Commande/remove",
//                             method:"POST",
//                          // async:false,
//                             data: {rowid:rowid},
                                                                                 
//                             success:function(stutus)
//                                                         { $('#depense').html(stutus);  

//                                                       alert(stutus);
//                                                     }
        
//                                                     });
//             }else{
//                 return false;
//             }
//         }

$(document).on('click','.ajout_panier',function(){
            var id=$(this).attr("id");
var qty=$('#produit'+id).val();
var bonus=$('#bonus'+id).val();
var rest=$('#RESTE').val();
var total_sub='';
// alert(rest);

		  // alert(qty);
		  if (bonus) {

		  	$.ajax({
                            url:"<?php echo base_url() ?>Commande/bonus_total",
                            method:"POST",
                            async:false,
                            data: {},
                                                                                 
                            success:function(data)
                                                {total_sub=data;
                                                	// alert(data);
                                                }
                                            });

		  	var bn=bonus;
		  	// alert(total_sub);
		  	var bonus_total=bn*qty;
		  	bonus_total=parseInt(parseInt(bonus_total)+parseInt(total_sub));
		  	var point=rest;
		  	
		  	if (qty) {
		  		// alert(rest+"pp");
		  		if(rest>=bonus_total){
		 $.ajax({
                            url:"<?php echo base_url() ?>Commande/cart",
                            method:"POST",
                            async:false,
                            data: {id:id,qty:qty,bonus:bonus},
                                                                                 
                            success:function(data)
                                                {  
                                                	var user="<?=$this->session->userdata('CLIENT_TELEPHONE')?>";
                                                	// $("#cart").modal();
                                                	var dt=data.split("<>") ;

                                                	if (dt['0']=="beaucoup") {
                                                		alert("Cette quantité n'est pas disponible, il ne reste que "+dt['1']);
                                                	}else{
                                                    if (user){
                                                    alert("votre produit a été ajouté dans votre panier");
                                                    
                                                    }
                               
                                                    $("#cart").modal();
                                                     $('#mon_panier').html(dt['0']); 
                                                     $('#quantite').html(dt['1']);
                                                     $('#quantite1').html(dt['1']); 
                                                     $('#produit'+id).val('');

                                                //$('#COMMUNE').selectpicker('refresh'); 
                                                }                                                  
                                                 }
                });
		 	
		}else{
			var user="<?=$this->session->userdata('CLIENT_TELEPHONE')?>";
			if (user) {
			alert("Echec! Echec! Vous n\'avez pas de points suffisants pour ce bonus.");
			}
		}
		}else {
			alert("Echec! veuiller entrer la quantité voulue d'abords.");
			$('#produit'+id).focus();
		} 
	}else{

		if (qty) {
		 $.ajax({
                            url:"<?php echo base_url() ?>Commande/cart",
                            method:"POST",
                            //async:false,
                            data: {id:id,qty:qty},
                                                                                 
                            success:function(data)
                                                {  
                                                	 	var user="<?=$this->session->userdata('CLIENT_TELEPHONE')?>";
                                                	
                                                	var dt=data.split("<>") ;

                                                	if (dt['0']=="beaucoup") {
                                                		alert("Cette quantité n'est pas disponible, il ne reste que "+dt['1']);
                                                	}else{
                                                    if (user){
                                                    alert("votre produit a été ajouté dans votre panier");
                                                    
                                                    }
                               
													$("#cart").modal();
                                                     $('#mon_panier').html(dt['0']); 
                                                     $('#quantite').html(dt['1']);
                                                     $('#quantite1').html(dt['1']); 
                                                     $('#produit'+id).val('');

                                                //$('#COMMUNE').selectpicker('refresh'); 
                                                }                                                 
                                                 }
                });
		}else {
			alert("Echec! veuiller entrer la quantité voulue d'abord.");
			$('#produit'+id).focus();
		}
	}
        });


        $(document).on('click','.rmv',function(){
            var rowid=$(this).attr("id");
// alert(rowid);
            if(confirm('Voulez-vous vraiment enlever ce produit?')){

                  $.ajax({
                            url:"<?php echo base_url() ?>Commande/remove",
                            method:"POST",
                         // async:false,
                            data: {rowid:rowid},
                                                                                 
                            success:function(stutus)
                                                        {
                                                        	var dt=stutus.split("<>") ;
                                                         $('#mon_panier').html(dt['0']);
                                                         $('#quantite1').html(dt['1']);
                                                         $('#quantite').html(dt['1']);   
                                                            
                                                         // $('.qty').html(dt['1']);   

                                                      // alert(stutus);
                                                    }
        
                                                    });
            }else{
                return false;
            }
        });

        function play_sonnerie(){
   // do whatever you like here

// 

 $.ajax({
                            url:"<?php echo base_url() ?>Commande/check_nouveau",
                            method:"POST",
                         // async:false,
                            data: {},
                                                                                 
                            success:function(stutus)
                                                        {
                                                        	// alert(stutus);
                                                        if (stutus=="ok") {
                                                        	
new Audio("<?=base_url('uploads/sonnerie/sound.mp3')?>").play();
                                                        }
                                                    	}
        
                                                    });
	    setTimeout(play_sonnerie, 65000);
		}

		var sessio="<?=$this->session->userdata('USER_TELEPHONE')?>";
		// alert(sessio);

		if(sessio){
		play_sonnerie();	
		}


function ouvrir_pannier(){
	$("#cart").modal();
}


    $(document).ready(function(){
var message="<?=$this->session->flashdata('message') ?>";

if (message) {alert(message);}
});
        
</script>
