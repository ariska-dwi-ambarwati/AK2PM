<?php
include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nik = $_POST['nik'];
    $password = $_POST['password'];

    if (strlen($nik) != 16) {
        $error = "No NIK tidak sesuai!";
    } else {
        $sql = "SELECT * FROM users WHERE nik = '$nik'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if (password_verify($password, $row['password'])) {
                session_start();
                $_SESSION['nik'] = $nik;
                header("Location: dashboard.php");
            } else {
                $error = "Password salah!";
            }
        } else {
            $error = "NIK tidak ditemukan!";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="ak2pm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <style>
        /* Additional styling for password visibility toggle */
        .input-container .toggle-password {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #555555;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="image-container">
            <img src="img/foto.jpg" alt="Login Image">
        </div>
        <div class="login-container">
            <h2 class="login-title">Login</h2>
            <form class="login-form" method="POST" action="">
                <label>NIK:</label>
                <div class="input-container">
                    <i class="fas fa-id-card"></i>
                    <input type="text" name="nik" required>
                </div>
                <label>Password:</label>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" required>
                    <i class="far fa-eye toggle-password" id="togglePassword"></i>
                </div>
                <button type="submit">Login</button>
                <?php if (isset($error)) { echo '<p class="error-message">'.$error.'</p>'; } ?>
            </form>
            <div class="register-link">
                <p>Belum punya akun? <a href="register.php">Register</a></p>
            </div>
        </div>
    </div>
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
