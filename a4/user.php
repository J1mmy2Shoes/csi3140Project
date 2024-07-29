<?php
include 'db.php';

$name = $_POST['name'];
$code = $_POST['code'];

$stmt = $pdo->prepare('SELECT triage.wait_time FROM patients JOIN triage ON patients.id = triage.patient_id WHERE patients.name = ? AND patients.code = ?');
$stmt->execute([$name, $code]);
$wait_time = $stmt->fetchColumn();

if ($wait_time) {
    echo json_encode(['wait_time' => $wait_time]);
} else {
    echo json_encode(['error' => 'Patient not found']);
}
?>
