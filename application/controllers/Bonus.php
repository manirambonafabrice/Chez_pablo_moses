<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bonus extends CI_Controller {
public function __construct()
{
	parent::__construct();
	require_once APPPATH.'third_party/src/Google_Client.php';
	require_once APPPATH.'third_party/src/contrib/Google_Oauth2Service.php';
}
	
	public function index($x="")
	{ 
		
	$data['error']="";
	$pro=$this->Model->getRequete("SELECT* FROM produit where FOR_BONUS=1 order by PRODUIT_DESCR");
	$pro1=$this->Model->getRequete("SELECT* FROM produit order by PRODUIT_DESCR");

	
		// print_r($pro);
		$data['error']="";
		$data['resultat']=$pro;
		$data['resultat1']=$pro1;
		
		$this->load->view('Bonus_view',$data);
	}

	public function change(){
		// print_r($this->input->post('bonus'));
		$this->Model->update('produit',array('FOR_BONUS'=>1),array('FOR_BONUS'=>0));
		foreach ($this->input->post('bonus') as $selectedOption)
    {
$this->Model->update('produit',array('PRODUIT_ID'=>$selectedOption),array('FOR_BONUS'=>1));
    }

    redirect(base_url('Bonus/'));
	}

		public function enregistrer(){

$produit=$this->input->post('produit');
$prix=$this->input->post('prix');
$this->Model->update('produit',array('PRODUIT_ID'=>$produit),array('PRIX_BONUS'=>$prix,'FOR_BONUS'=>1));
    redirect(base_url('Bonus/'));
	}

	public function Modification(){
		$produit=$this->input->post('id_pr');
$prix=$this->input->post('prix');
$this->Model->update('produit',array('PRODUIT_ID'=>$produit),array('PRIX_BONUS'=>$prix,'FOR_BONUS'=>1));
    redirect(base_url('Bonus/'));
	}
 public function delete($id){
$this->Model->update('produit',array('PRODUIT_ID'=>$id),array('PRIX_BONUS'=>0,'FOR_BONUS'=>0));
    redirect(base_url('Bonus/'));
 }
}