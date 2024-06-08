<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Seller_model extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    // Mendapatkan semua produk berdasarkan ID penjual
    public function get_all_products_by_seller($seller) {
        return $this->db->get_where('produk', array('username' => $seller))->result();
    }
    public function get_penjual_id(){
        return $this->db->get_where('penjual', array('username' => $this->session->userdata('username')));
    }

    // Menambahkan produk baru
    public function simpan_produk($penjual_id)
    {
        $namafoto = date('YmdHis') . '.jpg';
        $namafile = date('YmdHis') . '.pdf';
        $data = array(
            'penjual_id' => $penjual_id,
            'username' => $this->session->userdata('username'),
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi'),
            'kategori' => $this->input->post('kategori'),
            'gambar' => $namafoto,
            'bukti_lokal' => $namafile,
            'stok' => $this->input->post('stok'),
            'status_verifikasi' => 'belum',
            'slug' => str_replace(' ', '-', $this->input->post('judul')));
        $this->db->insert('produk', $data);
    }
    public function get_kategori(){
        return $this->db->get('kategori')->result();
    }




    public function update_produk($id, $penjual_id, $nama_foto, $nama_bukti) {
        $data = array(
            'penjual_id' => $penjual_id,
            'nama_produk' => $this->input->post('nama_produk'),
            'harga' => $this->input->post('harga'),
            'deskripsi' => $this->input->post('deskripsi'),
            'gambar' => $nama_foto,
            'kategori' => $this->input->post('kategori'),
            'bukti_lokal' => $nama_bukti,
            'stok' => $this->input->post('stok'),
            'status_verifikasi' => $this->input->post('status_verifikasi'),
            'slug' => str_replace(' ', '-', $this->input->post('nama_produk'))
        );
        $this->db->where('produk_id', $id);
        $this->db->update('produk', $data);
    }
    public function detail($id)
    {
        return $this->db->get_where('produk', array('produk_id' => $id))->result();
        
    }
    public function get_pesanan_baru()
    {
        $this->db->select('pesanan.*, produk.*, pengguna.*, penjual.*, pesanan.alamat AS pesanan_alamat, penjual.alamat AS penjual_alamat');
        $this->db->from('pesanan');
        $this->db->join('produk', 'pesanan.produk_id = produk.produk_id');
        $this->db->join('pengguna', 'pesanan.pengguna_id = pengguna.pengguna_id');
        $this->db->join('penjual', 'pesanan.penjual_id = penjual.penjual_id');
        $this->db->where('status_pengiriman' , 'sedang diproses');
        return $this->db->get()->result();
    }
    public function get_pesanan_lama()
    {
        $this->db->select('pesanan.*, produk.*, pengguna.*, penjual.*, pesanan.alamat AS pesanan_alamat, penjual.alamat AS penjual_alamat');
        $this->db->from('pesanan');
        $this->db->join('produk', 'pesanan.produk_id = produk.produk_id');
        $this->db->join('pengguna', 'pesanan.pengguna_id = pengguna.pengguna_id');
        $this->db->join('penjual', 'pesanan.penjual_id = penjual.penjual_id');
        $this->db->where('status_pengiriman' , 'sudah diterima');
        return $this->db->get()->result();
    }
}
