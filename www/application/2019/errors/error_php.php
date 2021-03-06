<!DOCTYPE html>
<html lang="en">
<head>
<title>Error</title>
<style type="text/css">

body {
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #000;
}

h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
}


div {
	margin: 40px;
	border: 1px solid #D0D0D0;
}

p { font-family: monospace; margin: 5px 0 5px 15px; }

</style>
</head>
<body>
	<div>
		<h1>A PHP Error was encountered</h1>
		<p>&nbsp;</p>
		<p>Severity: <?php echo $severity; ?></p>
		<p>Message:  <?php echo $message; ?></p>
		<p>Filename: <?php echo $filepath; ?></p>
		<p>Line Number: <?php echo $line; ?></p>
		<p>&nbsp;</p>
	</div>
</body>
</html>
