<?php
require_once '../../../config/database.php';
require_once '../../dao/sacoleDAO.php';
require_once '../../dao/TipoSacoleDAO.php';
require_once '../../model/sacole.php';

class crudVenda {

    //=> Métodos de Modal
    
    public static function listarProduto($id, $qtd) {
        session_start();

        $dao = new sacoleDAO();
        $sacolePedido = $dao->listarPorId($id);

        if (!isset($_SESSION['listPedido'])) {
            $_SESSION['listPedido'] = [];
        }

        $repetido = false;
        foreach ($_SESSION['listPedido'] as &$item) {
            if ($item['id'] == $id) {
                $item['quantidade'] += $qtd;
                $repetido = true;
                break;
            }
        }

        if (!$repetido && $sacolePedido) {
            $_SESSION['listPedido'][] = [
                'id' => $sacolePedido->getId(),
                'sabor' => $sacolePedido->getSabor(),
                'codTipo' => $sacolePedido->getCodTipo(),
                'tipo' => $sacolePedido->getTipo(),
                'preco' => $sacolePedido->getPreco(),
                'quantidade' => $qtd
            ];
        }

        $listPedido = Sacole::listaArrayToObject($_SESSION['listPedido']);
        
        require '../../views/vendas/renderPedido.php';

    }

    public static function apagarSacole($id) {
        session_start();
        $_SESSION['listPedido'] = array_values(array_filter($_SESSION['listPedido'], function($item) use ($id) {
            return (int)$item['id'] !== (int)$id;
        }));        

        $listPedido = Sacole::listaArrayToObject($_SESSION['listPedido']);
        require '../../views/vendas/renderPedido.php';
    }

    public static function limparPedido() {
        session_start();
        
       
        if (isset($_SESSION['listPedido'])) {
            unset($_SESSION['listPedido']);
        }

        $listPedido = [];
    
        require '../../views/vendas/renderPedido.php';

    }
}

