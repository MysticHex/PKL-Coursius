<?php
include 'connection.php';

if (isset($_POST['btnSubmit2'])) {
    $nama2 = (isset($_POST['nama2'])) ? $_POST['nama2'] : "";
    $judul2 = (isset($_POST['judul2'])) ? $_POST['judul2'] : "";
    $isi2 = (isset($_POST['isi2'])) ? $_POST['isi2'] : "";
    $kategori=$_POST['kategori'];

    $hour=$_POST['hour'];
    $miniute=$_POST['miniute'];
    $second=$_POST['second'];

    $hours = ($hour=='0'||$hour=="0"||$hour==0) ? null:$hour." Jam ";
    $miniutes = ($miniute=='0'||$miniute=="0"||$miniute==0) ? null:$miniute." Menit ";
    $seconds = ($second=='0'||$second=="0"||$second==0) ? null:$second." Detik ";

    $duration=$hours.$miniutes.$seconds;



    $instart = "INSERT INTO `FILES`(
        `author`,
        `judul`,
        `file_type_id`,
        `kategori`,
        `isi`
    )
    VALUES(
        '$nama2',
        '$judul2',
        'Artikel',
        '$kategori',
        '$isi2'
    )";
    $insart = mysqli_query($conn, $instart);

    $ssql="SELECT * FROM `files` WHERE `judul`='$judul2'";
    $rrun=mysqli_query($conn,$ssql);
    $row=mysqli_fetch_assoc($rrun);
    $iid=$row['id'];
    $jud=$row['judul'];
    $typ=$row['file_type_id'];
    $ca=$row['created_at'];
    $ua=$row['update_at'];


    $sssql="INSERT INTO `assignment`(
        `file_id`,
        `version`,
        `production_year`,
        `created_by_user_id`,
        `file_size`,
        `duration`,
        `length`,
        `url`,
        `created_at`
    )
    VALUES(
        '$iid',
        '0',
        '2022',
        '$fn',
        'null',
        '$duration',
        '10',
        '$doxument_upload_path',
        '$ca'
    )";
    $rrrun=mysqli_query($conn,$sssql);


    if ($insart&&$rrrun) {
        header('Location:h1.php?pilihan=Artikel&sm=Artikel berhasil diupload');
    } else {
        header('Location:h1.php?pilihan=Artikel&em=Artikel gagal diupload');
    }
}
