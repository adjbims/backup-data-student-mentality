<?php

require 'function.php';

if (isset($_POST["register"])) {
    $data = [
        "username" => $_POST["username"],
        "email" => $_POST["email"],
        "password" => $_POST["password"],
        "password2" => $_POST["password2"]
    ];

    if (registrasi($data) > 0) {
        echo "<script>
                alert('User baru berhasil ditambahkan!');
              </script>";

    } else {
        echo mysqli_error($conn);
    }
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman Registrasi</title>
    <link rel="stylesheet" href="style/registrasi.css">
    <link rel="shortcut icon" href="image/logoweb.png">
</head>

<body>
    <div class="container">
        <div class="gambar">
            <img src="image/register.png" />
        </div>
        <div class="login">
            <form action="" method="post">
                <h1>Register</h1>
                <hr>
                <p><strong>Sign Up to your Account</strong></p>
                <label for="username">Username</label>
                <input type="text" name="username" placeholder="Username"> <!-- Menambahkan atribut name="username" -->
                <label for="email">Email</label>
                <input type="text" name="email" placeholder="Email"> <!-- Menambahkan atribut name="email" -->
                <label for="password">Password</label>
                <input type="password" name="password" placeholder="Password">
                <!-- Menambahkan atribut name="password" -->
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" placeholder="Confirm Password">
                <!-- Menambahkan atribut name="password2" -->
                <a href="welcome.php" class="oval-button">Back</a>
                <button type="submit" name="register" class="oval-button">Sign Up</button>
                <!-- Mengubah anchor tag menjadi button tag dan menambahkan atribut name="register" -->
            </form>
        </div>
    </div>
</body>

</html>