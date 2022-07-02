<?php
include 'header.php';

$sukses = "";
$per_page = 5;

$katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if ($op == 'delete') {
    $id = $_GET['id'];

    $sql = "DELETE FROM members WHERE id = '$id'";
    $query = mysqli_query($konek, $sql);
    if ($query) {
        $sukses = "Data <b>berhasil</b> dihapus";
    }

}
?>
<h1 class="py-3">Members Admin</h1>

<?php
if ($sukses) {
?>
    <div class="alert alert-success text-center py-2" role="alert">
        <?= $sukses ?>
    </div>
<?php } ?>

<form method="get" class="row g-3">
    <div class="col-auto">
        <input type="text" name="katakunci" class="form-control" value="<?= $katakunci ?>" placeholder="masukkan kata kunci">
    </div>
    <div class="col-auto">
        <input type="submit" value="Cari Members" class="btn btn-secondary" name="cari">
    </div>
</form>

<table class="table table-striped mt-4">
    <thead>
        <th>No</th>
        <th class="col-3">Email</th>
        <th>Nama</th>
        <th class="col-3">Status</th>
    </thead>
    <tbody>
        <?php
        $tambahan = "";
        if ($katakunci != '') {
            $array_katakunci = explode(" ", $katakunci);
            // pecah jadi beberapa kata. count() untuk cari jumlah kata yg diinput
            for ($x = 0 ; $x < count($array_katakunci) ; $x++) { 
                $cari[] = "(nama_lengkap LIKE '%".$array_katakunci[$x]."%' OR email LIKE '%".$array_katakunci[$x]."%')";
            }
            $tambahan = " WHERE ".implode(" OR ", $cari);
        }
        $sql = "SELECT * FROM members $tambahan";  //? Perintah untuk search
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1; //!  Merubah data jadi integer
        $mulai = ($page > 1) ? ($page * $per_page) - $per_page : 0; // kalo page>1, buat jadi max per_page
        $query = mysqli_query($konek, $sql);
        $total = mysqli_num_rows($query);
        $pages = ceil($total / $per_page);
        $no = $mulai + 1;
        $sql = $sql." ORDER BY id DESC LIMIT $mulai, $per_page";

        $query = mysqli_query($konek, "$sql");
        while($result = mysqli_fetch_array($query)) :
        ?>
            <tr>
                <td width='60px' align='center'><?= $no++?></td>
                <td><?= $result['email'] ?></td>
                <td><?= $result['nama_lengkap'] ?></td>
                <td>
                    <?php
                    if ($result['status'] == '1') { ?>
                        <span class="badge bg-success">Aktif</span>
                    <?php } else { ?>
                        <span class="badge bg-light">Non Aktif</span>
                    <?php } ?>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>

<nav aria_label="Page navigation exaple">
    <ul class="pagination">
        <?php
        $cari = (isset($_GET['cari'])) ? $_GET['cari'] : "";
        for ($i=1; $i <= $pages; $i++) { 
        ?>
            <li class="page-item">
                <a href="members.php?katakunci=<?= $katakunci ?>&cari=<?= $cari ?>&page=<?= $i ?>" class="page-link">
                    <?= $i ?>
                </a>
            </li>
        <?php } ?>
    </ul>
</nav>

<?php
include 'footer.php';
?>