<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\MenuModel;
use Exception;

class Album extends BaseController
{
    protected $albumModel;
    protected $menu;
    public function __construct()
    {
        $this->albumModel = new AlbumModel();
        $this->menu = new MenuModel();
    }
    public function index()
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'album' => $this->albumModel->findAll()
        ];
        return view('Admin\Gallery\Album\index', $data);
    }
    public function tambah()
    {
        $data =[
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\Gallery\Album\tambah', $data);
    }
    public function simpan()
    {
        $data = [
            'nama_album' => $this->request->getPost('nama_album'),
            'aktif' => 1,
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->albumModel->save($data)) {
                return redirect()->to('/album')->with('message', 'Data inserted successfully');
            } else {
                return redirect()->back()->withInput()->with('error', 'Failed to insert data');
            }
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->back()->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
    public function hapus($id)
    {
        // Step 1: Fetch the record containing the photo path
        $photo = $this->albumModel->find($id);

        if (!$photo) {
            // If the photo record is not found, return a 404 error.

            return redirect()->back()->withInput();
        }

        // Step 3: Delete the record from the database
        if (!$this->albumModel->delete($id)) {
            // If deletion from the database fails, return an error response

            return redirect()->back()->withInput();
        }

        // Step 4: Return success response
        return redirect()->to(base_url('album'));
    }
    public function edit($id)
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'album' => $this->albumModel->find($id)
        ];
        return view('Admin\Gallery\Album\edit', $data);
    }

    public function update()
    {

        $data = [
            'id_ms_album' => $this->request->getPost('id_ms_album'),
            'nama_album' => $this->request->getPost('nama_album'),
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->albumModel->save($data)) {
                return redirect()->to('/album')->with('message', 'Data inserted successfully');
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
        $data = $this->albumModel->find($id);
        try {
            // Attempt to insert the data into the database
            if ($data['aktif'] == 1) {
                $this->albumModel->save([
                    'id_ms_album' => $id,
                    'aktif' => '0',
                ]);
            } else {
                $this->albumModel->save([
                    'id_ms_album' => $id,
                    'aktif' => '1',
                ]);
            }
            return redirect()->to('/album')->with('message', 'Data inserted successfully');
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->to('/album')->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
}
