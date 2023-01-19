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
		$lien7="active";


    ?>
    <?php
       include 'includes/my_header.php';
        ?>
    <!-- /HEADER -->
    <div class="container">
    <div class="row">

      
			<div class="col-md-12">
				<?= $this->session->flashdata('message') ?>
<?php
// $point0=$this->Model->getRequeteOne("SELECT IFNULL(SUM(PRIX),0) as n from vente where CLIENT=".$USER_ID);
$point1=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(PRIX_TOTAL),0) as n from achat_points where CLIENT=".$USER_ID." AND BONUS=0");
    $point2=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(PRIX_TOTAL),0) as n from achat_points where CLIENT=".$USER_ID." AND BONUS=1");
    $REST= $point1['n']-$point2['n'];

    ?>
<TABLE class="table table-bordered table-striped table-hover table-condensed">
  <TR>
    <TD>MES ACHATS HORS BONUS: <b><?=$point1['n']?></b></TD>
    <TD>MES ACHATS AVEC BONUS: <b><?=$point2['n']?></b></TD>
    <TD>BONUS RESTANT: <b><?=$REST?></b></TD>
</TR>
 <TR>
    <TD>LA TOTALITE DE MES POINTS: <b><?=$point1['n']/1000?></b></TD>
    <TD>MES POINTS DEJA CONSOMMES: <b><?=$point2['n']/1000?></b></TD>
    <TD>MES POINTS RESTANT: <b><?=$REST/1000?></b></TD>
</TR>
    </TABLE>
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
         buttons: [
             
                {extend: 'excel', title: "MES CMMANDES JUSQU'AU <?=date('d/m/Y')?>"},
                {exportOptions: {
   columns: ':visible:not(:eq(5))' 
},
    customize: function ( doc ) {
     
      // doc.content[1].table.widths = Array(30,100,100);
        // Array(doc.content[1].table.body[0].length + 1).join('*').split('');
      // doc.content[1].alignment = 'right';
      var rowCount = doc.content[1].table.body.length;
for (i = 1; i < rowCount; i++) {
 doc.content[1].table.body[i][0].alignment = 'right';
 doc.content[1].table.body[i][1].alignment = 'right';
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
                "sInfo":           "",
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
    </script>

