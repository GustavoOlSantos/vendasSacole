<form action="../../controller/actions/produtos.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $sacole->getId(); ?>">
    <input type="hidden" name="action" value="editar">

    <div class="form-group">
        <label for="sabor">Sabor:</label>
        <input type="text" class="form-control" id="sabor" name="sabor" value="<?php echo $sacole->getSabor(); ?>" required>
    </div>

    <div class="form-group">
        <label for="tipo">Tipo do Sacolé: </label>
        <select name="tipo" id="tipo" onchange="getPreco(this.value)">
            <option value='1' <?= $sacole->getCodTipo() == 1 ? 'selected' : '' ?>>normal</option>
            <option value='2' <?= $sacole->getCodTipo() == 2 ? 'selected' : '' ?>>gourmet</option>
        </select>
    </div>

    <div class="form-group">
        <label for="preco">Preço:</label>
        <input type="number" class="form-control" id="preco" name="preco" value="<?php echo $sacole->getPreco(); ?>" readonly required>
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
