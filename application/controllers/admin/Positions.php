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
		$data['titulo'] = 'Lista de Cargos';
		$data['view'] 	= 'admin/cargos/listar';
		$data['user_config']= $this->dashboard_model->getUserByPosDept();
		$data['cargos']	= $this->positions_model->getPositions();

		$this->load->view('template/index',$data);
	}

	public function modulo($id_position=NULL){

		$dados = NULL;

		if ($id_position){
			$dados = $this->positions_model->getPositionsID($id_position);
			if ( !$dados ) {
				setMsg('msgCadastro','Cargo não encontrado!','erro');
				redirect('admin/positions','refresh');
			}
			$data['titulo'] = 'Atualizar cadastro';
		}else{
			$data['titulo'] = 'Novo Cadastro';
		}
		$data['dados'] 	= $dados;
		$data['view'] 	= 'admin/cargos/modulo';
		$data['nav']	= array('titulo' => 'Lista de cargos', 'link' => 'admin/positions');
		$data['depts']	= $this->positions_model->getPositions();
		$data['depts2']	= $this->positions_model->getDepartments();


		$this->load->library('form_validation');
		$this->load->view('template/index', $data);
	}

	public function core(){

		$this->form_validation->set_rules('nome', 'Nome','trim|required');

		if ($this->form_validation->run() == TRUE){

			$data['nome'] 			= $this->input->post('position_name');
			$data['cargos'] 		= $this->input->post('cargos');
			$data['ativo']			= $this->input->post('ativo');

			if ($this->input->post('id_department')){

				$data['id_department'] = $this->input->post('id_department');

			}else {

				$data['id_department'] = NULL;

			}

			if ($this->input->post('id_position')){

				$data['dt_update']	= dataNow();
				$id = $this->input->post('id_position');
				$this->positions_model->doUpdate($data, $id);
				redirect('admin/positions','refresh');

			} else {

				$data['dt_inc']		= dataNow();
				$this->positions_model->doInsert($data);
				setMsg('msgCadastro', 'Cargo cadastrado com sucesso!', 'sucesso');
				redirect('admin/positions/modulo','refresh');
			}

		}else{
			$this->modulo();
		}
	}

	public function del ($id_position = NULL){

		if ($id_position){

			if ($this->positions_model->getPosDept($id_position)){
				setMsg('msgCadastro', 'Não é possível apagar esta categoria!'.'<br>'.'Este cargo esta vinculado a um departamento!', 'erro');
				redirect('admin/positions','refresh');
			}

			$this->positions_model->doDelete($id_position);
			redirect('admin/postions','refresh');
		} else {
			setMsg('msgCadastro', 'Necessita selecionar um cargo para a exclusão!', 'erro');
			redirect('admin/postions','refresh');
		}
	}


}
