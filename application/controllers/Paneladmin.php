<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Paneladmin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->model(array('Panel_m','Crud_m'));
		$this->load->helper(array('form', 'url','custom'));
		$this->load->library(array('session', 'form_validation','mylibrary','email','upload'));
	}
	public function index()
	{
			redirect(base_url('login'));
	}
	public function home()
	{
		if ($this->session->level=='1'){
			$data['karyawan_menu_open']   = '';
			$data['home_stat']   = 'active';
			$data['identitas_stat']   = '';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = '';
			$data['products_stat']   = '';
			$data['cat_products_stat']   = '';
			$data['testimonial_stat']   = '';
			$data['blogs_stat']   = '';
			$data['message_stat']   = '';
			$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';

			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';
			$this->load->view('backend/home', $data);
		}elseif ($this->session->level=='2'){
			$data['karyawan_menu_open']   = '';
			$data['home_stat']   = 'active';
			$data['identitas_stat']   = '';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = '';
			$data['products_stat']   = '';
			$data['cat_products_stat']   = '';
			$data['testimonial_stat']   = '';
			$data['blogs_stat']   = '';
			$data['message_stat']   = '';
			$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

			$this->load->view('backend/home', $data);
		}elseif ($this->session->level=='3'){
            $data['karyawan_menu_open']   = '';
			$data['home_stat']   = 'active';
			$data['identitas_stat']   = '';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = '';
			$data['products_stat']   = '';
			$data['cat_products_stat']   = '';
			$data['testimonial_stat']   = '';
			$data['blogs_stat']   = '';
			$data['message_stat']   = '';
			$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';
				$this->load->view('backend/home', $data);
		}else{
			redirect(base_url());
		}
	}
	public function login()
	{
            $data['title'] = 'Sign In';

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');
            if($this->form_validation->run() === FALSE){
                $this->load->view('backend/index', $data);
            } else {

                $username = $this->input->post('username');
                $password = sha1($this->input->post('password'));
								$cek = $this->Panel_m->cek_login($username,$password,'user');
							    $row = $cek->row_array();
							    $total = $cek->num_rows();
									if ($total > 0){
										$this->session->set_userdata(
											array(
												'username'=>$row['username'],
												'level'=>$row['level'],
												'id_users'=>$row['id_users'],
												'id_session'=>$row['id_session']));

										 $this->session->set_flashdata('user_loggedin','Selamat Anda Berhasil Login');
										$id = array('id_session' => $this->session->id_session);
									 	$data = array('user_login_status'=>'online','user_login_tanggal'=> date('Y-m-d'),'user_login_jam'=> date('H:i:s'));
									 	$this->db->update('user', $data, $id);
										redirect('paneladmin/home');
									}else {
                    // Set message
                    $this->session->set_flashdata('login_failed', 'Username Dan Password salah!');

                    redirect(base_url('login'));
                }
            }
        }
	public function register()
	{
						$data['title'] = 'Sign Up';
            $this->form_validation->set_rules('username','','required|min_length[5]|max_length[12]|is_unique[user.username]', array('required' => 'username masih kosong','is_unique' => 'Username telah digunakan, silahkan gunakan username lain.'));
						$this->form_validation->set_rules('nama','','required', array('required'=>'Nama masih kosong'));
            $this->form_validation->set_rules('email','','required|valid_email|is_unique[user.email]', array('required' => 'Email masih kosong','is_unique' => 'Email telah digunakan, silahkan gunakan email lain.'));
            $this->form_validation->set_rules('password','','required', array('required'=>'Password masih kosong'));
            $this->form_validation->set_rules('password2', '','required|matches[password]', array('required' => 'Konfirmasi password masih kosong','matches'=>'Password tidak sama! Cek kembali password Anda'));

            if($this->form_validation->run() === FALSE){
                $this->load->view('backend/register', $data);
            }else{
                $enc_password = sha1($this->input->post('password'));
								$data_user = array(
													'username' => $this->input->post('username'),
													'email' => $this->input->post('email'),
													'password' => $enc_password,
													'user_status' => '1',
													'level' => '4',
													'user_post_hari'=>hari_ini(date('w')),
													'user_post_tanggal'=>date('Y-m-d'),
													'user_post_jam'=>date('H:i:s'),
													'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
													'nama' => $this->input->post('nama'));
								$id_pelanggan = $this->Crud_m->tambah_user($data_user);
								$data_user_detail = array(
											   	'id_user' => $id_pelanggan);
								$this->Crud_m->tambah_user_detail($data_user_detail);

                $this->session->set_flashdata('user_registered', 'You are now registered and can log in');

                redirect(base_url("login"));
            }
			}
	public function check_username_exists($username)
	{
					 $this->form_validation->set_message('check_username_exists', 'Username Sudah diambil. Silahkan gunakan username lain');
					 if($this->Panel_m->check_username_exists($username)){
							 return true;
					 } else {
							 return false;
					 }
	}
	public function check_email_exists($email)
	{
            $this->form_validation->set_message('check_email_exists', 'Email Sudah diambil. Silahkan gunakan email lain');
            if($this->Panel_m->check_email_exists($email)){
                return true;
            } else {
                return false;
            }
  }
	public function logout()
	{
		$id = array('id_session' => $this->session->id_session);
						$data = array('user_login_status'=>'offline');
						$this->db->update('user', $data, $id);
            // Unset user data
            $this->session->unset_userdata('logged_in');
            $this->session->unset_userdata('user_id');
            $this->session->unset_userdata('username');

            // Set message
            $this->session->set_flashdata('user_logout', 'You are now logged out');
						$this->session->sess_destroy();
            redirect(base_url());
    }
	public function profil()
	{
		cek_session_akses($this->session->id_session);
		if (isset($_POST['submit'])){
			$config['upload_path'] = 'bahan/foto_profil/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_profil/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '90%';
			$config['width']= 200;
			$config['height']= 200;
			$config['new_image']= './bahan/foto_profil/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

				if ($hasil22['file_name']=='' AND $this->input->post('password')=='' ){
									          $data = array(
																'email'=>$this->db->escape_str($this->input->post('email')),
																'nama'=>$this->input->post('nama'),
																'user_update_hari'=>hari_ini(date('w')),
																'user_update_tanggal'=>date('Y-m-d'),
																'user_update_jam'=>date('H:i:s'));
																$where = array('id_user' => $this->input->post('id_user'));
						    								$this->db->update('user',$data,$where);
															}else if ($this->input->post('password')=='' ){
																$data = array(
																'user_gambar'=>$hasil22['file_name'],
																'email'=>$this->db->escape_str($this->input->post('email')),
																'nama'=>$this->input->post('nama'),
																'user_update_hari'=>hari_ini(date('w')),
																'user_update_tanggal'=>date('Y-m-d'),
																'user_update_jam'=>date('H:i:s'));
																$where = array('id_user' => $this->input->post('id_user'));
																$_image = $this->db->get_where('user',$where)->row();
																$query = $this->db->update('user',$data,$where);
																if($query){
																	unlink("bahan/foto_profil/".$_image->user_gambar);
																}
															}else if ($hasil22['file_name']==''){
																$data = array(
																'email'=>$this->db->escape_str($this->input->post('email')),
																'nama'=>$this->input->post('nama'),
																'password'=>sha1($this->input->post('password')),
																'user_update_hari'=>hari_ini(date('w')),
																'user_update_tanggal'=>date('Y-m-d'),
																'user_update_jam'=>date('H:i:s'));
																$where = array('id_user' => $this->input->post('id_user'));
						    								$this->db->update('user',$data,$where);
															}else{
															$data = array(
																'user_gambar'=>$hasil22['file_name'],
																'email'=>$this->db->escape_str($this->input->post('email')),
																'nama'=>$this->input->post('nama'),
																'password'=>sha1($this->input->post('password')),
																'user_update_hari'=>hari_ini(date('w')),
																'user_update_tanggal'=>date('Y-m-d'),
																'user_update_jam'=>date('H:i:s'));
																$where = array('id_user' => $this->input->post('id_user'));
																$_image = $this->db->get_where('user',$where)->row();
																$query = $this->db->update('user',$data,$where);
																if($query){
																	unlink("bahan/foto_profil/".$_image->user_gambar);
																}
															}
			redirect('paneladmin/profil');
		}else{
		$proses = $this->Panel_m->edit('user', array('username' => $this->session->username))->row_array();
		$data = array('record' => $proses);
				$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = 'active';
			$data['produk_menu_open']   = '';
			$data['produk_category']   = '';
			$data['produk']   = '';
			$data['services']   = '';

			$data['post'] = $this->Panel_m->view_ordering('user_detail','id_user','ASC');
			if ($this->session->level=='1'){
					$data['recordall'] = $this->Crud_m->view_where_ordering('user',array('user_status'=>'1'),'id_user','DESC');
			}else{
			}
			$this->load->view('backend/profil/profilall', $data);
			}
		}
	public function user_update()
	{
				cek_session_akses($this->session->id_session);
				$id = $this->uri->segment(3);
				if (isset($_POST['submit'])){
					$config['upload_path'] = 'bahan/foto_profil/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_profil/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '90%';
					$config['width']= 200;
					$config['height']= 200;
					$config['new_image']= './bahan/foto_profil/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($hasil22['file_name']=='' AND $this->input->post('password')=='' ){
										          $data = array(
																	'email'=>$this->db->escape_str($this->input->post('email')),
																	'nama'=>$this->input->post('nama'),
																	'level'=>$this->input->post('level'),
																	'user_status'=>$this->input->post('user_status'),
																	'user_update_hari'=>hari_ini(date('w')),
																	'user_update_tanggal'=>date('Y-m-d'),
																	'user_update_jam'=>date('H:i:s'));
																	$where = array('id_session' => $this->input->post('id_session'));
							    								$this->db->update('user',$data,$where);
																}else if ($this->input->post('password')=='' ){
																	$data = array(
																	'user_gambar'=>$hasil22['file_name'],
																	'email'=>$this->db->escape_str($this->input->post('email')),
																	'nama'=>$this->input->post('nama'),
																	'level'=>$this->input->post('level'),
																	'user_status'=>$this->input->post('user_status'),
																	'user_update_hari'=>hari_ini(date('w')),
																	'user_update_tanggal'=>date('Y-m-d'),
																	'user_update_jam'=>date('H:i:s'));
																	$where = array('id_session' => $this->input->post('id_session'));
																	$_image = $this->db->get_where('user',$where)->row();
																	$query = $this->db->update('user',$data,$where);
																	if($query){
																		unlink("bahan/foto_profil/".$_image->user_gambar);
																	}
																}else if ($hasil22['file_name']==''){
																	$data = array(
																	'email'=>$this->db->escape_str($this->input->post('email')),
																	'nama'=>$this->input->post('nama'),
																	'password'=>sha1($this->input->post('password')),
																	'level'=>$this->input->post('level'),
																	'user_status'=>$this->input->post('user_status'),
																	'user_update_hari'=>hari_ini(date('w')),
																	'user_update_tanggal'=>date('Y-m-d'),
																	'user_update_jam'=>date('H:i:s'));
																	$where = array('id_session' => $this->input->post('id_session'));
							    								$this->db->update('user',$data,$where);
																}else{
																$data = array(
																	'user_gambar'=>$hasil22['file_name'],
																	'email'=>$this->db->escape_str($this->input->post('email')),
																	'nama'=>$this->input->post('nama'),
																	'password'=>sha1($this->input->post('password')),
																	'level'=>$this->input->post('level'),
																	'user_status'=>$this->input->post('user_status'),
																	'user_update_hari'=>hari_ini(date('w')),
																	'user_update_tanggal'=>date('Y-m-d'),
																	'user_update_jam'=>date('H:i:s'));
																	$where = array('id_session' => $this->input->post('id_session'));
																	$_image = $this->db->get_where('user',$where)->row();
																	$query = $this->db->update('user',$data,$where);
																	if($query){
																		unlink("bahan/foto_profil/".$_image->user_gambar);
																	}
																}

					redirect('paneladmin/profil');
				}else{
				if ($this->session->level=='1'){
							 $proses = $this->Panel_m->edit('user', array('id_session' => $id))->row_array();
					}else{
							$proses = $this->Panel_m->edit('user', array('id_session' => $id))->row_array();
					}
					$data = array('rows' => $proses);
					$data['karyawan_menu_open']   = '';
					$data['home_stat']   = '';
					$data['identitas_stat']   = '';
					$data['profil_stat']   = 'active';
					$data['sliders_stat']   = '';
					$data['products_stat']   = '';
					$data['cat_products_stat']   = '';
					$data['testimonial_stat']   = '';
					$data['blogs_stat']   = '';
					$data['message_stat']   = '';
					$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
					$data['post'] = $this->Panel_m->view_ordering('user_detail','id_user','ASC');
					if ($this->session->level=='1'){
							$data['recordall'] = $this->Crud_m->view_where_ordering('user',array('user_status'=>'active'),'id_user','DESC');
					}else{
					}
					$data['records'] = $this->Crud_m->view_ordering('user_level','user_level_id','DESC');
					$data['record_status'] = $this->Crud_m->view_ordering('user_status','user_status_id','DESC');
					$this->load->view('backend/profil/profiledit', $data);
					}
			}
	public function user_storage_bin()
	{
				cek_session_akses ($this->session->id_session);
				$data['karyawan_menu_open']   = '';
				$data['home_stat']   = '';
				$data['identitas_stat']   = '';
				$data['profil_stat']   = 'active';
				$data['sliders_stat']   = '';
				$data['products_stat']   = '';
				$data['cat_products_stat']   = '';
				$data['testimonial_stat']   = '';
				$data['blogs_stat']   = '';
				$data['message_stat']   = '';
				$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';

						if ($this->session->level=='1'){
								$data['recordall'] = $this->Crud_m->view_where_ordering('user',array('user_status'=>'2'),'id_user','DESC');
						}else{
								$data['recordall'] = $this->Crud_m->view_where_ordering('user',array('user_status'=>'2'),'id_user','DESC');
						}
						$this->load->view('backend/profil/profilblock', $data);
			}
	public function user_delete()
	{
					cek_session_akses ('profil',$this->session->id_session);
					$id = $this->uri->segment(3);
					$_id = $this->db->get_where('user',['id_session' => $id])->row();
					 $query = $this->db->delete('user',['id_session'=>$id]);
				 	if($query){
									 unlink("./bahan/foto_profil/".$_id->user_gambar);
				 }
				redirect('paneladmin/user_storage_bin');
			}

	function identitaswebsite()
	{
		cek_session_akses($this->session->id_session);
		if (isset($_POST['submit'])){
					$config['upload_path'] = 'bahan/backend/foto/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('logo');
					$hasillogo=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/backend/foto/'.$hasillogo['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '100%';
					$config['new_image']= './bahan/backend/foto/'.$hasillogo['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$this->upload->initialize($config);
					$this->upload->do_upload('favicon');
					$hasilfav=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/backend/foto/'.$hasilfav['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '50%';
					$config['width']= 30;
					$config['height']= 30;
					$config['new_image']= './bahan/backend/foto/'.$hasilfav['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($this->input->post('meta_keyword')!=''){
								$tag_seo = $this->input->post('meta_keyword');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
					$tag = $this->input->post('meta_keyword');
					$tags = explode(",", $tag);
					$tags2 = array();
					foreach($tags as $t)
					{
						$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
						$a = $this->db->query($sql)->result_array();
						if(count($a) == 0){
							$data = array('keyword_nama'=>$this->db->escape_str($t),
									'keyword_username'=>$this->session->username,
									'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
									'count'=>'0');
							$this->Panel_m->insert('keyword',$data);
						}
						$tags2[] = $this->mylibrary->seo_title($t);
					}
					$tags = implode(",", $tags2);
          if ($hasilfav['file_name']=='' && $hasillogo['file_name']==''){
            	$data = array(
            	                	'nama_website'=>$this->db->escape_str($this->input->post('nama_website')),
                                'email'=>$this->db->escape_str($this->input->post('email')),
                                'url'=>$this->db->escape_str($this->input->post('url')),
                                'facebook'=>$this->input->post('facebook'),
                                'instagram'=>$this->input->post('instagram'),
                                'youtube'=>$this->input->post('youtube'),
                                'no_telp'=>$this->db->escape_str($this->input->post('no_telp')),
                                'slogan'=>$this->input->post('slogan'),
                                'alamat'=>$this->input->post('alamat'),
																'whatsapp'=>$this->input->post('whatsapp'),
                                'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
																'seo'=>$this->input->post('seo'),
																'analytics'=>$this->input->post('analytics'),
																'pixel'=>$this->input->post('pixel'),
                                'meta_keyword'=>$tag,
                                'maps'=>$this->input->post('maps'),
															);
																$where = array('id_identitas' => $this->input->post('id_identitas'));
    														$query = $this->db->update('identitas',$data,$where);
            }else if ($hasillogo['file_name']==''){
            	$data = array(
																'nama_website'=>$this->db->escape_str($this->input->post('nama_website')),
																'email'=>$this->db->escape_str($this->input->post('email')),
																'url'=>$this->db->escape_str($this->input->post('url')),
																'facebook'=>$this->input->post('facebook'),
																'instagram'=>$this->input->post('instagram'),
																'youtube'=>$this->input->post('youtube'),
																'no_telp'=>$this->db->escape_str($this->input->post('no_telp')),
																'slogan'=>$this->input->post('slogan'),
																'alamat'=>$this->input->post('alamat'),
																'whatsapp'=>$this->input->post('whatsapp'),
																'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
																'seo'=>$this->input->post('seo'),
																'analytics'=>$this->input->post('analytics'),
																'pixel'=>$this->input->post('pixel'),
																'meta_keyword'=>$tag,
																'maps'=>$this->input->post('maps'),
                                'favicon'=>$hasilfav['file_name']);
																$where = array('id_identitas' => $this->input->post('id_identitas'));
						    								$_image = $this->db->get_where('identitas',$where)->row();
						    								$query = $this->db->update('identitas',$data,$where);
						    								if($query){
						    					                unlink("bahan/backend/foto/".$_image->favicon);
						    					                }
            }else if ($hasilfav['file_name']==''){
            	$data = array(
																'nama_website'=>$this->db->escape_str($this->input->post('nama_website')),
																'email'=>$this->db->escape_str($this->input->post('email')),
																'url'=>$this->db->escape_str($this->input->post('url')),
																'facebook'=>$this->input->post('facebook'),
																'instagram'=>$this->input->post('instagram'),
																'youtube'=>$this->input->post('youtube'),
																'no_telp'=>$this->db->escape_str($this->input->post('no_telp')),
																'slogan'=>$this->input->post('slogan'),
																'alamat'=>$this->input->post('alamat'),
																'whatsapp'=>$this->input->post('whatsapp'),
																'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
																'seo'=>$this->input->post('seo'),
																'analytics'=>$this->input->post('analytics'),
																'pixel'=>$this->input->post('pixel'),
																'meta_keyword'=>$tag,
																'maps'=>$this->input->post('maps'),
                                'logo'=>$hasillogo['file_name']);
																$where = array('id_identitas' => $this->input->post('id_identitas'));
						    								$_image = $this->db->get_where('identitas',$where)->row();
						    								$query = $this->db->update('identitas',$data,$where);
						    								if($query){
						    					                unlink("bahan/backend/foto/".$_image->logo);
						    					                }
            }else{
            	$data = array(
																'nama_website'=>$this->db->escape_str($this->input->post('nama_website')),
																'email'=>$this->db->escape_str($this->input->post('email')),
																'url'=>$this->db->escape_str($this->input->post('url')),
																'facebook'=>$this->input->post('facebook'),
																'instagram'=>$this->input->post('instagram'),
																'youtube'=>$this->input->post('youtube'),
																'no_telp'=>$this->db->escape_str($this->input->post('no_telp')),
																'slogan'=>$this->input->post('slogan'),
																'alamat'=>$this->input->post('alamat'),
																'whatsapp'=>$this->input->post('whatsapp'),
																'meta_deskripsi'=>$this->input->post('meta_deskripsi'),
																'seo'=>$this->input->post('seo'),
																'analytics'=>$this->input->post('analytics'),
																'pixel'=>$this->input->post('pixel'),
																'meta_keyword'=>$tag,
																'maps'=>$this->input->post('maps'),
																'favicon'=>$hasilfav['file_name'],
                                'logo'=>$hasillogo['file_name']);
																$where = array('id_identitas' => $this->input->post('id_identitas'));
						    								$_image = $this->db->get_where('identitas',$where)->row();
						    								$query = $this->db->update('identitas',$data,$where);
						    								if($query){
						    					                unlink("bahan/backend/foto/".$_image->favicon);
																					unlink("bahan/backend/foto/".$_image->logo);
						    					                }
            }
			redirect('paneladmin/identitaswebsite');
		}else{

			$proses = $this->Panel_m->edit('identitas', array('id_identitas' => 1))->row_array();
			$data = array('record' => $proses);
			$data['karyawan_menu_open']   = '';
			$data['home_stat']   = '';
			$data['identitas_stat']   = 'active';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = '';
			$data['products_stat']   = '';
			$data['cat_products_stat']   = '';
			$data['testimonial_stat']   = '';
			$data['blogs_stat']   = '';
			$data['message_stat']   = '';
			$data['gallery_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';
			 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/identitas/views', $data);
		}
	}

    /* Data konsumen */

    public function konsumen()
    {
    	    if ($this->session->level=='1'){

    						$data['record'] = $this->Crud_m->view_join_where2_ordering('konsumen','perumahan','konsumen_perumahan_kode','perumahan_kode',array('konsumen_status'=>'publish'),'konsumen_tgl_order','ASC');
    				}else if  ($this->session->level=='2'){
    						$data['record'] = $this->Crud_m->view_join_where_ordering_konsumen_leader('konsumen','perumahan','user','konsumen_perumahan_kode','perumahan_kode','id_user','perumahan_pl',array('konsumen_status'=>'publish'),'konsumen_tgl_order','ASC');
    				}else{
    						$data['record'] = $this->Crud_m->view_join_where2_ordering('konsumen','perumahan','konsumen_perumahan_kode','perumahan_kode',array('konsumen_cs_fu'=>$this->session->username,'konsumen_status'=>'publish'),'konsumen_tgl_order','ASC');
    				}

    			    $this->load->view('backend/konsumen/v_daftar', $data);
    	}
    public function exportxlskonsumen()
    {
      $data = $this->Crud_m->view_ordering('konsumen','konsumen_tgl_order','ASC');

      include_once APPPATH.'/third_party/xlsxwriter.class.php';
      ini_set('display_errors', 0);
      ini_set('log_errors', 1);
      error_reporting(E_ALL & ~E_NOTICE);


      $filename = "report-".date('d-m-Y-H-i-s').".xlsx";
      header('Content-disposition: attachment; filename="'.XLSXWriter::sanitize_filename($filename).'"');
      header("Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet");
      header('Content-Transfer-Encoding: binary');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');

      $styles = array('widths'=>[3,20,30,40], 'font'=>'Arial','font-size'=>10,'font-style'=>'bold', 'fill'=>'#eee', 'halign'=>'center', 'border'=>'left,right,top,bottom');
      $styles2 = array( ['font'=>'Arial','font-size'=>10,'font-style'=>'bold', 'fill'=>'#eee', 'halign'=>'left', 'border'=>'left,right,top,bottom','fill'=>'#ffc'],['fill'=>'#fcf'],['fill'=>'#ccf'],['fill'=>'#cff'],);

      $header = array(
        'No'=>'integer',
        'Nama Sales'=>'string',
        'Nama Konsumen'=>'string',
        'Tanggal Dealing'=>'string',
        'Minggu'=>'string',
        'Perumahan'=>'string',
        'Media Promosi' =>'string',
        'Nomor Telepon' =>'string',
        'Pembayaran'=>'string',
        'Tanggal FU'=>'string',
        'Status'=>'string',
        'Status Proses'=>'string',
        'Status Prospek'=>'string',
        'Status Update'=>'string',
        'Detail Kondisi'=>'string',
        'Solusi'=>'string',
        'Gaji Istri'=>'string',
        'Gaji Suami'=>'string',
        'Cicilan'=>'string',
        'Kantor Suami'=>'string',
        'Kantor Istri'=>'string',
        'Domisili'=>'string',
      );

      $writer = new XLSXWriter();
      $writer->setAuthor('Admin');

      $writer->writeSheetHeader('Sheet1', $header, $styles);
      $no = 1;
      foreach($data as $row){
        $writer->writeSheetRow('Sheet1', [$no, $row['konsumen_cs_fu'], $row['konsumen_nama'], $row['konsumen_tgl_order'], $row['konsumen_minggu'], $row['konsumen_perumahan_kode'], $row['konsumen_media_nama'], $row['konsumen_telp'], $row['konsumen_pembayaran'], $row['konsumen_tgl_fu'], $row['konsumen_stat'], $row['konsumen_statpros'], $row['konsumen_statprospek'], $row['konsumen_statupdate'], $row['konsumen_kondisi'], $row['konsumen_solusi'], $row['konsumen_gi'], $row['konsumen_gs'], $row['konsumen_cicilan'], $row['konsumen_ks'], $row['konsumen_ki'], $row['konsumen_domisili']], $styles2);
        $no++;
      }
      $writer->writeToStdOut();
    }
	public function konsumen_storage_bin()
	{


				if ($this->session->level=='1'){
				        $data['record'] = $this->Crud_m->view_join_where2_ordering('konsumen','perumahan','konsumen_perumahan_kode','perumahan_kode',array('konsumen_status'=>'delete'),'konsumen_tgl_order','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_join_where2_ordering('konsumen','perumahan','konsumen_perumahan_kode','perumahan_kode',array('konsumen_cs_fu'=>$this->session->username,'konsumen_status'=>'delete'),'konsumen_tgl_order','DESC');
				}
				$this->load->view('backend/konsumen/v_daftar_hapus', $data);
	}
	public function konsumen_tambahkan()
	{


             if (isset($_POST['submit'])){
							$data = array(
							                'konsumen_kode'=>$this->input->post('konsumen_kode'),
											'konsumen_nama'=>$this->input->post('konsumen_nama'),
											'konsumen_tgl_order'=>$this->input->post('konsumen_tgl_order'),
											'konsumen_minggu'=>$this->input->post('konsumen_minggu'),
											'konsumen_perumahan_kode'=>$this->input->post('konsumen_perumahan_kode'),
											'konsumen_media_nama'=>$this->input->post('konsumen_media_nama'),
											'konsumen_telp'=>$this->input->post('konsumen_telp'),
											'konsumen_pembayaran'=>$this->input->post('konsumen_pembayaran'),
											'konsumen_cs_fu'=>$this->input->post('konsumen_cs_fu'),
											'konsumen_tgl_fu'=>$this->input->post('konsumen_tgl_fu'),
											'konsumen_stat'=>$this->input->post('konsumen_stat'),
											'konsumen_statprospek'=>$this->input->post('konsumen_statprospek'),
											'konsumen_statpros'=>$this->input->post('konsumen_statpros'),
											'konsumen_statupdate'=>$this->input->post('konsumen_statupdate'),
											'konsumen_kondisi'=>$this->input->post('konsumen_kondisi'),
											'konsumen_solusi'=>$this->input->post('konsumen_solusi'),
											'konsumen_gi'=>$this->input->post('konsumen_gi'),
											'konsumen_gs'=>$this->input->post('konsumen_gs'),
											'konsumen_cicilan'=>$this->input->post('konsumen_cicilan'),
											'konsumen_ki'=>$this->input->post('konsumen_ki'),
											'konsumen_ks'=>$this->input->post('konsumen_ks'),
											'konsumen_domisili'=>$this->input->post('konsumen_domisili'),

											'konsumen_post_oleh'=>$this->session->username,
											'konsumen_hari'=>hari_ini(date('w')),
											'konsumen_tanggal'=>date('Y-m-d'),
											'konsumen_jam'=>date('H:i:s'),
											'konsumen_status'=>'publish');

								$this->Panel_m->insert('konsumen',$data);
								redirect('paneladmin/konsumen');
				}else{

		            $data['record_cs'] = $this->Crud_m->view_ordering('user','id_user','DESC');
		            $data['record_stat'] = $this->Crud_m->view_ordering('konsumen_status','konsumen_status_id','ASC');
		            $data['record_statupdate'] = $this->Crud_m->view_ordering('konsumen_statupdate','konsumen_statupdate_id','ASC');
		            $data['record_statpros'] = $this->Crud_m->view_ordering('konsumen_statpros','konsumen_statpros_id','ASC');
		            $data['record_statprospek'] = $this->Crud_m->view_ordering('konsumen_statprospek','konsumen_statprospek_id','DESC');
		            $data['record_minggu'] = $this->Crud_m->view_ordering('konsumen_minggu','konsumen_minggu_id','ASC');
		            $data['record_kategori'] = $this->Crud_m->view_ordering('products_category','products_cat_id','ASC');
		            $data['record_medpro'] = $this->Crud_m->view_ordering('media_promosi','media_promosi_id','ASC');
		            $data['record_bayar'] = $this->Crud_m->view_ordering('konsumen_pembayaran','konsumen_pembayaran_id','ASC');
					$this->load->view('backend/konsumen/v_tambahkan', $data);

				}
	}
	public function konsumen_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
						$data = array(
						                    'konsumen_kode'=>$this->input->post('konsumen_kode'),
											'konsumen_nama'=>$this->input->post('konsumen_nama'),
											'konsumen_tgl_order'=>$this->input->post('konsumen_tgl_order'),
											'konsumen_minggu'=>$this->input->post('konsumen_minggu'),
											'konsumen_perumahan_kode'=>$this->input->post('konsumen_perumahan_kode'),
											'konsumen_media_nama'=>$this->input->post('konsumen_media_nama'),
											'konsumen_telp'=>$this->input->post('konsumen_telp'),
											'konsumen_pembayaran'=>$this->input->post('konsumen_pembayaran'),
											'konsumen_cs_fu'=>$this->input->post('konsumen_cs_fu'),
											'konsumen_tgl_fu'=>$this->input->post('konsumen_tgl_fu'),
											'konsumen_stat'=>$this->input->post('konsumen_stat'),
											'konsumen_statprospek'=>$this->input->post('konsumen_statprospek'),
											'konsumen_statpros'=>$this->input->post('konsumen_statpros'),
											'konsumen_statupdate'=>$this->input->post('konsumen_statupdate'),
											'konsumen_kondisi'=>$this->input->post('konsumen_kondisi'),
											'konsumen_solusi'=>$this->input->post('konsumen_solusi'),
											'konsumen_gi'=>$this->input->post('konsumen_gi'),
											'konsumen_gs'=>$this->input->post('konsumen_gs'),
											'konsumen_cicilan'=>$this->input->post('konsumen_cicilan'),
											'konsumen_ki'=>$this->input->post('konsumen_ki'),
											'konsumen_ks'=>$this->input->post('konsumen_ks'),
											'konsumen_domisili'=>$this->input->post('konsumen_domisili'));
											$where = array('konsumen_id' => $this->input->post('konsumen_id'));
											$this->db->update('konsumen', $data, $where);

						redirect('paneladmin/konsumen');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('konsumen', array('konsumen_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('konsumen', array('konsumen_id' => $id))->row_array();
			}
			 $data = array('rows' => $proses);
			 $data['record_cs'] = $this->Crud_m->view_ordering('user','id_user','DESC');
		     $data['record_stat'] = $this->Crud_m->view_ordering('konsumen_status','konsumen_status_id','ASC');
		     $data['record_statupdate'] = $this->Crud_m->view_ordering('konsumen_statupdate','konsumen_statupdate_id','ASC');
		     $data['record_statpros'] = $this->Crud_m->view_ordering('konsumen_statpros','konsumen_statpros_id','ASC');
		     $data['record_statprospek'] = $this->Crud_m->view_ordering('konsumen_statprospek','konsumen_statprospek_id','DESC');
		     $data['record_minggu'] = $this->Crud_m->view_ordering('konsumen_minggu','konsumen_minggu_id','ASC');
		     $data['record_kodeper'] = $this->Crud_m->view_ordering('perumahan','perumahan_id','ASC');
		     $data['record_medpro'] = $this->Crud_m->view_ordering('media_promosi','media_promosi_id','ASC');
		     $data['record_bayar'] = $this->Crud_m->view_ordering('konsumen_pembayaran','konsumen_pembayaran_id','ASC');
			$this->load->view('backend/konsumen/v_update', $data);
		}
	}
	public function konsumen_detail()
	{

		$id = $this->uri->segment(3);

			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('konsumen', array('konsumen_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('konsumen', array('konsumen_id' => $id))->row_array();
			}
				$data = array('rows' => $proses);

        $data['record_cs'] = $this->Crud_m->view_ordering('user','id_user','DESC');
	    $data['record'] = $this->Crud_m->view_ordering('perumahan','perumahan_id','DESC');
		$this->load->view('backend/konsumen/v_detail', $data);

	}
	function konsumen_delete_temp()
	{

			$data = array('konsumen_status'=>'delete');
			$where = array('konsumen_id' => $this->uri->segment(3));
			$this->db->update('konsumen', $data, $where);
			redirect('paneladmin/konsumen');
	}
	function konsumen_restore()
	{

			$data = array('konsumen_status'=>'Publish');
			$where = array('konsumen_id' => $this->uri->segment(3));
			$this->db->update('konsumen', $data, $where);
			redirect('paneladmin/konsumen');
	}
	public function konsumen_delete()
	{

			$id = $this->uri->segment(3);

			 $query = $this->db->delete('konsumen',['konsumen_id'=>$id]);

		redirect('paneladmin/konsumen_storage_bin');
	}
	/* konsumen - tutup */

	/*	Bagian untuk gallery - Pembuka	*/
	public function gallery()
	{
		$data['karyawan_menu_open']   = '';

				if ($this->session->level=='1' OR $this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('gallery',array('gallery_status'=>'publish'),'gallery_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('gallery',array('gallery_post_oleh'=>$this->session->username,'gallery_status'=>'publish'),'gallery_id','DESC');
				}
				$this->load->view('backend/gallery/v_daftar', $data);
	}
	public function gallery_storage_bin()
	{


				if ($this->session->level=='1' OR $this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('gallery',array('gallery_status'=>'delete'),'gallery_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('gallery',array('gallery_post_oleh'=>$this->session->username,'gallery_status'=>'delete'),'gallery_id','DESC');
				}

				$data['identitas_stat']   = '';
				$this->load->view('backend/gallery/v_daftar_hapus', $data);
	}
	public function gallery_tambahkan()
	{

		if (isset($_POST['submit'])){

					$config['upload_path'] = 'bahan/foto_gallery/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_gallery/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_gallery/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($this->input->post('gallery_keyword')!=''){
								$tag_seo = $this->input->post('gallery_keyword');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
					$tag = $this->input->post('gallery_keyword');
					$tags = explode(",", $tag);
					$tags2 = array();
					foreach($tags as $t)
					{
						$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
						$a = $this->db->query($sql)->result_array();
						if(count($a) == 0){
							$data = array('keyword_nama'=>$this->db->escape_str($t),
									'keyword_username'=>$this->session->username,
									'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
									'count'=>'0');
							$this->Panel_m->insert('keyword',$data);
						}
						$tags2[] = $this->mylibrary->seo_title($t);
					}
					$tags = implode(",", $tags2);
					if ($hasil22['file_name']==''){
									$data = array(
										'gallery_post_oleh'=>$this->session->username,
										'gallery_judul'=>$this->db->escape_str($this->input->post('gallery_judul')),
										'gallery_judul_seo'=>$this->mylibrary->seo_title($this->input->post('gallery_judul')),
										'gallery_desk'=>$this->input->post('gallery_desk'),
										'gallery_post_hari'=>hari_ini(date('w')),
										'gallery_post_tanggal'=>date('Y-m-d'),
										'gallery_post_jam'=>date('H:i:s'),
										'gallery_dibaca'=>'0',
										'gallery_status'=>'publish',
										'gallery_meta_desk'=>$this->input->post('gallery_meta_desk'),
										'gallery_keyword'=>$tag);
											}else{
												$data = array(
													'gallery_post_oleh'=>$this->session->username,
													'gallery_judul'=>$this->db->escape_str($this->input->post('gallery_judul')),
													'gallery_judul_seo'=>$this->mylibrary->seo_title($this->input->post('gallery_judul')),
													'gallery_desk'=>$this->input->post('gallery_desk'),
													'gallery_post_hari'=>hari_ini(date('w')),
													'gallery_post_tanggal'=>date('Y-m-d'),
													'gallery_post_jam'=>date('H:i:s'),
													'gallery_dibaca'=>'0',
													'gallery_status'=>'publish',
													'gallery_gambar'=>$hasil22['file_name'],
													'gallery_meta_desk'=>$this->input->post('gallery_meta_desk'),
													'gallery_keyword'=>$tag);
												}
								$this->Panel_m->insert('gallery',$data);
								redirect('paneladmin/gallery');
				}else{

					$data['services']   = '';

					$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					$this->load->view('backend/gallery/v_tambahkan', $data);
				}
	}
	public function gallery_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'bahan/foto_gallery/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_gallery/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_gallery/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if ($this->input->post('gallery_keyword')!=''){
						$tag_seo = $this->input->post('gallery_keyword');
						$tag=implode(',',$tag_seo);
				}else{
						$tag = '';
				}
			$tag = $this->input->post('gallery_keyword');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('keyword_nama'=>$this->db->escape_str($t),
							'keyword_username'=>$this->session->username,
							'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
							'count'=>'0');
					$this->Panel_m->insert('keyword',$data);
				}
				$tags2[] = $this->mylibrary->seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil22['file_name']==''){
										$data = array(
											'gallery_post_oleh'=>$this->session->username,
											'gallery_judul'=>$this->db->escape_str($this->input->post('gallery_judul')),
											'gallery_judul_seo'=>$this->mylibrary->seo_title($this->input->post('gallery_judul')),
											'gallery_desk'=>$this->input->post('gallery_desk'),
											'gallery_post_hari'=>hari_ini(date('w')),
											'gallery_post_tanggal'=>date('Y-m-d'),
											'gallery_post_jam'=>date('H:i:s'),
											'gallery_meta_desk'=>$this->input->post('gallery_meta_desk'),
											'gallery_keyword'=>$tag);
											$where = array('gallery_id' => $this->input->post('gallery_id'));
											$this->db->update('gallery', $data, $where);
						}else{
										$data = array(
											'gallery_post_oleh'=>$this->session->username,
											'gallery_judul'=>$this->db->escape_str($this->input->post('gallery_judul')),
											'gallery_judul_seo'=>$this->mylibrary->seo_title($this->input->post('gallery_judul')),
											'gallery_desk'=>$this->input->post('gallery_desk'),
											'gallery_post_hari'=>hari_ini(date('w')),
											'gallery_post_tanggal'=>date('Y-m-d'),
											'gallery_post_jam'=>date('H:i:s'),
											'gallery_gambar'=>$hasil22['file_name'],
											'gallery_meta_desk'=>$this->input->post('gallery_meta_desk'),
											'gallery_keyword'=>$tag);
											$where = array('gallery_id' => $this->input->post('gallery_id'));
											$_image = $this->db->get_where('gallery',$where)->row();
											$query = $this->db->update('gallery',$data,$where);
											if($query){
												unlink("bahan/foto_gallery/".$_image->gallery_gambar);
											}

						}
						redirect('paneladmin/gallery');
		}else{
			if ($this->session->level=='1' OR $this->session->level=='2'){
					 $proses = $this->Panel_m->edit('gallery', array('gallery_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('gallery', array('gallery_id' => $id, 'gallery_post_oleh' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);

			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/gallery/v_update', $data);
		}
	}
	function gallery_delete_temp()
	{
			$data = array('gallery_status'=>'delete');
			$where = array('gallery_id' => $this->uri->segment(3));
			$this->db->update('gallery', $data, $where);
			redirect('paneladmin/gallery');
	}
	function gallery_restore()
	{
			$data = array('gallery_status'=>'Publish');
			$where = array('gallery_id' => $this->uri->segment(3));
			$this->db->update('gallery', $data, $where);
			redirect('paneladmin/gallery_storage_bin');
	}
	public function gallery_delete()
	{
			cek_session_akses ('gallery',$this->session->id_session);
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('gallery',['gallery_id' => $id])->row();
			 $query = $this->db->delete('gallery',['gallery_id'=>$id]);
			if($query){
							 unlink("./bahan/foto_gallery/".$_id->gallery_gambar);
		 }
		redirect('paneladmin/gallery_storage_bin');
	}
	/*	Bagian untuk gallery - Penutup	*/

	/*	Bagian untuk workshop - Pembuka	*/
	public function workshop()
	{
		$data['karyawan_menu_open']   = '';


				if ($this->session->level=='1' OR $this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('workshop',array('workshop_status'=>'publish'),'workshop_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('workshop',array('workshop_post_oleh'=>$this->session->username,'workshop_status'=>'publish'),'workshop_id','DESC');
				}
				$this->load->view('backend/workshop/v_daftar', $data);
	}
	public function workshop_storage_bin()
	{

				if ($this->session->level=='1' OR $this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('workshop',array('workshop_status'=>'delete'),'workshop_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('workshop',array('workshop_post_oleh'=>$this->session->username,'workshop_status'=>'delete'),'workshop_id','DESC');
				}

				$data['identitas_stat']   = '';
				$this->load->view('backend/workshop/v_daftar_hapus', $data);
	}
	public function workshop_tambahkan()
	{

		if (isset($_POST['submit'])){

					$config['upload_path'] = 'bahan/foto_workshop/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_workshop/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_workshop/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($this->input->post('workshop_keyword')!=''){
								$tag_seo = $this->input->post('workshop_keyword');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
					$tag = $this->input->post('workshop_keyword');
					$tags = explode(",", $tag);
					$tags2 = array();
					foreach($tags as $t)
					{
						$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
						$a = $this->db->query($sql)->result_array();
						if(count($a) == 0){
							$data = array('keyword_nama'=>$this->db->escape_str($t),
									'keyword_username'=>$this->session->username,
									'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
									'count'=>'0');
							$this->Panel_m->insert('keyword',$data);
						}
						$tags2[] = $this->mylibrary->seo_title($t);
					}
					$tags = implode(",", $tags2);
					if ($hasil22['file_name']==''){
									$data = array(
										'workshop_post_oleh'=>$this->session->username,
										'workshop_judul'=>$this->db->escape_str($this->input->post('workshop_judul')),
										'workshop_judul_seo'=>$this->mylibrary->seo_title($this->input->post('workshop_judul')),
										'workshop_desk'=>$this->input->post('workshop_desk'),
										'workshop_post_hari'=>hari_ini(date('w')),
										'workshop_post_tanggal'=>date('Y-m-d'),
										'workshop_post_jam'=>date('H:i:s'),
										'workshop_dibaca'=>'0',
										'workshop_status'=>'publish',
										'workshop_meta_desk'=>$this->input->post('workshop_meta_desk'),
										'workshop_keyword'=>$tag);
											}else{
												$data = array(
													'workshop_post_oleh'=>$this->session->username,
													'workshop_judul'=>$this->db->escape_str($this->input->post('workshop_judul')),
													'workshop_judul_seo'=>$this->mylibrary->seo_title($this->input->post('workshop_judul')),
													'workshop_desk'=>$this->input->post('workshop_desk'),
													'workshop_post_hari'=>hari_ini(date('w')),
													'workshop_post_tanggal'=>date('Y-m-d'),
													'workshop_post_jam'=>date('H:i:s'),
													'workshop_dibaca'=>'0',
													'workshop_status'=>'publish',
													'workshop_gambar'=>$hasil22['file_name'],
													'workshop_meta_desk'=>$this->input->post('workshop_meta_desk'),
													'workshop_keyword'=>$tag);
												}
								$this->Panel_m->insert('workshop',$data);
								redirect('paneladmin/workshop');
				}else{

					$data['services']   = '';
					$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					$this->load->view('backend/workshop/v_tambahkan', $data);
				}
	}
	public function workshop_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'bahan/foto_workshop/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_workshop/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_workshop/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if ($this->input->post('workshop_keyword')!=''){
						$tag_seo = $this->input->post('workshop_keyword');
						$tag=implode(',',$tag_seo);
				}else{
						$tag = '';
				}
			$tag = $this->input->post('workshop_keyword');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('keyword_nama'=>$this->db->escape_str($t),
							'keyword_username'=>$this->session->username,
							'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
							'count'=>'0');
					$this->Panel_m->insert('keyword',$data);
				}
				$tags2[] = $this->mylibrary->seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil22['file_name']==''){
										$data = array(
											'workshop_post_oleh'=>$this->session->username,
											'workshop_judul'=>$this->db->escape_str($this->input->post('workshop_judul')),
											'workshop_judul_seo'=>$this->mylibrary->seo_title($this->input->post('workshop_judul')),
											'workshop_desk'=>$this->input->post('workshop_desk'),
											'workshop_post_hari'=>hari_ini(date('w')),
											'workshop_post_tanggal'=>date('Y-m-d'),
											'workshop_post_jam'=>date('H:i:s'),
											'workshop_meta_desk'=>$this->input->post('workshop_meta_desk'),
											'workshop_keyword'=>$tag);
											$where = array('workshop_id' => $this->input->post('workshop_id'));
											$this->db->update('workshop', $data, $where);
						}else{
										$data = array(
											'workshop_post_oleh'=>$this->session->username,
											'workshop_judul'=>$this->db->escape_str($this->input->post('workshop_judul')),
											'workshop_judul_seo'=>$this->mylibrary->seo_title($this->input->post('workshop_judul')),
											'workshop_desk'=>$this->input->post('workshop_desk'),
											'workshop_post_hari'=>hari_ini(date('w')),
											'workshop_post_tanggal'=>date('Y-m-d'),
											'workshop_post_jam'=>date('H:i:s'),
											'workshop_gambar'=>$hasil22['file_name'],
											'workshop_meta_desk'=>$this->input->post('workshop_meta_desk'),
											'workshop_keyword'=>$tag);
											$where = array('workshop_id' => $this->input->post('workshop_id'));
											$_image = $this->db->get_where('workshop',$where)->row();
											$query = $this->db->update('workshop',$data,$where);
											if($query){
												unlink("bahan/foto_workshop/".$_image->workshop_gambar);
											}

						}
						redirect('paneladmin/workshop');
		}else{
			if ($this->session->level=='1' OR $this->session->level=='2'){
					 $proses = $this->Panel_m->edit('workshop', array('workshop_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('workshop', array('workshop_id' => $id, 'workshop_post_oleh' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);
			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/workshop/v_update', $data);
		}
	}
	function workshop_delete_temp()
	{

			$data = array('workshop_status'=>'delete');
			$where = array('workshop_id' => $this->uri->segment(3));
			$this->db->update('workshop', $data, $where);
			redirect('paneladmin/workshop');
	}
	function workshop_restore()
	{
			$data = array('workshop_status'=>'Publish');
			$where = array('workshop_id' => $this->uri->segment(3));
			$this->db->update('workshop', $data, $where);
			redirect('paneladmin/workshop_storage_bin');
	}
	public function workshop_delete()
	{
			cek_session_akses ('workshop',$this->session->id_session);
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('workshop',['workshop_id' => $id])->row();
			 $query = $this->db->delete('workshop',['workshop_id'=>$id]);
			if($query){
							 unlink("./bahan/foto_workshop/".$_id->workshop_gambar);
		 }
		redirect('paneladmin/workshop_storage_bin');
	}
	/*	Bagian untuk workshop - Penutup	*/

	/*	Bagian untuk equipment - Pembuka	*/
	public function equipment()
	{
		$data['karyawan_menu_open']   = '';


				if ($this->session->level=='1' OR $this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('equipment',array('equipment_status'=>'publish'),'equipment_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('equipment',array('equipment_post_oleh'=>$this->session->username,'equipment_status'=>'publish'),'equipment_id','DESC');
				}
				$this->load->view('backend/equipment/v_daftar', $data);
	}
	public function equipment_storage_bin()
	{


				if ($this->session->level=='1' OR $this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('equipment',array('equipment_status'=>'delete'),'equipment_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('equipment',array('equipment_post_oleh'=>$this->session->username,'equipment_status'=>'delete'),'equipment_id','DESC');
				}

				$data['identitas_stat']   = '';
				$this->load->view('backend/equipment/v_daftar_hapus', $data);
	}
	public function equipment_tambahkan()
	{

		if (isset($_POST['submit'])){

					$config['upload_path'] = 'bahan/foto_equipment/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_equipment/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_equipment/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($this->input->post('equipment_keyword')!=''){
								$tag_seo = $this->input->post('equipment_keyword');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
					$tag = $this->input->post('equipment_keyword');
					$tags = explode(",", $tag);
					$tags2 = array();
					foreach($tags as $t)
					{
						$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
						$a = $this->db->query($sql)->result_array();
						if(count($a) == 0){
							$data = array('keyword_nama'=>$this->db->escape_str($t),
									'keyword_username'=>$this->session->username,
									'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
									'count'=>'0');
							$this->Panel_m->insert('keyword',$data);
						}
						$tags2[] = $this->mylibrary->seo_title($t);
					}
					$tags = implode(",", $tags2);
					if ($hasil22['file_name']==''){
									$data = array(
										'equipment_post_oleh'=>$this->session->username,
										'equipment_judul'=>$this->db->escape_str($this->input->post('equipment_judul')),
										'equipment_judul_seo'=>$this->mylibrary->seo_title($this->input->post('equipment_judul')),
										'equipment_desk'=>$this->input->post('equipment_desk'),
										'equipment_post_hari'=>hari_ini(date('w')),
										'equipment_post_tanggal'=>date('Y-m-d'),
										'equipment_post_jam'=>date('H:i:s'),
										'equipment_dibaca'=>'0',
										'equipment_status'=>'publish',
										'equipment_meta_desk'=>$this->input->post('equipment_meta_desk'),
										'equipment_keyword'=>$tag);
											}else{
												$data = array(
													'equipment_post_oleh'=>$this->session->username,
													'equipment_judul'=>$this->db->escape_str($this->input->post('equipment_judul')),
													'equipment_judul_seo'=>$this->mylibrary->seo_title($this->input->post('equipment_judul')),
													'equipment_desk'=>$this->input->post('equipment_desk'),
													'equipment_post_hari'=>hari_ini(date('w')),
													'equipment_post_tanggal'=>date('Y-m-d'),
													'equipment_post_jam'=>date('H:i:s'),
													'equipment_dibaca'=>'0',
													'equipment_status'=>'publish',
													'equipment_gambar'=>$hasil22['file_name'],
													'equipment_meta_desk'=>$this->input->post('equipment_meta_desk'),
													'equipment_keyword'=>$tag);
												}
								$this->Panel_m->insert('equipment',$data);
								redirect('paneladmin/equipment');
				}else{

					$data['services']   = '';

					$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					$this->load->view('backend/equipment/v_tambahkan', $data);
				}
	}
	public function equipment_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'bahan/foto_equipment/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_equipment/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_equipment/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if ($this->input->post('equipment_keyword')!=''){
						$tag_seo = $this->input->post('equipment_keyword');
						$tag=implode(',',$tag_seo);
				}else{
						$tag = '';
				}
			$tag = $this->input->post('equipment_keyword');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('keyword_nama'=>$this->db->escape_str($t),
							'keyword_username'=>$this->session->username,
							'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
							'count'=>'0');
					$this->Panel_m->insert('keyword',$data);
				}
				$tags2[] = $this->mylibrary->seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil22['file_name']==''){
										$data = array(
											'equipment_post_oleh'=>$this->session->username,
											'equipment_judul'=>$this->db->escape_str($this->input->post('equipment_judul')),
											'equipment_judul_seo'=>$this->mylibrary->seo_title($this->input->post('equipment_judul')),
											'equipment_desk'=>$this->input->post('equipment_desk'),
											'equipment_post_hari'=>hari_ini(date('w')),
											'equipment_post_tanggal'=>date('Y-m-d'),
											'equipment_post_jam'=>date('H:i:s'),
											'equipment_meta_desk'=>$this->input->post('equipment_meta_desk'),
											'equipment_keyword'=>$tag);
											$where = array('equipment_id' => $this->input->post('equipment_id'));
											$this->db->update('equipment', $data, $where);
						}else{
										$data = array(
											'equipment_post_oleh'=>$this->session->username,
											'equipment_judul'=>$this->db->escape_str($this->input->post('equipment_judul')),
											'equipment_judul_seo'=>$this->mylibrary->seo_title($this->input->post('equipment_judul')),
											'equipment_desk'=>$this->input->post('equipment_desk'),
											'equipment_post_hari'=>hari_ini(date('w')),
											'equipment_post_tanggal'=>date('Y-m-d'),
											'equipment_post_jam'=>date('H:i:s'),
											'equipment_gambar'=>$hasil22['file_name'],
											'equipment_meta_desk'=>$this->input->post('equipment_meta_desk'),
											'equipment_keyword'=>$tag);
											$where = array('equipment_id' => $this->input->post('equipment_id'));
											$_image = $this->db->get_where('equipment',$where)->row();
											$query = $this->db->update('equipment',$data,$where);
											if($query){
												unlink("bahan/foto_equipment/".$_image->equipment_gambar);
											}

						}
						redirect('paneladmin/equipment');
		}else{
			if ($this->session->level=='1' OR $this->session->level=='2'){
					 $proses = $this->Panel_m->edit('equipment', array('equipment_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('equipment', array('equipment_id' => $id, 'equipment_post_oleh' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);
			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/equipment/v_update', $data);
		}
	}
	function equipment_delete_temp()
	{


			$data = array('equipment_status'=>'delete');
			$where = array('equipment_id' => $this->uri->segment(3));
			$this->db->update('equipment', $data, $where);
			redirect('paneladmin/equipment');
	}
	function equipment_restore()
	{


			$data = array('equipment_status'=>'Publish');
			$where = array('equipment_id' => $this->uri->segment(3));
			$this->db->update('equipment', $data, $where);
			redirect('paneladmin/equipment_storage_bin');
	}
	public function equipment_delete()
	{
			cek_session_akses ('equipment',$this->session->id_session);
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('equipment',['equipment_id' => $id])->row();
			 $query = $this->db->delete('equipment',['equipment_id'=>$id]);
			if($query){
							 unlink("./bahan/foto_equipment/".$_id->equipment_gambar);
		 }
		redirect('paneladmin/equipment_storage_bin');
	}
	/*	Bagian untuk equipment - Penutup	*/

	/*	Bagian untuk Testimonial - Pembuka	*/
	public function testimonial()
	{
		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = 'active';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
		$data['jamkerja_stat']   = '';
		$data['absen_stat']   = '';
		$data['dataabsen_stat']   = '';
		$data['cuti_stat']   = '';
		$data['gaji_stat']   = '';
		$data['pengumuman_stat']   = '';
		$data['konfig_stat']   = '';
		$data['produk_menu_open']   = '';
		$data['produk_category']   = '';
		$data['produk']   = '';
		$data['services']   = '';
		cek_session_akses ('testimonial',$this->session->id_session);
				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('testimonial',array('testimonial_status'=>'publish'),'testimonial_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('testimonial',array('testimonial_post_oleh'=>$this->session->username,'testimonial_status'=>'publish'),'testimonial_id','DESC');
				}
				$this->load->view('backend/testimonial/v_daftar', $data);
	}
	public function testimonial_storage_bin()
	{

		cek_session_akses ('testimonial',$this->session->id_session);
				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('testimonial',array('testimonial_status'=>'delete'),'testimonial_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('testimonial',array('testimonial_post_oleh'=>$this->session->username,'testimonial_status'=>'delete'),'testimonial_id','DESC');
				}
				$data['karyawan_menu_open']   = '';
				$data['home_stat']   = '';
				$data['identitas_stat']   = '';
				$data['profil_stat']   = '';
				$data['sliders_stat']   = '';
				$data['products_stat']   = '';
				$data['cat_products_stat']   = '';
				$data['testimonial_stat']   = 'active';
				$data['blogs_stat']   = '';
				$data['message_stat']   = '';
				$data['gallery_stat']   = '';
				$data['kehadiran_menu_open']   = '';
				$data['jamkerja_stat']   = '';
				$data['absen_stat']   = '';
				$data['dataabsen_stat']   = '';
				$data['cuti_stat']   = '';
				$data['gaji_stat']   = '';
				$data['pengumuman_stat']   = '';
				$data['konfig_stat']   = '';
				$data['produk_menu_open']   = '';
				$data['produk_category']   = '';
				$data['produk']   = '';
				$data['services']   = '';
				$this->load->view('backend/testimonial/v_daftar_hapus', $data);
	}
	public function testimonial_tambahkan()
	{
		cek_session_akses('testimonial',$this->session->id_session);
		if (isset($_POST['submit'])){

					$config['upload_path'] = 'bahan/foto_testimonial/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_testimonial/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_testimonial/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($this->input->post('testimonial_keyword')!=''){
								$tag_seo = $this->input->post('testimonial_keyword');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
					$tag = $this->input->post('testimonial_keyword');
					$tags = explode(",", $tag);
					$tags2 = array();
					foreach($tags as $t)
					{
						$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
						$a = $this->db->query($sql)->result_array();
						if(count($a) == 0){
							$data = array('keyword_nama'=>$this->db->escape_str($t),
									'keyword_username'=>$this->session->username,
									'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
									'count'=>'0');
							$this->Panel_m->insert('keyword',$data);
						}
						$tags2[] = $this->mylibrary->seo_title($t);
					}
					$tags = implode(",", $tags2);
					if ($hasil22['file_name']==''){
									$data = array(
										'testimonial_post_oleh'=>$this->session->username,
										'testimonial_judul'=>$this->db->escape_str($this->input->post('testimonial_judul')),
										'testimonial_judul_seo'=>$this->mylibrary->seo_title($this->input->post('testimonial_judul')),
										'testimonial_desk'=>$this->input->post('testimonial_desk'),
										'testimonial_post_hari'=>hari_ini(date('w')),
										'testimonial_post_tanggal'=>date('Y-m-d'),
										'testimonial_post_jam'=>date('H:i:s'),
										'testimonial_dibaca'=>'0',
										'testimonial_status'=>'publish',
										'testimonial_meta_desk'=>$this->input->post('testimonial_meta_desk'),
										'testimonial_keyword'=>$tag);
											}else{
												$data = array(
													'testimonial_post_oleh'=>$this->session->username,
													'testimonial_judul'=>$this->db->escape_str($this->input->post('testimonial_judul')),
													'testimonial_judul_seo'=>$this->mylibrary->seo_title($this->input->post('testimonial_judul')),
													'testimonial_desk'=>$this->input->post('testimonial_desk'),
													'testimonial_post_hari'=>hari_ini(date('w')),
													'testimonial_post_tanggal'=>date('Y-m-d'),
													'testimonial_post_jam'=>date('H:i:s'),
													'testimonial_dibaca'=>'0',
													'testimonial_status'=>'publish',
													'testimonial_gambar'=>$hasil22['file_name'],
													'testimonial_meta_desk'=>$this->input->post('testimonial_meta_desk'),
													'testimonial_keyword'=>$tag);
												}
								$this->Panel_m->insert('testimonial',$data);
								redirect('paneladmin/testimonial');
				}else{
					$data['karyawan_menu_open']   = '';
					$data['home_stat']   = '';
					$data['identitas_stat']   = '';
					$data['profil_stat']   = '';
					$data['sliders_stat']   = '';
					$data['products_stat']   = '';
					$data['cat_products_stat']   = '';
					$data['testimonial_stat']   = 'active';
					$data['blogs_stat']   = '';
					$data['message_stat']   = '';
					$data['gallery_stat']   = '';
					$data['kehadiran_menu_open']   = '';
					$data['jamkerja_stat']   = '';
					$data['absen_stat']   = '';
					$data['dataabsen_stat']   = '';
					$data['cuti_stat']   = '';
					$data['gaji_stat']   = '';
					$data['pengumuman_stat']   = '';
					$data['konfig_stat']   = '';
					$data['produk_menu_open']   = '';
					$data['produk_category']   = '';
					$data['produk']   = '';
					$data['services']   = '';
					cek_session_akses ('testimonial',$this->session->id_session);
					$data['records'] = $this->Crud_m->view_ordering('products_category','products_cat_id','DESC');
					$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					$this->load->view('backend/testimonial/v_tambahkan', $data);
				}
	}
	public function testimonial_update()
	{
		cek_session_akses('testimonial',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'bahan/foto_testimonial/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_testimonial/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_testimonial/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if ($this->input->post('testimonial_keyword')!=''){
						$tag_seo = $this->input->post('testimonial_keyword');
						$tag=implode(',',$tag_seo);
				}else{
						$tag = '';
				}
			$tag = $this->input->post('testimonial_keyword');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('keyword_nama'=>$this->db->escape_str($t),
							'keyword_username'=>$this->session->username,
							'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
							'count'=>'0');
					$this->Panel_m->insert('keyword',$data);
				}
				$tags2[] = $this->mylibrary->seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil22['file_name']==''){
										$data = array(
											'testimonial_post_oleh'=>$this->session->username,
											'testimonial_judul'=>$this->db->escape_str($this->input->post('testimonial_judul')),
											'testimonial_judul_seo'=>$this->mylibrary->seo_title($this->input->post('testimonial_judul')),
											'products_cat_id'=>$this->input->post('products_cat_id'),
											'testimonial_desk'=>$this->input->post('testimonial_desk'),
											'testimonial_post_hari'=>hari_ini(date('w')),
											'testimonial_post_tanggal'=>date('Y-m-d'),
											'testimonial_post_jam'=>date('H:i:s'),
											'testimonial_meta_desk'=>$this->input->post('testimonial_meta_desk'),
											'testimonial_keyword'=>$tag);
											$where = array('testimonial_id' => $this->input->post('testimonial_id'));
											$this->db->update('testimonial', $data, $where);
						}else{
										$data = array(
											'testimonial_post_oleh'=>$this->session->username,
											'testimonial_judul'=>$this->db->escape_str($this->input->post('testimonial_judul')),
											'testimonial_judul_seo'=>$this->mylibrary->seo_title($this->input->post('testimonial_judul')),
											'products_cat_id'=>$this->input->post('products_cat_id'),
											'testimonial_desk'=>$this->input->post('testimonial_desk'),
											'testimonial_post_hari'=>hari_ini(date('w')),
											'testimonial_post_tanggal'=>date('Y-m-d'),
											'testimonial_post_jam'=>date('H:i:s'),
											'testimonial_gambar'=>$hasil22['file_name'],
											'testimonial_meta_desk'=>$this->input->post('testimonial_meta_desk'),
											'testimonial_keyword'=>$tag);
											$where = array('testimonial_id' => $this->input->post('testimonial_id'));
											$_image = $this->db->get_where('testimonial',$where)->row();
											$query = $this->db->update('testimonial',$data,$where);
											if($query){
												unlink("bahan/foto_testimonial/".$_image->sliders_gambar);
											}

						}
						redirect('paneladmin/testimonial');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('testimonial', array('testimonial_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('testimonial', array('testimonial_id' => $id, 'testimonial_post_oleh' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);
			$data['karyawan_menu_open']   = '';
			$data['home_stat']   = '';
			$data['identitas_stat']   = '';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = '';
			$data['products_stat']   = '';
			$data['cat_products_stat']   = '';
			$data['testimonial_stat']   = 'active';
			$data['blogs_stat']   = '';
			$data['message_stat']   = '';
			$data['gallery_stat']   = '';
			$data['kehadiran_menu_open']   = '';
			$data['jamkerja_stat']   = '';
			$data['absen_stat']   = '';
			$data['dataabsen_stat']   = '';
			$data['cuti_stat']   = '';
			$data['gaji_stat']   = '';
			$data['pengumuman_stat']   = '';
			$data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
			$data['produk_category']   = '';
			$data['produk']   = '';
			$data['services']   = '';
			cek_session_akses ('testimonial',$this->session->id_session);
			$data['records'] = $this->Crud_m->view_ordering('products_category','products_cat_id','DESC');
			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/testimonial/v_update', $data);
		}
	}
	function testimonial_delete_temp()
	{

			cek_session_akses ('testimonial',$this->session->id_session);
			$data = array('testimonial_status'=>'delete');
			$where = array('testimonial_id' => $this->uri->segment(3));
			$this->db->update('testimonial', $data, $where);
			redirect('paneladmin/testimonial');
	}
	function testimonial_restore()
	{

			cek_session_akses ('testimonial',$this->session->id_session);
			$data = array('testimonial_status'=>'Publish');
			$where = array('testimonial_id' => $this->uri->segment(3));
			$this->db->update('testimonial', $data, $where);
			redirect('paneladmin/testimonial_storage_bin');
	}
	public function testimonial_delete()
	{
			cek_session_akses ('testimonial',$this->session->id_session);
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('testimonial',['testimonial_id' => $id])->row();
			 $query = $this->db->delete('testimonial',['testimonial_id'=>$id]);
			if($query){
							 unlink("./bahan/foto_testimonial/".$_id->testimonials_gambar);
		 }
		redirect('paneladmin/testimonial_storage_bin');
	}
	/*	Bagian untuk Testimonial - Penutup	*/

	/*	Bagian untuk Message - Pembuka	*/
	public function message()
	{
		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = 'active';
		cek_session_akses ('products',$this->session->id_session);
				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('products',array('products_status'=>'publish'),'products_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('products',array('products_post_oleh'=>$this->session->username,'products_status'=>'publish'),'products_id','DESC');
				}
				$this->load->view('backend/products/v_daftar', $data);
	}
	/*	Bagian untuk Message - Penutup	*/


	/*	Bagian untuk Product - Pembuka	*/
	public function products()
	{

 			$data['services']   = '';
				if ($this->session->level=='1' OR $this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('products',array('products_status'=>'publish'),'products_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('products',array('products_post_oleh'=>$this->session->username,'products_status'=>'publish'),'products_id','DESC');
				}
				$this->load->view('backend/products/v_daftar', $data);
	}
	public function products_storage_bin()
	{

		$data['services']   = '';

				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('products',array('products_status'=>'delete'),'products_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('products',array('products_post_oleh'=>$this->session->username,'products_status'=>'delete'),'products_id','DESC');
				}
				$this->load->view('backend/products/v_daftar_hapus', $data);
	}
	public function products_tambahkan()
	{
		if (isset($_POST['submit'])){

					$config['upload_path'] = 'bahan/foto_products/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';

					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_products/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_products/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$this->upload->initialize($config);
					$this->upload->do_upload('gambar2');
					$hasilgmbr2=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_products/'.$hasilgmbr2['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_products/'.$hasilgmbr2['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$this->upload->initialize($config);
					$this->upload->do_upload('gambar3');
					$hasilgmbr3=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_products/'.$hasilgmbr3['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_products/'.$hasilgmbr3['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$this->upload->initialize($config);
					$this->upload->do_upload('gambar4');
					$hasilgmbr4=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_products/'.$hasilgmbr4['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_products/'.$hasilgmbr4['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$this->upload->initialize($config);
					$this->upload->do_upload('gambar5');
					$hasilgmbr5=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_products/'.$hasilgmbr5['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_products/'.$hasilgmbr5['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					$this->upload->initialize($config);
					$this->upload->do_upload('gambar6');
					$hasilgmbr6=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_products/'.$hasilgmbr6['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_products/'.$hasilgmbr6['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($this->input->post('products_keyword')!=''){
								$tag_seo = $this->input->post('products_keyword');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
					$tag = $this->input->post('products_keyword');
					$tags = explode(",", $tag);
					$tags2 = array();
					foreach($tags as $t)
					{
						$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
						$a = $this->db->query($sql)->result_array();
						if(count($a) == 0){
							$data = array('keyword_nama'=>$this->db->escape_str($t),
									'keyword_username'=>$this->session->username,
									'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
									'count'=>'0');
							$this->Panel_m->insert('keyword',$data);
						}
						$tags2[] = $this->mylibrary->seo_title($t);
					}
					$tags = implode(",", $tags2);
					if ($hasil22['file_name']=='' && $hasilgmbr2['file_name']=='' && $hasilgmbr3['file_name']=='' && $hasilgmbr4['file_name']=='' && $hasilgmbr5['file_name']=='' && $hasilgmbr6['file_name']==''){
									$data = array(
													'products_post_oleh'=>$this->session->username,
													'products_judul'=>$this->db->escape_str($this->input->post('products_judul')),
													'products_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
													'products_desk'=>$this->input->post('products_desk'),
													'products_tahun'=>$this->input->post('products_tahun'),
													'products_cat_id'=>$this->input->post('products_cat_id'),
													'products_post_hari'=>hari_ini(date('w')),
													'products_post_tanggal'=>date('Y-m-d'),
													'products_post_jam'=>date('H:i:s'),
													'products_dibaca'=>'0',
													'products_status'=>'publish',
													'products_meta_desk'=>$this->input->post('products_meta_desk'),
													'products_keyword'=>$tag);

												}else {
												$data = array(
													'products_post_oleh'=>$this->session->username,
													'products_judul'=>$this->db->escape_str($this->input->post('products_judul')),
													'products_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
													'products_desk'=>$this->input->post('products_desk'),
													'products_tahun'=>$this->input->post('products_tahun'),
													'products_cat_id'=>$this->input->post('products_cat_id'),
													'products_post_hari'=>hari_ini(date('w')),
													'products_post_tanggal'=>date('Y-m-d'),
													'products_post_jam'=>date('H:i:s'),
													'products_dibaca'=>'0',
													'products_status'=>'publish',
													'products_gambar'=>$hasil22['file_name'],
													'products_gambar2'=>$hasilgmbr2['file_name'],
													'products_gambar3'=>$hasilgmbr3['file_name'],
													'products_gambar4'=>$hasilgmbr4['file_name'],
													'products_gambar5'=>$hasilgmbr5['file_name'],
													'products_gambar6'=>$hasilgmbr6['file_name'],
													'products_meta_desk'=>$this->input->post('products_meta_desk'),
													'products_keyword'=>$tag);
												}
								$this->Panel_m->insert('products',$data);
								redirect('paneladmin/products');
				}else{
					$data['karyawan_menu_open']   = '';
					$data['records'] = $this->Crud_m->view_ordering('products_category','products_cat_id','DESC');
					$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					$this->load->view('backend/products/v_tambahkan', $data);
				}
	}
	public function products_update()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'bahan/foto_products/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_products/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_products/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$this->upload->initialize($config);
			$this->upload->do_upload('gambar2');
			$hasilgmbr2=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_products/'.$hasilgmbr2['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_products/'.$hasilgmbr2['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$this->upload->initialize($config);
			$this->upload->do_upload('gambar3');
			$hasilgmbr3=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_products/'.$hasilgmbr3['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_products/'.$hasilgmbr3['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$this->upload->initialize($config);
			$this->upload->do_upload('gambar4');
			$hasilgmbr4=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_products/'.$hasilgmbr4['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_products/'.$hasilgmbr4['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$this->upload->initialize($config);
			$this->upload->do_upload('gambar5');
			$hasilgmbr5=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_products/'.$hasilgmbr5['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_products/'.$hasilgmbr5['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			$this->upload->initialize($config);
			$this->upload->do_upload('gambar6');
			$hasilgmbr6=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_products/'.$hasilgmbr6['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_products/'.$hasilgmbr6['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if ($this->input->post('products_keyword')!=''){
						$tag_seo = $this->input->post('products_keyword');
						$tag=implode(',',$tag_seo);
				}else{
						$tag = '';
				}
			$tag = $this->input->post('products_keyword');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('keyword_nama'=>$this->db->escape_str($t),
							'keyword_username'=>$this->session->username,
							'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
							'count'=>'0');
					$this->Panel_m->insert('keyword',$data);
				}
				$tags2[] = $this->mylibrary->seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil22['file_name']=='' && $hasilgmbr2['file_name']=='' && $hasilgmbr3['file_name']=='' && $hasilgmbr4['file_name']=='' && $hasilgmbr5['file_name']=='' && $hasilgmbr6['file_name']==''){
										$data = array(
											'products_update_oleh'=>$this->session->username,
											'products_judul'=>$this->db->escape_str($this->input->post('products_judul')),
											'products_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
											'products_desk'=>$this->input->post('products_desk'),
											'products_tahun'=>$this->input->post('products_tahun'),
											'products_cat_id'=>$this->input->post('products_cat_id'),
											'products_update_hari'=>hari_ini(date('w')),
											'products_update_tanggal'=>date('Y-m-d'),
											'products_update_jam'=>date('H:i:s'),
											'products_meta_desk'=>$this->input->post('products_meta_desk'),
											'products_keyword'=>$tag);
											$where = array('products_id' => $this->input->post('products_id'));
							 				$this->db->update('products', $data, $where);
						}elseif ($hasilgmbr2['file_name']=='' && $hasilgmbr3['file_name']=='' && $hasilgmbr4['file_name']=='' && $hasilgmbr5['file_name']=='' && $hasilgmbr6['file_name']==''){
										$data = array(
											'products_update_oleh'=>$this->session->username,
											'products_judul'=>$this->db->escape_str($this->input->post('products_judul')),
											'products_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
											'products_desk'=>$this->input->post('products_desk'),
											'products_tahun'=>$this->input->post('products_tahun'),
											'products_harga'=>$this->input->post('products_harga'),
											'products_cat_id'=>$this->input->post('products_cat_id'),
											'products_update_hari'=>hari_ini(date('w')),
											'products_update_tanggal'=>date('Y-m-d'),
											'products_update_jam'=>date('H:i:s'),
											'products_gambar'=>$hasil22['file_name'],
											'products_meta_desk'=>$this->input->post('products_meta_desk'),
											'products_keyword'=>$tag);
											$where = array('products_id' => $this->input->post('products_id'));
											$_image = $this->db->get_where('products',$where)->row();
											$query = $this->db->update('products',$data,$where);
											if($query){
												unlink("bahan/foto_products/".$_image->products_gambar);
											}
						}elseif ($hasilgmbr3['file_name']=='' && $hasilgmbr4['file_name']=='' && $hasilgmbr5['file_name']=='' && $hasilgmbr6['file_name']==''){
										$data = array(
											'products_update_oleh'=>$this->session->username,
											'products_judul'=>$this->db->escape_str($this->input->post('products_judul')),
											'products_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
											'products_desk'=>$this->input->post('products_desk'),
											'products_tahun'=>$this->input->post('products_tahun'),
											'products_harga'=>$this->input->post('products_harga'),
											'products_cat_id'=>$this->input->post('products_cat_id'),
											'products_update_hari'=>hari_ini(date('w')),
											'products_update_tanggal'=>date('Y-m-d'),
											'products_update_jam'=>date('H:i:s'),
											'products_gambar'=>$hasil22['file_name'],
											'products_gambar2'=>$hasilgmbr2['file_name'],
											'products_meta_desk'=>$this->input->post('products_meta_desk'),
											'products_keyword'=>$tag);
											$where = array('products_id' => $this->input->post('products_id'));
											$_image = $this->db->get_where('products',$where)->row();
											$query = $this->db->update('products',$data,$where);
											if($query){
												unlink("bahan/foto_products/".$_image->products_gambar);
												unlink("bahan/foto_products/".$_image->products_gambar2);
											}
						}elseif ($hasilgmbr4['file_name']=='' && $hasilgmbr5['file_name']=='' && $hasilgmbr6['file_name']==''){
										$data = array(
											'products_update_oleh'=>$this->session->username,
											'products_judul'=>$this->db->escape_str($this->input->post('products_judul')),
											'products_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
											'products_desk'=>$this->input->post('products_desk'),
											'products_tahun'=>$this->input->post('products_tahun'),
											'products_harga'=>$this->input->post('products_harga'),
											'products_cat_id'=>$this->input->post('products_cat_id'),
											'products_update_hari'=>hari_ini(date('w')),
											'products_update_tanggal'=>date('Y-m-d'),
											'products_update_jam'=>date('H:i:s'),
											'products_gambar'=>$hasil22['file_name'],
											'products_gambar2'=>$hasilgmbr2['file_name'],
											'products_gambar3'=>$hasilgmbr3['file_name'],
											'products_meta_desk'=>$this->input->post('products_meta_desk'),
											'products_keyword'=>$tag);
											$where = array('products_id' => $this->input->post('products_id'));
											$_image = $this->db->get_where('products',$where)->row();
											$query = $this->db->update('products',$data,$where);
											if($query){
												unlink("bahan/foto_products/".$_image->products_gambar);
												unlink("bahan/foto_products/".$_image->products_gambar2);
												unlink("bahan/foto_products/".$_image->products_gambar3);
											}
						}elseif ($hasilgmbr5['file_name']=='' && $hasilgmbr6['file_name']==''){
										$data = array(
											'products_update_oleh'=>$this->session->username,
											'products_judul'=>$this->db->escape_str($this->input->post('products_judul')),
											'products_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
											'products_desk'=>$this->input->post('products_desk'),
											'products_tahun'=>$this->input->post('products_tahun'),
											'products_harga'=>$this->input->post('products_harga'),
											'products_cat_id'=>$this->input->post('products_cat_id'),
											'products_update_hari'=>hari_ini(date('w')),
											'products_update_tanggal'=>date('Y-m-d'),
											'products_update_jam'=>date('H:i:s'),
											'products_gambar'=>$hasil22['file_name'],
											'products_gambar2'=>$hasilgmbr2['file_name'],
											'products_gambar3'=>$hasilgmbr3['file_name'],
											'products_gambar4'=>$hasilgmbr4['file_name'],
											'products_meta_desk'=>$this->input->post('products_meta_desk'),
											'products_keyword'=>$tag);
											$where = array('products_id' => $this->input->post('products_id'));
											$_image = $this->db->get_where('products',$where)->row();
											$query = $this->db->update('products',$data,$where);
											if($query){
												unlink("bahan/foto_products/".$_image->products_gambar);
												unlink("bahan/foto_products/".$_image->products_gambar2);
												unlink("bahan/foto_products/".$_image->products_gambar3);
												unlink("bahan/foto_products/".$_image->products_gambar4);
											}
						}else{
										$data = array(
											'products_update_oleh'=>$this->session->username,
											'products_judul'=>$this->db->escape_str($this->input->post('products_judul')),
											'products_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
											'products_desk'=>$this->input->post('products_desk'),
											'products_tahun'=>$this->input->post('products_tahun'),
											'products_harga'=>$this->input->post('products_harga'),
											'products_cat_id'=>$this->input->post('products_cat_id'),
											'products_update_hari'=>hari_ini(date('w')),
											'products_update_tanggal'=>date('Y-m-d'),
											'products_update_jam'=>date('H:i:s'),
											'products_gambar'=>$hasil22['file_name'],
											'products_gambar2'=>$hasilgmbr2['file_name'],
											'products_gambar3'=>$hasilgmbr3['file_name'],
											'products_gambar4'=>$hasilgmbr4['file_name'],
											'products_gambar5'=>$hasilgmbr5['file_name'],
											'products_gambar6'=>$hasilgmbr6['file_name'],
											'products_meta_desk'=>$this->input->post('products_meta_desk'),
											'products_keyword'=>$tag);
											$where = array('products_id' => $this->input->post('products_id'));
											$_image = $this->db->get_where('products',$where)->row();
											$query = $this->db->update('products',$data,$where);
											if($query){
												unlink("bahan/foto_products/".$_image->products_gambar);
												unlink("bahan/foto_products/".$_image->products_gambar2);
												unlink("bahan/foto_products/".$_image->products_gambar3);
												unlink("bahan/foto_products/".$_image->products_gambar4);
												unlink("bahan/foto_products/".$_image->products_gambar5);
												unlink("bahan/foto_products/".$_image->products_gambar6);
											}
						}
						redirect('paneladmin/products');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('products', array('products_judul_seo' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('products', array('products_judul_seo' => $id, 'products_post_oleh' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);
			$data['records'] = $this->Crud_m->view_ordering('products_category','products_cat_id','DESC');
			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/products/v_update', $data);
		}
	}
	function products_delete_temp()
	{
			$data = array('products_status'=>'delete');
      $where = array('products_id' => $this->uri->segment(3));
			$this->db->update('products', $data, $where);
			redirect('paneladmin/products');
	}
	function products_restore()
	{
			$data = array('products_status'=>'Publish');
      $where = array('products_id' => $this->uri->segment(3));
			$this->db->update('products', $data, $where);
			redirect('paneladmin/products_storage_bin');
	}
	public function products_delete()
	{
			cek_session_akses ('products',$this->session->id_session);
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('products',['products_id' => $id])->row();
			 $query = $this->db->delete('products',['products_id'=>$id]);
		 	if($query){
							 unlink("./bahan/foto_products/".$_id->products_gambar);
							 unlink("./bahan/foto_products/".$_id->products_gambar2);
							 unlink("./bahan/foto_products/".$_id->products_gambar3);
							 unlink("./bahan/foto_products/".$_id->products_gambar4);
							 unlink("./bahan/foto_products/".$_id->products_gambar5);
							 unlink("./bahan/foto_products/".$_id->products_gambar6);
		 }
		redirect('paneladmin/products_storage_bin');
	}

	/*	Bagian untuk Product - Penutup	*/


	/*	Bagian untuk Dat Karyawan - Pembuka	*/
	public function data_karyawan()
	{
		$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = 'active';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';

		$data['produk_menu_open']   = '';
		$data['produk_category']   = '';
		$data['produk']   = '';
		$data['services']   = '';

				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'publish'),'id_user','DESC');
				}elseif($this->session->level=='2'){
					$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'publish'),'id_user','DESC');
				}else{
					redirect('paneladmin/home');
				}
				$this->load->view('backend/data_karyawan/v_daftar', $data);
	}
	public function data_karyawan_storage_bin()
	{
		$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = 'active';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';

		$data['produk_menu_open']   = '';
		$data['produk_category']   = '';
		$data['produk']   = '';
		$data['services']   = '';

			if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'delete'),'id_user','DESC');
				}elseif($this->session->level=='2'){
					$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'delete'),'id_user','DESC');
				}else{
					redirect('paneladmin/home');
				}
			$this->load->view('backend/data_karyawan/v_daftar_hapus', $data);
	}
	public function data_karyawan_tambahkan()
	{

		if (isset($_POST['submit'])){

					$config['upload_path'] = 'bahan/foto_karyawan/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';

					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_karyawan/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['width']= 800;
					$config['height']= 800;
					$config['new_image']= './bahan/foto_karyawan/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();


												if ($hasil22['file_name']==''){

												$data = array(
													'username' => $this->input->post('username'),
													'email' => $this->input->post('email'),
													'password' => sha1($this->input->post('password')),
													'user_status' => '1',
													'level' => $this->input->post('user_status'),
													'user_stat' => 'publish',
													'user_post_hari'=>hari_ini(date('w')),
													'user_post_tanggal'=>date('Y-m-d'),
													'user_post_jam'=>date('H:i:s'),
													'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
													'nama' => $this->input->post('nama'));
												}else {
												$data = array(
													'username' => $this->input->post('username'),
													'email' => $this->input->post('email'),
													'password' => sha1($this->input->post('password')),
													'user_status' => '1',
													'level' => $this->input->post('user_status'),
													'user_stat' => 'publish',
													'user_post_hari'=>hari_ini(date('w')),
													'user_post_tanggal'=>date('Y-m-d'),
													'user_post_jam'=>date('H:i:s'),
													'user_gambar'=>$hasil22['file_name'],
													'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
													'nama' => $this->input->post('nama'));
												}
											$id_pelanggan = $this->Crud_m->tambah_user($data);
											$data_user_detail = array(
													'id_user' => $id_pelanggan,
													'user_detail_jekel' => $this->input->post('user_detail_jekel'),
													'user_detail_agama' => $this->input->post('user_detail_agama'),
													'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
													'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
													'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
													'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
													'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
													'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
													'user_detail_divisi' => $this->input->post('user_detail_divisi'),
													'user_detail_ktp' => $this->input->post('user_detail_ktp'));
											$this->Crud_m->tambah_user_detail($data_user_detail);
											redirect('paneladmin/data_karyawan');
				}else{
					$data['karyawan_menu_open']   = 'menu-open';
					$data['home_stat']   = '';
					$data['identitas_stat']   = '';
					$data['profil_stat']   = '';
					$data['sliders_stat']   = 'active';
					$data['products_stat']   = '';
					$data['cat_products_stat']   = 'active';
					$data['testimonial_stat']   = '';
					$data['blogs_stat']   = '';
					$data['message_stat']   = '';
					$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';

					$data['produk_menu_open']   = '';
		 			$data['produk_category']   = '';
		 			$data['produk']   = '';
		 			$data['services']   = '';

					$data['records'] = $this->Crud_m->view_ordering('user_level','user_level_id','DESC');
					$data['records_divisi'] = $this->Crud_m->view_ordering('divisi','divisi_id','DESC');
					$data['records_kel'] = $this->Crud_m->view_ordering('user_kelamin','user_kelamin_id','DESC');
					$data['records_agama'] = $this->Crud_m->view_ordering('user_agama','user_agama_id','ASC');
					$data['records_kawin'] = $this->Crud_m->view_ordering('user_perkawinan','user_perkawinan_id','ASC');
					$this->load->view('backend/data_karyawan/v_tambahkan', $data);
				}
	}
	public function data_karyawan_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'bahan/foto_karyawan/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_karyawan/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['width']= 800;
			$config['height']= 800;
			$config['new_image']= './bahan/foto_karyawan/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$pass = sha1($this->input->post('password'));


						if ($hasil22['file_name']=='' AND $this->input->post('password')==''){
							$data = array(
								'username' => $this->input->post('username'),
								'email' => $this->input->post('email'),
								'level' => $this->input->post('user_status'),
								'user_update_hari'=>hari_ini(date('w')),
								'user_update_tanggal'=>date('Y-m-d'),
								'user_update_jam'=>date('H:i:s'),
								'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
								'nama' => $this->input->post('nama'));


							$data2 = array(
							'id_user' => $this->input->post('id_user'),
							'user_detail_jekel' => $this->input->post('user_detail_jekel'),
							'user_detail_agama' => $this->input->post('user_detail_agama'),
							'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
							'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
							'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
							'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
							'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
							'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
							'user_detail_divisi' => $this->input->post('user_detail_divisi'),
							'user_detail_ktp' => $this->input->post('user_detail_ktp'));

							$where = array('id_user' => $this->input->post('id_user'));
							$id = $this->db->update('user',$data,$where);
							$id2 = $this->db->update('user_detail',$data2,$where);


						}else if($this->input->post('password')==''){
								$data = array(
									'username' => $this->input->post('username'),
									'email' => $this->input->post('email'),
									'level' => $this->input->post('user_status'),
									'user_update_hari'=>hari_ini(date('w')),
									'user_update_tanggal'=>date('Y-m-d'),
									'user_update_jam'=>date('H:i:s'),
									'user_gambar'=>$hasil22['file_name'],
									'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
									'nama' => $this->input->post('nama'));


								$data2 = array(
								'id_user' => $this->input->post('id_user'),
								'user_detail_jekel' => $this->input->post('user_detail_jekel'),
								'user_detail_agama' => $this->input->post('user_detail_agama'),
								'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
								'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
								'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
								'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
								'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
								'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
								'user_detail_divisi' => $this->input->post('user_detail_divisi'),
								'user_detail_ktp' => $this->input->post('user_detail_ktp'));

								$where = array('id_user' => $this->input->post('id_user'));
								$_image = $this->db->get_where('user',$where)->row();
								$id2 = $this->db->update('user_detail',$data2,$where);
								$query = $this->db->update('user',$data,$where);
								if($query){
									unlink("bahan/foto_karyawan/".$_image->user_gambar);
								}

							}else if($hasil22['file_name']==''){
									$data = array(
										'username' => $this->input->post('username'),
										'email' => $this->input->post('email'),
										'password' => $pass,
										'level' => $this->input->post('user_status'),
										'user_update_hari'=>hari_ini(date('w')),
										'user_update_tanggal'=>date('Y-m-d'),
										'user_update_jam'=>date('H:i:s'),
										'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
										'nama' => $this->input->post('nama'));


									$data2 = array(
									'id_user' => $this->input->post('id_user'),
									'user_detail_jekel' => $this->input->post('user_detail_jekel'),
									'user_detail_agama' => $this->input->post('user_detail_agama'),
									'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
									'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
									'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
									'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
									'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
									'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
									'user_detail_divisi' => $this->input->post('user_detail_divisi'),
									'user_detail_ktp' => $this->input->post('user_detail_ktp'));

									$where = array('id_user' => $this->input->post('id_user'));
									$id = $this->db->update('user',$data,$where);
									$id2 = $this->db->update('user_detail',$data2,$where);


								}else{
							$data = array(
								'username' => $this->input->post('username'),
								'email' => $this->input->post('email'),
								'password' => sha1($this->input->post('password')),
								'level' => $this->input->post('user_status'),
								'user_update_hari'=>hari_ini(date('w')),
								'user_update_tanggal'=>date('Y-m-d'),
								'user_update_jam'=>date('H:i:s'),
								'user_gambar'=>$hasil22['file_name'],
								'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
								'nama' => $this->input->post('nama'));

								$data2 = array(
								'id_user' => $this->input->post('id_user'),
								'user_detail_jekel' => $this->input->post('user_detail_jekel'),
								'user_detail_agama' => $this->input->post('user_detail_agama'),
								'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
								'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
								'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
								'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
								'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
								'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
								'user_detail_divisi' => $this->input->post('user_detail_divisi'),
								'user_detail_ktp' => $this->input->post('user_detail_ktp'));

								$where = array('id_user' => $this->input->post('id_user'));
								$_image = $this->db->get_where('user',$where)->row();

								$id2 = $this->db->update('user_detail',$data2,$where);
								$query = $this->db->update('user',$data,$where);
								if($query){
									unlink("bahan/foto_karyawan/".$_image->user_gambar);
								}
							}
						redirect('paneladmin/data_karyawan');
		}else{
			if ($this->session->level=='1'){
						 $proses = $this->Crud_m->view_join_where2('user','user_detail','id_user',array('id_session' => $id))->row_array();
				}else{
						$proses = $this->Crud_m->view_join_where2('user','user_detail','id_user',array('id_session' => $id))->row_array();
				}
			$data = array('rows' => $proses);
			$data['karyawan_menu_open']   = 'menu-open';
			$data['home_stat']   = '';
			$data['identitas_stat']   = '';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = 'active';
			$data['products_stat']   = '';
			$data['cat_products_stat']   = 'active';
			$data['testimonial_stat']   = '';
			$data['blogs_stat']   = '';
			$data['message_stat']   = '';
			$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';

			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

			$data['records'] = $this->Crud_m->view_ordering('user_level','user_level_id','DESC');
			$data['records_divisi'] = $this->Crud_m->view_ordering('divisi','divisi_id','DESC');
			$data['records_kel'] = $this->Crud_m->view_ordering('user_kelamin','user_kelamin_id','DESC');
			$data['records_agama'] = $this->Crud_m->view_ordering('user_agama','user_agama_id','ASC');
			$data['records_kawin'] = $this->Crud_m->view_ordering('user_perkawinan','user_perkawinan_id','ASC');
			$this->load->view('backend/data_karyawan/v_update', $data);
		}
	}
	function data_karyawan_delete_temp()
	{

			$data = array('user_stat'=>'delete');
			$where = array('id_user' => $this->uri->segment(3));
			$this->db->update('user', $data, $where);
			redirect('paneladmin/data_karyawan');
	}
	function data_karyawan_restore()
	{

			$data = array('user_stat'=>'Publish');
			$where = array('id_user' => $this->uri->segment(3));
			$this->db->update('user', $data, $where);
			redirect('paneladmin/data_karyawan_storage_bin');
	}
	public function data_karyawan_delete()
	{

			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('user',['id_user' => $id])->row();
			$query = $this->db->delete('user',['id_user'=> $id]);
			$_id2 = $this->db->get_where('user_detail',['id_user' => $id])->row();
			$query2 = $this->db->delete('user_detail',['id_user'=> $id]);
			if($query){
							 unlink("./bahan/foto_karyawan/".$_id->user_gambar);
		 }
		redirect('paneladmin/data_karyawan_storage_bin');
	}
	/*	Bagian untuk Data Karyawan - Penutup	*/

	/*	Bagian untuk Data Absensi - Pembuka	*/
	public function absen()
	{
		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = 'menu-open';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = 'active';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';

				if ($this->session->level=='1'){
						$now = date('H:i:s');
						$data['absen'] = $this->Panel_m->absen_harian_user($this->session->id_user)->num_rows();
				}elseif ($this->session->level=='2'){
					$now = date('H:i:s');
					$data['absen'] = $this->Panel_m->absen_harian_user($this->session->id_user)->num_rows();
				}elseif ($this->session->level=='3'){
					$now = date('H:i:s');
					$data['absen'] = $this->Panel_m->absen_harian_user($this->session->id_user)->num_rows();
				}else{
						redirect('paneladmin/absen');
				}
				$this->load->view('backend/data_absen/v_daftar', $data);
	}
	public function absen_storage_bin()
	{
		$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = 'active';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
		cek_session_akses ('data_karyawan',$this->session->id_session);
				if ($this->session->level=='1'){
					$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'delete'),'id_user','DESC');
			}else{
				$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'delete'),'id_user','DESC');
			}
			$this->load->view('backend/data_karyawan/v_daftar_hapus', $data);
	}
	public function absen_tambahkan()
	{
		cek_session_akses('data_karyawan',$this->session->id_session);
		if (isset($_POST['submit'])){

					$config['upload_path'] = 'bahan/foto_karyawan/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';

					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_karyawan/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['width']= 800;
					$config['height']= 800;
					$config['new_image']= './bahan/foto_karyawan/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();


												if ($hasil22['file_name']==''){

												$data = array(
													'username' => $this->input->post('username'),
													'email' => $this->input->post('email'),
													'password' => sha1($this->input->post('password')),
													'user_status' => '1',
													'level' => $this->input->post('user_status'),
													'user_stat' => 'publish',
													'user_post_hari'=>hari_ini(date('w')),
													'user_post_tanggal'=>date('Y-m-d'),
													'user_post_jam'=>date('H:i:s'),
													'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
													'nama' => $this->input->post('nama'));
												}else {
												$data = array(
													'username' => $this->input->post('username'),
													'email' => $this->input->post('email'),
													'password' => sha1($this->input->post('password')),
													'user_status' => '1',
													'level' => $this->input->post('user_status'),
													'user_stat' => 'publish',
													'user_post_hari'=>hari_ini(date('w')),
													'user_post_tanggal'=>date('Y-m-d'),
													'user_post_jam'=>date('H:i:s'),
													'user_gambar'=>$hasil22['file_name'],
													'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
													'nama' => $this->input->post('nama'));
												}
											$id_pelanggan = $this->Crud_m->tambah_user($data);
											$data_user_detail = array(
													'id_user' => $id_pelanggan,
													'user_detail_jekel' => $this->input->post('user_detail_jekel'),
													'user_detail_agama' => $this->input->post('user_detail_agama'),
													'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
													'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
													'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
													'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
													'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
													'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
													'user_detail_divisi' => $this->input->post('user_detail_divisi'),
													'user_detail_ktp' => $this->input->post('user_detail_ktp'));
											$this->Crud_m->tambah_user_detail($data_user_detail);
											redirect('paneladmin/data_karyawan');
				}else{
					$data['karyawan_menu_open']   = 'menu-open';
					$data['home_stat']   = '';
					$data['identitas_stat']   = '';
					$data['profil_stat']   = '';
					$data['sliders_stat']   = 'active';
					$data['products_stat']   = '';
					$data['cat_products_stat']   = 'active';
					$data['testimonial_stat']   = '';
					$data['blogs_stat']   = '';
					$data['message_stat']   = '';
					$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
					cek_session_akses ('data_karyawan',$this->session->id_session);
					$data['records'] = $this->Crud_m->view_ordering('user_level','user_level_id','DESC');
					$data['records_divisi'] = $this->Crud_m->view_ordering('divisi','divisi_id','DESC');
					$data['records_kel'] = $this->Crud_m->view_ordering('user_kelamin','user_kelamin_id','DESC');
					$data['records_agama'] = $this->Crud_m->view_ordering('user_agama','user_agama_id','ASC');
					$data['records_kawin'] = $this->Crud_m->view_ordering('user_perkawinan','user_perkawinan_id','ASC');
					$this->load->view('backend/data_karyawan/v_tambahkan', $data);
				}
	}
	public function absen_update()
	{
		cek_session_akses('data_karyawan',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'bahan/foto_karyawan/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_karyawan/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['width']= 800;
			$config['height']= 800;
			$config['new_image']= './bahan/foto_karyawan/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$pass = sha1($this->input->post('password'));


						if ($hasil22['file_name']=='' AND $this->input->post('password')==''){
							$data = array(
								'username' => $this->input->post('username'),
								'email' => $this->input->post('email'),
								'level' => $this->input->post('user_status'),
								'user_update_hari'=>hari_ini(date('w')),
								'user_update_tanggal'=>date('Y-m-d'),
								'user_update_jam'=>date('H:i:s'),
								'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
								'nama' => $this->input->post('nama'));


							$data2 = array(
							'id_user' => $this->input->post('id_user'),
							'user_detail_jekel' => $this->input->post('user_detail_jekel'),
							'user_detail_agama' => $this->input->post('user_detail_agama'),
							'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
							'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
							'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
							'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
							'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
							'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
							'user_detail_divisi' => $this->input->post('user_detail_divisi'),
							'user_detail_ktp' => $this->input->post('user_detail_ktp'));

							$where = array('id_user' => $this->input->post('id_user'));
							$id = $this->db->update('user',$data,$where);
							$id2 = $this->db->update('user_detail',$data2,$where);


						}else if($this->input->post('password')==''){
								$data = array(
									'username' => $this->input->post('username'),
									'email' => $this->input->post('email'),
									'level' => $this->input->post('user_status'),
									'user_update_hari'=>hari_ini(date('w')),
									'user_update_tanggal'=>date('Y-m-d'),
									'user_update_jam'=>date('H:i:s'),
									'user_gambar'=>$hasil22['file_name'],
									'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
									'nama' => $this->input->post('nama'));


								$data2 = array(
								'id_user' => $this->input->post('id_user'),
								'user_detail_jekel' => $this->input->post('user_detail_jekel'),
								'user_detail_agama' => $this->input->post('user_detail_agama'),
								'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
								'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
								'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
								'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
								'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
								'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
								'user_detail_divisi' => $this->input->post('user_detail_divisi'),
								'user_detail_ktp' => $this->input->post('user_detail_ktp'));

								$where = array('id_user' => $this->input->post('id_user'));
								$_image = $this->db->get_where('user',$where)->row();
								$id2 = $this->db->update('user_detail',$data2,$where);
								$query = $this->db->update('user',$data,$where);
								if($query){
									unlink("bahan/foto_karyawan/".$_image->user_gambar);
								}

							}else if($hasil22['file_name']==''){
									$data = array(
										'username' => $this->input->post('username'),
										'email' => $this->input->post('email'),
										'password' => $pass,
										'level' => $this->input->post('user_status'),
										'user_update_hari'=>hari_ini(date('w')),
										'user_update_tanggal'=>date('Y-m-d'),
										'user_update_jam'=>date('H:i:s'),
										'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
										'nama' => $this->input->post('nama'));


									$data2 = array(
									'id_user' => $this->input->post('id_user'),
									'user_detail_jekel' => $this->input->post('user_detail_jekel'),
									'user_detail_agama' => $this->input->post('user_detail_agama'),
									'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
									'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
									'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
									'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
									'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
									'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
									'user_detail_divisi' => $this->input->post('user_detail_divisi'),
									'user_detail_ktp' => $this->input->post('user_detail_ktp'));

									$where = array('id_user' => $this->input->post('id_user'));
									$id = $this->db->update('user',$data,$where);
									$id2 = $this->db->update('user_detail',$data2,$where);


								}else{
							$data = array(
								'username' => $this->input->post('username'),
								'email' => $this->input->post('email'),
								'password' => sha1($this->input->post('password')),
								'level' => $this->input->post('user_status'),
								'user_update_hari'=>hari_ini(date('w')),
								'user_update_tanggal'=>date('Y-m-d'),
								'user_update_jam'=>date('H:i:s'),
								'user_gambar'=>$hasil22['file_name'],
								'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
								'nama' => $this->input->post('nama'));

								$data2 = array(
								'id_user' => $this->input->post('id_user'),
								'user_detail_jekel' => $this->input->post('user_detail_jekel'),
								'user_detail_agama' => $this->input->post('user_detail_agama'),
								'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
								'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
								'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
								'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
								'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
								'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
								'user_detail_divisi' => $this->input->post('user_detail_divisi'),
								'user_detail_ktp' => $this->input->post('user_detail_ktp'));

								$where = array('id_user' => $this->input->post('id_user'));
								$_image = $this->db->get_where('user',$where)->row();

								$id2 = $this->db->update('user_detail',$data2,$where);
								$query = $this->db->update('user',$data,$where);
								if($query){
									unlink("bahan/foto_karyawan/".$_image->user_gambar);
								}
							}
						redirect('paneladmin/absen');
		}else{
			if ($this->session->level=='1'){
						 $proses = $this->Crud_m->view_join_where2('user','user_detail','id_user',array('id_session' => $id))->row_array();
				}else{
						$proses = $this->Crud_m->view_join_where2('user','user_detail','id_user',array('id_session' => $id))->row_array();
				}
			$data = array('rows' => $proses);
			$data['karyawan_menu_open']   = 'menu-open';
			$data['home_stat']   = '';
			$data['identitas_stat']   = '';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = 'active';
			$data['products_stat']   = '';
			$data['cat_products_stat']   = 'active';
			$data['testimonial_stat']   = '';
			$data['blogs_stat']   = '';
			$data['message_stat']   = '';
			$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
			cek_session_akses ('data_karyawan',$this->session->id_session);
			$data['records'] = $this->Crud_m->view_ordering('user_level','user_level_id','DESC');
			$data['records_divisi'] = $this->Crud_m->view_ordering('divisi','divisi_id','DESC');
			$data['records_kel'] = $this->Crud_m->view_ordering('user_kelamin','user_kelamin_id','DESC');
			$data['records_agama'] = $this->Crud_m->view_ordering('user_agama','user_agama_id','ASC');
			$data['records_kawin'] = $this->Crud_m->view_ordering('user_perkawinan','user_perkawinan_id','ASC');
			$this->load->view('backend/data_karyawan/v_update', $data);
		}
	}
	/*	Bagian untuk Absensi - Penutup	*/


	/*	Bagian untuk Data Absensi - Pembuka	*/
	public function data_absensi()
	{
		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = 'menu-open';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = 'active';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';

				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'publish'),'id_user','DESC');
				}elseif ($this->session->level=='2'){
					$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'publish'),'id_user','DESC');
				}elseif ($this->session->level=='3'){
					$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('username'=>$this->session->username,'user_stat'=>'publish'),'id_user','DESC');
				}else{
					redirect('paneladmin/data_karyawan');
				}
				$this->load->view('backend/data_absensi/v_daftar', $data);
	}
	public function data_absensi_storage_bin()
	{
		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = 'menu-open';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = 'active';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
		cek_session_akses ('data_karyawan',$this->session->id_session);
				if ($this->session->level=='1'){
					$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'delete'),'id_user','DESC');
			}else{
				$data['record'] = $this->Crud_m->view_join_where2_ordering('user','user_level','level','user_level_id',array('user_stat'=>'delete'),'id_user','DESC');
			}
			$this->load->view('backend/data_karyawan/v_daftar_hapus', $data);
	}
	public function data_absensi_tambahkan()
	{
		cek_session_akses('data_karyawan',$this->session->id_session);
		if (isset($_POST['submit'])){

					$config['upload_path'] = 'bahan/foto_karyawan/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';

					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_karyawan/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['width']= 800;
					$config['height']= 800;
					$config['new_image']= './bahan/foto_karyawan/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();


												if ($hasil22['file_name']==''){

												$data = array(
													'username' => $this->input->post('username'),
													'email' => $this->input->post('email'),
													'password' => sha1($this->input->post('password')),
													'user_status' => '1',
													'level' => $this->input->post('user_status'),
													'user_stat' => 'publish',
													'user_post_hari'=>hari_ini(date('w')),
													'user_post_tanggal'=>date('Y-m-d'),
													'user_post_jam'=>date('H:i:s'),
													'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
													'nama' => $this->input->post('nama'));
												}else {
												$data = array(
													'username' => $this->input->post('username'),
													'email' => $this->input->post('email'),
													'password' => sha1($this->input->post('password')),
													'user_status' => '1',
													'level' => $this->input->post('user_status'),
													'user_stat' => 'publish',
													'user_post_hari'=>hari_ini(date('w')),
													'user_post_tanggal'=>date('Y-m-d'),
													'user_post_jam'=>date('H:i:s'),
													'user_gambar'=>$hasil22['file_name'],
													'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
													'nama' => $this->input->post('nama'));
												}
											$id_pelanggan = $this->Crud_m->tambah_user($data);
											$data_user_detail = array(
													'id_user' => $id_pelanggan,
													'user_detail_jekel' => $this->input->post('user_detail_jekel'),
													'user_detail_agama' => $this->input->post('user_detail_agama'),
													'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
													'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
													'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
													'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
													'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
													'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
													'user_detail_divisi' => $this->input->post('user_detail_divisi'),
													'user_detail_ktp' => $this->input->post('user_detail_ktp'));
											$this->Crud_m->tambah_user_detail($data_user_detail);
											redirect('paneladmin/data_karyawan');
				}else{
					$data['karyawan_menu_open']   = '';
					$data['home_stat']   = '';
					$data['identitas_stat']   = '';
					$data['profil_stat']   = '';
					$data['sliders_stat']   = '';
					$data['products_stat']   = '';
					$data['cat_products_stat']   = '';
					$data['testimonial_stat']   = '';
					$data['blogs_stat']   = '';
					$data['message_stat']   = '';
					$data['gallery_stat']   = '';
					$data['kehadiran_menu_open']   = 'menu-open';
            	    $data['jamkerja_stat']   = '';
            	    $data['absen_stat']   = '';
            	    $data['dataabsen_stat']   = 'active';
            	    $data['cuti_stat']   = '';
            	    $data['gaji_stat']   = '';
            	    $data['pengumuman_stat']   = '';
            	    $data['konfig_stat']   = '';
					cek_session_akses ('data_karyawan',$this->session->id_session);
					$data['records'] = $this->Crud_m->view_ordering('user_level','user_level_id','DESC');
					$data['records_divisi'] = $this->Crud_m->view_ordering('divisi','divisi_id','DESC');
					$data['records_kel'] = $this->Crud_m->view_ordering('user_kelamin','user_kelamin_id','DESC');
					$data['records_agama'] = $this->Crud_m->view_ordering('user_agama','user_agama_id','ASC');
					$data['records_kawin'] = $this->Crud_m->view_ordering('user_perkawinan','user_perkawinan_id','ASC');
					$this->load->view('backend/data_karyawan/v_tambahkan', $data);
				}
	}
	public function data_absensi_update()
	{
		cek_session_akses('data_karyawan',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'bahan/foto_karyawan/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_karyawan/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['width']= 800;
			$config['height']= 800;
			$config['new_image']= './bahan/foto_karyawan/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();
			$pass = sha1($this->input->post('password'));


						if ($hasil22['file_name']=='' AND $this->input->post('password')==''){
							$data = array(
								'username' => $this->input->post('username'),
								'email' => $this->input->post('email'),
								'level' => $this->input->post('user_status'),
								'user_update_hari'=>hari_ini(date('w')),
								'user_update_tanggal'=>date('Y-m-d'),
								'user_update_jam'=>date('H:i:s'),
								'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
								'nama' => $this->input->post('nama'));


							$data2 = array(
							'id_user' => $this->input->post('id_user'),
							'user_detail_jekel' => $this->input->post('user_detail_jekel'),
							'user_detail_agama' => $this->input->post('user_detail_agama'),
							'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
							'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
							'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
							'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
							'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
							'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
							'user_detail_divisi' => $this->input->post('user_detail_divisi'),
							'user_detail_ktp' => $this->input->post('user_detail_ktp'));

							$where = array('id_user' => $this->input->post('id_user'));
							$id = $this->db->update('user',$data,$where);
							$id2 = $this->db->update('user_detail',$data2,$where);


						}else if($this->input->post('password')==''){
								$data = array(
									'username' => $this->input->post('username'),
									'email' => $this->input->post('email'),
									'level' => $this->input->post('user_status'),
									'user_update_hari'=>hari_ini(date('w')),
									'user_update_tanggal'=>date('Y-m-d'),
									'user_update_jam'=>date('H:i:s'),
									'user_gambar'=>$hasil22['file_name'],
									'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
									'nama' => $this->input->post('nama'));


								$data2 = array(
								'id_user' => $this->input->post('id_user'),
								'user_detail_jekel' => $this->input->post('user_detail_jekel'),
								'user_detail_agama' => $this->input->post('user_detail_agama'),
								'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
								'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
								'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
								'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
								'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
								'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
								'user_detail_divisi' => $this->input->post('user_detail_divisi'),
								'user_detail_ktp' => $this->input->post('user_detail_ktp'));

								$where = array('id_user' => $this->input->post('id_user'));
								$_image = $this->db->get_where('user',$where)->row();
								$id2 = $this->db->update('user_detail',$data2,$where);
								$query = $this->db->update('user',$data,$where);
								if($query){
									unlink("bahan/foto_karyawan/".$_image->user_gambar);
								}

							}else if($hasil22['file_name']==''){
									$data = array(
										'username' => $this->input->post('username'),
										'email' => $this->input->post('email'),
										'password' => $pass,
										'level' => $this->input->post('user_status'),
										'user_update_hari'=>hari_ini(date('w')),
										'user_update_tanggal'=>date('Y-m-d'),
										'user_update_jam'=>date('H:i:s'),
										'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
										'nama' => $this->input->post('nama'));


									$data2 = array(
									'id_user' => $this->input->post('id_user'),
									'user_detail_jekel' => $this->input->post('user_detail_jekel'),
									'user_detail_agama' => $this->input->post('user_detail_agama'),
									'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
									'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
									'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
									'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
									'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
									'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
									'user_detail_divisi' => $this->input->post('user_detail_divisi'),
									'user_detail_ktp' => $this->input->post('user_detail_ktp'));

									$where = array('id_user' => $this->input->post('id_user'));
									$id = $this->db->update('user',$data,$where);
									$id2 = $this->db->update('user_detail',$data2,$where);


								}else{
							$data = array(
								'username' => $this->input->post('username'),
								'email' => $this->input->post('email'),
								'password' => sha1($this->input->post('password')),
								'level' => $this->input->post('user_status'),
								'user_update_hari'=>hari_ini(date('w')),
								'user_update_tanggal'=>date('Y-m-d'),
								'user_update_jam'=>date('H:i:s'),
								'user_gambar'=>$hasil22['file_name'],
								'id_session'=>md5($this->input->post('email')).'-'.date('YmdHis'),
								'nama' => $this->input->post('nama'));

								$data2 = array(
								'id_user' => $this->input->post('id_user'),
								'user_detail_jekel' => $this->input->post('user_detail_jekel'),
								'user_detail_agama' => $this->input->post('user_detail_agama'),
								'user_detail_tempatlahir' => $this->input->post('user_detail_tempatlahir'),
								'user_detail_tgllahir' => $this->input->post('user_detail_tgllahir'),
								'user_detail_perkawinan' => $this->input->post('user_detail_perkawinan'),
								'user_detail_pendidikan' => $this->input->post('user_detail_pendidikan'),
								'user_detail_tempattinggal' => $this->input->post('user_detail_tempattinggal'),
								'user_detail_no_telp' => $this->input->post('user_detail_no_telp'),
								'user_detail_divisi' => $this->input->post('user_detail_divisi'),
								'user_detail_ktp' => $this->input->post('user_detail_ktp'));

								$where = array('id_user' => $this->input->post('id_user'));
								$_image = $this->db->get_where('user',$where)->row();

								$id2 = $this->db->update('user_detail',$data2,$where);
								$query = $this->db->update('user',$data,$where);
								if($query){
									unlink("bahan/foto_karyawan/".$_image->user_gambar);
								}
							}
						redirect('paneladmin/data_karyawan');
		}else{
			if ($this->session->level=='1'){
						 $proses = $this->Crud_m->view_join_where2('user','user_detail','id_user',array('id_session' => $id))->row_array();
				}else{
						$proses = $this->Crud_m->view_join_where2('user','user_detail','id_user',array('id_session' => $id))->row_array();
				}
			$data = array('rows' => $proses);
			$data['karyawan_menu_open']   = '';
			$data['home_stat']   = '';
			$data['identitas_stat']   = '';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = '';
			$data['products_stat']   = '';
			$data['cat_products_stat']   = '';
			$data['testimonial_stat']   = '';
			$data['blogs_stat']   = '';
			$data['message_stat']   = '';
			$data['gallery_stat']   = '';
			$data['kehadiran_menu_open']   = 'menu-open';
    	    $data['jamkerja_stat']   = '';
    	    $data['absen_stat']   = '';
    	    $data['dataabsen_stat']   = 'active';
    	    $data['cuti_stat']   = '';
    	    $data['gaji_stat']   = '';
    	    $data['pengumuman_stat']   = '';
    	    $data['konfig_stat']   = '';
			cek_session_akses ('data_karyawan',$this->session->id_session);
			$data['records'] = $this->Crud_m->view_ordering('user_level','user_level_id','DESC');
			$data['records_divisi'] = $this->Crud_m->view_ordering('divisi','divisi_id','DESC');
			$data['records_kel'] = $this->Crud_m->view_ordering('user_kelamin','user_kelamin_id','DESC');
			$data['records_agama'] = $this->Crud_m->view_ordering('user_agama','user_agama_id','ASC');
			$data['records_kawin'] = $this->Crud_m->view_ordering('user_perkawinan','user_perkawinan_id','ASC');
			$this->load->view('backend/data_karyawan/v_update', $data);
		}
	}
	function data_absensi_delete_temp()
	{
			cek_session_akses ('data_karyawan',$this->session->id_session);
			$data = array('user_stat'=>'delete');
			$where = array('id_user' => $this->uri->segment(3));
			$this->db->update('user', $data, $where);
			redirect('paneladmin/data_karyawan');
	}
	function data_absensi_restore()
	{
			cek_session_akses ('data_karyawan',$this->session->id_session);
			$data = array('user_stat'=>'Publish');
			$where = array('id_user' => $this->uri->segment(3));
			$this->db->update('user', $data, $where);
			redirect('paneladmin/data_karyawan_storage_bin');
	}
	public function data_absensi_delete()
	{
			cek_session_akses ('data_karyawan',$this->session->id_session);
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('user',['id_user' => $id])->row();
			$query = $this->db->delete('user',['id_user'=> $id]);
			$_id2 = $this->db->get_where('user_detail',['id_user' => $id])->row();
			$query2 = $this->db->delete('user_detail',['id_user'=> $id]);
			if($query){
							 unlink("./bahan/foto_karyawan/".$_id->user_gambar);
		 }
		redirect('paneladmin/data_karyawan_storage_bin');
	}
	/*	Bagian untuk Data Absensi - Penutup	*/

	public function portfolio_cat()
	{
		$data['karyawan_menu_open']   = '';
		
				if ($this->session->level=='1' OR $this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('portfolio_category',array('portfolio_cat_status'=>'publish'),'portfolio_cat_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('portfolio_category',array('portfolio_cat_post_oleh'=>$this->session->username,'portfolio_cat_status'=>'publish'),'portfolio_cat_id','DESC');
				}
				$this->load->view('backend/portfolio_cat/v_daftar', $data);
	}
	public function portfolio_cat_storage_bin()
	{
		$data['karyawan_menu_open']   = '';

				if ($this->session->level=='1' OR $this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('portfolio_category',array('portfolio_cat_status'=>'delete'),'portfolio_cat_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('portfolio_category',array('portfolio_cat_post_oleh'=>$this->session->username,'portfolio_cat_status'=>'delete'),'portfolio_cat_id','DESC');
				}
				$this->load->view('backend/portfolio_cat/v_daftar_hapus', $data);
	}
	public function portfolio_cat_tambahkan()
	{


		if (isset($_POST['submit'])){

			if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}			

					$config['upload_path'] = 'bahan/foto_products/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_products/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '60%';
					$config['width']= 150;
					$config['height']= 150;
					$config['new_image']= './bahan/foto_products/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($this->input->post('portfolio_cat_keyword')!=''){
								$tag_seo = $this->input->post('portfolio_cat_keyword');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
					$tag = $this->input->post('portfolio_cat_keyword');
					$tags = explode(",", $tag);
					$tags2 = array();
					foreach($tags as $t)
					{
						$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
						$a = $this->db->query($sql)->result_array();
						if(count($a) == 0){
							$data = array('keyword_nama'=>$this->db->escape_str($t),
									'keyword_username'=>$this->session->username,
									'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
									'count'=>'0');
							$this->Panel_m->insert('keyword',$data);
						}
						$tags2[] = $this->mylibrary->seo_title($t);
					}
					$tags = implode(",", $tags2);
					if ($hasil22['file_name']==''){
									$data = array(
													'portfolio_cat_id_session'=>md5('Portfolio-kategori'.''.$this->input->post('portfolio_cat_judul').''.date('YmdHis')),	
													'portfolio_cat_post_oleh'=>$this->session->id_session,
													'portfolio_cat_judul'=>$this->db->escape_str($this->input->post('portfolio_cat_judul')),
													'portfolio_cat_judul_seo'=>$this->mylibrary->seo_title($this->input->post('portfolio_cat_judul')),
													'portfolio_cat_desk'=>$this->input->post('portfolio_cat_desk'),
													'portfolio_cat_post_hari'=>hari_ini(date('w')),
													'portfolio_cat_post_tanggal'=>date('Y-m-d'),
													'portfolio_cat_post_jam'=>date('H:i:s'),
													'portfolio_cat_dibaca'=>'0',
													'portfolio_cat_status'=>'publish',
													'portfolio_cat_meta_desk'=>$this->input->post('portfolio_cat_meta_desk'),
													'portfolio_cat_keyword'=>$tag);
											}else{
												$data = array(
													'portfolio_cat_id_session'=>md5('Portfolio-kategori'.''.$this->input->post('portfolio_cat_judul').''.date('YmdHis')),	
													'portfolio_cat_post_oleh'=>$this->session->id_session,
													'portfolio_cat_judul'=>$this->db->escape_str($this->input->post('portfolio_cat_judul')),
													'portfolio_cat_judul_seo'=>$this->mylibrary->seo_title($this->input->post('portfolio_cat_judul')),
													'portfolio_cat_desk'=>$this->input->post('portfolio_cat_desk'),
													'portfolio_cat_post_hari'=>hari_ini(date('w')),
													'portfolio_cat_post_tanggal'=>date('Y-m-d'),
													'portfolio_cat_post_jam'=>date('H:i:s'),
													'portfolio_cat_dibaca'=>'0',
													'portfolio_cat_status'=>'publish',
													'portfolio_catgambar'=>$hasil22['file_name'],
													'portfolio_cat_meta_desk'=>$this->input->post('portfolio_cat_meta_desk'),
													'portfolio_cat_keyword'=>$tag);
												}
								$id_kategori_post = $this->Panel_m->insert('portfolio_category',$data);
								$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' => md5('Portfolio-kategori'.''.$this->input->post('portfolio_cat_judul').''.date('YmdHis')),
									'user_log_status'=>'Add Portfolio Kategori',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);

								redirect('paneladmin/portfolio_cat');
				} else{
					$data['karyawan_menu_open']   = '';


					$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					$this->load->view('backend/portfolio_cat/v_tambahkan', $data);
				}
	}
	public function portfolio_cat_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}			


			$config['upload_path'] = 'bahan/foto_products/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_products/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '100%';
			$config['width']= 1920;
			$config['height']= 1080;
			$config['new_image']= './bahan/foto_products/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if ($this->input->post('portfolio_cat_keyword')!=''){
						$tag_seo = $this->input->post('portfolio_cat_keyword');
						$tag=implode(',',$tag_seo);
				}else{
						$tag = '';
				}
			$tag = $this->input->post('portfolio_cat_keyword');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('keyword_nama'=>$this->db->escape_str($t),
							'keyword_username'=>$this->session->username,
							'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
							'count'=>'0');
					$this->Panel_m->insert('keyword',$data);
				}
				$tags2[] = $this->mylibrary->seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil22['file_name']==''){
										$data = array(
											'portfolio_cat_judul'=>$this->db->escape_str($this->input->post('portfolio_cat_judul')),
											'portfolio_cat_judul_seo'=>$this->mylibrary->seo_title($this->input->post('portfolio_cat_judul')),
											'portfolio_cat_desk'=>$this->input->post('portfolio_cat_desk'),
											'portfolio_cat_meta_desk'=>$this->input->post('portfolio_cat_meta_desk'),
											'portfolio_cat_keyword'=>$tag);
											$where = array('portfolio_cat_id_session' => $this->input->post('portfolio_cat_id_session'));
							 				$this->db->update('portfolio_category', $data, $where);
						}else{
										$data = array(
											'portfolio_cat_judul'=>$this->db->escape_str($this->input->post('portfolio_cat_judul')),
											'portfolio_cat_judul_seo'=>$this->mylibrary->seo_title($this->input->post('portfolio_cat_judul')),
											'portfolio_cat_desk'=>$this->input->post('portfolio_cat_desk'),
											'portfolio_cat_meta_desk'=>$this->input->post('portfolio_cat_meta_desk'),
											'portfolio_cat_gambar'=>$hasil22['file_name'],
											'portfolio_cat_keyword'=>$tag);
											$where = array('portfolio_cat_id_session' => $this->input->post('portfolio_cat_id_session'));
											$_image = $this->db->get_where('portfolio_category',$where)->row();
											$query = $this->db->update('portfolio_category',$data,$where);
											if($query){
												unlink("bahan/foto_products/".$_image->portfolio_cat_gambar);
											}

						}
							$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' => $this->input->post('portfolio_cat_id_session'),
									'user_log_status'=>'Edit Portfolio Kategori',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);
						redirect('paneladmin/portfolio_cat');
		}else{
			if ($this->session->level=='1' OR $this->session->level=='2'){
					 $proses = $this->Panel_m->edit('portfolio_category', array('portfolio_cat_id_session' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('portfolio_category', array('portfolio_cat_id_session' => $id, 'portfolio_cat_post_oleh' => $this->session->id_session))->row_array();
			}
			$data = array('rows' => $proses);


			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/portfolio_cat/v_update', $data);
		}
	}
	public function portfolio_cat_delete_temp()
	{

		if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}

			$data = array('portfolio_cat_status'=>'delete');
      		$where = array('portfolio_cat_id_session' => $this->uri->segment(3));
			$this->db->update('portfolio_category', $data, $where);
			$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Trash Portfolio Kategori',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
			redirect('paneladmin/portfolio_cat');
	}
	public function portfolio_cat_restore()
	{

		if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}

			$data = array('portfolio_cat_status'=>'Publish');
      		$where = array('portfolio_cat_id_session' => $this->uri->segment(3));
			$this->db->update('portfolio_category', $data, $where);
			$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Replace Portfolio Kategori',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
			redirect('paneladmin/portfolio_cat_storage_bin');
	}
	public function portfolio_cat_delete()
	{

			if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}


			cek_session_akses ('portfolio_cat',$this->session->id_session);
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('portfolio_category',['portfolio_cat_id_session' => $id])->row();
			 $query = $this->db->delete('portfolio_category',['portfolio_cat_id_session'=>$id]);
		 	if($query){
							 unlink("./bahan/foto_products/".$_id->portfolio_cat_gambar);
		 	}

		 				$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Delete Portfolio Kategori',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
			redirect('paneladmin/portfolio_cat_storage_bin');
	}

	public function portfolio()
	{
			$data['services']   = 'active';
				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('portfolio',array('portfolio_status'=>'publish'),'portfolio_post_tanggal','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('portfolio',array('portfolio_post_oleh'=>$this->session->username,'portfolio_status'=>'publish'),'portfolio_post_tanggal','DESC');
				}
				$this->load->view('backend/portfolio/v_daftar', $data);
	}
	public function portfolio_storage_bin()
	{
			$data['services']   = 'active';
				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('portfolio',array('portfolio_status'=>'delete'),'portfolio_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('portfolio',array('portfolio_post_oleh'=>$this->session->id_session,'portfolio_status'=>'delete'),'portfolio_id','DESC');
				}
				$this->load->view('backend/portfolio/v_daftar_hapus', $data);
	}
	public function portfolio_tambahkan()
	{
		if (isset($_POST['submit'])){

			if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}	

					$config['upload_path'] = 'bahan/foto_products/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_products/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_products/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($this->input->post('portfolio_keyword')!=''){
								$tag_seo = $this->input->post('portfolio_keyword');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
					$tag = $this->input->post('portfolio_keyword');
					$tags = explode(",", $tag);
					$tags2 = array();
					foreach($tags as $t)
					{
						$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
						$a = $this->db->query($sql)->result_array();
						if(count($a) == 0){
							$data = array('keyword_nama'=>$this->db->escape_str($t),
									'keyword_username'=>$this->session->username,
									'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
									'count'=>'0');
							$this->Panel_m->insert('keyword',$data);
						}
						$tags2[] = $this->mylibrary->seo_title($t);
					}
					$tags = implode(",", $tags2);
					if ($hasil22['file_name']==''){
									$data = array(
													'portfolio_post_oleh'=>$this->session->id_session,
													'portfolio_judul'=>$this->db->escape_str($this->input->post('portfolio_judul')),
													'portfolio_judul_seo'=>$this->mylibrary->seo_title($this->input->post('portfolio_judul')),
													'portfolio_id_session' => md5('portfolio'.''.$this->input->post('portfolio_judul').''.date('YmdHis')),
													'portfolio_judul_konten'=>$this->db->escape_str($this->input->post('portfolio_judul_konten')),												
													'portfolio_cat_id'=>$this->input->post('portfolio_cat_id_session'),
													'portfolio_desk'=>$this->input->post('portfolio_desk'),
													'portfolio_url'=>$this->input->post('portfolio_url'),
													'portfolio_post_hari'=>hari_ini(date('w')),
													'portfolio_post_tanggal'=>date('Y-m-d'),
													'portfolio_post_jam'=>date('H:i:s'),
													'portfolio_dibaca'=>'0',
													'portfolio_status'=>'publish',
													'portfolio_meta_desk'=>$this->input->post('portfolio_meta_desk'),
													'portfolio_keyword'=>$tag);
											}else{
												$data = array(
													'portfolio_post_oleh'=>$this->session->id_session,
													'portfolio_judul'=>$this->db->escape_str($this->input->post('portfolio_judul')),
													'portfolio_judul_seo'=>$this->mylibrary->seo_title($this->input->post('portfolio_judul')),
													'portfolio_id_session' => md5('portfolio'.''.$this->input->post('portfolio_judul').''.date('YmdHis')),
													'portfolio_judul_konten'=>$this->db->escape_str($this->input->post('portfolio_judul_konten')),												
													'portfolio_cat_id'=>$this->input->post('portfolio_cat_id_session'),
													'portfolio_desk'=>$this->input->post('portfolio_desk'),
													'portfolio_url'=>$this->input->post('portfolio_url'),
													'portfolio_post_hari'=>hari_ini(date('w')),
													'portfolio_post_tanggal'=>date('Y-m-d'),
													'portfolio_post_jam'=>date('H:i:s'),
													'portfolio_dibaca'=>'0',
													'portfolio_status'=>'publish',
													'portfolio_gambar'=>$hasil22['file_name'],
													'portfolio_meta_desk'=>$this->input->post('portfolio_meta_desk'),
													'portfolio_keyword'=>$tag);
												}
								$this->Panel_m->insert('portfolio',$data);

									$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' => md5('portfolio'.''.$this->input->post('portfolio_judul').''.date('YmdHis')),
									'user_log_status'=>'Add Portfolio',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);
								redirect('paneladmin/portfolio');
				}else{

					$data['services']   = 'active';
					$data['records'] = $this->Crud_m->view_ordering('portfolio_category','portfolio_cat_id','DESC');
					$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					$this->load->view('backend/portfolio/v_tambahkan', $data);
				}
	}
	public function portfolio_update()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}	

			$config['upload_path'] = 'bahan/foto_products/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_products/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_products/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if ($this->input->post('portfolio_keyword')!=''){
						$tag_seo = $this->input->post('portfolio_keyword');
						$tag=implode(',',$tag_seo);
				}else{
						$tag = '';
				}
			$tag = $this->input->post('portfolio_keyword');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('keyword_nama'=>$this->db->escape_str($t),
							'keyword_username'=>$this->session->username,
							'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
							'count'=>'0');
					$this->Panel_m->insert('keyword',$data);
				}
				$tags2[] = $this->mylibrary->seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil22['file_name']==''){
										$data = array(
									
											'portfolio_judul'=>$this->db->escape_str($this->input->post('portfolio_judul')),
											'portfolio_judul_seo'=>$this->mylibrary->seo_title($this->input->post('portfolio_judul')),
											'portfolio_judul_konten'=>$this->db->escape_str($this->input->post('portfolio_judul_konten')),
											'portfolio_cat_id'=>$this->input->post('portfolio_cat_id_session'),
											'portfolio_desk'=>$this->input->post('portfolio_desk'),
											'portfolio_meta_desk'=>$this->input->post('portfolio_meta_desk'),
											'portfolio_url'=>$this->input->post('portfolio_url'),
											'portfolio_keyword'=>$tag);
											$where = array('portfolio_id_session' => $this->input->post('portfolio_id_session'));
											$this->db->update('portfolio', $data, $where);
						}else{
										$data = array(
										
											'portfolio_judul'=>$this->db->escape_str($this->input->post('portfolio_judul')),
											'portfolio_judul_seo'=>$this->mylibrary->seo_title($this->input->post('portfolio_judul')),
											'portfolio_judul_konten'=>$this->db->escape_str($this->input->post('portfolio_judul_konten')),
											'portfolio_cat_id'=>$this->input->post('portfolio_cat_id_session'),
											'portfolio_desk'=>$this->input->post('portfolio_desk'),
											'portfolio_meta_desk'=>$this->input->post('portfolio_meta_desk'),
											'portfolio_url'=>$this->input->post('portfolio_url'),
											'portfolio_gambar'=>$hasil22['file_name'],
											'portfolio_keyword'=>$tag);
											$where = array('portfolio_id_session' => $this->input->post('portfolio_id_session'));
											$_image = $this->db->get_where('portfolio',$where)->row();
											$query = $this->db->update('portfolio',$data,$where);
											if($query){
												unlink("bahan/foto_products/".$_image->portfolio_gambar);
											}

						}
									$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' => $this->input->post('portfolio_id_session'),
									'user_log_status'=>'Edit Portfolio',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);
						redirect('paneladmin/portfolio');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('portfolio', array('portfolio_id_session' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('portfolio', array('portfolio_id_session' => $id, 'portfolio_post_oleh' => $this->session->id_session))->row_array();
			}
			$data = array('rows' => $proses);			
			$data['services']   = 'active';
			$data['records'] = $this->Crud_m->view_ordering('portfolio_category','portfolio_cat_id','DESC');
			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/portfolio/v_update', $data);
		}
	}
	public function portfolio_delete_temp()
	{
		if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}	

			$data = array('portfolio_status'=>'delete');
			$where = array('portfolio_id_session' => $this->uri->segment(3));
			$this->db->update('portfolio', $data, $where);
				$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Trash Portfolio',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
			redirect('paneladmin/portfolio');
	}
	public function portfolio_restore()
	{
		if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}	
			$data = array('portfolio_status'=>'Publish');
			$where = array('portfolio_id_session' => $this->uri->segment(3));
			$this->db->update('portfolio', $data, $where);
				$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Replace Portfolio',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
			redirect('paneladmin/portfolio_storage_bin');
	}
	public function portfolio_delete()
	{

				if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}


						cek_session_akses ('portfolio',$this->session->id_session);
						$id = $this->uri->segment(3);
						$_id = $this->db->get_where('portfolio',['portfolio_id_session' => $id])->row();
						 $query = $this->db->delete('portfolio',['portfolio_id_session'=>$id]);
						if($query){
										 unlink("./bahan/foto_products/".$_id->portfolio_cat_gambar);
					 }
		 	 				$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Delete Portfolio',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
					redirect('paneladmin/portfolio_storage_bin');
	}


	/*	Bagian untuk products cat - Pembuka	*/
	public function products_cat()
	{
		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = 'menu-open';
			$data['produk_category']   = 'active';
			$data['produk']   = '';
			$data['services']   = '';

				if ($this->session->level=='1' OR $this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('products_category',array('products_cat_status'=>'publish'),'products_cat_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('products_category',array('products_cat_post_oleh'=>$this->session->username,'products_cat_status'=>'publish'),'products_cat_id','DESC');
				}
				$this->load->view('backend/products_cat/v_daftar', $data);
	}
	public function products_cat_storage_bin()
	{
		$data['karyawan_menu_open']   = '';

				if ($this->session->level=='1' OR $this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('products_category',array('products_cat_status'=>'delete'),'products_cat_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('products_category',array('products_cat_post_oleh'=>$this->session->username,'products_cat_status'=>'delete'),'products_cat_id','DESC');
				}
				$this->load->view('backend/products_cat/v_daftar_hapus', $data);
	}
	public function products_cat_tambahkan()
	{


		if (isset($_POST['submit'])){

			if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}			

					$config['upload_path'] = 'bahan/foto_products/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_products/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '60%';
					$config['width']= 150;
					$config['height']= 150;
					$config['new_image']= './bahan/foto_products/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($this->input->post('products_cat_keyword')!=''){
								$tag_seo = $this->input->post('products_cat_keyword');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
					$tag = $this->input->post('products_cat_keyword');
					$tags = explode(",", $tag);
					$tags2 = array();
					foreach($tags as $t)
					{
						$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
						$a = $this->db->query($sql)->result_array();
						if(count($a) == 0){
							$data = array('keyword_nama'=>$this->db->escape_str($t),
									'keyword_username'=>$this->session->username,
									'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
									'count'=>'0');
							$this->Panel_m->insert('keyword',$data);
						}
						$tags2[] = $this->mylibrary->seo_title($t);
					}
					$tags = implode(",", $tags2);
					if ($hasil22['file_name']==''){
									$data = array(
													'products_cat_id_session'=>md5('kategori'.''.$this->input->post('products_cat_judul').''.date('YmdHis')),	
													'products_cat_post_oleh'=>$this->session->id_session,
													'products_cat_judul'=>$this->db->escape_str($this->input->post('products_cat_judul')),
													'products_cat_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_cat_judul')),
													'products_cat_desk'=>$this->input->post('products_cat_desk'),
													'products_cat_post_hari'=>hari_ini(date('w')),
													'products_cat_post_tanggal'=>date('Y-m-d'),
													'products_cat_post_jam'=>date('H:i:s'),
													'products_cat_dibaca'=>'0',
													'products_cat_status'=>'publish',
													'products_cat_meta_desk'=>$this->input->post('products_cat_meta_desk'),
													'products_cat_keyword'=>$tag);
											}else{
												$data = array(
													'products_cat_id_session'=>md5('kategori'.''.$this->input->post('products_cat_judul').''.date('YmdHis')),
													'products_cat_post_oleh'=>$this->session->id_session,
													'products_cat_judul'=>$this->db->escape_str($this->input->post('products_cat_judul')),
													'products_cat_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_cat_judul')),
													'products_cat_desk'=>$this->input->post('products_cat_desk'),
													'products_cat_post_hari'=>hari_ini(date('w')),
													'products_cat_post_tanggal'=>date('Y-m-d'),
													'products_cat_post_jam'=>date('H:i:s'),
													'products_cat_dibaca'=>'0',
													'products_cat_status'=>'publish',
													'products_catgambar'=>$hasil22['file_name'],
													'products_cat_meta_desk'=>$this->input->post('products_cat_meta_desk'),
													'products_cat_keyword'=>$tag);
												}
								$id_kategori_post = $this->Panel_m->insert('products_category',$data);
								$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' => md5('kategori'.''.$this->input->post('products_cat_judul').''.date('YmdHis')),
									'user_log_status'=>'Add Kategori',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);

								redirect('paneladmin/products_cat');
				} else{
					$data['karyawan_menu_open']   = '';


					$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					$this->load->view('backend/products_cat/v_tambahkan', $data);
				}
	}
	public function products_cat_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}			


			$config['upload_path'] = 'bahan/foto_products/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_products/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '100%';
			$config['width']= 1920;
			$config['height']= 1080;
			$config['new_image']= './bahan/foto_products/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if ($this->input->post('products_cat_keyword')!=''){
						$tag_seo = $this->input->post('products_cat_keyword');
						$tag=implode(',',$tag_seo);
				}else{
						$tag = '';
				}
			$tag = $this->input->post('products_cat_keyword');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('keyword_nama'=>$this->db->escape_str($t),
							'keyword_username'=>$this->session->username,
							'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
							'count'=>'0');
					$this->Panel_m->insert('keyword',$data);
				}
				$tags2[] = $this->mylibrary->seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil22['file_name']==''){
										$data = array(
											'products_cat_judul'=>$this->db->escape_str($this->input->post('products_cat_judul')),
											'products_cat_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_cat_judul')),
											'products_cat_desk'=>$this->input->post('products_cat_desk'),
											'products_cat_meta_desk'=>$this->input->post('products_cat_meta_desk'),
											'products_cat_keyword'=>$tag);
											$where = array('products_cat_id_session' => $this->input->post('products_cat_id_session'));
							 				$this->db->update('products_category', $data, $where);
						}else{
										$data = array(
											'products_cat_judul'=>$this->db->escape_str($this->input->post('products_cat_judul')),
											'products_cat_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_cat_judul')),
											'products_cat_desk'=>$this->input->post('products_cat_desk'),
											'products_cat_gambar'=>$hasil22['file_name'],
											'products_cat_meta_desk'=>$this->input->post('products_cat_meta_desk'),
											'products_cat_keyword'=>$tag);
											$where = array('products_cat_id_session' => $this->input->post('products_cat_id_session'));
											$_image = $this->db->get_where('products_category',$where)->row();
											$query = $this->db->update('products_category',$data,$where);
											if($query){
												unlink("bahan/foto_products/".$_image->products_cat_gambar);
											}

						}
							$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' => $this->input->post('products_cat_id_session'),
									'user_log_status'=>'Edit Kategori',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);
						redirect('paneladmin/products_cat');
		}else{
			if ($this->session->level=='1' OR $this->session->level=='2'){
					 $proses = $this->Panel_m->edit('products_category', array('products_cat_id_session' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('products_category', array('products_cat_id_session' => $id, 'products_cat_post_oleh' => $this->session->id_session))->row_array();
			}
			$data = array('rows' => $proses);


			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/products_cat/v_update', $data);
		}
	}
	public function products_cat_delete_temp()
	{

		if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}

			$data = array('products_cat_status'=>'delete');
      		$where = array('products_cat_id_session' => $this->uri->segment(3));
			$this->db->update('products_category', $data, $where);
			$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Trash Kategori',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
			redirect('paneladmin/products_cat');
	}
	public function products_cat_restore()
	{

		if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}

			$data = array('products_cat_status'=>'Publish');
      		$where = array('products_cat_id_session' => $this->uri->segment(3));
			$this->db->update('products_category', $data, $where);
			$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Replace Kategori',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
			redirect('paneladmin/products_cat_storage_bin');
	}
	public function products_cat_delete()
	{

			if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}


			cek_session_akses ('products_cat',$this->session->id_session);
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('products_category',['products_cat_id_session' => $id])->row();
			 $query = $this->db->delete('products_category',['products_cat_id_session'=>$id]);
		 	if($query){
							 unlink("./bahan/foto_products/".$_id->products_cat_gambar);
		 	}

		 				$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Delete Kategori',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
			redirect('paneladmin/products_cat_storage_bin');
	}
	/*	Bagian untuk Product Category - Penutup	*/


	/*	Bagian untuk products cat - Pembuka	*/
	public function services()
	{
			$data['services']   = 'active';
				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('services',array('services_status'=>'publish'),'services_post_tanggal','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('services',array('services_post_oleh'=>$this->session->username,'services_status'=>'publish'),'services_post_tanggal','DESC');
				}
				$this->load->view('backend/services/v_daftar', $data);
	}
	public function services_storage_bin()
	{
			$data['services']   = 'active';
				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('services',array('services_status'=>'delete'),'services_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('services',array('services_post_oleh'=>$this->session->username,'servicest_status'=>'delete'),'services_id','DESC');
				}
				$this->load->view('backend/services/v_daftar_hapus', $data);
	}
	public function services_tambahkan()
	{
		if (isset($_POST['submit'])){

			if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}	

					$config['upload_path'] = 'bahan/foto_products/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_products/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_products/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($this->input->post('services_keyword')!=''){
								$tag_seo = $this->input->post('services_keyword');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
					$tag = $this->input->post('services_keyword');
					$tags = explode(",", $tag);
					$tags2 = array();
					foreach($tags as $t)
					{
						$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
						$a = $this->db->query($sql)->result_array();
						if(count($a) == 0){
							$data = array('keyword_nama'=>$this->db->escape_str($t),
									'keyword_username'=>$this->session->username,
									'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
									'count'=>'0');
							$this->Panel_m->insert('keyword',$data);
						}
						$tags2[] = $this->mylibrary->seo_title($t);
					}
					$tags = implode(",", $tags2);
					if ($hasil22['file_name']==''){
									$data = array(
													'services_post_oleh'=>$this->session->id_session,
													'services_judul'=>$this->db->escape_str($this->input->post('services_judul')),
													'services_judul_seo'=>$this->mylibrary->seo_title($this->input->post('services_judul')),
													'services_id_session' => md5('Services'.''.$this->input->post('services_judul').''.date('YmdHis')),
													'services_judul_konten'=>$this->db->escape_str($this->input->post('services_judul_konten')),
													'services_harga'=>$this->db->escape_str($this->input->post('services_harga')),
													'services_harga_percent'=>$this->db->escape_str($this->input->post('services_harga_percent')),
													'services_harga_modal'=>$this->db->escape_str($this->input->post('services_harga_modal')),
													'products_cat_id'=>$this->input->post('products_cat_id_session'),
													'services_desk'=>$this->input->post('services_desk'),
													'services_post_hari'=>hari_ini(date('w')),
													'services_post_tanggal'=>date('Y-m-d'),
													'services_post_jam'=>date('H:i:s'),
													'services_dibaca'=>'0',
													'services_status'=>'publish',
													'services_meta_desk'=>$this->input->post('services_meta_desk'),
													'services_keyword'=>$tag);
											}else{
												$data = array(
													'services_post_oleh'=>$this->session->id_session,
													'services_judul'=>$this->db->escape_str($this->input->post('services_judul')),
													'services_judul_seo'=>$this->mylibrary->seo_title($this->input->post('services_judul')),
													'services_id_session' => md5('Services'.''.$this->input->post('services_judul').''.date('YmdHis')),
													'services_judul_konten'=>$this->db->escape_str($this->input->post('services_judul_konten')),
													'services_harga'=>$this->db->escape_str($this->input->post('services_harga')),
													'services_harga_percent'=>$this->db->escape_str($this->input->post('services_harga_percent')),
													'services_harga_modal'=>$this->db->escape_str($this->input->post('services_harga_modal')),
													'products_cat_id'=>$this->input->post('products_cat_id_session'),
													'services_desk'=>$this->input->post('services_desk'),
													'services_post_hari'=>hari_ini(date('w')),
													'services_post_tanggal'=>date('Y-m-d'),
													'services_post_jam'=>date('H:i:s'),
													'services_dibaca'=>'0',
													'services_status'=>'publish',
													'services_gambar'=>$hasil22['file_name'],
													'services_meta_desk'=>$this->input->post('services_meta_desk'),
													'services_keyword'=>$tag);
												}
								$this->Panel_m->insert('services',$data);

									$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' => md5('Services'.''.$this->input->post('services_judul').''.date('YmdHis')),
									'user_log_status'=>'Add Services',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);
								redirect('paneladmin/services');
				}else{

					$data['services']   = 'active';
					$data['records'] = $this->Crud_m->view_ordering('products_category','products_cat_id','DESC');
					$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					$this->load->view('backend/services/v_tambahkan', $data);
				}
	}
	public function services_update()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}	

			$config['upload_path'] = 'bahan/foto_products/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_products/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_products/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if ($this->input->post('services_keyword')!=''){
						$tag_seo = $this->input->post('services_keyword');
						$tag=implode(',',$tag_seo);
				}else{
						$tag = '';
				}
			$tag = $this->input->post('services_keyword');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('keyword_nama'=>$this->db->escape_str($t),
							'keyword_username'=>$this->session->username,
							'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
							'count'=>'0');
					$this->Panel_m->insert('keyword',$data);
				}
				$tags2[] = $this->mylibrary->seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil22['file_name']==''){
										$data = array(
									
											'services_judul'=>$this->db->escape_str($this->input->post('services_judul')),
											'services_judul_seo'=>$this->mylibrary->seo_title($this->input->post('services_judul')),
											'services_judul_konten'=>$this->db->escape_str($this->input->post('services_judul_konten')),
											'services_harga'=>$this->db->escape_str($this->input->post('services_harga')),
											'services_harga_percent'=>$this->db->escape_str($this->input->post('services_harga_percent')),
											'services_harga_modal'=>$this->db->escape_str($this->input->post('services_harga_modal')),

											'products_cat_id'=>$this->input->post('products_cat_id_session'),
											'services_desk'=>$this->input->post('services_desk'),
											'services_meta_desk'=>$this->input->post('services_meta_desk'),
											'services_keyword'=>$tag);
											$where = array('services_id_session' => $this->input->post('services_id_session'));
											$this->db->update('services', $data, $where);
						}else{
										$data = array(
										
											'services_judul'=>$this->db->escape_str($this->input->post('services_judul')),
											'services_judul_seo'=>$this->mylibrary->seo_title($this->input->post('services_judul')),
											'services_judul_konten'=>$this->db->escape_str($this->input->post('services_judul_konten')),
											'services_harga'=>$this->db->escape_str($this->input->post('services_harga')),
											'services_harga_percent'=>$this->db->escape_str($this->input->post('services_harga_percent')),
											'services_harga_modal'=>$this->db->escape_str($this->input->post('services_harga_modal')),
											'products_cat_id'=>$this->input->post('products_cat_id_session'),
											'services_desk'=>$this->input->post('services_desk'),
											'services_gambar'=>$hasil22['file_name'],
											'services_meta_desk'=>$this->input->post('services_meta_desk'),
											'services_keyword'=>$tag);
											$where = array('services_id_session' => $this->input->post('services_id_session'));
											$_image = $this->db->get_where('services',$where)->row();
											$query = $this->db->update('services',$data,$where);
											if($query){
												unlink("bahan/foto_products/".$_image->services_gambar);
											}

						}
									$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' => $this->input->post('services_id_session'),
									'user_log_status'=>'Edit Services',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);
						redirect('paneladmin/services');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('services', array('services_id_session' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('services', array('services_id_session' => $id, 'services_post_oleh' => $this->session->id_session))->row_array();
			}
			$data = array('rows' => $proses);			
			$data['services']   = 'active';
			$data['records'] = $this->Crud_m->view_ordering('products_category','products_cat_id','DESC');
			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/services/v_update', $data);
		}
	}
	public function services_delete_temp()
	{
		if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}	

			$data = array('services_status'=>'delete');
			$where = array('services_id_session' => $this->uri->segment(3));
			$this->db->update('services', $data, $where);
				$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Trash Services',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
			redirect('paneladmin/services');
	}
	public function services_restore()
	{
		if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}	
			$data = array('services_status'=>'Publish');
			$where = array('services_id_session' => $this->uri->segment(3));
			$this->db->update('services', $data, $where);
				$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Replace Services',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
			redirect('paneladmin/services_storage_bin');
	}
	public function services_delete()
	{

				if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}


						cek_session_akses ('services',$this->session->id_session);
						$id = $this->uri->segment(3);
						$_id = $this->db->get_where('services',['services_id_session' => $id])->row();
						 $query = $this->db->delete('services',['services_id_session'=>$id]);
						if($query){
										 unlink("./bahan/foto_products/".$_id->products_cat_gambar);
					 }
		 	 				$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Delete Services',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
					redirect('paneladmin/services_storage_bin');
	}

	public function services_sub1()
	{
			$data['services']   = 'active';
				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('services_sub1',array('services_sub1_status'=>'publish'),'services_sub1_post_tanggal','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('services_sub1',array('services_sub1_post_oleh'=>$this->session->username,'services_sub1_status'=>'publish'),'services_sub1_post_tanggal','DESC');
				}
				$this->load->view('backend/services/v_daftar_sub1', $data);
	}
	public function services_sub1_storage_bin()
	{
			$data['services']   = 'active';
				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('services_sub1',array('services_sub1_status'=>'delete'),'services_sub1_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('services_sub1',array('services_sub1_post_oleh'=>$this->session->username,'services_sub1_status'=>'delete'),'services_sub1_id','DESC');
				}
				$this->load->view('backend/services/v_daftar_hapus_sub1', $data);
	}
	public function services_sub1_tambahkan()
	{
		if (isset($_POST['submit'])){

			if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}	

					$config['upload_path'] = 'bahan/foto_products/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_products/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '80%';
					$config['new_image']= './bahan/foto_products/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($this->input->post('services_keyword')!=''){
								$tag_seo = $this->input->post('services_keyword');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
					$tag = $this->input->post('services_keyword');
					$tags = explode(",", $tag);
					$tags2 = array();
					foreach($tags as $t)
					{
						$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
						$a = $this->db->query($sql)->result_array();
						if(count($a) == 0){
							$data = array('keyword_nama'=>$this->db->escape_str($t),
									'keyword_username'=>$this->session->username,
									'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
									'count'=>'0');
							$this->Panel_m->insert('keyword',$data);
						}
						$tags2[] = $this->mylibrary->seo_title($t);
					}
					$tags = implode(",", $tags2);
					if ($hasil22['file_name']==''){
									$data = array(
													'services_sub1_post_oleh'=>$this->session->id_session,
													'services_sub1_judul'=>$this->db->escape_str($this->input->post('services_sub1_judul')),
													'services_sub1_judul_seo'=>$this->mylibrary->seo_title($this->input->post('services_sub1_judul')),
													'services_sub1_id_session' => md5('Services-sub'.''.$this->input->post('services_sub1_judul').''.date('YmdHis')),
													'services_sub1_judul_konten'=>$this->db->escape_str($this->input->post('services_sub1_judul_konten')),
													'services_sub1_harga'=>$this->db->escape_str($this->input->post('services_sub1_harga')),
													'services_sub1_harga_percent'=>$this->db->escape_str($this->input->post('services_sub1_harga_percent')),
													'services_sub1_harga_modal'=>$this->db->escape_str($this->input->post('services_sub1_harga_modal')),
													'services_sub1_total_bulan'=>$this->db->escape_str($this->input->post('services_sub1_total_bulan')),
													'services_id_session'=>$this->input->post('services_id_session'),
													'services_sub1_desk'=>$this->input->post('services_sub1_desk'),
													'services_sub1_post_hari'=>hari_ini(date('w')),
													'services_sub1_post_tanggal'=>date('Y-m-d'),
													'services_sub1_post_jam'=>date('H:i:s'),
													'services_sub1_dibaca'=>'0',
													'services_sub1_status'=>'publish',
													'services_sub1_meta_desk'=>$this->input->post('services_sub1_meta_desk'),
													'services_sub1_keyword'=>$tag);
											}else{
												$data = array(
													'services_sub1_post_oleh'=>$this->session->id_session,
													'services_sub1_judul'=>$this->db->escape_str($this->input->post('services_sub1_judul')),
													'services_sub1_judul_seo'=>$this->mylibrary->seo_title($this->input->post('services_sub1_judul')),
													'services_sub1_id_session' => md5('Services-sub'.''.$this->input->post('services_sub1_judul').''.date('YmdHis')),
													'services_sub1_judul_konten'=>$this->db->escape_str($this->input->post('services_sub1_judul_konten')),
													'services_sub1_harga'=>$this->db->escape_str($this->input->post('services_sub1_harga')),
													'services_sub1_harga_percent'=>$this->db->escape_str($this->input->post('services_sub1_harga_percent')),
													'services_sub1_harga_modal'=>$this->db->escape_str($this->input->post('services_sub1_harga_modal')),
													'services_sub1_total_bulan'=>$this->db->escape_str($this->input->post('services_sub1_total_bulan')),
													'services_id_session'=>$this->input->post('services_id_session'),
													'services_sub1_desk'=>$this->input->post('services_sub1_desk'),
													'services_sub1_post_hari'=>hari_ini(date('w')),
													'services_sub1_post_tanggal'=>date('Y-m-d'),
													'services_sub1_post_jam'=>date('H:i:s'),
													'services_sub1_dibaca'=>'0',
													'services_sub1_status'=>'publish',
													'services_sub1_gambar'=>$hasil22['file_name'],
													'services_sub1_meta_desk'=>$this->input->post('services_sub1_meta_desk'),
													'services_sub1_keyword'=>$tag);
												}
								$this->Panel_m->insert('services_sub1',$data);

									$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' => md5('Services-sub'.''.$this->input->post('services_sub1_judul').''.date('YmdHis')),
									'user_log_status'=>'Add Services Sub',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);
								redirect('paneladmin/services_sub1');
				}else{

					$data['services']   = 'active';
					$data['records'] = $this->Crud_m->view_ordering('services','services_id','DESC');
					$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					$this->load->view('backend/services/v_tambahkan_sub1', $data);
				}
	}
	public function services_sub1_update()
	{
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
			if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}	

			$config['upload_path'] = 'bahan/foto_products/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_products/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['new_image']= './bahan/foto_products/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if ($this->input->post('services_sub1_keyword')!=''){
						$tag_seo = $this->input->post('services_sub1_keyword');
						$tag=implode(',',$tag_seo);
				}else{
						$tag = '';
				}
			$tag = $this->input->post('services_sub1_keyword');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('keyword_nama'=>$this->db->escape_str($t),
							'keyword_username'=>$this->session->username,
							'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
							'count'=>'0');
					$this->Panel_m->insert('keyword',$data);
				}
				$tags2[] = $this->mylibrary->seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil22['file_name']==''){
										$data = array(
									
											'services_sub1_judul'=>$this->db->escape_str($this->input->post('services_sub1_judul')),
											'services_sub1_judul_seo'=>$this->mylibrary->seo_title($this->input->post('services_sub1_judul')),
											'services_sub1_judul_konten'=>$this->db->escape_str($this->input->post('services_sub1_judul_konten')),
											'services_sub1_harga'=>$this->db->escape_str($this->input->post('services_sub1_harga')),
											'services_sub1_harga_percent'=>$this->db->escape_str($this->input->post('services_sub1_harga_percent')),
											'services_sub1_harga_modal'=>$this->db->escape_str($this->input->post('services_sub1_harga_modal')),
											'services_sub1_total_bulan'=>$this->db->escape_str($this->input->post('services_sub1_total_bulan')),

											'services_id_session'=>$this->input->post('services_id_session'),
											'services_sub1_desk'=>$this->input->post('services_sub1_desk'),
											'services_sub1_meta_desk'=>$this->input->post('services_sub1_meta_desk'),
											'services_sub1_keyword'=>$tag);
											$where = array('services_sub1_id_session' => $this->input->post('services_sub1_id_session'));
											$this->db->update('services_sub1', $data, $where);
						}else{
										$data = array(
										
											'services_sub1_judul'=>$this->db->escape_str($this->input->post('services_sub1_judul')),
											'services_sub1_judul_seo'=>$this->mylibrary->seo_title($this->input->post('services_sub1_judul')),
											'services_sub1_judul_konten'=>$this->db->escape_str($this->input->post('services_sub1_judul_konten')),
											'services_sub1_harga'=>$this->db->escape_str($this->input->post('services_sub1_harga')),
											'services_sub1_harga_percent'=>$this->db->escape_str($this->input->post('services_sub1_harga_percent')),
											'services_sub1_harga_modal'=>$this->db->escape_str($this->input->post('services_sub1_harga_modal')),
											'services_sub1_total_bulan'=>$this->db->escape_str($this->input->post('services_sub1_total_bulan')),

											'services_id_session'=>$this->input->post('services_id_session'),
											'services_sub1_desk'=>$this->input->post('services_sub1_desk'),
											'services_sub1_meta_desk'=>$this->input->post('services_sub1_meta_desk'),
											'services_sub1_gambar'=>$hasil22['file_name'],
											'services_sub1_meta_desk'=>$this->input->post('services_sub1_meta_desk'),
											'services_sub1_keyword'=>$tag);
											$where = array('services_sub1_id_session' => $this->input->post('services_sub1_id_session'));
											$_image = $this->db->get_where('services_sub1',$where)->row();
											$query = $this->db->update('services_sub1',$data,$where);
											if($query){
												unlink("bahan/foto_products/".$_image->services_sub1_gambar);
											}

						}
									$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' => $this->input->post('services_sub1_id_session'),
									'user_log_status'=>'Edit Services Sub',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);
						redirect('paneladmin/services_sub1');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('services_sub1', array('services_sub1_id_session' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('services_sub1', array('services_sub1_id_session' => $id, 'services_sub1_post_oleh' => $this->session->id_session))->row_array();
			}
			$data = array('rows' => $proses);			
			$data['services']   = 'active';
			$data['records'] = $this->Crud_m->view_ordering('services','services_id','DESC');
			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/services/v_update_sub1', $data);
		}
	}
	public function services_sub1_delete_temp()
	{
		if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}	

			$data = array('services_sub1_status'=>'delete');
			$where = array('services_sub1_id_session' => $this->uri->segment(3));
			$this->db->update('services_sub1', $data, $where);
				$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Trash Services Sub',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
			redirect('paneladmin/services_sub1');
	}
	public function services_sub1_restore()
	{
		if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}	
			$data = array('services_sub1_status'=>'Publish');
			$where = array('services_sub1_id_session' => $this->uri->segment(3));
			$this->db->update('services_sub1', $data, $where);
				$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Replace Services Sub',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
			redirect('paneladmin/services_sub1_storage_bin');
	}
	public function services_sub1_delete()
	{

				if ($this->agent->is_browser())
					{
								$agent = 'Desktop ' .$this->agent->browser().' '.$this->agent->version();
					}
					elseif ($this->agent->is_robot())
					{
								$agent = $this->agent->robot();
					}
					elseif ($this->agent->is_mobile())
					{
								$agent = 'Mobile' .$this->agent->mobile().''.$this->agent->version();
					}
					else
					{
								$agent = 'Unidentified User Agent';
					}


						cek_session_akses ('services_sub1',$this->session->id_session);
						$id = $this->uri->segment(3);
						$_id = $this->db->get_where('services_sub1',['services_sub1_id_session' => $id])->row();
						 $query = $this->db->delete('services_sub1',['services_sub1_id_session'=>$id]);
						if($query){
										 unlink("./bahan/foto_products/".$_id->products_cat_gambar);
					 }
		 	 				$log_file = array(
									'id_user' => $this->session->id_session,
									'user_log_ket' =>$this->uri->segment(3),
									'user_log_status'=>'Delete Services',								
									'user_log_hari'=>hari_ini(date('w')),
									'user_log_tanggal'=>date('Y-m-d'),
									'user_log_jam'=>date('H:i:s'),
									'user_log_device'=> $agent,
									'user_log_ip' => $this->input->ip_address()
								);							

								$this->Crud_m->insert('user_log',$log_file);	
					redirect('paneladmin/services_sub1_storage_bin');
	}
	/*	Bagian untuk Product Category - Penutup	*/


	/*	Bagian untuk Jam kerja - Pembuka	*/
	public function jam_kerja()
	{

		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = 'menu-open';
	    $data['jamkerja_stat']   = 'active';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';

				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_ordering('user_jam','user_jam_id','DESC');
				}elseif($this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_ordering('user_jam','user_jam_id','DESC');
				}else{
						redirect('paneladmin/jam_kerja');
				}

				$this->load->view('backend/jamkerja/v_daftar', $data);
	}
	public function jam_kerja_storage_bin()
	{
		$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = 'active';
		$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = ''; 	     		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';

				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('divisi',array('divisi_status'=>'delete'),'divisi_id','DESC');
				}elseif($this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('divisi',array('divisi_status'=>'delete'),'divisi_id','DESC');
				}else{
						redirect('paneladmin/jam_kerja');
				}
				$this->load->view('backend/divisi/v_daftar_hapus', $data);
	}
	public function jam_kerja_update()
	{
		cek_session_akses('jam_kerja',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
										$data = array(
											'user_jam_mulai'=>$this->input->post('user_jam_mulai'),
											'user_jam_selesai'=>$this->input->post('user_jam_selesai'));
											$where = array('user_jam_judul_seo' => $this->input->post('user_jam_judul_seo'));
											$this->db->update('user_jam', $data, $where);

						redirect('paneladmin/jam_kerja');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('user_jam', array('user_jam_judul_seo' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('user_jam', array('user_jam_judul_seo' => $id))->row_array();
			}
			$data = array('rows' => $proses);
			$data['karyawan_menu_open']   = '';
			$data['home_stat']   = '';
			$data['identitas_stat']   = '';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = '';
			$data['products_stat']   = '';
			$data['cat_products_stat']   = '';
			$data['testimonial_stat']   = '';
			$data['blogs_stat']   = 'active';
			$data['message_stat']   = '';
			$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = 'menu-open'; 	    $data['jamkerja_stat']   = 'active'; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
			cek_session_akses ('jam_kerja',$this->session->id_session);
			$this->load->view('backend/jamkerja/v_update', $data);
		}
	}
	/*	Bagian untuk Jam kerja - Penutup	*/

	/*	Bagian untuk Divisi - Pembuka	*/
	public function divisi()
	{
		$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = 'active';
		$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
		$data['produk_menu_open']   = '';
		$data['produk_category']   = '';
		$data['produk']   = '';
		$data['services']   = '';
		cek_session_akses ('divisi',$this->session->id_session);
				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('divisi',array('divisi_status'=>'publish'),'divisi_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('divisi',array('divisi_post_oleh'=>$this->session->username,'divisi_status'=>'publish'),'divisi_id','DESC');
				}
				$this->load->view('backend/divisi/v_daftar', $data);
	}
	public function divisi_storage_bin()
	{
		$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = 'active';
		$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
		$data['produk_menu_open']   = '';
		$data['produk_category']   = '';
		$data['produk']   = '';
		$data['services']   = '';
		cek_session_akses ('divisi',$this->session->id_session);
				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('divisi',array('divisi_status'=>'delete'),'divisi_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('divisi',array('divisi_post_oleh'=>$this->session->username,'divisi_status'=>'delete'),'divisi_id','DESC');
				}
				$this->load->view('backend/divisi/v_daftar_hapus', $data);
	}
	public function divisi_tambahkan()
	{
		cek_session_akses('divisi',$this->session->id_session);
		if (isset($_POST['submit'])){

									$data = array(
													'divisi_post_oleh'=>$this->session->username,
													'divisi_judul'=>$this->db->escape_str($this->input->post('divisi_judul')),
													'divisi_judul_seo'=>$this->mylibrary->seo_title($this->input->post('divisi_judul')),
													'divisi_desk'=>$this->input->post('divisi_desk'),
													'divisi_post_hari'=>hari_ini(date('w')),
													'divisi_post_tanggal'=>date('Y-m-d'),
													'divisi_post_jam'=>date('H:i:s'),
													'divisi_dibaca'=>'0',
													'divisi_status'=>'publish',
													'divisi_meta_desk'=>$this->input->post('divisi_meta_desk'));

								$this->Panel_m->insert('divisi',$data);
								redirect('paneladmin/divisi');
				}else{
					$data['karyawan_menu_open']   = 'menu-open';
					$data['home_stat']   = '';
					$data['identitas_stat']   = '';
					$data['profil_stat']   = '';
					$data['sliders_stat']   = '';
					$data['products_stat']   = '';
					$data['testimonial_stat']   = '';
					$data['blogs_stat']   = '';
					$data['cat_products_stat']   = 'active';
					$data['message_stat']   = 'active';
					$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
					$data['produk_menu_open']   = '';
		 			$data['produk_category']   = '';
		 			$data['produk']   = '';
		 			$data['services']   = '';
					cek_session_akses ('divisi',$this->session->id_session);
					$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					$this->load->view('backend/divisi/v_tambahkan', $data);
				}
	}
	public function divisi_update()
	{
		cek_session_akses('divisi',$this->session->id_session);
		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
										$data = array(
											'divisi_update_oleh'=>$this->session->username,
											'divisi_judul'=>$this->db->escape_str($this->input->post('divisi_judul')),
											'divisi_judul_seo'=>$this->mylibrary->seo_title($this->input->post('divisi_judul')),
											'divisi_desk'=>$this->input->post('divisi_desk'),
											'divisi_update_hari'=>hari_ini(date('w')),
											'divisi_update_tanggal'=>date('Y-m-d'),
											'divisi_update_jam'=>date('H:i:s'),
											'divisi_meta_desk'=>$this->input->post('divisi_meta_desk'));
											$where = array('divisi_id' => $this->input->post('divisi_id'));
							 				$this->db->update('divisi', $data, $where);

						redirect('paneladmin/divisi');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('divisi', array('divisi_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('divisi', array('divisi_id' => $id, 'divisi_post_oleh' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);
			$data['karyawan_menu_open']   = 'menu-open';
			$data['home_stat']   = '';
			$data['identitas_stat']   = '';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = '';
			$data['products_stat']   = '';
			$data['cat_products_stat']   = 'active';
			$data['testimonial_stat']   = '';
			$data['blogs_stat']   = '';
			$data['message_stat']   = 'active';
			$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';
			cek_session_akses ('divisi',$this->session->id_session);
			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/divisi/v_update', $data);
		}
	}
	function divisi_delete_temp()
	{
      cek_session_akses ('divisi',$this->session->id_session);
			$data = array('divisi_status'=>'delete');
      $where = array('divisi_id' => $this->uri->segment(3));
			$this->db->update('divisi', $data, $where);
			redirect('paneladmin/divisi');
	}
	function divisi_restore()
	{
      cek_session_akses ('divisi',$this->session->id_session);
			$data = array('divisi_status'=>'Publish');
      $where = array('divisi_id' => $this->uri->segment(3));
			$this->db->update('divisi', $data, $where);
			redirect('paneladmin/divisi_storage_bin');
	}
	public function divisi_delete()
	{
			cek_session_akses ('divisi',$this->session->id_session);
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('divisi',['divisi_id' => $id])->row();
			 $query = $this->db->delete('divisi',['divisi_id'=>$id]);
		 	if($query){
							 unlink("./bahan/foto_products/".$_id->divisi_gambar);
		 }
		redirect('paneladmin/divisi_storage_bin');
	}
	/*	Bagian untuk Divisi - Penutup	*/

	/*	Bagian untuk Lowongan - Pembuka	*/
	public function lowongan()
	{
		$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = 'active';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
		$data['produk_menu_open']   = '';
		$data['produk_category']   = '';
		$data['produk']   = '';
		$data['services']   = '';

				if ($this->session->level=='1'){
					$data['record'] = $this->Crud_m->view_join_where_ordering('lowongan','divisi','divisi_id',array('products_status'=>'publish'),'products_id','DESC');
				}elseif($this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_join_where_ordering('lowongan','divisi','divisi_id',array('products_post_oleh'=>$this->session->username,'products_status'=>'publish'),'products_id','DESC');
				}else{
					redirect('paneladmin/home');
				}
				$this->load->view('backend/lowongan/v_daftar', $data);
	}
	public function lowongan_storage_bin()
	{
		$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = 'active';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';

		$data['produk_menu_open']   = '';
		$data['produk_category']   = '';
		$data['produk']   = '';
		$data['services']   = '';

				if ($this->session->level=='1'){
					$data['record'] = $this->Crud_m->view_join_where_ordering('lowongan','divisi','divisi_id',array('products_status'=>'delete'),'products_id','DESC');
				}elseif($this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_join_where_ordering('lowongan','divisi','divisi_id',array('products_post_oleh'=>$this->session->username,'products_status'=>'delete'),'products_id','DESC');
				}else{
					redirect('paneladmin/home');
				}
				$this->load->view('backend/lowongan/v_daftar_hapus', $data);
	}
	public function lowongan_tambahkan()
	{
		if (isset($_POST['submit'])){
							$data = array(
													'products_post_oleh'=>$this->session->username,
													'products_judul'=>$this->db->escape_str($this->input->post('products_judul')),
													'products_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
													'products_disc_end'=>$this->input->post('products_disc_end'),
													'products_harga'=>$this->input->post('products_harga'),
													'divisi_id'=>$this->input->post('divisi_id'),
													'products_post_hari'=>hari_ini(date('w')),
													'products_post_tanggal'=>date('Y-m-d'),
													'products_post_jam'=>date('H:i:s'),
													'products_dibaca'=>'0',
													'products_status'=>'publish');


								$this->Panel_m->insert('lowongan',$data);
								redirect('paneladmin/lowongan');
				}else{
					$data['karyawan_menu_open']   = 'menu-open';
					$data['home_stat']   = '';
					$data['identitas_stat']   = '';
					$data['profil_stat']   = '';
					$data['sliders_stat']   = '';
					$data['products_stat']   = 'active';
					$data['cat_products_stat']   = 'active';
					$data['testimonial_stat']   = '';
					$data['blogs_stat']   = '';
					$data['message_stat']   = '';
					$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';


					$data['produk_menu_open']   = '';
		 			$data['produk_category']   = '';
		 			$data['produk']   = '';
		 			$data['services']   = '';
					$data['records'] = $this->Crud_m->view_ordering('divisi','divisi_id','DESC');
					$this->load->view('backend/lowongan/v_tambahkan', $data);
				}
	}
	public function lowongan_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
						$data = array(
											'products_update_oleh'=>$this->session->username,
											'products_judul'=>$this->db->escape_str($this->input->post('products_judul')),
											'products_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
											'products_disc_end'=>$this->input->post('products_disc_end'),
											'products_harga'=>$this->input->post('products_harga'),
											'divisi_id'=>$this->input->post('divisi_id'),
											'products_update_hari'=>hari_ini(date('w')),
											'products_update_tanggal'=>date('Y-m-d'),
											'products_update_jam'=>date('H:i:s'),
											'products_meta_desk'=>$this->input->post('products_meta_desk'),
											'products_keyword'=>$tag);
											$where = array('products_id' => $this->input->post('products_id'));
											$this->db->update('lowongan', $data, $where);

						redirect('paneladmin/lowongan');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('lowongan', array('products_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('lowongan', array('products_id' => $id, 'products_post_oleh' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);
			$data['karyawan_menu_open']   = 'menu-open';
			$data['home_stat']   = '';
			$data['identitas_stat']   = '';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = '';
			$data['products_stat']   = 'active';
			$data['cat_products_stat']   = 'active';
			$data['testimonial_stat']   = '';
			$data['blogs_stat']   = '';
			$data['message_stat']   = '';
			$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';

			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';
			$data['records'] = $this->Crud_m->view_ordering('divisi','divisi_id','DESC');
			$this->load->view('backend/lowongan/v_update', $data);
		}
	}
	function lowongan_delete_temp()
	{
			$data = array('products_status'=>'delete');
			$where = array('products_id' => $this->uri->segment(3));
			$this->db->update('lowongan', $data, $where);
			redirect('paneladmin/lowongan');
	}
	function lowongan_restore()
	{
			$data = array('products_status'=>'Publish');
			$where = array('products_id' => $this->uri->segment(3));
			$this->db->update('lowongan', $data, $where);
			redirect('paneladmin/lowongan_storage_bin');
	}
	public function lowongan_delete()
	{
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('lowongan',['products_id' => $id])->row();
			 $query = $this->db->delete('lowongan',['products_id'=>$id]);
			if($query){
							 unlink("./bahan/foto_products/".$_id->products_gambar);
							 unlink("./bahan/foto_products/".$_id->products_gambar2);
							 unlink("./bahan/foto_products/".$_id->products_gambar3);
							 unlink("./bahan/foto_products/".$_id->products_gambar4);
							 unlink("./bahan/foto_products/".$_id->products_gambar5);
							 unlink("./bahan/foto_products/".$_id->products_gambar6);
		 }
		redirect('paneladmin/lowongan_storage_bin');
	}
	/*	Bagian untuk lowongan - Penutup	*/

	/*	Bagian untuk Gaji - Pembuka	*/
	public function gaji()
	{
		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = 'active';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
			$data['produk_category']   = '';
			$data['produk']   = '';
			$data['services']   = '';


				if ($this->session->level=='1'){

						$data['record'] = $this->Crud_m->view_join_where2_ordering('gaji','user','gaji_id_user','id_user',array('gaji_stat'=>'publish'),'gaji_id','DESC');
				}elseif ($this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_join_where2_ordering('gaji','user','gaji_id_user','id_user',array('gaji_stat'=>'publish'),'gaji_id','DESC');
				}elseif ($this->session->level=='3'){
						$data['record'] = $this->Crud_m->view_join_where2_ordering('gaji','user','gaji_id_user','id_user',array('username'=>$this->session->username,'gaji_stat'=>'publish'),'gaji_id','DESC');
				}else{
						redirect('paneladmin/gaji');
				}
				$this->load->view('backend/gaji/v_daftar', $data);
	}
	public function gaji_storage_bin()
	{
			$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = 'active';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_join_where2_ordering('gaji','user','gaji_id_user','id_user',array('gaji_stat'=>'delete'),'gaji_id','DESC');
				}elseif ($this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_join_where2_ordering('gaji','user','gaji_id_user','id_user',array('gaji_stat'=>'delete'),'gaji_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_join_where2_ordering('gaji','user','gaji_id_user','id_user',array('username'=>$this->session->username,'gaji_stat'=>'delete'),'gaji_id','DESC');
				}
				$this->load->view('backend/gaji/v_daftar_hapus', $data);
	}
	public function gaji_tambahkan()
	{

		if (isset($_POST['submit'])){
							$data = array(
													'gaji_post_oleh'=>$this->session->username,
													'gaji_id_user'=>$this->input->post('gaji_id_user'),
													'gaji_jabatan'=>$this->input->post('gaji_jabatan'),
													'gaji_makan'=>$this->input->post('gaji_makan'),
													'gaji_transport'=>$this->input->post('gaji_transport'),
													'gaji_pokok'=>$this->input->post('gaji_pokok'),
													'gaji_lemburan'=>$this->input->post('gaji_lemburan'),
													'gaji_thr'=>$this->input->post('gaji_thr'),
													'gaji_pinjaman'=>$this->input->post('gaji_pinjaman'),
													'gaji_post_hari'=>hari_ini(date('w')),
													'gaji_post_tanggal'=>date('Y-m-d'),
													'gaji_post_jam'=>date('H:i:s'),
													'gaji_stat'=>'publish');


								$this->Panel_m->insert('gaji',$data);
								redirect('paneladmin/gaji');
				}else{
						$data['karyawan_menu_open']   = '';
                		$data['home_stat']   = '';
                		$data['identitas_stat']   = '';
                		$data['profil_stat']   = '';
                		$data['sliders_stat']   = '';
                		$data['products_stat']   = '';
                		$data['cat_products_stat']   = '';
                		$data['testimonial_stat']   = '';
                		$data['blogs_stat']   = '';
                		$data['message_stat']   = '';
                		$data['gallery_stat']   = '';
                		$data['kehadiran_menu_open']   = '';
                	    $data['jamkerja_stat']   = '';
                	    $data['absen_stat']   = '';
                	    $data['dataabsen_stat']   = '';
                	    $data['cuti_stat']   = '';
                	    $data['gaji_stat']   = 'active';
                	    $data['pengumuman_stat']   = '';
                	    $data['konfig_stat']   = '';
											$data['produk_menu_open']   = '';
								 			$data['produk_category']   = '';
								 			$data['produk']   = '';
								 			$data['services']   = '';


					$data['record'] = $this->Crud_m->view_ordering('user','id_user','DESC');
					$this->load->view('backend/gaji/v_tambahkan', $data);
				}
	}
	public function gaji_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'bahan/foto_gaji/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_gaji/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '80%';
			$config['width']= 500;
			$config['height']= 800;
			$config['new_image']= './bahan/foto_gaji/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();


					if ($hasil22['file_name']==''){
										$data = array(
											'gaji_update_oleh'=>$this->session->username,
                							'gaji_id_user'=>$this->input->post('gaji_id_user'),
                							'gaji_pokok'=>$this->input->post('gaji_pokok'),
                							'gaji_jabatan'=>$this->input->post('gaji_jabatan'),
                							'gaji_makan'=>$this->input->post('gaji_makan'),
                							'gaji_transport'=>$this->input->post('gaji_transport'),
                							'gaji_lemburan'=>$this->input->post('gaji_lemburan'),
                							'gaji_thr'=>$this->input->post('gaji_thr'),
                							'gaji_pinjaman'=>$this->input->post('gaji_pinjaman'),
                							'gaji_update_hari'=>hari_ini(date('w')),
                							'gaji_update_tanggal'=>date('Y-m-d'),
                							'gaji_update_jam'=>date('H:i:s'));
											$where = array('gaji_id' => $this->input->post('gaji_id'));
											$this->db->update('gaji', $data, $where);
						}else{
										$data = array(
											'gaji_update_oleh'=>$this->session->username,
                							'gaji_id_user'=>$this->input->post('gaji_id_user'),
                							'gaji_pokok'=>$this->input->post('gaji_pokok'),
                							'gaji_jabatan'=>$this->input->post('gaji_jabatan'),
                							'gaji_makan'=>$this->input->post('gaji_makan'),
                							'gaji_transport'=>$this->input->post('gaji_transport'),
                							'gaji_lemburan'=>$this->input->post('gaji_lemburan'),
                							'gaji_thr'=>$this->input->post('gaji_thr'),
                							'gaji_pinjaman'=>$this->input->post('gaji_pinjaman'),
                							'gaji_update_hari'=>hari_ini(date('w')),
                							'gaji_update_tanggal'=>date('Y-m-d'),
                							'gaji_gambar'=>$hasil22['file_name'],
                							'gaji_update_jam'=>date('H:i:s'));
											$where = array('gaji_id' => $this->input->post('gaji_id'));
											$_image = $this->db->get_where('gaji',$where)->row();
											$query = $this->db->update('gaji',$data,$where);
											if($query){
												unlink("bahan/foto_gaji/".$_image->gaji_gambar);
											}

						}
						redirect('paneladmin/gaji');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('gaji', array('gaji_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('gaji', array('gaji_id' => $id))->row_array();
			}
			 $data = array('rows' => $proses);
			$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = 'active';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';


			$data['record'] = $this->Crud_m->view_ordering('user','id_user','DESC');
			$this->load->view('backend/gaji/v_update', $data);
		}
	}
	public function gaji_detail()
	{

		$id = $this->uri->segment(3);

			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('gaji', array('gaji_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('gaji', array('gaji_id' => $id))->row_array();
			}
				$data = array('rows' => $proses);
				$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = 'active';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

	    $data['record'] = $this->Crud_m->view_ordering('user','id_user','DESC');
			$this->load->view('backend/gaji/v_detail', $data);

	}
	function gaji_delete_temp()
	{

			$data = array('gaji_stat'=>'delete');
			$where = array('gaji_id' => $this->uri->segment(3));
			$this->db->update('gaji', $data, $where);
			redirect('paneladmin/gaji');
	}
	function gaji_restore()
	{

			$data = array('gaji_stat'=>'Publish');
			$where = array('gaji_id' => $this->uri->segment(3));
			$this->db->update('gaji', $data, $where);
			redirect('paneladmin/gaji');
	}
	public function gaji_delete()
	{

			$id = $this->uri->segment(3);

			 $query = $this->db->delete('gaji',['gaji_id'=>$id]);

		redirect('paneladmin/gaji_storage_bin');
	}
	/*	Bagian untuk Gaji - Penutup	*/

	/*	Bagian untuk Pengumuman - Pembuka	*/
	public function pengumuman()
	{
		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = 'active';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';


				if ($this->session->level=='1'){

						$data['record'] = $this->Crud_m->view_where_ordering('pengumuman',array('pengumuman_stat'=>'publish'),'pengumuman_id','DESC');
				}elseif ($this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_where_ordering('pengumuman',array('pengumuman_stat'=>'publish'),'pengumuman_id','DESC');
				}elseif ($this->session->level=='3'){
						$data['record'] = $this->Crud_m->view_where_ordering('pengumuman',array('pengumuman_stat'=>'publish'),'pengumuman_id','DESC');
				}else{
						edirect('paneladmin/pengumuman');
				}
				$this->load->view('backend/pengumuman/v_daftar', $data);
	}
	public function pengumuman_storage_bin()
	{
			$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = 'active';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';


				if ($this->session->level=='1'){
					$data['record'] = $this->Crud_m->view_where_ordering('pengumuman',array('pengumuman_stat'=>'delete'),'pengumuman_id','DESC');
				}else{
					$data['record'] = $this->Crud_m->view_where_ordering('pengumuman',array('pengumuman_stat'=>'delete'),'pengumuman_id','DESC');

				}
				$this->load->view('backend/pengumuman/v_daftar_hapus', $data);
	}
	public function pengumuman_tambahkan()
	{

		if (isset($_POST['submit'])){
							$data = array(
													'pengumuman_post_oleh'=>$this->session->username,
													'pengumuman_judul'=>$this->input->post('pengumuman_judul'),
													'pengumuman_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
													'pengumuman_tgl'=>$this->input->post('pengumuman_tgl'),
													'pengumuman_deskripsi'=>$this->input->post('pengumuman_deskripsi'),

													'pengumuman_post_hari'=>hari_ini(date('w')),
													'pengumuman_post_tanggal'=>date('Y-m-d'),
													'pengumuman_post_jam'=>date('H:i:s'),
													'pengumuman_stat'=>'publish');


								$this->Panel_m->insert('pengumuman',$data);
								redirect('paneladmin/pengumuman');
				}else{

						$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = 'active';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

					$this->load->view('backend/pengumuman/v_tambahkan', $data);
				}
	}
	public function pengumuman_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
						$data = array(
							'pengumuman_update_oleh'=>$this->session->username,
							'pengumuman_judul'=>$this->input->post('pengumuman_judul'),
							'pengumuman_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
							'pengumuman_tgl'=>$this->input->post('pengumuman_tgl'),
							'pengumuman_deskripsi'=>$this->input->post('pengumuman_deskripsi'),

							'pengumuman_update_hari'=>hari_ini(date('w')),
							'pengumuman_update_tanggal'=>date('Y-m-d'),
							'pengumuman_update_jam'=>date('H:i:s'));

											$where = array('pengumuman_id' => $this->input->post('pengumuman_id'));
											$this->db->update('pengumuman', $data, $where);

						redirect('paneladmin/pengumuman');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('pengumuman', array('pengumuman_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('pengumuman', array('pengumuman_id' => $id))->row_array();
			}
				$data = array('rows' => $proses);
				$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = 'active';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

			cek_session_akses ('pengumuman',$this->session->id_session);
			$this->load->view('backend/pengumuman/v_update', $data);
		}
	}
	public function pengumuman_detail()
	{

		$id = $this->uri->segment(3);

			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('pengumuman', array('pengumuman_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('pengumuman', array('pengumuman_id' => $id))->row_array();
			}
				$data = array('rows' => $proses);
				$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = 'active';
	    $data['konfig_stat']   = '';

			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

			$this->load->view('backend/pengumuman/v_detail', $data);

	}
	function pengumuman_delete_temp()
	{

			$data = array('pengumuman_stat'=>'delete');
			$where = array('pengumuman_id' => $this->uri->segment(3));
			$this->db->update('pengumuman', $data, $where);
			redirect('paneladmin/pengumuman');
	}
	function pengumuman_restore()
	{

			$data = array('pengumuman_stat'=>'Publish');
			$where = array('pengumuman_id' => $this->uri->segment(3));
			$this->db->update('pengumuman', $data, $where);
			redirect('paneladmin/pengumuman');
	}
	public function pengumuman_delete()
	{

			$id = $this->uri->segment(3);

			 $query = $this->db->delete('pengumuman',['pengumuman_id'=>$id]);

		redirect('paneladmin/pengumuman_storage_bin');
	}
	/*	Bagian untuk Pengumuman - Penutup	*/

	/*	Bagian untuk Cuti - Pembuka	*/
	public function cuti()
	{
		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = 'active';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';

			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_join_where_ordering('cuti','user','username',array('cuti_stat'=>'publish'),'cuti_id','DESC');
				}elseif ($this->session->level=='2'){
						$data['record'] = $this->Crud_m->view_join_where_ordering('cuti','user','username',array('cuti_stat'=>'publish'),'cuti_id','DESC');
				}elseif ($this->session->level=='3'){
						$data['record'] = $this->Crud_m->view_join_where_ordering('cuti','user','username',array('cuti_post_oleh'=>$this->session->username,'cuti_stat'=>'publish'),'cuti_id','DESC');
				}else{
						redirect('paneladmin/cuti');
				}
				$this->load->view('backend/cuti/v_daftar', $data);
	}
	public function cuti_storage_bin()
	{
		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = 'active';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_join_where_ordering('cuti','user','username',array('cuti_stat'=>'delete'),'cuti_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_join_where_ordering('cuti','user','username',array('cuti_post_oleh'=>$this->session->username,'cuti_stat'=>'delete'),'cuti_id','DESC');
				}
				$this->load->view('backend/cuti/v_daftar_hapus', $data);
	}
	public function cuti_tambahkan()
	{
		if (isset($_POST['submit'])){
							$data = array(
													'username'=>$this->session->username,
													'cuti_alasan'=>$this->input->post('cuti_alasan'),
													'cuti_status'=>'Diajukan',
													'cuti_end'=>$this->input->post('cuti_end'),
													'cuti_start'=>$this->input->post('cuti_start'),
													'cuti_post_oleh'=>$this->session->username,
													'cuti_post_hari'=>hari_ini(date('w')),
													'cuti_post_tanggal'=>date('Y-m-d'),
													'cuti_post_jam'=>date('H:i:s'),
													'cuti_stat'=>'publish');


								$this->Panel_m->insert('cuti',$data);
								redirect('paneladmin/cuti');
				}else{
					$data['karyawan_menu_open']   = '';
            		$data['home_stat']   = '';
            		$data['identitas_stat']   = '';
            		$data['profil_stat']   = '';
            		$data['sliders_stat']   = '';
            		$data['products_stat']   = '';
            		$data['cat_products_stat']   = '';
            		$data['testimonial_stat']   = '';
            		$data['blogs_stat']   = '';
            		$data['message_stat']   = '';
            		$data['gallery_stat']   = '';
            		$data['kehadiran_menu_open']   = '';
            	    $data['jamkerja_stat']   = '';
            	    $data['absen_stat']   = '';
            	    $data['dataabsen_stat']   = '';
            	    $data['cuti_stat']   = 'active';
            	    $data['gaji_stat']   = '';
            	    $data['pengumuman_stat']   = '';
            	    $data['konfig_stat']   = '';

									$data['produk_menu_open']   = '';
						 			$data['produk_category']   = '';
						 			$data['produk']   = '';
						 			$data['services']   = '';

					$this->load->view('backend/cuti/v_tambahkan', $data);
				}
	}
	public function cuti_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
						$data = array(
											'cuti_update_oleh'=>$this->session->username,

											'cuti_status'=>$this->input->post('cuti_status'),
											'cuti_update_hari'=>hari_ini(date('w')),
											'cuti_update_tanggal'=>date('Y-m-d'),
											'cuti_update_jam'=>date('H:i:s'));
											$where = array('cuti_id' => $this->input->post('cuti_id'));
											$this->db->update('cuti', $data, $where);

						redirect('paneladmin/cuti');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('cuti', array('cuti_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('cuti', array('cuti_id' => $id, 'username' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);
			$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = 'active';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';

			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

			$data['records'] = $this->Crud_m->view_ordering('cuti_status','cuti_status_id','DESC');
			$this->load->view('backend/cuti/v_update', $data);
		}
	}
	public function cuti_detail()
	{

		$id = $this->uri->segment(3);

			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('cuti', array('cuti_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('cuti', array('cuti_id' => $id))->row_array();
			}
				$data = array('rows' => $proses);
				$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = 'active';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

	    $data['records'] = $this->Crud_m->view_ordering('cuti_status','cuti_status_id','DESC');
			$this->load->view('backend/cuti/v_detail', $data);

	}
	function cuti_delete_temp()
	{

			$data = array('cuti_stat'=>'delete');
			$where = array('cuti_id' => $this->uri->segment(3));
			$this->db->update('cuti', $data, $where);
			redirect('paneladmin/cuti');
	}
	function cuti_restore()
	{

			$data = array('cuti_stat'=>'Publish');
			$where = array('cuti_id' => $this->uri->segment(3));
			$this->db->update('cuti', $data, $where);
			redirect('paneladmin/cuti');
	}
	public function cuti_delete()
	{
			$id = $this->uri->segment(3);

			 $query = $this->db->delete('cuti',['cuti_id'=>$id]);

		redirect('paneladmin/cuti');
	}
	/*	Bagian untuk Cuti - Penutup	*/

	/*	Bagian untuk Permohonan - Pembuka	*/
	public function permohonan()
	{

        $data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = 'active';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

				if ($this->session->level=='1'){
						$data['status_1'] = $this->Crud_m->view_ordering('permohonan_status','permohonan_status_id','ASC');
						$data['record'] = $this->Crud_m->view_join_where2_ordering('permohonan','permohonan_status','permohonan_stat_id','permohonan_status_id',array('permohonan_stat'=>'publish','permohonan_stat_id'=>'1'),'products_id','DESC');
				}elseif ($this->session->level=='2'){
				    $data['status_1'] = $this->Crud_m->view_ordering('permohonan_status','permohonan_status_id','ASC');
						$data['record'] = $this->Crud_m->view_join_where2_ordering('permohonan','permohonan_status','permohonan_stat_id','permohonan_status_id',array('products_post_oleh'=>$this->session->username,'permohonan_stat'=>'publish','permohonan_stat_id'=>'1'),'products_id','DESC');
				}else{
				redirect('paneladmin/permohonan');
				}
				$this->load->view('backend/permohonan/v_daftar', $data);
	}
	public function permohonan_detail()
	{

		$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = 'active';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
			$data['produk_category']   = '';
			$data['produk']   = '';
			$data['services']   = '';

		$id = $this->uri->segment(3);
				if ($this->session->level=='1'){
						$data['status_1'] = $this->Crud_m->view_ordering('permohonan_status','permohonan_status_id','ASC');
						$data['record'] = $this->Crud_m->view_join_where2_ordering('permohonan','permohonan_status','permohonan_stat_id','permohonan_status_id',array('permohonan_stat'=>'publish','permohonan_stat_id'=>$id),'products_id','DESC');
				}elseif($this->session->level=='2'){
				    $data['status_1'] = $this->Crud_m->view_ordering('permohonan_status','permohonan_status_id','ASC');
						$data['record'] = $this->Crud_m->view_join_where2_ordering('permohonan','permohonan_status','permohonan_stat_id','permohonan_status_id',array('permohonan_stat'=>'publish','permohonan_stat_id'=>$id),'products_id','DESC');
				}else{
						redirect('paneladmin/permohonan');
				}
				$this->load->view('backend/permohonan/v_daftar_status', $data);
	}
	public function permohonan_storage_bin()
	{
		$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = 'active';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
			$data['produk_category']   = '';
			$data['produk']   = '';
			$data['services']   = '';

				if ($this->session->level=='1'){
					$data['status_1'] = $this->Crud_m->view_ordering('permohonan_status','permohonan_status_id','ASC');
					$data['record'] = $this->Crud_m->view_join_where2_ordering('permohonan','permohonan_status','permohonan_stat_id','permohonan_status_id',array('permohonan_stat'=>'delete'),'products_id','DESC');
				}elseif ($this->session->level=='2'){
				    $data['status_1'] = $this->Crud_m->view_ordering('permohonan_status','permohonan_status_id','ASC');
						$data['record'] = $this->Crud_m->view_join_where2_ordering('permohonan','permohonan_status','permohonan_stat_id','permohonan_status_id',array('permohonan_stat'=>'delete'),'products_id','DESC');
				}else{
				redirect('paneladmin/permohonan');

				}
				$this->load->view('backend/permohonan/v_daftar_hapus', $data);
	}
	public function permohonan_tambahkan()
	{

		if (isset($_POST['submit'])){
							$data = array(
													'products_post_oleh'=>$this->session->username,
													'products_judul'=>$this->db->escape_str($this->input->post('products_judul')),
													'products_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
													'products_disc_end'=>$this->input->post('products_disc_end'),
													'permohonan_stat_id'=>$this->input->post('permohonan_stat_id'),
													'products_desk'=>$this->input->post('products_desk'),
													'products_post_hari'=>hari_ini(date('w')),
													'products_post_tanggal'=>date('Y-m-d'),
													'products_post_jam'=>date('H:i:s'),
													'products_dibaca'=>'0',
													'permohonan_stat'=>'publish',
												);


								$this->Panel_m->insert('permohonan',$data);
								redirect('paneladmin/permohonan');
				}else{
					$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = 'active';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

					$data['records'] = $this->Crud_m->view_join_ordering('lowongan','divisi','divisi_id','products_id','DESC');
					$data['record_status'] = $this->Crud_m->view_ordering('permohonan_status','permohonan_status_id','ASC');
					$this->load->view('backend/permohonan/v_tambahkan', $data);
				}
	}
	public function permohonan_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
						$data = array(
											'products_update_oleh'=>$this->session->username,
											'products_judul'=>$this->db->escape_str($this->input->post('products_judul')),
											'products_judul_seo'=>$this->mylibrary->seo_title($this->input->post('products_judul')),
											'products_disc_end'=>$this->input->post('products_disc_end'),
											'permohonan_stat_id'=>$this->input->post('permohonan_stat_id'),
											'products_desk'=>$this->input->post('products_desk'),
											'products_update_hari'=>hari_ini(date('w')),
											'products_update_tanggal'=>date('Y-m-d'),
											'products_update_jam'=>date('H:i:s'));
											$where = array('products_id' => $this->input->post('products_id'));
											$this->db->update('permohonan', $data, $where);

						redirect('paneladmin/permohonan');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('permohonan', array('products_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('permohonan', array('products_id' => $id, 'products_post_oleh' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);
			$data['karyawan_menu_open']   = 'menu-open';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = 'active';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = '';
		$data['message_stat']   = '';
		$data['gallery_stat']   = 'active';
		$data['kehadiran_menu_open']   = '';
	    $data['jamkerja_stat']   = '';
	    $data['absen_stat']   = '';
	    $data['dataabsen_stat']   = '';
	    $data['cuti_stat']   = '';
	    $data['gaji_stat']   = '';
	    $data['pengumuman_stat']   = '';
	    $data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
 			$data['produk_category']   = '';
 			$data['produk']   = '';
 			$data['services']   = '';

			$data['records'] = $this->Crud_m->view_join_ordering('lowongan','divisi','divisi_id','products_id','DESC');
			$data['record_status'] = $this->Crud_m->view_ordering('permohonan_status','permohonan_status_id','ASC');
			$this->load->view('backend/permohonan/v_update', $data);
		}
	}
	function permohonan_delete_temp()
	{

			$data = array('permohonan_stat'=>'delete');
			$where = array('products_id' => $this->uri->segment(3));
			$this->db->update('permohonan', $data, $where);
			redirect('paneladmin/permohonan');
	}
	function permohonan_restore()
	{

			$data = array('permohonan_stat'=>'Publish');
			$where = array('products_id' => $this->uri->segment(3));
			$this->db->update('permohonan', $data, $where);
			redirect('paneladmin/permohonan_storage_bin');
	}
	public function permohonan_delete()
	{

			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('permohonan',['products_id' => $id])->row();
			 $query = $this->db->delete('permohonan',['products_id'=>$id]);
			if($query){
							 unlink("./bahan/foto_products/".$_id->products_gambar);
							 unlink("./bahan/foto_products/".$_id->products_gambar2);
							 unlink("./bahan/foto_products/".$_id->products_gambar3);
							 unlink("./bahan/foto_products/".$_id->products_gambar4);
							 unlink("./bahan/foto_products/".$_id->products_gambar5);
							 unlink("./bahan/foto_products/".$_id->products_gambar6);
		 }
		redirect('paneladmin/permohonan_storage_bin');
	}
	public function permohonan_disc()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){
										$data = array(
											'products_update_oleh'=>$this->session->username,
											'products_disc_status'=>$this->input->post('products_disc_status'),
											'products_disc_end'=>$this->input->post('products_disc_end'),
											'products_disc_status'=>$this->input->post('products_disc_status'),
											'products_harga_disc'=>$this->input->post('products_harga_disc'));
											$where = array('products_id' => $this->input->post('products_id'));
											$this->db->update('products', $data, $where);
											redirect('paneladmin/products');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('lowongan', array('products_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('lowongan', array('products_id' => $id, 'products_post_oleh' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);
			$data['karyawan_menu_open']   = '';
			$data['home_stat']   = '';
			$data['identitas_stat']   = '';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = '';
			$data['products_stat']   = 'active';
			$data['cat_products_stat']   = '';
			$data['testimonial_stat']   = '';
			$data['blogs_stat']   = '';
			$data['message_stat']   = '';
			$data['gallery_stat']   = ''; 		$data['kehadiran_menu_open']   = ''; 	    $data['jamkerja_stat']   = ''; 	    $data['absen_stat']   = ''; 	    $data['dataabsen_stat']   = ''; 	    $data['cuti_stat']   = ''; 	    $data['gaji_stat']   = ''; 	    $data['pengumuman_stat']   = ''; 	    $data['konfig_stat']   = '';
			cek_session_akses ('lowongan',$this->session->id_session);
			$this->load->view('backend/lowongan/v_update_harga', $data);
		}
	}
	/*	Bagian untuk Permohonan - Penutup	*/

	/*	Bagian untuk Blogs - Pembuka	*/
	public function blogs()
	{
		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = 'active';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
		$data['jamkerja_stat']   = '';
		$data['absen_stat']   = '';
		$data['dataabsen_stat']   = '';
		$data['cuti_stat']   = '';
		$data['gaji_stat']   = '';
		$data['pengumuman_stat']   = '';
		$data['konfig_stat']   = '';
		$data['produk_menu_open']   = '';
		$data['produk_category']   = '';
		$data['produk']   = '';
		$data['services']   = '';

				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('blogs',array('blogs_status'=>'publish'),'blogs_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('blogs',array('blogs_post_oleh'=>$this->session->username,'blogs_status'=>'publish'),'blogs_id','DESC');
				}
				$this->load->view('backend/blogs/v_daftar', $data);
	}
	public function blogs_storage_bin()
	{
		$data['karyawan_menu_open']   = '';
		$data['home_stat']   = '';
		$data['identitas_stat']   = '';
		$data['profil_stat']   = '';
		$data['sliders_stat']   = '';
		$data['products_stat']   = '';
		$data['cat_products_stat']   = '';
		$data['testimonial_stat']   = '';
		$data['blogs_stat']   = 'active';
		$data['message_stat']   = '';
		$data['gallery_stat']   = '';
		$data['kehadiran_menu_open']   = '';
		$data['jamkerja_stat']   = '';
		$data['absen_stat']   = '';
		$data['dataabsen_stat']   = '';
		$data['cuti_stat']   = '';
		$data['gaji_stat']   = '';
		$data['pengumuman_stat']   = '';
		$data['konfig_stat']   = '';
		$data['produk_menu_open']   = '';
		$data['produk_category']   = '';
		$data['produk']   = '';
		$data['services']   = '';

				if ($this->session->level=='1'){
						$data['record'] = $this->Crud_m->view_where_ordering('blogs',array('blogs_status'=>'delete'),'blogs_id','DESC');
				}else{
						$data['record'] = $this->Crud_m->view_where_ordering('blogs',array('blogs_post_oleh'=>$this->session->username,'blogs_status'=>'delete'),'blogs_id','DESC');
				}
				$this->load->view('backend/blogs/v_daftar_hapus', $data);
	}
	public function blogs_tambahkan()
	{

		if (isset($_POST['submit'])){

					$config['upload_path'] = 'bahan/foto_blogs/';
					$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
					$this->upload->initialize($config);
					$this->upload->do_upload('gambar');
					$hasil22=$this->upload->data();
					$config['image_library']='gd2';
					$config['source_image'] = './bahan/foto_blogs/'.$hasil22['file_name'];
					$config['create_thumb']= FALSE;
					$config['maintain_ratio']= FALSE;
					$config['quality']= '50%';
					$config['width']= 694;
					$config['height']= 420;
					$config['new_image']= './bahan/foto_blogs/'.$hasil22['file_name'];
					$this->load->library('image_lib', $config);
					$this->image_lib->resize();

					if ($this->input->post('blogs_keyword')!=''){
								$tag_seo = $this->input->post('blogs_keyword');
								$tag=implode(',',$tag_seo);
						}else{
								$tag = '';
						}
					$tag = $this->input->post('blogs_keyword');
					$tags = explode(",", $tag);
					$tags2 = array();
					foreach($tags as $t)
					{
						$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
						$a = $this->db->query($sql)->result_array();
						if(count($a) == 0){
							$data = array('keyword_nama'=>$this->db->escape_str($t),
									'keyword_username'=>$this->session->username,
									'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
									'count'=>'0');
							$this->Panel_m->insert('keyword',$data);
						}
						$tags2[] = $this->mylibrary->seo_title($t);
					}
					$tags = implode(",", $tags2);
					if ($hasil22['file_name']==''){
									$data = array(
													'blogs_post_oleh'=>$this->session->username,
													'blogs_judul'=>$this->db->escape_str($this->input->post('blogs_judul')),
													'blogs_judul_seo'=>$this->mylibrary->seo_title($this->input->post('blogs_judul')),
													'blogs_desk'=>$this->input->post('blogs_desk'),
													'blogs_post_hari'=>hari_ini(date('w')),
													'blogs_post_tanggal'=>date('Y-m-d'),
													'blogs_post_jam'=>date('H:i:s'),
													'blogs_dibaca'=>'0',
													'blogs_status'=>'publish',
													'blogs_meta_desk'=>$this->input->post('blogs_meta_desk'),
													'blogs_keyword'=>$tag);
											}else{
												$data = array(
													'blogs_post_oleh'=>$this->session->username,
													'blogs_judul'=>$this->db->escape_str($this->input->post('blogs_judul')),
													'blogs_judul_seo'=>$this->mylibrary->seo_title($this->input->post('blogs_judul')),
													'blogs_desk'=>$this->input->post('blogs_desk'),
													'blogs_post_hari'=>hari_ini(date('w')),
													'blogs_post_tanggal'=>date('Y-m-d'),
													'blogs_post_jam'=>date('H:i:s'),
													'blogs_dibaca'=>'0',
													'blogs_status'=>'publish',
													'blogs_gambar'=>$hasil22['file_name'],
													'blogs_meta_desk'=>$this->input->post('blogs_meta_desk'),
													'blogs_keyword'=>$tag);
												}
								$this->Panel_m->insert('blogs',$data);
								redirect('paneladmin/blogs');
				}else{
					$data['karyawan_menu_open']   = '';
					$data['home_stat']   = '';
					$data['identitas_stat']   = '';
					$data['profil_stat']   = '';
					$data['sliders_stat']   = '';
					$data['products_stat']   = '';
					$data['cat_products_stat']   = '';
					$data['testimonial_stat']   = '';
					$data['blogs_stat']   = 'active';
					$data['message_stat']   = '';
					$data['gallery_stat']   = '';
					$data['kehadiran_menu_open']   = '';
					$data['jamkerja_stat']   = '';
					$data['absen_stat']   = '';
					$data['dataabsen_stat']   = '';
					$data['cuti_stat']   = '';
					$data['gaji_stat']   = '';
					$data['pengumuman_stat']   = '';
					$data['konfig_stat']   = '';
					$data['produk_menu_open']   = '';
					$data['produk_category']   = '';
					$data['produk']   = '';
					$data['services']   = '';

					$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
					$this->load->view('backend/blogs/v_tambahkan', $data);
				}
	}
	public function blogs_update()
	{

		$id = $this->uri->segment(3);
		if (isset($_POST['submit'])){

			$config['upload_path'] = 'bahan/foto_blogs/';
			$config['allowed_types'] = 'gif|jpg|png|JPG|JPEG';
			$this->upload->initialize($config);
			$this->upload->do_upload('gambar');
			$hasil22=$this->upload->data();
			$config['image_library']='gd2';
			$config['source_image'] = './bahan/foto_blogs/'.$hasil22['file_name'];
			$config['create_thumb']= FALSE;
			$config['maintain_ratio']= FALSE;
			$config['quality']= '50%';
			$config['width']= 694;
			$config['height']= 420;
			$config['new_image']= './bahan/foto_blogs/'.$hasil22['file_name'];
			$this->load->library('image_lib', $config);
			$this->image_lib->resize();

			if ($this->input->post('blogs_keyword')!=''){
						$tag_seo = $this->input->post('blogs_keyword');
						$tag=implode(',',$tag_seo);
				}else{
						$tag = '';
				}
			$tag = $this->input->post('blogs_keyword');
			$tags = explode(",", $tag);
			$tags2 = array();
			foreach($tags as $t)
			{
				$sql = "select * from keyword where keyword_nama_seo = '" . $this->mylibrary->seo_title($t) . "'";
				$a = $this->db->query($sql)->result_array();
				if(count($a) == 0){
					$data = array('keyword_nama'=>$this->db->escape_str($t),
							'keyword_username'=>$this->session->username,
							'keyword_nama_seo'=>$this->mylibrary->seo_title($t),
							'count'=>'0');
					$this->Panel_m->insert('keyword',$data);
				}
				$tags2[] = $this->mylibrary->seo_title($t);
			}
			$tags = implode(",", $tags2);
						if ($hasil22['file_name']==''){
										$data = array(
											'blogs_update_oleh'=>$this->session->username,
											'blogs_judul'=>$this->db->escape_str($this->input->post('blogs_judul')),
											'blogs_judul_seo'=>$this->mylibrary->seo_title($this->input->post('blogs_judul')),
											'blogs_desk'=>$this->input->post('blogs_desk'),
											'blogs_update_hari'=>hari_ini(date('w')),
											'blogs_update_tanggal'=>date('Y-m-d'),
											'blogs_update_jam'=>date('H:i:s'),
											'blogs_meta_desk'=>$this->input->post('blogs_meta_desk'),
											'blogs_keyword'=>$tag);
											$where = array('blogs_id' => $this->input->post('blogs_id'));
											$this->db->update('blogs', $data, $where);
						}else{
										$data = array(
											'blogs_update_oleh'=>$this->session->username,
											'blogs_judul'=>$this->db->escape_str($this->input->post('blogs_judul')),
											'blogs_judul_seo'=>$this->mylibrary->seo_title($this->input->post('blogs_judul')),
											'blogs_desk'=>$this->input->post('blogs_desk'),
											'blogs_update_hari'=>hari_ini(date('w')),
											'blogs_update_tanggal'=>date('Y-m-d'),
											'blogs_update_jam'=>date('H:i:s'),
											'blogs_gambar'=>$hasil22['file_name'],
											'blogs_meta_desk'=>$this->input->post('blogs_meta_desk'),
											'blogs_keyword'=>$tag);
											$where = array('blogs_id' => $this->input->post('blogs_id'));
											$_image = $this->db->get_where('blogs',$where)->row();
											$query = $this->db->update('blogs',$data,$where);
											if($query){
												unlink("bahan/foto_blogs/".$_image->blogs_gambar);
											}

						}
						redirect('paneladmin/blogs');
		}else{
			if ($this->session->level=='1'){
					 $proses = $this->Panel_m->edit('blogs', array('blogs_id' => $id))->row_array();
			}else{
					$proses = $this->Panel_m->edit('blogs', array('blogs_id' => $id, 'blogs_post_oleh' => $this->session->username))->row_array();
			}
			$data = array('rows' => $proses);
			$data['karyawan_menu_open']   = '';
			$data['home_stat']   = '';
			$data['identitas_stat']   = '';
			$data['profil_stat']   = '';
			$data['sliders_stat']   = '';
			$data['products_stat']   = '';
			$data['cat_products_stat']   = '';
			$data['testimonial_stat']   = '';
			$data['blogs_stat']   = 'active';
			$data['message_stat']   = '';
			$data['gallery_stat']   = '';
			$data['kehadiran_menu_open']   = '';
			$data['jamkerja_stat']   = '';
			$data['absen_stat']   = '';
			$data['dataabsen_stat']   = '';
			$data['cuti_stat']   = '';
			$data['gaji_stat']   = '';
			$data['pengumuman_stat']   = '';
			$data['konfig_stat']   = '';
			$data['produk_menu_open']   = '';
			$data['produk_category']   = '';
			$data['produk']   = '';
			$data['services']   = '';

			$data['tag'] = $this->Crud_m->view_ordering('keyword','keyword_id','DESC');
			$this->load->view('backend/blogs/v_update', $data);
		}
	}
	function blogs_delete_temp()
	{

			$data = array('blogs_status'=>'delete');
			$where = array('blogs_id' => $this->uri->segment(3));
			$this->db->update('blogs', $data, $where);
			redirect('paneladmin/blogs');
	}
	function blogs_restore()
	{
			$data = array('blogs_status'=>'Publish');
			$where = array('blogs_id' => $this->uri->segment(3));
			$this->db->update('blogs', $data, $where);
			redirect('paneladmin/blogs_storage_bin');
	}
	public function blogs_delete()
	{
			cek_session_akses ('blogs',$this->session->id_session);
			$id = $this->uri->segment(3);
			$_id = $this->db->get_where('blogs',['blogs_id' => $id])->row();
			 $query = $this->db->delete('blogs',['blogs_id'=>$id]);
			if($query){
							 unlink("./bahan/foto_blogs/".$_id->blogs_gambar);
		 }
		redirect('paneladmin/blogs');
	}
	/*	Bagian untuk Blogs - Penutup	*/



}
