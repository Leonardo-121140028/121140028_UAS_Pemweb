<?php
include 'db.php';
session_start();

// Cek jika ID pengguna diset atau tidak
if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$userId = $_GET['id'];
$userData = [];

// Jika form update disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $conn->real_escape_string($_POST['username']);
    $email = $conn->real_escape_string($_POST['email']);
    $member = isset($_POST['member']) ? 1 : 0;
    $gender = $conn->real_escape_string($_POST['gender']); // Pastikan nilai gender adalah 'Male' atau 'Female'
    
    // Update data ke database
    $stmt = $conn->prepare("UPDATE users SET username=?, email=?, member=?, gender=? WHERE id=?");
    $stmt->bind_param("ssisi", $username, $email, $member, $gender, $userId);
    if ($stmt->execute()) {
        // Redirect ke halaman utama
        header('Location: index.php');
        exit;
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
} else {
    // Ambil data pengguna yang akan diedit
    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $userData = $result->fetch_assoc();
    } else {
        // Jika tidak ada pengguna dengan ID tersebut, redirect ke halaman utama
        header('Location: index.php');
        exit;
    }
    $stmt->close();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Pengguna</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>

<div class="container">
    <h2>Update Pengguna</h2>
    <form action="update_user.php?id=<?php echo $userId; ?>" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" value="<?php echo htmlspecialchars($userData['username']); ?>"><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($userData['email']); ?>"><br>

        <label for="member">Member:</label>
        <input type="checkbox" id="member" name="member" <?php echo ($userData['member'] ? 'checked' : ''); ?>><br>

        <label>Gender:</label>
        <input type="radio" name="gender" value="Male" <?php echo ($userData['gender'] == 'Male') ? 'checked' : ''; ?>> Male
        <input type="radio" name="gender" value="Female" <?php echo ($userData['gender'] == 'Female') ? 'checked' : ''; ?>> Female<br>

        <input type="submit" value="Update">
    </form>
</div>
<a id="kembali" href="index.php">Kembali ke Daftar Pengguna</a>
</body>
</html>
