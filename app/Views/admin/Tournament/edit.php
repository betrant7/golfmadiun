<?= $this->extend('Admin\template') ?>

<?= $this->section('title') ?>
Edit
<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="row">
    <div class="card" style="border: none;">
        <ol class="breadcrumb">
            <li style="margin-right: 10px;"><a class="crumb" href="<?php echo base_url('/beranda') ?>"><i class="bx bx-home nav_icon"></i></a></li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba">Tournament</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> List Tournament</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Edit Tournament</li>
        </ol>
    </div>
    <div class="card">
        <form action="<?= base_url('/tournament/update') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="id_ms_tournament" value="<?= $tournament['id_ms_tournament']; ?>">
            <div class="mb-3">
                <label for="judul" class="form-label">Title:</label>
                <input type="text" class="form-control" id="judul" name="judul" value="<?= $tournament['judul'] ?>">
            </div>
            <div class="mb-3">
                <label for="venue" class="form-label">Venue:</label>
                <input type="text" class="form-control" id="venue" name="venue" value="<?= $tournament['venue'] ?>">
            </div>
            <div class="mb-3">
                <label for="id_ms_kategori_tournament" class="form-label">Kategori:</label>
                <select id="id_ms_kategori_tournament" name="id_ms_kategori_tournament" class="form-select">
                <?php if ($kategori): ?>
                    <?php foreach ($kategori as $item): ?>
                        <option value="<?= $item['id_ms_kategori_tournament'] ?>"><?= $item['nama_kategori'] ?></option>
                    <?php endforeach; ?>
                <?php else: ?>
                    <option value="">No kategori found</option>
                <?php endif; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="tgl_awal" class="form-label">Start Date:</label>
                <input type="date" class="form-control" id="tgl_awal" name="tgl_awal" value="<?= $tournament['tgl_awal'] ?>">
            </div>
            <div class="mb-3">
                <label for="tgl_akhir" class="form-label">End Date:</label>
                <input type="date" class="form-control" id="tgl_akhir" name="tgl_akhir" value="<?= $tournament['tgl_akhir'] ?>">
            </div>

            <button type="submit">Submit</button>
            <button type="button" onclick="goBack()">Kembali</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>