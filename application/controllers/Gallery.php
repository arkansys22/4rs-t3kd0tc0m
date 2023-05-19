<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Crud_m'));

	}
	public function index()
	{
		$jumlah= $this->Crud_m->view_where('gallery',array('gallery_status'=>'publish'))->num_rows();
		$config['base_url'] = base_url().'gallery/index/page/';
		$config['total_rows'] = $jumlah;
		$config['per_page'] = 12;

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
			$data['posts'] = $this->Crud_m->view_where_orderings('gallery',array('gallery_status'=>'publish'),'gallery_id','DESC');


		}else{
			redirect('main');
		}

		$this->pagination->initialize($config);
		$this->load->view('frontend/v_gallery',$data);
	}
}
