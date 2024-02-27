<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelSatuan extends Model
{
    protected $table = 'satuan'; 
    protected $primaryKey = 'id_satuan';
    protected $allowedFields = ['nama_satuan']; 

    public function insertData($data)
    {
        return $this->Insert($data);
    }

    public function updateData($data)
    {
        $this->db->table('satuan')
        ->where('id_satuan', $data['id_satuan'])
        ->Update($data);
    }

    public function deleteData($data)
    {
        $this->db->table('satuan')
        ->where('id_satuan', $data['id_satuan'])
        ->delete($data);
    }
}
