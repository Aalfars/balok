<?php 
class Kategori extends CI_Controller{
    public function __construct() {
        parent::__construct();
        $this->load->model('Admin_model');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('level') != 'Admin') {
            // Set notifikasi menggunakan session flashdata
            $this->session->set_flashdata('alert', 'error|Anda tidak memiliki akses ke halaman ini.');
            redirect('auth');
    }
    }

    public function index() {
        $data['title'] = "Kategori";
        $data['kategori'] = $this->Admin_model->get_all_kategori();
        $this->template->load('template_admin','admin/kategori', $data);
    }


    public function tambah() {
        $data = [
            'kategori' => $this->input->post('kategori'),
        ];
        $this->Admin_model->insert_kategori($data);
        redirect('Admin/Kategori');
    }


    public function edit() {
        $id = $this->input->post('kategori_id');
        $data = [
            'kategori' => $this->input->post('kategori'),
        ];
        $this->Admin_model->update_kategori($id, $data);
        redirect('Admin/Kategori');
    }

    public function hapus($id) {
        $this->Admin_model->delete_kategori($id);
        redirect('Admin/Kategori');
    }
}
?>