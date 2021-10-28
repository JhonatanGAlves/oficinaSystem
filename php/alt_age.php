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

	$sql = "SELECT * FROM agendamento WHERE idAgendamento=$id";
	if($result = mysqli_query($conn, $sql) ){
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
		}else{
			header("Location: ./agendamento.php");
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

		$hora = validate($_POST['hora']);
		$data = validate($_POST['data']);
		$cliente = validate($_POST['select']);
		$id = validate($_POST['id_age']);

		if(empty($hora)){
			header("Location: ../update_age.php?id=$id&error=Hora é requerido");
		}elseif(empty($data)){
			header("Location: ../update_age.php?id=$id&error=Data é requerido");
		} elseif(empty($cliente)){
			header("Location: ../update_age.php?id=$id&error=Cliente é requerido");
		}else {
			$sql = "UPDATE agendamento
					SET horarioAgendamento='$hora', dataAgendamento='$data', idCliente='$cliente'
					WHERE idAgendamento=$id ";
			if ($result = mysqli_query($conn, $sql)) {	
			 	header("Location: ../agendamento.php?success=Alterado com sucesso&$user_data");
			}else{
			 	header("Location: ../update_age.php?id=$id&error=Algo deu errado&$user_data");
			}
		}
}else{
	header("Location: ./agendamento.php");
}
?>