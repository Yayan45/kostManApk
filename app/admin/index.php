<?php

ob_start();
session_start();

if (!isset($_SESSION['akun_id'])) {
    header("location: ../../../../index.html");
} elseif (isset($_SESSION['akun_id'])) {
    if ($_SESSION['hak_akses'] == 1) {
        header("location: admin-dashboard.php");
    } elseif ($_SESSION['hak_akses'] == 2) {
        header("location: ../penghuni/penghuni-dashboard.php");
    }
}
