<?php
require_once __DIR__ . '/../config/database.php';

class Job {
    private $db;

    public function __construct() {
        $this->db = (new Database())->conn;
    }

    public function getAllJobs() {
        $query = "SELECT * FROM jobs";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
