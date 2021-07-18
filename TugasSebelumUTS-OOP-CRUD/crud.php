<?php
include('koneksi.php');
class Crud extends Koneksi{

//  Override
    function __construct(){
        parent::__construct();
    }

    public function read_data($table,$id,$id_value){
        $query = "SELECT * FROM $table";
        if($id!=null){
            $query .= " WHERE $id='".$id_value."'";
        }
        $hasil = $this->conn->query($query);
        if(!$hasil){
            return "Kesalahan Query";
        }

        $rows = array();
        while($row = $hasil->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }



    public function simpan_data($table_name, $dataArray){
//        $query= "INSERT INTO `".$table_name."` (".implode(",",array_keys($dataArray)).") VALUES ("."'".implode("','",array_values($dataArray))."')";
        $attribute = implode(",",array_keys($dataArray));
        $data = "'".implode("','",array_values($dataArray))."'";

        $query = "INSERT INTO ".$table_name." ($attribute) VALUES ($data)";

//        mysqli_query($this->conn,$query); // bisa pakai ini
//        $this->conn->query($query); // bisa pakai ini

        if(mysqli_query($this->conn,$query)){
            return true;
        }else{
            return false;
        }
    }
//    UPDATE barang SET 001,Barang7,Satuan7,123 WHERE kode_barang ='001';
    public function update_data($table_name,$dataArray,$id,$id_value){
        $query = "UPDATE $table_name SET ";
        $query .= implode(',', array_values($dataArray));
        $query .= " WHERE $id='".$id_value."'";
//        var_dump($dataArray);
//        echo $id_value."\n";
//        echo $query."\n";
        $hasil = mysqli_query($this->conn,$query);
        if ($hasil){
            return true;
        }else{
            return false;
        }
    }

    public function delete_data($table_name,$id,$id_value){
        $query = "DELETE FROM $table_name WHERE $id='"."$id_value"."'";
        if(mysqli_query($this->conn,$query)){
            return true;
        }else{
            return false;
        }
    }

}
