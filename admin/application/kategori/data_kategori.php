<?php

include '../../../inc/class.php';
$db = new Database();
$connString = $db->getConstring();

$params = $_REQUEST;

$action = isset($params['action']) != '' ? $params['action'] : '';
$kategoriClass = new Kategori($connString);

switch ($action) {
    case 'add'  : $kategoriClass->insertData($params);
        break;
    case 'edit' : $kategoriClass->updateData($params);
        break;
    default :
        $kategoriClass->getkategori($params);
        return;
}

class Kategori {

    protected $conn;
    protected $data = [];

    function __construct($connString) {
        $this->conn = $connString;
    }

    public function getkategori($params) {
        $this->data = $this->getRecords($params);
        echo json_encode($this->data);
    }

    function getRecords() {
        $page = isset($_POST['page']) ? $_POST['page'] : 1;
        $rp = isset($_POST['rp']) ? $_POST['rp'] : 10;
        $sortname = isset($_POST['sortname']) ? $_POST['sortname'] : 'id';
        $sortorder = isset($_POST['sortorder']) ? $_POST['sortorder'] : 'desc';
        $query = isset($_POST['query']) ? $_POST['query'] : FALSE;
        $qtype = isset($_POST['qtype']) ? $_POST['qtype'] : FALSE;

        $start = ($page - 1) * $rp;
        $sql = "SELECT * FROM tb_kategori";
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
        $sql = "INSERT INTO tb_kategori";
        $sql .= " (kode_kategori, nama_kategori) ";
        $sql .= " VALUES ('".$params['kode']."', '".$params['kategori']."') ";
        
        echo $result = mysqli_query($this->conn, $sql) or die();        
    }
    
    function updateData($params) {
        $data = [];
        $sql = "UPDATE tb_kategori";
        $sql .= " SET kode_kategori = '".$params['kode']."', nama_kategori = '".$params['kategori']."'";
        $sql .= " WHERE id = '".$params['edit_id']."'";
        
        echo $result = mysqli_query($this->conn, $sql) or die();
    }        
}
