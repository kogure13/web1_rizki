<?php

class Database {

    var $DB_Host = "localhost";
    var $DB_Name = "db_obatherbal";
    var $DB_User = "root";
    var $DB_Pass = "";
    var $conn;

    function getConstring() {
        $con = mysqli_connect($this->DB_Host, $this->DB_User, $this->DB_Pass, $this->DB_Name) or
                die("Connection failed: " . mysqli_connect_error());

        if (mysqli_connect_errno()) {
            printf("Connect failed: %s\n", mysqli_connect_error());
            exit();
        } else {
            $this->conn = $con;
        }

        return $this->conn;
    }

}

class Main {

    function getPage() {
        if (!isset($_GET['page'])) {
            include_once 'view/dashboard.php';
        } else {
            $page = htmlentities($_GET['page']);
            $pageRoot = "view/" . $page . ".php";

            if (file_exists($pageRoot)) {
                include_once $pageRoot;
            } elseif ($page == "login") {
                include_once 'model/login.php';
            } elseif ($page == "logout") {
                $user = new User();
                $user->logout();
            } else {
                include_once 'view/dashboard.php';
            }
        }
    }

    function getMain() {
        include 'model/main.php';
        return;
    }

    function getHeader() {
        include 'model/header.php';
        return;
    }

    function getMenu() {
        include 'model/mainMenu.php';
        return;
    }

}

class User {

    protected $conn;
    protected $data = [];
       
    function __construct() {
        $db = new Database;
        $connString = $db->getConstring();
        $this->conn = $connString;
    }

    function cekLogin($username, $password) {
        $sql = "SELECT * FROM user";
        $sql .= " WHERE username = '$username' AND password = '$password'";
        $sqlTot = $sql;
        
        $qtot = mysqli_query($this->conn, $sqlTot) or die("Error to fecth total data");
        $queryRecords = mysqli_query($this->conn, $sql) or die("Error to fecth data");
        
        $data = mysqli_fetch_assoc($queryRecords);
                
        if(intval($qtot->num_rows) > 0){
            $_SESSION['user_login'] = TRUE;
            $_SESSION['username'] = $data['username'];
            header("location: index.php");
        }else{
            session_destroy();
            echo 'Login Error';
        }
    }
    
    function logout() {
        session_destroy();
        echo '<meta http-equiv="refresh" content="0;url=index.php">';
    }

}

class Kategori {
    
    protected $conn;                           
    
    function getKategori($params) {
        $db = new Database();
        $connString = $db->getConstring();
        $this->conn = $connString;
        
        $json_data = array();        
        $sql = "SELECT id, nama_kategori FROM tb_kategori ";        
        $sql .= " WHERE id = '$params'";
        
        $result = mysqli_query($this->conn, $sql);
        
        $row = mysqli_fetch_assoc($result);
            $json_data = $row['nama_kategori'];        
            
            return $json_data;
    }
}