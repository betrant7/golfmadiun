<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->group('', ['hostname' => 'localhost:8080'], function ($routes) {
    $routes->get('/', 'Frondend::index');
    $routes->get('/beritas', 'Frondend::berita');
    $routes->get('/isi_berita/(:num)', 'Frondend::isi_berita/$1');
    $routes->get('/turnament', 'Frondend::turnament');
    $routes->get('/(:num)', 'Frondend::content/$1');
    $routes->get('/gallery', 'Frondend::gallery');
    $routes->get('/isi_gallery/(:num)', 'Frondend::isi_gallery/$1');
    $routes->get('/kategoriberita/(:num)', 'Frondend::kategoriberita/$1');
    $routes->get('/kategoriberita/isi_berita/(:num)', 'Frondend::isi_berita/$1');
    $routes->get('/isi_berita/kategoriberita/(:num)', 'Frondend::kategoriberita/$1');
});

$routes->group('', ['hostname' => 'admin.localhost:8080'], function ($routes) {
    $routes->get('/logout', 'Admin\Login::logout');
    $routes->group('', ['filter' => 'noauth'], function ($routes) {
        $routes->get('/', 'Admin\Login::index');
        $routes->get('/login', 'Admin\Login::index');
        $routes->post('/loginproses', 'Admin\Login::loginProses');
    });
    $routes->group('', ['filter' => 'auth'], function ($routes) {
        $routes->get('/beranda', 'Admin\Beranda::index');
        $routes->group('/berita', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'Berita::index'); // Menampilkan daftar berita
            $routes->get('tambah', 'Berita::tambah'); // Form tambah berita
            $routes->post('simpan', 'Berita::simpan'); // Proses tambah berita
            $routes->get('status/(:num)', 'Berita::status/$1'); // Fupdate status berita
            $routes->get('edit/(:num)', 'Berita::edit/$1'); // Form edit berita
            $routes->post('update/', 'Berita::update'); // Proses update berita
            $routes->get('hapus/(:num)', 'Berita::hapus/$1'); // Proses hapus berita
        });
        $routes->group('/banners', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'Banner::index'); // Menampilkan daftar Banner
            $routes->get('tambah', 'Banner::tambah'); // Form tambah Banner
            $routes->post('simpan', 'Banner::simpan'); // Proses tambah Banner
            $routes->get('status/(:num)', 'Banner::status/$1'); // Fupdate status Banner
            $routes->get('edit/(:num)', 'Banner::edit/$1'); // Form edit Banner
            $routes->post('update/', 'Banner::update'); // Proses update Banner
            $routes->get('hapus/(:num)', 'Banner::hapus/$1'); // Proses hapus Banner
        });
        $routes->group('/foto', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'Foto::index'); // Menampilkan daftar Foto
            $routes->get('tambah', 'Foto::tambah'); // Form tambah Foto
            $routes->post('simpan', 'Foto::simpan'); // Proses tambah Foto
            $routes->get('status/(:num)', 'Foto::status/$1'); // Fupdate status Foto
            $routes->get('edit/(:num)', 'Foto::edit/$1'); // Form edit Foto
            $routes->post('update/', 'Foto::update'); // Proses update Foto
            $routes->get('hapus/(:num)', 'Foto::hapus/$1'); // Proses hapus Foto
        });
        $routes->group('/video', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'Video::index'); // Menampilkan daftar Video
            $routes->get('tambah', 'Video::tambah'); // Form tambah Video
            $routes->post('simpan', 'Video::simpan'); // Proses tambah Video
            $routes->get('status/(:num)', 'Video::status/$1'); // Fupdate status Video
            $routes->get('edit/(:num)', 'Video::edit/$1'); // Form edit Video
            $routes->post('update/', 'Video::update'); // Proses update Video
            $routes->get('hapus/(:num)', 'Video::hapus/$1'); // Proses hapus Video
        });
        $routes->group('/album', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'Album::index'); // Menampilkan daftar Album
            $routes->get('tambah', 'Album::tambah'); // Form tambah Album
            $routes->post('simpan', 'Album::simpan'); // Proses tambah Album
            $routes->get('status/(:num)', 'Album::status/$1'); // Fupdate status Album
            $routes->get('edit/(:num)', 'Album::edit/$1'); // Form edit Album
            $routes->post('update/', 'Album::update'); // Proses update Album
            $routes->get('hapus/(:num)', 'Album::hapus/$1'); // Proses hapus Album
        });
        $routes->group('/berita/kategori', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'KategoriBerita::index'); // Menampilkan daftar Kategoriberita
            $routes->get('tambah', 'KategoriBerita::tambah'); // Form tambah Kategoriberita
            $routes->post('simpan', 'KategoriBerita::simpan'); // Proses tambah Kategoriberita
            $routes->get('status/(:num)', 'KategoriBerita::status/$1'); // Fupdate status berita
            $routes->get('edit/(:num)', 'KategoriBerita::edit/$1'); // Form edit Kategoriberita
            $routes->post('update/', 'KategoriBerita::update'); // Proses update Kategoriberita
            $routes->get('hapus/(:num)', 'KategoriBerita::hapus/$1'); // Proses hapus Kategoriberita
        });
        $routes->group('/tournament', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'Tournament::index'); // Menampilkan daftar Tournament
            $routes->get('tambah', 'Tournament::tambah'); // Form tambah Tournament
            $routes->post('simpan', 'Tournament::simpan'); // Proses tambah Tournament
            $routes->get('edit/(:num)', 'Tournament::edit/$1'); // Form edit Tournament
            $routes->post('update/', 'Tournament::update'); // Proses update Tournament
            $routes->get('hapus/(:num)', 'Tournament::hapus/$1'); // Proses hapus Tournament
        });
        $routes->group('/tournament/kategori', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'KategoriTournament::index'); // Menampilkan daftar KategoriTournament
            $routes->get('tambah', 'KategoriTournament::tambah'); // Form tambah KategoriTournament
            $routes->post('simpan', 'KategoriTournament::simpan'); // Proses tambah KategoriTournament    
            $routes->get('edit/(:num)', 'KategoriTournament::edit/$1'); // Form edit KategoriTournament
            $routes->post('update/', 'KategoriTournament::update'); // Proses update KategoriTournament
            $routes->get('hapus/(:num)', 'KategoriTournament::hapus/$1'); // Proses hapus KategoriTournament
        });
        $routes->group('/contact', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'Contact::index');
            $routes->get('tambah', 'Contact::tambah');
            $routes->post('simpan', 'Contact::simpan');
            $routes->get('status/(:num)', 'Contact::status/$1');
            $routes->get('edit/(:num)', 'Contact::edit/$1');
            $routes->post('update/', 'Contact::update');
            $routes->get('detail/(:num)', 'Contact::detail/$1');
            $routes->get('hapus/(:num)', 'Contact::hapus/$1');
        });
        $routes->group('/link', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'Link::index');
            $routes->get('tambah', 'Link::tambah');
            $routes->post('simpan', 'Link::simpan');
            $routes->get('status/(:num)', 'Link::status/$1');
            $routes->get('edit/(:num)', 'Link::edit/$1');
            $routes->post('update/', 'Link::update');
            $routes->get('detail/(:num)', 'Link::detail/$1');
            $routes->get('hapus/(:num)', 'Link::hapus/$1');
        });
        $routes->group('/usermanager', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
            $routes->get('/', 'UserManager::index');
            $routes->get('tambah', 'UserManager::tambah');
            $routes->post('simpan', 'UserManager::simpan'); 
            $routes->get('status/(:num)', 'UserManager::status/$1');
            $routes->get('edit/(:num)', 'UserManager::edit/$1');
            $routes->post('update/(:num)', 'UserManager::update/$1');
            $routes->get('hapus/(:num)', 'UserManager::hapus/$1');
        });
        $routes->group('/menu', ['namespace' => 'App\Controllers\Admin'], function ($routes){
            $routes->get('/', 'Menu::index');
            $routes->get('tambah', 'Menu::tambah');
            $routes->post('simpan', 'Menu::simpan'); 
            $routes->get('status/(:num)', 'Menu::status/$1');
            $routes->get('hapus/(:num)', 'Menu::hapus/$1');
        });
        $routes->group('/content', ['namespace' => 'App\Controllers\Admin'], function ($routes){
            $routes->get('(:num)', 'Content::index/$1');
            $routes->get('tambah/(:num)', 'Content::tambah/$1');
            $routes->post('simpan', 'Content::simpan'); 
            $routes->get('edit/(:num)', 'Content::edit/$1');
            $routes->post('update/(:num)', 'Content::update/$1');
            $routes->get('status/(:num)', 'Content::status/$1');
            $routes->get('hapus/(:num)', 'Content::hapus/$1');
        });
    });
});
