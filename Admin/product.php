<?php
	include "api/membership.php";
	tryAuthenticate();
?>
<div class="mastar">
	<?php
		$headContent = "<link rel='stylesheet' href='../css/style.css' type='text/css' />";
		include "loggedInControl.php";
		require ("..\header.php");
	?>
	<div>
		<div class="product">
			<img>
			<p></p>
			<a href="#">EDIT</a> | <a href="#">DELETE</a>
		</div>


		<a href="#">Add new</a>
	</div>
</div>