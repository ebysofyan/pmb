<div class="container">
    <?php echo $this->session->flashdata('pesan') ?
        '<div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <p style="text-align: center; font-size: 16px;">' . $this->session->flashdata('pesan') . '</p>
                        </div>
                        ' : '' ?>

    <div class="panel panel-default">
        <div class="panel-heading">
            <h4>List Transaksi Peserta</h4>
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
                    <th style="width: 7%; max-width: 37%;">Pembayaran</th>
                    <th style="width: 8%; max-width: 37%;">Tanggal</th>
                    <th style="width: 10%; max-width: 37%;">Kunci</th>
                    <th style="width: 6%; max-width: 37%;">Status</th>
                    <th style="width: 8%; text-align: center">Aksi</th>
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
                        <td><?php echo $transaksi->bill_methode ?>
                            &nbsp;<?php echo $transaksi->bill_methode == 'atm' ? "<a href='#'  onclick='showModal(\"$transaksi->validation\")' class='btn btn-warning btn-sm'><i class='fa fa-eye'></i></a>" : '' ?></td>
                        <td><?php echo $transaksi->created ?></td>
                        <td><b><?php echo $transaksi->key ?></b></td>
                        <td><label for="" class="label label-danger"><?php echo $transaksi->status ?></label></td>
                        <td>
                            <div class="btn-group" style="text-align: center">
                                <a href="<?php echo site_url() ?>member/dotransaction/<?php echo $transaksi->id ?>"
                                   class="btn btn-success" onclick="return confirm('Konfirmasi transaksi ini')"><i
                                            class="fa fa-check"></i></a>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div id="modal" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Bukti Pembayaran</h4>
            </div>
            <div class="modal-body">
                <img id="bukti" alt="" style="width: 100%; height: 100%;">
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    function showModal(name) {
        $('#modal').modal()
        src = '<?php echo base_url() ?>' + "assets/upload/" + name
        $('#bukti').attr("src", src);
    }

    $('#tbl_trx').DataTable({
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
    })
</script>