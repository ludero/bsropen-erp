
 // Sintaxe: googleCharts( Int Largura, Int Altura, Str Tipo, Array Conteudo [, Str Titulo] );
// Retorno: String
// Descrição:
// Chame a função para retornar o link da API do Google Charts, para ser
// usado no src da tag <img> do HTML já exibindo o gráfico.
// Na Str Tipo é possível usar 6 tipos de gráficos diferentes:
// pizza => Cria gráfico em pizza
// pizza3d => Cria gráfico em pizza 3d
// linha => Cria gráfico em linhas
// onda => Cria gráfico em ondas
// barra_h => Cria gráfico em barras na horizontal
// barra_v => Cria gráfico em barras na vertical

// Bibliotecas: Nenhuma
// Limitações: PHP 4.0+



<?PHP
function googleCharts ( $largura, $altura, $tipo, $arrays, $titulo="" ) {

# ~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~ #
# Função criada por Leonardo Pereira ( dantetekanem[at]hotmail[dot]com ) #
# Créditos: Google Charts API - http://chart.apis.google.com/ #
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