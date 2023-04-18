<?php

namespace PersonAddress;

class PersonDetails {
    protected $name;
    protected $age;

    public function __construct($name, $age) {
        $this->name = $name;
        $this->age = $age;
    }

    public function getName() {
        return $this->name;
    }

    public function getAge() {
        return $this->age;
    }

    public function sayHello() {
        echo "Hi, my name is " . $this->name;
    }
}
