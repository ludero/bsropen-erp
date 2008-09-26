
 // Sintaxe: googleCharts( Int Largura, Int Altura, Str Tipo, Array Conteudo [, Str Titulo] );
// Retorno: String
// Descri��o:
// Chame a fun��o para retornar o link da API do Google Charts, para ser
// usado no src da tag <img> do HTML j� exibindo o gr�fico.
// Na Str Tipo � poss�vel usar 6 tipos de gr�ficos diferentes:
// pizza => Cria gr�fico em pizza
// pizza3d => Cria gr�fico em pizza 3d
// linha => Cria gr�fico em linhas
// onda => Cria gr�fico em ondas
// barra_h => Cria gr�fico em barras na horizontal
// barra_v => Cria gr�fico em barras na vertical

// Bibliotecas: Nenhuma
// Limita��es: PHP 4.0+



<?PHP
function googleCharts ( $largura, $altura, $tipo, $arrays, $titulo="" ) {

# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ #
# Fun��o criada por Leonardo Pereira ( dantetekanem[at]hotmail[dot]com ) #
# Cr�ditos: Google Charts API - http://chart.apis.google.com/ #
# Meu site: http://www.leonardopereira.pt.to/ #
# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ #

$base_url = "http://chart.apis.google.com/chart?";

$base_url .= "chs=$largura"."x"."$altura";

$tipos = array (
'pizza' => 'p',
'pizza3d' => 'p3',
'linha' => 'lc',
'onda' => 'ls',
'barra_h' => 'bhs',
'barra_v' => 'bvs'
);

$base_url .= "&cht=".$tipos[$tipo];

$base_url .= ($titulo=="") ? "" : "&chtt=".urlencode($titulo);

foreach ( $arrays as $nome => $valor ) {

$chd[] = urlencode($valor);
$chl[] = urlencode($nome." ($valor)");

}

$base_url .= "&chd=t:".join(",",$chd);
$base_url .= "&chl=".join("|",$chl);

return $base_url;

}
?>