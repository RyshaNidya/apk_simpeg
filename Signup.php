<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Profil Administrator'; 
    //variabel yang berfungsi mengatifkan sidebar
    $dashboard = "dashboard";

    // menghubungkan file header dengan file edit_pegawai

    require_once "_template/_header.php";
    
    //simpan data id(nip) yang dikirim dari halaman pegawai ke dalam variabel nip
    $id = $_SESSION['id_user'];

    // cari data user(administrator) menggunakan id user yang saat ini sedang login
    $result = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user='$id'");
    // hasil dari proses result akan disimpan ke variabel data
    $data = mysqli_fetch_assoc($result);

    if ( isset($_POST["signup"])) {

        if ( signup($_POST) > 0 ) {
    
            echo "<script>
                    alert('User baru telah ditambahkan!');
                    </script>";
    
            
    
        } else {
            echo mysqli_error($koneksi);
        }
    
    
    
    }

?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?= base_url('index') ?>">Dashboard</a></li>
        <li class="breadcrumb-item active" aria-current="page">Profil</li>
    </ol>
</nav>

<div class="row">
    <div class="col-3">

    </div>
    <div class="col-sm-6">
        <div class="card shadow">
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username"  placeholder="Username" required >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password"  placeholder="Password" required >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="konfpassword" class="col-sm-3 col-form-label">Konfirmasi Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="konfpassword"  placeholder="Konfirmasi Password" required >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="level" class="col-sm-3 col-form-label">Hak Akses</label>
                        <div class="col-sm-9">
                            <select name="level" class="form-control" >
                                <option value="admin">Admin</option>
                                <option value="user">User</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="signup" class="btn btn-success float-right"><i class="fas fa-sign-in-alt fa-sm fa-fw mr-2 text-gray-400"></i> Sign Up</button>
                </form>
            </div>
        </div>
    </div>
    <!-- <div class="col-sm-12 col-md-6">
        <div class="card shadow">
            <div class="card-body">
                <form action="<?= base_url('_config/proses_profil') ?>?username" method="post">
                    <div class="form-group row">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?= $data['username'] ?>" required autocomplete="off">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div> -->
</div>


<?php
    // menghubungkan file footer dengan file edit_pegawai
    require_once "_template/_footer.php";
?>