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

	$sql = "SELECT * FROM funcionario WHERE idFuncionario=$id";
	if($result = mysqli_query($conn, $sql) ){
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
		}else{
			header("Location: ./funcionario.php");
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

		$nome = validate($_POST['nome_funcionario']);
		$cpf = validate($_POST['cpf_funcionario']);
		$mao = validate($_POST['mao']);
		$id = validate($_POST['id_func']);

		if(empty($nome)){
			header("Location: ../update_func.php?id=$id&error=Nome é requerido");
		}elseif(empty($cpf)){
			header("Location: ../update_func.php?id=$id&error=Cpf é requerido");
		} elseif(empty($mao)){
			header("Location: ../update_func.php?id=$id&error=Valor mão de obra é requerido");
		}else {
			$sql = "UPDATE funcionario
					SET nomeFuncionario='$nome', identificacaoFuncionario='$cpf', maoDeObraFuncionario='$mao'
					WHERE idFuncionario=$id ";
			if ($result = mysqli_query($conn, $sql)) {	
			 	header("Location: ../funcionario.php?success=Alterado com sucesso&$user_data");
			}else{
			 	header("Location: ../update_func.php?id=$id&error=Algo deu errado&$user_data");
			}
		}
}else{
	header("Location: ./funcionario.php");
}
?>