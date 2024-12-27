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
            <li style="margin-right: 10px;" class="crumba">Content</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> <?= $menu1['nama_menu']; ?></li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Edit <?= $menu1['nama_menu']; ?></li>
        </ol>
    </div>
    <div class="card">
        <form action="<?= base_url('content/update/'. $content['id_ms_content']) ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <input type="hidden" name="id_ms_menu" value="<?= $id_ms_menu ?>">
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea class="form-control" id="deskripsi" name="deskripsi"><?= $content['isi_content'];?></textarea>
            </div>
            <button type="submit">Submit</button>
            <button type="button" onclick="goBack()">Kembali</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>