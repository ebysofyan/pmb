<!-- Page Content -->
<div class="container" style="margin-top: 16px;">
    <?php echo $this->session->flashdata('pesan') ?
        '<div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            ' . $this->session->flashdata('pesan') . '
                        </div>
                        ' : '' ?>

    <h4 style="text-align: center; margin-bottom: 34px;">Prodi : <?php echo $prodi->name ?></h4>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form form action="<?php echo site_url() ?>front/doregister" method="post" class="panel panel-default"
                  enctype="multipart/form-data">
                <div class="panel-heading">
                    <h5>Informasi Peserta</h5>
                </div>
                <div class="panel-body">
                    <input type="hidden" name="prodi_id" value="<?php echo $prodi->id ?>">
                    <div class="form-group">
                        <label for="" class="control-label">Nama</label>
                        <input type="text" class="form-control" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Alamat</label>
                        <textarea name="alamat" rows="3" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Gender</label>
                        <div class="form-group">
                            <input type="radio" name="gender" value="pria" required> Pria &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="gender" value="wanita" required> Wanita
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Pendidikan Terakhir</label>
                        <div class="form-group">
                            <input type="radio" name="study" value="SMA" required> SMA &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="study" value="SMK" required> SMK &nbsp;&nbsp;&nbsp;
                            <input type="radio" name="study" value="MA" required> MA
                        </div>
                    </div>
                </div>
                <div class="panel-heading">
                    <h5>Administrasi</h5>
                </div>
                <div class="panel-body">
                    <div class="form-group">
                        <p><b>Key : <?php echo generate_stringdigit(16) ?></b></p>
                        <input type="hidden" name="key" value="<?php echo generate_stringdigit(16) ?>">
                    </div>
                    <div class="form-group">
                        <p><b>Total Bayar : <?php echo money_formatter($prodi->cost) ?></b></p>
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Metode Pembayaran</label>
                        <div class="form-group">
                            <input id="tunai" type="radio" name="bill_method" value="cash" required> Tunai &nbsp;&nbsp;&nbsp;
                            <input id="atm" type="radio" name="bill_method" value="atm" required> Transfer ATM
                        </div>
                        <div id="confirm-container">

                        </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary pull-right">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/js/jquery.js"></script>
<script !src="">
    $('#atm').on('click', function () {
        var formgroupopen = '<div id="confirm" class="form-group">'
        var label = '<label for="" class="control-label">Bukti Pembayaran</label>'
        var input = '<input type="file" class="form-control" name="validation" accept="image/*" required>'
        var formgroupclose = '</div>'
        var view = formgroupopen + label + input + formgroupclose

        $('#confirm').remove()
        $('#confirm-container').append(view)
    })

    $('#tunai').on('click', function () {
        $('#confirm').remove()
    })
</script>