<?php
	if(isset($_POST['cadastrar'])){
		include "../conexao.php";
		function validate($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$nome = validate($_POST['nome_cli']);
		$email = validate($_POST['email_cli']);
		$cpf = validate($_POST['cpf_cli']);
		$endereco = validate($_POST['end_cli']);
		$contato = validate($_POST['contato_cli']);

		$user_data = 'nome= '.$nome. ' E-Mail= '.$email. 'cpf= '.$cpf. 'Endereço: '. $endereco. 'Contato: '.$contato;

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
		 }else{
		 	$sql = "INSERT INTO cliente(nomeCliente, emailCliente, cpfCliente, enderecoCliente, contatoCliente) 
		 	VALUES ('$nome', '$email', '$cpf', '$endereco', '$contato')";
		 	$result = mysqli_query($conn, $sql);
		 	if ($result) {
		 		header("Location: ../cliente.php?success=Cadastrado com sucesso&$user_data");
		 	}else{
		 		header("Location: ../cliente.php?error=Algo deu errado&$user_data");
		 	}
		 }
	}

?>