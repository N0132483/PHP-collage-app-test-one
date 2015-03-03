<?php

class CourseTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getCourses() {
        // execute a query to get all courses
        $sqlQuery = "SELECT * FROM course";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();
        
        if (!$status) {
            die("Could not retrieve courses");
        }

        return $statement;
    }

    public function getCourseById($id) {
        // execute a query to get the course with the specified id
        $sqlQuery = "SELECT * FROM course WHERE crs_code = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve courses");
        }

        return $statement;
    }

    public function insertCourse($n, $cc, $p, $cp) {
        $sqlQuery = "INSERT INTO course " .
                "(crs_name, crs_code, no. places, contact person name) " .
                "VALUES (:crs_name, :crs_code, :no. places, :contact person name)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "crs_name" => $n,
            "crs_code" => $cc,
            "no. places" => $p,
            "contact person name" => $cp
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert courses");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteCourse($id) {
        $sqlQuery = "DELETE FROM course WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete courses");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateCourse($id, $n, $cc, $p, $cp) {
        $sqlQuery =
                "UPDATE course SET " .
                "name = :crs_name, " .
                "courseCode = :crs_code, " .
                "places = :no. places, " .
                "contactPerson = :contact person name " .
                "WHERE id = :id";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "crs_name" => $n,
            "crs_code" => $cc,
            "no. places" => $p,
            "contact person name" => $cp
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}