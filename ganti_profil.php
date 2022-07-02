<?php
include 'header.php';

if (isset($_SESSION['email_member']) == '') {
    header('Location: login.php');
    exit();
}
?>

<h3>Form Ganti Profil</h3>

<?php
$email = "";
$nama = "";
$error = "";
$sukses = "";

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $password_lama = $_POST['password_lama'];
    $password = $_POST['password'];
    $konfirm_pass = $_POST['konfirm_pass'];

    if ($nama == '') {
        $error .= "<li>Silahkan masukkan nama lengkap</li>";
    }

    if ($password != '') {
        $sql = "SELECT * FROM members WHERE email = '".$_SESSION['email_member']."' ";
        $query = mysqli_query($konek, $sql);
        $result = mysqli_fetch_array($query);

        if (md5($password_lama) != $result['password']) {
            $error .= "<li>Password lama tidak sesuai dengan password baru</li>";
        }

        if ($password != $konfirm_password) {
            $error .= "<li>Konfirmasi password tidak sesuai dengan password lama</li>";
        }

        if (strlen($password) < 6) {
            $error .= "<li>Panjang karakter password kurang dari 6</li>";
        }
    }

    if (empty($error)) {
        $sql = "UPDATE members SET nama_lengkap = '".$nama."' WHERE email = '".$_SESSION['email_member']."' ";
        $query = mysqli_query($konek, $sql);
        $_SESSION['nama_lengkap_member'] = $nama;
        
        if ($password) {
            $sql2 = "UPDATE members SET password = md5($password) WHERE email = '".$_SESSION['email_member']."' ";
            mysqli_query($konek, $sql2);
        }

        $sukses = "Data berhasil diubah";
    }
    
}
?>

<?php
if ($error) {
    echo "<div class='error'>
        <ul>$error</ul>
    </div>";
}

if ($sukses) {
    echo "<div class='sukses'>
        $sukses
    </div>";
}
?>

<form action="" method="post">
    <table>
        <tr>
            <td class="label">Email</td>
            <td>
                <?= $_SESSION['email_member']?>
            </td>
        </tr>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>
                <input type="text" name="nama" class="input" value="<?= $_SESSION['nama_member']?>">
            </td>
        </tr>
        <tr>
            <td class="label">Password Saat Ini</td>
            <td>
                <input type="password" name="password_lama" class="input">
                <br>
            </td>
        </tr>
        <tr>
            <td class="label">Password Baru</td>
            <td>
                <input type="password" name="password" class="input">
                <br>
            </td>
        </tr>
        <tr>
            <td class="label">Konfirmasi Password</td>
            <td>
                <input type="password" name="konfirm_pass" class="input">
            </td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="simpan" name="simpan" class="tbl-biru">
            </td>
        </tr>
    </table>
</form>

<?php include 'footer.php'; ?>