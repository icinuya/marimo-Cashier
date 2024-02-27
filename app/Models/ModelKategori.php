<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelKategori extends Model
{
    protected $table = 'kategori'; 
    protected $primaryKey = 'id_kategori';
    protected $allowedFields = ['nama_kategori']; 


    public function insertData($data)
    {
        return $this->insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('kategori')
        ->where('id_kategori', $data['id_kategori'])
        ->Update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('kategori')
        ->where('id_kategori', $data['id_kategori'])
        ->delete($data);
    }
}
