<?php // frmEdtPro.php
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
    <title>Edição de Produtos</title>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

     <!-- biblioteca de icones -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>

<style>
    .camp{
        margin-left: 17%!important;
    }
</style>

<body>
    <div class="container grey lighten-3 col s12">
    <div class="title col s12" style="text-align: center;">
                <h1>Adicionar Novo Produto</h1>
        </div>
        <div class="row">
            <form action="edtPro.php" method="POST" id="frmEdtPro"
                  name="frmEdtPro" class="col s12">

                <div class="camp input-field col s8">
                   <h3> <label for="lblID"><b>ID: </b> <?php echo $id;?> </label></h3>
                   <input type="hidden" name="id" id="id" value=" <?php echo $id;?> ">
                </div>

                <div class="camp input-field col s8">
                    <label for="lblDesc">Informe a Descrição: </label>
                    <input type="text" class="form-control" id="txtDesc"
                           name="txtDesc" value="<?php echo $desc;?>">
                </div>

                <div class="camp input-field col s8">
                    <label for="lblQtde">Informe a Quantidade: </label>
                    <input step="0.01" type="number" class="form-control" id="txtQtde"
                    name="txtQtde" value="<?php echo $qtde;?>"onblur="calcula_total()">
                </div>

                <div class="camp input-field col s8">
                    <label for="lblValor">Informe o Valor: </label>
                    <input step="0.01" type="number" class="form-control" id="txtValor"
                     name="txtValor" value="<?php echo $valor;?>" onblur="calcula_total()">
                </div>

                <div class="camp input-field col s8">
                   <h4> <label for="lblTotal"><b>Total: </b> <label id="total"><?php echo number_format($total, 2, ',', ' ');?></label> </label> </h4>
                </div>

                <div class="camp input-field col s8">
                    <button class="btn waves-effect waves-light" type="submit" id="btnSalvar">
                        Salvar <i class="material-icons right">save</i>
                    </button>

                    <button class="btn waves-effect waves-light orange" type="reset" id="btnLimpar">
                        Limpar <i class="material-icons right">brush</i>
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

<script>
function calcula_total(){
    var quantidade = parseFloat(document.getElementById('txtQtde').value, 10);
    var valor = parseFloat(document.getElementById('txtValor').value, 10);
    var total = quantidade * valor;
    if (isNaN(total))
       total = 0;
    document.getElementById("total").innerHTML = total.toFixed(2);
}
</script>
