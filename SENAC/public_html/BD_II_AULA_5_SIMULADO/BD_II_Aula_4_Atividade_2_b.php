Triggers:
	São um conjunto de comando que está relacionado à uma tabela e faz alguma função na mesma. O mesmo é automaticamente e pode acontecer ao ser inserido, atualisado ou deletado alguma coisa na tabela.



<?php
$vServidor="localhost";
$vUsuario="root";
$vSenha="";
$vBaseDados="mercado";

$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
if (!$vConexao) {
	die('Problemas na conexão: ' . mysqli_connect_error());
}

$vSql = 'CREATE TRIGGER tr_aumento BEFORE INSERT ' . 
		 'ON produto ' .
		 'FOR EACH ROW ' . 
		 ' SET NEW.preco_aumento = (NEW.preco*0,1+NEW.preco);';
$vResultado = mysqli_query($vConexao, $vSql);
 
$vSql = 'DROP TRIGGER tr_aumento;';
$vResultado = mysqli_query($vConexao, $vSql);
?>
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
--mysqli_connect = Faz a conexão ao banco de dados passando o servidor, usuario, senha e a base de dados.

CREATE TRIGGER tr_aumento BEFORE INSERT
--CREATE TRIGGER = Cria uma trigger
-- tr_aumento = Nome da Trigger;
-- BEFORE = Uma condição, no caso a trigger sera executada depois de algo;
-- INSERT = A insersão, no caso a trigger vai ser executada depois de alguma insersão.

ON produto
-- ON = Mostra em que tabela sera executada a trigger;
-- produto = É o nome da tabela que vai ser executada a trigger;
	
FOR EACH ROW
-- FOR EACH = A cada 
--Pra cada linha que esta a ser inserida

SET NEW.preco_aumento = (NEW.preco*0,1+NEW.preco);
--Vai configurar o preco_aumento colocando 10% de aumento

	
DROP TRIGGER tr_aumento;
--Apaga a trigger.
	


VIEW
É uma tabela virtual que contem um conjunto de resultuado, que é criada pra facilitar a consulta, a mesma pode ser consultada. É um espelho da tabelas consultadas, assim sempre deixa ela ser atualizada.



<?php
$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
if (!$vConexao) {
	die('Problemas na conexão: ' . mysqli_connect_error());
}

$vSql = 'CREATE VIEW v_produtos ' .
			'AS SELECT produto.preco, AS valor, ' .
			'historico.venda, AS saida;';
			'FROM produto ' .
			'INNER JOIN historico;';
$vResultado = mysqli_query($vConexao, $vSql);

$vSql = 'DROP VIEW v_produtos;';
$vResultado = mysqli_query($vConexao, $vSql);

?>

$vConexao = mysqli_connect($vServidor, $vUsuario, $vSenha, $vBaseDados);
--mysqli_connect = Faz a conexão ao banco de dados passando o servidor, usuario, senha e a base de dados.

CREATE VIEW v_produtoa
--Creia a view e a nomeia

AS SELECT produto.preco, AS valor
historico.venda, AS saida
--Seleciona o que vai pegar de cada tabela.

FROM produto
INNER JOIN historico
--De qual tabela os dados estão vindo

DROP VIEW v_produtos;
--Deleta a view que o nome foi passado.




	