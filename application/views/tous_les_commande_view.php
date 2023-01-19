<!DOCTYPE html>
<html lang="en">
	<head>
		<title>commandes</title>
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
    $active4="info";
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
				<?= $this->session->flashdata('message') ?>

        <?php
$point1=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(MONTANT_CLIENT),0) as n from commande");
        ?>
 <span style='font-size: 20px'>TOTAL : <b><?=number_format($point1['n'], 0, ',', ' ')?></b></span><br>
 <p></p>
					<!-- <i class="fa fa-exclamation-triangle" style="color: red;font-size: 35px"> INTERFACE EN COURS DE CONSTUCTION</i> -->
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
       
      responsive: true,
         buttons: [
             
                {extend: 'excel', title: "LISTE DES COMMANDES"},
                {exportOptions: {
   columns: ':visible:not(:eq(13))' 
},
    customize: function ( doc ) {
     
      // doc.content[1].table.widths = Array(30,100,100);
        // Array(doc.content[1].table.body[0].length + 1).join('*').split('');
      // doc.content[1].alignment = 'right';
      var rowCount = doc.content[1].table.body.length;
for (i = 1; i < rowCount; i++) {
 // doc.content[1].table.body[i][0].alignment = 'right';
 

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