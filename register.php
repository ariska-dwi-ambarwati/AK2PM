<?php
include('database.php');

$errors = []; // Array untuk menyimpan pesan kesalahan
$registrationSuccess = false;

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $no_kk = $_POST['no_kk'];
    $nik = $_POST['nik'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Validasi NIK
    if (strlen($nik) !== 16 || !is_numeric($nik)) {
        $errors[] = "NIK harus 16 digit angka!";
    }

    // Validasi No.KK
    if (strlen($no_kk) !== 16 || !is_numeric($no_kk)) {
        $errors[] = "No.KK harus 16 digit angka!";
    }

    if (empty($errors)) {
        $sql = "INSERT INTO users (nama, no_kk, nik, password) VALUES ('$nama', '$no_kk', '$nik', '$password')";
        if ($conn->query($sql) === TRUE) {
            $registrationSuccess = true;
        } else {
            $errors[] = "Error: " . $sql . "<br>" . $conn->error;
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
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }

        .error-messages {
            color: red;
            margin-top: 10px;
        }
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
                    <input type="text" name="nik" required>
                </div>
                <label>Password:</label>
                <div class="input-container">
                    <i class="fas fa-lock"></i>
                    <input type="password" name="password" id="password" required>
                    <i class="far fa-eye" id="togglePassword"></i>
                </div>
                <?php if (!empty($errors)): ?>
                    <div class="error-messages">
                        <?php foreach ($errors as $error): ?>
                            <p><?php echo htmlspecialchars($error); ?></p>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
                <button type="submit">Register</button>
            </form>
            <div class="back-link">
                <a href="login.php"><i class="fas fa-arrow-left"></i> Back to Login</a>
            </div>
        </div>
    </div>

    <!-- Modal untuk menampilkan pesan sukses -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <p>Registrasi berhasil.</p>
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

        // JavaScript untuk menampilkan pop-up jika registrasi berhasil
        document.addEventListener('DOMContentLoaded', function () {
            const registrationSuccess = <?php echo json_encode($registrationSuccess); ?>;
            if (registrationSuccess) {
                const modal = document.getElementById("successModal");
                const span = document.getElementsByClassName("close")[0];

                modal.style.display = "block";

                span.onclick = function() {
                    modal.style.display = "none";
                }

                window.onclick = function(event) {
                    if (event.target == modal) {
                        modal.style.display = "none";
                    }
                }
            }
        });
    </script>
</body>
</html>
