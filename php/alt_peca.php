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

	$sql = "SELECT * FROM peca WHERE idPeca=$id";
	if($result = mysqli_query($conn, $sql) ){
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
		}else{
			header("Location: ./peca.php");
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

		$nome = validate($_POST['nome_peca']);
		$qtd = validate($_POST['qtd']);
		$valor = validate($_POST['v_peca']);
		$id = validate($_POST['id_peca']);

		if(empty($nome)){
			header("Location: ../update_peca.php?id=$id&error=Nome é requerido");
		}elseif(empty($qtd)){
			header("Location: ../update_peca.php?id=$id&error=Quantidade é requerido");
		} elseif(empty($valor)){
			header("Location: ../update_peca.php?id=$id&error=Preço é requerido");
		}else {
			$sql = "UPDATE peca
					SET nomePeca='$nome', quantidadePeca='$qtd', precoPeca='$valor'
					WHERE idPeca=$id ";
			if ($result = mysqli_query($conn, $sql)) {	
			 	header("Location: ../peca.php?success=Alterado com sucesso&$user_data");
			}else{
			 	header("Location: ../update_peca.php?id=$id&error=Algo deu errado&$user_data");
			}
		}
}else{
	header("Location: ./peca.php");
}
?>