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
            <li style="margin-right: 10px;" class="crumba">Setting</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> User Manager</li>
            <li style="margin-right: 10px;" class="crumba"> > </li>
            <li style="margin-right: 10px;" class="crumba"> <?= isset($user) ? 'Edit' : 'Tambah' ?></li>
        </ol>
    </div>
    <div class="card">
        <form action="<?= isset($user) ? base_url('/usermanager/edit/') . $user['id_ms_user_manager'] : base_url('/usermanager/simpan') ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            <div class="mb-3">
                <label class="form-label" for="username">Username:</label>
                <input type="text" class="form-control" name="username" value="<?= isset($user) ? $user['username'] : '' ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="password">Password:</label>
                <input type="password" class="form-control" name="password" <?= isset($user) ? '' : 'required' ?>>
            </div>
            <div class="row mb-3" style="margin-left: 0;">
                <div class="col-8" style="padding-left: 0;">
                    <label class="form-label" for="role">Role:</label>
                    <select class="form-select" name="role" required>
                        <option value="admin" <?= isset($user) && $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="user" <?= isset($user) && $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                    </select>
                </div>
                <div class="col-4" style="text-align: center;">
                    <label class="form-label" for="aktif">Active:</label><br>
                    <input type="checkbox" name="aktif" value="1" <?= isset($user) && $user['aktif'] == 1 ? 'checked' : '' ?>>
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label" for="nama">Name:</label>
                <input class="form-control" type="text" name="nama" value="<?= isset($user) ? $user['nama'] : '' ?>" required>
            </div>

            <button type="submit">Submit</button>
            <button type="button" onclick="goBack()">Kembali</button>
        </form>
    </div>
</div>
<?= $this->endSection() ?>