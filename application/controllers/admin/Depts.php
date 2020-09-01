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
		$data['titulo'] = 'Lista de Departamentos';
		$data['view']	= 'admin/departamentos/listar';
		$data['dept']	= $this->dept_model->getDepts();
		$data['user_config']= $this->dashboard_model->getUserByPosDept();

		$this->load->view('template/index', $data);
	}


	public function modulo($id_depts=NULL){
		$dados = NULL;

		if ($id_depts){
			$dados = $this->dept_model->getDeptsID($id_depts);
			if ( !$dados ) {
				setMsg('msgCadastro','Departamento não encontrado!','erro');
				redirect('admin/depts','refresh');
			}
			$data['titulo'] = 'Atualizar cadastro';
		}else{
			$data['titulo'] = 'Novo Cadastro';
		}
		$data['dados'] 	= $dados;
		$data['view'] 	= 'admin/departamentos/modulo';
		$data['nav']	= array('titulo' => 'Lista de departamentos', 'link' => 'admin/depts');
		$data['depts']	= $this->dept_model->getDepts();


		$this->load->library('form_validation');
		$this->load->view('template/index', $data);
	}

	public function core(){
		$this->form_validation->set_rules('depts', 'Departamento','trim|required');

		if ($this->form_validation->run() == TRUE){

			$data['department_name']	= $this->input->post('depts');
			$data['active']				= $this->input->post('ativo');

			if ($this->input->post('id_dept')){

				$data['dt_update']	= dataNow();
				$id = $this->input->post('id_dept');
				$this->dept_model->doUpdate($data, $id);
				redirect('admin/depts','refresh');

			} else {

				$data['dt_inc']		= dataNow();
				$this->dept_model->doInsert($data);
				redirect('admin/depts/modulo','refresh');
			}

		}else{
			$this->modulo();
		}
	}

	public function del($id_dept=NULL){
		if ($id_dept){
			if ($this->dept_model->getDeptPos($id_dept)){
				setMsg('msgCadastro',
					'Não é possível apagar esta categoria!'.'<br>'.'Este departamento esta vinculado a um cargo!',
					'erro');
				redirect('admin/depts','refresh');
			}

			$this->dept_model->doDelete($id_dept);
			redirect('admin/depts','refresh');
		} else {
			setMsg('msgCadastro', 'Necessita selecionar um cargo para a exclusão!', 'erro');
			redirect('admin/depts','refresh');
		}
	}
}
