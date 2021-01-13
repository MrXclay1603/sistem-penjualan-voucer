<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Informasi Detail Voucer</h3>
                </div>
                <div class="panel-body">
                    <!--Menampilkan data detail arsip-->
                    <?php
                    $sql = "SELECT *FROM tb_produk WHERE id ='".$_GET['id']."'";
                    //proses query ke database
                    $query = mysqli_query($koneksi, $sql) or die('SQL Detail error');
                    //Merubaha data hasil query kedalam bentuk array
                    $data = mysqli_fetch_array($query);
                    ?>   

                    <!--dalam tabel--->
                    <table class="table table-bordered table-striped table-hover"> 
                        <tr>
                            <td>Nama Voucer</td> <td><?= $data['nama_produk']; ?></td>
                        </tr>
                        <tr>
                            <td>Harga Voucer</td> <td><?= $data['harga']; ?></td>
                        </tr>
                        <tr>
                            <td>Stok</td> <td><?= $data['stok']; ?></td>
                        </tr>
						<!-- <tr>
                            <td>Tanggal Masuk</td> <td><?= $data['tanggal_masuk']; ?></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td> <td><?= $data['keterangan']; ?></td>
                        </tr> -->
                    </table>
				
                </div> <!--end panel-body-->
                <!--panel footer--> 
                <div class="panel-footer">
                    <a href="?page=datavoucer&actions=tampil" class="btn btn-success btn-sm">
                        Kembali ke Data Voucer </a>

                </div>
                <!--end panel footer-->
            </div>

        </div>
    </div>
</div>

