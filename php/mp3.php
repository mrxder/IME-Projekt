<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>MagicRadio</title>
<link rel="stylesheet" href="style.css">
<!--Für smartphones-->
<meta name="viewport" content="width=device-width, 
   initial-scale=1.0, 
   maximum-scale=1.0, 
   user-scalable=no">
</head>

<body>
<div id="wrapper">
	<div id="ring1">
    	<div id="ring2">
        	<div id="ring3">
            	<div id="list-container">
            			<ul>
<?php
//Funkzionen laden :
include 'functions.php';
$titel = getIndex(getMp3Path());
$count = 0;
foreach($titel AS $xyz) {
	echo "<li><a href=\"shell.php?topic=mpcmp3switch&com1=".($count+1)."\">".getHTMLString($xyz, ".mp3")."</a>";
	$count++;
}
?>
</ul>
                  </div>
                <div id="control-border">
                	<div id="control-bg">
                    	<div id="control-container">
                        	<a href="index.php"><img src="img/home.png"></a>
                            <a href="shell.php?com1=mpc&com2=prev"><img src="img/zuruck.png"></a>
                            <a href="shell.php?com1=mpc&com2=pause"><img src="img/pause.png"></a>
                            <a href="shell.php?com1=mpc&com2=play"><img src="img/play.png"></a>
                            <a href="shell.php?com1=mpc&com2=next"><img src="img/vor.png"></a>
                            <a href="shell.php?com1=mpc&com2=volume&com3=-8"><img src="img/leiser.png"></a>
                            <a href="shell.php?com1=mpc&com2=volume&com3=%2B8"><img src="img/lauter.png"></a>
                        </div><!--control-container-end-->
                    </div><!--control-bg-end-->
                </div><!--control-border-end-->
            </div><!--ring3-end-->
        </div><!--ring2-end-->
    </div><!--ring1-end-->
</div><!--wrapper-end-->
</body>
</html>
