<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    // Manajemen Pengguna
    public function get_all_pengguna()
    {
        return $this->db->get('pengguna')->result();
    }
    public function get_penjual()
    {
        return $this->db->get('penjual')->result();
    }
    public function simpan()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'nama_pengguna'     => $this->input->post('nama'),
            'email'     => $this->input->post('email'),
            'level'    => $this->input->post('level'),
        );
        $this->db->insert('pengguna', $data);
    }
    public function simpan_penjual()
    {
        $data = array(
            'username' => $this->input->post('username'),
            'password' => password_hash($this->input->post('password'), PASSWORD_BCRYPT),
            'nama_penjual' => $this->input->post('nama'),
            'email'     => $this->input->post('email'),
            'nomor_telepon'    => $this->input->post('nomor_telepon'),
            'alamat'    => $this->input->post('alamat'),
        );
        $this->db->insert('penjual', $data);
    }
    public function update_data()
    {
        $pass = $this->input->post('password');
        if ($pass > 0) {
            $passin = password_hash($pass, PASSWORD_BCRYPT);
            $data = array(
                'password' => $passin
            );
        }
        $data = array(
            'nama' => $this->input->post('nama'),
            'level' => $this->input->post('level'),
            'email' => $this->input->post('email'), 
        );

        $this->db->update('akun', $data);
    }
    public function update_penjual()
    {
        $pass = $this->input->post('password');
        if ($pass > 0) {
            $passin = password_hash($pass, PASSWORD_BCRYPT);
            $data = array(
                'password' => $passin
            );
        }
        $data = array(
            'nama' => $this->input->post('nama'),
            'level' => $this->input->post('level'),
            'email' => $this->input->post('email'), 
            'nomor_telepon' => $this->input->post('nomor_telepon'),
            'alamat' => $this->input->post('alamat'),
        );

        $this->db->update('akun', $data);
    }

    public function get_pengguna_by_id($id)
    {
        return $this->db->get_where('pengguna', array('id' => $id))->row_array();
    }

    public function insert_pengguna($data)
    {
        return $this->db->insert('pengguna', $data);
    }

    public function update_pengguna($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('pengguna', $data);
    }

    public function delete_pengguna($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('pengguna');
    }

    // Manajemen Produk
    public function get_all_pending_products()
    {
        return $this->db->get_where('produk', array('status_verifikasi' => 'belum'))->result();
    }

    public function get_all_approved_products()
    {
        return $this->db->get_where('produk', array('status_verifikasi' => 'sudah'))->result();
    }

    public function get_produk_by_id($id)
    {
        return $this->db->get_where('produk', array('id' => $id))->row_array();
    }

    public function insert_produk($data)
    {
        return $this->db->insert('produk', $data);
    }

    public function update_produk($id, $data)
    {
        $this->db->where('produk_id', $id);
        return $this->db->update('produk', $data);
    }

    public function delete_produk($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('produk');
    }

    public function approve_produk($id)
    {
        $this->db->where('produk_id', $id);
        return $this->db->update('produk', array('status' => 'approved'));
    }
    // Manajemen Penjualan
    public function get_all_penjualan()
    {
        $this->db->select('pesanan.*, produk.*, pengguna.*, penjual.*, pesanan.alamat AS pesanan_alamat, penjual.alamat AS penjual_alamat');
        $this->db->from('pesanan');
        $this->db->join('produk', 'pesanan.produk_id = produk.produk_id');
        $this->db->join('pengguna', 'pesanan.pengguna_id = pengguna.pengguna_id');
        $this->db->join('penjual', 'pesanan.penjual_id = penjual.penjual_id');
        $this->db->where('status_pembayaran' , 'belum');
        return $this->db->get()->result();
    }
    public function get_penjual_id(){
        $this->db->where('pengguna_id', $this->session->userdata('pengguna_id'));
        return $this->db->get('penjual')->result();
    }
    public function approved_penjualan()
    {
        $this->db->select('pesanan.*, produk.*, pengguna.*, penjual.*, pesanan.alamat AS pesanan_alamat, penjual.alamat AS penjual_alamat');
        $this->db->from('pesanan');
        $this->db->join('produk', 'pesanan.produk_id = produk.produk_id');
        $this->db->join('pengguna', 'pesanan.pengguna_id = pengguna.pengguna_id');
        $this->db->join('penjual', 'pesanan.penjual_id = penjual.penjual_id');
        $this->db->where('status_pembayaran' , 'sudah');
        return $this->db->get()->result();
    }

    public function get_penjualan_by_id($id)
    {   
        return $this->db->get_where('pesanan', array('pesanan_id' => $id))->row_array();
    }

    public function confirm_penjualan($id)
    {
        $this->db->where('pesanan_id', $id);
        return $this->db->update('pesanan', array('status_pembayaran' => 'sudah'));
    }
    // Metode untuk dashboard
    public function get_verified_products_count()
    {
        $this->db->where('status_verifikasi', 'sudah');
        return $this->db->count_all_results('produk');
    }

    public function get_unverified_products_count()
    {
        $this->db->where('status_verifikasi', 'belum');
        return $this->db->count_all_results('produk');
    }

    public function get_seller_accounts_count()
    {
        $this->db->where('role', 'seller');
        return $this->db->count_all_results('pengguna');
    }

    public function get_monthly_sales_count()
    {
        $this->db->where('status', 'confirmed');
        $this->db->where('MONTH(tanggal)', date('m'));
        $this->db->where('YEAR(tanggal)', date('Y'));
        return $this->db->count_all_results('penjualan');
    }
    // Metode untuk manajemen blog
    public function get_all_blog()
    {
        return $this->db->get('blog')->result_array();
    }

    public function get_blog_by_id($id)
    {
        return $this->db->get_where('blog', array('id' => $id))->row_array();
    }

    public function delete_blog($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('blog');
    }

    public function approve_blog($id)
    {
        $this->db->where('id', $id);
        return $this->db->update('blog', array('status' => 'approved'));
    }
    public function get_all_kategori() {
        return $this->db->get('kategori')->result();
    }

    public function get_kategori_by_id($id) {
        return $this->db->get_where('kategori', ['id' => $id])->row();
    }

    public function insert_kategori($data) {
        return $this->db->insert('kategori', $data);
    }

    public function update_kategori($id, $data) {
        return $this->db->where('kategori_id', $id)->update('kategori', $data);
    }

    public function delete_kategori($id) {
        return $this->db->where('id', $id)->delete('kategori');
    }
}
