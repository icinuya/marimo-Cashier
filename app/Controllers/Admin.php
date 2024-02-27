<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelAdmin;
use CodeIgniter\HTTP\ResponseInterface;

class Admin extends BaseController
{
    public function __construct() 
    {
        $this->admin = new ModelAdmin();
    }
    
    public function index()
    {
        //if (session()->get('username') == '') {
        //    session()->setFlashdata('gagal', ' Anda Belum Login.');
        //    return redirect()->to(base_url('Home'));
        //}
        
        $data = [
            'judul' => 'Dashboard',
            'subjudul' => '',
            'menu' => 'dashboard',
            'submenu' => '',
            'page' => 'v_admin',
            'grafik' => $this->admin->GrafikP(),
            'todayincome' => $this->admin->DayIncome(),
            'monthinc' => $this->admin->MonthIncome(),
            'yearscome' => $this->admin->YearIncome(),
            'jmlproduk' => $this->admin->TProduk(),
            'jmlkategori' => $this->admin->TKategori(),
            'jmlsatuan' => $this->admin->TSatuan(),
            'jmluser' => $this->admin->TUser(),
        ];
        return view('v_template', $data);
    }

    public function Cek()
    {
        echo dd($this->admin->YearIncome());
    }
}
