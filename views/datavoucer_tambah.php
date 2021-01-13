<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Tambah Data Voucer</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
						 <div class="form-group">
                            <label for="nama_produk" class="col-sm-3 control-label">Nama Produk</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_produk" class="form-control" id="inputEmail3" placeholder="Inputkan Nama Produk" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="harga" class="col-sm-3 control-label">Harga Voucer</label>
                            <div class="col-sm-9">
                                <input type="number" name="harga" class="form-control" id="inputEmail3" placeholder="Inputkan Harga Voucer" required>
                            </div>
                        </div>
						 <div class="form-group">
                            <label for="stok" class="col-sm-3 control-label">Stok</label>
                            <div class="col-sm-9">
                                <input type="number" name="stok" class="form-control" id="inputEmail3" placeholder="Inputkan Stok" required>
                            </div>
                        </div>
<!-- 
                        <div class="form-group">
                            <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" name="keterangan" class="form-control" id="inputPassword3" placeholder="Inputkan Keterangan" required>
                            </div>
                        </div> -->


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data Voucer</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=arsip&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Arsip
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $nama_produk=$_POST['nama_produk'];
    $harga=$_POST['harga'];
	$stok=$_POST['stok'];
    //buat sql
    $sql="INSERT INTO tb_produk VALUES ('','$nama_produk','$harga','$stok')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Arsip Error");
    if ($query){
        echo "<script>window.location.assign('?page=datavoucer&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
