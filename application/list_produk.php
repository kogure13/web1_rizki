<?php
include '../inc/class.php';
$db = new Database();
$connString = $db->getConstring();

$params = $_REQUEST;
$optionClass = new Option($connString);
$optionClass->getOption($params);

class Option {
    protected $conn;
    protected $data = array();
            
    function __construct($connString) {
        $this->conn = $connString;
    }
    
    function getOption($params) {
        $json_data = array();
        $kategori = (isset($_GET['kategori'])) ? $_GET['kategori'] : '';
        $qsearch = (!empty($kategori)) ? "WHERE id_kategori = '".$kategori."'": "";
        $sql = "SELECT * FROM tb_produk ";
        $sql .= $qsearch;
        
        $result = mysqli_query($this->conn, $sql);
        
        while ($row = mysqli_fetch_assoc($result)){
            $json_data[] = $row;
        }                
        
        echo json_encode($json_data);
    }
}