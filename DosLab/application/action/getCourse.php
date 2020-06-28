<?php
include_once '../core/database/connect.php';
$pdo = new PDO_();

$request = json_decode(file_get_contents("php://input"), true);
try {
    $course = $pdo->getCourse($request['id_courses']);
} catch (RuntimeException $e) {
    print $e;
}
echo json_encode($course);