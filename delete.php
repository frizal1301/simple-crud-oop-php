<?php
require_once 'App/init.php';
$db = new Database;
$id = $_GET['id'];

$result = $db->hapusData($id);

header("location: index.php");

