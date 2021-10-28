<?php
	include "conexao.php";

	$sql = "SELECT * FROM peca";
	$result = mysqli_query($conn, $sql);
?>