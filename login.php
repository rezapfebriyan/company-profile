<?php include 'header.php' ?>

<h3>Login Member</h3>

<?php
$email = "";
$password = "";
$error = "";

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if ($email == '' || $password == '') {
        $error .= "<li>Pengisian tidak boleh kosong</li>";
    } else {
        $sql = "SELECT * FROM members WHERE email = '$email' ";
        $query = mysqli_query($konek, $sql);
        $result = mysqli_fetch_array($query);
        $jml_data = mysqli_num_rows($query);
        if ($result['status'] != '1' && $jml_data > 0) {
            $error .= "<li>Akun anda belum aktif</li>";
        }

        // kalo password salah, tapi data ditemukan dan statusnya sudah 1
        if ($result['password'] != md5($password) && $jml_data > 0 && $result['status'] == '1') {
            $error .= "<li>Password tidak valid</li>";
        }
        
        if ($jml_data < 1) {
            $error .= "<li>Akun tidak ditemukan</li>";
        }

        if (empty($error)) {
            $_SESSION['email_member'] = $email;
            $_SESSION['nama_member'] = $result['nama_lengkap'];

            header('Location: rahasia.php');
            exit();
        }

    }
}
?>

<?php
if ($error) {
    echo "<div class='error'>
        <ul class='pesan'>$error</ul>
    </div>";
}
?>

<form action="" method="post">
    <table>
        <tr>
            <td class="label">Email</td>
            <td><input type="text" name="email" class="input" value="<?= $email?>"></td>
        </tr>
        <tr>
            <td class="label">Password</td>
            <td><input type="password" name="password" class="input"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="Login" name="login" class="tbl-biru">
            </td>
        </tr>
    </table>
</form>

<?php include 'footer.php' ?>