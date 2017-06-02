<?php

include '../../../inc/class.php';
$db = new Database();
$connString = $db->getConstring();

$produkClass = new Produk($connString);


if(!isset($_GET['id'])){
    exit();
}else{
    $params = $_GET['id'];
}

if ($params > 0) {
    $produkClass->getProduk($params);
} else {
    mysql_errno();
}

class Produk {

    protected $conn;    

    function __construct($connString) {
        $this->conn = $connString;
    }

    function getProduk($params) {
        $json_data = [];
        $sql = "SELECT * FROM tb_produk";
        $sql .= " WHERE id = $params";

        $result = mysqli_query($this->conn, $sql) or die();
                
        while ($row = mysqli_fetch_assoc($result)) {            
            $json_data = $row;
        }
        echo json_encode($json_data);
    }
}
