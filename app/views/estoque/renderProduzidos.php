<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Sabor</th>
            <th>Quantidade</th>
            <th>Excluir</th>
        </tr>
    </thead>

    <tbody>
        <?php 
        foreach($listProduzidos as $sProduzido) {
            $id = $sProduzido->getId();
            $sabor = $sProduzido->getSabor();
            $quantidade = $sProduzido->getQuantidade();
            ?>
            <tr>
                <td><?php echo $id ?></td>
                <td><?php echo $sabor; ?></td>
                <td><?php echo $quantidade; ?></td>
                <td><a data-id="<?php echo $id?>" onclick='apagarProduzido(this)' class="tableAction btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
            </tr>
        <?php }  ?>
    </tbody>
</table>