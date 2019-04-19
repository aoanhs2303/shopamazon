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

	public function getBestSellerProduct()
	{
		$this->db->select('*');
		if (isset($_GET['offset'])){
			$this->db->limit(3, $_GET['offset']);
		} else {
			$this->db->limit(6);
		}
		$this->db->order_by("sold", "desc");
		$this->db->order_by("sold", "desc");
		$data = $this->db->get('amazon_product');
		$data = $data->result_array();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	public function getProductById()
	{
		$product_id = $_GET['product_id'];
		$this->db->select('*');
		$this->db->where('id', $product_id);
		$data = $this->db->get('amazon_product');
		$data = $data->result_array();
		echo json_encode($data[0], JSON_UNESCAPED_UNICODE);
	}

	public function getListProduct() {
		$listProductId = $_POST['listProductId'];
		$this->db->select('*');
		$this->db->where_in('id', $listProductId);
		$this->db->limit(20);
		$order = sprintf('FIELD(id, %s)', implode(', ', $listProductId));
		$this->db->order_by($order); 

		$data = $this->db->get('amazon_product');
		$data = $data->result_array();
		echo json_encode($data, JSON_UNESCAPED_UNICODE);
	}

	public function getCustomerById()
	{
		$customer_id = $_GET['customer_id'];
		$this->db->select('customer_id, username, password, gender, country, age, yearly_income as yearly_salary, member_card, education, houseowner as house_owner, marital_status, product_rcm');
		$this->db->where('customer_id', $customer_id);
		$data = $this->db->get('customer');
		$data = $data->result_array();
		echo json_encode($data[0], JSON_UNESCAPED_UNICODE);
	}

	public function personalRecommend() {
		
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */