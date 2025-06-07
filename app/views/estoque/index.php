<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

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

  <!-- Estilos e scripts personalizados -->
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/main.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/tables.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/modal.css">
  <script src="<?= BASE_URL ?>/public/js/estoqueFunctions.js"></script>

  <title>Estoque de Sacolé</title>
</head>

<body>

    <?php include('../../views/partials/menu.php') ?>

    <section class="welcome text-center mt-4">
      <h2 class="font-weight-bold">Estoque atual de Sacolés</h2>
    </section>

    <div class="container my-4">
      <div class="table-responsive">
        <table class="table">
          <thead>
            <tr>
              <th  hidden >#</th>
              <th>Sabor</th>
              <th>Quantidade</th>
              <th>V. Unid</th>
              <th>V. Total</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($sacoles as $sacole) : ?>

              <?php $flag = $sacole->getQuantidade() == 0 ? "table-danger" : ""; ?>

              <tr class="<?= $flag ?>">
                <td hidden ><?= $sacole->getId() ?></td>
                <td><?= $sacole->getSabor() ?></td>
                <td><?= $sacole->getQuantidade() ?></td>
                <td><?= "R$". number_format($sacole->getPreco(), 2, ',', '.') ?></td>
                <td><?= "R$". number_format($sacole->getQuantidade() * $sacole->getPreco(), 2, ',', '.') ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

  <div class="container">
    <div class="actions text-center mt-4">
      <a href="#" data-bs-toggle="modal" data-bs-target="#modalProd" class="btn btn-primary mr-2 addSacole">
        <i class="fa-solid fa-plus"></i> Produção
      </a>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalProd" tabindex="-1" role="dialog" aria-labelledby="modalProdLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content bigger">
        <div class="modal-header">
          <h5 class="modal-title" id="modalProdLabel">Produção de Sacolé</h5>
        </div>
        <div class="modal-body producao">
          <label for="sacolesDisponiveis">Sacolés Disponíveis</label>
          <div class="container flex-form-group px-0">
            <select class="form-control" name="sacolesDisponiveis" id="sacolesDisponíveis">
              <option value="-1">Selecione um sabor</option>
              <?php foreach ($sacoles as $sacole) : ?>
                <option value="<?= $sacole->getId() ?>"><?= $sacole->getSabor() ?></option>
              <?php endforeach; ?>
            </select>

            <input type="number" class="form-control" style="width: 80px;" min="0" name="qtdProduzida" id="qtdProduzida" placeholder="Qtd.">
            <button onclick="registrarProducao()" class="btn btn-info mr-2">Ok</button>
          </div>

          <hr>

          <label>Sacolés Produzidos</label>
          <div id="sacolesProduzidos"></div>

          <div class="container flex-form-group px-0 mt-3">
            <button onclick="enviarProduzidos()" class="btn btn-success">Enviar Produzidos</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="desfazerLista()">Fechar</button>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>
