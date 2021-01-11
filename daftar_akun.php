<?php include 'config/koneksi.php'; ?>
<?php require 'head.php'; ?>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Daftar Akun</h3>
                </div>
                <div class="panel-body">
                    <!--membuat form untuk tambah data-->
                    <form class="form-horizontal" action="" method="post">

                        <div class="form-group">
                            <label for="username" class="col-sm-3 control-label">Username</label>
                            <div class="col-sm-9">
                                <input type="text" name="username" class="form-control" id="inputEmail3"
                                    placeholder="Username" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="paswd" class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" name="paswd" class="form-control" id="inputEmail3"
                                    placeholder="Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="text" name="email" class="form-control" id="inputEmail3"
                                    placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama" class="col-sm-3 control-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="text" name="nama" class="form-control" id="inputEmail3" placeholder="Nama"
                                    required>
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-sm-9">
                                <input type="hidden" name="level" class="form-control" id="inputEmail3" placeholder="2">
                            </div>
                        </div>
                        <div class="form-group">

                            <div class="col-sm-9">
                                <input type="hidden" name="ket" class="form-control" id="inputEmail3"
                                    placeholder="Administrator" value="Pelanggan">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-9">
                                <button type="submit" class="btn btn-success">
                                    <span class="fa fa-save"></span> Daftar</button>
                            </div>
                        </div>
                    </form>


                </div>
                <div class="panel-footer">
                    <a href="index.php" class="btn btn-danger btn-sm">
                        Kembali ke halaman utama
                    </a>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
if($_POST){
    //Ambil data dari form
    $username=$_POST['username'];
    $paswd=$_POST['paswd'];
    $email=$_POST['email'];
    $nama=$_POST['nama'];
    $level=2;
    $ket=$_POST['ket'];
    $pass=md5($paswd);

    //buat sql
    $sql="INSERT INTO user VALUES ('','$username','$pass','$email','$nama','$level','$ket')";
    $query=  mysqli_query($koneksi, $sql) or die ("SQL Simpan User Error");
    if ($query){
        echo "<script>window.location.assign('index.php?page=login&actions=admin');</script>";
    }else{
        echo "<script>alert('Simpan Data Gagal');<script>";
    }
    }

?>
<?php require 'footer.php' ?>
</div>
<script src="Assets/js/jquery.js" type="text/javascript"></script>
<script src="Assets/js/bootstrap.min.js" type="text/javascript"></script>
<script src="Assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="Assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>

<script type="text/javascript">
$(function() {
    $('#dtskripsi').dataTable();
});
</script>

</body>

</html>