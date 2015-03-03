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
if ($statement->rowCount() !== 1) {
    die("Illegal request");
}
$row = $statement->fetch(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/course.js"></script>
    </head>
    <body>
        <?php require 'toolbar.php' ?>
        <h1>Edit Course Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="editCourseForm" name="editCourseForm" action="editCourse.php" method="POST">
            <input type="hidden" name="crs_code" value="<?php echo $crs_name; ?>" />
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="crs_name" value="<?php
                        if (isset($_POST) && isset($_POST['crs_name'])) {
                                echo $_POST['crs_name'];
                                } else {
                                    echo $row['crs_name'];
                                }
                            ?>" />
                            <span id="emailError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['crs_name'])) {
                                    echo $errorMessage['crs_name'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Course Code</td>
                        <td>
                            <input type="text" name="crs_code" value="<?php
                                if (isset($_POST) && isset($_POST['crs_code'])) {
                                echo $_POST['crs_code'];
                                    } else {
                                        echo $row['crs_code'];
                                    }
                        ?>" />
                            <span id="crs_codeError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['crs_code'])) {
                                    echo $errorMessage['crs_code'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Places</td>
                        <td>
                            <input type="text" name="no. places" value="<?php
                                if (isset($_POST) && isset($_POST['no. places'])) {
                                echo $_POST['no. places'];
                                    } else {
                                        echo $row['no. places'];
                                    }
                            ?>" />
                            <span id="no. placesError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['no. places'])) {
                                    echo $errorMessage['no. places'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Person</td>
                        <td>
                            <input type="text" name="contact person name" value="<?php
                                if (isset($_POST) && isset($_POST['contact person name'])) {
                                echo $_POST['contact person name'];
                                    } else {
                                        echo $row['contact person name'];
                                    }
                            ?>" />
                            <span id="contact person nameError" class="error">
                                <?php
                                if (isset($errorMessage) && isset($errorMessage['contact person name'])) {
                                    echo $errorMessage['contact person name'];
                                }
                                ?>
                            </span>
                        </td>
                    </tr>                    
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="UpdateCourse" name="updateCourse" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
