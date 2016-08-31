<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class menu_model extends CI_Model {

	public function menu(){
		return $this->db->select()
						->from('menu')
						->get()->result();
	}

}