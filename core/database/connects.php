<?php
$connect_error = "sorry, but we are experiencing connection issues -- try again later";
mysql_connect('localhost', 'root', '') or die($connect_error);
mysql_select_db('membership') or die($connect_error);
?>