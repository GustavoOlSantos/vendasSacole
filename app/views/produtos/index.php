<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Sacolés Cadastrados</title>

  <!-- Fontes -->
  <link href="https://fonts.googleapis.com/css?family=Sedgwick+Ave&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=PT+Sans&display=swap" rel="stylesheet">

  <!-- Bootstrap e FontAwesome-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/4a077ed16e.js" crossorigin="anonymous"></script>

  <!-- jQuery e Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

  <!-- Estilos e scripts personalizados -->
  <script src="<?= BASE_URL ?>/public/js/produtosFunctions.js"></script>
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/main.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/tables.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/modal.css">
</head>

<body>
  <?php include('../../views/partials/menu.php') ?>

  <section class="welcome text-center mt-4">
    <h2 class="font-weight-bold">Sacolés Disponíveis para Venda</h2>
  </section>

  <div class="container my-4">
    <div class="table-responsive">
      <table class="table table-hover">
        <thead>
          <tr>
            <th hidden >#</th>
            <th>Sabor</th>
            <th>Tipo</th>
            <th>Valor</th>
            <th>Edit</th>
            <th>Del</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($sacoles as $sacole): ?>
            <tr>
              <td hidden ><?= $sacole->getId(); ?></td>
              <td><?= $sacole->getSabor(); ?></td>
              <td><?= $sacole->getTipo(); ?></td>
              <td>R$ <?= number_format($sacole->getPreco(), 2, ',', '.'); ?></td>
              <td>
                <a href="#" class="tableAction btn edit" data-bs-toggle="modal" data-bs-target="#modalEdit" onclick="editarSacole(this)">
                  <i class="fa-solid fa-pencil-alt"></i>
                </a>
              </td>
              <td>
                <a href="#" class="tableAction btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalDel" onclick="apagarSacole(this)">
                  <i class="fa-solid fa-trash-alt"></i>
                </a>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>

    <div class="actions text-center mt-4">
      <a href="#" class="btn btn-primary mr-2 addSacole" data-bs-toggle="modal" data-bs-target="#modalAdd">
        <i class="fa-solid fa-plus"></i> Adicionar Novo Sabor
      </a>
      <a href="#" class="btn btn-secondary config" data-bs-toggle="modal" data-bs-target="#modalPrices" onclick="configurarPrices()">
        <i class="fa-solid fa-gear"></i> Configurar Valores
      </a>
    </div>
  </div>
</body>

</html>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Sacolé</h5>
      </div>
      <div class="modal-body editBody">
        
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Adicionar Sacolé</h5>
      </div>
      <div class="modal-body">
        <form  action="../../controller/actions/produtos.php" method="POST">
          <input type="hidden" name="action" value="inserir">

          <div class="form-group">
              <label for="sabor">Sabor:</label>
              <input type="text" class="form-control" id="sabor" name="sabor" required>
          </div>

          <div class="form-group">
              <label for="tipo">Tipo do Sacolé: </label>

              <select name="tipo" id="tipo" onchange="getPreco(this.value)" class="form-control" required>
                <option value='1'>Tradicional</option>";
                <option value='2'>Gourmet</option>";
              </select>
          </div>

          <div class="form-group">
              <label for="preco">Preço:</label>
              <input type="number" class="form-control" name="preco" id="preco" value="3" readonly required>
          </div>

          <div class="form-options">
            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>              
        </div>
        </form>
        
        <script>
            function getPreco(tipo){
              let precoInput = document.getElementById('preco');

              fetch(`../ajax/getPreco.php?tipo=${tipo}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            precoInput.value = data.preco;
                        }
                    })

                    .catch(error => {
                        console.error('Erro:', error.message);
                        alert('Erro ao buscar o preço.');
                    });
            }
        </script>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalDel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Excluir Sacolé</h5>
      </div>
      <div class="modal-body">
        <form class="ConfirmDialog" action="../../controller/actions/produtos.php" method="POST">
          <p id="h5Apagar">Deseja excluir o Sacolé de </p>
          <input type="hidden" name="action" value="apagar">
          <input type="hidden" name="id" id="idApagar">

          <div class="form-options">
            <button type="submit" class="btn btn-success">Confirmar</button>
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>              
          </div>
        </form>

        <script>
            function getPreco(tipo){
              let precoInput = document.getElementById('preco');

              fetch(`../ajax/getPreco.php?tipo=${tipo}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            precoInput.value = data.preco;
                        }
                    })

                    .catch(error => {
                        console.error('Erro:', error.message);
                        alert('Erro ao buscar o preço.');
                    });
            }
        </script>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalPrices" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Configurar Preço</h5>
      </div>

      <div class="modal-body configBody">
        <form class="confirmDialog" action="../../controller/actions/produtos.php" method="POST">
          <input type="hidden" name="action" value="configurarPreco">

          <div class="form-group">
              <label for="normal">Tradicional: </label>
              <input type="number" class="form-control" id="normal" name="normal" min="0" step="0.1" value="" required>

              <label style="margin-top: 10px;" for="gourmet">Gourmet: </label>
              <input type="number" class="form-control" id="gourmet" name="gourmet" min="0" step="0.1" value="" required>

              <div class="form-options">
                <button type="submit" class="btn btn-success">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>              
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
