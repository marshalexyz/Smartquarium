<?php

require_once '../config/connection.php';

class DataSensorModel
{
    private $conn;

    public function __construct($connection)
    {
        $this->conn = $connection;
    }

    public function checkIfDataChanged($sensorID, $temperature, $clarity, $water_level)
    {
        $sqlCheck = "SELECT * FROM data_sensor WHERE sensorID = '$sensorID' ORDER BY timestamp DESC LIMIT 1";
        $resultCheck = $this->conn->query($sqlCheck);

        if ($resultCheck->num_rows > 0) {
            $row = $resultCheck->fetch_assoc();
            return ($row['temperatur'] != $temperature || $row['clarity'] != $clarity || $row['water_level'] != $water_level);
        }

        return true;
    }

    public function insertData($temperature, $clarity, $water_level, $timestamp)
    {
        $sqlInsert = "INSERT INTO data_sensor (temperatur, clarity, water_level, timestamp)
                      VALUES ('$temperature', '$clarity', '$water_level', '$timestamp')";

        return $this->conn->query($sqlInsert);
    }
}
?>
