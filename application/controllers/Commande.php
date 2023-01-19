<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Commande extends CI_Controller {
public function __construct()
{
	parent::__construct();
	require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
}
	
	public function index()
	{
	
		// $this->load->view('accueil');
	}

	public function cart(){

		    
        $this->load->library("cart"); 
      $id=$_POST['id'];
      $qty=$_POST['qty'];
      $bonus=$this->input->post('bonus');
      $pro=$this->Model->getOne("produit",array("PRODUIT_ID"=>$id));
      if (!empty($bonus)) {
        $prix=$bonus;
      }else $prix=$pro['PRODUIT_PRIX'];
      
     // $this->load->library("cart");
    
      $data=array('id'=>$id.$prix,
                'name'=>$pro['PRODUIT_DESCR'],
                'PRODUIT_ID'=>$pro['PRODUIT_ID'],
                'bonus'=>$bonus,
                'qty'=>$qty,
                'price'=>$prix,
                'image'=>$pro['PRODUIT_IMAGE'],
                'soc'=>'SOC');

      $requi=$this->Model->getRequeteOne("SELECT IFNULL(SUM(NOMBRE),0) as n from requisition where PRODUIT_ID=".$pro['PRODUIT_ID']);
        $vente=$this->Model->getRequeteOne("SELECT IFNULL(SUM(QUANTITE),0) as n from vente where PRODUIT_ID=".$pro['PRODUIT_ID']);
        $rest=$requi['n']-$vente['n'];

        if ($rest>=$qty) {
              $this->cart->insert($data);
      
echo $this->views();
        }else echo "beaucoup<>".$rest." ".$pro['PRODUIT_DESCR'];


//$this->cart->destroy();

    }

       public function views(){
       //$this->load->library("cart");
       $output='';
      $output.='<div class="cart-list">';

       $count='';
       $i=0;
       $total=0;
       
       foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
         $count++;
         $output.='<div class="product-widget">

												<div class="product-img">
													<img src="'.base_url().$items['image'].'" alt="">
												</div>
												<div class="product-body">
													<h3 class="product-name"><a href="#">'.$items['name'].'</a></h3>
													<h4 class="product-price"><span class="qty">'.$items['qty'].'X</span>'.$items['price'].'</h4>
												</div>
												<button class="delete rmv" id="'.$items["rowid"].'"  onclick="remove('.$items["rowid"].');"><i class="fa fa-close"></i></button>
											</div>
										
    
    ';
    $i++;
    
$total+=$items['subtotal']; 
}
       }

       $output.='</div>
    <div class="cart-summary">
											<small>'.$i.' Produits choisis</small>
											<h5>TOTAL: '.$total.'</h5>
										</div>
										<div class="cart-btns">
											
										</div>
    
    ';

 $output.='</div></table>';
       if($count==0){
        $output='';
       }

       return $output."<>".$i;
    
	}

  public function bonus_total(){
                    $ttl=0;
    foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
            if (!empty($items['bonus'])) {
              $ttl+=$items['subtotal']; 
            }
          }
      }
      echo $ttl;
  }

	public function remove(){
    //$this->load->library("cart");
 $rowid=$_POST['rowid'];
    // $idReunion=$_POST['idReunion'];
    // $idParticipant=$_POST['rowid1'];
    $data= array('rowid' =>$rowid,'qty'=>0 );
    $this->cart->update($data);
// $this->Model->delete('participant', array('idParticipant' =>$idParticipant));
   
    echo $this->views();
 //redirect(base_url().'CrReunion/update/'.$idReunion, 'refresh');
}


	public function passer_commande(){
		$this->load->view('passer_commande_view');
	}
