<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\ModelProduk;
use App\Models\ModelLaporan;

// use App\Models\ModelKategori;
// use App\Models\ModelSatuan;
// use App\Models\ModelPenjualan;

class Laporan extends BaseController
{
    public function __construct()
    {
        $this->produk = new ModelProduk();
        $this->laporan = new ModelLaporan();
        // $this->kategori = new ModelKategori();
        // $this->satuan = new ModelSatuan();
        // $this->jual = new ModelPenjualan();
    }

    public function PrintDataProduk()
    {
        $data = [
            'judul' => 'Laporan Data Produk',
            'produk' => $this->produk->getAllProduk(),
            'page' => 'laporan/v_printlap_produk',
        ];
        return view('laporan/v_template_printlap', $data);
    }

    // LAPORAN HARIAN -->
    public function LaporanHarian()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Harian',
            'subjudulv' => 'LAPORAN HARIAN',
            'menu' => 'laporan',
            'submenu' => 'laporan-harian',
            'page' => 'laporan/v_laporan_h',
        ];
        return view('v_template', $data);
    }

    public function ViewLaporanHarian()
    {
        $tgl = $this->request->getPost('tgl');
        $data = [
            'judul' => 'Laporan Penjualan Harian',
            'dataharian' => $this->laporan->DataHarian($tgl),
            'tgl' => $tgl,
        ];

        $response = [
            'data' => view('laporan/v_tbl_laporan_h', $data)
        ];

        echo json_encode($response);
        // echo dd($this->laporan->DataHarian($tgl));
    }

    public function PrintLaporanH($tgl)
    {
        $data = [
            'judul' => 'Laporan Penjualan Harian',
            'page' => 'laporan/v_printlap_h',
            'dataharian' => $this->laporan->DataHarian($tgl),
            'tgl' => $tgl,
        ];
        return view('laporan/v_template_printlap', $data);
    }
    // LAPORAN HARIAN /-->


    // LAPORAN BULANAN -->
    public function LaporanBulanan()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Bulanan',
            'subjudulv' => 'LAPORAN BULANAN',
            'menu' => 'laporan',
            'submenu' => 'laporan-bulanan',
            'page' => 'laporan/v_laporan_b',
        ];
        return view('v_template', $data);
    }

    public function ViewLaporanBulanan()
    {
        $bulan = $this->request->getPost('bulan');
        $tahun = $this->request->getPost('tahun');
        $data = [
            'judul' => 'Laporan Penjualan Bulanan',
            'databulanan' => $this->laporan->DataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('laporan/v_tbl_laporan_b', $data)
        ];

        echo json_encode($response);
        // echo dd($this->laporan->DataTahunan($bulan, $tahun));
    }

    public function PrintLaporanB($bulan, $tahun)
    {
        $data = [
            'judul' => 'Laporan Penjualan Bulanan',
            'page' => 'laporan/v_printlap_b',
            'databulanan' => $this->laporan->DataBulanan($bulan, $tahun),
            'bulan' => $bulan,
            'tahun' => $tahun,
        ];
        return view('laporan/v_template_printlap', $data);
    }
    // LAPORAN BULANAN /-->


    // LAPORAN TAHUNAN -->
    public function LaporanTahunan()
    {
        $data = [
            'judul' => 'Laporan',
            'subjudul' => 'Laporan Tahunan',
            'subjudulv' => 'LAPORAN TAHUNAN',
            'menu' => 'laporan',
            'submenu' => 'laporan-tahunan',
            'page' => 'laporan/v_laporan_t',
        ];
        return view('v_template', $data);
    }

    public function ViewLaporanTahunan()
    {
        $tahun = $this->request->getPost('tahun');
        $data = [
            'judul' => 'Laporan Penjualan Tahunan',
            'datatahunan' => $this->laporan->DataTahunan($tahun),
            'tahun' => $tahun,
        ];

        $response = [
            'data' => view('laporan/v_tbl_laporan_t', $data)
        ];

        echo json_encode($response);
        //echo dd($this->laporan->DataTahunan(2024));
    }

    public function PrintLaporanT($tahun)
    {
        $data = [
            'judul' => 'Laporan Penjualan Tahunan',
            'page' => 'laporan/v_printlap_t',
            'datatahunan' => $this->laporan->DataTahunan($tahun),
            'tahun' => $tahun,
        ];
        return view('laporan/v_template_printlap', $data);
    }
    // LAPORAN TAHUNAN /-->
}
