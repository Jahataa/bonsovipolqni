<?php
	interface IDataSource
	{
		public function Add(iTrackedObject)
		public function Remove(iTrackedObject $object);
		public function Get($id);
	}
	abstract class DataSource implements IDataSource
	{
		private $trackedObjects;

		public __construct()
		{
			$trackedObjects = [];
		}

		public function Add(iTrackedObject $object)
		{

		}
		public function Remove(iTrackedObject &$object)
		{
			
		}
		public function Get($id)
		{
			if(array_key_exists($id))
			{

			}
		}
	}

	class TrackedObject 
	{
		private $_isModified;
		private $_dataSource;

		public $id;

		public __construct(iDataSource $dataSource)
		{
			$id = -1;
		}

		public __construct
		

		public function IsModified()
		{
			return $isModified;
		}

		public function Save()
		{
			if(!$dataSource)
			{
				throw new Exception("Object no longer tracked by datasource", 1);
			}
			$_dataSource.Add($this);
		}

		public function Delete()
		{
			$_dataSource.Remove($this)
			$_dataSource = NULL;
		}

		public function __get($property) 
		{
			if (property_exists($this, $property)) 
			{
				return $this->$property;
			}
		}

		public function __set($property, $value) 
		{
			if($property == "$_isModified" || $property == "$_dataSource")
			{
				throw new Exception("Property isModified cannot be directly set", 1);
			}

			if (property_exists($this, $property)) 
			{
				$this->$property = $value;
				$_isModified = true;
			}
			return $this;
		}
	}


?>