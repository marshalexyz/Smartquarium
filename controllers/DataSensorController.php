<?php

require_once '../models/DataSensorModel.php';

class DataSensorController
{
    private $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function processData($sensorID, $temperature, $clarity, $water_level)
    {
        $timestamp = date('Y-m-d H:i:s');
        $dataChanged = $this->model->checkIfDataChanged($sensorID, $temperature, $clarity, $water_level);

        if (!$dataChanged) {
            echo "Data sama, tidak ada perubahan.";
        } else {
            $insertResult = $this->model->insertData($temperature, $clarity, $water_level, $timestamp);

            if ($insertResult) {
                echo "Data berhasil dimasukkan";
            } else {
                echo "Error: Gagal memasukkan data";
            }
        }
    }
}
?>
