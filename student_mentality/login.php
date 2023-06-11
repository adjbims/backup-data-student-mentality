<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: home.php");
    exit;
}

require 'function.php';

if (isset($_POST['login'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");

    // cek email
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            // set session
            $_SESSION["login"] = true;

            header("Location: home.php");
            exit;
        }
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Halaman Login</title>
    <link rel="stylesheet" href="style/login.css">
    <link rel="shortcut icon" href="image/logoweb.png">
</head>

<body>
    <div class="container">
        <div class="gambar">
            <img src="image/login2.png" />
        </div>
        <div class="login">
            <?php if (isset($error)): ?>
            <p style="color: red; font-style: italic;">Email/Password salah</p>
            <?php endif; ?>
            <form action="" method="post">
                <h1>Login</h1>
                <hr>
                <p><strong>Sign in to your Account</strong></p>
                <label for="">Email</label>
                <input type="text" name="email" placeholder="Email Account"> <!-- Menambahkan atribut name="email" -->
                <label for="">Password</label>
                <input type="password" name="password" placeholder="Password">
                <!-- Menambahkan atribut name="password" -->
                <button type="submit" name="login" class="oval-button">Login</button>
                <!-- Mengubah anchor tag menjadi button tag dan menambahkan atribut name="login" -->
            </form>
        </div>
    </div>
</body>

</html>