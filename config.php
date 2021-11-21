<?php


session_start(); //inicia a session
const host = 'localhost'; //nome do host do banco
const dbname = 'tcc'; //nome do banco de dados
const user = 'root'; //nome do usuário
const pass = ''; //senha

try {
    $pdo = new PDO('mysql:host='.host.';dbname='.dbname.'', user, pass); //faz a conexão com o banco de dados via pdo.
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //define um atributo de erro que levará para uma exception
} catch(PDOException $e) {
    echo 'Erro ao conectar: '.$e->getMessage(); //caso tenha uma exception mostrará mensagem de erro na tela.
}

?>