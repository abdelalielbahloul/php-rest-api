<?php
require_once '../../config/Database.php';
// connect to Db
$database = new Database();
$db = $database->connect();