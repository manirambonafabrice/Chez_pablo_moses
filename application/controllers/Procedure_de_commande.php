<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Procedure_de_commande extends CI_Controller {

	
	public function index()
	{
	
		$this->load->view('procedure_de_commande_view');
	}
}