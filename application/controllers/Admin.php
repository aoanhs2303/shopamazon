<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include("Function.php");

class Admin extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		Confirm_Login();
	}

	public function index()
	{
		$menu        = $this->load->view('admin/include/menu.php', null, TRUE);
		$sosanpham   = $this->Admin_model->countProduct();
		$sodonhang   = $this->Admin_model->countOrder();
		$doanhthu    = $this->Admin_model->doanhThu();
		$dh_chuaxuly = $this->Admin_model->getOrderUnprocessor();
		$sp_moi      = $this->Admin_model->get5Product();
		$data = array(
			'menu'        => $menu,
			'sosp'        => $sosanpham,
			'sodh'        => $sodonhang,
			'doanhthu'    => $doanhthu,
			'dh_chuaxuly' => $dh_chuaxuly,
			'sp_moi'      => $sp_moi
		);

		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/main_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);
	}


	// ===========// 
	// ! dANH MỤC //        
	// ===========// 

	public function danhmuc()
	{
		$menu = $this->load->view('admin/include/menu.php', null, TRUE);
		$all_category = $this->Admin_model->getCategory();
		$data = array('menu' => $menu, 'category' => $all_category); 

		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/danhmuc_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);
	}

	public function themdanhmuc()
	{
		$tendanhmuc = $this->input->post('tendanhmuc');
		$nhomdanhmuc = $this->input->post('nhomdanhmuc');
		$this->Admin_model->addCategory($tendanhmuc, $nhomdanhmuc);
	}

	public function suadanhmuc()
	{
		$tendanhmuc  = $this->input->post('tendm');
		$iddanhmuc   = $this->input->post('iddm');
		$nhomdanhmuc = $this->input->post('nhomdm');
		$this->Admin_model->updateCategory($iddanhmuc,$tendanhmuc,$nhomdanhmuc);
	}

	public function xoadanhmuc()
	{
		$idxoa = $this->input->post('idxoa');
		$this->Admin_model->deleteCategory($idxoa);
	}

	// ==========// 
	// ! DỊCH VỤ //        
	// ==========// 


	public function dichvu()
	{
		$menu        = $this->load->view('admin/include/menu.php', null, TRUE);
		$all_service = $this->Admin_model->getService();
		$data        = array('menu' => $menu, 'dichvu' => $all_service); 
		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/dichvu_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);
	}

	public function themdichvu()
	{
		$ten     = $this->input->post('tendichvu');
		$tomtat  = $this->input->post('tomtatdichvu');
		$noidung = $this->input->post('noidungdichvu');
		$tukhoa  = $this->input->post('tukhoadichvu');
		
		$config['upload_path']   = './files/dichvu';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '100000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('hinhdichvu')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$data = $this->upload->data();
			$hinhanh = base_url() . 'files/dichvu/' . $data['file_name'];
		}
		$this->Admin_model->addService($ten,$hinhanh,$tomtat,$noidung,$tukhoa);
		redirect('Admin/dichvu');
	}

	public function suadichvu($id)
	{
		$menu = $this->load->view('admin/include/menu.php', null, TRUE);
		$one_service = $this->Admin_model->getServiceById($id);
		$data = array('menu' => $menu, 'dichvu' => $one_service); 
		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/dichvu_edit_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);
	}

	public function do_suadichvu()
	{
		$id = $this->input->post('iddichvu');
		$name = $this->input->post('tendichvu');
		$image = $this->input->post('hinhcudichvu');
		$summary = $this->input->post('tomtatdichvu');
		$content = $this->input->post('noidungdichvu');
		$keyword = $this->input->post('tukhoadichvu');

		$config['upload_path']   = './files/dichvu';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '100000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('hinhdichvu')){
			$hinhanh = "";
		}
		else{
			$data = $this->upload->data();
			$hinhanh = base_url() . 'files/dichvu/' . $data['file_name'];
		}

		if(!$hinhanh) {
			$hinhanh = $image;
		}

		if($this->Admin_model->updateService($id,$name,$hinhanh,$summary,$content,$keyword)){
			$link = base_url() . 'Admin/dichvu';
			redirect($link);
		}

	}

	public function xoadichvu()
	{
		$idxoa = $this->input->post('idxoa');
		$this->Admin_model->deleteService($idxoa);		
	}

	// ===========// 
	// ! BÀI VIẾT //        
	// ===========// 

	public function baiviet()
	{
		$menu     = $this->load->view('admin/include/menu.php', null, TRUE);
		$all_post = $this->Admin_model->getPost();
		$data     = array('menu' => $menu, 'baiviet' => $all_post); 
		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/baiviet_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);		
	}

	public function thembaiviet()
	{
		$ten     = $this->input->post('tenbaiviet');
		$tomtat  = $this->input->post('tomtatbaiviet');
		$noidung = $this->input->post('noidungbaiviet');
		$tukhoa  = $this->input->post('tukhoabaiviet');
		
		$config['upload_path']   = './files/baiviet';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '100000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('hinhbaiviet')){
			$error = array('error' => $this->upload->display_errors());
		}
		else{
			$data = $this->upload->data();
			$hinhanh = base_url() . 'files/baiviet/' . $data['file_name'];
		}
		$this->Admin_model->addPost($ten,$hinhanh,$tomtat,$noidung);
		redirect('Admin/baiviet');
	}

	public function suabaiviet($id)
	{
		$menu = $this->load->view('admin/include/menu.php', null, TRUE);
		$one_post = $this->Admin_model->getPostById($id);
		$data = array('menu' => $menu, 'baiviet' => $one_post); 
		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/baiviet_edit_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);
	}

	public function do_suabaiviet()
	{
		$id = $this->input->post('idbaiviet');
		$name = $this->input->post('tenbaiviet');
		$image = $this->input->post('hinhcubaiviet');
		$summary = $this->input->post('tomtatbaiviet');
		$content = $this->input->post('noidungbaiviet');

		$config['upload_path']   = './files/baiviet';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '100000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('hinhbaiviet')){
			$hinhanh = "";
		}
		else{
			$data = $this->upload->data();
			$hinhanh = base_url() . 'files/baiviet/' . $data['file_name'];
		}

		if(!$hinhanh) {
			$hinhanh = $image;
		}

		if($this->Admin_model->updatePost($id,$name,$hinhanh,$summary,$content)){
			$link = base_url() . 'Admin/baiviet';
			redirect($link);
		}

	}

	public function xoabaiviet()
	{
		$idxoa = $this->input->post('idxoa');
		$this->Admin_model->deletePost($idxoa);		
	}

	// ===========// 
	// ! SẢN PHẨM //        
	// ===========// 

	public function sanpham()
	{
		$menu     	 = $this->load->view('admin/include/menu.php', null, TRUE);
		$all_product = $this->Admin_model->getProduct();
		$all_category = $this->Admin_model->getCategory();
		$data     	 = array('menu' => $menu, 'sanpham' => $all_product, 'danhmuc' => $all_category); 
		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/sanpham_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);	
	}	

	public function pagination()
	{
	  $this->load->library("pagination");
	  $config = array();
	  $config["base_url"] = "#";
	  $config["total_rows"] = $this->Admin_model->count_all();
	  $config["per_page"] = 15;
	  $config["uri_segment"] = 3;
	  $config["use_page_numbers"] = TRUE;
	  $config["full_tag_open"] = '<ul class="pagination pagination-sm pull-right">';
	  $config["full_tag_close"] = '</ul>';
	  $config["first_tag_open"] = '<li>';
	  $config["first_tag_close"] = '</li>';
	  $config["last_tag_open"] = '<li>';
	  $config["last_tag_close"] = '</li>';
	  $config['next_link'] = '&gt;';
	  $config["next_tag_open"] = '<li>';
	  $config["next_tag_close"] = '</li>';
	  $config["prev_link"] = "&lt;";
	  $config["prev_tag_open"] = "<li>";
	  $config["prev_tag_close"] = "</li>";
	  $config["cur_tag_open"] = "<li><a class='current' href='#'>";
	  $config["cur_tag_close"] = "</a></li>";
	  $config["num_tag_open"] = "<li>";
	  $config["num_tag_close"] = "</li>";
	  $config["num_links"] = 1;
	  $this->pagination->initialize($config);
	  $page = $this->uri->segment(3);
	  $start = ($page - 1) * $config["per_page"];

	  $output = array(
	   'pagination_link'  => $this->pagination->create_links(),
	   'country_table'   => $this->Admin_model->fetch_details($config["per_page"], $start)
	  );
	  echo json_encode($output);
	}

	public function themsanpham()
	{
		$name     = $this->input->post('tensanpham');
		$category = $this->input->post('danhmucsanpham');
		$content  = $this->input->post('noidungsanpham');
		$keyword  = $this->input->post('tukhoasanpham');
		$price    = $this->input->post('giasanpham');
		$quantity = $this->input->post('soluongsanpham');
		$state	  = $this->input->post('trangthaisanpham');
		$size     = $this->input->post('kichthuocsanpham');
		$thick    = $this->input->post('bedaysanpham');
		$image = json_encode($this->input->post('hinhsanpham'));

		if($this->Admin_model->addProduct($name,$category,$content,$keyword,$price,$quantity,$state,$size,$thick,$image)) {
			$link = base_url() . 'Admin/sanpham';
			redirect($link);
		}
	}

	public function suasanpham($id)
	{
		$menu     	 = $this->load->view('admin/include/menu.php', null, TRUE);
		$one_product = $this->Admin_model->getProductById($id);
		$all_category = $this->Admin_model->getCategory();
		$data     	 = array('menu' => $menu, 'sanpham' => $one_product, 'danhmuc' => $all_category); 
		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/sanpham_edit_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);	
	}

	public function do_suasanpham()
	{
		$anhxoa = $this->input->post('anhxoa');
		$id       = $this->input->post('idsanpham');
		$name     = $this->input->post('tensanpham');
		$category = $this->input->post('danhmucsanpham');
		$content  = $this->input->post('noidungsanpham');
		$keyword  = $this->input->post('tukhoasanpham');
		$price    = $this->input->post('giasanpham');
		$quantity = $this->input->post('soluongsanpham');
		$size     = $this->input->post('kichthuocsanpham');
		$thick    = $this->input->post('bedaysanpham');
		$state    = ($this->input->post('trangthaisanpham') == 'on') ? 'true' : 'false';
		$image 	  = json_encode($this->input->post('anhsanpham'));

		if($this->Admin_model->updateProduct($id,$name,$category,$content,$keyword,$price,$quantity,$size,$thick,$state,$image)) {
			$link = base_url() . 'Admin/sanpham';
			redirect($link);			
		}
	}

	public function xoasanpham()
	{
		$idxoa = $this->input->post('idxoa');
		$this->Admin_model->deleteProduct($idxoa);		
	}

	public function setHot($id)
	{
		if($this->Admin_model->setHotProduct($id)) {
			$link = base_url() . 'Admin/sanpham';
			redirect($link);				
		}
	}

	public function unsetHot($id)
	{
		if($this->Admin_model->unsetHotProduct($id)) {
			$link = base_url() . 'Admin/sanpham';
			redirect($link);				
		}
	}


	// =============// 
	// ! GIỚI THIỆU //        
	// =============// 	

	public function thongtin()
	{
		$menu        = $this->load->view('admin/include/menu.php', null, TRUE);
		$all_info = $this->Admin_model->getInfomation();
		$data        = array('menu' => $menu, 'dichvu' => $all_info); 
		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/gioithieu_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);
	}

	public function themthongtin()
	{
		$ten     = $this->input->post('tenthongtin');
		$noidung = $this->input->post('noidungthongtin');
		$kieu  = $this->input->post('kieuthongtin');
		
		$this->Admin_model->addInfomation($ten,$noidung,$kieu);
		redirect('Admin/thongtin');
	}

	public function suathongtin($id)
	{
		$menu = $this->load->view('admin/include/menu.php', null, TRUE);
		$one_infomation = $this->Admin_model->getInfomationById($id);
		$data = array('menu' => $menu, 'thongtin' => $one_infomation); 
		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/gioithieu_edit_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);
	}

	public function do_suathongtin()
	{
		$id = $this->input->post('idthongtin');
		$name = $this->input->post('tenthongtin');
		$content = $this->input->post('noidungthongtin');
		$type = $this->input->post('kieuthongtin');

		if($this->Admin_model->updateInfomation($id,$name,$content,$type)){
			$link = base_url() . 'Admin/thongtin';
			redirect($link);
		}

	}

	public function xoathongtin()
	{
		$idxoa = $this->input->post('idxoa');
		$this->Admin_model->deleteInfomation($idxoa);		
	}

	// ============// 
	// ! SLIDE ẢNH //        
	// ============// 

	public function slideanh()
	{
		$menu      = $this->load->view('admin/include/menu.php', null, TRUE);
		$all_slide = $this->Admin_model->getSlideAnh();
		$data      = array('menu' => $menu, 'slideanh' => $all_slide); 
		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/slide_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);
	}

	public function themslideanh()
	{
		$link = $this->input->post('linkslide');

		$config['upload_path']   = './files/slide';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '100000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('anhslide')){
			$hinhanh = "NULL";
		}
		else{
			$data = $this->upload->data();
			$hinhanh = base_url() . 'files/slide/' . $data['file_name'];
		}

		$config['image_library']  = 'gd2';
		$config['source_image']   = 'files/slide/'.$data['file_name']; // ko lay base_url
		$config['create_thumb']   = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['master_dim']     = 'width';
		$config['width']          = 848;
		$config['height']         = 370;

		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);

		if($this->image_lib->resize()) {
			$config['image_library']  = 'gd2';
			$config['source_image']   = 'files/slide/'.$data['file_name'];
			$config['create_thumb']   = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['master_dim']     = 'height';
			$config['width']          = 848;
			$config['height']         = 370;

			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->crop();
		}


		$this->Admin_model->addSlideAnh($link,$hinhanh);
		redirect('Admin/slideanh');
	}

	public function xoaslideanh()
	{
		$idxoa = $this->input->post('idxoa');
		$this->Admin_model->deleteSlideAnh($idxoa);		
	}

	// ============================// 
	// ! BANNER QUẢNG CÁO 410 x 170//        
	// ============================// 

	public function banner()
	{
		$menu      = $this->load->view('admin/include/menu.php', null, TRUE);
		$all_banner = $this->Admin_model->getBanner();
		$data      = array('menu' => $menu, 'banner' => $all_banner); 
		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/banner_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);
	}


	public function thembanner()
	{
		$link = $this->input->post('linkbanner');

		$config['upload_path']   = './files/slide';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = '100000';
		
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('anhbanner')){
			$hinhanh = "NULL";
		}
		else{
			$data = $this->upload->data();
			$hinhanh = base_url() . 'files/slide/' . $data['file_name'];
		}

		$config['image_library']  = 'gd2';
		$config['source_image']   = 'files/slide/'.$data['file_name']; // ko lay base_url
		$config['create_thumb']   = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['master_dim']     = 'width';
		$config['width']          = 410;
		$config['height']         = 170;

		$this->load->library('image_lib', $config);
		$this->image_lib->initialize($config);

		if($this->image_lib->resize()) {
			$config['image_library']  = 'gd2';
			$config['source_image']   = 'files/slide/'.$data['file_name'];
			$config['create_thumb']   = FALSE;
			$config['maintain_ratio'] = FALSE;
			$config['master_dim']     = 'height';
			$config['width']          = 410;
			$config['height']         = 170;

			$this->load->library('image_lib', $config);
			$this->image_lib->initialize($config);
			$this->image_lib->crop();
		}


		$this->Admin_model->addBanner($link,$hinhanh);
		redirect('Admin/banner');
	}

	public function xoabanner()
	{
		$idxoa = $this->input->post('idxoa');
		$this->Admin_model->deleteBanner($idxoa);		
	}

	// ===========// 
	// ! ĐƠN HÀNG //        
	// ===========// 

	public function donhang()
	{
		$menu     = $this->load->view('admin/include/menu.php', null, TRUE);
		$donhang  = $this->Admin_model->getOrder();
		$doanhthu = $this->Admin_model->doanhThu();
		$data     = array(
			'menu'     => $menu, 
			'donhang'  => $donhang,
			'doanhthu' => $doanhthu
		); 
		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/donhang_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);
	}

	public function xoadonhang()
	{
		$idxoa = $this->input->post('idxoa');
		$this->Admin_model->deleteOrder($idxoa);		
	}

	public function chuyenxong($id)
	{
		if($this->Admin_model->setDoneOrder($id)) {
			$link = base_url() . 'Admin/donhang';
			redirect($link);	
		}
	}


	// ======================// 
	// ! EMAIL, SDT, ĐỈA CHỈ //        
	// ======================// 

	public function contact()
	{
		$menu    = $this->load->view('admin/include/menu.php', null, TRUE);
		$sdt     = $this->Admin_model->getContact('sdt');
		$email   = $this->Admin_model->getContact('email');
		$address = $this->Admin_model->getContact('address');
		
		$data = array(
			'menu'    => $menu, 
			'all_sdt'     => $sdt,
			'email'   => $email,
			'address' => $address
		); 
		$this->load->view('admin/include/header.php', null, FALSE);
		$this->load->view('admin/contact_Admin.php', $data);
		$this->load->view('admin/include/footer.php', null, FALSE);
	}

	public function suacontact_email()
	{
		$id = $this->input->post('id');
		$email = $this->input->post('email');
		$this->Admin_model->updateContact($id,$email);

	}

	public function suacontact_address()
	{
		$id      = $this->input->post('id');
		$address = $this->input->post('address');
		$this->Admin_model->updateContact($id,$address);
	}

	public function suacontact_sdt()
	{
		$id  = $this->input->post('id');
		$sdt = $this->input->post('sdt');
		$this->Admin_model->updateContact($id,$sdt);
	}



}

/* End of file admin.php */
/* Location: ./application/controllers/admin.php */