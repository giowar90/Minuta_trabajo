<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuarios extends CI_Controller {

	public function lista_usuarios(){
		$this->load->model('usuarios_model','us');
		$this->load->model('menu_model','mm');
		$data['usuarios'] = $this->us->lista_usuarios();
		$data['menu'] = $this->mm-> menu();
		$this->load->view('cuerpo/cabecera');
		$this->load->view('cuerpo/menu',$data);
		$this->load->view('usuarios/lista_usuarios',$data);
		$this->load->view('cuerpo/pie');
	}

	public function editar_usuario(){
		$this->load->model('menu_model','mm');
		$this->load->model('usuarios_model','us');
		$id_usuario = $this->input->post('id_usuario');
		$data['usuario'] = $this->us->get($id_usuario);
		print_r($data['usuario']);
		$this->load->view('usuarios/nuevo_usuario',$data);
	}

}