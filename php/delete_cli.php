<?php
if(isset($_GET['id'])){
	include "../conexao.php";
	function validate($data){
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
	$id = validate($_GET['id']);
	$sql = "DELETE FROM cliente WHERE idCliente=$id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header("Location: ../cliente.php?success=Deletado com sucesso");
	}else{
		header("Location: ../cliente.php?error=Falha ao deletar! Talvez cliente esteja sendo usado em outra tabela!&$user_data");
	}
}else{
	header("Location: ./cliente.php");
}

?>