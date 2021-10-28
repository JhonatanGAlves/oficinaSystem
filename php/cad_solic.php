<?php
	if(isset($_POST['cadastrar'])){
		include "../conexao.php";
		function validate($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$peca = validate($_POST['select-p']);
		$servico = validate($_POST['select-s']);

		$user_data = 'peca= '.$peca. ' servico= '.$servico;

		if (empty($peca)) {
		 	header("Location: ../solicitacao.php?error=Peça é requerido&$user_data");
		 } elseif(empty($servico)){
		 	header("Location: ../solicitacao.php?error=Serviço é requerido&$user_data");
		 }else{
		 	$sql = "INSERT INTO solicitacao (idPeca, idServico) 
		 	VALUES ('$peca', '$servico')";
		 	$result = mysqli_query($conn, $sql);
		 	if ($result) {
		 		header("Location: ../solicitacao.php?success=Cadastrado com sucesso&$user_data");
		 	}else{
		 		header("Location: ../solicitacao.php?error=Algo deu errado&$user_data");
		 	}
		 }
	}

?>