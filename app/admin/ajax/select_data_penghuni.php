<!doctype html>
<html lang="en">
<?php
include '../../../actions/koneksi.php';
ob_start();
session_start();

if (!isset($_SESSION['akun_id'])) {
    header("location: ../../../../../index.html");
} elseif (isset($_SESSION['akun_id'])) {
    if ($_SESSION['hak_akses'] == 2) {
        header("location: ../../penghuni/penghuni-dashboard.php");
    }
}

if (isset($_POST['id_pengguna'])) {
    $id_pengguna = $_POST['id_pengguna'];
    $query = "SELECT * FROM pengguna WHERE id_pengguna = $id_pengguna";
    $result = mysqli_query($conn, $query);


?>
    <div class="container-fluid">
        <?php
        while ($data = mysqli_fetch_array($result)) {
            if ($data['foto_pengguna'] == NULL) {
        ?>

                <img class="img-thumbnail mx-auto d-block mb-3 rounded" src="../../assets/img/none.png">
            <?php } else { ?>

                <img alt="<?php echo $data['foto_pengguna']; ?>"
                    class="img-thumbnail mx-auto d-block mb-3 rounded"
                    width="300px" src="<?php echo '../../assets/img/uploadDb/' . $data['foto_pengguna']; ?>">

            <?php
            }

            ?>



            <div class="table-responsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold" width="30%">NIK</td>
                            <td><?php echo $data['no_ktp_pengguna']; ?></td>
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
                            <td><?php echo $data['tanggal_lahir_pengguna']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" width="30%">Jenis Kelamin</td>
                            <td><?php echo $data['kelamin_pengguna']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" width="30%">Alamat</td>
                            <td><?php echo $data['alamat_pengguna']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" width="30%">Provinsi</td>
                            <td><?php echo $data['provinsi_pengguna']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" width="30%">Kontak Darurat</td>
                            <td><?php echo $data['kontak_darurat']; ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
    </div>
<?php
        }
    }
?>

</html>