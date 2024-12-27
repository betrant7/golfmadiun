<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\KategoriBeritaModel;
use Exception;

class KategoriBerita extends BaseController
{
    protected $menu;
    protected $kategoriBeritaModel;

    public function __construct()
    {
        $this->menu = new MenuModel();
        $this->kategoriBeritaModel = new KategoriBeritaModel();
    }
    public function index(): string
    {
        $data = [
            'berita' => $this->kategoriBeritaModel->findAll(),
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\KategoriBerita\index', $data);
    }
    public function tambah(): string
    {
        $data = [
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\KategoriBerita\tambah', $data);
    }
    public function simpan()
    {
        $this->kategoriBeritaModel->save([
            'nama_kategori' => $this->request->getPost('kategori'),
            'aktif' => 1
        ]);

        return redirect()->to('/berita/kategori/');
    }

    public function edit($id)
    {
        $data = [
            'kategori' => $this->kategoriBeritaModel->find($id),
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\KategoriBerita\edit', $data);
    }
    public function detail(): string
    {
        return view('Admin\KategoriBerita\detail');
    }
    public function status($id)
    {
        $data = $this->kategoriBeritaModel->find($id);
        try {
            // Attempt to insert the data into the database
            if ($data['aktif'] == 1) {
                $this->kategoriBeritaModel->save([
                    'id_ms_kategori_berita' => $id,
                    'aktif' => '0',
                ]);
            } else {
                $this->kategoriBeritaModel->save([
                    'id_ms_kategori_berita' => $id,
                    'aktif' => '1',
                ]);
            }
            return redirect()->to('/berita/kategori')->with('message', 'Data inserted successfully');
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->to('/berita/kategori')->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
    public function hapus($id)
    {
        $this->kategoriBeritaModel->delete($id);
        return redirect()->to('/berita/kategori');
    }
    public function update()
    {

        $data = [
            'id_ms_kategori_berita' => $this->request->getPost('id_ms_kategori_berita'),
            'nama_kategori' => $this->request->getPost('kategori'),
            'aktif' => 1,
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->kategoriBeritaModel->save($data)) {
                return redirect()->to('/berita/kategori')->with('message', 'Data inserted successfully');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to insert data');
            }
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
}
