<?php
    session_start();
    require_once 'App/init.php';
    $db = new Database(); 

    if(isset($_COOKIE['id']) && isset($_COOKIE['key']) ){
        $id = $_COOKIE['id'];
        $key = $_COOKIE['key'];
        
        $result = $db->conn->query("SELECT username FROM admin WHERE id='$id'");
        $row = $result->fetch_assoc();

        if($key === hash("sha256",$row['username']) ) {
            $_SESSION['login'] = true;
        }
    }

    if( isset($_SESSION['login']) == 'true'){
        header("Location: index.php");
        exit;
    }

    if( isset($_POST['login']) ) {
        $username = $_POST['username'];
        $password = $_POST['pass'];

        $cek = $db->conn->query("SELECT * FROM admin WHERE username='$username'");

        if(mysqli_num_rows($cek) === 1){
            $row = $cek->fetch_assoc();
            if(password_verify($password, $row['password'])){
                $_SESSION['login'] = 'true';
                header("Location: index.php");
                if(isset($_POST['remember']) ){
                    setcookie('id', $row['id'], time() + 120);
                    setcookie('key', hash("sha256", $row['username']), time() + 120);
                }
            }
        }

    }
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>
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
                <td><input type="checkbox" name="remember">Remember Me</td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="login" id="login" value="Login"></td>
            </tr>
            <tr>
                <td><p>Belum punya akun?</p></td>
                <td><a href="register.php">Register</a></td>
            </tr>
        </table>
    </form>
    
</body>
</html>