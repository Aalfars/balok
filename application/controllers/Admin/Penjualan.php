<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->helper('url');
        $this->load->library('session');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('level') != 'Admin') {
            // Set notifikasi menggunakan session flashdata
            $this->session->set_flashdata('alert', 'error|Anda tidak memiliki akses ke halaman ini.');
            redirect('auth');
    }
    }

    public function index() {
        $data = array(
            'title' => 'Penjualan',
            'penjualan' => $this->Admin_model->get_all_penjualan(),
            'approved_penjualan' => $this->Admin_model->approved_penjualan(),
        );
        $this->template->load('template_admin','admin/penjualan', $data);
    }

    public function delete($id) {
        $this->Admin_model->delete_produk($id);
        $this->session->set_flashdata('message', 'Produk berhasil dihapus');
        redirect('admin/produk');
    }

    // Metode untuk meng-approve produk
    public function approve($id) {
        $data = array('status_pembayaran' => 'sudah');
        $this->Admin_model->confirm_penjualan($id, $data);
        $this->session->set_flashdata('message', 'Produk berhasil di-approve');
        redirect('admin/produk');
    }

   
}
