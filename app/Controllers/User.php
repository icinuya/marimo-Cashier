<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelUser;

class User extends BaseController
{
    public function __construct()
    {
        $this->user = new ModelUser();
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
            'subjudul' => 'User',
            'menu' => 'masterdata',
            'submenu' => 'user',
            'page' => 'v_user',
            'user' => $this->user->findAll(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        $data = [
            'nama'  => $this->request->getPost('nama'),
            'email'  => $this->request->getPost('email'),
            'username'  => $this->request->getPost('username'),
            'password'  => md5($this->request->getPost('password')),
            'level'  => $this->request->getPost('level'),
        ];

        $this->user->Insert($data);
        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan!');
        return redirect()->to('User');
    }

    public function UpdateData($id_user)
    {
        $data = [
            'id_user' => $id_user,
            'nama'  => $this->request->getPost('nama'),
            'email'  => $this->request->getPost('email'),
            'username'  => $this->request->getPost('username'),
            'password'  => md5($this->request->getPost('password')),
            'level'  => $this->request->getPost('level'),
        ];

        $this->user->UpdateData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diupdate!');
        return redirect()->to('/User');
    }

    public function deleteData($id_user)
    {
        $data = [
            'id_user' => $id_user,
        ];

        $this->user->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('/User');
    }
}
