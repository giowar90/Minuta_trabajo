<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class minutas_model extends CI_Model {

	public function save_minuta($minuta){
		$this->db->insert('minutas',$minuta);
		return $this->db->insert_id();
	}

	public function save_actividad($actividad){
		$this->db->insert('actividades',$actividad);
		return $this->db->insert_id();
	}

	public function save_asitente($asistente){
		$this->db->insert('asistentes',$asistente);
		return $this->db->insert_id();
	}

	public function lista_minutas(){
		return $this->db->select('*')
						->from('minutas')
						->get()->result();
	}

}