<?php
require_once '../classes/Database.php';

$db = (new Database())->getConnection();
$username = 'admin';
$password = password_hash('mon_mot_de_passe', PASSWORD_BCRYPT);

$query = $db->prepare("INSERT INTO utilisateurs (username, password) VALUES (?, ?)");
$query->execute([$username, $password]);

echo "Utilisateur admin créé avec succès.";
?>
