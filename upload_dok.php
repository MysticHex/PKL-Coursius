<?php
    include 'connection.php';
    session_start();

    if (isset($_POST['btn3'])&&isset($_FILES['file3'])) {

        $kategori=$_POST['kategori'];
        $fn = (isset($_POST['nama3'])) ? $_POST['nama3'] :"";
        $judul = (isset($_POST['judul3'])) ? $_POST['judul3'] :"";
        $docname = $_FILES['file3']['name'];
        $tmp_name = $_FILES['file3']['tmp_name'];
        $error = $_FILES['file3']['error'];

        if($error===0){
            $docex=pathinfo($docname,PATHINFO_EXTENSION);
            
            $docex_lc=strtolower(($docex));

            $allowedexs=array("docx","pdf");

            if(in_array($docex_lc,$allowedexs)){
                $newdocname=uniqid("document-",true).".".$docex_lc;
                $document_upload_path='uploads/'.$newdocname;
                move_uploaded_file($tmp_name,$document_upload_path);
                $sql="INSERT INTO `files`(
                    `author`,
                    `judul`,
                    `file_type_id`,
                    `kategori`,
                    `isi`
                )
                VALUES(
                    '$fn',
                    '$judul',
                    'document',
                    '$kategori',
                    '$newdocname'
                );";
                $run=mysqli_query($conn,$sql);


                $ssql="SELECT * FROM `files` WHERE `isi`='$newdocname'";
                $rrun=mysqli_query($conn,$ssql);
                $row=mysqli_fetch_assoc($rrun);
                $iid=$row['id'];
                $jud=$row['judul'];
                $typ=$row['file_type_id'];
                $ca=$row['created_at'];
                $ua=$row['update_at'];
                
                $size=filesize($document_upload_path);

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
                    '$size',
                    '',
                    '8',
                    '$doxument_upload_path',
                    '$ca'
                )";

                $rrrun=mysqli_query($conn,$sssql);
                
                if($run&&$move&&$rrrun){
                    header('Location:h1.php?pilihan=Video&sm=Video Berhasil ditambahkan');
                }else{
                    header("Location:h1.php?pilihan=Video&em=There was an error occured");
                }
            }else{
                header("Location:h1.php?pilihan=Video&em=Tipe file tidak didukung");
            }
        }
    
    }else{
        header('Location:h1.php?pilihan=artdok&em=File belum terpilih');
    }
?>