<?php
include_once __DIR__ . '/../app/config/db_config.php';

class Cars
{
    private $db;

    public function __construct($dbConnection)
    {
        $this->db = $dbConnection;
    }

    // Create a new car entry
    public function createCar($carData)
    {
        $query = "INSERT INTO cars (image, make, model, year, price, type, persona, Engine, horsePower, Doors, Torque, topSpeed, acceleration, fuelEfficiency, fuelType, cylinders, transmission, drivenWheels, marketCategory, description) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($query);

        $stmt->bind_param(
            "ssssdsdssddsdsdssdss",
            $carData['image'],
            $carData['make'],
            $carData['model'],
            $carData['year'],
            $carData['price'],
            $carData['type'],
            $carData['persona'],
            $carData['Engine'],
            $carData['horsePower'],
            $carData['Doors'],
            $carData['Torque'],
            $carData['topSpeed'],
            $carData['acceleration'],
            $carData['fuelEfficiency'],
            $carData['fuelType'],
            $carData['cylinders'],
            $carData['transmission'],
            $carData['drivenWheels'],
            $carData['marketCategory'],
            $carData['description'],
        );

        return $stmt->execute();
    }

    // Read car data (single or all cars)
    public function getCars($id = null)
    {
        if ($id) {
            $query = "SELECT * FROM cars WHERE ID = ?";
            $stmt = $this->db->prepare($query);
            $stmt->bind_param("i", $id);
            $stmt->execute();
            $result = $stmt->get_result();
            return $result->fetch_assoc();
        } else {
            $query = "SELECT * FROM cars";
            $result = $this->db->query($query);
            return $result->fetch_all(MYSQLI_ASSOC);
        }
    }
    public function getCarById($carId)
    {
        // Use $this->db instead of $this->pdo
        $stmt = $this->db->prepare("SELECT * FROM cars WHERE id = ?");
        if ($stmt === false) {
            // If prepare() failed, output the error message
            die("Error in prepare() statement: " . implode(", ", $this->db->errorInfo()));
        }
        $stmt->bind_param('i', $carId);  // Using 'i' for integer parameter
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }
    

    // public function updateCar($id, $carData)
    // {
    //     $query = "UPDATE cars SET 
    //                 image = ?, 
    //                 make = ?, 
    //                 model = ?, 
    //                 year = ?, 
    //                 price = ?, 
    //                 type = ?, 
    //                 persona = ?, 
    //                 Engine = ?, 
    //                 horsePower = ?, 
    //                 Doors = ?, 
    //                 Torque = ?, 
    //                 topSpeed = ?, 
    //                 acceleration = ?, 
    //                 fuelEfficiency = ?, 
    //                 fuelType = ?, 
    //                 cylinders = ?, 
    //                 transmission = ?, 
    //                 drivenWheels = ?, 
    //                 marketCategory = ?,
    //                 description=?
    //               WHERE ID = ?";

    //     // Prepare the query
    //     $stmt = $this->db->prepare($query);

    //     // Bind parameters with the correct number of types
    //     $stmt->bind_param(
    //         "ssssdsdssddsdsdssdssd", // 22 type definitions
    //         $carData['image'],
    //         $carData['make'],
    //         $carData['model'],
    //         $carData['year'],
    //         $carData['price'],
    //         $carData['type'],
    //         $carData['persona'],
    //         $carData['Engine'],
    //         $carData['horsePower'],
    //         $carData['Doors'],
    //         $carData['Torque'],
    //         $carData['topSpeed'],
    //         $carData['acceleration'],
    //         $carData['fuelEfficiency'],
    //         $carData['fuelType'],
    //         $carData['cylinders'],
    //         $carData['transmission'],
    //         $carData['drivenWheels'],
    //         $carData['marketCategory'],
    //         $carData['description'],
    //         $id // ID field for WHERE clause
    //     );

    //     // Execute the statement
    //     return $stmt->execute();
    // }

    // Method to update the car in the database
    public function updateCar($carId, $carData)
    {
        // Update query with placeholders for each field
        $query = "UPDATE cars SET image = ?, make = ?, model = ?, year = ?, price = ?, type = ?, persona = ?, Engine = ?, horsePower = ?, Doors = ?, Torque = ?, topSpeed = ?, acceleration = ?, fuelEfficiency = ?, fuelType = ?, cylinders = ?, transmission = ?, drivenWheels = ?, marketCategory = ?, description = ? WHERE id = ?";
        
        $stmt = $this->db->prepare($query);
    
        // Ensure the bind_param types match the number of placeholders
        $stmt->bind_param(
            "ssssdsdssddsdsdssdss", // 20 placeholders types (string for s, double for d, int for i)
            $carData['image'],
            $carData['make'],
            $carData['model'],
            $carData['year'],
            $carData['price'],
            $carData['type'],
            $carData['persona'],
            $carData['Engine'],
            $carData['horsePower'],
            $carData['Doors'],
            $carData['Torque'],
            $carData['topSpeed'],
            $carData['acceleration'],
            $carData['fuelEfficiency'],
            $carData['fuelType'],
            $carData['cylinders'],
            $carData['transmission'],
            $carData['drivenWheels'],
            $carData['marketCategory'],
            $carData['description'],
            $carId // carId as the last parameter for the WHERE clause
        );
    
        return $stmt->execute();
    }
    
    // Delete a car
    public function deleteCar($id)
    {
        $query = "DELETE FROM cars WHERE ID = ?";
        $stmt = $this->db->prepare($query);
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
