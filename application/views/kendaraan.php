<div class="container-fluid py-4 ">
    <div class="row">
        <div class="col-12">
            <div class="card my-4 ">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2 ">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"><?= $title; ?></h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="card-tools mx-4">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newKendaraanModal">
                                <i class=" fas fa-plus"></i>
                                Add New Kendaraan
                            </button>
                            <?php
                            if ($this->session->flashdata('pesan')) {
                                echo '<div class="alert alert-success alert-dismissible text-white" role="alert">
                                <span class="text-sm">' . $this->session->flashdata('pesan') . '</span>';
                                echo '<button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button></div>';
                            }
                            ?>
                        </div>
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-center text-secondary text-sm font-weight-bolder opacity-7">No</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Nama Kendaraan</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Plat Nomor</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Status</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1;
                                foreach ($kendaraan as $k => $value) {
                                ?>
                                    <tr>

                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm"><?= $no++; ?></h6>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $value->mobil ?></span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $value->plat_nomor ?></span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <?php
                                            if ($value->status == 1) {
                                                echo '<span class="badge badge-sm bg-gradient-success">Sudah Dipesan</span>';
                                            } else {
                                                echo '<span class="badge badge-sm bg-gradient-danger">Ready</span>';
                                            }
                                            ?>
                                        </td>
                                        <?php if ($this->session->userdata('role_id') == 1) { ?>
                                            <td class="align-middle">
                                                <button data-bs-toggle="modal" data-bs-target="#edit<?= $value->id_kendaraan ?>" class="btn btn-warning btn-sm text-white font-weight-bold text-xs"><i class="fa fa-edit"></i> Edit</button>
                                                <button data-bs-toggle="modal" data-bs-target="#delete<?= $value->id_kendaraan ?>" class="btn btn-danger btn-sm text-white font-weight-bold text-xs"><i class="fa fa-trash"></i> Delete</button>
                                            </td>
                                        <?php } else { ?>

                                        <?php } ?>
                                    </tr>
                                <?php } ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="newKendaraanModal" tabindex="-1" role="dialog" aria-labelledby="newKendaraanModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newKendaraanModalLabel">Add New Kendaraan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="Kendaraan/add" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="col-form-label">Nama Kendaraan</label>
                        <input type="text" class="form-control" id="mobil" name="mobil" placeholder="Nama Kendaraan" required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Plat Nomor Kendaraan</label>
                        <input type="text" class="form-control" id="plat_nomor" name="plat_nomor" placeholder="Plat Nomor Kendaraan" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Kendaraan -->
<?php foreach ($kendaraan as $k => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_kendaraan ?>" tabindex="-1" role="dialog" aria-labelledby="newKendaraanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newKendaraanModalLabel">Edit Kendaraan</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Kendaraan/edit/' . $value->id_kendaraan); ?>
                <div class="modal-body">

                    <div class="form-group">
                        <label class="col-form-label">Nama Kendaraan</label>
                        <input type="text" class="form-control" value="<?= $value->mobil ?>" id="mobil" name="mobil" placeholder="Nama User" required>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Plat Nomor Kendaraan</label>
                        <input type="text" class="form-control" value="<?= $value->plat_nomor ?>" id="plat_nomor" name="plat_nomor" placeholder="Username" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Hapus Kendaraan -->
<?php foreach ($kendaraan as $k => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_kendaraan ?>" tabindex="-1" role="dialog" aria-labelledby="newKendaraanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newKendaraanModalLabel">Delete <?= $value->mobil ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Apakah anda ingin menghapus Kendaraan <?= $value->mobil ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('Kendaraan/delete/' . $value->id_kendaraan) ?>" type="submit" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>