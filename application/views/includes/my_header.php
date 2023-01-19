<?php
		$clientId = '120473004246-brdi158s96slvsfaldqmsso4v54ct6pc.apps.googleusercontent.com'; //Google client ID
		$clientSecret = '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'; //Google client secret
		// $redirectURL = base_url() .'googlelogin/login';
		$redirectURL = "https://www.chezpablomoses.bi/Commande/passer_commande";
		
		//https://curl.haxx.se/docs/caextract.html

		//Call Google API
		
    require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
		$gClient = new Google_Client();
		$gClient->setApplicationName('Login');
		$gClient->setClientId($clientId);
		$gClient->setClientSecret($clientSecret);
		$gClient->setRedirectUri($redirectURL);
		$google_oauthV2 = new Google_Oauth2Service($gClient);
		
		if(isset($_GET['code']))
		{
			$gClient->authenticate($_GET['code']);
			$_SESSION['token'] = $gClient->getAccessToken();
// 			header('Location: ' . filter_var($redirectURL, FILTER_SANITIZE_URL));
		}

		if (isset($_SESSION['token'])) 
		{
			$gClient->setAccessToken($_SESSION['token']);
		}
		
		if ($gClient->getAccessToken()) {
            $userProfile = $google_oauthV2->userinfo->get();

// 			print_r($userProfile);
			
			$user=$this->Model->getOne("users",array("EMAIL"=>$userProfile['email']));
			
			if(empty($user)){
			     $data1=array(
          
                'NOM_USER' => $userProfile['family_name'],
                'PRENOM_USER' => $userProfile['given_name'],
                'TELEPHONE' => '',
                'EMAIL' => $userProfile['email'],
                'USERNAME' => $userProfile['email'],
                'PASSWORD' => '',
                'PROFILE_ID' => 3,
               
                 );
            $id=$this->Model->insert_last_id('users',$data1);
            $user=$this->Model->getOne("users",array("USER_ID"=>$id));
			}else{
			    
			     $data1=array(
          
                'NOM_USER' => $userProfile['family_name'],
                'PRENOM_USER' => $userProfile['given_name'],
                'TELEPHONE' => '',
                'EMAIL' => $userProfile['email'],
                'USERNAME' => $userProfile['email'],
                
               
                 );
			    $this->Model->update('users',array("USER_ID"=>$user['USER_ID']),$data1);
			    $id=$user['USER_ID'];
			}
			
			
            $session = array(
                              'CLIENT_ID' => $id,
                              'CLIENT_TELEPHONE' =>$user['TELEPHONE'],
                              'CLIENT_NOM' =>$user['NOM_USER'],
                              'CLIENT_PRENOM' =>$user['PRENOM_USER'],
                              'CLIENT_PROFIEL_ID' => 3,
                              'CLIENT_USERNAME' =>$user['USERNAME'],
                              'CLIENT_EMAIL' => $user['EMAIL'],
                              'CLIENT_VIP' => $user['VIP'],
                            );  
        $this->session->set_userdata($session);

        } 

?>


<?php 
             if(!empty($_SERVER['HTTP_CLIENT_IP'])){
        $ip= $_SERVER['HTTP_CLIENT_IP'];
    }elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
        $ip= $_SERVER['HTTP_X_FORWARDED_FOR'];
    }else{
        $ip= $_SERVER['REMOTE_ADDR'];
    }
    $check=$this->Model->getRequeteOne("SELECT COUNT(ID) as n FROM visite WHERE ADRESSE_IP='".$ip."' AND DATE LIKE '%".date('Y-m-d')."%'");
    if($check['n']==0){
    $this->Model->create('visite',array('ADRESSE_IP'=>$ip));

    }

