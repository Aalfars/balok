<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
    }

    public function index() {
        $data['products'] = $this->Home_model->get_products(12);
        $data['pesanan'] = $this->Home_model->get_pesanan_by_id();
        $data['title'] = "Dashboard" ; 
    $this->template->load('template_home','home/dashboard', $data);
    }

 

    public function product_detail($id) {
        $product = $this->Home_model->get_product_by_id($id);
        $stok = $this->Home_model->check_stock($id);
        if ($stok < 1 ) {
            $this->session->set_flashdata('error', 'Stok produk habis. Tidak dapat melihat detail produk.');
            redirect('Home/dashboard'); // Kembali ke halaman sebelumnya
        } else {
            $data['title'] = "Produk Detail";
            $data['pesanan'] = $this->Home_model->get_pesanan_by_id();

            $data['product'] = $product;
            $this->template->load('template_home','Home/product_detail', $data);
        }
    }
    

}
