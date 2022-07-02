<?php
include_once './config/koneksi.php';
include_once './config/function.php';

$id = getId();

$sql = "SELECT * FROM halaman WHERE id = '$id' ";
$query = mysqli_query($konek, $sql);
$jumlah = mysqli_num_rows($query);
$result = mysqli_fetch_array($query);

$page_title = $result['judul'];
?>

<?php include_once 'header.php'; ?>

<?php
if ($page_title == '') {
    echo "<div>
            <p>Data tidak ditemukan</p>
        </div>";
} else {
?>
    <p class="deskripsi"><?= $result['kutipan']?></p>
    <h1><?= $result['judul'] ?></h1>
    <?= setIsi($result['isi']) ?>
<?php
}
?>

<?php include_once 'footer.php'; ?>