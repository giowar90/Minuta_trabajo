<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('url','form'));
		$this->load->model('menu_model','mm');
		$this->load->model('login_model','lm');
	}

	public function index(){
		if($this->input->post()){
			$email = $this->input->post('email');
			$password = $this->input->post('passowrd');
			$sesion = $this->lm->login($email,$password);
			if($sesion){
				$this->session->set_userdata($sesion[0]);
				redirect(base_url().'inicio/principal');
			} else{
				$this->session->sess_destroy();
				$this->load->view('login');
			}
		} else{
			$this->session->sess_destroy();
			$this->load->view('login');
		}
	}

}