<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap_model extends CI_Model
{


 public function generate_blogs($table)
    {
        $this->db->select('blogs_judul_seo,blogs_update_hari,blogs_update_tanggal,blogs_update_jam');
        $this->db->from($table);
        $this->db->order_by('blogs_id',"DESC");
        $query = $this->db->get();
        return $query->result();
    }

  public function generate_services($table)
    {
        $this->db->select('services_judul_seo,services_update_hari,services_update_tanggal,services_update_jam');
        $this->db->from($table);
        $this->db->order_by('services_id',"DESC");
        $query = $this->db->get();
        return $query->result();
    }
    
    
public function generate_works($table)
    {
        $this->db->select('products_judul_seo,products_post_hari,products_post_tanggal,products_post_jam');
        $this->db->from($table);
        $this->db->order_by('products_id',"DESC");
        $query = $this->db->get();
        return $query->result();
    }



}
