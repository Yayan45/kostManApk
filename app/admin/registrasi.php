<?php

include '../../actions/koneksi.php';
ob_start();
session_start();

if (!isset($_SESSION['akun_id'])) {
    header("location: ../../../../index.html");
} elseif (isset($_SESSION['akun_id'])) {
    if ($_SESSION['hak_akses'] == 2) {
        header("location: ../penghuni/penghuni-dashboard.php");
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

    <title>Penghuni</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/bootstrap.min.css">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <!-- css  -->
    <link rel="stylesheet" href="../../css/style.css">


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
                <div class="sidebar-brand-text mx-3">KOSTMAN</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="admin-dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengelolaan
            </div>

            <!-- Nav Item - Charts -->
            <li class="nav-item">
                <a class="nav-link" href="../admin/admin-penghuni.php">
                    <i class="fas fa-fw fa-user-friends"></i>
                    <span>Penghuni</span></a>
            </li>

            <!-- Nav Item - Kamar Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseKamar" aria-expanded="true"
                    aria-controls="collapseKamar">
                    <i class="fas fa-fw fa-bed"></i>
                    <span>Kamar</span>
                </a>
                <div id="collapseKamar" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu:</h6>
                        <a class="collapse-item" href="admin-kamar.php">Data Kamar</a>
                        <a class="collapse-item" href="admin-kamar-menghuni.php">Menghuni</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                    aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-money-bill"></i>
                    <span>Pembayaran</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu:</h6>
                        <a class="collapse-item" href="admin-pemasukan.php">Pemasukan</a>
                        <a class="collapse-item" href="admin-pengeluaran.php">Pengeluaran</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu:</h6>
                        <a class="collapse-item" href="admin-laba-rugi.php">Laporan Laba/Rugi</a>
                        <a class="collapse-item" href="admin-tagihan.php">Laporan Pengeluaran</a>
                        <!-- <a class="collapse-item" href="admin-status-kamar.php">Laporan Status Kamar</a> -->
                    </div>
                </div>
            </li>

            <!-- Nav Item - masteData Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseMaster" aria-expanded="true"
                    aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-box"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapseMaster" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu:</h6>
                        <a class="collapse-item" href="admin-jenis-pengeluaran.php">Data Jenis Pengeluaran</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Registrasi Collapse Menu -->
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAkun" aria-expanded="true"
                    aria-controls="collapseAkun">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Akun</span>
                </a>
                <div id="collapseAkun" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Menu:</h6>
                        <a class="collapse-item" href="registrasi.php">Registrasi Akun Penghuni</a>
                    </div>
                </div>
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
                                    class="mr-2 d-none d-lg-inline text-gray-600 small"><?php print_r($_SESSION['akun_nama']);  ?></span>

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
                                <a class="dropdown-item" href="admin-settings-profil.php">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="admin-settings-infokost.php">
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
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12 mx-auto">
                                <div class="card o-hidden border-0 shadow-lg my-5">
                                    <div class="card-body p-0">
                                        <!-- Nested Row within Card Body -->
                                        <div class="row">
                                            <!-- form -->
                                            <div class="col-lg-12">
                                                <div class="p-5">
                                                    <div>
                                                        <h1 class="text-left font-weight-bold h2 text-gray-900 mb-5">DAFTAR AKUN</h1>
                                                    </div>

                                                    <!-- form mulai -->
                                                    <form class="user needs-validation" action="../../actions/process-signup.php" method="POST" novalidate>
                                                        <!-- nama lengkap -->
                                                        <div class="form-group">
                                                            <label for="">Nama Lengkap</label>
                                                            <input type="text" class="form-control form-control-user" id="inputNama"
                                                                placeholder="Nama Lengkap" name="nama_lengkap_reg" required>
                                                            <div class="invalid-feedback">
                                                                Harap isi nama lengkap anda.
                                                            </div>
                                                        </div>

                                                        <!-- Alamat -->
                                                        <div class="form-group">
                                                            <label for="">Alamat</label>
                                                            <input type="text" class="form-control form-control-user" id="inputAlamat"
                                                                placeholder="Alamat" name="alamat_reg" required>
                                                            <div class="invalid-feedback">
                                                                Harap isi alamat anda.
                                                            </div>
                                                        </div>

                                                        <!-- Provinsi -->
                                                        <div class="form-group">
                                                            <label for="">Provinsi</label>
                                                            <input type="text" class="form-control form-control-user" id="inputProvinsi"
                                                                placeholder="Provinsi" name="provinsi_reg" required>
                                                            <div class="invalid-feedback">
                                                                Harap isi Provinsi anda.
                                                            </div>
                                                        </div>

                                                        <!-- Kontak darurat -->
                                                        <div class="form-group">
                                                            <label for="">Kontak Darurat</label>
                                                            <input type="text" class="form-control form-control-user" id="inputKota"
                                                                placeholder="kontak darurat" name="kontak_darurat_reg" required>
                                                            <div class="invalid-feedback">
                                                                Harap isi Kontak Darurat anda.
                                                            </div>
                                                        </div>

                                                        <!-- no telepon -->
                                                        <div class="form-group">
                                                            <label for="">Nomor Telepon</label>
                                                            <input type="text" class="form-control form-control-user" id="inputNomor"
                                                                placeholder="Nomor telepon" name="nomor_reg" required>
                                                            <div class="invalid-feedback">
                                                                Harap isi nomor telepon anda.
                                                            </div>
                                                        </div>

                                                        <!-- email -->
                                                        <div class="form-group">
                                                            <label for="">Email</label>
                                                            <input type="email" class="form-control form-control-user" id="inputEmail"
                                                                placeholder="Alamat Email" name="email_reg" required>
                                                            <div class="invalid-feedback">
                                                                Harap isi alamat email anda.
                                                            </div>
                                                        </div>
                                                        <!-- jenis kelamin -->
                                                        <div class="form-group">
                                                            <label for="">Jenis Kelamin</label>
                                                            <select class="form-control form-control-user" id="inputGender" name="gender_reg" required>
                                                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                                                <option value="Pria">Pria</option>
                                                                <option value="Wanita">Wanita</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Harap pilih jenis kelamin anda.
                                                            </div>
                                                        </div>

                                                        <!-- tanggal lahir -->
                                                        <div class="form-group">
                                                            <label for="inputTanggalLahir">Tanggal Lahir</label>
                                                            <input type="date" class="form-control form-control-user" id="inputTanggalLahir" name="tanggal_lahir_reg" required>
                                                            <div class="invalid-feedback">
                                                                Harap isi tanggal lahir anda.
                                                            </div>
                                                        </div>

                                                        <!-- No Ktp -->
                                                        <div class="form-group">
                                                            <label for="">Nomor KTP</label>
                                                            <input type="number" class="form-control form-control-user" id="inputNomor"
                                                                placeholder="Nomor KTP" name="nomor_ktp_reg" required>
                                                            <div class="invalid-feedback">
                                                                Harap isi nomor KTP anda.
                                                            </div>
                                                        </div>

                                                        <!-- password -->
                                                        <div class="form-group row">
                                                            <div class="col-sm-6 mb-3 mb-sm-0">
                                                                <input type="password" class="form-control form-control-user password" id="inputPassword"
                                                                    placeholder="Password" name="password_reg" required>
                                                                <div class="invalid-feedback">
                                                                    Harap isi password untuk akun anda.
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <input type="password" class="form-control form-control-user confpass" id="repeatPassword"
                                                                    placeholder="Repeat Password" name="password_repeat_reg" required>
                                                                <div class="invalid-feedback">
                                                                    Harap isi konfirmasi password untuk akun anda.
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Id Akses -->
                                                        <div class="form-group">
                                                            <label for="">Pilih ID Akses</label>
                                                            <select class="form-control form-control-user" id="inputID" name="id-akses_req" required>
                                                                <option value="" disabled selected>Pilih ID Akses</option>
                                                                <option value="1">Admin</option>
                                                                <option value="2">Penghuni</option>
                                                            </select>
                                                            <div class="invalid-feedback">
                                                                Harap pilih ID Akses anda.
                                                            </div>
                                                        </div>

                                                        <!-- Foto -->
                                                        <div class="form-group">
                                                            <label for="inputFoto">Unggah Foto</label>
                                                            <input type="file" class="form-control-file" id="inputFoto" name="foto_reg" accept="image/*" required>
                                                            <div class="invalid-feedback">
                                                                Harap unggah foto Anda.
                                                            </div>
                                                        </div>



                                                        <!-- button submit registrasi -->
                                                        <button type="submit" name="submit_daftar" id="submit" class="btn btn-primary btn-user btn-block">Daftar</button>
                                                    </form>


                                                    <!-- akhir form -->

                                                </div>
                                            </div>
                                            <!-- akhir form -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End of Main Content -->

                    <!-- Footer -->
                    <footer class="sticky-footer bg-white">
                        <div class="container my-auto">
                            <div class="copyright text-center my-auto">
                                <span>Copyright &copy;TechSolutions-2024</span>
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

            <!-- view modal -->
            <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Rincian Data Penghuni
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="detail_pengguna">


                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- update Modal -->
            <div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary font-weight-bold" id="exampleModalCenterTitle">Edit Data Penghuni</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="detail_edit">

                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="../../vendor/jquery/jquery.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
            <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- lightbox -->
            <script src="../../js/lightbox.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="../../js/sb-admin-2.min.js"></script>

            <!-- lightbiox css -->
            <link href="../../css/lightbox.css" rel="stylesheet">

            <!-- Page level plugins -->
            <script src="../../vendor/chart.js/Chart.min.js"></script>

            <!-- Page level plugins -->
            <script src="../../vendor/datatables/jquery.dataTables.min.js"></script>
            <script src="../../vendor/datatables/dataTables.bootstrap4.min.js"></script>

            <!-- Page level custom scripts -->
            <script src="../../js/demo/datatables-demo.js"></script>


            <script>
                // Example starter JavaScript for disabling form submissions if there are invalid fields
                (function() {
                    'use strict';
                    window.addEventListener('load', function() {
                        // Fetch all the forms we want to apply custom Bootstrap validation styles to
                        var forms = document.getElementsByClassName('needs-validation');
                        // Loop over them and prevent submission
                        var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                                if (form.checkValidity() === false) {
                                    event.preventDefault();
                                    event.stopPropagation();
                                }
                                form.classList.add('was-validated');
                            }, false);
                        });
                    }, false);
                })();

                <?php

                $query = "SELECT * FROM info_kost";
                $result = mysqli_query($conn, $query);

                while ($data = mysqli_fetch_array($result)) {

                ?>

                    $(function() {
                        $(".bg-gradient-primary").css({
                            "background-image": "url(../img/<?php echo $data['foto_kost'] ?>)"
                        })
                    })



                <?php } ?>

                $(document).ready(function() {
                    $('#submit').click(function(event) {

                        if ($('.password').val() != $('.confpass').val()) {
                            alert("Password dan Konfirmasi Password Tidak Sama!");
                            // Prevent form submission
                            event.preventDefault();
                        }

                    });
                });
            </script>



</body>

</html>