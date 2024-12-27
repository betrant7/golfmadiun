<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\AlbumModel;
use App\Models\MenuModel;
use App\Models\VideoModel;
use Exception;

class Video extends BaseController
{
    protected $videoModel;
    protected $albumModel;
    protected $menu;

    public function __construct()
    {
        $this->menu = new MenuModel();
        $this->videoModel = new VideoModel();
        $this->albumModel = new AlbumModel();
    }
    public function index()
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'video' => $this->videoModel->getAllVideoWithAlbum()
        ];
        return view('Admin\Gallery\Media\video', $data);
    }
    public function tambah()
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'album' => $this->albumModel->findAll()
        ];
        return view('Admin\Gallery\Media\video_upload', $data);
    }
    public function simpan()
    {
        $validated = $this->validate([
            'video' => [
                'uploaded[video]',
                'mime_in[video,video/mp4,video/avi,video/mpeg,video/quicktime]',

            ],

        ]);

        if (!$validated) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Handle file upload
        $videoFile = $this->request->getFile('video');
        if ($videoFile->isValid() && !$videoFile->hasMoved()) {
            $videoFile->move(ROOTPATH . 'public/uploads/album/video', $videoFile->getName());

            // Save to database
            $this->videoModel->save([
                'video' => $videoFile->getName(),
                'id_ms_album' => $this->request->getPost('id_ms_album'),
                'aktif' => 1
            ]);
            return redirect()->to('/video')->with('success', 'Banner uploaded successfully');
        }
        return redirect()->back()->withInput()->with('errors', ['video' => 'Failed to upload banner']);
    }
    public function status($id)
    {
        $data = $this->videoModel->find($id);
        try {
            // Attempt to insert the data into the database
            if ($data['aktif'] == 1) {
                $this->videoModel->save([
                    'id_ms_video' => $id,
                    'aktif' => '0',
                ]);
            } else {
                $this->videoModel->save([
                    'id_ms_video' => $id,
                    'aktif' => '1',
                ]);
            }
            return redirect()->to('/video')->with('message', 'Data inserted successfully');
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->to('/video')->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
}
