<?php

include 'connection.php';
include 'disperror.php';

if (isset($_GET['url'])) {
    $id = $_GET['url'];
} else {
    header("Location:h2_2.php");
}


$sql = "SELECT * FROM `files` WHERE `id`='$id';";

$run = mysqli_query($conn, $sql);?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <!-- Summernote CSS - CDN Link -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <!-- //Summernote CSS - CDN Link -->

    </head>

    <body>


    <?php 
    while ($row = mysqli_fetch_assoc($run)) {
    $id = $row['id'];
    $aur = $row['author'];
    $jud = $row['judul'];
    $type = $row['file_type_id'];
    $isi = $row['isi'];
    $kategori = $row['kategori'];
    $ca = $row['created_at'];
    $ua = $row['update_at'];?>

    
        <form action="" method="post" enctype="multipart/form-data">
        <?php if($type=='Artikel') {?>
            <div class="container">
                <div class="row">
                    <!-- <div class="col-md-12"> -->
                        <div class="mb-3">
                            <textarea name="text" id="your_summernote" class="form-control" rows="4">
                                <?= $isi; ?>
                            </textarea>
                        </div>
                    <!-- </div> -->
                </div>
            </div>
        <?php }else{ ?>
            <div class="container">
                <div class="row">
                    <input type="file" name="file" id="">
                </div>
            </div>
        <?php } ?>
            <div class="container">
                <div class="row">
                    <input type="text" disabled value="<?= $id ?>">
                    <div style="margin-bottom: 10px;"></div>

                    <input type="text" name="nama" id="" placeholder="Masukan nama" value="<?= $aur ?>">
                    <div style="margin-bottom: 10px;"></div>

                    <input type="text" name="judul" id="" value="<?= $jud ?>">
                    <div style="margin-bottom: 10px;"></div>

                    <input type="text" name="type" disabled id="" value="<?= $type ?>">
                    <div style="margin-bottom: 10px;"></div>
                   
                    <select name="kategori" id="">
                        <option <?php if($kategori=='Communication'){echo 'selected';}else{}; ?> value="Communication">Communication</option>
                        <option <?php if($kategori=='Creative Innovation'){echo 'selected';}else{}; ?> value="Creative Innovation">Creative Innovation</option>
                        <option <?php if($kategori=='Management Leadership'){echo 'selected';}else{}; ?> value="Management Leadership">Management Leadership</option>
                        <option <?php if($kategori=='Personal Development'){echo 'selected';}else{}; ?> value="Personal Development">Personal Development</option>
                        <option <?php if($kategori=='Sales Development'){echo 'selected';}else{}; ?> value="Sales Development">Sales Development</option>
                        <option <?php if($kategori=='Service Excellent'){echo 'selected';}else{}; ?> value="Service Excellent">Service Excellent</option>
                    </select>
                    <div style="margin-bottom: 10px;"></div>

                    <input type="text" disabled name="ca" id="" value="<?= $ca ?>">
                    <div style="margin-bottom: 10px;"></div>

                    <?php if (isset($ua)) {?>
                        <input disabled type="text" name="ua" id="" value="<?= $ua ?>">
                        <div style="margin-bottom: 10px;"></div>
                    <?php }?>
                    <button type="submit" name="btn">Submit</button>
                </div>
            </div>
        </form>
        
        <script src="https://code.jquery.com/jquery-3.6.0.min.js""></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
        <!-- Summernote JS - CDN Link -->
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
        <script>
            $(document).ready(function() {
                $("#your_summernote").summernote();
                $('.dropdown-toggle').dropdown();
            });
        </script>
        <!-- //Summernote JS - CDN Link -->

    </body>

    </html>
<?php } ?>

<?php
    if(isset($_POST['btn'])){
        if ($type=='Artikel') {
            $nm=$_POST['nama'];
            $judul=$_POST['judul'];
            $kat=$_POST['kategori'];
            $isiupdt=$_POST['text'];

            $updt="UPDATE
            `files`
        SET
            `author` = '$nm',
            `judul` = '$judul',
            `kategori` = '$kat',
            `isi` = '$isiupdt',
            `update_at` = CURRENT_TIMESTAMP
        WHERE
            `id` = '$id'
        ";

        $run_update=mysqli_query($conn,$updt);

        if($run_update){
            ?>
            <script>
                window.location.href='h2_2_2.php';
            </script>
            <?php
        }
        }else{
            $files=$_FILES['file'];
            echo "<pre>";
            print_r($files);
            echo "</pre>";
            echo $isi;
        }
    }
?>