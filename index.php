<?php 
session_start();
require_once("functions.php");
?>
<!DOCTYPE HTML>
<html>
<head>
	<title><?php if(isset($_GET["q"])) echo "Search - {$_GET["q"]}"; else echo"Search Amalgam"; ?></title>
	<link rel="stylesheet" type="text/css" href="style.css" />
	<script type="text/javascript" src="script.js"></script>
</head>

<body

<div id="searchbox">
	<form method="GET" action="index.php">
		<a href="index.php">Home</a><br />
		Search: &nbsp;
		<?php if(isset($_GET['q']))
		echo "<input type='text' placeholder='Search' id='q' name='q' size='128' value='{$_GET['q']}' />";
		else
		echo "<input type='text' placeholder='Search' id='q' name='q' size='128' value='happy' />";
		
		echo"<input type='hidden' name='client' value='twit' /><input type='submit' value='Search' />" ?>
	</form>
</div>

<?php 
if(isset($_GET['q'])){
	echo"
	<div id='content'>
		<div id='menu'>
			<ul>
				<li><a href='index.php?q={$_GET['q']}&client=twit' >Twitter</a></li>
				<li><a href='index.php?q={$_GET['q']}&client=wiki' >Wiki</a></li>
				<li><a href='index.php?q={$_GET['q']}&client=media' >Media</a></li>
				<li><a href='index.php?q={$_GET['q']}&client=goog' >Google</a></li>
			</ul>
		</div><br />";
		search($_GET['client'],$_GET['q']);
		echo"<div id='search_feed'></div>
	</div>";
	
}
//<script type='text/javascript'>search({$_GET['client']},{$_GET['q'])})</script>

?>
</body>
</html>