<?php
header('Content-Type: application/json');

$dataFile = 'data.txt';

// Jika ada data POST yang masuk, simpan ke file
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sensorDataRotary = $_POST['sensor_dataRotary'];
    $weight = $_POST['weight'];
    $data = [
        'sensor_dataRotary' => $sensorDataRotary,
        'weight' => $weight
    ];
    file_put_contents($dataFile, json_encode($data) . "\n", FILE_APPEND);
    echo json_encode(["status" => "success"]);
    exit();
}

// Baca data terakhir dari file
if (file_exists($dataFile)) {
    $lines = file($dataFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $lastLine = end($lines);
    $lastData = json_decode($lastLine, true);
    echo json_encode($lastData);
} else {
    echo json_encode(["sensor_dataRotary" => "No data available", "weight" => "No data available"]);
}
?>
