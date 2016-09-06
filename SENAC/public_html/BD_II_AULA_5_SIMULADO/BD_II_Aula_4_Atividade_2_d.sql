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
	$vSql='CREATE DATABASE teste;';
	$vResultado = mysqli_query($vConexao, $vSql);
	echo('Base de dados criada com sucesso!');

?>

