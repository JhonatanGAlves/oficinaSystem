<?php
	if(isset($_POST['cadastrar'])){
		include "../conexao.php";
		function validate($data){
			$data = trim($data);
			$data = stripcslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
		$nome = validate($_POST['nome_peca']);
		$qtd = validate($_POST['qtd']);
		$valor = validate($_POST['v_peca']);

		$user_data = 'nome= '.$nome. ' qtd= '.$qtd. 'valor = '.$valor;

		if (empty($nome)) {
		 	header("Location: ../peca.php?error=Nome é requerido&$user_data");
		 } elseif(empty($qtd)){
		 	header("Location: ../peca.php?error=quantidade é requerido&$user_data");
		 } elseif(empty($valor)){
		 	header("Location: ../peca.php?error=Valor da peça é requerido&$user_data");
		 }else{
		 	$sql = "INSERT INTO peca(nomePeca, quantidadePeca, precoPeca) 
		 	VALUES ('$nome', '$qtd', '$valor')";
		 	$result = mysqli_query($conn, $sql);
		 	if ($result) {
		 		header("Location: ../peca.php?success=Cadastrado com sucesso&$user_data");
		 	}else{
		 		header("Location: ../peca.php?error=Algo deu errado&$user_data");
		 	}
		 }
	}

?>