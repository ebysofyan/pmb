  <style media="screen">
    .no-border{
      border: 0px solid grey;
    }

    .list-group-item{
      font-size: 14px;
    }

    i{
      padding: 6px;
    }
  </style>

  <div class="col-md-3">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h5>Menu Utama</h5>
      </div>
      <div class="panel-body">
        <div class="list-group">
          <a href="<?php echo site_url() ?>leasing" class="list-group-item no-border <?php echo ($menu == 'leasing') ? 'active' : '' ?>">Leasing Cart <i class="fa fa-shopping-cart pull-right"></i></a>
          <a href="<?php echo site_url() ?>bow" class="list-group-item no-border <?php echo ($menu == 'bow') ? 'active' : '' ?>">Bow <i class="fa fa-briefcase pull-right"></i></a>
          <a href="<?php echo site_url() ?>bow/category" class="list-group-item no-border <?php echo ($menu == 'category') ? 'active' : '' ?>">Bow Category <i class="fa fa-briefcase pull-right"></i></a>
          <a href="<?php echo site_url() ?>bow/owner" class="list-group-item no-border <?php echo ($menu == 'owner') ? 'active' : '' ?>">Bow Owner <i class="fa fa-user pull-right"></i></a>
          <a href="<?php echo site_url() ?>user" class="list-group-item no-border <?php echo ($menu == 'user') ? 'active' : '' ?>">Change Profile <i class="fa fa-user pull-right"></i></a>
          <a href="<?php echo site_url() ?>setting" class="list-group-item no-border <?php echo ($menu == 'setting') ? 'active' : '' ?>">Setting <i class="fa fa-gear pull-right"></i></a>
        </div>
      </div>
    </div>
  </div>
