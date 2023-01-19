<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Synchonisation extends CI_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index($params = NULL) {
      // echo $this->session->userdata('COLLABORATEUR_ID');exit();
    
        $login = $this->input->post('USERNAME');
        $password = $this->input->post('PASSWORD');
        // $password=$this->cript(htmlspecialchars($_POST['PASSWORD']),$login);

              $params = json_decode(file_get_contents('php://input'), TRUE);

             
              foreach ($params as $val) {
                
                   foreach ($val as $key=>$val1) {
                    foreach ($val1 as $value) {
                      $firstKey = key($value);
                      $info=$value;
                      $value['STATUT_SYNC']=1;
                    //   array_shift($value);
                        
                    //   $id=$this->Model->insert_last_id($key, $value);
                    //   $this->Model->update($key,array($firstKey=>$id), array("STATUT_SYNC"=>1));
                    
                    $this->Model->create($key, $value);
                      
                      $auto=$value[$firstKey]+10000;
                      $this->Model->getRequeteOne_new("ALTER TABLE ".$key." AUTO_INCREMENT =".$auto);

                      }
                    }
              }

      $data=array();

$achat_points=array("achat_points"=>$this->Model->getList("achat_points",array("STATUT_SYNC"=>0)));
$bank=array("bank"=>$this->Model->getList("bank",array("STATUT_SYNC"=>0)));
$categorie=array("categorie"=>$this->Model->getList("categorie",array("STATUT_SYNC"=>0)));
$commande=array("commande"=>$this->Model->getList("commande",array("STATUT_SYNC"=>0)));
$facture=array("facture"=>$this->Model->getList("facture",array("STATUT_SYNC"=>0)));
$frais_de_retrait=array("frais_de_retrait"=>$this->Model->getList("frais_de_retrait",array("STATUT_SYNC"=>0)));
$mobile_money=array("mobile_money"=>$this->Model->getList("mobile_money",array("STATUT_SYNC"=>0)));
$mode_de_paiement=array("mode_de_paiement"=>$this->Model->getList("mode_de_paiement",array("STATUT_SYNC"=>0)));
$produit=array("produit"=>$this->Model->getList("produit",array("STATUT_SYNC"=>0)));
$produit_commande=array("produit_commande"=>$this->Model->getList("produit_commande",array("STATUT_SYNC"=>0)));
$profiles_users=array("profiles_users"=>$this->Model->getList("profiles_users",array("STATUT_SYNC"=>0)));
$qr_code_requisition=array("qr_code_requisition"=>$this->Model->getList("qr_code_requisition",array("STATUT_SYNC"=>0)));
$quartier_de_distribution=array("quartier_de_distribution"=>$this->Model->getList("quartier_de_distribution",array("STATUT_SYNC"=>0)));
$requisition=array("requisition"=>$this->Model->getList("requisition",array("STATUT_SYNC"=>0)));
$suggestion=array("suggestion"=>$this->Model->getList("suggestion",array("STATUT_SYNC"=>0)));
$type_reduction=array("type_reduction"=>$this->Model->getList("type_reduction",array("STATUT_SYNC"=>0)));

// print_r($this->Model->getList("type_reduction",array("STATUT_SYNC"=>0)));
$unite_mesure=array("unite_mesure"=>$this->Model->getList("unite_mesure",array("STATUT_SYNC"=>0)));
$users=array("users"=>$this->Model->getList("users",array("STATUT_SYNC"=>0)));
$vente=array("vente"=>$this->Model->getList("vente",array("STATUT_SYNC"=>0)));


// $achat_points=$this->Model->getList("achat_points");
// print_r($achat_points);
array_push($data,$achat_points);
array_push($data,$bank);
array_push($data,$categorie);
array_push($data,$commande);
array_push($data,$facture);
array_push($data,$frais_de_retrait);
array_push($data,$mobile_money);
array_push($data,$mode_de_paiement);
array_push($data,$produit);
array_push($data,$produit_commande);
array_push($data,$profiles_users);
array_push($data,$qr_code_requisition);
array_push($data,$quartier_de_distribution);
array_push($data,$requisition);
array_push($data,$suggestion);
array_push($data,$type_reduction);
array_push($data,$unite_mesure);
array_push($data,$users);
array_push($data,$vente);


 

              foreach ($data as $val) {
                
                   foreach ($val as $key=>$val1) {
                    foreach ($val1 as $value) {
                      $firstKey = key($value);
                      
                      $this->Model->update($key,array($firstKey=>$value[$firstKey]), array("STATUT_SYNC"=>1));
                      
                      

                      }
                    }
              }
              
array_push($data,array('response'=>'ok'));
echo json_encode($data);

    }

}