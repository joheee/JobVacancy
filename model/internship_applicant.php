<?php
require_once __DIR__ . '/../config/database.php';

class InternshipApplicant {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // Apply for an internship
    public function applyForInternship($internshipId, $email, $notes) {
        $query = "INSERT INTO internship_applicant (internship_id, email, notes, created_at) 
                  VALUES (:internship_id, :email, :notes, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':internship_id', $internshipId, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
        
        return $stmt->execute();
    }

    // Get all applicants for an internship
    public function getApplicantsByInternship($internshipId) {
        $query = "SELECT * FROM internship_applicant WHERE internship_id = :internship_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':internship_id', $internshipId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
