<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sedgwick Ave">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT Sans">

    <script src="https://kit.fontawesome.com/4a077ed16e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../public/css/main.css">

    <title>Vendas de Sacolé</title>
</head>

<body>

    <?php include('menu.php') ?>

    <div class="welcome">
        <p>Bem vindo!</p>
    </div>

    <div class="container">

        <div class="all-card">
            <div class="options-wrap">
                <a class="card venda" href="vendas/">

                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fa-solid fa-cash-register"></i>
                        </div>

                        <div class="card-title">
                            <h6 class="titulo"> Venda de Sacolé</h6>
                            <h6 class="subtitulo"> Nova venda de sacolés</h6>
                        </div>
                    </div>

                    <div class="card-footer">
                        <h6>Acessar</h6> <i class="fa-solid fa-circle-arrow-right"></i>
                    </div>
                </a>

                <a class="card estoque" href="../controller/estoque/listarEstoque.php">

                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fa-solid fa-snowflake"></i>
                        </div>

                        <div class="card-title">
                            <h6 class="titulo"> Estoque</h6>
                            <h6 class="subtitulo"> Controle de estoque de sacolés.</h6>
                        </div>
                    </div>

                    <div class="card-footer">
                        <h6>Acessar</h6> <i class="fa-solid fa-circle-arrow-right"></i>
                    </div>
                </a>

                <a class="card estoque" href="../controller/produtos/listarProdutos.php">

                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fa-solid fa-tag"></i>
                        </div>

                        <div class="card-title">
                            <h6 class="titulo"> Produtos</h6>
                            <h6 class="subtitulo"> Controle de sacolés disponíveis.</h6>
                        </div>
                    </div>

                    <div class="card-footer">
                        <h6>Acessar</h6> <i class="fa-solid fa-circle-arrow-right"></i>
                    </div>
                </a>

                <a class="card relatorio" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="card-content">
                        <div class="card-icon">
                            <i class="fa-regular fa-folder-open"></i>
                        </div>

                        <div class="card-title">
                            <h6 class="titulo">Relatórios</h6>
                            <h6 class="subtitulo"> Relatórios gerais</h6>
                        </div>
                    </div>

                    <div class="card-footer">
                        <h6>Acessar</h6> <i class="fa-solid fa-circle-arrow-right"></i>
                    </div>
                </a>

                <!-- <div name="relatorios" class="dropdown-menu relat" aria-labelledby="dropdownMenuButton">
                    <div class="glass"></div>

                    <a class="dropdown-item" href="">Vendas Mensais</a>
                    <div class="dropdown-divider"></div>
                </div> -->
            </div>
        </div>
    </div>
</body>

</html>