<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>marimoCashier | Penjualan</title>

    <link rel="apple-touch-icon" href="<?= base_url('elaadmin-master') ?>/images/logo_c.png">
    <link rel="shortcut icon" href="<?= base_url('elaadmin-master') ?>/images/logo_c.png">


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">

    <!-- DataTables -->
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

    <link rel="stylesheet" href="<?= base_url('AdminLTE') ?>/dist/css/adminlte.min.css?v=3.2.0">


    <script nonce="00fb1c48-b1a9-42b5-85ea-2aa0db58af78">
        try {
            (function(w, d) {
                ! function(bS, bT, bU, bV) {
                    bS[bU] = bS[bU] || {};
                    bS[bU].executed = [];
                    bS.zaraz = {
                        deferred: [],
                        listeners: []
                    };
                    bS.zaraz.q = [];
                    bS.zaraz._f = function(bW) {
                        return async function() {
                            var bX = Array.prototype.slice.call(arguments);
                            bS.zaraz.q.push({
                                m: bW,
                                a: bX
                            })
                        }
                    };
                    for (const bY of ["track", "set", "debug"]) bS.zaraz[bY] = bS.zaraz._f(bY);
                    bS.zaraz.init = () => {
                        var bZ = bT.getElementsByTagName(bV)[0],
                            b$ = bT.createElement(bV),
                            ca = bT.getElementsByTagName("title")[0];
                        ca && (bS[bU].t = bT.getElementsByTagName("title")[0].text);
                        bS[bU].x = Math.random();
                        bS[bU].w = bS.screen.width;
                        bS[bU].h = bS.screen.height;
                        bS[bU].j = bS.innerHeight;
                        bS[bU].e = bS.innerWidth;
                        bS[bU].l = bS.location.href;
                        bS[bU].r = bT.referrer;
                        bS[bU].k = bS.screen.colorDepth;
                        bS[bU].n = bT.characterSet;
                        bS[bU].o = (new Date).getTimezoneOffset();
                        if (bS.dataLayer)
                            for (const ce of Object.entries(Object.entries(dataLayer).reduce(((cf, cg) => ({
                                    ...cf[1],
                                    ...cg[1]
                                })), {}))) zaraz.set(ce[0], ce[1], {
                                scope: "page"
                            });
                        bS[bU].q = [];
                        for (; bS.zaraz.q.length;) {
                            const ch = bS.zaraz.q.shift();
                            bS[bU].q.push(ch)
                        }
                        b$.defer = !0;
                        for (const ci of [localStorage, sessionStorage]) Object.keys(ci || {}).filter((ck => ck.startsWith("_zaraz_"))).forEach((cj => {
                            try {
                                bS[bU]["z_" + cj.slice(7)] = JSON.parse(ci.getItem(cj))
                            } catch {
                                bS[bU]["z_" + cj.slice(7)] = ci.getItem(cj)
                            }
                        }));
                        b$.referrerPolicy = "origin";
                        b$.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(bS[bU])));
                        bZ.parentNode.insertBefore(b$, bZ)
                    };
                    ["complete", "interactive"].includes(bT.readyState) ? zaraz.init() : bS.addEventListener("DOMContentLoaded", zaraz.init)
                }(w, d, "zarazData", "script");
            })(window, document)
        } catch (e) {
            throw fetch("/cdn-cgi/zaraz/t"), e;
        };
    </script>

    <script src="<?= base_url('AdminLTE') ?>/plugins/jquery/jquery.min.js"></script>

    <script src="<?= base_url('AdminLTE') ?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?= base_url('AdminLTE') ?>/plugins/sweetalert2/sweetalert2.min.js"></script>

    <!-- DataTables  & Plugins -->
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/jszip/jszip.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/pdfmake/vfs_fonts.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.print.min.js"></script>
    <script src="<?= base_url('AdminLTE') ?>/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

    <script src="<?= base_url('AdminLTE') ?>/dist/js/adminlte.min.js?v=3.2.0"></script>

    <!-- Auto Numeric -->
    <script src="<?= base_url('autoNumeric') ?>/src/AutoNumeric.js"></script>

    <!-- Terbilang -->
    <script src="<?= base_url('terbilang') ?>/terbilang.js"></script>

