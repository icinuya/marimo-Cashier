<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib">
                    <i class="ti-layout-grid2 text-warning border-warning"></i>
                </div>
                <div class="stat-content dib">
                    <div class="text-left dib">
                        <small class="text-muted text-uppercase font-weight-bold">Kategori</small>
                        <div class="stat-digit count"><?= $jmlkategori ?></div>
                    </div>
                    <div>
                        <a href="<?= base_url('Kategori') ?>" class="small-box-footer">More info <i class="ti ti-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib">
                    <i class="ti-package text-primary border-primary"></i>
                </div>
                <div class="stat-content dib">
                    <div class="text-left dib">
                        <small class="text-muted text-uppercase font-weight-bold">Produk</small>
                        <div class="stat-digit count"><?= $jmlproduk ?></div>
                    </div>
                    <div>
                        <a href="<?= base_url('Produk') ?>" class="small-box-footer">More info <i class="ti ti-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib">
                    <i class="ti-anchor text-success border-success"></i>
                </div>
                <div class="stat-content dib">
                    <div class="text-left dib">
                        <small class="text-muted text-uppercase font-weight-bold">Satuan</small>
                        <div class="stat-digit count"><?= $jmlsatuan ?></div>
                    </div>
                    <div>
                        <a href="<?= base_url('Satuan') ?>" class="small-box-footer">More info <i class="ti ti-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-3 col-md-6">
    <div class="card">
        <div class="card-body">
            <div class="stat-widget-one">
                <div class="stat-icon dib">
                    <i class="ti-user text-danger border-danger"></i>
                </div>
                <div class="stat-content dib">
                    <div class="text-left dib">
                        <small class="text-muted text-uppercase font-weight-bold">User</small>
                        <div class="stat-digit count"><?= $jmluser ?></div>
                    </div>
                    <div>
                        <a href="<?= base_url('User') ?>" class="small-box-footer">More info <i class="ti ti-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- pendapatan perhari -->
<div class="col-md-4">
    <div class="card text-white bg-flat-color-2">
        <div class="card-body">

            <div class="card-left pt-1 float-left">
                <h3 class="mb-0 fw-r">
                    <span class="currency float-left mr-1">Rp. </span>
                    <span class="stat-digit"><?= $todayincome == null ? 0 : number_format($todayincome['subtotal'], 0) ?></span>
                </h3>
                <p class="text-light mt-1 m-0"><b>today's income</b></p>
            </div><!-- /.card-left -->

            <div class="card-right float-right text-right">
                <div class="stat-icon">
                    <i class="icon fade-5 icon-lg pe-7s-cash"></i>
                </div>
            </div><!-- /.card-right -->
        </div>
    </div>
</div>

<!-- pendapatan perbulan -->
<div class="col-md-4">
    <div class="card text-white bg-flat-color-4">
        <div class="card-body">

            <div class="card-left pt-1 float-left">
                <h3 class="mb-0 fw-r">
                    <span class="currency float-left mr-1">Rp. </span>
                    <span class="stat-digit"><?= number_format($monthinc['subtotal'], 0) ?></span>
                </h3>
                <p class="text-light mt-1 m-0"><b>income this month</b></p>
            </div><!-- /.card-left -->

            <div class="card-right float-right text-right">
                <div class="stat-icon">
                    <i class="icon fade-5 icon-lg pe-7s-cash"></i>
                </div>
            </div><!-- /.card-right -->
        </div>
    </div>
</div>

<!-- pendapatan pertahun -->
<div class="col-md-4">
    <div class="card text-white bg-flat-color-6">
        <div class="card-body">

            <div class="card-left pt-1 float-left">
                <h3 class="mb-0 fw-r">
                    <span class="currency float-left mr-1">Rp. </span>
                    <span class="stat-digit"><?= number_format($yearscome['subtotal'], 0) ?></span>
                </h3>
                <p class="text-light mt-1 m-0"><b>income this year</b></p>
            </div><!-- /.card-left -->

            <div class="card-right float-right text-right">
                <div class="stat-icon">
                    <i class="icon fade-5 icon-lg pe-7s-cash"></i>
                </div>
            </div><!-- /.card-right -->
        </div>
    </div>
