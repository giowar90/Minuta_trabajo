<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class menu_model extends CI_Model {

	public function menu($id_puesto){
		return $this->db->select('m.*')
						->from('menu m')
						->join('menu_areas ma','ma.id_menu = m.id_menu')
						->where('ma.id_puesto',$id_puesto)
						->get()->result();
	}

}