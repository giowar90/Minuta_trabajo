<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function index(){
		$this->load->model('menu_model','mm');
		$this->load->view('login');
	}

}