<?php
require_once __DIR__ . '/../app/config/db_config.php';

class PersonasModel {
    // Database connection
    private $conn;

    // Table name
    private $table = "persona";

    // Column names
    private $personaID = "personaID";
    private $personaName = "personaName";
    private $personaIcon = "personaIcon";
    private $personaCounter = "personaCounter";
    private $personaDescription = "personaDescription";

    // Constructor with DB connection
    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method to get all personas, ordered by personaName ascending
    public function getPersonas() {
        $query = "SELECT * FROM " . $this->table . " ORDER BY " . $this->personaName . " ASC";
        $result = $this->conn->query($query);

        if ($result === false) {
            error_log("Error executing query: " . $this->conn->error);
            return false;
        }

        return $result;
    }

    public function getAllPersonasAsArray() {
        $personasArray = array(); // Initialize the array
    
        $query = "SELECT * FROM " . $this->table . " ORDER BY " . $this->personaName . " ASC";
        $result = $this->conn->query($query);
    
        if ($result === false) {
            error_log("Error executing query: " . $this->conn->error);
            return false;
        }
    
        // Loop through the result and store each persona in the array
        while ($row = $result->fetch_assoc()) {
            error_log("Persona: " . print_r($row, true)); // Log the entire row to check the description
            $personasArray[] = $row; // Push each persona as an associative array
        }
    
        return $personasArray;
    }
    

    // Method to insert a new persona
    public function createPersona($personaName, $personaIcon, $personaCounter, $personaDescription) {
        $query = "INSERT INTO " . $this->table . " (" . $this->personaName . ", " . $this->personaIcon . ", " . $this->personaCounter . ", " . $this->personaDescription . ") 
                  VALUES (?, ?, ?, ?)";
        
        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            error_log("Error preparing statement: " . $this->conn->error);
            return false;
        }

        // Bind the parameters
        $stmt->bind_param('ssis', $personaName, $personaIcon, $personaCounter, $personaDescription);

        // Execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            error_log("Error executing query: " . $stmt->error);
            return false;
        }
    }

    // Method to update a persona's details
    public function updatePersona($personaID, $personaName, $personaIcon, $personaCounter, $personaDescription) {
        $query = "UPDATE " . $this->table . " 
                  SET " . $this->personaName . " = ?, " . $this->personaIcon . " = ?, 
                      " . $this->personaCounter . " = ?, " . $this->personaDescription . " = ?
                  WHERE " . $this->personaID . " = ?";

        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            error_log("Error preparing statement: " . $this->conn->error);
            return false;
        }

        // Bind the parameters
        $stmt->bind_param('ssisi', $personaName, $personaIcon, $personaCounter, $personaDescription, $personaID);

        // Execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            error_log("Error executing query: " . $stmt->error);
            return false;
        }
    }

    // Method to delete a persona
    public function deletePersona($personaID) {
        $query = "DELETE FROM " . $this->table . " WHERE " . $this->personaID . " = ?";

        $stmt = $this->conn->prepare($query);
        if ($stmt === false) {
            error_log("Error preparing statement: " . $this->conn->error);
            return false;
        }

        // Bind the parameter
        $stmt->bind_param('i', $personaID);

        // Execute the query
        if ($stmt->execute()) {
            return true;
        } else {
            error_log("Error executing query: " . $stmt->error);
            return false;
        }
    }
}
?>
