<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class usuarios extends CI_Controller {

	public function lista_usuarios(){
		$this->load->model('usuarios_model','us');
		$this->load->model('area_model','am');
		$this->load->model('puestos_model','pm');
		$this->load->model('menu_model','mm');
		$data['usuarios'] = $this->us->lista_usuarios();
		$data['areas'] = $this->am->get_areas();
		$data['puestos'] = $this->pm->get_puestos();
		$data['menu'] = $this->mm-> menu();
		$this->load->view('cuerpo/cabecera');
		$this->load->view('cuerpo/menu',$data);
		$this->load->view('usuarios/lista_usuarios',$data);
		$this->load->view('cuerpo/pie');
	}

	public function editar_usuario(){
		$this->load->model('usuarios_model','us');
		$this->load->model('area_model','am');
		$this->load->model('puestos_model','pm');
		$id_usuario = $this->input->post('id_usuario');
		$data['areas'] = $this->am->get_areas();
		$data['puestos'] = $this->pm->get_puestos();
		$data['usuario'] = $this->us->get($id_usuario);
		$this->load->view('usuarios/editar_usuario',$data);
	}

	public function get_puestos(){
		$this->load->model('puestos_model','pm');
		$id_area = $this->input->post('id_area');
		$puestos = $this->pm->puestos($id_area);
		$html = "<select class='form-control' name='puesto' >";
		foreach ($puestos as $p) {
			$html .= "<option value='".$p->id_puestos."'>".$p->nombre."</option>";
		}
		$html .= "</select>";
		echo $html;
	}

	public function guardar_usuario(){
		$this->load->model('usuarios_model','us');
		$datos = $this->input->post();
		if ($datos['id_usuario'] > 0) {
			$id_usuario = array('id_usuario' => $datos['id_usuario']);
			unset($datos['id_usuario']);
			$result = $this->us->edit_usuario($datos,$id_usuario);
			if ($result) {
				echo $result;
			} else{
				echo 0;
			}
		}else{
			$result = $this->us->save_usuario($datos);
			if ($result) {
				echo $result;
			} else{
				echo 0;
			}
		}
	}

	public function borrar_usuario(){
		$this->load->model('usuarios_model','us');
		$id_usuario = $this->input->post('id_usuario');
		$result = $this->us->delete_usuario($id_usuario);
		if ($result) {
			echo $result;
		}else{
			echo 0;
		}
	}

}