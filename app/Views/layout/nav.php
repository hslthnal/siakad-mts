<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <ul class="nav navbar-nav">
            <?php if (session()->get('level') == 1) { ?>
              <li class=""><a href="<?= base_url('admin') ?>">Dashboard <span class="sr-only">(current)</span></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Master <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?= base_url('guru') ?>">Guru</a></li>
                  <li><a href="<?= base_url('status') ?>">Status Pegawai</a></li>
                  <li><a href="<?= base_url('siswa') ?>">Siswa</a></li>
                  <li><a href="<?= base_url('user') ?>">Pengguna</a></li>
                  <li class="divider"></li>
                  <!-- <li><a href="<?= base_url('fakultas') ?>">Fakultas</a></li> -->
                  <li><a href="<?= base_url('gedung') ?>">Gedung</a></li> 
                  <li><a href="<?= base_url('ruangan') ?>">Ruangan</a></li>
                  <li><a href="<?= base_url('kelas') ?>">Kelas</a></li>
                  <li><a href="<?= base_url('ta') ?>">Tahun Akademik</a></li>
                </ul>
              </li>

              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?= base_url('ta/setting') ?>">Tahun Akademik Aktif</a></li>
                  <li><a href="<?= base_url('mapel') ?>">Mata Pelajaran</a></li>
                  <li><a href="<?= base_url('jadwalpelajaran') ?>">Jadwal Pelajaran</a></li>
                  <li><a href="<?= base_url('romkel') ?>">Rombongan Kelas</a></li>
                </ul>
              </li>
              <li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>

            <?php }elseif (session()->get('level') == 2) { ?>
              <li class=""><a href="<?= base_url('pengajar') ?>">Dashboard <span class="sr-only">(current)</span></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?= base_url('pengajar/jadwal') ?>">Jadwal Mengajar</a></li>
                </ul>
              </li>
              <li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>

            <?php }elseif(session()->get('level') == 3) { ?>
              <li class=""><a href="<?= base_url('murid') ?>">Dashboard <span class="sr-only">(current)</span></a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Akademik <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="<?= base_url('krs') ?>">Jadwal Pelajaran</a></li>
                </ul>
              </li>
              <li><a href="<?= base_url('auth/logout') ?>">Logout</a></li>
            <?php } ?>
          </ul>
          <form class="navbar-form navbar-left" role="search">
            <!-- <div class="form-group">
              <input type="text" class="form-control" id="navbar-search-input" placeholder="Search">
            </div> -->
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">

            <?php if (session()->get('username') == "") { ?>
                <li><a href="<?= base_url('auth') ?>"><i class="fa fa-sign-in"> Login</i></a></li>
            <?php }else{ ?>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <!-- The user image in the navbar-->
                <?php if (session()->get('level') == 1) { ?>
                  <img src="<?= base_url('foto/'.session()->get('foto'))  ?>" class="user-image" alt="User Image">
                <?php }elseif (session()->get('level') == 2) { ?>
                  <img src="<?= base_url('fotoguru/'.session()->get('foto'))  ?>" class="user-image" alt="User Image">
                <?php }else { ?>
                  <img src="<?= base_url('fotosiswa/'.session()->get('foto'))  ?>" class="user-image" alt="User Image">
                <?php } ?>
                
                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                <span class="hidden-xs"><?= session()->get('nama') ?></span>
              </a>
              <ul class="dropdown-menu text-center">
                <!-- The user image in the menu -->
                <li class="user-header">
                <?php if (session()->get('level') == 1) { ?>
                  <img src="<?= base_url('foto/'.session()->get('foto'))  ?>" class="image-circle" alt="User Image">
                <?php }elseif (session()->get('level') == 2) { ?>
                  <img src="<?= base_url('fotoguru/'.session()->get('foto'))  ?>" class="image-circle" alt="User Image">
                <?php }else { ?>
                  <img src="<?= base_url('fotosiswa/'.session()->get('foto'))  ?>" class="image-circle" alt="User Image">
                <?php } ?>

                <p>
                    <?= session()->get('nama') ?> - <?php if (session()->get('level') == 1) {
                      echo 'Administrator';
                    }elseif (session()->get('level') == 2) {
                      echo 'Guru';
                    }elseif (session()->get('level') == 3) {
                      echo 'Siswa';
                    } ?>
                    
                  </p>
                </li>
                
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="<?= base_url('auth/logout') ?>" class="btn btn-default btn-flat">Logout</a>
                  </div>
                </li>
              </ul>
            </li>
            <?php } ?>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>

  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
      <!-- Content Header (Page header) -->
      <!-- <section class="content-header">
        <h1>
          Top Navigation
          <small>Example 2.0</small>
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li><a href="#">Layout</a></li>
          <li class="active">Top Navigation</li>
        </ol>
      </section> -->

      <!-- Main content -->
      <section class="content">
