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

    <title>Vendas de Sacolé</title>
</head>

<body>
    <div class="welcome">
        <p>Estoque atual de Sacolés</p>
    </div>

    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Sabor</th>
                    <th>Quantidade</th>
                </tr>
            </thead>

            <tbody>
                <?php 
                foreach($sacoles as $sacole) {
                    $id = $sacole->getId();
                    $sabor = $sacole->getSabor();
                    $quantidade = $sacole->getQuantidade();
                    ?>

                    <tr>
                        <td><?php echo $id ?></td>
                        <td><?php echo $sabor; ?></td>
                        <td><?php echo $quantidade; ?></td>
                    </tr>
                <?php }  ?>
            </tbody>
        </table>
    </div>

    <div class="container">
        <div class="actions">
            <a data-toggle="modal" data-target="#modalProd" class="addSacole"> <i class="fa-solid fa-plus"></i> Produção</a>
        </div>
    </div>

    <div class="modal fade" id="modalProd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
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
</body>

</html>