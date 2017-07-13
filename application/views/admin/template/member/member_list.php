<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-6">
                    <h4>Semua Peserta</h4>
                </div>
                <div class="col-md-6">
                    <a href="<?php echo site_url() ?>report/pdf" target="_blank"
                       class="btn btn-warning pull-right">Export
                        PDF&nbsp;&nbsp; <i class="fa fa-file-pdf-o"></i></a>
                </div>
            </div>
        </div>
        <div class="panel-body">
            <table id="tbl_trx" class="table table-bordered">
                <thead>
                <tr>
                    <th style="width: 3%;">No.</th>
                    <th style="width: 12%;">Nama</th>
                    <th style="width: 5%; max-width: 37%;">Gender</th>
                    <th style="width: 9%; max-width: 37%;">Pend. Trkhir</th>
                    <th style="width: 20%; max-width: 37%;">Prodi</th>
                    <th style="width: 10%; max-width: 37%;">Biaya</th>
                    <th style="width: 8%; max-width: 37%;">Tanggal</th>
                    <th style="width: 10%; max-width: 37%;">Kunci</th>
                    <th style="width: 6%; max-width: 37%;">Status</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($list_transaksi as $key => $transaksi): ?>
                    <tr>
                        <td><?php echo $key + 1 ?></td>
                        <td><?php echo $transaksi->name ?></td>
                        <td><?php echo $transaksi->gender ?></td>
                        <td><?php echo $transaksi->last_study ?></td>
                        <td><?php echo $transaksi->p_name ?></td>
                        <td><?php echo money_formatter($transaksi->cost) ?></td>
                        <td><?php echo $transaksi->created ?></td>
                        <td><b><?php echo $transaksi->key ?></b></td>
                        <td><label for="" class="label label-success"><?php echo $transaksi->status ?></label>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $('#tbl_trx').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
    })
</script>