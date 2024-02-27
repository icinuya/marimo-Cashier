<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelKategori;

class Kategori extends BaseController
{
    public function __construct()
    {
        $this->kategori = new ModelKategori();
    }

    public function index()
    {
        //if (session()->get('username') == '') {
        //    session()->setFlashdata('gagal', ' Anda Belum Login.');
        //    return redirect()->to(base_url('Home'));
        //}
        
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Kategori',
            'menu' => 'masterdata',
            'submenu' => 'kategori',
            'page' => 'v_kategori',
            'kategori' => $this->kategori->findAll(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'nama_kategori'  => $this->request->getPost('nama_kategori'),
        ];

        $this->kategori->Insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('/Kategori');
    }

    public function UpdateData($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
            'nama_kategori'  => $this->request->getPost('nama_kategori')
        ];

        $this->kategori->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to('/Kategori');
    }

    public function deleteData($id_kategori)
    {
        $data = [
            'id_kategori' => $id_kategori,
        ];

        $this->kategori->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('/Kategori');
    }
}
