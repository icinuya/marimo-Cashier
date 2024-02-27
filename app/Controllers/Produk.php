<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelKategori;
use App\Models\ModelSatuan;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->produk = new ModelProduk();
        $this->kategori = new ModelKategori();
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
            'subjudul' => 'Produk',
            'menu' => 'masterdata',
            'submenu' => 'produk',
            'page' => 'v_produk',
            'produk' => $this->produk->getAllProduk(),
            'kategori' => $this->kategori->findAll(),
            'satuan' => $this->satuan->findAll(),
        ];
        return view('v_template', $data);
    }

    public function InsertData()
    {
        if ($this->validate([
            'kode_produk' => [
                'label' => 'Kode Produk / Barcode',
                'rules' => 'is_unique[produk.kode_produk]',
                'errors' => [
                    'is_unique' => '{field} Kode Sudah Ada, Masukan Kode Lain.',
                ]
            ],
            'id_satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih.',
                ]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih.',
                ]
            ]
        ])) {
            $hargabeli = str_replace(",", "", $this->request->getPost('harga_beli'));
            $hargajual = str_replace(",", "", $this->request->getPost('harga_jual'));
            $data = [
                'kode_produk' => $this->request->getPost('kode_produk'),
                'nama_produk' => $this->request->getPost('nama_produk'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'harga_beli' => $hargabeli,
                'harga_jual' => $hargajual,
                'stok' => $this->request->getPost('stok'),
            ];
            $this->produk->Insert($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Tambahkan!');
            return redirect()->to(base_url('/Produk'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/Produk'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function updateData($id_produk)
    {
        if ($this->validate([
            'id_satuan' => [
                'label' => 'Satuan',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih.',
                ]
            ],
            'id_kategori' => [
                'label' => 'Kategori',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Belum Dipilih.',
                ]
            ]
        ])) {
            $hargabeli = str_replace(",", "", $this->request->getPost('harga_beli'));
            $hargajual = str_replace(",", "", $this->request->getPost('harga_jual'));
            $data = [
                'id_produk' => $id_produk,
                'nama_produk' => $this->request->getPost('nama_produk'),
                'id_kategori' => $this->request->getPost('id_kategori'),
                'id_satuan' => $this->request->getPost('id_satuan'),
                'harga_beli' => $hargabeli,
                'harga_jual' => $hargajual,
                'stok' => $this->request->getPost('stok'),
            ];
            $this->produk->updateData($data);
            session()->setFlashdata('pesan', 'Data Berhasil Di Update!');
            return redirect()->to(base_url('/Produk'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('/Produk'))->withInput('validation', \Config\Services::validation());
        }
    }

    public function deleteData($id_produk)
    {
        $data = [
            'id_produk' => $id_produk,
        ];

        $this->produk->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus!');
        return redirect()->to('/Produk');
    }
}
