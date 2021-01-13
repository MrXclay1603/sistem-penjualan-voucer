

<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data Pinjaman Kategori</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">

						<div class="form-group">
                            <label for="nama_kategori" class="col-sm-3 control-label">Nama Kategori</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_kategori" class="form-control" id="inputEmail3" placeholder="Nama Kategori">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Simpan Data</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=kategorivoucer&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Kategori
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $nama_kategori=$_POST['nama_kategori'];
    //buat sql
    $sql="INSERT INTO kategori VALUES ('','$nama_kategori')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan Kategori Error");
    if ($query){
        echo "<script>window.location.assign('?page=kategorivoucer&actions=tampil');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
