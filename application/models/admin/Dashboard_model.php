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

		$id = $this->session->userdata('user_id');

		$this->db->select('u.id,
							CONCAT (u.first_name,
							" "' . ',
							u.last_name) as nome,
							p.position_name as cargo, 
							d.department_name as dept'
		);
		$this->db->from('users u');
		$this->db->join('positions p', 'p.id=u.id_position', 'inner');
		$this->db->join('departments d', 'd.id=p.id_department', 'inner');
		$this->db->where('u.id =', $id);

		$query = $this->db->get()->row();
		return $query;

	}

}
