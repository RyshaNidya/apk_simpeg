<?php 

require 'config.php';

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

$id_pen = $_GET['id'];
$data_pen = (mysqli_fetch_array(mysqli_query($koneksi, "SELECT nip, id_pendidikan  FROM pendidikan WHERE id_pendidikan = '$id_pen'")));

$nip = $data_pen['nip'];


if ( delpen($id_pen) > 0) {
    
    header("Location: ../detail_pegawai.php?id=".$nip);
    
} else {
    header("Location: ../detail_pegawai.php?id=".$nip);

}

?>