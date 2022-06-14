<?php
    //variabel yang berfungsi menyimpan detail dari sub judul website
    $nama = 'Berkas File'; 
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
    <title>Berkas dan File</title>
</head>
<body>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item active" aria-current="page">Berkas Dosir</li>
  </ol>
</nav>

<div class="card mb-4">
    <div class="card-body">
        <form method="POST" enctype="multipart/form-data" action="<?= base_url('_config/proses_files') ?>?add">
            <div class="form-group row">
                <label for="nip" class="col-sm-3 col-form-label">Pilih Pegawai</label>
                <div class="col-sm-9">
                    <select class="form-control" name="nip" id="nip" required autocomplete="off" autofocus>
                        <?php
                            $data_pegawai=query("SELECT * FROM pegawai GROUP BY nama_pegawai asc");
                            foreach ($data_pegawai as $pegawai) : ?>
                                <option value="<?= $pegawai['nip'] ?>"><?= $pegawai['nama_pegawai'].' - '.$pegawai['nip'] ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <label for="file" class="col-sm-3 col-form-label">File</label>
                <div class="col-sm-9">
                    <input type="file" class="form-control" name="file" id="file" placeholder="file" required autocomplete="off">
                </div>
            </div>
            <div class="form-group row">
                <label for="keterangan" class="col-sm-3 col-form-label">Keterangan Surat</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Keterangan Surat" required autocomplete="off">
                </div>
            </div>

        <!-- disini tanda tempat form -->
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-success float-right"><i class="fas fa-fw fa-save"></i> Simpan</button>
    </div>
    </form>
</div>
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