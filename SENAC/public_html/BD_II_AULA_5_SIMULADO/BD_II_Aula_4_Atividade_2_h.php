<?php

ini_set('default_charset','utf-8');

//Conectar a base de dados a partir do arquivo de configurações

$vServidor="localhost";
$vUsuario="root";
$vSenha="";
$vBaseDados="lojinha";

//codigo de conexão com o banco
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
if (!$vConexao) {die('Problemas na conexão: ' . mysqli_connect_error());}

//delete trigger
$vSql='DROP TRIGGER tr_desconto;';
$vResultado = mysqli_query($vConexao, $vSql);
echo('Trigger excluida com sucesso!');

?>