<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Test extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$this->Admin_model->getHotProduct();
	}

}

/* End of file test.php */
/* Location: ./application/controllers/test.php */