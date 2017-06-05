<?php
include '../inc/class.php';
$db = new Database();
$connString = $db->getConstring();

$params = $_REQUEST;
$optionClass = new Option($connString);

if(isset($_GET['id'])){    
    $optionClass->getDetailProduk($_GET['id']);
}else{
    $optionClass->getOption($params);
}

class Option {
    protected $conn;
    protected $data = array();
            
    function __construct($connString) {
        $this->conn = $connString;
    }
    
    function getOption($params) {
        $json_data = array();
        $kategori = isset($_GET['kategori']) ? $_GET['kategori'] : '';
        $qsearch = !empty($kategori) ? "WHERE id_kategori = '".$kategori."'": "";
        $sql = "SELECT * FROM tb_produk ";
        $sql .= $qsearch;
        
        $result = mysqli_query($this->conn, $sql);
        
        while ($row = mysqli_fetch_assoc($result)){
            $json_data[] = $row;
        }                
        
        echo json_encode($json_data);
    }
    
    function getDetailProduk($params) {
        $json_data = array();
        $sql = "SELECT tb_produk.id, nama_produk, harga_produk, "
                . " nama_kategori, link_gambar"; 
        $sql .= " FROM tb_produk";
        $sql .= " INNER JOIN tb_kategori ON tb_kategori.id = tb_produk.id_kategori";
        $sql .= " WHERE tb_produk.id = '$params'";
        
        $result = mysqli_query($this->conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            $json_data[] = $row;
        }
        
        echo json_encode($json_data);
    }
}