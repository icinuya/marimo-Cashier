<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelSatuan;

class Satuan extends BaseController
{
    public function __construct()
    {
        $this->satuan = new ModelSatuan();
    }

    public function index()
    {
        //proteksi halaman
        //if (session()->get('username') == '') {
        //    session()->setFlashdata('gagal', ' Anda Belum Login.');
        //    return redirect()->to(base_url('Home'));
        //}
        
        $data = [
            'judul' => 'Master Data',
            'subjudul' => 'Satuan',
            'menu' => 'masterdata',
            'submenu' => 'satuan',
            'page' => 'v_satuan',
            'satuan' => $this->satuan->findAll(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'nama_satuan'  => $this->request->getPost('nama_satuan'),
        ];

        $this->satuan->Insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('/Satuan');
    }

    public function UpdateData($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan,
            'nama_satuan'  => $this->request->getPost('nama_satuan')
        ];

        $this->satuan->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to('/Satuan');
    }

    public function deleteData($id_satuan)
    {
        $data = [
            'id_satuan' => $id_satuan,
        ];

        $this->satuan->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('/Satuan');
    }
}
