<?php

// atur zona waktu default ke asia/jakarta
date_default_timezone_set('Asia/Jakarta');

// aktifkan session
session_start();

// definisikan data yang akan digunakan untuk mengakses ke database ke dalam sebuah variabel
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'simpeg';
// $host = 'sql306.epizy.com';
// $user = 'epiz_31917349';
// $pass = '1X5bITBaB4dE8f';
// $db = 'epiz_31917349_simpeg';

// panggil data yang telah didefinisikan dan jalankan perintah connect database mysqli
$koneksi = mysqli_connect($host, $user, $pass, $db);

// fungsi yang digunakan untuk memanggil sebuah library
function asset($url = null)
{
    // set default url library
    $asset_url = "http://localhost/simpeg";

    // jika url yang dikirimkan meimiliki nilai
    if ($url != null) {
        // sistem akan mengarahkan ke url yang dituju
        return $asset_url . '/' . $url;
    } else {
        return $asset_url;
    }
}

// fungsi yang digunakan untuk mengarahkan halaman
function base_url($url = null)
{
    // set default url halaman
    $baseurl = "http://localhost/simpeg";

    // jika url yang dikirimkan meimiliki nilai
    if ($url != null) {
        // sistem akan mengarahkan ke url yang dituju
        return $baseurl . '/' . $url . '.php';
    } else {
        return $baseurl;
    }
}

// yang membedakan asset dan base_url adalah di ekstension file yang ada di base_url

// fungsi yang digunakan untuk mengeksekusi data yang ingin ditampilkan
function query($query)
{
    global $koneksi; //mendeklarasikan variabel koneksi mengikuti variabel yang ada diatas
    // menjalankan query sql berdasarkan parameter yang diterima dan disimpan ke dalam variabel result
    $result = mysqli_query($koneksi, $query);

    // buat variabel untuk menampung array
    $rows = [];

    // lakukan perulangan hasil data yang ada di variabel result
    while ($row = mysqli_fetch_assoc($result)) {
        // simpan semua data yang berulang kedalam array rows
        $rows[] = $row;
    }
    // kembalikan hasil data yang ada divariabel rows
    return $rows;
}

// fungsi yang digunakan untuk membuat data yang diinputkan user tersimpan kedalam database
function create($query)
{
    global $koneksi; //mendeklarasikan variabel koneksi mengikuti variabel yang ada diatas
    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
}

function update($query)
{
    global $koneksi; //mendeklarasikan variabel koneksi mengikuti variabel yang ada diatas
    $result = mysqli_query($koneksi, $query) or die(mysqli_error($koneksi));
    return $result;
}

function signup($data)
{
    global $koneksi;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string($koneksi, $data["konfpassword"]);
    $level  = mysqli_real_escape_string($koneksi, $data["level"]);

    //cek user yg sudah signup
    $hasil = mysqli_query($koneksi, "SELECT username FROM user WHERE username = '$username'");

    if (mysqli_fetch_assoc($hasil)) {
        echo "<script>
                    alert('Username sudah terdaftar!');
                </script>";

        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                    alert('Konfirmasi Password yg anda masukkan tidak sesuai!');
                </script>";

        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);


    //add user baru ke database
    mysqli_query($koneksi, "INSERT INTO user VALUES('', '$username', '$password', '$level')");

    return mysqli_affected_rows($koneksi);
}

function hapus($nip)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM pegawai WHERE nip = '$nip'");
    return mysqli_affected_rows($koneksi);
}

function delpen($id_pen)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM pendidikan WHERE id_pendidikan = '$id_pen'");
    return mysqli_affected_rows($koneksi);
}

function deljab($id_jab)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM jabatan WHERE id_jabatan = '$id_jab'");
    return mysqli_affected_rows($koneksi);
}

function delpan($id_pan)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM pangkat WHERE id_pangkat = '$id_pan'");
    return mysqli_affected_rows($koneksi);
}

function delfile($id_file)
{
    global $koneksi;
    mysqli_query($koneksi, "DELETE FROM files WHERE id_file = '$id_file'");
    return mysqli_affected_rows($koneksi);
}
