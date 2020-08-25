<?php
defined('BASEPATH')or exit ('No direct script access allowed');

class Positions_model extends CI_Model{

	public function getPositions(){
		$this->db->select('p.id,
							p.position_name as cargo,
							p.active as ativo,
							d.department_name as dept');
		$this->db->from('positions p');
		$this->db->join('departments d','d.id = p.id_department','inner');
		$this->db->order_by('p.id','ASC');
		$query = $this->db->get();
		return $query->result();
	}
}
