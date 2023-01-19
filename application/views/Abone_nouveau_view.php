<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Nouveau</title>
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

		
				<h3 style="text-align: center;">Ajouter un utilisateur client</h3>
			
			<div class="col-md-12">
				<?= $this->session->flashdata('message') ?>

					<!-- <i class="fa fa-exclamation-triangle" style="color: red;font-size: 35px"> INTERFACE EN COURS DE CONSTUCTION</i> -->

          <form method="POST" enctype="multipart/form-data" id="myform"action="<?=base_url().'Abone/add_client'?>">


          
                  
                                   <div class="col-md-4 col-sm-12 col-xs-12">
                     <label>Username<span style="color: red">*(Obligatoire)</span></label>
                  <input type="text" class="form-control" name="USERNAME" value="<?=set_value('USERNAME')?>" autofocus placeholder='Nom et ou prénom ou surnom'>
                   <font color='red'><?php echo form_error('USERNAME'); ?></font>
                 
                 
                     </div>  
                        <div class="col-md-4 col-sm-12 col-xs-12">
                     <label>Mot de passe<span style="color: red">*(Obligatoire)</span></label>
                  <input type="password" class="form-control" name="PWD" value="<?=set_value('PWD')?>" autofocus>
                   <font color='red'><?php echo form_error('PWD'); ?></font>
                 
                     </div>
                      <div class="col-md-4 col-sm-12 col-xs-12">
         <label>Téléphone<span style="color: red">*(Obligatoire)</span></label>
      <input type="number" class="form-control" name="TELEPHONE" value="<?=set_value('TELEPHONE')?>" autofocus>
       <font color='red'><?php echo form_error('TELEPHONE'); ?></font>
     
         </div>        
                             

       <div class="col-md-4 col-sm-12 col-xs-12">
      <label>Nom </label>
      <input type="text" class="form-control" name="NOM" value="<?=set_value('NOM')?>" autofocus>
       <font color='red'><?php echo form_error('NOM'); ?></font>
     
     
      </div>
       <div class="col-md-4 col-sm-12 col-xs-12">
      <label>Prénom </label>
      <input type="text" class="form-control" name="PRENOM" value="<?=set_value('PRENOM')?>" autofocus>
       <font color='red'><?php echo form_error('PRENOM'); ?></font>
     
     
      </div>
               <div class="form-group">
       
        <div class="col-md-4 col-sm-12 col-xs-12">
         <label>Email</label>
      <input type="text" class="form-control" name="EMAIL" value="<?=set_value('EMAIL')?>" autofocus>
       <font color='red'><?php echo form_error('EMAIL'); ?></font>
     
     
         </div>
     
        </div> 

        
      <!--  </div> </div></div> -->



      

                 <div class="form-group">

           
          
            <div class="col-md-12 col-sm-12 col-xs-12" style="margin-top: 20px">
              <input type="submit" value="Enregistrer" class="btn btn-primary btn-block">
             
                  </div>
           
				
			</div>
		</form>
		</div>
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
