<br />
<br />
<br />


      <center><div class="col-md-8"></center>
          <!-- Widget: user widget style 1 -->

          <div class="box box-widget widget-user">
            <!-- Add the bg color to the header using any of the bg-* classes -->
            <div class="widget-user-header bg-aqua-active">
              <h3 class="widget-user-username">Profile User</h3>
              <h5 class="widget-user-desc">Perpustakaan</h5>
            </div>
            <div class="widget-user-image">
              <img class="img-circle" src="<?= base_url('foto/'. session()->get('foto_user')) ?>" alt="User Avatar">
            </div>
            <div class="box-footer">
              <div class="row">
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4 border-right">
                  <div class="description-block">
                   
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
                <div class="col-sm-4">
                  <div class="description-block">
    
                  </div>
                  <!-- /.description-block -->
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
          <br />
          <br />
              <!-- /.widget-user-image -->
            </div>
            <div class="box-footer no-padding">
              <ul class="nav nav-stacked">
                <li><a href="#"><?= $user->nama_user ?>  <span class="glyphicon glyphicon-user form-control-feedback"></span></a></li>
                <li><a href="#"><?= $user->username ?>  <span class="glyphicon glyphicon-envelope form-control-feedback"></span></a></li>
                <li><a href="#"><?= $user->tlp ?>   <span class="glyphicon glyphicon-earphone form-control-feedback"></span></a></li>
                <li><a href="#"><?= $user->level ?>   <span class="glyphicon glyphicon-pushpin form-control-feedback"></span></a></li>
                <li>
                 <a href="#"></a>
                </li>
                
                <li>
                 <div class="pull-left">
                  <a href="<?= base_url('home') ?>" class="btn btn-default btn-flat">Kembali</a>
                </div>
                <div class="pull-right">
                  <a href="/user/ubah/<?= $user->id_user ?>" class="btn btn-default btn-flat">Edit</a>
                </div>


              </li>
              </ul>
            </div>
          </div>
            
          <!-- /.widget-user -->
        </div>