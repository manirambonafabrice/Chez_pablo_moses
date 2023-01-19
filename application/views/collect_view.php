<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Collecte</title>
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
			<div class="col-md-2 col-sm-12 col-xs-12"></div>
			<div class="col-md-8 col-sm-12 col-xs-12">

				<?php
				$montant=0;
				foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
          
          $montant+=$items['subtotal'];
        }
      }
				?>
 <form method="POST" enctype="multipart/form-data" id="myform" action="<?=base_url().'Commande/add/'?><?=$mode_distribution?>/<?=$this->uri->segment(3)?>">

        
                     

                                 <label>Mode de paiement</label>
                                 <select class="form-control" id="MODE_ID" name="MODE_ID" required>
                                    <option value="">--Choisir--</option>
                                    <?php
                                    foreach ($mode as $value) {
                                      if ($value['MODE_ID']==3 ||$value['MODE_ID']==4) {
                                        if ($this->session->userdata('CLIENT_VIP')==1) {
                                        
                                      if ($value['MODE_ID']==set_value('MODE_ID')) {
                                      ?>
                                      <option value="<?=$value['MODE_ID']?>" selected><?=$value['MODE_DESCRIPTION']?></option>
                                      <?php
                                    }else{
                                       ?>
                                       <option value="<?=$value['MODE_ID']?>"><?=$value['MODE_DESCRIPTION']?></option>
                                      <?php
                                    }
                                    }
                                    }else{
                                       if ($value['MODE_ID']==set_value('MODE_ID')) {
                                      ?>
                                      <option value="<?=$value['MODE_ID']?>" selected><?=$value['MODE_DESCRIPTION']?></option>
                                      <?php
                                    }else{
                                       ?>
                                       <option value="<?=$value['MODE_ID']?>"><?=$value['MODE_DESCRIPTION']?></option>
                                      <?php
                                    }
                                    }
                                    }
                                    ?>
                                  </select>
                                  <font color='red'><?php echo form_error('MODE_ID'); ?></font>


                              
                       <label></label>
                                 <select class="form-control " multiple id="CHOIX" name="CHOIX" required>
                                 </select>  
                               <div class="col-md-12 col-sm-12 col-xs-12" id="foto"></div>          
                     <label>Montant</label>
                  <input required type="number" class="form-control"  id="MONTANT" name="MONTANT" value="<?=$montant+$this->session->userdata('FRAIS')?>" autofocus readonly>
                   <font color='red'><?php echo form_error('MONTANT'); ?></font>
                   <div style="display:none" id="REFERENCE1">
                    <label>Code de transaction(réference) </label>
                  <input required type="text" class="form-control"  id="REFERENCE" name="REFERENCE" value="" autofocus required>
                   <font color='red'><?php echo form_error('REFERENCE'); ?></font>
                 </div>
                 
                   
                     <label>Frais de transfert</label>
                  <input type="number" required class="form-control" id="FRAIS" name="FRAIS" value="<?=set_value('FRAIS')?>" readonly>
                   <font color='red'><?php echo form_error('FRAIS'); ?></font>
                   <label>Télephone envoyant</label>
                  <input type="number" required class="form-control" name="TELEPHONE" value="<?=set_value('TELEPHONE')?>" autofocus>
                   <font color='red'><?php echo form_error('TELEPHONE'); ?></font>
                 
                 



      

                 <div class="form-group">

           
          
            <div class="col-md-12 col-sm-12 col-xs-12">
              <input type="submit" value="Validez votre choix" class="btn btn-primary btn-block">
             
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

<script type="text/javascript">
	  $(document).on('change','#MODE_ID',function(){
      
            var id=$('#MODE_ID').val();
            // alert(id);
            if (id==1) { $('#REFERENCE1').show(); $('#REFERENCE1').attr("required", true);}else {$('#REFERENCE1').attr("required", false); $('#REFERENCE1').hide(); }

                  $.ajax({
                            url:"<?php echo base_url() ?>Commande/get_mode",
                            method:"POST",
                         // async:false,
                            data: {id:id},
                                                                                 
                            success:function(stutus)
                                                        {
                                                        	// alert(stutus);
                                                        $("#CHOIX").html(stutus);
                                                        $("#foto").html('');
                                                    }
        
                                                    });
            
        });

	  $(document).on('change','#CHOIX',function(){

	  	if ($('#MODE_ID').val()==1) { var lien="get_Mobile";}
	  	if ($('#MODE_ID').val()==2) { var lien="get_bank"}
	  	if ($('#MODE_ID').val()==3) { var lien="get_mode"}

            var id=$('#CHOIX').val();

          if(id.length==1){
            var montant=$('#MONTANT').val();

                  $.ajax({
                            url:"<?php echo base_url() ?>Commande/"+lien,
                            method:"POST",
                         // async:false,
                            data: {id:id,montant:montant},
                                                                                 
                            success:function(stutus)
                                                        {
                                                          var info=stutus.split("||");
                                                        	  // alert(info[0]);
                                                        $("#FRAIS").val(info[0]);
                                                        $("#foto").html(info[1]);
                                                    }
         
                                                    });
          }else{alert('ECHEC! Veuillez faire un seul choix');}
            
        });
          
</script>
