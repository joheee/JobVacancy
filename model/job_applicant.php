<?php
require_once __DIR__ . '/../config/database.php';

class JobApplicant {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    // Apply for a job
    public function applyForJob($jobId, $email, $notes) {
        $query = "INSERT INTO job_applicant (job_id, email, notes, created_at) 
                  VALUES (:job_id, :email, :notes, NOW())";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':job_id', $jobId, PDO::PARAM_INT);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':notes', $notes, PDO::PARAM_STR);
        
        return $stmt->execute();
    }

    // Get all applicants for a job
    public function getApplicantsByJob($jobId) {
        $query = "SELECT * FROM job_applicant WHERE job_id = :job_id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':job_id', $jobId, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
