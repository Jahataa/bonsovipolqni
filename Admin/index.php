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
	<div class="content">
		<div class="product" style="border-bottom:1px solid black;">
			<img src="http://www.puls.bg/cache/news/10868_big.jpg" style="float:left;">
			<p>This is treva. ok bilka good maybe , yes no wtf endglish.</p>
			<div style="clear:both"></div>
			<a href="#">EDIT</a> | <a href="#">DELETE</a>
		</div>s
		<a href="#">Add new</a>
	</div>
</div>