<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {

	public function check()
	{
		$usuario = $_POST['usuario'];
		$modelo = $this->crud_model->check($usuario);
		if(empty($modelo)){
			$usuario = 0;
		}else{
			$usuario = $modelo[0]['id_usuarios'];
		}

		echo $usuario . '|' . $modelo[0]['nombre_usuarios'];
	}

	public function iniciarjuego(){
		$usuario = $_POST['user'];
		/**insert data**/
		$datos = array(
			'usuario'	=>	$usuario,
			'punteo'	=>	0
		);

		$agregar = $this->crud_model->agregar('quiz', $datos);
		$data['lastId'] = $this->db->insert_id();
		$data['preguntas'] = $this->crud_model->preguntas();
		echo $this->load->view('preguntas', $data, true);
	}

	public function calificar(){
		$idp = $_POST['idp'];
		$punteo = $_POST['punteo'];
		$this->db->where('id_quiz', $idp);
        $this->db->update('quiz', array('punteo' => $punteo));
	}

	public function rank(){
		$data['rank'] = $this->crud_model->ranking();
		echo $this->load->view('rank', $data, true);
	}
}