<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pengguna Aplikasi Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="./styles.css">
</head>
<body>

    <?php
    // Menampilkan pesan selamat datang jika cookie ada
    if(isset($_COOKIE['last_registered_username'])) {
        echo "<p>Selamat datang kembali, " . htmlspecialchars($_COOKIE['last_registered_username']) . "!</p>";
    }
    ?>
    
    <h2>Daftar Pengguna Perpustakaan</h2>
    <table border="1">
        <tr>
            <th>Username</th>
            <th>Email</th>
            <th>Member</th>
            <th>Gender</th>
            <th>Update</th>
            <th>Delete</th>
        </tr>
        <?php
        include 'db.php';
        $result = $conn->query("SELECT id, username, email, member, gender FROM users");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>{$row['username']}</td>
                    <td>{$row['email']}</td>
                    <td>" . ($row['member'] ? 'Yes' : 'No') . "</td>
                    <td>{$row['gender']}</td>
                    <td><a href='update_user.php?id={$row['id']}'>Update</a></td>
                    <td><a href='delete_user.php?id={$row['id']}' onclick='return confirm(\"Are you sure you want to delete this user?\");'>Delete</a></td>
                  </tr>";
        }
        ?>
    </table>

    <a id="daftar" href="register.html">Daftar Pengguna Baru</a>
</body>
</html>
