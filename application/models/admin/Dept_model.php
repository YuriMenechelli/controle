<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dept_model extends CI_Model{

	public function getDepts(){
		return $this->db->get('departments')->result();
	}

	public function getDeptsID($id=NULL){
		if ($id){
			$this->db->where('id',$id);
			$this->db->limit(1);
			$query = $this->db->get('departments');
			return $query->row();
		}
	}

	public function getDeptPos($id_department=NULL){

		if ($id_department){
			$this->db->where('id_department', $id_department);
			$query = $this->db->get('positions');

			if ($query != NULL && $query->num_rows() >= 1){
				return TRUE;
			} else {
				return FALSE;
			}
		}
	}

	public function doInsert($dados=NULL){

		if (is_array($dados)){
			$this->db->insert('departments', $dados);

			if ($this->db->affected_rows() > 0){
				setMsg('msgCadastro','Departamento cadastrado com sucesso!','sucesso');
			}else{
				setMsg('msgCadastro','Erro ao cadastrar departamento','erro');
			}
		}else{
			return FALSE;
		}
	}

	public function doUpdate($dados=NULL, $id_dept=NULL){
		if (is_array($dados)){
			$this->db->update('departments', $dados, array('id'=> $id_dept));

			if ($this->db->affected_rows() > 0){
				setMsg('msgCadastro','Departamento atualizado!','sucesso');
			}else {
				setMsg('msgCadastro','Erro ao atualizar departamento!','erro');
			}
		}
	}

	public function doDelete($id_dept=NULL){
		if ($id_dept){
			$this->db->delete('departments', array('id'=> $id_dept));

			if ($this->db->affected_rows() > 0){
				setMsg('msgCadastro',
					'Departamento excluído!'.'<br class="text-center">'.'Verifique com o admnistrador do sistema!',
					'sucesso');
			}else {
				setMsg('msgCadastro','Erro ao excluir departamento!','erro');
			}
		}
	}
}
