<?php
require_once '../../../config/database.php';
require_once '../../dao/sacoleDAO.php';
require_once(__DIR__ . '../../../../config/url.php');

$dao = new sacoleDAO();
$sacoles = $dao->listarTodos();

require '../../views/estoque/index.php';
