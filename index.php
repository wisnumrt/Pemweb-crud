<?php

include('conn.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Buku</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<?php
$query = "SELECT * FROM buku";
$result = mysqli_query(getConnection(), $query);
?>

<body>
    <?php
    //mengecek apakah proses update dan delete sukses/gagal
    if (@$_GET['status'] !== NULL) {
        $status = $_GET['status'];
        if ($status == 'ok') {
            echo '<div class="success">Sukses!, data berhasil disimpan</div>';
        } elseif ($status == 'err') {
            echo '<div class="error">ERROR!, data gagal disimpan</div>';
        }
    }
    ?>

    <h2>Data Buku</h2>
    <a href="form.php" type="button" class="button">Tambah Data</a>
    <table>
        <thead>
            <tr>
                <th>ID BUKU</th>
                <th>JUDUL</th>
                <th>PENULIS</th>
                <th>PENERBIT</th>
                <th>TAHUN TERBIT</th>
                <th>KATEGORI</th>
                <th>HALAMAN</th>
                <th>STOK</th>
                <th>BAHASA</th>
                <th>COVER</th>
                <th>HARGA</th>
                <th>AKSI</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($data = mysqli_fetch_array($result)) : ?>
                <tr>
                    <td><?php echo $data['idbuku'];  ?></td>
                    <td><?php echo $data['judul'];  ?></td>
                    <td><?php echo $data['penulis'];  ?></td>
                    <td><?php echo $data['penerbit'];  ?></td>
                    <td><?php echo $data['tahun_terbit'];  ?></td>
                    <td><?php echo $data['kategori'];  ?></td>
                    <td><?php echo $data['jumlah_hlmn'];  ?></td>
                    <td><?php echo $data['stok'];  ?></td>
                    <td><?php echo $data['bahasa'];  ?></td>
                    <td><?php echo $data['jenis_cover'];  ?></td>
                    <td><?php echo $data['harga'];  ?></td>
                    <td>
                        <a href="<?php echo "update.php?idbuku=" . $data['idbuku']; ?>">UPDATE</a>
                        <a href="<?php echo "delete.php?idbuku=" . $data['idbuku']; ?>">DELETE</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html>