</head>

<body class="hold-transition layout-top-nav">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
            <div class="container">
                <a href="<?= base_url('Admin') ?>" class="navbar-brand">
                    <span style="font-variant:small-caps;"><i class="fa fa-shopping-cart text-primary fa-2x"></i> Transaksi Penjualan</span>
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    <li class="nav-item">
                        <?php if (session()->get('level') == '1') { ?>
                            <a class="nav-link" href="<?= base_url('Admin') ?>">
                                <i class="fas fa-tachometer-alt"></i> <b>Dashboard</b>
                            </a>
                        <?php } else { ?>
                            <a class="nav-link" href="<?= base_url('Home/Logout') ?>">
                                <i class="fas fa-sign-out-alt"></i> <b>Logout</b>
                            </a>
                        <?php } ?>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="content-wrapper">
            <div class="content">
                <div class="row">
                    <div class="col-lg-7">
                        <div class="card card-danger card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>No Faktur</label>
                                            <label class="form-control form-control-lg" style="color:red;font-weight:bold;" readonly><?= $no_faktur ?></label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Tanggal</label>
                                            <label class="form-control form-control-lg" readonly><?= date('d M Y') ?></label>

                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Jam</label>
                                            <label class="form-control form-control-lg" id="jam" readonly></label>
                                        </div>
                                    </div>

                                    <div class="col-3">
                                        <div class="form-group">
                                            <label>Kasir</label>
                                            <label class="form-control form-control-lg" style="color:red;font-weight:bold;" readonly><?= session()->get('nama') ?></label>

                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- form jumlah -->
                    <div class="col-lg-5">
                        <div class="card card-warning card-outline">
                            <div class="card-header text-center">
                                <h6 class="card-title m-0"></h6>
                            </div>
                            <div class="card-body text-right" style="background:white url(//www.html.am/images/backgrounds/background-image-2.gif)">
                                <label class="display-4 text-purple">Rp. <?= number_format($grand_total, 0) ?>.-</label>
                            </div>
                        </div>
                    </div>

                    <!-- allert -->
                    <div class="col-12">
                        <?php
                        if (session()->getFlashdata('pesan')) {
                            echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
                            <span class="badge badge-pill badge-success">Success</span>
                            
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            ';
                            echo session()->getFlashdata('pesan');
                            echo '</div>';
                        } ?>
                    </div>

                    <!-- form tambah penjualan -->
                    <div class="col-lg-12">
                        <div class="card card-success card-outline">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <?php echo form_open('Penjualan/InsertCart') ?>
                                        <div class="row">
                                            <div class="col-3 input-group">
                                                <input name="kode_produk" style="font-weight: bold; font: size 12pt;" id="kode_produk" class="form-control" placeholder="Kode Produk / Barcode" autocomplete="off">
                                                <span class="input-group-append">
                                                    <a class="btn btn-info" data-toggle="modal" data-target="#cari-produk">
                                                        <i class="fa fa-search"></i>
                                                    </a>
                                                    <button type="reset" class="btn btn-danger">
                                                        <i class="fa fa-times"></i>
                                                    </button>
                                                </span>
                                            </div>
                                            <div class="col-3">
                                                <input name="nama_produk" style="font-weight: bold; font: size 12pt;" class="form-control" placeholder="Nama Produk" readonly>
                                            </div>
                                            <div class="col-1" hidden>
                                                <input name="nama_kategori" class="form-control" placeholder="Kategori" readonly>
                                            </div>
                                            <div class="col-1" hidden>
                                                <input name="nama_satuan" class="form-control" placeholder="Satuan" readonly>
                                            </div>
                                            <div class="col-1">
                                                <input name="harga_jual" style="font-weight: bold; font: size 12pt;" class="form-control" placeholder="Harga" readonly>
                                            </div>
                                            <div class="col-1">
                                                <input id="qty" type="number" style="font-weight: bold; font: size 12pt;" min="1" value="1" name="qty" class="form-control text-center" placeholder="Qty">
                                            </div>
                                            <input name="harga_beli" type="hidden">
                                            <div class="col-3">
                                                <button class="btn btn-primary" type="submit" hidden><i class="fa fa-cart-plus"></i></button>
                                                <a href="<?= base_url('Penjualan/ResetCart') ?>" class="btn btn-warning"><i class="fa fa-ban"></i></a>
                                                <a class="btn btn-success" data-toggle="modal" data-target="#pembayaran" id="btnSimpanTransaksi" onclick="Pembayaran()"><i class="fa fa-cash-register"></i></a>
                                            </div>
                                        </div>
                                        <?php echo form_close() ?>
                                    </div>
                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr class="text-center">
                                                    <th width="10px">NO</th>
                                                    <th width="250px">KODE PRODUK/BARCODE</th>
                                                    <th>NAMA PRODUK</th>
                                                    <th>KATEGORI</th>
                                                    <th>HARGA</th>
                                                    <th>QTY</th>
                                                    <th>TOTAL</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <?php $no = 1; ?>
                                            <tbody>
                                                <?php foreach ($cart as $key => $value) { ?>
                                                    <tr>
                                                        <td class="text-center"><?= $no++ ?></td>
                                                        <td><?= $value['id'] ?></td>
                                                        <td><?= $value['name'] ?></td>
                                                        <td><?= $value['options']['nama_kategori'] ?></td>
                                                        <td class="text-right">@Rp. <?= number_format($value['price'], 0) ?>.-</td>
                                                        <td class="text-center"><?= $value['qty'] ?> <?= $value['options']['nama_satuan'] ?></td>
                                                        <td class="text-right">Rp. <?= number_format($value['subtotal'], 0) ?></td>
                                                        <td class="text-center">
                                                            <a href="<?= base_url('Penjualan/RemoveItemCart/' . $value['rowid']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></a>
                                                        </td>
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- form terbilang -->
                    <div class="col-lg-12">
                        <div class="card card-pink card-outline">
                            <div class="card-header text-center">
                                <h6 class="card-title m-0"></h6>
                            </div>
                            <div class="card-body text-center" style="background:white url(//www.html.am/images/backgrounds/background-image-2.gif)">
                                <h1 class="text-pink" style="font-weight:bold;" id="terbilang"></h1>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- modal cari produk -->
        <div class="modal fade" id="cari-produk">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Pencarian Data Produk</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table id="example1" class="table table-bordered table-striped text-sm">
                            <thead>
                                <tr class="text-center">
                                    <th>No</th>
                                    <th>Kode Produk/Barcode</th>
                                    <th>Nama Produk</th>
                                    <th>Harga</th>
                                    <th>Stok</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                foreach ($produk as $key => $value) {
                                ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['kode_produk'] ?></td>
                                        <td><?= $value['nama_produk'] ?></td>
                                        <td><?= $value['harga_jual'] ?></td>
                                        <td><?= $value['stok'] ?></td>
                                        <td>
                                            <button onclick="PilihProduk(<?= $value['kode_produk'] ?>)" class="btn btn-success btn-xs"> Pilih</button>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal pembayaran -->
        <div class="modal fade" id="pembayaran">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Transaksi Pembayaran</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?php echo form_open('Penjualan/SimpanTransaksi') ?>

                        <div class="form-group">
                            <label form="">Total</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input name="grand_total" id="grand_total" value="<?= number_format($grand_total, 0) ?>" class="form-control form-control-lg text-right text-danger" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label form="">Cash</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input name="cash" id="cash" class="form-control form-control-lg text-right text-success" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <label form="">Kembali</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp.</span>
                                </div>
                                <input name="kembalian" id="kembali" class="form-control form-control-lg text-right text-primary" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Transaksi</button>
                    </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>


        <footer class="main-footer">
            <strong>TOKO &copy; <a href="https://adminlte.io">MARIMO</a></strong>CNA19.
        </footer>
    </div>

    <script>
        $(document).ready(function() {
            $('#kode_produk').focus();
            <?php
            if ($grand_total == 0) { ?>
                document.getElementById('terbilang').innerHTML = 'Nol Rupiah';
            <?php } else { ?>
                document.getElementById('terbilang').innerHTML = terbilang(<?= $grand_total ?>) + ' Rupiah';
            <?php } ?>
            $('#kode_produk').keydown(function(e) {
                let kode_produk = $('#kode_produk').val();
                if (e.keyCode == 13) {
                    e.preventDefault();
                    if (kode_produk == '') {
                        Swal.fire({
                            title: "Kode Produk Masih Kosong !",
                            icon: "question",
                            backdrop: `
                                rgba(0,0,123,0.4)
                                url("<?= base_url('AdminLTE') ?>/dist/img/nyan-chat.gif")
                                right top
                                no-repeat
                            `
                        });
                    } else {
                        CekProduk();
                    }
                }
            });

            $(this).keydown(function(e) {
                if (e.keyCode == 27) {
                    e.preventDefault();
                    $('#kode_produk').focus();
                }
            });

            // hitung kembalian
            $('#cash').keyup(function(e) {
                HitungKembalian();
            });
        });

        function CekProduk() {
            $.ajax({
                type: "POST",
                url: "<?= base_url('penjualan/CekProduk') ?>",
                data: {
                    kode_produk: $('#kode_produk').val(),
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.nama_produk == '') {
                        Swal.fire({
                            title: "Kode Produk Tidak Terdaftar !",
                            icon: "error",
                            backdrop: `
                                rgba(0,0,123,0.4)
                                url("<?= base_url('AdminLTE') ?>/dist/img/shigure-ui-dance.gif")
                                right top
                                no-repeat
                            `
                        });
                    } else {
                        $('[name="nama_produk"]').val(response.nama_produk);
                        $('[name="nama_kategori"]').val(response.nama_kategori);
                        $('[name="nama_satuan"]').val(response.nama_satuan);
                        $('[name="harga_jual"]').val(response.harga_jual);
                        $('[name="harga_beli"]').val(response.harga_beli);
                        $('#qty').focus();
                    }
                }
            });
        }

        function PilihProduk(kode_produk) {
            $('#kode_produk').val(kode_produk);
            $('#cari-produk').modal('hide');
            $('#kode_produk').focus();
        }

        function Pembayaran() {
            $('#pembayaran').modal('show');
            $('#cash').focus();
        }

        new AutoNumeric('#cash', {
            digitGroupSeparator: ',',
            decimalPlaces: 0
        });

        function HitungKembalian() {
            let grand_total = $('#grand_total').val().replace(/[^.\d]/g, '').toString();
            let cash = $('#cash').val().replace(/[^.\d]/g, '').toString();

            let kembalian = parseFloat(cash) - parseFloat(grand_total);
            $('#kembali').val(kembalian);

            new AutoNumeric('#kembali', {
                digitGroupSeparator: ',',
                decimalPlaces: 0

            });
        }
    </script>

    <script>
        //datatable cari produk
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "lengthChange": true,
                "autoWidth": false,
                "paging": true,
                "info": true,
                "ordering": false,
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

            //$('.swalDefaultSuccess').click(function() {
            //    Toast.fire({
            //        icon: 'success',
            //        title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            //    })
            //});
        });
    </script>

    <script>
        // jam realtime
        window.onload = function() {
            startTime();
        }

        function startTime() {
            var today = new Date();
            var h = today.getHours();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('jam').innerHTML = h + ':' + m + ':' + s;
            var t = setTimeout(function() {
                startTime();
            }, 1000);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }
            return i;
        }
    </script>
</body>

</html>