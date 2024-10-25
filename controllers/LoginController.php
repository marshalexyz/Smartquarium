<?php

require_once '../config/connection.php';
include '../models/AdminModel.php';

class LoginController {

    public static function login($username, $password) {
        $dbConnection = new DatabaseConnection();
        $connection = $dbConnection->getConnection();

        // Menggunakan prepared statement untuk menghindari SQL Injection
        $stmt = $connection->prepare("SELECT * FROM admin WHERE Username=? AND Password=?");
        $stmt->bind_param("ss", $username, $password);

        // Menjalankan prepared statement
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            // Login berhasil
            $userData = $result->fetch_assoc();

            // Mulai sesi
            session_start();

            // Menyimpan informasi sesi
            $_SESSION['AdminID'] = $userData['AdminID'];
            $_SESSION['username'] = $userData['username'];

            $dbConnection->closeConnection();
            return true;
        } else {
            // Login gagal
            $dbConnection->closeConnection();
            return false;
        }
    }
}

// Memeriksa apakah permintaan datang dari formulir login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $adminObject = new Admin($username, $password);
    
    if (LoginController::login($adminObject->getUsername(), $adminObject->getPassword())) {
        header("Location: ../views/DashboardView.php");
        exit();
    } else {
        header("Location: ../?loginFailed=true");
        exit();
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['action']) && $_GET['action'] == 'logout') {
    // Logout
    session_start();
    session_destroy();
    header("Location: ../");
    exit();
}

?>
