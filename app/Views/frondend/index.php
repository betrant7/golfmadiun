    <?= $this->extend('frondend/template'); ?>


    <?= $this->Section('content'); ?>
    <section>
        <div class="container center">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
                <div class="carousel-indicators">
                    <?php foreach ($banner as $index => $item): ?>
                        <?php if ($item['aktif'] == 1): ?>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?= $index ?>" class="<?= ($index == 0) ? 'active' : '' ?>" aria-current="<?= ($index == 0) ? 'true' : 'false' ?>" aria-label="Slide <?= $index + 1 ?>"></button>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <div class="carousel-inner">
                    <?php foreach ($banner as $index => $item): ?>
                        <?php if ($item['aktif'] == 1): ?>
                            <div class="carousel-item <?= ($index == 0) ? 'active' : '' ?>">
                                <img src="<?= base_url('/uploads/banner/') . $item['banner'] ?>" class="d-block w-100" alt="">
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div style="margin-top: 2.5rem !important; margin-bottom: 2.5rem !important;">
                <div class="row">
                    <div class="col-lg-8">
                        <?php foreach ($beritas as $berita): ?>
                            <?php if ($berita['aktif'] == 1): ?>
                                <div class="card" style="border: none; border-radius: 0;">
                                    <div class="card-body px-0 pt-0">
                                        <div class="card-body px-0 pt-0">
                                            <h5 class="card-title mb-0 berita"><a href="<?= 'isi_berita/' . $berita['id_ms_berita'] ?>"><?= $berita['judul'] ?></a></h5>
                                            <p class="card-text" style="color: #EE002D; font-weight: 700; text-transform: uppercase;"><?= $berita['tgl_waktu']; ?></p>

                                            <img src="<?= $berita['thumbnail']; ?>" class="card-img-top" style="height: 20rem; object-fit: cover;">
                                            <p class="card-text mt-2"><?= substr($berita['deskripsi'], 0, 250); ?>...
                                                <span style="color: #EE002D; font-weight: bold; text-transform: uppercase; font-family: 'Oswald', sans-serif;"><a href="<?= 'isi_berita/' . $berita['id_ms_berita'] ?>">Selengkapnya</a></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-lg-4">
                        <div class="card" style="border: none; border-radius: 0;">
                            <div style="position: relative; z-index: 1; margin-bottom: 10px; border-bottom: 1px solid #d0d5d8;">
                                <h6 style="font-size: 16px; margin-bottom: 0; line-height: 45px; height: 45px; min-width: 140px; padding: 0 30px; background-color: #ee002d; color: #fff; font-weight: 700; display: inline-block; text-align: center;">Kategori Berita</h6>
                            </div>
                            <div class="list-group mb-4">
                                <?php foreach ($kategori as $item): ?>
                                    <?php if ($item['aktif'] == 1): ?>
                                    <a href="<?= 'kategoriberita/'.$item['id_ms_kategori_berita'] ?>" class="list-group-item list-group-item-action"><?= $item['nama_kategori']; ?></a>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                            <?php setlocale(LC_TIME, 'id_ID.utf8'); // Atur locale ke Bahasa Indonesia ?>

                            <?php foreach ($beritas as $berita): ?>
                                <?php if ($item['aktif'] == 1): ?>
                                <div class="row mt-3">
                                    <div class="col-auto mb-2" style="padding-right: 0;">
                                        <a href="<?= 'isi_berita/' . $berita['id_ms_berita'] ?>"><img src="<?= $berita['thumbnail'] ?>" alt="" width="75px" height="75px"></a>
                                    </div>
                                    <div class="col mb-2">
                                        <a class="berita-kanan" href="<?= 'isi_berita/' . $berita['id_ms_berita'] ?>"><?= $berita['judul']; ?></a><br>
                                        <h6><?php 
                                            echo strftime('%d %B %Y', strtotime($berita['tgl_waktu']));
                                        ?></h6>
                                    </div>
                                </div>
                                <hr>
                                <?php endif; ?>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?= $this->endSection(''); ?>