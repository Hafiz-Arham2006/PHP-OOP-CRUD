<?php


$id=$_GET['id'];
require_once('db.php');
$obj->Delete($id);
header('location:index.php');



?>