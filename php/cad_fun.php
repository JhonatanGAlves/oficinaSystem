<?php
	if(isset($_POST['cadastrar'])){
		include "../conexao.php";
		function validate($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$nome = validate($_POST['nome_funcionario']);
		$cpf = validate($_POST['cpf_funcionario']);
		$mao = validate($_POST['mao']);

		$user_data = 'nome= '.$nome. ' cpf= '.$cpf. 'mão de obra= '.$mao;

		if (empty($nome)) {
		 	header("Location: ../funcionario.php?error=Nome é requerido&$user_data");
		 } elseif(empty($cpf)){
		 	header("Location: ../funcionario.php?error=Cpf é requerido&$user_data");
		 } elseif(empty($mao)){
		 	header("Location: ../funcionario.php?error=Valor mão de obra é requerido&$user_data");
		 }else{
		 	$sql = "INSERT INTO funcionario(nomeFuncionario, identificacaoFuncionario, maoDeObraFuncionario) 
		 	VALUES ('$nome', '$cpf', '$mao')";
		 	$result = mysqli_query($conn, $sql);
		 	if ($result) {
		 		header("Location: ../funcionario.php?success=Cadastrado com sucesso&$user_data");
		 	}else{
		 		header("Location: ../funcionario.php?error=Algo deu errado&$user_data");
		 	}
		 }
	}

?>