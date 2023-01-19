<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Admin accueil</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <?php
       include 'includes/header.php';
        ?>
<style type="text/css">
  input[type=checkbox] {
    transform: scale(2);
}
</style>
    <link href="<?=base_url()?>assets/datepicker/css/datep.css" rel="stylesheet" type="text/css" />
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

              <script src="<?php echo base_url() ?>new_assets/js/search_piker.js"></script>
        <script src="<?php echo base_url() ?>new_assets/css/search_picker.css"></script>
        <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" /> -->

<?php
       // if (!empty($this->cart->contents()) ){

?>
<div class="col-md-12" id="facture">
                       <div class='print' style="border: 1px solid #a1a1a1; width: 300px; background: white; padding: 10px; margin: 0 auto; text-align: center;">

                    <div class="invoice-title" align="center">

                        <h3>Chez Pablo Moses</h3>
                    </div>

                    <div class="invoice-title" align="left" style="font-size: 10px">
                        <!-- Fact no  &nbsp;<b><?=$id?></b> -->
                         RC : 03017 <br>
                        NIF: 4000418717<br>
                        Adress: Rohero I ,av Luxembourg,no 16
                    </div>



                    <div class="invoice-title" align="right" style="font-size: 10px">
                        Date:   <b><?=date('d/m/Y')?></b>
                    </div>
                    </br>
                    </br>
                  <div>
                        <div>
                            <table class="table table-condensed">
                                <thead>
                                <tr >
                                    <td class="text-center" style="font-size: 10px;text-align: left;"><strong>Qty</strong></td>
                                    <td class="text-center" style="font-size: 10px;text-align: left;"><strong>Pxt</strong></td>
                                    <td class="text-center" style="font-size: 10px;text-align: right;"><strong>PVU</strong></td>
                                    <td class="text-center" style="font-size: 10px;text-align: right;"><strong>PVT</strong></td>
                                </tr>
                                </thead>
<?php
$total=0;
$total2=0;

// print_r($pro_commande);
 foreach ($pro_commande as $items) {
       
              $total+=$items["PRIX_UNITAIRE"];
              $total1=$items["QUANTITE"]*$items["PRIX_UNITAIRE"];
              $total2+=$total1;
              $PRO=$this->Model->getOne("produit",array("PRODUIT_ID"=>$items["PRODUIT_ID"]));
          ?>
                                <tr>
                                    <td style="font-size: 10px;text-align: left;">
                                        <?=$items["QUANTITE"]?>
                                    </td >
                                    <td class="text" style="font-size: 10px;text-align: left;">
                                       <?=$PRO["PRODUIT_DESCR"]?>
                                    </td >
                                    <td class="text" style="font-size: 10px;text-align: right;">
                                           <?=$items["PRIX_UNITAIRE"]?>
                                    </td >
                                    <td class="text" style="font-size: 10px;text-align: right;">
                                           <?=$total1?>
                                    </td >
                                    </tr>
<?php
 }

 $frai_transfert=$commande['FRAIS_DE_TRANSFAIRE'];
 $frai_transport=$commande['FRAIS_DE_TRANSPORT'];
 $total_general=$total2+$frai_transfert+$frai_transport;
 ?>

                                     <tr>
                                    <td style="font-size: 10px;text-align: left;">
                                        
                                    </td >
                                    <td class="text" style="font-size: 10px;text-align: left;">
                                       Frais de retrait
                                    </td >
                                    <td class="text" style="font-size: 10px;text-align: right;">
                                           
                                    </td >
                                    <td class="text" style="font-size: 10px;text-align: right;">
                                           <?=$frai_transfert?>
                                    </td >
                                    </tr>
                                      <tr>
                                    <td style="font-size: 10px;text-align: left;">
                                        
                                    </td >
                                    <td class="text" style="font-size: 10px;text-align: left;">
                                       Frais de Transport
                                    </td >
                                    <td class="text" style="font-size: 10px;text-align: right;">
                                           
                                    </td >
                                    <td class="text" style="font-size: 10px;text-align: right;">
                                           <?=$frai_transport?>
                                    </td >
                                    </tr>
                            </table>
                        </div>
                    </div>
                    <div  align="right" style="font-size: 10px">
                       Total HTVA &nbsp;&nbsp;<b><?=$total_general?></b>
                    </div>
                    
                    <input style="padding:5px;" value="Facture" type="button" onclick="printContent('facture');" class="button"></input>
                </div>
                <div>
                    </div>
            </div>

            <?php
             $this->cart->destroy();
          // }
          ?>


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
     <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/scannerDetection.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/scannerDetection.js"></script>
    </body>
</html>
 

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
 <script type="text/javascript">
    // BARCODE


$(document).scannerDetection({

  timeBeforeScanTest: 200, // wait for the next character for upto 200ms
  avgTimeByChar: 40, // it's not a barcode if a character takes longer than 100ms
  preventDefault: false,

  endChar: [13],
    onComplete: function(barcode, qty){
   validScan = true;
   // alert(barcode);
   
      // $('#scannerInput').val (barcode);
  // $("#textarea").val(barcode)
            $('#QR_CODE').val(barcode);
            
                 $.ajax({
                            url:"<?php echo base_url() ?>Admin/vente_prix",
                            method:"POST",
                         // async:false,
                            data: {qr_code:barcode},
                                                                                 
                            success:function(stutus)
                                                        { 
                                                          var res=stutus.split('|');

                                                          // alert(stutus);

                                                          if (res[0] != ""){
                                                            if (res[2]!=barcode) {
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
          


    } // main callback function ,
  ,
  onError: function(string, qty) {
 // alert(string);
  } 
  
  
});


    </script>