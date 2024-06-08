<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dokumentasi extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('url');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('level') != 'Admin') {
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

        $data = array(
            'title' => "Dokumentasi | Admin"
        );

        $this->template->load('template_admin','admin/dokumentasi', $data);
    }
}