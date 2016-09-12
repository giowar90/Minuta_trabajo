<?php 
if (!defined('BASEPATH')) exit('No direct script access allowed');

class minutas_model extends CI_Model {

	public function save_minuta($minuta){
		$this->db->insert('minutas',$minuta);
		return $this->db->insert_id();
	}

	public function save_actividad($actividad){
		$this->db->insert('actividades',$actividad);
		return $this->db->insert_id();
	}

	public function save_asitente($asistente){
		$this->db->insert('asistentes',$asistente);
		return $this->db->insert_id();
	}

	public function lista_minutas(){
		return $this->db->select('*')
						->from('minutas')
						->get()->result();
	}

	public function minuta_detalles($id_minutas){
		return $this->db->select('*')
						->from('minutas')
						->where('id_minutas',$id_minutas)
						->get()->result();
	}

	public function actividades($id_minutas){
		$usuarios = $this->db->select('*')
							->from('asistentes a')
							->join('usuarios u','u.id_usuario = a.id_usuario')
							->where('id_minuta',$id_minutas)
							->get()->result();

		foreach ($usuarios as $k => $us) {
			$actividades = $this->db->select('*')
									->from('actividades')
									->where('responsable',$us->id_usuario)
									->get()->result();
			$contador = 0; $hechas = 0; $hechas_no = 0;
			if($actividades){
				foreach ($actividades as $i => $a) {
					$contador += 1;
					if ($a->estatus == 2) {
						$hechas += 1;
					} else{
						$hechas_no += 1;
					}
					$usuarios[$k]->acti[$i] = $actividades[$i];
				}
				$usuarios[$k]->actividades_total = $contador;
				$usuarios[$k]->hechas = $hechas;
				$usuarios[$k]->no_hechas = $hechas_no;
			}else{
				$usuarios[$k]->actividades_total = 0;
				$usuarios[$k]->hechas = 0;
				$usuarios[$k]->no_hechas = 0;
				$usuarios[$k]->acti = "";
			}
		}
		return $usuarios;
	}

}