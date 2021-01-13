<div class="container">
    <div class="row">
        <div class="col-xs-12">
            <div class="alert alert-info">
                <?php if (isset($_SESSION['username'])) { ?>
                <strong>Selamat Datang <strong><?= ucfirst($_SESSION['nama']); ?></strong>
                    <?php } else { ?>
                    <strong>Selamat Datang <strong>Pengunjung</strong>
                        <?php } ?>
            </div>
        </div>
    </div>
    <div class="row">
        <!--colomn kedua-->
        <div class="col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Sistem Penjualan Voucer</h3>
                </div>
                <div class="panel-body" >
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th width="30%">Nama Voucer</th>
                                <th>Harga Voucer</th>
                                <th>Stok</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            $sql = 'SELECT * FROM tb_produk';
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
                                <td><?= $data['nama_produk']; ?></td>
                                <td>Rp. <?= number_format($data['harga']); ?></td>
                                <td><?= number_format($data['stok']); ?> Pcs</td>
                                <td>
                                     <center><a href="<?= 'beli.php?id='.$data['id']; ?>" class="btn btn-success"><li class="fa fa-cart-plus"></li> Buy</a></center>
                                </td>
                            </tr>
                            <!--Tutup Perulangan data-->
                            <?php
                            } ?>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
        <!--akhir colomn kedua-->


    </div>
</div>