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
                    <li><h4>Logout --></h4></li>
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
            <div class="col-md-10 col-md-offset-1 text-center">
                <div class="home-content">
                    <h1 class="white-text">Bine ati venit pe pagina noastra <?php echo $_SESSION["name"] ?></h1> <br>
                    <a href="index.php#menu"><button class="main-button">Descopera meniul</button></a>
                </div>
            </div>
        </div>
    </div>
    <!-- /Home -->