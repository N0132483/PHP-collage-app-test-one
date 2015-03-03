<?php
require_once 'Course.php';
require_once 'Connection.php';
require_once 'CourseTableGateway.php';

require 'ensureUserLoggedIn.php';

$connection = Connection::getInstance();
$gateway = new CourseTableGateway($connection);

$statement = $gateway->getCourses();
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
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Course Code</th>
                    <th>Places</th>
                    <th>Contact Person</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $row = $statement->fetch(PDO::FETCH_ASSOC);
                while ($row) {


                    echo '<td>' . $row['crs_name'] . '</td>';
                    echo '<td>' . $row['crs_code'] . '</td>';
                    echo '<td>' . $row['no. places'] . '</td>';
                    echo '<td>' . $row['contact person name'] . '</td>';
                    echo '<td>'
                    . '<a href="viewCourse.php?id='.$row['crs_code'].'">View</a> '
                    . '<a href="editCourseForm.php?id='.$row['crs_code'].'">Edit</a> '
                    . '<a class="deleteCourse" href="deleteCourse.php?id='.$row['crs_code'].'">Delete</a> '
                    . '</td>';
                    echo '</tr>';

                    $row = $statement->fetch(PDO::FETCH_ASSOC);
                }
                ?>
            </tbody>
        </table>
        <p><a href="createCourseForm.php">Create Course</a></p>
    </body>
</html>
