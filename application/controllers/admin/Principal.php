<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Principal extends CI_Controller {

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('admin/login');
			setMsg('msgCadastro','sua sessão expirou!','erro');
		}
		$this->load->model('admin/dashboard_model');
	}


	public function index(){

		$data['titulo'] 		= 'Menu Principal';
		$data['view'] 			= 'admin/principal/dashboard';
		$data['users_dash'] 	= $this->ion_auth->users()->result();
		$data['t_users']		= $this->dashboard_model->getTotal('users');
		$data['t_positions']	= $this->dashboard_model->getTotal('positions');
		$data['user_config'] 	= $this->dashboard_model->getUserByPosDept();
		$data['dept_config'] 	= $this->dashboard_model->getPosDept();

		$this->load->view('template/index',$data);
	}
}
