<?= $this->extend('Admin\template') ?>

<?= $this->section('title') ?>
Tournament
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
        </ol>
    </div>
    <div class="card">
        <div class="table-responsive">
            <div class="flex-box pb-1">
                <div class="col-12 mb-1 p-0">
                    <div class="col-12 mb-1 p-0">
                        <a href="<?= base_url('tournament/tambah') ?>" method="post" class="btn btn-sm btn-primary"><i class="bx bx-plus-medical"></i> Tambah</a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Nama Kategori</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Venue</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                <?php if ($tournaments): ?>
                    <?php $no = 0 ?>
                    <?php foreach ($tournaments as $item) : ?>
                        <tr>
                            <td><?= $no += 1; ?></td>
                            <td><?= esc($item['judul']) ?></td>
                            <td><?= esc($item['nama_kategori']) ?></td>
                            <td><?= esc($item['tgl_awal']) ?></td>
                            <td><?= esc($item['tgl_akhir']) ?></td>
                            <td><?= esc($item['venue']) ?></td>
                            <td class="col-2" style="display: flexbox; text-align: center;">
                                <a href="/tournament/edit/<?= $item['id_ms_tournament'] ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Update"><i class="bx bx-edit"></i></a>
                                <a href="/tournament/hapus/<?= $item['id_ms_tournament'] ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" id="hapus"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>