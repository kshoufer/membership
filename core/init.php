<?php
session_start();
error_reporting(0); //for production run

require 'database/connects.php';
require 'functions/general.php';
require 'functions/users.php';

$errors = array();
?>