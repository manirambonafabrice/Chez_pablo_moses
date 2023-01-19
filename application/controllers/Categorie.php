<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorie extends CI_Controller {
    
    public function __construct()
{
	parent::__construct();
	require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
}

	
	public function index($x="")
	{
		$categori=$this->input->post('categorie');
		$produit=$this->input->post('produit');

		// $pro=$this->Model->getRequete("SELECT* FROM produit where CATEGORIE_ID=".$categori." AND PRODUIT_DESCR LIKE '%".$produit."%'");
		$pro=$this->Model->getRequete("SELECT* FROM produit where PRODUIT_DESCR LIKE '%".$produit."%'");
		// print_r($pro);
		$data['error']="";
		$data['resultat']=$pro;
		$data['categorie']=$this->Model->getOne("categorie",array("CATEGORIE_ID"=>$categori));
	
		$this->load->view('search_view',$data);
	}

}