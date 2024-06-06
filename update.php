<?php

include('conn.php');

$status = '';
$result = '';
//melakukan pengecekan apakah ada variable GET yang dikirim
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['idbuku'])) {
        //query SQL
        $idToUpdate = $_GET['idbuku'];
        $query = "SELECT * FROM buku WHERE idbuku = '$idToUpdate'";

        //eksekusi query
        $result = mysqli_query(getConnection(), $query);
    }
}

//melakukan pengecekan apakah ada form yang dipost
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

    //query SQL
    $sql = "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahun_terbit='$tahun_terbit', kategori='$kategori', jumlah_hlmn='$jumlah_hlmn',
    stok='$stok', bahasa='$bahasa', jenis_cover='$jenis_cover', harga='$harga' WHERE idbuku='$idbuku'";

    //eksekusi query
    $result = mysqli_query(getConnection(), $sql);
    if ($result) {
        $status = 'ok';
    } else {
        $status = 'err';
    }

    //redirect ke halaman lain
    header('Location: index.php?status=' . $status);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Update Data Buku</title>
    <link rel="stylesheet" href="./css/style.css">
</head>

<body>

    <?php
    //menampilkan pesan sukses atau error
    if ($status == 'ok') {
        echo '<div class="success">Sukses!, data berhasil di-update</div>';
    } elseif ($status == 'err') {
        echo '<div class="error">ERROR!, data gagal di-update</div>';
    }
    ?>

    <h2>Form Update Data Buku</h2>
    <form action="update.php" method="post">
        <?php while ($data = mysqli_fetch_array($result)) : ?>
            <table>
                <tr>
                    <td>Id Buku</td>
                    <td><input type="text" name="idbuku" value="<?php echo $data['idbuku'];  ?>"></td>
                </tr>
                <tr>
                    <td>Judul</td>
                    <td><input type="text" name="judul" value="<?php echo $data['judul'];  ?>"></td>
                </tr>
                <tr>
                    <td>Penulis</td>
                    <td><input type="text" name="penulis" value="<?php echo $data['penulis'];  ?>"></td>
                </tr>
                <tr>
                    <td>Penerbit</td>
                    <td><input type="text" name="penerbit" value="<?php echo $data['penerbit'];  ?>"></td>
                </tr>
                <tr>
                    <td>Tahun Terbit</td>
                    <td><input type="text" name="tahun_terbit" value="<?php echo $data['tahun_terbit'];  ?>"></td>
                </tr>
                <tr>
                    <td>Kategori</td>
                    <td>
                        <select name="kategori" required>
                            <option value="">-- Pilih Kategori --</option>
                            <option value="Fiksi" <?php echo $data['kategori'] == 'Fiksi' ? "selected='selected'" : "" ?>>Fiksi</option>
                            <option value="Non-Fiksi" <?php echo $data['kategori'] == 'Non-Fiksi' ? "selected='selected'" : "" ?>>Non-Fiksi</option>
                            <option value="Fiksi Remaja" <?php echo $data['kategori'] == 'Fiksi Remaja' ? "selected='selected'" : "" ?>>Fiksi Remaja</option>
                            <option value="Sejarah" <?php echo $data['kategori'] == 'Sejarah' ? "selected='selected'" : "" ?>>Sejarah</option>
                            <option value="Biografi" <?php echo $data['kategori'] == 'Biografi' ? "selected='selected'" : "" ?>>Biografi</option>
                            <option value="Sastra Klasik" <?php echo $data['kategori'] == 'Sastra Klasik' ? "selected='selected'" : "" ?>>Sastra Klasik</option>
                            <option value="Fantasi" <?php echo $data['kategori'] == 'Fantasi' ? "selected='selected'" : "" ?>>Fantasi</option>
                            <option value="Misteri/Horror" <?php echo $data['kategori'] == 'Misteri/Horror' ? "selected='selected'" : "" ?>>Misteri/Horror</option>
                            <option value="Romantis" <?php echo $data['kategori'] == 'Romantis' ? "selected='selected'" : "" ?>>Romantis</option>
                            <option value="Humor" <?php echo $data['kategori'] == 'Humor' ? "selected='selected'" : "" ?>>Humor</option>
                            <option value="Pendidikan" <?php echo $data['kategori'] == 'Pendidikan' ? "selected='selected'" : "" ?>>Pendidikan</option>
                            <option value="Pengembangan Diri" <?php echo $data['kategori'] == 'Pengembangan Diri' ? "selected='selected'" : "" ?>>Pengembangan Diri</option>
                            <option value="Seni dan Musik" <?php echo $data['kategori'] == 'Seni dan Musik' ? "selected='selected'" : "" ?>>Seni dan Musik</option>
                            <option value="Bisnis dan Keuangan" <?php echo $data['kategori'] == 'Bisnis dan Keuangan' ? "selected='selected'" : "" ?>>Bisnis dan Keuangan</option>
                            <option value="Agama dan Spiritualitas" <?php echo $data['kategori'] == 'Agama dan Spiritualitas' ? "selected='selected'" : "" ?>>Agama dan Spiritualitas</option>
                            <option value="Teknologi dan Komputer" <?php echo $data['kategori'] == 'Teknologi dan Komputer' ? "selected='selected'" : "" ?>>Teknologi dan Komputer</option>
                            <option value="Petualangan" <?php echo $data['kategori'] == 'Petualangan' ? "selected='selected'" : "" ?>>Petualangan</option>
                            <option value="Kesehatan dan Kesejahteraan" <?php echo $data['kategori'] == 'Kesehatan dan Kesejahteraan' ? "selected='selected'" : "" ?>>Kesehatan dan Kesejahteraan</option>
                            <option value="Lingkungan dan Alam" <?php echo $data['kategori'] == 'Lingkungan dan Alam' ? "selected='selected'" : "" ?>>Lingkungan dan Alam</option>
                            <option value="Kuliner dan Masakan" <?php echo $data['kategori'] == 'Kuliner dan Masakan' ? "selected='selected'" : "" ?>>Kuliner dan Masakan</option>
                            <option value="Olahraga dan Rekreasi" <?php echo $data['kategori'] == 'Olahraga dan Rekreasi' ? "selected='selected'" : "" ?>>Olahraga dan Rekreasi</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>Halaman</td>
                    <td>
                        <input type="range" name="jumlah_hlmn" min="0" max="1000" value="<?php echo $data['jumlah_hlmn']; ?>" oninput="jumlah_hlmn_value.textContent = this.value">
                        <span id="jumlah_hlmn_value"><?php echo $data['jumlah_hlmn']; ?></span>
                    </td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="number" name="stok" min="0" value="<?php echo $data['stok']; ?>"></td>
                </tr>
                <tr>
                    <td>Bahasa</td>
                    <td>
                        <label><input type="checkbox" name="bahasa[]" value="Indonesia" <?php if(strpos($data['bahasa'], 'Indonesia') !== false) echo 'checked'; ?>> Indonesia</label>
                        <label><input type="checkbox" name="bahasa[]" value="Inggris" <?php if(strpos($data['bahasa'], 'Inggris') !== false) echo 'checked'; ?>> Inggris</label>
                        <label><input type="checkbox" name="bahasa[]" value="Lainnya" <?php if(strpos($data['bahasa'], 'Lainnya') !== false) echo 'checked'; ?>> Lainnya</label>
                    </td>
                </tr>
                <tr>
                    <td>Cover</td>
                    <td>
                        <label><input type="radio" name="jenis_cover" value="Softcover" <?php if($data['jenis_cover'] == 'Softcover') echo 'checked'; ?>> Softcover</label>
                        <label><input type="radio" name="jenis_cover" value="Hardcover" <?php if($data['jenis_cover'] == 'Hardcover') echo 'checked'; ?>> Hardcover</label>
                        <label><input type="radio" name="jenis_cover" value="Dakota" <?php if($data['jenis_cover'] == 'Dakota') echo 'checked'; ?>> Dakota</label>
                    </td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="number" name="harga" min="0" step="1000" value="<?php echo $data['harga']; ?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="UBAH DATA">
                    </td>
                </tr>
            </table>
        <?php endwhile; ?>
    </form>
</body>

</html>
