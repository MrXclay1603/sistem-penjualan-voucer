<?php
$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id ='$id'") or die('SQL Edit error');
$data = mysqli_fetch_array($ambil);
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Form Update Data Voucer</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">
                        
                        <div class="form-group">
                            <label for="nama_produk" class="col-sm-3 control-label">Nama Voucer</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama_produk" value="<?=$data['nama_produk']; ?>"class="form-control" id="inputEmail3" placeholder="Input Nama Voucer">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="harga" class="col-sm-3 control-label">Harga Voucer</label>
                            <div class="col-sm-9">
                                <input type="text" name="harga" value="<?=$data['harga']; ?>"class="form-control" id="inputEmail3" placeholder="Input Harga Voucer">
                            </div>
                        </div>
						<div class="form-group">
                            <label for="stok" class="col-sm-3 control-label">Stok</label>
                            <div class="col-sm-9">
                                <input type="number" name="stok" value="<?=$data['stok']; ?>"class="form-control" id="inputEmail3" placeholder="Input Stok">
                            </div>
                        </div>
						<!-- <div class="form-group">
                            <label for="tanggal_masuk" class="col-sm-3 control-label">Tanggal Masuk</label>
                            <div class="col-sm-9">
                                <input type="date" name="tanggal_masuk" value="<?=$data['tanggal_masuk']; ?>"class="form-control" id="inputEmail3" placeholder="Input Tanggal Masuk">
                            </div>
                        </div>
							<div class="form-group">
                            <label for="keterangan" class="col-sm-3 control-label">Keterangan</label>
                            <div class="col-sm-9">
                                <input type="text" name="keterangan" value="<?=$data['keterangan']; ?>"class="form-control" id="inputEmail3" placeholder="Tambahkan Keterangan Barang" >
                            </div>
                        </div> -->
                        <!--untuk tanggal lahir form tahun-bulan-tanggal 1998-10-10-->
                        
                        <!--end tanggal lahir-->           

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-edit"></span> Update Data Voucer </button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="?page=datavoucer&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data Voucer
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if ($_POST) {
    //Ambil data dari form
    $nama_produk = $_POST['nama_produk'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    // $tanggal_masuk = $_POST['tanggal_masuk'];
    // $keterangan = $_POST['keterangan'];
    //buat sql
    $sql = "UPDATE tb_produk SET
    nama_produk     = '$nama_produk',
    harga    = '$harga',
    stok            = '$stok'
    
	WHERE id           = '$id'";
    $query = mysqli_query($koneksi, $sql) or die('SQL Edit  Error');
    if ($query) {
        echo "<script>window.location.assign('?page=datavoucer&actions=tampil');</script>";
    } else {
        echo "<script>alert('Edit Data Gagal');<script>";
    }
}

?>