?>
<header>



      <style type="text/css">
      	 #cat{
 position: fixed;
  width: 60px;
  height: ;
   background-color: ;
   top: 30%;
   right:  0px;
}
      </style>
			<!-- TOP HEADER -->
			<div id="top-header">
				<div class="container">
					<ul class="header-links pull-left">
						<li><a href="#"><i class="fa fa-phone"></i> +257 77 792 000</a></li>
						<li><a href="#"><i class="fa fa-envelope-o"></i> info@chezpablomoses.com</a></li>
						<li><a href="#"><i class="fa fa-map-marker"></i> 16,AV. DE LUXEMBOURG, ROHERO I, Bujumbura Burundi</a></li>
           ''

					</ul>
					<ul class="header-links pull-right">
						<!-- <li><a href="#"><i class="fa fa-dollar"></i> USD</a></li> -->
						<?php
						if (!empty($this->session->userdata('USER_ID'))) {
						?>
						<li id='' data-toggle="modal" data-target="#deconnexion"><a ><i class="fa fa-user-o"></i><?=$this->session->userdata('USER_NAME')?> </a></li>
						<?php
					}
					else if (!empty($this->session->userdata('CLIENT_ID'))) {
						?>
						<li id='' data-toggle="modal" data-target="#deconnexion"><a ><i class="fa fa-user-o"></i><?=$this->session->userdata('CLIENT_USERNAME')?> </a></li>
						<li id='' data-toggle="modal" ><a  href='<?= base_url('Abone/deconexion/')?>'>déconnexion</a></li>
						<?php
					}
			
					else if (empty($this->session->userdata('CLIENT_ID'))) {
						?>
						<li id='' data-toggle="modal" data-target="#so"><a ><i class="fa fa-user-o"></i> S'authentifier</a></li>
						<?php
					}
					?>
					</ul>
				</div>
			</div>
			<!-- /TOP HEADER -->

			<!-- MAIN HEADER -->
			<div id="header">
				<!-- container -->
				<div class="container">
					<!-- row -->
					<div class="row">
						<!-- LOGO -->
						<div class="col-md-3">
							<div class="header-logo">
								<a href="<?=base_url()?>" class="logo">
									<!-- <img width="20" src="<?=base_url("uploads/systeme/pag.jpg")?>"> -->
									<span style="color:white; font-size:18px; ">Chez Pablo Moses</span>
								</a>
							</div>
						</div>
						<!-- /LOGO -->

						<!-- SEARCH BAR -->
						<div class="col-md-6">
							<center>
							<div class="header-search">
								<form method="post" action="<?=base_url()?>Categorie/">
									<!-- <select name="categorie" class="input-select" style="width:130px" required>
										<option value="">Catégories</option>
										<?php 
										$categorie=$this->Model->getListOrdered("categorie");
										foreach ($categorie as $value) {
										
										 ?>
										<option value="<?=$value['CATEGORIE_ID']?>"><?=$value['CATEGORIE_DESCR']?></option>
										<?php	
										}
										?>
									</select> -->
									<input class="input-select" name="produit" placeholder="Recherche" required>
									<!-- <input class="input" name="produit" placeholder="Recherche" required> -->
									<button type="submit" class="search-btn" style="width:auto;padding-right: 20px;padding-left: 20px"><i class="fa fa-search"></i></button>
								</form>
							</div>
							</center>
						</div>
						<!-- /SEARCH BAR -->

						<!-- ACCOUNT -->

						<!-- MODAL CART -->
<div class='modal fade' id='cart' tabindex="-1">
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'  style="background: #c9dbe9">
        	<span class='btn btn-primary btn-md Close'  data-dismiss="modal" aria-label="Close" style="font-size: 18px;float: right;">Poursuivez votre commande</span>

          
          <h3 class="modal-title">Mon panier</h3>
          <!-- <button class="close" data_dismiss="modal">&times;</button> -->
        </div>

        <div class="modal-body" id="mon_panier" title="Authentification"   style="background: #c9dbe9">
           
           <?php
           	$output='';
      $output.='<div class="cart-list">';

       $count='';
       $i=0;
       $total=0;
       
       foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
         $count++;
         $output.='<div class="product-widget">

												<div class="product-img">
													<img src="'.base_url().$items['image'].'" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">'.$items['name'].'</a></h3>
													<h4 class="product-price"><span class="qty">'.$items['qty'].'X</span>'.$items['price'].'</h4>
												</div>
												<button class="delete rmv" onclick="remove('.$items["rowid"].');"  id="'.$items["rowid"].'"><i class="fa fa-close"></i></button>
											</div>
										
    
    ';
    $i++;
    
$total+=$items['subtotal']; 
}
       }

       $output.='</div>
    <div class="cart-summary">
											<small>'.$i.' Produit(s) choisi(s)</small>
											<h5>TOTAL: '.$total.'</h5>
										</div>
										<div class="cart-btns">
											
										</div>
    
    ';

 $output.='';
       if($count==0){
        $output='';
       }

       echo $output;
       if ($i==0) {
           ?>
          <h5 style="color: red">Votre panier est vide,veuillez selectionner le(s)produit(s)</h5>
          <?php
      }
      ?>
	    </div>
	    <div class='modal-footer'>
	    	
	    	<?php if (($this->session->userdata('USER_PROFIEL_ID')==1)||($this->session->userdata('USER_PROFIEL_ID')==2)) {
	    		?>
	    								<!-- <a class='btn btn-primary btn-md' href='<?= base_url('Commande_sur_caisse/Confirmation_commande')?>'>verifier le pannier</a> -->
	    								<a class='btn btn-primary btn-md' href='<?= base_url('Commande/Confirmation_commande/')?>'>Validez votre commande</a>
	    		<?php
	    	} else{?>
	                                                    <a class='btn btn-primary btn-md' href='<?= base_url('Commande/Confirmation_commande/')?>' style="font-size: 18px">Clôturez votre commande</a>
	        <?php
	    	} ?>
                                                    
                                                </div>
    </div>
  </div>
  
