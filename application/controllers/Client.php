<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Client extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Crud_m'));

	}
	public function index()
	{
		if ($this->uri->segment('4')==''){
			$dari = 0;
		}else{
			$dari = $this->uri->segment('4');
		}
		if (is_numeric($dari)) {
		$config['per_page'] = 3;
		$config['per_page2'] = 12;
		$data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
		$data['posts_blogs'] = $this->Crud_m->view_one_limit('blogs','blogs_status','blogs_id','RANDOM',$dari,$config['per_page']);
		$data['posts_cat_product'] = $this->Crud_m->view_one_limit('products_category','products_cat_status','products_cat_id','RANDOM',$dari,$config['per_page2']);
		$data['posts_product'] = $this->Crud_m->view_join_where_publish('products','products_category','products_cat_id','products_status','products_disc_status','products_id','RANDOM',$dari,$config['per_page2']);
		$data['posts_product_disc'] = $this->Crud_m->view_join_where_promo('products','products_category','products_cat_id','products_status','products_disc_status','products_id','RANDOM',$dari,$config['per_page2']);
		$data['posts_sliders'] = $this->Crud_m->view_one_limit('sliders','sliders_status','sliders_id','RANDOM',$dari,$config['per_page']);
		}else{
			redirect('main');
		}
	$this->load->view('frontend/v_client', $data);
	}
}
