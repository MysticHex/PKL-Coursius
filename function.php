<?php

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($rows = mysqli_fetch_assoc($result)) {
        $rows[] = $rows;
    }
    return $rows;
}

function cari($keyword)
{
    $query = "SELECT * FROM `users`
                WHERE
                `username`=$keyword";

    return query($query);
}

function rmb()
{
    session_start();
    $rmbr = $_SESSION['%&%'];
    $rmbr2 = $_SESSION['%&%%'];
}

function jam()
{ ?>
    <div class="mb-2">
        <select name="hour" id="">
            <?php for ($i = 0; $i <= 23; $i++) { ?>
                <option value="<?= $i ?>"><?= $i; ?></option>
            <?php } ?>
        </select>
        Jam
        <select name="miniute" id="">
            <?php for ($i = 0; $i <= 59; $i++) { ?>
                <option value="<?= $i ?>"><?= $i; ?></option>
            <?php } ?>
        </select>
        Menit
        <select name="second" id="">
            <?php for ($i = 0; $i <= 59; $i++) { ?>
                <option value="<?= $i ?>"><?= $i; ?></option>
            <?php } ?>
        </select>
        Detik
        <br>
    </div><?php }

?>

<?php function head($op,$go)
{ ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <style>
        body {
            padding-top: 8%;
        }
        
        .nav {
            --nav-height: 50px;
            width: 100%;
            position: fixed;
            top: 0;
            left: 0;
            height: var(--nav-height);
            background: #363740;
            display: flex;
            transition: transform 0.3s;
            align-items: center;
        }

        #logo {
            color: #fff;
            margin: 0 6em 0 2em;
        }

        .header .nav form {
            margin-right: 20em;
            margin-bottom: 0;
        }

        .header .nav form input {
            width: 300px;
        }

        .header .nav #btn {
            margin-right: 1rem;
            background: transparent;
            color: whitesmoke;
            font-size: 17px;
            border: solid 1px whitesmoke;
            border-radius: 12px;
            padding: 3.610px 10.83px;
            transition: 0.3s;
        }

        .header .nav #btn:hover {
            background: whitesmoke;
            color: #000000;
        }

        .hidden {
            transform: translateY(calc(-1 * var(--nav-height)));
        }

        .stickys {
            z-index: 10000;
            top: 50px;
            width: 100%;
            background: #363740;
            position: fixed;
            transition: 0.3s;
        }

        .stickys .move {
            top: 0;
        }

        .stickys .items ul {
            padding: 0;
            padding-bottom:18px;
            margin: 0;
            position: relative;
            display: flex;
            align-items: center;
        }

        .stickys .items ul li a{
            padding: 8px 8px;
            transition: 0.3s;
            cursor: default;
            color: #DDE2FF;
            margin-right: 7px;
            list-style-type: none;
            position: relative;
            text-decoration: none;
        }

        .stickys .items ul li a:hover {
            background: #DDE2FF;
            color: #363740;
        }

        .stickys .items ul .hamburg {
            left: 50px;
            width: 30px;
            display: inline;
        }

        .hamburg {
            height: fit-content;
            width: fit-content;
            margin-left: 40px;
            margin-right: 78px;
            cursor: pointer;
        }

        .bar {
            background-color: #DDE2FF;
            width: 30px;
            margin-top: 5px;
            height: 3.4px;
            border-radius: 3em;
            transition: all 0.3s ease-in;
        }

        #bar1 {
            margin-top: 0;
        }

        #bar1.bar.open {
            transform: rotate(45deg) translate(4.3px, 7px);
        }

        #bar2.bar.open {
            background: transparent;
            transition: 0s;
        }

        #bar3.bar.open {
            transform: rotate(-45deg) translate(4.3px, -7px);
        }

        .submenu {
            width: 230px;
            background: #07012F;
            position: fixed;
            top: 90.2px;
            border-right: #07012F solid 1em;
            transform: translateX(-230px);
            transition: 0.2s;
            z-index: 2;
        }

        .submenu.hide {
            transform: translateX(0);
        }
        .submenu>a{
            text-decoration: none;
        }
        .submenu>h2 {
            text-decoration: none;
            color: #fff;
            padding-left: 25px;
        }
        .submenu>a h2 {
            text-decoration: none;
            color: #fff;
            padding-left: 25px;
        }

        .submenu>a h2:hover {
            cursor: default;
            background: #fff;
            color: #07012F;
        }
        .submenu>h2:hover {
            cursor: default;
            background: #fff;
            color: #07012F;
        }

        .submenu.hide {
            transform: translateX(0);
        }

        .messeage {
            background: rgb(172, 161, 161);
            border-radius: 20px;
            position: fixed;
            z-index: 1000000;
            left: 32%;
            justify-content: center;
            margin: auto;
            width: 450px;
            height: 260px;
            text-align: center;
            transition: 0.3s ease-in;
            padding-top: 70px;
            transform: translateY(-420px);
            opacity: 0%;
        }
        
        .messeage.down {
            opacity: 100%;
            transform: translateY(-80px);
        }

        .messeage>button {
            width: 60px;
            border: solid 2px white;
        }
    </style>


    <div class="header">
        <nav id="nav" class="nav">
            <h2 id="logo">CoursLib</h2>

            <form action="" method="get" id="form">
                <input type="text" name="keyword" id="" autocomplete="off">
                <button id="sbm" type="submit">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 30 30" style=" fill:#000000;">
                        <path d="M 13 3 C 7.4889971 3 3 7.4889971 3 13 C 3 18.511003 7.4889971 23 13 23 C 15.396508 23 17.597385 22.148986 19.322266 20.736328 L 25.292969 26.707031 A 1.0001 1.0001 0 1 0 26.707031 25.292969 L 20.736328 19.322266 C 22.148986 17.597385 23 15.396508 23 13 C 23 7.4889971 18.511003 3 13 3 z M 13 5 C 17.430123 5 21 8.5698774 21 13 C 21 17.430123 17.430123 21 13 21 C 8.5698774 21 5 17.430123 5 13 C 5 8.5698774 8.5698774 5 13 5 z">
                        </path>
                    </svg>
                </button>
            </form>

            <button id="btn" onclick="window.location.href='<?=$go?>'"><?= $op; ?></button>
            <button id="btn" onclick="down()">Logout</button>
        </nav>
        <div class="stickys">
            <div class="items">
                <ul>
                    <div class="hamburg" onclick="show()">
                        <div class="bar" id="bar1"></div>
                        <div class="bar" id="bar2"></div>
                        <div class="bar" id="bar3"></div>
                    </div>
                    <?php $type = (isset($_GET['type'])) ? $_GET['type']:null;?>
                    <li><a href="<?php if($type != null){echo'Display.php?type='.$type.'&kategori=Communication';}else{echo'Display.php?kategori=Communication';}?>">Communication</a></li>
                    <li><a href="<?php if($type != null){echo'Display.php?type='.$type.'&kategori=Creative Innovation';}else{echo'Display.php?kategori=Creative Innovation';}?>">Creative Innovation</a></li>
                    <li><a href="<?php if($type != null){echo'Display.php?type='.$type.'&kategori=Management Leadership';}else{echo'Display.php?kategori=Management Leadership';}?>">Management Leadership</a></li>
                    <li><a href="<?php if($type != null){echo'Display.php?type='.$type.'&kategori=Personal Development';}else{echo'Display.php?kategori=Personal Development';}?>">Personal Development</a></li>
                    <li><a href="<?php if($type != null){echo'Display.php?type='.$type.'&kategori=Sales Development';}else{echo'Display.php?kategori=Sales Development';}?>">Sales Development</a></li>
                    <li><a href="<?php if($type != null){echo'Display.php?type='.$type.'&kategori=Service Excellent';}else{echo'Display.php?kategori=Service Excellent';}?>">Service Excellent</a></li>
                </ul>
            </div>
        </div>
        <div class="submenu">
            <a href="h2.php"><h2 id="hm">Home</h2></a>
            <a href="Display.php?type=Artikel"><h2>Artikel</h2></a>
            <a href="Display.php?type=Video"><h2>Video</h2></a>
            <a href="Display.php?type=Gambar"><h2>Gambar</h2></a>
            <h2>Contact Us</h2>
        </div>
    </div>

    <div class="messeage">
        <h3>Yakin untuk logout?</h3>
        <div class="mb-3"></div>
        <button class="p-1 px-3" onclick="window.location.href='session.php'">Yes</button>
        <button class="p-1 px-3" onclick="cancel()">No</button>
    </div>

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
                sbmenu.style.top = "40.2px";
            } else {
                navbar.classList.remove('hidden');
                stick.style.top = "50px";
                sbmenu.style.top = "90.2px";
            }
            lastScrollY = window.scrollY;
        })

        function show() {
            document.querySelector('#bar1').classList.toggle('open');
            document.querySelector('#bar2').classList.toggle('open');
            document.querySelector('#bar3').classList.toggle('open');
            document.querySelector('.hamburg').classList.toggle('active');
            document.querySelector('.submenu').classList.toggle('hide');
        }

        function down() {
            document.querySelector('.messeage').classList.add('down');
        }

        function cancel() {
            document.querySelector('.messeage').classList.remove('down');
        }
    </script>
<?php } ?>

<?php function usr()
{

    $rmbr = (isset($_SESSION['%&%']));
    $rmbr2 = $_SESSION['%&%%'];

    if (isset($rmbr)) {
        header('Location:h1.php');
        exit;
    } else if (!isset($rmbr2)) {
        header('Location:login.php');
        exit;
    }
}
?>

<?php function kategori($var)
{?>
    <select class="<?=$var?>" name="kategori" id="" required>
        <option disabled selected hidden>Pilih Kategori</option>
        <option value="Communication">Communication</option>
        <option value="Creative Innovation">Creative Innovation</option>
        <option value="Management Leadership">Management Leadership</option>
        <option value="Personal Development">Personal Development</option>
        <option value="Sales Development">Sales Development</option>
        <option value="Service Excellent">Service Excellent</option>
    </select>
<?php } ?>