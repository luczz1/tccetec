<?php

namespace App\Entity;
use \App\Db\Database;
use \PDO;

class Classes{
    public $id;
    public $nomeaula;
    public $nomeprof;
    public $nomemateria;          //nome dos campos presentes no banco de dados
    public $descricao;
    public $conteudo;
    public $contimage;

    public function insert(){ //função para inserir o formulário do usuário no banco de dados
        $obDatabase = new Database('aulas'); //acessa o database de aulas
        $this->id = $obDatabase->register([ //adiciona o id para separar as aulas por um id diferente
            //inserir a aula no banco
            'nomeaula' => $this->nomeaula,
            'nomeprof' => $this->nomeprof,
            'nomemateria' => $this->nomemateria,  
            'descricao' => $this->descricao,
            'conteudo' => $this->conteudo,
            'contimage' => $this->contimage
        ]);
        return true; //retorna verdadeira
    }

    public function excluir(){ //metódo responsável por excluir uma aula do banco
        return (new Database('aulas'))->delete('id = '.$this->id); //ele acessa o banco de dados 'aulas' e deleta um id específico
    }

    public static function getClasses($where = null, $order = null, $limit = null){ //metódo responsavel por pegar as aulas do banco
        return (new Database('aulas'))->select($where,$order,$limit) //ele acessa o where order e limit da aula
                                            ->fetchAll(PDO::FETCH_CLASS,self::class); //Retorna um array contendo todas as linhas definidas pelo resultado
    }

    public static function getClasse($id){ //metódo responsavel por obter o id
        return (new Database('aulas'))->select('id = '.$id) //acessa o banco de dados e seleciona o id
                                            ->fetchObject(self::class); //busca a próxima linha e devolve-a como um objeto
    }
}