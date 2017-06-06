<?php

$f2[health] = 35;
$f1[health]  = 100;
$f1[actionpoints] = 65;
$f2[actionpoints] = 70;

//var_dump($f2[health] , $f1[health] , $f2[actionpoints] , $f1[actionpoints]);

function hit (&$f1, &$f2, $kf1, $kf2){
	if ($kf1 == 1){//1-й наносит удар
	$f2[health] = $f2[health] - $f1[actionpoints];
}

if ($kf2 == 1){//1-й наносит удар
	$f1[health] = $f1[health] - $f2[actionpoints];
}
 	var_dump($f1[health], $f2[health]);
 	return $f1;
 	return $f2;


 }
echo hit($f1 , $f2 , 1 , 0);

echo hit($f1 , $f2 , 1 , 0);
var_dump($f1, $f2);
?>