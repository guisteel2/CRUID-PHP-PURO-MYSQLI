<?php  //remPro.php
   include 'conexao.php'; 

   //recuperar os valores oriundos do formulário
   $id = trim($_POST['id']); 

   if (!empty($id)){
        $pdo = Conexao::conectar(); 
        $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $sql = "DELETE FROM produtos WHERE id=?;";
        $query = $pdo->prepare($sql); 
        $query->execute (array($id));
        Conexao::desconectar(); 
        //echo PDO::ERRMODE_EXCEPTION; 
   }

   header("location:listarProdutos.php"); 

?> 