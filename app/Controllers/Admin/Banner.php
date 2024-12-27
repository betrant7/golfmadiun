<?php

namespace App\Controllers\Admin;

use App\Models\MenuModel;
use App\Controllers\BaseController;
use App\Models\BannerModel;
use Exception;

class Banner extends BaseController
{
    protected $bannerModel;
    protected $menu;

    public function __construct()
    {
        $this->bannerModel = new BannerModel();
        $this->menu = new MenuModel();
    }
    public function index()
    {
        $data = [
            'banner' => $this->bannerModel->findAll(),
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\Banner\index', $data);
    }
    public function tambah()
    {
        $data = [
            'menu' => $this->menu->findAll()
        ];
        return view('Admin\Banner\tambah', $data);
    }
    public function simpan()
    {
        $validated = $this->validate([
            'banner' => [
                'uploaded[banner]',
                'mime_in[banner,image/jpg,image/jpeg,image/png]',
            ],
        ]);

        if (!$validated) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $bannerFile = $this->request->getFile('banner');
        if ($bannerFile->isValid() && !$bannerFile->hasMoved()) {
            $bannerFile->move(ROOTPATH . 'public/uploads/banner', $bannerFile->getName());

            // Save to database

            $this->bannerModel->save([
                'banner' => $bannerFile->getName(),
                'deskripsi' => $this->request->getPost('deskripsi'),
                'aktif' => 1
            ]);

            return redirect()->to('/banners')->with('success', 'Banner uploaded successfully');
        }

        return redirect()->back()->withInput()->with('errors', ['banner' => 'Failed to upload banner']);
    }
    public function hapus($id)
    {
        // Step 1: Fetch the record containing the photo path
        $photo = $this->bannerModel->find($id);

        if (!$photo) {
            // If the photo record is not found, return a 404 error.

            return redirect()->back()->withInput();
        }

        // Step 2: Delete the photo from the filesystem
        $filePath = ROOTPATH . 'public/uploads/banner/' . $photo['banner']; // Adjust your path
        if (is_file($filePath) && file_exists($filePath)) {
            unlink($filePath); // Delete the file from the server
        } else {
            // File doesn't exist; log an error or take action accordingly

            return redirect()->back()->withInput();
        }

        // Step 3: Delete the record from the database
        if (!$this->bannerModel->delete($id)) {
            // If deletion from the database fails, return an error response

            return redirect()->back()->withInput();
        }

        // Step 4: Return success response
        return redirect()->to(base_url('banners'));
    }

    public function status($id)
    {
        $data = $this->bannerModel->find($id);
        try {
            // Attempt to insert the data into the database
            if ($data['aktif'] == 1) {
                $this->bannerModel->save([
                    'id_banner' => $id,
                    'aktif' => '0',
                ]);
            } else {
                $this->bannerModel->save([
                    'id_banner' => $id,
                    'aktif' => '1',
                ]);
            }
            return redirect()->to('/banners')->with('message', 'Data inserted successfully');
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->to('/banners')->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
}
