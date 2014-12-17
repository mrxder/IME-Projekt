<?php
// Mit den folgenden Zeilen lassen sich
// alle Dateien in einem Verzeichnis auslesen

$titel = array();
$arraycount = 0;

$handle=opendir ("/home/pi/mp3");
while ($datei = readdir ($handle)) {
	$output = $datei;
	if($output != ".." && $output != ".") {
 		$titel[$arraycount] = $output;
		$arraycount++;
	}
}
closedir($handle);

$count = 0;

echo "<ul>";
foreach($titel AS $xyz) {
	echo "<li><a href=\"shell.php?topic=mpcmp3switch&com1="."\">".$xyz."</a>";
	$count++;
}
echo "</ul>";
?>
<a href="shell.php?com1=mpc&com2=stop">Stop</a><br>
<a href="shell.php?com1=mpc&com2=next">Weiter</a><br>
<a href="shell.php?com1=mpc&com2=prev">Zurück</a>
