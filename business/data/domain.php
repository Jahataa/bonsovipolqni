<?php
	/*
		The domain model of the website
	*/

	/* Model of a product */
	class Product
	{
		public $id;
		public $name;
		public $description;
		public $websiteId
		public $imageUrl
		public $categoryId
	}

	/* Product of a category containing products */
	class Category
	{
		public $id;
		public $name;
		public $description;
		public $websiteId
	}

	/* A website */
	class Website
	{
		public $id;
		public $name;
		public $url;
		public $imageUrl;
	}
?>