<?php
	if(isset($_POST['cadastrar'])){
		include "../conexao.php";
		function validate($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$tipo = validate($_POST['tipo']);
		$preco = validate($_POST['preco']);
		$funcionario = validate($_POST['select-f']);
		$agenda = validate($_POST['select-a']);

		$user_data = 'tipo= '.$tipo. ' preço= '.$preco. 'funcionário= '.$funcionario. 'agendamento= '.$agenda;

		if (empty($tipo)) {
		 	header("Location: ../servico.php?error=Tipo é requerido&$user_data");
		 } elseif(empty($preco)){
		 	header("Location: ../servico.php?error=Preço é requerido&$user_data");
		 } elseif(empty($funcionario)){
		 	header("Location: ../servico.php?error=Funcionário é requerido&$user_data");
		 } elseif(empty($agenda)){
		 	header("Location: ../servico.php?error=Agendamento é requerido&$user_data");
		 }else{
		 	$sql = "INSERT INTO servico(tipoServico, precoServico, idFuncionario, idAgendamento) 
		 	VALUES ('$tipo', '$preco', '$funcionario', '$agenda')";
		 	$result = mysqli_query($conn, $sql);
		 	if ($result) {
		 		header("Location: ../servico.php?success=Cadastrado com sucesso&$user_data");
		 	}else{
		 		header("Location: ../servico.php?error=Algo deu errado&$user_data");
		 	}
		 }
	}

?>