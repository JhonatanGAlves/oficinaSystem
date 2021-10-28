<?php
	$server = "localhost";
	$username = "root";
	$pass = "";
	$bd = "oficina";

	$conn = mysqli_connect($server, $username, $pass, $bd);

	if (!$conn) {
		echo "Erro de conexão!";
	}
?>