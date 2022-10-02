<div class="container-fluid py-4 ">
    <div class="row">

        <div class="card card-primary card-outline card-outline-tabs">
            <div class="card-header p-0 border-bottom-0">
            </div>

            <div class="card-body">
                <div class="tab-content" id="custom-tabs-four-tabContent">
                    <div class="tab-pane fade show active" id="custom-tabs-four-home" role="tabpanel" aria-labelledby="custom-tabs-four-home-tab">
                        <table class="table table-bordered">
                            <tr class="text-center">
                                <th>No</th>
                                <th>Customer</th>
                                <th>Nomor HP</th>
                                <th>Sopir</th>
                                <th>Kendaraan</th>
                                <th>Plat Nomor</th>
                                <th>Status Keberangkatan</th>
                            </tr>
                            <?php $no = 1;
                            foreach ($laporan as $key => $value) {
                            ?>
                                <tr class="text-center">
                                    <td><?= $no++; ?></td>
                                    <td><?= $value->customer ?></td>
                                    <td><?= $value->no_hp ?></td>
                                    <td><?= $value->sopir ?></td>
                                    <td><?= $value->mobil ?></td>
                                    <td><?= $value->plat_nomor ?></td>
                                    <td><?php
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
            <div class="d-print-none">
                <div class="row">
                    <div class="col-1">
                        <button class="btn btn-primary" onclick="window.print()"><i class="fas fa-print"></i> Print</button>
                    </div>
                    <div class="col-2">
                        <a class="btn btn-primary"><i class="fas fa-print"></i> Export Excel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>