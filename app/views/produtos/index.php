<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sedgwick Ave">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT Sans">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>

    <script src="https://kit.fontawesome.com/4a077ed16e.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src= "<?= BASE_URL ?>/public/js/modalFunctions.js"></script>
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/main.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/tables.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/css/modal.css">

    <title>Sacolés Cadastrados</title>
</head>

<body>
    <div class="welcome">
        <p>Sacolés Disponíveis para venda:</p>
    </div>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sabor</th>
                    <th>Tipo</th>
                    <th>Valor</th>
                    <th>Edit</th>
                    <th>Del</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                foreach($sacoles as $sacole) {
                    $id = $sacole->getId();
                    $sabor = $sacole->getSabor();
                    $tipo = $sacole->getTipo();
                    $valor = $sacole->getPreco();
                    ?>

                    <tr>
                    <td><?php echo $id ?></td>
                    <td><?php echo $sabor; ?></td>
                    <td><?php echo $tipo; ?></td>
                    <td><?php echo "R$" . sprintf("%.2f", $valor); ?></td>
                    <td><a data-toggle="modal" data-target="#modalEdit" onclick='editarSacole(this)'class="tableAction edit"><i class="fa-solid fa-pencil"></i></a></td>
                    <td><a data-toggle="modal" data-target="#modalDel" onclick='apagarSacole(this)' class="tableAction btn-danger"><i class="fa-solid fa-trash"></i></a></td>
                </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>

    <div class="container">
        <div class="actions">
            <a data-toggle="modal" data-target="#modalAdd" class="btn addSacole"> <i class="fa-solid fa-plus"></i> Adicionar Novo Sabor</a>
            <a data-toggle="modal" data-target="#modalPrices" class="btn config" onclick="configurarPrices()"> <i class="fa-solid fa-gear"></i> Configurar Valores</a>
        </div>
    </div>
</body>

</html>

<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Sacolé</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span>&times;</span>
        </button>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span>&times;</span>
        </button>
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
                <option value='1'>normal</option>";
                <option value='2'>gourmet</option>";
              </select>
          </div>

          <div class="form-group">
              <label for="preco">Preço:</label>
              <input type="number" class="form-control" name="preco" id="preco" value="3" readonly required>
          </div>

          <div class="form-options">
            <button type="submit" class="btn btn-success">Salvar</button>
            <button type="button" class="btn btn-secondary"data-dismiss="modal">Cancelar</button>              
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span>&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="ConfirmDialog" action="../../controller/actions/produtos.php" method="POST">
          <p id="h5Apagar">Deseja excluir o Sacolé de </p>
          <input type="hidden" name="action" value="apagar">
          <input type="hidden" name="id" id="idApagar">

          <div class="form-options">
            <button type="submit" class="btn btn-success">Confirmar</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>              
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
          <span>&times;</span>
        </button>
      </div>

      <div class="modal-body configBody">
        <form class="confirmDialog" action="../../controller/actions/produtos.php" method="POST">
          <input type="hidden" name="action" value="configurarPreco">

          <div class="form-group">
              <label for="normal">Normal: </label>
              <input type="number" class="form-control" id="normal" name="normal" min="0" step="0.1" value="" required>

              <label style="margin-top: 10px;" for="gourmet">Gourmet: </label>
              <input type="number" class="form-control" id="gourmet" name="gourmet" min="0" step="0.1" value="" required>

              <div class="form-options">
                <button type="submit" class="btn btn-success">Confirmar</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>              
              </div>
          </div>
      </div>
    </div>
  </div>
</div>