</div>
<!-- MODAL CART -->
						<div class="col-md-3 clearfix">
							<div class="header-ctn">
								<!-- Wishlist -->
								<!-- <div>
									<a href="#">
										<i class="fa fa-heart-o"></i>
										<span>Your Wishlist</span>
										<div class="qty">2</div>
									</a>
								</div> -->
								<!-- /Wishlist -->

								<!-- Cart -->
								<div class="dropdown">
									<a class="" data-toggle="modal" data-target="#cart" >
										<i class="fa fa-shopping-cart" style="font-size: 30px"></i>
										<span>Mon panier</span>
										<div id="quantite" class="qty"><?=$i?></div>
									</a>

									
									</div>
								
								<!-- /Cart -->

								<!-- Menu Toogle -->
								<div class="menu-toggle">
									<a href="#">
										<i class="fa fa-bars"></i>
										<span>Menu</span>
									</a>
								</div>
								</div>
								<!-- /Menu Toogle -->
							<!-- </div> -->
						</div>
						<!-- /ACCOUNT -->
					</div>
					<!-- row -->
				</div>
				<!-- container -->
			</div>
			<!-- /MAIN HEADER -->
		</header>
		<!-- NAVIGATION -->
		<nav id="navigation">
			<!-- container -->
			<div class="container">
				<!-- responsive-nav -->
				<div id="responsive-nav">
					<!-- NAV -->
					<ul class="main-nav nav navbar-nav">
						<li class="<?=$lien1?>"><a href="<?=base_url()?>">Accueil</a></li>
						<?php

						if (!empty($this->session->userdata('CLIENT_PROFIEL_ID'))) {
						?>
						<li class="<?=$lien4?>"><a href="<?=base_url("Commande/passer_commande")?>">Passassion de commande</a></li>
					<?php }else{ ?>
						<li class="<?=$lien4?>"><a href="" class="" data-toggle="modal" data-target="#so" >Passassion de commande</a></li>
					<?php } ?>
						<li class="<?=$lien2?>"><a href="<?=base_url("Nos_produits")?>">Nos produits</a></li>
						<li class="<?=$lien5?>"><a href="<?=base_url("Bonus")?>">Bonus</a></li>

						<!--<li class="<?=$lien3?>"><a href="<?=base_url("Procedure_de_commande")?>">Commande</a></li>-->
						<li class="<?=$lien6?>"><a href="<?=base_url("Taux_de_transfert")?>">Taux de transfert</a></li>
						
						<?php

						if (!empty($this->session->userdata('CLIENT_PROFIEL_ID'))) {
						?>
						<li class="<?=$lien7?>"><a href="<?=base_url("Commande/mesCommandes/".$this->session->userdata('CLIENT_ID'))?>">Historique de mes achats</a></li>
						<?php } ?>
						
					</ul>
					<!-- /NAV -->
				</div>
				<!-- /responsive-nav -->
			</div>
			<!-- /container -->
		</nav>
		<!-- /NAVIGATION -->

		<!-- MODAL -->
<div class='modal fade' id='so' tabindex="-1">
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'  style="background: #c9dbe9">
          
          <h3 class="modal-title">Authentification</h3>

          <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
        </div>

        <div class="modal-body" id="dialog1" title="Authentification"   style="background: #c9dbe9">
          <span id="msg"></span>
          <!-- <h1 style="color: #266C67;"></h1> -->
          <!-- <div id=""  title="Authentification" style="display: none;"> -->
          <form action="<?= base_url('Abone/do_login') ?>" method="POST">
                    <table class="table table-inverse">
                        <tr class="bg-" style="background-color:#04274A;">
                            <td colspan="2">
                            	<input type="hidden" id="uri" name="uri" placeholder="Nom d'utilisateur" class="form-control" required  autocomplete="off" value="<?=uri_string()?>">
                               
                                    <input type="text" id="USERNAME" name="USERNAME" placeholder="Username ou Numéro de téléphone" class="form-control" required  autocomplete="off">
                                
                            </td>
                        </tr>
                        <tr class="bg-" style="background-color:#04274A">   
                            <td colspan="2">
                                
                                    <input type="password" id="PASSWORD" name="PASSWORD" placeholder="Mot de passe " class="form-control" required>
                              
                            </td>
                        </tr>    
                        <tr class="bg-" style="background-color:#04274A;border-radius:0px 0px 10px 10px"><td ><button type="submit" id="connexion" style="background-color:#04274A; color:white;border: 1px solid #01B7EF" class="btn btn  form-control">CONNEXION</button></td>
                        	<td><a href="<?= base_url();?>Abone/mot_de_passe_oublier"><button type="button" value="" style="background-color:#04274A; color:white;border: 1px solid #01B7EF" class="btn btn  form-control">Mot de passe oublié?</button></a></td>

                        </tr>
                       <tr> <td><a href="https://www.chezpablomoses.bi/Googlelogin/login"><img src="<?=base_url()?>assets/images/google-btn.png" alt=""/></span></td></tr>
                        
                    </table>    
                </form>
        <!-- </div> -->
