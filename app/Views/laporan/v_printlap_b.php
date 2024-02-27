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