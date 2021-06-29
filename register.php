<?php
require_once 'App/init.php';
$db = new Database();
$auth = new Auth();
if( isset($_POST['register']) ) {
    $username = $_POST['username'];
    $password = $_POST['pass'];
    $cpassword = $_POST['pass2'];
    
    if($password !== $cpassword) {
        echo "<script>
                alert('Konfirmasi Password tidak sesuai');
                window.location= register.php
            </script>";
        return false;
    }
    $cek = $db->conn->query("SELECT * FROM admin WHERE username = '$username'");
    // jika terdapat username yang sama
    if(mysqli_num_rows($cek) == 1) {
        echo "<script>
                alert('Username telah terdaftar');
                window.location= register.php
            </script>";
        return false;
    }
    $pass = password_hash($password, PASSWORD_DEFAULT);
    $auth->register($username, $pass);
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h1>Register</h1>
    <form action="" method="post">
        <table>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" id="username" required=""></td>   
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="pass" id="pass" required=""></td>   
            </tr>
            <tr>
                <td>Konfirmasi Password</td>
                <td><input type="password" name="pass2" id="pass2" required=""></td>   
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="register" id="register" value="Register"></td>
            </tr>
            <tr>
                <td><p>Sudah punya akun?</p></td>
                <td><a href="login.php">Login</a></td>
            </tr>
        </table>
    </form>
    
</body>
</html>