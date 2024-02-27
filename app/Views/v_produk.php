<div class="col-md-12">

    <?php
    if (session()->getFlashdata('pesan')) {
        echo '<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
        <span class="badge badge-pill badge-success">Success</span>
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        ';
        echo session()->getFlashdata('pesan');
        echo '</div>';
    }
    ?>

    <?php
    $errors = session()->getFlashdata('errors');
    if (!empty($errors)) { ?>
        <div class="alert alert-danger alert-dismissible">
            <h4>Periksa Lagi Entry Form !</h4>

            <?php foreach ($errors as $key => $error) { ?>
                <li><?= esc($error) ?></li>
            <?php } ?>

        </div>
    <?php } ?>


    <div class="card">
        <div class="card-header">
            <strong class="card-title">FORM PRODUK
                <button class="btn btn-primary btn-sm float-right mt-2" data-toggle="modal" data-target="#add-data"><i class="fa fa-plus"></i><b> Tambah Produk</b></button>
                <button type="button" onclick="NewWin=window.open('<?= base_url('Laporan/PrintDataProduk') ?>', 'NewWin', 'toolbar=no, width=1150, height=600, scrollbars=yes')" class="btn btn-tool btn-sm float-right mt-2"><i class="fa fa-print"></i><b> Print</b></button>
            </strong>
        </div>
        <div class="card-body">
            <table id="bootstrap-data-table" class="table table-striped table-bordered">
                <thead>
                    <tr class="text-center">
                        <th width="25px">No</th>
                        <th>Kode Produk / Barcode</th>
                        <th>Nama Produk </th>
                        <th>Kategori </th>
                        <th>Satuan </th>
                        <th>Harga Beli </th>
                        <th>Harga Jual </th>
                        <th>Stok </th>
                        <th width="100px">Aksi </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($produk as $key => $value) { ?>
                        <tr class="<?= $value['stok'] == 0 ? 'bg-info' : '' ?>">
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['kode_produk'] ?></td>
                            <td><?= $value['nama_produk'] ?></td>
                            <td class="text-center"><?= $value['nama_kategori'] ?></td>
                            <td class="text-center"><?= $value['nama_satuan'] ?></td>
                            <td class="text-right">Rp. <?= number_format($value['harga_beli'], 0) ?></td>
                            <td class="text-right">Rp. <?= number_format($value['harga_jual'], 0) ?></td>
                            <td class="text-center"><?= $value['stok'] ?></td>
                            <td class="text-center">
                                <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_produk'] ?>"><i class="fa fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value['id_produk'] ?>"><i class="fa fa-trash"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<!-- Modal tambah data -->
<div class="modal fade" id="add-data" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-mb" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Add Data <?= $subjudul ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Produk/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Kode Produk / Barcode</label>
                    <input name="kode_produk" class="form-control" value="<?= old('kode_produk') ?>" placeholder="Kode Produk" required>
                </div>
                <div class="form-group">
                    <label for="">Nama Produk</label>
                    <input name="nama_produk" class="form-control" value="<?= old('nama_produk') ?>" placeholder="Nama Produk" required>
                </div>
                <div class="form-group">
                    <label for="">Kategori</label>
                    <select name="id_kategori" class="form-control">
                        <option value="">--Pilih Kategori--</option>
                        <?php foreach ($kategori as $key => $value) { ?>
                            <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Satuan</label>
                    <select name="id_satuan" class="form-control">
                        <option value="">--Pilih Satuan--</option>
                        <?php foreach ($satuan as $key => $value) { ?>
                            <option value="<?= $value['id_satuan'] ?>"><?= $value['nama_satuan'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label form="">Harga Beli</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input name="harga_beli" id="harga_beli" class="form-control" value="<?= old('harga_beli') ?>" placeholder="Harga Beli" required>
                    </div>
                </div>
                <div class="form-group">
                    <label form="">Harga Jual</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Rp.</span>
                        </div>
                        <input name="harga_jual" id="harga_jual" class="form-control" value="<?= old('harga_jual') ?>" placeholder="Harga Jual" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="">Stok</label>
                    <input name="stok" type="number" value="<?= old('stok') ?>" class="form-control" placeholder="Stok" required>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary btn-flat">Save</button>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<!-- Modal edit data -->
<?php $no = 1;
foreach ($produk as $key => $value) { ?>
    <div class="modal fade" id="edit-data<?= $value['id_produk'] ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-mb" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Update Data <?= $subjudul ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Produk/UpdateData/' . $value['id_produk']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Kode Produk / Barcode</label>
                        <input name="kode_produk" class="form-control" value="<?= $value['kode_produk'] ?>" placeholder="Kode Produk" readonly>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Produk</label>
                        <input name="nama_produk" class="form-control" value="<?= $value['nama_produk'] ?>" placeholder="Nama Produk" required>
                    </div>
                    <div class="form-group">
                        <label for="">Kategori</label>
                        <select name="id_kategori" class="form-control">
                            <option value="">--Pilih Kategori--</option>
                            <?php foreach ($kategori as $key => $k) { ?>
                                <option value="<?= $k['id_kategori'] ?>" <?= $value['id_kategori'] == $k['id_kategori'] ? 'Selected' : '' ?>><?= $k['nama_kategori'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Satuan</label>
                        <select name="id_satuan" class="form-control">
                            <option value="">--Pilih Satuan--</option>
                            <?php foreach ($satuan as $key => $s) { ?>
                                <option value="<?= $s['id_satuan'] ?>" <?= $value['id_satuan'] == $s['id_satuan'] ? 'Selected' : '' ?>><?= $s['nama_satuan'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label form="">Harga Beli</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input name="harga_beli" id="harga_beli<?= $value['id_produk'] ?>" class="form-control" value="<?= $value['harga_beli'] ?>" placeholder="Harga Beli" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label form="">Harga Jual</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input name="harga_jual" id="harga_jual<?= $value['id_produk'] ?>" class="form-control" value="<?= $value['harga_jual'] ?>" placeholder="Harga Beli" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Stok</label>
                        <input name="stok" type="number" value="<?= $value['stok'] ?>" class="form-control" placeholder="Stok" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning btn-flat">Update</button>
                </div>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>

<!--Modall Hapus Data-->
<?php foreach ($produk as $key => $value) { ?>
    <div class="modal fade" id="delete-data<?= $value['id_produk'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    Apakah Anda Yakin Hapus <b><?= $value['nama_produk'] ?></b> ?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('Produk/DeleteData/' . $value['id_produk']) ?>" class="btn btn-danger btn-fla">Delete</button></a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>

<script type="text/javascript">
    $(document).ready(function() {
        $('#bootstrap-data-table').DataTable();
    });

    new AutoNumeric('#harga_jual', {
        digitGroupSeparator: ',',
        decimalPlaces: 0

    });

    new AutoNumeric('#harga_beli', {
        digitGroupSeparator: ',',
        decimalPlaces: 0,

    });

    <?php $no = 1;
    foreach ($produk as $key => $value) { ?>
        new AutoNumeric('#harga_jual<?= $value['id_produk'] ?>', {
            digitGroupSeparator: ',',
            decimalPlaces: 0

        });

        new AutoNumeric('#harga_beli<?= $value['id_produk'] ?>', {
            digitGroupSeparator: ',',
            decimalPlaces: 0,

        });
    <?php } ?>
</script>