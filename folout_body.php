<?php
//yryryryryryryryryryryryyryryryryr
// trtrtrtrtrtrtrttrtrtrtrtrrtrt

// BODY PROGRAM BATTL
//require_once('foloutfuncs.php');

$hero1 = baseSkills(fallOutSpecial(35, 10));
$hero2 = baseSkills(fallOutSpecial(35, 10));


print_r($hero1);
print_r($hero2);

Battle ($hero1, $hero2, $death1, $death2);

print_r($hero1);
print_r($hero2);





// -----BLOCK OF FUNCTIONS------

//assigning special atributs . Присвоение специальных атрибутов герою
function fallOutSpecial($max, $limPoints) {
    
$max--;
$specials = [
    "Strength",
    "Perception",
    "Endurance",
    "Charisma",
    "Intelligence",
    "Agility",
    "Luck",
];
$valuesSpecial = [0, 0, 0, 0, 0, 0, 0];
foreach ($valuesSpecial as &$value) {
    $value += rand(1, $max / count($valuesSpecial));
}
while ($max >= array_sum($valuesSpecial)) {
    $i = rand(0, count($valuesSpecial) - 1);
    if ($valuesSpecial[$i] >= $limPoints) {
        continue;
    } else {
        $valuesSpecial[$i] += 1;
    }
}
$result = array_combine($specials, $valuesSpecial);
//print_r($result);
//print_r(array_sum($result));
return $result;
}

//
function baseSkills($spec_array){
    
    $spec_array['Barter'] = (($spec_array['Charisma'] * 2) + 2 + ($spec_array['Luck'] / 2));
    $spec_array['BigGuns'] = ($spec_array['Endurance'] * 2) + 2 + ($spec_array['Luck'] / 2);
    $spec_array['Energy Weapons'] = ($spec_array['Perception'] * 2) + 2 + ($spec_array['Luck'] / 2);
    $spec_array['Explosives'] = ($spec_array['Perception'] * 2) + 2 + ($spec_array['Luck'] / 2);
    $spec_array['Lockpick'] = ($spec_array['Perception'] * 2) + 2 + ($spec_array['Luck'] / 2);
    $spec_array['Medicine'] = ($spec_array['Intelligence'] * 2) + 2 + ($spec_array['Luck'] / 2);
    $spec_array['MeleeWeapons'] = ($spec_array['Strength'] * 2) + 2 + ($spec_array['Luck'] / 2);
    $spec_array['Repair'] = ($spec_array['Intelligence'] * 2) + 2 + ($spec_array['Luck'] / 2);
    $spec_array['Science'] = ($spec_array['Intelligence'] * 2) + 2 + ($spec_array['Luck'] / 2);
    $spec_array['SmallGuns'] = ($spec_array['Agility'] * 2) + 2 + ($spec_array['Luck'] / 2);
    $spec_array['Sneak'] = ($spec_array['Agility'] * 2) + 2 + ($spec_array['Luck'] / 2);
    $spec_array['Speech'] = ($spec_array['Charisma'] * 2) + 2 + ($spec_array['Luck'] / 2);
    $spec_array['Unarmed'] = ($spec_array['Endurance'] * 2) + 2 + ($spec_array['Luck'] / 2);

    
 	$spec_array['Health'] = (90+ ($spec_array['Endurance']*20) + ($lewel1*10));//здоровье
 	$spec_array['Actionpoints'] = (65 + ($spec_array['Agility']*2));//очки действия
 	$spec_array['MeleeWeaponsUron'] = ($spec_array['Strength'])/2;//Прибавка к урону от холодного оружия = сила удара без оружия

    foreach($spec_array as $key => $val){
        $spec_array[$key] = ceil($val);
    }

    return $spec_array;
}

function hit (&$f1, &$f2, $kf1, $kf2){//функция удара
	if ($kf1 == 1){//1-й наносит удар
	$f2['Health'] -= $f1['MeleeWeaponsUron'];
}

	if ($kf2 == 1){//2-й наносит удар
	$f1['Health'] -= $f2['MeleeWeaponsUron'];
}

 }

 // Battle
function Battle (&$fighter1, &$fighter2){//Battle
	$handle = fopen ("php://stdin","r");

	while ( $fighter1[Health] > 0  && $fighter2[Health] > 0) {
		$number1=0;
		$number2=0;
					echo "Hit 1th number??? 1/0. If you are tired - press '22'. \n";
					$number1 = trim (fgets($handle));
						if ($number1 == 22) { 
							echo "That's enough!\n"; 
							break;
						}

	hit ($fighter1, $fighter2, $number1, $number2);//запуск функции 'удар'

	$number1=0;
	$number2=0;
	echo "health1 = " . $fighter1[Health] . "\n";
	echo "health2 = " . $fighter2[Health]. "\n";
	
		if ($fighter2[Health] <= 0) {
			echo "2th has died! \n";
			break;
		}
	
				echo "Hit 2th number??? 1/0. If you are tired - press '22'.  \n";
				$number2 = trim (fgets($handle));
					if ($number2 == 22) { 
						echo "That's enough!\n"; 
						break;
					}

	hit ($fighter1, $fighter2, $number1, $number2);//запуск функции 'удар'
	
	echo "health1 = " . $fighter1[Health] . "\n";
	echo "health2 = " . $fighter2[Health]. "\n";
	
		if ($fighter1[Health] <= 0) {
			echo "1th has died! \n";
			break;
		}
	 }
	 //return $fighter1;
	 //return $fighter2;
}
