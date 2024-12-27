<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\KategoriTournamentModel;
use App\Models\MenuModel;
use App\Models\TournamentModel;
use Exception;

class Tournament extends BaseController
{
    protected $kategoriTournamentModel;
    protected $tournamentModel;
    protected $menu;

    public function __construct()
    {
        $this->menu = new MenuModel();
        $this->kategoriTournamentModel = new KategoriTournamentModel();
        $this->tournamentModel = new TournamentModel();
    }
    public function index()
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'tournaments' => $this->tournamentModel->getTournamentWithKategori()
        ];
        return view('Admin/Tournament/index', $data);
    }
    // Show create form
    public function tambah()
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'kategori' => $this->kategoriTournamentModel->findAll()
        ];
        return view('Admin/Tournament/tambah', $data);
    }

    // Store tournament data
    public function simpan()
    {
        $this->tournamentModel->save([
            'id_ms_kategori_tournament' => $this->request->getPost('id_ms_kategori_tournament'),
            'tgl_awal' => $this->request->getPost('tgl_awal'),
            'tgl_akhir' => $this->request->getPost('tgl_akhir'),
            'judul' => $this->request->getPost('judul'),
            'venue' => $this->request->getPost('venue')
        ]);
        return redirect()->to('/tournament');
    }

    // Edit form
    public function edit($id)
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'tournament' => $this->tournamentModel->find($id),
            'kategori' => $this->kategoriTournamentModel->findAll()
        ];

        return view('Admin/Tournament/edit', $data);
    }

    // Update tournament
    public function update()
    {
        $data = [
            'id_ms_kategori_tournament' => $this->request->getPost('id_ms_kategori_tournament'),
            'tgl_awal' => $this->request->getPost('tgl_awal'),
            'tgl_akhir' => $this->request->getPost('tgl_akhir'),
            'judul' => $this->request->getPost('judul'),
            'venue' => $this->request->getPost('venue'),
            'id_ms_tournament' => $this->request->getPost('id_ms_tournament')
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->tournamentModel->save($data)) {
                return redirect()->to('/tournament')->with('message', 'Data inserted successfully');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to insert data');
            }
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }

    // Delete tournament
    public function hapus($id)
    {
        $this->tournamentModel->delete($id);
        return redirect()->to('/tournament');
    }
}
