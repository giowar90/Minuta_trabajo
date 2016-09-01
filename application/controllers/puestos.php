<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class puestos extends CI_Controller {

	public function lista_puestos(){
		$this->load->model('puestos_model','pm');
		$this->load->model('menu_model','mm');
		$this->load->model('area_model','am');
		$data['puestos'] = $this->pm->lista_puestos();
		$data['areas'] = $this->am->get_areas();
		$data['menu'] = $this->mm-> menu();
		$this->load->view('cuerpo/cabecera');
		$this->load->view('cuerpo/menu',$data);
		$this->load->view('puestos/lista_puestos',$data);
		$this->load->view('cuerpo/pie');
	}

	public function guardar_puesto(){
		$this->load->model('puestos_model','pm');
		$datos = $this->input->post();
		if ($datos['id_puestos'] > 0) {
			$id_puesto = array('id_puestos' => $datos['id_puestos']);
			unset($datos['id_puestos']);
			$result = $this->pm->edit_puesto($datos,$id_puesto);
			if ($result) {
				echo $result;
			} else{
				echo 0;
			}
		}else{
			$result = $this->pm->save_puesto($datos);
			if ($result) {
				echo $result;
			} else{
				echo 0;
			}
		}
	}

	public function editar_puesto(){
		$this->load->model('puestos_model','pm');
		$this->load->model('area_model','am');
		$id_puesto = $this->input->post('id_puesto');
		$data['puesto'] = $this->pm->get($id_puesto);
		$data['areas'] = $this->am->get_areas();
		$this->load->view('puestos/editar_puesto',$data);
	}

}