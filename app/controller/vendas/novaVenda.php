<?php
require_once '../../../config/database.php';
require_once '../../dao/sacoleDAO.php';
require_once '../../dao/tipoSacoleDAO.php';
require_once(__DIR__ . '../../../../config/url.php');


$dao = new SacoleDAO();
$estoqueSacoles = $dao->listarTodos();
$produtoSacoles = $dao->listarTodos();

require '../../views/vendas/index.php';
?>