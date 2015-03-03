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

$crs_name = $_POST['crs_name'];
$crs_code = $_POST['crs_code'];
$places = $_POST['no. places'];
$contactPerson = $_POST['contact person name'];

$gateway->updateCourse($n, $cc, $p, $cp);

header('Location: home.php');






