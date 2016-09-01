<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class puestos_model extends CI_Model {

	public function lista_puestos(){
		return $this->db->select('p.*,a.nombre as area')
						->from('puestos p')
						->join('area a','a.id_area = p.id_area')
						->get()->result();
	}

	public function save_puesto($datos){
		$this->db->insert('puestos',$datos);
		return $this->db->insert_id();
	}

	public function edit_puesto($datos,$id_puesto){
		$this->db->update('puestos',$datos,$id_puesto);
		return $this->db->affected_rows();
	}

	public function get_puestos(){
		return $this->db->select('*')
						->from('puestos')
						->get()->result();
	}

	public function get($id_puesto){
		return $this->db->select('*')
						->from('puestos')
						->where('id_puestos',$id_puesto)
						->get()->result();
	}

	public function puestos($id_area){
		return $this->db->select('*')
						->from('puestos')
						->where('id_area',$id_area)
						->get()->result();
	}

}