<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{

// 		$categori=$this->Model->getListOrdered('categorie','CATEGORIE_DESCR');

							
							
// 							$c=json_encode($categori,true);

// 							// echo $c;
// $gen=array();
// 							$array1=array('it1'=>'f','it2'=>'t');
// 							$array2=array('it1'=>'r','it2'=>'h');
// 							$array3=array('it1'=>'s','it2'=>'x');

// array_push($gen,$array1);
// array_push($gen,$array2);
// array_push($gen,$array3);

// $c=json_encode($gen,true);
// print_r($c);

	
		$this->load->view('accueil');
	}
}
