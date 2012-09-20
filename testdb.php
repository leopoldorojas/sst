<?php
$con = mysql_connect("localhost","leopoldo.rojas","facil1234");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  } else {echo "hola entre"; }

// some code
?>