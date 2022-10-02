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
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role_id</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Date Created</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1;
                                foreach ($pengguna as $p => $value) {
                                ?>
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    <img src="<?= base_url('assets/foto/') . $value->image ?>" class="avatar avatar-sm me-3 border-radius-lg" alt="user1">
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm"><?= $value->name ?></h6>
                                                    <p class="text-xs text-secondary mb-0"><?= $value->email ?></p>
                                                </div>
                                            </div>
                                        </td>

                                        <td>
                                            <?php
                                            if ($value->role_id == 1) {
                                                echo '<p class="text-xs font-weight-bold mb-0">Manager</p>';
                                            } else {
                                                echo '<p class="text-xs font-weight-bold mb-0">Admin</p>';
                                            }
                                            ?>

                                            <p class="text-xs text-secondary mb-0">Organization</p>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $value->password ?></span>
                                        </td>

                                        <td class="align-middle text-center text-sm">
                                            <?php
                                            if ($value->is_active == 1) {
                                                echo '<span class="badge badge-sm bg-gradient-success">Active</span>';
                                            } else {
                                                echo '<span class="badge badge-sm bg-gradient-danger">In Active</span>';
                                            }
                                            ?>
                                        </td>

                                        <td class="align-middle text-center">
                                            <span class="text-secondary text-xs font-weight-bold"><?= $value->date_created ?></span>
                                        </td>

                                        <td class="align-middle">
                                            <button data-toggle="modal" data-target="#edit<?= $value->id ?>" class="btn btn-warning btn-sm text-white font-weight-bold text-xs"><i class="fa fa-edit"></i> Edit</button>
                                            <button data-toggle="modal" data-target="#delete<?= $value->id ?>" class="btn btn-danger btn-sm text-white font-weight-bold text-xs"><i class="fa fa-trash"></i> Delete</button>
                                        </td>
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