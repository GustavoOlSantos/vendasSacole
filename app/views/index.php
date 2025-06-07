<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Vendas de Sacolé</title>

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css2?family=Sedgwick+Ave&family=PT+Sans&display=swap" rel="stylesheet">

    <!-- Bootstrap e FontAwesome -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/4a077ed16e.js" crossorigin="anonymous"></script>

    <!-- Estilo personalizado -->
    <link rel="stylesheet" href="../../public/css/main.css" />
</head>

<body>

    <?php include('partials/menu.php') ?>

    
    <section class="welcome text-center mt-4">
        <h2 class="font-weight-bold">Bem vindo!</h2>
    </section>

    <div class="container py-4">
        <div class="row g-4 justify-content-center">

            <!-- Card Venda -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="vendas/" class="card h-100 text-white text-decoration-none bg-venda shadow-sm card-hover">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa-solid fa-cash-register fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-1">Venda de Sacolé</h5>
                            <small>Nova venda de sacolés</small>
                        </div>
                    </div>
                    <div class="card-footer bg-dark bg-opacity-50 d-flex justify-content-between align-items-center">
                        <span>Acessar</span><i class="fa-solid fa-circle-arrow-right"></i>
                    </div>
                </a>
            </div>

            <!-- Card Estoque -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="../controller/estoque/listarEstoque.php" class="card h-100 text-white text-decoration-none bg-estoque shadow-sm card-hover">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa-solid fa-snowflake fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-1">Estoque</h5>
                            <small>Controle de estoque de sacolés</small>
                        </div>
                    </div>
                    <div class="card-footer bg-dark bg-opacity-50 d-flex justify-content-between align-items-center">
                        <span>Acessar</span><i class="fa-solid fa-circle-arrow-right"></i>
                    </div>
                </a>
            </div>

            <!-- Card Produtos -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="../controller/produtos/listarProdutos.php" class="card h-100 text-white text-decoration-none bg-produto shadow-sm card-hover">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa-solid fa-tag fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-1">Produtos</h5>
                            <small>Controle de sacolés disponíveis</small>
                        </div>
                    </div>
                    <div class="card-footer bg-dark bg-opacity-50 d-flex justify-content-between align-items-center">
                        <span>Acessar</span><i class="fa-solid fa-circle-arrow-right"></i>
                    </div>
                </a>
            </div>

            <!-- Card Relatórios -->
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <a href="#" class="card h-100 text-white text-decoration-none bg-relatorio shadow-sm card-hover">
                    <div class="card-body d-flex align-items-center">
                        <i class="fa-regular fa-folder-open fa-2x me-3"></i>
                        <div>
                            <h5 class="mb-1">Relatórios</h5>
                            <small>Relatórios gerais</small>
                        </div>
                    </div>
                    <div class="card-footer bg-dark bg-opacity-50 d-flex justify-content-between align-items-center">
                        <span>Acessar</span><i class="fa-solid fa-circle-arrow-right"></i>
                    </div>
                </a>
            </div>

        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
