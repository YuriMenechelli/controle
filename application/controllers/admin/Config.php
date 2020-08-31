<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Config extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('admin/login');
			setMsg('msgCadastro','sua sessão expirou!','erro');
		}
	}


	public function index(){

		$data['titulo'] 	= 'Sobre o Sistema';
		$data['view'] 		= 'admin/config/sobre';

		$this->load->view('template/index',$data);
	}
}
