<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BeritaModel;
use App\Models\MenuModel;
use App\Models\KategoriBeritaModel;
use Exception;

class Berita extends BaseController
{
    protected $beritaModel;
    protected $menu;
    protected $kategoriBeritaModel;

    public function __construct()
    {
        $this->beritaModel = new BeritaModel();
        $this->menu = new MenuModel();
        $this->kategoriBeritaModel = new KategoriBeritaModel();
    }
    public function index(): string
    {
        $data = [
            'berita' => $this->beritaModel->findAll(),
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\Berita\index', $data);
    }
    public function tambah(): string
    {
        $data = [
            'kategori' => $this->kategoriBeritaModel->findAll(),
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\Berita\tambah', $data);
    }
    public function simpan()
    {
        $data = [
            'id_ms_berita' => $this->request->getPost('id_ms_berita'),
            'judul' => $this->request->getPost('judul'),
            'id_ms_kategori_berita' => $this->request->getPost('kategori'),
            'aktif' => 1,
            'tgl_waktu' => $this->request->getPost('tgl_waktu'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->beritaModel->save($data)) {
                return redirect()->to('/berita')->with('message', 'Data inserted successfully');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to insert data');
            }
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
    public function status($id)
    {
        $data = $this->beritaModel->find($id);
        try {
            // Attempt to insert the data into the database
            if ($data['aktif'] == 1) {
                $this->beritaModel->save([
                    'id_ms_berita' => $id,
                    'aktif' => '0',
                ]);
            } else {
                $this->beritaModel->save([
                    'id_ms_berita' => $id,
                    'aktif' => '1',
                ]);
            }
            return redirect()->to('/berita')->with('message', 'Data inserted successfully');
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->to('/berita')->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $data = [
            'berita' => $this->beritaModel->getBeritaWithKategori($id),
            'kategori' => $this->kategoriBeritaModel->findAll(),
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\Berita\edit', $data);
    }
    public function update()
    {

        $data = [
            'id_ms_berita' => $this->request->getPost('id_ms_berita'),
            'judul' => $this->request->getPost('judul'),
            'id_ms_kategori_berita' => $this->request->getPost('kategori'),
            'aktif' => 1,
            'tgl_waktu' => $this->request->getPost('tgl_waktu'),
            'deskripsi' => $this->request->getPost('deskripsi')
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->beritaModel->save($data)) {
                return redirect()->to('/berita')->with('message', 'Data inserted successfully');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to insert data');
            }
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
    public function detail($id)
    {
        return view('Admin\Berita\detail');
    }
    public function hapus($id)
    {
        $this->beritaModel->delete($id);
        return redirect()->to('/berita');
    }
}
