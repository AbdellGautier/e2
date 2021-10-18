<?php

class Person
{
    public $firstName;
    public $lastName;
    public $age;

    public function __construct($firstName, $lastName, $age)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->age = $age;
    }

    public function getFullName()
    {
        return $this->firstName . " " . $this->lastName;
    }

    public function getClassification()
    {
        return ($this->age >= 18) ? "adult" : "minor";
    }
}

$person = new Person('John', 'Harvard', 45);

echo $person->firstName; # Should print "John"
echo "<br>";
echo $person->getFullName(); # Should print "John Harvard"
echo "<br>";
echo $person->getClassification(); # Should print "adult"