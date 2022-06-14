<?php 

require 'config.php';

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

$id_jab = $_GET['id'];
$data_jab = (mysqli_fetch_array(mysqli_query($koneksi, "SELECT nip, id_jabatan  FROM jabatan WHERE id_jabatan = '$id_jab'")));

$nip = $data_jab['nip'];


if ( deljab($id_jab) > 0) {
    
    header("Location: ../detail_pegawai.php?id=".$nip);
    
} else {
    header("Location: ../detail_pegawai.php?id=".$nip);

}

?>