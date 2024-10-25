<?php

include '../config/connection.php';

$databaseConnection = new DatabaseConnection();
$connection = $databaseConnection->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $selectedYear = isset($_GET['year']) ? intval($_GET['year']) : date("Y");

    // Query untuk mengambil nilai maksimum temperatur dan jumlah suhu maksimum per bulan
    $query = "SELECT 
                EXTRACT(YEAR FROM timestamp) AS year,
                MONTHNAME(timestamp) AS month,
                COUNT(water_level) AS total_min_distance,
                MIN(water_level) AS min_distance
            FROM
                data_sensor
            WHERE
                water_level = (SELECT MIN(water_level) FROM data_sensor AS sub WHERE EXTRACT(YEAR_MONTH FROM sub.timestamp) = EXTRACT(YEAR_MONTH FROM data_sensor.timestamp))
                AND EXTRACT(YEAR FROM timestamp) = $selectedYear
            GROUP BY
                year, month
            ORDER BY
                CASE month
                    WHEN 'January' THEN 1
                    WHEN 'February' THEN 2
                    WHEN 'March' THEN 3
                    WHEN 'April' THEN 4
                    WHEN 'May' THEN 5
                    WHEN 'June' THEN 6
                    WHEN 'July' THEN 7
                    WHEN 'August' THEN 8
                    WHEN 'September' THEN 9
                    WHEN 'October' THEN 10
                    WHEN 'November' THEN 11
                    WHEN 'December' THEN 12
                END";
    $result = mysqli_query($connection, $query);

    if ($result->num_rows > 0) {
        $data = array();
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        header('Content-Type: application/json');
        echo json_encode($data);
    } else {
        header('Content-Type: application/json');
        echo json_encode(array('message' => 'Tidak ada data.'));
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(array('message' => 'Metode HTTP tidak valid.'));
}

$connection->close();
?>
