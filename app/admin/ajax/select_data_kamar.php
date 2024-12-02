<!doctype html>
<html lang="en">
<?php
include '../../../actions/koneksi.php';
ob_start();
session_start();

if (!isset($_SESSION['akun_id'])) {
    header("location: ../../../landing-page.php");
} elseif (isset($_SESSION['akun_id'])) {
    if ($_SESSION['hak_akses'] == 2) {
        header("location: ../../penghuni/penghuni-dashboard.php");
    } elseif ($_SESSION['hak_akses'] == 3) {
        header("location: ../../calon-penghuni/calon-dashboard.php");
    }
}

if (isset($_POST['id_kamar'])) {
    $id_kamar = $_POST['id_kamar'];

    $query = "
        SELECT 
            kamar.foto_kamar, 
            kamar.nomor_kamar, 
            kamar.luas_kamar, 
            kamar.lantai_kamar, 
            kamar.kapasitas_kamar, 
            kamar.deskripsi_kamar, 
            kamar.harga_bulanan, 
            kamar.denda 
        FROM kamar 
        WHERE kamar.id_kamar = '$id_kamar'
    ";

    $result = mysqli_query($conn, $query);

    while ($data = mysqli_fetch_array($result)) {

?>
        <div class="container-fluid">
            <img src="<?php echo '../../assets/img/uploadDb/' . $data['foto_kamar']; ?>" alt="<?php echo $data['foto_kamar'] ?>" class="img-thumbnail mx-auto d-block mb-3 rounded" width="300px">
            <div class="table-respomsive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold" width="30%">Nomor Kamar</td>
                            <td><?php echo $data['nomor_kamar']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" width="30%">Luas Kamar</td>
                            <td><?php echo $data['luas_kamar']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" width="30%">Letak Lantai</td>
                            <td><?php echo $data['lantai_kamar']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" width="30%">Kapasitas</td>
                            <td><?php echo $data['kapasitas_kamar'] . ' orang'; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" width="30%">Deskripsi Kamar</td>
                            <td><?php echo $data['deskripsi_kamar']; ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" width="30%">Harga Bulanan</td>
                            <td><?php echo 'Rp ' . number_format($data['harga_bulanan']); ?></td>
                        </tr>
                        <tr>
                            <td class="font-weight-bold" width="30%">Denda (Jika Melewati Tenggat Pembayaran)</td>
                            <td><?php echo 'Rp ' . number_format($data['denda']); ?></td>
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