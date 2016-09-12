<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class inicio extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->model('menu_model','mm');
		$this->load->model('login_model','lm');
	}

	public function principal(){
		$data['menu'] = $this->mm-> menu();
		$this->load->view('cuerpo/cabecera');
		$this->load->view('cuerpo/menu',$data);
		$this->load->view('inicio');
		$this->load->view('cuerpo/pie');
	}

	public function check(){
		$email = $this->input->post('email');
		$password = $this->input->post('password');
		$result = $this->lm->login($email,$password);
		if($result){
			redirect('inicio/principal');
		} else{
			echo 0;
		}
	}

}