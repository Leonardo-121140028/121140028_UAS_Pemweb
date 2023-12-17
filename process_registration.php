<?php
session_start(); // Memulai sesi di awal skrip
include 'db.php';

function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $email = $conn->real_escape_string($_POST['email']);
    $member = isset($_POST['member']) ? 1 : 0;
    $gender = isset($_POST['gender']) ? $conn->real_escape_string($_POST['gender']) : '';
    $browserInfo = $_SERVER['HTTP_USER_AGENT'];
    $ipAddress = getUserIP();

    if (empty($username) || empty($password) || empty($email) || empty($gender)) {
        echo "Semua field harus diisi!";
        exit;
    } else {
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $conn->prepare("INSERT INTO users (username, password, email, member, gender, browser_info, ip_address) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssissi", $username, $hashed_password, $email, $member, $gender, $browserInfo, $ipAddress);

        if ($stmt->execute()) {
            // Menyimpan informasi pengguna ke dalam sesi
            $_SESSION['user_info'] = [
                'username' => $username,
                'email' => $email,
                'member' => $member,
                'gender' => $gender
            ];
            setcookie('last_registered_username', $username, time() + (86400 * 7), "/"); // Cookie valid selama 7 hari

            header('Location: index.php'); // Arahkan pengguna ke halaman utama
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }
        $stmt->close();
    }

    $conn->close();
}
?>
