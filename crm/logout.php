<?php
/*   BSR Web OS - Copyright 2008 BSRSoft LTDA

   Licensed under the Apache License, Version 2.0 (the "License");
   you may not use this file except in compliance with the License.
   You may obtain a copy of the License at

       http://www.apache.org/licenses/LICENSE-2.0

   Unless required by applicable law or agreed to in writing, software
   distributed under the License is distributed on an "AS IS" BASIS,
   WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
   See the License for the specific language governing permissions and
   limitations under the License.*/
   
   
   
// Inicializa o engine de tratamento de sess�es do PHP
session_start();

// Se n�o existe um usu�rio logado no momento, o sistema redireciona o acesso para a p�gina inicial do website, delogado
if(!isset($_SESSION['usuario']) || !isset($_SESSION['senha'])){
    header("Location: index.php");
    exit;
}else{

// Se existe um usu�rio logado no momento, o sistema destr�i a sess�o de login e redireciona o usu�rio para a p�gina inicial do website
    session_unset();
    if(session_destroy()){
        header("Location: index.php");
    }else{

// Rotina simples de tratamento de erros. Requer melhorias para uma informa��o menos superficial a ser fornecida na tela	
        echo "<b>Ocorreu um erro ao destruir a sess�o.</b><br />";
    }
}
?>