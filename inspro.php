<?php  //inspro.php
   include 'conexao.php'; 

   //recuperar os valores oriundos do formulário
   $desc = trim($_POST['txtDesc']);
   $qtde = trim($_POST['txtQtde']); 
   $valor = trim($_POST['txtValor']); 
   
   if (!empty($desc) && !empty($qtde) && !empty($valor)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "INSERT INTO produtos (descricao, quantidade, valor) VALUES (?, ?, ?)";
        $query = $pdo->prepare($sql); 
        $query->execute (array($desc, $qtde, $valor));
        Conexao::desconectar(); 
        //echo PDO::ERRMODE_EXCEPTION; 
   }

   header("location:listarProdutos.php"); 

?> 