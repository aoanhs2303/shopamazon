<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public $variable;

	public function __construct()
	{
		parent::__construct();
		
	}

	// ==============// 
	// ! ADMIN INDEX //        
	// =============//
	public function countProduct()
	{
		$query = $this->db->get("sanpham");
		return $query->num_rows();
	}

	public function countOrder()
	{
		$query = $this->db->get("donhang");
		return $query->num_rows();
	}

	public function doanhThu()
	{
		$this->db->select('sum(total) as total');
		$data = $this->db->get('donhang');
		$data = $data->result_array();
		return $data[0]['total'];
	}

	// ===========// 
	// ! DANH MỤC //        
	// ===========//

	public function getCategory()
	{
		$this->db->select('*');
		$data = $this->db->get('danhmuc');
		$data = $data->result_array();
		return $data;
	}

	public function addCategory($name, $nhom)
	{
		$data = array('name' => $name, 'main' => $nhom);
		$this->db->insert('danhmuc', $data);

		echo json_encode($this->db->insert_id());
	}

	public function updateCategory($id, $name, $nhom)
	{
		$this->db->set('name', $name);
		$this->db->set('main', $nhom);
		$this->db->where('id', $id);
		return $this->db->update('danhmuc');
	}

	public function deleteCategory($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('danhmuc');
	}

	// ==========// 
	// ! DỊCH VỤ //        
	// ==========// 

	public function getService()
	{
		$this->db->select('*');
		$data = $this->db->get('dichvu');
		$data = $data->result_array();
		return $data;
	}

	public function getServiceById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data = $this->db->get('dichvu');
		$data = $data->result_array();
		return $data;
	}

	public function addService($name,$image,$summary,$content,$keyword)
	{
		$data = array(
			'name'    => $name,
			'image'   => $image,
			'summary' => $summary,
			'content' => $content,
			'keyword' => $keyword
		);
		$this->db->insert('dichvu', $data);
		return $this->db->insert_id();
	}

	public function updateService($id,$name,$hinhanh,$summary,$content,$keyword)
	{
		$data = array(
			'name'    => $name,
			'image'   => $hinhanh,
			'summary' => $summary,
			'content' => $content,
			'keyword' => $keyword
		);
		$this->db->where('id', $id);
		return $this->db->update('dichvu', $data);
	}

	public function deleteService($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('dichvu');
	}

	// ===========// 
	// ! BÀI VIẾT //        
	// ===========// 	

	public function getPost()
	{
		$this->db->select('*');
		$data = $this->db->get('baiviet');
		$data = $data->result_array();
		return $data;
	}

	public function getPostById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data = $this->db->get('baiviet');
		$data = $data->result_array();
		return $data;
	}

	public function addPost($name,$image,$summary,$content)
	{
		$data = array(
			'name'    => $name,
			'image'   => $image,
			'summary' => $summary,
			'content' => $content
		);
		$this->db->insert('baiviet', $data);
		return $this->db->insert_id();
	}

	public function updatePost($id,$name,$hinhanh,$summary,$content)
	{
		$data = array(
			'name'    => $name,
			'image'   => $hinhanh,
			'summary' => $summary,
			'content' => $content
		);
		$this->db->where('id', $id);
		return $this->db->update('baiviet', $data);
	}

	public function deletePost($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('baiviet');
	}

	// ===========// 
	// ! SẢN PHẨM //        
	// ===========// 	

	public function count_all()
	{
		$query = $this->db->get("sanpham");
		return $query->num_rows();
	}	

	public function fetch_details($limit, $start)
	{
		$output = '';
		$this->db->select("*");
		$this->db->from("sanpham");
		$this->db->order_by("name", "ASC");
		$this->db->limit($limit, $start);
		$query = $this->db->get();
		$output .= '
		  <table class="table table-responsive danhsach table-striped" id="product_table">
                <tr>
                  <th width="15px">#</th>
                  <th>HOT</th>
                  <th>Tên danh mục</th>
                  <th style="width: 25%">Hình ảnh</th>
                  <th>Danh mục</th>
                  <th>Giá</th>
                  <th>Số lượng</th>
                  <th>Kích thước</th>
                  <th>Bề dày</th>
                  <th>Trạng thái</th>
                  <th style="width: 10%">Hành động</th>
                </tr>
		  ';
		$count = $start;
	  	foreach($query->result() as $row)
		{
		   $count ++;
		   $imgs = json_decode($row->image);
		   $base_url = base_url();
		   $output .= '
		        <tr class="sanpham-'.$row->id.'">
                  <td class="text-primary" style="font-weight: 900">'.$count.'</td>
                  <td>';
                  if($row->hot) {
					$output .= '<a href="'.$base_url.'Admin/unsetHot/'.$row->id.'"><span class="label bg-red">HOT</span></a>';
                  } else {
		          	$output .= '<a href="'.$base_url.'Admin/setHot/'.$row->id.'"><span class="label bg-blue"><i class="fa fa-square"></i> Cài đặt</span></a>';	                  	
                  }
                  $output .= '</td>
                  <td class="stt">'.$row->name.'</td>
                  <td class="ten" v-for="img in imgs">';
                  	for ($i=0; $i < count($imgs); $i++) { 
                  		$output .= '<img src="'.$imgs[$i].'" alt="'.$imgs[$i].'" class="img-fluid" style="height: 50px; padding-right: 5px">';
                  	}
                  $output .= '</td>
                  <td>'.$row->category.'</td>
                  <td>'.$row->price.' ₫</td>
                  <td>'.$row->quantity.'</td>
                  <td>'.$row->size.'</td>
                  <td>'.$row->thick.'</td>';

                  if ($row->status == 'true') {
                  	$output .= '<td><span class="badge badge-success">Kích hoạt</span></td>';
                  } else {
                  	$output .= '<td><span class="badge badge-danger">Disable</span></td>';
                  }
                  
                  $output .=  '<td> <a href="'.$base_url.'Admin/suasanpham/'.$row->id.'" class="btn btn-warning suaajax"><i class="fa fa-pencil"></i></a>
                    <a href="" class="btn btn-danger" data-toggle="modal" data-target="#myModalDel-'.$row->id.'"><i class="fa fa-times"></i></a>

                    <div class="modal fade" id="myModalDel-'.$row->id.'" tabindex="-1" role="dialog" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Xóa</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h5>Bạn có muốn xóa: '.$row->name.'</h5>
                            <img class="img-fluid rounded" src="'.$imgs[0].'" alt="<?php echo $img ?>">
                          </div>
                          <div class="modal-footer">
                            <a href="'.$row->id.'" type="button" class="btn btn-danger pull-right xoaajax">Xóa</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </td>
                </tr>
		   ';
		}
	  	$output .= '</table>';
	  	return $output;
	}


	public function getProduct()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'desc');
		$data = $this->db->get('sanpham');
		$data = $data->result_array();
		return $data;
	}

	public function getProductById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data = $this->db->get('sanpham');
		$data = $data->result_array();
		return $data;
	}

	public function addProduct($name,$category,$content,$keyword,$price,$quantity,$state,$size,$thick,$image) 
	{
		if($state == 'on') 
			$state = 'true';
		else $state = 'false';
		$data = array(
			'name'     => $name,
			'category' => $category,
			'content'  => $content,
			'keyword'  => $keyword,
			'price'    => $price,
			'quantity' => $quantity,
			'status'   => $state,
			'size'     => $size,
			'thick'    => $thick,
			'image'    => $image
		);
		return $this->db->insert('sanpham', $data);
	}

	public function updateProduct($id,$name,$category,$content,$keyword,$price,$quantity,$size,$thick,$state,$image)
	{
		$data = array(
			'name'     => $name,
			'category' => $category,
			'content'  => $content,
			'keyword'  => $keyword,
			'price'    => $price,
			'quantity' => $quantity,
			'size'     => $size,
			'thick'	   => $thick,
			'status'   => $state,
			'image'    => $image
		);
		$this->db->where('id', $id);
		return $this->db->update('sanpham', $data);		
	}

	public function deleteProduct($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('sanpham');
	}

	// ============// 
	// ! TRANG CHỦ //        
	// ============//

	public function getCategory_Van($sanpham)
 	{
 		if($sanpham == 'van') {
 			$this->db->where('main', '1');
 		}
 		else if ($sanpham == 'lot') {
 			$this->db->where('main', '2');
 		}
 		else if ($sanpham == 'khac') {
 			$this->db->where('main', '#');
 		}
 		$data = $this->db->get('danhmuc');
 		$data = $data->result_array();
 		return $data;
 	} 	

	public function getCategory_VanId($sanpham)
 	{
 		$this->db->select('id');
 		if($sanpham == 'van') {
 			$this->db->where('main', '1');
 		}
 		else if ($sanpham == 'lot') {
 			$this->db->where('main', '2');
 		}
 		else if ($sanpham == 'khac') {
 			$this->db->where('main', '#');
 		}
 		$data = $this->db->get('danhmuc');
 		$data = $data->result_array();
 		return $data;
 	}

 	public function getProductByCateId($idcate)
 	{
 		$this->db->select('name');
 		$this->db->where('id', $idcate);
 		$name = $this->db->get('danhmuc');
 		$name = $name->result_array();
 		$name = $name[0]['name'];
 		$this->db->select('*');
 		$this->db->where('category', $name);

 		$data = $this->db->get('sanpham');
 		$data = $data->result_array();
 		
 		return $data;
 	}

 	public function getProductCate_Van()
 	{
 		$this->load->model('Admin_model');
 		$mangId = $this->getCategory_VanId('van');
 		$dulieu = array();
 		for ($i=0; $i < count($mangId); $i++) { 
 			array_push($dulieu,$this->Admin_model->getProductByCateId($mangId[$i]['id']));
 		}
 		return $dulieu;
 	}

 	public function getProductCate_Lot()
 	{
 		$this->load->model('Admin_model');
 		$mangId = $this->getCategory_VanId('lot');
 		$dulieu = array();
 		for ($i=0; $i < count($mangId); $i++) { 
 			array_push($dulieu,$this->Admin_model->getProductByCateId($mangId[$i]['id']));
 		}
 		return $dulieu;
 	}

 	public function getRelatedProduct($idsp)
 	{
 		$this->db->select('category');
 		$this->db->where('id', $idsp);
 		$cate = $this->db->get('sanpham');
 		$cate = $cate->result_array();
 		$cate = $cate[0]['category'];
 		
 		$this->db->select('*');
 		$this->db->where('category', $cate);
 		$data = $this->db->get('sanpham',6);
 		$data = $data->result_array();
 		
 		return $data;
 	}

 	public function getHotProduct()
 	{
 		$this->db->select('*');
 		$this->db->where('hot', 'true');
 		$data = $this->db->get('sanpham');
 		$data = $data->result_array();
 		return $data;
 	}

 	public function getHotProductSide()
 	{
 		$this->db->select('*');
 		$this->db->where('hot', 'true');
 		$data = $this->db->get('sanpham',3);
 		$data = $data->result_array();
 		return $data;
 	}

 	public function setHotProduct($id)
 	{
		$this->db->set('hot', 'true');
		$this->db->where('id', $id);
		return $this->db->update('sanpham');		
 	}

 	public function unsetHotProduct($id)
 	{
		$this->db->set('hot', '');
		$this->db->where('id', $id);
		return $this->db->update('sanpham');		
 	}

	// =============// 
	// ! GIỚI THIỆU //        
	// =============// 

	public function getInfomation()
	{
		$this->db->select('*');
		$data = $this->db->get('cuahang');
		$data = $data->result_array();
		return $data;
	}


	public function getInfomationById($id)
	{
		$this->db->select('*');
		$this->db->where('id', $id);
		$data = $this->db->get('cuahang');
		$data = $data->result_array();
		return $data;
	}

	public function addInfomation($name,$content,$type)
	{
		$data = array(
			'name'    => $name,
			'content' => $content,
			'type' => $type
		);
		$this->db->insert('cuahang', $data);
		return $this->db->insert_id();
	}

	public function updateInfomation($id,$name,$content,$type)
	{
		$data = array(
			'name'    => $name,
			'content' => $content,
			'type'    => $type
		);
		$this->db->where('id', $id);
		return $this->db->update('cuahang', $data);		
	}

	public function deleteInfomation($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('cuahang');
	}

	public function getGioiThieu()
	{
		$this->db->select('*');
		$this->db->where('type', 'gioithieu');
		$data = $this->db->get('cuahang', 1);
		$data = $data->result_array();

		return $data;
	}

	public function getHuongDanMuaHang()
	{
		$this->db->select('*');
		$this->db->where('type', 'huongdanmuahang');
		$data = $this->db->get('cuahang', 1);
		$data = $data->result_array();
		return $data;
	}

	// =============// 
	// ! SLIDE ẢNH  //        
	// =============// 

	public function addSlideAnh($link, $image)
	{
		$data = array('link' => $link, 'image' => $image);
		$this->db->insert('slideanh', $data);
		return $this->db->insert_id();
	}

	public function getSlideAnh()
	{
		$this->db->select('*');
		$data = $this->db->get('slideanh');
		$data = $data->result_array();

		return $data;
	}

	public function deleteSlideAnh($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('slideanh');
	}

	// ==============// 
	// ! BANNER ẢNH  //        
	// ==============// 

	public function addBanner($link, $image)
	{
		$data = array('link' => $link, 'image' => $image);
		$this->db->insert('banner', $data);
		return $this->db->insert_id();
	}

	public function getBanner()
	{
		$this->db->select('*');
		$data = $this->db->get('banner');
		$data = $data->result_array();
		return $data;
	}

	public function deleteBanner($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('banner');
	}


	// =========// 
	// ! ORDER  //        
	// =========// 

	public function addOrder($sanpham,$name,$sdt,$email,$diachi,$price)
	{
		$data = array(
			'product' => $sanpham,
			'name'    => $name,
			'sdt'     => $sdt,
			'email'   => $email,
			'address' => $diachi,
			'total'   => $price
		);
		$this->db->insert('donhang', $data);
		return $this->db->insert_id();
	}

	public function getOrder()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'desc');
		$data = $this->db->get('donhang');
		$data = $data->result_array();
		return $data;
	}

	public function getOrderUnprocessor()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'desc');
		$this->db->where('status', '');
		$data = $this->db->get('donhang');
		$data = $data->result_array();
		return $data;
	}

	public function deleteOrder($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete('donhang');
	}

	public function setDoneOrder($id)
	{
		$this->db->set('status', 'done');
		$this->db->where('id', $id);
		return $this->db->update('donhang');	
	}

	public function get5Product()
	{
		$this->db->select('*');
		$this->db->order_by('id', 'desc');
		$data = $this->db->get('sanpham', 5);
		$data = $data->result_array();
		return $data;
	}

	public function authenticationAdmin($user, $pass)
	{
		$this->db->select('*');
		$px = md5($pass);
		$dieukien = array('username	' => $user, 'password' => $pass);
		$this->db->where($dieukien);
		$data = $this->db->get('admin');

		$data = $data->result_array();

		if(count($data) == 1) {
			return $data;
		} else {
			return null;
		}
	}

	public function searchHome($tukhoa)
	{
		$this->db->select('*');
		$this->db->from('sanpham');
		$this->db->or_like('sanpham.name', $tukhoa);
		$this->db->or_like('sanpham.category', $tukhoa);
		$this->db->or_like('sanpham.keyword', $tukhoa);

		$data = $this->db->get();
		$data = $data->result_array();
		return $data;
	}

	// ================================// 
	// ! SỐ ĐIỆN THOẠI, EMAIL, ĐỊA CHỈ //        
	// ================================// 

	public function getContact($type)
	{
		switch ($type) {
			case 'sdt':
				$this->db->select('*');
				$this->db->where('type', $type);
				$value = $this->db->get('contact');
				$value = $value->result_array();
				break;
			case 'email':
				$this->db->select('*');
				$this->db->where('type', $type);
				$value = $this->db->get('contact');
				$value = $value->result_array();
				// $value = $value[0]['value'];
				break;
			default:
				$this->db->select('*');
				$this->db->where('type', $type);
				$value = $this->db->get('contact');
				$value = $value->result_array();
				// $value = $value[0]['value'];
				break;
		}

		return $value;
	}

	public function updateContact($id,$value)
	{
		$this->db->set('value', $value);
		$this->db->where('id', $id);
		return $this->db->update('contact');
	}

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */