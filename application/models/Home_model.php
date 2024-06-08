<?php
class Home_model extends CI_Model {
    public function get_products($limit) {
        $this->db->limit($limit);
        $this->db->where('stok >', 0 );
        return $this->db->get('produk')->result();
    }

    public function get_all_products() {
        $this->db->where('status_verifikasi', 'sudah');
        $this->db->where('stok >', 0 );
        return $this->db->get('produk')->result();
    }

   

    public function get_all_categories() {
        return $this->db->get('kategori')->result();
    }

    public function get_products_by_category($category_id) {
        return $this->db->get_where('produk', array('kategori_id' => $category_id))->result();
    }
    public function get_product_by_id($id) {
        $this->db->where('produk_id', $id);
        return $this->db->get('produk')->result();
        
    }
    public function get_blog(){
        return $this->db->get('blog')->result();
    }
    public function blog_detail($id){
        $this->db->where('blog_id', $id);
       return $this->db->get('blog')->result();
    }
    public function check_stock($id) {
        $this->db->select('stok');
        $this->db->where('produk_id ', $id);
        $query = $this->db->get('produk');
        if ($query->num_rows() > 0) {
            return $query->row()->stok;
        } else {
            return false; // Produk tidak ditemukan
        }
    }
    public function get_product_stock($product_id) {
        $this->db->select('stok');
        $this->db->where('produk_id', $product_id);
        $query = $this->db->get('produk');
        if ($query->num_rows() > 0) {
            return $query->row()->stok;
        } else {
            return false; 
        }
    }
    public function get_cart_by_user($pengguna_id) {
        $this->db->select('keranjang.*, produk.nama_produk, produk.harga, produk.gambar, produk.stok');
        $this->db->from('keranjang');
        $this->db->join('produk', 'keranjang.produk_id = produk.produk_id');
        $this->db->where('keranjang.pengguna_id', $pengguna_id);
        $query = $this->db->get();
        return $query->result();
    }

    // Fungsi untuk menambahkan produk ke keranjang
  
    public function get_pesanan_by_id(){
        $this->db->from('pesanan');
        $this->db->join('produk', 'pesanan.produk_id = produk.produk_id');
        $this->db->where('pengguna_id' , $this->session->userdata('pengguna_id'));
        $this->db->where('status_pembayaran' ,'sudah');

        return $this->db->get()->result();
    }

}
