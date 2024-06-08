<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library('session');
        $this->load->helper('url');
    }
    public function index() {
        // $pengguna_id = $this->session->userdata('pengguna_id');
        // if (!$pengguna_id) {
        //     redirect('Home/login');
        // }

        $data['title'] = "Keranjang Belanja";
        $data['pesanan'] = $this->Home_model->get_pesanan_by_id();


            $this->template->load('template_home', 'home/about', $data);
    }
}   