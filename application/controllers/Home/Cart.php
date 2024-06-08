<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->library('session');
        $this->load->helper('url');
        if (!$this->session->userdata('logged_in')) {
            // Set notifikasi menggunakan session flashdata
            $this->session->set_flashdata('alert', 'error|Anda tidak memiliki akses ke halaman ini.');
            redirect('home/dashboard');
    }
    }

    public function index() {
        $pengguna_id = $this->session->userdata('pengguna_id');
        if (!$pengguna_id) {
            redirect('Home/login');
        }
        $data['pesanan'] = $this->Home_model->get_pesanan_by_id();


        $data['cart_items'] = $this->Home_model->get_cart_by_user($pengguna_id);
        $data['title'] = "Keranjang Belanja";

            $this->template->load('template_home', 'home/cart', $data);
    }

    public function add_to_cart() {
        $produk_id = $this->input->post('produk_id');
        $jumlah = $this->input->post('jumlah');
        $pengguna_id = $this->session->userdata('pengguna_id');
        $waktu = date('Y-m-d H:i:s');

        // Periksa stok produk
        $stok = $this->Home_model->get_product_stock($produk_id);

        if ($stok === false) {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan.');
            redirect('Home/dashboard');
        } elseif ($jumlah > $stok) {
            $this->session->set_flashdata('error', 'Jumlah yang diminta melebihi stok yang tersedia.');
            redirect('Home/dashboard');
        } else {
            $data = [
                'produk_id' => $produk_id,
                'jumlah' => $jumlah,
                'pengguna_id' => $pengguna_id,
                'waktu' => $waktu
            ];

            $this->Home_model->add_to_cart($data);
            $this->session->set_flashdata('success', 'Produk berhasil ditambahkan ke keranjang.');
            redirect('cart');
        }
    }
}
