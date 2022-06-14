<?php

require "config.php";

$nip = mysqli_real_escape_string($koneksi, $_POST['nip']);

if (addfile($_POST) > 0){
    echo '<script>
            alert("File Berhasil Ditambah")
            window.location = "'.base_url('detail_pegawai').'?id='.$nip.'";
            </script>';                     
        }
        else{
            echo '<script>
            alert("File Gagal Ditambah")
            window.location = "'.base_url('detail_pegawai').'?id='.$nip.'";
            </script>';  
    }

function addfile($data){
    global $koneksi;

    $nip = htmlspecialchars($data["nip"]);
    $file = upload();
    if (!$file){
        return false;
    }
    $keterangan = htmlspecialchars($data["keterangan"]);

    //query insert data
    $query = "INSERT INTO files VALUES ('', '$nip', '$file', '$keterangan')";
    mysqli_query($koneksi, $query);

    //cek berhasil
    return mysqli_affected_rows($koneksi);
}

function upload(){
    
    global $koneksi;

    $namaFile = $_FILES['file']['name'];
    $ukuranFile = $_FILES['file']['size'];
    $eror = $_FILES['file']['error'];
    $tmpName =  $_FILES['file']['tmp_name'];

    //cek apkah gambar di upload/not
    if ( $eror === 4){
        echo "
                <script>
                alert('Tidak ada file yg diupload, Silahkan Mengupload File!');
                </script>
        ";
        return false;
    }

    //cek apakah yg di upload file
        // $eksvalid = ['pdf', 'png', 'jpg'];
        // $eksgambar = explode(".", $namaFile);
        // $eksgambar = strtolower(end($eksgambar));

        // !in_array($eksgambar, $eksvalid)
        $tipe_file = $_FILES['file']['type'];
        
        if (!$tipe_file == "application/pdf" ){
        echo "
                <script>
                alert('File yang Anda masukkan tidak sesuai ketentuan, File harus berupa pdf!');
                </script>
        ";
        echo "
                <script>
                alert('Silahkan upload ulang berkas anda!');
                </script>
        ";
        return false;
        }

     //batas ukuran file gambar
        if ( $ukuranFile > 20000000) {
        echo "
            <script>
            alert('Ukuran file melebihi batas maximum!');
            </script>
        ";
        return false;

    }
         //gambar berhasil di upload
        //generatenama baru
        // $namafilebaru = uniqid();
        // $namafilebaru .= ".";
        // $namafilebaru .= $eksgambar;

        
        move_uploaded_file($tmpName, 'img/'.$namaFile);

        return $namaFile;
        
}




?>