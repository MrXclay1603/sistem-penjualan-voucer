<!DOCTYPE html>
<html>

<head>
    <title>Cetak Data Semua Penjualan</title>
    <link href="../Assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body onload="print()">
    <!--Menampilkan data detail arsip-->
    <?php
        include '../config/koneksi.php';
        ?>

    <div class="container">
        <div class='row'>
            <div class="col-sm-12">
                <!--dalam tabel--->
                <div class="text-center">
                   <div class="panel-body">
                    <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <label class="col-sm-12 control-label"><center><strong>BISMILLAH PONSEL</strong></center></label>
                            <p align="center">
                              Jalan Cokro Aminoto,Kisaran Timur<br>
                              Kabupaten Asahan, Sumatera Utara, Kode Pos : 21211
                            </p>
                        </thead>
                        <tbody>
                          
                        </tbody>
                    </table>
  <table id="dtskripsi" class="table table-bordered table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th width="120px">Nama Pembeli</th>
                                <th width="120px">Email Pembeli</th>
                                <th>Tanggal Pembelian</th>
                                <th>Total Pembelian</th>
                                <th>Total Barang</th>
                                <!-- <th>AKSI</th> -->
                            </tr>
                        </thead>
                        <tbody>
                            <!--ambil data dari database, dan tampilkan kedalam tabel-->
                            <?php
                            //buat sql untuk tampilan data, gunakan kata kunci select
                            // $sql = "SELECT * FROM tb_produk INNER JOIN (tb_order INNER JOIN tb_detail_order
                            //         ON tb_order.id_order=tb_detail_order.id_order)
                            //         ON tb_produk.id=tb_detail_order.id_produk order by total_bayar desc";
                            $sql = 'SELECT * FROM tb_detail_order
                                    JOIN tb_order ON tb_detail_order.id_order = tb_order.id_order
                                    JOIN tb_produk ON tb_detail_order.id_produk = tb_produk.id
                                    JOIN user ON tb_detail_order.id_user = user.id_user order by total_bayar desc';
                            // $sql="SELECT tb_detail_order.id_produk,tb_detail_order.jumlah,tb_detail_order.id_order
                            // FROM tb_detail_order
                            // JOIN tb_order
                            // ON tb_detail_order.id_produk=tb_produk.id_produk
                            // JOIN tb_order
                            // ON tb_detail_order.id_order=tb_orders.id_order";
                            $query = mysqli_query($koneksi, $sql) or die('SQL Anda Salah');

                            //Baca hasil query dari databse, gunakan perulangan untuk
                            //Menampilkan data lebh dari satu. disini akan digunakan
                            //while dan fungdi mysqli_fecth_array
                            //Membuat variabel untuk menampilkan nomor urut
                            $nomor = 0;
                            //Melakukan perulangan u/menampilkan data
                            $totalitem = 0;
                            $totaljual = 0;
                            while ($data = mysqli_fetch_array($query)) {
                                // echo   "<pre>";
                                // print_r($data);
                                // echo   "</pre>";

                                ++$nomor; //Penambahan satu untuk nilai var nomor
                                ?>
                            <td><?= $nomor; ?></td>
                            <td><?= $data['nama']; ?></td>
                            <td><?= $data['email']; ?></td>
                            <td><?= tanggal_indo($data['tgl_transaksi']); ?></td>
                            <td>Rp. <?= number_format($data['total_bayar']); ?></td>
                            <td><?= $data['total_item']; ?> Pcs</td>
                            <!-- <td>
                                <a href="?page=datavoucer&actions=detail&id=<?= $data['id']; ?>"
                                    class="btn btn-info btn-xs">
                                    <span class="fa fa-eye"></span>
                                </a>
                                <a href="?page=datavoucer&actions=edit&id=<?= $data['id']; ?>"
                                    class="btn btn-warning btn-xs">
                                    <span class="fa fa-edit"></span>
                                </a>

                                <a href="?page=datavoucer&actions=delete&id=<?= $data['id']; ?>"
                                    class="btn btn-danger btn-xs"
                                    onclick="return confirm('Yakin Hapus data <?= $data['nama_voucer']; ?>?')">
                                    <span class="fa fa-remove"></span>
                                </a>
                            </td> -->
                            </tr>
                            
                            <!--Tutup Perulangan data-->
                            <?php $totalitem += $data['total_item']; ?>
                            <?php $totaljual += $data['total_bayar']; ?>
                            <?php
                            } ?>
                            <tr>
                                <td  colspan="4">Total</td>
                                <td style="color:darkblue;background-color:lightskyblue">Rp. <strong><?= number_format($totaljual); ?></strong></td>
                                <td style="color:darkblue;background-color:lightskyblue"><strong><?= number_format($totalitem); ?> Pcs</strong></td>
                            </tr>

                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="8" class="text-right">
                                    Kisaran <?= date('d-m-Y'); ?>
                                    <br><br><br><br>
                                   <u>Bismillah Ponsel<strong></u><br>
                                     Call : 0822 - 9451 - 5100
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <?php
// FUNGSI
function tanggal_indo($tanggal, $cetak_hari = false)
{
    $hari = [1 => 'Senin',
                'Selasa',
                'Rabu',
                'Kamis',
                'Jumat',
                'Sabtu',
                'Minggu',
            ];

    $bulan = [1 => 'Januari',
                'Feb',
                'Mar',
                'Apr',
                'Mei',
                'Juni',
                'Juli',
                'Agust',
                'Sept',
                'Okt',
                'Nov',
                'Des',
            ];
    $split = explode('-', $tanggal);
    $tgl_indo = $split[2].' '.$bulan[(int) $split[1]].' '.$split[0];

    if ($cetak_hari) {
        $num = date('N', strtotime($tanggal));

        return $hari[$num].', '.$tgl_indo;
    }

    return $tgl_indo;
}?>
</body>

</html>