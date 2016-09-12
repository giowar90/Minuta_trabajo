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
				switch ($this->session->userdata('puesto')) {
					case '':
						$this->load->view('login',$data);
					break;
					case 'Administrador':
						redirect(base_url().'inicio/principal');
					break;
					case 'Vendedor':
						redirect(base_url().'inicio/principal');
						// redirect(base_url().'editor');
					break;
					case 'suscriptor':
						redirect(base_url().'suscriptor');
					break;
					default:
						$this->load->view('login',$data);
				}
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