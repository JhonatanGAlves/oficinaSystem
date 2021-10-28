<?php
	if(isset($_POST['cadastrar'])){
		include "../conexao.php";
		function validate($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$hora = validate($_POST['hora']);
		$data = validate($_POST['data']);
		$cliente = validate($_POST['select']);

		$user_data = 'hora= '.$hora. ' data= '.$data. 'cliente= '.$cliente;

		if (empty($hora)) {
		 	header("Location: ../agendamento.php?error=Hora é requerido&$user_data");
		 } elseif(empty($data)){
		 	header("Location: ../agendamento.php?error=Data é requerido&$user_data");
		 } elseif(empty($cliente)){
		 	header("Location: ../agendamento.php?error=Cliente é requerido&$user_data");
		 }else{
		 	$sql = "INSERT INTO agendamento(horarioAgendamento, dataAgendamento, idCliente) 
		 	VALUES ('$hora', '$data', '$cliente')";
		 	$result = mysqli_query($conn, $sql);
		 	if ($result) {
		 		header("Location: ../agendamento.php?success=Cadastrado com sucesso&$user_data");
		 	}else{
		 		header("Location: ../agendamento.php?error=Algo deu errado&$user_data");
		 	}
		 }
	}

?>