<?php

$source_url = array(
'http://wiki.wargaming.net/ru/Tank_types_lighttank',
'http://wiki.wargaming.net/ru/Tank_types_mediumtank',
'http://wiki.wargaming.net/ru/Tank_types_heavytank',
'http://wiki.wargaming.net/ru/Tank_types_at-spg',
'http://wiki.wargaming.net/ru/Tank_types_spg');

function parser($url,$start='<div class="wot-frame-1">',$finish='NewPP limit report') {
	$content = file_get_contents($url);
	$position = strpos($content, $start);

	$content = substr($content, $position);
	$position = strpos($content, $finish);

	$content = substr($content, 0, $position);
	return $content;
}

function modelList($source_url) {
	$cleared_tanks=array();
	for ($i=0; $i < count($source_url); $i++) {
		preg_match_all('~&#160;<a href="/ru/Tank:(.*?)</a>~is', parser($source_url[$i]), $tanks);
		$tanks = $tanks[1];
		foreach ($tanks as $tank) $cleared_tanks[]=substr($tank,(strrpos($tank,'>')+1));
	}
	return $cleared_tanks;
}

function hashTag($tank){
	return '#' . preg_replace('/_{2,}/','_',preg_replace('/[- \,\.\/\`\'*)("«]|_{2,}/','_',$tank));
}

function replaysHash(array $source_tanks_model, $source_url='https://novapress.com/Project/RSS/4dcfab8e-eb9f-4c1c-9bd4-5c965db7bec4?v=2'){
	$str = file_get_contents($source_url);
	foreach ($source_tanks_model as $key => $tank) {
		str_replace($tank,hashTag($tank),$str);
	}
	return str_replace('##','#',$str);
}

?>

<html>
	<header>
		<meta charset="UTF-8" />
	</header>
	<body>
		<?php
		$tanks = modelList($source_url);
		$totalNumbers = strlen(count($tanks)+1);
		foreach ($tanks as $key => $tank) {
			echo '' . str_pad($key+1,$totalNumbers,'0',STR_PAD_LEFT) . '. ' . $tank . ' = ' . hashTag($tank) . '<br>';
//			echo '' . str_pad($key+1,$totalNumbers,'0',STR_PAD_LEFT) . '. ' . $tank . '<br>';
		}
		?>
		<H1>Замена тегов в RSS</H1>
		<?= replaysHash($tanks); ?>
	</body>
</html>