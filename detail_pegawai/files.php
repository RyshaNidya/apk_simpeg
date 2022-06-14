<?php
$data_files = query("SELECT * FROM files WHERE nip = '$nip'");

?>
<div class="table-responsive mt-3">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>File</th>
                <th>Keterangan File</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach ($data_files as $file) :
                    $viewfile = "view.php?id=".$file['id_file'];
            ?>
                <tr>
                    <td>
                        <a href="<?= $viewfile ?>"><?= ucwords($file['nama_files']) ?></a>
                    </td>
                    <td><?= ucwords($file['keterangan']) ?></td>
                    <td>
                        <a href="<?= base_url('_config/proses_delfile') ?>?id=<?= $file['id_file'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin Menghapus Data?')" ><i class="fas fa-trash"></i> Hapus</a>

                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="<?= base_url('files') ?>" class="btn btn-info btn-sm " ><i class="fa fa-plus"></i>  Tambah</a>

</div>