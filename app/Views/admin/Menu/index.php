<?= $this->extend('Admin\template') ?>

<?= $this->section('title') ?>
Menu
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="card" style="border: none;">
        <ol class="breadcrumb">
            <li style="margin-right: 10px;"><a class="crumb" href="<?php echo base_url('/beranda') ?>"><i class="bx bx-home nav_icon"></i></a></li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba">Setting</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> Menu</li>
        </ol>
    </div>
    <div class="card">
        <div class="table-responsive">
            <div class="flex-box pb-1">
                <div class="col-12 mb-1 p-0">
                    <div class="col-12 mb-1 p-0">
                        <a href="<?= base_url('menu/tambah') ?>" method="post" class="btn btn-sm btn-primary"><i class="bx bx-plus-medical"></i> Tambah</a>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th>Detail</th>
                    </tr>
                </thead>
                <tbody>
                <?php if($menu):  ?>
                    <?php $no = 0; ?>
                    <?php foreach($menu as $item): ?>
                        <tr>
                            <td><?= $no += 1; ?></td>
                            <td><?= $item['nama_menu']; ?></td>
                            <td class="col-1" style="display: flexbox; text-align: center;">
                                <a href="/menu/status/<?= $item['id_ms_menu']; ?>" class="btn btn-info"><?= ($item['aktif'] == '1') ? 'aktif' : 'non aktif' ?></a>                                
                            </td>
                            <td class="col-1" style="display: flexbox; text-align: center;">
                                <a href="/menu/hapus/<?= $item['id_ms_menu']; ?>" class="btn btn-danger" data-toggle="tooltip" data-placement="top" title="Hapus" id="hapus"><i class="bx bx-trash"></i></a>
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