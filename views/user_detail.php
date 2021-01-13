<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail User</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM user WHERE id_user='".$_GET['id']."'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die('SQL Detail error');
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td >ID</td> <td><?= $data['id_user']; ?></td>
                        </tr>
                        <tr>
                            <td>Username</td> <td><?= $data['username']; ?></td>
                        </tr>
                        <tr>
                            <td>Email</td> <td><?= $data['email']; ?></td>
                        </tr>
                        <tr>
                            <td>Nama</td> <td><?= $data['nama']; ?></td>
                        </tr>
                        <tr>
                            <td>Status</td> <td><?= $data['ket']; ?></td>
                        </tr>
                        
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=user&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data user </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

