<?php
  include_once 'config.php';
  function getDBConnection()
  {
   global $SQLSERVER,$SQLACC,$SQLPASS,$SQLSCHEMA;
   return mysqli_connect($SQLSERVER,$SQLACC,$SQLPASS,$SQLSCHEMA);
  }
?>