<?php // frmRemPro.php
    include 'conexao.php';
    
    //recuperar o valor do id passado ao programa pelo método GET
    $id = $_GET['id']; 

    //recuperar o registro no banco de dados
    $pdo = Conexao::conectar(); 
    $pdo->setAttribute(PDO:: ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $sql = "SELECT * FROM produtos WHERE id=?;";
    $query = $pdo->prepare($sql); 
    $query->execute (array($id));
    $dados = $query->fetch(PDO::FETCH_ASSOC); 
    $desc = $dados['descricao']; 
    $qtde = $dados['quantidade'];
    $valor= $dados['valor']; 
    $total = $qtde * $valor; 
    Conexao::desconectar(); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Remoção de Produtos</title>
   <!-- Compiled and minified CSS -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- biblioteca de icones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<style>
    .t{
        border: 2px solid;
        border-radius: 43px;
        margin-top: 10%;
        background-color: black;
        color: white;
        width: 27%;
        text-align: center;
    }
</style>

<body>
    <div class="container t">
        <div class="row s12">
            <h3>Remover Produto</h3>
        </div>
        <div class="row">
            <form action="remPro.php" method="POST" id="frmRemPro" name="frmRemPro" class="col s12">

                <div class="row">
                    <div class="input-field col s12">
                         <label for="lblID"><h5><b>ID:</b> <?php echo $id;?></h5></label>
                         <input type="hidden" name="id" id="id" value="<?php echo $id;?>">
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                         <label for="lblDesc"><h5><b>DESCRIÇÃO:</b> <?php echo $desc;?></h5></label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <label for="lblQtde"><h5><b>QUANTIDADE:</b><?php echo number_format($qtde, 2, ',', ' ');?></h5></label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                         <label for="lblValor"><h5><b>VALOR:</b> <?php echo number_format($valor, 2, ',', ' ');?></h5></label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                         <label for="lblTotal"><h5><b>TOTAL:</b> <?php echo number_format($total, 2, ',', ' ');?></h5></label>
                    </div>
                </div>

                <div class="input-field col s8">
                    <br>
                    <button class="btn waves-effect waves-light red" type="submit" id="btnRemover">
                        Remover<i class="material-icons right">delete_forever</i>
                    </button>

                    <button class="btn waves-effect waves-light indigo darken-3" type="button" id="btnVoltar"
                            onclick="JavaScript:location.href='listarProdutos.php'">
                        Voltar <i class="material-icons right">arrow_back</i>
                    </button>
                </div>
            </form>

        </div>
    </div>
</body>
</html>