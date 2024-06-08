<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

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
    public function index(){
        $this->template-load('')
    }
    public function simpan() {
        date_default_timezone_set("Asia/Jakarta");
        $username = $this->session->userdata('username');
    
        // Cari penjual_id berdasarkan username
        $this->db->select('penjual_id');
        $this->db->from('penjual');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $penjual = $query->row();
        
        if ($penjual == NULL) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Penjual tidak ditemukan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('seller/products/add_product');
        }
    
        $penjual_id = $penjual->penjual_id;
    
        // Set up configuration for image upload
        $namafoto = date('YmdHis') . '.jpg';
        $config['upload_path'] = 'assets/upload/foto_produk/';
        $config['max_size'] = 100000; // 3MB
        $config['allowed_types'] = '*';
        $config['file_name'] = $namafoto;
        $config['overwrite'] = TRUE;
    
        $this->load->library('upload', $config);
    
        // Check and upload image
        if ($_FILES['foto']['size'] > $config['max_size'] * 1024) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Ukuran foto terlalu besar, upload ulang foto dengan ukuran yang kurang dari 3 MB.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('seller/products/add_product');
        } elseif (!$this->upload->do_upload('foto')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                    ' . $this->upload->display_errors() . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('seller/products/add_product');
        } else {
            $data_foto = $this->upload->data();
        }
    
        // Set up configuration for bukti lokal upload
        $namafile = date('YmdHis') . '.pdf';
        $config['upload_path'] = 'assets/upload/bukti_lokal/';
        $config['allowed_types'] = '*';
        $config['max_size'] = 100000; // 3MB
        $config['file_name'] = $namafile;
        $config['overwrite'] = TRUE;
    
        $this->upload->initialize($config);
    
        // Check and upload bukti lokal
        if ($_FILES['bukti_lokal']['size'] > $config['max_size'] * 1024) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Ukuran bukti lokal terlalu besar, upload ulang bukti lokal dengan ukuran yang kurang dari 3 MB.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('seller/products/add_product');
        } elseif (!$this->upload->do_upload('bukti_lokal')) {
            $error = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                    ' . $this->upload->display_errors() . '
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('seller/products/add_product');
        } else {
            $data_bukti = $this->upload->data();
        }
    
        $nama_produk = $this->input->post('nama_produk');
        $this->db->from('Produk');
        $this->db->where('nama_produk', $nama_produk);
        $cek = $this->db->get()->result_array();
    
        if ($cek != NULL) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <span class="alert-text"><strong>Warning!</strong> Judul sudah ada yang menggunakan.</span>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>');
            redirect('seller/products/add');
        }
    
        $this->Seller_model->simpan_produk($penjual_id);
        $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-text">Konten baru berhasil ditambahkan.</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('seller/products');
    }
        public function delete($id){
            $this->db->select('gambar, bukti_lokal');
            $this->db->from('produk');
            $this->db->where('produk_id', $id);
            $query = $this->db->get();
            $produk = $query->row();
    
            if ($produk) {
                if (file_exists('assets/upload/foto_produk/'.$produk->gambar)) {
                    unlink('assets/upload/foto_produk/'.$produk->gambar);
                }
                if (file_exists('assets/upload/bukti_lokal/'.$produk->bukti_lokal)) {
                    unlink('assets/upload/bukti_lokal/'.$produk->bukti_lokal);
                }
            }
    
            // Hapus data dari database
            $this->db->where('produk_id', $id);
            $this->db   ->delete('produk');
        $this->session->set_flashdata('alert','
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <span class="alert-text"><strong>Warning!</strong> Berhasil menghapus Produk</span>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
        ');
        redirect('Seller/products');

    }
    public function detail($id){
        $data = array(
            'title' => 'Detail Produk',
            'product' => $this->Seller_model->detail($id),
            'list_kategori' => $this->Seller_model->get_kategori(),
        );
       
        $this->template->load('template_seller','seller/edit_product',$data);

    }
    public function update($id) {
        date_default_timezone_set("Asia/Jakarta");

        // Dapatkan username dari sesi
        $username = $this->session->userdata('username');

        // Cari penjual_id berdasarkan username
        $this->db->select('penjual_id');
        $this->db->from('penjual');
        $this->db->where('username', $username);
        $query = $this->db->get();
        $penjual = $query->row();

        if ($penjual == NULL) {
            $this->session->set_flashdata('alert', '
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Penjual tidak ditemukan.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>');
            redirect('seller/products/edit/'.$id);
        }

        $penjual_id = $penjual->id;

        $namafoto = $this->input->post('namafoto');
        $namafile = $this->input->post('namafile');

        // Proses upload foto baru jika ada
        if ($_FILES['foto']['size'] > 0) {
            $config['upload_path'] = 'assets/upload/foto_produk/';
            $config['max_size'] = 3 * 1024; // 3MB
            $config['allowed_types'] = 'jpg|jpeg|png';
            $config['file_name'] = $namafoto;
            $config['overwrite'] = TRUE;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('foto')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('alert', '
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        ' . $this->upload->display_errors() . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                redirect('seller/products/edit/'.$id);
            } else {
                $data_foto = $this->upload->data();
                $namafoto = $data_foto['file_name'];
            }
        }

        // Proses upload bukti lokal baru jika ada
        if ($_FILES['bukti_lokal']['size'] > 0) {
            $config['upload_path'] = 'assets/upload/bukti_lokal/';
            $config['allowed_types'] = 'pdf|doc|docx';
            $config['file_name'] = $namafile;
            $config['overwrite'] = TRUE;

            $this->upload->initialize($config);

            if (!$this->upload->do_upload('bukti_lokal')) {
                $error = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('alert', '
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        ' . $this->upload->display_errors() . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>');
                redirect('seller/products/edit/'.$id);
            } else {
                $data_bukti = $this->upload->data();
                $namafile = $data_bukti['file_name'];
            }
        }

        $this->Seller_model->update_produk($id, $penjual_id, $namafoto, $namafile);

        $this->session->set_flashdata('alert', '
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <span class="alert-text">Produk berhasil diupdate.</span>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>');
        redirect('seller/products');
    }

}