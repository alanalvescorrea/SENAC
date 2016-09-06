<?php
//Corrige a codificação de caracteres para ISO ou UTF
    ini_set('default_charset','utf-8');

//Inicia variáveis
    $vServidor='localhost';
    $vUsuario='root';
    $vSenha='root';

//Realiza a conexão
    $vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha);
        if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

//Cria a base de dados
    $vSql='CREATE DATABASE loja;';
    $vResultado = mysqli_query($vConexao, $vSql);
    echo('Base de dados criada com sucesso!');

//cria a tabela
   $vSql='CREATE TABLE vendas'.
   '('.
   'id_venda INT(4)NOT NULL AUTO_INCREMENT, '.
   'produto VARCHAR(20)NOT NULL, '
   'valor INT(6)NOT NULL, '
   'quantidade INT(4),'
   'CONSTRAINT PrKvenda PRIMARY KEY (id_venda)'.
   ');';
    $vResultado = mysqli_query($vConexao, $vSql);
    echo('tabela criada com sucesso!');

//cria o trigger
    $vSql='CREATE TRIGGER TR_COMPRA AFTER INSERT'.
    'ON vendas, '.
    'FOR EACH ROW, '.
    'SET NEW produto=(@produto);';
    $vResultado = mysqli_query($vConexao, $vSql);
    echo('trigger criada com sucesso!');

//cria o view
    $vSql='CREATE VIEW vr_vendas'.
    'AS SELECT produto, quantidade, '.
    'FROM produto, quantidade, '.
    'WHERE quantidade = (@quantidade>2); ';
    $vResultado = mysqli_query($vConexao, $vSql);
    echo('view criada com sucesso!');


?>