<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Api extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Mrar_model');
	}

	public function getCategory()
	{
		$this->db->select('*');
		$data = $this->db->get('amazon_category');
		$data = $data->result_array();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	public function getSliceProductByCategory()
	{
		$category_id = $_GET['category_id'];
		$this->db->select('*');
		$this->db->where('category_id', $category_id);
		$data = $this->db->get('amazon_product');
		$data = $data->result_array();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	public function getDepartmentProduct()
	{
		$listCategory = $_POST['listCategory'];
		$this->db->select('*');
		$this->db->where_in('category_id', $listCategory);
		$this->db->limit(8);
		$data = $this->db->get('amazon_product');
		$data = $data->result_array();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */