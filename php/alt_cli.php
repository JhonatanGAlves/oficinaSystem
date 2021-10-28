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

	$sql = "SELECT * FROM cliente WHERE idCliente=$id";
	if($result = mysqli_query($conn, $sql) ){
		if(mysqli_num_rows($result) > 0){
			$row = mysqli_fetch_array($result);
		}else{
			header("Location: ./cliente.php");
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

		$nome = validate($_POST['nome_cli']);
		$email = validate($_POST['email_cli']);
		$cpf = validate($_POST['cpf_cli']);
		$endereco = validate($_POST['end_cli']);
		$contato = validate($_POST['contato_cli']);
		$id = validate($_POST['id_cli']);

		 if (empty($nome)) {
		 	header("Location: ../cliente.php?error=Nome é requerido&$user_data");
		 } elseif(empty($email)){
		 	header("Location: ../cliente.php?error=E-Mail é requerido&$user_data");
		 } elseif(empty($cpf)){
		 	header("Location: ../cliente.php?error=CPF é requerido&$user_data");
		 }elseif(empty($endereco)){
		 	header("Location: ../cliente.php?error=Endereço é requerido&$user_data");
		 }elseif(empty($contato)){
		 	header("Location: ../cliente.php?error=Contato é requerido&$user_data");
		 }else {
			$sql = "UPDATE cliente
					SET nomeCliente='$nome', emailCliente='$email', cpfCliente='$cpf', enderecoCliente='$endereco', contatoCliente='$contato'
					WHERE idCliente=$id ";
			if ($result = mysqli_query($conn, $sql)) {	
			 	header("Location: ../cliente.php?success=Alterado com sucesso&$user_data");
			}else{
			 	header("Location: ../update_cli.php?id=$id&error=Algo deu errado&$user_data");
			}
		}
}else{
	header("Location: ./cliente.php");
}
?>