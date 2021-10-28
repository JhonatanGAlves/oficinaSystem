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

	$sql = "SELECT * FROM servico WHERE idServico=$id";
	if($result = mysqli_query($conn, $sql) ){
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
		}else{
			header("Location: ./servico.php");
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

		$tipo = validate($_POST['tipo']);
		$preco = validate($_POST['preco']);
		$funcionario = validate($_POST['select-f']);
		$agendamento = validate($_POST['select-a']);
		$id = validate($_POST['id_serv']);

		if(empty($tipo)){
			header("Location: ../update_serv.php?id=$id&error=Tipo é requerido");
		}elseif(empty($preco)){
			header("Location: ../update_serv.php?id=$id&error=Preço é requerido");
		} elseif(empty($funcionario)){
			header("Location: ../update_serv.php?id=$id&error=Funcionário é requerido");
		}elseif(empty($agendamento)){
			header("Location: ../update_serv.php?id=$id&error=Agendamento é requerido");
		}else {
			$sql = "UPDATE servico
					SET tipoServico='$tipo', precoServico='$preco', idFuncionario='$funcionario', idAgendamento='$agendamento'
					WHERE idServico=$id";
			if ($result = mysqli_query($conn, $sql)) {	
			 	header("Location: ../servico.php?success=Alterado com sucesso&$user_data");
			}else{
			 	header("Location: ../update_serv.php?id=$id&error=Algo deu errado&$user_data");
			}
		}
}else{
	header("Location: ./servico.php");
}
?>