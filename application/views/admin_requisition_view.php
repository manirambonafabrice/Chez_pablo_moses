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
       $this->cart->destroy();
        ?>
    <!-- /HEADER -->
    <div class="container">
    <div class="row">











      <!-- <div class="col-md-8"></div> -->
      <?php
       include 'includes/sous_menus_admin.php';
        ?>
            <div class="col-md-12" style="margin-top: 50px">
                <h3 style="text-align: center;">Réquisition</h3>
                 
                     <?=$breadcrumb?>

                     <?= $this->session->flashdata('msg') ?>
                <h3><input type="checkbox" id="is_qrcode" name="is_qrcode" checked style=""> <label for="is_qrcode">QR CODE</label></h3>
                <form id="myform" action="<?php echo base_url()?>produit/Requisition/add_reauisition"  method="post" enctype="multipart/form-data">

                        <div class="row" id="formi">
                          <?php
                          $cat=$this->Model->getListOrdered("categorie","CATEGORIE_DESCR");
                          ?>
                            
                            
                            <div class="row"></div>
                            <div class="col-md-2 sm-2 xs-2 form-group">
                                <label>Categorie</label>
                                 <select id="CATEGORIE_ID" name="CATEGORIE_ID" class="form-control" required>
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
                                 <select id="PRODUIT_ID" name="PRODUIT_ID" class="form-control" required>
                              
                                </select>
                            </div>
                             
                            <div class="col-md-2 sm-3 xs-2 form-group">
                                <label>P.A Unitaire</label>
                                <input type="number" name="PA" id="PA" class="form-control input-sm"  autocomplete="off" value="" required>
                            </div>
                            
                            <div class="col-md-2 sm-3 xs-2  form-group">
                                <label>P.V Uniteraire</label>
                                <input type="number" name="PV" id="PV" class="form-control input-sm"  autocomplete="off" value="" required>
                            </div>
                            <div class="col-md-2 sm-3 xs-2  form-group">
                                <label>Date de peremption</label>
                                 <input type="text" name="DATE" id="DATE" class="form-control input-sm date"  autocomplete="off" value="" required >
                            </div>
                            <div class="col-md-2 sm-3 xs-2 form-group">
                                <label>Nombre(quantité)</label>
                                <input type="number" name="NOMBRE" id="NOMBRE" class="form-control input-sm"  autocomplete="off" value="" required>
                                <span id="unite">.</span>
                            </div>
                             
                            </div>
                            
                        <div class="row">
                             <div class="col-md-3 sm-3 xs-3 form-group">
      <hr>
        <canvas style=" width: 100%"></canvas>
      <hr>
        <ul></ul>
                             
                                <!-- <video id="preview" style=" width: 100%"></video> -->
                                 <input type="number" name="N" id="N" class="form-control input-sm"  autocomplete="off" value="" readonly>
                              
                            </div>
                             <div class="col-md-4 sm-4 xs-4 form-group" id="CODE1">
                                
                                <label>.</label>

                                <textarea id="textarea" class="form-control" readonly=""></textarea>
                                
                              <!-- <input id="CODE" type="text" value="" data-role="" class="form-control" /> -->
                       
                            </div>










                           
                             <div class="col-md-1 sm-1 xs-1 form-group">
                                <label>.</label>
                                
                               <button type="button" name="sub" id="sub" class="btn btn-success form-control"><span style="font-size: 14px; color:white">+</span>   
                               </button>
                       
                            </div>
                        </div>
  
                       
                    </form>

                <form id="myform1" style="display: none" action="<?php echo base_url()?>produit/Requisition/add_reauisition"  method="post" enctype="multipart/form-data">

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
                             
                            <div class="col-md-2 sm-3 xs-2 form-group">
                                <label>P.A Unitaire</label>
                                <input type="number" name="PA1" id="PA1" class="form-control input-sm"  autocomplete="off" value="" required>
                            </div>
                            
                            <div class="col-md-2 sm-3 xs-2  form-group">
                                <label>P.V Uniteraire</label>
                                <input type="number" name="PV1" id="PV1" class="form-control input-sm"  autocomplete="off" value="" required>
                            </div>
                            <div class="col-md-2 sm-3 xs-2  form-group">
                                <label>Date de peremption</label>
                                 <input type="text" name="DATE1" id="DATE1" class="form-control input-sm date"  autocomplete="off" value="" required >
                            </div>
                            <div class="col-md-2 sm-3 xs-2 form-group">
                                <label>Nombre(quantité)</label>
                                <input type="number" name="NOMBRE1" id="NOMBRE1" class="form-control input-sm"  autocomplete="off" value="" required><span id="unite1">.</span>
                            </div>
                             
                            </div>
                            
                        <div class="row">



                             <div class="col-md-1 sm-1 xs-1 form-group">
                                <label>.</label>
                                
                               <button type="button" name="sub1" id="sub1" class="btn btn-success form-control"><span style="font-size: 14px; color:white">+</span>   
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
     <script type="text/javascript" src="<?php echo base_url() ?>assets/jquery/scannerDetection.js"></script>

    </body>