<a href="<?= base_url();?>Abone/nouveau"><button type="button" value="" style="background-color:#04274A; color:white;border: 1px solid #01B7EF" class="btn btn  form-control">Nouveau client/Nouvelle cliente</button></a>
      </div>
    </div>
  </div>
</div>
<!-- FIN MODAL -->

<!-- MODAL -->
<div class='modal fade' id='deconnexion' tabindex="-1">
    <div class='modal-dialog'>
      <div class='modal-content'>
        <div class='modal-header'  style="background: #c9dbe9">
          
          <h3 class="modal-title">Authentification</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">X</button>
        </div>

        <div class="modal-body" id="dialog1" title="Authentification"   style="background: #c9dbe9">
          <span id="msg"></span>
          <h5>Voulez-vous vous déconnecter?</h5>
      </div>
      <div class='modal-footer'>
                                                    <a class='btn btn-danger btn-md' href='<?= base_url('Abone/deconexion/')?>'>Oui</a>
                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Non</button>
                                                    <?php if (!empty($this->session->userdata('CLIENT_ID'))) {?>
                                                   
                                                    <a class='btn btn-danger btn-md' href='<?= base_url('Abone/change/').$this->session->userdata('CLIENT_ID')?>'>Changer identification</a>
                                                <?php } ?>
                                                </div>
    </div>
  </div>
</div>

<?php
$this->session->set_flashdata('referred_from', current_url());
?>

<!-- <div id="cat"><a  href='<?=base_url()?>Multimedia' style="color: #266C67;"><i class="fas fa-film" style="font-size:30px; color: #266C67;"  onmouseover="this.style.color='black';" onmouseout="this.style.color=' #266C67';"><br></i><span class="chat" style="font-size:10px;" ><br>Multimédias</span></a>
		</div> -->
		<!-- <div id="cat" >
			<div class="dropdown" style="text-align: center;">
									<a class="dropdown-toggle" data-toggle="dropdown" style="color: #01B7EF; text-align: center" aria-expanded="true">
										<div class="qty">0</div>
										<i class="fa fa-shopping-cart"></i><br>
										<span style="text-align: center;">Mon panier</span>
										
									</a>
									<div class="cart-dropdown">
										<div class="cart-list">
											<div class="product-widget">
												<div class="product-img">
													<img src="<?php echo base_url() ?>uploads/img/product01.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">nom du produit</a></h3>
													<h4 class="product-price"><span class="qty">1x</span>980.00BIF</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>

											<div class="product-widget">
												<div class="product-img">
													<img src="<?php echo base_url() ?>uploads/img/product02.png" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">Nom du produit</a></h3>
													<h4 class="product-price"><span class="qty">3x</span>980.00BIF</h4>
												</div>
												<button class="delete"><i class="fa fa-close"></i></button>
											</div>
										</div>
										<div class="cart-summary">
											<small>3 Produits choisis</small>
											<h5>TOTAL: 2940.00BIF</h5>
										</div>
										<div class="cart-btns">
											<a href="<?=base_url("Revue_panier")?>">Revue du panier</a>
											<a href="<?=base_url("Lancer_commande")?>">Lancer<i class="fa fa-arrow-circle-right"></i></a>
										</div>
									</div>
								</div>
		</div> -->
<!-- FIN MODAL -->
<?php
if (!empty($this->session->userdata('USER_PROFIEL_ID'))) {

?>
<a href="<?=base_url()?>Admin"><i class="fa fa-sign-in"   style="float: right;color: ; position: fixed; right: 0px; top: 300px; font-size: 60px"></i></a>
<?php
}
?>