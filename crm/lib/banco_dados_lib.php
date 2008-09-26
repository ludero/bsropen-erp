<?php

// Função de conexão ao banco MySQL e escolha do banco de dados de uso
function banco($user,$pass,$db)
 {

 @mysql_connect("localhost", $user, $pass) or die("Erro: Foi impossível nos conectar ao banco MySQL");
	 mysql_select_db($db);

 }
 
 
 
 // Trocar banco MySQL em uso
 function trocar_banco($db)
 {
	 mysql_select_db($db);

 }
 

?>
