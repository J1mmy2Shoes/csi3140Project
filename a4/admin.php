<?php
include 'db.php';

$stmt = $pdo->query('SELECT patients.name, patients.code, triage.severity, triage.wait_time FROM patients JOIN triage ON patients.id = triage.patient_id ORDER BY triage.updated_at ASC');
$patients = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($patients);
?>
