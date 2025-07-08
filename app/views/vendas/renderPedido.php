<?php 
    foreach($listPedido as $sPedido) {
        $id = $sPedido->getId();
        $sabor = $sPedido->getSabor();
        $quantidade = $sPedido->getQuantidade();
        $preco = $sPedido->getPreco();
        ?>
        <tr>
            <td hidden ><?php echo $id ?></td>
            <td><?php echo $sabor; ?></td>
            <td><?php echo $quantidade; ?></td>
            <td><?php echo "R$ " . number_format($preco, 2, ',', '.'); ?></td>
            <td id="vtotalSacole"><?php echo "R$ " . number_format($quantidade * $preco, 2, ',', '.'); ?></td>
            <td><a data-id="<?= $id ?>" onclick='apagarSacole(<?= $id ?>)' class="tableAction btn btn-danger"><i class="fa-solid fa-trash"></i></a></td>
        </tr>
<?php }  ?>