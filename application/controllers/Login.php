<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct() {
        parent::__construct();

    }

    public function index($params = NULL) {
      // echo $this->session->userdata('COLLABORATEUR_ID');exit();
    
       if (!empty($this->session->userdata('USER_TELEPHONE'))) {

      redirect(base_url('Admin/admin_accueil'));
        } else {

            $datas['message'] = $params;
            $this->load->view('admin_view', $datas);

         }
    }

    public function do_login() {
        $login = $this->input->post('USERNAME');
        $password = $this->input->post('PASSWORD');
        $password=$this->cript(htmlspecialchars($_POST['PASSWORD']),$login);

       // $regex = "(^[a-z]) ([a-z0-9])+ (\.|-)? ([a-z0-9]+) @ ([a-z0-9]{2,}) \. ([a-z]{2,4]$)"; 
        // $email = filter_input(INPUT_POST, 'USERNAME', FILTER_VALIDATE_EMAIL);
        //   if(($email == null)||($email == false))
        //  {
        //   $criteresmail['TELEPHONE']=$login;
        //     // ADRESE mail non vlide 
          
        //  }
        //  else { //ADRESSE  VALIDE ;

          $users=$this->Model->getOne('users',array('USERNAME'=>$login));
          // print_r($users);exit();
          $criteresmail['TELEPHONE']=$users['TELEPHONE'];
         // }
        
        
        $criteresmail['PASSWORD']=$password;
        $user= $this->Model->getOne('users',$criteresmail);

        
        // echo $user['PASSWORD'];exit();
        
        
        if (!empty($user)) {
$criteresprofil['PROFILE_ID']=$user['PROFILE_ID'];
        $profile = $this->Model->getOne('profiles_users',$criteresprofil);
            
            if ($user['PASSWORD'] == $password)

             {
             	//echo $user['CODE_SOCIETE'];

             	$datadroit=$this->Model->getOne(' profiles_users',$criteresprofil);

              //print_r($datadroit);

             	
             	 
	                $session = array(
        	                    'USER_ID' => $user['USER_ID'],
        	                    'USER_TELEPHONE' => $user['TELEPHONE'],

                              'USER_PROFIEL_ID' => $user['PROFILE_ID'],

                              'USER_NAME' => $user['NOM_USER'].' '.$user['PRENOM_USER'],
                              
                              
	                          );
                 $message = "";
	               $this->session->set_userdata($session);
	             // $this->load->view('Message_Success_View');
                  redirect(base_url('Admin/admin_accueil'));
            }

             else{
                $message = "<div class='alert alert-danger'> Le nom d'utilisateur ou/et mot de passe incorect(s) !</div>";
                $datas['message']=$message;
               $this->load->view('admin_view', $datas);
             }
              
        }
         else{
            $message = "<div class='alert alert-danger' style='text-align:center'> L'utilisateur n'existe pas/plus dans notre système informatique !</div>";
            $datas['message']=$message;
               $this->load->view('admin_view', $datas);
         }
      

    }

    public function do_logout(){

		     
		            $session = array(
                              'USER_ID' => NULL,
                              'USER_TELEPHONE' =>NULL,

                              'USER_PROFIEL_ID' => NULL,

                              'USER_NAME' => NULL,
                            );                   

		        $this->session->set_userdata($session);
            $this->session->sess_destroy();
		        redirect(base_url('Admin'));
            
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

}