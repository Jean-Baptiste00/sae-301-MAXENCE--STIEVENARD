<?php
class Animal {
    private $pdo;
    private $data;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function charger($idAnimal) {
        $stmt = $this->pdo->prepare("SELECT * FROM animaux WHERE id = :id");
        $stmt->bindParam(':id', $idAnimal, PDO::PARAM_INT);
        $stmt->execute();
        $this->data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$this->data) {
            throw new Exception("Animal introuvable.");
        }
    }

    public function getData() {
        return $this->data;
    }
}
?>
