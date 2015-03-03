<?php
require_once 'Course.php';
require_once 'Connection.php';
require_once 'CourseTableGateway.php';

$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new CourseTableGateway($connection);

$name = $_POST['crs_name'];
$crs_code = $_POST['crs_Code'];
$places = $_POST['no. places'];
$contactPersonName = $_POST['contact person name'];

$id = $gateway->insertCourse($n, $cc, $p, $cp);

header('Location: home.php');
