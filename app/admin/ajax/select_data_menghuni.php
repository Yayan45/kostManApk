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

if (isset($_POST['id_menghuni'])) {
    $id_menghuni = mysqli_real_escape_string($conn, $_POST['id_menghuni']);

    $query = "SELECT 
        menghuni.id_menghuni, 
        menghuni.tanggal_masuk, 
        menghuni.tanggal_keluar, 
        pengguna.nama_pengguna, 
        kamar.nomor_kamar,  
        kamar.kapasitas_kamar, 
        pengguna.foto_pengguna, 
        kamar.luas_kamar, 
        kamar.lantai_kamar,
        kamar.harga_bulanan AS harga_bulanan_total, 
        kamar.harga_bulanan, 
        kamar.deskripsi_kamar 
    FROM 
        pengguna 
    JOIN 
        menghuni ON pengguna.id_pengguna = menghuni.id_pengguna 
    JOIN 
        kamar ON kamar.id_kamar = menghuni.id_kamar 
    WHERE 
        menghuni.id_menghuni = '$id_menghuni'";

    $result = mysqli_query($conn, $query);


    while ($data = mysqli_fetch_array($result)) {

?>
        <div class="container-fluid">
            <img src="<?php echo '../../assets/img/uploadDb/' . $data['foto_pengguna']; ?>" alt="<?php echo $data['nama_pengguna'] ?>" class="img-thumbnail mx-auto d-block mb-3 rounded" width="300px" height="300px">
            <div class="table-resposive">
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="font-weight-bold" width="30%">Nama Penghuni</td>
                            <td><?php echo $data['nama_pengguna']; ?></td>
                        </tr>
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
                            <td class="font-weight-bold" width="30%">Total Harga Bulanan</td>
                            <td><?php echo 'Rp ' . number_format($data['harga_bulanan_total']); ?></td>
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