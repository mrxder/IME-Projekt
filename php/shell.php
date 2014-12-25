<?php
//Funkzionen laden :
include 'functions.php';


//Abrufen von Get Methoden
$topic = $_GET["topic"];
$com1 = $_GET["com1"];
$com2 = $_GET["com2"];
$com3 = $_GET["com3"];
$com4 = $_GET["com4"];

//Abrufen von welcher Seite der Benutzer kommt.
$origin = $_SERVER["HTTP_REFERER"];

if($topic == "mpcmp3switch") {
	mpcmp3switch($com1, $com2, $com3, $com4);
}

elseif($topic == "mpcstream"){
	mpcstream($com1);
}
elseif($topic == "pifmmp3"){
	pifmmp3();
}

elseif($topic == "setMp3Path") {
	setMp3Path($com1);
}
elseif($topic == "setStreamPath") {
	setStreamPath($com1);
}
	
else {
	echo shell_exec($com1." ".$com2." ".$com3." ".$com4);
}

//Weiterleiten auf die Seite von der der Benutzer kommt.
header("Location: $origin");








?>
