<?php
    include('crud.php');
    $crud = new Crud;

?>
<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!--    Fontawesome.com-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" integrity="sha384-gfdkjb5BdAXd+lj+gudLWI+BXq4IuLW5IT+brZEZsLFm++aCMlF1V92rMkPaX4PP" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/acdf99f395.js" crossorigin="anonymous"></script>

    <title>CRUD Data Barang</title>
</head>
<body>
<div class="jumbotron">
<h1 class="display-5">Database Barang</h1>
<hr class="my-4">
<p class="lead">Vincent Nathaniel A11.2019.11652 </p>
</div>
<div class="container">

    <?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $update = $crud->read_data('barang','kode_barang',$id);
        foreach ($update as $upd){
            $kode_barang = $upd['kode_barang'];
            $nama_barang = $upd['nama_barang'];
            $satuan_barang = $upd['satuan_barang'];
            $harga_barang = $upd['harga_barang'];
            //        $readonly = 'readonly';
            $action = 'update';
        }
    }else{
        $kode_barang = '';
        $nama_barang = '';
        $satuan_barang = '';
        $harga_barang = '';
        //    $readonly = '';
        $action = 'simpan';
    }
    ?>

    <div class="row">
        <div class="col-4">
            <form action="simpanBarang.php" method="post">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode Barang</label>
                    <input type="text" name="kode_barang" value="<?php echo $kode_barang;?>" class="form-control" placeholder="Masukan Kode Barang">
                    <input type="hidden" name="id_lama" value="<?php echo $id;?>">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Nama Barang</label>
                    <input type="text" name="nama_barang"  value="<?php echo $nama_barang;?>" class="form-control" placeholder="Masukan Nama Barang">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Satuan</label>
                    <input type="text" name="satuan_barang" value="<?php echo $satuan_barang;?>" class="form-control" placeholder="Masukan Satuan">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="number" name="harga_barang"  value="<?php echo $harga_barang;?>" class="form-control" placeholder="Masukan Harga">
                </div>
                <input type="submit" name="simpan" value="Simpan" class="btn btn-dark">
                <!--                    <input type="reset" value="Reset">-->
                <input type="hidden" name ="action" value="<?php echo $action;?>">
            </form>
        </div>

        <div class="col-8">
            <table class="table table-hover" >
                <tr class="bg-dark" style="color: white">
                    <th style="text-align: center">No</th>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Satuan</th>
                    <th>Harga</th>
                    <th style="text-align: center" colspan="2">Aksi</th>
                </tr>
                <?php

                $barang = $crud->read_data('barang',null,null);
                $nomor = 1;
                foreach ($barang as $brg){
                    ?>
                    <tr>
                        <td style="text-align: center"> <?php echo $nomor++; ?> </td>
                        <td> <?php echo $brg['kode_barang']; ?> </td>
                        <td> <?php echo $brg['nama_barang']; ?> </td>
                        <td> <?php echo $brg['satuan_barang']; ?> </td>
                        <td> <?php echo $brg['harga_barang']; ?> </td>
                        <td style="text-align: center">
                            <a href="dataBarang.php?id=<?php echo $brg['kode_barang'];?>" style="color: black"><i class="fas fa-edit"></i> Edit</a>
                        </td>
                        <td style="text-align: center">
                            <a href="hapusBarang.php?id=<?php echo $brg['kode_barang'];?>" style="color: darkred;"><i class="fas fa-minus-circle"></i> Hapus</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->



</div>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>

