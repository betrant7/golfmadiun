<?php

namespace App\Controllers;

use App\Models\AlbumModel;
use App\Models\BeritaModel;
use App\Models\ContactModel;
use App\Models\ContentModel;
use App\Models\FotoModel;
use App\Models\KategoriBeritaModel;
use App\Models\KategoriTournamentModel;
use App\Models\LinkModel;
use App\Models\BannerModel;
use App\Models\MenuModel;
use App\Models\TournamentModel;
use App\Models\VideoModel;

class Frondend extends BaseController
{
    protected $contact;
    protected $content;
    protected $album;
    protected $foto;
    protected $video;
    protected $banner;
    protected $link;
    protected $kategoriBerita;
    protected $turnament;
    protected $kategoriTurnament;
    protected $berita;
    protected $menu;
    public function __construct()
    {
        $this->content = new ContentModel();
        $this->foto = new FotoModel();
        $this->menu = new MenuModel();
        $this->video = new VideoModel();
        $this->album = new AlbumModel();
        $this->banner = new BannerModel();
        $this->contact = new ContactModel();
        $this->link = new LinkModel();
        $this->kategoriBerita = new KategoriBeritaModel();
        $this->berita = new BeritaModel();
        $this->kategoriTurnament = new KategoriTournamentModel();
        $this->turnament = new TournamentModel();
    }
    public function index()
    {
        $beritas = $this->berita->findAll();

        foreach ($beritas as &$berita) {
            $berita['thumbnail'] = $this->berita->extractThumbnail($berita['deskripsi']);
            $berita['snippet'] = $this->berita->extractSnippet($berita['deskripsi']);
        }

        $data = [
            'beritas' => $beritas,
            'menu' => $this->menu->findAll(),
            'banner' => $this->banner->findAll(),
            'contact' => $this->contact->findAll(),
            'link' => $this->link->findAll(),
            'kategori' => $this->kategoriBerita->findAll(),
        ];
        return view('frondend/index', $data);
    }

    public function turnament()
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'contact' => $this->contact->findAll(),
            'link' => $this->link->findAll(),
            'kategori' => $this->kategoriTurnament->findAll(),
            'tournament' =>$this->turnament->findAll()
        ];
        return view('frondend/turnament', $data);
    }

    public function content($id_ms_menu = null)
    {
        $data = [
            'menu' => $this->menu->where('aktif', 1)->findAll(),
            'menu1' => $this->menu->where('id_ms_menu', $id_ms_menu)->findAll(),
            'content' => $this->content->where('id_ms_menu', $id_ms_menu)->findAll(),
            'contact' => $this->contact->findAll(),
            'link' => $this->link->findAll()
        ];
        return view('frondend/content', $data);
    }

    public function gallery()
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'album' => $this->album->findAll(),
            'contact' => $this->contact->findAll(),
            'link' => $this->link->findAll()
        ];
        return view('frondend/gallery', $data);
    }

    public function isi_gallery($id_ms_album)
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'album' => $this->album->find($id_ms_album),
            'albums' => $this->album->findAll(),
            'foto' => $this->foto->where('id_ms_album', $id_ms_album)->findAll(),
            'video' => $this->video->where('id_ms_album', $id_ms_album)->findAll(),
            'contact' => $this->contact->findAll(),
            'link' => $this->link->findAll()
        ];
        return view('frondend/isi_gallery', $data);
    }

    public function berita()
    {
        $beritas = $this->berita->findAll();

        foreach ($beritas as &$berita) {
            $berita['thumbnail'] = $this->berita->extractThumbnail($berita['deskripsi']);
            $berita['snippet'] = $this->berita->extractSnippet($berita['deskripsi']);
        }

        $data = [
            'menu' => $this->menu->findAll(),
            'berita' => $beritas,
            'contact' => $this->contact->findAll(),
            'link' => $this->link->findAll(),
            'kategori' => $this->kategoriBerita->findAll()
        ];
        return view('frondend/berita', $data);
    }
    public function isi_berita($id)
    {
        $beritas = $this->berita->where('id_ms_kategori_berita', $id)->where('aktif', 1)->findAll();

        foreach ($beritas as &$berita) {
            $berita['thumbnail'] = $this->berita->extractThumbnail($berita['deskripsi']);
            $berita['snippet'] = $this->berita->extractSnippet($berita['deskripsi']);
        }

        $data = [
            'menu' => $this->menu->findAll(),
            'berita' => $beritas,
            'isi_berita' => $this->berita->find($id),
            'contact' => $this->contact->findAll(),
            'link' => $this->link->findAll(),
            'kategori' => $this->kategoriBerita->findAll()
        ];
        return view('frondend/isi_berita', $data);
    }
    public function kategoriberita($id)
    {
        $beritas = $this->berita->where('id_ms_kategori_berita', $id)->where('aktif', 1)->findAll();

        foreach ($beritas as &$berita) {
            $berita['thumbnail'] = $this->berita->extractThumbnail($berita['deskripsi']);
            $berita['snippet'] = $this->berita->extractSnippet($berita['deskripsi']);
        }

        $data = [
            'beritas' => $beritas,
            'menu' => $this->menu->findAll(),
            'contact' => $this->contact->findAll(),
            'link' => $this->link->findAll(),
            'kategori' => $this->kategoriBerita->findAll(),
            'kategoris' => $this->kategoriBerita->find($id)
        ];
        return view('frondend/kategori_berita', $data);
    }
}
