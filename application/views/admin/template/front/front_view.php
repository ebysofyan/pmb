<!-- Page Content -->
<div class="container" style="margin-top: 16px;">

    <h4 style="text-align: center; margin-bottom: 21px;">List Prodi Yang Tersedia</h4>
    <div class="row">
        <?php foreach ($prodis as $key => $prodi): ?>
            <div class="col-md-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h5 style="text-align: center;"><?php echo $prodi->name ?></h5>
                    </div>
                    <div class="panel-body">
                        <h6 style="text-align: center;">Biaya Pendaftaran
                            : <?php echo money_formatter($prodi->cost) ?></h6>
                        <a href="<?php echo site_url() ?>front/register/<?php echo $prodi->id ?>"
                           class="btn btn-primary btn-block">Daftar <i class="fa fa-chevron-right"></i></a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <!-- /.row -->

    <hr>

</div>
<!-- /.container -->

</body>

</html>