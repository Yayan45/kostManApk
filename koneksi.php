<form action="cek_login.php" method="post">


	<?php
	$koneksi = mysqli_connect("localhost", "root", "", "");

	// Check connection
	if (mysqli_connect_errno()) {
		echo "Koneksi database gagal : " . mysqli_connect_error();
	}

	?>
</form>