<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\kategoriTournamentModel;
use Exception;

class KategoriTournament extends BaseController
{
    protected $menu;
    protected $kategoriTournamentModel;

    public function __construct()
    {
        $this->menu = new MenuModel();
        $this->kategoriTournamentModel = new KategoriTournamentModel();
    }
    public function index(): string
    {
        $data = [
            'tournament' => $this->kategoriTournamentModel->findAll(),
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\KategoriTournament\index', $data);
    }
    public function tambah(): string
    {
        $data=[
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\KategoriTournament\tambah', $data);
    }
    public function simpan()
    {
        $this->kategoriTournamentModel->save([
            'nama_kategori' => $this->request->getPost('nama_kategori'),

        ]);

        return redirect()->to('/tournament/kategori/');
    }

    public function edit($id)
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'kategori' => $this->kategoriTournamentModel->find($id)
        ];
        return view('Admin\KategoriTournament\edit', $data);
    }
    public function detail(): string
    {
        return view('Admin\KategoriTournament\detail');
    }

    public function hapus($id)
    {
        $this->kategoriTournamentModel->delete($id);
        return redirect()->to('/tournament/kategori');
    }
    public function update()
    {

        $data = [
            'id_ms_kategori_tournament' => $this->request->getPost('id_ms_kategori_tournament'),
            'nama_kategori' => $this->request->getPost('nama_kategori'),
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->kategoriTournamentModel->save($data)) {
                return redirect()->to('/tournament/kategori')->with('message', 'Data inserted successfully');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to insert data');
            }
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
}
