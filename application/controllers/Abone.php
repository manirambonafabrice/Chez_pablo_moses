<?php
// defined('BASEPATH') OR exit('No direct script access allowed');

class Abone extends CI_Controller {

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
	public function nouveau(){
		$data['error']="";
		$this->load->view('Abone_nouveau_view');
	}
	public function msg(){
		$data['error']="";
		$this->load->view('Abone_msg_view');
	}

	public function mot_de_passe_oublier(){
		$this->load->view('mot_de_passe_oublier_view');
	}

public function add_client(){
// $this->form_validation->set_rules('NOM','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
//          $this->form_validation->set_rules('PRENOM','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));

          $this->form_validation->set_rules('TELEPHONE', '', 'required|is_unique[users.TELEPHONE]',array("is_unique"=>"<font color='red'>ce numero existe deja</font>","required"=>"<font color='red'>ce champs est obligatoire</font>"));
           $this->form_validation->set_rules('USERNAME', '', 'required|is_unique[users.USERNAME]',array("is_unique"=>"<font color='red'>cette username existe deja</font>","required"=>"<font color='red'>ce champs est obligatoire</font>"));

         // $this->form_validation->set_rules('EMAIL','', 'required|is_unique[users.EMAIL]|valid_email',array("is_unique"=>"<font color='red'>ce email existe deja</font>",'required'=>'<font style="color:red;size:2px;">ce champs est obligatoiree</font>',"valid_email"=>"<font color='red'>ce email n'est pas valide</font>"));

          // $this->form_validation->set_rules('AGE','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
           // $this->form_validation->set_rules('PROFILE_ID','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
            // $this->form_validation->set_rules('SEXE_ID','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
           $this->form_validation->set_rules('PWD','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));

      

      if ($this->form_validation->run() == FALSE)
                {

     $data['professions']=$this->Model->getListOrder('profiles_users','DESCRIPTION_PROFILE');

          $this->load->view('Abone_nouveau_view',$data);

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
            'PROFILE_ID' => 3,
           
             );
        $id=$this->Model->insert_last_id('users',$data1);

        $session = array(
                              'CLIENT_ID' => $id,
                              'CLIENT_TELEPHONE' =>$this->input->post('TELEPHONE'),
                              'CLIENT_NOM' =>$this->input->post('NOM'),
                              'CLIENT_PRENOM' =>$this->input->post('PRENOM'),
                              'CLIENT_PROFIEL_ID' => 3,
                              'CLIENT_USERNAME' =>$this->input->post('USERNAME'),
                              'CLIENT_EMAIL' => $this->input->post('EMAIL'),
                            );  
        $this->session->set_userdata($session);

        
          $data['message']='<div class="alert alert-success text-center">'."Enregistrement faite avec succès".'</div>';
     $this->session->set_flashdata($data);
     redirect(base_url('Commande/passer_commande'));

          }
          
}

public function deconexion(){
  $this->session->sess_destroy();
  $this->cart->destroy();
  redirect(base_url());
}

public function do_login(){
  $this->cart->destroy();

  $pwd=$this->cript($this->input->post('PASSWORD'),$this->input->post('USERNAME'));

  $check=$this->Model->getRequeteOne("SELECT* FROM users where (TELEPHONE='".$this->input->post('USERNAME')."' AND PASSWORD='".$pwd."' AND PROFILE_ID=3) OR (EMAIL='".$this->input->post('USERNAME')."' AND PASSWORD='".$pwd."' AND PROFILE_ID=3) OR (USERNAME='".$this->input->post('USERNAME')."' AND PASSWORD='".$pwd."' AND PROFILE_ID=3)");

  if($check){

            $session = array(
                              'CLIENT_ID' => $check['USER_ID'],
                              'CLIENT_TELEPHONE' =>$check['TELEPHONE'],
                              'CLIENT_NOM' =>$check['NOM_USER'],
                              'CLIENT_PRENOM' =>$check['PRENOM_USER'],
                              'CLIENT_PROFIEL_ID' => 3,
                              'CLIENT_USERNAME' =>$check['USERNAME'],
                              'CLIENT_EMAIL' => $check['EMAIL'],
                              'CLIENT_VIP' => $check['VIP'],
                            );  
        $this->session->set_userdata($session);
        if($this->session->flashdata('redirect_url'))
          {
             $url = $this->session->flashdata('redirect_url');
             //redirect($url);
             redirect(base_url('Commande/passer_commande'));
          }else
       redirect(base_url('Commande/passer_commande'));
         //redirect(base_url($this->input->post('uri')));

  }else{

 $data['message']='Echec! notre système ne connait pas cette identification';
     $this->session->set_flashdata($data);
      //redirect(base_url('Commande/passer_commande'));
     redirect(base_url($this->input->post('uri')));
  }

  }

