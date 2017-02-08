<?php
$source_url =[
'http://wiki.wargaming.net/ru/Tank_types_lighttank',
'http://wiki.wargaming.net/ru/Tank_types_mediumtank',
'http://wiki.wargaming.net/ru/Tank_types_heavytank',
'http://wiki.wargaming.net/ru/Tank_types_at-spg',
'http://wiki.wargaming.net/ru/Tank_types_spg'];

function parser($url,$start,$finish) {
$content = file_get_contents($url);
$position = strpos($content, $start);

$content = substr($content, $position);
$position = strpos($content, $finish);

$content = substr($content, 0, $position);
return $content;
}

echo '<html><header><meta charset="UTF-8" /></header><body>';

for ($i=0; $i < count($source_url); $i++) {
	preg_match_all('~&#160;<a href="/ru/Tank:(.*?)</a>~is', parser($source_url[$i], '<div class="wot-frame-1">', 'NewPP limit report'), $tanks);
	$tanks = $tanks[1];
	foreach ($tanks as $tank) {
		$hash_tag[]='#' . preg_replace(array('/-/', '/ /', '/\./', '/__/'),'_',substr($tank,(strrpos($tank,'>')+1)));
	}
}

echo "<pre>". print_r($hash_tag, true)."</pre>";
echo '</body></html>';
?>