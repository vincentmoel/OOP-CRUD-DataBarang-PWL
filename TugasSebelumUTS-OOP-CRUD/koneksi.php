<?php
class Koneksi{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $db = 'belajarcrud';

    public $conn;

    function __construct(){
//        if(!isset($this->conn)){
//            $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db);

//        }
        $this->conn = new mysqli($this->host,$this->user,$this->pass,$this->db);

        if(!$this->conn){
            echo 'koneksi gagal';
        }
        return $this->conn;
    }
}

//$koneksi = new Koneksi();
?>
