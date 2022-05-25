    <!-- Reservation  -->
    <div id="rezervare" class="section">

        <!-- Backgound Image  -->
        <div class="bg-image" style="background-image: url(./img/bgMainImage3.jpg);"></div>
        <!-- /Backgound Image  -->

        <div class="container">
            
            <div class="row">

                <div class="col-md-6 col-md-offset-1 col-sm-10 col-sm-offset-1 ">
                    <form action="makeReservation.php" class="reserve-form row" method="POST">
                        <div class="section-header text-center">
                            <h4 class="sub-title">Reservation</h4>
                            <h2 class="title white-text">Book Your Table</h2>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Nume:</label>
                                <input class="input" type="text" placeholder="Nume" id="name" name="name">
                            </div>

                            <div class="form-group">
                                <label for="phone">Phone:</label>
                                <input type="tel" class="input" placeholder="Phone" id="phone" name="phoneNumber">
                            </div>

                            <div class="form-group">
                                <label for="date">Data:</label>
                                <input type="date" class="input" placeholder="MM/DD/YYYY" id="date" name="date">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="person">Pentru:</label>
                                <select id="person" class="input" name="person">
                                    <option value="1">1 Person</option>
                                    <option value="2">2 Person</option>
                                    <option value="3">3 Person</option>
                                    <option value="4">4 Person</option>
                                    <option value="5">5 Person</option>
                                    <option value="6">6 Person</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="input" placeholder="Email" id="email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="time">Time:</label>
                                <input type="time" class="input" placeholder="HH:MM" id="time" name="time">
                            </div>
                        </div>

                        <div class="col-md-12 text-center">
                            <button type="submit" class="main-button">REZERVA</button>
                        </div>
                    </form>
                </div>
                <!-- /reservation form  -->

                <!-- opening timp -->
                <div class="col-md-4 col-md-offset-0 col-sm-10 col-sm-offset-1">
                    <div class="opening-time row">
                        <div class="section-header text-center">
                            <h2 class="title white-text">Ora de functionare</h2>
                        </div>

                        <ul>
                            <li>
                                <h4 class="day">Luni</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Marti</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Miercuri</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Joi</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Vineri</h4>
                                <h4 class="hours">8:00 am – 11:00 pm</h4>
                            </li>
                            <li>
                                <h4 class="day">Sambata</h4>
                                <h4 class="hours">Closed</h4>
                            </li>
                            <li>
                                <h4 class="day">Duminica</h4>
                                <h4 class="hours">Closed</h4>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- /opening-time -->

            </div>
            <!-- /row  -->

        </div>
        <!-- /container  -->

    </div>
    <!-- /Reservation -->

