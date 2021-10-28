<?php include "php/cons_fun.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<script>
	function formatar(mascara, documento){
  	var i = documento.value.length;
  	var saida = mascara.substring(0,1);
  	var texto = mascara.substring(i)
  
  	if (texto.substring(0,1) != saida){
            documento.value += texto.substring(0,1);
  	}
	}
	</script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inicial-scale-1.0">
	<link rel="stylesheet" type="text/css" href=".\css\styleHeader.css">
	<link rel="shortcut icon" href="../oficinasystem/img/favicon.ico" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Funcionários</title>
</head>
<body>
	<header>
		<div class="menu-logo">
			<div class="logo">
				<a href="index.html"> OFICINA J.E.L</a>
			</div>
			<div class="menu">
				<ul class="menu-list">
					<li><a href="index.html">Home</a></li>
					<li><a href="index.html#servicos">Serviços</a></li>
					<li><a href="index.html#quem-somos">Quem Somos</a></li>
					<li><a href="#">Cadastrar</a>
						<ul>
							<li><a href="cliente.php">Clientes</a></li>
							<li><a href="agendamento.php">Agenda</a></li>
							<li><a href="servico.php">Serviços</a></li>
							<li><a href="funcionario.php">Funcionário</a></li>
							<li><a href="peca.php">Peças</a></li>
							<li><a href="solicitacao.php">Solicitações</a></li>
						</ul>
					</li>
				</ul>
			</div>
		</div>
    </header>
	<br>
    <div class="containerCad">
	<h2>Cadastro Funcionário</h2>
    	<?php if(isset($_GET['error'])){ ?>
		    <div class="alert alert-danger" role="alert">
		  		<?php echo $_GET['error']; ?>
		    </div>
		<?php } ?>
    	<form action="php/cad_fun.php" method="POST">
		    <div class="form-group">
		    	<input type="text" name="nome_funcionario" id="nome_funcionario" autofocus placeholder="Digite nome completo" class="form-control">
		    </div>
		    <br>
		    <div class="form-group">
		    	<input type="text" name="cpf_funcionario" maxlength="14" onkeypress="formatar('###.###.###-##', this)" autofocus placeholder="Digite o CPF" class="form-control">
		    </div>
		    <br>
		    <div class="form-group">
		    	<input type="text" name="mao" id="mao" autofocus placeholder="Valor mão de obra" class="form-control">
		    </div>
		    <br>
		    <div align="center">
		    	<button type="submit" name="cadastrar" class="btn btn-warning">Cadastrar</button>
		    </div>
	    </form>
    </div>
    <br>
    <div class="containerCad">
    	<div class="box">
    		<?php if(isset($_GET['success'])){ ?>
		    <div class="alert alert-success" role="alert">
		  		<?php echo $_GET['success']; ?>
		    </div>
		<?php } ?>
    		<h2>Funcionários</h2>
    		<?php if(mysqli_num_rows($result)){ ?>
	    		<table class="table table-bordered table-hover">
	    			<thead align="center" class="table-light">
	    				<tr>
	    					<th scope="col">#</th>
	    					<th scope="col">ID</th>
	    					<th scope="col">Nome</th>
	    					<th scope="col">CPF</th>
	    					<th scope="col">Mão de obra</th>
	    					<th scope="col">Opções</th>
	    				</tr>
	    			</thead>
	    			<tbody>
	    				<?php
	    					$i = 0;
	    					while ($rows = mysqli_fetch_assoc($result)) {
	    					$i++;
	    				?>
	    				<tr align="center">
	    					<td scope="row"><?=$i?></td>
	    					<td><?=$rows['idFuncionario']?></td>
	    					<td><?php echo $rows['nomeFuncionario']?></td>
	    					<td><?php echo $rows['identificacaoFuncionario']?></td>
	    					<td><?php echo $rows['maoDeObraFuncionario']?></td>
	    					<td>
	    						<a href="update_func.php?id=<?=$rows['idFuncionario']?>"
	    							class="btn btn-outline-warning"">Alterar</a>
	    						<a href="php/delete_func.php?id=<?=$rows['idFuncionario']?>"
	    							class="btn btn-outline-danger">Deletar</a>
	    					</td>
	    				</tr>
	    				<?php }?>
	    			</tbody>
	    		</table>
    		<?php } ?>
    	</div>
    </div>
</body>
</html>