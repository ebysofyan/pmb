<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/bs/css/bootstrap.min.css">

    <style>
        thead:before, thead:after {
            display: none;
        }

        tbody:before, tbody:after {
            display: none;
        }
    </style>
</head>

<body>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 style="text-align: center">Semua Peserta</h3>
        </div>
        <div class="panel-body">
            <table id="tbl_trx" class="table table-bordered">
                <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Gender</th>
                    <th>Pend. Trkhir</th>
                    <th>Prodi</th>
                    <th>Biaya</th>
                    <th>Tanggal</th>
                    <th>Status</th>
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
                        <td><?php echo $transaksi->status ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script !src="">
    $('#tbl_trx').DataTable()
</script>

<body/>
<footer>

</footer>
<html/>