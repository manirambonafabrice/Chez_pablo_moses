<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

public function __construct() {
        parent::__construct();
	require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
	
        // $this->make_bread->add('Projets', "assurance/Assurance_Vehucule", 0);
        // $this->breadcrumb = $this->make_bread->output();
        if (empty($this->session->userdata('USER_TELEPHONE'))) {
        redirect(base_url('Login'));
        }
        // if ($this->session->userdata('USER_TELEPHONE')) {
        // redirect(base_url('Admin/admin_accueil'));
        // } 
    }
	
	public function index()
	{
    if ($this->session->userdata('USER_TELEPHONE')) {
        redirect(base_url('Admin/admin_accueil'));
        }
		$data['message']='';
		 $this->load->view('admin_view',$data);
	}

	public function admin_accueil(){

		  $data['error']='';

       $table="users";
       $resultat=$this->Model->getList($table);
       $tabledata=array();
      foreach ($resultat as $key) 
           {
              $point=array();
              $point[]=$key['NOM_USER'];
              $point[]=$key['PRENOM_USER'];
              $point[]=$key['EMAIL']; 

              $point[]=$key['USERNAME'];
              $point[]=$key['TELEPHONE'];
              $profil=$this->Model->getOne("profiles_users",array("PROFILE_ID"=>$key['PROFILE_ID']));
              $point[]=$profil['DESCRIPTION_PROFILE'];
              if ($key['VIP']==1) {
                $point[]='<input type="checkbox" id="'.$key['USER_ID'].'" name="'.$key['USER_ID'].'" checked class="check"  style="margin-right:5px"> <label for="'.$key['USER_ID'].'"> VIP</label>';
              }else
               $point[]='<input type="checkbox" id="'.$key['USER_ID'].'" name="'.$key['USER_ID'].'"  class="check" style="margin-right:5px"> <label for="'.$key['USER_ID'].'"> VIP</label>';
              



      $point['OPTIONS'] = '<div class="dropdown ">
                    <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Action
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        ';

if ($this->session->userdata('USER_PROFIEL_ID')==1) {
        $point['OPTIONS'] .= "<li><a href='" . base_url('Admin/getOne/' . $key['USER_ID']) . "'>Modifier</a></li>";


      $point['OPTIONS'] .= "<li><a hre='#' data-toggle='modal' 
                                  data-target='#mydelete" . $key['USER_ID'] . "'><font color='red'>Supprimer</font></a></li>";
   }

            

       $point['OPTIONS'] .= "   </ul>
                  </div>
                                    <div class='modal fade' id='mydelete" . $key['USER_ID'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                                <div class='modal-body'>
                                                    <h5>Voulez- vous vraiment supprimer</h5>
                                                </div>

                                               <div class='modal-footer'>
                                                    <a class='btn btn-danger btn-md' href='" . base_url('Admin/delete/'. $key['USER_ID']) . "'>Supprimer</a>
                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Quitter</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div></form>";


               $tabledata[]=$point;
                   }

                $template = array(
                    'table_open' => '<table id="d_table" class="table table-bordered table-striped table-hover table-condensed">',
                    'table_close' => '</table>'
                );
                $this->table->set_template($template); 
                $this->table->set_heading(array('Nom','Prénom','Email','username','Téléphone','Profil','VIP','OPTIONS'));
                $data['points']=$tabledata;
		$data['message']='';
		 $this->load->view('admin_accueil_view',$data);
	}

	public function ajouter(){

     $data['professions']=$this->Model->getListOrder('profiles_users','DESCRIPTION_PROFILE');

		$data['message']='';
		$this->load->view('admin_ajouter_view',$data);
	}

	public function add(){

    if (!empty($this->session->userdata('USER_TELEPHONE'))) {
		 $this->form_validation->set_rules('NOM','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
         $this->form_validation->set_rules('PRENOM','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));

          $this->form_validation->set_rules('TELEPHONE', '', 'required|is_unique[users.TELEPHONE]',array("is_unique"=>"<font color='red'>ce Téléphone existe deja</font>","required"=>"<font color='red'>ce champs est obligatoire</font>"));
           $this->form_validation->set_rules('USERNAME', '', 'required|is_unique[users.USERNAME]',array("is_unique"=>"<font color='red'>ce username existe deja</font>","required"=>"<font color='red'>ce champs est obligatoire</font>"));

         $this->form_validation->set_rules('EMAIL','', 'required|valid_email',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoiree</font>',"valid_email"=>"<font color='red'>ce email n'est pas valide</font>"));

          // $this->form_validation->set_rules('AGE','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
           $this->form_validation->set_rules('PROFILE_ID','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
            // $this->form_validation->set_rules('SEXE_ID','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
           $this->form_validation->set_rules('PWD','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));

      

      if ($this->form_validation->run() == FALSE)
                {

     $data['professions']=$this->Model->getListOrder('profiles_users','DESCRIPTION_PROFILE');

          $this->load->view('admin_ajouter_view',$data);

                }

               else
             {
 
        $data1=array(
          
            'NOM_USER' => $this->input->post('NOM'),
            'PRENOM_USER' => $this->input->post('PRENOM'),
            'TELEPHONE' => $this->input->post('TELEPHONE'),
            'EMAIL' => $this->input->post('EMAIL'),
            'USERNAME' => $this->input->post('USERNAME'),
            'PASSWORD' => $this->cript($this->input->post('PWD'),$this->input->post('USERNAME')),
            'PROFILE_ID' => $this->input->post('PROFILE_ID'),
           
             );
        $this->Model->create('users',$data1);
          $data['message']='<div class="alert alert-success text-center">'."Enregistrement faite avec succès".'</div>';
     $this->session->set_flashdata($data);
     redirect(base_url('Admin/admin_accueil/'));

          }
}
           
	}
	public function delete($id){
    if (!empty($this->session->userdata('USER_TELEPHONE'))) {
          $this->Model->delete("users",array('USER_ID'=>$id));
          
           $data['message']='<div class="alert alert-success text-center">'."Suppression faite avec succès".'</div>';
     $this->session->set_flashdata($data);
     redirect(base_url('Admin/admin_accueil/'));
        }
        }

    public function getOne($id){

      $data['message']='';
      $data['user']=$this->Model->getOne("users",array('USER_ID'=>$id));
        $data['professions']=$this->Model->getListOrder('profiles_users','DESCRIPTION_PROFILE');

     $this->load->view('admin_update_view',$data);
   }
    

    public function update($id){
      if (!empty($this->session->userdata('USER_TELEPHONE'))) {
       $this->form_validation->set_rules('NOM','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
         $this->form_validation->set_rules('PRENOM','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));

          $this->form_validation->set_rules('TELEPHONE', '', 'required',array("required"=>"<font color='red'>ce champs est obligatoire</font>"));
           $this->form_validation->set_rules('USERNAME', '', 'required',array("required"=>"<font color='red'>ce champs est obligatoire</font>"));

         $this->form_validation->set_rules('EMAIL','', 'required|valid_email',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoiree</font>',"valid_email"=>"<font color='red'>ce email n'est pas valide</font>"));

          // $this->form_validation->set_rules('AGE','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
           $this->form_validation->set_rules('PROFILE_ID','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
            // $this->form_validation->set_rules('SEXE_ID','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
           $this->form_validation->set_rules('PWD','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));

      

      if ($this->form_validation->run() == FALSE)
                {

     $data['professions']=$this->Model->getListOrder('profiles_users','DESCRIPTION_PROFILE');
      $data['user']=$this->Model->getOne("users",array('USER_ID'=>$id));

          $this->load->view('admin_update1_view',$data);

                }

               else
             {
 
        $data1=array(
          
            'NOM_USER' => $this->input->post('NOM'),
            'PRENOM_USER' => $this->input->post('PRENOM'),
            'TELEPHONE' => $this->input->post('TELEPHONE'),
            'EMAIL' => $this->input->post('EMAIL'),
            'USERNAME' => $this->input->post('USERNAME'),
            'PASSWORD' => $this->cript($this->input->post('PWD'),$this->input->post('USERNAME')),
            'PROFILE_ID' => $this->input->post('PROFILE_ID'),
           
             );
        $this->Model->update('users',array("USER_ID"=>$id),$data1);
          $data['message']='<div class="alert alert-success text-center">'."Enregistrement faite avec succès".'</div>';
     $this->session->set_flashdata($data);
     if ($this->session->userdata('USER_ID')==$id) 
      {
        $data['messages']='<div class="alert alert-success text-center">'."Modification avec succès, veuillez vous ré-authentifier".'</div>';
         $this->session->set_flashdata($data);

         redirect(base_url('Login/do_logout'));
       }else{
     redirect(base_url('Admin/admin_accueil/'));
       }

    }
  }
  }

  public function nouveau_commande(){

      $data['error']='';

       $table="commande";
       $resultat=$this->Model->getListOrdered($table,"DATE",array("STATUT"=>0));
      $data['commande']=$resultat;
       $tabledata=array();
       $i=1;
      foreach ($resultat as $key)
           {
            $users=$this->Model->getOne("users",array("USER_ID"=>$key['USER_ID']));
              $point=array();
              $mode=$this->Model->getOne("mode_de_paiement",array('MODE_ID'=>$key['MODE_PAIEMENT_ID']));
              $point[]= $i;
              $point[]= $key['COMMANDE_ID'];
              $point[]=$mode['MODE_DESCRIPTION'];

              if ($key['MODE_PAIEMENT_ID']==1) {
                $n_mode=$this->Model->getOne("mobile_money",array("MOBILE_ID"=>$key['MOBILE_ID']));
                $n_mode=$n_mode['MOBILE_NAME'];
              }
              if ($key['MODE_PAIEMENT_ID']==2) {
                $n_mode=$this->Model->getOne("bank",array("BANK_ID"=>$key['BANK_ID']));
                $n_mode=$n_mode['BANK_NAME'];
              }
              if ($key['MODE_PAIEMENT_ID']==3) {
                
                $n_mode="Cash";
              }
              $point[]=$n_mode;

              $article=$this->Model->getList("produit_commande",array("COMMANDE_ID"=>$key['COMMANDE_ID']));
             
          
            $output='<table id="d_table" class="table table-bordered table-striped table-hover table-condensed"><tr><th>PRODUIT</th><th>QUANTITE</th><th>P.U</th><th>P.T</th><th>TYPE</th></tr>';
            
        
       foreach ($article as $v) {
 if ($v['BONUS']==1) {
                $bonus="BONUS PRODUIT";
              }else $bonus="";
        $art=$this->Model->getOne("produit",array("PRODUIT_ID"=>$v["PRODUIT_ID"]));
        $output.='<tr><td>'.$art["PRODUIT_DESCR"].'</td><td>'.$v["QUANTITE"].'</td><td>'.$v["PRIX_UNITAIRE"].'</td><td>'.$v["PRIX_TOTAL"].'</td><td>'.$bonus.'</td></tr>';
       }
       $output.='</table><p> <a href="'.base_url('Admin/consulter_et_exporter/').$key['COMMANDE_ID'].'" style="color:red;">Consulter et exporter</a>';
       $point[]="<a href='#' data-toggle='modal' 
                                  data-target='#so". $key['COMMANDE_ID']. "'>".sizeof($article)."</a>
                                    <div class='modal fade' id='so". $key['COMMANDE_ID'] ."'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                                <div class='modal-body'>
                                                    " .$output. "
                                                </div>

                                            </div>
                                        </div>
                                    </div>";
     //$data[]=$part;

        
              $point[]=$key['MONTANT_CLIENT']; 

              $point[]=$key['FRAIS_DE_TRANSFAIRE'];
              $point[]=$key['MODE_DE_CONFIRMATION'];
              $point[]=$key['ADRESSE_DE_CONFIRMATION'];
              $point[]=$key['FRAIS_DE_TRANSPORT'];
              $point[]=$key['MODE_RECUPERATION'];
              $dest=$this->Model->getOne("quartier_de_distribution",array("QUARTEIR_ID"=>$key['DESTINATION_LIVRAISON']));
              $point[]=$dest['QUARTIER_NOM'];
              $point[]=$key['ADRESSE_LIVAISON'];
              $point[]=$key['CONTACT_LIVRAISON'];
              $point[]=$key['DATE'];
              $point[]=$users['NOM_USER'].' '.$users['PRENOM_USER'].' '.$users['TELEPHONE'];
              $point[]=$key['REFERENCE'];
              $point[]=$key['STATUT_LIVRAISON'];
              

if($key['STATUT_LIVRAISON']=="Non livré"){
                $point['OPTIONS'] = "
                    <a hre='#' class='btn btn-primary btn-md' data-toggle='modal' 
                                  data-target='#mydelete" . $key['COMMANDE_ID'] . "'>Livrer
                   </a><div class='modal fade' id='mydelete" . $key['COMMANDE_ID'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                                <div class='modal-body'>
                                                    <h5>Voulez- vous vraiment livrer?</h5>
                                                </div>

                                               <div class='modal-footer'>
                                                    <a class='btn btn-danger btn-md' href='" . base_url('Admin/livrer/'. $key['COMMANDE_ID']) . "'>Livrer</a>
                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Quitter</button>
                                                </div>

                                            </div>
                                        </div>
                                        </div>";
                                  }else{
                                    $point['OPTIONS'] = "";
                                  }
             

               $tabledata[]=$point;
                $i++;
                   }

                $template = array(
                    'table_open' => '<table id="d_table" class="table table-bordered table-striped table-hover table-condensed">',
                    'table_close' => '</table>'
                );
                $this->table->set_template($template); 
                $this->table->set_heading(array('#','Numero commande','Mode de paiement','compte','Article','montant','Frais de transfere','Mode de confirmation','Adresse confirmation','Transport','Mode de recuperation','Destination','Adresse','Contact','Date','Fait par','Réference','Statut','Options'));
                $data['points']=$tabledata;
    $data['message']='';
     // $this->load->view('admin_accueil_view',$data);
    $data['message']='';
     // $this->load->view('admin_accueil_view',$data);
    $this->Model->update("commande",array("STATUT"=>0),array("STATUT"=>"1"));
    $data['message']='';
     $this->load->view('nouveau_commande_view',$data);
  }

  public function livrer($commande_id){
   
    // $this->Model->update("commande",array("COMMANDE_ID"=>$commande_id),array("STATUT_LIVRAISON"=>"Livré"));
                  $this->load->library("cart");
                  $this->cart->destroy();
$produit_commande=$this->Model->getList("produit_commande",array("COMMANDE_ID"=>$commande_id));
$commande=$this->Model->getOne("commande",array("COMMANDE_ID"=>$commande_id));

// print_r($produit_commande);

foreach ($produit_commande as  $value) {
  $pro=$this->Model->getOne("produit",array("PRODUIT_ID"=>$value['PRODUIT_ID']));
    for ($i=0; $i < $value['QUANTITE']; $i++) { 
      $data_depense=array('id'=>uniqid(),
                'name'=>$pro['PRODUIT_DESCR'],
                'qty'=>1,
                'price'=>$value['PRIX_UNITAIRE'],
                'PRODUIT_ID'=>$value['PRODUIT_ID'],
                'NOM_PRODUIT'=>$pro['PRODUIT_DESCR'],
                'PV'=>$value['PRIX_UNITAIRE'],
                'CODES'=>"",
                'NOMBRE'=>1,
                'PA'=>$value['PRIX_UNITAIRE'],
                'PRIX_SCAN'=>'',
                'DATE'=>'',
                'BONUS'=>$value['BONUS'],
                'USER_ID'=>$commande['USER_ID'],
                'COMMANDE_ID'=>$commande_id,
                
                'soc'=>'VENTE');
     $this->cart->insert($data_depense);
     // echo "y";
// print_r($this->cart->contents());
    }

// echo $output;
$data['error']='';
// $data['output']=$output;
// print_r($this->cart->contents());
   
    // print_r($this->cart->contents());
}
$data['USER_ID']=$commande['USER_ID'];
      

    
       $this->load->view('Livrer_view',$data);
      
    // redirect(base_url('Admin/tous_les_commandes/'));

  }
  public function tous_les_commandes(){
     $data['error']='';

       $table="commande";
       $resultat=$this->Model->getRequete("SELECT* FROM commande ORDER BY COMMANDE_ID DESC");
       // $resultat=$this->Model->getListOrdered($table,"DATE",array());
       $data['commande']=$resultat;
       $tabledata=array();
       $i=1;
      foreach ($resultat as $key)
           {
            $users=$this->Model->getOne("users",array("USER_ID"=>$key['USER_ID']));
              $point=array();
              $mode=$this->Model->getOne("mode_de_paiement",array('MODE_ID'=>$key['MODE_PAIEMENT_ID']));
              $point[]= $i;
              $point[]= $key['COMMANDE_ID'];
              $point[]=$mode['MODE_DESCRIPTION'];

              if ($key['MODE_PAIEMENT_ID']==1) {
                $n_mode=$this->Model->getOne("mobile_money",array("MOBILE_ID"=>$key['MOBILE_ID']));
                $n_mode=$n_mode['MOBILE_NAME'];
              }
              if ($key['MODE_PAIEMENT_ID']==2) {
                $n_mode=$this->Model->getOne("bank",array("BANK_ID"=>$key['BANK_ID']));
                $n_mode=$n_mode['BANK_NAME'];
              }
              if ($key['MODE_PAIEMENT_ID']==3) {
                
                $n_mode="Cash";
              }
              $point[]=$n_mode;

              $article=$this->Model->getList("produit_commande",array("COMMANDE_ID"=>$key['COMMANDE_ID']));
             
          
            $output='<table id="d_table" class="table table-bordered table-striped table-hover table-condensed"><tr><th>PRODUIT</th><th>QUANTITE</th><th>P.U</th><th>P.T</th><th>TYPE</th></tr>';
            
        
       foreach ($article as $v) {
 if ($v['BONUS']==1) {
                $bonus="BONUS PRODUIT";
              }else $bonus="";
        $art=$this->Model->getOne("produit",array("PRODUIT_ID"=>$v["PRODUIT_ID"]));
        $output.='<tr><td>'.$art["PRODUIT_DESCR"].'</td><td>'.$v["QUANTITE"].'</td><td>'.$v["PRIX_UNITAIRE"].'</td><td>'.$v["PRIX_TOTAL"].'</td><td>'.$bonus.'</td></tr>';
       }
       $output.='</table><p> <a href="'.base_url('Admin/consulter_et_exporter/').$key['COMMANDE_ID'].'" style="color:red;">Consulter et exporter</a>';
       $point[]="<a href='#' data-toggle='modal' 
                                  data-target='#so". $key['COMMANDE_ID']. "'>".sizeof($article)."</a>
                                    <div class='modal fade' id='so". $key['COMMANDE_ID'] ."'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                                <div class='modal-body'>
                                                    " .$output. "
                                                </div>

                                            </div>
                                        </div>
                                    </div>";
     //$data[]=$part;

        
              $point[]=$key['MONTANT_CLIENT']; 

              $point[]=$key['FRAIS_DE_TRANSFAIRE'];
              $point[]=$key['MODE_DE_CONFIRMATION'];
              $point[]=$key['ADRESSE_DE_CONFIRMATION'];
              $point[]=$key['FRAIS_DE_TRANSPORT'];
              $point[]=$key['MODE_RECUPERATION'];
               $dest=$this->Model->getOne("quartier_de_distribution",array("QUARTEIR_ID"=>$key['DESTINATION_LIVRAISON']));
              $point[]=$dest['QUARTIER_NOM'];
              $point[]=$key['ADRESSE_LIVAISON'];
              $point[]=$key['CONTACT_LIVRAISON'];
              $point[]=$key['DATE'];
              $point[]=$users['NOM_USER'].' '.$users['PRENOM_USER'].' '.$users['TELEPHONE'];
              $point[]=$key['REFERENCE'];
              $point[]=$key['STATUT_LIVRAISON'];
              

if($key['STATUT_LIVRAISON']=="Non livré"){
                $point['OPTIONS'] = "
                    <a href='" . base_url('Admin/livrer/'. $key['COMMANDE_ID']) . "' class='btn btn-primary btn-md' >Livrer
                   </a><div class='modal fade' id='mydelete" . $key['COMMANDE_ID'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                                <div class='modal-body'>
                                                    <h5>Voulez- vous vraiment livrer?</h5>
                                                </div>

                                               <div class='modal-footer'>
                                                    <a class='btn btn-danger btn-md' href='" . base_url('Admin/livrer/'. $key['COMMANDE_ID']) . "'>Livrer</a>
                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Quitter</button>
                                                </div>

                                            </div>
                                        </div>
                                        </div>";
$point['OPT'] = "
                    <a hre='#' class='btn btn-danger btn-md' data-toggle='modal' 
                                  data-target='#mydeletes" . $key['COMMANDE_ID'] . "'>Supprimer
                   </a><div class='modal fade' id='mydeletes" . $key['COMMANDE_ID'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                                <div class='modal-body'>
                                                    <h5>Voulez- vous vraiment supprimer?</h5>
                                                </div>

                                               <div class='modal-footer'>
                                                    <a class='btn btn-danger btn-md' href='" . base_url('Admin/supprimer_commande/'. $key['COMMANDE_ID']) . "'>Supprimer</a>
                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Quitter</button>
                                                </div>

                                            </div>
                                        </div>
                                        </div>";     
                                  }else{
                                    $point['OPTIONS'] = "<a href='" . base_url('Admin/imprimer_facture_commnde/'. $key['COMMANDE_ID']) . "' class='btn btn-primary btn-md' >IMPRIMER FACTURE</a>";
                                    $point['OPT'] = "";
                                  }
                        

               $tabledata[]=$point;
                $i++;
                   }

                $template = array(
                    'table_open' => '<table id="d_table" class="table table-bordered table-striped table-hover table-condensed">',
                    'table_close' => '</table>'
                );
                $this->table->set_template($template); 
                $this->table->set_heading(array('#','Numero commande','Mode de paiement','compte','Article','montant','Frais de transfere','Mode de confirmation','Adresse confirmation','Transport','Mode de recuperation','Destination','Adresse','Contact','Date','Fait par','Code de transaction','Statut','',''));
                $data['points']=$tabledata;
    $data['message']='';
     // $this->load->view('admin_accueil_view',$data);
    $data['message']='';
     $this->load->view('tous_les_commande_view',$data);
  }

  public function suggestion_list(){
        $data['error']='';

       $table="suggestion";
       $resultat=$this->Model->getListOrdered($table,'SUGGESTION_ID');
       $tabledata=array();
       $i=1;
      foreach ($resultat as $key)
           {
              $point=array();
              $point[]=$i;
              $point[]=$key['SUGGESTION_DESCR'];
              
      $point['OPTIONS'] = '<div class="dropdown ">
                    <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Action
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        ';

// if ($this->session->userdata('USER_PROFIEL_ID')==1) {
        // $point['OPTIONS'] .= "<li><a href='" . base_url('Admin/getOne/' . $key['USER_ID']) . "'>Modifier</a></li>";


      $point['OPTIONS'] .= "<li><a hre='#' data-toggle='modal' 
                                  data-target='#mydelete" . $key['SUGGESTION_ID'] . "'><font color='red'>Supprimer</font></a></li>";
   // }

            

       $point['OPTIONS'] .= "   </ul>
                  </div>
                                    <div class='modal fade' id='mydelete" . $key['SUGGESTION_ID'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                                <div class='modal-body'>
                                                    <h5>Voulez- vous vraiment supprimer cette suggestion</h5>
                                                </div>

                                               <div class='modal-footer'>
                                                    <a class='btn btn-danger btn-md' href='" . base_url('Admin/delete_suggestion/'. $key['SUGGESTION_ID']) . "'>Supprimer</a>
                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Quitter</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div></form>";

                                    $i++;
               $tabledata[]=$point;
                   }

                $template = array(
                    'table_open' => '<table id="d_table" class="table table-bordered table-striped table-hover table-condensed">',
                    'table_close' => '</table>'
                );
                $this->table->set_template($template); 
                $this->table->set_heading(array('#','Suggestion','OPTIONS'));
                $data['points']=$tabledata;
    $data['message']='';
     $this->load->view('suggestion_view',$data);

  } 

  public function delete_suggestion($id){
    if (!empty($this->session->userdata('USER_TELEPHONE'))) {
$this->Model->delete("suggestion",array('SUGGESTION_ID'=>$id));
          
           $data['message']='<div class="alert alert-success text-center">'."Suppression faite avec succès".'</div>';
     $this->session->set_flashdata($data);
     redirect(base_url('Admin/suggestion_list/'));
   }
  }

  public function vente_sur_caisse($facture=''){
   if (!empty($this->session->userdata('USER_TELEPHONE'))) {
    $data['error']='';
    $data['facture']=$facture;
    // $this->load->view('admin_vente_sur_caisse_view',$data);
     $data['breadcrumb'] = ' 
        <a class="btn btn-link btn-md" href="'.base_url().'Admin/vente_sur_caisse" style="margin:2px">Nouvelle vente</a>
        <a class="btn btn-link btn-md" href="'.base_url().'Admin/vente_historique" style="margin:2px">Historique de vente</a>';
    $this->load->view('admin_vente_view',$data);
  }
  }


    public function qr_code(){
      $data['error']='';

    $this->load->view('admin_qr_code_view',$data);
    }

    public function generate_qr_code(){
      if (!empty($this->session->userdata('USER_TELEPHONE'))) {
    // echo  str_pad(11, 8, '0', STR_PAD_LEFT);
      include 'pdfinclude/fpdf/mc_table.php';
      include 'pdfinclude/fpdf/pdf_config.php';
      // include 'pdfinclude/fpdf/pdf.php';

$nombre=$this->input->post('NOMBRE');

//REMOVING FILES
      $files = glob(FCPATH . 'qrCode/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}


      $pdf = new PDF_CONFIG('P','mm','A4');
      // $pdf->addPage();
      $this->load->library('ciqrcode');

      $niveau_lateral=0;
      $niveau_vertical=0;
      $x=0;
      $j=0;

for ($i=0; $i < $nombre; $i++) {
  // echo $nombre;exit();
$fl= time().'-'.$i; 
  // GENERATE
$params['data'] = $fl;
$params['level'] = 'H';
$params['size'] = 10;
$params['savename'] = FCPATH.'qrCode/'.$fl.'.png';
$this->ciqrcode->generate($params);

if ($x%10==0&&$i%7==0) {
  $pdf->addPage();
   // echo $x."<br>";
  $niveau_lateral=8;
      $niveau_vertical=8;
      // echo $i."<br>";
      $j=0;
}
if($i%7==0) {
  

  if ($j!=0) {
    // echo $i;
    $niveau_lateral=8;
$niveau_vertical=$niveau_vertical+29;
}

  // }
  $x++;
  $j++;
}else{
$niveau_lateral=$niveau_lateral+29;
}


// $niveau_vertical=$niveau_vertical+30;


          if(file_exists(FCPATH . 'qrCode/'.$fl.'.png')) {
         $pdf->Image(FCPATH . 'qrCode/'.$fl.'.png',$niveau_lateral,$niveau_vertical,20,20);
       }
}


       $pdf->Output('fichier_paie.pdf','I');
    // echo  time();
     }
    }

    public function generate_barcode(){
      if (!empty($this->session->userdata('USER_TELEPHONE'))) {
    // echo  str_pad(11, 8, '0', STR_PAD_LEFT);
      include 'pdfinclude/fpdf/mc_table.php';
      include 'pdfinclude/fpdf/pdf_config.php';
      // include 'pdfinclude/fpdf/pdf.php';

$nombre=$this->input->post('NOMBRE');

//REMOVING FILES
      $files = glob(FCPATH . 'qrCode/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}

      // $pdf = new PDF_CONFIG('P','mm','A4');

      $pdf = new PDF_CONFIG('P','mm','A4');
      // $pdf->addPage();


      $niveau_lateral=0;
      $niveau_vertical=0;
      $x=0;
      $j=0;

for ($i=0; $i < $nombre; $i++) {
  // echo $nombre;exit();
$fl= time().'-'.$i; 
  // GENERATE
      $string =  $fl;
    $this->set_barcode($string);

if ($x%15==0&&$i%6==0) {
  $pdf->addPage();
   // echo $x."<br>";
  $niveau_lateral=3;
      $niveau_vertical=5;
      // echo $i."<br>";
      $j=0;
}
if($i%6==0) {
  

  if ($j!=0) {
    // echo $i;
    $niveau_lateral=3;
$niveau_vertical=$niveau_vertical+19.2;
}

  // }
  $x++;
  $j++;
}else{
$niveau_lateral=$niveau_lateral+34;
}


// $niveau_vertical=$niveau_vertical+30;


          if(file_exists(FCPATH . 'barCode/'.$fl.'.png')) {
         $pdf->Image(FCPATH . 'barCode/'.$fl.'.png',$niveau_lateral,$niveau_vertical,34,15);
       }
}


       $pdf->Output('fichier_barcode.pdf','I');
    // echo  time();
     }
    }

   public function modifier_mes(){

$data['user']=$this->Model->getOne("users",array('USER_ID'=>$this->session->userdata('USER_ID')));
     $data['professions']=$this->Model->getListOrder('profiles_users','DESCRIPTION_PROFILE');

    $data['message']='';
    $this->load->view('admin_update_view',$data);
   }

 public function cript($pwd,$key){

$pwd1= strlen($pwd);
$key1 = strlen($key);

if($key1>$pwd1){

$key = substr($key,0,$pwd1);

}elseif ($key1<$pwd1){

$key = str_pad($key,$pwd1,$key,STR_PAD_RIGHT);
}
return $pwd^$key;
}


 public function requisition(){
$this->cart->destroy();
   $data['breadcrumb'] = ' 
        <a class="btn btn-link btn-md" href="'.base_url().'Admin/requisition" style="margin:2px">Nouvelle réquisition</a>
        <a class="btn btn-link btn-md" href="'.base_url().'Admin/requisition_historique" style="margin:2px">Historique de réquisitions</a>'; 

   $data['message']='';
     $this->load->view('admin_requisition_view',$data);
 }

 public function requisition_historique(){
  $data['breadcrumb'] = ' 
        <a class="btn btn-link btn-md" href="'.base_url().'Admin/requisition" style="margin:2px">Nouvelle réquisition</a>
        <a class="btn btn-link btn-md" href="'.base_url().'Admin/requisition_historique" style="margin:2px">Historique de réquisitions</a>'; 

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

          $resultat=$this->Model->getRequete("SELECT ID_REQUISITION,PRODUIT_DESCR,NOMBRE,PA_UNITAIRE,PV_UNITAIRE,PEREMPRION,r.DATE,NOM_USER,PRENOM_USER from requisition r left join produit p on r.PRODUIT_ID=p.PRODUIT_ID left join users u on r.USER_ID=u.USER_ID where r.DATE LIKE '%".$dt."%' order by ID_REQUISITION DESC");
       $tabledata=array();
       $i=1;
      foreach ($resultat as $key)
           {
            $dates=date_create($key['DATE']);
            $per=date_create($key['PEREMPRION']);
            $resultat2=$this->Model->getList('qr_code_requisition', array('ID_REQUISITION' => $key['ID_REQUISITION']));

            $qrc='';
 foreach ($resultat2 as $key2)
  
           {
            $qrc.=$key2['QR_CODE'].'<br>';
           }
              $point=array();
              $point[]=$i;
              $point[]=$key['PRODUIT_DESCR'];
              $point[]=$key['NOMBRE'];
              $point[]=$key['PA_UNITAIRE'];
              $point[]=$key['PV_UNITAIRE']; 

              $point[]=date_format($per,"d-m-Y");
              $point[]=date_format($dates,"d-m-Y H:i");
             
              $point[]=$key['NOM_USER']." ".$key['PRENOM_USER'];
              $point[]=$qrc;


      $point['OPTIONS'] = '<div class="dropdown ">
                    <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Action
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        ';

if ($this->session->userdata('USER_PROFIEL_ID')==1) {
        $point['OPTIONS'] .= "<li><a href='" . base_url('Admin/update_requisition/' . $key['ID_REQUISITION']) . "'>Modifier</a></li>";


      $point['OPTIONS'] .= "<li><a hre='#' data-toggle='modal' 
                                  data-target='#mydelete" . $key['ID_REQUISITION'] . "'><font color='red'>Supprimer</font></a></li>";
   }

            

       $point['OPTIONS'] .= "   </ul>
                  </div>
                                    <div class='modal fade' id='mydelete" . $key['ID_REQUISITION'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                                <div class='modal-body'>
                                                    <h5>Voulez- vous vraiment supprimer</h5>
                                                </div>

                                               <div class='modal-footer'>
                                                    <a class='btn btn-danger btn-md' href='" . base_url('Admin/delete_requisitions/'. $key['ID_REQUISITION']) . "'>Supprimer</a>
                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Quitter</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div></form>";


               $tabledata[]=$point;
               $i++;
                   }

                $template = array(
                    'table_open' => '<table id="d_table" class="table table-bordered table-striped table-hover table-condensed">',
                    'table_close' => '</table>'
                );
                $this->table->set_template($template); 
                $this->table->set_heading(array('#','PRODUIT','NOMBRE','P.A UNITAIRE','P.V UNITAIRE','PEREMPTION','DATE STOCK','FAIT PAR','QR_CODE','OPTIONS'));

                $data['an']=$annee;
              $data['ms']=$mois;
              $data['dt']=$date;
              $data['titl']="Requisitions (". $dt.")";
              $data['annee'] =$this->Model->getRequete("SELECT DISTINCT YEAR(`DATE`) as DATE FROM `requisition` WHERE 1 ORDER by `DATE`");
             $data['mois'] =$this->Model->getRequete("SELECT DISTINCT MONTH(`DATE`) as DATE FROM `requisition` WHERE 1 ORDER by MONTH(`DATE`)");
             $data['jour'] =$this->Model->getRequete("SELECT DISTINCT DAY(`DATE`) as DATE FROM `requisition` WHERE 1 ORDER by DAY(`DATE`)");

                $data['points']=$tabledata;
     $this->load->view('admin_requisition_historique_view',$data);
 }

 public function produit(){
  $id_categori=$this->input->post('id');

  $produits=$this->Model->getListOrdered('produit','PRODUIT_DESCR',array('CATEGORIE_ID'=>$id_categori));
$info='<option value="">--choisir--</option>';
  foreach ($produits as $value) {
    $info.='<option value="'.$value['PRODUIT_ID'].'">'.$value['PRODUIT_DESCR'].'</option>';
  }

  echo $info;
 }

      public function cart_requisition(){


        $this->load->library("cart");
      $PRODUIT_ID=$_POST['PRODUIT_ID'];
      $PA=$_POST['PA'];
      $PV=$_POST['PV'];
      $DATE=$_POST['DATE'];
      $NOMBRE=$_POST['NOMBRE'];
      $CODES=$_POST['CODES'];
      $date=date_create($DATE);

      $qr_code=explode("||", $CODES."||.");
      $exist=0;
      if ($CODES=='') {
          $exist=0;
        }else{
      foreach ($qr_code as $key) {
        $check=$this->Model->checkvalue("qr_code_requisition",array("QR_CODE"=>$key));
        if ($check==1) {
          $exist=1;
        }
      } 
      } 
        

if ($exist!=1) {

      $pro=$this->Model->getOne("produit",array("PRODUIT_ID"=>$PRODUIT_ID));
      
     // $this->load->library("cart");
      $product_n=str_replace("'", "", $pro['PRODUIT_DESCR']);
    
      $data_depense=array('id'=>uniqid(),
                'name'=>$product_n,
                'qty'=>$NOMBRE,
                'price'=>$PA,
                'idSociete'=>'',
                'PRODUIT_ID'=>$PRODUIT_ID,
                'NOM_PRODUIT'=>$pro['PRODUIT_DESCR'],
                'PV'=>$PV,
                'CODES'=>$CODES,
                'NOMBRE'=>$NOMBRE,
                'PA'=>$PA,
                'DATE'=>date_format($date,"Y-m-d"),
               
                'soc'=>'SOC');
     $this->cart->insert($data_depense);
      
echo $this->views();
}else echo 'exist';
//$this->cart->destroy();

    }

       public function views(){
       //$this->load->library("cart");
       $output='';
      // $output.='<table class="table table-bordered"><th>#</th><th>Description</th><th>Montant</th><th>action</th>';
      $output.="<table id='mytable' class='table table-head-bg-primary table-bordered display table   table-hover'>
       <thead> <tr><th>PRODUIT</th><th>NOMBRE</th><th>P.A UNITAIRE</th><th>P.V UNITAIRE</th><th>P.A TOTAL</th><th>P.V TOTAL</th><th>PEREMPTION</th><th></th></tr></thead>";

       $count='';
       $i=1;
       $total=0;
       $total1=0;
       foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
          // $point=$this->Model->getOne("point_de_vente",array("ID_POINT"=>$items["POINT"]));
          // $type=$this->Model->getOne("type_marchandise",array("ID_TYPE"=>$items["TYPE"]));
          // $article=$this->Model->getOne("article",array("ID_ARTICLE"=>$items["ARTICLE"]));
         $count++;
         $output.='<div class="container-fluid">
    <tr><td>'.$items["NOM_PRODUIT"].'</td><td>'.$items["NOMBRE"].'</td><td>'.$items["PA"].'</td><td>'.$items["PV"].'</td><td>'.$items["NOMBRE"]*$items["PA"].'</td><td>'.$items["NOMBRE"]*$items["PV"].'</td><td>'.$items["DATE"].'</td>
    
    <td id="" style="display:;">
    <button type="button" name="edit" id="'.$items["rowid"].'"" class="btn btn-danger btn-sm btn_remove_actionremove remove" ><i class="fa fa-trash" style="color:white"></i></button>
    </td>
    </tr>
    
    ';
    $i++;
    $total+=$items["NOMBRE"]*$items["PA"];
    $total1+=$items["NOMBRE"]*$items["PV"];
    

}
       }

       $output.='
   <thead> <tr><th><b>TOTAL</b></th><th></th><th></th><th></th><th><b>'.$total.'</b></th><td><b>'.$total1.'</b></td><th id="ajoutSoc" style="display:;">
    </th>
    </tr></thead>
    <tr><td colspan="7"><button type="button" name="enregistrer" id="enregistrer" class="btn btn-success form-control" >ENREGISTRER</td></tr>
        
    ';

 $output.='</div></table>';
       if($count==0){
        $output='';
       }

       return $output;
    }

    public function delete_requisition(){
      if (!empty($this->session->userdata('USER_TELEPHONE'))) {
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
}

    public function add_cart_requisition(){

    // $max_tr=$this->Model->getRequeteOne("SELECT MAX(TOUR) as t from requisition");
      $i=0;
    foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
         // $point=$this->Model->getOne("point_de_vente",array("ID_POINT"=>$items['POINT']));
$i++;
// echo $i;
         $datas_r=array(
                      "PRODUIT_ID"=>$items['PRODUIT_ID'],
                      "PA_UNITAIRE"=>$items['PA'],
                      "PV_UNITAIRE"=>$items['PV'],
                      "NOMBRE"=>$items['NOMBRE'],
                      "PEREMPRION"=>$items['DATE'],
                      "USER_ID"=>$this->session->userdata('USER_ID')
         );

         $id_re=$this->Model->insert_last_id("requisition",$datas_r);
         $this->Model->update("produit",array("PRODUIT_ID"=>$items['PRODUIT_ID']),array("PRODUIT_PRIX"=>$items['PV']));
         if (!empty($items['CODES'])) {
            $qrCode=explode("||", $items['CODES']);
          $j=0;
          foreach ($qrCode as $key) {

            $chek=$this->Model->checkvalue("qr_code_requisition",array('QR_CODE'=>$key));

            if ($chek!=1) {
              $this->Model->create("qr_code_requisition",array('ID_REQUISITION'=>$id_re,'QR_CODE'=>$key));
              $j++;
            }
            
          }
         }else{
          $this->Model->create("qr_code_requisition",array('ID_REQUISITION'=>$id_re,'QR_CODE'=>''));
         }

         

          // if ($j==0) {
          //   $this->Model->delete("requisition",array('ID_REQUISITION'=>$id_re));
          // }

         
        }
       }

       $msg = "<div class='alert alert-success' style='color:green'>Enregistrement avec avec succès.</div>";

            $donne['msg'] =$msg;
            // $donnees['link']=$link;
            $this->session->set_flashdata($donne);
            // $this->session->set_flashdata($donnees);
            
            redirect(base_url().'Admin/requisition_historique');
  }
  
  public function delete_requisitions($id){
    if (!empty($this->session->userdata('USER_TELEPHONE'))) {

    $this->Model->delete("requisition",array("ID_REQUISITION"=>$id));
    $this->Model->delete("qr_code_requisition",array("ID_REQUISITION"=>$id));

    redirect(base_url().'Admin/requisition_historique');
  }
  }

  public function update_requisition($id){
    if (!empty($this->session->userdata('USER_TELEPHONE'))) {
       $data['breadcrumb'] = ' 
        <a class="btn btn-link btn-md" href="'.base_url().'Admin/requisition" style="margin:2px">Nouvelle réquisition</a>
        <a class="btn btn-link btn-md" href="'.base_url().'Admin/requisition_historique" style="margin:2px">Historique de réquisitions</a>'; 

   $data['message']='';

   $data['req']=$this->Model->getOne("requisition",array("ID_REQUISITION"=>$id));

   $this->load->view('admin_requisition_update_view',$data);
 }
  }

  public function update_requisition1(){
    if (!empty($this->session->userdata('USER_TELEPHONE'))) {
    $this->Model->update("requisition",array("ID_REQUISITION"=>$this->input->post('CATEGORIE_ID_LAST')),array("NOMBRE"=>$this->input->post('NOMBRE'),"PRODUIT_ID"=>$this->input->post('PRODUIT_ID'),"PA_UNITAIRE"=>$this->input->post('PA'),"PV_UNITAIRE"=>$this->input->post('PV'),"PEREMPRION"=>$this->input->post('DATE')));

    $this->Model->update("produit",array("PRODUIT_ID"=>$this->input->post('PRODUIT_ID')),array("PRODUIT_PRIX"=>$this->input->post('PV')));

    $msg = "<div class='alert alert-success' style='color:green'>Modification avec avec succès.</div>";

            $donne['msg'] =$msg;
            // $donnees['link']=$link;
            $this->session->set_flashdata($donne);
            // $this->session->set_flashdata($donnees);
            
            redirect(base_url().'Admin/requisition_historique');
          }
  }


    public function vente_cart(){
              $this->load->library("cart");
      $PRODUIT_ID=$_POST['PRODUIT_ID'];
      $PA=$_POST['PA'];
      $PV=$_POST['PV'];
      $DATE=$_POST['DATE'];
      $NOMBRE=$_POST['NOMBRE'];
      $CODES=$_POST['CODES'];
      $date=date_create($DATE);

      $pro=$this->Model->getOne("produit",array("PRODUIT_ID"=>$PRODUIT_ID));
      
     // $this->load->library("cart");
      $product_n=str_replace("'", "", $pro['PRODUIT_DESCR']);
    
      $data_depense=array('id'=>uniqid(),
                'name'=>$product_n,
                'qty'=>$NOMBRE,
                'price'=>$PA,
                'idSociete'=>'',
                'PRODUIT_ID'=>$PRODUIT_ID,
                'NOM_PRODUIT'=>$pro['PRODUIT_DESCR'],
                'PV'=>$PV,
                'CODES'=>$CODES,
                'NOMBRE'=>$NOMBRE,
                'PA'=>$PA,
                'DATE'=>date_format($date,"Y-m-d"),
               
                'soc'=>'SOC');
     $this->cart->insert($data_depense);
      
echo $this->views();
    }

   public function vente_prix(){
    $qrCode=$this->input->post("qr_code");

    $qr=$this->Model->getOne("qr_code_requisition",array("QR_CODE"=>$qrCode));
    if(empty($qr))$qr['ID_REQUISITION']='';
    $qr1=$this->Model->getOne("requisition",array("ID_REQUISITION"=>$qr['ID_REQUISITION']));
    $vente=$this->Model->getOne("vente",array("QR_CODE"=>$qrCode));

    // $query=$this->Model->getRequeteOne("SELECT * FROM qr_code_requisition qr join requisition r on qr.ID_REQUISITION=r.ID_REQUISITION where QR_CODE=".$qrCode);
if(empty($qr1)){
    $qr1["PA_UNITAIRE"]='';$qr1["PV_UNITAIRE"]='';
}
if(empty($vente)){
    $vente['QR_CODE']='';
}
    echo $qr1["PA_UNITAIRE"]."|".$qr1["PV_UNITAIRE"]."|".$vente['QR_CODE'];
    // print_r($qrCode);
   }
  

 public function vente_point (){

  // $this->cart->destroy();

    $USER_ID=$this->input->post('USER_ID');

    $point1=$this->Model->getRequeteOne("SELECT SUM(PRIX*QUANTITE) as n from vente where CLIENT=".$USER_ID." AND ID_TYPE_REDUCTION=0");
    $point2=$this->Model->getRequeteOne("SELECT SUM(REDUCTION_POINT*QUANTITE) as n from vente where CLIENT=".$USER_ID." AND ID_TYPE_REDUCTION=1");
    echo $point1['n']-$point2['n'];
 }

 public function cart_vente(){

      $this->load->library("cart");
      $QR_CODE=$this->input->post('QR_CODE');
      $PA=$this->input->post('PA');
      $PV=$this->input->post('PV');
      $TYPE_REDUCTION=$this->input->post('TYPE_REDUCTION');
      $NOM_CLIENT=$this->input->post('NOM_CLIENT');
      $TEL_CLIENT=$this->input->post('TEL_CLIENT');
      $USER_ID=$this->input->post('USER_ID');
      $QTY=$this->input->post('qty');
      $PRODUIT_ID1=$this->input->post('PRODUIT_ID1');


      
if (!empty($QTY)) {
  $quantite=$QTY;
}else $quantite=1;

      $qr=$this->Model->getOne("qr_code_requisition",array("QR_CODE"=>$QR_CODE));
      $req=$this->Model->getOne("requisition",array("ID_REQUISITION"=>$qr['ID_REQUISITION']));

      if (!empty($PRODUIT_ID1)) {
        $produit_id=$PRODUIT_ID1;
      }else{
        $produit_id=$req['PRODUIT_ID'];
      }
      $pro=$this->Model->getOne("produit",array("PRODUIT_ID"=>$produit_id));

      $typ_red=$this->Model->getOne('type_reduction',array('ID_TYPE_REDUCTION'=>$TYPE_REDUCTION));

      $resultat_sock=$this->Model->getRequete("SELECT ((SELECT IFNULL(SUM(NOMBRE),0) from requisition where PRODUIT_ID=p.PRODUIT_ID)-(SELECT IFNULL(SUM(QUANTITE),0) from vente where PRODUIT_ID=p.PRODUIT_ID)) as NOMBRE  FROM produit p where PRODUIT_ID=".$produit_id);
      
      $qty_deja=0;
      foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
          if ($items["PRODUIT_ID"]==$pro['PRODUIT_ID']) {
            $qty_deja+=$items["qty"];
          }
          
        }}

        $rest_stock=$resultat_sock[0]['NOMBRE']-$qty_deja-$quantite;

        if ($rest_stock<0) {
          echo 'non';
        }else {
               // $this->load->library("cart");
    
      $data_depense=array('id'=>uniqid(),
                'name'=>$pro['PRODUIT_DESCR'],
                'qty'=>$quantite,
                'price'=>$PV,
                'USER_ID'=>$USER_ID,
                'NOM_CLIENT'=>$NOM_CLIENT,
                'TEL_CLIENT'=>$TEL_CLIENT,
                'NOM_PRODUIT'=>$pro['PRODUIT_DESCR'],
                'PRODUIT_ID'=>$pro['PRODUIT_ID'],
                'idSociete'=>'',
                'TYPE_REDUCTION'=>$typ_red['TYPE_REDUCTION'],
                'ID_TYPE_REDUCTION'=>$TYPE_REDUCTION,
                'PV'=>$PV,
                'PA'=>$PA,
                'QR_CODE'=>$QR_CODE,
                'soc'=>'SOC');

                 $this->cart->insert($data_depense);
                  
            echo $this->views_vente();
            //$this->cart->destroy();
        }


    }

       public function views_vente(){
       //$this->load->library("cart");
       $output='';
      // $output.='<table class="table table-bordered"><th>#</th><th>Description</th><th>Montant</th><th>action</th>';
      $output.="<table id='mytable' class='table table-head-bg-primary table-bordered display table   table-hover'>
       <thead> <tr><th>PRODUIT</th><th>P.A</th><th>P.V</th><th>Qté</th><th>PVT</th><th>TYPE REDUCTION</th><th></th></tr></thead>";

       $count='';
       $i=1;
       $total=0;
       $total1=0;
       $total2=0;
       foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
          // $point=$this->Model->getOne("point_de_vente",array("ID_POINT"=>$items["POINT"]));
          // $type=$this->Model->getOne("type_marchandise",array("ID_TYPE"=>$items["TYPE"]));
          // $article=$this->Model->getOne("article",array("ID_ARTICLE"=>$items["ARTICLE"]));
         $count++;
         $pvt=$items["PV"]*$items["qty"];
         $total2+=$pvt;
         $output.='<div class="container-fluid">
    <tr><td>'.$items["NOM_PRODUIT"].'</td><td>'.$items["PA"].'</td><td>'.$items["PV"].'</td><td>'.$items["qty"].'</td><td>'.$pvt.'</td><td>'.$items["TYPE_REDUCTION"].'</td>
    
    <td id="" style="display:;">
    <button type="button" name="edit" id="'.$items["rowid"].'"" class="btn btn-danger btn-sm btn_remove_actionremove remove" ><i class="fa fa-trash" style="color:white"></i></button>
    </td>
    </tr>
    
    ';
    $i++;
   
    $total+=$items["PV"];
    $total1+=$items["PA"];
    

}
       }

       $output.='
   <thead> <tr><th><b>TOTAL</b></th><th></th><th><b></b></th><th></th><th>'.$total2.'</th><th></th><th id="ajoutSoc" style="display:;">
    </th>
    </tr></thead>
    <tr><td colspan="7"><button type="button" name="enregistrer" id="enregistrer" class="btn btn-success form-control" >ENREGISTRER</td></tr>
        
    ';

 $output.='</div></table>';
       if($count==0){
        $output='';
       }

       return $output;
    }



    public function delete_vente(){
      if (!empty($this->session->userdata('USER_TELEPHONE'))) {
    //$this->load->library("cart");
 $rowid=$_POST['rowid'];
    // $idReunion=$_POST['idReunion'];
    // $idParticipant=$_POST['rowid1'];
    $data= array('rowid' =>$rowid,'qty'=>0 );
    $this->cart->update($data);
// $this->Model->delete('participant', array('idParticipant' =>$idParticipant));
   
    echo $this->views_vente();
 //redirect(base_url().'CrReunion/update/'.$idReunion, 'refresh');
  }
}

  public function add_cart_vente(){
      // $max_tr=$this->Model->getRequeteOne("SELECT MAX(TOUR) as t from requisition");
$i=0;
    // print_r($this->cart->contents()) ;exit();

 
    foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/SOC/", $items['soc'])){
         // $point=$this->Model->getOne("point_de_vente",array("ID_POINT"=>$items['POINT']));
// $user_i=$items['USER_ID'];

if ($i==0) {
  $facture=$this->Model->insert_last_id('facture',array('ID_CLIENT'=>$items['USER_ID']));
}
//   if ($items['USER_ID']==0) {
//     if (!empty($items['NOM_CLIENT']&&!empty($items['TEL_CLIENT'])) {
//       $user_i=$this->Model->insert_last_id('users',array('NOM_USER'=>$items['NOM_CLIENT'],'TELEPHONE'=>$items['TEL_CLIENT']));
//     }
//   }
// }
// $req=$this->Model->getOne('qr_code_requisition',array('QR_CODE'=>$items['name']));
// $req1=$this->Model->getOne('requisition',array('ID_REQUISITION'=>$req['ID_REQUISITION']));
// $pro=$this->Model->getOne('produit',array('PRODUIT_ID'=>$req1['PRODUIT_ID']));

if (empty($items['QR_CODE'])) {
  $nm=$items['name'];
}else $nm=$items['QR_CODE'];

          if ($items['ID_TYPE_REDUCTION']==1) {
            $reduction_point=$items['PV'];
          }else{
            $reduction_point=0;
          }
         $datas_r=array(
                      "QR_CODE"=>$nm,
                      "PRODUIT_ID"=>$items['PRODUIT_ID'],
                      "PRIX"=>$items['PV'],
                      "ID_FACTURE"=>$facture,
                      "REDUCTION_POINT"=>$reduction_point,
                      "ID_TYPE_REDUCTION"=>$items['ID_TYPE_REDUCTION'],
                      "CLIENT"=>$items['USER_ID'],
                      "FAIT_PAR"=>$this->session->userdata('USER_ID'),
                      "QUANTITE"=>$items['qty'],
         );

        $id_vente=$this->Model->insert_last_id("vente",$datas_r);
        $pt=$items['PV']*$items['qty'];
$this->Model->create("achat_points",array("COMMANDE_ID"=>"","VENTE_ID"=>$id_vente,"PRODUIT_ID"=>$items['PRODUIT_ID'],"CLIENT"=>$items['USER_ID'],"PRIX_UNITAIRE"=>$items['PV'],"QUANTITE"=>$items['qty'],"PRIX_TOTAL"=>$pt,"BONUS"=>$items['ID_TYPE_REDUCTION']));
                  
        }
        $i++;
       }

       $msg = "<div class='alert alert-success' style='color:green'>Enregistrement avec avec succès.</div>";

            $donne['msg'] =$msg;
            // $donnees['link']=$link;
            $this->session->set_flashdata($donne);
            // $this->session->set_flashdata($donnees);
            
            redirect(base_url().'Admin/vente_sur_caisse/'.$facture);
  }

  public function vente_historique(){
    $data['breadcrumb'] = ' 
        <a class="btn btn-link btn-md" href="'.base_url().'Admin/vente_sur_caisse" style="margin:2px">Nouvelle vente</a>
        <a class="btn btn-link btn-md" href="'.base_url().'Admin/vente_historique" style="margin:2px">Historique de vente</a>';

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

          $resultat=$this->Model->getRequete("SELECT v.ID_FACTURE,PRODUIT_DESCR,PRIX,REDUCTION_POINT,TYPE_REDUCTION,u.NOM_USER as nom_client,u.TELEPHONE as tel_client,u.USERNAME as username,u1.NOM_USER as nom_user,u1.TELEPHONE as tel_user,v.DATE  from vente v left join facture f on v.ID_FACTURE=f.ID_FACTURE left join users u on v.CLIENT=u.USER_ID  left join users u1 on v.FAIT_PAR=u1.USER_ID left join produit pr on v.PRODUIT_ID=pr.PRODUIT_ID LEFT JOIN type_reduction tp on v.ID_TYPE_REDUCTION=tp.ID_TYPE_REDUCTION  where v.DATE LIKE '%".$dt."%' order by ID_VENTE DESC");
       $tabledata=array();
       $i=1;
      foreach ($resultat as $key)
           {
            $dates=date_create($key['DATE']);

              $point=array();
              $point[]=$i;
              $point[]=$key['PRODUIT_DESCR'];
              $point[]=$key['ID_FACTURE'];
              $point[]=$key['PRIX'];
              $point[]=$key['REDUCTION_POINT'];
              $point[]=$key['TYPE_REDUCTION']; 
              $point[]=$key['nom_client']." (".$key['username']." ".$key['tel_client'].")"; 
              

              $point[]=date_format($dates,"d-m-Y H:i");
              // $point[]="<button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>mprimer</button>";

      $point['OPTIONS'] = '<div class="dropdown ">
                    <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Action
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        ';



      $point['OPTIONS'] .= "<li><a hre='#' data-toggle='modal' 
                                  data-target='#mydelete" . $key['ID_FACTURE'] . "'><font color='red'>Imprimer</font></a></li>";
   

            

       $point['OPTIONS'] .= "   </ul>
                  </div>
                                    <div class='modal fade' id='mydelete" . $key['ID_FACTURE'] . "'>
                                        <div class='modal-dialog'>
                                            <div class='modal-content'>

                                                <div class='modal-body'>
                                                    <h5>Voulez- vous vraiment Imprimer</h5>
                                                </div>

                                               <div class='modal-footer'>
                                                    <a class='btn btn-danger btn-md' href='" . base_url('Admin/imprimer/'. $key['ID_FACTURE']) . "'>Imprimer</a>
                                                    <button class='btn btn-primary btn-md' class='close' data-dismiss='modal'>Quitter</button>
                                                </div>

                                            </div>
                                        </div>
                                    </div></form>";
             
              $point[]=$key['nom_user']."(".$key['tel_user'].")"; 
              

               $tabledata[]=$point; 
               $i++;
                   }

                $template = array(
                    'table_open' => '<table id="d_table" class="table table-bordered table-striped table-hover table-condensed">',
                    'table_close' => '</table>'
                );
                $this->table->set_template($template); 
                $this->table->set_heading(array('#','PRODUIT','No FACTURE','PRIX','POINTS REDUITS','TYPE DE REDUCTION','CLIENT','DATE','FACTURE','FAIT PAR'));

                $data['an']=$annee;
              $data['ms']=$mois;
              $data['dt']=$date;
              $data['titl']="Ventes (". $dt.")";
              $data['annee'] =$this->Model->getRequete("SELECT DISTINCT YEAR(`DATE`) as DATE FROM `vente` WHERE 1 ORDER by `DATE`");
             $data['mois'] =$this->Model->getRequete("SELECT DISTINCT MONTH(`DATE`) as DATE FROM `vente` WHERE 1 ORDER by MONTH(`DATE`)");
             $data['jour'] =$this->Model->getRequete("SELECT DISTINCT DAY(`DATE`) as DATE FROM `vente` WHERE 1 ORDER by DAY(`DATE`)");

                $data['points']=$tabledata;
     $this->load->view('admin_vente_historique_view',$data);
  }

public function imprimer($id){
 $data['message']=$id;
 $data['id']=$id;
 $data['ventes']=$this->Model->getList("vente",array("ID_FACTURE"=>$id));
   $this->load->view('admin_vente_imprimer_view',$data);

}

public function imprimer_facture_commnde($id){
 $data['message']=$id;
 $data['id']=$id;
 $data['commande']=$this->Model->getOne("commande",array("COMMANDE_ID"=>$id));
 $data['pro_commande']=$this->Model->getRequete("SELECT* from commande cm left join produit_commande pcm on cm.COMMANDE_ID=pcm.COMMANDE_ID");
   $this->load->view('admin_imprimer_facture_commnde',$data);

}

  public function stock(){
    $data['message']='';


          $resultat=$this->Model->getRequete("SELECT PRODUIT_DESCR,PRODUIT_UNITE_MESURE, ((SELECT IFNULL(SUM(NOMBRE),0) from requisition where PRODUIT_ID=p.PRODUIT_ID)-(SELECT IFNULL(SUM(QUANTITE),0) from vente where PRODUIT_ID=p.PRODUIT_ID)) as NOMBRE  FROM produit p ORDER BY PRODUIT_DESCR");
       $tabledata=array();
       $i=1;
      foreach ($resultat as $key)
           {
             
              $point=array();
              $point[]=$i;
              $point[]=$key['PRODUIT_DESCR'];
              $point[]=$key['NOMBRE'];
              $point[]=$key['PRODUIT_UNITE_MESURE'];
              
              

               $tabledata[]=$point;
               $i++;
                   }

                $template = array(
                    'table_open' => '<table id="d_table" class="table table-bordered table-striped table-hover table-condensed">',
                    'table_close' => '</table>'
                );
                $this->table->set_template($template); 
                $this->table->set_heading(array('#','PRODUIT','NOMBRE','UNITE'));

             //    $data['an']=$annee;
             //  $data['ms']=$mois;
             //  $data['dt']=$date;
             //  $data['titl']="Ventes (". $dt.")";
             //  $data['annee'] =$this->Model->getRequete("SELECT DISTINCT YEAR(`DATE`) as DATE FROM `vente` WHERE 1 ORDER by `DATE`");
             // $data['mois'] =$this->Model->getRequete("SELECT DISTINCT MONTH(`DATE`) as DATE FROM `vente` WHERE 1 ORDER by MONTH(`DATE`)");
             // $data['jour'] =$this->Model->getRequete("SELECT DISTINCT DAY(`DATE`) as DATE FROM `vente` WHERE 1 ORDER by DAY(`DATE`)");
$data['titl']="Stock du ". date('d-m-Y');
                $data['points']=$tabledata;
     $this->load->view('admin_stock_view',$data);
  }


    public function rapport(){
      $this->cart->destroy();
      $data['error']='';
    $this->load->view('admin_rapport_view',$data);
    }

    public function generer_rapport(){

      $an=$this->input->post('ANNEE');
      $mois=$this->input->post('MOIS');
      $date=$this->input->post('DATE');
      $type=$this->input->post('type');
      $dt=$an.'-'.$mois.'-'.$date;
    
      if ($type=='general') {
        $condition=' AND DATE<"'.$dt.'" ';
      }
      if ($type=='partiel') {
        $condition=' AND DATE like "%'.$dt.'%" ';
      }
      include 'pdfinclude/fpdf/mc_table.php';
      // include 'pdfinclude/fpdf/pdf_config.php';

// $pdf = new PDF_CONFIG('P','mm','A4');
      $pdf = new MC_Table('L', 'mm', 'A4' ); 
      $pdf->addPage();
       
       $pdf->SetFont('Arial','B',12);
       $pdf->Cell(270,10,utf8_decode("RAPPORT"),10,1,'C');
      
       $pdf->SetWidths(array(35,35,35,25,30,25,25,30,45));
       $pdf->SetAligns(array("C","C","C","C","C","C","C","C","C"));
       $pdf->Row(array('Categorie','Nom de produit',utf8_decode('Unité de mesure'),'PA','PV',utf8_decode('Qté Entrée'),utf8_decode('Qté sortie'),utf8_decode('Qté restante'),'observation'));
        $pdf->SetFont('Arial','',11);
$pdf->SetAligns(array("L","L","L","R","R","R","R","R","L"));
       $categorie=$this->Model->getListOrder('categorie','CATEGORIE_DESCR');

       foreach ($categorie as $value) {
         $produit=$this->Model->getListOrdered('produit','PRODUIT_DESCR',array('CATEGORIE_ID'=>$value['CATEGORIE_ID']));
         foreach ($produit as $key) {
           
           $prix_unitaire=$this->Model->getRequeteOne('SELECT IFNULL(PA_UNITAIRE,0) as p FROM requisition WHERE PRODUIT_ID='.$key['PRODUIT_ID'].$condition.' ORDER BY ID_REQUISITION DESC LIMIT 1');
           $prix_V=$this->Model->getRequeteOne('SELECT IFNULL(PV_UNITAIRE,0) as p FROM requisition WHERE PRODUIT_ID='.$key['PRODUIT_ID'].$condition.' ORDER BY ID_REQUISITION DESC LIMIT 1');
           $qt_requi=$this->Model->getRequeteOne('SELECT IFNULL(SUM(NOMBRE),0) as q FROM requisition WHERE PRODUIT_ID='.$key['PRODUIT_ID'].''.$condition);
           $qt_vente=$this->Model->getRequeteOne('SELECT IFNULL(SUM(QUANTITE),0) as n FROM vente WHERE PRODUIT_ID='.$key['PRODUIT_ID'].''.$condition);

           $solde=$this->Model->getRequeteOne('SELECT ((SELECT IFNULL(SUM(NOMBRE),0) from requisition where PRODUIT_ID=p.PRODUIT_ID'.$condition.')-(SELECT IFNULL(SUM(QUANTITE),0) from vente where PRODUIT_ID=p.PRODUIT_ID'.$condition.')) as NOMBRE  FROM produit p where PRODUIT_ID='.$key['PRODUIT_ID']);

           // print_r($solde);

           $pdf->Row(array(utf8_decode($value['CATEGORIE_DESCR']),utf8_decode($key['PRODUIT_DESCR']),$key['PRODUIT_UNITE_MESURE'],$prix_unitaire['p'],$prix_V['p'],$qt_requi['q'],$qt_vente['n'],$solde['NOMBRE'],''));
         }
       }

if ($type=='general') {
  
}else if ($type=='partiel') {

}
       // $pdf->writeHTML('<table ><tr><td>22</td><td>223</td></tr><tr><td>22</td><td>223</td></tr></tabl>');

       // $pdf->Output('fichier_paie.pdf','I');
            $pdf->Output();

    }

    public function consulter_et_exporter($id){
       $article=$this->Model->getList("produit_commande",array("COMMANDE_ID"=>$id));
       $commande=$this->Model->getOne("commande",array("COMMANDE_ID"=>$id));
       $users=$this->Model->getOne("users",array("USER_ID"=>$commande['USER_ID']));


      $data['error']='';

       $table="users";
       $resultat=$article;
       $tabledata=array();
      foreach ($resultat as $key)
           {

             // $output='<table id="d_table" class="table table-bordered table-striped table-hover table-condensed"><tr><th>PRODUIT</th><th>QUANTITE</th><th>P.U</th><th>P.T</th></tr>';
            $art=$this->Model->getOne("produit",array("PRODUIT_ID"=>$key["PRODUIT_ID"]));
        // $output.='<tr><td>'.$art["PRODUIT_DESCR"].'</td><td>'.$v["QUANTITE"].'</td><td>'.$v["PRIX_UNITAIRE"].'</td><td>'.$v["PRIX_TOTAL"].'</td></tr>';
              $point=array();
              $point[]=$art['PRODUIT_DESCR'];
              $point[]=$key['QUANTITE'];
              $point[]=$key['PRIX_UNITAIRE']; 

              $point[]=$key['PRIX_TOTAL'];

              if ($key['BONUS']==1) {
                $bonus="BONUS PRODUIT";
              }else $bonus="";
              $point[]=$bonus;
               $tabledata[]=$point;
                   }

                $template = array(
                    'table_open' => '<table id="d_table" class="table table-bordered table-striped table-hover table-condensed">',
                    'table_close' => '</table>'
                );
                $this->table->set_template($template); 
                $this->table->set_heading(array('PRODUIT','QUANTITE','P.U','P.T','TYPE'));
                $data['points']=$tabledata;
    $data['message']='Commande numero'.$id.' du '.$commande['DATE'].' de '.$users['NOM_USER'].' '.$users['PRENOM_USER'].' '.$users['TELEPHONE'];
     $this->load->view('consulter_et_exporter_view',$data);

    }

    public function supprimer_commande($id){
      if (!empty($this->session->userdata('USER_TELEPHONE'))) {
      $this->Model->delete("commande",array("COMMANDE_ID"=>$id));
      $this->Model->delete("produit_commande",array("COMMANDE_ID"=>$id));
      $this->Model->delete("achat_points",array("COMMANDE_ID"=>$id));
        $msg = "<div class='alert alert-success' style='color:green'>Suppression avec succès.</div>";

            $donne['msg'] =$msg;
            $this->session->set_flashdata($donne);
            // $this->session->set_flashdata($donnees);
            
            redirect(base_url().'Admin/tous_les_commandes');
          }
    }

    public function add_livrer($rowid,$qrcode){
      if (!empty($this->session->userdata('USER_TELEPHONE'))) {
        $proo=$this->Model->getOne("qr_code_requisition",array("QR_CODE"=>$qrcode));
        $prood=$this->Model->getOne("requisition",array("ID_REQUISITION"=>$proo['ID_REQUISITION']));
        $qr=$this->Model->checkvalue("qr_code_requisition",array("QR_CODE"=>$qrcode));
    $vente=$this->Model->checkvalue("vente",array("QR_CODE"=>$qrcode));
    // echo $this->cart->contents()[$rowid]['PRODUIT_ID'];exit();
   // echo  $prood['PRODUIT_ID']; exit();
    // print_r($this->cart->contents());exit();
    if ($qr!=1) {
       $msg = "<div class='alert alert-danger' style='color:green'>Ce produit n'est requisitionné.</div>";

            $donne['msg'] =$msg;
            $this->session->set_flashdata($donne);

            redirect(base_url().'Admin/control_Livrer');
    }else if($vente==1){
       $msg = "<div class='alert alert-danger' style='color:green'>Ce produit est deja vendu.</div>";

            $donne['msg'] =$msg;
            $this->session->set_flashdata($donne);

            redirect(base_url().'Admin/control_Livrer');
    }else if($this->cart->contents()[$rowid]['PRODUIT_ID']!=$prood['PRODUIT_ID']){
       $msg = "<div class='alert alert-danger' style='color:green'>Ce produit n'est pas conforme.</div>";

            $donne['msg'] =$msg;
            $this->session->set_flashdata($donne);

            redirect(base_url().'Admin/control_Livrer');
    }else {
      $i=0;
      foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/VENTE/", $items['soc'])){
          if ($items['CODES']==$qrcode) {
            $i++;
          }
        }
      }

      if ($i==0) {
        $data= array('rowid' =>$rowid,'CODES'=>$qrcode,'PRIX_SCAN'=>$prood['PV_UNITAIRE']);
      $this->cart->update($data);
      $msg = "<div class='alert alert-success' style='color:green'>Ajout avec succès.</div>";

            $donne['msg'] =$msg;
            $this->session->set_flashdata($donne);

            redirect(base_url().'Admin/control_Livrer');
      }else{
        $msg = "<div class='alert alert-danger' style='color:green'>Ce produit est deja scanné.</div>";

            $donne['msg'] =$msg;
            $this->session->set_flashdata($donne);

            redirect(base_url().'Admin/control_Livrer');
      }
      
    }
    }
    }

    public function add_livrer1($rowid,$CONSOMMATION){
      if (!empty($this->session->userdata('USER_TELEPHONE'))) {

      $requi=$this->Model->getRequeteOne("SELECT IFNULL(SUM(NOMBRE),0) as n from requisition where PRODUIT_ID=".$this->cart->contents()[$rowid]['PRODUIT_ID']);
        $vente=$this->Model->getRequeteOne("SELECT IFNULL(SUM(QUANTITE),0) as n from vente where PRODUIT_ID=".$this->cart->contents()[$rowid]['PRODUIT_ID']);

        $qty_cart=0;

        foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/VENTE/", $items['soc'])){
          if($this->cart->contents()[$rowid]['PRODUIT_ID']==$items['PRODUIT_ID'])
        $qty_cart+=$items['qty'];
        }}




        $rest=$requi['n']-$vente['n']-$qty_cart;
 
    if ($rest<0) {
       $msg = "<div class='alert alert-danger' style='color:green'>Ce produit n'est disponible en stock.</div>";

            $donne['msg'] =$msg;
            $this->session->set_flashdata($donne);

            redirect(base_url().'Admin/control_Livrer');
    }else {

           $id=$this->cart->contents()[$rowid]['PRODUIT_ID'];
      $produit=$this->Model->getOne('produit',array("PRODUIT_ID"=>$id));
      $last_price=$this->Model->getRequeteOne('SELECT PA_UNITAIRE from requisition where PRODUIT_ID='.$id.' ORDER BY ID_REQUISITION DESC LIMIT 1');
      $x=1;
          if (empty($last_price)) {
            $msg = "<div class='alert alert-danger' style='color:green'>Ce produit n'est pas encore requisitionné.</div>";

                $donne['msg'] =$msg;
                $this->session->set_flashdata($donne);

                redirect(base_url().'Admin/control_Livrer');
          }else{
            $data= array('rowid' =>$rowid,'CODES'=>'','PRIX_SCAN'=>$produit['PRODUIT_PRIX']);
              $this->cart->update($data);
              $msg = "<div class='alert alert-success' style='color:green'>Ajout avec succès.</div>";

                  $donne['msg'] =$msg;
                  $this->session->set_flashdata($donne);

                  redirect(base_url().'Admin/control_Livrer');

          }


              
      
    }
    }
    }

