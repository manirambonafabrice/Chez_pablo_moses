<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Taux_de_transfert extends CI_Controller {

	
	public function index($x="")
	{
		$data['error']="";


       $table="frais_de_retrait";
       $resultat=$this->Model->getList($table);
       $tabledata=array();
      foreach ($resultat as $key)
           {
              $point=array();
              $point[]=$key['MAKE'];
              $point[]=$key['MENSHI'];
              $point[]=$key['ECOCASH']; 

              $point[]=$key['LUMICASH'];
              $point[]=$key['SMARTPESA'];
  if ($this->session->userdata('USER_PROFIEL_ID')==1||$this->session->userdata('USER_PROFIEL_ID')==2) {        

      $point['OPTIONS'] = '<div class="dropdown ">
                    <a class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown">Action
                    <span class="caret"></span></a>
                    <ul class="dropdown-menu dropdown-menu-left">
                        ';


        $point['OPTIONS'] .= "<li><a href='" . base_url('Taux_de_transfert/getOne/' . $key['ID']) . "'>Modifier</a></li>";

   

            

       $point['OPTIONS'] .= "   </ul>
                  </div>
                                    ";
                                    }


               $tabledata[]=$point;
                   }

                $template = array(
                    'table_open' => '<table id="d_table" class="table table-bordered table-striped table-hover table-condensed">',
                    'table_close' => '</table>'
                );
                $this->table->set_template($template); 
                if ($this->session->userdata('USER_PROFIEL_ID')==1||$this->session->userdata('USER_PROFIEL_ID')==2) { 
                $this->table->set_heading(array('MINIMUM','MAXIMUM','ECOCASH','LUMICASH','SMART PESA','OPTIONS'));
                  }else $this->table->set_heading(array('MINIMUM','MAXIMUM','ECOCASH','LUMICASH','SMART PESA'));
                $data['points']=$tabledata;
		$data['message']='';
	$this->load->view('Taux_view',$data);
	}

	public function getOne($id){
    $data['message']='';
    $data['info']=$this->Model->getOne('frais_de_retrait',array('ID'=>$id));
	$this->load->view('Taux_update_view',$data);
	}

	public function update($id){

		$this->Model->update("frais_de_retrait",array('ID'=>$id),array("ECOCASH"=>$this->input->post('eco'),"LUMICASH"=>$this->input->post('lumi')));

		 redirect(base_url('Taux_de_transfert/'));
	}
}