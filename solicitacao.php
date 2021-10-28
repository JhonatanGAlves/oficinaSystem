<?php include "php/cons_solic.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inicial-scale-1.0">
	<link rel="stylesheet" type="text/css" href=".\css\styleHeader.css">
	<link rel="shortcut icon" href="../oficinasystem/img/favicon.ico" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Solicitações</title>
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
    <div  class="containerCad">
	<h2>Cadastro Solicitação</h2>
    	<?php if(isset($_GET['error'])){ ?>
		    <div class="alert alert-danger" role="alert">
		  		<?php echo $_GET['error']; ?>
		    </div>
		<?php } ?>
    	<form action="php/cad_solic.php" method="POST">
		    <div class="form-group">
		    	<select class="form-select" aria-label="select" name="select-p">
		    		<option>Selecione a Peça</option>
		    		<?php
		    			$result_peca = "SELECT * FROM peca";
		    			$resultado_peca = mysqli_query($conn, $result_peca);
		    			while($row_peca = mysqli_fetch_assoc($resultado_peca)){ ?>
		    				<option value="<?php echo $row_peca['idPeca']; ?>"><?php echo $row_peca['nomePeca']; ?>
		    				</option><?php
		    			}
		    		?>
		    	</select>
		    </div>
		    <br>
		    <div class="form-group">
		    	<select class="form-select" aria-label="select" name="select-s">
		    		<option>Selecione o Serviço</option>
		    		<?php
		    			$result_serv = "SELECT * FROM servico";
		    			$resultado_serv = mysqli_query($conn, $result_serv);
		    			while($row_serv = mysqli_fetch_assoc($resultado_serv)){ ?>
		    				<option value="<?php echo $row_serv['idServico']; ?>"><?php echo $row_serv['idServico']; ?>
		    				</option><?php
		    			}
		    		?>
		    	</select>
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
    		<h2>Solicitações</h2>
    		<?php if(mysqli_num_rows($result)){ ?>
	    		<table class="table table-bordered table-hover">
	    			<thead align="center" class="table-light">
	    				<tr>
	    					<th scope="col">#</th>
	    					<th scope="col">ID</th>
	    					<th scope="col">ID Peça</th>
	    					<th scope="col">ID Serviço</th>
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
	    					<td><?=$rows['idSolicitacao']?></td>
	    					<td><a class="link-success" href="peca.php"><?php echo $rows['idPeca']?></a></td>
	    					<td><a class="link-success" href="servico.php"><?php echo $rows['idServico']?></a></td>
	    					<td>
	    						<a href="update_solic.php?id=<?=$rows['idSolicitacao']?>"
	    							class="btn btn-outline-warning">Alterar</a>
	    						<a href="php/delete_solic.php?id=<?=$rows['idSolicitacao']?>"
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