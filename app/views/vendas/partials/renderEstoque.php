<?php 
    foreach ($estoqueSacoles as $eSacole) : ?>
        <?php $flag = $eSacole->getQuantidade() == 0 ? "table-danger" : ""; ?>
        <tr class="<?= $flag ?>" id="Sacole<?= $eSacole->getId() ?>">
          <td hidden><?= $eSacole->getId() ?></td>
          <td><?= $eSacole->getSabor() ?></td>
          <td><?= $eSacole->getQuantidade() ?></td>
          <td><?= "R$ " . number_format($eSacole->getPreco(), 2, ',', '.') ?></td>
        </tr>
      <?php endforeach;