<?php

function urlDasar()
{
    //* $_Srvr['srv_nm'] = untuk nama domain
    //* $_Srvr['scrpt_nm'] = untuk direktori (bwa.com/company)
    $base_url = "http://".$_SERVER['SERVER_NAME'].dirname($_SERVER['SCRIPT_NAME']);

    return $base_url;
}

function getImage($id_tulisan)
{
    global $konek; //! Get var konek at file konek.php
    $sql = "SELECT * FROM halaman WHERE id = '$id_tulisan' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);
    $text = $result['isi'];

    // untuk ambil data gambar (yg dikolom isi) berdasarkan pola img-src
    preg_match('/< *img[^>]*src *= *["\']?([^"\']*)/i', $text, $img);
    $gambar = $img[1]; #  ../gambar/fm_fl.jpg
    #ganti ../gambar/  ->  urlDasar()    =  http:/....../img/nmfile.jpg
    $gambar = str_replace("../img/",urlDasar()."/img/", $gambar);

    return $gambar;
    
}

function getQuote($id_tulisan)
{
    global $konek;
    $sql = "SELECT * FROM halaman WHERE id = '$id_tulisan' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);
    $text = $result['kutipan'];

    return $text;
}

function getTitle($id_tulisan) {
    global $konek;
    $sql = "SELECT * FROM halaman WHERE id = '$id_tulisan' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);
    $text = $result['judul'];

    return $text;
}

function getContent($id_tulisan)
{
    global $konek;
    $sql = "SELECT * FROM halaman WHERE id = '$id_tulisan' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);
    $text = strip_tags($result['isi']); // untuk mengambil string saja

    return $text;
}

function cleanSlug($title)
{
    $slug = strtolower($title);
    $slug = preg_replace("/[^a-zA-Z0-9\s]/","", $slug); //!  Menghilangkan selain yg ada dipola
    $slug = str_replace(" ","-",$slug); //!  Mengganti % diurl jadi - yg ada di $slug

    return $slug;
}

function createPageUrl($id)
{
    global $konek;
    $sql = "SELECT * FROM halaman WHERE id = '$id' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);
    $title = cleanSlug($result['judul']);

    return urlDasar()."/halaman.php/$id/$title";
}

function createPageTutors($id)
{
    global $konek;
    $sql = "SELECT * FROM tutors WHERE id = '$id' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);
    $name = cleanSlug($result['nama']);

    return urlDasar()."/tutors.php/$id/$name";
}

function createPagePartners($id)
{
    global $konek;
    $sql = "SELECT * FROM partners WHERE id = '$id' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);
    $name = cleanSlug($result['nama']);

    return urlDasar()."/partners.php/$id/$name";
}

function getId() {
    $id = '';
    if (isset($_SERVER['PATH_INFO'])) {
        $id = dirname($_SERVER['PATH_INFO']);
        $id = preg_replace("/[^0-9]/","",$id);
    }
    return $id;
}

function setIsi($isi)
{
    $isi = str_replace("../img/", urlDasar()."/img/",$isi);
    return $isi;
}

function wordMax($isi, $max)
{
    $array_isi = explode(" ", $isi);
    $array_isi = array_slice($array_isi, 0, $max); //!  ambil index 0 - maksimumnya
    $isi = implode(" ", $array_isi);

    return $isi;
}

function tutorsPict($id)
{
    global $konek;
    $sql = "SELECT * FROM tutors WHERE id = '$id' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);
    $foto = $result['foto'];

    if ($foto) {
        return $foto;
    } else {
        return "default_picture.png";
    }
}

function partnersPict($id)
{
    global $konek;
    $sql = "SELECT * FROM partners WHERE id = '$id' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);
    $foto = $result['foto'];

    if ($foto) {
        return $foto;
    } else {
        return "default_partners.png";
    }
}

function getContentInfo($id, $kolom)
{
    global $konek;
    $sql = "SELECT $kolom FROM info WHERE id = '$id' ";
    $query = mysqli_query($konek, $sql);
    $result = mysqli_fetch_array($query);

    return $result[$kolom];
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


function sendEmail($email_penerima, $nama_penerima, $judul_email, $isi_email)
{
    $email_pengirim = "rezafebriyan00@gmail.com";
    $nama_pengirim = "noreply";

    //Load Composer's autoloader
    require getcwd() . '/vendor/autoload.php';

    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      
        $mail->isSMTP(); 
        $mail->Host       = 'smtp.gmail.com';                     
        $mail->SMTPAuth   = true;   
        $mail->Username   = $email_pengirim; 
        $mail->Password   = 'laravelphp'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; 
        $mail->Port       = 465;

        //Recipients
        $mail->setFrom($email_pengirim, $nama_pengirim);
        $mail->addAddress($email_penerima, $nama_penerima);

        //Content
        $mail->isHTML(true);
        $mail->Subject = $judul_email;
        $mail->Body    = $isi_email;

        $mail->send();
        
        return "sukses";
    } catch (Exception $e) {
        return "Gagal: {$mail->ErrorInfo}";
    }
}