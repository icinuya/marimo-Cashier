<div class="row">
    <div class="col-12 text-center">
        <address>
            <!-- style="color: #FF7F50;" -->
            <i class="fa fa-shopping-cart fa-4x" style="color: #FF7F50;"></i><img src="<?= base_url('elaadmin-master') ?>/images/panellog-removebg-preview - Copy.png" alt="png"><br>
            <strong style="font-family:Garamond, Georgia, Times, Serif">Toko MARIMO Serba Ada Serba Bisa</strong><br>
            <strong>Jl. Cinawin No. 19</strong><br>
            <strong>Ciherang</strong><br>
        </address>
    </div>

    <div class="col-12 text-center">
        <hr>
        <b>
            <h4><strong><?= $judul ?></strong></h4>
        </b><br>
    </div>

    <div class="col-12">
        <b>Bulan :</b> <?= $bulan ?> <b>Tahun :</b> <?= $tahun ?>
        <table class="table table-bordered table-striped">
            <tr class="text-center bg-secondary">
                <th>No</th>
                <th>Tanggal</th>
                <th>Total</th>
                <th>Profit</th>
            </tr>
            <?php $no = 1;
            foreach ($databulanan as $key => $value) {
                $grandtotal[] = $value['subtotal'];
                $grandprofit[] = $value['profit'];
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $value['tgl_jual'] ?></td>
                    <td class="text-right">Rp. <?= number_format($value['subtotal'], 0) ?></td>
                    <td class="text-right">Rp. <?= number_format($value['profit'], 0) ?></td>
                </tr>
            <?php } ?>
            <tr class="text-center bg-secondary">
                <td colspan="2">
                    <h4><b>Grand Total</b></h4>
                </td>
                <td class="text-right">
                    Rp. <?= $databulanan == null ? '' : number_format(array_sum($grandtotal), 0) ?>
                </td>
                <td class="text-right">
                    Rp. <?= $databulanan == null ? '' : number_format(array_sum($grandprofit), 0) ?>
                </td>
            </tr>
        </table>
    </div>
</div>

<style>
    img {
        width: 200px;
        /* Lebar gambar set ke 200 piksel */
        height: auto;
        /* Tinggi gambar disesuaikan secara otomatis untuk menjaga rasio aspek */
    }
</style>