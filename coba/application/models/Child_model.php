<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Child_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Fungsi untuk mendapatkan semua data anak
    public function get_all_children() {
        $query = $this->db->get('anak');
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan data anak berdasarkan nama ibu
    public function get_children_by_mother_name($data) {
        $this->db->select('anak.*');
        $this->db->from('children');
        $this->db->join('anak', 'anak.nama_anak = anak.ibu_id');
        $this->db->like('users.name', $data);
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fungsi untuk mendapatkan data anak berdasarkan ID anak
    public function get_child_by_id($data) {
        $query = $this->db->get_where('children', array('id' => $id));
        return $query->row_array();
    }
}
