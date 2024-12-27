<?= $this->extend('Admin\template') ?>

<?= $this->section('title') ?>
Tambah
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="card" style="border: none;">
        <ol class="breadcrumb">
            <li style="margin-right: 10px;"><a class="crumb" href="<?php echo base_url('/beranda') ?>"><i class="bx bx-home nav_icon"></i></a></li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba">Gallery</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> List Foto</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Tambah</li>
        </ol>
    </div>
    <div class="card">
        <form action="<?= base_url('/foto/simpan') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="foto">Select Photo</label>
                <input type="file" class="form-control" name="foto" required>
            </div>
            <div class="form-group mt-3">
                <label for="id_ms_album">Select Album</label>
                <select class="form-select" name="id_ms_album" required>
                    <?php foreach ($album as $album): ?>
                        <option value="<?= $album['id_ms_album'] ?>"><?= $album['nama_album'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div><br>

            <button type="submit">Submit</button>
            <button type="button" onclick="goBack()">Kembali</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>