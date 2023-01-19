<?php 
class Connexion extends CI_Model{
	
	public function connect($username,$pwd){
		$this->load->database();
		$array = array('username' => $username, 'pwd' => $pwd);
		$rlt=$this->db->where($array)
		               ->get('utilisateur');
		if ($rlt->num_rows()==0) {
			return FALSE;
		}else
return TRUE;
	}

	public function getList($table)
	{
		
		$query = $this->db->get($table);

		if($query){
           return $query->result_array();
		}
	} 
}