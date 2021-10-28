<?php
	include "conexao.php";

	$sql = "SELECT * FROM servico";
	$result = mysqli_query($conn, $sql);
?>