<?php

require_once '../config/connection.php';
require_once '../models/DataSensorModel.php';
require_once '../controllers/DataSensorController.php';

// Membuat objek koneksi
$databaseConnection = new DatabaseConnection();
$connection = $databaseConnection->getConnection();

// Membuat objek model dan controller
$model = new DataSensorModel($connection);
$controller = new DataSensorController($model);

// Ambil data POST
$sensorData = json_decode(file_get_contents('php://input'), true);

// Persiapkan data untuk dimasukkan
$sensorID = $sensorData['sensorID'];
$temperature = $sensorData['Suhu'];
$clarity = $sensorData['Kekeruhan'];
$water_level = $sensorData['Jarak'];

// Memproses data menggunakan controller
$controller->processData($sensorID, $temperature, $clarity, $water_level);

// Tutup koneksi ke database
$databaseConnection->closeConnection();

?>
