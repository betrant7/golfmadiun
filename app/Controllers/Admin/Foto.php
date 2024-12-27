<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\MenuModel;
use App\Models\FotoModel;
use Exception;
use SebastianBergmann\Exporter\Exporter;

class Foto extends BaseController
{
    protected $fotoModel;
    protected $menu;
    protected $albumModel;

    public function __construct()
    {
        $this->fotoModel = new FotoModel();
        $this->menu = new MenuModel();
        $this->albumModel = new AlbumModel();
    }
    public function index()
    {
        $data = [
            'foto' => $this->fotoModel->getAllFotoWithAlbum(),
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\Gallery\Media\foto', $data);
    }
    public function tambah()
    {
        $data = [
            'album' => $this->albumModel->findAll(),
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\Gallery\Media\foto_upload', $data);
    }
    public function simpan()
    {
        $validated = $this->validate([
            'foto' => [
                'uploaded[foto]',
                'mime_in[foto,image/jpg,image/jpeg,image/png]',
            ],

        ]);

        if (!$validated) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $fotoFile = $this->request->getFile('foto');
        if ($fotoFile->isValid() && !$fotoFile->hasMoved()) {
            $fotoFile->move(ROOTPATH . 'public/uploads/album/foto', $fotoFile->getName());

            // Save to database

            $this->fotoModel->save([
                'foto' => $fotoFile->getName(),
                'keterangan' => $this->request->getPost('keterangan'),
                'id_ms_album' => $this->request->getPost('id_ms_album'),
                'aktif' => 1
            ]);

            return redirect()->to('/foto')->with('success', 'Banner uploaded successfully');
        }

        return redirect()->back()->withInput()->with('errors', ['foto' => 'Failed to upload banner']);
    }
    public function hapus($id)
    {
        // Step 1: Fetch the record containing the photo path
        $photo = $this->fotoModel->find($id);

        if (!$photo) {
            // If the photo record is not found, return a 404 error.

            return redirect()->back()->withInput();
        }

        // Step 2: Delete the photo from the filesystem
        $filePath = ROOTPATH . 'public/uploads/album/foto/' . $photo['foto']; // Adjust your path
        if (is_file($filePath) && file_exists($filePath)) {
            unlink($filePath); // Delete the file from the server
        } else {
            // File doesn't exist; log an error or take action accordingly

            return redirect()->back()->withInput();
        }

        // Step 3: Delete the record from the database
        if (!$this->fotoModel->delete($id)) {
            // If deletion from the database fails, return an error response

            return redirect()->back()->withInput();
        }

        // Step 4: Return success response
        return redirect()->to(base_url('foto'));
    }
    public function status($id)
    {
        $data = $this->fotoModel->find($id);
        try {
            // Attempt to insert the data into the database
            if ($data['aktif'] == 1) {
                $this->fotoModel->save([
                    'id_ms_foto' => $id,
                    'aktif' => '0',
                ]);
            } else {
                $this->fotoModel->save([
                    'id_ms_foto' => $id,
                    'aktif' => '1',
                ]);
            }
            return redirect()->to('/foto')->with('message', 'Data inserted successfully');
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->to('/foto')->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
}
