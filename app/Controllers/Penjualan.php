<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelPenjualan;
use Mike42\Escpos\PrintConnectors\WindowsPrintConnector;
use Mike42\Escpos\CapabilityProfile;
use Mike42\Escpos\Printer;

class Penjualan extends BaseController
{
    public function __construct()
    {
        $this->jual = new ModelPenjualan();
    }
    public function index()
    {
        //proteksi halaman
        //if (session()->get('username') == '') {
        //    session()->setFlashdata('gagal', ' Anda Belum Login.');
        //    return redirect()->to(base_url('Home'));
        //}

        $cart = \Config\Services::cart();

        $data = [
            'judul' => 'Penjualan',
            'no_faktur' => $this->jual->NoFaktur(),
            'cart' => $cart->contents(),
            'grand_total' => $cart->total(),
            'produk' => $this->jual->Allproduk(),
        ];
        return view('v_penjualan', $data);
    }

    public function CekProduk()
    {
        $kode_produk = $this->request->getPost('kode_produk');
        $produk = $this->jual->CekProduk($kode_produk);
        if ($produk == null) {
            $data = [
                'nama_produk' => '',
                'nama_kategori' => '',
                'nama_satuan' => '',
                'harga_jual' => '',
                'harga_beli' => '',
            ];
        } else {
            $data = [
                'nama_produk' => $produk['nama_produk'],
                'nama_kategori' => $produk['nama_kategori'],
                'nama_satuan' => $produk['nama_satuan'],
                'harga_jual' => $produk['harga_jual'],
                'harga_beli' => $produk['harga_beli'],
            ];
        }
        echo json_encode($data);
    }

    public function InsertCart()
    {
        $cart = \Config\Services::cart();
        $cart->insert(array(
            'id'      => $this->request->getPost('kode_produk'),
            'qty'     => $this->request->getPost('qty'),
            'price'   => $this->request->getPost('harga_jual'),
            'name'    => $this->request->getPost('nama_produk'),
            'options' => array(
                'nama_kategori' => $this->request->getPost('nama_kategori'),
                'nama_satuan' => $this->request->getPost('nama_satuan'),
                'modal' => $this->request->getPost('harga_beli'),
            )
        ));
        return redirect()->to(base_url('Penjualan'));
    }

    public function ViewCart()
    {
        $cart = \Config\Services::cart();
        $data = $cart->contents();
        echo dd($data);
    }

    public function ResetCart()
    {
        $cart = \Config\Services::cart();
        $cart->destroy();
        return redirect()->to(base_url('Penjualan'));
    }

    public function RemoveItemCart($rowid)
    {
        $cart = \Config\Services::cart();
        $cart->remove($rowid);
        return redirect()->to(base_url('Penjualan'));
    }

    public function SimpanTransaksi()
    {
        $cart = \Config\Services::cart();
        $produk = $cart->contents();
        $no_faktur = $this->jual->NoFaktur();
        $cash = str_replace(",", "", $this->request->getPost('cash'));
        $kembalian = str_replace(",", "", $this->request->getPost('kembalian'));

        //save ke tabel rinci jual
        foreach ($produk as $key => $value) {
            $data = [
                'no_faktur' => $no_faktur,
                'kode_produk' => $value['id'],
                'harga' => $value['price'],
                'modal' => $value['options']['modal'],
                'qty' => $value['qty'],
                'subtotal' => $value['subtotal'],
                'profit' => ($value['price'] - $value['options']['modal']) * $value['qty']
            ];
            $this->jual->InsertDetailJual($data);
        }

        //save ke tabel jual
        $data = [
            'no_faktur' => $no_faktur,
            'tgl_jual' => date('Y-m-d'),
            'time' => date('H:i:s'),
            'grand_total' => $cart->total(),
            'cash' => $cash,
            'kembalian' => $kembalian,
            'id_user' => session()->get('id_user'),
        ];
        $this->jual->InsertJual($data);
        $cart->destroy();
        session()->setFlashdata('pesan', 'Transaksi Berhasil Disimpan !');
        return redirect()->to('/Penjualan');
    }

    public function CetakStruk()
    {
        $profile = CapabilityProfile::load("simple");
        $connector = new WindowsPrintConnector("usernamedevice");
        $printer = new Printer($connector, $profile);

        $printer->text('Hai UKK');
        $printer->feed(4);
        $printer->cut();
        $printer->close();
    }
}
