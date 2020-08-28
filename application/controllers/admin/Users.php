<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{

	public function __construct(){
		parent::__construct();
		if (!$this->ion_auth->logged_in()) {
			redirect('admin/login');
			setMsg('msgCadastro','sua sessão expirou!','erro');
		}
		$this->load->model('admin/users_model');
	}

	public function index(){
		$data['titulo'] = 'Lista de Usuários';
		$data['view'] = 'admin/usuarios/listar';
		$data['users'] = $this->users_model->getUsers();
		$data['user_config']= $this->dashboard_model->getUserByPosDept();


		$this->load->view('template/index', $data);
	}

	public function modulo($id=NULL){

		$dados = NULL;
		$cargos = NULL;
		$position = NULL;

		if ($id){
			$dados = $this->ion_auth->user($id)->row();
			if ( !$dados ) {

				setMsg('msgCadastro','Usuário não encontrado!','erro');
				redirect('admin/users','refresh');

			}
			$data['titulo'] = 'Atualizar cadastro';
		}else{
			$data['titulo'] = 'Novo Cadastro';
		}

		if ($id){
			$cargos = $this->users_model->getPositionsByUsers();
		}

		if ($id){
			$position = $this->users_model->getPositionsOnly();
		}
		$data['dados'] 	= $dados;
		$data['cargo']	= $cargos;
		$data['position']= $position;
		$data['view'] 	= 'admin/usuarios/modulo';
		$data['nav']	= array('titulo' => 'Lista de usuários', 'link' => 'admin/users');


		$this->load->library('form_validation');
		$this->load->view('template/index', $data);
	}

	public function core(){

		$this->form_validation->set_rules('nome', 'Nome','trim|required');
		$this->form_validation->set_rules('email', 'E-mail','trim|required|valid_email');

		if ( !$this->input->post('id_user') ){
			$this->form_validation->set_rules('senha', 'Senha','trim|required|min_length[6]|max_length[8]');
		}

		if ($this->form_validation->run() === TRUE){

			$username 	= $this->input->post('nome');
			$password 	= $this->input->post('senha');
			$email 		= $this->input->post('email');
			$additional_data = array(
				'first_name' => $this->input->post('primeiro_nome'),
				'last_name' =>	$this->input->post('ultimo_nome'),
				'id_position' =>	$this->input->post('cargos'),
				'id_phone' =>	$this->input->post('fones')
			);

			if ($this->input->post('id_user')){

				$id = $this->input->post('id_user');

				$data['username'] 	= $this->input->post('nome');
				$data['first_name']	= $this->input->post('primeiro_nome');
				$data['last_name']	= $this->input->post('ultimo_nome');
				$data['email'] 		= $this->input->post('email');
				$data['active'] 	= $this->input->post('ativo');
				$data['id_position']= $this->input->post('cargos');
				$data['id_phone'] 	= $this->input->post('fones');

				if ($this->input->post('senha')){
					$data['password'] = $this->input->post('senha');
				}

				if ($this->ion_auth->update($id, $data)){

					setMsg('msgCadastro', 'Usuário atualizado com sucesso!', 'sucesso');
					redirect('admin/users','refresh');

				} else {
					setMsg('msgCadastro', 'Erro ao atualizar usuário!', 'erro');
					redirect('admin/users','refresh');
				}

			} else {

				if ($this->ion_auth->register($username, $password, $email, $additional_data)){

					setMsg('msgCadastro', 'Usuário cadastrado com sucesso!', 'sucesso');
					redirect('admin/users/modulo','refresh');

				}else{

					setMsg('msgCadastro', 'Erro ao cadastrar usuário!', 'erro');
					redirect('admin/users','refresh');
				}
			}

		}else{
			$this->modulo();
		}
	}

	public function del ($id_user = NULL){

		if ($id_user){

			if ($id_user == 1){

				setMsg('msgCadastro', 'Você não possui permissões para apagar este usuário!', 'erro');
				redirect('admin/users','refresh');

			}

			if ($id_user == $this->session->userdata('user_id')){

				setMsg('msgCadastro', 'Não se pode apagar logado nesta sessão!', 'erro');
				redirect('admin/users','refresh');
			}

			if ($this->ion_auth->delete_user($id_user)){

				setMsg('msgCadastro', 'Usuário apagado com sucesso!', 'sucesso');
				redirect('admin/users','refresh');

			} else {

				setMsg('msgCadastro', 'Erro ao apagar usuário', 'erro');
				redirect('admin/users','refresh');

			}
		} else {

			setMsg('msgCadastro', 'Necessita selecionar um usuário para a exclusão!', 'erro');
			redirect('admin/users','refresh');

		}
	}

}
