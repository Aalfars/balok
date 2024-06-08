<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penjualan_model extends CI_Model {

    public function get_penjualan_belum_disetujui() {
        $this->db->where('status', 'belum');
        return $this->db->get('penjualan')->result_array();
    }

    public function get_penjualan_disetujui() {
        $this->db->where('status', 'disetujui');
        return $this->db->get('penjualan')->result_array();
    }

    public function setujui_penjualan($penjualan_id) {
        $this->db->where('id', $penjualan_id);
        $this->db->update('penjualan', array('status' => 'disetujui'));
    }

    public function get_laporan_bulanan() {
        $this->db->select('DATE_FORMAT(tanggal_pesan, "%Y-%m") as bulan, SUM(harga_total) as total_pemasukan, SUM(biaya) as total_pengeluaran');
        $this->db->group_by('DATE_FORMAT(tanggal_pesan, "%Y-%m")');
        return $this->db->get('penjualan')->result_array();
    }

    public function get_semua_produk_terjual() {
        return $this->db->get('penjualan')->result_array();
    }
    public function hitung_penjualan_disetujui(){
        $this->db->where('status', 'disetujui');
        return $this->db->count_all('penjualan');

    }
    public function hitung_penjualan_belum_disetujui(){
        $this->db->where('status', 'belum');
        return $this->db->count_all('penjualan');

    }
}
