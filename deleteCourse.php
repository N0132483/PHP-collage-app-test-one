<?php
require_once 'Course.php';
require_once 'Connection.php';
require_once 'CourseTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

if (!isset($_GET) || !isset($_GET['id'])) {
    die('Invalid request');
}
$id = $_GET['id'];

$connection = Connection::getInstance();
$gateway = new CourseTableGateway($connection);

$gateway->deleteCourse($id);

header("Location: home.php");
?>
