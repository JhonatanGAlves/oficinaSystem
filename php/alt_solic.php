<?php 	
if(isset($_GET['id'])){
		include "conexao.php";
		function validate($data){
		$data = trim($data);
		$data = stripcslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}

	$id = validate($_GET['id']);

	$sql = "SELECT * FROM solicitacao WHERE idSolicitacao=$id";
	if($result = mysqli_query($conn, $sql) ){
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
		}else{
			header("Location: ./solicitacao.php");
		}
	}
}
	elseif(isset($_POST['update'])){
		include "../conexao.php";
		function validate($data){
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

		$peca = validate($_POST['select-p']);
		$servico = validate($_POST['select-s']);
		$id = validate($_POST['id_solic']);

		if(empty($peca)){
			header("Location: ../update_solic.php?id=$id&error=Peça é requerido");
		}elseif(empty($servico)){
			header("Location: ../update_solic.php?id=$id&error=Serviço é requerido");
		}else {
			$sql = "UPDATE solicitacao
					SET idPeca='$peca', idServico='$servico'
					WHERE idSolicitacao=$id";
			if ($result = mysqli_query($conn, $sql)) {	
			 	header("Location: ../solicitacao.php?success=Alterado com sucesso&$user_data");
			}else{
			 	header("Location: ../update_solic.php?id=$id&error=Algo deu errado&$user_data");
			}
		}
}else{
	header("Location: ./solicitacao.php");
}
?>