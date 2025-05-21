<?php
require_once '../../../config/database.php';
require_once '../../dao/sacoleDAO.php';
require_once '../../views/menu.php';

$dao = new sacoleDAO();
$sacoles = $dao->listarTodos();

require '../../views/estoque/index.php';
