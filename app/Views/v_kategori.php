<div class="col-md-12">
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
    }
    ?>
    <div class="card">
        <div class="card-header">
            <strong class="card-title">FORM KATEGORI<small>
                    <button class="btn btn-primary btn-sm float-right mt-1" data-toggle="modal" data-target="#add-data" type="button"><b>Tambah Kategori</b></button></small></strong>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th width="50px">No</th>
                    <th>Kategori </th>
                    <th width="100px">Aksi </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($kategori as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $value['nama_kategori'] ?></td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_kategori'] ?>"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value['id_kategori'] ?>"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<!-- Modal tambah data -->
<div class="modal fade" id="add-data" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticModalLabel">Add Data <?= $subjudul ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php echo form_open('Kategori/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Kategori</label>
                    <input name="nama_kategori" class="form-control" placeholder="Tambah Kategori" autocomplete="off" required>
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
<?php foreach ($kategori as $key => $value) { ?>
    <div class="modal fade" id="edit-data<?= $value['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Update Data <?= $subjudul ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Kategori/UpdateData/' . $value['id_kategori']) ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Kategori</label>
                        <input name="nama_kategori" value="<?= $value['nama_kategori'] ?>" class="form-control" placeholder="Update Kategori" required>
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

<!-- Modal delete data -->
<?php foreach ($kategori as $key => $value) { ?>
    <div class="modal fade" id="delete-data<?= $value['id_kategori'] ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Delete Data <?= $subjudul ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda Yakin Ingin Hapus Data <b><?= $value['nama_kategori'] ?></b> ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary btn-flat" data-dismiss="modal">Cancel</button>
                    <a href="<?= base_url('Kategori/DeleteData/' . $value['id_kategori']) ?>" class="btn btn-danger btn-flat">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>