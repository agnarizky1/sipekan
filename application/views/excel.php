<style type="text/css">
    table,
    th,
    td {
        border-collapse: collapse;
        padding: 15px;
        margin: 10px;
        color: #000;
    }
</style>

<div style="text-align: center;">
    <span style="margin-left: 20px;font-size: 20px;"><b>Data Mahasiswa</b></span>
</div>
<br>
<table border="1">
    <thead>
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Nomor HP</th>
            <th>Sopir</th>
            <th>Kendaraan</th>
            <th>Plat Nomor</th>
            <th>Status Keberangkatan</th>
        </tr>
    </thead>
    <?php
    $no = 1;
    if ($data->num_rows() > 0) {
        foreach ($data->result() as $row) {
    ?>
            <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $row->customer; ?></td>
                <td><?php echo $row->no_hp; ?></td>
                <td width="300"><?php echo $row->sopir; ?></td>
                <td><?php echo $row->mobil; ?></td>
                <td><?php echo $row->plat_nomor; ?></td>
                <td><?php echo $row->keberangkatan; ?></td>
            </tr>

    <?php
        }
    }
    ?>
</table>