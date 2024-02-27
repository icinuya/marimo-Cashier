<div class="row">
    <div class="col-12 text-center">
        <address>
            <!--  style="color: #A569BD;" -->
            <i class="fa fa-shopping-cart fa-4x" style="color: #A569BD;"></i><img src="<?= base_url('elaadmin-master') ?>/images/panellog-removebg-preview - Copy.png" alt="png"><br>
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
        <b>Tanggal :</b> <?= $tgl ?>
        <table class="table table-bordered table-striped">
            <tr class="text-center bg-secondary">
                <th>No</th>
                <th>Kode/Barcode</th>
                <th>Nama Produk</th>
                <th>Harga Beli</th>
                <th>Harga Jual</th>
                <th>QTY</th>
                <th>Total Harga</th>
                <th>Profit</th>
            </tr>
            <?php $no = 1;
            foreach ($dataharian as $key => $value) {
                $grandtotal[] = $value['subtotal'];
                $grandprofit[] = $value['profit'];
            ?>
                <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= $value['kode_produk'] ?></td>
                    <td><?= $value['nama_produk'] ?></td>
                    <td class="text-right">Rp. <?= number_format($value['modal'], 0) ?></td>
                    <td class="text-right">Rp. <?= number_format($value['harga'], 0) ?></td>
                    <td class="text-center"><?= $value['qty'] ?></td>
                    <td class="text-right">Rp. <?= number_format($value['subtotal'], 0) ?></td>
                    <td class="text-right">Rp. <?= number_format($value['profit'], 0) ?></td>
                </tr>
            <?php } ?>
            <tr class="text-center bg-secondary">
                <td colspan="6">
                    <h4><b>Grand Total</b></h4>
                </td>
                <td class="text-right">
                    Rp. <?= $dataharian == null ? '' : number_format(array_sum($grandtotal), 0) ?>
                </td>
                <td class="text-right">
                    Rp. <?= $dataharian == null ? '' : number_format(array_sum($grandprofit), 0) ?>
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