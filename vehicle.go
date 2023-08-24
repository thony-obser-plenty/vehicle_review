package main

import "fmt"

type VehicleInterface interface {
	operateVehicle(vehicleOperator VehicleOperator) string
}

type MotorcycleInterface interface {
	VehicleInterface
	ride() string
}

type CarInterface interface {
	VehicleInterface
	drive() string
}

type AirplaneInterface interface {
	VehicleInterface
	fly() string
}

type FordMustang struct{}

func (fordMustang FordMustang) drive() string {
	return "driving a Ford Mustang"
}

func (fordMustang FordMustang) operateVehicle(vehicleOperator VehicleOperator) string {
	return vehicleOperator.Name + " is " + fordMustang.drive()
}

type HarleyDavidson struct{}

func (harleyDavidson HarleyDavidson) ride() string {
	return "riding a Harley Davidson"
}

func (harleyDavidson HarleyDavidson) operateVehicle(vehicleOperator VehicleOperator) string {
	return vehicleOperator.Name + " is " + harleyDavidson.ride()
}

type Boeing747 struct{}

func (boeing747 Boeing747) fly() string {
	return "flying a Boeing 747"
}

func (boeing747 Boeing747) operateVehicle(vehicleOperator VehicleOperator) string {
	return vehicleOperator.Name + " is " + boeing747.fly()
}

type VehicleOperator struct {
	Name     string
	Vehicles []VehicleInterface
}

func (vehicleOperator VehicleOperator) getName() string {
	return vehicleOperator.Name
}

func (vehicleOperator VehicleOperator) addVehicle(vehicle VehicleInterface) {
	vehicleOperator.Vehicles = append(vehicleOperator.Vehicles, vehicle)
}

func (vehicleOperator VehicleOperator) getVehicles() []VehicleInterface {
	return vehicleOperator.Vehicles
}

// there's still some kind of bug in here. I can't get it to print results.
func main() {
	var driver1 VehicleOperator
	driver1 = VehicleOperator{Name: "John Doe"}

	driver1.addVehicle(CarInterface(FordMustang{}))
	driver1.addVehicle(MotorcycleInterface(HarleyDavidson{}))

	for _, vehicle := range driver1.getVehicles() {
		fmt.Printf(vehicle.operateVehicle(driver1))
	}

	var driver2 VehicleOperator
	driver2 = VehicleOperator{Name: "Jane Smith"}
	driver2.addVehicle(AirplaneInterface(Boeing747{}))

	for _, vehicle := range driver2.getVehicles() {
		fmt.Println(vehicle.operateVehicle(driver2))
	}
}
