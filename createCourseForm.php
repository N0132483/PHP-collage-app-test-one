<?php
$id = session_id();
if ($id == "") {
    session_start();
}

require 'ensureUserLoggedIn.php';
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
        <h1>Create Course Form</h1>
        <?php
        if (isset($errorMessage)) {
            echo '<p>Error: ' . $errorMessage . '</p>';
        }
        ?>
        <form id="createCourseForm" name="createCourseForm" action="createCourse.php" method="POST">
            <table border="0">
                <tbody>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name="name" value="" />
                            <span id="emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Course code</td>
                        <td>
                            <input type="text" name="courseCode" value="" />
                            <span id="emailError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Places</td>
                        <td>
                            <input type="text" name="places" value="" />
                            <span id="placesError" class="error"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>Contact Person</td>
                        <td>
                            <input type="text" name="contactPerson" value="" />
                            <span id="contactPersonError" class="error"></span>
                        </td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" value="Create Course" name="createCourse" />
                        </td>
                    </tr>
                </tbody>
            </table>

        </form>
    </body>
</html>
