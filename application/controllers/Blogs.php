<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Crud_m'));

	}
	public function index()
	{

		$jumlah= $this->Crud_m->views_row('blogs','blogs_status','blogs_id','DESC');
		$config['base_url'] = base_url().'blogs/index/page/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 6;

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
			$config['per_page'] = 20;
			$data['promo_stat']   = 'class="active"';
			$data['header']   = 'Dapatkan Promo Menarik Hanya di Arkansys Jasa Digital Marketing Indonesia Terbaik';
			$data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
			$data['posts']= $this->Crud_m->view_one_limit('blogs','blogs_status','blogs_id','ASC',$dari,$config['per_page']);

		}else{
			redirect('main');
		}
		$this->pagination->initialize($config);
		$this->load->view('frontend/v_blogs',$data);

	}

	public function detail($id)
		{
			$config['per_page'] = 4;
			$row = $this->Crud_m->get_by_id_blogs($id);
			if ($this->uri->segment('4')==''){
				$dari = 0;
				}else{
					$dari = $this->uri->segment('4');
			}
			if ($row)
				{
					$data['posts']            = $this->Crud_m->get_by_id_blogs($id);
					$this->add_count_blogs($id);
					$data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
					$data['posts_product'] = $this->Crud_m->view_one_limit('products','products_status','products_id','RANDOM',$dari,$config['per_page']);
					$data['posts_blogs'] = $this->Crud_m->view_one_limit('blogs','blogs_status','blogs_id','RANDOM',$dari,$config['per_page']);
					$this->load->view('frontend/v_blogs_detail', $data);
				}
				else
						{
							$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger">
								<button type="button" class="close" data-dismiss="alert">&times;</button>Berita tidak ditemukan</b></div>');
							redirect(base_url());
						}
	}

	function add_count_blogs($id)
	{
			$check_visitor = $this->input->cookie(urldecode($id), FALSE);
			$ip = $this->input->ip_address();
			if ($check_visitor == false) {
					$cookie = array("name" => urldecode($id), "value" => "$ip", "expire" => time() + 10, "secure" => false);
					$this->input->set_cookie($cookie);
					$this->Crud_m->update_counter_blogs(urldecode($id));
			}
	}


}
