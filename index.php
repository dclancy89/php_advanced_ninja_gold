<?php session_start(); 

if(!isset($_SESSION["gold"])) {
    $_SESSION["gold"] = 0;
    $_SESSION["activities"] = array();
}
?>


<!DOCTYPE html>
<html>
<head>
	<title>Ninja Gold</title>
	<link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>

	<div class="container">
		
		<div class="gold">
			<p>Your Gold: <span id="gold-amount"><?= $_SESSION["gold"] ?></span></p>
		</div>
		<div class="building-container">
			<div class="building">
				<h3>Farm</h3>
				<p>(earns 10-20 golds)</p>
				<form action="process_money.php" method="post">
				 	<input type="hidden" name="building" value="farm" />
				 	<input type="submit" value="Find Gold!" class="button" />
				</form>
			</div>
			<div class="building">
				<h3>Cave</h3>
				<p>(earns 5-10 golds)</p>
				<form action="process_money.php" method="post">
				 	<input type="hidden" name="building" value="cave" />
				 	<input type="submit" value="Find Gold!" class="button" />
				</form>
			</div>
			<div class="building">
				<h3>House</h3>
				<p>(earns 2-5 golds)</p>
				<form action="process_money.php" method="post">
				 	<input type="hidden" name="building" value="house" />
				 	<input type="submit" value="Find Gold!" class="button" />
				</form>
			</div>
			<div class="building">
				<h3>Casino</h3>
				<p>(earns/takes 0-50 golds)</p>
				<form action="process_money.php" method="post">
				 	<input type="hidden" name="building" value="casino" />
				 	<input type="submit" value="Find Gold!" class="button" />
				</form>
			</div>
		</div>

		<div class="activities">
			<p>Activities:</p>
			<div id="activities-box">
                <?php if(!empty($_SESSION["activities"])){foreach($_SESSION["activities"] as $activity) { ?>

                    <span class="<?= $activity['class'] ?>"><?= $activity['message'] ?></span>

                <?php }} ?>
                
			</div>
		</div>
		<br />
		<br />
		<br />
		<br />
		<a href="process_money.php?reset=true" class="button">Reset</a>

	</div>

	<script>
		
		var element = document.getElementById("activities-box");
		element.scrollTop = element.scrollHeight;
	</script>

</body>
</html>