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
            <li style="margin-right: 10px;" class="crumba">Setting</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Contact</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Edit</li>
        </ol>
    </div>
    <div class="card">
        <form action="<?= base_url('/contact/update') ?>" method="post">
            <?= csrf_field() ?>
            <input type="hidden" name="id_ms_footer" value="<?= $contact['id_ms_footer']; ?>">
            <label for="deskripsi">Deskripsi:</label>
            <textarea class="form-control" name="deskripsi" id="deskripsi"><?= $contact['isi_footer']; ?></textarea><br>
            
            <button type="submit">Submit</button>
            <button type="button" onclick="goBack()">Kembali</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>