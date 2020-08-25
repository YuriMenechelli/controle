<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dept_model extends CI_Model{

	public function getDepts(){
		return $this->db->get('departments')->result();
	}
}
