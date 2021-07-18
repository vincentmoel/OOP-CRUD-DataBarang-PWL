<?php
include('crud.php');
$crud = new Crud;

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $hasil = $crud->delete_data('barang','kode_barang',$id);

    if($hasil){
        header("Location:dataBarang.php");
    }else{
        echo "Gagal Hapus";
    }
}
?>