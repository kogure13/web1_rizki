<?php

include '../../../inc/class.php';
$db = new Database();
$connString = $db->getConstring();

$params = $_REQUEST;

$action = isset($params['action']) != '' ? $params['action'] : '';
$produkClass = new Produk($connString);

switch ($action) {
    case 'add'  : $produkClass->insertData($params);
        break;
    case 'edit' : $produkClass->updateData($params);
        break;
    default :
        $produkClass->getProduct($params);
        return;
}

class Produk {

    protected $conn;
    protected $data = [];

    function __construct($connString) {
        $this->conn = $connString;
    }

    public function getProduct($params) {
        $this->data = $this->getRecords($params);
        echo json_encode($this->data);
    }

    function getRecords() {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'kode_produk';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
        $query = isset($_POST['query']) ? $_POST['query'] : FALSE;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : FALSE;

        $start = ($page - 1) * $rp;
        $sql = "SELECT tb_produk.id, kode_produk, nama_produk, nama_kategori, "
                . " harga_produk, link_gambar";
        $sql .= " FROM tb_produk";        
        $sql .= " INNER JOIN tb_kategori ON tb_produk.id_kategori = tb_kategori.id";
        
        $sqlTot = $sql;                
        $sql .= " ORDER BY " . $sortname . " " . $sortorder;
        $sql .= " LIMIT " . $start . " , " . $rp . " ";
        
        $qtot = mysqli_query($this->conn, $sqlTot) or die("Error to fecth total data");
        $queryRecords = mysqli_query($this->conn, $sql) or die("Error to fecth data");

        while ($row = mysqli_fetch_assoc($queryRecords)) {
            $data[] = $row;
        }

        if (intval($qtot->num_rows) > 0) {
            $json_data = [
                "page" => $page,
                "total" => intval($qtot->num_rows),
                "rows" => $data
            ];
        } else {
            $json_data = [
                "page" => 0,
                "total" => 0,
                "rows" => 0
            ];
        }

        return $json_data;
    }
    
    function insertData($params) {
        $data = [];
        $sql = "INSERT INTO tb_produk";
        $sql .= " (id_kategori, kode_produk, nama_produk, harga_Produk, link_gambar) ";
        $sql .= " VALUES ('".$params['kategori']."', '".$params['kode']."', "
                . " '".$params['produk']."', '".$params['harga_produk']."', '".$params['link_gambar']."')";
        
        echo $result = mysqli_query($this->conn, $sql) or die();        
    }
    
    function updateData($params) {
        $data = [];
        $sql = "UPDATE tb_produk";
        $sql .= " SET id_kategori = '".$params['kategori']."', nama_produk = '".$params['produk']."', "
                . "kode_produk = '".$params['kode']."', harga_produk = '".$params['harga_produk']."', "
                . "link_gambar = '".  addslashes($params['link_gambar'])."'";
        $sql .= " WHERE id = '".$params['edit_id']."'";
        
        echo $result = mysqli_query($this->conn, $sql) or die();
    }        
}
