<?php
session_start();
if (isset($_SESSION['nama_admin']) != '') {
    header('Location: index.php');
    exit();
}
include "../config/koneksi.php";

$username = "";
$password = "";
$error = "";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username == '' || $password == '') {
        $error .= "Pengisian tidak boleh kosong";
    } else {
        $sql = "SELECT * FROM admin WHERE username = '$username' ";
        $query = mysqli_query($konek, $sql);
        $result = mysqli_fetch_array($query);
        $jml_data = mysqli_num_rows($query);
        
        if ($jml_data < 1) {
            $error .= "Akun tidak ditemukan";
        } elseif ($result['password'] != md5($password)) {
            $error .= "Password tidak valid";
        } else {
            session_start();
            $_SESSION['nama_admin'] = $username;

            header('Location: index.php');
            exit();
        }

    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login Admin</title>
</head>
<body style="width: 100%; max-width: 330px; margin: auto; padding: 15px;"> <!-- margin auto= biar center -->
    
<form action="" method="post">
    <h2>Login Admin</h2>

    <?php
    if ($error) {
        echo "<div class='alert alert-danger'>
            $error
        </div>";
    }
    ?>
    <div class="form-group">
        <label>Username</label>
        <input type="text" name="username" class="form-control" placeholder="Masukkan username anda" value="<?= $username?>">
    </div>
    <div class="form-group">
        <label>Password</label>
        <input type="password" name="password" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary" name="login">Login</button>
</form>
</body>
</html>