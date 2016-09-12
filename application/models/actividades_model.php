<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class actividades_model extends CI_Model {

	public function get_actividades($id_responsable){
		return $this->db->select('*')
						->from('actividades')
						->where('responsable',$id_responsable)
						->get()->result();
	}

	public function estatus_actividad($datos,$id_actividad){
		$this->db->update('actividades',$datos,$id_actividad);
		return $this->db->affected_rows();
	}

}