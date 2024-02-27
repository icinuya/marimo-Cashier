<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAdmin extends Model
{
    protected $table = 'detailpenjualan';
    protected $primaryKey = 'id_detail';
    protected $allowedFields = [
        'id_detail', 'no_faktur', 'kode_produk', 'modal',  'harga',
        'qty', 'subtotal', 'profit'
    ];

    public function GrafikP()
    {
        return $this->db->table('detailpenjualan')
            ->join('jual', 'jual.no_faktur=detailpenjualan.no_faktur')
            ->where('month(jual.tgl_jual)', date('m'))
            ->where('year(jual.tgl_jual)', date('Y'))
            ->select('jual.tgl_jual')
            ->groupBy('jual.tgl_jual')
            ->selectSum('detailpenjualan.subtotal')
            ->selectSum('detailpenjualan.profit')
            ->get()
            ->getResultArray();
    }

    public function DayIncome()
    {
        return $this->db->table('detailpenjualan')
            ->join('jual', 'jual.no_faktur=detailpenjualan.no_faktur')
            ->where('jual.tgl_jual', date('Y-m-d'))
            ->groupBy('jual.tgl_jual')
            ->selectSum('detailpenjualan.subtotal')
            ->get()->getRowArray();
    }

    public function MonthIncome()
    {
        return $this->db->table('detailpenjualan')
            ->join('jual', 'jual.no_faktur=detailpenjualan.no_faktur')
            ->where('month(jual.tgl_jual)', date('m'))
            ->where('year(jual.tgl_jual)', date('Y'))
            // ->select('jual.tgl_jual')
            ->groupBy('month(jual.tgl_jual)')
            ->selectSum('detailpenjualan.subtotal')
            ->get()
            ->getRowArray();
    }

    public function YearIncome()
    {
        return $this->db->table('detailpenjualan')
            ->join('jual', 'jual.no_faktur=detailpenjualan.no_faktur')
            ->where('year(jual.tgl_jual)', date('Y'))
            // ->select('jual.tgl_jual')
            ->groupBy('year(jual.tgl_jual)')
            ->selectSum('detailpenjualan.subtotal')
            ->get()
            ->getRowArray();
    }

    public function TProduk()
    {
        return $this->db->table('produk')->countAll();
    }

    public function TKategori()
    {
        return $this->db->table('kategori')->countAll();
    }
    
    public function TSatuan()
    {
        return $this->db->table('satuan')->countAll();
    }

    public function TUser()
    {
        return $this->db->table('user')->countAll();
    }
}
