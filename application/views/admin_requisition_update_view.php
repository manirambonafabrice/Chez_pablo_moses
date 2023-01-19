<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin accueil</title>
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
    $active6="info";
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

      <!-- <div class="col-md-8"></div> -->
      <?php
       include 'includes/sous_menus_admin.php';
        ?>
            <div class="col-md-12" style="margin-top: 50px">
                <h3 style="text-align: center;">Modification Réquisition</h3>
                 
                     <?=$breadcrumb?>

                     <?= $this->session->flashdata('msg') ?>

                <form id="myform" action="<?php echo base_url()?>Admin/update_requisition1"  method="post" enctype="multipart/form-data">

                        <div class="row" id="formi">
                          <?php
                          $cat=$this->Model->getListOrdered("categorie","CATEGORIE_DESCR");
                          ?>
                            
                            
                            <div class="row"></div>
                            <div class="col-md-2 sm-2 xs-2 form-group">
                                <label>Categorie</label>
                                  <input type="hidden" name="CATEGORIE_ID_LAST" id="CATEGORIE_ID_LAST" class="form-control input-sm"  autocomplete="off" value="<?=$req['ID_REQUISITION']?>" required>
                                 <select id="CATEGORIE_ID" name="CATEGORIE_ID" class="form-control" required>
                                <option value="">--choisir--</option>
                                
                                 <?php

                                 $cate=$this->Model->getOne("produit",array("PRODUIT_ID"=>$req['PRODUIT_ID']));
                                foreach ($cat as $value) {
                                  
                                ?>
                                <option value="<?=$value['CATEGORIE_ID']?>" <?php if($value['CATEGORIE_ID']==$cate['CATEGORIE_ID']) echo 'selected'; ?>><?=$value['CATEGORIE_DESCR']?> </option>
                                <?php
                                # code...
                                }
                                ?>
                                
                                </select>
                            </div>
                            <div class="col-md-2 sm-2 xs-2 form-group">
                                <label>produit</label>

                                 <select id="PRODUIT_ID" name="PRODUIT_ID" class="form-control" required>
                                    <option value="<?=$cate['PRODUIT_ID']?>"><?=$cate['PRODUIT_DESCR']?></option>
                                </select>
                            </div>
                             
                            <div class="col-md-2 sm-3 xs-2 form-group">
                                <label>P.A Unitaire</label>
                                <input type="number" name="PA" id="PA" class="form-control input-sm"  autocomplete="off" value="<?=$req['PA_UNITAIRE']?>" required>
                            </div>
                            
                            <div class="col-md-2 sm-3 xs-2  form-group">
                                <label>P.V Uniteraire</label>
                                <input type="number" name="PV" id="PV" class="form-control input-sm"  autocomplete="off" value="<?=$req['PV_UNITAIRE']?>" required>
                            </div>
                            <div class="col-md-2 sm-3 xs-2  form-group">
                                <label>Date de peremption</label>
                                 <input type="date" name="DATE" id="DATE" class="form-control input-sm"  autocomplete="off" value="<?=$req['PEREMPRION']?>" required>
                            </div>
                            <div class="col-md-2 sm-3 xs-2 form-group">
                                <label>Nombre(quantité)</label>
                                <input type="number" name="NOMBRE" id="NOMBRE" class="form-control input-sm"  autocomplete="off" value="<?=$req['NOMBRE']?>" readonly>
                            </div>
                             
                            </div>
                            
                        <div class="row">
                            
                           
                             <div class="col-md-12 sm-12 xs-12 form-group">
                                <label>.</label>
                                
                               <button type="sumit" name="sub"  class="btn btn-success form-control"><span style="font-size: 14px; color:white">Modifier</span>   
                               </button>
                       
                            </div>
                        </div>
  
                       
                    </form> 

                    <div class="col-md-12" id="tablo">
                        
                    </div>
            </div>
        </div>
        </div>
        <!-- FOOTER -->
    
    <!-- jQuery Plugins -->
  <?php
       include 'includes/pied.php';
        ?>

        <?php
       include 'includes/footer.php';
        ?>
        <!-- /FOOTER -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/datatable/datatables.min.css">

    
    <script type="text/javascript" src="<?php echo base_url() ?>assets/datatable/datatables.min.js"></script>

    </body>
</html>
 <script type="text/javascript">
    // $('#DATE').datetimepicker({format: 'd-m-Y'});

    </script>

    <script >
        $('#CATEGORIE_ID').change(function(){
     // alert($('#CODE').val());
     var id=$('#CATEGORIE_ID').val();

    $.ajax({
                            url:"<?php echo base_url() ?>Admin/produit",
                            method:"POST",
                            //async:false,
                            data: {id:id},
                                                                                 
                            success:function(data)
                                                {  
                                                   // alert(data); 

                                                    $('#PRODUIT_ID').html(data); 

                                                //$('#COMMUNE').selectpicker('refresh');                                                   
                                                 }
                });
    
 

});
    </script>

    <script >
        $('#sub').click(function(){

            var size=($('textarea').val()).split("||");
     // alert(size.length);
     if (size.length==$('#NOMBRE').val()) {
     var CATEGORIE_ID=$('#CATEGORIE_ID').val();
     var PRODUIT_ID=$('#PRODUIT_ID').val();
     var PA=$('#PA').val();
     var PV=$('#PV').val();
     var DATE=$('#DATE').val();
     var NOMBRE=$('#NOMBRE').val();
     var CODES=$('textarea').val();

     if (CATEGORIE_ID&&PRODUIT_ID&&PA&&PV&&DATE&&NOMBRE&&CODES) {

    $.ajax({
                            url:"<?php echo base_url() ?>Admin/cart_requisition",
                            method:"POST",
                            //async:false,
                            data: {PRODUIT_ID:PRODUIT_ID,PA:PA,PV:PV,DATE:DATE,NOMBRE:NOMBRE,CODES:CODES},
                                                                                 
                            success:function(data)
                                                {  
                                                    // alert(data); 

                                                    // $('#cart').html(data); 
                                                    $('#tablo').html(data); 

                                                    $('#CATEGORIE_ID').val('');
                                                     $('#PRODUIT_ID').val('');
                                                     $('#PA').val('');
                                                     $('#PV').val('');
                                                     $('#DATE').val('');
                                                     $('#NOMBRE').val('');
                                                     $('textarea').val('');

                                                //$('#COMMUNE').selectpicker('refresh');                                                   
                                                 }
                });
    
 }else{
    alert("Veuillez bien remplir tout les champs");
 }

 }else{
    alert("Le nombre des produit mentionné est différernt au scan fait");
 }

});


 $('#NOMBRE').keyup(function(){
 $('textarea').val('');
 });

       $(document).on('click','.remove',function(){
            var rowid=$(this).attr("id");
// alert(rowid);
            if(confirm('Voulez-vous vraiment enlever cette Requisition?')){

                 $.ajax({
                            url:"<?php echo base_url() ?>Admin/delete_requisition",
                            method:"POST",
                         // async:false,
                            data: {rowid:rowid},
                                                                                 
                            success:function(stutus)
                                                        { $('#tablo').html(stutus);  

                                                     // alert(stutus);
                                                    }
        
                                                    });
            }else{
                return false;
            }
        });


      $(document).on('click','#enregistrer',function(){
        window.location.href = "<?php echo base_url(); ?>Admin/add_cart_requisition";
      });

    </script>

