<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class areas extends CI_Controller {

	public function lista_areas(){
		$this->load->model('menu_model','mm');
		$this->load->model('area_model','am');
		$data['areas'] = $this->am->lista_areas();
		$data['menu'] = $this->mm-> menu();
		$this->load->view('cuerpo/cabecera');
		$this->load->view('cuerpo/menu',$data);
		$this->load->view('areas/lista_areas',$data);
		$this->load->view('cuerpo/pie');
	}

	public function guardar_area(){
		$this->load->model('area_model','am');
		$datos = $this->input->post();
		if ($datos['id_area'] > 0) {
			$id_area = array('id_area' => $datos['id_area']);
			unset($datos['id_area']);
			$result = $this->am->edit_area($datos,$id_area);
			if ($result) {
				echo $result;
			} else{
				echo 0;
			}
		}else{
			$result = $this->am->save_area($datos);
			if ($result) {
				echo $result;
			} else{
				echo 0;
			}
		}
	}

	public function editar_area(){
		$this->load->model('area_model','am');
		$id_area = $this->input->post('id_area');
		$data['area'] = $this->am->get($id_area);
		$this->load->view('areas/editar_area',$data);
	}

}