<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjual extends CI_Controller {
    public function __construct(){
        parent::__construct();
        // $this->load->library('template');
        $this->load->model('Admin_model');
        if (!$this->session->userdata('logged_in') || $this->session->userdata('level') != 'Admin') {
            // Set notifikasi menggunakan session flashdata
            $this->session->set_flashdata('alert', 'error|Anda tidak memiliki akses ke halaman ini.');
            redirect('auth');
    }
        // if ( $this->session->userdata('level') == 'Admin') {;
        // } else{;
        //     $this->session->set_flashdata('alert','
        //     <div class="alert alert-warning alert-dismissible fade show" role="alert">
        //     <span class="alert-text"><strong> Login dulu bosku</strong></span>
        //     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
        //         <span aria-hidden="true">&times</span>
        //     </button>
        // </div>
        //     ');
        //     redirect('Auth');  
            
        // };
    }
    public function index(){
        $data = array(
            'list_user' =>  $this->Admin_model->get_penjual(),
            'title' => "Penjual",
        );
        $this->template->load('template_admin','admin/Penjual',$data);
    }
    public function simpan()
    {
        $username = $this->input->post('username');
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
         redirect('admin/penjual');
        }
        $this->Admin_model->simpan();
        $this->Admin_model->simpan_penjual();
        $this->session->set_flashdata('alert','
        <div class="alert alert-success alert-dismissible fade show" role="alert">
        <span class="alert-text"> User Baru berhasil Ditambahkan</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
         redirect('admin/penjual');
    }
    public function delete_user($id){
        $where = array('penjual_id' => $id);
        $this->db->delete('penjual',$where);       
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text">Berhasil menghapus akun</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        redirect('admin/penjual');

    }
    
    public function update_user(){
        $this->session->set_flashdata('alert','
        <div class="alert alert-info alert-dismissible fade show" role="alert">
        <span class="alert-text">user berhasil diupdate</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        $this->Admin_model->update();
        redirect('admin/list_user');
    }
}