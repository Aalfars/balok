<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Home_model');
    }
    public function index(){
        $data = array(
            'title' => "All Products",
            'products' => $this->Home_model->get_all_products(),        
        );
        $data['pesanan'] = $this->Home_model->get_pesanan_by_id();

        $this->template->load('template_home','Home/product', $data);

    }
    public function product_detail($id) {
        $product = $this->Home_model->get_product_by_id($id);
    
        if ($product->stok > 1) {
            $this->session->set_flashdata('error', 'Stok produk habis. Tidak dapat melihat detail produk.');
            redirect('Home/dashboard'); // Kembali ke halaman sebelumnya
        } else {
            $data['title'] = "Produk Detail";
            $data['product'] = $product;
            $this->template->load('template_home','Home/product_detail', $data);
        }
    }
    public function add_to_cart() {
        $product_id = $this->input->post('produk_id');
        $jumlah = $this->input->post('jumlah');
        $pengguna_id = $this->session->userdata('pengguna_id');
        $waktu = date('Y-m-d');

        // Periksa stok produk
        $stok = $this->Home_model->get_product_stock($product_id);

        if ($stok === false) {
            $this->session->set_flashdata('error', 'Produk tidak ditemukan.');
            redirect('Home/products');
        } elseif ($jumlah > $stok) {
            $this->session->set_flashdata('error', 'Jumlah yang diminta melebihi stok yang tersedia.');
            redirect('Home/products');
        } else {
            $data = array(
                'produk_id' => $product_id,
                'jumlah' => $jumlah,
                'pengguna_id' => $pengguna_id,
                'waktu' => $waktu,
                'penjual_id' => $this->input->post('penjual_id')
            );

            $this->db->insert('keranjang', $data); 
            $this->session->set_flashdata('sucess', 'Produk berhasil ditambahkan ke keranjang.');
            redirect('Home/products');
        }
    }
  
    public function checkout() {
    $pengguna_id = $this->session->userdata('pengguna_id'); // Sesuaikan dengan sesi pengguna Anda
    $produk_id = $this->input->post('produk_id');
    $jumlah = $this->input->post('jumlah');
    $alamat = $this->input->post('alamat');
    $harga = $this->input->post('harga');
    $penjual_id = $this->input->post('penjual_id');
    $tanggal_pesan = date('Y-m-d H:i:s');
    $nota = $this->generateNota($produk_id, $tanggal_pesan);

    // Mulai transaksi
    $this->db->trans_start();

    // Insert pesanan ke tabel 'pesanan'
    $data = [
        'pengguna_id' => $pengguna_id,
        'tanggal_pesan' => $tanggal_pesan,
        'produk_id' => $produk_id,
        'nota' => $nota,
        'alamat' => $alamat,
        'status_pembayaran' => 'belum',
        'jumlah' => $jumlah,
        'harga' => $harga,
        'status_pengiriman' => 'sedang diproses',
        'penjual_id' => $penjual_id,
    ];
    $this->db->insert('pesanan', $data);

    // Kurangi stok produk
    $this->db->set('stok', 'stok - ' . $jumlah, FALSE);
    $this->db->where('produk_id', $produk_id);
    $this->db->update('produk');

    // Hapus item dari cart
    $this->db->where('pengguna_id', $pengguna_id);
    $this->db->where('produk_id', $produk_id);
    $this->db->delete('keranjang');

    // Selesaikan transaksi
    $this->db->trans_complete();

    // Cek apakah transaksi berhasil
    if ($this->db->trans_status() === FALSE) {
        // Jika terjadi kesalahan, rollback transaksi dan tampilkan pesan kesalahan
        $this->session->set_flashdata('alert', 'Terjadi kesalahan saat melakukan checkout. Silakan coba lagi.');
    } else {
        // Jika berhasil, set flashdata dan redirect
        $this->session->set_flashdata('success', true);
    }

    redirect('home/cart');
}

    private function generateNota($produk_id, $tanggal_pesan) {
        $produk = $this->Home_model ->get_product_by_id($produk_id);
        $inisial_produk = substr($produk->nama_produk, 0, 3);
        $tanggal_waktu = date('YmdHis', strtotime($tanggal_pesan));
        return strtoupper($inisial_produk) . $tanggal_waktu;
    }
    
}