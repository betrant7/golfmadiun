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
            <li style="margin-right: 10px;" class="crumba"> Kategori Gallery</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Edit</li>
        </ol>
    </div>
    <div class="card">
        <form action="<?= base_url('/album/update') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="id_ms_album" value="<?= $album['id_ms_album']; ?>">
            <label for="nama_album">Nama Album:</label>
            <input type="text" class="form-control" id="nama_album" name="nama_album" value="<?= $album['nama_album'] ?>" required><br>
            
            <button type="submit">Submit</button>
            <button type="button" onclick="goBack()">Kembali</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>