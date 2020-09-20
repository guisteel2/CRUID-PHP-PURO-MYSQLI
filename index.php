<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Acesso ao Usuário</title>

	<!-- Compiled and minified CSS -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

	<!-- Compiled and minified JavaScript -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

 	<!-- biblioteca de icones -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="global.css" media="screen" />


</head>
<body>
	<div class="container">
		<div class="row">
			<main>
				<div class="container center-align">
					<div class="z-depth-3 y-depth-3 x-depth-3 white green-text lighten-4 row mid">
						<form action="login.php" method="POST" name="frmIndex">

							<div class="row">
								<div class="input-field col s12">
									<input type="email" class="validate" name="usuario" id="usuario" required>
									<label for="email">Usuário</label>
								</div>
							</div>

							<div class="row">
								<div class="input-field col m12">
									<input type="password" class="validate" name="senha" id="senha" required>
									<label for="password">Senha</label>
								</div>
							</div>

							<div class="row">
								<button style="margin-left:25%;" type="subimit" name="btnLogin"
										class="col s6 btn-small white black-text waves-effect z-depth-1 y-depth-1">
										Acessar
								</button>
							</div>
						</form>
					</div>
				</div>
			</main>
		</div>
	</div>
</body>
</html>
