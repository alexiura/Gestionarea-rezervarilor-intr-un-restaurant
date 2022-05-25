<?php
 include_once "head.php";
 session_start();

$btn = $_POST["submit"] ?? null;
$_SESSION["message"] = '';

if ($btn)
{
    $email = $_POST["email"] ?? null;
    $phone = $_POST["phoneNumber"] ?? null;
    $date = $_POST["date"] ?? null;
    if (!empty($email))
    {
        if (!empty($phone))
        {
            if (!empty($date))
            {
                $con = mysqli_connect('localhost','root','','licenta') or die('Unable To connect');

                $result = mysqli_query($con,"SELECT * FROM reservation WHERE email LIKE '%$email%' AND phoneNumber= '$phone'  AND date= '$date'");
                $row  = mysqli_fetch_array($result);
                if ($row > 0)
                {
                    $id = $row['Id'];
                    mysqli_query($con,"DELETE FROM reservation WHERE Id= '$id'");
                    $_SESSION["message"] = "Rezervarea a fost anulata cu succes!";
                }
                else
                {
                    $_SESSION["message"] = "Datele introduse sunt incorecte!";
                }
            }
            else
            {
                $_SESSION["message"] = "Introduceti Data!";
            }
        }
        else
        {
            $_SESSION["message"] = "Introduceti numarul de telefon!";
        }
    }
    else
    {
        $_SESSION["message"] = "Introduceti Emailul!";
    }

}

?>

<body>

<!-- Header -->
<header id="header">

    <!-- Top nav -->
    <div id="top-nav">
        <div class="container">

            <!-- logo -->
            <div class="logo">
                <a href="#"><img src="./img/18707534.jpg" alt="logo"></a>
            </div>
            <!-- /logo -->

            <!-- social links -->
            <ul class="social-nav">
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="logout.php"><i class="fa fa-sign-out"></i></a></li>
            </ul>
            <!-- /social links -->
        </div>
    </div>
    <!-- /Top nav -->

    <!-- Bottom nav -->
    <div id="bottom-nav">
        <div class="container">
            <nav id="nav">

                <!-- nav -->
                <ul class="main-nav nav navbar-nav">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="index.php#about">About</a></li>
                    <li><a href="index.php#menu">Menu</a></li>
                    <li><a href="index.php#rezervare">Rezervare</a></li>
                    <li><a href="anuleazaRezervarea.php">Anuleaza Rezervarea</a></li>
                </ul>
                <!-- /nav -->

                <!-- button nav -->
                <ul class="cta-nav">
                    <li><a href="index.php#rezervare" class="main-button">Rezervare</a></li>
                </ul>
                <!-- /button nav -->

                <!-- contact nav -->
                <ul class="contact-nav nav navbar-nav">
                    <li><a href="tel:0754555286"><i class="fa fa-phone"></i>0754555286</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i>Baia Mare Str Victoriei Nr 76</a></li>
                </ul>
                <!-- /contact nav -->

            </nav>
        </div>
    </div>
    <!-- /Bottom nav -->

</header>
<!-- /Header -->

<!-- Home -->

<div class="banner-area" id="home">
    <!-- Background-image -->

    <div class="bg-image bg-parallax overlay" style="background-image:url(./img/bgMainImage4.jpg);"></div>

    <div class="home-wrapper">

        <div class="col-md-6 col-md-offset-4 col-sm-10 col-sm-offset-1 ">

            <div class="home-content">
                <h1 class="white-text">Doresti sa anulezi o rezervare <?php echo $_SESSION["name"] ?> ???</h1> <br>
                <h3 class="white-text"> <?php echo $_SESSION["message"] ?></h3>
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" name="email">
                        </div>

                        <div class="form-group">
                            <label for="phoneNumber">Telefon</label>
                            <input type="tel" name="phoneNumber">
                        </div>

                        <div class="form-group">
                            <label for="date">Data</label>
                            <input type="date" name="date">
                        </div>

                        <div class="col-md-8 text-center">
                            <button type="submit" name="submit" value="send" class="main-button">Anuleaza</button>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- /Home -->

<?php
    include_once "bottom.php";

