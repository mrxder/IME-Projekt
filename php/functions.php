<?php

/*wird benutzt um eine musikdatei abszuspelen, dabei wird die playlist von mpc jedes mal komplett
gelöscht und anschliesen neu eingeladen und dann wird jedes lied einzeln neu hinzugefügt und anschließend
das gewählte abgespielt*/
function mpcmp3switch($com1, $com2, $com3, $com4) {
	echo "mp3switch start <br>";
	echo shell_exec('mpc clear')."<br>";
	echo shell_exec('mpc update')."<br>";
	echo $directoriy."<br>";
	
	
	$handle=opendir (getMp3Path());
	while ($datei = readdir ($handle)) {
		$file = $datei;
		if($file != ".." && $file != ".") {
 			$output = shell_exec('mpc add '.maskiere($file));
		}
	}
	closedir($handle);
	
	echo shell_exec('mpc play '.$com1);
	
}

/*wird benutzt um streams abzuspielen, dabei wird die playlist jedes mal gelöscht und einfach der ausgewählte stream hinzugefügt und abgespielt*/
function mpcstream($com1) {
	echo "mpcstream start";
	echo shell_exec('mpc clear');
	echo shell_exec('mpc add '.$com1);
	echo shell_exec('mpc play 1');
}

/*funktion um mit PiFm ein UKW signal zu erzeugen >> noch nicht fertig wege wlan problemen*/
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

/*maskirt einen mitgegebene string so dass er in der shell als einheitlicher befehl erkennt wird und nicht als eine samlung von vielne (zB lehrzeichen werden maskiert)*/
function maskiere($zumMaskieren) {
	return str_replace(")", "\)", str_replace("(", "\(", str_replace(" ", "\ ", $zumMaskieren)));
}

/*schaut im conf ordner in die datei mp3Path.txt und gibt von dort aus den eingetragen vollständigen Pfad zum Verzeichnis mp3 zurück wo die musk gespeichert wird,
entfern auch noch häufig auftretende lehrzeichen vor und nach dem string um probleme mit php zu vermeiden und gieb den pfad anlschießend zurück*/
function getMp3Path() {
	$datei = fopen("conf/mp3Path.txt","r");
	$return = fgets($datei, 100);
	fclose($datei);
	$return = str_replace(" ", "", $return);
	return trim($return);	
}

/*schaut im conf ordner in die datei streamPath.txt und gibt von dort aus den eingetragen vollständigen Pfad zum Verzeichnis streams zurück wo die Stream URLs gespeichert sind,
entfern auch noch häufig auftretende lehrzeichen vor und nach dem string um probleme mit php zu vermeiden und gieb den pfad anlschießend zurück*/
function getStreamPath() {
	$datei = fopen("conf/streamPath.txt","r");
	$return = fgets($datei, 100);
	fclose($datei);
	return trim($return);	
}

/*lest aus der mitgegeben datei den hinhalt (URL) und giebt sie nach dem trim zurück*/
function getStreamURL($file) {
	$datei = fopen($file,"r");
	$return = fgets($datei, 500);
	fclose($datei);
	return trim($return);	
}

/*speichert den mitgegeben pfad in die mp3Path.txt*/
function setMp3Path($path) {
	$datei = fopen("conf/mp3Path.txt","w");
	fwrite($datei, $path);
	fclose($datei);
}

/*speichert den mitgegeben pfad in die streamPath.txt*/
function setStreamPath($path) {	
	$datei = fopen("conf/streamPath.txt","w");
	fwrite($datei, $path);
	fclose($datei);
}

/*speichert alle dateien die im mitgegeben Pfad sind in eine array und giebt diese zurück*/
function getIndex($pfad) {
	$titel = array();
	$arraycount = 0;

	$handle=opendir ($pfad);
	while ($datei = readdir ($handle)) {
		$output = $datei;
		if($output != ".." && $output != ".") {
 			$titel[$arraycount] = $output;
			$arraycount++;
		}
	}
	closedir($handle);
	return $titel;
}

/*entfern von einem mitgegenen String einen anderen mitgegenen String, wird haubtsächlich benutzt um dateiendungen zu enfernen*/
function fileTypeRemover($hierSuchen, $zuEntfernen) {
	return str_replace($zuEntfernen, "", $hierSuchen);
}

/*nimt einen string an der als ausgangsstring dient und wo eventuel sonderzeichen enthalten sind die HTML so nicht kenne und nimmt einen weiterenSting an der von dem ersten entfernt werden soll (meistens Daeiendeung), sobald vom ersten string diese entfern worden sind werden die sonderzeichen wie zB ü in &uuml; umgewandelt und der HTML kompatieble string zurückgegebn*/
function getHTMLString($raw, $filetypeToremove) {
	$raw = fileTypeRemover($raw, $filetypeToremove);
	return htmlentities($raw, ENT_QUOTES);
}

?>
