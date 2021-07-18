<?php
include('crud.php');

// memanggil class crud untuk membangun koneksi
$crud = new Crud();


if($_POST['action'] == 'simpan'){
    $arrData = array(
        'kode_barang' => mysqli_real_escape_string($crud->conn,$_POST["kode_barang"]),
        'nama_barang' => mysqli_real_escape_string($crud->conn,$_POST["nama_barang"]),
        'satuan_barang' => mysqli_real_escape_string($crud->conn,$_POST["satuan_barang"]),
        'harga_barang' => mysqli_real_escape_string($crud->conn,$_POST["harga_barang"]));
    $hasil = $crud->simpan_data('barang', $arrData);

}else{

    $arrData = array(
        "kode_barang='".mysqli_real_escape_string($crud->conn,$_POST["kode_barang"])."'",
        "nama_barang='".mysqli_real_escape_string($crud->conn,$_POST["nama_barang"])."'",
        "satuan_barang='".mysqli_real_escape_string($crud->conn,$_POST["satuan_barang"])."'",
        "harga_barang='".mysqli_real_escape_string($crud->conn,$_POST["harga_barang"])."'");

    $id_value = $_POST['id_lama'];


    $hasil = $crud->update_data('barang', $arrData,'kode_barang',$id_value);

}

if($hasil){
    header("Location:dataBarang.php");
}else{
    echo 'Tidak Tersimpan';
}






















