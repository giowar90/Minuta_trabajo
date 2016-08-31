<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class usuarios_model extends CI_Model {

	public function lista_usuarios(){
		return $this->db->select('*')
						->from('usuarios')
						->get()->result();
	}

	public function get($id_usuario){
		return $this->db->select('*')
						->from('usuarios')
						->where('id_usuario',$id_usuario)
						->get()->result();
	}

}