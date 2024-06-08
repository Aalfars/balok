<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Produk extends CI_Controller {

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
        // Pastikan hanya admin yang dapat mengakses
        // if ($this->session->userdata('role') != 'admin') {
        //     redirect('login');
        }
    

    // Metode untuk melihat semua produk
    public function index() {
        $data = array(
            'title' => 'Produk',
            'pending_products' => $this->Admin_model->get_all_pending_products(),
            'approved_products' =>  $this->Admin_model->get_all_approved_products(),
        );
        $this->template->load('template_admin','admin/produk',$data);
    }

    // Metode untuk melihat detail produk


    // Metode untuk menghapus produk
    public function delete($id) {
        $this->Admin_model->delete_produk($id);
        $this->session->set_flashdata('message', 'Produk berhasil dihapus');
        redirect('admin/produk');
    }

    // Metode untuk meng-approve produk
    public function approve($id) {
        $data = array('status_verifikasi' => 'sudah');
        $this->Admin_model->update_produk($id, $data);
        $this->session->set_flashdata('message', 'Produk berhasil di-approve');
        redirect('admin/produk');
    }
}
