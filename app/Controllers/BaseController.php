<?php

namespace App\Controllers;

use App\Models\ModelAdmin;
use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;


use App\Models\ModelKategori;
use App\Models\ModelLaporan;
use App\Models\ModelPenjualan;
use App\Models\ModelProduk;
use App\Models\ModelSatuan;
use App\Models\ModelUser;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;
    protected $kategori;
    protected $satuan;
    protected $user;
    protected $produk;
    protected $jual;
    protected $laporan;
    protected $admin;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['form'];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;

    /**
     * @return void
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.
        
        $this->kategori = new ModelKategori();
        $this->satuan = new ModelSatuan();
        $this->user = new ModelUser();
        $this->produk = new ModelProduk();
        $this->jual = new ModelPenjualan();
        $this->laporan = new ModelLaporan();
        $this->admin = new ModelAdmin();

        // E.g.: $this->session = \Config\Services::session();
    }
}
