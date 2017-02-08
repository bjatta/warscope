<?php
error_reporting(-1) ; // включить все виды ошибок, включая  E_STRICT
ini_set('display_errors', 'On');  // вывести на экран помимо логов

////////////////////////////////////////////////////////////////////////////////////////////////
//Указываем ссылки на страницы
$source_url =[
'http://wiki.wargaming.net/ru/Tank_types_lighttank',
'http://wiki.wargaming.net/ru/Tank_types_mediumtank',
'http://wiki.wargaming.net/ru/Tank_types_heavytank',
'http://wiki.wargaming.net/ru/Tank_types_at-spg',
'http://wiki.wargaming.net/ru/Tank_types_spg'];

$source_lt='http://wiki.wargaming.net/ru/Tank_types_lighttank';
$source_st='http://wiki.wargaming.net/ru/Tank_types_mediumtank';
$source_tt='http://wiki.wargaming.net/ru/Tank_types_heavytank';
$source_pt='http://wiki.wargaming.net/ru/Tank_types_at-spg';
$source_art='http://wiki.wargaming.net/ru/Tank_types_spg';
////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////
//функция выврезки контента
function parser($url,$start,$finish) {
$content = file_get_contents($url);

$position = strpos($content, $start);
$content = substr($content, $position);

$position = strpos($content, $finish);
$content = substr($content, 0, $position);

return $content;
}

//функция удаления пробелов
function full_trim($str) { return trim(preg_replace('/\s{2,}/', ' ', $str)); }
//функция замены пробелов
function spaces($str) { return trim(preg_replace('/\s{1,}/', '_', $str)); }
////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////
//выводим шапку
$html = '<html>
<header>
<meta charset="UTF-8" />
</header>
<body>
';
////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////
//вырезаем нужные куски html
for ($i=0; $i < ; $i++) { 
	
	# code...
}
$source_lt = parser($source_lt, '<div class="wot-frame-1">', 'NewPP limit report');
$source_st = parser($source_st, '<div class="wot-frame-1">', 'NewPP limit report');
$source_tt = parser($source_tt, '<div class="wot-frame-1">', 'NewPP limit report');
$source_pt = parser($source_pt, '<div class="wot-frame-1">', 'NewPP limit report');
$source_art = parser($source_art, '<div class="wot-frame-1">', 'NewPP limit report');

