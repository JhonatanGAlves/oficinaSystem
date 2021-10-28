<?php
	include "conexao.php";

	$sql = "SELECT * FROM solicitacao";
	$result = mysqli_query($conn, $sql);
?>