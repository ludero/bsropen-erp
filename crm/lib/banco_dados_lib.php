<?php

// Fun��o de conex�o ao banco MySQL e escolha do banco de dados de uso
function banco($user,$pass,$db)
 {

 @mysql_connect("localhost", $user, $pass) or die("Erro: Foi imposs�vel nos conectar ao banco MySQL");
	 mysql_select_db($db);

 }
 
 
 
 // Trocar banco MySQL em uso
 function trocar_banco($db)
 {
	 mysql_select_db($db);

 }
 

?>
