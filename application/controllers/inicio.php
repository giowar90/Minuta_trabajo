<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inicio extends CI_Controller {

	public function principal(){
		$this->load->model('menu_model','mm');
		$data['menu'] = $this->mm-> menu();
		$this->load->view('cuerpo/cabecera');
		$this->load->view('cuerpo/menu',$data);
		$this->load->view('inicio');
		$this->load->view('cuerpo/pie');
	}

}