      public function recuperation_pwd(){
    $chek=$this->Model->getOne('users',array('TELEPHONE'=>$this->input->post('tel')));

    if(!empty($chek)){
      // $info=$this->Model->getOne('utilisateur',array('USERNAME'=>$this->input->post('username')));

      // if(strtolower($this->input->post('nom'))==strtolower($info['NOM'])&&strtolower($this->input->post('prenom'))==strtolower($info['PRENOM'])){




$mail = $chek['EMAIL']; // Déclaration de l'adresse de destination.
$pwd=$this->cript($chek['PASSWORD'],$chek['USERNAME']);
$message="Votre mot de passe est <b>".$pwd."</b>";

// echo $pwd;exit();

   $this->email_controller->send_mail($mail,'Récuperation du mot de passe',array(),$message,array());

$data['message']='<div class="alert alert-success text-center">votre mot de passe a été envoyé sur votre compte email, veuillez consulter votre boite pour le récuperer, Si vous ne le trouvez pas, contacter Chez Pablo Moses</div>';

  
      // }else{
      // $data['message']='<div class="alert alert-danger text-center">Echec! ces informations ne correspondent pas à ce nom d\'utilisateur</div>';
      // }

    }else{
      $data['message']='<div class="alert alert-danger text-center">Echec! ce nom numero de Téléphone n\'existe pas</div>';
    
    }
    $this->session->set_flashdata($data);
  redirect(base_url('Abone/mot_de_passe_oublier'));

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

  public function change($id=''){
    $data['message']='';
      $data['user']=$this->Model->getOne("users",array('USER_ID'=>$id));
        $data['professions']=$this->Model->getListOrder('profiles_users','DESCRIPTION_PROFILE');

     $this->load->view('abone_update_view',$data);
  }

      public function update($id){
        if (!empty($this->session->userdata('CLIENT_ID'))) {
       $this->form_validation->set_rules('NOM','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
         $this->form_validation->set_rules('PRENOM','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));

          $this->form_validation->set_rules('TELEPHONE', '', 'required',array("required"=>"<font color='red'>ce champs est obligatoire</font>"));
           $this->form_validation->set_rules('USERNAME', '', 'required',array("required"=>"<font color='red'>ce champs est obligatoire</font>"));

         $this->form_validation->set_rules('EMAIL','', 'required|valid_email',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoiree</font>',"valid_email"=>"<font color='red'>ce email n'est pas valide</font>"));

          // $this->form_validation->set_rules('AGE','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
           // $this->form_validation->set_rules('PROFILE_ID','', 'required',array('required'=>'<font style="color:red;size:2px;">ce champs est obligatoire</font>'));
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
            'PASSWORD' => $this->cript($this->input->post('PWD'),$this->input->post('USERNAME'))
           
             );
        $this->Model->update('users',array("USER_ID"=>$id),$data1);
          $data['message']='<div class="alert alert-success text-center">'."Enregistrement faite avec succès".'</div>';
     $this->session->set_flashdata($data);
     if ($this->session->userdata('CLIENT_ID')==$id) 
      {
        $data['messages']='<div class="alert alert-success text-center">'."Modification avec succès, veuillez vous ré-authentifier".'</div>';
         $this->session->set_flashdata($data);

         redirect(base_url('Abone/deconexion'));
       }else{
     redirect(base_url('Abone/deconexion'));
       }

    }
  }
  }
}