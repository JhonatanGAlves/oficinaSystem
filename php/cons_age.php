<?php
	include "conexao.php";

	$sql = "SELECT * FROM agendamento";
	$result = mysqli_query($conn, $sql);
?>