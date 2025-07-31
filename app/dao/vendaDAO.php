<?php
require_once '../../model/venda.php';
require_once '../../model/sacole.php';

class vendaDAO {
    private $conn;

    public function __construct() {
        $this->conn = Database::getConnection();
    }

    public function listarTodos() {
        $query = $this->conn->query("SELECT s.id, s.sabor, s.quantidade, s.tipo AS codTipo, t.tipo AS tipo, t.preco FROM sacoles s JOIN tipoSacole t ON s.tipo = t.id;");
        $arrs = $query->fetchAll(PDO::FETCH_ASSOC);
        $sacoles = [];

        foreach ($arrs as $arr) {
            $sacoles[] = new Sacole($arr['id'], $arr['sabor'], $arr['codTipo'],  $arr['tipo'], $arr['preco'], $arr['quantidade']);
        }

        return $sacoles;
    }

    public function listarPorId($id) {
        $query = $this->conn->prepare("SELECT * FROM vendas WHERE id = ?");
        $query->execute([$id]);
        $arr = $query->fetch(PDO::FETCH_ASSOC);

        $query2 = $this->conn->prepare("SELECT * FROM vendas_sacole WHERE id_venda = ?");
        $query2->execute([$id]);
        $arr2 = $query2->fetch(PDO::FETCH_ASSOC);

        $venda = new Venda($arr['id'], $arr['data'], $arr['valorTotal']);
        
        foreach ($arr2 as $sacole) {
            $sacole = new Sacole($sacole['id'], $sacole['sabor'], $sacole['codTipo'],  $sacole['tipo'], $sacole['preco'], $sacole['quantidade']);
            $venda->appendSacole($sacole);
        }
        return $venda;
    }

    public function inserirVenda(Venda $v) {
        try {
            $this->conn->beginTransaction();
            $query = $this->conn->prepare("INSERT INTO vendas (data_venda, total) VALUES (?, ?)");
            $query->execute([$v->getData(), $v->getTotal()]);
            
            $v->setId($this->conn->lastInsertId());
    
            foreach ($v->getSacolesVendidos() as $sacole) {
                $query2 = $this->conn->prepare("INSERT INTO vendas_sacole (id_venda, id_sacole, qtd) VALUES (?, ?, ?)");
                $query2->execute([$v->getId(), $sacole->getId(), $sacole->getQuantidade()]);

                $query3 = $this->conn->prepare("UPDATE sacoles SET quantidade = quantidade - ? WHERE id = ?");
                $query3->execute([$sacole->getQuantidade(), $sacole->getId()]);
            }
    
            $this->conn->commit();
            echo json_encode(['success' => true, 'message' => 'Venda registrada com sucesso!']);
            return true;
        } catch (Exception $e) {
            $this->conn->rollBack();
            echo json_encode(['success' => false, 'message' => 'Erro ao registrar a venda.', 'errorLog' => 'Falha ao Registrar a Venda: ' . $e->getMessage() . '|| Linhas: ' . $e->getLine()]);
            return false;
        }
    } 
}
