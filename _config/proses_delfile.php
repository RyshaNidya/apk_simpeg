<?php 

require 'config.php';

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}

$id_file = $_GET['id'];
$data_file = (mysqli_fetch_array(mysqli_query($koneksi, "SELECT nip, id_file  FROM files WHERE id_file = '$id_file'")));

$nip = $data_file['nip'];


if ( delfile($id_file) > 0) {
    
    header("Location: ../detail_pegawai.php?id=".$nip);
    
} else {
    header("Location: ../detail_pegawai.php?id=".$nip);

}

?>