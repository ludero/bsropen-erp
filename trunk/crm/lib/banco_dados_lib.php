<?php
/*   Copyright 2008 BSRSoft LTDA

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.*/
   
   

// Função de conexão ao banco MySQL e escolha do banco de dados de uso
function banco($user,$pass,$db)
 {

 @mysql_connect("localhost", $user, $pass) or die("Erro: Foi impossível nos conectar ao banco MySQL");
	 mysql_select_db($db);

 }
 
 
// Função de conexão ao banco MySQL e escolha do banco de dados de uso hosteado em outro servidor
 function banco_x($host,$user,$pass,$db)
 {

 @mysql_connect($host, $user, $pass) or die("Erro: Foi impossível nos conectar ao banco MySQL");
	 mysql_select_db($db);

 }
 
 
 
 // Trocar banco MySQL em uso
 function trocar_banco($db)
 {
	 mysql_select_db($db);

 }
 

?>
