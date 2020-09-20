<?php
	session_start();
	if(!isset($_SESSION['usuario']) )
	   header("Location:index.php");

    include 'conexao.php';
    $pdo = Conexao::conectar();
    $sql = 'Select * from produtos order by descricao;';
    $listaProdutos = $pdo->query($sql);
?>

<!DOCTYPE html>

<head>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

        <link rel="stylesheet" type="text/css" href="global.css" media="screen" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
       
        <title>Produtos</title>
</head>

<body> 

    <div class="col-12 paglog">
        
        <i class="fa fa-user-circle font" aria-hidden="true"><?php echo $_SESSION['nome'];?></i> 

        <i class="material-icons left sair " title="Sair" onclick="JavaScript:location.href='logout.php'">exit_to_app</i></a>
        
    </div>  
    
    <div  class="col-md-12 carousels" >
        <div class="container">

            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->
                <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                </ol>

                <!-- Wrapper for slides -->
                <div class="carousel-inner">

                    <div class="item active">
                        <img class="img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSa5_s3wyERy09tJ7cmrKeJTnb3fHgr54-5tkgrl254j4_HvXJtSof_gy-hpTnf-z4J43yHsVj9&usqp=CAc" alt="produtos">
                    </div>

                    <div class="item">
                        <img class="img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSX45LjCP6XL3QpJyKHjeintEg_hfqRl82SPQ&usqp=CAU" alt="Produto">
                    </div>
    
                    <div class="item">
                        <img class="img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSkwnf_jMrNLEM_InmeGQhYEaqHyVt4RDLE-g&usqp=CAU" alt="Produto">
                    </div>

                </div>

                <!-- Left and right controls -->
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
                </a>

                <a class="right carousel-control" href="#myCarousel" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </div>


    <div class="col-md-12">
        <h3 class="solid amber lighten-3">Adicionar Produtos
        <a class="btn-floating btn-large waves-effect waves-light green"
            onclick="JavaScript:location.href='frmInsPro.php'"><i class="faicon fa fa-plus-circle"></i></a>
        </h3>
        <table class="striped" class="responsive-table">
            <!-- Cabeçalho da tabela-->
            <tr class = "orange lighten-4" class="blue-text text-darken-2">
                <th> ID </th>
                <th> DESCRIÇÃO </th>
                <th> QUANTIDADE </th>
                <th> VALOR </th>
                <th> TOTAL </th>
                <th>Editar</th>
                <th> Deletar</th>
            </tr>
            <!-- prencher tabela com dados -->
            <?php
            foreach ($listaProdutos as $produto) {
            ?>
                <tr class="blue-text text-light-blue accent-4"  >
                    <td><?php echo $produto['id']; ?></td>
                    <td><?php echo $produto['descricao']; ?></td>
                    <td><?php  echo number_format($produto['quantidade'], 2, ',', '.');  ?></td>
                    <td><?php echo number_format($produto['valor'], 2, ',', '.'); ?></td>
                    <?php $total = $produto['quantidade'] * $produto['valor']; ?>
                    <td><?php echo number_format($total, 2, ',', ' '); ?></td>
                    <td> <a class="btn-floating btn-small waves-effect waves-light orange"
                                    onclick="JavaScript:location.href='frmEdtPro.php?id=' +
                                    <?php echo $produto['id'];?>">
                                <i class="material-icons">edit</i></a>
                    </td>
                    <td> <a class="btn-floating btn-small waves-effect waves-light red"
                                    onclick="JavaScript:location.href='frmRemPro.php?id=' +
                                    <?php echo $produto['id'];?>">
                                <i class="material-icons">delete</i></a>
                    </td>
                </tr>

            <?php
                }
            ?>
        </table>
    </div>

</body>
</html>
