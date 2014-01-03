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
		function GetWebsite()
		{

		}

		function GetWebsite(Website $websiteId)
		{

		}

		function CreateWebsite(Website $website)
		{

		}

		function UpdateWebsite(Website $website)
		{

		}

		function DeleteWebsite(Website $website)
		{

		}
	}
?>