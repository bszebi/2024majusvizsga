<?php
require "connect.php";

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

    $sql = "SELECT * FROM csokik";
    $result = mysqli_query($dbconn, $sql);

    if (!$result) {
        http_response_code(500);
        echo json_encode(["message" => "Hiba történt a lekérdezés során!"]);
        exit;
    }

    $data = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    $json = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

    header("Content-Type: application/json; charset=UTF-8");

    echo $json;

    file_put_contents("csokik.json", $json);

} else {
    http_response_code(405);
    echo json_encode(["message" => "Érvénytelen kérési módszer!"]);
}
?>
