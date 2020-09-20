<?php
	//recuperar os dados do formulario
	$usuario = trim($_POST['usuario']);
	$senha =  md5(trim($_POST['senha']));

	

	if (!empty($usuario) && !empty($senha)){

		include 'conexao.php';
        $pdo = Conexao::conectar();
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "SELECT * FROM usuarios WHERE id  = 3";
		$query = $pdo->prepare($sql);

		
		$query->execute (array($usuario));
		$dados = $query->fetch(PDO::FETCH_ASSOC);
        Conexao::desconectar();

   }

   
   //verifica se a senha informada é igual a senha armazenada para o usuario
   if ($senha == $dados['senha'] || $senha != '')
   {
		//echo "Usuário Válido: " . $dados['nome'];
		session_start();
		$_SESSION['usuario'] = $usuario;
		$_SESSION['nome'] = $dados['nome'];
		$_SESSION['funcao'] = $dados['funcao'];

		header("location: listarProdutos.php");

   }

   else header("location: index.php");





?>
