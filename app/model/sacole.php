<?php
class Sacole {
    private $id, $sabor, $codTipo, $tipo, $preco, $quantidade;

    public function __construct($id = null, $sabor = null, $codTipo = null, $tipo = null,  $preco = null, $quantidade = null) {
        $this->id = $id;
        $this->sabor = $sabor;
        $this->preco = $preco;
        $this->codTipo = $codTipo;
        $this->tipo = $tipo;
        $this->quantidade = $quantidade;
    }

    public function getId() { return $this->id; }
    public function getSabor() { return $this->sabor; }

    public function getCodTipo() { return $this->codTipo; }
    public function getTipo() { return $this->tipo; }
    public function getPreco() { return $this->preco; }
    public function getQuantidade() { return $this->quantidade; }

    public function setId($id) { $this->id = $id; }
    public function setSabor($sabor) { $this->sabor = $sabor; }
    public function setCodTipo($codTipo) { $this->codTipo = $codTipo; }
    public function setTipo($tipo) { $this->tipo = $tipo; }
    public function setPreco($preco) { $this->preco = $preco; }
    public function setQuantidade($quantidade) { $this->quantidade = $quantidade; }

    public function calcularValorTotalEstoque() {
        return $this->preco * $this->quantidade;
    }

    public function isValidoCadastro(){
        return !empty($this->sabor) && !empty($this->tipo);
    }
}
