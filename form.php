<?php

include('conn.php');

$status = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idbuku = $_POST['idbuku'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $kategori = $_POST['kategori'];
    $jumlah_hlmn = $_POST['jumlah_hlmn'];
    $stok = $_POST['stok'];
    $bahasa = implode(", ", $_POST['bahasa']); 
    $jenis_cover = $_POST['jenis_cover'];
    $harga = $_POST['harga'];

    // SQL
    $query = "INSERT INTO buku (idbuku, judul, penulis, penerbit, tahun_terbit, kategori, jumlah_hlmn, stok, bahasa, jenis_cover, harga) VALUES 
    ('$idbuku', '$judul', '$penulis', '$penerbit', '$tahun_terbit', '$kategori', '$jumlah_hlmn', '$stok', '$bahasa', '$jenis_cover', '$harga')";


    $result = mysqli_query(getConnection(), $query);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    header('Location: index.php?status=' . $status);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Data Buku</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>
    <?php
    if ($status == 'ok') {
        echo '<div class="success">SUKSES!, data berhasil disimpan</div>';
    } elseif ($status == 'err') {
        echo '<div class="error">ERROR!, data gagal disimpan</div>';
    }
    ?>

    <h2>Form Data Buku</h2>
    <form action="form.php" method="post">
        <table>
            <tr>
                <td>ID Buku</td>
                <td><input type="text" name="idbuku"></td>
            </tr>
            <tr>
                <td>Judul</td>
                <td><input type="text" name="judul"></td>
            </tr>
            <tr>
                <td>Penulis</td>
                <td><input type="text" name="penulis"></td>
            </tr>
            <tr>
                <td>Penerbit</td>
                <td><input type="text" name="penerbit"></td>
            </tr>
            <tr>
                <td>Tahun Terbit</td>
                <td><input type="text" name="tahun_terbit"></td>
            </tr>
            <tr>
                <td>Kategori</td>
                <td>
                    <select name="kategori" required>
                        <option value="">-- Pilih Kategori --</option>
                        <option value="Fiksi">Fiksi</option>
                        <option value="Non-Fiksi">Non-Fiksi</option>
                        <option value="Fiksi Remaja">Fiksi Remaja</option>
                        <option value="Sejarah">Sejarah</option>
                        <option value="Biografi">Biografi</option>
                        <option value="Sastra Klasik">Sastra Klasik</option>
                        <option value="Fantasi">Fantasi</option>
                        <option value="Misteri/Horror">Misteri/Horror</option>
                        <option value="Romantis">Romantis</option>
                        <option value="Humor">Humor</option>
                        <option value="Pendidikan">Pendidikan</option>
                        <option value="Pengembangan Diri">Pengembangan Diri</option>
                        <option value="Seni dan Musik">Seni dan Musik</option>
                        <option value="Bisnis dan Keuangan">Bisnis dan Keuangan</option>
                        <option value="Agama dan Spiritualitas">Agama dan Spiritualitas</option>
                        <option value="Teknologi dan Komputer">Teknologi dan Komputer</option>
                        <option value="Petualangan">Petualangan</option>
                        <option value="Kesehatan dan Kesejahteraan">Kesehatan dan Kesejahteraan</option>
                        <option value="Lingkungan dan Alam">Lingkungan dan Alam</option>
                        <option value="Kuliner dan Masakan">Kuliner dan Masakan</option>
                        <option value="Olahraga dan Rekreasi">Olahraga dan Rekreasi</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Halaman</td>
                <td>
                    <input type="number" name="jumlah_hlmn" min="0" max="1000">
                </td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="number" name="stok" min="0"></td>
            </tr>
            <tr>
                <td>Bahasa</td>
                <td>
                    <label><input type="checkbox" name="bahasa[]" value="Indonesia"> Indonesia</label>
                    <label><input type="checkbox" name="bahasa[]" value="Inggris"> Inggris</label>
                    <label><input type="checkbox" name="bahasa[]" value="Lainnya"> Lainnya</label>
                </td>
            </tr>
            <tr>
                <td>Cover</td>
                <td>
                    <label><input type="radio" name="jenis_cover" value="Softcover" checked> Softcover<label>
                    <label><input type="radio" name="jenis_cover" value="Hardcover"> Hardcover<label>
                    <label><input type="radio" name="jenis_cover" value="Dakota"> Dakota<label>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="number" name="harga" min="0" step="1000"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="SIMPAN">
                    <input type="reset" value="RESET">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>