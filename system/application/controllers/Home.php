<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function index()
	{
		$dato = 0;
		$c = 0;
		foreach ($_COOKIE as $key => $value) {
        	$explota = explode('_', $key);
			if($explota[0]=='wordpress' && $explota[1]=='logged' && $explota[2]=='in'){
				$c=1;
				$dato = $value;
			}
		}
	
		$value = explode('|', $dato);
		$usuarioIntranet = $value[0];

		/*TEMP*/
		$c = 1;
		$usuarioIntranet = 'nuevo_usuario';

		/**get lives**/
			$vidas = array();
			$vidasU = 0;
			$q= $this
	            ->db
	            ->select('*')
	            ->from('quiz')
	            ->where('usuario', 'nuevo_usuario')
	            ->get();

	        $vidas = count($q->result_array());
	        $data['vidasU'] = 5 - $vidas;

		if($c==0){
			echo '<h1 style="font-size:30px; font-weight:bold;text-align:center;font-family:sans-serif; color: #2F414B;">PARA PODER PARTICIPAR NECESITAS ACCEDER CON TUS DATOS DE ACCESO EN LA INTRANET.</h1>';
		}else{
			$data['usuario'] = $usuarioIntranet;
			$this->load->view('home_view', $data);
		}
	}
}
