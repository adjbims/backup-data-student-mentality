<?php
$conn = mysqli_connect('localhost', 'root', '', 'student_mentality');

function registrasi($data)
{
    global $conn;

    $email = strtolower(stripslashes($data["email"]));
    $username = mysqli_real_escape_string($conn, $data["username"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    //cek email sudah ada apa belum
    $result = mysqli_query($conn, "SELECT email FROM user WHERE email = '$email'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('Email sudah terdaftar!')
              </script>";
        return false;
    }

    // cek informasi passwordnya
    if ($password !== $password2) {
        echo "<script>
                alert('Konfirmasi password tidak sesuai!');
              </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$email', '$username', '$password')");

    return mysqli_affected_rows($conn);

}
?>