<?php include 'header.php';

$error = "";
$sukses = "";

if (!isset($_GET['email']) || !isset($_GET['kode'])) {
    $error = "Data tidak tersedia untuk diverifikasi";
} else {
    $email = $_GET['email'];
    $kode = $_GET['kode'];

    $sql = "SELECT * FROM members WHERE email = '$email' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);

    if ($result['status'] == $kode) {
        $edit = "UPDATE members SET status = '1' WHERE email = '$email' ";
        mysqli_query($konek, $edit);
        $sukses = "Akun telah aktif. Silahkan login";
    } else {
        $error = "Kode tidak valid";
    }
}
?>

<h3>Halaman verifikasi</h3>

<?php
if ($error) {
    echo "<div class='error'>
        $error
    </div>";
}

if ($sukses) {
    echo "<div class='sukses'>
        $sukses
    </div>";
}
?>

<?php include 'footer.php' ?>