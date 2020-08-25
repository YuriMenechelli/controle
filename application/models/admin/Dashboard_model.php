<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model{


	public function getTotal($tabela=NULL) {
		if ($tabela){
			$query = $this->db->get($tabela);
			return $query->num_rows();
		}
	}
	public function getUserByPosDept(){
		$this->db->select('users.id,
							CONCAT (users.first_name,
							" "'.',
							users.last_name) as nome,
							positions.position_name as cargo, 
							departments.department_name as dept'
		);
		$this->db->from('users');
		$this->db->join('positions','positions.id=users.id_position','left');
		$this->db->join('departments','departments.id=positions.id_department','left');
		$query = $this->db->get();
		return $query->result();
	}
}
