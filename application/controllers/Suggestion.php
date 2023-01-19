<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Suggestion extends CI_Controller {

public function __construct() {
        parent::__construct();

        // $this->make_bread->add('Projets', "assurance/Assurance_Vehucule", 0);
        // $this->breadcrumb = $this->make_bread->output();
        // if (empty($this->session->userdata('USER_TELEPHONE'))) {
        // redirect(base_url('Login'));
        // }
    }
	
	public function index()
	{
        $this->Model->create("suggestion",array("SUGGESTION_DESCR"=>$_POST['suggestion']));
           $data['message']='<div class="alert alert-success text-center">'."Suggestion envoyée avec succès".'</div>';
     $this->session->set_flashdata($data);
     redirect(base_url('Abone/msg/'));

    }
}
?>