</div>




<div class="col-lg-12">
    <div class="card">
        <div class="card-body">
            <canvas id="myChart" width="95px" height="45px"></canvas>
        </div>
    </div>
</div><!-- /# column -->

<?php
if ($grafik == null) {
    $tgl[] = 0;
    $total[] = 0;
    $profit[] = 0;
} else {
    foreach ($grafik as $key => $value) {
        $tgl[] = $value['tgl_jual'];
        $total[] = $value['subtotal'];
        $profit[] = $value['profit'];
    }
} ?>

<script>
    const ctx = document.getElementById('myChart');
    const myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: <?= json_encode($tgl) ?>,
            datasets: [{
                    label: 'Grafik Pendapatan Penjualan Bulan <?= date('M-Y') ?>',
                    data: <?= json_encode($total) ?>,
                    backgroundColor: [
                        //'rgba(255, 99, 132, 0.2)',
                        //'rgba(255, 159, 64, 0.2)',
                        //'rgba(225, 205, 45, 0.2)',
                        //'rgba(75, 192, 192, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        //'rgba(153, 102, 255, 0.2)',
                        //'rgba(201, 203, 207, 0.2)',
                    ],
                    borderColor: [
                        //'rgb(255, 99, 132)',
                        //'rgb(255, 159, 64)',
                        //'rgb(255, 205, 86)',
                        //'rgb(75, 192, 192)',
                        'rgb(255, 159, 64)',
                        //'rgb(153, 102, 255)',
                        //'rgb(201, 203, 207)',
                    ],
                    borderWidth: 2
                },
                {
                    label: 'Grafik Keuntungan Penjualan Bulan <?= date('M-Y') ?>',
                    data: <?= json_encode($profit) ?>,
                    backgroundColor: [
                        'rgba(75, 192, 192, 0.2)',
                    ],
                    borderColor: [
                        'rgb(75, 192, 192)',
                    ],
                    borderWidth: 2
                }
            ]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<!--<script>
    $(document).ready(function() {
        // memformat uang
        $('.uang').mask('000.000.000.000.000', {
            reverse: true
        });


        if ($("#leaveReport").length) {
            const leaveReportCanvas = document.getElementById('leaveReport');
            new Chart(leaveReportCanvas, {
                type: 'bar',
                data: {
                    labels: ['Jan', 'Feb', 'March', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sept', 'Oct', 'Nov', 'Dec'],
                    datasets: [{
                        label: 'Bulan',
                        data: [65, 59, 80, 81, 56, 55, 40, 45],
                        backgroundColor: "#52CDFF",
                        borderColor: [
                            '#52CDFF',
                        ],
                        borderWidth: 0,
                        fill: true, // 3: no fill
                        barPercentage: 0.5,
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    elements: {
                        line: {
                            tension: 0.4,
                        }
                    },
                    scales: {
                        yAxes: {
                            display: true,
                            grid: {
                                display: false,
                                drawBorder: false,
                                color: "rgba(255,255,255,.05)",
                                zeroLineColor: "rgba(255,255,255,.05)",
                            },
                            ticks: {
                                beginAtZero: true,
                                autoSkip: true,
                                maxTicksLimit: 5,
                                fontSize: 10,
                                color: "#6B778C",
                                font: {
                                    size: 14,
                                }
                            }
                        },
                        xAxes: {
                            display: true,
                            grid: {
                                display: false,
                            },
                            ticks: {
                                beginAtZero: false,
                                autoSkip: true,
                                maxTicksLimit: 7,
                                fontSize: 14,
                                color: "#6B778C",
                                font: {
                                    size: 14,
                                }
                            }
                        }
                    },
                    plugins: {
                        legend: {
                            display: false,
                        }
                    }
                }
            });
        }


    });
</script>-->