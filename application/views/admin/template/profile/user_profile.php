<div class="row">
    <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h5>Update Profil</h5>
            </div>
            <div class="panel-body">

                <?php echo $this->session->flashdata('pesan') ?
                    '<div class="alert alert-warning alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            ' . $this->session->flashdata('pesan') . '
                        </div>' : '' ?>

                <form class="" action="<?php echo site_url() ?>user/store" method="post"
                      enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo $user->id ?>">
                    <div class="form-group">
                        <label for="" class="control-label">Username</label>
                        <input type="text" name="username" class="form-control"
                               value="<?php echo $user->username ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Password</label>
                        <input type="password" name="password" class="form-control"
                               value="<?php echo $user->password ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="control-label">Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $user->name ?>">
                    </div>

                    <input type="submit" name="submit" value="Update Your Profile !!!"
                           class="btn btn-primary btn-block">
                </form>

            </div>
        </div>
    </div>
</div>