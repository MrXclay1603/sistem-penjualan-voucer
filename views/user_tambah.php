
<?php
if (!isset($_SESSION['idsesi'])) {
    echo "<script> window.location.assign('../index.php'); </script>";
}
?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tambah Data User</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">

						<div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="Username" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="paswd" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="text" name="paswd" class="form-control" id="inputEmail3" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" id="inputEmail3" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Nama" required>
                            </div>
                        </div>
                        <div class="form-group">
                            
                            <div class="col-sm-9">
                                <input type="hidden" name="level" class="form-control" id="inputEmail3" placeholder="1" >
                            </div>
                        </div>
                        <div class="form-group">
                             <label for="nama" class="col-sm-3 control-label">Level</label>
                            <div class="col-sm-9">
                                <!-- <input type="hidden" name="ket" class="form-control" id="inputEmail3" placeholder="Administrator" value="Administrator" > -->
                               
                                <select name="level" id="inputEmail3" class="form-control">
                                    <option value="">---- Pilih Level User -----</option>
                                    <option value="1">Administrator</option>
                                    <option value="2">Pelanggan</option>
                                </select>
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
                    <a href="?page=user&actions=tampil" class="btn btn-danger btn-sm">
                        Kembali Ke Data User
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if ($_POST) {
    //Ambil data dari form
    $username = $_POST['username'];
    $paswd = $_POST['paswd'];
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $level = $_POST['level'];
    if ($level == 1) {
        $ket = 'Administrator';
    } else {
        $ket = 'pelanggan';
    }

    $pass = md5($paswd);

    //buat sql
    $sql = "INSERT INTO user VALUES ('','$username','$pass','$email','$nama','$level','$ket')";
    $query = mysqli_query($koneksi, $sql) or die('SQL Simpan User Error');
    if ($query) {
        echo "<script>window.location.assign('?page=user&actions=tampil');</script>";
    } else {
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
}

?>
