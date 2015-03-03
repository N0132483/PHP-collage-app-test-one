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

$statement = $gateway->getCourseById($id);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <script type="text/javascript" src="js/course.js"></script>
        <title></title>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <?php
        if (isset($message)) {
            echo '<p>'.$message.'</p>';
        }
        ?>
        <table>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                    echo '<tr>';
                    echo '<td>Name</td>'
                    . '<td>' . $row['crs_name'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Course Code</td>'
                    . '<td>' . $row['crs_code'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Places</td>'
                    . '<td>' . $row['no. places'] . '</td>';
                    echo '</tr>';
                    echo '<tr>';
                    echo '<td>Contact Person</td>'
                    . '<td>' . $row['contact person name'] . '</td>';
                    echo '</tr>';
                ?>
            </tbody>
        </table>
        <p>
            <a href="editCourseForm.php?id=<?php echo $row['crs_code']; ?>">
                Edit Course</a>
            <a class="deleteCourse" href="deleteCourse.php?id=<?php echo $row['crs_code']; ?>">
                Delete Course</a>
        </p>
    </body>
</html>
