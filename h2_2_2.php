<?php
    include 'connection.php';
    include 'disperror.php';
    include 'function.php';

    if (isset($_GET['keyword'])) {
        $keyword=$_GET['keyword'];
        if($keyword!=null){
        $sql="SELECT * FROM `files`
        WHERE
        `id` = '$keyword' OR `judul` = '$keyword' OR `author` = '$keyword' OR `file_type_id` = '$keyword' OR `isi` = '$keyword' OR `created_at` = '$keyword'
        ORDER BY
            `created_at`
        ASC";
        $result=mysqli_query($conn,$sql);
        $count=mysqli_num_rows($result);
        if($count==0){
            header('Location:h2_2_2.php?em=Pencarian tidak ada');
        }
        }else{
            $sql="SELECT * FROM `files` ORDER BY `id` DESC";
            $result=mysqli_query($conn,$sql);   
            header('location:h2_2_2.php');
        }
    }else{
        $sql="SELECT * FROM `files` ORDER BY `id` DESC";
        $result=mysqli_query($conn,$sql);
        // header('location:h2_2.php');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View all</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <!-- <link rel="stylesheet" href="h2_2_2.css"> -->
    <style>
        .thmb{
            display: inline-flex; 
        }
        .Detail{
            margin-left: 10px;
        }
        .Detail a{
            color: black;
            margin: 0;
        }
        .Detail a h4{
            margin: 0;
            width: fit-content;
            text-decoration: none;
            color:black;
            transition: 0.3s;
        }
        .Detail a h4:hover{
            margin: 0;
            text-decoration: underline;
            color:black;
        }
        .caption{
            width: 420px;
            height: 45px;
        }
        .caption p{
            margin: 0;
        }
        .Detail .asset{
            display: block;
        }
        #caption{
            max-height: 50px; 
            max-width:420px; 
            overflow:scroll;
            margin:0;
        }
    </style>
</head>
<body>
<?php head('Upload','h1.php') ?>
<div class="content pt-5" >
    <?php if(isset($_GET['em'])) {?>
        <div class="alert alert-danger">
            <?=$_GET['em']?>
        </div>
    <?php } ?>
    
    <?php if(isset($_GET['sm'])) {?>
        <div class="alert alert-success">
            <?= $_GET['sm']; ?>
        </div>
    <?php } ?>    
    
    <?php if(isset($_GET['em'])!=null ||isset($_GET['sm'])!=null) {?>
        <script>
            if (performance.navigation.type === 1) {
                    window.location.href = 'h2_2_2.php';
            }
        </script>
    <?php } ?>



    <div style="margin-bottom: 20px;"></div>
    <div class="" style="padding-left: 20em;">
    <div class="thmb">
        <div class="img">
            <a href="">
                <img src="./asset/Thumbail/Tmb 1.png" alt="" width="240px" height="135px">
            </a>
        </div>
        <div class="Detail">
            <small><a href="">Communication</a></small>
            <a style="text-decoration: none; " href=""><h4>Communication</h4></a>
            <p id="caption">Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid maxime dolorum, atque, dolore non necessitatibus nisi quidem consequuntur error accusantium deserunt officiis tempora commodi quam earum expedita quaerat, sed labore.</p>
            <div class="asset" style="display: inline-flex; background:white; width:100%; height:30px; ">
                <div class="" style="background: #C4C4C4; height:30px; width:30px; border-radius: 100px; margin-right:10px;"></div>
                <p style="margin-right: 5px; padding: 5px; height:30px; vertical-align:top; font-size:15px;">Author</p>
                <div class="" style="background: black; height:30px; width:1px; margin-right:5px;"></div>
                <div class="" style="background: black; height:30px; width:1px; margin-right:5px;"></div>
                <p style="margin-right: 5px; padding: 5px; height:30px; vertical-align:top; font-size:15px;">22 Maret 2022</p>
            </div>
        </div>
    </div>
    <?php while($row=mysqli_fetch_assoc($result)) {
        $id=$row['id'];
        $isi=$row['isi'];
        $fileType=$row['file_type_id'];
        $judul=$row['judul'];
        $nama=$row['author'];
        $ca=$row['created_at'];
        $ua=$row['update_at'];

        // mysqli_query($conn,"SELECT * FROM `files` WHERE ")

        ?>

        <table>
            <?php if($fileType==='video') {?>
                <tr>
                    <video controls src="./uploads/<?=$isi?>" width="360px"></video>
                </tr>
            <?php } ?>

            <?php if($fileType==='image') {?>
                <tr>
                <?php if($count=mysqli_num_rows(mysqli_query($conn,"SELECT * FROM `files` WHERE `judul`='$judul'"))>1) {?>
                    <?php for ($i=0; $i < $count ; $i++) {?>
                        <td>
                            <img src="uploads/<?=$isi?>" alt="" width=360px;>
                        </td>
                    <?php } ?>
                <?php }else{ ?>
                    <td>
                        <img src="uploads/<?=$isi?>" alt="Gambar <?=$judul?>" width=360px;>
                    </td>
                <?php } ?>
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
                    <td style="height: fit-content;">
                        <ul style="list-style-type: none; height: fit-content; margin:0;">
                            <li>id: <?= $id; ?></li>
                            <li>Nama: <?= $nama; ?></li>
                            <li>Judul: <?= $judul; ?></li>
                            <li>Dibuat: <?= $ca; ?></li>
                            <?php if(isset($ua)) {?>
                                <li>Diupdate:<?= $ua; ?></li>
                            <?php } ?>
                        </ul>
                    </td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <a href="updatefile.php?url=<?=$id?>"><button>Update</button></a>
                        <a href="deletefile.php?url=<?=$id?>" onclick="return confirm('Yakin untuk delete?');"><button>Delete</button></a>
                        <div style="margin-bottom: 15px;"></div>
                    </td>
                </tr>
        </table>

    <?php } ?>
    </div>
</div>

<script>
        var lastScrollTop=0;
        var navbar = document.getElementById('header');
        window.addEventListener("scroll",function(){
            var scrollTop = window.pageYOffset||document.documentElement.scrollTop;
            if(scrollTop>lastScrollTop){
                navbar.style.top="-80px";
            }else{
                navbar.style.top="0px";
            }
            lastScrollTop=scrollTop;
        })

        function hmbg(){
            document.querySelector('#bar1').classList.toggle('open');
            document.querySelector('#bar2').classList.toggle('open');
            document.querySelector('#bar3').classList.toggle('open');
            document.querySelector('#hamburgls').classList.toggle('active');
        }
    </script>
<script>
    var lastScrollTop = 0;
    const navbar = document.querySelector('.nav');
    const stick = document.querySelector('.stickys');
    const sbmenu = document.querySelector('.submenu');
    let lastScrollY = window.scrollY;
    window.addEventListener("scroll", () => {
        if (lastScrollY < window.scrollY) {
            navbar.classList.add('hidden');
            stick.style.top = "0px";
            sbmenu.style.top="40.2px";
        } else {
            navbar.classList.remove('hidden');
            stick.style.top = "50px";
            sbmenu.style.top="90.2px";
        }
        lastScrollY = window.scrollY;
    })

    function show(){
            document.querySelector('#bar1').classList.toggle('open');
            document.querySelector('#bar2').classList.toggle('open');
            document.querySelector('#bar3').classList.toggle('open');
            document.querySelector('.hamburg').classList.toggle('active');
            document.querySelector('.submenu').classList.toggle('hide');
    }
</script>
</body>
</html>