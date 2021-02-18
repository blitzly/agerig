
<div >
  <div class="aligner" style="height:100vh;">
    <div class="aligner-item" style="width:25vw;">
        <form id="login-form">
          <!-- Profile Image -->
          <div class="card p-3">
            <img class="img-thumbnail rounded-circle mx-auto d-block" src="<?php echo '/img/topsys/topone-logo.png' ?>" alt="agerig logo">

            <h3 class="profile-username text-center">agerig</h3>

            <div class="card-body">
              <div class="row">
                <div class="form-group col-sm-12">
                    <label for="">Username</label>
                    <input type="text" class="form-control" id="username" placeholder="Username">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-12">
                    <label for="">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Password">
                </div>
              </div>
              <div class="row">
                <div class="form-group col-sm-12 text-center" id="add_err"></div>
              </div>
              <div class="row">
                <div class="form-group col-sm-12">
                    <a href="" class="btn btn-primary btn-block" id="btn-login">Login <span id="preloader"></span></a>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-12 text-center">
                  <a href="/">Back to home</a>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
            
          <!-- /.row -->
          <input type="hidden" name="defa_controller" id="defa_controller" value="<?php echo (Application::getConfig('default.controller')); ?>">
          <input type="hidden" name="defa_action" id="defa_action" value="<?php echo (Application::getConfig('default.action')); ?>">
        </form>
    </div>
  </div>
</div>



<?php
/*
 
  $roles = array(
    'master' => array(
      'name'         => 'Master',
      'capabilities' => array(
          'user_dashboard' => 'true',
          'user_edit' => 'true',
          'user_login' => 'true',
          'user_view' => 'true',
          'user_viewall' => 'true',
          'user_new' => 'true',
          'client_edit' => 'true',
          'client_new' => 'true',
          'client_view' => 'true',
          'client_viewall' => 'true'
        ),
      'menu' => array(
        'Dashboard' => array('url' => '/user/dashboard', 'icon' => 'fa fa-dashboard'),
        'Posts' => array('url' => '/post/viewall', 'icon' => 'fa fa-edit', 'submenu' => array(
          'All posts' => array('url' => '/post/viewall'),
          'Add new' => array('url' => '/post/new')
        )),
        'Clients' => array('url' => '/client/viewall', 'icon' => 'fa fa-users', 'submenu' => array(
          'All clients' => array('url' => '/client/viewall'),
          'Add new' => array('url' => '/client/new')
        )),
        'Users' => array('url' => '/user/viewall', 'icon' => 'fa fa-user', 'submenu' => array(
          'All users' => array('url' => '/user/viewall'),
          'Add new' => array('url' => '/user/new')
        )),
        'Products' => array('url' => '/product/viewall', 'icon' => 'fa fa-cube', 'submenu' => array(
          'All products' => array('url' => '/product/viewall'),
          'Add new' => array('url' => '/product/new')
        )),
        'Settings' => array('url' => '#', 'icon' => 'fa fa-cog', 'submenu' => array(
          'Terms' => array('url' => '/term/viewall'),
          'Taxonomies' => array('url' => '/term_taxonomies/viewall')
        ))
      )
    ),
    'administrator' => array(
      'name'         => 'Administrator',
      'capabilities' => array(
          'user_dashboard' => 'true',
          'user_edit' => 'true',
          'user_login' => 'true',
          'user_view' => 'true',
          'user_viewall' => 'true',
          'user_new' => 'true',
          'client_edit' => 'true',
          'client_new' => 'true',
          'client_view' => 'true',
          'client_viewall' => 'true'
        ),
      'menu' => array(
        'Dashboard' => array('url' => '/dashboard', 'icon' => 'fa fa-grind'),
        'Users' => array('url' => '/user/viewall', 'icon' => 'ion-android-contacts', 'submenu' => array(
          'All users' => array('url' => '/user/viewall' , 'icon' => 'ion-android-contacts'),
          'Add new' => array('url' => '/user/new' , 'icon' => 'fa fa-user-plus')
        )),
        'Clients' => array('url' => '/client/viewall', 'icon' => 'fa fa-users', 'submenu' => array(
          'All users' => array('url' => '/client/viewall' , 'icon' => 'fa fa-users'),
          'Add new' => array('url' => '/client/new' , 'icon' => 'fa fa-user-plus')
        ))
      )
    )
  );
  //serialize($roles);
  //echo '<pre>';
  //var_dump($roles);
  $seri = serialize($roles);
  echo '<br>' . $seri;
  //$unseri = unserialize($seri, ['allowed_classes' => false]);
  //var_dump($unseri);
  //echo '</pre>';
*/
?>