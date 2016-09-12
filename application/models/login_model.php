<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class login_model extends CI_Model {

	public function login($email,$password){
		return $this->db->select('p.nombre as puesto,u.nombre,u.id_usuario')
						->from('usuarios u')
						->join('puestos p','p.id_puestos = u.puesto')
						->where('email',$email)
						->where('password',$password)
						->get()->result();
	}

}