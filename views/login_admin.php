
<?php
    include 'config/koneksi.php'; ?>

<br><br><br>
<div class="container">
 <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <!--Jika terjadi login error tampilkan pesan ini-->
<?php if (isset($_GET['error'])) {?>
            <div class="alert alert-danger">Maaf! Login Gagal, Coba Lagi..</div>
            <?php }?>

            <?php if (isset($_SESSION['username'])) { ?>
            <div class="alert alert-info">
                <strong>Welcome <?=$_SESSION['nama']; ?></strong>
                <?php
    echo    "<script>location='index.php';</script>"; ?>
            </div>
            <?php
           } else { ?>

            <div class="panel panel-success" style="opacity: 0.8;">
                <div class="panel-heading">
                    <h3 class="panel-title" >Masuk Ke Sistem</h3>
                </div>
                <div class="panel-body" >
                    <form class="form-horizontal" action="proses_login.php" method="post">
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" name="user" class="form-control input-sm"
                                   placeholder="Username" required autofocus autocomplete="off"/>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="password" name="pwd" class="form-control input-sm"
                                   placeholder="Password" required autocomplete="off"/>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <button type="submit" name="login" value="login"
                                        class="btn btn-success btn-block" ><span class="fa fa-unlock-alt"></span>
                                    Login Sistem
                                </button><br>
                                <center><label for="">Belum Punya Akun?</label><br>
                                <a href="daftar_akun.php" class="btn btn-info">Daftar</a></center>
                            </div>
                    </form>
                </div>
            </div>
            <?php } ?>

        </div>
        </div>