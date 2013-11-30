<?php
	require("api/membership.php");
	include_once "api/config.php";
?>
<div class="mastar">
	<?php
		$headContent = "<link rel='stylesheet' href='../css/style.css' type='text/css' />";
		require ("..\header.php");
		include "loggedInControl.php";
		if($_SERVER['REQUEST_METHOD'] === "POST")
		{
			$account = $_POST["account"];
			$password = $_POST["password"];

			$authenticated = authenticate($account,$password);
			if($authenticated)
			{
				header( 'Location: '.$SITEROOT.'/admin/index.php' ) ;
			}
		}
	?>
	<div>
		<?php
			if(isset($authenticated))
			{
				if(!$authenticated)
				{
					print("Wrong account or password");
				}
			}
		?>
		<form method="post">
			<label for="account">Account</label>
			</br>
			<input type="text" id="account" name="account"/>
			</br>
			<label for="password">Password</label>
			</br>
			<input type="password" id="password" name="password"/>
			</br>
			<input type="submit" value="Login"/>
		</form>
	</div>
</div>
