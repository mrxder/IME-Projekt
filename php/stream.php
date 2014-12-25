<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>MagicRadio</title>
<link rel="stylesheet" href="style.css">
<style type="text/css">
#control-container img {
	max-width: 20%;
}

#list-container ul {
	list-style-image:url(img/www.png);
}

</style>
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
		include 'functions.php';
  		$titel = getIndex(getStreamPath());
		foreach($titel AS $xyz) {
			echo "<li><a href=\"shell.php?topic=mpcstream&com1=".urlencode(getStreamURL((getStreamPath()."/".$xyz)))."\">".getHTMLString($xyz, ".txt")."</a>";
		}
		?>
</ul>


</div>
                <div id="control-border">
                	<div id="control-bg">
                    	<div id="control-container">
                        	<a href="index.php"><img src="img/home.png"></a>
                            <a href="shell.php?com1=mpc&com2=stop"><img src="img/stop.png"></a>
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
