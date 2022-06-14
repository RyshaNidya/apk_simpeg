<?php 

require 'config.php';

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

$id_pan = $_GET['id'];
$data_pan = (mysqli_fetch_array(mysqli_query($koneksi, "SELECT nip, id_pangkat  FROM pangkat WHERE id_pangkat = '$id_pan'")));

$nip = $data_pan['nip'];


if ( delpan($id_pan) > 0) {
    
    header("Location: ../detail_pegawai.php?id=".$nip);
    
} else {
    header("Location: ../detail_pegawai.php?id=".$nip);

}

?>