</html>
 <!-- <script type="text/javascript">
    // $('#DATE').datetimepicker({format: 'd-m-Y'});

//QR-CODE
      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        if ($('#NOMBRE').val()) {
            
            var existant=$("#textarea").val();
            if ($.trim($("#textarea").val()) != "") {
                // alert('1');
                var res=existant.split("||");
                // alert(res);
                if (res.length<$('#NOMBRE').val()) {
                if (!res.includes(content)) {
                  $('#textarea').val(existant+"||"+content); 
                 // alert();
                  var N=parseInt(parseInt($('#N').val())+1);
                  $('#N').val(N);
 
                }

               }else alert("Attention!! Vous voulez dépasser le nombre de produit");
                
                // $('#CODE1').html(existant+","+content);
            }else{
                // alert($('#CODE1').html());
            // $('#CODE').val('3,');
            $('textarea').val(content);
            // alert();
             var N=1;
                  $('#N').val(N);
            }
        }else{
            alert("Veuillez d'abord entrer la quantité des produit");
        }
        
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
 -->
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
    $('#PRODUIT_ID').change(function(){
     // alert($('#CODE').val());
     var id=$('#PRODUIT_ID').val();

    $.ajax({
                            url:"<?php echo base_url() ?>Admin/produit_unite",
                            method:"POST",
                            //async:false,
                            data: {id:id},
                                                                                 
                            success:function(data)
                                                {  
                                                    // alert(data); 

                                                    $('#unite').html(data);                                                  
                                                 }
                });
    
        $.ajax({
                            url:"<?php echo base_url() ?>Admin/produit_price",
                            method:"POST",
                            //async:false,
                            data: {id:id},
                                                                                 
                            success:function(data)
                                                {  
                                                    // alert(data);
                                                    var donnes= data.split('|');
                                                     
                                                    $('#PA').val(donnes[1]);                                                  
                                                    $('#PV').val(donnes[0]);                                                  
                                                    // $('#PV3').val(donnes[0]); 
                                                                                                   
                                                 }
                });
    
 

});
        $('#PRODUIT_ID1').change(function(){
     // alert($('#CODE').val());
     var id=$('#PRODUIT_ID1').val();

    $.ajax({
                            url:"<?php echo base_url() ?>Admin/produit_unite",
                            method:"POST",
                            //async:false,
                            data: {id:id},
                                                                                 
                            success:function(data)
                                                {  
                                                    // alert(data); 

                                                    $('#unite1').html(data);                                                  
                                                 }
                });
        $.ajax({
                            url:"<?php echo base_url() ?>Admin/produit_price",
                            method:"POST",
                            //async:false,
                            data: {id:id},
                                                                                 
                            success:function(data)
                                                {  
                                                    // alert(data);
                                                    var donnes= data.split('|');
                                                     
                                                    $('#PA1').val(donnes[1]);                                                  
                                                    $('#PV1').val(donnes[0]);                                                  
                                                    // $('#PV3').val(donnes[0]); 
                                                                                                   
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
                                                    if (data=='exist') {
                                                      alert("ECHEC! CES PRODUITS CONTIENNENT UN CODE DEJA EXISTANT");
                                                      $('#N').val('');
                                                    } else{
                                                       $('#tablo').html(data);
                                                    }
                                                     

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


        $('#sub1').click(function(){

            // var size=($('textarea').val()).split("||");
     // alert(size.length);

     var CATEGORIE_ID=$('#CATEGORIE_ID1').val();
     var PRODUIT_ID=$('#PRODUIT_ID1').val();
     var PA=$('#PA1').val();
     var PV=$('#PV1').val();
     var DATE=$('#DATE1').val();
     var NOMBRE=$('#NOMBRE1').val();
     var CODES='';

     if (CATEGORIE_ID&&PRODUIT_ID&&PA&&PV&&DATE&&NOMBRE) {

    $.ajax({
                            url:"<?php echo base_url() ?>Admin/cart_requisition",
                            method:"POST",
                            //async:false,
                            data: {PRODUIT_ID:PRODUIT_ID,PA:PA,PV:PV,DATE:DATE,NOMBRE:NOMBRE,CODES:CODES},
                                                                                 
                            success:function(data)
                                                {  
                                                    // alert(data); 

                                                    // $('#cart').html(data);
                                                    if (data=='exist') {
                                                      alert("ECHEC! CES PRODUITS CONTIENNENT UN CODE DEJA EXISTANT");
                                                      $('#N').val();
                                                    } else{
                                                       $('#tablo').html(data);
                                                    }
                                                     

                                                    $('#CATEGORIE_ID1').val('');
                                                     $('#PRODUIT_ID1').val('');
                                                     $('#PA1').val('');
                                                     $('#PV1').val('');
                                                     $('#DATE1').val('');
                                                     $('#NOMBRE1').val('');

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
    <script src="<?=base_url()?>assets/datepicker/js/datep.js" type="text/javascript"></script>
<script>

        $('#DATE').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd-mm-yyyy',
        });
         $('#DATE1').datepicker({
            uiLibrary: 'bootstrap4',
            format: 'dd-mm-yyyy',
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






    </script>


    <script type="text/javascript">


      //BARCODE

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

          if ($('#NOMBRE').val()) {

            
            let isnum =/^\d+\-?\d*$/.test(barcode);
            //            /^\d+$/.test(barcode);
            var reg = new RegExp('^[0-9]+-[0-9]{1,10}$');
             let isnum1 =reg.test(barcode);

            // alert(isnum);
            // console.log(isnum);
                  if (isnum1) {
            
            var existant=$("#textarea").val();
            if ($.trim($("#textarea").val()) != "") {
                // alert('1');
                var res=existant.split("||");
                // alert(res);
                if (res.length<$('#NOMBRE').val()) {
                  
                if (!res.includes(barcode)) {
                  $('#textarea').val(existant+"||"+barcode); 
                 // alert();
                  var N=parseInt(parseInt($('#N').val())+1);
                  $('#N').val(N);
 
                }


               }else alert("Attention!! Vous voulez dépasser le nombre de produit");
                
                // $('#CODE1').html(existant+","+content);
            }else{
                // alert($('#CODE1').html());
            // $('#CODE').val('3,');
            $('#textarea').val(barcode);
            // alert();
             var N=1;
                  $('#N').val(N);
            }
             }else alert("ECHEC, CODE < "+barcode+" > NE RESPECTE PAS NOTRE FORMAT!")
        }else{
            alert("Veuillez d'abord entrer la quantité des produit");
            $('#N').val('');
        }



    } // main callback function ,
  ,
  onError: function(string, qty) {
 // alert(string);
  } 
  
  
});


        
        // 
    </script>

    <!-- IRIUM BARCODE -->

        <script type="text/javascript" src="<?php echo base_url() ?>webcodecamjs/js/qrcodelib.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>webcodecamjs/js/webcodecamjs.js"></script>
        <script type="text/javascript">
          var txt = "innerText" in HTMLElement.prototype ? "innerText" : "textContent";
            var arg = {
                resultFunction: function(result) {
                    
                  var aChild = document.createElement('li');
                  aChild[txt] = result.format + ': ' + result.code;
                    // document.querySelector('body').appendChild(aChild);

                    var content=result.code;
                    var barcode=result.code;
          if ($('#NOMBRE').val()) {

            
            let isnum =/^\d+\-?\d*$/.test(barcode);
//            /^\d+$/.test(barcode);
 var reg = new RegExp('^[0-9]+-[0-9]{1,10}$');
 let isnum1 =reg.test(barcode);

// alert(isnum);
// console.log(isnum);
                  if (isnum1) {
            
            var existant=$("#textarea").val();
            if ($.trim($("#textarea").val()) != "") {
                // alert('1');
                var res=existant.split("||");
                // alert(res);
                if (res.length<$('#NOMBRE').val()) {
                  
                if (!res.includes(barcode)) {
                  $('#textarea').val(existant+"||"+barcode); 
                 // alert();
                  var N=parseInt(parseInt($('#N').val())+1);
                  $('#N').val(N);
 
                }


               }else alert("Attention!! Vous voulez dépasser le nombre de produit");
                
                // $('#CODE1').html(existant+","+content);
            }else{
                // alert($('#CODE1').html());
            // $('#CODE').val('3,');
            $('#textarea').val(barcode);
            // alert();
             var N=1;
                  $('#N').val(N);
            }
             }else alert("ECHEC, CODE < "+barcode+" > NE RESPECTE PAS NOTRE FORMAT!")
        }else{
            alert("Veuillez d'abord entrer la quantité des produit");
            $('#N').val('');
        }


                }
            };
            new WebCodeCamJS("canvas").init(arg).play();
        </script>