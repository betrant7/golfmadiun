<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\ContentModel;
use App\Models\MenuModel;
use Exception;

class Content extends BaseController
{
    protected $menu;
    protected $content;

    public function __construct()
    {
        $this->menu = new MenuModel();
        $this->content = new ContentModel();
    }
    public function index($id_ms_menu = null): string
    {
        $data = [
            'menu' => $this->menu->where('aktif', 1)->findAll(), // ambil menu aktif
            'menu1' => $this->menu->find($id_ms_menu),
            'content' => $this->content->where('id_ms_menu', $id_ms_menu)->findAll() // ambil konten berdasarkan id_ms_menu
        ];

        return view('admin\Content\index', $data);
    }
        
    
    public function tambah($id_ms_menu): string
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'menu1' => $this->menu->find($id_ms_menu),
            'id_ms_menu' => $id_ms_menu,

        ];
        return view('admin\Content\tambah', $data);
    }
    public function simpan()
    {
        $id_ms_menu = $this->request->getPost('id_ms_menu');

        $this->content->save([
            'id_ms_menu' => $id_ms_menu,
            'isi_content' => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('content/' . $id_ms_menu);
    }

    public function edit($id)
    {
        $content = $this->content->find($id);
        $id_ms_menu = $content['id_ms_menu'];

        $data = [
            'menu' => $this->menu->findAll(),
            'menu1' => $this->menu->find($id_ms_menu),
            'id_ms_menu' => $id_ms_menu,
            'content' =>$this->content->find($id),
        ];
        return view('Admin\Content\edit', $data);
    }
    public function update($id)
    {

        $id_ms_menu = $this->request->getPost('id_ms_menu');

        $this->content->update($id,[
            'id_ms_menu' => $id_ms_menu,
            'isi_content' => $this->request->getPost('deskripsi'),
        ]);

        return redirect()->to('content/' . $id_ms_menu);
    }
    
    public function hapus($id)
    {
        $content = $this->content->find($id);
        $id_ms_menu = $content['id_ms_menu'];

        // Hapus konten
        $this->content->delete($id);

        // Redirect ke halaman /content/id_ms_menu setelah penghapusan
        return redirect()->to('content/' . $id_ms_menu);
        }
}
