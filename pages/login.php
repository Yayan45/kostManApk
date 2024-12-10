<?php
include '../actions/koneksi.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- link css -->
    <link rel="stylesheet" href="../assets/css/stylelogin.css">
</head>

<body class="d-flex justify-content-center align-items-center vh-100 bg-light">
    <div class="login-container">
        <!-- Left section with image -->
        <div class="image-section"></div>

        <!-- Right section with login form -->
        <div class="form-section">
            <h3>Selamat Datang!</h3>
            <form action="../actions/process-signin.php" method="POST" novalidate>
                <div class="mb-3">
                    <label for="email_login" class="form-label">email</label>
                    <input type="email" class="form-control" id="email_login" name="email_login" placeholder="Masukkan email Anda">
                </div>
                <div class="mb-3">
                    <label for="password_login" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password_login" name="password_login" placeholder="Masukkan password Anda">
                </div>
                <button type="submit" name="submit_login" id="submit" class="btn btn-primary mb-2">Masuk</button>
                <a href="../index.html" class="btn btn-danger">Kembali ke Homepage</a>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


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
                $(".bg-login-image").css({
                    "background-image": "url(../img/<?php echo $data['foto_kost'] ?>)"
                });
            })

            $(function() {
                $(".bg-gradient-primary").css({
                    "background-image": "url(../img/<?php echo $data['foto_kost'] ?>)"
                });
            })

        <?php } ?>
    </script>
</body>

</html>