public function get_id_produit_rowid(){
  $rowid= $this->input->post('rowid');

  echo $this->cart->contents()[$rowid]['PRODUIT_ID'];
  // echo $this->inf();
  
}

public function inf(){
  print_r($this->cart->contents());
}
    public function control_Livrer(){
      $data['error']='';

    $this->load->view('Livrer_view',$data);
    }

    public function enregistrer_cmd(){
      if (!empty($this->session->userdata('USER_TELEPHONE'))) {
      $i=0;
$commande_id='';
foreach ($this->cart->contents() as $key => $items) {
        if(preg_match("/VENTE/", $items['soc'])){
if ($i==0) {
  $facture=$this->Model->insert_last_id('facture',array('ID_CLIENT'=>$items['USER_ID']));
}



if ($items['BONUS']==1) {
  $type_reduction=1;
  $reduction_point=$items['PV'];
}else{
   $type_reduction=0;
   $reduction_point=0;
}
                     $datas_r=array(
                      "QR_CODE"=>$items['CODES'],
                      "PRODUIT_ID"=>$items['PRODUIT_ID'],
                      "PRIX"=>$items['PV'],
                      "ID_FACTURE"=>$facture,
                      "REDUCTION_POINT"=>$reduction_point,
                      "ID_TYPE_REDUCTION"=>$type_reduction,
                      "CLIENT"=>$items['USER_ID'],
                      "FAIT_PAR"=>$this->session->userdata('USER_ID')
         );
 
        $id_vente=$this->Model->insert_last_id("vente",$datas_r);
$commande_id=$items['COMMANDE_ID'];
        }
        $i++;
      }
    $this->Model->update("commande",array("COMMANDE_ID"=>$commande_id),array("STATUT_LIVRAISON"=>"Livré"));
    $msg = "<div class='alert alert-success' style='color:green'>Modification avec succès.</div>";

            $donne['msg'] =$msg;
            $this->session->set_flashdata($donne);
            // $this->session->set_flashdata($donnees);
            
            redirect(base_url().'Admin/imprimer_facture_commnde/'.$commande_id);
          }
    }

    public function prix_subvention(){
      $QR_CODE=$this->input->post('QR_CODE');
      $requi=$this->Model->getRequeteOne('SELECT PRODUIT_ID as n from qr_code_requisition qrr join requisition r on qrr.ID_REQUISITION=r.ID_REQUISITION where QR_CODE="'.$QR_CODE.'"');

      $produit=$this->Model->getOne('produit',array('PRODUIT_ID'=>$requi['n']));
      echo $produit['PRIX_BONUS']."||".$produit['FOR_BONUS'];
      // echo $QR_CODE;
    }
        public function prix_subvention1(){
      $id=$this->input->post('id');
    
      $produit=$this->Model->getOne('produit',array('PRODUIT_ID'=>$id));
      echo $produit['PRIX_BONUS']."||".$produit['FOR_BONUS'];
      // echo $QR_CODE;
    }

    public function produit_unite(){
      $id=$this->input->post('id');
      $produit=$this->Model->getOne('produit',array("PRODUIT_ID"=>$id));

      echo $produit['PRODUIT_UNITE_MESURE'];
    }

    public function produit_price(){
      $id=$this->input->post('id');
      $produit=$this->Model->getOne('produit',array("PRODUIT_ID"=>$id));
      $last_price=$this->Model->getRequeteOne('SELECT PA_UNITAIRE from requisition where PRODUIT_ID='.$id.' ORDER BY ID_REQUISITION DESC LIMIT 1');
      $x=1;
      if (empty($last_price)) {
        $x=0;
      }

      echo $produit['PRODUIT_PRIX']."|".$last_price['PA_UNITAIRE'].'|'.$x;
    }

    public function rendre_vip(){
      $id=$this->input->post('id');
      $vip=$this->input->post('vip');
      $this->Model->update('users',array('USER_ID'=>$id),array("VIP"=>$vip));
      echo "ok";
    }

    private function set_barcode($code)
  {
    // Load library
    $this->load->library('zend');
    // Load in folder Zend
    $this->zend->load('Zend/Barcode');
    // Generate barcode
    // Zend_Barcode::render('code128', 'image', array('text'=>$code), array());
       $file = Zend_Barcode::draw('code128', 'image', array('text' => $code), array());
   // $code = time().$code;
   $store_image = imagepng($file,FCPATH . "barCode/{$code}.png");
  }



  public function SynchonisationOLD(){

      $default = $this->load->database('default', TRUE);
      $remote = $this->load->database('remote', TRUE);

$achat_points=$default->query("SELECT* from achat_points where STATUT_SYNC=0");
$bank=$default->query("SELECT* from bank where STATUT_SYNC=0");
$categorie=$default->query("SELECT* from categorie where STATUT_SYNC=0");
$commande=$default->query("SELECT* from commande where STATUT_SYNC=0");
$facture=$default->query("SELECT* from facture where STATUT_SYNC=0");
$frais_de_retrait=$default->query("SELECT* from frais_de_retrait where STATUT_SYNC=0");
$mobile_money=$default->query("SELECT* from mobile_money where STATUT_SYNC=0");
$mode_de_paiement=$default->query("SELECT* from mode_de_paiement where STATUT_SYNC=0");
$produit=$default->query("SELECT* from produit where STATUT_SYNC=0");
$produit_commande=$default->query("SELECT* from produit_commande where STATUT_SYNC=0");
$profiles_users=$default->query("SELECT* from profiles_users where STATUT_SYNC=0");
$qr_code_requisition=$default->query("SELECT* from qr_code_requisition where STATUT_SYNC=0");
$quartier_de_distribution=$default->query("SELECT* from quartier_de_distribution where STATUT_SYNC=0");
$requisition=$default->query("SELECT* from requisition where STATUT_SYNC=0");
$suggestion=$default->query("SELECT* from suggestion where STATUT_SYNC=0");
$type_reduction=$default->query("SELECT* from type_reduction where STATUT_SYNC=0");
$unite_mesure=$default->query("SELECT* from unite_mesure where STATUT_SYNC=0");
$users=$default->query("SELECT* from users where STATUT_SYNC=0");
$vente=$default->query("SELECT* from vente where STATUT_SYNC=0");

    foreach ($achat_points->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('achat_points', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('achat_points', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('achat_points', array("STATUT_SYNC"=>1));

    }

        foreach ($bank->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('bank', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('bank', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('bank', array("STATUT_SYNC"=>1));

    }
        foreach ($categorie->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('categorie', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('categorie', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('categorie', array("STATUT_SYNC"=>1));

    }
        foreach ($commande->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('commande', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('commande', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('commande', array("STATUT_SYNC"=>1));

    }
        foreach ($facture->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('facture', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('facture', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('facture', array("STATUT_SYNC"=>1));

    }
        foreach ($frais_de_retrait->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('frais_de_retrait', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('frais_de_retrait', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('frais_de_retrait', array("STATUT_SYNC"=>1));

    }
        foreach ($mobile_money->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('mobile_money', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('mobile_money', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('mobile_money', array("STATUT_SYNC"=>1));

    }
        foreach ($mode_de_paiement->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('mode_de_paiement', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('mode_de_paiement', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('mode_de_paiement', array("STATUT_SYNC"=>1));

    }
        foreach ($produit->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('produit', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('produit', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('produit', array("STATUT_SYNC"=>1));

    }
        foreach ($produit_commande->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('produit_commande', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('produit_commande', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('produit_commande', array("STATUT_SYNC"=>1));

    }
        foreach ($profiles_users->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('profiles_users', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('profiles_users', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('profiles_users', array("STATUT_SYNC"=>1));

    }
        foreach ($qr_code_requisition->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('qr_code_requisition', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('qr_code_requisition', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('qr_code_requisition', array("STATUT_SYNC"=>1));

    }
        foreach ($quartier_de_distribution->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('quartier_de_distribution', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('quartier_de_distribution', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('quartier_de_distribution', array("STATUT_SYNC"=>1));

    }
        foreach ($requisition->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('requisition', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('requisition', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('requisition', array("STATUT_SYNC"=>1));

    }
        foreach ($suggestion->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('suggestion', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('suggestion', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('suggestion', array("STATUT_SYNC"=>1));

    }
        foreach ($type_reduction->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('type_reduction', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('type_reduction', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('type_reduction', array("STATUT_SYNC"=>1));

    }
        foreach ($unite_mesure->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('unite_mesure', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('unite_mesure', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('unite_mesure', array("STATUT_SYNC"=>1));

    }
        foreach ($users->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('users', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('users', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('users', array("STATUT_SYNC"=>1));

    }
        foreach ($vente->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $remote->insert('vente', $value);
      $id=$remote->insert_id();
      $remote->where(array($firstKey=>$id));
      $remote->update('vente', array("STATUT_SYNC"=>1));

      $default->where(array($firstKey=>$info[$firstKey]));
      $default->update('vente', array("STATUT_SYNC"=>1));

    }


$achat_points=$remote->query("SELECT* from achat_points where STATUT_SYNC=0");
$bank=$remote->query("SELECT* from bank where STATUT_SYNC=0");
$categorie=$remote->query("SELECT* from categorie where STATUT_SYNC=0");
$commande=$remote->query("SELECT* from commande where STATUT_SYNC=0");
$facture=$remote->query("SELECT* from facture where STATUT_SYNC=0");
$frais_de_retrait=$remote->query("SELECT* from frais_de_retrait where STATUT_SYNC=0");
$mobile_money=$remote->query("SELECT* from mobile_money where STATUT_SYNC=0");
$mode_de_paiement=$remote->query("SELECT* from mode_de_paiement where STATUT_SYNC=0");
$produit=$remote->query("SELECT* from produit where STATUT_SYNC=0");
$produit_commande=$remote->query("SELECT* from produit_commande where STATUT_SYNC=0");
$profiles_users=$remote->query("SELECT* from profiles_users where STATUT_SYNC=0");
$qr_code_requisition=$remote->query("SELECT* from qr_code_requisition where STATUT_SYNC=0");
$quartier_de_distribution=$remote->query("SELECT* from quartier_de_distribution where STATUT_SYNC=0");
$requisition=$remote->query("SELECT* from requisition where STATUT_SYNC=0");
$suggestion=$remote->query("SELECT* from suggestion where STATUT_SYNC=0");
$type_reduction=$remote->query("SELECT* from type_reduction where STATUT_SYNC=0");
$unite_mesure=$remote->query("SELECT* from unite_mesure where STATUT_SYNC=0");
$users=$remote->query("SELECT* from users where STATUT_SYNC=0");
$vente=$remote->query("SELECT* from vente where STATUT_SYNC=0");


    foreach ($achat_points->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('achat_points', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('achat_points', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('achat_points', array("STATUT_SYNC"=>1));

    }

        foreach ($bank->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('bank', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('bank', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('bank', array("STATUT_SYNC"=>1));

    }
        foreach ($categorie->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('categorie', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('categorie', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('categorie', array("STATUT_SYNC"=>1));

    }
        foreach ($commande->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('commande', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('commande', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('commande', array("STATUT_SYNC"=>1));

    }
        foreach ($facture->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('facture', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('facture', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('facture', array("STATUT_SYNC"=>1));

    }
        foreach ($frais_de_retrait->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('frais_de_retrait', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('frais_de_retrait', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('frais_de_retrait', array("STATUT_SYNC"=>1));

    }
        foreach ($mobile_money->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('mobile_money', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('mobile_money', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('mobile_money', array("STATUT_SYNC"=>1));

    }
        foreach ($mode_de_paiement->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('mode_de_paiement', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('mode_de_paiement', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('mode_de_paiement', array("STATUT_SYNC"=>1));

    }
        foreach ($produit->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('produit', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('produit', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('produit', array("STATUT_SYNC"=>1));

    }
        foreach ($produit_commande->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('produit_commande', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('produit_commande', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('produit_commande', array("STATUT_SYNC"=>1));

    }
        foreach ($profiles_users->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('profiles_users', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('profiles_users', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('profiles_users', array("STATUT_SYNC"=>1));

    }
        foreach ($qr_code_requisition->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('qr_code_requisition', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('qr_code_requisition', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('qr_code_requisition', array("STATUT_SYNC"=>1));

    }
        foreach ($quartier_de_distribution->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('quartier_de_distribution', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('quartier_de_distribution', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('quartier_de_distribution', array("STATUT_SYNC"=>1));

    }
        foreach ($requisition->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('requisition', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('requisition', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('requisition', array("STATUT_SYNC"=>1));

    }
        foreach ($suggestion->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('suggestion', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('suggestion', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('suggestion', array("STATUT_SYNC"=>1));

    }
        foreach ($type_reduction->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('type_reduction', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('type_reduction', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('type_reduction', array("STATUT_SYNC"=>1));

    }
        foreach ($unite_mesure->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('unite_mesure', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('unite_mesure', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('unite_mesure', array("STATUT_SYNC"=>1));

    }
        foreach ($users->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('users', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('users', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('users', array("STATUT_SYNC"=>1));

    }
        foreach ($vente->result_array() as $value) {


      $firstKey = key($value);
      $info=$value;
      array_shift($value);
      $default->insert('vente', $value);
      $id=$default->insert_id();
      $default->where(array($firstKey=>$id));
      $default->update('vente', array("STATUT_SYNC"=>1));

      $remote->where(array($firstKey=>$info[$firstKey]));
      $remote->update('vente', array("STATUT_SYNC"=>1));

    }

// print_r($achat_points->result_array());


    $data['message']='';
     $this->load->view('admin_synchronisation_view',$data);

  }
public function Synchonisation(){

      $default = $this->load->database('default', TRUE);
      $remote = $this->load->database('remote', TRUE);
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
$unite_mesure=array("unite_mesure"=>$this->Model->getList("unite_mesure",array("STATUT_SYNC"=>0)));
$users=array("users"=>$this->Model->getList("users",array("STATUT_SYNC"=>0)));
$vente=array("vente"=>$this->Model->getList("vente",array("STATUT_SYNC"=>0)));

$url = "http://www.chezpablomoses.bi/Synchonisation";
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



$postdata = json_encode($data);

$ch = curl_init($url); 
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
$result = curl_exec($ch);
curl_close($ch);

$result_data=json_decode($result, TRUE);



 

 // if (empty($result_data)) {
 //   $result_data=array();
 // }
$lent=sizeof($result_data)-1;


// print_r($result_data[$lent]);
$response=$result_data[$lent];

unset($result_data[$lent]);
                          if(!empty($response)){
                            foreach ($result_data as $val) {
                    

                   foreach ($val as $key=>$val1) {
                    foreach ($val1 as $value) {
                      $firstKey = key($value);
                      $info=$value;

                      $value['STATUT_SYNC']=1;
                      $this->Model->create($key, $value);
                      // array_shift($value);

                      
                      // $id=$this->Model->insert_last_id($key, $value);
                      // $this->Model->update($key,array($firstKey=>$id), array("STATUT_SYNC"=>1));

                      }
                    }
                  }


                                foreach ($data as $val) {
                
                   foreach ($val as $key=>$val1) {
                    foreach ($val1 as $value) {
                      $firstKey = key($value);
                      
                      $this->Model->update($key,array($firstKey=>$value[$firstKey]), array("STATUT_SYNC"=>1));

                      $auto=$value[$firstKey]+20000;
                      $this->Model->getRequeteOne_new("ALTER TABLE ".$key." AUTO_INCREMENT =".$auto);

                      }
                    }
              }

                  }

$data['message']='';
if(!empty($response)){
  if ($response['response']=='ok') 

  $data['message']='<h1 style="color: green; margin-top: 50px;padding-top: 50px">Synchronisation terminée avec succès</h1>';
}else
    $data['message']='<h1 style="color: red; margin-top: 50px;padding-top: 50px">Echec de Synchronisation, verifier la connectivité au serveur</h1>';
     $this->load->view('admin_synchronisation_view',$data);

}

  
}