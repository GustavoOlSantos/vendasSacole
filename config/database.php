<?php
class Database {
    public static function getConnection() {
        $host    = "localhost";    //=> Nome do Server (IP, Link ou Localhost)
        $dbname  = "sistem-sacole";      //=> Nome do Banco de Dados
        $user    = "LLG-sacole";     //=> Nome do Usuário do Banco de Dados
        $pass    = "llg3407"; //=> sSenha do Usuário do Banco de Dados

        try {
            return new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        } catch (PDOException $e) {
            die("Erro na conexão: " . $e->getMessage());
        }
    }
}
