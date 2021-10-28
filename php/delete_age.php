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
	$sql = "DELETE FROM agendamento WHERE idAgendamento=$id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header("Location: ../agendamento.php?success=Deletado com sucesso");
	}else{
		header("Location: ../agendamento.php?error=Falha ao deletar! Talvez agenda esteja sendo usada em outra tabela!&$user_data");
	}
}else{
	header("Location: ./agendamento.php");
}

?>