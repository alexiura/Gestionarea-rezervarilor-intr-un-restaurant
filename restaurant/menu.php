    <!-- Menu -->
    <div id="menu" class="section">

        <!-- Background Image  -->
        <div class="bg-image bg-parallax overlay" style="background-image: url(./img/bgMainImage2_1.jpg);"></div>
        <!-- /Background Image  -->

        <div class="container">

            <!-- row -->
            <div class="row">


                <div class="section-header text-center">
                    <h4 class="sub-title">Descopera</h4>
                    <h2 class="title white-text">Meniul Nostru</h2>
                </div>

                <!-- menu nav -->
                <ul class="menu-nav">
                    <li class="active"><a data-toggle="tab" href="#menu1">Mic dejun</a></li>
                    <li><a data-toggle="tab" href="#menu2">Preparate Calde</a></li>
					<li><a data-toggle="tab" href="#menu3">Desert</a></li>
					<li><a data-toggle="tab" href="#menu4">Bauturi</a></li>
                </ul>
                <!-- /menu nav -->

                <!-- menu content -->
                <div id="menu-content" class="tab-content">

                    <!-- menu1 -->
                    <div id="menu1" class="tab-pane fade in active">
                        <?php
                            $dbconnect = mysqli_connect('localhost', 'root' , '' ,'licenta');
                            $query = "SELECT prodName, prodNameOtherLinguage, grame,pret FROM micdejun ORDER BY id";
                            $result = mysqli_query($dbconnect, $query);
                            $num_results = mysqli_num_rows($result);
                            /* fetch associative array */
                            while ($row = mysqli_fetch_row($result))
                            {
                            ?>
                                <div class="col-md-6">
                                    <!-- single dish -->
                                    <div class="single-dish">
                                        <div class="single-dish-heading">
                                            <h4 class="name"><?php printf("%s (%s)\n", $row[0], $row[2]); ?> </h4>
                                            <h4 class="price"><?php printf($row[3]); ?> lei</h4>
                                        </div>
                                        <p><?php printf($row[1]); ?></p>
                                    </div>
                                    <!-- /single dish -->
                                </div>
                            <?php
                            }
                            ?>
                    </div>
                    <!-- /menu1 -->

                    <!-- menu2 -->
                    <div id="menu2" class="tab-pane">
                        <?php
                        $dbconnect = mysqli_connect('localhost', 'root' , '' ,'licenta');
                        $query = "SELECT prodName, prodNameOtherLinguage, grame,pret FROM preparatecalde ORDER BY id";
                        $result = mysqli_query($dbconnect, $query);
                        $num_results = mysqli_num_rows($result);
                        /* fetch associative array */
                        while ($row = mysqli_fetch_row($result))
                        {
                        ?>
                            <div class="col-md-6">
                                <!-- single dish -->
                                <div class="single-dish">
                                    <div class="single-dish-heading">
                                        <h4 class="name"><?php printf("%s (%s)\n", $row[0], $row[2]); ?> </h4>
                                        <h4 class="price"><?php printf($row[3]); ?> lei</h4>
                                    </div>
                                    <p><?php printf($row[1]); ?></p>
                                </div>
                                <!-- /single dish -->
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- /menu2 -->


                    <!-- menu3 -->
                    <div id="menu3" class="tab-pane">
                        <?php
                        $dbconnect = mysqli_connect('localhost', 'root' , '' ,'licenta');
                        $query = "SELECT prodName, prodNameOtherLinguage, grame,pret FROM desert ORDER BY id";
                        $result = mysqli_query($dbconnect, $query);
                        $num_results = mysqli_num_rows($result);
                        /* fetch associative array */
                        while ($row = mysqli_fetch_row($result))
                        {
                        ?>
                            <div class="col-md-6">
                                <!-- single dish -->
                                <div class="single-dish">
                                    <div class="single-dish-heading">
                                        <h4 class="name"><?php printf("%s (%s)\n", $row[0], $row[2]); ?> </h4>
                                        <h4 class="price"><?php printf($row[3]); ?> lei</h4>
                                    </div>
                                    <p><?php printf($row[1]); ?></p>
                                </div>
                                <!-- /single dish -->
                            </div>
                        <?php
                        }
                        ?>

                    </div>
                    <!-- /menu3 -->


                    <!-- menu4 -->
                    <div id="menu4" class="tab-pane">
                        <?php
                        $dbconnect = mysqli_connect('localhost', 'root' , '' ,'licenta');
                        $query = "SELECT prodName, grame,pret FROM bauturi ORDER BY id";
                        $result = mysqli_query($dbconnect, $query);
                        $num_results = mysqli_num_rows($result);
                        /* fetch associative array */
                        while ($row = mysqli_fetch_row($result))
                        {
                        ?>
                            <div class="col-md-6">
                                <!-- single dish -->
                                <div class="single-dish">
                                    <div class="single-dish-heading">
                                        <h4 class="name"><?php printf("%s\n", $row[0] ); ?> </h4>
                                        <h4 class="price"><?php printf($row[2]); ?> lei</h4>
                                    </div>
                                    <p><?php printf($row[1]); ?>  l</p>
                                </div>
                                <!-- /single dish -->
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                    <!-- /menu4 -->
                </div>
                <!-- /menu content -->

            </div>


        </div>
    </div>
    <!-- /Menu  -->
