<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>Nossa Compra</title>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
		<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css" />
		<link href='https://fonts.googleapis.com/css?family=Pacifico' rel='stylesheet' type='text/css'>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<h1 id="logo">Nossa Compra</h1>
					<div class="row">
						<div class="col-md-3">
							<a href="#" class="btn btn-novo"><i class="fa fa-plus-circle"></i> Nova Lista</a>
						</div>
						<div class="col-md-offset-5 col-md-4">
							<div class="input-group">
								<input type="text" class="form-control" />
								<div class="input-group-btn">
									<button class="btn btn-primary"><i class="fa fa-search"></i></button>
								</div>
							</div>
						</div>
					</div>
					<br>
					<div class="row">
						<?php for($i = 0; $i < 4;$i++): ?>
						<div class="col-md-3">
							<div class="box">
								<h3 class="pull-left">Lista <?php echo $i + 1; ?></h3>
								<p class="badge pull-right">5 Itens</p>
								<div class="clearfix"></div>
								<div class="footer">
									<a href="#" class="btn btn-default"><i class="fa fa-pencil-square-o"></i> Editar</a>
									<a href="#" class="btn btn-excluir"><i class="fa fa-minus-circle"></i> Excluir</a>
									<a href="#" class="btn btn-default"><i class="fa fa-list-ul"></i> Itens</a>
								</div>
							</div>
						</div>
						<?php endfor; ?>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>