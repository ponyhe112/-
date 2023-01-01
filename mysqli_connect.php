<?php
const DB_USER = 'root';
const DB_PASSWORD = '';
const DB_HOST = 'localhost';
const DB_NAME = 'library1';

$dbc = @mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) or die('Could not to connect to Mysql:' . mysqli_connect_error());

mysqli_set_charset($dbc, 'utf8');
?>