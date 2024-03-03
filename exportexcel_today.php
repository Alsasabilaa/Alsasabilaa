<?php
include "koneksi.php";
//persiapan untuk excel
header("Content-type:application/vnd-ms-excel");
header("Content-Disposition:attachment; filename=Excel Data Pengunjung.xls");
header("Pragma: no-cache");
header("Expires:0");
?>
<table border="1">
    <thead>
        <tr>
            <th colspan="6">Rekapitulasi Data Pengunjung

            </th>
        </tr>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Nama Pengunjung</th>
            <th>Alamat</th>
            <th>Tujuan</th>
            <th>No.hp Pengunjung</th>
        </tr>
    </thead>
    <tbody>
        <?php

        date_default_timezone_set('Asia/Jakarta');
        $date = date('Y-m-d');
        echo $date;
        $tampil = mysqli_query($koneksi, "SELECT * FROM tamu where Tanggal='$date'");
        $no = 1;

        while ($data = mysqli_fetch_array($tampil)) {
        ?>
            <tr>
                <td><?= $no++ ?></td>
                <td><?= $data['Tanggal'] ?></td>
                <td><?= $data['Nama'] ?></td>
                <td><?= $data['Alamat'] ?></td>
                <td><?= $data['Tujuan'] ?></td>
                <td><?= $data['no_hp'] ?></td>
            </tr>
        <?php } ?>
    </tbody>

</table>