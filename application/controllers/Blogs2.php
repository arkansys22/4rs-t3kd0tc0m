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
		$jumlah= $this->Crud_m->view_where('products',array('products_status'=>'publish','products_disc_status'=>'NON PROMO'))->num_rows();
		$config['base_url'] = base_url().'product/index/page/';
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
			$data['posts'] = $this->Crud_m->view_join_one('products','products_category','products_cat_id',array('products_status'=>'publish'),'products_id','DESC',$dari,$config['per_page']);


		}else{
			redirect('main');
		}

		$this->pagination->initialize($config);
		$this->load->view('frontend/v_services',$data);
	}

	public function detail($products_id)
  {

    	$row = $this->Crud_m->get_by_id_products($products_id);
    	if ($row)
        {
					$data['posts']            = $this->Crud_m->get_by_id_products($products_id);
					$data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
    			$this->load->view('frontend/v_services_detail', $data);
    		}
    		else
            {
        			$this->session->set_flashdata('message', '<div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">&times;</button>Berita tidak ditemukan</b></div>');
              redirect(base_url());
            }
  			}


}
