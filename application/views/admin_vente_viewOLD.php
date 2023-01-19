<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin accueil</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php
       include 'includes/header.php';
        ?>
            <style type="text/css">
        @media print
{
  .button
  {
    display: none;
  }
}

  input[type=checkbox] {
    transform: scale(2);
}

    </style>
    <script type="text/javascript">

        function myFunction()
{
    window.print();
}
    </script>
    </head>
    <body  style=" background: #c9dbe9">
        <!-- HEADER -->
        <?php
        $lien1="";
        $lien2="";
        $lien3="";
        $lien4="";

    $active1="primary";
    $active2="primary";
    $active3="primary";
    $active4="primary";
    $active5="primary";
    $active6="primary";
    $active7="primary";
    $active8="info";
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
        <script src="<?php echo base_url() ?>new_assets/js/search_piker.js"></script>
        <script src="<?php echo base_url() ?>new_assets/css/search_picker.css"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" /> -->

<?php
       if (!empty($this->cart->contents()) ){

?>
<div class="col-md-12" id="facture">
                       <div class='print' style="border: 1px solid #a1a1a1; width: 300px; background: white; padding: 10px; margin: 0 auto; text-align: center;">

                    <div class="invoice-title" align="center">

                        <h3>Chez Pablo Moses</h3>
                    </div>

                    <div class="invoice-title" align="left">
                        Fact no #  &nbsp;<b><?=$facture?></b>
                    </div>


                    <div class="invoice-title" align="right">
                        Date:   <b><?=date('d/m/Y')?></b>
                    </div>
                    </br>
                    </br>
                  <div>
                        <div>
                            <table class="table table-condensed">
                                <thead>
                                <tr>
                                    <td class="text-center"><strong>No</strong></td>
                                    <td class="text-center"><strong>Pxt</strong></td>
                                    <td class="text-center"><strong>PVU</strong></td>
                                    <td class="text-center"><strong>PVT</strong></td>
                                </tr>
                                </thead>
<?php
$total=0;
$total2=0;
 foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
              $total+=$items["PV"];
              $total1=$items["qty"]*$items["PV"];
              $total2+=$total1;
          ?>
                                <tr>
                                    <td class="text-center">
                                        <?=$items["qty"]?>
                                    </td >
                                    <td class="text-center">
                                        <?=$items["NOM_PRODUIT"]?>
                                    </td >
                                    <td class="text-center">
                                           <?=$items["PV"]?>
                                    </td >
                                    <td class="text-center">
                                           <?=$total1?>
                                    </td >
                                    </tr>
<?php }} ?>
                            </table>
                        </div>
                    </div>
                    <div  align="right">
                       Total HTVA &nbsp;&nbsp;<b><?=$total2?></b>
                    </div>
                    
                    <input style="padding:5px;" value="Imprimer facture" type="button" onclick="printContent('facture');" class="button"></input>
                </div>
                <div>
                    </div>
            </div>

            <?php
             $this->cart->destroy();
          }
          ?>




            <div class="col-md-12" style="margin-top: 50px">
                <h3 style="text-align: center;">VENTE SUR CAISSE</h3>
                 
                     <?=$breadcrumb?>

                     <?= $this->session->flashdata('msg') ?>
                      <h3><input type="checkbox" id="is_qrcode" name="is_qrcode" checked style=""> <label for="is_qrcode">QR CODE</label></h3>
                      <div class="row">
                    <?php
                          $users=$this->Model->getListOrdered("users","NOM_USER",array("PROFILE_ID"=>3));
                          ?>
                             <div class="col-md-4 sm-4 xs-4 form-group">
                               <label>Client</label>
                               <select id="USER_ID" name="USER_ID" class="form-control selectpicker"  data-live-search="true" required>
                                <option value="">--choisir un client--</option>
                                
                                 <?php
                                 foreach ($users as $value) {
                                   ?>
                                    <option value="<?=$value['USER_ID']?>"><?=$value['NOM_USER']?> <?=$value['PRENOM_USER']?>(<?=$value['TELEPHONE']?>)</option>
                                   <?php
                                 }
                                 ?>
                                 
                               </select>
                               <input type="text" name="NOM_CLIENT" id="NOM_CLIENT" class="form-control input-sm"  autocomplete="off" value="" placeholder="NOM DU CLIENT" style="display: none">
                               <input type="text" name="TEL_CLIENT" id="TEL_CLIENT" class="form-control input-sm"  autocomplete="off" value="" placeholder="TEL DU CLIENT" style="display: none">
                            </div>
                            <div class="col-md-2 sm-3 xs-2 form-group">
                                <label>Points</label>
                                <input type="number" name="POINT" id="POINT" class="form-control input-sm"  autocomplete="off" value="" readonly>
                            </div>
                          </div>
                <form id="myform" action="<?php echo base_url()?>produit/Requisition/add_reauisition"  method="post" enctype="multipart/form-data">

                  
                  <div class="row">
                             <div class="col-md-3 sm-3 xs-3 form-group">
                                <video id="preview" style=" width: 100%"></video>
                               <!-- <textarea class="form-control" readonly=""></textarea> -->
                               <input type="text" name="QR_CODE" id="QR_CODE" class="form-control input-sm"  autocomplete="off" value="" required readonly>
                            </div>
                            
                           
                           
                            <div class="col-md-2 sm-2 xs-2 form-group">
                                <label>P.A Unitaire</label>
                                <input type="number" name="PA" id="PA" class="form-control input-sm"  autocomplete="off" value="" required readonly>
                            </div>
                            
                            <div class="col-md-2 sm-2 xs-2  form-group">
                                <label>P.V Uniteraire</label>
                                <input type="number" name="PV" id="PV" class="form-control input-sm"  autocomplete="off" value="" required>
                                <input type="hidden" name="PV1" id="PV1" class="form-control input-sm"  autocomplete="off" value="" required>
                            </div>
                             <div class="col-md-3 sm-3 xs-3 form-group">
                               <label>Type de réduction</label>
                               <select id="CONSOMMATION" name="CONSOMMATION" class="form-control" >
                                <option value="0">PAS DE REDUCTION</option>
                                <option value="1">CONSOMMER POINT</option>
                                <option value="2">BONUS TOTAL</option>
                                
                                
                               </select>
                            </div>
                             <div class="col-md-1 sm-1 xs-1 form-group">
                                <label>.</label>
                                
                               <button type="button" name="sub" id="sub" class="btn btn-success form-control"><span style="font-size: 14px; color:white">+</span>   
                               </button>
                       
                            </div>
                             
                            </div>
                            
                        
  
                       
                    </form> 

                <form id="myform1" action="<?php echo base_url()?>produit/Requisition/add_reauisition"  method="post" enctype="multipart/form-data" style='display: none;'>

                            <div class="row">

                           <div class="row" id="formi">
                          <?php
                          $cat=$this->Model->getListOrdered("categorie","CATEGORIE_DESCR");
                          ?>
                            
                            
                            <div class="row"></div>
                            <div class="col-md-2 sm-2 xs-2 form-group">
                                <label>Categorie</label>
                                 <select id="CATEGORIE_ID1" name="CATEGORIE_ID" class="form-control" required>
                                <option value="">--choisir--</option>
                                
                                 <?php
                                foreach ($cat as $value) {
                                  
                                ?>
                                <option value="<?=$value['CATEGORIE_ID']?>"><?=$value['CATEGORIE_DESCR']?> </option>
                                <?php
                                # code...
                                }
                                ?>
                                
                                </select>
                            </div>
                            <div class="col-md-2 sm-2 xs-2 form-group">
                                <label>produit</label>
                                 <select id="PRODUIT_ID1" name="PRODUIT_ID" class="form-control" required>
                              
                                </select>
                            </div>
                             
                            <div class="col-md-2 sm-2 xs-2 form-group">
                                <label>P.A Unitaire</label>
                                <input type="number" name="PA1" id="PA1" class="form-control input-sm"  autocomplete="off" value="" required readonly>
                            </div>
                            
                            <div class="col-md-2 sm-2 xs-2  form-group">
                                <label>P.V Uniteraire</label>
                                <input type="number" name="PV2" id="PV2" class="form-control input-sm"  autocomplete="off" value="" required>
                                <input type="hidden" name="PV3" id="PV3" class="form-control input-sm"  autocomplete="off" value="" required>
                            </div>
                            <div class="col-md-2 sm-2 xs-2  form-group">
                                <label>Quantité</label>
                                <input type="number" name=" qt" id="qt" class="form-control input-sm"  autocomplete="off" value="" required>
                                
                            </div>
                             <div class="col-md-2 sm-2 xs-2 form-group">
                               <label>Type de réduction</label>
                               <select id="CONSOMMATION1" name="CONSOMMATION1" class="form-control" >
                                <option value="0">PAS DE REDUCTION</option>
                                <option value="1">CONSOMMER POINT</option>
                                <option value="2">BONUS TOTAL</option>
                                
                                
                               </select>
                            </div>
                             <div class="col-md-1 sm-1 xs-1 form-group">
                                <label>.</label>
                                
                               <button type="button" name="sub" id="sub1" class="btn btn-success form-control"><span style="font-size: 14px; color:white">+</span>   
                               </button>
                       
                            </div>
                             
                            </div>
   
                    </form> 

                    

                    
        </div>
        <div class="col-md-12" id="tablo">
                        
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


      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        
            // $('#CODE').val('3,');
            $('#QR_CODE').val(content);
            
                 $.ajax({
                            url:"<?php echo base_url() ?>Admin/vente_prix",
                            method:"POST",
                         // async:false,
                            data: {qr_code:content},
                                                                                 
                            success:function(stutus)
                                                        { 
                                                          var res=stutus.split('|');

                                                          // alert(stutus);

                                                          if (res[0] != ""){
                                                            if (res[2]!=content) {
                                                            $('#PA').val(res[0]);
                                                            $('#PV').val(res[1]);
                                                            $('#PV1').val(res[1]);
                                                          }else{alert("Echec! ce produit est deja vendu");}
                                                          }else{
                                                            alert("ce produit n'est requisitionné");
                                                          }

                                                            

                                                     // alert(stutus);
                                                    }
        
                                                    });
       
        // window.location.href =content;
      });
      Instascan.Camera.getCameras().then(function (cameras) {
        if (cameras.length > 0) {
          scanner.start(cameras[0]);
        } else {
          console.error('No cameras found.');
        }
      }).catch(function (e) {
        console.error(e);
      });
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
  
     var USER_ID=$('#USER_ID').val();
     var QR_CODE=$('#QR_CODE').val();
     var PA=$('#PA').val();
     var PV=$('#PV').val();
     var TYPE_REDUCTION=$('#CONSOMMATION').val();
     var NOM_CLIENT=$('#NOM_CLIENT').val();
     var TEL_CLIENT=$('#TEL_CLIENT').val();
    

     if (QR_CODE&&PA&&PV&&TYPE_REDUCTION) {

    $.ajax({
                            url:"<?php echo base_url() ?>Admin/cart_vente",
                            method:"POST",
                            //async:false,
                            data: {NOM_CLIENT:NOM_CLIENT,TEL_CLIENT:TEL_CLIENT,USER_ID:USER_ID,QR_CODE:QR_CODE,PA:PA,PV:PV,TYPE_REDUCTION:TYPE_REDUCTION},
                                                                                 
                            success:function(data)
                                                {  

                                                  if (TYPE_REDUCTION==1) {
                                                    var rest=$('#POINT').val()-$('#PV').val();
                                                   $('#POINT').val(rest); 
                                                  }
                                                    // alert(data); 

                                                    // $('#cart').html(data); 
                                                    $('#tablo').html(data); 

                                                    $('#QR_CODE').val('');
                                                     $('#PA').val('');
                                                     $('#PV').val('');
                                                     $('#CONSOMMATION').val(0);

                                                //$('#COMMUNE').selectpicker('refresh');                                                   
                                                 }
                });
    
 }else{
    alert("Veuillez bien remplir tout les champs");
 }



});


 $('#NOMBRE').keyup(function(){
 $('textarea').val('');
 });



      $(document).on('click','#enregistrer',function(){
        window.location.href = "<?php echo base_url(); ?>Admin/add_cart_vente";
      });



       $(document).on('change','#USER_ID',function(){
            var USER_ID= $('#USER_ID').val();


            if (USER_ID==0) {
              // alert(USER_ID);
              $('#NOM_CLIENT').show();
              $('#TEL_CLIENT').show();
            }else{
              $('#NOM_CLIENT').hide();
              $('#TEL_CLIENT').hide();
            }

                 $.ajax({
                            url:"<?php echo base_url() ?>Admin/vente_point",
                            method:"POST",
                         // async:false,
                            data: {USER_ID:USER_ID},
                                                                                 
                            success:function(stutus)
                                                        { $('#POINT').val(stutus);  
                                                        $('#tablo').html('');

                                                     // alert(stutus);
                                                    }
        
                                                    });
      
        });

       $(document).on('change','#CONSOMMATION',function(){

        var point=parseInt($('#POINT').val());
        var pri_achat=parseInt($('#PA').val());
        var QR_CODE=$('#QR_CODE').val();
        var prix_sub=0;
        var pour_sub=0;

// alert(id);
    $.ajax({
                            url:"<?php echo base_url() ?>Admin/prix_subvention",
                            method:"POST",
                            async:false,
                            data: {QR_CODE:QR_CODE},
                                                                                 
                            success:function(data)
                                                { 
                                                // alert(data) ;
                                  var v=data.split("||");
                                                    prix_sub=v[0]; 
                                                    pour_sub=v[1];
                                                 }
                });


          if ($('#CONSOMMATION').val()==1) {
            if(pour_sub==1){
            if ($('#USER_ID').val()) {

              if (point >= prix_sub) {
                // alert(point +"||"+ pri_achat);
                $('#PV').val(prix_sub);
              }else{
                alert("Echec! ce client n'a pas de point pour cette réduction");
                $('#CONSOMMATION').val(0);
              }
            

            }else{
          alert("Echec! selectionner d'abord le client");
           $('#PV').val($('#PV1').val());
           $('#CONSOMMATION').val(0);
        }
      }else{
        alert("Echec! Ce produit n'est pas pour subvention");
        $('#CONSOMMATION').val(0);
      }
          }else{
            if ($('#CONSOMMATION').val()==2) {
              $('#PV').val('0');
            }else
             $('#PV').val($('#PV1').val());
          }
        
          
       });
        


               $(document).on('click','.remove',function(){
            var rowid=$(this).attr("id");
// alert(rowid);
            if(confirm('Voulez-vous vraiment enlever cette vente?')){

                 $.ajax({
                            url:"<?php echo base_url() ?>Admin/delete_vente",
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


    </script>
<script>
function printContent(el){

var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}
</script>
<script>
                  $('#CATEGORIE_ID1').change(function(){
     // alert($('#CODE').val());
     var id=$('#CATEGORIE_ID1').val();

    $.ajax({
                            url:"<?php echo base_url() ?>Admin/produit",
                            method:"POST",
                            //async:false,
                            data: {id:id},
                                                                                 
                            success:function(data)
                                                {  
                                                   // alert(data); 

                                                    $('#PRODUIT_ID1').html(data); 

                                                //$('#COMMUNE').selectpicker('refresh');                                                   
                                                 }
                });
    
 

});


           $(document).on('click','#is_qrcode',function(){
        if($("#is_qrcode").prop('checked') == true){
              $('#myform').show();
              $('#myform1').hide();
          }else{
              $('#myform').hide();
              $('#myform1').show();
          }
      });

                   $('#PRODUIT_ID1').change(function(){
     // alert($('#CODE').val());
     var id=$('#PRODUIT_ID1').val();

    $.ajax({
                            url:"<?php echo base_url() ?>Admin/produit_price",
                            method:"POST",
                            //async:false,
                            data: {id:id},
                                                                                 
                            success:function(data)
                                                {  
                                                    // alert(data);
                                                    var donnes= data.split('|');
                                                     // alert(donnes[0]);
                                                     if (donnes[2]==1) {
                                                    $('#PA1').val(donnes[1]);                                                  
                                                    $('#PV2').val(donnes[0]);                                                  
                                                    $('#PV3').val(donnes[0]); 
                                                    }else{
                                                      alert('ECHEC! CE PRDUIT N\'EST PAS REQUISITIONNE');
                                                      $('#PA1').val('');
                                                      $('#PV2').val('');
                                                      $('#PV3').val('');
                                                      $('#qt').val('');
                                                      $('#PRODUIT_ID1').val('');
                                                    }                                                 
                                                 }
                });
    
 

});



        $('#sub1').click(function(){


     var USER_ID=$('#USER_ID').val();
     var QR_CODE='';
     var PA=$('#PA1').val();
     var PV=$('#PV2').val();
     var qty=$('#qt').val();
     var TYPE_REDUCTION=$('#CONSOMMATION1').val();
     var NOM_CLIENT=$('#NOM_CLIENT').val();
     var TEL_CLIENT=$('#TEL_CLIENT').val();
     var TEL_CLIENT=$('#TEL_CLIENT').val();
     var PRODUIT_ID1=$('#PRODUIT_ID1').val();

     if (PA&&PV&&TYPE_REDUCTION&&qty) {

    $.ajax({
                            url:"<?php echo base_url() ?>Admin/cart_vente",
                            method:"POST",
                            //async:false,
                            data: {NOM_CLIENT:NOM_CLIENT,TEL_CLIENT:TEL_CLIENT,USER_ID:USER_ID,QR_CODE:QR_CODE,PA:PA,PV:PV,TYPE_REDUCTION:TYPE_REDUCTION,qty:qty,PRODUIT_ID1:PRODUIT_ID1},
                                                                                 
                            success:function(data)
                                                {  

                                                  if (TYPE_REDUCTION==1) {
                                                   
                                                    var rest=$('#POINT').val()-($('#PV2').val()*$('#qt').val());
                                                     // alert(rest); 
                                                   $('#POINT').val(rest); 
                                                  }
                                                    // alert(data); 

                                                    // $('#cart').html(data); 
                                                    $('#tablo').html(data); 

                                                    $('#QR_CODE').val('');
                                                     $('#PA1').val('');
                                                     $('#PV2').val('');
                                                     $('#qt').val('');
                                                     $('#CONSOMMATION1').val(0);
                                                     $('#CATEGORIE_ID1').val('');
                                                     $('#PRODUIT_ID1').val('');

                                                //$('#COMMUNE').selectpicker('refresh');                                                   
                                                 }
                });
    
 }else{
    alert("Veuillez bien remplir tout les champs");
 }



});

               $(document).on('change','#CONSOMMATION1',function(){

        var point=parseInt($('#POINT').val());
        var pri_achat=parseInt($('#PA1').val());
        var id=parseInt($('#PRODUIT_ID1').val());
       
        var prix_sub=0;
        var pour_sub=0;

// alert(id);
    $.ajax({
                            url:"<?php echo base_url() ?>Admin/prix_subvention1",
                            method:"POST",
                            async:false,
                            data: {id:id},
                                                                                 
                            success:function(data)
                                                { 
                                                // alert(data) ;
                                  var v=data.split("||");
                                                    prix_sub=v[0]; 
                                                    pour_sub=v[1];
                                                 }
                });


          if ($('#CONSOMMATION1').val()==1) {
            if(pour_sub==1){
            if ($('#USER_ID').val()) {

              if (point >= prix_sub) {
                // alert(point +"||"+ pri_achat);
                $('#PV2').val(prix_sub);
              }else{
                alert("Echec! ce client n'a pas de point pour cette réduction");
                $('#CONSOMMATION1').val(0);
              }
            

            }else{
          alert("Echec! selectionner d'abord le client");
           $('#PV2').val($('#PV3').val());
           $('#CONSOMMATION1').val(0);
        }
      }else{
        alert("Echec! Ce produit n'est pas pour subvention");
        $('#CONSOMMATION1').val(0);
      }
          }else{
            if ($('#CONSOMMATION1').val()==2) {
              $('#PV2').val('0');
            }else
             $('#PV2').val($('#PV3').val());
          }
        
          
       });
</script>