<?php 

require_once 'config.php';

if ( !isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}


if ( isset($_POST["signup"])) {

    if ( signup($_POST) > 0 ) {

        echo "<script>
                alert('User baru telah ditambahkan!');
                document.location.href = '../pegawai.php';
                </script>";

    } else {
        echo mysqli_error($koneksi);
    }



}


?>
