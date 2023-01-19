 <div class="col-md-12">
    <style type="text/css">
        .image-clignote  {
   animation-duration: .8s;
   animation-name: clignoter;
   animation-iteration-count: infinite;
   transition: none;
}
@keyframes clignoter {
  0%   { opacity:1; }
  40%   {opacity:0; }
  100% { opacity:1; }
}
    </style>
<?php
$resultatss=$this->Model->getRequete("SELECT PRODUIT_DESCR,PRODUIT_UNITE_MESURE,STOCK_MINIMUM, ((SELECT IFNULL(SUM(NOMBRE),0) from requisition where PRODUIT_ID=p.PRODUIT_ID)-(SELECT IFNULL(SUM(QUANTITE),0) from vente where PRODUIT_ID=p.PRODUIT_ID)) as NOMBRE  FROM produit p ORDER BY PRODUIT_DESCR");
// print_r($resultatss);


$resul=$this->Model->getRequeteOne("SELECT count(*) as n from commande where STATUT_LIVRAISON='Non livré'");

?>

                                <div class='modal fade' id='rupture'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                                <div class='modal-body'>
                                                    <table id="rupt" class="table table-bordered table-striped table-hover table-condensed">
                                                        <tr><th>#</th><th>PRODUIT</th><th>QUANTITE</th><th>MINIMUM</th><th>UNITE</th></tr>
                                                    <?php
                                                    $v=0;
                                                    foreach ($resultatss as $key) {
                                                      
                                                    if ($key['STOCK_MINIMUM']>=$key['NOMBRE']) {
                                                        $v++;

                                                        ?>
                                                    <tr><td><?=$v?></td><td><?=$key['PRODUIT_DESCR']?></td><td><?=$key['NOMBRE']?></td><td><?=$key['STOCK_MINIMUM']?></td><td><?=$key['PRODUIT_UNITE_MESURE']?></td></tr>

                                                        <?php
                                                    }
                                                       
                                                    }
                                                    ?>
                                                    </table>
                                                </div>

                                               <div class='modal-footer'>
                                                   
                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Quitter</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    if ($v!=0) {
                                    
                                    ?>
                                    <div class="dropdown image-clignote" style="position: fixed;left: 0px;color: red">
                                    <a href="#" class="" data-toggle="modal" data-target="#rupture" style="color: red">
                                        <i class="fa fa-exclamation-triangle" style="font-size: 70px"></i><br>
                                        <span>Rupture de stock</span>
                                        <div id="quantite" class="qty"><?=$v?></div>
                                    </a>  
                                    </div>
                                    <?php } ?>

                                    <?php
                                    if ($resul['n']>0) {
                                    
                                    ?>
                                    <div class="dropdown image-clignote" style="position: fixed;left: 0px;top:350px;color: orange">
                                    
                                        <i class="fa fa-exclamation-triangle" style="font-size: 70px"></i><br>
                                        <span>Attention<br> des commandes<br> non livrées</span>
                                        <div id="quantite" class="qty"><?=$resul['n']?></div>
                                    
                                    </div>
                                    <?php } ?>

        <a class="btn btn-<?=$active1?> btn-md" href="<?= base_url();?>Admin/ajouter"  style="margin:2px">Ajouter utilisateur</a>
        <a class="btn btn-<?=$active2?> btn-md" href="<?= base_url();?>Admin/admin_accueil" style="margin:2px">Liste utilisateur</a>
        <a class="btn btn-<?=$active3?> btn-md" href="<?= base_url();?>Admin/nouveau_commande" style="margin:2px">Nouveaux commandes</a>
        <a class="btn btn-<?=$active4?> btn-md" href="<?= base_url();?>Admin/tous_les_commandes" style="margin:2px">Listes de tous les commandes</a>
        <a class="btn btn-<?=$active5?> btn-md" href="<?= base_url();?>Admin/suggestion_list" style="margin:2px">Suggestions</a>
        <a class="btn btn-<?=$active6?> btn-md" href="<?= base_url();?>Admin/requisition" style="margin:2px">Requisitions</a>
        <a class="btn btn-<?=$active7?> btn-md" href="<?= base_url();?>Admin/stock" style="margin:2px">Stock</a>
        <a class="btn btn-<?=$active8?> btn-md" href="<?= base_url();?>Admin/vente_sur_caisse" style="margin:2px">Vente sur caisse</a>

        <a class="btn btn-danger btn-md" href="<?= base_url();?>Login/do_logout" style="margin:2px">Se déconnecter</a>
        <a class="btn btn-primary btn-md" href="<?= base_url();?>Admin/modifier_mes" style="margin:2px">Modifier mes identifiants</a>
        <a class="btn btn-primary btn-md" href="<?= base_url();?>Admin/qr_code" style="margin:2px">Génerer les Qr-code  des produits</a>
        <a class="btn btn-primary btn-md" href="<?= base_url();?>Admin/rapport" style="margin:2px">Génerer rapport</a>



        <a class="btn btn-primary btn-md" href="<?= base_url();?>Admin/Synchonisation" style="margin:2px">SYNCHRONISATION</a>
        
      </div>
      
      <?php

    $aujourdhui=$this->Model->getRequeteOne("SELECT COUNT(ID) as n FROM visite WHERE DATE LIKE '%".date('Y-m-d')."%'");
    $yesterday = Date('Y-m-d', StrToTime("yesterday"));
    // echo $yesterday;
    $hier=$this->Model->getRequeteOne("SELECT COUNT(ID) as n FROM visite WHERE DATE LIKE '%".$yesterday."%'");
    $Sunday = Date('Y-m-d', StrToTime("Next Sunday"));
    $Monday = Date('Y-m-d', StrToTime("Last Monday"));
    $semaine=$this->Model->getRequeteOne("SELECT COUNT(ID) as n FROM visite WHERE DATE BETWEEN '".$Monday."' AND '".$Sunday."'");
    $mois=$this->Model->getRequeteOne("SELECT COUNT(ID) as n FROM visite WHERE DATE LIKE '%".date('Y-m')."%'");
    $annee=$this->Model->getRequeteOne("SELECT COUNT(ID) as n FROM visite WHERE DATE LIKE '%".date('Y')."%'");
    $total=$this->Model->getRequeteOne("SELECT COUNT(ID) as n FROM visite");
   
      ?>
