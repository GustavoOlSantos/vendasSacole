<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

 <!-- Fontes -->
 <link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

  <!-- Bootstrap + FontAwesome -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4a077ed16e.js" crossorigin="anonymous"></script>

  <!-- jQuery e Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <!-- CSS e JS personalizados -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/main.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/tables.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/modal.css">
  <script src="<?= BASE_URL ?>/public/js/vendaFunctions.js"></script>

  <title>Vendas</title>
</head>

<body>
  <?php include('../../views/partials/menu.php') ?>

  <section class="welcome text-center mt-4">
    <h2 class="font-weight-bold">Venda de Sacolés</h2>
  </section>

  <div class="container my-5">
    <div class="row g-4">
      <!-- Adicionar Sacolés ao Pedido -->
      <div class="col-12 col-lg-6">
        <label for="sacolesDisponiveis" class="form-label fw-semibold">Adicionar sacolés ao pedido</label>

        <div class="d-flex align-items-center gap-2">
          <select class="form-select" id="sacoleSelecionado" name="sacolesDisponiveis">
            <option value="-1">Selecione um sabor</option>
            <?php foreach ($produtoSacoles as $pSacole) : ?>
              <option value="<?= $pSacole->getId() ?>"><?= $pSacole->getSabor() ?></option>
            <?php endforeach; ?>
          </select>

          <input type="number" class="form-control w-auto" min="0" name="qtd" id="qtd" placeholder="Qtd.">
          <button onclick="registrarProduto()" class="btn btn-info form-control">
            <i class="fas fa-plus"></i> Adicionar
          </button>
        </div>

        <div class="mt-4">
          <label class="form-label fw-semibold">Estoque atual de Sacolés</label>
          <div class="table-responsive">
            <table class="table table-striped table-bordered align-middle">
              <thead class="table-light">
                <tr>
                  <th hidden>#</th>
                  <th>Sabor</th>
                  <th>Quantidade</th>
                  <th>V. Unid</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($estoqueSacoles as $eSacole) : ?>
                  <?php $flag = $eSacole->getQuantidade() == 0 ? "table-danger" : ""; ?>
                  <tr class="<?= $flag ?>">
                    <td hidden><?= $eSacole->getId() ?></td>
                    <td><?= $eSacole->getSabor() ?></td>
                    <td><?= $eSacole->getQuantidade() ?></td>
                    <td><?= "R$ " . number_format($eSacole->getPreco(), 2, ',', '.') ?></td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- Pedido Atual -->
      <div class="col-12 col-lg-6 border-start border-2 ps-lg-4">
        <label class="form-label fw-semibold">Pedido</label>
        <div class="table-responsive">
          <table id="tablePedido" class="table table-bordered table-hover align-middle">
            <thead class="table-light">
              <tr>
                <th hidden>#</th>
                <th>Sabor</th>
                <th>Quantidade</th>
                <th>V. Unid</th>
                <th>V. Total</th>
                <th>Ação</th>
              </tr>
            </thead>
            <tbody id="pedidoAtual">
              <!-- Conteúdo preenchido dinamicamente -->
            </tbody>
          </table>
        </div>

        <div class="d-flex justify-content-between align-items-center mt-3 flex-wrap gap-2">
            <!-- Lado esquerdo: Total -->
            <div class="d-flex align-items-center gap-2">
                <p class="mb-0 fw-semibold">Total do Pedido:</p>
                <p id="TotalPedido" class="mb-0">R$ 0,00</p>
            </div>

            <!-- Lado direito: Botões -->
            <div class="d-flex align-items-center gap-2">
                <a class="btn btn-danger" href="#" onclick="limparPedido()">
                <i class="fas fa-trash-alt"></i> Limpar pedido
                </a>
                <a class="btn btn-success" href="#">
                <i class="fas fa-check-circle"></i> Fechar venda
                </a>
            </div>
        </div>
      </div>
    </div>
  </div>

</body>

</html>
