<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Crud_m'));

	}
	public function index()
	{
		$jumlah= $this->Crud_m->view_where('products',array('products_status'=>'publish','products_disc_status'=>'NON PROMO'))->num_rows();
		$config['base_url'] = base_url().'product/index/page/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 50;

		$config['full_tag_open']    = "<ul class='pagination fotolia-blog-pagination'>";
		$config['full_tag_close']   = "</ul>";
		$config['num_tag_open']     = "<li>";
		$config['num_tag_close']    = "</li>";
		$config['cur_tag_open']     = "<li class='disabled'><li class='page-item active'><a class='page-link' href='#'>";
		$config['cur_tag_close']    = "<span class='sr-only'></span></a></li>";
		$config['next_link']        = "<i class='fa fa-angle-right'></i>";
		$config['next_tag_open']    = "<li>";
		$config['next_tagl_close']  = "</li>";
		$config['prev_link']        = "<i class='fa fa-angle-left'></i>";
		$config['prev_tag_open']    = "<li>";
		$config['prev_tagl_close']  = "</li>";
		$config['first_link']       = "<i class='fa fa-angle-left'></i><i class='fa fa-angle-left'></i>";
		$config['first_tag_open']   = "<li>";
		$config['first_tagl_close'] = "</li>";
		$config['last_link']        = "<i class='fa fa-angle-right'></i><i class='fa fa-angle-right'></i>";
		$config['last_tag_open']    = "<li>";
		$config['last_tagl_close']  = "</li>";
		if ($this->uri->segment('4')==''){
			$dari = 0;
		}else{
			$dari = $this->uri->segment('4');
		}

		if (is_numeric($dari)) {
			$data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
			$data['posts'] = $this->Crud_m->view_join_one('products','products_category','products_cat_id',array('products_status'=>'publish'),'products_id','DESC',$dari,$config['per_page']);


		}else{
			redirect('main');
		}

		$this->pagination->initialize($config);
		$this->load->view('frontend/v_product',$data);
	}
	public function product_category($products_cat_id)
	{

			$row = $this->Crud_m->get_by_id_products_category($products_cat_id);
			if ($row)
				{
					$data['posts']            = $this->Crud_m->get_by_id_products_category($products_cat_id);
					$data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
					$this->load->view('frontend/v_product_category', $data);
				}
				else
						{
							$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>Berita tidak ditemukan</b></div>');
							redirect(base_url());
						}
				}

	public function detail($products_id)
  {

    	$row = $this->Crud_m->get_by_id_products($products_id);
    	if ($row)
        {
					$data['posts']            = $this->Crud_m->get_by_id_products($products_id);
					$data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
    			$this->load->view('frontend/v_product_detail', $data);
    		}
    		else
            {
        			$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>Berita tidak ditemukan</b></div>');
              redirect(base_url());
            }
  			}

	public function cart()
	{
		$data['posts_cat_product'] = $this->Crud_m->viewz('products_category','products_cat_id','RANDOM');
		$data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
		$this->load->view('frontend/v_cart',$data);
	}

	public function checkout()
	{
		$data['posts_cat_product'] = $this->Crud_m->viewz('products_category','products_cat_id','RANDOM');
		$data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
		$this->load->view('frontend/v_checkout',$data);
	}
	function add_count_products($products_id)
	{
	 $this->load->helper('cookie');
	 $check_visitor = $this->input->cookie(urldecode($products_id), FALSE);
	 $ip = $this->input->ip_address();
	 if ($check_visitor == false) {
			 $cookie = array("name" => urldecode($products_id), "value" => "$ip", "expire" => time() + 10, "secure" => false);
			 $this->input->set_cookie($cookie);
			 $this->Crud_m->update_counter_products(urldecode($products_id));
	 }
	}
	function add_to_cart()
	{


		$data_produk = array(
		'products_id' => $this->input->post('products_id'),
		'name' => $this->input->post('products_judul'),
		'price' => $this->input->post('products_harga_disc'),
		'options' => $this->input->post('products_ukuran'),
		'gambar' => $this->input->post('products_gambar'),
		'qty' => $this->input->post('quantity'),
		);
		$this->cart->insert($data_produk);
		redirect('cart');
	}

	function hapus_cart($rowid)
	{
		if ($rowid=="all")
			{
				$this->cart->destroy();
			}
		else
			{
				$data = array('rowid' => $rowid,
			  				  'qty' =>0);
				$this->cart->update($data);
			}
		redirect('cart');
	}

	function ubah_cart()
	{
			$cart_info = $_POST['cart'] ;
			foreach( $cart_info as $products_id => $cart)
			{
				$rowid = $cart['rowid'];
				$price = $cart['price'];
				$gambar = $cart['gambar'];
				$qty = $cart['qty'];
				$data_produk = array('rowid' => $rowid,
								'price' => $price,
								'gambar' => $gambar,
								'qty' => $qty);
				$this->cart->update($data_produk);
			}
			redirect('cart');
		}

	function proses_order()
	{
			$this->form_validation->set_rules('username','','required|min_length[5]|max_length[12]|is_unique[user.username]', array('required' => 'username masih kosong','is_unique' => 'Username telah digunakan, silahkan gunakan username lain.'));
			$this->form_validation->set_rules('email','','required|valid_email|is_unique[user.email]', array('required' => 'Email masih kosong','is_unique' => 'Email telah digunakan, silahkan gunakan email lain.'));
			if($this->form_validation->run() === FALSE){
				redirect(base_url("checkout"));
			}else{

			//-------------------------Input data pelanggan--------------------------
			$enc_password = sha1($this->input->post('password'));
			$data_user = array(
								'username' => $this->input->post('username'),
								'email' => $this->input->post('email'),
								'password' => $enc_password,
								'user_status' => $this->input->post('user_status'),
								'level' => $this->input->post('level'),
								'user_post_hari'=>hari_ini(date('w')),
								'user_post_tanggal'=>date('Y-m-d'),
								'user_post_jam'=>date('H:i:s'),
								'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
								'nama' => $this->input->post('nama'));
			$id_pelanggan = $this->Crud_m->tambah_user($data_user);
			//-------------------------Input data user detail------------------------------
			$data_user_detail = array(
								'user_detail_no_telp' => $this->input->post('no_tlp'),
								'user_detail_alamat' => $this->input->post('alamat'),
								'user_detail_kc' => $this->input->post('kecamatan'),
								'user_detail_kb' => $this->input->post('kab'),
								'user_detail_prov' => $this->input->post('prov'),
								'user_detail_pos' => $this->input->post('pos'),
								'user_detail_negara' => $this->input->post('negara'),
						   	'id_user' => $id_pelanggan);
								$this->Crud_m->tambah_user_detail($data_user_detail);
			//-------------------------Input data order------------------------------
			$data_order = array(
								'products_order_catatan' => $this->input->post('catatan'),
								'products_post_hari'=>hari_ini(date('w')),
								'products_post_tanggal'=>date('Y-m-d'),
								'products_post_jam'=>date('H:i:s'),
						   	'products_order_oleh_user' => $id_pelanggan);
			$id_order = $this->Crud_m->tambah_order($data_order);
			//-------------------------Input data detail order-----------------------
			if ($cart = $this->cart->contents())
				{
					foreach ($cart as $item)
						{
							$data_detail = array(
								'products_order_id' =>$id_order,
								'products_id' => $item['products_id'],
								'products_order_detail_qty' => $item['qty'],
								'products_order_detail_ukuran' => $item['options'],
								'products_order_detail_harga' => $item['price']);
							$proses = $this->Crud_m->tambah_detail_order($data_detail);
						}
				}
			//-------------------------Hapus shopping cart--------------------------
			$this->cart->destroy();


			$data['posts_cat_product'] = $this->Crud_m->viewz('products_category','products_cat_id','RANDOM');
			$data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
			$this->load->view('frontend/v_prosesorder',$data);
		}

	}


}
