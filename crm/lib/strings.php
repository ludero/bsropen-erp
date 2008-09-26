<?

// -------------------------------------------------------------------
// Se encontra uma virgula transforma em ponto. Boa para Inserir Floats no MySQL
function ponto_e_virgula($valor){
	$new   = str_replace(",", ".", $valor);

return $new;
}

?>