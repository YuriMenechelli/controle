<?php
defined('BASEPATH')or exit ('No direct script access allowed');

class Positions extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('admin/login');
			setMsg('msgCadastro','sua sessão expirou!','erro');
		}
		$this->load->model('admin/positions_model');
	}


	public function index(){
		$data['titulo'] = 'Cadastro dos Cargos';
		$data['view'] 	= 'admin/cargos/listar';
		$data['cargos']	= $this->positions_model->getPositions();

		$this->load->view('template/index',$data);
	}

}
