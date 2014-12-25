<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>MagicRadio</title>
<link rel="stylesheet" href="style.css">
<style type="text/css">
#control-border {
	display:none;
	
}

#settings {
	width:100%;
	text-align:center;
	margin-top:1%;
	
}

#menu img {
	max-height:100%;
	max-width:30%;
}
</style>
</head>

<body>
<?php
include 'functions.php';
?>
<div id="wrapper">
	<div id="ring1">
    	<div id="ring2">
        	<div id="ring3">
            	<div id="settings">
                	<p>Music file path:</p>
                    <form method="get" action="shell.php">
                    <input type="hidden" value="setMp3Path" name="topic">
                    <input type="text" name="com1" value="<?php echo getMp3Path(); ?>">
                    <input type="submit">
                    </form><br>
                    
                    <p>Stream file path:</p>
                    <form method="get" action="shell.php">
                    <input type="hidden" value="setStreamPath" name="topic">
                    <input type="text" name="com1" value="<?php echo getStreamPath(); ?>">
                    <input type="submit">
                    </form><br>
                    
                    <form method="get" action="shell.php">
                    <input type="hidden" value="sudo shutdown -h now" name="com1">
                    <input type="submit" value="Shutdown">
                    </form><br>
                    
                    <form method="get" action="shell.php">
                    <input type="hidden" value="sudo shutdown -r now" name="com1">
                    <input type="submit" value="Restart">
                    </form><br>
                </div>
            	
                <div id="control-border">
                	<div id="control-bg">
                    	<div id="control-container">
                        	<a href="#"><img src="img/home.png"></a>
                            <a href="#"><img src="img/zuruck.png"></a>
                            <a href="#"><img src="img/stop.png"></a>
                            <a href="#"><img src="img/vor.png"></a>
                            <a href="#"><img src="img/leiser.png"></a>
                            <a href="#"><img src="img/lauter.png"></a>
                        </div><!--control-container-end-->
                    </div><!--control-bg-end-->
                </div><!--control-border-end-->
            </div><!--ring3-end-->
        </div><!--ring2-end-->
    </div><!--ring1-end-->
</div><!--wrapper-end-->
</body>
</html>
