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
            <li style="margin-right: 10px;" class="crumba">Tournament</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Kategori Tournament</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Tambah</li>
        </ol>
    </div>
    <div class="card">
        <form action="<?= base_url('/tournament/kategori/simpan') ?>" method="post">
            <?= csrf_field() ?>

            <label for="nama_kategori">Kategori:</label>
            <input class="form-control" name="nama_kategori" id="nama_kategori"><br>

            <button type="submit">Submit</button>
            <button type="button" onclick="goBack()">Kembali</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>