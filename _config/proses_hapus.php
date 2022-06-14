<?php 

require 'config.php';

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}



$id = $_GET["id"];

if ( hapus($id) > 0) {
    echo "
    <script>
        alert('Berhasil Menghapus Data');
        document.location.href = '../pegawai.php';
    </script>  
    ";

} else {
    echo "
    <script>
        alert('Gagal Menghapus Data');
        document.location.href = '../pegawai.php';
    </script>  
    ";
}

?>