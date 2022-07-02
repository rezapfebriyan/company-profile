<?php
include 'header.php';

if (isset($_SESSION['email_member']) != '') {
    header('Location: index.php');
    exit();
}
?>

<h3>Form Pendaftaran</h3>

<?php
$email = "";
$nama = "";
$error = "";
$sukses = "";

if (isset($_POST['simpan'])) {
    $email = $_POST['email'];
    $nama = $_POST['nama'];
    $password = $_POST['password'];
    $konfirm_pass = $_POST['konfirm_pass'];

    if ($email == "" || $nama == "" || $password == "" || $konfirm_pass == "") {
        $error .= "<li>Semua data harus diisi</li>";
    }

    // if ($email != "") {
    //     $sql = "SELECT email FROM members WHERE email = '$email' ";
    //     $query = mysqli_query($konek, $sql);
    //     $jml_data = mysqli_num_rows($query);
    //     if ($jml_data > 0) {
    //         $error .= "<li>Email sudah terdaftar</li>";
    //     }
    // }

    //*  Validasi email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error .= "<li>Email tidak valid</li>";
    }

    //
    if ($password != $konfirm_pass) {
        $error .= "<li>Konfirmasi password tidak sesuai</li>";
    }

    if (strlen($password) < 6) {
        $error .= "<li>Panjang karakter password kurang dari 6</li>";
    }

    if (empty($error)) {

        $status = md5(rand(0,1000));
        $judul_email = "Halaman Konfirmasi Pendaftaran";
        $isi_email = "Akun yang kamu miliki dengan email <b>$email</b> telah siap digunakan.<br>";
        $isi_email .= "Sebelumnya silahkan melakukan aktivasi email dilink dibawah ini:<br>";
        $isi_email .= urlDasar()."/verifikasi.php?email=$email&kode=$status";

        sendEmail($email, $nama, $judul_email, $isi_email);

        // $sql = "INSERT INTO members (email, nama_lengkap, password, status) 
        //         VALUES
        //         ('$email', '$nama', md5($password), '$status') ";
        // $query = mysqli_query($konek, $sql);
        // if ($query) {
        //     $sukses = "Pendaftaran berhasil. Silahkan cek email kamu untuk veriviaksi";
        // }
        $sukses = "jghfhjfhg";

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
                <input type="text" name="email" class="input" value="<?= $email?>">
            </td>
        </tr>
        <tr>
            <td class="label">Nama Lengkap</td>
            <td>
                <input type="text" name="nama" class="input" value="<?= $nama?>">
            </td>
        </tr>
        <tr>
            <td class="label">Password</td>
            <td>
                <input type="password" name="password" class="input">
                <br>
            </td>
        </tr>
        <tr>
            <td class="label">Konfirmasi Password</td>
            <td>
                <input type="password" name="konfirm_pass" class="input">
                Sudah punya akun? Silahkan <a href="<?= urlDasar()?>/login.php">Login</a>
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