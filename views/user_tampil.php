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
                    <h3 class="panel-title"><span class="fa fa-user-plus"></span> Kelola User</h3>
                </div>
                <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>

                        </thead>
                        <tbody>
                          <tr>
                              <th>No.</th><th>Nama User</th><th>Username</th><th>Status</th><th>AKSI</th>
                          </tr>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = 'SELECT * FROM user order by ket';
                            $query = mysqli_query($koneksi, $sql) or die('SQL Anda Salah');
                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            while ($data = mysqli_fetch_array($query)) {
                                ++$nomor; //Penambahan satu untuk nilai var nomor?>
                                <tr>
                                    <td><?= $nomor; ?></td>
									                  <td><?= $data['nama']; ?></td>
									                  <td><?= $data['username']; ?></td>
									                  <td><?= $data['ket']; ?></td>
                                    
                                    <td>
                                        <a href="?page=user&actions=detail&id=<?= $data['id_user']; ?>" class="btn btn-success btn-xs">
                                            <span class="fa fa-eye"></span>
                                        </a>
                                        <a href="?page=user&actions=edit&uid=<?= $data['id_user']; ?>" class="btn btn-warning btn-xs">
                                            <span class="fa fa-edit"></span>
                                        </a>
                                        
                                        <a href="?page=user&actions=delete&id=<?= $data['id_user']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin Hapus data <?= $data['nama']; ?>?')">
                                            <span class="fa fa-remove"></span>
                                        </a>
                                    </td>
                                </tr>
                                <!--Tutup Perulangan data-->
                            <?php
                            } ?>
                        </tbody>

                    </table>
                    <a href="?page=user&actions=tambah" class="btn btn-success">Tambah User</a>
                </div>
            </div>

        </div>
    </div>
</div>
