<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class area_model extends CI_Model {

	public function lista_areas(){
		return $this->db->select('*')
						->from('area')
						->get()->result();
	}

	public function get_areas(){
		return $this->db->select('*')
						->from('area')
						->get()->result();
	}

	public function save_area($datos){
		$this->db->insert('area',$datos);
		return $this->db->insert_id();
	}

	public function edit_area($datos,$id_area){
		$this->db->update('area',$datos,$id_area);
		return $this->db->affected_rows();
	}

	public function get($id_area){
		return $this->db->select('*')
						->from('area')
						->where('id_area',$id_area)
						->get()->result();
	}

}