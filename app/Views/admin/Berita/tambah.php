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
            <li style="margin-right: 10px;" class="crumba">Berita</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> List Berita</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Tambah Berita</li>
        </ol>
    </div>
    <div class="card">
        <form action="<?= base_url('/berita/simpan') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label for="judul" class="form-label">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori:</label>
                <select id="kategori" name="kategori" class="form-select">
                <?php if ($kategori): ?>
                    <?php foreach ($kategori as $item): ?>
                        <option value="<?= $item['id_ms_kategori_berita'] ?>"><?= $item['nama_kategori'] ?></option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">No kategori found</option>
                <?php endif; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tgl_waktu" class="form-label">Tanggal Waktu:</label>
                <input type="datetime-local" class="form-control" id="tgl_waktu" name="tgl_waktu">
            </div>
            <div class="mb-3">
                <label for="deskripsi" class="form-label">Deskripsi:</label>
                <textarea type="text" class="form-control" id="deskripsi" name="deskripsi"></textarea>
            </div>
            <button type="submit">Submit</button>
            <button type="button" onclick="goBack()">Kembali</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>