<?php 
    class Search_m extends CI_Model {

    public function search_barang($barang)
    {
        $barang = $this->db->query("SELECT * FROM barang WHERE nama_barang LIKE '%$barang%' ORDER BY jumlah_barang DESC ");
        return $barang->result();
    }

    public function search_product_women($products)
    {
       $products = $this->db->query("SELECT product_womens.*,  jenis_product.title FROM product_womens JOIN jenis_product ON product_womens.jenis = jenis_product.id WHERE jenis_product.title LIKE '%$products%' ORDER BY tanggal DESC ");
        return $products->result();
    }

}