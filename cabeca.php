<? 
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
   
   

session_start();  // Inicia o suporte a sessões


// Bloco de código responsável pelo carregamento das páginas de cadastro conforme opção feita em menu
if($_POST["cadastros"] != NULL){
if($_POST["cadastros"] == '1')    header("Location: cad_clientes.php?op=1");
elseif($_POST["cadastros"] == '2') header("Location: cad_fornece.php?op=1");
elseif($_POST["cadastros"] == '3') header("Location: cad_funcionarios.php?op=1");
elseif($_POST["cadastros"] == '4') header("Location: cad_orcamentos.php?op=1");
elseif($_POST["cadastros"] == '5') header("Location: cad_representa.php?op=1");
else echo"";
}


// Bloco de código responsável pelo carregamento das páginas de busca conforme opção feita em menu
if($_POST["buscas"] != NULL){
if($_POST["buscas"] == '1')    header("Location: busca_clientes.php?op=2");
elseif($_POST["buscas"] == '2') header("Location: busca_fornece.php?op=2");
elseif($_POST["buscas"] == '3') header("Location: busca_funcionarios.php?op=2");
elseif($_POST["buscas"] == '4') header("Location: busca_orcamentos.php?op=2");
elseif($_POST["buscas"] == '5') header("Location: busca_representa.php?op=2");
else echo"";
}






echo "<title>Página de Acesso ao Sistema - CRM</title>";
include("lib/banco_dados_lib.php");  // biblioteca de funções de banco de dados MySQL criada pela BSRSoft

banco("erp","senha_para_acesso_ao banco_erp","erp");  // Função que conecta ao banco de dados para uso do CRM/ERP

// ------------------------------------------------------------------------------------
if($_POST['login'] != NULL){
 $_SESSION['usuario'] = $_POST['login'];
 $_SESSION['senha'] = $_POST['senha'];

}


