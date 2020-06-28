<?php
include_once '../core/database/connect.php';
$pdo = new PDO_();
$alert = [];
$request = json_decode(file_get_contents("php://input"), true);
if (empty($request['title'])) {
    $alert[] = "Не введены данные в поле title";
}
if (empty($request['description'])) {
    $alert[] = "Не введены данные в поле description";
}
if (empty($request['full_description'])) {
    $alert[] = "Не введены данные в поле full description";
}
if (empty($request['date_courses'])) {
    $alert[] = "Не введены данные в поле date";
}
if (empty($request['price'])) {
    $alert[] = "Не введены данные в поле price";
}

if (empty($alert)) {
    try {
        $pdo->addCourses($request['title'], $request['description'], $request['full_description'], $request['date_courses'], $request['price']);
    } catch (PDOException $exception) {
        print $exception;
    }
} else {
    http_response_code(400);
    print json_encode($alert);
}
