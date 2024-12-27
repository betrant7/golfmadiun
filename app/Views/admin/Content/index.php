<?= $this->extend('Admin\template') ?>

<?= $this->section('title') ?>
Kategori Content
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
        </ol>
    </div>
    <div class="card">
        <div class="table-responsive">
            <div class="flex-box pb-1">
                <div class="col-12 mb-1 p-0">
                    <div class="col-12 mb-1 p-0">
                        <a href="<?= base_url('content/tambah/' . $menu1['id_ms_menu']) ?>" method="post" class="btn btn-sm btn-primary"><i class="bx bx-plus-medical"></i> Tambah</a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>isi Kontent</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                <?php $no = 0 ?>
                    <?php foreach ($content as $item): ?>
                        <tr>
                            <td><?= $no += 1?></td>
                            <td><?= $item['isi_content']; ?></td>
                            <td class="col-3" style="display: flexbox; text-align: center;">
                                <a href="/content/edit/<?= $item['id_ms_content']; ?>" class="btn btn-warning" data-toggle="tooltip" data-placement="top" title="Update"><i class="bx bx-edit"></i></a>
                                <a href="/content/hapus/<?= $item['id_ms_content']; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" id="hapus"><i class="bx bx-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?= $this->endSection() ?>