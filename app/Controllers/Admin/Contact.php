<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\MenuModel;
use App\Models\ContactModel;
use Exception;

class Contact extends BaseController
{
    protected $menu;
    protected $contact;
    public function __construct()
    {
        $this->menu = new MenuModel();
        $this->contact = new ContactModel();
    }

    public function index(): string
    {
        $data = [
            'contact' => $this->contact->findAll(),
            'menu' => $this->menu->findAll()
        ];
        return view('admin\Contact\index', $data);
    }

    public function tambah()
    {
        $data = [
            'menu' => $this->menu->findAll()
        ];
        return view('admin\Contact\tambah', $data);
    }
    public function simpan()
    {
        $data = [
            'isi_footer' => $this->request->getPost('deskripsi'),
            'aktif' => 0,
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->contact->save($data)) {
                return redirect()->to('/contact')->with('message', 'Data inserted successfully');
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
        $data = $this->contact->find($id);
        try {
            // Attempt to insert the data into the database
            if ($data['aktif'] == 1) {
                $this->contact->save([
                    'id_ms_footer' => $id,
                    'aktif' => '0',
                ]);
            } else {
                $this->contact->save([
                    'id_ms_footer' => $id,
                    'aktif' => '1',
                ]);
            }
            return redirect()->to('/contact')->with('message', 'Data inserted successfully');
        } catch (Exception $e) {
            // Catch any database-related errors
            return redirect()->to('/contact')->withInput()->with('error', 'Database error: ' . $e->getMessage());
        }
    }
    public function edit($id)
    {
        $data = [
            'menu' => $this->menu->findAll(),
            'contact' => $this->contact->getFooterbyid($id),
        ];
        return view('admin\Contact\edit', $data);
    }
    public function update()
    {

        $data = [
            'id_ms_footer' => $this->request->getPost('id_ms_footer'),
            'aktif' => 0,
            'isi_footer' => $this->request->getPost('deskripsi')
        ];
        try {
            // Attempt to insert the data into the database
            if ($this->contact->save($data)) {
                return redirect()->to('/contact')->with('message', 'Data inserted successfully');
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
        return view('admin\Contact\detail');
    }
    public function hapus($id)
    {
        $this->contact->delete($id);
        return redirect()->to('/contact');
    }
}
