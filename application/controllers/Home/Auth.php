<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');
    }
    public function index(){
    $previous_url = $this->input->server('HTTP_REFERER');
    
    // Simpan URL halaman sebelumnya di session
    if (!empty($previous_url)) {
        $this->session->set_userdata('previous_url', $previous_url);
    }
    
        $this->load->view('Auth/Login');
}
    public function process_login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('pass');

        $process = $this->Auth_model->get_username($username);

        if ($process && password_verify($password, $process->password)) {
            $userdata = array(
                'pengguna_id' => $process->pengguna_id,
                'username' => $process->username,
                'nama_pengguna' => $process->nama_pengguna,
                'level' => $process->level,
                'logged_in' => true
            );
            $this->db->where('prngguna_id', $process->pengguna_id);
            $this->session->set_userdata($userdata);
            $previous_url = $this->session->userdata('previous_url');
        
            // Redirect ke halaman sebelumnya jika ada, jika tidak, redirect ke halaman default
            if (!empty($previous_url)) {
                redirect($previous_url);
            } else {
                redirect('home/dashboard'); // Halaman default setelah login
            }
        
         } else {
            $this->session->set_flashdata('alert', '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong> Username atau password salah</strong></span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
            ');
        }
        $this->load->view('auth/Login');
    }


    public function signup(){
        $this->load->view('auth/signup');
    }
    public function process_signup(){
        $username = $this->input->post('username');
        $pass = $this->input->post('password');
        $nama = $this->input->post('nama');
        $level = 'Pengguna';


        $hashed_password = password_hash($pass, PASSWORD_BCRYPT);
        $this->db->from('pengguna');
        $this->db->where('username', $username);
        $cek = $this->db->get()->result_array();
        if($cek<>NULL){
            $this->session->set_flashdata('alert','
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Warning!</strong> username telah dipakai</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
        redirect('auth/signup');
    }
        $data = array(
            'username' => $username,
            'password' => $hashed_password,
            'nama_pengguna' => $nama,
            'level' => $level,
        );
        $this->db->insert('akun',$data);
        redirect('auth');
    }
    public function logout()
    {
        $this->session->sess_destroy();
        $this->session->set_flashdata('alert', '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <span class="alert-text"><strong>Warning!</strong> Berhasil Logout </span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        ');
        redirect('auth');
    }
}


