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
                            <a href="<?= base_url('Pesanan/add'); ?>" class="btn btn-primary mb-3"> <i class="fa fa-plus"></i> Tambah Pesanan</a>
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
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Customer</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Nomor HP</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Sopir</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Kendaraan</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Plat Nomor</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Tanggal</th>
                                    <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder opacity-7">Status Keberangkatan</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1;
                                foreach ($pesanan as $p) :
                                ?>
                                    <tr>

                                        <td class="align-middle text-center">
                                            <h6 class="mb-0 text-sm"><?= $no++; ?></h6>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold"><?= $p['customer'] ?></span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold"><?= $p['no_hp'] ?></span>
                                        </td>
                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold"><?= $p['sopir'] ?></span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold"><?= $p['mobil'] ?></span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold"><?= $p['plat_nomor'] ?></span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-sm font-weight-bold"><?= $p['tanggal'] ?></span>
                                        </td>

                                        <td class="align-middle text-center">
                                            <?php
                                            if ($p['keberangkatan'] == 0) {
                                                echo '<span class="badge badge-sm bg-gradient-secondary">Menunggu</span>';
                                            }
                                            ?>
                                        </td>

                                        <td class="align-middle">
                                            <?php if ($this->session->userdata('role_id') == 1) { ?>
                                                <a href="<?= base_url('Pesanan/edit/' . $p['id_pesanan']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                                <button data-bs-toggle="modal" data-bs-target="#delete<?= $p['id_pesanan'] ?>" class="btn btn-danger btn-sm text-white font-weight-bold text-xs"><i class="fa fa-trash"></i> Delete</button>
                                                <button data-bs-toggle="modal" data-bs-target="#setuju<?= $p['id_pesanan'] ?>" class="btn btn-success btn-sm text-white font-weight-bold text-xs"><i class="fa fa-trash"></i> Proses</button>
                                            <?php } else { ?>

                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <?php if ($this->session->userdata('role_id') == 1) { ?>
                <div class="card card-primary card-outline card-outline-tabs">
                    <div class="card-header p-0 border-bottom-0">
                        <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="custom-tabs-four-home-tab" data-bs-toggle="pill" href="#custom-tabs-four-home" role="tab" aria-controls="custom-tabs-four-home" aria-selected="true">Diproses</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="custom-tabs-four-profile-tab" data-bs-toggle="pill" href="#custom-tabs-four-profile" role="tab" aria-controls="custom-tabs-four-profile" aria-selected="false">Selesai</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-four-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                                <table class="table table-bordered">
                                    <tr class="text-center">
                                        <th>No. Order</th>
                                        <th>Customer</th>
                                        <th>Nomor HP</th>
                                        <th>Sopir</th>
                                        <th>Kendaraan</th>
                                        <th>Plat Nomor</th>
                                        <th>Status Keberangkatan</th>
                                        <th>Action</th>
                                    </tr>
                                    <?php $no = 1;
                                    foreach ($diproses as $dp) :
                                    ?>
                                        <tr class="text-center">
                                            <td><?= $no++; ?></td>
                                            <td><?= $dp['customer'] ?></td>
                                            <td><?= $dp['no_hp'] ?></td>
                                            <td><?= $dp['sopir'] ?></td>
                                            <td><?= $dp['mobil'] ?></td>
                                            <td><?= $dp['plat_nomor'] ?></td>
                                            <td><?php
                                                if ($dp['keberangkatan']) {
                                                    echo '<span class="badge badge-sm bg-gradient-primary">Disetujui</span>';
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <button data-bs-toggle="modal" data-bs-target="#selesai<?= $dp['id_pesanan'] ?>" class="btn btn-success btn-sm text-white font-weight-bold text-xs"><i class="fa fa-check"></i> Proses</button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </table>
                            </div>

                            <div class="tab-pane fade" id="custom-tabs-four-profile" role="tabpanel" aria-labelledby="custom-tabs-four-profile-tab">
                                <table class="table table-bordered">
                                    <tr class="text-center">
                                        <th>No. Order</th>
                                        <th>Customer</th>
                                        <th>Nomor HP</th>
                                        <th>Sopir</th>
                                        <th>Kendaraan</th>
                                        <th>Plat Nomor</th>
                                        <th>Status Keberangkatan</th>
                                    </tr>
                                    <?php $no = 1;
                                    foreach ($selesai as $sl => $value) {
                                    ?>
                                        <tr class="text-center">
                                            <td><?= $no++; ?></td>
                                            <td><?= $value->customer ?></td>
                                            <td><?= $value->no_hp ?></td>
                                            <td><?= $value->sopir ?></td>
                                            <td><?= $value->mobil ?></td>
                                            <td><?= $value->plat_nomor ?></td>
                                            <td>
                                                <?php
                                                if ($value->keberangkatan) {
                                                    echo '<span class="badge badge-sm bg-gradient-success">Selesai</span>';
                                                }
                                                ?>
                                            </td>

                                        </tr>
                                    <?php } ?>
                                </table>
                            </div>
                        </div>
                    </div>
                <?php } else { ?>

                <?php } ?>
                <!-- /.card -->
                </div>
        </div>
    </div>
</div>


<!-- Modal Hapus Kendaraan -->
<?php foreach ($pesanan as $p) { ?>
    <div class="modal fade" id="delete<?= $p['id_pesanan'] ?>" tabindex="-1" role="dialog" aria-labelledby="newKendaraanModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newKendaraanModalLabel">Delete <?= $p['customer'] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h4>Apakah anda ingin menghapus Pesanan : <?= $p['customer'] ?></h4>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a href="<?= base_url('Pesanan/delete/' . $p['id_pesanan']) ?>" type="submit" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<!-- Modal Proses Kendaraan -->
<?php foreach ($pesanan as $p) { ?>
    <!-- MODAL KIRIM -->
    <div class="modal fade" id="setuju<?= $p['id_pesanan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $p['customer'] ?></h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php echo form_open('Pesanan/proses/' . $p['id_pesanan']) ?>

                    <table class="table">
                        <tr>
                            <th>Customer</th>
                            <th> : </th>
                            <td><?= $p['customer'] ?></td>
                        </tr>
                        <tr>
                            <th>Nomor HP</th>
                            <th>:</th>
                            <td><?= $p['no_hp'] ?></td>
                        </tr>
                        <tr>
                            <th>Sopir</th>
                            <th>:</th>
                            <td><?= $p['sopir'] ?></td>
                        </tr>
                        <tr>
                            <th>Kendaraan</th>
                            <th>:</th>
                            <td><?= $p['mobil'] ?></td>
                        </tr>
                        <tr>
                            <th>Plat Nomor</th>
                            <th>:</th>
                            <td><?= $p['plat_nomor'] ?></td>
                        </tr>
                    </table>


                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kirim</button>
                </div>
                <?php echo form_close() ?>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.MODAL KIRIM -->
<?php } ?>

<!-- Modal Proses Kendaraan -->
<?php foreach ($diproses as $dp) { ?>
    <!-- MODAL KIRIM -->
    <div class="modal fade" id="selesai<?= $dp['id_pesanan'] ?>">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title"><?= $dp['customer'] ?></h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php echo form_open('Pesanan/selesai/' . $dp['id_pesanan']) ?>
                <div class="modal-body">
                    <input name="id_kendaraan" id="id_kendaraan" value="<?= $dp['kendaraan_id'] ?>" hidden>
                    <h4>Apakah anda ingin menyelesaikan Pesanan : <?= $dp['customer'] ?></h4>

                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Selesai</button>
                </div>
                <?php echo form_close() ?>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.MODAL KIRIM -->
<?php } ?>