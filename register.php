<?php
include('database.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $no_kk = $_POST['no_kk'];
    $nik = $_POST['nik'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validasi NIK harus tepat 16 digit angka
    if (strlen($nik) !== 16 || !is_numeric($nik)) {
        echo "NIK harus terdiri dari 16 digit angka.";
    } else {
        $sql = "INSERT INTO users (nama, no_kk, nik, password) VALUES ('$nama', '$no_kk', '$nik', '$password')";
        if ($conn->query($sql) === TRUE) {
            echo "";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <link rel="stylesheet" type="text/css" href="ak2pm.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <style>
        /* CSS tambahan jika diperlukan */
    </style>
</head>
<body>
    <div class="container">
        <div class="image-container">
            <img src="img/foto.jpg" alt="Register Image">
        </div>
        <div class="register-container">
            <h2 class="register-title">Register</h2>
            <form class="register-form" method="POST" action="">
                <label>Nama:</label>
                <div class="input-container">
                    <i class="fas fa-user"></i>
                    <input type="text" name="nama" required>
                </div>
                <label>No.KK:</label>
                <div class="input-container">
                    <i class="fas fa-id-card"></i>
                    <input type="text" name="no_kk" required>
                </div>
                <label>NIK:</label>
                <div class="input-container">
                    <i class="fas fa-id-card"></i>
                    <input type="text" name="nik" required maxlength="16">
                </div>
                <label>Password:</label>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" required>
                    <i class="far fa-eye" id="togglePassword"></i>
                </div>
                <button type="submit">Register</button>
            </form>
            <div class="back-link">
                <a href="login.php"><i class="fas fa-arrow-left"></i> Back to Login</a>
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
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const nikInput = document.querySelector('input[name="nik"]');
        nikInput.addEventListener('input', function () {
            if (this.value.length > 16) {
                this.value = this.value.slice(0, 16); // Batasi panjang maksimal
            }
        });
    });
    </script>
    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const registerForm = document.querySelector('.register-form');
        const nikInput = registerForm.querySelector('input[name="nik"]');
        const namaInput = registerForm.querySelector('input[name="nama"]');
        const noKkInput = registerForm.querySelector('input[name="no_kk"]');
        const passwordInput = registerForm.querySelector('input[name="password"]');

        registerForm.addEventListener('submit', function (event) {
            // Validasi panjang NIK harus tepat 16 digit
            const nikValue = nikInput.value.trim();
            if (nikValue.length !== 16 || isNaN(nikValue)) {
                alert('NIK harus terdiri dari 16 digit angka.');
                event.preventDefault(); // Mencegah form untuk submit jika validasi gagal
                return;
            }
        });
    });
    </script>
</body>
</html>
