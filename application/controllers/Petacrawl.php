<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Petacrawl extends CI_Controller {

 public function index(){
     $this->load->helper('url');
     $this->load->model('Sitemap_model');
     $data['blogs'] = $this->Sitemap_model->generate_blogs('blogs');
     $data['services'] = $this->Sitemap_model->generate_services('services');
     $this->load->view('v_sitemap',$data);
 }

}
