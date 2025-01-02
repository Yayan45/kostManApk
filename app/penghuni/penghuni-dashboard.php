<?php

include '../../actions/koneksi.php';

ob_start();
session_start();

if (!isset($_SESSION['akun_id'])) {
  header("location: ../../../../index.html");
} elseif (isset($_SESSION['akun_id'])) {
  if ($_SESSION['hak_akses'] == 1) {
    header("location: ../admin/admin-dashboard.php");
  } elseif ($_SESSION['hak_akses'] == 3) {
    header("location: ../calon-penghuni/calon-dashboard.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">KOSTMAN</div>
      </a>

      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="penghuni-dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>
      </li>

      <hr class="sidebar-divider">

      <div class="sidebar-heading">Fitur</div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="penghuni-kamar.php">
          <i class="fas fa-fw fa-bed"></i>
          <span>Kamar</span>
        </a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="penghuni-pembayaran.php">
          <i class="fas fa-fw fa-money-bill"></i>
          <span>Pembayaran</span>
        </a>
      </li>

      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>

    <div id="content-wrapper" class="d-flex flex-column">

      <div id="content">

        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <ul class="navbar-nav ml-auto">
            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo '(' . ($_SESSION['nama_akses']) . ') ' . ($_SESSION['akun_nama']);  ?></span>

                <?php
                $id = $_SESSION['akun_id'];
                $query = "SELECT * FROM pengguna WHERE id_pengguna = $id";
                $result = mysqli_query($conn, $query);

                while ($data = mysqli_fetch_array($result)) {
                  $foto = $data['foto_pengguna'] ? $data['foto_pengguna'] : 'none.png';
                ?>
                  <img class="img-profile rounded-circle" src="../../assets/img/uploadDb/<?php echo $foto; ?>">
                <?php
                }
                ?>
              </a>

              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="penghuni-settings-profil.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="penghuni-settings-rubah-password.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>

        <div class="container-fluid">

          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1><br>
          </div>

          <div class="container mt-5">
            <h1 class="text-center">Pengingat Pembayaran Kost</h1>
            <div id="timeline" class="list-group mt-4">
              <?php
              $id = $_SESSION['akun_id'];

              $query = "SELECT id_menghuni, tanggal_masuk FROM menghuni WHERE id_pengguna = $id";
              $result = mysqli_query($conn, $query);

              if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_array($result)) {
                  $id_menghuni = $data['id_menghuni'];
                  $tanggal_masuk = date('Y-m-d', strtotime($data['tanggal_masuk']));
                  echo "<a href='penghuni-pembayaran.php' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center border-0 shadow-sm mb-3 rounded'>
                          <div>
                              <h5 class='mb-1'>ID Menghuni: $id_menghuni</h5>
                              <small class='text-muted'>Tanggal Masuk: $tanggal_masuk</small>
                          </div>
                          <span class='badge bg-success rounded-pill countdown' data-tanggal='$tanggal_masuk'></span>
                        </a>";
                }
              } else {
                echo "<div class='alert alert-warning text-center' role='alert'>Tidak ada data ditemukan</div>";
              }
              ?>
            </div>
          </div>

        </div>

      </div>

      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; TechSolutions-2024</span>
          </div>
        </div>
      </footer>

    </div>

  </div>

  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ingin Keluar Aplikasi?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Pilih "Logout" dibawah jika anda ingin mengakhiri sesi.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="../../actions/process-logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>
  <script src="../../js/sb-admin-2.min.js"></script>
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <script>
    $(document).ready(function() {
      $('#sidebarToggleTop').on('click', function() {
        $('#accordionSidebar').toggleClass('toggled');
      });
    });

    $(document).ready(function() {
      $('#sidebarToggle').on('click', function() {
        $('#accordionSidebar').toggleClass('toggled');
      });
    });

    function calculateCountdown(tanggal) {
      var today = new Date();
      var targetDate = new Date(tanggal);

      var timeDiff = targetDate - today;
      var days = Math.floor(timeDiff / (1000 * 60 * 60 * 24));
      return days;
    }

    $('.countdown').each(function() {
      var tanggal = $(this).data('tanggal');
      var remainingDays = calculateCountdown(tanggal);
      $(this).text(remainingDays + ' days');
    });
  </script>

</body>

</html>