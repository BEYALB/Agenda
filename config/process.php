<?php

session_start();

include_once 'config/url.php';
include_once 'config/connection.php';
$contacts = [];

$query = "SELECT * FROM contacts";

$stmt= $conn->prepare($query);
$stmt->execute();

$contacts = $stmt->fetchAll();

?>