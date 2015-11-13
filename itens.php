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
							<a href="#" class="btn btn-novo"><i class="fa fa-plus-circle"></i> Novo Item</a>
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
						<div class="col-md-offset-2 col-md-8">
							<div class="box">
								<h3 class="pull-left">Lista 1</h3>
								<p class="badge pull-right">5 Itens</p>
								<div class="clearfix"></div>
								<hr />
								<table class="table">
									<thead>
										<tr>
											<th>Comprado</th>
											<th>Descrição</th>
											<th>Quantidade</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td><input type="checkbox"></td>
											<td>Salgadinho</td>
											<td>3</td>
										</tr>
										<tr class="success">
											<td><input type="checkbox" checked="true"></td>
											<td>Bolacha</td>
											<td>2</td>
										</tr>
										<tr>
											<td><input type="checkbox"></td>
											<td>Leite</td>
											<td>3</td>
										</tr>
										<tr class="success">
											<td><input type="checkbox" checked="true"></td>
											<td>Vinho</td>
											<td>15</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>