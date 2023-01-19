<!-- <?php print_r($this->cart->contents()); ?>  -->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Livrer</title>
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
    $active2="primary";
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

      <!-- <div class="col-md-8"></div> -->
      <?php
       include 'includes/sous_menus_admin.php';
        ?>
            <div class="col-md-12">
                <?= $this->session->flashdata('msg') ?>



                <div class="row">
                    <?php

                     foreach ($this->cart->contents() as $key => $items) {
                        if(preg_match("/VENTE/", $items['soc'])){
                          $USER_ID=$items['USER_ID'];
                        }}
                          $users=$this->Model->getListOrdered("users","NOM_USER",array("PROFILE_ID"=>3));
                          ?>
                             <div class="col-md-4 sm-4 xs-4 form-group">
                               <label>Client</label>
                               <select id="USER_ID" name="USER_ID" class="form-control selectpicker"  data-live-search="true">
                                <option value="">--choisir un client--</option>
                                
                                 <?php
                                 foreach ($users as $value) {
                                   ?>
                                    <option value="<?=$value['USER_ID']?>" <?php if($value['USER_ID']==$USER_ID)echo 'selected';?>><?=$value['NOM_USER']?> <?=$value['PRENOM_USER']?>(<?=$value['USERNAME']?>: <?=$value['TELEPHONE']?>)</option>
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



                    <!-- <i class="fa fa-exclamation-triangle" style="color: red;font-size: 35px"> INTERFACE EN COURS DE CONSTUCTION</i> -->
                    <?php 
                    
      $output='';
      // $output.='<table class="table table-bordered"><th>#</th><th>Description</th><th>Montant</th><th>action</th>';
      $output.="<table id='mytable' class='table table-head-bg-primary table-bordered display table   table-hover'>
       <thead> <tr><th>PRODUIT</th><th>NOMBRE</th><th>PRIX COMMANDE</th><th>PRIX PRODUIT</th><th>BONUS</th><th>CODE PRODUIT</th><th></th><th></th></tr></thead>";
$count='';
       $i=1;
       $total=0;
       $total1=0;
       $xxx=0;
       $cart=$this->cart->contents();
    foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/VENTE/", $items['soc'])){
          if (empty($items["PRIX_SCAN"])) {
              $xxx++;
          }

          if ($items["BONUS"]==1) {
            $bn="<span style='color:green'>OUI</span>";
          }else $bn="<span style='color:red'>NON</span>";

         $count++;
         $output.='<div class="container-fluid">
    <tr><td>'.$items["NOM_PRODUIT"].'</td><td>'.$items["NOMBRE"].'</td><td>'.$items["PV"].'</td><td>'.$items["PRIX_SCAN"].'</td><td>'.$bn.'</td><td>'.$items["CODES"].'</td>
    
    <td id="" style="display:;">
    <a href=""  data-toggle="modal" data-target="#mydelete">
    <button style="margin:10" type="button" name="edit" id="'.$items["rowid"].'"" class="btn btn-danger btn-sm btn_remove_actionremove edita" >Avec scan</button>
    </a>
    </td>
    <td id="" style="display:;">
    <a href=""  data-toggle="modal" data-target="#mydelete1">
    <button   type="button" name="edit" id="attribuer<>'.$items["rowid"].'"" class="btn btn-info btn-sm edita1 " >Sans scan</button>
    </a>
    </td>
    </tr>
    
    ';
    $i++;
    $total+=$items["NOMBRE"]*$items["PA"];
    $total1+=$items["NOMBRE"]*$items["PV"];
    

}
       }
       if ($xxx==0) {
                  $output.='
   <thead> <tr><th><b>TOTAL</b></th><th></th><th><b>'.$total1.'</b></th><td></td><td></td><th id="ajoutSoc" style="display:;">
    </th>
    </tr></thead>
    <tr><td colspan="7"><a href="'.base_url('Admin/enregistrer_cmd').'"><button type="button" name="enregistrer" id="enregistrer" class="btn btn-success form-control" >ENREGISTRER</button></a></td></tr>
        
    ';
       }else{
               $output.='
   <thead> <tr><th><b>TOTAL</b></th><th></th><th><b>'.$total1.'</b></th><td></td><td></td><th id="ajoutSoc" style="display:;">
    </th>
    </tr></thead>
    <tr><td colspan="7"><button type="button" name="enregistrer" id="enregistrer1" class="btn btn-success form-control" >ENREGISTRER</td></tr>
        
    ';
       }




 $output.='</div></table>';
       if($count==0){
        $output='';
       }
       

       echo $output;           

            ?>
            </div>
             <div class='modal fade' id='mydelete'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                              <div class='modal-header'>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
                
                
              </div>
                                                <div class='modal-body'>
                                                  <div class="col-md-10 sm-10 xs-10">
    <hr>
        <canvas style=" width: 100%"></canvas>
      <hr>
        <ul></ul> 
                                                    <!-- <video id="preview" style=" width: 100%"></video> -->
                                                    
                                                   <!-- <textarea class="form-control" readonly=""></textarea> -->
                                                   <input type="text" name="QR_CODE" id="QR_CODE" class="form-control input-sm"  autocomplete="off" value="" required readonly>
                                                   <input type="text" name="id_pr" id="id_pr" class="form-control input-sm"  autocomplete="off" value="" required readonly>
                                                   <!-- <input type="text" name="id_prod" id="id_prod" class="form-control input-sm"  autocomplete="off" value="" required readonly>
                                                   <input type="text" name="prix" id="prix" class="form-control input-sm"  autocomplete="off" value="" required readonly> -->
                                                </div>
                                                </div>

                                               <div class='modal-footer'>
                                                    <button type="button"  id="entrer" class="btn btn-success btn-sm">Entrer</button>
                                                    
                                                </div>

                                            </div>
                                        </div>
                                    </div>

             <div class='modal fade' id='mydelete1'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>
                                              <div class='modal-header'>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="size: 20px">X</button>
                
                
              </div>
                                                <div class='modal-body'>
                                                  <div class="col-md-10 sm-10 xs-10">
                                                    
                                                   <!-- <textarea class="form-control" readonly=""></textarea> -->
                                                   
                                                   <input type="text" name="id_pr1" id="id_pr1" class="form-control input-sm"  autocomplete="off" value="" required readonly>
                                                   <input type="hidden" name="PRODUIT_ID1" id="PRODUIT_ID1" class="form-control input-sm"  autocomplete="off" value="" required >
                                                   <!-- <input type="text" name="id_prod" id="id_prod" class="form-control input-sm"  autocomplete="off" value="" required readonly>
                                                   <input type="text" name="prix" id="prix" class="form-control input-sm"  autocomplete="off" value="" required readonly> -->
                                                </div>
                                                </div>

                                               <div class='modal-footer'>
                                                    <button type="button"  id="entrer1" class="btn btn-success btn-sm " >Entrer</button>
                                                    
                                                </div>

                                            </div>
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
 <script type="text/javascript">
    // $('#DATE').datetimepicker({format: 'd-m-Y'});


      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });
      scanner.addListener('scan', function (content) {
        
            // $('#CODE').val('3,');
            $('#QR_CODE').val(content);
            

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
    <script>

      
              $(document).on('click','.edita',function(){
                var rowid=$(this).attr("id");
                $('#id_pr').val(rowid);

            
                });
                           $(document).on('click','#entrer',function(){
                var rowid=$('#id_pr').val();
                var qr=$('#QR_CODE').val();
                if (qr) {
                  window.location.href = "<?php echo base_url(); ?>Admin/add_livrer/"+rowid+"/"+qr;  
              }else alert('Echec! veuilez d\'abord scanner le prduit');

        
      });
    </script>
        <script>


              $(document).on('click','.edita1',function(){

// window.location.href = "<?php echo base_url(); ?>Admin/inf/";

                var rowid=$(this).attr("id");
                var id=rowid.split("<>");
                $('#id_pr1').val(id[1]);
                $.ajax({
                            url:"<?php echo base_url() ?>Admin/get_id_produit_rowid",
                            method:"POST",
                         // async:false,
                            data: {rowid:id[1]},
                                                                                 
                            success:function(stutus)
                                                        { 
                                                          $('#PRODUIT_ID1').val(stutus);  

                                                          // alert(stutus);
                                                          }
        
                                                    });
            
                });
               
               $(document).on('click','#entrer1',function(){
                var rowid=$('#id_pr1').val();
                var CONSOMMATION1=$('#CONSOMMATION1').val();
                
                  window.location.href = "<?php echo base_url(); ?>Admin/add_livrer1/"+rowid+"/"+CONSOMMATION1;  
              

        
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
   

            $('#QR_CODE').val(barcode);
            


    } // main callback function ,
  ,
  onError: function(string, qty) {
 // alert(string);
  } 
  
  
});


    </script>

    <script type="text/javascript">
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
                                                        

                                                     // alert(stutus);
                                                    }
        
                                                    });
      
        });
    </script>
<script type="text/javascript">
  $(document).ready( function () {
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
                                                        

                                                     // alert(stutus);
                                                    }
        
                                                    });
  })
</script>



<script type="text/javascript">
  $(document).on('click','#enregistrer1',function(){
      alert('VUEILLEZ VERIFIER SI TOUS LES PRODUITS ONT ETE AFFECTE DE PRIX');
  })
</script>

<!-- <?php print_r($this->cart->contents()); ?>  -->
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

$('#QR_CODE').val(barcode);


                }
            };
            new WebCodeCamJS("canvas").init(arg).play();
        </script>