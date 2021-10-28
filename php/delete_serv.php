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
	$sql = "DELETE FROM servico WHERE idServico=$id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header("Location: ../servico.php?success=Deletado com sucesso");
	}else{
		header("Location: ../servico.php?error=Falha ao deletar! Talvez serviço esteja sendo usado em outra tabela!&$user_data");
	}
}else{
	header("Location: ./servico.php");
}

?>