public function Confirmation_commande($id_commande=''){
  // echo $this->uri->segment(3);
  $data['id_commande']=$id_commande;
  $this->load->view('confirmation_commande_view',$data);
}
  public function modifier($rowid,$id_commande=''){ 
  $qty=$_POST['qty'];
  $qty1=$_POST['qty1']; 

  // $point1=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(PRIX),0) as n from vente where CLIENT=".$this->session->userdata('CLIENT_ID')." AND ID_TYPE_REDUCTION=0");
  //   $point2=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(REDUCTION_POINT),0) as n from vente where CLIENT=".$this->session->userdata('CLIENT_ID')." AND ID_TYPE_REDUCTION=1");
    $point1=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(PRIX_TOTAL),0) as n from achat_points where CLIENT=".$this->session->userdata('CLIENT_ID')." AND BONUS=0");
    $point2=$this->Model->getRequeteOne("SELECT  IFNULL(SUM(PRIX_TOTAL),0) as n from achat_points where CLIENT=".$this->session->userdata('CLIENT_ID')." AND BONUS=1");
    $REST= $point1['n']-$point2['n'];

      // $idReunion=$_POST['idReunion'];
      // $idParticipant=$_POST['rowid1'];
      $data= array('rowid' =>$rowid,'qty'=>$qty );
      $this->cart->update($data);
                            $ttl=0;
    foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
            if (!empty($items['bonus'])) {
              $ttl+=$items['subtotal']; 
            }
          }
      }

      if ($REST>=$ttl) {
        $data['messages']='<div class="alert alert-success text-center">'."Modification avec succès".'</div>';
         $this->session->set_flashdata($data);
        redirect(base_url('Commande/Confirmation_commande/'.$id_commande));
      }else{
         $data1= array('rowid' =>$rowid,'qty'=>$qty1 );
      $this->cart->update($data1);
      $data['messages']='<div class="alert alert-danger text-center">'."Echec! vous solicitez à un bonus et vous n'avez pas de points suffisants".'</div>';
         $this->session->set_flashdata($data);

        redirect(base_url('Commande/Confirmation_commande/'.$id_commande));
      }

  // $this->Model->delete('participant', array('idParticipant' =>$idParticipant));
     
      
  }

  public function supprimer($rowid){
     $data= array('rowid' =>$rowid,'qty'=>0 );
      $this->cart->update($data);
  // $this->Model->delete('participant', array('idParticipant' =>$idParticipant));
     
      redirect(base_url('Commande/Confirmation_commande'));
  }

  public function mode_de_distribution(){
    if(sizeof($this->cart->contents())>0){
    $this->load->view('mode_de_distribution_view');
  }else{
    redirect(base_url('Commande/Confirmation_commande'));
  }
  }

  public function collecte(){
    $session = array(
                              'QUARTIER' =>"",
                              'FRAIS' => 0,
                              'ADRESSE' => "",

                              'NUMERO_CONTACT' => "",

                            );
                
                 $this->session->set_userdata($session);
    $data['mode']=$this->Model->getlist("mode_de_paiement");
    $data['mode_distribution']="collecte";
    $this->load->view('collect_view', $data);
  }

  public function get_mode(){
    $result="";

     if ($this->input->post("id")==1) {
      $mobile=$this->Model->getList("mobile_money");
      foreach ($mobile as $key ) {
         $result.="<option value='".$key['MOBILE_ID']."'>".$key['MOBILE_NAME']."</option>";
      }
    }
    if ($this->input->post("id")==2) {
       $bank=$this->Model->getList("bank");

       
       foreach ($bank as $value) {
         $result.="<option value='".$value['BANK_ID']."'>".$value['BANK_NAME']."</option>";
       }
    }
     if ($this->input->post("id")==3) {
       
         $result.="<option value='-1' selected>Seul(e)s les client(e)s preablement autorise(e)s peuvent payer<br>par cash une commande en mode livraison.<br>Cependant,a moins d'une derogation de la direction,le paiement devra etre percu a la livraison.</option>";
       
    }
    if ($this->input->post("id")==4) {
       
         $result.="<option value='-1' selected>Le paiement par Cheque</option>";
       
    }
   echo $result;
  }

  public function get_Mobile(){
    $id=$_POST['id'];
    $montant=$_POST['montant'];

    // print_r($id);

    $mob=$this->Model->getOne('mobile_money',array('MOBILE_ID'=>$id[0]));

    $colon=str_replace(' ', '', $mob['MOBILE_NAME']);

    // print_r($id);exit();

    $mobile=$this->Model->getOne("mobile_money",array("MOBILE_ID"=>$id[0]));
      $image="<img src='".base_url().$mobile['MOBILE_IMAGE']."' width='90%'>";
      $num="<span style='font-size:30px'>Envoyer sur le numero :<b>".$mob['TELEPHONE']."</b> de <b>". $mob['NOM']."</b></span>";

    $frais=$this->Model->getRequeteOne('SELECT '.$colon.' as n from frais_de_retrait where '.$montant.'>= MAKE AND '.$montant.'<= MENSHI');

    if (empty($frais)) {
      $f=0;
    }else $f=$frais['n'];
      echo $f."||".$image."<p>".$num;
  }

  public function get_bank(){
    $id=$this->input->post("id");
    $bank=$this->Model->getOne("bank",array("BANK_ID"=>$id[0]));

      $bnk='<table class="table table-bordered" style="color:black">

            <tr><th>Banque:</th><th>'.$bank['BANK_NAME'].'</th></tr>
            <tr><th>Compte</th><th>'.$bank['BANK_NUMERO'].'</th></tr>
            <tr><th>Titulaire</th><th>'.$bank['BANK_PROPRIETAIRE'].'</th></tr>

            </table>';

            echo "0||".$bnk;

  }

  public function add($mode,$id_commande=''){

    if($this->input->post("MODE_ID")==1){
      $bank="";
      $mobile=$this->input->post("CHOIX")[0];
      $cash="";
    }if($this->input->post("MODE_ID")==2){
      $bank=$this->input->post("CHOIX")[0];
      $mobile="";
      $cash="";
    }if($this->input->post("MODE_ID")==3){
      $bank="";
      $mobile="";
      $cash=1;
    }

    
// $id_commande=$this->Model->getRequeteOne("select max(COMMANDE_ID) as n from commande");
// $id_commande=$id_commande['n']+1;
    if (!empty($this->session->userdata('ID_COMM'))) {
      $id_commande=$this->session->userdata('ID_COMM');
      $this->Model->update("commande",array("COMMANDE_ID"=>$id_commande),array("USER_ID"=>$this->session->userdata('CLIENT_ID'),"MODE_PAIEMENT_ID"=>$this->input->post("MODE_ID"),"BANK_ID"=>$bank,"MOBILE_ID"=>$mobile,"CASH"=>$cash,"MONTANT_CLIENT"=>$this->input->post("MONTANT"),"FRAIS_DE_TRANSFAIRE"=>$this->input->post("FRAIS"),"TELEPHONE"=>$this->input->post("TELEPHONE"),"MODE_RECUPERATION"=>$mode,"DESTINATION_LIVRAISON"=>$this->session->userdata('QUARTIER'),"ADRESSE_LIVAISON"=>$this->session->userdata('ADRESSE'),"CONTACT_LIVRAISON"=>$this->session->userdata('NUMERO_CONTACT'),"REFERENCE"=>$this->input->post("REFERENCE"),"FRAIS_DE_TRANSPORT"=>$this->session->userdata('FRAIS')));
    }else{
    $id_commande=$this->Model->insert_last_id("commande",array("USER_ID"=>$this->session->userdata('CLIENT_ID'),"MODE_PAIEMENT_ID"=>$this->input->post("MODE_ID"),"BANK_ID"=>$bank,"MOBILE_ID"=>$mobile,"CASH"=>$cash,"MONTANT_CLIENT"=>$this->input->post("MONTANT"),"FRAIS_DE_TRANSFAIRE"=>$this->input->post("FRAIS"),"TELEPHONE"=>$this->input->post("TELEPHONE"),"MODE_RECUPERATION"=>$mode,"DESTINATION_LIVRAISON"=>$this->session->userdata('QUARTIER'),"ADRESSE_LIVAISON"=>$this->session->userdata('ADRESSE'),"REFERENCE"=>$this->input->post("REFERENCE"),"CONTACT_LIVRAISON"=>$this->session->userdata('NUMERO_CONTACT'),"FRAIS_DE_TRANSPORT"=>$this->session->userdata('FRAIS')));
    $session = array(
                              'ID_COMM' => $id_commande

                            );
                
                 $this->session->set_userdata($session);
}
    
      redirect(base_url('Commande/recapitulatif_facture/'.$id_commande));
  }

  public function recapitulatif_facture($id_commande){
    $data['id_commande']=$id_commande;
    $commande=$this->Model->getOne("commande",array("COMMANDE_ID"=>$id_commande));

    // $info=$this->Model->getRequete("SELECT* from commande c join produit_commande pc on c.COMMANDE_ID=pc.COMMANDE_ID join users u on c.USER_ID=u.USER_ID WHERE c.COMMANDE_ID=".$id_commande." join produit p on pc.PRODUIT_ID=p.PRODUIT_ID");

     $data['cmd']=$commande;
    $this->load->view('recapitulatif_facture_view',$data);
  }

  public function add1($id_commande){
    $session = array(
                              'ID_COMM' => ""

                            );
                
                 $this->session->set_userdata($session);
$cmm=$this->Model->getOne("commande",array("COMMANDE_ID"=>$id_commande));
    foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
          if (!empty($items['bonus'])) {
             $bns=1;
          }else $bns=0;
          $this->Model->create("produit_commande",array("COMMANDE_ID"=>$id_commande,"PRODUIT_ID"=>$items['PRODUIT_ID'],"PRIX_UNITAIRE"=>$items['price'],"QUANTITE"=>$items['qty'],"PRIX_TOTAL"=>$items['subtotal'],"BONUS"=>$bns));
          $this->Model->create("achat_points",array("COMMANDE_ID"=>$id_commande,"VENTE_ID"=>'',"PRODUIT_ID"=>$items['PRODUIT_ID'],"CLIENT"=>$cmm['USER_ID'],"PRIX_UNITAIRE"=>$items['price'],"QUANTITE"=>$items['qty'],"PRIX_TOTAL"=>$items['subtotal'],"BONUS"=>$bns));

        }
      }

      $this->cart->destroy();

    $this->Model->update("commande",array("COMMANDE_ID"=>$id_commande),array("MODE_DE_CONFIRMATION"=>$this->input->post("SELECT"),"ADRESSE_DE_CONFIRMATION"=>$this->input->post("EMAIL_OU_TELEPHONE")));

    redirect(base_url('Commande/recapitulatif_facture1/'.$id_commande));

  }

  public function recapitulatif_facture1($id_commande){
    $data['id_commande']=$id_commande;
    $commande=$this->Model->getOne("commande",array("COMMANDE_ID"=>$id_commande));

    // $info=$this->Model->getRequete("SELECT* from commande c join produit_commande pc on c.COMMANDE_ID=pc.COMMANDE_ID join users u on c.USER_ID=u.USER_ID WHERE c.COMMANDE_ID=".$id_commande." join produit p on pc.PRODUIT_ID=p.PRODUIT_ID");

     $data['cmd']=$commande;
    $this->load->view('recapitulatif_facture_view1',$data);
  }

  public function livraison($id_commande=''){
    $data['erreur']="";
    $this->load->view('livraison_view', $data);
  }

  public function add_livraison($id_commande=''){

    $frais=$this->Model->getOne("quartier_de_distribution",array("QUARTEIR_ID"=>$_POST['DESTINATION']));
    $session = array(
                              'QUARTIER' => $_POST['DESTINATION'],
                              'FRAIS' => $frais['QUARTIER_COUT'],
                              'ADRESSE' => $_POST['adresse'],

                              'NUMERO_CONTACT' => $_POST['TELEPHONE'],

                            );
                
                 $this->session->set_userdata($session);

                 $data['mode']=$this->Model->getlist("mode_de_paiement");
                 $data['mode_distribution']="livraison";
    $this->load->view('collect_view', $data);

  }

  public function check_nouveau(){
    $check=$this->Model->checkvalue("commande",array("STATUT"=>0));
    if ($check==1) {
      echo "ok";
    }else{
      echo "non";
    }
  }

  public function mesCommandes($id){
       $data['error']='';

       
   $data['message']='';
   $date=$this->input->post('DATE');
   $mois=$this->input->post('MOIS');
   $annee=$this->input->post('ANNEE');
   if (empty($annee)) {
     $annee=date('Y');
     $dt=$annee;
   }

   if (!empty($mois)) {
     $dt=$annee."-".$mois."-".$date;
   }else{
    $dt=$annee;
   }

          // $resultat=$this->Model->getRequete("SELECT v.ID_FACTURE,PRODUIT_DESCR,PRIX,REDUCTION_POINT,TYPE_REDUCTION,u.NOM_USER as nom_client,u.TELEPHONE as tel_client,u1.NOM_USER as nom_user,u1.TELEPHONE as tel_user,v.DATE  from vente v left join facture f on v.ID_FACTURE=f.ID_FACTURE left join users u on v.CLIENT=u.USER_ID  left join users u1 on v.FAIT_PAR=u1.USER_ID left join produit pr on v.PRODUIT_ID=pr.PRODUIT_ID LEFT JOIN type_reduction tp on v.ID_TYPE_REDUCTION=tp.ID_TYPE_REDUCTION  where v.DATE LIKE '%".$dt."%' and CLIENT=".$id." order by ID_VENTE DESC");
   $resultat=$this->Model->getRequete("SELECT* from achat_points ac left join users u on ac.CLIENT=u.USER_ID left join produit p on ac.PRODUIT_ID=p.PRODUIT_ID where CLIENT=".$id." ORDER BY ACHAT_POINT_ID DESC");
       $tabledata=array();
       $i=1;
      foreach ($resultat as $key)
           {
            $dates=date_create($key['DATE']);

              $point=array();
              $point[]=$i;
              $point[]=$key['PRODUIT_DESCR'];
              $point[]=$key['QUANTITE'];
              $point[]=$key['PRIX_UNITAIRE'];
              $point[]=$key['PRIX_TOTAL'];
              $point[]=date_format($dates,"d-m-Y H:i");
              if ($key['BONUS']==1) {
                $bns='ACHAT BONUS';
               } else $bns='ACHAT SANS BONUS';
              $point[]=$bns; 

             
              // $point[]=$key['nom_user']."(".$key['tel_user'].")"; 
              

               $tabledata[]=$point;
               $i++;
                   }

                $template = array(
                    'table_open' => '<table id="d_table" class="table table-bordered table-striped table-hover table-condensed">',
                    'table_close' => '</table>'
                );
                $this->table->set_template($template); 
                $this->table->set_heading(array('#','PRODUIT','QUANTITE','PRIX UNITAIRE','PRIX TOTAL','DATE','TYPE ACHAT'));

                $data['an']=$annee;
              $data['ms']=$mois;
              $data['dt']=$date;
              $data['titl']="Ventes (". $dt.")";
              $data['annee'] =$this->Model->getRequete("SELECT DISTINCT YEAR(`DATE`) as DATE FROM achat_points WHERE 1 ORDER by `DATE`");
             $data['mois'] =$this->Model->getRequete("SELECT DISTINCT MONTH(`DATE`) as DATE FROM achat_points WHERE 1 ORDER by MONTH(`DATE`)");
             $data['jour'] =$this->Model->getRequete("SELECT DISTINCT DAY(`DATE`) as DATE FROM achat_points WHERE 1 ORDER by DAY(`DATE`)");

                $data['points']=$tabledata;
    $data['USER_ID']=$id;
     // $this->load->view('admin_accueil_view',$data);
    // $this->Model->update("commande",array("STATUT"=>0),array("STATUT"=>"1"));
    $data['message']='';
     $this->load->view('mes_commande_view',$data);
  }
}
