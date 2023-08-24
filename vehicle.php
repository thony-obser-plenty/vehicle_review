<?php

// Vehicle interface represents a vehicle
interface Vehicle {
    public function drive();
}

// Car represents a car
class Car implements Vehicle {
    public function drive() {
        return "Driving a car";
    }
}

// Motorcycle represents a motorcycle
class Motorcycle implements Vehicle {
    public function drive() {
        return "Riding a motorcycle";
    }
}

// Airplane represents an airplane
class Airplane implements Vehicle {
    public function drive() {
        return "Flying an airplane";
    }
}

// Driver represents a driver
class Driver {
    private $name;
    private $vehicles;

    public function __construct($name, $vehicles) {
        $this->name = $name;
        $this->vehicles = $vehicles;
    }

    public function driveAll() {
        foreach ($this->vehicles as $vehicle) {
            echo $this->name . " is " . $vehicle->drive() . ".\n";
        }
    }
}

$car = new Car();
$motorcycle = new Motorcycle();
$airplane = new Airplane();

$driver1 = new Driver("John Doe", [$car, $motorcycle]);
$driver2 = new Driver("Jane Smith", [$motorcycle, $airplane]);

$driver1->driveAll();
$driver2->driveAll();

