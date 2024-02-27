<div class="col-md-12">
    <div class="card">
        <div class="card-header bg-flat-color-2 text-white">
            <strong class="card-title"><?= $subjudulv ?><small></strong>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="row form-group">
                        <div class="col col-md-2">
                            <label class="col-form-label"><b>Tanggal : </b></label>
                        </div>
                        <div class="col col-10 input-group">
                            <input type="date" name="tgl" id="tgl" class="form-control">
                            <span class="input-group-append">
                                <button onclick="ViewTabelLaporan()" class="btn btn-warning">
                                    <i class="fa fa-file-text"></i> View Report
                                </button>
                                <button onclick="PrintLaporan()" class="btn btn-success btn-flat">
                                    <i class="fa fa-print"></i> Print Report
                                </button>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12">
                    <hr>
                    <div class="Table">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function ViewTabelLaporan() {
        let tgl = $('#tgl').val();
        if (tgl == "") {
            Swal.fire({
                title: "Tanggal Belum Dipilih !",
                backdrop: `
                    rgba(0,0,123,0.2)
                    url("<?= base_url('AdminLTE') ?>/dist/img/sdg.gif")
                    left top
                    no-repeat
                `
            });
        } else {
            $.ajax({
                type: "POST",
                url: "<?= base_url('Laporan/ViewLaporanHarian') ?>",
                data: {
                    tgl: tgl,
                },
                dataType: "JSON",
                success: function(response) {
                    if (response.data) {
                        $('.Table').html(response.data)
                    }
                }
            });
        }
    }

    function PrintLaporan() {
        let tgl = $('#tgl').val();
        if (tgl == "") {
            Swal.fire({
                title: "Tanggal Belum Dipilih !",
                backdrop: `
                    rgba(0,0,123,0.2)
                    url("<?= base_url('AdminLTE') ?>/dist/img/sdg.gif")
                    left top
                    no-repeat
                `
            });
        } else {
            NewWin=window.open('<?= base_url('Laporan/PrintLaporanH') ?>/' + tgl, 'NewWin', 'toolbar=no, width=1150, height=600, scrollbars=yes');
        }
    }
</script>