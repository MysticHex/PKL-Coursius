<?php
session_start();
$rmbr=$_SESSION['%&%'];
$rmbr2=$_SESSION['%&%%'];

// if(isset($rmbr2)){
//     header('Location:dispusr.php');
//     exit;
// }
// if(!isset($_SESSION['%&%'])||!isset($rmbr2)){
//     header('Location:login.php');
//     exit;
// }

include 'connection.php';
include 'function.php';
$pilihan = "";

// untuk check apa ada inputan pilihan
if (isset($_GET['pilihan']) && $_GET['pilihan'] != "") {
    $pilihan = $_GET['pilihan'];
}
// echo $rmbr;
$sql=mysqli_query($conn,"SELECT * FROM `users` WHERE `username`='$rmbr'");
$row=mysqli_fetch_assoc($sql);
$fn=$row['fullname'];

date_default_timezone_set('Asia/Jakarta');
$timestamp = date('d/m/Y h:i A');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Library</title>
        <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

        <!-- Summernote CSS - CDN Link -->
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
        <!-- //Summernote CSS - CDN Link -->

        <style>
            input{
                margin-bottom: 10px;
            }.alert{
                text-align: center;
                width: fit-content;
                padding: 10px;
                border-radius: 25px;
                margin-bottom: 10px;
                transform: scale(0.8);
            }.danger{
                background: red;
                color: white;
            }.succes{
                background: greenyellow;
                color: black;
            }#a{
                text-decoration: none;
                color: black;
                transition-duration: 0.51s;
            }#a:hover{
                color:blue;
                text-decoration: underline;
            }#your_summernote{
                transform: translateX(20);
            }
            .note-frame{
                width: 500px;
            }.note-editable{
                height: 200px;
            }
            #pilihan{
                width: 65%;
                color: white;
                background-color: #726780;
            }
            .inp{
                margin-bottom: 10px;
                width: 65%;
            }
        </style>
    </head>

    <body>
        <?php head('View','h2.php') ?>
        <div style="margin-bottom: 10px;"></div>
        <div style="margin-left: 20%; margin-right:auto;">
        <form action="" method="get">
            <select name="pilihan" id="pilihan" onchange="this.form.submit()">
                <option selected disabled value="">Select an Option</option>
                <option value="Video" <?php echo ($pilihan === "Video") ? "selected" : "" ?>>Video</option>
                <option value="Artikel" <?php echo ($pilihan === "Artikel") ? "selected" : "" ?>>Artikel</option>
                <option value="artdok" <?php echo ($pilihan === "artdok") ? "selected" : "" ?>>Artikel (dokumen)</option>
                <option value="image" <?php echo ($pilihan === "image") ? "selected" : "" ?>>Image</option>
            </select>

        </form>
        <div style="margin-bottom:10px;"></div>
        <?php if(isset($_GET['sm'])) {?>
            <div class="alert succes">
                <a target="_BLANK" id="a" href="h2.php"><?= $_GET['sm']; ?></a>
            </div>
        <?php } ?>
        <?php if(isset($_GET['em'])) {?>
            <div class="alert danger">
                <?= $_GET['em']; ?>
            </div>
        <?php } ?>
        
        <?php if ($pilihan == "Video") { ?>
            <form action="upload_vid.php" method="post" enctype="multipart/form-data">
                <input class="inp" type="text" name="nama" placeholder="Masukan nama" autocomplete="off" id="" value="<?= $fn?>">
                <div style="margin-bottom: 5px;"></div>
                
                <input class="inp" type="text" name="judul" placeholder="Masukan judul" id="" autocomplete="off"><br>
                <div style="margin-bottom: 5px;"></div>
                <div>
                    <?php kategori('inp') ?>    
                </div>
                
                <input class="inp" type="file" name="my_video" id="my_video"><br>
                <small>format file harus (*.mp4)</small>
                <div style="margin-bottom: 5px;"></div>


                <div style="margin-bottom: 5px;"></div>
                <p>Masukan Durasi Video</p>
                <?php jam(); ?> 

                <input type="submit" name="btnSubmit" value="Submit">
            </form>

            <?php if($_GET['em']!=null ||$_GET['sm']!=null) {?>
            <script>
                if (performance.navigation.type === 1) {
                        window.location.href = 'h1.php?pilihan=Video';
                }
            </script>
            <?php } ?>
        <?php } ?>

        <?php if ($pilihan == "Artikel") { ?>
            <form action="upload_Artikel.php" method="post">
                <input class="inp" type="text" name="nama2" id="" placeholder="Masukan nama" autocomplete="off" value="<?= $fn?>"><br>
                <input class="inp" type="text" name="judul2" placeholder="masukan judul" id="" autocomplete="off"><br>
                <div>
                    <?php kategori('inp') ?>    
                </div>
                <textarea class="inp" name="isi2" id="your_summernote" class="form-control" style="width: 700px;"></textarea><br>

                <?php jam() ?>

                <input type="submit" name="btnSubmit2" value="Submit">
            </form>

            <?php if($_GET['em']!=null ||$_GET['sm']!=null) {?>
                <script>
                    if (performance.navigation.type === 1) {
                            window.location.href = 'h1.php?pilihan=Artikel';
                    }
                </script>
            <?php } ?>

        <?php } ?>
            
        <?php if($pilihan=="artdok") {?>
            <form action="upload_dok.php" method="post" enctype="multipart/form-data">
                <input class="inp" type="text" name="nama3" id="" placeholder="Masukan nama" autocomplete="off" value="<?= $fn?>">
                <div style="margin-bottom: 5px;"></div>
                
                <input class="inp" type="text" name="judul3" placeholder="Masukan judul" id="" autocomplete="off">
                <div style="margin-bottom: 5px;"></div>
                <div>
                    <?php kategori('inp') ?>    
                </div>
                <input type="file" name="file3" id=""><br>
                <small>format file harus (*.doc,*.pdf)</small>
                <div style="margin-bottom: 5px;"></div>
                <?php jam() ?>
                <div style="margin-bottom: 5px;"></div>
                <input class="inp" type="submit" value="Submit" name="btn3">
            </form>

            <?php if($_GET['em']!=null ||$_GET['sm']!=null) {?>
            <script>
                if (performance.navigation.type === 1) {
                        window.location.href = 'h1.php?pilihan=artdok';
                }
            </script>
            <?php } ?>
        <?php } ?>
            
        <?php if($pilihan=="image") {?>
            <form action="upload_img.php" method="post" enctype="multipart/form-data" multiple>
                <input class="inp" type="text" name="nama_4" id="" placeholder="Masukan nama" autocomplete="off" value="<?= $fn?>">
                <div style="margin-bottom: 5px;"></div>
                
                <input class="inp" type="text" name="judul_4" placeholder="Masukan judul" id="" autocomplete="off" required>
                <div style="margin-bottom: 5px;"></div>
                <?php kategori('inp') ?>
                <div style="margin-bottom: 5px;"></div>
                <input type="file" name="file_4[]" id="" multiple required><br>
                <!-- <small>format file harus (*.doc,*.pdf)</small> -->
                <div style="margin-bottom: 5px;"></div>
                <?php jam() ?>
                <div style="margin-bottom: 5px;"></div>
                <input class="inp" type="submit" value="Submit" name="btn_4">
            </form>
            <?php if($_GET['em']!=null ||$_GET['sm']!=null) {?>
            <script>
                if (performance.navigation.type === 1) {
                        window.location.href = 'h1.php?pilihan=image';
                }
            </script>
            <?php } ?>
        <?php } ?>


        <!-- Scripts -->
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

        <!-- Scripts -->
        </div>
    </body>
</html>