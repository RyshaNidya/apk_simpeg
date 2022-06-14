<?php
require "_config/config.php";
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'PDF VIEW'; 
    //variabel yang berfungsi mengatifkan sidebar
    $riwayat = 'riwayat';
    //variabel yang berfungsi mengatifkan sidebar
    $files = 'Files';

    // menambahkan style khusus untuk halaman ini saja
    $addstyles = '_assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css';


    // menghubungkan file header dengan file jabatan
    require_once "_template/_header.php";
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>PDF VIEW</title>
</head>
<body>

<nav aria-label="breadcrumb">
<ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">PDF VIEW </li>
</ol>
</nav>
<?php
$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$sql = "SELECT * FROM files WHERE id_file ='$id'";
$query = mysqli_query($koneksi, $sql);
$file = mysqli_fetch_array($query);
?>


<embed type="application/pdf" src="_config/img/<?php echo $file['nama_files'];?>"  width="100%" height="1000px"></embed>

</body>
</html>

<?php
    // menambahkan script khusus untuk halaman ini saja
    $addscript = '
        <script src="'.asset('_assets/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js').'"></script>
        <script>
            $(".datepicker").datepicker()
        </script>
    ';
    // menghubungkan file footer dengan file jabatan
    require_once "_template/_footer.php";
?>