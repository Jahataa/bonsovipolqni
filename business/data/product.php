<?php
	include_once "domain.php";
	include_once "..\config.php"

	/*
			Manages Creation,Retrieval,Update and Deletion of Products ,
			Categories and websites.
	*/

	class ProductRepository
	{
		private $_category;

		public __construct(Category $category)
		{
			$_category = $category;
		}

		public function GetProducts()
		{
			$_category->$id
		}

		public function GetProduct(Product $productId)
		{

		}

		public function CreateProduct(Product $product)
		{

		}

		public function UpdateProduct(Product $product)
		{

		}

		public function DeleteProduct(Product $product)
		{

		}
	}

	class CategoryRepository
	{
		private $_category;

		public __construct(Category $category)
		{
			$_category = $category;
		}
		function GetCategories()
		{

		}

		function GetCategory(Category $categoryId)
		{

		}

		function CreateCategory(Category $category)
		{

		}

		function UpdateCategory(Category $category)
		{

		}

		function DeleteCategory(Category $category)
		{

		}
	}

	class WebsiteRepository
	{
		function GetWebsites()
		{
			$websites = [];
			$mysqli = new mysqli($SQLSERVER, $SQLACC, $SQLPASS, $SQLSCHEMA);
			if ($mysqli->connect_error) 
			{
				die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
			}

			if($result = $mysqli->query("SELECT * FROM `website`"))
			{
				if($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc()) 
					{
						$website = new Website();

						$website->$id = $row['id'];
						$website->$id = $row['websiteName'];
						$website->$id = $row['websiteUrl'];
						$website->$id = $row['imageUrl'];

						$websites[] = $website;
					}
				}

				$result -> close();
			}

			$mysqli->close();
			return $websites;
		}

		function GetWebsite($websiteId)
		{
			$website = NULL;
			$mysqli = new mysqli($SQLSERVER, $SQLACC, $SQLPASS, $SQLSCHEMA);
			if ($mysqli->connect_error) 
			{
				die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
			}

			if($result = $mysqli->query("SELECT * FROM `website` WHERE id='".$websiteId."'"))
			{
				if($result->num_rows > 0) 
				{
					while($row = $result->fetch_assoc()) 
					{
						$website = new Website();
						
						$website->$id = $row['id'];
						$website->$name = $row['websiteName'];
						$website->$url = $row['websiteUrl'];
						$website->$imageUrl = $row['imageUrl'];
					}
				}

				$result -> close();
			}

			$mysqli->close();
			return $website;
		}

		function CreateWebsite(Website $website)
		{
			$website = NULL;
			$mysqli = new mysqli($SQLSERVER, $SQLACC, $SQLPASS, $SQLSCHEMA);
			if ($mysqli->connect_error) 
			{
				die('Connect Error (' . $mysqli->connect_errno . ') '. $mysqli->connect_error);
			}

			if($result = $mysqli->query('INSERT INTO `website`(`websiteName`, `websiteUrl`, `imageUrl`, `dateCreated`, `dateUpdated`) '.
				'VALUES '.
				'('.$website->$name.','.$website->$url.','.$website->$imageUrl.',NOW(),NOW())'))
			{
				$result -> close();
			}

			$mysqli->close();
			return $website;
		}

		function UpdateWebsite(Website $website)
		{

		}

		function DeleteWebsite(Website $website)
		{

		}
	}
?>