//получаем массивы из страниц
preg_match_all('~&#160;<a href="/ru/Tank:(.*?)</a>~is', $source_lt, $tanks_lt);
preg_match_all('~&#160;<a href="/ru/Tank:(.*?)</a>~is', $source_st, $tanks_st);
preg_match_all('~&#160;<a href="/ru/Tank:(.*?)</a>~is', $source_tt, $tanks_tt);
preg_match_all('~&#160;<a href="/ru/Tank:(.*?)</a>~is', $source_pt, $tanks_pt);
preg_match_all('~&#160;<a href="/ru/Tank:(.*?)</a>~is', $source_art, $tanks_art);
////////////////////////////////////////////////////////////////////////////////////////////////
$n = 1;
////////////////////////////////////////////////////////////////////////////////////////////////
//генерируем содержимое для ЛТ
for ($i = 0; $i <= (count($tanks_lt[1])-1); $i++) {

$position = strpos($tanks_lt[1][$i], '">');
$tanks_lt[1][$i] = substr($tanks_lt[1][$i], $position);
$tanks_lt[1][$i] = str_replace( '">', "", $tanks_lt[1][$i]);

$hash = spaces(full_trim ($tanks_lt[1][$i]));
$hash = str_replace( '-', '_', $hash);
$hash = str_replace( '.', '', $hash);
$hash = str_replace( '(', '', $hash);
$hash = str_replace( ')', '', $hash);
$hash = str_replace( '/', '_', $hash);
$hash = str_replace( ',', '_', $hash);
$hash = str_replace( '*', '', $hash);

$html .= $n.'. '.$tanks_lt[1][$i].' | #'.$hash.'<br/>
';
$n = $n + 1;
}
////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////
//генерируем содержимое для СТ
for ($i = 0; $i <= (count($tanks_st[1])-1); $i++) {

$position = strpos($tanks_st[1][$i], '">');
$tanks_st[1][$i] = substr($tanks_st[1][$i], $position);
$tanks_st[1][$i] = str_replace( '">', "", $tanks_st[1][$i]);

$hash = spaces(full_trim ($tanks_st[1][$i]));
$hash = str_replace( '-', '_', $hash);
$hash = str_replace( '.', '', $hash);
$hash = str_replace( '(', '', $hash);
$hash = str_replace( ')', '', $hash);
$hash = str_replace( '/', '_', $hash);
$hash = str_replace( ',', '_', $hash);
$hash = str_replace( '*', '', $hash);

$html .= $n.'. '.$tanks_st[1][$i].' | #'.$hash.'<br/>
';
$n = $n + 1;
}
////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////
//генерируем содержимое для ТТ
for ($i = 0; $i <= (count($tanks_tt[1])-1); $i++) {

$position = strpos($tanks_tt[1][$i], '">');
$tanks_tt[1][$i] = substr($tanks_tt[1][$i], $position);
$tanks_tt[1][$i] = str_replace( '">', "", $tanks_tt[1][$i]);

$hash = spaces(full_trim ($tanks_tt[1][$i]));
$hash = str_replace( '-', '_', $hash);
$hash = str_replace( '.', '', $hash);
$hash = str_replace( '(', '', $hash);
$hash = str_replace( ')', '', $hash);
$hash = str_replace( '/', '_', $hash);
$hash = str_replace( ',', '_', $hash);
$hash = str_replace( '*', '', $hash);

$html .= $n.'. '.$tanks_tt[1][$i].' | #'.$hash.'<br/>
';
$n = $n + 1;
}
////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////
//генерируем содержимое для ПТ
for ($i = 0; $i <= (count($tanks_pt[1])-1); $i++) {

$position = strpos($tanks_pt[1][$i], '">');
$tanks_pt[1][$i] = substr($tanks_pt[1][$i], $position);
$tanks_pt[1][$i] = str_replace( '">', "", $tanks_pt[1][$i]);

$hash = spaces(full_trim ($tanks_pt[1][$i]));
$hash = str_replace( '-', '_', $hash);
$hash = str_replace( '.', '', $hash);
$hash = str_replace( '(', '', $hash);
$hash = str_replace( ')', '', $hash);
$hash = str_replace( '/', '_', $hash);
$hash = str_replace( ',', '_', $hash);
$hash = str_replace( '*', '', $hash);

$html .= $n.'. '.$tanks_pt[1][$i].' | #'.$hash.'<br/>
';
$n = $n + 1;
}
////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////
//генерируем содержимое для АРТ
for ($i = 0; $i <= (count($tanks_art[1])-1); $i++) {

$position = strpos($tanks_art[1][$i], '">');
$tanks_art[1][$i] = substr($tanks_art[1][$i], $position);
$tanks_art[1][$i] = str_replace( '">', "", $tanks_art[1][$i]);

$hash = spaces(full_trim ($tanks_art[1][$i]));
$hash = str_replace( '-', '_', $hash);
$hash = str_replace( '.', '', $hash);
$hash = str_replace( '(', '', $hash);
$hash = str_replace( ')', '', $hash);
$hash = str_replace( '/', '_', $hash);
$hash = str_replace( ',', '_', $hash);
$hash = str_replace( '*', '', $hash);

$html .= $n.'. '.$tanks_art[1][$i].' | #'.$hash.'<br/>
';
$n = $n + 1;
}
////////////////////////////////////////////////////////////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////////////
//выводим футер rss
$html .= '</body>
</html>';

print $html;
?>