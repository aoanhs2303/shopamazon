<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
require('mail/PHPMailerAutoload.php');
class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
		$this->load->model('Amazon_model');
	}

	public function index()
	{
		$category     = $this->Amazon_model->getCategory();
		$product_side = $this->Admin_model->getHotProductSide();
		$data_side    = array(
			'danhmuc'  => $category,
			'side_hot' => $product_side
		);
		$sidebar         = $this->load->view('home/include/sidebar', $data_side, TRUE);
		$dichvu          = $this->Admin_model->getService();
		$slideanh        = $this->Admin_model->getSlideAnh();
		$banner          = $this->Admin_model->getBanner();
		$contact_sdt     = $this->Admin_model->getContact('sdt');
		$contact_email   = $this->Admin_model->getContact('email');
		$contact_address = $this->Admin_model->getContact('address');


		$data_main = array(
			'sidebar'      => $sidebar,
			'dichvu'       => $dichvu,
			'slideanh'     => $slideanh,
			'banner'       => $banner,
			'sdt'          => $contact_sdt,
			'email'        => $contact_email,
			'address'      => $contact_address
		);

		

		$data_footer = array(
			'sdt'     => $contact_sdt,
			'email'   => $contact_email,
			'address' => $contact_address
		);

		$this->load->view('home/include/header.php', null, FALSE);
		$this->load->view('home/include/menutop.php', null, FALSE);
		$this->load->view('home/home_view',$data_main);
		$this->load->view('home/include/footer.php', $data_footer, FALSE);
	}

	public function sanpham($idsp)
	{
		$category     = $this->Admin_model->getCategory();
		$data_side    = array(
			'danhmuc'  => $category,
		);
		$sidebar        = $this->load->view('home/include/sidebar', $data_side, TRUE);
		
		$data_main = array(
			'sidebar'  => $sidebar,

		);

		$this->load->view('home/include/header.php', null, FALSE);
		$this->load->view('home/include/menutop.php', null, FALSE);
		$this->load->view('home/sanpham_view',$data_main);
		$this->load->view('home/include/footer.php', null, FALSE);
	}

	public function danhmuc($id)
	{
		$category     = $this->Admin_model->getCategory();
		$product_side = $this->Admin_model->getHotProductSide();
		$data_side    = array(
			'danhmuc'  => $category,
			'side_hot' => $product_side
		);
		$sidebar     = $this->load->view('home/include/sidebar', $data_side, TRUE);
		$slideanh    = $this->Admin_model->getSlideAnh();
		$data_main = array(
			'sidebar'  => $sidebar,
			'slideanh' => $slideanh
		);

		$category_van  = $this->Admin_model->getCategory_Van('van');
		$category_lot  = $this->Admin_model->getCategory_Van('lot');
		$category_khac = $this->Admin_model->getCategory_Van('khac');
		$data_menu = array(
			'category_van' => $category_van,
			'category_lot' => $category_lot,
			'category_khac' => $category_khac
		);

		$this->load->view('home/include/header.php', null, FALSE);
		$this->load->view('home/include/menutop.php', $data_menu, FALSE);
		$this->load->view('home/danhmuc_view',$data_main);
		$this->load->view('home/include/footer.php', null, FALSE);
	}

	public function gioithieu()
	{
		$category     = $this->Admin_model->getCategory();
		$product_side = $this->Admin_model->getHotProductSide();
		$data_side    = array(
			'danhmuc'  => $category,
			'side_hot' => $product_side
		);
		$sidebar       = $this->load->view('home/include/sidebar', $data_side, TRUE);

		$category_van  = $this->Admin_model->getCategory_Van('van');
		$category_lot  = $this->Admin_model->getCategory_Van('lot');
		$category_khac = $this->Admin_model->getCategory_Van('khac');

		$gioithieu = $this->Admin_model->getGioiThieu();
		$data_main = array(
			'sidebar'   => $sidebar,
			'gioithieu' => $gioithieu
		);

		$data_menu = array(
			'category_van' => $category_van,
			'category_lot' => $category_lot,
			'category_khac' => $category_khac
		);
		$this->load->view('home/include/header.php', null, FALSE);
		$this->load->view('home/include/menutop.php', $data_menu, FALSE);
		$this->load->view('home/blog_view', $data_main);
		$this->load->view('home/include/footer.php', null, FALSE);
	}

	public function dichvu()
	{
		$category     = $this->Admin_model->getCategory();
		$product_side = $this->Admin_model->getHotProductSide();
		$data_side    = array(
			'danhmuc'  => $category,
			'side_hot' => $product_side
		);
		$sidebar       = $this->load->view('home/include/sidebar', $data_side, TRUE);

		$category_van  = $this->Admin_model->getCategory_Van('van');
		$category_lot  = $this->Admin_model->getCategory_Van('lot');
		$category_khac = $this->Admin_model->getCategory_Van('khac');

		$dichvu = $this->Admin_model->getService();
		$data_main = array(
			'sidebar'   => $sidebar,
			'dichvu' => $dichvu
		);

		$data_menu = array(
			'category_van' => $category_van,
			'category_lot' => $category_lot,
			'category_khac' => $category_khac
		);
		$this->load->view('home/include/header.php', null, FALSE);
		$this->load->view('home/include/menutop.php', $data_menu, FALSE);
		$this->load->view('home/dichvu_view', $data_main);
		$this->load->view('home/include/footer.php', null, FALSE);		
	}

	public function dichvu_chitiet($id)
	{
		$category     = $this->Admin_model->getCategory();
		$product_side = $this->Admin_model->getHotProductSide();
		$data_side    = array(
			'danhmuc'  => $category,
			'side_hot' => $product_side
		);
		$sidebar       = $this->load->view('home/include/sidebar', $data_side, TRUE);

		$category_van  = $this->Admin_model->getCategory_Van('van');
		$category_lot  = $this->Admin_model->getCategory_Van('lot');
		$category_khac = $this->Admin_model->getCategory_Van('khac');

		$dichvu = $this->Admin_model->getServiceById($id);
		$data_main = array(
			'sidebar'   => $sidebar,
			'dichvu' => $dichvu
		);

		$data_menu = array(
			'category_van' => $category_van,
			'category_lot' => $category_lot,
			'category_khac' => $category_khac
		);
		$this->load->view('home/include/header.php', null, FALSE);
		$this->load->view('home/include/menutop.php', $data_menu, FALSE);
		$this->load->view('home/dichvu_chitiet_view', $data_main);
		$this->load->view('home/include/footer.php', null, FALSE);
	}

	public function bando()
	{
		$category     = $this->Admin_model->getCategory();
		$product_side = $this->Admin_model->getHotProductSide();
		$data_side    = array(
			'danhmuc'  => $category,
			'side_hot' => $product_side
		);
		$sidebar       = $this->load->view('home/include/sidebar', $data_side, TRUE);

		$category_van  = $this->Admin_model->getCategory_Van('van');
		$category_lot  = $this->Admin_model->getCategory_Van('lot');
		$category_khac = $this->Admin_model->getCategory_Van('khac');

		$data_main = array( 'sidebar' => $sidebar);

		$data_menu = array(
			'category_van' => $category_van,
			'category_lot' => $category_lot,
			'category_khac' => $category_khac
		);
		$this->load->view('home/include/header.php', null, FALSE);
		$this->load->view('home/include/menutop.php', $data_menu, FALSE);
		$this->load->view('home/bando_view', $data_main);
		$this->load->view('home/include/footer.php', null, FALSE);
	}

	public function huongdanmuahang()
	{
		$category     = $this->Admin_model->getCategory();
		$product_side = $this->Admin_model->getHotProductSide();
		$data_side    = array(
			'danhmuc'  => $category,
			'side_hot' => $product_side
		);
		$sidebar       = $this->load->view('home/include/sidebar', $data_side, TRUE);

		$category_van  = $this->Admin_model->getCategory_Van('van');
		$category_lot  = $this->Admin_model->getCategory_Van('lot');
		$category_khac = $this->Admin_model->getCategory_Van('khac');

		$huongdan = $this->Admin_model->getHuongDanMuaHang();
		$data_main = array( 
			'sidebar'  => $sidebar,
			'huongdan' => $huongdan
		);
		

		$data_menu = array(
			'category_van' => $category_van,
			'category_lot' => $category_lot,
			'category_khac' => $category_khac
		);
		$this->load->view('home/include/header.php', null, FALSE);
		$this->load->view('home/include/menutop.php', $data_menu, FALSE);
		$this->load->view('home/huongdanmuahang_view', $data_main);
		$this->load->view('home/include/footer.php', null, FALSE);		
	}

	public function themdonhang()
	{
		$sanpham = $this->input->post('sanpham_dh');
		$name    = $this->input->post('ten_dh');
		$sdt     = $this->input->post('sdt_dh');
		$email   = $this->input->post('email_dh');
		$diachi  = $this->input->post('diachi_dh');
		$price   = $this->input->post('price_dh');

		if($this->Admin_model->addOrder($sanpham,$name,$sdt,$email,$diachi,$price)) {
			// $link = base_url() . 'cart';
			// redirect($link);
		}
		
		$content = '
		Người đặt: '.$name.' .<br>
		Sđt: '.$sdt.' .<br>
		Email: '.$email.' .<br>
		Địa chỉ giao hàng: '.$diachi.' .<br>
		Sản phẩm: '.$sanpham.' .<br>
		';
        $mail = new PHPMailer;
        
        $mail->isSMTP(); // Mở cái này lên là lỗi nữa  

        //Set SMTP host name         
        $mail->CharSet = 'UTF-8';
                            
        $mail->Host = "smtp.gmail.com";
        //Set this to true if SMTP host requires authentication to send email
        $mail->SMTPAuth = true;                          
        //Provide username and password     
        $mail->Username = "trannhulucs2303@gmail.com";                 
        $mail->Password = "jwxiksinsogpmzcm";                           
        //If SMTP requires TLS encryption then set it
        $mail->SMTPSecure = "tls";                           
        //Set TCP port to connect to 
        $mail->Port = 587;                                   
    
        $mail->From = "trannhulucs2303@gmail.com";
        $mail->FromName = "Đơn đặt hàng từ gothanhcong.com";
    
        $mail->addAddress($email, $name);
        $mail->addAddress("trannhulucs2303@gmail.com", $name);
    
        $mail->isHTML(true);
    
        $mail->Subject = 'Đơn đặt hàng từ gothanhcong.com';
        $mail->Body = $content;
        // $mail->AltBody = "This is the plain text version of the email content";
    
        if(!$mail->send()) {
            $_SESSION["ErrorMessage"] = "Mailer Error: " . $mail->ErrorInfo;
            echo "Thất bại";
            echo "<pre>";
            var_dump($mail->ErrorInfo);
            echo "</pre>";
        } else {
        	$this->dathangthanhcong();
        }		

	}

	public function search()
	{
		$tukhoa = $this->input->get('search_fill');
		$search_res = $this->Admin_model->searchHome($tukhoa);
		$res_empty = "";
		if(empty($search_res)) {
			$res_empty = "Không tìm thấy sản phẩm cho \"$tukhoa\"";
		}

		$category     = $this->Admin_model->getCategory();
		$product_side = $this->Admin_model->getHotProductSide();
		$data_side    = array(
			'danhmuc'  => $category,
			'side_hot' => $product_side
		);
		$sidebar     = $this->load->view('home/include/sidebar', $data_side, TRUE);

		$data_main = array(
			'sidebar'  => $sidebar,
			'products' => $search_res,
			'tukhoa'   => $tukhoa,
			'koketqua' => $res_empty
		);


		$this->load->view('home/include/header.php', null, FALSE);
		$this->load->view('home/include/menutop.php', null, FALSE);
		$this->load->view('home/timkiem_view',$data_main);
		$this->load->view('home/include/footer.php', null, FALSE);

	}

	public function dathangthanhcong()
	{
		$category     = $this->Admin_model->getCategory();
		$product_side = $this->Admin_model->getHotProductSide();
		$data_side    = array(
			'danhmuc'  => $category,
			'side_hot' => $product_side
		);
		$sidebar       = $this->load->view('home/include/sidebar', $data_side, TRUE);

		$category_van  = $this->Admin_model->getCategory_Van('van');
		$category_lot  = $this->Admin_model->getCategory_Van('lot');
		$category_khac = $this->Admin_model->getCategory_Van('khac');
		$contact_sdt     = $this->Admin_model->getContact('sdt');
		$contact_email   = $this->Admin_model->getContact('email');
		$contact_address = $this->Admin_model->getContact('address');

		$data_main = array( 
			'sidebar' => $sidebar,
			'sdt'          => $contact_sdt,
			'email'        => $contact_email,
			'address'      => $contact_address
		);

		$data_menu = array(
			'category_van' => $category_van,
			'category_lot' => $category_lot,
			'category_khac' => $category_khac
		);
		$this->load->view('home/include/header.php', null, FALSE);
		$this->load->view('home/include/menutop.php', $data_menu, FALSE);
		$this->load->view('home/thanhcong_view', $data_main);
		$this->load->view('home/include/footer.php', null, FALSE);
	}

	public function login()
	{
		$category     = $this->Admin_model->getCategory();
		$product_side = $this->Admin_model->getHotProductSide();
		$data_side    = array(
			'danhmuc'  => $category,
			'side_hot' => $product_side
		);
		$sidebar       = $this->load->view('home/include/sidebar', $data_side, TRUE);

		$category_van  = $this->Admin_model->getCategory_Van('van');
		$category_lot  = $this->Admin_model->getCategory_Van('lot');
		$category_khac = $this->Admin_model->getCategory_Van('khac');

		$data_main = array( 'sidebar' => $sidebar);

		$data_menu = array(
			'category_van' => $category_van,
			'category_lot' => $category_lot,
			'category_khac' => $category_khac
		);

		$contact_sdt     = $this->Admin_model->getContact('sdt');
		$contact_email   = $this->Admin_model->getContact('email');
		$contact_address = $this->Admin_model->getContact('address');
		$data_footer = array(
			'sdt'     => $contact_sdt,
			'email'   => $contact_email,
			'address' => $contact_address
		);

		$this->load->view('home/include/header.php', null, FALSE);
		$this->load->view('home/include/menutop.php', $data_menu, FALSE);
		$this->load->view('home/login_view',$data_main);
		$this->load->view('home/include/footer.php', $data_footer, FALSE);
	}

}

/* End of file Home.php */
/* Location: ./application/controllers/Home.php */