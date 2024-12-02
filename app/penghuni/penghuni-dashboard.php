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
  <meta name="viewport" content="width=1024">

  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Indiekost</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="penghuni-dashboard.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Fitur
      </div>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="penghuni-kamar.php">
          <i class="fas fa-fw fa-bed"></i>
          <span>Kamar</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="penghuni-pembayaran.php">
          <i class="fas fa-fw fa-money-bill"></i>
          <span>Pembayaran</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span
                  class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo '(' . ($_SESSION['nama_akses']) . ') ' . ($_SESSION['akun_nama']);  ?></span>

                <!-- foto profil -->

                <?php
                $id = $_SESSION['akun_id'];
                $query = "SELECT * FROM pengguna WHERE id_pengguna = $id";
                $result = mysqli_query($conn, $query);

                while ($data = mysqli_fetch_array($result)) {
                  if ($data['foto_pengguna'] == NULL) {
                ?>

                    <img class="img-profile rounded-circle" src="../../assets/img/none.png">
                  <?php } else { ?>

                    <img class="img-profile rounded-circle" src="../../assets/img/uploadDb/<?php print_r($data['foto_pengguna']);  ?>">

                <?php
                  }
                }
                ?>

                <!-- foto profil -->


              </a>
              <!-- Dropdown - User Information -->
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
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1><br>
          </div>

          <div class="container mt-5">
            <h1 class="text-center">Pengingat Pembayaran Kost</h1>
            <div id="timeline" class="list-group mt-4">
              <?php

              $id = $_SESSION['akun_id']; // ID pengguna yang sedang login

              // Query untuk mengambil data penghuni terkait
              $query = "SELECT id_menghuni, tanggal_masuk FROM menghuni WHERE id_pengguna = $id";
              $result = mysqli_query($conn, $query);

              if (mysqli_num_rows($result) > 0) {
                while ($data = mysqli_fetch_array($result)) {
                  $id_menghuni = $data['id_menghuni'];
                  $tanggal_masuk = date('Y-m-d', strtotime($data['tanggal_masuk']));
                  echo "<a href='#' class='list-group-item list-group-item-action d-flex justify-content-between align-items-center border-0 shadow-sm mb-3 rounded'>
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



          <!-- <div class="row">
            <div class="card col-12 mb-3">
              <div class="card-body">
                <h4 class="card-title">Profil</h4>
                <p class="card-text">Detail data diri anda</p>
                <?php
                include '../../actions/koneksi.php';

                if (isset($_SESSION['akun_id'])) {
                  $id_pengguna = $_SESSION['akun_id'];
                  $query = "SELECT * FROM pengguna WHERE id_pengguna = $id_pengguna";
                  $result = mysqli_query($conn, $query);

                  while ($data = mysqli_fetch_array($result)) {

                ?>
                    <div class="container-fluid pr-3">
                      <img src="<?php echo '../../assets/img/uploadDb/' . $data['foto_pengguna']; ?>" class="img-thumbnail mx-auto d-block mb-3 rounded"
                        width="300px">
                      <div class="table-respomsive pr-3">
                        <table class="table">
                          <tbody>
                            <tr>
                              <td class="font-weight-bold" width="30%">NIK</td>
                              <td><?php
                                  if ($data['no_ktp_pengguna'] == NULL) {
                                    echo '<span class="font-italic">Belum Dilengkapi</span>';
                                  } else {
                                    echo $data['no_ktp_pengguna'];
                                  } ?>
                              </td>
                            </tr>
                            <tr>
                              <td class="font-weight-bold" width="30%">Nama</td>
                              <td><?php echo $data['nama_pengguna']; ?></td>
                            </tr>
                            <tr>
                              <td class="font-weight-bold" width="30%">Telepon</td>
                              <td><?php echo $data['telepon_pengguna']; ?></td>
                            </tr>
                            <tr>
                              <td class="font-weight-bold" width="30%">Email</td>
                              <td><?php echo $data['email_pengguna']; ?></td>
                            </tr>
                            <tr>
                              <td class="font-weight-bold" width="30%">Tanggal Lahir</td>
                              <td><?php
                                  if ($data['tanggal_lahir_pengguna'] == '0000-00-00') {
                                    echo '<span class="font-italic">Belum Dilengkapi</span>';
                                  } else {
                                    echo $data['tanggal_lahir_pengguna'];
                                  } ?></td>
                            </tr>
                            <tr>
                              <td class="font-weight-bold" width="30%">Jenis Kelamin</td>
                              <td><?php
                                  if ($data['kelamin_pengguna'] == NULL) {
                                    echo '<span class="font-italic">Belum Dilengkapi</span>';
                                  } else {
                                    echo $data['kelamin_pengguna'];
                                  } ?></td>
                            </tr>
                            <tr>
                              <td class="font-weight-bold" width="30%">Alamat</td>
                              <td><?php
                                  if ($data['alamat_pengguna'] == NULL) {
                                    echo '<span class="font-italic">Belum Dilengkapi</span>';
                                  } else {
                                    echo $data['alamat_pengguna'];
                                  } ?></td>
                            </tr>
                            <tr>
                              <td class="font-weight-bold" width="30%">Provinsi</td>
                              <td><?php
                                  if ($data['provinsi_pengguna'] == NULL) {
                                    echo '<span class="font-italic">Belum Dilengkapi</span>';
                                  } else {
                                    echo $data['provinsi_pengguna'];
                                  } ?></td>
                            </tr>
                            <tr>
                              <td class="font-weight-bold" width="30%">Kontak Darurat</td>
                              <td><?php
                                  if ($data['kontak_darurat'] == NULL) {
                                    echo '<span class="font-italic">Belum Dilengkapi</span>';
                                  } else {
                                    echo $data['kontak_darurat'];
                                  } ?></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                <?php
                  }
                }
                ?>
              </div>
            </div>
          </div> -->
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; INDIEKOST 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
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

  <!-- Bootstrap core JavaScript-->
  <script src="../../vendor/jquery/jquery.min.js"></script>
  <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>



  <!-- Custom scripts for all pages-->
  <script src="../../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../../vendor/chart.js/Chart.min.js"></script>

  <script>

  </script>

  </script>

  <!-- time line pembayaran -->
  <script>
    // Fungsi untuk menghitung selisih waktu
    function calculateCountdown(tanggalMasuk) {
      const now = new Date();
      const targetDate = new Date(tanggalMasuk);

      // Tambahkan 30 hari ke tanggal_masuk untuk simulasi tenggat bayar
      targetDate.setDate(targetDate.getDate() + 30);

      const diffTime = targetDate - now;
      const days = Math.floor(diffTime / (1000 * 60 * 60 * 24));
      const hours = Math.floor((diffTime % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      const minutes = Math.floor((diffTime % (1000 * 60 * 60)) / (1000 * 60));
      const seconds = Math.floor((diffTime % (1000 * 60)) / 1000);

      if (diffTime <= 0) {
        return "Sudah saatnya bayar kost!";
      }

      return `${days} hari ${hours} jam ${minutes} menit ${seconds} detik`;
    }

    // Perbarui hitung mundur setiap detik
    function updateCountdowns() {
      const countdownElements = document.querySelectorAll('.countdown');

      countdownElements.forEach(element => {
        const tanggalMasuk = element.getAttribute('data-tanggal');
        element.textContent = calculateCountdown(tanggalMasuk);
      });
    }

    // Jalankan hitung mundur pertama kali
    updateCountdowns();

    // Perbarui hitung mundur setiap detik
    setInterval(updateCountdowns, 1000);
  </script>

</body>

</html>