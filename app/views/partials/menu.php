<?php require_once(__DIR__ . '/../../../config/url.php'); ?>

<nav class="navbar navbar-expand-md navbar-dark bg-dark px-4 shadow-sm">
    <div class="container-fluid">

        <a class="navbar-brand fw-bold text-white fancy" href="<?php echo BASE_URL ?>">
            <i class="fa-solid fa-ice-cream me-2"></i>LLG
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuNav" aria-controls="menuNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="menuNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo BASE_URL ?>">
                        <i class="fa-solid fa-house me-1"></i>Início
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo BASE_URL."/app/controller/vendas/novaVenda.php" ?>">
                        <i class="fa-solid fa-cash-register me-1"></i>Vendas
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo BASE_URL."/app/controller/estoque/listarEstoque.php" ?>">
                        <i class="fa-solid fa-snowflake me-1"></i>Estoque
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link active" href="<?php echo BASE_URL."/app/controller/produtos/listarProdutos.php" ?>">
                        <i class="fa-solid fa-tag me-1"></i>Produtos
                    </a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>
