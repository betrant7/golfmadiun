<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | PGI Madiun</title>
    <link rel="icon" href="/img/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <link rel="stylesheet" href="/template/css/adminstyles.css">
</head>
<body id="body-pd">
    <header class="header" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
        <div class="header_img"> <img src="/img/avatar5.png" alt=""> </div>
    </header>
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div class="top-half">
                <a href="<?php echo base_url('/beranda') ?>" class="nav_logo">
                    <img src="/img/logo.png" alt="Logo" class="nav_logo-icon" style="width: 28px; height: 35px;">
                    <span class="nav_logo-name">PGI MADIUN</span>
                </a>
            </div>
            <div class="bottom-half">
                <ul class="nav_list">
                    <li class="nav-item <?= uri_string() == 'beranda' ? 'active' : '' ?>">
                        <a href="<?php echo base_url('/beranda'); ?>" class="nav-link">
                            <i class="bx bx-home nav_icon" data-toggle="tooltip" data-placement="top" title="Dashboard"></i>
                            <span class="nav_name">Dashboard</span>
                        </a>
                    </li>
                    <li class="dropdown <?= in_array(uri_string(), ['tournament/kategori', 'tournament']) ? 'active' : '' ?>">
                        <a href="#" class="nav_link" onclick="toggleDropdown(event)">
                            <i class="bx bx-trophy nav_icon" data-toggle="tooltip" data-placement="top" title="Turnament"></i>
                            <span class="nav_name">Turnament</span>
                            <i class="bx bx-chevron-down dropdown_icon"></i>
                        </a>
                        <ul class="dropdown_menu">
                            <li class="<?= uri_string() == 'tournament/kategori' ? 'active' : '' ?>"><a href="<?php echo base_url('/tournament/kategori') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Kategori Turnament"></i> Kat. Turnament</a></li>
                            <li class="mb-4 <?= uri_string() == 'tournament' ? 'active' : '' ?>"><a href="<?php echo base_url('/tournament') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="List Turnament"></i> List Turnament</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?= in_array(uri_string(), ['berita/kategori', 'berita']) ? 'active' : '' ?>">
                        <a href="#" class="nav_link" onclick="toggleDropdown(event)">
                            <i class="bx bx-receipt nav_icon" data-toggle="tooltip" data-placement="top" title="Berita"></i>
                            <span class="nav_name">Berita</span>
                            <i class="bx bx-chevron-down dropdown_icon"></i>
                        </a>
                        <ul class="dropdown_menu">
                            <li class="<?= uri_string() == 'berita/kategori' ? 'active' : '' ?>"><a href="<?php echo base_url('/berita/kategori') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Kategori Berita"></i> Kategori Berita</a></li>
                            <li class="mb-4 <?= uri_string() == 'berita' ? 'active' : '' ?>"><a href="<?php echo base_url('/berita') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="List Berita"></i> List Berita</a></li>
                        </ul>
                    </li>
                    <li class="dropdown <?= in_array(uri_string(), ['album', 'foto', 'video']) ? 'active' : '' ?>">
                        <a href="#" class="nav_link" onclick="toggleDropdown(event)">
                            <i class="bx bx-image-alt nav_icon" data-toggle="tooltip" data-placement="top" title="Gallery"></i>
                            <span class="nav_name">Gallery</span>
                            <i class="bx bx-chevron-down dropdown_icon"></i>
                        </a>
                        <ul class="dropdown_menu">
                            <li class="<?= uri_string() == 'album' ? 'active' : '' ?>"><a href="<?php echo base_url('/album') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Kategori Gallery"></i> Kategori Galery</a></li>
                            <li class="<?= uri_string() == 'foto' ? 'active' : '' ?>"><a href="<?php echo base_url('/foto') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Foto"></i> Foto</a></li>
                            <li class="mb-4 <?= uri_string() == 'video' ? 'active' : '' ?>"><a href="<?php echo base_url('/video') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Video"></i> Video</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav_link" onclick="toggleDropdown(event)">
                            <i class="bx bx-book-content nav_icon" data-toggle="tooltip" data-placement="top" title="Content"></i>
                            <span class="nav_name">Content</span>
                            <i class="bx bx-chevron-down dropdown_icon"></i>
                        </a>
                        <ul class="dropdown_menu">
                            <?php foreach($menu as $index => $item): ?>
                                <?php if ($item['aktif'] == 1): ?>
                                <li class="<?= ($index === count($menu) - 1) ? 'mb-4' : '' ?>">
                                    <a href="<?php echo base_url('content/' . $item['id_ms_menu']) ?>" class="dropdown_item dropdown_item">
                                        <i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="<?= $item['nama_menu']; ?>"></i> <?= $item['nama_menu']; ?>
                                    </a>
                                </li>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </ul>
                    </li>
                    <li class="dropdown <?= in_array(uri_string(), ['menu', 'usermanager', 'banners', 'contact', 'link']) ? 'active' : '' ?>">
                        <a href="#" class="nav_link" onclick="toggleDropdown(event)">
                            <i class="bx bx-cog nav_icon" data-toggle="tooltip" data-placement="top" title="Setting"></i>
                            <span class="nav_name">Setting</span>
                            <i class="bx bx-chevron-down dropdown_icon"></i>
                        </a>
                        <ul class="dropdown_menu">
                            <li class="<?= uri_string() == 'menu' ? 'active' : '' ?>"><a href="<?php echo base_url('/menu') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Menu"></i> Menu</a></li>                            
                            <li class="<?= uri_string() == 'usermanager' ? 'active' : '' ?>"><a href="<?php echo base_url('/usermanager') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="User Manager"></i> User Manager</a></li>                            
                            <li class="<?= uri_string() == 'banners' ? 'active' : '' ?>"><a href="<?php echo base_url('/banners') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Banner"></i> Banner</a></li>
                            <li class="<?= uri_string() == 'contact' ? 'active' : '' ?>"><a href="<?php echo base_url('/contact') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Contact"></i> Contact</a></li>
                            <li class="<?= uri_string() == 'link' ? 'active' : '' ?>"><a href="<?php echo base_url('/link') ?>" class="dropdown_item"><i class="bx bx-circle menu_icon" data-toggle="tooltip" data-placement="top" title="Link"></i> Link</a></li>
                        </ul>
                    </li>
                </ul>
                <a href="<?php echo base_url('/logout') ?>" class="nav-link">
                    <i class='bx bx-log-out nav_icon' data-toggle="tooltip" data-placement="top" title="Logout"></i>
                    <span class="nav_name">Logout</span>
                </a>
            </div>
        </nav>
    </div>
    <div class="content">
        <?= $this->renderSection('content'); ?>
    </div>


    <script src="/template/js/java.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
    <script src="<?php echo base_url('/ckeditor/ckeditor.js') ?>"></script>
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>
    <script>
        function goBack() {
            window.history.back();
        }
    </script>
</body>
</html>