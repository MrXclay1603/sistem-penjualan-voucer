<?php

if (!isset($_SESSION['username'])) {
    echo    "<script>alert('Keranjang Masih Kosong!');</script>";
    echo    "<script>location='index.php?page=login&actions=admin';</script>";
} elseif (empty($_SESSION['keranjang'])) {
    echo    "<script>alert('Keranjang Masih Kosong, Silahkan Belanja dulu!');</script>";
    echo    "<script>location='index.php';</script>";
} else {
    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';?>
    <?php  include 'config/koneksi.php'; ?>
    <!-- <?php echo '<pre>';
    print_r($_SESSION['keranjang']);
    echo '</pre>'; ?> -->
        <h3><?= ucfirst(($_SESSION['nama'])); ?>, Berikut Isi Keranjang Belanjamu</h3><hr>
    <table class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1; ?>
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
                <td>
                    <a href="hapuskeranjang.php?id=<?= $id_produk; ?>" class="btn btn-danger" onclick="return confirm('yakin Menghapus <?= $pecah['nama_produk']; ?> dari keranjang?');"><i class="fa fa-trash"></i></a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="index.php?page=utama" class="btn btn-default">Lanjut Belanja</a>
    <a href="checkout.php" class="btn btn-success">Checkout</a>


    
<?php
}?>