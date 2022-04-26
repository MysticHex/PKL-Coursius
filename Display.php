<?php
include 'function.php';
include 'connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php head('View all','h2.php') ?>
    <?php
        $type=$_GET['type'];
        $kategori=$_GET['kategori'];
        ?>
        <?php if(isset($type)){?>
            <center><h1><?php echo $type; ?></h1></center>
        <?php } ?>
        <?php if(isset($kategori)){?>
            <center><h2><?php echo $kategori; ?></h2></center>
        <?php } ?>
        <?php
        if(isset($type)){
        if ($type=='Video') {
            $sql="SELECT * FROM `files` WHERE `file_type_id`='video';";
            $run=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($run)){
                $id=$row['id'];
                $isi=$row['isi'];
                $fileType=$row['file_type_id'];
                $judul=$row['judul'];
                $nama=$row['author'];
                $ca=$row['created_at'];
                $ua=$row['update_at'];?>
                <table>
                <tr>
                    <div class="" style="width:360px; height:fit-content;">
                        <video width="360px"  src="uploads/<?= $isi; ?>"></video>
                    </div>
                </tr>
                <tr>
                    <ul style="list-style-type: none;">
                        <li>Nama: <?= $nama; ?></li>
                        <li>Judul: <?= $judul; ?></li>
                        <li>Dibuat: <?= $ca; ?></li>
                        <?php if(isset($ua)) {?>
                            <li>Diupdate:<?= $ua; ?></li>
                        <?php } ?>
                    </ul>
                </tr>
                </table>
               <?php 
            }
        }
    ?>
        <?php
        if ($type=='Gambar') {
            $sql="SELECT * FROM `files` WHERE `file_type_id`='image';";
            $run=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($run)){
                $id=$row['id'];
                $isi=$row['isi'];
                $fileType=$row['file_type_id'];
                $judul=$row['judul'];
                $nama=$row['author'];
                $ca=$row['created_at'];
                $ua=$row['update_at'];?>
                <table>
                <tr>
                    <div class="" style="width:360px; height:fit-content;  border: 1px solid black; padding-left:5px;">
                        <?= $isi; ?>
                    </div>
                </tr>
                <tr>
                    <ul style="list-style-type: none;">
                        <li>Nama: <?= $nama; ?></li>
                        <li>Judul: <?= $judul; ?></li>
                        <li>Dibuat: <?= $ca; ?></li>
                        <?php if(isset($ua)) {?>
                            <li>Diupdate:<?= $ua; ?></li>
                        <?php } ?>
                    </ul>
                </tr>
                </table>
               <?php 
            }
        }
    ?>
        <?php
        if ($type=='Artikel') {
            $sql="SELECT * FROM `files` WHERE `file_type_id`='Artikel' OR `file_type_id`='document';";
            $run=mysqli_query($conn,$sql);
            while($row=mysqli_fetch_assoc($run)){
                $id=$row['id'];
                $isi=$row['isi'];
                $fileType=$row['file_type_id'];
                $judul=$row['judul'];
                $nama=$row['author'];
                $ca=$row['created_at'];
                $ua=$row['update_at'];?>
                <table>
                <tr>
                    <?php if($fileType=='Artikel') { ?>
                        <div class="" style="width:360px; height:fit-content;  border: 1px solid black; padding-left:5px;">
                            <?= $isi; ?>
                        </div>
                    <?php }?>
                    <?php if($fileType=='document') {?>
                        <iframe src="uploads/<?=$isi?>" frameborder="0"></iframe>
                    <?php } ?>
                </tr>
                <tr>
                    <ul style="list-style-type: none;">
                        <li>Nama: <?= $nama; ?></li>
                        <li>Judul: <?= $judul; ?></li>
                        <li>Dibuat: <?= $ca; ?></li>
                        <?php if(isset($ua)) {?>
                            <li>Diupdate:<?= $ua; ?></li>
                        <?php } ?>
                    </ul>
                </tr>
                </table>
               <?php 
            }
        }
    }
    if(isset($type)){
        $ssqql="SELECT * FROM `files` WHERE `kategori`='$type';";
        $rruun=mysqli_query($conn,$ssqql);
        while($row=mysqli_fetch_assoc($rruun)) {
        $id=$row['id'];
        $isi=$row['isi'];
        $fileType=$row['file_type_id'];
        $judul=$row['judul'];
        $nama=$row['author'];
        $ca=$row['created_at'];
        $ua=$row['update_at'];
        ?>

        <table border="1">
            <?php if($fileType==='video') {?>
                <tr>
                    <video controls src="./uploads/<?=$isi?>" width="360px"></video>
                </tr>
            <?php } ?>

            <?php if($fileType==='image') {?>
                <tr>
                    <img src="uploads/<?=$isi?>" alt="Gambar <?=$judul?>" width=360px;>
                </tr>
            <?php } ?>
            
            <?php if($fileType==='Artikel') {?>
                <tr>
                    <div class="" style="width:360px; height:fit-content;  border: 1px solid black; padding-left:5px;">
                        <?= $isi; ?>
                    </div>
                </tr>
            <?php } ?>

            <?php if($fileType==='document') {?>
                    <?php
                        $docex=pathinfo($isi,PATHINFO_EXTENSION);
                        $doc_ex_lc=strtolower($docex);                     
                    ?>
                <tr>
                    <?php if($doc_ex_lc==="pdf") {?>
                        <iframe src="./uploads/<?=$isi?>" frameborder="0"></iframe>
                    <?php }else{ ?>
                        
                    <?php } ?>
                </tr>
            <?php } ?>
                <tr>
                    <ul style="list-style-type: none;">
                        <li>Nama: <?= $nama; ?></li>
                        <li>Judul: <?= $judul; ?></li>
                        <li>Dibuat: <?= $ca; ?></li>
                        <?php if(isset($ua)) {?>
                            <li>Diupdate:<?= $ua; ?></li>
                        <?php } ?>
                    </ul>
                </tr>
        </table>

    <?php } ?>
    </div>
<?php    }
    ?>
</body>
</html>