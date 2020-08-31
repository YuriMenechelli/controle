<?php
defined('BASEPATH')or exit ('No direct script access allowed');

class Positions_model extends CI_Model{

	public function getPositions(){
		$this->db->select('p.id as id_cargo,
							p.position_name as cargo,
							p.active as ativo,
							p.id_department as id_posdept,
							d.id as id_dept,
							d.department_name as dept');
		$this->db->from('positions p');
		$this->db->join('departments d','d.id = p.id_department','left');
		$this->db->order_by('p.id','ASC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getDepartments(){
		return $this->db->get('departments')->result();
	}
	public function getPositionsID($id=NULL){

		if ($id){
			$this->db->where('id', $id);
			$this->db->limit (1);
			$query = $this->db->get('positions');
			return $query->row();
		}
	}

	public function getPosDept($id_department=NULL){

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

	public function doInsert( $dados=NULL){

		if (is_array($dados)){

			$this->db->insert('positions',$dados);

			if ($this->db->affected_rows() > 0){
				setMsg('cadastro', 'Cargo cadastrado com sucesso!','sucesso');
			}else{
				setMsg('cadastro', 'Erro ao cadastrar cargo!','erro');
			}

		}else {
			return FALSE;
		}

	}

	public function doUpdate($dados=NULL, $id_cargo=NULL ){

		if (is_array($dados)){

			$this->db->update('positions', $dados, array('id' => $id_cargo));

			if ($this->db->affected_rows() > 0){
				setMsg('msgCadastro', 'Cargo atualizado com sucesso.', 'sucesso');
			} else {
				setMsg('msgCadastro', 'Erro ao atualizar cargo.', 'erro');
			}
		}
	}

	public function doDelete($id_cargo=NULL){

		if ($id_cargo){

			$this->db->delete('positions', array('id' => $id_cargo));

			if ($this->db->affected_rows() > 0){
				setMsg('msgCadastro', 'Cargo apagado com sucesso.', 'sucesso');
			} else {
				setMsg('msgCadastro', 'Erro ao apagar cargo.', 'erro');
			}
		}

	}
}
