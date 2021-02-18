  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <!--<div class="user-panel">
        <div class="pull-left image">
          <img src="<?php //echo $_SESSION['profile_img'] ?>" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php //echo $_SESSION['fullname'] ?></p>
          <!-- Status 
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
      <!--  </div>
      </div>-->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu pad-5-top" data-widget="tree">
        <?php /*echo empty($sidebar_menu) ? '<ul class="sidebar-menu" data-widget="tree">
            <li class="header" style="display: none;">HEADER</li>
            <!-- Optionally, you can add icons to the links -->
            <li class="active"><a href="#"><i class="fa fa-link"></i> <span>Link</span></a></li>
            <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-link"></i> <span>Multilevel</span>
                <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#">Link in level 2</a></li>
                <li><a href="#">Link in level 2</a></li>
              </ul>
            </li>
          </ul>' : $sidebar_menu; */
          foreach($_SESSION['side_menu'] as $key => $value) {
            $submenu_class = isset($_SESSION['side_menu'][$key]['submenu']) ? 'class="treeview" ' : '' ;
            //$pull_right = isset($_SESSION['side_menu'][$key]['submenu']) ? 'class="pull-right-container" ' : '' ;
            echo '<li '.$submenu_class.'>
                    <a href="'.$_SESSION['side_menu'][$key]['url'].'"><i class="'.$_SESSION['side_menu'][$key]['icon'].'"></i> <span>'.$key.'</span></a>';
                    if (isset($_SESSION['side_menu'][$key]['submenu'])){
                      echo '<ul class="treeview-menu">';
                      foreach ($_SESSION['side_menu'][$key]['submenu'] as $submenu => $value1) {
                        echo '<li><a href="'.$_SESSION['side_menu'][$key]['submenu'][$submenu]['url'].'"><span>'.$submenu.'</span></a></li>';
                      }
                      echo '</ul>';
                    }
            echo '</li>';
            
          }
        ?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>