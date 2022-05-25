<?php


$dbconnect = mysqli_connect('localhost', 'root', '', 'licenta');


$reservationData = mysqli_query($dbconnect, "select * from reservation where ", MYSQLI_USE_RESULT);

while($row < $reservationData->fetch_assoc())
{

}



