<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $code = $_POST['code'];

    try {
        $stmt = $pdo->prepare("SELECT * FROM patients WHERE name = :name AND code = :code");
        $stmt->execute(['name' => $name, 'code' => $code]);
        $patient = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($patient) {
            $created_at = new DateTime($patient['created_at']);
            $now = new DateTime();
            $interval = $created_at->diff($now);
            $wait_time = $interval->format('%h hours %i minutes');
            echo "Your approximate wait time is: " . $wait_time;
        } else {
            echo "No matching patient found.";
        }
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
} else {
    echo "Invalid request method.";
}
?>
