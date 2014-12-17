<?php

//Abrufen von Get Methoden
$topic = $_GET["topic"];
$com1 = $_GET["com1"];
$com2 = $_GET["com2"];
$com3 = $_GET["com3"];
$com4 = $_GET["com4"];

//Abrufen von welcher Seite der Benutzer kommt.
$origin = $_SERVER["HTTP_REFERER"];

//Fixe Variablen
$pfadZuMp3Files = "/home/pi/mp3";


if($topic == "mpcmp3switch") {
	mpcmp3switch();
}

elseif($topic == "mpcstream"){
	mpcstream();
}
elseif($topic == "pifmmp3"){
	pifmmp3();
}
	
else {
	$output = shell_exec($com1." ".$com2." ".$com3." ".$com4);
}

//Weiterleiten auf die Seite von der der Benutzer kommt.
header("Location: $origin");

//Funkzionen :
function mpcmp3switch() {
	
	shell_exec('mpc clear');
	shell_exec('mpc update');
	
	$handle=opendir ($pfadZuMp3Files);
	while ($datei = readdir ($handle)) {
		$file = $datei;
		if($file != ".." && $file != ".") {
 			$output = shell_exec('mpc add '.maskiere($file));
		}
	}
	closedir($handle);
	
	$output = shell_exec($com1." ".$com2." ".$com3." ".$com4);
	
}

function mpcstream() {
	shell_exec('mpc clear');
	shell_exec('mpc add '.$com1);
	shell_exec('mpc play 1');
}

function pifmmp3() {
	$arraycoun = 0;
	$handle=opendir ($pfadZuMp3Files);
	while ($datei = readdir ($handle)) {
	$output = $datei;
	if($output != ".." && $output != ".") {
 		$titel[$arraycount] = $output;
		$arraycount++;
	}
	shell_exec('avconv -i /home/pi/mp3/ -f wav -ac 1 -ar 22050 - | sudo ./pifm - 87.5');
	}
	closedir($handle);
}

function maskiere($zumMaskieren) {
	return str_replace(")", "\)", str_replace("(", "\(", str_replace(" ", "\ ", $zumMaskieren)));
}






?>
