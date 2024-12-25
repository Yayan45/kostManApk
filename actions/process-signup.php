<?php
if (isset($_POST['submit_daftar'])) {
  include 'koneksi.php';

  $nama_lengkap = mysqli_real_escape_string($conn, $_POST['nama_lengkap_reg']);
  $alamat = mysqli_real_escape_string($conn, $_POST['alamat_reg']);
  $provinsi = mysqli_real_escape_string($conn, $_POST['provinsi_reg']);
  $kontak_darurat = mysqli_real_escape_string($conn, $_POST['kontak_darurat_reg']);
  $nomor = mysqli_real_escape_string($conn, $_POST['nomor_reg']);
  $email = mysqli_real_escape_string($conn, $_POST['email_reg']);
  $gender = mysqli_real_escape_string($conn, $_POST['gender_reg']);
  $tanggal_lahir = mysqli_real_escape_string($conn, $_POST['tanggal_lahir_reg']);
  $nomor_ktp = mysqli_real_escape_string($conn, $_POST['nomor_ktp_reg']);
  $password = mysqli_real_escape_string($conn, $_POST['password_repeat_reg']);
  $password_hash = password_hash($password, PASSWORD_DEFAULT);
  $akses = mysqli_real_escape_string($conn, $_POST['id-akses_req']);
  $foto_reg = mysqli_real_escape_string($conn, $_POST['foto_reg']);

  // Pastikan kolom 'id_pengguna' adalah AUTO_INCREMENT dan dibiarkan kosong
  $query = "INSERT INTO pengguna (
      nama_pengguna, alamat_pengguna, provinsi_pengguna, kontak_darurat, telepon_pengguna, 
      email_pengguna, kelamin_pengguna, tanggal_lahir_pengguna, no_ktp_pengguna, 
      foto_pengguna, password, id_akses
    ) VALUES (
      '$nama_lengkap', '$alamat', '$provinsi', '$kontak_darurat', '$nomor', 
      '$email', '$gender', '$tanggal_lahir', '$nomor_ktp', 
      '$foto_reg', '$password_hash', '$akses'
    )";

  // Jalankan query
  mysqli_query($conn, $query);

  if (mysqli_affected_rows($conn) > 0) {
    echo "
        <script>
          alert('Berhasil membuat akun');
          document.location.href = '../app/admin/registrasi.php';
        </script>
      ";
  } else {
    echo "
        <script>
          alert('Gagal membuat akun');
          document.location.href = '../app/admin/registrasi.php';
        </script>
      ";
  }
}
