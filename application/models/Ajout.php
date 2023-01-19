<?php
class Ajout extends CI_Model{
	public function index($array){
		$yes=$this->db->insert('utilisateur',$array);
		$succes="succes";
		$echec="echec";
		if ($yes) {
			return $succes;
		}else return $echec;

	}
	public function delete($id){
		$result=$this->db->where('id',$id)->delete('utilisateur');

		if ($result) {
			return TRUE;
		}

	}
}