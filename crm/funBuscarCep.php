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
 
 
 
 
// Função que busca o cep e Retorno endereço ma forma de um array
function busca_cep($cep){   
	$resultado = file_get_contents('http://www.buscarcep.com.br/?cep='.urlencode($cep).'&formato=string');
	if(!$resultado){
		$resultado = "&resultado=0&resultado_txt=erro+ao+buscar+cep";
		echo "<script>\n alert(\"Web service de busca de CEP temporariamente indisponível!\"); \n</script>";
	}
	parse_str($resultado, $retorno);
	return $retorno;
}

?>
