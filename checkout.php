<?php

session_start();
if (!isset($_SESSION['username'])) {
    echo    "<script>alert('Login dulu la wak!');</script>";
    echo    "<script>location='index.php?page=login&actions=admin';</script>";
}elseif (empty($_SESSION['keranjang'])) {
    echo    "<script>alert('Keranjang Masih Kosong, Silahkan Belanja dulu!');</script>";
    echo    "<script>location='index.php';</script>";
} else {
    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';
    ?>
<?php  include 'config/koneksi.php'; ?>
<?php require 'head.php' ?>
<div class="container">


    <h3>Checkout</h3>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <!-- <th>Aksi</th> -->
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
            <?php $totalbelanja=0; ?>
            <?php $totalitem=0; ?>

            <?php foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) { ?>
            <?php $ambil = $koneksi->query("SELECT * FROM tb_produk WHERE id = '$id_produk'");
                 $pecah = $ambil->fetch_assoc();
                //  echo '<pre>';
                //     print_r($pecah);
                // echo '</pre>';?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $pecah['nama_produk']; ?></td>
                <td><?= $jumlah; ?> Pcs</td>
                <td>Rp. <?= number_format($pecah['harga']); ?></td>
                <td>Rp. <?= number_format($total = $jumlah * $pecah['harga']); ?></td>

            </tr>
            <?php $totalbelanja+=$total; ?>
            <?php $totalitem+=$jumlah; ?>
            
            <?php } ?>

        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th style="background-color: lightblue">Total Belanja</th>
                <th style="background-color: lightblue" style="color: blue">Rp. <?= number_format($totalbelanja); ?>
                </th>
            </tr>
        </tfoot>
    </table>
    <!-- <a href="index.php?page=utama" class="btn btn-default">Lanjut Belanja</a> -->
    <form method="post">
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nama">Nama Pelanggan</label>
                    <input class="form-control" name="nama" type="text" readonly value="<?= $_SESSION['nama']; ?>">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input class="form-control" name="email" type="text" readonly value="<?= $_SESSION['email']; ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-2">
                <button class="btn btn-success" name="checkout">Checkout</button>
            </div>
        </div>
    </form>
<?php 
    if (isset($_POST['checkout'])) {
        $id_pelanggan=$_SESSION['id_user'];
        $tgl_transaksi=date("Y-m-d");
        $total_item=$totalitem;
        $total_bayar=$totalbelanja;
        // print_r($total_item);
        
        $koneksi->query("INSERT INTO tb_order (id_user,total_item,total_bayar,tgl_transaksi) values('$id_pelanggan','$total_item','$total_bayar','$tgl_transaksi')");
        $id_order_barusan=$koneksi->insert_id;
        print_r($id_order_barusan);
        foreach ($_SESSION['keranjang'] as $id_produk => $jumlah) {
            $koneksi->query("INSERT INTO tb_detail_order (id_order,id_produk,id_user,jumlah) values('$id_order_barusan','$id_produk','$id_pelanggan','$jumlah')");
        }
        echo "<script>alert('Terimakasih sudah belanja di toko kami!');</script>";
        echo "<script>location='index.php';</script>";
        unset($_SESSION['keranjang']);
    }
?>
</div>

<?php //mengambil file menu.php
        require 'footer.php';
        ?>
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
<?php } ?>