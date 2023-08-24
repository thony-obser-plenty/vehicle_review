<?php

// I check for:
// Readability
// Understandability
// Performance
// Error handling
// Bugs & Logical flaws
// DRY-Principle -> Don't write redundant code
// SOP-Principle -> Each thing does its own thing
// KISS-Principle -> Try to keep it simple
// SOLID-Principle -> https://en.wikipedia.org/wiki/SOLID
// POLA-Principle -> Code should work as one would expect
// YAGNI-Principle -> Don't code stuff you might not need

// This change is a lot about semantics. We could have just changed "drive()" to "operateVehicle()" but to be more semantically correct i've added interfaces for each vehicle type and an interface for the vehicle itself.
interface vehicleInterface {
    public function operateVehicle(VehicleOperator $driver): string;
}

// Extended vehicle interface, as every vehicle can be operated. I doubt this would ever be optional.
interface motorcycleInterface extends vehicleInterface {
    public function ride(): string;
}

// Extended vehicle interface, as every vehicle can be operated. I doubt this would ever be optional.
interface planeInterface extends vehicleInterface {
    public function fly(): string;
}

// Extended vehicle interface, as every vehicle can be operated. I doubt this would ever be optional.
interface carInterface extends vehicleInterface {
    public function drive(): string;
}

// Added a more specific car, because carInterface already indicates that it's a car.
class FordMustang implements carInterface {
    public function drive(): string {
        return "driving a Ford Mustang";
    }

    public function operateVehicle(VehicleOperator $driver): string {
        return "{$driver->getName()} is {$this->drive()}" . PHP_EOL;
    }
}

// Added a more specific motorcycle, because motorcycleInterface already indicates that it's a motorcycle.
class HarleyDavidson implements motorcycleInterface {
    public function ride(): string {
        return "riding a Harley Davidson";
    }

    public function operateVehicle(VehicleOperator $driver): string {
        return "{$driver->getName()} is {$this->ride()}" . PHP_EOL;
    }
}

// Added a more specific plane, because planeInterface already indicates that it's a plane.
class Boeing747 implements planeInterface {
    public function fly(): string {
        return "flying a Boeing 747";
    }

    public function operateVehicle(VehicleOperator $driver): string {
        return "{$driver->getName()} is {$this->fly()}" . PHP_EOL;
    }
}

// Changed Driver to VehicleOperator as it's more semantically correct.
class VehicleOperator {
    private string $name;
    private array $vehicles;

    public function __construct($name) {
        $this->name = $name;
        $this->vehicles = [];
    }

    public function getName(): string{
        return $this->name;
    }

    // Added getter for vehicles
    public function getVehicles(): array{
        return $this->vehicles;
    }

    // Makes it easier to add vehicles to the operator
    public function addVehicle($vehicle): void{
        $this->vehicles[] = $vehicle;
    }
}

$vehicleOperator1 = new VehicleOperator("John Doe");
$vehicleOperator1->addVehicle(new FordMustang());
$vehicleOperator1->addVehicle(new HarleyDavidson());

$vehicleOperator2 = new VehicleOperator("Jane Smith");
$vehicleOperator2->addVehicle(new Boeing747());

foreach ($vehicleOperator1->getVehicles() as $vehicle) {
    echo $vehicle->operateVehicle($vehicleOperator1);
}

foreach ($vehicleOperator2->getVehicles() as $vehicle) {
    echo $vehicle->operateVehicle($vehicleOperator2);
}