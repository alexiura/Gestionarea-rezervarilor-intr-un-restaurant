<?php
include_once "bootstrap.php";
include_once "functions.php";

    $name = $_POST['name'];
	$phoneNumber = $_POST['phoneNumber'];
	$date = $_POST['date'];
	$person = $_POST['person'];
	$email = $_POST['email'];
	$time = $_POST['time'];

    $dbconnect = mysqli_connect('localhost', 'root' , '' ,'licenta');
    if(!empty($name) && !empty($phoneNumber) && !empty($date) && !empty($person) && !empty($email) && !empty($time) )
    {
        if (validationInputForReservation($name, $phoneNumber, $time))
        {
            if(checkIfExistReservationInSameDay($name,$date, $email))
            {
                if (maxNumberOfPeopleInSameTime($date, $time))
                {
                    $sql =mysqli_query($dbconnect, "insert into reservation (Id, name, phoneNumber, date, person, email, time) values ('', '$name', '$phoneNumber', '$date', '$person', '$email', '$time')");
                    if($sql){
                        echo "Data inserted successfully<br>";
                        sendMail($name,$date,$time,$email);
                    }
                    else{
                        echo "Data not inserted";
                    }
                    echo "<div><br></div>" ;
                    echo "<div><button class='button'><a href='index.php'><- BACK</a></button></div>";
                }

            }
            else
            {
                echo "There is a reservation on this day";
                echo "<div><button class='button'><a href='index.php#rezervare'><- BACK</a></button></div>";
            }
        }
    }

    else
    {
        echo "Please fill all boxes";
        echo "<div><button class='button'><a href='index.php#rezervare'><- BACK</a></button></div>";
    }




//    $reservationData =mysqli_query($dbconnect, "select * from reservation where", MYSQLI_USE_RESULT);
//
//    foreach($reservationData as $reservationItem)
//    {
//        foreach($reservationItem as $key => $value)
//        {
//            echo $value." ";
//        }
//        echo "<hr>";
//    }

//$query = "SELECT name, email FROM reservation ORDER BY id";
//$result = mysqli_query($dbconnect, $query);
//$num_results = mysqli_num_rows($result);
///* fetch associative array */
//while ($row = mysqli_fetch_row($result)) {
//    printf("%s (%s)\n", $row[0], $row[1]);
//    echo "<br>";
//}

//In case you need to fetch the entire row into associative array:
//  $row = $result->fetch_assoc();


//in case you need just a single value
//  $row = $result->fetch_row();
//  $value = $row[0] ?? false;


//for($i=0; $i<$num_results; $i++)
//    {
//        $row = mysqli_fetch_assoc($result);
//
//        print $row['name'];
//
//        print $row['email'];
//
//    }
