package main

import "fmt"

// Vehicle interface represents a vehicle
type Vehicle interface {
	Drive() string
}

// Car represents a car
type Car struct{}

// Drive implements the Drive method for Car
func (c Car) Drive() string {
	return "Driving a car"
}

// Motorcycle represents a motorcycle
type Motorcycle struct{}

// Drive implements the Drive method for Motorcycle
func (m Motorcycle) Drive() string {
	return "Riding a motorcycle"
}

// Airplane represents an airplane
type Airplane struct{}

// Drive implements the Drive method for Airplane
func (a Airplane) Drive() string {
	return "Flying an airplane"
}

// Driver represents a driver
type Driver struct {
	Name     string
	Vehicles []Vehicle
}

// DriveAll drives all vehicles owned by the driver
func (d *Driver) DriveAll() {
	for _, v := range d.Vehicles {
		fmt.Printf("%s is %s.\n", d.Name, v.Drive())
	}
}

func main() {
	car := Car{}
	motorcycle := Motorcycle{}
	airplane := Airplane{}

	driver1 := &Driver{
		Name:     "John Doe",
		Vehicles: []Vehicle{car, motorcycle},
	}

	driver2 := &Driver{
		Name:     "Jane Smith",
		Vehicles: []Vehicle{motorcycle, airplane},
	}

	driver1.DriveAll()
	driver2.DriveAll()
}
