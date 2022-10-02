<div class="container-fluid py-4">
    <div class="row">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><?= $title; ?></h3>
            </div>
            <!-- /.card-header -->
            <?php echo form_open('Pesanan/edit/' . $pesanan->id_pesanan); ?>
            <div class="card-body">

                <div class="form-group">
                    <div class="mb-3">
                        <label>Nama Customer</label>
                        <input name="customer" id="customer" value="<?= $pesanan->customer ?>" placeholder="Nama Lengkap" class="form-control mx-1">
                    </div>
                </div>

                <div class="from-group">
                    <label for="no_hp">Nomor HP Customer</label>
                    <input name="no_hp" id="no_hp" placeholder="Nomor Hp" value="<?= $pesanan->no_hp ?>" class="form-control mx-1">
                </div>

                <div class="form-group">
                    <label for="tanggal">Tanggal Keberangkatan</label>
                    <input type="date" name="tanggal" id="tanggal" value="<?= $pesanan->tanggal ?>" placeholder="Detail Pemilik Provider" class="form-control mx-1">
                </div>

                <div class="from-group">
                    <label for="kendaraan_id">Kendaraan</label>
                    <select name="kendaraan_id" id="kendaraan_id" class="form-control mx-1">
                        <option value="<?= $pesanan->kendaraan_id ?>"><?= $pesanan->mobil ?></option>
                        <?php foreach ($kendaraan as $kn) : ?>
                            <option value="<?= $kn->id_kendaraan ?>"> <?= $kn->mobil ?> </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="from-group">
                    <label for="driver_id">Sopir</label>
                    <select name="driver_id" id="driver_id" class="form-control mx-1">
                        <option value="<?= $pesanan->driver_id ?>"><?= $pesanan->sopir ?></option>
                        <option value="0">Pilih Driver</option>
                    </select>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-success">Simpan</button>
                    <button type="reset" class="btn btn-danger">Kembali</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script>
    $(document).ready(function() { // Ketika halaman sudah siap (sudah selesai di load)                                    
        $('#kendaraan_id').change(function() { // Ketika user mengganti atau memilih data provinsi
            var id = $(this).val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('Pesanan/getKendaraan')  ?>",
                data: {
                    id: id
                },
                dataType: "JSON",
                success: function(response) {
                    console.log(response);
                    $('#driver_id').html(response);

                }

            });
        });
    });
</script>