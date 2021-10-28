<?php
	include "conexao.php";

	$sql = "SELECT * FROM cliente";
	$result = mysqli_query($conn, $sql);
?>