// Esse bloco recupera informações báscicas do usuário logo após o seu login para uso futuro do sistema
if ($_SESSION['usuario'] != NULL)
{
$user_id=trim(mysql_escape_string(strtolower($_SESSION['usuario'])));
$password=trim(mysql_escape_string($_SESSION['senha']));
$query = mysql_query("select * from usuarios where usuario='$user_id' and
senha=sha1('$password')");
$cnpj_usuario=@mysql_result($query,0,"cnpj");
$email_usuario=@mysql_result($query,0,"email");
$empresa_usuario=@mysql_result($query,0,"empresa");


//Esse bloco pega o layout das páginas e seus CSS no banco de dados
$query2 = mysql_query("select * from layout where cnpj='$cnpj_usuario'");
$css_html=@mysql_result($query2,0,"css");
$rodape_html=@mysql_result($query2,0,"rodape");
$cabecalho_html=@mysql_result($query2,0,"cabecario");


if(!mysql_num_rows($query)) {

$query2 = mysql_query("select * from layout");
$css_html=@mysql_result($query2,0,"css");
$cabecalho_html=@mysql_result($query2,0,"cabecario");
$rodape_html=@mysql_result($query2,0,"rodape");


echo '<style type="text/css">';
echo $css_html;
echo '</style>
';


echo $cabecalho_html;   // insere o cabeçalho do sistema no alto da página


// Caixa de Login e senha
echo"
<form method='post' action=''>
<!-- start button -->
<div id='button'>
<h2>Usuário</h2>
</div>
<!-- end button -->
<input type='text' name='login' size='20'><br /><br /><br />

<!-- start button -->
<div id='button'>
<h2>Senha</h2>
</div>
<!-- end button -->
<input type='password' name='senha' size='20'><br /><br /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='submit' value='Login'>
</form>
<br /><br />
<div id='linha'> </div>
<div id='linha'> </div>

<br />

&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp <h2>Você digitou nome de Usuário e/ou Senha incorreto(s). Por favor digite seu nome de Usuário e Senha nos campos acima. <br />Se tentou efetuar login, com dados corretos e está encontrando dificuldades para acessar o sistema,
por favor contate seu Administrador de Redes.</h2>
<!-- start footer -->
<div style='clear: both;'>&nbsp;
    <p>&nbsp;</p>
          <p>&nbsp;</p>
          <p>&nbsp;</p>
    </div>
<div id='footer'>
$rodape_html
</div>
<!-- end footer -->
";
exit;
}else {
$_SESSION['login'] = '1';
$_SESSION['cnpj_usuario'] = $cnpj_usuario;
$_SESSION['email_usuario'] = $email_usuario;
$_SESSION['empresa_usuario'] = $empresa_usuario;

}

}

if($_SESSION['login'] != '1'){

$query2 = mysql_query("select * from layout");
$css_html=@mysql_result($query2,0,"css");
$cabecalho_html=@mysql_result($query2,0,"cabecario");
$rodape_html=@mysql_result($query2,0,"rodape");


echo '<style type="text/css">';
echo $css_html;
echo '</style>
';


echo $cabecalho_html;




echo"
<form method='post' action=''>
<!-- start button -->
<div id='button'>
<h2>Usuário</h2>
</div>
<!-- end button -->
<input type='text' name='login' size='20'>
<br /><br /><br />

<!-- start button -->
<div id='button'>
<h2>Senha</h2>
</div>
<!-- end button -->
<input type='password' name='senha' size='20'>
<br /><br /><br />
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='submit' name='submit' value='Login'>
</form>
<br /><br />

<div id='linha'> </div>
<div id='linha'> </div>

<br /><br />

&nbsp&nbsp&nbsp&nbsp <h2>Bem vindo à Pagina de Acesso aos Sistemas BSRSoft. <br /> Para acessar o sistema você precisa efetuar login. Por favor digite seu nome de Usuário e Senha nos campos acima. <br />Se está encontrando dificuldades para acessar o sistema,
por favor contate seu Administrador de Redes.</h2>

<!-- start footer -->
<div style='clear: both;'>&nbsp;
    <p>&nbsp;</p>
          <p>&nbsp;</p>
              </div>
<div id='footer'>
$rodape_html
</div>
<!-- end footer -->
";
exit;

}



?>



<? // ------------------------------------------------------------------------------------------------------ ?>








<html>
<!-- ...............start head............. -->
<head>
<meta http-equiv="content-type" content="text/html" />
<title>CRM</title>
<meta name="keywords" content="" />
<meta name="description" content="" />

<?

echo '<style type="text/css">';
echo $css_html;
echo '</style></head>
<!-- ...............end head.............. -->
';





// -------------------------------------------------------------------------------



$name=mysql_result($query,0,"nome");
$email=mysql_result($query,0,"email");
$empresa=mysql_result($query,0,"empresa");

$status=mysql_result($query,0,"status");
$data_status=mysql_result($query,0,"data_status");

// Permissões --------------------------------------------------------------------
$per_crm_cadastro=mysql_result($query,0,"per_crm_cadastro");
$per_crm_busca=mysql_result($query,0,"per_crm_busca");
$per_crm_relatorio_operadores=mysql_result($query,0,"per_crm_relatorio_operadores");
$per_crm_altera_cadastro=mysql_result($query,0,"per_crm_altera_cadastro");






$usuario = mysql_escape_string($_SESSION['usuario']);




$ip = getenv(REMOTE_ADDR);


$host = gethostbyaddr($_SERVER['REMOTE_ADDR']);

$recurso = $_SERVER['SCRIPT_FILENAME'];



$a = (int)$_GET["a"];


$get = "?a=".$a;



$i=mysql_query("INSERT INTO rastros (ip, host, usuario, recurso, get, data) VALUES ('$ip', '$host', '$usuario', '$recurso', '$get', now())");









// ------------------------------------------------------------------------------------------------------
// Acesso Não Autorizado/Bloqueado

if($status != '0'){
$data_statusx = strtotime($data_status);

$data_statusx = date("l d of F Y H:i:s - T", $data_statusx);


$message="O usuário $usuario tentou efetuar acesso não autorizado ao ERP em $data_statusx . Ele está com restrição de acesso código $status";
mail(
"andre@bsrpar.com","Alerta: Tentativa de Acesso Não Autorizado ao ERP","$message"
,"From:Sistema IT ERP <andre@bsrpar.com>"
);

echo"
<script language='Javascript'>
alert ('Parada de Segurança. Desde $data_statusx você não está mais autorizado a operar o sistema. Código $status . Informe o Administrador de redes.')
</script>

<noscript>
<b>Parada de Segurança. Desde $data_statusx você não está mais autorizado a operar o sistema. Código $status . Informe o Administrador de redes.</b></noscript>
";
exit(2);



}

// Fim do Acesso Não Autorizado/Bloqueado
// ------------------------------------------------------------------------------------------------------




?>
<!-- ...............start header............. -->

<?
$layout_query = mysql_query("select * from layout where cnpj='$cnpj_usuario'");
if(!mysql_num_rows($query)) {}else{
$cabecario_html=mysql_result($layout_query,0,"cabecario");
$rodape_html=mysql_result($layout_query,0,"rodape");

}

?>

<div id="header">
	<div id="logo">
<? echo $cabecario_html; ?>
  </div>


<script>
function controlaCamada(nomeDiv) 
{ 
    if( document.getElementById(nomeDiv).style.visibility == "hidden" ) 
    { 
        document.getElementById(nomeDiv).style.visibility = "visible"; 
    } else 
    { 
        document.getElementById(nomeDiv).style.visibility = "hidden";
window.print(); 
    } 
}



function controlaCamada1(nomeDiv) 
{ 

        document.getElementById(nomeDiv).style.visibility = "hidden";



window.print(); 


}


function controlaCamada2(nomeDiv) 
{ 

        document.getElementById(nomeDiv).style.visibility = "visible";
 

}


</script>
    <?     if($_GET['print'] != '1')  {
echo'
 <div id="menu">
		<ul>
			<li><a href="https://bsrsoft.com.br/erp/crm/index.php">home</a></li>
			<li><a href="https://bsrsoft.com.br/erp/crm/cadastrox.php?op=1">cadastro</a></li>
			<li><a href="https://bsrsoft.com.br/erp/crm/buscax.php?op=2">busca/alteração</a></li>
			<li><a href="https://bsrsoft.com.br/erp/crm/xfs/principal.php">arquivos</a></li>
            <li><a href="https://bsrsoft.com.br/erp/crm/erp">acesso ao erp</a></li>
 			<li><a href="https://bsrsoft.com.br/erp/crm/logout.php">logout</a></li>
			</ul>
	</div>
 ';
                                    }   ?>

</div>
<? // ----------------------------------------------------------- ?>


<? // ------------------------------------------------------ ?>
<!-- ...............end header............. -->

<?
if($_GET['print'] != '1')  {
    echo'
<p id="usuario">Bem Vindo(a) '; echo "$name"; echo'</p>

<br />     ';


echo '
<p id="ip">Seu IP rastreado é: '.$ip.' | Seu provedor de acesso (se identificado) é: '.$host.' </p>
';
                           }
?>



<br />


<?
if(basename($_SERVER[SCRIPT_FILENAME]) == 'buscador.php' || basename($_SERVER[SCRIPT_FILENAME]) == 'cad_orcamentos.php'){
echo'
<center>
	<table id="cadastro"><tr>
		<td><h3><a href="javascript:controlaCamada1(\'menu\');">Imprimir Página</a></h3></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
		<td><h3><a href="javascript:controlaCamada2(\'menu\');">Voltar ao modo Não Impressão</a></h3></td>
	</tr>
</table>
</center>
';
}
?>




<? if($per_crm_cadastro > 0 && $_GET["op"]== 1 ){

echo '
<!-- .............start linha............. -->
<div id="linha"> </div>
<!-- .............end linha............. -->
<br />

<center><h2>
Escolha a Opção de Cadastro: <form method ="post" action="">
<select name="cadastros" onchange="this.form.submit()">
<option selected value="">Selecione</option>
<option value="1">Cadastro de Clientes</option>
<option value="2">Cadastro de Fornecedores</option>
<option value="3">Cadastro de Funcionários</option>
<option value="4">Cadastro de Orçamentos</option>
<option value="5">Cadastro de Representantes</option>
</select>
</form></h2>
</center>
<br />
';
}
?>




<? if($per_crm_busca > 0 && $_GET["op"]== 2 ){

echo '
<!-- .............start linha............. -->
<div id="linha"> </div>
<!-- .............end linha............. -->
<br />

<center><h2>
Escolha a Opção de Busca: <form method ="post" action="">
<select name="buscas" onchange="this.form.submit()">
<option selected value="">Selecione</option>
<option value="1">Busca de Clientes</option>
<option value="2">Busca de Fornecedores</option>
<option value="3">Busca de Funcionários</option>
<option value="4">Busca de Orçamentos</option>
<option value="5">Busca de Representantes</option>
</select>
</form></h2>
</center>

<br />
';
}
?>



<script>


 function formatar(src, mask, e)
 {
     if (e.keyCode != 8){ //backspace
         var i = src.value.length;
         var saida = mask.substring(0,1);
         var texto = mask.substring(i)
         if (texto.substring(0,1) != saida) {
             src.value += texto.substring (0,1);
         }
     }
 } 


</script>

</html>
