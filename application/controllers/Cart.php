<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Admin_model');
	}

	public function index()
	{
		$this->load->view('home/include/header.php', null, FALSE);
		$this->load->view('home/include/menutop.php', null, FALSE);
		$this->load->view('home/cart_view',null);
		$this->load->view('home/include/footer.php', null, FALSE);
	}

	public function add()
	{
		$this->load->library("cart");
		$data = array(
	        'id'      => $this->input->post('product_id'),
	        'qty'     => $this->input->post('product_quantity'),
	        'price'   => $this->input->post('product_price'),
	        'name'    => $this->input->post('product_name'),
	        'options' => array('size' => $this->input->post('product_size'), 'image' => $this->input->post('product_img'))
		);
		$this->cart->product_name_rules = '[:print:]';

		if($this->cart->insert($data)) {
			echo $this->cart_menu();
		}
	}


	function load()
	{
		echo $this->cart_menu();
	}

	function load_cart() {
		echo $this->view();
	}

	function load_order() {
		echo $this->cart_order();
	}

	function load_order_price() {
		echo $this->cart_order_price();
	}


	function remove()
	{
		$this->load->library("cart");
		$row_id = $_POST["row_id"];
		$data = array(
		'rowid'  => $row_id,
		'qty'  => 0
		);
		$this->cart->update($data);
		echo $this->cart_menu();
	}

	function clear()
	{
		$this->load->library("cart");
		$this->cart->destroy();
		echo $this->view();
	}
 
	public function cart_menu()
	{
		$this->load->library("cart");

		$output = '';
		$output .= '
		<div class="dropdown dropdown-cart" id="show_cart"> <a href="#" class="dropdown-toggle lnk-cart" data-toggle="dropdown">
            <div class="items-cart-inner">
              <div class="basket"> <i class="glyphicon glyphicon-shopping-cart"></i> </div>
              <div class="basket-item-count"><span class="count">'.count($this->cart->contents()).'</span></div>
              <div class="total-price-basket"> <span class="total-price"><span class="value">$'.$this->cart->total().'</span> </span> </div>
            </div>
            </a>
            <ul class="dropdown-menu">';
			foreach($this->cart->contents() as $items) {
				$output .= 
				'<li>
	                <div class="cart-item product-summary">
	                  <div class="row">
	                    <div class="col-xs-4">
	                      <div class="image"> <a href="detail.html"><img src="'.$items["options"]["image"].'" alt=""></a> </div>
	                    </div>
	                    <div class="col-xs-7">
	                      <h3 class="name"><a href="index.php?page-detail">'.$items["name"].' x '.$items["qty"].'</a></h3>
	                      <div class="price">$'.$items["price"].' </div>
	                    </div>
	                    <div class="col-xs-1 action"> <button style="background-color: lightblue" class="delete_cart" id="'.$items["rowid"].'"><i class="fa fa-trash"></i></button> </div>
	                  </div>
	                </div>
	            </li>
	            <hr>';
			}            
            $output .= '
            <div class="clearfix"></div>
            <div class="clearfix cart-total">
              <div class="pull-right"> <span class="text">Tổng :</span><span class="price">$'.$this->cart->total().' ₫</span> </div>
              <div class="clearfix"></div>
              <a href="'.base_url().'cart" class="btn btn-upper btn-primary btn-block m-t-20">Đặt hàng</a> 
            </div>
            <!-- /.cart-total--> 
            </ul>
            <!-- /.dropdown-menu--> 
          </div>';

          return $output;
	}

	public function cart_order()
	{
		$this->load->library("cart");

		$output = '';
		$count = 0;
		foreach($this->cart->contents() as $items) { 
			$count++;
			$output .= '[#]'.$count.' - Tên: '.$items["name"].' x '.$items["qty"].' :: Kích thước: '.$items["options"]["size"].' :: Giá: '.number_format($items["price"]).' ₫, ';
		}
		$output .= 'Total: $'.($this->cart->total()).'';
        return $output;
	}

	public function cart_order_price()
	{
		$this->load->library("cart");
		return $this->cart->total();
	}

	function view()
	{
		$this->load->library("cart");
		$output = '';
		$output .= '
			<table class="table">
			<thead>
				<tr>
					<th class="cart-romove item">Xóa</th>
					<th class="cart-description item">Hình ảnh</th>
					<th class="cart-product-name item">Tên Sản Phẩm</th>
					<th></th>
					<th class="cart-qty item">Số Lượng</th>
					<th class="cart-sub-total item">Giá</th>
					<th class="cart-total last-item">Số Lượng x Giá</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<td colspan="7">
						<div class="shopping-cart-btn">
							<span class="">
								<a href="'.base_url().'Home" class="btn btn-upper btn-primary outer-left-xs">Tiếp tục mua hàng</a>
								<button class="scrolldh btn btn-upper btn-primary pull-right outer-right-xs">Cuộn xuống để đặt hàng</button>
							</span>
						</div>
					</td>
				</tr>
			</tfoot>
			<tbody>
			';
		$count = 0;
		foreach($this->cart->contents() as $items)
		{
		$count++;
		$output .= '
			<tr>
				<td class="romove-item">
					<a href="#" id="'.$items["rowid"].'" title="cancel" class="icon delete_cart"><i class="fa fa-trash-o"></i></a>
				</td>
				<td class="cart-image">
					<a class="entry-thumbnail" href="'.base_url().'Home/sanpham/'.$items["id"].'">
					    <img src="'.$items["options"]["image"].'" alt="'.$items["options"]["image"].'">
					</a>
				</td>
				<td class="cart-product-name-info">
					<h4 class="cart-product-description"><a href="detail.html">'.$items["name"].'</a></h4>
					<div class="cart-product-info">
					<span class="product-color">Kích thước:<span>'.$items["options"]["size"].'</span></span>
					</div>
				</td>
				<td class="cart-product-edit"><a href="#" class="product-edit"></a></td>
				<td class="cart-product-quantity">
					<div class="quant-input">
			                <div class="arrows">
			                  <div class="arrow plus gradient"><span class="ir"><i class="icon fa fa-sort-asc"></i></span></div>
			                  <div class="arrow minus gradient"><span class="ir"><i class="icon fa fa-sort-desc"></i></span></div>
			                </div>
			                <input type="text" value="'.$items["qty"].'">
		              </div>
	            </td>
				<td class="cart-product-sub-total"><span class="cart-sub-total-price">$'.$items["price"].'</span></td>
				<td class="cart-product-grand-total"><span class="cart-grand-total-price">$'.$items["price"]*$items["qty"].'</span></td>
			</tr>
		';
		}
		$output .= '
			<div class="cart-grand-total pull-right" style="font-size: 18px">
					<span style="font-weight: bold; font-size: 30px">Tổng cộng: </span> <span class="inner-left-md badge" style="background-color: #fdd922; font-size: 30px; padding: 5px; border-radius: 5px; color: #444">$'.$this->cart->total().'</span>
				</div>
			</tbody>
		</table>
		';

		if($count == 0)
		{
			$output = '<h3 align="center">Giỏ hàng trống</h3>';
		}
		return $output;
	}

}



		
				
				

/* End of file Cart.php */
/* Location: ./application/controllers/Cart.php */