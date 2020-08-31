<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model{


	public function getUsers(){
		$this->db->select('users.id,
							CONCAT (users.first_name,
							" "'.',
							users.last_name) as nome, 
							users.email, 
							users.active,
							positions.position_name, 
							departments.department_name,
							phones.phone,
							phones.cellphone'
		);
		$this->db->from('users');
		$this->db->join('positions','positions.id=users.id_position','left');
		$this->db->join('departments','departments.id=positions.id_department','left');
		$this->db->join('phones','phones.id=users.phone_id','left');
		$this->db->order_by('users.id','asc');
		$this->db->limit(10);
		$query = $this->db->get();
		return $query->result();
	}

	public function getPositions(){

		$this->db->select('p.id as id_cargo,
						p.position_name as cargo_nome,
						d.department_name as dept_nome');
		$this->db->from('positions p');
		$this->db->join('departments d','d.id=p.id_department','inner');
		$this->db->where('p.active =', 1);
		$query = $this->db->get();
		return $query->result();
	}

	public function getPhones(){

		$this->db->where('active', 1);
		$query = $this->db->get('phones');
		return $query->result();
	}

}
