<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

use App\Models\MenuModel;
use Exception;

class Menu extends BaseController
{
    protected $menu;

    public function __construct()
    {
        $this->menu = new MenuModel();
    }
    public function index(): string
    {
        $data = [
            'menu' => $this->menu->findAll()
        ];
        return view('admin\Menu\index', $data);
    }
    public function tambah(): string
    {
        $data = [
            'menu' => $this->menu->findAll()
        ];
        return view('admin\Menu\tambah', $data);
    }
    public function simpan()
    {
        $this->menu->save([
            'nama_menu' => $this->request->getPost('namamenu'),
            'aktif' => 1
        ]);

        return redirect()->to('/menu');
    }
    public function status($id)
    {
        $data = $this->menu->find($id);
        try {
            // Attempt to insert the data into the database
            if ($data['aktif'] == 1) {
                $this->menu->save([
                    'id_ms_menu' => $id,
                    'aktif' => '0',
                ]);
            } else {
                $this->menu->save([
                    'id_ms_menu' => $id,
                    'aktif' => '1',
                ]);
            }
            return redirect()->to('/menu')->with('message', 'Data inserted successfully');
        } catch (Exception $e) {
            return redirect()->to('/menu')->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
    public function hapus($id)
    {
        $this->menu->delete($id);
        return redirect()->to('/menu');
    }
}
