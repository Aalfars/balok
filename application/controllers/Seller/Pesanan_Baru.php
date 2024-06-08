<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pesanan_Baru extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Seller_model');
        $this->load->helper('url');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('level') != 'Seller') {
            // Set notifikasi menggunakan session flashdata
            $this->session->set_flashdata('alert', 'error|Anda tidak memiliki akses ke halaman ini.');
            redirect('auth');
    }
}

    public function index() {
        // $data['verified_products_count'] = $this->Admin_model->get_verified_products_count();
        // $data['unverified_products_count'] = $this->Admin_model->get_unverified_products_count();
        // $data['seller_accounts_count'] = $this->Admin_model->get_seller_accounts_count();
        // $data['monthly_sales_count'] = $this->Admin_model->get_monthly_sales_count();
        // $penjual_id = $this->Seller_model->get_penjual_id();
        $data = array(
            'title' => "Pesanan Baru | Seller",
            'pesanan' => $this->Seller_model->get_pesanan_baru(1)
        );

        $this->template->load('template_seller','seller/pesanan', $data);
    }
}
