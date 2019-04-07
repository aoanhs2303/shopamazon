<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mrar_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

    public function authenticationUser($user, $pass)
	{
		$this->db->select('*');
		$dieukien = array('username	' => $user, 'password' => $pass);
		$this->db->where($dieukien);
		$data = $this->db->get('customer');
		$data = $data->result_array();
		if(count($data) == 1) {
			return $data;
		} else {
			return null;
		}
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */