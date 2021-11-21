<?php

namespace App\Db;

use \PDO;
use PDOException;

class database
{
    const HOST = 'localhost';
    const NAME = 'tcc';
    const USER = 'root';
    const PASS = '';

    private $table; //nome da tabela a ser manipulado
    private $connection; //instacia de conexão com o banco de dados do tipo PDO

    public function __construct($table = null) //define a tabela e instacia a conexão
    {
        $this->table = $table;
        $this->setConnection();
    }

    private function setConnection() //metódo responsável por criar uma conexão com o banco de dados
    {
        try {
            $this->connection = new PDO('mysql:host=' . self::HOST . ';dbname=' . self::NAME, self::USER, self::PASS); //conexão com banco de dados
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //exception caso tenha erros
        } catch (PDOException $e) {
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function execute($query, $params = []) //função para padronizar e executar as querys do banco de dados
    {
        try {
            $statement = $this->connection->prepare($query); //prepara a query
            $statement->execute($params); //executa a query e os parametros
            return $statement; //retorna o statement
        } catch (PDOException $e) { //exception caso tenha erros
            die('ERROR: ' . $e->getMessage());
        }
    }

    public function register($values) //função para adicionar os valores no banco de dados
    {
        $fields = array_keys($values); //array_keys — Retorna todas as chaves ou uma parte das chaves de um array
        $binds = array_pad([], count($fields), '?'); //array_pad — Expande um array para um certo comprimento utilizando um determinado valor

        $query = 'INSERT INTO ' . $this->table . ' (' . implode(',', $fields) . ') VALUES (' . implode(',', $binds) . ')'; //faz a query para inserir os campos na tabela

        $this->execute($query,array_values($values)); //execute a query e seus valores
        return $this->connection->lastInsertId(); //retorna a conexão da query com o último id inserido
    }

    public function select($where = null, $order = null, $limit = null, $fields = '*'){ //função para mostrar os campos na tela
        $where = strlen($where) ? 'WHERE ' .$where : '';
        $order = strlen($order) ? 'ORDER BY' .$order : '';  //strlen — Retorna o tamanho de uma string //verifica se as variaveis where order limit tem o mesmo tamanho
        $limit = strlen($limit) ? 'LIMIT ' .$limit : ''; //se tiver ele vai retornar elas e se não tiver ele deixará vazio

        $query = 'SELECT'.$fields .'FROM '.$this->table.' '.$where.' '.$order.' '.$limit; //faz a query para selecionar todos os campos da tabela

        return $this->execute($query); //retorna e executa a query
    }

    public function delete($where){ //função para deletar os dados do campo

        $query = 'DELETE FROM '.$this->table.' WHERE '.$where; //faz a query deletando o where da tabela
        $this->execute($query); //executa a query
        return true; //retorna verdadeiro
    }
}