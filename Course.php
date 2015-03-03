<?php
class Courses {
    private $name;
    private $courseCode;
    private $places;
    private $contactPerson;
    
    public function __construct($n, $cc, $p, $cp) {
        $this->name = $n;
        $this->courseCode = $cc;
        $this->places = $p;
        $this->contactPerson = $cp;
    }
    
    public function getName() { return $this->name; }
    public function getCourseCode() { return $this->courseCode; }
    public function getPlaces() { return $this->places; }
    public function getContactPerson() { return $this->contactPerson; }
    
}
