<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserção de Produtos</title>

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
            <form action="inspro.php" method="POST" id="frmInsPro" name="frmInsPro" class="col s12">

                <div class="camp input-field col s8">
                    <label for="lblDesc">Informe a Descrição: </label>
                    <input type="text" class="form-control" id="txtDesc" name="txtDesc">
                </div>

                <div class="camp input-field col s8">
                    <label for="lblQtde">Informe a Quantidade: </label>
                    <input step="0.01" type="number" class="form-control" id="txtQtde" name="txtQtde" onblur="calcula_total()">
                </div>

                <div class="camp input-field col s8">
                    <label for="lblValor">Informe o Valor: </label>
                    <input step="0.01" type="number" class="form-control" id="txtValor" name="txtValor" onblur="calcula_total()">
                </div>

                <div class="camp input-field col s8">
                   <h4> <label for="lblTotal"><b>Total: </b> <label id="total"></label> </label> </h4>
                </div>

                <div class="camp input-field col s8">
                    <br>
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