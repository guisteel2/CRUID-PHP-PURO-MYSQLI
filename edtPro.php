<?php  //etdPro.php
   include 'conexao.php'; 

   //recuperar os valores oriundos do formulário
   $id = trim($_POST['id']); 
   $desc = trim($_POST['txtDesc']);
   $qtde = trim($_POST['txtQtde']); 
   $valor = trim($_POST['txtValor']); 
   
   if (!empty($id) && !empty($desc) && !empty($qtde) && !empty($valor)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "UPDATE produtos SET descricao=?, quantidade=?, valor=? WHERE id=?;";
        $query = $pdo->prepare($sql); 
        $query->execute (array($desc, $qtde, $valor, $id));
        Conexao::desconectar(); 
        //echo PDO::ERRMODE_EXCEPTION; 
   }

   header("location:listarProdutos.php"); 

?> 