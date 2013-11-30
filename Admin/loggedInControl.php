<?php
	if(authorize())
	{
		print("You are logged in.");
		print("<a href='logout.php'>Logout?</a>");
	}
?>