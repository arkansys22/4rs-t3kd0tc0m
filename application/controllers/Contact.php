<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model(array('Crud_m'));

	}
	public function index()
	{
		$data['identitas']= $this->Crud_m->get_by_id_identitas($id='1');
		$this->load->view('frontend/v_contact',$data);
	}
}
