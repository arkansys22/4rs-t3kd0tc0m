<?php
    function cek_session_akses($link,$id){
    	$ci = & get_instance();
    	$session = $ci->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    	if ($session == '0' AND $ci->session->userdata('level') != '3'){
    		redirect(base_url().'paneladmin/home');
    	}
    }

    function cek_session_akses2($link,$id){
    	$ci = & get_instance();
    	$session = $ci->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    	if ($session == '0' AND $ci->session->userdata('level') != 'vendor'){
    		redirect(base_url().'user/home');
    	}
    }
    function cek_session_akses3($link,$id){
    	$ci = & get_instance();
    	$session = $ci->db->query("SELECT * FROM modul,users_modul WHERE modul.id_modul=users_modul.id_modul AND users_modul.id_session='$id' AND modul.link='$link'")->num_rows();
    	if ($session == '0' AND $ci->session->userdata('level') != 'calon'){
    		redirect(base_url().'user/home');
    	}
    }

    function template(){
        $ci = & get_instance();
        $query = $ci->db->query("SELECT folder FROM templates where aktif='Y'");
        $tmp = $query->row_array();
        if ($query->num_rows()>=1){
            return $tmp['folder'];
        }else{
            return 'errors';
        }
    }

    function background(){
        $ci = & get_instance();
        $bg = $ci->db->query("SELECT gambar FROM background ORDER BY id_background DESC LIMIT 1")->row_array();
        return $bg['gambar'];
    }

    function title(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT nama_website FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['nama_website'];
    }

    function description(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT meta_deskripsi FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['meta_deskripsi'];
    }

    function keywords(){
        $ci = & get_instance();
        $title = $ci->db->query("SELECT meta_keyword FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $title['meta_keyword'];
    }

    function favicon(){
        $ci = & get_instance();
        $fav = $ci->db->query("SELECT favicon FROM identitas ORDER BY id_identitas DESC LIMIT 1")->row_array();
        return $fav['favicon'];
    }

    function cek_session_admin(){
        $ci = & get_instance();
        $session = $ci->session->userdata('level');
        if ($session != '1'){
            redirect(base_url());
        }
      }

        function cek_session_vendor(){
            $ci = & get_instance();
            $session = $ci->session->userdata('level');
            if ($session != 'vendor'){
                redirect(base_url());
            }
          }
            function cek_session_calon(){
                $ci = & get_instance();
                $session = $ci->session->userdata('level');
                if ($session != 'calon'){
                    redirect(base_url());
                }
    }
