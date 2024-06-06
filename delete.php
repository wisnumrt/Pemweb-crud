<?php

include('conn.php');

$status = '';
$result = '';
//melakukan pengecekan apakah ada form yang dipost
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    if (isset($_GET['idbuku'])) {
        //query SQL
        $idToDelete = $_GET['idbuku'];
        $query = "DELETE FROM buku WHERE idbuku = '$idToDelete'";

        //eksekusi query
        $result = mysqli_query(getConnection(), $query);

        if ($result) {
            $status = 'ok';
        } else {
            $status = 'err';
        }

        header('Location: index.php?status=' . $status);
    }
}
?>
