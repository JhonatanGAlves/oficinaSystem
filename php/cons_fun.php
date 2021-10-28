<?php
	include "conexao.php";

	$sql = "SELECT * FROM funcionario";
	$result = mysqli_query($conn, $sql);
?>