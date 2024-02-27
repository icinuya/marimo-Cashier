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
    } ?>

    <div class="card">
        <div class="card-header">
            <strong class="card-title">FORM USER<small>
                    <button class="btn btn-primary btn-sm float-right mt-1" data-toggle="modal" data-target="#add-data" type="button"><b>Tambah User</b></button></small></strong>
        </div>

        <table class="table table-bordered">
            <thead>
                <tr class="text-center">
                    <th width="50px">No</th>
                    <th>E-mail </th>
                    <th>Username </th>
                    <th>Password </th>
                    <th width="100px">Level </th>
                    <th width="100px">Aksi </th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                foreach ($user as $key => $value) { ?>
                    <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td><?= $value['email'] ?></td>
                        <td class="text-center"><?= $value['username'] ?></td>
                        <td class="text-center"><?= $value['password'] ?></td>
                        <td class="text-center"><?php
                                                if ($value['level'] == 1) { ?>
                                <span class="badge badge-success">Admin</span>
                            <?php } else { ?>
                                <span class="badge badge-info">Kasir</span>
                            <?php } ?>
                        </td>
                        <td class="text-center">
                            <button class="btn btn-warning btn-sm btn-flat" data-toggle="modal" data-target="#edit-data<?= $value['id_user'] ?>"><i class="fa fa-edit"></i></button>
                            <button class="btn btn-danger btn-sm btn-flat" data-toggle="modal" data-target="#delete-data<?= $value['id_user'] ?>"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
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
            <?php echo form_open('User/InsertData') ?>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama User</label>
                    <input name="nama" class="form-control" placeholder="Nama User" required>
                </div>

                <div class="form-group">
                    <label for="">E-mail</label>
                    <input name="email" class="form-control" placeholder="E-mail" required>
                </div>

                <div class="form-group">
                    <label for="">Username</label>
                    <input name="username" class="form-control" placeholder="Username" required>
                </div>

                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" name="password" class="form-control" placeholder="Password" required>
                </div>

                <div class="form-group">
                    <label for="">Level</label>
                    <select name="level" class="form-control">
                        <option value="">-- Pilih Level --</option>
                        <option value="1">Admin</option>
                        <option value="2">Kasir</option>
                    </select>
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
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="edit-data<?= $value['id_user'] ?>" tabindex="-1" role="dialog" aria-labelledby="staticModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-mb" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticModalLabel">Update Data <?= $subjudul ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('User/UpdateData/' . $value['id_user']) ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label for="">Nama User</label>
                        <input name="nama" value="<?= $value['nama'] ?>" class="form-control" placeholder="Update Nama User" required>
                    </div>

                    <div class="form-group">
                        <label for="">E-mail</label>
                        <input name="email" value="<?= $value['email'] ?>" class="form-control" placeholder="Update Email" required>
                    </div>

                    <div class="form-group">
                        <label for="">Username</label>
                        <input name="username" value="<?= $value['username'] ?>" class="form-control" placeholder="Update Username" required>
                    </div>

                    <div class="form-group">
                        <label for="">Password</label>
                        <input name="password" value="<?= $value['password'] ?>" class="form-control" placeholder="Update Password" required>
                    </div>

                    <div class="form-group">
                        <label for="">Level</label>
                        <select name="level" class="form-control">
                            <option value="1" <?= $value['level'] == 1 ? 'Selected' : '' ?>>Admin</option>
                            <option value="2" <?= $value['level'] == 2 ? 'Selected' : '' ?>>Kasir</option>
                        </select>
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
<?php foreach ($user as $key => $value) { ?>
    <div class="modal fade" id="delete-data<?= $value['id_user'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Delete Data <?= $subjudul ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    Anda Yakin Hapus Data Dengan Username <b><?= $value['username'] ?></b>
                    dan Berlevel <b><?php
                                    if ($value['level'] == 1) { ?>
                            <span class="badge badge-success">Admin</span>
                        <?php } else { ?>
                            <span class="badge badge-info">Kasir</span>
                        <?php } ?></b> ?
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Close</button>
                    <a href="<?= base_url('User/DeleteData/' . $value['id_user']) ?>" class="btn btn-danger btn-flat">Delete</button></a>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
<?php } ?>