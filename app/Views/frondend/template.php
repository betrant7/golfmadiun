<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>PGI Madiun | Persatuan Golf Indonesia</title>
    <link rel="icon" href="/img/logo.png">
    <script src="https://kit.fontawesome.com/7126d06a5c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/template/css/wa.css">
    <link rel="stylesheet" href="/template/css/styles.css">
</head>

<body>
    <!-- Content Header -->
    <div class="navbar-atas">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h3>Persatuan Golf Indonesia<br><small>Cabang Madiun</small></h3>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar" style="padding: 0; border-top: 2px solid #FC0000; border-bottom: 1px solid #fff;"></nav>
    <nav class="navbar navbar-expand-lg" style="padding: 0; border-top: 1px solid #FC0000;">
        <div class="container-fluid navbar-bawah">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/beritas">Berita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/turnament">Tournament</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/gallery">Gallery</a>
                    </li>
                    <?php foreach ($menu as $item): ?>
                        <?php if ($item['aktif'] == 1): ?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= '/' . $item['id_ms_menu'] ?> "><?= $item['nama_menu']; ?></a>
                            </li>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </ul>
                <form class="d-flex" role="search">
                    <div class="input-group">
                        <input type="text" name="keyword_berita" class="form-control" placeholder="Pencarian" aria-label="Pencarian" aria-describedby="basic-addon2">
                        <button class="btn btn-danger my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                    </div>
                </form>
            </div>
        </div>
    </nav>

    <img src="/img/logo.png" class="navbar-hide-on-medium logo-center">


    <?= $this->renderSection('content'); ?>

    <!-- Conntent Footer -->
    <section>
        <div class="bg-footer py-4" style="padding: 0;">
            <div class="container footer-bawah">
                <div class="row">
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="row">
                            <div class="col-auto">
                                <h3 class="text-footer" style="color: white;"><i class="fa fa-map"></i> &nbsp;Contact Us</h3>
                            </div>
                            <br>
                            <div class="row" style="height: 80%;">
                                <div class="col-md-12 mb-3 mb-md-0">
                                    <div class="card h-100" style="background-color: transparent;  border: none; color: white;">
                                        <?php foreach ($contact as $item): ?>
                                            <?php if ($item['aktif'] == 1): ?>
                                                <?= $item['isi_footer']; ?>
                                            <?php endif; ?>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="row">
                            <div class="col-auto">
                                <h3 class="text-footer" style="color: white;"><i class="fa fa-video"></i> &nbsp;Video</h3>
                            </div>
                            <div class="col">
                            </div>
                        </div>
                        <br>
                        <div class="row" style="height: 80%;">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <div class="card h-100" style="background-color: transparent; border: none;">
                                    <iframe src="https://www.youtube.com/embed/jKqlDPr2H8U?wmode=transparent" allowfullscreen="" frameborder="0" style=" width: 100%;height:100%;"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 mb-4">
                        <div class="row">
                            <div class="col-auto">
                                <h3 class="text-footer" style="color: white;"><i class="fa fa-link"></i> &nbsp;Link</h3>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12 mb-3 mb-md-0">
                                <?php foreach ($link as $item): ?>
                                    <ul class="list-group list-group-flush font-roboto">
                                        <li class="list-group-item" style="background: none; border-bottom:none;">
                                            <div class="row">
                                                <div class="col-1">
                                                    <i class="fa fa-caret-right" style="color: #fff;"></i>
                                                </div>
                                                <div class="col-11">
                                                    <a class="footer-link" target="_blank" href="<?= $item['isi_link']; ?>"><?= $item['nama_link']; ?></a>
                                                </div>
                                            </div>
                                        </li>
                                        <span style="border-bottom: 2px dashed #fff;">
                                    </ul>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <footer class="small text-white font-roboto">
        <div class="container bawah">
            <div class="row">
                <div class="col">
                    <span>Copyright © 2024 by <b>PGI Madiun | Persatuan Golf Indonesia Cabang Madiun</b>.</span>
                </div>
                <div class="col" style="text-align: end;">
                    <a title="Kembali ke Atas" class="btn btn-sm float-right btn-footer btn-flat" href="#top"><i class="fa fa-angle-up"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <a href="#" class="float2" id="menu-share2">
        <i class="fa fa-whatsapp"></i>
    </a>
    <ul class="menu-chat2">
        <li title="WA" onclick="window.open('whatsapp:send?phone=085939175210');">
            <a href="#" id="menu-user-chat">
                <span class="my-float3">sekretariat</span>
            </a>
        </li>
    </ul>

</body>

</html>