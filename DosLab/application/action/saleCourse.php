<?php
session_start();
include_once '../core/database/connect.php';
$pdo = new PDO_();

$request = json_decode(file_get_contents("php://input"), true);
$alert=[];
if (($pdo->checkUserSale($_SESSION['id_user'],$request['id_courses'])) == false) {
    $alert[] = "Вы уже записались на этот курс";
}
if (empty($_SESSION['id_user'])) {
    $alert[] = "Зарегестрируйтесь что бы записаться на курс";
    session_destroy();
}
if (empty($alert)) {
    try {
        $pdo->saleCourses($request['id_courses']);
        $alert[]="Вы успешно записались на курс";

    } catch (PDOException $exception) {
        print $exception;
    }
}
print json_encode($alert);
