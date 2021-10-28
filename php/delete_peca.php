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
	$sql = "DELETE FROM peca WHERE idPeca=$id";
	$result = mysqli_query($conn, $sql);
	if ($result) {
		header("Location: ../peca.php?success=Deletado com sucesso");
	}else{
		header("Location: ../peca.php?error=falha ao deletar! Talvez peça esteja sendo usada em outra tabela!&$user_data");
	}
}else{
	header("Location: ./peca.php");
}

?>