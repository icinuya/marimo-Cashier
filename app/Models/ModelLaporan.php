<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelLaporan extends Model
{
    protected $table = 'detailpenjualan';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = [
        'id_detail', 'no_faktur', 'kode_produk', 'modal',  'harga',
        'qty', 'subtotal', 'profit'
    ];

    public function DataHarian($tgl)
    {
        return $this->db->table('detailpenjualan')
            ->join('produk', 'produk.kode_produk=detailpenjualan.kode_produk')
            ->join('jual', 'jual.no_faktur=detailpenjualan.no_faktur')
            ->where('jual.tgl_jual', $tgl)
            ->select('detailpenjualan.kode_produk')
            ->select('produk.nama_produk')
            ->select('detailpenjualan.modal')
            ->select('detailpenjualan.harga')
            ->groupBy('detailpenjualan.kode_produk')
            ->selectSum('detailpenjualan.qty')
            ->selectSum('detailpenjualan.subtotal')
            ->selectSum('detailpenjualan.profit')
            ->get()
            ->getResultArray();
    }

    public function DataBulanan($bulan, $tahun)
    {
        return $this->db->table('detailpenjualan')
            ->join('jual', 'jual.no_faktur=detailpenjualan.no_faktur')
            ->where('month(jual.tgl_jual)', $bulan)
            ->where('year(jual.tgl_jual)', $tahun)
            ->select('jual.tgl_jual')
            ->groupBy('jual.tgl_jual')
            ->selectSum('detailpenjualan.subtotal')
            ->selectSum('detailpenjualan.profit')
            ->get()
            ->getResultArray();
    }

    public function DataTahunan($tahun)
    {
        return $this->db->table('detailpenjualan')
            ->join('jual', 'jual.no_faktur=detailpenjualan.no_faktur')
            ->where('year(jual.tgl_jual)', $tahun)
            ->select('month(jual.tgl_jual) as bulan')
            ->groupBy('month(jual.tgl_jual)')
            ->selectSum('detailpenjualan.subtotal')
            ->selectSum('detailpenjualan.profit')
            ->get()
            ->getResultArray();
    }
}
