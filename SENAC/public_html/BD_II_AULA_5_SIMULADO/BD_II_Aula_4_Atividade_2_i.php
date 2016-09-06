<?php

ini_set('default_charset','utf-8');

//Conectar a base de dados

$vServidor='localhost';
$vUsuario='root';
$vSenha='';
$vBaseDados='lojinha';

//codigo de conexão com o SQL
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

//Cria a base de dados
$vSql='CREATE OR REPLACEE DATABASE lojinha;';
$vResultado = mysqli_query($vConexao, $vSql);
echo('Base de dados criada com sucesso!');

//codigo de conexão com o banco de dados
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

//criando tabela
$vSql='CREATE OR REPLACEE TABLE produto '.
      '( '.
      'id INT(10) NOT NULL AUTO_INCREMENT PRIMARY KEY, '.
      'nome VARCHAR(40) NULL, '.
      'preco_normal decimal (10.2) NULL, '.
      'preco_desconto INT(10) NULL '.
      '); ';
$vResultado = mysqli_query($vConexao, $vSql);
echo('Tabela de dados criada com sucesso!');

//criando trigger
//timing de execução AFTER 'antes' ou BEFORE 'despois' da execução do operação ao qual a trigger esta atrelada.
//operações INSERT 'iserir', UPDATE 'atualizar' ou DELETE 'deletar'.



$vSql='CREATE OR REPLACEE TRIGGER tr_desconto BEFORE INSERT '.
//'ON' referencia a uma ou mais tebelas.
      'ON produto '.
//'FOR EACH ROW função para executar uma sequencia de linhas de comando.
      'FOR EACH ROW '.
//SET configuração da nova variavel.
//'NEW' refere-se a um novo valor setado no banco.
      'SET NEW.preco_desconto = (NEW.preco_normal * 0.90);';
$vResultado = mysqli_query($vConexao, $vSql);
echo('Trigger de dados criada com sucesso!');

?>