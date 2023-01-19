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
            <div class="col-md-12" style="margin-top: 50px">
                <h3 style="text-align: center;">Historique de Vente</h3>
                 
                     <?=$breadcrumb?>

                     <div class="row">
                        <form id="myform" name="myform" action="<?php echo base_url()?>Admin/vente_historique"  method="post" enctype="multipart/form-data">
                            <div class="col-md-2 form-group">
                                <label>Année</label>
                                  <select id="ANNEE" name="ANNEE" class="form-control change" required>
                                <!-- <option value="">--choisir--</option> -->
                                 <?php
                                foreach ($annee as $value) {
                                  if ($value['DATE']==$an) {
                                    ?>
                                <option value="<?=$value['DATE']?>" selected><?=$value['DATE']?></option>
                                <?php
                                  }else{
                                ?>
                                <option value="<?=$value['DATE']?>"><?=$value['DATE']?></option>
                                <?php
                                # code...
                                }
                              }
                                ?> 
                                  </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Mois</label>
                                  <select id="MOIS" name="MOIS" class="form-control change" required>
                               <option value="">--choisir--</option>
                                 <?php
                                foreach ($mois as $value) {
                                  if ($value['DATE']<10) {
                                   $value['DATE']="0".$value['DATE'];
                                  }
                                  if ($value['DATE']==$ms) {
                                    ?>
                                <option value="<?=$value['DATE']?>" selected><?=$value['DATE']?></option>
                                <?php
                                  }else{
                                ?>
                                <option value="<?=$value['DATE']?>"><?=$value['DATE']?></option>
                                <?php
                                # code...
                                }
                              }
                                ?> 
                                  </select>
                            </div>
                            <div class="col-md-2 form-group">
                                <label>Date</label>
                                  <select id="DATE" name="DATE" class="form-control change" required>
                               <option value="">--choisir--</option>
                                 <?php
                                foreach ($jour as $value) {
                                  if ($value['DATE']<10) {
                                   $value['DATE']="0".$value['DATE'];
                                  }
                                  if ($value['DATE']==$dt) {
                                    ?>
                                <option value="<?=$value['DATE']?>" selected><?=$value['DATE']?></option>
                                <?php
                                  }else{
                                ?>
                                <option value="<?=$value['DATE']?>"><?=$value['DATE']?></option>
                                <?php
                                # code...
                                }
                              }
                                ?> 
                                  </select>
                            </div>
                        </form>
                      </div>      

                        <?= $this->session->flashdata('message') ?>
                    <?php 

            echo $this->table->generate($points);

            ?>
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
<script>
        $(document).ready(function () {
            $("#d_table").DataTable({

        dom: 'Bfrtlip',
         buttons: [
             // {extend: 'print', title: ' <?=$titl?>'},
                {extend: 'excel', title: '<?=$titl?>'},
                {extend: 'pdf',orientation: 'landscape', title: ' <?=$titl?>',exportOptions: {
   columns: ':visible:not(:eq(9))' 
},
    customize: function ( doc ) {
     
      doc.content[1].table.widths = Array(30,100,50,50,50,100,100,100,130);
        // Array(doc.content[1].table.body[0].length + 1).join('*').split('');
      // doc.content[1].alignment = 'right';
      var rowCount = doc.content[1].table.body.length;
for (i = 1; i < rowCount; i++) {
 doc.content[1].table.body[i][0].alignment = 'right';
 doc.content[1].table.body[i][2].alignment = 'right';
 doc.content[1].table.body[i][3].alignment = 'right';
 doc.content[1].table.body[i][4].alignment = 'right';
doc.styles.tableHeader.fontSize = 10
}
    }}
        ],
                language: {
                "sProcessing":     "Traitement en cours...",
                "sSearch":         "Rechercher&nbsp;:",
                "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ment",
                "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix":    "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                  "sFirst":      "Premier",
                  "sPrevious":   "Pr&eacute;c&eacute;dent",
                  "sNext":       "Suivant",
                  "sLast":       "Dernier"
                },
                "oAria": {
                  "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                  "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                }
            }


            });
        });

           $('.change').change(function(){
      // var point=$('#POINT').val();
      // if (point) {
        // window.location.replace("<?=base_url()?>produit/Requisition/index/"+point);
        // window.location.href = "http://stackoverflow.com";
      // }
      myform.submit();
     });
    </script>

<script>
function printContent(el){
  alert()

var restorepage = $('body').html();
var printcontent = $('#' + el).clone();
$('body').empty().html(printcontent);
window.print();
$('body').html(restorepage);
}
</script>
