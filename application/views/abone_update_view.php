<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Ajout</title>
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


    $active1="primary";
    $active2="info";
    $active3="primary";
    $active4="primary";
    $active5="primary";
    $active6="primary";
    $active7="primary";
    $active8="primary";
    $active9="primary";
    $active10="primary";
    $active11="primary";
		?>
		<?php
       include 'includes/my_header.php';
        ?>
		<!-- /HEADER -->
		<div class="container">
		<div class="row">
<?php
       // include 'includes/sous_menus_admin.php';
        ?>
		
				<h3 style="text-align: center;">Mise à jour de mes identifiants</h3>
			<!-- <div class="col-md-8"></div>
			<div class="col-md-4">
				<a class="btn btn-primary btn-md" href="<?= base_url();?>Admin/ajouter"  style="margin:0px">Ajouter</a>
				<a class="btn btn-primary btn-md" href="<?= base_url();?>Admin/admin_accueil" style="margin:0px">Liste</a>
			</div> -->
			<div class="col-md-12">

					<!-- <i class="fa fa-exclamation-triangle" style="color: red;font-size: 35px"> INTERFACE EN COURS DE CONSTUCTION</i> -->

          <form method="POST" enctype="multipart/form-data" id="myform"action="<?=base_url().'Abone/update/'?><?=$user['USER_ID']?>">

         <div class="form-group">
        <!-- <input type="hidden" name="PERSONNEL_MEDICALE_ID" id="PERSONNEL_MEDICALE_ID" value="<?=$antenne['PERSONNEL_MEDICALE_ID']?>"> -->
                                   <div class="col-md-4 col-sm-12 col-xs-12">
              <label>USERNAME*</label>
                  <input type="text" class="form-control" name="USERNAME" value="<?=$user['USERNAME']?>" autofocus required>
                   <font color='red'><?php echo form_error('USERNAME'); ?></font>
                 
                 
                     </div> 
                                             <div class="col-md-4 col-sm-12 col-xs-12">
                     <label>MOT DE PASSE*</label>
                  <input type="password" class="form-control" name="PWD" value="<?=$user['PASSWORD']?>" autofocus required>
                   <font color='red'><?php echo form_error('PWD'); ?></font>
                 
                 
                     </div> 
                             <div class="col-md-4 col-sm-12 col-xs-12">
         <label>Téléphone</label>
      <input type="number" class="form-control" name="TELEPHONE" value="<?=$user['TELEPHONE']?>" autofocus required>
       <font color='red'><?php echo form_error('TELEPHONE'); ?></font>
     
         </div>
       <div class="col-md-4 col-sm-12 col-xs-12">
      <label>Nom </label>
      <input type="text" class="form-control" name="NOM" value="<?=$user['NOM_USER']?>" autofocus required>
       <font color='red'><?php echo form_error('NOM'); ?></font>
     
     
      </div>
       <div class="col-md-4 col-sm-12 col-xs-12">
      <label>Prénom </label>
      <input type="text" class="form-control" name="PRENOM" value="<?=$user['PRENOM_USER']?>" autofocus required>
       <font color='red'><?php echo form_error('PRENOM'); ?></font>
     
     
      </div>

 
      <div class="col-md-4 col-sm-12 col-xs-12">
         <label>Email</label>
      <input type="text" class="form-control" name="EMAIL" value="<?=$user['EMAIL']?>" autofocus required>
       <font color='red'><?php echo form_error('EMAIL'); ?></font>
     
     
         </div>
     
        </div> 
          
                    <!--  <div class="col-md-4 col-sm-12 col-xs-12">

                                 <label>Profil</label>
                                 <select class="form-control" id="PROFILE_ID" name="PROFILE_ID" >
                                    <option value="">--Choisir--</option>
                                    <?php
                                    foreach ($professions as $value) {
                                      if ($value['PROFILE_ID']==$user['PROFILE_ID']) {
                                      ?>
                                      <option value="<?=$value['PROFILE_ID']?>" selected><?=$value['DESCRIPTION_PROFILE']?></option>
                                      <?php
                                    }else{
                                      ?>
                                       <option value="<?=$value['PROFILE_ID']?>"><?=$value['DESCRIPTION_PROFILE']?></option>
                                      <?php
                                    }
                                    }
                                    ?>
                                  </select>
                                  <font color='red'><?php echo form_error('PROFILE_ID'); ?></font>


                              </div> -->
 
       
                             <!--  </div> </div></div> -->



      

                 <div class="form-group">

           
          
            <div class="col-md-12 col-sm-12 col-xs-12">
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