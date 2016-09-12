<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class minutas extends CI_Controller {

	public function nueva_minuta(){
		$this->load->model('menu_model','mm');
		$this->load->model('usuarios_model','um');
		$data['menu'] = $this->mm-> menu();
		$data['participantes'] = $this->um->lista_usuarios();
		$this->load->view('cuerpo/cabecera');
		$this->load->view('cuerpo/menu',$data);
		$this->load->view('minutas/nueva_minuta');
		$this->load->view('cuerpo/pie');
	}

	public function usuario(){
		$this->load->model('usuarios_model','um');
		$id_usuario = $this->input->post('id_usuario');
		$usuario = $this->um->get($id_usuario)[0];
		header('content-type:application/json;charset=utf8');
		echo json_encode($usuario);
	}

	public function guardar_minuta(){
		$this->load->model('minutas_model','mm');
		if ($this->input->post()) {
			$minuta = array(
				'fecha' => $this->input->post('fecha'),
				'tema' => $this->input->post('tema'),
				'resumen' => $this->input->post('resumen'),
				'fecha_proxima' => $this->input->post('fecha_proxima')
			);
			$id_minuta = $this->mm->save_minuta($minuta);
			$tema = $this->input->post('temas');
			$descripcion = $this->input->post('descripcion');
			$responsable = $this->input->post('responsable');
			$fecha_cierre = $this->input->post('fecha_cierre');
			foreach ($responsable as $k => $r) {
				$asistente = array(
					'id_usuario' => $r,
					'id_minuta' => $id_minuta
				);
				$id_asitente = $this->mm->save_asitente($asistente);
				$actividad = array(
					'tema' => $tema[$k],
					'descripcion' => $descripcion[$k],
					'id_minuta' => 1,
					'responsable' => $r,
					'fecha_cierre' => $fecha_cierre[$k],
				);
				$id_actividad = $this->mm->save_actividad($actividad);
			}
			if($id_minuta && $id_asitente && $id_actividad){
				echo 1;
			}else{
				echo 0;
			}
		}
	}

	public function lista_minutas(){
		$this->load->model('menu_model','mm');
		$this->load->model('minutas_model','mim');
		$data['menu'] = $this->mm-> menu();
		$data['minutas'] = $this->mim->lista_minutas();
		$this->load->view('cuerpo/cabecera');
		$this->load->view('cuerpo/menu',$data);
		$this->load->view('minutas/lista_minutas');
		$this->load->view('cuerpo/pie');
	}

	public function ver_minuta($id_minutas){
		$this->load->model('menu_model','mm');
		$this->load->model('minutas_model','mim');
		$data['menu'] = $this->mm-> menu();
		$data['minuta'] = $this->mim->minuta_detalles($id_minutas);
		$data['asistentes'] = $this->mim->actividades($id_minutas);
		$this->load->view('cuerpo/cabecera');
		$this->load->view('cuerpo/menu',$data);
		$this->load->view('minutas/ver_minuta');
		$this->load->view('cuerpo/pie');
	}

	public function minutas_actividades(){
		$this->load->model('menu_model','mm');
		$this->load->model('actividades_model','acm');
		$data['menu'] = $this->mm-> menu();
		$id_responsable = $this->session->userdata("id_usuario");
		$data['actividades'] = $this->acm->get_actividades($id_responsable);
		$this->load->model('menu_model','mm');
		$this->load->view('cuerpo/cabecera');
		$this->load->view('cuerpo/menu',$data);
		$this->load->view('minutas/actividades',$data);
		$this->load->view('cuerpo/pie');
	}

	public function terminar_actividad(){
		$this->load->model('actividades_model','acm');
		$id_actividad = array('id_actividades' => $this->input->post('actividad') );
		$datos = array('estatus' => 2);
		$response = $this->acm->estatus_actividad($datos,$id_actividad);
		if($response){
			echo $response;
		} else{
			echo "0";
		}
	}

}