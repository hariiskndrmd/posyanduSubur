<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Children extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Child_model');
    }

    // Fungsi untuk menampilkan data anak berdasarkan nama ibu
    public function index() {
        // $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array(); 
        // //$idibu = $this->input->post('id_ibu'); // Ambil id ibu dari input POST
        // $data['ibu'] = $this->Ibu_model->getDataIbu();
        // if (!empty($idibu)) { // Pastikan id ibu tidak kosong
        //     // Gunakan metode yang sesuai di model, disini getDataAnakIbu diubah sedikit untuk filtering
        //     $data_anak = $this->Laporan_model->get_anak_by_ibu($data); // Panggil metode di model
            
        //     // Kirimkan data anak ke view atau sebagai JSON response
        //     echo json_encode($data_anak); // Contoh pengiriman sebagai JSON response
        // } else {
        //     echo json_encode(array('error' => 'id_ibu tidak ditemukan')); // Jika id ibu kosong
        // }
        // var_dump($idibu);
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar-ibu');
        $this->load->view('templates/topbar-ibu');
        $this->load->view('children/index');
        $this->load->view('templates/footer');

    }

    // Fungsi untuk menampilkan detail data anak
    public function view($id) {
        $data['child'] = $this->Child_model->get_child_by_id($id);
        if (empty($data['child'])) {
            show_404();
        }
        $this->load->view('children/view', $data);
    }
}
