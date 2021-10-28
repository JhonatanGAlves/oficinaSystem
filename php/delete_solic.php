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
	$sql = "DELETE FROM solicitacao WHERE idSolicitacao=$id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header("Location: ../solicitacao.php?success=Deletado com sucesso");
	}else{
		header("Location: ../solicitacao.php?error=falha ao deletar&$user_data");
	}
}else{
	header("Location: ./solicitacao.php");
}

?>