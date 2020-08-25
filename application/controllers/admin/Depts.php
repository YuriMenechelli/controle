<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Depts extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()){
			redirect('admin/login');
			setMsg('msgCadastro','sua sessão expirou!','erro');
		}
		$this->load->model('admin/dept_model');
	}

	public function index(){
		$data['titulo'] = 'Cadastro de Departamentos';
		$data['view']	= 'admin/departamentos/listar';
		$data['dept']	= $this->dept_model->getDepts();

		$this->load->view('template/index', $data);
	}

}
