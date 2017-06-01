<?php

include '../../../inc/class.php';
$db = new Database();
$connString = $db->getConstring();

$params = $_REQUEST;

$action = isset($params['action']) != '' ? $params['action'] : '';
$kamusClass = new Kamus($connString);

switch ($action) {
    case 'add'  : $kamusClass->insertData($params);
        break;
    case 'edit' : $kamusClass->updateData($params);
        break;
    default :
        $kamusClass->getkamus($params);
        return;
}

class Kamus {

    protected $conn;
    protected $data = [];

    function __construct($connString) {
        $this->conn = $connString;
    }

    public function getkamus($params) {
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
        $sql = "SELECT * FROM tb_kamuspenyakit";
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
        $sql = "INSERT INTO tb_kamuspenyakit";
        $sql .= " (kode_penyakit, nama_penyakit) ";
        $sql .= " VALUES ('".$params['kode']."', '".$params['nama_penyakit']."') ";
        
        echo $result = mysqli_query($this->conn, $sql) or die();        
    }
    
    function updateData($params) {
        $data = [];
        $sql = "UPDATE tb_kamuspenyakit";
        $sql .= " SET kode_penyakit = '".$params['kode']."', nama_penyakit = '".$params['nama_penyakit']."'";
        $sql .= " WHERE id = '".$params['edit_id']."'";
        
        echo $result = mysqli_query($this->conn, $sql) or die();
    }        
}
