<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
        
	// MULAI LOGIN
	public function index()
	{
		$data['title'] = 'Posyandu Subur';
		$this->form_validation->set_rules('password', 'Password', 'trim|required');
		if ($this->form_validation->run() == false) {
			$this->load->view('login/login', $data);
			$this->load->view('login/footer-login');
		} else {
			$this->_login();
		}
	}

	private function _login()
	{
		$username = $this->input->post('username');
		$pw = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		$pass = $user['password'];
		// var_dump($pass); die;

		if ($user) {
			if ($user['is_active'] == 1) {
				// if(password_verify($pw, $user['password'])){
				if ($pw == $pass) { // Gantilah dengan password_verify($pw, $user['password']) jika password di-hash
					$data = [
						'id_users' => $user['id_users'],
						'username' => $user['username'],
						'name' => $user['name'],
						'level_id' => $user['level_id'],
						'is_active' => $user['is_active']
					];
					$this->session->set_userdata($data);
		
					date_default_timezone_set('Asia/Jakarta');
					$tanggal = date('y-m-d h:i:s');
					$data_login_attempts = ['user_id' => $user['id_users'], 'date_time' => $tanggal];
					$this->db->insert('login_attempts', $data_login_attempts);
		
					if ($user['level_id'] == 1) {
						$this->session->set_flashdata('success', 'Selamat Datang, Petugas!');
						redirect('dashboard/petugas');
					} elseif ($user['level_id'] == 2) { // Misalnya level_id 2 untuk Bidan
						$this->session->set_flashdata('success', 'Selamat Datang, Bidan!');
						redirect('dashboard/bidan');
					} else {
						$this->session->set_flashdata('success', 'Selamat Datang, Ibu!');
						redirect('Children');
					}
				} else {
					$this->session->set_flashdata('msg-info', 'Password yang anda masukkan salah');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('msg-info', 'Username belum aktif');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('msg-info', 'Username yang anda masukkan belum terdaftar');
			redirect('login');
		}
	}
	// SELESAI LOGIN

	// MULAI LOGOUT
	public function logout()
{
    // Set flash message to notify the user that they have been logged out
    $this->session->set_flashdata('warning', 'Anda sudah keluar dari aplikasi');

    // Unset all userdata
    $this->session->unset_userdata('id_users');
    $this->session->unset_userdata('username');
    $this->session->unset_userdata('name');
    $this->session->unset_userdata('level_id');
    $this->session->unset_userdata('is_active');

    // Alternatively, you can destroy the session completely
    $this->session->sess_destroy();

    // Redirect to the login page
    redirect('login');
}

	// SELESAI LOGOUT
	}

