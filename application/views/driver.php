<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3"><?= $title; ?></h6>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <div class="table-responsive p-0">
                        <div class="card-tools mx-4">
                            <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#newDriverModal">
                                <i class=" fas fa-plus"></i>
                                Add New Driver
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
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Driver</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Kendaraan</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Plat Nomor</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1;
                                foreach ($driver as $d => $value) {
                                ?>
                                    <tr>

                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm"><?= $no++; ?></h6>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold"><?= $value->sopir ?></span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold"><?= $value->mobil ?></span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold"><?= $value->plat_nomor ?></span>
                                        </td>

                                        <?php if ($this->session->userdata('role_id') == 1) { ?>
                                            <td class="align-middle">
                                                <button data-bs-toggle="modal" data-bs-target="#edit<?= $value->id_driver ?>" class="btn btn-warning btn-sm text-white font-weight-bold text-xs"><i class="fa fa-edit"></i> Edit</button>
                                                <button data-bs-toggle="modal" data-bs-target="#delete<?= $value->id_driver ?>" class="btn btn-danger btn-sm text-white font-weight-bold text-xs"><i class="fa fa-trash"></i> Delete</button>
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
<div class="modal fade" id="newDriverModal" tabindex="-1" role="dialog" aria-labelledby="newDriverModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newDriverModalLabel">Add New Driver</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="Driver/add" method="POST">
                <div class="modal-body">

                    <div class="form-group">
                        <label class="col-form-label">Nama Kendaraan</label>
                        <select name="kendaraan_id" id="kendaraan_id" class="form-select">
                            <option selected>Pilih Kendaraan</option>
                            <?php foreach ($kendaraan as $d => $value) { ?>
                                <option value="<?= $value->id_kendaraan ?>"><?= $value->mobil ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Sopir</label>
                        <input type="text" class="form-control" id="sopir" name="sopir" placeholder="Nama Sopir" required>
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

<!-- Modal Edit Driver -->
<?php foreach ($driver as $d => $value) { ?>
    <div class="modal fade" id="edit<?= $value->id_driver ?>" tabindex="-1" role="dialog" aria-labelledby="newDriverModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newDriverModalLabel">Edit Driver</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Driver/edit/' . $value->id_driver); ?>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="col-form-label">Nama Kendaraan</label>
                        <select name="kendaraan_id" id="kendaraan_id" class="form-select">
                            <option selected>Pilih Kendaraan</option>
                            <?php foreach ($kendaraan as $d) : ?>
                                <option value="<?= $d->id_kendaraan ?>"><?= $d->mobil ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="col-form-label">Sopir</label>
                        <input type="text" class="form-control" id="sopir" name="sopir" placeholder="Nama Sopir" value="<?= $value->sopir ?>" required>
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
<?php foreach ($driver as $d => $value) { ?>
    <div class="modal fade" id="delete<?= $value->id_driver ?>" tabindex="-1" role="dialog" aria-labelledby="newKendaraanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newKendaraanModalLabel">Delete <?= $value->mobil ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Apakah anda ingin menghapus Sopir : <?= $value->sopir ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('Driver/delete/' . $value->id_driver) ?>" type="submit" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>