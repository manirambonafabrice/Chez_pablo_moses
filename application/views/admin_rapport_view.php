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
            <div class="col-md-12" style="margin-top: 50px">
                 <div class="row">
                        <form id="myform" name="myform" action="<?php echo base_url()?>Admin/generer_rapport"  method="post" enctype="multipart/form-data" target='_blank'>
                            <div class="col-md-2 form-group">
                                <label>Type de rapport</label>
                                  <select id="type" name="type" class="form-control change" required>
                                <option value="">--choisir--</option>
                                <option value="general">Géneral jusqu'à cette date</option>
                                <option value="partiel">Partiel de cette date</option>
                                 
                                  </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Année</label>
                                  <select id="ANNEE" name="ANNEE" class="form-control change" required>
                                <option value="">--choisir--</option>
                                 <?php
                                 $ann=date('Y')+1;
                                for ($i=2020;$i<$ann;$i++) {
                                  
                                    ?>
                                
                                <option value="<?=$i?>"><?=$i?></option>
                                <?php
                                # code...
                                }
                              
                                ?> 
                                  </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Mois</label>
                                  <select id="MOIS" name="MOIS" class="form-control change" required>
                               <option value="">--choisir--</option>
                                 <?php
                                for ($i=1; $i<13;$i++) {
                                  if ($i<10) {
                                   $i="0".$i;
                                  }
                                  
                                    ?>
                               
                                <option value="<?=$i?>"><?=$i?></option>
                                <?php
                                # code...
                                }
                              
                                ?> 
                                  </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Date</label>
                                   <select id="DATE" name="DATE" class="form-control change" required>
                               <option value="">--choisir--</option>
                                 <?php
                                for ($i=1; $i<32;$i++) {
                                  if ($i<10) {
                                   $i="0".$i;
                                  }
                                  
                                    ?>
                               
                                <option value="<?=$i?>"><?=$i?></option>
                                <?php
                                # code...
                                }
                              
                                ?> 
                                  </select>
                            </div>
                            <div class="col-md-2 col-sm-12 col-xs-12">
                            <label>.</label>
                            <input type="submit" value="Generer rapport" class="btn btn-primary btn-block">
                            
                        </div>
                        </form>
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

