<?php
include_once __DIR__ . '/../app/config/db_config.php';

class PersonasModel {
    private $db;

    // Constructor to inject the database connection
    public function __construct($db) {
        $this->db = $db;
    }

    // Function to fetch all personas from the database
    public function getAllPersonas() {
        // SQL query to fetch all personas ordered by personaName in ascending order
        $query = "SELECT personaID, personaName, personaIcon, personaCounter, personaDescription
                  FROM personas
                  ORDER BY personaName ASC";

        // Prepare the query
        $stmt = $this->db->prepare($query);

        // Execute the query
        $stmt->execute();

        // Fetch all personas as an associative array
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Function to get a single persona by ID
    public function getPersonaById($personaID) {
        // SQL query to fetch a single persona by its ID
        $query = "SELECT personaID, personaName, personaIcon, personaCounter, personaDescription
                  FROM personas
                  WHERE personaID = :personaID";

        // Prepare the query
        $stmt = $this->db->prepare($query);

        // Bind the personaID parameter
        $stmt->bindParam(':personaID', $personaID, PDO::PARAM_INT);

        // Execute the query
        $stmt->execute();

        // Fetch the result as an associative array
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>
