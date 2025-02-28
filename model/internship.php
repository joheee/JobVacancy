<?php
require_once __DIR__ . '/../config/database.php';

class Internship {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllInternships() {
        $query = "SELECT * FROM internships";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getInternshipById($id) {
        $query = "SELECT * FROM internships WHERE id = :id LIMIT 1";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
}
?>
