<?php include 'php/alt_peca.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, inicial-scale-1.0">
	<link rel="stylesheet" type="text/css" href=".\css\style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<title>Peças</title>
</head>
<body>
	<div class="p-3 mb-2 bg-info text-dark"	>
		<div class="container">
		 	<nav class="navbar navbar-expand-lg navbar-toggler navbar-light">
		 		<ul class="navbar-nav">
			 		<li class="navbar-item">
			 			<a href="index.html" class="nav-link">Home</a>
			 		</li>
			 		<li class="navbar-item">
			 			<a href="cliente.php" class="nav-link">Clientes</a>
			 		</li>
			 		<li class="navbar-item">
			 			<a href="agendamento.php" class="nav-link">Agenda</a>
			 		</li>
			 		<li class="navbar-item">
			 			<a href="servico.php" class="nav-link">Serviços</a>
			 		</li>
			 		<li class="navbar-item">
			 			<a href="funcionario.php" class="nav-link">Funcionários</a>
			 		</li>
			 		<li class="navbar-item">
			 			<a href="peca.php" class="nav-link">Peças</a>
			 		</li>
			 		<li class="navbar-item">
			 			<a href="solicitacao.php" class="nav-link">Solicitações</a>
			 		</li>
			 	</ul>
		 	</nav>
		</div>
	</div>
	<br>
    <h2>Cadastro Peça</h2>
    <div class="container">
    	<form action="php/alt_peca.php" method="POST">
    		<?php if(isset($_GET['error'])){ ?>
		    <div class="alert alert-danger" role="alert">
		  		<?php echo $_GET['error']; ?>
		    </div>
			<?php } ?>
		    <div class="form-group">
		    	<input type="text" name="nome_peca" id="nome_peca" value="<?=$row['nomePeca'] ?>" autofocus class="form-control">
		    </div>
		    <br>
		    <div class="form-group">
		    	<input type="text" name="qtd" value="<?=$row['quantidadePeca'] ?>" autofocus class="form-control">
		    </div>
		    <br>
		    <div class="form-group">
		    	<input type="text" name="v_peca" id="v_peca" value="<?=$row['precoPeca'] ?>" autofocus class="form-control">
		    </div>
		    <input type="text" name="id_peca" value="<?=$row['idPeca']?>" hidden>
		    <br>
		    <div align="center">
		    	<button type="submit" name="update" class="btn btn-info">Atualizar</button>
		    </div>
		    <br>
	    </form>
    </div>
    <br>
    <div class="container">
    	<div class="box">
    		<?php if(isset($_GET['success'])){ ?>
			    <div class="alert alert-success" role="alert">
			  		<?php echo $_GET['success']; ?>
			    </div>
			<?php } ?>
    		
    	</div>
    </div>

</body>
</html>