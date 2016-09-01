<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class usuarios_model extends CI_Model {

	public function lista_usuarios(){
		return $this->db->select('u.*,a.nombre as area, p.nombre as puesto')
						->from('usuarios u')
						->join('puestos p','p.id_puestos = u.puesto')
						->join('area a','a.id_area = u.area')
						->get()->result();
	}

	public function get($id_usuario){
		return $this->db->select('*')
						->from('usuarios')
						->where('id_usuario',$id_usuario)
						->get()->result();
	}

	public function save_usuario($datos){
		$this->db->insert('usuarios',$datos);
		return $this->db->insert_id();
	}

	public function edit_usuario($datos,$id_usuario){
		$this->db->update('usuarios',$datos,$id_usuario);
		return $this->db->affected_rows();
	}

	public function delete_usuario($id_usuario){
		$this->db->where('id_usuario',$id_usuario);
		$this->db->delete('usuarios');
		return $this->db->affected_rows();
	}

}